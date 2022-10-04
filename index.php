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
         [insert règle du jeu]
        </p>
        <img src="img/kisspng-computer-icons-google-maps-location-5b1d56b8dcf122.249317311528649400905.jpg" width="428">
        <form action="endpage.php">
        <button type = "submit">go</button>
        </form>

HTML
);

echo $p->toHTML();
//ob_end_flush();