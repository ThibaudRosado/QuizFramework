<?php
require_once 'QuizzAnswer.php';
class PictureQuizzAnswer extends QuizzAnswer
{
    protected $res;
    protected $lien;

    public function __construct($res = '', $lien ='')
    {
        $this->res = $res;
        $this->lien = $lien;
    }

    public function getRes()
    {
        return $this->res;
    }

    public function setRes($res)
    {
        $this->res = $res;
    }

    public function getLien()
    {   
        return $this->lien;
    }

    public function setLien($lien)
    {
        $this->lien=$lien;
    }
}