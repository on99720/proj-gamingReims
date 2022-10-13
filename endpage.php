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

$p->appendContent(<<<HTML
    <h1>Merci d'avoir participé!</h1>
    <div>
        <a href="THE_VOID.php">[WIP] Go to THE VOID</a>
    </div>
HTML
);

try {
    $reponse = MyPDO::getInstance()->query("SELECT score,nom,pnom FROM utilisateur ORDER BY score DESC");

} catch (Exception $e) {
}

$points = $_SESSION["InfosUser"]["Score"] ?? 0;


$p->appendCssUrl("css/ListeDeParticipantss.css");
$p->appendContent(<<<HTML
    <br/>
    <br/>
    <br/>
    <div class="conteneur">
        <h2>Votre score</h2>
        <div class="CenterDiv">
            $points Points
        </div>

HTML
);

if (isset($reponse)) {
    $p->appendContent(<<<HTML
        </div>
        <br/>
        <br/>
        <br/>
        
        <div class="conteneur">
        <h2>Score de tous les participants</h2>

    HTML
    );

    $donnees = $reponse -> fetchAll();

    for($i = 0; $i <count($donnees) ; $i++)
    {
        //echo nl2br ($donnees[$i]['id'] . $donnees[$i]['nom']. "  ");
        $disp=$donnees[$i]['pnom']." ". $donnees[$i]['nom']." (". $donnees[$i]['score']." Points)"  ;
        $p->appendContent(<<<HTML
                <div class="CenterDiv">
                    $disp
                </div>
        HTML
        );
    }
    $p->appendContent(<<<HTML
    </div>
    HTML
    );
}




try {
    echo $p->toHTML();
} catch (Exception $e) {
}