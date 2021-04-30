<?php   
    require 'database.php';
    if(!empty($_GET['id'])) 
    {
        $id = $_GET['id'];
    }
    
    if(!empty($_POST)) 
    {
        $id = $_POST['id'];
        $db = Database::connect();
        $statement = $db->prepare("DELETE FROM JOUEUR WHERE NUMERO_LICENCE = ?");
        $statement->execute(array($id));
        header("Location: consult.php");
        
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
        <h1><?php   echo 'Suppression du Joueur de numéro de licence ' . $id;?></h1>
           <div class="row">
                <div class="col-lg">
                    <form class="form" action="deleteJoueur.php" role="form" method="post">
                        <input type="hidden" name="id" value="<?php echo $id;?>"/>
                        <p class="alert alert-warning">Etes vous sur de vouloir supprimer ce joueur ? La suppression du joueur entraînera la suppression de ses points marqués et fautes depuis le debut de la saison.</p>
                        <div class="form-actions">
                          <button type="submit" class="btn btn-warning">Oui</button>
                          <a class="btn btn-secondary" href="consult.php">Non</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>  
        
    </body>
</html>