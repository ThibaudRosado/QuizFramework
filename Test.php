<?php
declare(strict_types=1);
require_once 'Quizz.php';
require_once 'QuizzElement.php';

$quizz = new Quizz('Mon premier test');
$e = new DescriptiveText();
$quizz->addElement($e);

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
