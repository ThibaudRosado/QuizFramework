<?php

require_once 'Group.php';

class VerticalGroup extends Group
{
    public function getElements(): array
    {
        return $this->elements;
    }

    public function setElements(array $elements): VerticalGroup
    {
        $this->elements = $elements;
        return $this;
    }

    public function addElement(QuizzElement $e): VerticalGroup
    {
        $this->elements[] = $e;
        return $this;
    }

    public function removeElement(QuizzElement $e): VerticalGroup
    {
        // TODO
        return $this;
    }

    public function removeElementAt(int $i): VerticalGroup
    {
        unset($this->elements[$i]);
        $this->elements = array_values($this->elements);
        return $this;
    }

    public function getTitle(){
        return $this->title;
    }
    public function setTitle(string $title){
        $this->title=$title;
    }

    public function render(IQuizzVisitor $v){
        $v->renderVerticalGroup($this);
    }
}
