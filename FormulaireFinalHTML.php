<?php declare(strict_types=1);

require_once ('autoload.php');
Session::start();

$title = 'Formulaire à remplir pour la cagnote';

$p = new WebPage($title);

$p->appendContent(<<<HTML


<form method="post" action="FormulaireFinal.php">
   <p>
       <label for="lenom">Nom :</label>
       <input type="text" name="nom" id="lenom" />
       
       <label for="leprenom">Prénom :</label>
       <input type="text" name="pnom" id="leprenom" />
       
       <label for="lemail">email :</label>
       <input type="text" name="mail" id="lemail" />
       
       <br />
       <input type="hidden" name="score" id="score" value="{$_SESSION["InfosUser"]["Score"]}">
       
       <label for="lenivet">Niveau détude :</label>
       <input type="text" name="nivetude" id="lenivet" />
       <button type = "submit" >submit</button>
   </p>
</form>




HTML
);
echo $p->toHTML();
