<?php

declare(strict_types=1);
require_once 'Quizz.php';

class HTMLQuizzVisitor implements IQuizzVisitor
{
  protected $actionUrl;

  public function __construct($au = '')
  {
    $this->actionUrl = $au;
  }

  public function renderQuizz(Quizz $q)
  {
    echo sprintf('<form action="%s" method="post">', $this->actionUrl), PHP_EOL,
      sprintf('<h1>%s</h1>', $q->getTitle()),
      PHP_EOL;

    foreach ($q->getElements() as $k => $elt)
      $elt->render($this);

    echo '</form>';
  }

  public function renderDescriptiveText(DescriptiveText $t)
  {
    echo '<p>', $t->getMessage(), '</p>', PHP_EOL, PHP_EOL;
  }

  public function renderLittleOpenAsk(LittleOpenAsk $l)
  {
    echo '<label for="">' . $l->getLabel() . '</label>',
      '<input type="text" name="res',$l->getPos(),'" id="">',
      PHP_EOL,
      PHP_EOL;
  }

  public function renderBigOpenAsk(BigOpenAsk $g)
  {
    echo '<label for="">' . $g->getLabel() . '</label>',
      '<input type="textarea" name="res',$g->getPos(),'" id="">',
      PHP_EOL,
      PHP_EOL;
  }

  public function renderMultipleChoiceAsk(MultipleChoiceAsk $m)
  {
    //TODO Rendre le name des réponses Unique pour le traitement des réponses
    $answers = $m->getQuizzAnswers();
    echo '<div><p>', $m->getLabel(), ' (plusieurs choix possibles) : </p>', PHP_EOL;
    $this->factChoiceAsk($answers, "checkbox", $m->getPos());
    // foreach ($answers as $answer) {
    //   if (is_a($answer, 'TextQuizzAnswer')) {

    //     echo '<div>',
    //       '<input type="checkbox" name="res" value="',
    //       $answer->getRes(),
    //       '">',
    //       '<label for="scales">',
    //       $answer->getRes(),
    //       '</label>',
    //       '</div>',
    //       PHP_EOL;
    //   } else {
    //     echo '<div>',
    //       '<input type="checkbox" name="res" value="',
    //       $answer->getRes(),
    //       '">',
    //       '<label for="scales">',
    //       '<img src="',
    //       $answer->getLien(),
    //       '"',
    //       'alt="',
    //       $answer->getRes(),
    //       '">',
    //       '</label>',
    //       '</div>',
    //       PHP_EOL;
    //   }
    // }

    echo '</div>', PHP_EOL, PHP_EOL;
  }

  public function renderUniqueChoiceAsk(UniqueChoiceAsk $u)
  {
    //TODO Rendre le name des réponses Unique pour le traitement des réponses
    $answers = $u->getQuizzAnswers();

    echo '<div><p>', $u->getLabel(), ' (1 seul choix possible) : </p>', PHP_EOL;
    $this->factChoiceAsk($answers, $type = "radio", $u->getPos());
    // foreach ($answers as $answer) {
    //   if (is_a($answer, 'TextQuizzAnswer')) {

    //     echo '<div>',
    //       '<input type="radio" name="res" value="',
    //       $answer->getRes(),
    //       '">',
    //       '<label for="scales">',
    //       $answer->getRes(),
    //       '</label>',
    //       '</div>',
    //       PHP_EOL;
    //   } else {
    //     echo '<div>',
    //       '<input type="radio" name="res" value="',
    //       $answer->getRes(),
    //       '">',
    //       '<label for="scales">',
    //       '<img src="',
    //       $answer->getLien(),
    //       '"',
    //       'alt="',
    //       $answer->getRes(),
    //       '">',
    //       '</label>',
    //       '</div>',
    //       PHP_EOL;
    //   }
    // }
    echo '</div>', PHP_EOL, PHP_EOL;
  }

  private function factChoiceAsk($answers, $type, $pos)
  {

    foreach ($answers as $answer) {
      if (is_a($answer, 'TextQuizzAnswer')) {

        echo '<div>',
          '<input type="',
          $type,
          '" name="res',$pos,'" value="',
          $answer->getRes(),
          '">',
          '<label for="scales">',
          $answer->getRes(),
          '</label>',
          '</div>',
          PHP_EOL;
      } else {
        echo '<div>',
          '<input type="',
          $type,
          '" name="res',$pos,'" value="',
          $answer->getRes(),
          '">',
          '<label for="scales">',
          '<img src="',
          $answer->getLien(),
          '"',
          'alt="',
          $answer->getRes(),
          '">',
          '</label>',
          '</div>',
          PHP_EOL;
      }
    }
  }

  public function renderHorizontalGroup(HorizontalGroup $h)
  {
    $width = (int)  (100 / sizeof($h->getElements()));
    echo sprintf('<h1>%s</h1>', $h->getTitle()), PHP_EOL;
    echo '<div style="display: flex; flex-direction: row;justify-content: space-around;">', PHP_EOL;

    foreach ($h->getElements() as $element) {
      echo '<div width="', $width, '%">', PHP_EOL;
      $element->render($this);
      echo '</div>', PHP_EOL;
    }
    echo '</div>', PHP_EOL, PHP_EOL;
  }

  public function renderVerticalGroup(VerticalGroup $v)
  {
    echo sprintf('<h1>%s</h1>', $v->getTitle()), PHP_EOL;
    foreach ($v->getElements() as $element) {
      $element->render($this);
    }
  }
}
