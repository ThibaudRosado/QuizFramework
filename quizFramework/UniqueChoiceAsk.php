<?php

class UniqueChoiceAsk extends ChoiceAsk {

    public function render(IQuizzVisitor $v){
        $v->renderUniqueChoiceAsk($this);
      }

}