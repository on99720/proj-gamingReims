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
    <h3>Il se trouve que tu n'as pas encore scanner les 5 quizz pour acceder à cette page. :P</h3>
</div>
HTML


);
try {
    echo $p->toHTML();
} catch (Exception $e) {
}