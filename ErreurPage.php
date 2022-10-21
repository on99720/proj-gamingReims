<?php declare(strict_types=1);
require_once "autoload.php";
try {
    Session::start();
} catch (SessionException $e) {
}

$title= "Erreur technique";
$p = New WebPage($title);

$p->appendCssUrl("css/DarkTheme.css");
$p->appendContent(<<<HTML
    <div class="corps">
        <h3>Une erreur est survenue. Veuillez réésayer votre démarche.</h3>
        <br>
        <h3>Nos excuses pour cette erreur technique.</h3>
        <br>
    </div>
HTML


);
try {
    echo $p->toHTML();
} catch (Exception $e) {
}