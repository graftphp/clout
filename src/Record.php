<?php

namespace GraftPHP\Clout;

use GraftPHP\Framework\Model;
use GraftPHP\Clout\Data;
use GraftPHP\Clout\Field;
use GraftPHP\Clout\Section;

class Record extends Model
{
    public static $db_tablename = 'clout_record';
    public static $db_idcolumn = 'id';

    public static $db_columns = [
        ['section', 'int'],
        ['slug', 'varchar(255)'],
    ];

    public function section()
    {
        return Section::where('id', '=', $this->section)->get()->first();
    }
}
