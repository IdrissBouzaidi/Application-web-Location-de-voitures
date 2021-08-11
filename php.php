<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma page WEB</title>
    <link rel = "stylesheet" href="CSS/fichier.css"/>
</head>
<body>
    <div id = "menu">
        <a href="php.php" style="display: inline-block;">
            <img src = "Images/accueil.png" id = "ImageAccueil"/>
        </a>
        <p id = "OptionsMenu1">Rechercher</p>
        <p id = "OptionsMenu2">Déposer une annonce</p>
        <p id = "OptionsMenu3">Se connecter</p>
    </div>
        <center>
            <img src="Images/image de recherche.png" id = "image_LocationDeVoitures"/>
            <div id = "DernierDiv">
                <form action = "php.php" method = "POST">
                    <select name = "abcd">
                        <option value="Choisir le pays" selected>Choisir le pays</option>
                        <?php
                            $connection = new mysqli("localhost", "root", "", "corona");
                            $requete = $connection->query("select * from pays");
                            for($i = 0; $i < $requete->num_rows; $i++){
                                $requete->data_seek($i);
                                $row = $requete->fetch_assoc();
                                echo "<option value = " . $row['pays'] . ">" . $row['pays'] . "</option>";
                            }
                            $x = $_POST["abcd"];
                        ?>
                    </select>
                    <select>
                        <option value="Choisir la ville" selected>Choisir la ville</option>
                        <option value="Casablanca" >Casablanca</option>
                    </select>
                    <select>
                        <option value="Choisir la marque" selected>Choisir la marque</option>
                        <option value="BMW" >BMW</option>
                    </select>
                    <input type = "submit" value = "Envoyer"/>
                </form>
                <p class = "CarreauDeRecherche">
                    hgkdjdlmfdfs hgkdjdlmfdfs Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sapiente libero repellat, sequi quasi illo modi veniam suscipit. Dignissimos officia ad a aut, saepe facilis sunt veniam aperiam cumque. Dolorum, error. Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque qui expedita iusto corporis nemo corrupti consequuntur cupiditate delectus eaque soluta placeat est voluptatibus officiis, excepturi sed eum enim reiciendis atque.
                </p>
                <p class = "CarreauDeRecherche">
                    jjkjkj
                </p>
            </div>
        </center>
</body>
</html>
<?php
echo $x . "abcdefgh";
?>