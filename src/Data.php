<?php

namespace GraftPHP\Clout;

use GraftPHP\Framework\Model;

class Data extends Model
{
    public static $db_tablename = 'clout_data';
    public static $db_idcolumn = 'id';

    public static $db_columns = [
        ['record', 'int'],
        ['field', 'int'],
        ['string_data', 'varchar(255)'],
        ['number_data', 'int'],
        ['date_data', 'date'],
        ['text_data', 'text'],
        ['boolean_data', 'boolean'],
    ];
}
