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
        //[id, name, fieldtype, data field, description]
        ['1', 'Short Text', 'varchar(255)', 'string_data', 'Text, up to 255 characters'],
        ['4', 'Long Text (plain)', 'text', 'text_data', ''],
        ['5', 'Long Text (formatted)', 'text', 'text_data', ''],
        ['2', 'Whole Number', 'int', 'number_data', 'Whole number, -2147483648 to 2147483647'],
        ['3', 'Date', 'date', 'date_data', 'Date'],
        ['6', 'Yes/No', 'boolean', 'boolean_data', 'Boolean'],
    ];

    static private $fieldtype_templates = [
        1 => '
        <input type="text" name="{name}" value="{value}" class="uk-width-1-1">
        ',
        2 => '
        <input type="number" step="1" name="{name}" value="{value}">
        ',
        3 => '
        <input type="text" name="{name}" value="{value}" data-uk-datepicker="{format:\'YYYY-MM-DD\'}">
        ',
        4 => '
        <textarea name="{name}" class="uk-width-1-1">{value}</textarea>
        ',
        5 => '
        <textarea name="{name}" class="uk-width-1-1" data-uk-htmleditor>{value}</textarea>
        ',
        6 => '
        <select name="{name}">
            <option value="1" {selected=1}>Yes</option>
            <option value="0" {selected=0}>No</option>
        </select>
        ',
    ];

    public static function render($field_id, $name, $value = '')
    {
        $out = self::$fieldtype_templates[$field_id];
        $out = str_replace('{name}', $name, $out);
        $out = str_replace('{value}', $value, $out);

        $out = str_replace('{selected=' . $value . '}', 'selected', $out);
        $out = preg_replace("/\{selected=[\d]\}/", '', $out);

        return $out;
    }

}
