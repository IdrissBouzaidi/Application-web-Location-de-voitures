<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include("Menu.php"); ?>
    <link rel = "stylesheet" href="CSS/PageDeposerUnePublicite.css"/>
</head>
<body>
    <div id = "ApresMenu">
        <div id = "BackgroundConnexion">
            <center>
                <p class = "Text">
                    Veuillez remplir ces informations
                </p>
                <form action = "PageAjouterImageVoiture.php">
                    <select style = "width: 320px; color: rgb(128, 128, 128);" class = "formulaire" required>
                        <option value="Choisir le pays" disabled selected style = "background-color: rgba(200, 200, 200, 255);">Choisir le pays</option>
                        <?php
                            $connection = new mysqli("localhost", "root", "", "applicationweblocationdevoitures");
                            $requete = $connection->query("select * from pays");
                            $connection->set_charset("utf8");
                            mysqli_set_charset($connection, "utf8");
                            for($i = 0; $i < $requete->num_rows; $i++){
                                $requete->data_seek($i);
                                $row = $requete->fetch_assoc();
                                echo "<option style = 'background-color: rgba(230, 230, 230, 0.8);' value = " . $row['pays'] . ">" . $row['pays'] . "</option>";
                            }
                        ?>
                    </select>
                    <input type = "text" class = "formulaire" placeholder = "Saisir la ville" required pattern = "[A-Za-z_-]{2,50}"><br/>
                    <select style = "width: 320px; color: rgb(128, 128, 128);" class = "formulaire" required>
                        <option value="Choisir la marque" disabled selected style = "background-color: rgba(200, 200, 200, 255);">Choisir la marque</option>
                        <?php
                            $requete = $connection->query("select * from marques_noms");
                            for($i = 0; $i < $requete->num_rows; $i++){
                                $requete->data_seek($i);
                                $row = $requete->fetch_assoc();
                                echo "<option style = 'background-color: rgba(230, 230, 230, 0.8);' value = " . $row['marque'] . ">" . $row['marque'] . "</option>";
                            }
                        ?>
                    </select>
                    <input type = "text" class = "formulaire" placeholder = "Saisir le modèle" required pattern = "[A-Za-z_-]{2,50}"><br/>
                    <input type = "text" class = "formulaire" placeholder = "Saisir le prix/Jour" required pattern = "[0-9]{1,5}"><br/>
                    <label class = "Text" id = "label">Ecrire une description sur la voiture</label><br/>
                    <textarea class = "formulaire"></textarea><br/>
                    <div id = "DivConnexion">
                        <div id = "BouttonEnvoyer">
                            <input type = "submit" id = "BouttonConnexion" class = "formulaire" value = "Continuer">
                        </div>
                    </div>
                </form>
            </center>
        </div>
    </div>
</body>
</html>