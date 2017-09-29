<?php

namespace GraftPHP\Clout;

use GraftPHP\Clout\Section;
use GraftPHP\Framework\Model;

class Relationship extends Model
{
    public static $db_tablename = 'clout_relationship';
    public static $db_idcolumn = 'id';

    public static $db_columns = [
        ['name', 'varchar(255)'],
        ['parent_section', 'int'],
        ['child_section', 'int'],
        ['multiple', 'bool'],
    ];

    public function childSection()
    {
        return Section::find($this->child_section);
    }
}
