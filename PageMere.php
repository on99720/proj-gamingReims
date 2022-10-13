<?php declare(strict_types=1);
require_once "autoload.php";
try {
    Session::start();
} catch (SessionException $e) {
}

if(!isset($_SESSION["InfosUser"]["ID"]))
{
    header("Location: findme.php");
}

$title= "Trouve Moi";
$p = New WebPage($title);

$p->appendCssUrl("css/DarkTheme.css");
$p->appendContent(<<<HTML
    <h4>Trouve et scanne les 5 QR QUIZZ cachés sur le lieu, pour finir ton aventure et gagner le prix par tirage aux sort. </h4>
    <h4>Une bonne réponse à chaque question t'apporte 1 point. Si tu as au moins 5 points à la fin, tu seras pris en compte dans le tirage, si tu as trouvé tous les QUIZZ. </h4>
    <br>
    <div>
        <h4>A la fin des 5 QR QUIZZ, ton nom, ton prénon, et ton mail te seront demandés pour t'enregistrer dans la liste des participants. </h4>
    </div>
    <br>
    <h4>Au cas de non fonctionnement du scanner ci-bas, utilise une application comme "QR Scanner FR", théoriquement disponible dans ton store.</h4>
    <br>
    <div>
        <form action="AnalyseurDeQRcode.php">
              <button type="submit">Appuie ici pour activer ton scanner QRC si tu es proche.</button>
        </form>
        <a href="THE_VOID.php">[WIP] Go to THE VOID</a>
    </div>
    <br>
    <br>
    <h4>Voici la carte des QR QUIZZ cachés.</h4>
    <br/>
        <img src="img/kisspng-computer-icons-google-maps-location-5b1d56b8dcf122.249317311528649400905.jpg" width="900" alt="map">
    <br/>
    <br>
HTML


);
try {
    echo $p->toHTML();
} catch (Exception $e) {
}