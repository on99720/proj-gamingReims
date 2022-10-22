<?php declare(strict_types=1);

require_once ('autoload.php');
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

if(count($_SESSION["InfosUser"]["QCMFini"])>0) {
    $lastQCM = $_SESSION["InfosUser"]["QCMFini"][count($_SESSION["InfosUser"]["QCMFini"]) - 1];
    if ($_SESSION["InfosUser"]["CheckQCM2"] && $lastQCM[0] != 2) {
        $last = $_SESSION["InfosUser"]["numQCM"] - 1;
        header("Location: redirect.php");
    }
}

$title = 'QCM points';
$p = new WebPage($title);

require_once "Fonctions/EffectNeige.php";
EffectNeige($p);

$p->appendCssUrl("css/DarkTheme.css");

if(!$_SESSION["InfosUser"]["CheckQCM2"])
{
    $answer1 = $_POST['question-1-answers'] ?? false;
    $answer2 = $_POST['question-2-answers'] ?? false;
    $answer3 = $_POST['question-3-answers'] ?? false;
    $answer4 = $_POST['question-4-answers'] ?? false;

    $totalCorrect = 0;
    if ($answer1) { $totalCorrect++; }
    if ($answer2) { $totalCorrect++; }
    if ($answer3) { $totalCorrect++; }
    if ($answer4) { $totalCorrect++; }

    $_SESSION["InfosUser"]["Score"] += $totalCorrect;
    $_SESSION["InfosUser"]["CheckQCM2"] = true;
    $_SESSION["InfosUser"]["QCM2Score"] = $totalCorrect;
    $_SESSION["InfosUser"]["QCMFini"][] = [2];
    $_SESSION["InfosUser"]["numQCM"] = count($_SESSION["InfosUser"]["QCMFini"]);

    $p->appendContent(<<<HTML
    <br>
     <div class="corps">
     
     <h1>Résultat QCM2</h1>
     <br>
     <div id='results'>$totalCorrect / 4 correct</div>
     <br>
         <form action="PageMere.php">
              <button type="submit">Continuer</button>
         </form>
    </div>
    <a href="THE_VOID.php">[WIP] Go to THE VOID</a>
    HTML
    );
}
else{
    header("Location: ResultCurrent.php");
}

if($_SESSION["InfosUser"]["CheckQCM1"]&&$_SESSION["InfosUser"]["CheckQCM2"]&&$_SESSION["InfosUser"]["CheckQCM3"]&&$_SESSION["InfosUser"]["CheckQCM4"]&&$_SESSION["InfosUser"]["CheckQCM5"])
{header("Location: resultfinal.php");}
// TODO Random prochain QCM
try {
    echo $p->toHTML();
} catch (Exception $e) {
    header("Location: ErreurPage.php");
    return;
}