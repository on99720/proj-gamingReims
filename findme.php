<?php declare(strict_types=1);
require_once "autoload.php";
try {
    Session::start();
} catch (SessionException $e) {
}

$title= "Trouve Moi";
$p = New WebPage($title);

$p->appendContent(<<<HTML
<h1>Bienvenue</h1>
<h3>Oh mais tu n'as pas encore commencé ton aventure</h3>
<h3>Rends toi au stand de l'EPSI pour commencer ce jeu</h3>
HTML


);
try {
    echo $p->toHTML();
} catch (Exception $e) {
}