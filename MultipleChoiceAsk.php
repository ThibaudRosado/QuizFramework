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

  /**
   * Affecte l'affichage au visitor.
   *
   * @param IQuizzVisitor $v
   * @return void
   */
  public function render(IQuizzVisitor $v)
  {
    $v->renderMultipleChoiceAsk($this);
  }
}
