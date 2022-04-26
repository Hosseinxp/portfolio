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

<header>
    <div id="menu">
        <nav>
            <a href="vêtements_hommes.php"><button class="btn-nav" style="background-color: rgb(  72, 201, 176  );">Vêtements hommes</button></a>
            <a href="vêtements_femmes.php"><button class="btn-nav">Vêtements femmes</button></a>
            <a href="vêtements_enfants.php"><button class="btn-nav">Vêtements enfants</button></a>       
        </nav>  
    </div>
</header>

<body>
    <div class="div_vêtements">

        <!------------------- Rubrique pantalon ------------------->


        <div class="vêtements" style="transform: translateX(5vw) translateY(7vw);">
            <p class="p-vêtements">Pantalon</p>
            <img src="Pantalon_homme.jpg" class="img_vêtements">
            <div class="selection">
                Quantité : 
                <select>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
                <br>
                Couleur : 
                <select>
                    <option>Bleu</option>
                    <option>Noir</option>
                    <option>Beige</option>
                    <option>Rouge</option>
                    <option>Vert</option>
                </select>
                <br>
                Taille : 
                <select>
                    <option>M</option>
                    <option>L</option>
                    <option>XL</option>
                </select>
            </div>
        </div>
        <button class="btn-achat" style="transform: translateX(6.3vw) translateY(6vw);">Payer : 24,99€</button>

        <!------------------- Rubrique veste ------------------->


        <div class="vêtements" style="transform: translateX(30vw) translateY(-23.2vw);">
            <p class="p-vêtements">Veste</p>
            <img src="Veste_homme.jpg" class="img_vêtements">

            <div class="selection">
                Quantité : 
                <select>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
                <br>
                Couleur : 
                <select>
                    <option>Bleu</option>
                    <option>Noir</option>
                    <option>Beige</option>
                    <option>Rouge</option>
                    <option>Vert</option>
                </select>
                <br>
                Taille : 
                <select>
                    <option>M</option>
                    <option>L</option>
                    <option>XL</option>
                </select>
            </div>
        </div>
        <button class="btn-achat" style="transform: translateX(31vw) translateY(-24.2vw);">Payer : 49,99€</button>

        <!------------------- Rubrique chemise ------------------->


        <div class="vêtements" style="transform: translateX(55vw) translateY(-53.6vw);">
            <p class="p-vêtements">Chemise</p>
            <img src="Chemise_homme.jpg" class="img_vêtements">

            <div class="selection">
                Quantité : 
                <select>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
                <br>
                Couleur : 
                <select>
                    <option>Bleu</option>
                    <option>Noir</option>
                    <option>Beige</option>
                    <option>Rouge</option>
                    <option>Vert</option>
                </select>
                <br>
                Taille : 
                <select>
                    <option>M</option>
                    <option>L</option>
                    <option>XL</option>
                </select>
            </div>
        </div>
        <button class="btn-achat" style="transform: translateX(56.2vw) translateY(-54.7vw);">Payer : 19,99€</button>
    </div>
    <button class="consultation_stock">Consultation stock vêtements hommes</button>
</body>
</html>