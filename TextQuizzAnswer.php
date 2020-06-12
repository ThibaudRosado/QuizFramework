<?php
declare(strict_types=1);

class TextQuizzAnswer extends QuizzAnswer{

    public function render(IQuizzVisitor $v){
        $v->renderTextQuizzAnswer($this);
    }
}