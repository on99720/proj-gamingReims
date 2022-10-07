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
    <a href="THE_VOID.php">Go to THE VOID</a>
   </li>  
   <p>[Insert map Here]</p>
 </div>
HTML
);
$p->appendToHead(<<<HTML
<meta http-equiv="Refresh"/>
HTML
);
$p->appendContent(<<<HTML
<h1 style="text-align: center;">Scanner le Qr Code du prochain stand</h1>
<hr>

<script src="js/html5-qrcode.min.js"></script>
<style>
  .result{
    background-color: green;
    color:#fff;
    padding:20px;
  }
  .row{
    display:flex;
}
</style>


<div class="row">
  <div class="col">
    <div style="width:500px;" id="reader"></div>
  </div>
  <div class="col" style="padding:30px;">
    <div id="result"></div>
  </div>
</div>


<script type="text/javascript">
function onScanSuccess(qrCodeMessage) {
//    document.getElementById('result').innerHTML = '<p>Vers <a href='+qrCodeMessage+' >stand 2</a>.</p>';
    document.getElementById('result').innerHTML = '<meta http-equiv="refresh" content="0; URL='+qrCodeMessage+'">';
}

function onScanError(errorMessage) {
    //handle scan error
}

var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", { fps: 10, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess, onScanError);

</script>
HTML

);

if($_SESSION["InfosUser"]["CheckQCM1"]&&$_SESSION["InfosUser"]["CheckQCM2"]&&$_SESSION["InfosUser"]["CheckQCM3"]&&$_SESSION["InfosUser"]["CheckQCM4"]&&$_SESSION["InfosUser"]["CheckQCM5"])
{header("Location: resultfinal.php");}
// TODO Random prochain QCM
echo $p->toHTML();