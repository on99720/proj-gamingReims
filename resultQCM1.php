<?php declare(strict_types=1);

require_once ('autoload.php');
Session::start();

$totalCorrect = 0;
if(count($_SESSION["InfosUser"]["QCMFini"])>0) {
    $lastQCM = $_SESSION["InfosUser"]["QCMFini"][count($_SESSION["InfosUser"]["QCMFini"]) - 1];
    if ($_SESSION["InfosUser"]["CheckQCM1"] && $lastQCM) {
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

if(!$_SESSION["InfosUser"]["CheckQCM1"])
{
    $_SESSION["InfosUser"]["Score"] += $totalCorrect;
    $_SESSION["InfosUser"]["CheckQCM1"] = true;
    $_SESSION["InfosUser"]["QCMFini"] += [1];
    $_SESSION["InfosUser"]["numQCM"] +=1;
}

$title = 'QCM points';
$p = new WebPage($title);




$p->appendContent(<<<HTML
 <div id="page-wrap">
 
 <h1>Result</h1>
    
          
 <div id='results'>$totalCorrect / 4 correct</div>
            
   <li>
    <a href="THE_VOID.php">[WIP] Go to THE VOID</a>
   </li> 
   <p>[Insert map Here]</p>
 </div>
HTML
);
// TODO random du Prochain QCM


echo $p->toHTML();
