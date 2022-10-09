<?php declare(strict_types=1);

require_once ('autoload.php');
Session::start();

$totalCorrect = 0;


if(count($_SESSION["InfosUser"]["QCMFini"])>0) {
    $lastQCM = $_SESSION["InfosUser"]["QCMFini"][count($_SESSION["InfosUser"]["QCMFini"]) - 1];
    if ($_SESSION["InfosUser"]["CheckQCM4"] && $lastQCM[0] != 4) {
        $last = $_SESSION["InfosUser"]["numQCM"] - 1;
        header("Location: redirect.php");
    }
}




$answer1 = $_POST['question-1-answers'] ?? false;

$answer2 = $_POST['question-2-answers'] ?? false;

$answer3 = $_POST['question-3-answers'] ?? false;

$answer4 = $_POST['question-4-answers'] ?? false;




if ($answer1) { $totalCorrect++; }
if ($answer2) { $totalCorrect++; }
if ($answer3) { $totalCorrect++; }
if ($answer4) { $totalCorrect++; }

if(!$_SESSION["InfosUser"]["CheckQCM4"])
{
    $_SESSION["InfosUser"]["Score"] += $totalCorrect;
    $_SESSION["InfosUser"]["CheckQCM4"] = true;
    $_SESSION["InfosUser"]["QCMFini"][] = [4];
    $_SESSION["InfosUser"]["numQCM"] = count($_SESSION["InfosUser"]["QCMFini"]);
}



$title = 'QCM points';
$p = new WebPage($title);





//base de données, doit remplacer les cookies
if (!isset($_COOKIE["Validator_QCM4"]) )
{
    if(!isset($_COOKIE["TotalPoints"]))
    {$_COOKIE["TotalPoints"]="";}
        $totalPoint = intval($_COOKIE["TotalPoints"]);
        $totalPoint += $totalCorrect;;

    setcookie("TotalPoints", strval($totalPoint));
}
setcookie("Validator_QCM4", "oui");

$p->appendContent(<<<HTML
 <div id="page-wrap">
 
 <h1>Result</h1>
    
 <div id='results'>$totalCorrect / 4 correct</div>
   <li>
    <a href="PageMere.php">Continuer</a>
   </li> 
   <li>
    <a href="THE_VOID.php">[WIP] Go to THE VOID</a>
   </li> 
 </div>
HTML
);



if($_SESSION["InfosUser"]["CheckQCM1"]&&$_SESSION["InfosUser"]["CheckQCM2"]&&$_SESSION["InfosUser"]["CheckQCM3"]&&$_SESSION["InfosUser"]["CheckQCM4"]&&$_SESSION["InfosUser"]["CheckQCM5"])
{header("Location: resultfinal.php");}
// TODO Random prochain QCM
echo $p->toHTML();