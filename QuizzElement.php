<?php

declare(strict_types=1);
require_once 'DescriptiveText.php';
require_once 'OpenAsk.php';
require_once 'LittleOpenAsk.php';
require_once 'BigOpenAsk.php';
require_once 'ChoiceAsk.php';
require_once 'UniqueChoiceAsk.php';
require_once 'MultipleChoiceAsk.php';
require_once 'TextQuizzAnswer.php';
require_once 'QuizzAnswer.php';
require_once 'HorizontalGroup.php';
require_once 'VerticalGroup.php';

abstract class QuizzElement
{
  /**
   * Valeur de la question
   *
   * @var int
   */
  protected $point;

  /**
   * Identifiant de l'element
   *
   * @var string
   */
  protected $pos;

  public function __construct($point = 1)
  {

    $this->point = $point;
  }

  public function getPoint()
  {
    return $this->point;
  }

  public function setPoint($point)
  {
    $this->point = $point;
  }

  public function getPos()
  {
    return $this->pos;
  }

  public function setPos($pos)
  {
    $this->pos = $pos;
  }
}
