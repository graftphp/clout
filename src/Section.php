<?php

namespace GraftPHP\Clout;

use GraftPHP\Clout\Field;
use GraftPHP\Framework\DB;
use GraftPHP\Framework\Model;

class Section extends Model
{

    public static $db_tablename = 'clout_section';
    public static $db_idcolumn = 'id';

    public static $db_columns = [
        ['name', 'varchar(255)'],
        ['slug', 'varchar(255)'],
    ];

    public function Fields()
    {
        return Field::where('section', '=', $this->id)
            ->orderBy('order', 'asc')
            ->get();
    }

}
