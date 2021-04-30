<?php   
    require 'database.php';
    $id = $_GET['id'];
    $nomJoueur = $prenomJoueur = $adresse = $dateEntree = $numeroEquipe = "";
    if(!empty($_POST)) 
    {
        $nomJoueur = $_POST['nomJoueur'];
        $prenomJoueur = $_POST['prenomJoueur'];
        $adresse = $_POST['adresse'];
        $dateEntree = $_POST['dateEntree'];
        $numeroEquipe = $_POST['numeroEquipe'];
        $db = Database::connect();
        $statement = $db->prepare("UPDATE JOUEUR  set NOM_JOUEUR = ?, PRENOM_JOUEUR = ?, ADRESSE = ?, DATE_ENTREE = ? WHERE NUMERO_LICENCE = ?; UPDATE APPARTENANCE set NUMERO_EQUIPE = ? where NUMERO_LICENCE = ? ");
        $statement->execute(array($nomJoueur, $prenomJoueur, $adresse, $dateEntree,$id, $numeroEquipe, $id));
        header("Location: consult.php");
    }
    else 
    {
        $db = Database::connect();
        $statement = $db->prepare("SELECT NOM_JOUEUR, PRENOM_JOUEUR, ADRESSE, DATE_ENTREE, NUMERO_EQUIPE from JOUEUR J join APPARTENANCE A on J.NUMERO_LICENCE = A.NUMERO_LICENCE where  J.NUMERO_LICENCE = ?");
        $statement->execute(array($id));
        $row = $statement->fetch();
        $nomJoueur = $row['NOM_JOUEUR'];
        $prenomJoueur = $row['PRENOM_JOUEUR'];
        $adresse = $row['ADRESSE'];
        $dateEntree = $row['DATE_ENTREE'];
        $numeroEquipe = $row['NUMERO_EQUIPE'];

        Database::disconnect();
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
        <script src="js/script.js"></script>
        
    </head>
    <body>

        <h1 class="text-logo"> Fédération sportive de Hand-ball </h1>
        <div class="container main">
        <h1><?php   echo 'Modifier Le Joueur de Numéro de Licence ' . $id;?></h1>
        <h5>Nous vous rappelons que vous ne pouvez pas lui changer de Club</h5>
        <form class="form" action="<?php echo 'updateJoueur.php?id='.$id;?>" role="form" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nomJoueur">Nom Joueur:</label>
                <input type="text" class="form-control" id="nomJoueur" name="nomJoueur" placeholder="Nom Joueur" value="<?php echo $nomJoueur;?>">
                
            </div>
            
            <div class="form-group">
                <label for="prenomJoueur">Prenom Joueur:</label>
                <input type="text" class="form-control" id="nomJoueur" name="prenomJoueur" placeholder="Prenom Joueur" value="<?php echo $prenomJoueur;?>">
                
            </div>
            
            <div class="form-group">
                <label for="adresse">Adresse:</label>
                <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse" value="<?php echo $adresse;?>">
                
            </div>
            
            <div class="form-group">
                <label for="dateEntree">Date d'entrée:</label>
                <input type="text" class="form-control" id="dateEntree" name="dateEntree" placeholder="Date d'entrée" value="<?php echo $dateEntree;?>">
                
            </div>
            
            <div class="form-group">
                <label for="numeroEquipe">Nom Equipe:</label>
                
                <select class="form-control" id="numeroEquipe" name="numeroEquipe">
                <?php
                    $db = Database::connect();
                    $statement = $db->prepare('SELECT NUMERO_EQUIPE, NOM_EQUIPE FROM EQUIPE where NUMERO_CLUB = (Select C.NUMERO_CLUB FROM CLUB C join JOUEUR J on J.NUMERO_CLUB = C.NUMERO_CLUB where J.NUMERO_LICENCE = ?)');
                    $statement->execute(array($id));
                    while($row = $statement->fetch())
                    {
                        if($row['NUMERO_EQUIPE'] == $numeroEquipe)
                            echo '<option selected="selected" value="'. $row['NUMERO_EQUIPE'] .'">'. $row['NOM_EQUIPE'] . '</option>';
                        else
                            echo '<option value="'. $row['NUMERO_EQUIPE'] .'">'. $row['NOM_EQUIPE'] . '</option>';;
                    }
                    Database::disconnect();
                ?>
                </select>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-success"><span class="oi oi-pencil"></span> Modifier</button>
                <a class="btn btn-primary" href="consult.php"><span class="oi oi-arrow-thick-left"></span> Retour</a>
            </div>
            
        </form>    
        </div>  
        
    </body>
</html>