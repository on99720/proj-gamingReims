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

//Popup de message de confirmation
if (isset($_SESSION["InfosUser"]["alerte"])) {
    require_once "Fonctions/PopupMaker.php";
    PopupMaker($p,$_SESSION["InfosUser"]["alerte"]);
    unset($_SESSION["InfosUser"]["alerte"]);
}

$p->appendCssUrl("css/DarkTheme.css");
$p->appendContent(<<<HTML

    <div class="attention">
    NE PAS FERMER VOTRE NAVIGATEUR INTERNET, SOUS PEINE DE RECOMENCEMENT DU JEU. <br>
    (Votre navigateur peut etre mis en veille, mais sa fermeture entraîne l'effacement totale de vos informations.)
    </div>
    
    <div class="corps">
        <h4>Trouve et scanne les 5 QR QUIZZ cachés sur le lieu, pour finir ton aventure et gagner le prix par tirage aux sort. </h4>
        <h4>Une bonne réponse à chaque question t'apporte 1 point. Si tu as au moins 5 points à la fin, tu seras pris en compte dans le tirage, si tu as trouvé tous les QUIZZ. </h4>
        <br>
        <div>
            <h4>A la fin des 5 QR QUIZZ, ton nom, ton n°, et ton mail te seront demandés pour t'enregistrer dans la liste des participants. </h4>
        </div>
        <br>
        <h4>Au cas de non fonctionnement du scanner ci-bas, utilise une application comme "QR Scanner FR", théoriquement disponible dans ton store.</h4>
        <br>
        <div>
            <form action="AnalyseurDeQRcode.php">
                  <button type="submit">Appuie ici pour activer ton scanner QRC si tu es proche d'un QR QUIZZ.</button>
            </form>
        </div>
        <br>
        <br>
        <br>
        <h4>Voici la carte des QR QUIZZ cachés :</h4>
        <p>(Appuyer dessus pour la grossir)</p>
        <div class="cartequizzDiv">
            <img class="cartequizz" src="img/kisspng-computer-icons-google-maps-location-5b1d56b8dcf122.249317311528649400905.jpg" alt="map">
            <br/>
        </div>
        <br>
        <br>
        <br>
        <h4>Tes points actuels :</h4>
        <form action="ResultCurrent.php">
              <button type="submit">Voir mes points.</button>
        </form>
        <br>
        <br>
    </div>
    
    <br>
    <div class="EspCommantaire">
        <h4>Une remarques?</h4>
        <form method="POST" action="EspaceRemarque.php">
           <input type="hidden" name="source" id="source" value="PageMere">
           <input type="text" name="pseudo" placeholder="Un pseudo au pif (< 29 lettres)" size="29" required /><br />
           <textarea name="commentaire" placeholder="Ton commentaire. (< 2000 lettres)" rows="5" cols="35" required></textarea><br />
           <input type="submit" value="Poster ma remarque" name="submit_commentaire" />
        </form>
    </div>
    <a href="THE_VOID.php">[WIP] Go to THE VOID</a>
   
HTML
);

try {
    echo $p->toHTML();
} catch (Exception $e) {
}