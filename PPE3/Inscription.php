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
        <form method="POST">
            <fieldset id="field-inscription">
                <div class="titre-form">Inscription</div>
                <input class="input-inscription" placeholder="Nom" name="nom" require></input>
                <input class="input-inscription" placeholder="Prénom" name="prenom" require></input>
                <input type="email" class="input-inscription" placeholder="Adresse mail" name="email" require></input>
                <input type="email" class="input-inscription" placeholder="Confirmez email" name="confirm_email" require></input>
                <input type="password" class="input-inscription" placeholder="Entrez un mot de passe" name="password" require></input>
                <input type="password" class="input-inscription" placeholder="Confirmez mot de passe" name="confirm_password" require></input>
                <button type="submit" class="btn-envoi" name="valider">Envoyer</button>
            </fieldset>
        </form>
    </div>

<?php

$host= "localhost";
$dbname= "achatenligne";
$user= "root";
$pass= "";

$isOk = true;

if($_POST['password'] != $_POST['confirm_password']) {
    $isOk = false;
    echo "les 2 mots de passe sont differents, veuillez recommercer!";}

if($_POST['email'] != $_POST['confirm_email']) {
    $isOk = false;
    echo "les 2 email sont differents, veuillez recommencer !";}


if($isOk == true) {


try{
    $newBD = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    echo "Connexion établie";
} catch (PDOException $e){
    die("Erreur : " .$e->getMessage());
}

if (isset($_POST["nom"]) && 
    isset($_POST["prenom"]) && 
    isset($_POST["email"]) && 
    isset($_POST["confirm_email"]) && 
    isset($_POST["password"]) && 
    isset($_POST["confirm_password"]))
{
         $insertion=$newBD->prepare("INSERT INTO users VALUES(:nom, :prenom, :email, :confirm_email, :password, :confirm_password)");
         $insertion->bindValue(":nom", (htmlspecialchars($_POST["nom"])));
         $insertion->bindValue(":prenom", (htmlspecialchars($_POST["prenom"])));
         $insertion->bindValue(":email", (htmlspecialchars($_POST["email"])));
         $insertion->bindValue(":confirm_email", (htmlspecialchars($_POST["confirm_email"])));
         $insertion->bindValue(":password", (htmlspecialchars($_POST["password"])));
         $insertion->bindValue(":confirm_password", (htmlspecialchars($_POST["confirm_password"])));
         $verification=$insertion->execute();

         if ($verification){echo "Insertion réussie";
                            header('Location: Accueil-PPE.php');} 
         
         else{ echo "Echec d'insertion";}
}
}
// else{ echo "Une variable n'est pas déclarée et ou est null";}


?>



</body>

</html>