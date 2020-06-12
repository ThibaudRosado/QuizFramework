<?php
declare(strict_types=1);

class UniqueChoiceAsk extends ChoiceAsk{

    public function render(IQuizzVisitor $v){
        $v->renderUniqueChoiceAsk($this);
    }
}
