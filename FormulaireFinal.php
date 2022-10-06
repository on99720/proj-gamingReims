<?php declare(strict_types=1);

require_once ('autoload.php');
Session::start();

//Ce formulaire est remplie par l'utilisateur à la fin des QCM

$req = MyPDO::getInstance()->prepare(<<<SQL
INSERT into Utilisateur (id,nom,pnom,mail,score,nivEtude)
VALUES (:id,:nom,:pnom,:mail,:score,:nivetude)
SQL

);
$req->execute([
    'id'=> $_SESSION["InfosUser"]["ID"],
    'nom'=> $_POST['nom'],
    'pnom'=>$_POST['pnom'],
    'mail'=>$_POST['mail'],
    'score'=>$_POST['score'],
    'nivetude'=>$_POST['nivetude']
]);



