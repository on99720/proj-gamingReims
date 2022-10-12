<?php declare(strict_types=1);
require_once "autoload.php";
try {
    Session::start();
} catch (SessionException $e) {
}

if(!isset($_SESSION["InfosUser"]["VerifGeoloc"]))
{
    header("Location: findme.php");
}
else
{
    unset($_SESSION["InfosUser"]["VerifGeoloc"]);
    $_SESSION["InfosUser"]["VerifGeoloc"] = true;
    header("Location: index.php");

}