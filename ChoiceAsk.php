<?php

declare(strict_types=1);
require_once 'UniqueChoiceAsk.php';
require_once 'MultipleChoiceAsk.php';
require_once 'QuizzAnswer.php';

abstract class ChoiceAsk extends QuizzElement
{
    //todo

    protected $label;
    protected $s;

    public function __construct($label = '', $point=1, array $s=array())
    {
        parent::__construct($point);
        $this->label= $label;  
        $this->s = $s;      
    }

    public function getLabel(){
        return $this->label;
    }

    public function setLabel($label){
        $this->label = $label;
    }

    public function getS(){
        return $this->s;
    }

    public function setS($s){
        $this->s = $s;
    }

    public function addAnswer(QuizzAnswer $s) : ChoiceAsk{
        $this->s[] = $s;
        $this->id= $this->id +1;
        //TODO Lier les ID au différant élement dans le tableau.
        return $this;
      }
    
      public function removeAnswer(QuizzAnswer $e) : ChoiceAsk{
        // TODO
        return $this;
      }
    
      public function removeAnswerAt(int $i) : ChoiceAsk{
        unset($this->s[$i]);
        $this->s = array_values($this->s);
        return $this;
      }

}
