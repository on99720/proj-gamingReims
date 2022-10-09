<?php declare(strict_types=1);
//ob_start();
require_once('autoload.php');

try {
    Session::start();
} catch (SessionException $e) {
}
session_destroy();
try {
    Session::start();
} catch (SessionException $e) {
}
$title = 'Bienvenue';
$p = new WebPage($title);

//initialiser toute les données de sessions
if(!isset($_SESSION["InfosUser"]))
{
    $_SESSION["InfosUser"]= [];
}
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

// si le visiteur est nouveau lui creer une session
if(!isset($_SESSION["InfosUser"]["ID"]) or $_SESSION["InfosUser"]["QCMFini"] == []) {

    try {
        $idbd = MyPDO::getInstance()->prepare(<<<SQL
SELECT MAX(id) 
FROM utilisateur;
SQL

        );
    } catch (Exception $e) {
    }
    if (isset($idbd)) {
        $idbd->execute();
        $idbd->setFetchMode(PDO::FETCH_NUM);
    }
    if (isset($idbd)) {
        $idmax = $idbd->fetchAll();
    }


    try {
        $stmt = MyPDO::getInstance()->prepare(<<<SQL
INSERT INTO utilisateur (id)
value (:id)
SQL

        );
    } catch (Exception $e) {
    }

    if (isset($stmt)) {
        if (isset($idmax)) {
            $stmt->execute(['id' => (int)$idmax[0][0] + 1]);
        }
    }
    if (isset($idmax)) {
        $_SESSION["InfosUser"]["ID"] = (int)$idmax[0][0] + 1;
    }

//todo random du premier QCM
    $p->appendContent(<<<HTML
        <h1>Bienvenue</h1>
        <h2>Merci de participer a ce magnifique jeu concours au travers de la game'in Reims.</h2>
        <p>
         [insert règle du jeu]
        </p>
        <img src="img/kisspng-computer-icons-google-maps-location-5b1d56b8dcf122.249317311528649400905.jpg" width="900" alt="map">
        <form action="THE_VOID.php">
        
        <button type = "submit">[WIP] Index</button>
        </form>

HTML
    );
}
// Sinon le rediriger sur la derniere page ou il etait
//TODO
else {
    //header("resultQCM{$_SESSION["InfosUser"]["numQCM"]}.php");
}
try {
    echo $p->toHTML();
} catch (Exception $e) {
}
//ob_end_flush();