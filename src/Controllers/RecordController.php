<?php

namespace GraftPHP\Clout\Controllers;

class RecordController extends CloutController
{

    public function create($section)
    {
        echo "Create $section";
    }

    public function show($section) 
    {
        echo $section;
    }

}
