<?php declare(strict_types=1);
require_once "autoload.php";
try {
    Session::start();
} catch (SessionException $e) {
    header("Location: ErreurPage.php");
    return;
}

// Valide taille des entrées
if (strlen($_POST['commentaire']) > 2000 Or (strlen($_POST['pseudo']) > 29) )
{
    echo('text ou pseudo trop grand');
    return;
}

try {
    $req = MyPDO::getInstance()->prepare(<<<SQL
    insert Remarques
    set pseudo = :psdo,commentaire=:com,source=:src,IDProfil=:idprofil;
    SQL
    );

    $req->execute([
        'psdo'=> $_POST['pseudo'],
        'com'=>$_POST['commentaire'],
        'src'=>$_POST['source'],
        'idprofil'=>$_POST['idprofil']
    ]);

    $_SESSION["InfosUser"]["alerte"]= "Votre message a bien été envoyé.";


} catch (Exception $e) {
    header("Location: ErreurPage.php");
    return;
}


if($_POST['source']=="EndPage"){
    header("Location: endpage.php");
    return;
}
header("Location: PageMere.php");


