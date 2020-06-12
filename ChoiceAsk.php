<?php

declare(strict_types=1);
require_once 'UniqueChoiceAsk.php';
require_once 'MultipleChoiceAsk.php';

abstract class ChoiceAsk extends QuizzElement
{
    //todo

    protected $label;

    public function __construct($label = '', $point=1)
    {
        parent::__construct($point);
        $this->label= $label;        
    }

    public function getLabel(){
        return $this->label;
    }

    public function setLabel($label){
        $this->label = $label;
    }

}
