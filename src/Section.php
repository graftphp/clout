<?php

namespace GraftPHP\Clout;

use GraftPHP\Clout\Field;
use GraftPHP\Clout\Record;
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

    public function checkSlug($slug)
    {
        $out = Record::where('section', '=', $this->id)
            ->where('slug', '=', $slug)
            ->get()->count();

        return $out == 0 ? true : false;
    }

    public function fields()
    {
        return Field::where('section', '=', $this->id)
            ->orderBy('order', 'asc')
            ->get();
    }

    public function listFields()
    {
        return Field::where('section', '=', $this->id)
            ->where('list', '=', '1')
            ->orderBy('order', 'asc')
            ->get();
    }

    public function slugField()
    {
        return Field::where('section', '=', $this->id)->get()->first();
    }
}
