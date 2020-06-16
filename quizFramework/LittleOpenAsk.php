<?php

declare(strict_types=1);

class LittleOpenAsk extends OpenAsk
{
    public function render(IQuizzVisitor $v){
        $v->renderLittleOpenAsk($this);
    }

}
