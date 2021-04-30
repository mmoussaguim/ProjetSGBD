<?php
     
    require 'database.php';

    $nomPersonnel = $prenomPersonnel = $adresse = $numeroClub = $poste = "";
    if(!empty($_POST)) 
    {
        $numeroClub = $_POST['numeroClub'];
        $nomPersonnel = $_POST['nomPersonnel'];
        $prenomPersonnel = $_POST['prenomPersonnel'];
        $adresse = $_POST['adresse'];
        $poste = $_POST['poste'];
        $db = Database::connect();
        $statement = $db->prepare("INSERT INTO PERSONNEL (NOM_PERSONNEL, PRENOM_PERSONNEL, ADRESSE) values(?,?,?); INSERT INTO FONCTION (NUMERO_CLUB, NOM_POSTE) values(?,?)");
        $statement->execute(array($nomPersonnel, $prenomPersonnel, $adresse, $numeroClub, $poste));
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
                    <h1><strong>Ajouter un Personnel</strong></h1>
                    <br>
                    <form class="form" action="insertPersonnel.php" role="form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nomPersonnel">Nom Personnel</label>
                            <input type="text" class="form-control" id="nomPersonnel" name="nomPersonnel" placeholder="Nom du Personnel" value="<?php echo $nomPersonnel;?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="prenomPersonnel">Prénom Personnel</label>
                            <input type="text" class="form-control" id="prenomPersonnel" name="prenomPersonnel" placeholder="Prénom du Personnel" value="<?php echo $prenomPersonnel;?>">
                        </div>
                       
                        <div class="form-group">
                            <label for="adresse">Adresse du Personnel</label>
                            <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse du Personnel" value="<?php echo $adresse;?>">
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
                            <label for="poste">Poste occupé</label>
                            <select class="form-control" id="poste" name="poste">
                            <?php
                               $db = Database::connect();
                               foreach ($db->query('SELECT distinct NOM_POSTE FROM FONCTION') as $row) 
                               {
                                    echo '<option value="'. $row['NOM_POSTE'] .'">'. $row['NOM_POSTE'] . '</option>';;
                               }
                               Database::disconnect();
                            ?>
                            </select>
                            
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