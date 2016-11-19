<?php

namespace GraftPHP\Clout;

use GraftPHP\Clout\Section;
use GraftPHP\Framework\DB;
use GraftPHP\Framework\magicCall;

Class Output
{

    use MagicCall;

    public function all()
    {
        $db = new DB();
        $this->sql .= " GROUP BY r.id;";
        $q = $db->db->query($this->sql);
        $res = $q->fetchAll(\PDO::FETCH_OBJ);

        $out = new \GraftPHP\Framework\Data();
        foreach($res as $row) {
            $out->append( $row );
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
            return $out;
        }
    }

    private function section_func($slug)
    {
        $section = Section::find($slug, 'slug');

        $this->sql = "SELECT r.id";
        foreach ( $section->fields() as $field ) {
            $type = $field->type();
            $this->sql .= ",\r\n GROUP_CONCAT(IF(d.field = " . intval($field->id ). ", " . $type->datafield . ", NULL)) AS `" . $field->name . "`";
        }
        $this->sql .= "\r\nFROM clout_record r \r\n";
        $this->sql .= "LEFT JOIN clout_data d ON d.record = r.id\r\n";
        $this->sql .= "WHERE r.section = " . intval($section->id);

        return $this;
    }

}
