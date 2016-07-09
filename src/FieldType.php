<?php

namespace GraftPHP\Clout;

use GraftPHP\Framework\Model;

class FieldType extends Model
{

    static public $db_tablename = 'clout_fieldtype';
    static public $db_idcolumn = 'id';

    static public $db_columns = [
        ['name', 'varchar(255)'],
        ['description', 'text'],
        ['datatype', 'varchar(255)'],
    ];

    static public $db_defaultdata = [
        ['String', 'Text, up to 255 characters', 'varchar(255)'],
        ['Number', 'Whole number, -2147483648 to 2147483647 ', 'int'],
    ];

}
