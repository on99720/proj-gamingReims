<?php declare(strict_types=1);
//ob_start();
require_once('autoload.php');

Session::start();
$lastQCM = $_SESSION["InfosUser"]["QCMFini"][count($_SESSION["InfosUser"]["QCMFini"])-1];

echo $_SESSION["InfosUser"]["numQCM"]-1;
echo $lastQCM[0];
$redirect = "oui";

switch ($lastQCM[0]){
    case 1:
        header("Location: resultQCM1.php");
        break;
    case 2:
        header("Location: resultQCM2.php");
        break;
    case 3:
        header("Location: resultQCM3.php");
        break;
    case 4:
        header("Location: resultQCM4.php");
        break;
    case 5:
        header("Location: resultQCM5.php");
        break;
}

