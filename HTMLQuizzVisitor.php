<?php
declare(strict_types=1);

class HTMLQuizzVisitor implements IQuizzVisitor{
  protected $actionUrl;

  public function __construct($au=''){
    $this->actionUrl = $au;
  }

  public function renderQuizz(Quizz $q){
    echo sprintf('<form action="%s" method="post">', $this->actionUrl),
      sprintf('<h1>%s</h1>', $q->getTitle());

    foreach($q->getElements() as $k => $elt)
      $elt->render($this);

    echo '</form>';
  }

  public function renderDescriptiveText(DescriptiveText $t){
    echo '<p>', $t->getMessage(), '</p>';
  }

}