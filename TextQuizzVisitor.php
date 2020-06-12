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
         str_repeat('=', $this->width), PHP_EOL;

    foreach($q->getElements() as $k => $elt)
      $elt->render($this);
    echo PHP_EOL;
  }

  public function renderDescriptiveText(DescriptiveText $t){
    echo $t->getMessage();
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
     '__________________________________________________',PHP_EOL,
     '__________________________________________________',PHP_EOL;
  }

  public function renderBigOpenAsk(BigOpenAsk $b){
    echo $b->getLabel(),PHP_EOL,
     '__________________________________________________',PHP_EOL,
     '__________________________________________________',PHP_EOL,
     '__________________________________________________',PHP_EOL,
     '__________________________________________________',PHP_EOL;
  }
  public function renderUniqueChoiceAsk(UniqueChoiceAsk $u){
    echo $u->getLabel(),PHP_EOL,
     '__________________________________________________',PHP_EOL,
     '__________________________________________________',PHP_EOL;
  }

  public function renderTextQuizzAnswer(\TextQuizzAnswer $s)
  {
    echo 'réponse';
    
  
  }

  public function renderMultipleChoiceAsk(MultipleChoiceAsk $m){
    echo $m->getLabel(),PHP_EOL,
     '__________________________________________________',PHP_EOL,
     '__________________________________________________',PHP_EOL;
  }
  
  public function renderPictureQuizzAnswer(\PictureQuizzAnswer $sp)
  {
    echo 'image';
  }
}