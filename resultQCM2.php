<?php declare(strict_types=1);

require_once ('autoload.php');
Session::start();
if(count($_SESSION["InfosUser"]["QCMFini"])>0) {
    $lastQCM = $_SESSION["InfosUser"]["QCMFini"][count($_SESSION["InfosUser"]["QCMFini"]) - 1];
    if ($_SESSION["InfosUser"]["CheckQCM2"] && $lastQCM[0] != 2) {
        $last = $_SESSION["InfosUser"]["numQCM"] - 1;
        header("Location: redirect.php");
    }
}
$answer1 = $_POST['question-1-answers'] ?? false;

$answer2 = $_POST['question-2-answers'] ?? false;

$answer3 = $_POST['question-3-answers'] ?? false;

$answer4 = $_POST['question-4-answers'] ?? false;


$totalCorrect = 0;

if ($answer1) { $totalCorrect++; }
if ($answer2) { $totalCorrect++; }
if ($answer3) { $totalCorrect++; }
if ($answer4) { $totalCorrect++; }





$title = 'QCM points';
$p = new WebPage($title);

if(!$_SESSION["InfosUser"]["CheckQCM2"])
{
    $_SESSION["InfosUser"]["Score"] += $totalCorrect;
    $_SESSION["InfosUser"]["CheckQCM2"] = true;
    $_SESSION["InfosUser"]["QCMFini"][] = [2];
    $_SESSION["InfosUser"]["numQCM"] = count($_SESSION["InfosUser"]["QCMFini"]);
}


$p->appendContent(<<<HTML
 <div id="page-wrap">
 
 <h1>Result</h1>
    
          
 <div id='results'>$totalCorrect / 4 correct</div>
            
    <li>
    <a href="THE_VOID.php">Go to THE VOID</a>
   </li>  
 </div>
HTML
);
if($_SESSION["InfosUser"]["CheckQCM1"]&&$_SESSION["InfosUser"]["CheckQCM2"]&&$_SESSION["InfosUser"]["CheckQCM3"]&&$_SESSION["InfosUser"]["CheckQCM4"]&&$_SESSION["InfosUser"]["CheckQCM5"])
{header("Location: resultfinal.php");}
// TODO Random prochain QCM
echo $p->toHTML();