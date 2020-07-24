<?php

namespace GraftPHP\Clout;

use GraftPHP\Framework\Model;
use GraftPHP\Clout\Data;
use GraftPHP\Clout\Field;
use GraftPHP\Clout\Section;

class Site extends Model
{
    public static $db_tablename = 'clout_site';
    public static $db_idcolumn = 'id';

    public static $db_columns = [
        ['section', 'int'],
        ['label', 'varchar(255)'],
    ];
}
