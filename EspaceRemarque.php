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
} catch (Exception $e) {
}

header("Location: PageMere.php");