<?php

namespace App\TCG\Voyager\FormFields\After;

use App\TCG\Voyager\Src\FormFields\After\HandlerInterface;
use App\TCG\Voyager\Src\Traits\Renderable;

abstract class AbstractHandler implements HandlerInterface
{
    use Renderable;

    public function visible($row, $dataType, $dataTypeContent, $options)
    {
        return true;
    }

    public function handle($row, $dataType, $dataTypeContent)
    {
        $content = $this->createContent(
            $row,
            $dataType,
            $dataTypeContent,
            json_decode($row->details)
        );

        return $this->render($content);
    }

    public function getCodename()
    {
        return $this->codename;
    }
}
