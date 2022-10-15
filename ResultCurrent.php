<?php declare(strict_types=1);
require_once "autoload.php";
try {
    Session::start();
} catch (SessionException $e) {
}

$title= "Trouve Moi";
$p = New WebPage($title);
$p->appendCssUrl("css/DarkTheme.css");

$totalCorrect = $_SESSION["InfosUser"]["Score"];
$p->appendContent(<<<HTML
     <div id="page-wrap">
     
     <h1>Resultat total actuel</h1>
            
     <div id='results'>$totalCorrect / 20 correct</div>
       <li>
        <a href="PageMere.php">Continuer</a>
       </li> 
       <li>
        <a href="THE_VOID.php">[WIP] Go to THE VOID</a>
       </li> 
     </div>
    HTML
);
try {
    echo $p->toHTML();
} catch (Exception $e) {
}