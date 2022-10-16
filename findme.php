<?php declare(strict_types=1);
require_once "autoload.php";
try {
    Session::start();
} catch (SessionException $e) {
}

$title= "Trouve Moi";
$p = New WebPage($title);

$p->appendCssUrl("css/DarkTheme.css");
$p->appendContent(<<<HTML
<div class="corps">
    <h1>Bienvenue</h1>
    <h3>Oh mais tu n'as pas encore commencé ton aventure.</h3>
    <h3>Rends toi au stand de l'EPSI pour scanner le geolocalisateur, pour pouvoir commencer ce jeu.</h3>
</div>
HTML


);
try {
    echo $p->toHTML();
} catch (Exception $e) {
}