<?php

namespace GraftPHP\Clout\Controllers;

use GraftPHP\Clout\Data;
use GraftPHP\Clout\Settings;

class UploadController extends CloutController
{
    public function upload($record_id, $field_id)
    {
        $path = Settings::storagePath() . $record_id . DIRECTORY_SEPARATOR . $field_id . DIRECTORY_SEPARATOR;

        if (!file_exists($path)) {
            mkdir($path, 0700, true);
        }

        if (move_uploaded_file($_FILES['files']['tmp_name'][0], $path . $_FILES['files']['name'][0])) {
            $data = Data::where('record', '=', $record_id)
                ->where('field', '=', $field_id)->first();
            dd($data);
            return 'ok';
        }

    }
}
