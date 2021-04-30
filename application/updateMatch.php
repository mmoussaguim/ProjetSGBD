<?php   
    require 'database.php';
    $id = $_GET['id'];
    $dateRencontre = "";
    if(!empty($_POST)) 
    {
        $dateRencontre = $_POST['dateRencontre'];
        $db = Database::connect();
        $statement = $db->prepare("UPDATE RENCONTRE  set DATE_RENCONTRE = ? WHERE NUMERO_RENCONTRE = ?");
        $statement->execute(array($dateRencontre,$id));
    }
    else 
    {
        $db = Database::connect();
        $statement = $db->prepare("SELECT DATE_RENCONTRE FROM RENCONTRE where NUMERO_RENCONTRE = ?");
        $statement->execute(array($id));
        $row = $statement->fetch();
        $dateRencontre = $row['DATE_RENCONTRE'];
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
        <h1><?php   echo 'Modifier le Match ' . $id;?></h1>
        <h5>Nous vous rappelons que vous ne pouvez modifier que la date du Match. Vous pouvez ajouter un nouveau Match directement dans la partie Insertion du menu principal</h5>
        <form class="form" action="<?php echo 'updateMatch.php?id='.$id;?>" role="form" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="dateRencontre">Date de Rencontre:</label>
                <input type="text" class="form-control" id="dateRencontre" name="dateRencontre" placeholder="Nom Equipe" value="<?php echo $dateRencontre;?>">
                
            </div>   
            
            <div class="form-actions">
                <button type="submit" class="btn btn-success"><span class="oi oi-pencil"></span> Modifier</button>
                <a class="btn btn-primary" href="consult.php"><span class="oi oi-arrow-thick-left"></span> Retour</a>
            </div>
            
        </form>    
        </div>  
        
    </body>
</html>