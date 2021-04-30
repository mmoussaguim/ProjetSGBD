<?php   
    require 'database.php';
    $id = $_GET['id'];
    $nomClub = "";
    if(!empty($_POST)) 
    {
        $nomClub = $_POST['nomClub'];
        $db = Database::connect();
        $statement = $db->prepare("UPDATE CLUB  set NOM_CLUB = ?WHERE NUMERO_CLUB = ?");
        $statement->execute(array($nomClub,$id));
    }
    else 
    {
        $db = Database::connect();
        $statement = $db->prepare("SELECT * FROM CLUB where NUMERO_CLUB = ?");
        $statement->execute(array($id));
        $row = $statement->fetch();
        $nomClub = $row['NOM_CLUB'];
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
        <h1><?php   echo 'Modifier Le Club ' . $id;?></h1>
        <form class="form" action="<?php echo 'updateClub.php?id='.$id;?>" role="form" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nomClub">Nom Club:</label>
                <input type="text" class="form-control" id="nomClub" name="nomClub" placeholder="Nom Club" value="<?php echo $nomClub;?>">
                
            </div>   
            
            <div class="form-actions">
                <button type="submit" class="btn btn-success"><span class="oi oi-pencil"></span> Modifier</button>
                <a class="btn btn-primary" href="consult.php"><span class="oi oi-arrow-thick-left"></span> Retour</a>
            </div>
            
        </form>    
        </div>  
        
    </body>
</html>