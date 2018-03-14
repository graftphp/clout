<?php

namespace GraftPHP\Clout\Controllers;

use GraftPHP\Clout\Data;
use GraftPHP\Clout\Settings;

class UploadController extends CloutController
{
    public function upload($record_id, $field_id)
    {
        $path = clout_settings('storage_path') . $record_id . DIRECTORY_SEPARATOR . $field_id . DIRECTORY_SEPARATOR;

        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        if (move_uploaded_file($_FILES['files']['tmp_name'][0], $path . $_FILES['files']['name'][0])) {
            $data = Data::where('record', '=', $record_id)
                ->where('field', '=', $field_id)->get()->first();
            if (!$data) {
                $data = new Data();
                $data->record = $record_id;
                $data->field = $field_id;
                $content = [[
                    'order' => 1,
                    'file' => $_FILES['files']['name'][0],
                    'caption' => $_FILES['files']['name'][0],
                ]];
            } else {
                $content = json_decode($data->text_data);
                $content[] = [
                    'order' => count($content)+1,
                    'file' => $_FILES['files']['name'][0],
                    'caption' => $_FILES['files']['name'][0],
                ];
            }
            $data->text_data = json_encode($content);
            $data->save();

            echo "ok";
        }
    }
}
