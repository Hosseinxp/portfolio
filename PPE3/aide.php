
<!------------------- Inscription ----------------------->


<?php
    // Traitement des donnees du formulaire
    // Tester les donnees du formulaire
    $isOk = true;

    if(isset($_POST['valider'])){
        // if(!isset($_POST['nom']) || !isset($_POST['prenom'])  !isset($_POST['email']) || !isset($_POST['password'])  !isset($_POST['confirmPassword'])) {
        //     $isOk = false;
        //     echo "Une des données du formulaire n'existe pas !";
        // }
        // if(empty($_POST['nom']) || empty($_POST['prenom'])  empty($_POST['email']) || empty($_POST['password'])  empty($_POST['confirmPassword'])) {
        //     $isOk = false;
        //     echo "Une données, à minima, du formulaire est vide !";
        // }

        if(htmlspecialchars($_POST['password']) != htmlspecialchars($_POST['confirmPassword'])){
            $isOk = false;
            header('Location: mdp_inscription.html');
        }

        if($isOk == true){
            // Insertion des donnees formulaire dans la table
            // connexion
            try { 

                // Connexion a la BDD
                $pdo = new PDO("mysql:host=localhost;dbname=achatenligne","root","root"); 
                // echo "Connexion BDD OK";

                // Requete INSERT en mode prepare
                $ins = $pdo->prepare("insert into connexion (nom,prenom,email,password) values (?,?,?,?)");
                $ins->execute (array (htmlspecialchars($_POST['nom']), htmlspecialchars($_POST['prenom']), htmlspecialchars($_POST['email']), htmlspecialchars($_POST['password'])));

                header('Location: mess_inscription.html');

            }
            catch(PDOException $e){ 
                echo $e->getMessage(); 
            }
        }
    }
?>



<!---------------------- Connexion ------------------------->



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
                    echo "Connexion réussie"
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