<?php declare(strict_types=1);
require_once "autoload.php";
try {
    Session::start();
} catch (SessionException $e) {
    header("Location: ErreurPage.php");
    return;
}

$title= "Triche";
$p = New WebPage($title);

$p->appendCssUrl("css/DarkTheme.css");
$p->appendContent(<<<HTML
    <div class="corps">
        <h1>Triche détecté.</h1>
        <br>
        <br>
        <br>
HTML
);

//if (isset($_SESSION["InfosUser"]["AccessVOID"]) && $_SESSION["InfosUser"]["AccessVOID"]) {
//    $p->appendContent(<<<HTML
//                <p>Triche volontaire ?</p>
//                <form action="FormulaireFinal.php" method="post">
//                    <input type="hidden" name="reply" id="reply" value="OUI">
//                    <button type="submit">OUI</button>
//                </form>
//                <br>
//            </div>
//    HTML
//    );
//
//}

try {
    echo $p->toHTML();
} catch (Exception $e) {
    header("Location: ErreurPage.php");
    return;
}