<?php

declare(strict_types=1);
require_once 'Quizz.php';
require_once 'QuizzElement.php';
require_once 'QuizzAnswer.php';

$quizz = new Quizz('Mon premier test');
$e = new DescriptiveText('Ceci est la description.');
$quizz->addElement($e);

$little = new LittleOpenAsk("Qui est Yannick ?", 3);
$quizz->addElement($little);

$big = new BigOpenAsk("Décrivez la vie de Yannick : ", 4);
$quizz->addElement($big);

$multiple = new MultipleChoiceAsk("Ques ce qui est jaune?", 5);

$answer1 = new TextQuizzAnswer("Un canari");
$answer2 = new TextQuizzAnswer("Le ciel");
$answer3 = new TextQuizzAnswer("La foret");
$answer4 = new TextQuizzAnswer("La couleur jaune");

$answer5 = new TextQuizzAnswer("Un canari");
$answer6 = new TextQuizzAnswer("Le ciel");
$answer7 = new TextQuizzAnswer("La foret");
$answer8 = new TextQuizzAnswer("La couleur jaune");

$multiple->addQuizzAnswer($answer1);
$multiple->addQuizzAnswer($answer2);
$multiple->addQuizzAnswer($answer3);
$multiple->addQuizzAnswer($answer4);
$quizz->addElement($multiple);

$unique = new UniqueChoiceAsk("Ques ce qui est bleu?", 4);
$unique->addQuizzAnswer($answer5);
$unique->addQuizzAnswer($answer6);
$unique->addQuizzAnswer($answer7);
$unique->addQuizzAnswer($answer8);
$quizz->addElement($unique);

$tv80 = new TextQuizzVisitor();
$tv60 = new TextQuizzVisitor(60);
$html = new HTMLQuizzVisitor('result.php');


$gh = new HorizontalGroup();
$little2 = new LittleOpenAsk("Qui est David ?", 3);
$little3 = new LittleOpenAsk("Qui est Romain ?", 3);
$little4 = new LittleOpenAsk("Qui est Eric ?", 3);
$gh->addElement($little2);
$gh->addElement($little3);
$gh->addElement($little4);
$gh->setTitle('Groupe Horizontal');




$multipleImage = new MultipleChoiceAsk('Où est l\'orange du marchand');
$repImage = new PictureQuizzAnswer('Orange', 'orange.jpg');
$multipleImage->addQuizzAnswer($repImage);


$uniqueImage = new UniqueChoiceAsk('Où est l\'orange du marchand');
$repImage = new PictureQuizzAnswer('Orange', 'orange.jpg');
$uniqueImage->addQuizzAnswer($repImage);


$gv = new VerticalGroup();
$gv->setTitle('Groupe Vertical');

$gv->addElement($uniqueImage);
$gv->addElement($multipleImage);
$gv->addElement($gh);
$quizz->addElement($gv);




$quizz->render($tv80);
$quizz->render($tv60);

ob_start();
$quizz->render($html);
$output = ob_get_clean();

$filename = 'questionaire.html';
$somecontent = $output;

// Assurons nous que le fichier est accessible en écriture
if (is_writable($filename)) {

    // Dans notre exemple, nous ouvrons le fichier $filename en mode d'ajout
    // Le pointeur de fichier est placé à la fin du fichier
    // c'est là que $somecontent sera placé
    if (!$handle = fopen($filename, 'w')) {
        echo "Impossible d'ouvrir le fichier ($filename)";
        exit;
    }

    // Ecrivons quelque chose dans notre fichier.
    if (fwrite($handle, $somecontent) === FALSE) {
        echo "Impossible d'écrire dans le fichier ($filename)";
        exit;
    }

    echo "L'écriture de ($somecontent) dans le fichier ($filename) a réussi";

    fclose($handle);
} else {
    echo "Le fichier $filename n'est pas accessible en écriture.";
}


/*
*Pour actualiser la doc utiliser la commande : 
* php phpDocumentor.phar -d . -t docs/api
*/