<?php
declare(strict_types=1);

interface IQuizzVisitor{
  public function renderQuizz(Quizz $q);
  public function renderDescriptiveText(DescriptiveText $t);
}