<?php

declare(strict_types=1);
require_once 'Quizz.php';

class TextQuizzVisitor implements IQuizzVisitor
{
  /**
   * Détermine la largeur du document en nombre de caractère
   *
   * @var int
   */
  protected $width;

  /**
   * Construit le TextQuizzVisitor
   *
   * @param integer $w
   */
  public function __construct($w = 80)
  {
    $this->width = $w;
  }

  /**
   * Gère l'affichage Text du Quizz
   *
   * @param Quizz $q
   * @return void
   */
  public function renderQuizz(Quizz $q)
  {
    echo str_repeat('=', $this->width), PHP_EOL,
      $this->centeredText($q->getTitle()),
      PHP_EOL,
      str_repeat('=', $this->width),
      PHP_EOL,
      PHP_EOL;

    foreach ($q->getElements() as $k => $elt)
      $elt->render($this);
    echo PHP_EOL;
  }

  /**
   * Gère l'affichage Text de description
   *
   * @param DescriptiveText $t
   * @return void
   */
  public function renderDescriptiveText(DescriptiveText $t)
  {
    echo $t->getMessage(), PHP_EOL, PHP_EOL;
  }

  /**
   * Permet de centrer un text en fonction de la largeur du fichier
   *
   * @param string $text
   * @param integer $width
   * @return void
   */
  protected function centeredText(string $text, int $width = null)
  {
    if (is_null($width))
      $width = $this->width;
    $len = strlen($text);
    $left = (int) (($width - $len) / 2);
    return str_repeat(' ', $left) . $text . str_repeat(' ', $width - $left - $len);
  }

  /**
   * Gère l'affichage Text de petite question ouverte
   *
   * @param LittleOpenAsk $l
   * @return void
   */
  public function renderLittleOpenAsk(LittleOpenAsk $l)
  {
    echo $l->getLabel(), PHP_EOL,
      '____________________________________________________________',
      PHP_EOL,
      '____________________________________________________________',
      PHP_EOL,
      PHP_EOL;
  }

  /**
   * Gère l'affichage Text de grande question ouverte
   *
   * @param BigOpenAsk $b
   * @return void
   */
  public function renderBigOpenAsk(BigOpenAsk $b)
  {
    echo $b->getLabel(), PHP_EOL,
      '____________________________________________________________',
      PHP_EOL,
      '____________________________________________________________',
      PHP_EOL,
      '____________________________________________________________',
      PHP_EOL,
      '____________________________________________________________',
      PHP_EOL,
      PHP_EOL;
  }

  /**
   * Gère l'affichage Text de question fermé à choix multiple
   *
   * @param MultipleChoiceAsk $m
   * @return void
   */
  public function renderMultipleChoiceAsk(MultipleChoiceAsk $m)
  {
    $answers = $m->getQuizzAnswers();
    echo $m->getLabel(), ' (plusieurs choix possibles) : ', PHP_EOL;
    foreach ($answers as $answer) {
      $answer->render($this, $m->getPos());
    }
    echo PHP_EOL;
  }

  /**
   * Gère l'affichage Text de question fermé à choix unique
   *
   * @param UniqueChoiceAsk $u
   * @return void
   */
  public function renderUniqueChoiceAsk(UniqueChoiceAsk $u)
  {
    $answers = $u->getQuizzAnswers();
    echo $u->getLabel(), ' (1 seul choix possible) : ', PHP_EOL;
    foreach ($answers as $answer) {
      $answer->render($this, $u->getPos());
    }
    echo PHP_EOL;
  }

  /**
   * Gère l'affichage Text de réponse littéraire
   *
   * @param TextQuizzAnswer $t
   * @return void
   */
  public function renderTextQuizzAnswer(TextQuizzAnswer $t)
    {
      echo ($t->getIsUnique() ? ' ⭘ ' : ' ▢ '), $t->getRes(), PHP_EOL;
    }

    /**
     * Gère l'affichage Text de réponse en image
     *
     * @param PictureQuizzAnswer $p
     * @return void
     */
    public function renderPictureQuizzAnswer(PictureQuizzAnswer $p)
    {
      echo ($p->getIsUnique() ? ' ⭘ ' : ' ▢ '), $p->getRes(), PHP_EOL;
    }

    /**
     * Gère l'affichage Text d'un groupe horizontalement
     *
     * @param HorizontalGroup $h
     * @return void
     */
  public function renderHorizontalGroup(HorizontalGroup $h)
  {
    $width = (int)  (100 / sizeof($h->getElements()));

    echo $this->centeredText($h->getTitle()), PHP_EOL;
    foreach ($h->getElements() as $element) {
      //TODO  trouver un moyen de faire ne affichage les un a coté des autres
      $element->render($this);
    }
  }

  /**
   * Gère l'affichage Text d'un groupe verticalement
   *
   * @param VerticalGroup $v
   * @return void
   */
  public function renderVerticalGroup(VerticalGroup $v)
  {
    echo $this->centeredText($v->getTitle()), PHP_EOL;
    foreach ($v->getElements() as $element) {
      $element->render($this);
    }
  }
}
