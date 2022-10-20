<?php declare(strict_types=1);

require_once ('autoload.php');
try {
    Session::start();
} catch (SessionException $e) {
}

if(!isset($_SESSION["InfosUser"]["ID"]))
{
    header("Location: findme.php");
}

$title = 'C\'est la fin';

$p = new WebPage($title);
$p->appendCssUrl("css/DarkTheme.css");

//Popup de message de confirmation
if (isset($_SESSION["InfosUser"]["alerte"])) {
    require_once "Fonctions/PopupMaker.php";
    PopupMaker($p,$_SESSION["InfosUser"]["alerte"]);
    unset($_SESSION["InfosUser"]["alerte"]);
}

$p->appendContent(<<<HTML
    <div class="corps">
        <h1>Merci d'avoir participé!</h1>

HTML
);

try {
    $reponse = MyPDO::getInstance()->query("SELECT score,nom,pnom FROM utilisateur ORDER BY score DESC");

} catch (Exception $e) {
}

$points = $_SESSION["InfosUser"]["Score"] ?? 0;


$p->appendCssUrl("css/ListeDeParticipants.css");
$p->appendContent(<<<HTML
        <br/>
        <br/>
        <br/>
    
        <h2>Votre score</h2>
        <div class="CenterDiv">
            $points Points
        </div>
        <br/>

HTML
);
$p->appendContent(<<<HTML
        <br/>
        <br/>
        <h4>Une remarques?</h4>
        <form method="POST" action="EspaceRemarque.php">
           <input type="hidden" name="source" id="source" value="EndPage">
           <input type="text" name="pseudo" placeholder="Un pseudo au pif (< 29 lettres)" size="29" required /><br />
           <textarea name="commentaire" placeholder="C'était nul à chier ! X) \n (< 2000 lettres)" rows="5" cols="35" required></textarea><br />
           <input type="submit" value="Poster ma remarque" name="submit_commentaire" />
        </form>
        <br/>
        <br/>
        <br/>
HTML
);

if (isset($reponse)) {
    $p->appendContent(<<<HTML
    
        <h2>Score de tous les participants</h2>

    HTML
    );

    $donnees = $reponse -> fetchAll();

    $icount = count($donnees);
    if($icount>100){
        $icount = 100;
    }
    for($i = 0; $i < $icount; $i++)
    {
        //echo nl2br ($donnees[$i]['id'] . $donnees[$i]['nom']. "  ");
        $inom = $donnees[$i]['nom'];
        $ipnom = $donnees[$i]['pnom'];

        if(!($ipnom==null && $inom==null)){
            $disp = $ipnom . " " . $inom. " (" . $donnees[$i]['score'] . " Points)"  ;
            $p->appendContent(<<<HTML
                <div class="CenterDiv">
                    $disp
                </div>
            HTML
            );
        }
    }
    $p->appendContent(<<<HTML
        <br>
        <br>
        <br>
        </div>
        <a href="THE_VOID.php">[WIP] Go to THE VOID</a>

    HTML
    );
}




try {
    echo $p->toHTML();
} catch (Exception $e) {
}