<?php declare(strict_types=1);

require_once ('autoload.php');
try {
    Session::start();
} catch (SessionException $e) {
}


//Ce formulaire est remplie par l'utilisateur à la fin des QCM

try {
    $req = MyPDO::getInstance()->prepare(<<<SQL
update Utilisateur 
set nom = :nom,pnom=:pnom,mail=:mail,score=:score,nivEtude=:nivetude
where id = :id
SQL

    );
} catch (Exception $e) {
}
if (isset($req)) {
    $req->execute([
        'id'=> $_SESSION["InfosUser"]["ID"],
        'nom'=> $_POST['nom'],
        'pnom'=>$_POST['pnom'],
        'mail'=>$_POST['mail'],
        'score'=>$_POST['score'],
        'nivetude'=>$_POST['nivetude']
    ]);
}

header("Location: endpage.php");

