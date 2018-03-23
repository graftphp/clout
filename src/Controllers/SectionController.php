<?php

namespace GraftPHP\Clout\Controllers;

use GraftPHP\Clout\Field;
use GraftPHP\Clout\FieldType;
use GraftPHP\Clout\Relationship;
use GraftPHP\Clout\Section;
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
        View::Render('settings.sections.create', $this->data, clout_settings('view_folder'));
    }

    public function delete($section_id)
    {
        $section = Section::find($section_id);
        foreach ($section->fields() as $field) {
            $field->delete();
        }
        $section->delete();

        Functions::redirect(clout_settings('clout_url') . '/settings/sections');
    }

    public function index()
    {
        View::Render('settings.sections.list', $this->data, clout_settings('view_folder'));
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

        Functions::redirect(clout_settings('clout_url') . '/settings/sections/' . $section->id);
    }

    public function show($section_id)
    {
        //show single
        $this->data['section'] = Section::find($section_id, 'id');

        $this->data['sections'] = Section::all();

        $ft = new FieldType();
        $this->data['fieldtypes'] = $ft->all();

        View::Render('settings.sections.edit', $this->data, clout_settings('view_folder'));
    }

    public function update($section_id)
    {
        $section = Section::find($section_id, 'id');
        $section->name = $_POST['name'];
        $section->slug = Functions::URLSafe($_POST['name']);
        $section->save();

        // delete fields not in the POST data
        foreach ($section->fields() as $field) {
            $del = true;
            if (isset($_POST['field-id'])) {
                for ($f = 0; $f < count($_POST['field-id']); $f++) {
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
        if (isset($_POST['field-name'])) {
            for ($f = 0; $f < count($_POST['field-id']); $f++) {
                $field = new Field();
                $field->id = ($_POST['field-id'][$f] != '' ? $_POST['field-id'][$f] : null);
                $field->section = $section->id;
                $field->name = $_POST['field-name'][$f];
                $field->type = $_POST['field-type'][$f];
                $field->order = $_POST['field-order'][$f];
                $field->list = $_POST['field-list'][$f];
                $field->slug = $_POST['field-slug'][$f];
                $field->save();
            }
        }

        // delete relationships not in the POST data
        foreach ($section->relationships() as $relationship) {
            $del = true;
            if (isset($_POST['relationship-id'])) {
                for ($r = 0; $r < count($_POST['relationship-id']); $r++) {
                    if (intval($relationship->id) == intval($_POST['relationship-id'][$r])) {
                        $del = false;
                    }
                }
            }
            if (del) {
                $relationship->delete();
            }
        }

        // add/update relationships in the POST data
        if (isset($_POST['relationship-name'])) {
            for ($r = 0; $r < count($_POST['relationship-id']); $r++) {
                $relationship = new Relationship();
                $relationship->id = ($_POST['relationship-id'][$r] != '' ? $_POST['field_id'][$r] : null);
                $relationship->name = $_POST['relationship-name'][$r];
                $relationship->parent_section = $section->id;
                $relationship->child_section = $_POST['relationship-section'][$r];
                $relationship->multiple = $_POST['relationship-multiple'][$r];
                $relationship->save();
            }
        }
        Functions::redirect(clout_settings('clout_url') . '/settings/sections/' . $section->id);
    }
}
