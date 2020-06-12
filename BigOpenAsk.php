<?php
declare(strict_types=1);

class BigOpenAsk extends OpenAsk{

    public function __construct( $label='', $point=1 )
    {
        parent::__construct($label,$point);


    }


    public function render(IQuizzVisitor $v){
        $v->renderBigOpenAsk($this);
    }


}