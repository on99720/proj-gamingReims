<?php declare(strict_types=1);

require_once ('autoload.php');
try {
    Session::start();
} catch (SessionException $e) {
}

if(!isset($_SESSION["InfosUser"]["ID"]))
{
    header("Location: findme.php");
}

if(count($_SESSION["InfosUser"]["QCMFini"])>0) {
    $lastQCM = $_SESSION["InfosUser"]["QCMFini"][count($_SESSION["InfosUser"]["QCMFini"]) - 1];
    if ($_SESSION["InfosUser"]["CheckQCM1"] && $lastQCM[0]!=1) {
        header("Location: redirect.php");
    }
}

$title = 'QCM points';
$p = new WebPage($title);
$p->appendCssUrl("css/DarkTheme.css");

if(!$_SESSION["InfosUser"]["CheckQCM1"])
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
    $_SESSION["InfosUser"]["CheckQCM1"] = true;
    $_SESSION["InfosUser"]["QCMFini"][] = [1];
    $_SESSION["InfosUser"]["numQCM"] = count($_SESSION["InfosUser"]["QCMFini"]);

    $p->appendContent(<<<HTML
     <div id="page-wrap">
     
     <h1>Result QCM1</h1>
            
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
}
else{
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
}









//$p->appendToHead(<<<HTML
//<meta http-equiv="Refresh"/>
//HTML
//);
//$p->appendContent(<<<HTML
//<h1 style="text-align: center;">Scanner le Qr Code du prochain stand</h1>
//<hr>
//
//<script src="js/html5-qrcode.min.js"></script>
//<style>
//  .result{
//    background-color: green;
//    color:#fff;
//    padding:20px;
//  }
//  .row{
//    display:flex;
//}
//</style>
//
//
//<div class="row">
//  <div class="col">
//    <div style="width:500px;" id="reader"></div>
//  </div>
//  <div class="col" style="padding:30px;">
//    <div id="result"></div>
//  </div>
//</div>
//
//
//<script type="text/javascript">
//function onScanSuccess(qrCodeMessage) {
////    document.getElementById('result').innerHTML = '<p>Vers <a href='+qrCodeMessage+' >stand 2</a>.</p>';
//    document.getElementById('result').innerHTML = '<meta http-equiv="refresh" content="0; URL='+qrCodeMessage+'">';
//}
//
//function onScanError(errorMessage) {
//    //handle scan error
//}
//
//var html5QrcodeScanner = new Html5QrcodeScanner(
//    "reader", { fps: 10, qrbox: 250 });
//html5QrcodeScanner.render(onScanSuccess, onScanError);
//
//</script>
//HTML
//
//);



//TODO random du Prochain QCM
if($_SESSION["InfosUser"]["CheckQCM1"]&&$_SESSION["InfosUser"]["CheckQCM2"]&&$_SESSION["InfosUser"]["CheckQCM3"]&&$_SESSION["InfosUser"]["CheckQCM4"]&&$_SESSION["InfosUser"]["CheckQCM5"])
{header("Location: resultfinal.php");}
try {
    echo $p->toHTML();
} catch (Exception $e) {
}
