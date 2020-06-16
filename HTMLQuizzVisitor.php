<?php

declare(strict_types=1);
require_once 'Quizz.php';

class HTMLQuizzVisitor implements IQuizzVisitor
{
    protected $actionUrl;

    public function __construct($au = '')
    {
        $this->actionUrl = $au;
    }

    public function renderQuizz(Quizz $q)
    {
        echo sprintf('<form action="%s" method="post">', $this->actionUrl), PHP_EOL,
            sprintf('<h1>%s</h1>', $q->getTitle()),
            PHP_EOL;

        foreach ($q->getElements() as $k => $elt)
            $elt->render($this);

        echo '</form>';
    }

    public function renderDescriptiveText(DescriptiveText $t)
    {
        echo '<div><p>', $t->getMessage(), '</p></div>', PHP_EOL, PHP_EOL;
    }

    public function renderLittleOpenAsk(LittleOpenAsk $l)
    {
        echo '<div><label for="res', $l->getPos(), '">' . $l->getLabel() . '</label>',
            '<input type="text" name="res',
            $l->getPos(),
            '" id=""></div>',
            PHP_EOL,
            PHP_EOL;
    }

    public function renderBigOpenAsk(BigOpenAsk $g)
    {
        echo '<div><label for="res', $g->getPos(), '">' . $g->getLabel() . '</label>',
            '<textarea name="res',
            $g->getPos(),
            '" rows="5" cols="33"></textarea></div>',
            PHP_EOL,
            PHP_EOL;
    }

    public function renderMultipleChoiceAsk(MultipleChoiceAsk $m)
    {
        //TODO Rendre le name des réponses Unique pour le traitement des réponses
        $answers = $m->getQuizzAnswers();
        echo '<div><p>', $m->getLabel(), ' (plusieurs choix possibles) : </p>', PHP_EOL;

        foreach ($answers as $answer) {
            $answer->render($this, $m->getPos());
        }

        echo '</div>', PHP_EOL, PHP_EOL;
    }

    public function renderUniqueChoiceAsk(UniqueChoiceAsk $u)
    {
        //TODO Rendre le name des réponses Unique pour le traitement des réponses
        $answers = $u->getQuizzAnswers();

        echo '<div><p>', $u->getLabel(), ' (1 seul choix possible) : </p>', PHP_EOL;

        foreach ($answers as $answer) {
            $answer->render($this, $u->getPos());
        }

        echo '</div>', PHP_EOL, PHP_EOL;
    }


    public function renderTextQuizzAnswer(TextQuizzAnswer $t, $pos)
    {
        echo '<div> <input type="', ($t->getIsUnique() ? 'radio' : 'checkbox'), '" name="res', $pos, '" value="', $t->getRes(), '">',
            '<label for="res',
            $pos,
            '">',
            $t->getRes(),
            '</label>',
            '</div>',
            PHP_EOL;
    }

    public function renderPictureQuizzAnswer(PictureQuizzAnswer $p, $pos)
    {
        echo '<div>',
            '<input type="',
            ($p->getIsUnique() ? 'radio' : 'checkbox'),
            '" name="res',
            $pos,
            '" value="',
            $p->getRes(),
            '">',
            '<label for="res',
            $pos,
            '">',
            '<img src="',
            $p->getLien(),
            '"',
            'alt="',
            $p->getRes(),
            '">',
            '</label>',
            '</div>',
            PHP_EOL;
    }

    public function renderHorizontalGroup(HorizontalGroup $h)
    {
        $width = (int)  (100 / sizeof($h->getElements()));
        echo sprintf('<h1>%s</h1>', $h->getTitle()), PHP_EOL;
        echo '<div style="display: flex; flex-direction: row;justify-content: space-around;">', PHP_EOL;

        foreach ($h->getElements() as $element) {
            echo '<div width="', $width, '%">', PHP_EOL;
            $element->render($this);
            echo '</div>', PHP_EOL;
        }
        echo '</div>', PHP_EOL, PHP_EOL;
    }

    public function renderVerticalGroup(VerticalGroup $v)
    {
        echo sprintf('<h1>%s</h1>', $v->getTitle()), PHP_EOL;
        foreach ($v->getElements() as $element) {
            $element->render($this);
        }
    }
}
