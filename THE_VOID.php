<?php declare(strict_types=1);

require_once ('autoload.php');
try {
    Session::start();
} catch (SessionException $e) {
}

$title = 'C\'est la fin';

$p = new WebPage($title);

$p->appendCssUrl("css/DarkTheme.css");
$p->appendContent(<<<HTML
<div class="corps">
    <li>
        <a href="index.php">Lieu de l'EPSI QRcode</a>
    </li>
    <Br>
    
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
    <Br>
    
    <li>
    <a href="Geolocalisateur.php">Géolocalisation</a>
    </li>
</div>

HTML
);
try {
    echo $p->toHTML();
} catch (Exception $e) {
}