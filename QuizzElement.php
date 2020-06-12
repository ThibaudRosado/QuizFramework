<?php

declare(strict_types=1);
require_once 'DescriptiveText.php';
require_once 'OpenAsk.php';
require_once 'LittleOpenAsk.php';
require_once 'BigOpenAsk.php';
require_once 'ChoiceAsk.php';
require_once 'UniqueChoiceAsk.php';
require_once 'MultipleChoiceAsk.php';
require_once 'QuizzAnswer.php';
require_once 'TextQuizzAnswer.php';
require_once 'PictureQuizzAnswer.php';


abstract class QuizzElement
{
  // TODO

  // protected $id; ici ou dans Quizz ??
  protected $point;

  public function __construct($point = 1) {

    $this->point = $point;
  }

  public function getPoint()
  {
    return $this->point;
  }

  public function setPoint($point)
  {
    $this->point=$point;
  }

}
