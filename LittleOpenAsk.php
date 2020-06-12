<?php

declare(strict_types=1);

class LittleOpenAsk extends OpenAsk
{
    //todo

    public function __construct( $label='', $point=1 )
    {
        parent::__construct($label,$point);


    }

    

    public function render(IQuizzVisitor $v){
        $v->renderLittleOpenAsk($this);
    }
}
