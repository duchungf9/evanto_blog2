<?php

namespace App\TCG\Voyager\Src\FormFields;

class PasswordHandler extends AbstractHandler
{
    protected $codename = 'password';

    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        return view('formfields.password', [
            'row'             => $row,
            'options'         => $options,
            'dataType'        => $dataType,
            'dataTypeContent' => $dataTypeContent,
        ]);
    }
}
