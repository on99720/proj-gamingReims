<?php declare(strict_types=1);
require_once "autoload.php";
try {
    Session::start();
} catch (SessionException $e) {
    header("Location: ErreurPage.php");
    return;
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
        <h4>Trouve et scanne les 5 QR QUIZZ cachés sur le lieu, pour finir ton aventure, et gagner le prix par tirage aux sort. </h4>
        <h4>Une bonne réponse à chaque question t'apporte 1 point. Si tu as au moins 3 points à la fin, et si tu as trouvé tous les QUIZZ, tu seras pris en compte dans le tirage. </h4>
        <br>
        <div>
            <h4>A la fin des 5 QR QUIZZ, ton nom, ton n°, et ton mail te seront demandés pour t'enregistrer dans la liste des participants. </h4>
        </div>
        <br>
        <h4>Le jeu est recommensable si tu rescannes le Qrcode de départ (QR code de géolocalisation).
        <br><br>
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
HTML
);


if($_SESSION["InfosUser"]["CheckQCM1"]){$QCM1Check ='Fait';$scoreQCM1 = $_SESSION["InfosUser"]["QCM1Score"];}else{$QCM1Check ='Nn'; $scoreQCM1 = 0;}
if($_SESSION["InfosUser"]["CheckQCM2"]){$QCM2Check ='Fait';$scoreQCM2 = $_SESSION["InfosUser"]["QCM2Score"];}else{$QCM2Check ='Nn'; $scoreQCM2 = 0;}
if($_SESSION["InfosUser"]["CheckQCM3"]){$QCM3Check ='Fait';$scoreQCM3 = $_SESSION["InfosUser"]["QCM3Score"];}else{$QCM3Check ='Nn'; $scoreQCM3 = 0;}
if($_SESSION["InfosUser"]["CheckQCM4"]){$QCM4Check ='Fait';$scoreQCM4 = $_SESSION["InfosUser"]["QCM4Score"];}else{$QCM4Check ='Nn'; $scoreQCM4 = 0;}
if($_SESSION["InfosUser"]["CheckQCM5"]){$QCM5Check ='Fait';$scoreQCM5 = $_SESSION["InfosUser"]["QCM5Score"];}else{$QCM5Check ='Nn'; $scoreQCM5 = 0;}

$totalCorrect = $_SESSION["InfosUser"]["Score"];

$p->appendContent(<<<HTML

        <br>
        <h4>Tes points au total : </h4>
        <div class="Tableau">
            <div class="colonne">
                Quizz 1<br>
                Quizz 2<br>
                Quizz 3<br>
                Quizz 4<br>
                Quizz 5<br>        
            </div>
            <div class="colonne">
                $QCM1Check<br>
                $QCM2Check<br>
                $QCM3Check<br>
                $QCM4Check<br>
                $QCM5Check<br>        
            </div>
            <div class="colonneNum">
                $scoreQCM1/4<br>
                $scoreQCM2/4<br>
                $scoreQCM3/4<br>
                $scoreQCM4/4<br>
                $scoreQCM5/4<br>
            </div>
            
        </div>
        <br>
        $totalCorrect /20
        
        
HTML
);

$p->appendContent(<<<HTML
        <br>
        <br>
        <br>
        <h4>Voici la carte des QR QUIZZ cachés :</h4>
        <p>(Appuyer dessus pour la grossir)</p>
        <div class="cartequizzDiv">
            <a href="img/image_map.jpg" target="_blank"><img class="cartequizz" src="img/image_map.jpg" alt="Map aux QUIZZ" /></a>
            <br/>
        </div>
        <br>
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
    header("Location: ErreurPage.php");
    return;
}