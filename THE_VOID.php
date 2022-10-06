<?php declare(strict_types=1);

require_once ('autoload.php');
Session::start();

$title = 'C\'est la fin';

$p = new WebPage($title);

$p->appendContent(<<<HTML
  <div id="redirects">
  <li>
    <a href="qcm1.php">Go to QRcode1</a>
  </li>   
  <li>
    <a href="qcm2.php">Go to QRcode2</a>
  </li>   
  <li>
    <a href="qcm3.php">Go to QRcode3</a>
  </li>   
  <li>
    <a href="qcm4.php">Go to QRcode4</a>
  </li>   
  <li>
    <a href="qcm5.php">Go to QRcode5</a>
  </li>
    
  </div>
  <div>
    <a href="resultfinal.php">Go to Final Result</a>
  </div>

HTML
);
 echo $p->toHTML();