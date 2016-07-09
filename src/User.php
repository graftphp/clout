<?php

namespace GraftPHP\Clout;

use GraftPHP\Framework\DB;
use GraftPHP\Framework\Model;

class User extends Model
{

    static public $db_tablename = 'clout_user';
    static public $db_idcolumn = 'id';

    static public $db_columns = [
        ["username", "varchar(255)"],
        ["password", "varchar(60)"],
        ["active", "tinyint"],
    ];

    public function fetch($username)
    {
        $d = new DB();
        $r = $d->table(self::$db_tablename)
               ->where('username', '=', $username)
               ->first();

        if (is_array($r)) {
            return $r;
        } else {
            return false;
        }
    }

}
