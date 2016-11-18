<?php

namespace GraftPHP\Clout\Controllers;

use GraftPHP\Clout\Data;
use GraftPHP\Clout\Record;
use GraftPHP\Clout\Section;
use GraftPHP\Clout\Settings;
use GraftPHP\Framework\View;

class RecordController extends CloutController
{

    public function create($section)
    {
    	$this->data['section'] = Section::find($section, 'slug');

        View::Render('record.create', $this->data, Settings::viewFolder());
    }

    public function show($section)
    {
    }

    public function store($section)
    {
        $section = Section::find($section, 'slug');

        $record = new Record();
        $record->section = $section->id;
        $record->save();

        foreach ( $section->fields() as $field ) {
            if ( isset($_POST['f' . $field->id]) ) {
                $data = new Data();
                $data->field = $field->id;
                $data->{$field->type()->datafield} = $_POST['f' . $field->id];
                $data->save();
            }
        }
    }

}
