<?php

namespace GraftPHP\Clout;

use GraftPHP\Clout\Field;
use GraftPHP\Framework\DB;
use GraftPHP\Framework\Model;

class Section extends Model
{

    public static $db_tablename = 'clout_section';
    public static $db_idcolumn = 'id';

    public static $db_columns = [
        ['name', 'varchar(255)'],
        ['slug', 'varchar(255)'],
    ];

    public function sectionFields()
    {
        $db = new DB();
        $f = $db->table(Field::$db_tablename)
            ->where('section', '=', $this->id)
            ->get();

        return $f ? $f : [];
    }

}
