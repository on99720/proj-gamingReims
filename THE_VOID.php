<?php declare(strict_types=1);

require_once ('autoload.php');
try {
    Session::start();
} catch (SessionException $e) {
    header("Location: ErreurPage.php");
    return;
}

//$AccessVOID = false;
$AccessVOID = true;

$title = 'VOID';

$p = new WebPage($title);

$p->appendCssUrl("css/DarkTheme.css");


if($AccessVOID){

    $p->appendContent(<<<HTML
    <div class="corps">
    
        <li>
            <a href="Geolocalisateur.php">Géolocalisation</a>
        </li>
        <li>
            <a href="index.php">(Lieu de l'EPSI QRcode)</a>
        </li>
        <br>
        
        <div id="redirects">
            <li>
            <a href="qcmo1.php">Go to QRcode1</a>
            </li>   
            <li>
            <a href="qcmu2.php">Go to QRcode2</a>
            </li>   
            <li>
            <a href="qcmi3.php">Go to QRcode3</a>
            </li>   
            <li>
            <a href="qcmy4.php">Go to QRcode4</a>
            </li>   
            <li>
            <a href="qcmm5.php">Go to QRcode5</a>
            </li>
        </div>
        
        <Br>
        <li>
        <a href="ResultCurrent.php">Résultats actuels</a>
        </li>   
        <li>
        <a href="PageMere.php">Page Mère</a>
        </li>   
        <li>
        <a href="resultfinal.php">Go to Final Result</a>
        </li>   
        <li>
        <a href="endpage.php">Page de fin</a>
        </li>
    
    </div>
    
    HTML
    );
}
else{
    $p->appendContent(<<<HTML
    <div class="corps">
        <h3> Accès réservé aux dévelopeurs</h3>
    </div>
    
    HTML
    );
}


try {
    echo $p->toHTML();
} catch (Exception $e) {
    header("Location: ErreurPage.php");
    return;
}