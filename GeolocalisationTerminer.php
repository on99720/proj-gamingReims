<?php declare(strict_types=1);
require_once "autoload.php";

try {
    Session::start();
} catch (SessionException $e) {
    header("Location: ErreurPage.php");
    return;
}

if(!isset($_SESSION["InfosUser"]["VerifGeoloc"]))
{
    header("Location: findme.php");
}
else
{

//    unset($_SESSION["InfosUser"]["VerifGeoloc"]);
    session_destroy();
    try {
        Session::start();
    } catch (SessionException $e) {
        header("Location: ErreurPage.php");
        return;
    }

    $_SESSION["InfosUser"]["VerifGeoloc"] = true;
    header("Location: index.php");

}