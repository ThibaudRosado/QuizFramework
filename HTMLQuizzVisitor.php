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
      sprintf('<h1>%s</h1>', $q->getTitle()),PHP_EOL;

    foreach($q->getElements() as $k => $elt)
      $elt->render($this);

    echo '</form>';
  }

  public function renderDescriptiveText(DescriptiveText $t){
    echo '<p>', $t->getMessage(), '</p>',PHP_EOL;
  }

  public function renderLittleOpenAsk(LittleOpenAsk $l){
    echo '<label for="">'.$l->getLabel().'</label>',
    '<input type="text" name="" id="">',PHP_EOL;
  }

  public function renderBigOpenAsk(BigOpenAsk $g){
    echo '<label for="">'.$g->getLabel().'</label>',
    '<input type="textarea" name="" id="">',PHP_EOL;
  }

  public function renderMultipleChoiceAsk(MultipleChoiceAsk $m){
    //TODO
    echo "multiple",PHP_EOL;
  }

  public function renderUniqueChoiceAsk(UniqueChoiceAsk $u){
    //TODO
    echo "unique",PHP_EOL;
  }


}