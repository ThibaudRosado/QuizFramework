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

$multiple = new MultipleChoiceAsk("Qui est tibo?");

$answer1 = new TextQuizzAnswer("Un ane");
$answer2 = new TextQuizzAnswer("Le diable");
$answer3 = new TextQuizzAnswer("La voie lactée");
$answer4 = new TextQuizzAnswer("tibo");

$multiple->addAnswer($answer1);
$multiple->addAnswer($answer2);
$multiple->addAnswer($answer3);
$multiple->addAnswer($answer4);
$quizz->addElement($multiple);

$unique = new UniqueChoiceAsk("Qui est manu");
$unique ->addAnswer($answer1);
$unique ->addAnswer($answer2);
$unique ->addAnswer($answer3);
$unique ->addAnswer($answer4);
$quizz->addElement($unique);

$tv80 = new TextQuizzVisitor();
$tv60 = new TextQuizzVisitor(60);
$html = new HTMLQuizzVisitor('result.php');

$quizz->render($tv80);
$quizz->render($tv60);
$quizz->render($html);

/*
$quizz->removeElement($e);
$quizz->removeElementAt(0);
*/