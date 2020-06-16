<?php
require_once 'QuizzAnswer.php';
require_once 'IQuizzVisitor.php';
require_once 'HTMLQuizzVisitor.php';
class TextQuizzAnswer extends QuizzAnswer
{
    /**
     * Text contenant la réponse
     *
     * @var string
     */
    protected $res;

    public function __construct($res = "", $isUnique = true)
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


    /**
     * Affecte l'affichage au visitor.
     *
     * @param IQuizzVisitor $v
     * @param string $pos
     * @return void
     */
    public function render(IQuizzVisitor $v, $pos)
    {
        $v->renderTextQuizzAnswer($this, $pos);
    }
}
