<?php

namespace App\TCG\Voyager\Src\FormFields;

interface HandlerInterface
{
    public function handle($row, $dataType, $dataTypeContent);

    public function createContent($row, $dataType, $dataTypeContent, $options);

    public function supports($driver);

    public function getCodename();

    public function getName();
}
