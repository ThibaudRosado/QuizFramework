<?php
declare(strict_types=1);
require_once 'QuizzElement.php';

class Quizz{
  protected $title;
  protected $elements;

  public function __construct(string $title = '', array $elements=array()){
    $this->title = $title;
    $this->elements = $elements;
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
    return $this;
  }

  public function removeElement(QuizzElement $e) : Quizz{
    $i=0;
    foreach ($this->elements as $element) {
      
      if ( $element === $e){
        array_splice($this->elements,$i,1);
      }
      $i ++;
    }
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