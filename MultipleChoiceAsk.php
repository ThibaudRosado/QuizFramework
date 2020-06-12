<?php
declare(strict_types=1);

class MultipleChoiceAsk extends ChoiceAsk{

    public function render(IQuizzVisitor $v){
        $v->renderMultipleChoiceAsk($this);
    }
}
