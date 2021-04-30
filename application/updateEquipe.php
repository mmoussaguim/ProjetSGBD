<?php   
    require 'database.php';
    $id = $_GET['id'];
    $nomEquipe = $numeroCategorie = "";
    if(!empty($_POST)) 
    {
        $nomEquipe = $_POST['nomEquipe'];
        $numeroCategorie = $_POST['numeroCategorie'];
        $db = Database::connect();
        $statement = $db->prepare("UPDATE EQUIPE  set NOM_EQUIPE = ?, NUMERO_CATEGORIE = ? WHERE NUMERO_EQUIPE = ?");
        $statement->execute(array($nomEquipe,$numeroCategorie,$id));
        header("Location: consult.php");
    }
    else 
    {
        $db = Database::connect();
        $statement = $db->prepare("SELECT NOM_EQUIPE, NUMERO_CATEGORIE FROM EQUIPE where NUMERO_EQUIPE = ?");
        $statement->execute(array($id));
        $row = $statement->fetch();
        $nomEquipe = $row['NOM_EQUIPE'];
        $numeroCategorie = $row['NUMERO_CATEGORIE'];
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
        <h1><?php   echo 'Modifier l\' équipe ' . $id;?></h1>
        <h5>Nous vous rappelons que vous ne pouvez modifier que le nom et la catégorie de l'equipe. Vous pouvez ajouter une nouvelle équipe directement dans la partie Insertion du menu principale</h5>
        <form class="form" action="<?php echo 'updateEquipe.php?id='.$id;?>" role="form" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nomEquipe">Nom Equipe:</label>
                <input type="text" class="form-control" id="nomEquipe" name="nomEquipe" placeholder="Nom Equipe" value="<?php echo $nomEquipe;?>">
                
            </div>   
            
            
            <div class="form-group">
                <label for="numeroCategorie">Catégorie:</label>
                <select class="form-control" id="numeroCategorie" name="numeroCategorie">
                <?php
                    $db = Database::connect();
                    foreach ($db->query('SELECT * FROM CATEGORIE') as $row) 
                    {
                        if($row['NUMERO_CATEGORIE'] == $numeroCategorie)
                            echo '<option selected="selected" value="'. $row['NUMERO_CATEGORIE'] .'">'. $row['NOM_CATEGORIE'] . '</option>';
                        else
                            echo '<option value="'. $row['NUMERO_CATEGORIE'] .'">'. $row['NOM_CATEGORIE'] . '</option>';;
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