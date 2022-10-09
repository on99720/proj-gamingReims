<?php declare(strict_types=1);
require_once "autoload.php";
try {
    Session::start();
} catch (SessionException $e) {
}

$title= "Trouve Moi";
$p = New WebPage($title);

$p->appendToHead(<<<HTML
<meta http-equiv="Refresh"/>

HTML
);
$p->appendContent(<<<HTML
<h1 style="text-align: center;">Scanner le Qr Code du prochain stand</h1>
<hr>

    <form action="PageMere.php">
      <button type="submit">RETOUR</button>
    </form>
    
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

let html5QrcodeScanner = new Html5QrcodeScanner("reader", {
  fps: 15,
  qrbox: {width: 250, height: 250},
  rememberLastUsedCamera: false
});
html5QrcodeScanner.render(onScanSuccess, onScanError);

</script>

<form action="PageMere.php">
  <button type="submit">RETOUR</button>
</form>
HTML

);
try {
    echo $p->toHTML();
} catch (Exception $e) {
}