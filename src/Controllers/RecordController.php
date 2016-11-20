<?php

namespace GraftPHP\Clout\Controllers;

use GraftPHP\Clout\Data;
use GraftPHP\Clout\Record;
use GraftPHP\Clout\Section;
use GraftPHP\Clout\Settings;
use GraftPHP\Clout\Output;
use GraftPHP\Framework\Functions;
use GraftPHP\Framework\View;

class RecordController extends CloutController
{

    public function create($section)
    {
        $this->data['section'] = Section::find($section, 'slug');

        View::Render('record.create', $this->data, Settings::viewFolder());
    }

    public function delete($section, $record_id)
    {
        if (!($record = Record::find($record_id))) {
           dd('record not found');
        }

        $data = Data::where('record', '=', $record_id)->get();
        foreach($data as $item) {
            $item->delete();
        }

        $record->delete();

        Functions::redirect(Settings::cloutURL() . '/sections/' . $section);
    }

    public function edit($section, $record_id)
    {
        $this->data['section'] = Section::find($section, 'slug');

        $this->data['record'] = Output::section($section)->find($record_id);

        View::Render('record.edit', $this->data, Settings::viewFolder());
    }

    public function update($section, $record_id)
    {
        $section = Section::find($section, 'slug');

        if (!($record = Record::find($record_id))) {
            dd('record not found');
        }

        $data = Data::where('record', '=', $record_id)->get();
        foreach($data as $item) {
            $item->delete();
        }

        $this->store_data($section, $record);

        Functions::redirect(Settings::cloutURL() . '/sections/' . $section->slug);
    }

    public function show($section)
    {
        $this->data['section'] = Section::find($section, 'slug');

        $this->data['records'] = Output::section($section)->all();

        View::Render('record.list', $this->data, Settings::viewFolder());
    }

    public function store($section)
    {
        $section = Section::find($section, 'slug');

        $record = new Record();
        $record->section = $section->id;
        $record->save();

        $this->store_data($section, $record);

        Functions::redirect(Settings::cloutURL() . '/sections/' . $section->slug);
    }

    private function store_data($section, $record)
    {
        foreach ( $section->fields() as $field ) {
            if ( isset($_POST['f' . $field->id]) ) {
                $data = new Data();
                $data->record = $record->id;
                $data->field = $field->id;
                $data->{$field->type()->datafield} = $_POST['f' . $field->id];
                $data->save();
            }
        }
    }

}
