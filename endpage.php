<?php declare(strict_types=1);

require_once ('autoload.php');
Session::start();

$title = 'C\'est la fin';

$p = new WebPage($title);

$p->appendContent(<<<HTML
<h1>Merci d'avoir participé</h1>


HTML
);
 echo $p->toHTML();