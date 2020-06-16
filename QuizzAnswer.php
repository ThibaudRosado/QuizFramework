<?php
require_once 'TextQuizzAnswer.php';
require_once 'PictureQuizzAnswer.php';
abstract class QuizzAnswer
{

    protected $isUnique;


    public function getIsUnique()
    {
        return $this->isUnique;
    }

    public function setIsUnique($isUnique)
    {
        $this->isUnique = $isUnique;
    }
}
