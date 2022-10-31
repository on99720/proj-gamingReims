<?php declare(strict_types=1);

require_once ('autoload.php');
try {
    Session::start();
} catch (SessionException $e) {
    header("Location: ErreurPage.php");
    return;
}


// Valide le numero de telephone
if (!preg_match('/^[0-9]{10}+$/', $_POST['tel'])) {
    echo('Le n° de téléphone n\'est pas valide.');
    return;
}

if ($_POST['tel']=="" Or $_POST['mail']=="" Or $_POST['nom']=="")
{
    echo('Il faut un n° de téléphone, un email et un nom pour soumettre le formulaire.');
    return;
}
// Valide taille des entrées
if (strlen($_POST['nom']) > 20 Or (strlen($_POST['pnom']) > 20))
{
    echo('nom ou prénom trop grand');
    return;
}
// Valide l'email
if(!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
    echo "L'adresse e-mail n'est pas valide";
    return;
}





//triche détecté
if (isset($_SESSION['COMMENCEMENT_TIME']) && (time() - $_SESSION['COMMENCEMENT_TIME'] < 900)) {
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

                try{
                    $reponse = MyPDO::getInstance()->query("SELECT DevMod FROM developeur");
                    $donnees = $reponse -> fetchAll();
                    if ($donnees[0]['DevMod']) {
                        $p->appendContent(<<<HTML
                            </div>
                            <div class="corps">
                                <h2>Mode développeur</h2>
                                <br>
                                <p>Triche volontaire ?</p>
                                <form method="post">
                                    <input type="hidden" name="nom" value="{$_POST['nom']}" />
                                    <input type="hidden" name="pnom" value="{$_POST['pnom']}" />
                                    <input type="hidden" name="tel" value="{$_POST['tel']}" />
                                    <input type="hidden" name="mail" value="{$_POST['mail']}" />
                                    <input type="hidden" name="score" value="{$_POST['score']}"/>
                                    <input type="hidden" name="nivetude" value="{$_POST['nivetude']}"/>
                                    <input type="submit" name="submit" value="OK">
                                </form>
                                <br>
                            </div>
                        HTML
                        );
                    }
                }
                catch (Exception $e) {
                    header("Location: ErreurPage.php");
                    return;
                }



    if (!isset($_POST['submit'])) {
        try {
            echo $p->toHTML();
        } catch (Exception $e) {
            header("Location: ErreurPage.php");
            return;
        }
        return;
    }

}

try {

    //vérifie l'identité

    $reponse = MyPDO::getInstance()->query("SELECT identitee FROM utilisateur");
    $donnees = $reponse -> fetchAll();
    $jcount = count($donnees);
    
    $myident =$_SESSION["InfosUser"]["IDent"];

    $bon = false;
    for($j = 0; $j < $jcount; $j++){
        $numbdd = $donnees[$j]['identitee'];
        if($numbdd == $myident){
            $bon =true;
            break 1;
        }
    }


    //identité valide, entré dans dans la bdd

    if($bon == true){
        
        $req = MyPDO::getInstance()->prepare(<<<SQL
            update Utilisateur 
            set nom = :nom,pnom=:pnom,mail=:mail,score=:score,nivEtude=:nivetude,Telephone=:tel
            where identitee = :identitee
        SQL
        );

        $req->execute([
            'identitee'=> $_SESSION["InfosUser"]["IDent"],
            'nom'=> $_POST['nom'],
            'pnom'=>$_POST['pnom'],
            'mail'=>$_POST['mail'],
            'score'=>$_POST['score'],
            'nivetude'=>$_POST['nivetude'],
            'tel'=>$_POST['tel']
        ]);



        $_SESSION["InfosUser"]["alerte"]= "Tes informations ont bien été enregistré.";
        header("Location: endpage.php");



    }
    else{
        header("Location: ErreurPage.php");
        return;
    }


} catch (Exception $e) {
    header("Location: ErreurPage.php");
    return;
}



