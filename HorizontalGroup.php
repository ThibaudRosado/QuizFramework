<?php

require_once 'Group.php';

class HorizontalGroup extends Group {


    public function getElements(): array
    {
        return $this->elements;
    }

    public function setElements(array $elements): HorizontalGroup
    {
        $this->elements = $elements;
        return $this;
    }

    public function addElement(QuizzElement $e): HorizontalGroup
    {
        $this->elements[] = $e;
        return $this;
    }

    public function removeElement(QuizzElement $e): HorizontalGroup
    {
        $i=0;
        foreach ($this->elements as $element) {
            if ( $element === $e){
            array_splice($this->elements,$i,1);
            }
            $i ++;
        }
        return $this;
    }

    public function removeElementAt(int $i): HorizontalGroup
    {
        unset($this->elements[$i]);
        $this->elements = array_values($this->elements);
        return $this;
    }

    public function render(IQuizzVisitor $v){
        $v->renderHorizontalGroup($this);
    }

    public function getTitle(){
        return $this->title;
    }
    public function setTitle(string $title){
        $this->title=$title;
    }
}