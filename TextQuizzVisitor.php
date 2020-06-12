<?php
declare(strict_types=1);
require_once 'Quizz.php';

class TextQuizzVisitor implements IQuizzVisitor{
  protected $width;

  public function __construct($w=80){
    $this->width = $w;
  }

  public function renderQuizz(Quizz $q){
    echo str_repeat('=', $this->width), PHP_EOL,
         $this->centeredText($q->getTitle()), PHP_EOL,
         str_repeat('=', $this->width), PHP_EOL,PHP_EOL;

    foreach($q->getElements() as $k => $elt)
      $elt->render($this);
    echo PHP_EOL;
  }

  public function renderDescriptiveText(DescriptiveText $t){
    echo $t->getMessage(),PHP_EOL,PHP_EOL;
  }

  protected function centeredText(string $text, int $width=null){
    if(is_null($width))
      $width = $this->width;
    $len = strlen($text);
    $left = (int)(($width - $len) / 2);
    return str_repeat(' ', $left) . $text . str_repeat(' ', $width-$left-$len);
  }

  public function renderLittleOpenAsk(LittleOpenAsk $l){
    echo $l->getLabel(),PHP_EOL,
     '____________________________________________________________',PHP_EOL,
     '____________________________________________________________',PHP_EOL,PHP_EOL;
  }

  public function renderBigOpenAsk(BigOpenAsk $b){
    echo $b->getLabel(),PHP_EOL,
     '____________________________________________________________',PHP_EOL,
     '____________________________________________________________',PHP_EOL,
     '____________________________________________________________',PHP_EOL,
     '____________________________________________________________',PHP_EOL,PHP_EOL;
  }

  public function renderMultipleChoiceAsk(MultipleChoiceAsk $m){
    //TODO
    $answers = $m->getQuizzAnswers();
    echo $m->getLabel(),' (plusieurs choix possibles) : ',PHP_EOL;
    foreach ($answers as $answer) {
      echo $answer->getRes() ,PHP_EOL;
    }
    echo PHP_EOL;
    
  }

  public function renderUniqueChoiceAsk(UniqueChoiceAsk $u){
    //TODO
    $answers = $u->getQuizzAnswers();
    echo $u->getLabel(),' (1 seul choix possible) : ',PHP_EOL;
    foreach ($answers as $answer) {
      echo $answer->getRes() ,PHP_EOL;
    }
  }
}