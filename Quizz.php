<?php
declare(strict_types=1);
require_once 'QuizzElement.php';

class Quizz{
  protected $title;
  protected $elements;


  public function __construct(string $title = '', array $elements=array()){
    $this->title = $title;
    $this->elements = $elements;
    $this->atribuerPos($this->elements);
    
  }

  public function atribuerPos($elements)
  { 
    $i=0;
    foreach ($elements as $element) {
      $element->setPos($i);
      if ( is_a($element , 'Group')){
        $element->atribuerPos($element->getElements());
      }

      $i++;
    }

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
    $this->atribuerPos($this->elements);
    return $this;
  }

  public function addElement(QuizzElement $e) : Quizz{
    $this->elements[] = $e;
    $this->atribuerPos($this->elements);    
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
    $this->atribuerPos($this->elements);
    return $this;
  }

  public function removeElementAt(int $i) : Quizz{
    unset($this->elements[$i]);
    $this->elements = array_values($this->elements);
    $this->atribuerPos($this->elements);
    return $this;
  }

  public function render(IQuizzVisitor $v){
    $v->renderQuizz($this);
  }
}