<?php
     
    require 'database.php';

    $numeroClub = $numeroCategorie = $nomEquipe = "";
    if(!empty($_POST)) 
    {
        $nomEquipe = $_POST['nomEquipe'];
        $numeroClub = $_POST['numeroClub'];
        $numeroCategorie = $_POST['numeroCategorie'];
        $db = Database::connect();
        $statement = $db->prepare("INSERT INTO EQUIPE (NOM_EQUIPE, NUMERO_CATEGORIE, NUMERO_CLUB) values(?,?,?)");
        $statement->execute(array($nomEquipe, $numeroCategorie, $numeroClub));
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
                    <h1><strong>Ajouter une Equipe</strong></h1>
                    <br>
                    <form class="form" action="insertEquipe.php" role="form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nomEquipe">Nom de l'équipe</label>
                            <input type="text" class="form-control" id="nomEquipe" name="nomEquipe" placeholder="Nom de l'équipe" value="<?php echo $nomEquipe;?>">
                        </div>
                       
                        <div class="form-group">
                            <label for="numeroCategorie">Catégorie</label>
                            <select class="form-control" id="numeroCategorie" name="numeroCategorie">
                            <?php
                                $db = Database::connect();
                                $result = $db->query("SELECT * FROM CATEGORIE");
                                foreach ($result as $rows)
                                {
                                    echo '<option value="'. $rows['NUMERO_CATEGORIE'] .'">'. $rows['NOM_CATEGORIE'] . '</option>';
                                }
                               Database::disconnect();
                            ?>
                            </select>
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