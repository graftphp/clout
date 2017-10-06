<?php

namespace GraftPHP\Clout;

use GraftPHP\Clout\Section;
use GraftPHP\Framework\Model;

class Relation extends Model
{
    public static $db_tablename = 'clout_relation';
    public static $db_idcolumn = 'id';

    public static $db_columns = [
        ['relationship', 'int'],
        ['parent', 'int'],
        ['child', 'int'],
    ];
}
