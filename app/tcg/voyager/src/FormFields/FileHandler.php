<?php

namespace App\TCG\Voyager\Src\FormFields;

class FileHandler extends AbstractHandler
{
    protected $codename = 'file';

    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        return view('formfields.file', [
            'row'             => $row,
            'options'         => $options,
            'dataType'        => $dataType,
            'dataTypeContent' => $dataTypeContent,
        ]);
    }
}
