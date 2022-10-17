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
    <div>
    <a href="index.php">Lieu de l'EPSI QRcode</a>
    </div>
    
    <div id="redirects">
    <li>
    <a href="qcm1o.php">Go to QRcode1</a>
    </li>   
    <li>
    <a href="qcm2u.php">Go to QRcode2</a>
    </li>   
    <li>
    <a href="qcm3i.php">Go to QRcode3</a>
    </li>   
    <li>
    <a href="qcm4y.php">Go to QRcode4</a>
    </li>   
    <li>
    <a href="qcm5m.php">Go to QRcode5</a>
    </li>
    </div>
    <br/>
    <div>
    <a href="ResultCurrent.php">Résultats actuels</a>
    </div>
    <div>
    <a href="PageMere.php">Page Mère</a>
    </div>
    <div>
    <a href="resultfinal.php">Go to Final Result</a>
    </div>
    <div>
    <a href="endpage.php">Page de fin</a>
    </div>
    <br/>
    <div>
    <a href="Geolocalisateur.php">Géolocalisation</a>
    </div>
</div>

HTML
);
try {
    echo $p->toHTML();
} catch (Exception $e) {
}