<?php
declare(strict_types=1);
require_once 'Quizz.php';

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

  public function renderLittleOpenAsk(LittleOpenAsk $l){
    echo 'totolapraline';
  }

  public function renderBigOpenAsk(BigOpenAsk $b){
    echo 'totolapraline';
  }

  public function renderUniqueChoiceAsk(UniqueChoiceAsk $u)
  {
    echo 'unique';
  }

  public function renderMultipleChoiceAsk(MultipleChoiceAsk $m)
  {
    
    echo 'multiple';
  }

  public function renderTextQuizzAnswer(\TextQuizzAnswer $s)
  {
    echo 'text';
  
  }
  public function renderPictureQuizzAnswer(\PictureQuizzAnswer $sp)
  {
    echo 'image';
  }



}