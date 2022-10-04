<?php declare(strict_types=1);
//ob_start();
require_once('autoload.php');
Session::start();

$title = 'Bienvenue';
$p = new WebPage($title);

$p->appendContent(<<<HTML
        <h1>Bienvenue</h1>
        <h2>Merci de participer a ce magnifique jeu concours au travers de la game'in Reims.</h2>
        <p>
         
        </p>
        <form action="endpage.php">
        <button type = "submit">go</button>
        </form>

HTML
);

echo $p->toHTML();
//ob_end_flush();