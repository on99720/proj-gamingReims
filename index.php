<?php declare(strict_types=1);
//ob_start();
require_once('autoload.php');

try {
    Session::start();
} catch (SessionException $e) {
}
if(!isset($_SESSION["InfosUser"]["ID"])) {

    if (!isset($_SESSION["InfosUser"]["VerifGeoloc"])) {
        header("Location: findme.php");
        return;
    } else if (!$_SESSION["InfosUser"]["VerifGeoloc"]) {
        header("Location: findme.php");
        return;
    }


    session_destroy();
}


try {
    Session::start();
} catch (SessionException $e) {
}
$title = 'Bienvenue';
$p = new WebPage($title);

//initialise toute les données de sessions
if(!isset($_SESSION["InfosUser"]))
{
    $_SESSION["InfosUser"]= [];
}
$_SESSION['COMMENCEMENT_TIME'] = time();

if(!isset($_SESSION["InfosUser"]["CheckQCM1"]))
{
    $_SESSION["InfosUser"]["CheckQCM1"]= false;
}
if(!isset($_SESSION["InfosUser"]["CheckQCM2"]))
{
    $_SESSION["InfosUser"]["CheckQCM2"]= false;
}
if(!isset($_SESSION["InfosUser"]["CheckQCM3"]))
{
    $_SESSION["InfosUser"]["CheckQCM3"]= false;
}
if(!isset($_SESSION["InfosUser"]["CheckQCM4"]))
{
    $_SESSION["InfosUser"]["CheckQCM4"]= false;
}
if(!isset($_SESSION["InfosUser"]["CheckQCM5"]))
{
    $_SESSION["InfosUser"]["CheckQCM5"]= false;
}
if(!isset($_SESSION["InfosUser"]["Score"]))
{
    $_SESSION["InfosUser"]["Score"]= 0;
}
if(!isset($_SESSION["InfosUser"]["numQCM"]))
{
    $_SESSION["InfosUser"]["numQCM"] = 0;
}
if(!isset($_SESSION["InfosUser"]["QCMFini"]))
{
    $_SESSION["InfosUser"]["QCMFini"]= [];
}

// si le visiteur est nouveau, lui creer une session
if(!isset($_SESSION["InfosUser"]["ID"]) or $_SESSION["InfosUser"]["QCMFini"] == []) {

    try {
        $idbd = MyPDO::getInstance()->prepare(<<<SQL
            SELECT MAX(id) 
            FROM utilisateur;
        SQL
        );
        $idbd->execute();
        $idbd->setFetchMode(PDO::FETCH_NUM);
        $idmax = $idbd->fetchAll();
        try {
            $stmt = MyPDO::getInstance()->prepare(<<<SQL
                INSERT INTO utilisateur (id)
                value (:id)
            SQL
            );
            $iduser=(int)$idmax[0][0] + 1;
            $stmt->execute(['id' => $iduser]);
            $_SESSION["InfosUser"]["ID"] = $iduser;

        } catch (Exception $e) {}
    } catch (Exception $e) {}

}
//todo random du premier QCM
$p->appendCssUrl("css/DarkTheme.css");
$p->appendContent(<<<HTML
        <div class="attention">
        NE PAS FERMER VOTRE NAVIGATEUR INTERNET, SOUS PEINE DE RECOMENCEMENT DU JEU. <br>
        (Votre navigateur peut etre mis en veille, mais sa fermeture entraîne l'effacement totale de vos informations.)
        </div>
        
        <div class="corps">
            <h1>Bienvenue</h1>
            <h2>Merci de participer a ce magnifique jeu concours au travers de la game'in Reims.</h2>
                <form action="PageMere.php">
                    <button type = "submit">Continuer</button>
                </form>
        </div>
        
        <div>
            <a href="THE_VOID.php">Go to THE VOID</a>
        </div>

HTML
);

// Sinon le rediriger sur la derniere page ou il etait
//TODO

try {
    echo $p->toHTML();
} catch (Exception $e) {
}
//ob_end_flush();