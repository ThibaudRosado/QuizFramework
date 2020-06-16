<?php

declare(strict_types=1);
require_once 'UniqueChoiceAsk.php';
require_once 'MultipleChoiceAsk.php';

abstract class ChoiceAsk extends QuizzElement
{
    //TODO

    protected $label;
    protected $quizzAnswers;

    public function __construct($label = '', $point = 1, array $quizzAnswers = array())
    {
        parent::__construct($point);
        $this->label = $label;
        $this->quizzAnswers = $quizzAnswers;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function setLabel($label)
    {
        $this->label = $label;
    }

    public function getQuizzAnswers(): array
    {
        return $this->quizzAnswers;
    }

    abstract public function setQuizzAnswers(array $quizzAnswers);


    abstract public function addQuizzAnswer(QuizzAnswer $a);


    public function removeQuizzAnswer(QuizzAnswer $a): ChoiceAsk
    {
        $i = 0;
        foreach ($this->quizzAnswers as $quizzAnswer) {
            if ($quizzAnswer === $a) {
                array_splice($this->quizzAnswers, $i, 1);
            }
            $i++;
        }
        return $this;
    }

    public function removeQuizzAnswerAt(int $i): ChoiceAsk
    {
        unset($this->quizzAnswers[$i]);
        $this->quizzAnswers = array_values($this->quizzAnswers);
        return $this;
    }
}
