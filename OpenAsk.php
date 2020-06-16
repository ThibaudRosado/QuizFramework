<?php

declare(strict_types=1);
require_once 'LittleOpenAsk.php';
require_once 'BigOpenAsk.php';

abstract class OpenAsk extends QuizzElement
{
    //TODO

    protected $label;

    public function __construct($label = '', $point = 1)
    {
        parent::__construct($point);
        $this->label = $label;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function setLabel($label)
    {
        $this->label = $label;
    }
}
