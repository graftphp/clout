<?php

namespace GraftPHP\Clout\Controllers;

use GraftPHP\Clout\Field;
use GraftPHP\Clout\FieldType;
use GraftPHP\Clout\Section;
use GraftPHP\Clout\Settings;
use GraftPHP\Framework\Functions;
use GraftPHP\Framework\View;

class SectionController extends CloutController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function create()
    {
        View::Render('settings.sections.create', $this->data, Settings::viewFolder());
    }

    public function delete()
    {
        $section = Section::find($_SERVER['QUERY_STRING']);
        foreach($section->fields() as $field) {
            $field->delete();
        }
        $section->delete();

        Functions::redirect(Settings::cloutURL() . '/settings/sections');
    }

    public function index()
    {
        View::Render('settings.sections.list', $this->data, Settings::viewFolder());
    }

    public function store()
    {
        if (Section::find($_POST['name'], 'name')) {
            dd('Section already exists: ' . htmlentities($_POST['name']));
        }

        $section = new Section();
        $section->name = $_POST['name'];
        $section->slug = Functions::URLSafe($_POST['name']);
        $section->save();

        Functions::redirect(Settings::cloutURL() . '/settings/sections/' . $section->slug);
    }

    public function show($section_id)
    {
        //show single
        $this->data['section'] = Section::find($section_id, 'id');

        $ft = new FieldType();
        $this->data['fieldtypes'] = $ft->all();

        View::Render('settings.sections.edit', $this->data, Settings::viewFolder());
    }

    public function update($section_id)
    {
        $section = Section::find($section_id, 'id');
        $section->name = $_POST['name'];
        $section->slug = Functions::URLSafe($_POST['name']);
        $section->save();

        // delete fields not in the POST data
        foreach($section->fields() as $field) {
            $del = true;
            if (isset($_POST['field-id'])) {
                for($f = 1; $f < count($_POST['field-id']); $f++) {
                    if (intval($field->id) == intval($_POST['field-id'][$f])) {
                        $del = false;
                    }
                }
            }
            if ($del) {
                $field->delete();
            }
        }

        // add/update fields in the POST data
        if (count($_POST['field-name']) > 1) {
            for($f = 0; $f < count($_POST['field-id']); $f++) {
                $o = new Field();
                $o->id = ($_POST['field-id'][$f] != '' ? $_POST['field-id'][$f] : null);
                $o->section = $section->id;
                $o->name = $_POST['field-name'][$f];
                $o->type = $_POST['field-type'][$f];
                $o->save();
            }
        }

        Functions::redirect(Settings::cloutURL() . '/settings/sections/' . $section->id);
    }

}
