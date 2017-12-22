<?php

namespace GraftPHP\Clout;

use GraftPHP\Clout\Section;
use GraftPHP\Framework\DB;
use GraftPHP\Framework\MagicCall;

class Output
{
    use MagicCall;

    public function all()
    {
        $db = new DB();
        $this->sql .= " GROUP BY r.id;";
        $q = $db->db->query($this->sql);
        $res = $q->fetchAll(\PDO::FETCH_OBJ);

        $out = new \GraftPHP\Framework\Data();
        foreach ($res as $row) {
            $out->append($row);
        }

        return $out;
    }

    public function find($id)
    {
        $this->sql .= "\r\n AND r.id = " . intval($id);
        $out = $this->all();
        $out = reset($out);

        if (empty($out->id)) {
            return false;
        } else {
            foreach ($this->section->relationships() as $relationship) {
                $out->{$relationship->name} = Relation::where('relationship', '=', $relationship->id)
                ->where('parent', '=', $id)
                ->get();
            }
            return $out;
        }
    }

    private function listFunc($slug)
    {
        $this->section = Section::find($slug, 'slug');
        $slug = $this->section->slugField();

        $this->sql = "SELECT r.id AS `id`, d." . $slug->type()->datafield . " AS `value`
            FROM clout_record r
            INNER JOIN clout_data d ON r.id = d.record AND d.field = " . $slug->id . "
            WHERE r.section = " . intval($this->section->id);

        return $this;
    }

    private function sectionFunc($slug)
    {
        $this->section = Section::find($slug, 'slug');

        if (!$this->section) {
            dd('Section not found - ' . $slug);
        }

        $this->sql = "SELECT r.id";
        foreach ($this->section->fields() as $field) {
            $type = $field->type();
            $this->sql .= ",\r\n GROUP_CONCAT(
                IF(d.field = " . intval($field->id) . ", " . $type->datafield . ", NULL)
            ) AS `" . $field->name . "`";
        }
        $this->sql .= "\r\nFROM clout_record r \r\n";
        $this->sql .= "LEFT JOIN clout_data d ON d.record = r.id\r\n";
        $this->sql .= "WHERE r.section = " . intval($this->section->id);

        return $this;
    }
}
