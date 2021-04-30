<?php   
    require 'database.php';
    $id = $_GET['id'];
    $pointE1 = $pointE2 = "";
    if(!empty($_POST)) 
    {
        
        $pointE1 = $_POST['pointE1'];
        $pointE2 = $_POST['pointE2'];
        $db = Database::connect();
        $statement = $db->prepare("UPDATE RENCONTRE  set POINTE1 = ?, POINTE2 = ? WHERE NUMERO_RENCONTRE = ?");
        $statement->execute(array($pointE1, $pointE2,$id));
    }
    else 
    {
        $db = Database::connect();
        $statement = $db->prepare("SELECT POINTE1, POINTE2 from RENCONTRE where  NUMERO_RENCONTRE = ?");
        $statement->execute(array($id));
        $row = $statement->fetch();
        $pointE1 = $row['POINTE1'];
        $pointE2 = $row['POINTE2'];

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
        <h1><?php   echo 'Modifier Les scores de la rencontre ' . $id;?></h1>
        <form class="form" action="<?php echo 'updateScore.php?id='.$id;?>" role="form" method="post" enctype="multipart/form-data">
                        
            <div class="form-group">
                <label for="pointE1">Points marqués par Equipe1</label>
                <input type="number" class="form-control" id="pointE1" name="pointE1" placeholder="PointE1" value="<?php echo $pointE1;?>">
                
            </div>
            
            <div class="form-group">
                <label for="pointE2">Points marqués par Equipe2:</label>
                <input type="number" class="form-control" id="pointE2" name="pointE2" placeholder="PointE2" value="<?php echo $pointE2;?>">
                
            </div>
            

            
            <div class="form-actions">
                <button type="submit" class="btn btn-success"><span class="oi oi-pencil"></span> Modifier</button>
                <a class="btn btn-primary" href="consult.php"><span class="oi oi-arrow-thick-left"></span> Retour</a>
            </div>
            
        </form>    
        </div>  
        
    </body>
</html>