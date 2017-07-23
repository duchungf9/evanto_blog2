<?php

namespace App\TCG\Voyager\Src\FormFields;

class SelectDropdownHandler extends AbstractHandler
{
    protected $codename = 'select_dropdown';

    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        return view('formfields.select_dropdown', [
            'row'             => $row,
            'options'         => $options,
            'dataType'        => $dataType,
            'dataTypeContent' => $dataTypeContent,
        ]);
    }
}
