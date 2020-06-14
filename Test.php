<?php
declare(strict_types=1);
require_once 'Quizz.php';
require_once 'QuizzElement.php';
require_once 'QuizzAnswer.php';

$quizz = new Quizz('Mon premier test');
$e = new DescriptiveText('Ceci est la description.');
$quizz->addElement($e);

$little = new LittleOpenAsk("Qui est Yannick ?",3);
$quizz->addElement($little);

$big = new BigOpenAsk("Décrivez la vie de Yannick : ",3);
$quizz->addElement($big);

$multiple = new MultipleChoiceAsk("Ques ce qui est jaune?",5);

$answer1 = new TextQuizzAnswer("Un canari");
$answer2 = new TextQuizzAnswer("Le ciel");
$answer3 = new TextQuizzAnswer("La foret");
$answer4 = new TextQuizzAnswer("La couleur jaune");

$multiple->addQuizzAnswer($answer1);
$multiple->addQuizzAnswer($answer2);
$multiple->addQuizzAnswer($answer3);
$multiple->addQuizzAnswer($answer4);
$quizz->addElement($multiple);

$unique = new UniqueChoiceAsk("Ques ce qui est bleu?",4);
$unique ->addQuizzAnswer($answer1);
$unique ->addQuizzAnswer($answer2);
$unique ->addQuizzAnswer($answer3);
$unique ->addQuizzAnswer($answer4);
$quizz->addElement($unique);

$tv80 = new TextQuizzVisitor();
$tv60 = new TextQuizzVisitor(60);
$html = new HTMLQuizzVisitor('result.php');

$gv = new VerticalGroup();
$gv->addElement($unique);
$gv->addElement($multiple);
$gv->setTitle('Groupe Vertical');
$quizz->addElement($gv);

$gh = new HorizontalGroup();
$gh->addElement($unique);
$gh->addElement($multiple);
$gh->addElement($unique);
$gh->setTitle('Groupe Horizontal');
$quizz->addElement($gh);

$quizz->render($tv80);
$quizz->render($tv60);
$quizz->render($html);

/*
$quizz->removeElement($e);
$quizz->removeElementAt(0);
*/
