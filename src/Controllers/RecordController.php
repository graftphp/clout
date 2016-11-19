<?php

namespace GraftPHP\Clout\Controllers;

use GraftPHP\Clout\Data;
use GraftPHP\Clout\Record;
use GraftPHP\Clout\Section;
use GraftPHP\Clout\Settings;
use GraftPHP\Framework\Functions;
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
        $this->data['section'] = Section::find($section, 'slug');

        $this->data['records'] = Record::where('section', '=', $this->data['section']->id)->get();

        View::Render('record.list', $this->data, Settings::viewFolder());
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
                $data->record = $record->id;
                $data->field = $field->id;
                $data->{$field->type()->datafield} = $_POST['f' . $field->id];
                $data->save();
            }
        }

        Functions::redirect('/clout/sections/' . $section->slug);
    }

}
