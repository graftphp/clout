<?php

namespace GraftPHP\Clout;

use GraftPHP\Framework\DB;
use GraftPHP\Framework\Model;

class Field extends Model
{
    static public $db_tablename = 'clout_field';
    static public $db_idcolumn = 'id';

    static public $db_columns = [
        ['section', 'int'],
        ['type', 'int'],
        ['name', 'varchar(255)'],
        ['order', 'int'],
    ];

    public function type()
    {
        return FieldType::where('id', '=', $this->type)->get()->first();
    }

}
