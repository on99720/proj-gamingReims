<?php declare(strict_types=1);
require_once "autoload.php";
try {
    Session::start();
} catch (SessionException $e) {
}

try {
    $req = MyPDO::getInstance()->prepare(<<<SQL
    insert Remarques
    set pseudo = :psdo,commentaire=:com,source=:src;
    SQL
    );

    $req->execute([
        'psdo'=> $_POST['pseudo'],
        'com'=>$_POST['commentaire'],
        'src'=>$_POST['source']
    ]);

    $_SESSION["InfosUser"]["alerte"]= "Votre message a bien été envoyé.";


} catch (Exception $e) {
    $_SESSION["InfosUser"]["alerte"]= "Votre message n'a pas pu être envoyé.";
}



header("Location: PageMere.php");


