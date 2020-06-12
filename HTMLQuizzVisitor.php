<?php
declare(strict_types=1);
require_once 'Quizz.php';

class HTMLQuizzVisitor implements IQuizzVisitor{
  protected $actionUrl;

  public function __construct($au=''){
    $this->actionUrl = $au;
  }

  public function renderQuizz(Quizz $q){
    echo sprintf('<form action="%s" method="post">', $this->actionUrl),PHP_EOL,
      sprintf('<h1>%s</h1>', $q->getTitle()),PHP_EOL;

    foreach($q->getElements() as $k => $elt)
      $elt->render($this);

    echo '</form>';
  }

  public function renderDescriptiveText(DescriptiveText $t){
    echo '<p>', $t->getMessage(), '</p>',PHP_EOL,PHP_EOL;
  }

  public function renderLittleOpenAsk(LittleOpenAsk $l){
    echo '<label for="">'.$l->getLabel().'</label>',
    '<input type="text" name="" id="">',PHP_EOL,PHP_EOL;
  }

  public function renderBigOpenAsk(BigOpenAsk $g){
    echo '<label for="">'.$g->getLabel().'</label>',
    '<input type="textarea" name="" id="">',PHP_EOL,PHP_EOL;
  }

  public function renderMultipleChoiceAsk(MultipleChoiceAsk $m){

    $answers = $m->getQuizzAnswers();
    echo '<div><p>',$m->getLabel(),' (plusieurs choix possibles) : </p>',PHP_EOL;
    foreach ($answers as $answer) {
      echo '<div>',
      '<input type="checkbox" name="res" value="',$answer->getRes(),'">',
      '<label for="scales">',$answer->getRes(),'</label>',
      '</div>',PHP_EOL;
    }
    echo '</div>',PHP_EOL,PHP_EOL;
    
  }

  public function renderUniqueChoiceAsk(UniqueChoiceAsk $u){
    //TODO
    $answers = $u->getQuizzAnswers();

    echo '<div><p>',$u->getLabel(),' (1 seul choix possible) : </p>',PHP_EOL;
    foreach ($answers as $answer) {
      echo '<div>',
      '<input type="radio" name="res" value="',$answer->getRes(),'" >',
      '<label for="huey">',$answer->getRes(),'</label>',
      '</div>',PHP_EOL;
    }
    echo '</div>',PHP_EOL,PHP_EOL;
  }


}