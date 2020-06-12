<?php

declare(strict_types=1);
require_once 'UniqueChoiceAsk.php';
require_once 'MultipleChoiceAsk.php';

abstract class ChoiceAsk extends QuizzElement
{
    //TODO

    protected $label;
    protected $quizzAnswers;

    public function __construct($label = '', $point = 1)    {
        parent::__construct($point);
        $this->label = $label;
    }

    public function getLabel()    {
        return $this->label;
    }

    public function setLabel($label)    {
        $this->label = $label;
    }

    public function getQuizzAnswers(): array    {
        return $this->quizzAnswers;
    }

    public function setQuizzAnswers(array $quizzAnswers): ChoiceAsk    {
        $this->quizzAnswers = $quizzAnswers;
        return $this;
    }

    public function addQuizzAnswer(QuizzAnswer $a): ChoiceAsk    {
        $this->quizzAnswers[] = $a;
        return $this;
    }

    public function removeQuizzAnswer(QuizzAnswer $a): ChoiceAsk    {
        // TODO
        return $this;
    }

    public function removeQuizzAnswerAt(int $i): ChoiceAsk    {
        unset($this->quizzAnswers[$i]);
        $this->quizzAnswers = array_values($this->quizzAnswers);
        return $this;
    }
}
