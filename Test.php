<?php
declare(strict_types=1);
require_once 'Quizz.php';
require_once 'QuizzElement.php';

$quizz = new Quizz('Mon premier test');
$e = new DescriptiveText();
$quizz->addElement($e);

$little = new LittleOpenAsk("Qui est Yannick ?",3);
$quizz->addElement($little);

$big = new BigOpenAsk("Décrivez la vie de Yannick : ",3);
$quizz->addElement($big);

$unique = new UniqueChoiceAsk("Questions unique : ",3);
$quizz->addElement($unique);

$multiple = new MultipleChoiceAsk("Questions multiple : ",3);
$quizz->addElement($multiple);

$s = new TextQuizzAnswer("reponse: ",3);
$s1 = new TextQuizzAnswer("reponse: ",3);
$multiple->addAnswer($s);
$multiple->addAnswer($s1);
$quizz->addElement($multiple);


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
