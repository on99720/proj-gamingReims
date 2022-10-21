<?php declare(strict_types=1);
require_once "autoload.php";
try {
    Session::start();
} catch (SessionException $e) {
    header("Location: ErreurPage.php");
    return;
}

if(!isset($_SESSION["InfosUser"]["ID"]))
{
    header("Location: findme.php");
}

$title= "Trouve Moi";
$p = New WebPage($title);
$p->appendCssUrl("css/DarkTheme.css");

$totalCorrect = $_SESSION["InfosUser"]["Score"];
$p->appendContent(<<<HTML
     <div class="corps">
     
         <h1>Resultat total actuel</h1>
         <br>
         
         <div id='results'>$totalCorrect / 20 </div>
         
         <form action="PageMere.php">
              <button type="submit">Continuer</button>
         </form>
         <br>
     </div>
    <a href="THE_VOID.php">[WIP] Go to THE VOID</a>
    HTML
);
try {
    echo $p->toHTML();
} catch (Exception $e) {
    header("Location: ErreurPage.php");
    return;
}