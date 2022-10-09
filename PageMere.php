<?php declare(strict_types=1);
require_once "autoload.php";
Session::start();

$title= "Trouve Moi";
$p = New WebPage($title);

$p->appendContent(<<<HTML
    <h4>Trouve et scanne les autres QR QUIZZ (5 en tout) pour finir ton aventure et gagner le prix par tirage aux sort. </h4>
    <h4>Si tu as plus de la moitié de la moyenne générale, tu seras pris en compte dans le tirage.</h4>
    <br>
    <div>
        <h4>A la fin des 5 QR QUIZZ, ton nom, ton prénon, et ton mail te seront demandés pour t'enregistrer dans la liste des participants. </h4>
    </div>
    <br>
    <h4>Au cas de non fonctionnement du scanner ci-bas, utilise une application comme "QR Scanner FR", normalement disponible dans ton store.</h4>
    <br>
    <div>
        <form action="AnalyseurDeQRcode.php">
              <button type="submit">Appuie ici pour activer ton scanner QRC si tu es proche.</button>
        </form>
        <a href="THE_VOID.php">[WIP] Go to THE VOID</a>
    </div>
    <br>
HTML


);
echo $p->toHTML();