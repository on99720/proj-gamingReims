<?php declare(strict_types=1);

require_once ('autoload.php');
try {
    Session::start();
} catch (SessionException $e) {
    header("Location: ErreurPage.php");
    return;
}

//if(!isset($_SESSION["InfosUser"]["ID"]))
//{
//    header("Location: findme.php");
//}

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


    $p->appendCssUrl("css/ListeDeParticipantss.css");
    $p->appendContent(<<<HTML
    
        </div>
        <div class="corps">
    HTML
    );



    if(isset($_SESSION["InfosUser"]["ID"])) {
        $points = $_SESSION["InfosUser"]["Score"] ?? 0;

        $p->appendContent(<<<HTML
                <h2>Votre score</h2>
                <br>
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
                   <li>
                        <input type="text" name="pseudo" placeholder="Un pseudo au pif (< 29 lettres)" size="29" required /><br />
                        <textarea name="commentaire" placeholder="C'était nul à chier ! X) \n (< 2000 lettres)" rows="5" cols="35" required></textarea><br />
                   </li>
                   <input type="submit" value="Poster ma remarque" name="submit_commentaire" />
                </form>
                <br/>
                <br/>
                <br/>
        HTML
        );
    }

    $p->appendContent(<<<HTML
    
        <h2>Score des participants</h2>
        <br>

    HTML
    );

    $donnees = $reponse -> fetchAll();

    $icount = count($donnees);
    if($icount>2000){
        $icount = 2000;
    }
    for($i = 0; $i < $icount; $i++)
    {
        //echo nl2br ($donnees[$i]['id'] . $donnees[$i]['nom']. "  ");
        $inom = $donnees[$i]['nom'];
        $ipnom = $donnees[$i]['pnom'];

        if(!($ipnom==null && $inom==null)){
            $disp1 = $ipnom . " " . $inom ;
            $disp2 = " (" . $donnees[$i]['score'] . " Points)"  ;
            $p->appendContent(<<<HTML
                <div class="CenterDiv">
                    <div class="disp12">
                        $disp1
                    </div>
                    <div class="disp22">
                        $disp2
                    </div>
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

    echo $p->toHTML();

} catch (Exception $e) {
    header("Location: ErreurPage.php");
    return;
}