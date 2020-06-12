<?php
declare(strict_types=1);
require_once 'QuizzElement.php';

class Quizz{
  protected $title;
  protected $elements;
  protected $id;

  public function __construct(string $title = '', array $elements=array()){
    $this->title = $title;
    $this->elements = $elements;
    $this->id = 0;
  }

  public function getTitle() : string{
    return $this->title;
  }

  public function setTitle(string $title) : Quizz{
    $this->title = $title;
    return $this;
  }

  public function getElements() : array{
    return $this->elements;
  }

  public function setElements(array $elements) : Quizz{
    $this->elements = $elements;
    return $this;
  }

  public function addElement(QuizzElement $e) : Quizz{
    $this->elements[] = $e;
    $this->id= $this->id +1;
    //TODO Lier les ID au différant élement dans le tableau.
    return $this;
  }

  public function removeElement(QuizzElement $e) : Quizz{
    // TODO
    return $this;
  }

  public function removeElementAt(int $i) : Quizz{
    unset($this->elements[$i]);
    $this->elements = array_values($this->elements);
    return $this;
  }

  public function render(IQuizzVisitor $v){
    $v->renderQuizz($this);
  }
}