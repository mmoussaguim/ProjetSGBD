<?php
     
    require 'database.php';

    $numeroClub = $nomEntraineur = $prenomEntraineur = $dateEntree = $numeroEquipe = "";
    if(!empty($_POST)) 
    {
        $numeroClub = $_POST['numeroClub'];
        $numeroEquipe = $_POST['numeroEquipe'];
        $nomEntraineur = $_POST['nomEntraineur'];
        $prenomEntraineur = $_POST['prenomEntraineur'];
        $dateEntree = $_POST['dateEntree']; 
        $db = Database::connect();
        $statement = $db->prepare("INSERT INTO `ENTRAINEUR` (`NUMERO_CLUB`, `NOM_ENTRAINEUR`, `PRENOM_ENTRAINEUR`, `DATE_ENTREE`) values(?, ?, ?, ?)");
        $statement->execute(array($numeroClub, $nomEntraineur, $prenomEntraineur, $dateEntree));
        $statement1 = $db->prepare("SELECT `NUMERO_ENTRAINEUR` FROM `ENTRAINEUR` ORDER BY `NUMERO_ENTRAINEUR` DESC LIMIT 1 ");
        $statement1->execute(array());
        $row = $statement1->fetch();
        $numeroEntraineur = $row['NUMERO_ENTRAINEUR'];
        $statement2 = $db->prepare("INSERT INTO `ENTRAINEMENT` (`NUMERO_ENTRAINEUR`, `NUMERO_EQUIPE`) values(?, ?)");
        
        $statement2->execute(array($numeroEntraineur, $numeroEquipe));
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
                    <h1><strong>Ajouter un Entraineur</strong></h1>
                    <br>
                    <form class="form" action="insertEntraineur.php" role="form" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                            <label for="nomEntraineur">Nom </label>
                            <input type="text" class="form-control" id="nomEntraineur" name="nomEntraineur" placeholder="Nom" value="<?php echo $nomEntraineur;?>">
                        </div>
                    
                        
                        <div class="form-group">
                            <label for="prenomEntraineur">Prénom</label>
                            <input type="text" class="form-control" id="prenomEntraineur" name="prenomEntraineur" placeholder="Prénom" value="<?php echo $prenomEntraineur;?>">
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