<?php

declare(strict_types=1);
require_once 'Quizz.php';

class HTMLQuizzVisitor implements IQuizzVisitor
{
    /**
     * lien où envoyer les réponses du formulaire en méthode POST
     *
     * @var String
     */
    protected $actionUrl;

    /**
     * Construit le HTMLQuizzVisitor
     * 
     * @param string $au
     */
    public function __construct($au = '')
    {
        $this->actionUrl = $au;
    }

    /**
     * Gère l'affichage HTML du Quizz
     *
     * @param Quizz $q
     * @return void
     */
    public function renderQuizz(Quizz $q)
    {
        echo sprintf('<form action="%s" method="post">', $this->actionUrl), PHP_EOL,
            sprintf('<h1>%s</h1>', $q->getTitle()),
            PHP_EOL;

        foreach ($q->getElements() as $k => $elt)
            $elt->render($this);

        echo '</form>';
    }

    /**
     * Gère l'affichage HTML de description
     *
     * @param DescriptiveText $t
     * @return void
     */
    public function renderDescriptiveText(DescriptiveText $t)
    {
        echo '<div><p>', $t->getMessage(), '</p></div>', PHP_EOL, PHP_EOL;
    }

    /**
     * Gère l'affichage HTML de petite question ouverte
     *
     * @param LittleOpenAsk $l
     * @return void
     */
    public function renderLittleOpenAsk(LittleOpenAsk $l)
    {
        echo '<div><label for="res', $l->getPos(), '">' . $l->getLabel() . '</label>',
            '<input type="text" name="res',
            $l->getPos(),
            '" id=""></div>',
            PHP_EOL,
            PHP_EOL;
    }

    /**
     * Gère l'affichage HTML de grande question ouverte
     *
     * @param BigOpenAsk $g
     * @return void
     */
    public function renderBigOpenAsk(BigOpenAsk $g)
    {
        echo '<div><label for="res', $g->getPos(), '">' . $g->getLabel() . '</label>',
            '<textarea name="res',
            $g->getPos(),
            '" rows="5" cols="33"></textarea></div>',
            PHP_EOL,
            PHP_EOL;
    }

    /**
     * Gère l'affichage HTML de question fermé à choix multiple
     *
     * @param MultipleChoiceAsk $m
     * @return void
     */
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

    /**
     * Gère l'affichage HTML de question fermé à choix unique
     *
     * @param UniqueChoiceAsk $u
     * @return void
     */
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

    /**
     * Gère l'affichage HTML de réponse littéraire
     *
     * @param TextQuizzAnswer $t
     * @param [type] $pos
     * @return void
     */
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

    /**
     * Gère l'affichage HTML de réponse en image
     *
     * @param PictureQuizzAnswer $p
     * @param [type] $pos
     * @return void
     */
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

    /**
     * Gère l'affichage HTML d'un groupe horizontalement
     *
     * @param HorizontalGroup $h
     * @return void
     */
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

    /**
     * Gère l'affichage HTML d'un groupe verticalement
     *
     * @param VerticalGroup $v
     * @return void
     */
    public function renderVerticalGroup(VerticalGroup $v)
    {
        echo sprintf('<h1>%s</h1>', $v->getTitle()), PHP_EOL;
        foreach ($v->getElements() as $element) {
            $element->render($this);
        }
    }
}
