<?php
require_once 'QuizzElement.php';
require_once 'Quizz.php';

abstract class Group extends QuizzElement
{
    protected $title;
    protected $elements;

    public function __construct(string $title = '', array $elements = array())
    {
        $this->title = $title;
        $this->elements = $elements;
    }

    public function getElements(): array
    {
        return $this->elements;
    }

    public function setElements(array $elements): Group
    {
        $this->elements = $elements;
        return $this;
    }

    public function addElement(QuizzElement $e): Group
    {
        $this->elements[] = $e;
        return $this;
    }

    public function removeElement(QuizzElement $e): Group
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

    public function removeElementAt(int $i): Group
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

}
