<?php

namespace GraftPHP\Clout;

use GraftPHP\Framework\Model;

class Record extends Model
{

    public static $db_tablename = 'clout_record';
    public static $db_idcolumn = 'id';

    public static $db_columns = [
        ['section', 'int'],
    ];

}
