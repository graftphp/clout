<?php

function renderGraftField($field_id, $name, $value = '')
{
    $out = GraftPHP\Clout\FieldType::$fieldtype_templates[$field_id];
    $out = str_replace('{name}', $name, $out);
    $out = str_replace('{value}', $value, $out);
    return $out;
}
