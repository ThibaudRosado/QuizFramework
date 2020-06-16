<?php

class MultipleChoiceAsk extends ChoiceAsk
{

  public function setQuizzAnswers(array $quizzAnswers): MultipleChoiceAsk
  {
    foreach ($quizzAnswers as $a) {
      $a->setIsUnique(false);
    }

    $this->quizzAnswers = $quizzAnswers;
    return $this;
  }

  public function addQuizzAnswer(QuizzAnswer $a): MultipleChoiceAsk
  {
    $a->setIsUnique(false);
    $this->quizzAnswers[] = $a;

    return $this;
  }

  public function render(IQuizzVisitor $v)
  {
    $v->renderMultipleChoiceAsk($this);
  }
}
