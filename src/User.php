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

    static public $db_defaultdata = [
        // iloveclout
        ['1', 'webmaster', '$2y$10$hUHmNbTy2iccHE65W.swyuJd061zT2Zxsy09d7IT3/pGIe0hR6xpK', '1'],
    ];

}
