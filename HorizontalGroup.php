<?php

require_once 'Group.php';

class HorizontalGroup extends Group {

    public function render(IQuizzVisitor $v){
        $v->renderHorizontalGroup($this);
    }

}