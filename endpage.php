<?php declare(strict_types=1);

require_once ('autoload.php');
Session::start();

$title = 'C\'est la fin';

$p = new WebPage($title);

$p->appendContent(<<<HTML
<h1>Merci d'avoir participé</h1>
<p>Merci de remplir ce formulaire pour tenter de gagner de nombreux lots</p>

HTML
);
 echo $p->toHTML();