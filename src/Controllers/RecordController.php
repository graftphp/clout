<?php

namespace GraftPHP\Clout\Controllers;

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

    }

}
