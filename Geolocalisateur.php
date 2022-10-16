<?php declare(strict_types=1);
require_once "autoload.php";
try {
    Session::start();
} catch (SessionException $e) {
}
session_destroy();

try {
    Session::start();
} catch (SessionException $e) {
}

if(!isset($_SESSION["InfosUser"]))
{
    $_SESSION["InfosUser"]= [];
}
if(!isset($_SESSION["InfosUser"]["VerifGeoloc"]))
{
    $_SESSION["InfosUser"]["VerifGeoloc"] = false;
}


$title= "Géolocalisation nécessaire";
$p = New WebPage($title);

$p->appendCssUrl("css/DarkTheme.css");
$p->appendContent(<<<HTML

    <div class="corps">
        <p id="demo">Click sur ce boutton pour vérifier ta présence sur le lieu du jeu.</p>
        <button onclick="getLocation()">Valider ma présence</button>
    </div>
    
    
    <script>
    const x=document.getElementById("demo");
    
    function getLocation()
    {
        if (navigator.geolocation)
        {
            navigator.geolocation.getCurrentPosition(showPosition);
        }
        else{x.innerHTML="Geolocation n’est pas prise en charge par ce navigateur.";}
    }
    
    
    function showPosition(position)
      {
          const lat=position.coords.latitude;
          const lon=position.coords.longitude;
          const dlat=Math.abs(lat-49.240987);
          const dlon=Math.abs(lon-4.0552030);
          if ((dlat<0.03)&&(dlon<0.03))
          {
              window.location.href = "GeolocalisationTerminer.php";   
          }
           else{
               x.innerHTML="La position détecté est trop éloigné ou est invalide. Vérifiez vos parametres d'emplacement, ou utilisez un autre navigateur, comme Google Chrome.<br>"
               +"<br>Vos coordonées GPS indiquées : <br>"+dlat+"<br>"+dlon+"<br> (Non valide)";
           }
      }
    </script>


HTML
);
try {
    echo $p->toHTML();
} catch (Exception $e) {
}