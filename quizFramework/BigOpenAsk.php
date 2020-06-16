<?php
declare(strict_types=1);

class BigOpenAsk extends OpenAsk{

    public function render(IQuizzVisitor $v){
        $v->renderBigOpenAsk($this);
    }


}