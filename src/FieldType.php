<?php

namespace GraftPHP\Clout;

use GraftPHP\Framework\Model;

class FieldType extends Model
{

    static public $db_tablename = 'clout_fieldtype';
    static public $db_idcolumn = 'id';

    static public $db_columns = [
        ['name', 'varchar(255)'],
        ['datatype', 'varchar(255)'],
        ['datafield', 'varchar(255)'],
        ['description', 'text'],
    ];

    static public $db_defaultdata = [
        ['1', 'String', 'varchar(255)', 'string_data', 'Text, up to 255 characters'],
        ['2', 'Number', 'int', 'number_data', 'Whole number, -2147483648 to 2147483647'],
        ['3', 'Date', 'date', 'date_data', 'Date'],
    ];

}
