<?php

declare(strict_types=1);
require_once 'HTMLQuizzVisitor.php';
require_once 'TextQuizzVisitor.php';
require_once 'Quizz.php';


interface IQuizzVisitor
{
  public function renderQuizz(Quizz $q);
  public function renderDescriptiveText(DescriptiveText $t);
  public function renderLittleOpenAsk(LittleOpenAsk $l);
  public function renderBigOpenAsk(BigOpenAsk $l);
  public function renderMultipleChoiceAsk(MultipleChoiceAsk $m);
  public function renderUniqueChoiceAsk(UniqueChoiceAsk $u);
  public function renderVerticalGroup(VerticalGroup $v);
  public function renderHorizontalGroup(HorizontalGroup $h);
}
