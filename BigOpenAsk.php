<?php

declare(strict_types=1);
class BigOpenAsk extends OpenAsk
{
    /**
     * Affecte l'affichage au visitor.
     *
     * @param IQuizzVisitor $v
     * @return void
     */
    public function render(IQuizzVisitor $v)
    {
        $v->renderBigOpenAsk($this);
    }
}
