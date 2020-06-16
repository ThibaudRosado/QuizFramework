<?php
require_once 'TextQuizzAnswer.php';
require_once 'PictureQuizzAnswer.php';
abstract class QuizzAnswer
{
    /**
     * Booléin permetant de savoir si la réponse fait parti d'une question a choix multiple ou unique.
     * True = unique / False = multiple
     *
     * @var boolean
     */
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
