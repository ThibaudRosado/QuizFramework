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

    abstract public function getElements(): array;
    abstract public function setElements(array $elements);
    abstract public function addElement(QuizzElement $e);
    abstract public function removeElement(QuizzElement $e);
    abstract public function removeElementAt(int $i);
    abstract public function getTitle();
    abstract public function setTitle(string $title);

}
