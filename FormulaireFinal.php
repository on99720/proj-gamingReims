<?php declare(strict_types=1);

require_once ('autoload.php');
try {
    Session::start();
} catch (SessionException $e) {
}


// Valider changement des entrées
if ($_POST['mail']=="" Or $_POST['nom']=="" Or $_POST['nom']=="")
{
    echo('Il faut un email et un nom pour soumettre le formulaire.');
    return;
}
// Valider taille des entrées
if (strlen($_POST['nom']) > 17 Or (strlen($_POST['pnom']) > 17))
{
    echo('nom ou prénom trop grand');
    return;
}
// Valider l'email
if(!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
    echo "L'adresse e-mail n'est pas valide";
    return;
}

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

