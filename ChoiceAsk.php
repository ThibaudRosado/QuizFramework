<?php

declare(strict_types=1);
require_once 'UniqueChoiceAsk.php';
require_once 'MultipleChoiceAsk.php';

abstract class ChoiceAsk extends QuizzElement
{
    //TODO
    /**
     * Text contenant la question
     *
     * @var string
     */
    protected $label;

    /**
     * Array contenant les objets réponses
     *
     * @var Array
     */
    protected $quizzAnswers;

    /**
     * Construit le ChoiceAsk
     *
     * @param string $label
     * @param integer $point
     * @param array $quizzAnswers
     */
    public function __construct($label = '', $point = 1, array $quizzAnswers = array())
    {
        parent::__construct($point);
        $this->label = $label;
        $this->quizzAnswers = $quizzAnswers;
    }

    /**
     * @return void
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return void
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return array
     */
    public function getQuizzAnswers(): array
    {
        return $this->quizzAnswers;
    }

    /**
     * @param array $quizzAnswers
     * @return void
     */
    abstract public function setQuizzAnswers(array $quizzAnswers);

    /**
     * @param QuizzAnswer $a
     * @return void
     */
    abstract public function addQuizzAnswer(QuizzAnswer $a);

    /**
     * @param QuizzAnswer $a
     * @return ChoiceAsk
     */
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

    /**
     * @param integer $i
     * @return ChoiceAsk
     */
    public function removeQuizzAnswerAt(int $i): ChoiceAsk
    {
        unset($this->quizzAnswers[$i]);
        $this->quizzAnswers = array_values($this->quizzAnswers);
        return $this;
    }
}
