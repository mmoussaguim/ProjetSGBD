<?php
     
    require 'database.php';

    $numeroClub = $nomJoueur = $prenomJoueur = $numeroEquipe =$adresse = $dateDeNaissance = $dateEntree = $numeroLicence ="";
    if(!empty($_POST)) 
    {
        $nomJoueur = $_POST['nomJoueur'];
        $prenomJoueur = $_POST['prenomJoueur'];
        $adresse = $_POST['adresse'];
        $dateDeNaissance = $_POST['dateDeNaissance'];
        $dateEntree = $_POST['dateEntree'];
        $numeroEquipe = $_POST['numeroEquipe'];
        $numeroClub = $_POST['numeroClub'];
        $db = Database::connect();
        $statement = $db->prepare("INSERT INTO `JOUEUR`(`NUMERO_CLUB`, `NOM_JOUEUR`, `PRENOM_JOUEUR`, `ADRESSE`, `DATE_DE_NAISSANCE`, `DATE_ENTREE`) VALUES (?,?,?,?,?,?);");
        $statement->execute(array($numeroClub, $nomJoueur, $prenomJoueur, $adresse, $dateDeNaissance, $dateEntree));
        $statement1 = $db->prepare("select NUMERO_LICENCE from JOUEUR where NUMERO_CLUB = ? and NOM_JOUEUR = ? and PRENOM_JOUEUR = ? and DATE_DE_NAISSANCE = ?");
        $statement1->execute(array($numeroClub, $nomJoueur, $prenomJoueur, $dateDeNaissance));

        $row = $statement1->fetch();
        $numeroLicence = $row['NUMERO_LICENCE'];
        $statement2 = $db->prepare("INSERT INTO `APPARTENANCE` (`NUMERO_LICENCE`, `NUMERO_EQUIPE`) values(?, ?)");
        
        $statement2->execute(array($numeroLicence, $numeroEquipe));
        Database::disconnect();
        header("Location: insert.php");
        
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Tournoi de Handball</title>
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="jquery-3.5.1.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <link href="./open-iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">


        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Holtwood+One+SC" />
        <link rel="stylesheet" href="css/style.css">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        
    </head>
    <body>

        <h1 class="text-logo"> Fédération sportive de Hand-ball </h1>
        <div class="container main">

            <div class="row">
                <div class="col-lg">
                    <h1><strong>Ajouter un Joueur</strong></h1>
                    <br>
                    <form class="form" action="insertJoueur.php" role="form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nomJoueur">Nom </label>
                            <input type="text" class="form-control" id="nomJoueur" name="nomJoueur" placeholder="Nom" value="<?php echo $nomJoueur;?>">
                        </div>
                    
                        
                        <div class="form-group">
                            <label for="prenomJoueur">Prénom</label>
                            <input type="text" class="form-control" id="prenomJoueur" name="prenomJoueur" placeholder="Prénom" value="<?php echo $prenomJoueur;?>">
                        </div>
                       
                        <div class="form-group">
                            <label for="adresse">Adresse</label>
                            <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse" value="<?php echo $adresse;?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="dateDeNaissance">Date de Naissance</label>
                            <input type="date" class="form-control" id="dateDeNaissance" name="dateDeNaissance" placeholder="Date de Naissance" value="<?php echo $dateDeNaissance;?>">
                        </div>

                        <div class="form-group">
                            <label for="numeroClub">Club</label>
                            <select class="form-control" id="numeroClub" name="numeroClub">
                            <?php
                                $db = Database::connect();
                                $result = $db->query("SELECT * FROM CLUB");
                                foreach($result as $rows)
                                {
                                    echo '<option value="'. $rows['NUMERO_CLUB'] .'">'. $rows['NOM_CLUB'] . '</option>';
                                }
                               Database::disconnect();
                            ?>
                            </select>
                        </div>

                        <h5>Attention, veuillez entrer une equipe appartenant au club selectionné</h5>

                        <div class="form-group">
                            <label for="numeroEquipe">Equipe</label>
                            <select class="form-control" id="numeroEquipe" name="numeroEquipe">
                            <?php
                                $db = Database::connect();
                                $result = $db->query("SELECT NUMERO_EQUIPE, NOM_EQUIPE FROM EQUIPE");
                                foreach($result as $rows)
                                {
                                    echo '<option value="'. $rows['NUMERO_EQUIPE'] .'">'. $rows['NOM_EQUIPE'] . '</option>';
                                }
                               Database::disconnect();
                            ?>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="dateEntree">Date d'Entrée</label>
                            <input type="date" class="form-control" id="dateEntree" name="dateEntree" placeholder="Date Entree" value="<?php echo $dateEntree;?>">
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"><span class="oi oi-pencil"></span> Ajouter</button>
                            <a class="btn btn-primary" href="insert.php"><span class="oi oi-arrow-thick-left"></span> Retour</a>
                       </div>
                    </form>
                </div>
            </div>
            
        </div>  
        
    </body>
</html>