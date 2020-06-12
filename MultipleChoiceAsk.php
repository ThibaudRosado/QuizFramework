<?php

class MultipleChoiceAsk extends ChoiceAsk {

    public function render(IQuizzVisitor $v){
        $v->renderMultipleChoiceAsk($this);
      }
}