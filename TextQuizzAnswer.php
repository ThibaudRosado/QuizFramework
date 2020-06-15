<?php
require_once 'QuizzAnswer.php';
class TextQuizzAnswer extends QuizzAnswer
{
    protected $res;

    public function __construct($res = "")
    {
        $this->res = $res;
    }

    public function getRes()
    {
        return $this->res;
    }

    public function setRes($res)
    {
        $this->res = $res;
    }
}