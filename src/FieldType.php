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
        ['7', 'File', 'varchar(255)', 'string_data', 'File Upload'],
        ['8', 'Image', 'varchar(255)', 'string_data', 'Image Upload'],
    ];

    static private $fieldtype_templates = [
        1 => '
        <input type="text" name="{name}" value="{value}" class="uk-input">
        ',
        2 => '
        <input type="number" step="1" name="{name}" value="{value}" class="uk-input">
        ',
        3 => '
        <input type="text" name="{name}" value="{value}" class="uk-input" data-uk-datepicker="{format:\'YYYY-MM-DD\'}">
        ',
        4 => '
        <textarea name="{name}" class="uk-textarea">{value}</textarea>
        ',
        5 => '
        <textarea name="{name}" class="wysiwyg" data-uk-htmleditor>{value}</textarea>
        ',
        6 => '
        <select name="{name}" class="uk-select">
            <option value="1" {selected=1}>Yes</option>
            <option value="0" {selected=0}>No</option>
        </select>
        ',
        7 => '
        <div class="upload-file uk-placeholder uk-text-center" id="upload-{field_id}">
            <span uk-icon="icon: cloud-upload"></span>
            <span class="uk-text-middle">Attach binaries by dropping them here or</span>
            <div uk-form-custom>
                <input type="file" multiple>
                <span class="uk-link">selecting one</span>
            </div>
        </div>
        <progress id="bar-{field_id}" class="uk-progress" value="0" max="100" hidden></progress>
        ',
        8 => '
        <div class="upload-image uk-placeholder uk-text-center" id="upload-{field_id}">
            <span uk-icon="icon: cloud-upload"></span>
            <span class="uk-text-middle">Attach binaries by dropping them here or</span>
            <div uk-form-custom>
                <input type="file" multiple>
                <span class="uk-link">selecting one</span>
            </div>
        </div>
        <progress id="bar-{field_id}" class="uk-progress" value="0" max="100" hidden></progress>
        ',
    ];

    public static function render($field_id, $name, $value = '')
    {
        $out = self::$fieldtype_templates[$field_id];
        $out = str_replace('{name}', $name, $out);
        $out = str_replace('{value}', $value, $out);
        $out = str_replace('{field_id}', $field_id, $out);

        $out = str_replace('{selected=' . $value . '}', 'selected', $out);
        $out = preg_replace("/\{selected=[\d]\}/", '', $out);

        return $out;
    }
}
