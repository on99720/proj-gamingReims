<?php declare(strict_types=1);

require_once ('autoload.php');
try {
    Session::start();
} catch (SessionException $e) {
}

if(!isset($_SESSION["InfosUser"]["ID"]))
{
    header("Location: findme.php");
}

$totalCorrect = $_SESSION["InfosUser"]["Score"] ?? 0;

$title = 'QCM';
$p = new WebPage($title);
$p->appendCssUrl("css/DarkTheme.css");

$p->appendContent(<<<HTML

<div class="attention">
NE PAS FERMER VOTRE NAVIGATEUR INTERNET, SOUS PEINE DE RECOMENCEMENT DU JEU. <br>
(Votre navigateur peut etre mis en veille, mais sa fermeture entraîne l'effacement totale de vos informations.)
</div>

<div class="corps">
    <h3>Vos points au total:</h3>
    <br>
    <h4>$totalCorrect / 20 correct </h4>  
    <br>
    <h4>Bravo! Plus que l'étape de ton enregistrement pour participer au le tirage au sort!</h4>
    
    <form method="post" action="FormulaireFinal.php">
       <p>
            <br />
                <label for="lenom">Ton nom :   </label>
                <input type="text" name="nom" placeholder="ton nom" size="30" required id="lenom" />
            <br />
                <label for="leprenom">Ton prénom :</label>
                <input type="text" name="pnom" placeholder="ton prénom" size="30" id="leprenom" />
            <br />
                <label for="letel">Ton n° de téléphone :</label>
                <input type="text" name="tel" placeholder="ton n°" size="20" required id="letel" />
            <br />
                <label for="lemail">Ton e-mail :  </label>
                <input type="text" name="mail" placeholder="ton@email.com" size="30" required id="lemail" />
            <br />
               <input type="hidden" name="score" id="score" value="{$_SESSION["InfosUser"]["Score"]}">
               <label for="lenivet">Ton niveau d'étude :</label>
               <select  name="nivetude" id="lenivet">
                   <option value="">--Séléctionnez le niveau d'études</option>
                   <option value="Collège">Collège</option>
                   <option value="Lycée">Lycée</option>
                   <option value="Bac">Baccalauréat</option>
                   <option value="Bac 2">Bac+2</option>
                   <option value="License">Bac+3</option>
                   <option value="Master">Bac+5</option>
                   <option value="Doctorat">Bac+8</option>
               </select>
            <br />
            <br />
                <button type = "submit" >T'enregistrer</button>
    
       </p>
       
    </form>
</div>
    <div>
        <a href="THE_VOID.php">[WIP] Go to THE VOID</a>
    </div>



HTML
);
try {
    echo $p->toHTML();
} catch (Exception $e) {
}
//setcookie("TotalPoints", "0");
//setcookie("Validator_QCM1", "",-1);
//setcookie("Validator_QCM2", "",-1);
//setcookie("Validator_QCM3", "",-1);
//setcookie("Validator_QCM4", "",-1);
//setcookie("Validator_QCM5", "",-1);
