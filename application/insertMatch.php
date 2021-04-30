<?php
     
    require 'database.php';

    $numeroRencontre = $numeroEquipe1 = $numeroEquipe2 = $dateRencontre = $pointE1 = $pointE2= "";

    if(!empty($_POST)) 
    {
        
        $numeroEquipe1 = $_POST['numeroEquipe1'];
        $numeroEquipe2 = $_POST['numeroEquipe2'];
        $dateRencontre = $_POST['dateRencontre'];
        $pointE1 = $_POST['pointE1'];
        $pointE2 = $_POST['pointE2'];
        
        $db = Database::connect();
        $statement = $db->prepare("INSERT INTO `RENCONTRE` (`POINTE1`, `POINTE2`, `DATE_RENCONTRE`) values(?,?,?)");
        $statement->execute(array($pointE1, $pointE2, $dateRencontre));

        $statement1 = $db->prepare("SELECT `NUMERO_RENCONTRE` FROM `RENCONTRE` ORDER BY `NUMERO_RENCONTRE` DESC LIMIT 1 ");
        $statement1->execute();

        $row = $statement1->fetch();
        $numeroRencontre = $row['NUMERO_RENCONTRE'];
        $statement2 = $db->prepare("INSERT INTO `PARTIE` (`NUMERO_RENCONTRE`, `NUMERO_EQUIPE1`, `NUMERO_EQUIPE2` ) values(?,?,?); ");
        
        $statement2->execute(array($numeroRencontre, $numeroEquipe1, $numeroEquipe2));

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
                    <h1><strong>Ajouter un Match</strong></h1>
                    <br>
                    <form class="form" action="insertMatch.php" role="form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                            <label for="numeroEquipe1">Equipe 1</label>
                            <select class="form-control" id="numeroEquipe1" name="numeroEquipe1">
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
                            <label for="numeroEquipe2">Equipe 2 : Attention choisir une équipe différente </label>
                            <select class="form-control" id="numeroEquipe2" name="numeroEquipe2">
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
                            <label for="dateRencontre">Date de Rencontre</label>
                            <input type="date" class="form-control" id="dateRencontre" name="dateRencontre" placeholder="Date de Rencontre" value="<?php echo $dateRencontre;?>">
                        </div>

                        <div class="form-group">
                            <label for="pointE1">Points EQUIPE 1</label>
                            <input type="number" class="form-control" id="pointE1" name="pointE1" placeholder="Points EQUIPE 1" value="<?php echo $pointE1;?>">
                        </div>

                        <div class="form-group">
                            <label for="pointE2">Points EQUIPE 2</label>
                            <input type="number" class="form-control" id="pointE2" name="pointE2" placeholder="Points EQUIPE 2" value="<?php echo $pointE2;?>">
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