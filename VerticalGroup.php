<?php

require_once 'Group.php';

class VerticalGroup extends Group
{

    public function render(IQuizzVisitor $v){
        $v->renderVerticalGroup($this);
    }
}
