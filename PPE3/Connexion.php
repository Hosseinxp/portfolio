<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_PPE.css">

    <title>GRETA Store Shop</title>
    <a href="Accueil-PPE.php"><h1><button id="btn-accueil">GRETA Store Shop</button></h1></a>
    <div>
        <a href="Connexion.php"><button class="btn-identification">Connexion</button></a>
        <a href="Inscription.php"><button class="btn-identification">S'inscrire</button></a>
    </div>
</head>

<body>
    <div>
        <form method="post" action="Connexion.php">
            <fieldset id="field-inscription">
                <div class="titre-form">Connexion</div>

                <input class="input-connexion" placeholder="Adresse email" type="email" name="email" require></input><br>
                <input type="password" class="input-connexion" placeholder="Mot de passe" type="password" name="password" require></input>
                <button class="btn-envoi" type="submit" name="connexion">Se connecter</button>

            </fieldset>
        </form>
    </div>


    <?php

// Acces a la base de données
if(!isset($_POST["email"]) || !isset($_POST["password"])){
    echo "Tous les champs n'ont pas été rempli !";
}
else {
    try { 

        // Connexion a la BDD
        $pdo = new PDO("mysql:host=localhost;dbname=achatenligne","root","");

        // Requete INSERT en mode prepare
        $sel = $pdo->prepare("select email, password from users where email=? and password=?");
        $sel->execute(array(htmlspecialchars($_POST["email"]), htmlspecialchars($_POST["password"])));

            if($ligne = $sel->fetch()){
                echo "Connexion réussie";
                header('Location: Accueil-PPE.php');
            }
            else{
                echo "Veuillez réessayer";
                header('Location: Connexion.php');
            }
    }
    catch(PDOException $e){ 
        echo $e->getMessage("erreur brother"); 
    }
}
?>
</body>


</html>

