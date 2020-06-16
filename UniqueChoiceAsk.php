<?php

class UniqueChoiceAsk extends ChoiceAsk
{


  public function setQuizzAnswers(array $quizzAnswers): UniqueChoiceAsk
  {
    foreach ($quizzAnswers as $a) {
      $a->setIsUnique(true);
    }

    $this->quizzAnswers = $quizzAnswers;
    return $this;
  }

  public function addQuizzAnswer(QuizzAnswer $a): UniqueChoiceAsk
  {
    $a->setIsUnique(true);
    $this->quizzAnswers[] = $a;

    return $this;
  }

  public function render(IQuizzVisitor $v)
  {
    $v->renderUniqueChoiceAsk($this);
  }
}
