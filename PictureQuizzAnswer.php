<?php
require_once 'QuizzAnswer.php';
class PictureQuizzAnswer extends QuizzAnswer
{   
    /**
     *  Text contenant la réponse
     *
     * @var string
     */
    protected $res;

    /**
     *  lien memant à l'image réponse
     *
     * @var string
     */
    protected $lien;

    public function __construct($res = '', $lien = '')
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
        $this->lien = $lien;
    }


    public function render(IQuizzVisitor $v, $pos)
    {
        $v->renderPictureQuizzAnswer($this, $pos);
    }
}
