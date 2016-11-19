<?php

namespace GraftPHP\Clout;

use GraftPHP\Clout\Section;
use GraftPHP\Framework\magicCall;

Class Output
{

    use MagicCall;

    private function section_func($slug)
    {
        $section = Section::find($slug, 'slug');
        d($section);

        $sql = "SELECT r.id";
        foreach ( $section->fields() as $field ) {
            $type = $field->type();
            $sql .= ",\r\n GROUP_CONCAT(IF(d.field = " . $field->id . ", " . $type->datafield . ", NULL)) AS " . $field->name;
        }
        $sql .= "\r\nFROM clout_record r \r\n";
        $sql .= "LEFT JOIN clout_data d ON d.record = r.id\r\n";
        $sql .= "WHERE r.section = " . $section->id;
        dd($sql);
    }

}

// SELECT
//  *,
//  GROUP_CONCAT(IF(d.field = 3,string_data,NULL)) AS a,
//  GROUP_CONCAT(IF(d.field = 4,date_data,NULL)) AS b
// FROM
//  clout_record r
// LEFT JOIN clout_data d ON d.record = r.id
