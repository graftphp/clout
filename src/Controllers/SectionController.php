<?php

namespace GraftPHP\Clout\Controllers;

use GraftPHP\Clout\Field;
use GraftPHP\Clout\FieldType;
use GraftPHP\Clout\Section;
use GraftPHP\Framework\Functions;
use GraftPHP\Framework\View;
use GraftPHP\Clout\Settings;

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
        foreach($section->sectionFields() as $field) {
            $field->delete();
        }
        $section->delete();

        Functions::redirect('/clout/settings/sections');
    }

    public function index()
    {
        View::Render('settings.sections.list', $this->data,Settings::viewFolder());
    }

    public function store()
    {
        $section = new Section();
        $section->name = $_POST['name'];
        $section->slug = Functions::URLSafe($_POST['name']);
        $section->save();

        Functions::redirect('/clout/settings/sections/' . $section->slug);
    }

    public function show($slug = null)
    {
        //show single
        $this->data['section'] = Section::find($slug, 'slug');

        $ft = new FieldType();
        $this->data['fieldtypes'] = $ft->all();

        View::Render('settings.sections.edit', $this->data, Settings::viewFolder());
    }

    public function update()
    {
        $section = Section::find($_SERVER['QUERY_STRING'], 'id');
        $section->name = $_POST['name'];
        $section->slug = Functions::URLSafe($_POST['name']);
        $section->save();

        // delete fields not in the POST data
        foreach($section->sectionFields() as $field) {
            $del = true;
            for($f = 1; $f < count($_POST['field-id']); $f++) {
                if (intval($field->id) == intval($_POST['field-id'][$f])) {
                    $del = false;
                }
            }
            if ($del) {
                $field->delete();
            }
        }

        // add/update fields in the POST data
        if (count($_POST['field-name']) > 1) {
            for($f = 1; $f < count($_POST['field-id']); $f++) {
                $o = new Field();
                $o->id = ($_POST['field-id'][$f] != '' ? $_POST['field-id'][$f] : null);
                $o->section = $section->id;
                $o->name = $_POST['field-name'][$f];
                $o->type = $_POST['field-type'][$f];
                $o->save();
            }
        }

        Functions::redirect('/clout/settings/sections/' . $section->slug);
    }

}
