<?php
declare(strict_types=1);

class PictureQuizzAnswer extends QuizzAnswer{

    public function render(IQuizzVisitor $v){
        $v->renderPictureQuizzAnswer($this);
    }
}