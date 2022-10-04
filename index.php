<?php declare(strict_types=1);
//ob_start();
require_once('autoload.php');


$title = 'Zone membre';
$p = new WebPage($title);

$p->appendContent(<<<HTML
        <h1>Zone membre connecté</h1>
        <h2>Page 1</h2>
<form action="action.php" method="post">
    <ul>
        <li>
            <label for="name">Nom:</label>
            <input id="name" type="text" name="user_name" autocomplete="off">
        </li>
        <li>
            <label for="pname">Prenom:</label>
            <input id="pname" type="text" name="user_pname" autocomplete="off">
        </li>
        <li>
            <label for="mail">E-mail:</label>
            <input id="mail" type="email" name="user_email" autocomplete="off">
        </li>
        <li>
            <label for="msg">Avis?:</label>
            <textarea id="msg" name="user_message"></textarea>
        </li>

        <li><button type="submit" name="valider">Envoyer</button></li>
    </ul>
</form>
HTML
);

echo $p->toHTML();
//ob_end_flush();