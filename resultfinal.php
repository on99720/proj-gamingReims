<?php declare(strict_types=1);

require_once ('autoload.php');
Session::start();

if(isset($_COOKIE["TotalPoints"])){
    $totalCorrect = intval($_COOKIE["TotalPoints"]);
}else{
    $totalCorrect = 0; //PAS DE RESULTATS
}

$title = 'QCM';
$p = new WebPage($title);

$p->appendContent(<<<HTML
 <div id="page-wrap" >
 
 <h1>Result</h1>
    
          
 <div id='results'>$totalCorrect / 20 correct</div>
            
 
 </div>
HTML
);
echo $p->toHTML();


setcookie("TotalPoints", "0");
setcookie("Validator_QCM1", "",-1);
setcookie("Validator_QCM2", "",-1);
setcookie("Validator_QCM3", "",-1);
setcookie("Validator_QCM4", "",-1);
setcookie("Validator_QCM5", "",-1);
