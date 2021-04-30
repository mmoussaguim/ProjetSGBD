<?php   
    require 'database.php';  

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
            <h1>Choisir un numéro de rencontre</h1>
            <form action="feuille.php" method="post" class="text-center">
              <div class="form-row align-items-center">
                
                <div class="col-auto my-1">
                    <label class="mr-sm-2" for="inlineFormCustomSelect">Rencontre</label>
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" type="number" name="rencontre">
                    <option selected></option>
                    <?php

                        $db = Database::connect();
                        foreach ($db->query('SELECT NUMERO_RENCONTRE from RENCONTRE') as $row) 
                        {
                            echo '<option value="'. $row['NUMERO_RENCONTRE'] .'">'. $row['NUMERO_RENCONTRE'] . '</option>';;
                        }
                        Database::disconnect();
                     ?>
                    </select>
                </div>
                
                <div class="col-auto my-1">
                  <button type="submit" class="btn btn-primary">Choisir</button>
                </div>
              </div>
            </form>
            
            <a href="index.html" class="btn btn-success btn-lg">Menu Principal</a>
            
            
            
            <?php

                $db = Database::connect();
            
                if(empty($_POST['rencontre'])){
                }
                else
                {
                    $rencontre = $_POST['rencontre'];
                    $statement = $db->prepare("Select DATE_RENCONTRE , NOM_CATEGORIE from PARTIE P join RENCONTRE R on P.NUMERO_RENCONTRE = R.NUMERO_RENCONTRE join EQUIPE E on E.NUMERO_EQUIPE = P.NUMERO_EQUIPE1 join CATEGORIE C on C.NUMERO_CATEGORIE = E.NUMERO_CATEGORIE where R.NUMERO_RENCONTRE = ?");
                    $statement->execute(array($rencontre));
                    $row = $statement->fetch();
                    
                    echo '<h1>Feuille de Match de la Rencontre ' . $rencontre . '</h1>';
                    echo '<br>';
                    echo '<br>';
                    echo '<h5>Date: ' . $row['DATE_RENCONTRE'] . '</h5>';
                    echo '<h5>Catégorie: ' . $row['NOM_CATEGORIE'] . '</h5>';
                    echo '<br>';
                    echo '<br>';
                    
                }
            Database::disconnect();
                
                ?>
                
            <div class="row">
            <div class="col-md-6">
                   
                <?php

                $db = Database::connect();
            
                if(empty($_POST['rencontre'])){
                }
                else
                {
                   $rencontre = $_POST['rencontre'];
                    
                    
                    $statement = $db->prepare("SELECT C.NOM_CLUB, E.NOM_EQUIPE, E.NUMERO_EQUIPE FROM RENCONTRE R join PARTIE P on P.NUMERO_RENCONTRE = R.NUMERO_RENCONTRE join EQUIPE E on E.NUMERO_EQUIPE = P.NUMERO_EQUIPE1 join CLUB C on C.NUMERO_CLUB = E.NUMERO_CLUB WHERE R.NUMERO_RENCONTRE = ?");
                    $statement->execute(array($rencontre));
                    $row = $statement->fetch();
                    $numeroEquipe1 = $row['NUMERO_EQUIPE'];
                    echo '<h5>' . $row['NOM_CLUB'] . ' Club</h5>';
                    echo '<h5>Equipe1: ' . $row['NOM_EQUIPE'] . '</h5>';
                        
                    
                    
                    
                    
                    echo'<h5>Joueurs</h5>';
                    $statement = $db->prepare("SELECT J.NUMERO_LICENCE, J.NOM_JOUEUR, J.PRENOM_JOUEUR FROM EQUIPE E join APPARTENANCE A ON A.NUMERO_EQUIPE = E.NUMERO_EQUIPE JOIN JOUEUR J ON J.NUMERO_LICENCE = A.NUMERO_LICENCE where E.NUMERO_EQUIPE = ?");
                    $statement->execute(array($numeroEquipe1));
                    
                    echo '<table class="table table-striped table-bordered">';
                    echo '<thead>';
                    echo '<tr>';
                    
                    echo '<th>Numéro de Licence</th>';
                    echo '<th>Nom Prénom</th>';
                    echo ' </tr>';
                    echo '</thead>';
                    echo '<tbody>'; 
                        
                        
                    while($row = $statement->fetch())
                    {
                        echo '<tr>';
                        echo '<td>'. $row['NUMERO_LICENCE'] . '</td>';
                        echo '<td>'. $row['NOM_JOUEUR'] . ' ' .  $row['PRENOM_JOUEUR'] . '</td>';
                        echo '</tr>';
                    }
                    
                    echo'</table>';
                    
                    echo'<h5>Points Marqués et Fautes</h5>';
                    $statement = $db->prepare("SELECT J.NOM_JOUEUR, J.PRENOM_JOUEUR, PO.POINTS_MARQUES, PO.FAUTES FROM EQUIPE E join APPARTENANCE A ON A.NUMERO_EQUIPE = E.NUMERO_EQUIPE JOIN JOUEUR J ON J.NUMERO_LICENCE = A.NUMERO_LICENCE JOIN POINT_JOUEUR PO on PO.NUMERO_LICENCE = J.NUMERO_LICENCE WHERE PO.NUMERO_RENCONTRE = ? and E.NUMERO_EQUIPE = ?");
                    $statement->execute(array($rencontre,$numeroEquipe1));
                    
                    echo '<table class="table table-striped table-bordered">';
                    echo '<thead>';
                    echo '<tr>';
                    
                    echo '<th>Nom Prenom</th>';
                    echo '<th>Points Marqués</th>';
                    echo '<th>Fautes</th>';
                    echo ' </tr>';
                    echo '</thead>';
                    echo '<tbody>'; 
                        
                        
                    while($row = $statement->fetch())
                    {
                        echo '<tr>';
                        echo '<td>'. $row['NOM_JOUEUR'] . ' ' .  $row['PRENOM_JOUEUR'] . '</td>';
                        
                        echo '<td>'. $row['POINTS_MARQUES'] . '</td>';
                        echo '<td>'. $row['FAUTES'] . '</td>';
                        echo '</tr>';
                    }
                    
                    echo'</table>';
                    
        
                }
            
            Database::disconnect();
            ?>
            </div> 
            
            <div class="col-md-6">
            <?php

                $db = Database::connect();
            
                if(empty($_POST['rencontre'])){
                }
                else
                {
                    $rencontre = $_POST['rencontre'];
                    $statement = $db->prepare("SELECT C.NOM_CLUB, E.NOM_EQUIPE, E.NUMERO_EQUIPE FROM RENCONTRE R join PARTIE P on P.NUMERO_RENCONTRE = R.NUMERO_RENCONTRE join EQUIPE E on E.NUMERO_EQUIPE = P.NUMERO_EQUIPE2 join CLUB C on C.NUMERO_CLUB = E.NUMERO_CLUB WHERE R.NUMERO_RENCONTRE = ?");
                    $statement->execute(array($rencontre));
                    $row = $statement->fetch();
                    $numeroEquipe2 = $row['NUMERO_EQUIPE'];
                    echo '<h5>' . $row['NOM_CLUB'] . ' Club</h5>';
                    echo '<h5>Equipe2: ' . $row['NOM_EQUIPE'] . '</h5>';
                    
                    echo'<h5>Joueurs</h5>';
                    $statement = $db->prepare("SELECT J.NUMERO_LICENCE, J.NOM_JOUEUR, J.PRENOM_JOUEUR FROM EQUIPE E join APPARTENANCE A ON A.NUMERO_EQUIPE = E.NUMERO_EQUIPE JOIN JOUEUR J ON J.NUMERO_LICENCE = A.NUMERO_LICENCE where E.NUMERO_EQUIPE = ?");
                    $statement->execute(array($numeroEquipe2));
                    echo '<table class="table table-striped table-bordered">';
                    echo '<thead>';
                    echo '<tr>';
                    
                    echo '<th>Numéro de Licence</th>';
                    echo '<th>Nom Prénom</th>';
                    echo ' </tr>';
                    echo '</thead>';
                    echo '<tbody>'; 
                        
                        
                    while($row = $statement->fetch())
                    {
                        echo '<tr>';
                        echo '<td>'. $row['NUMERO_LICENCE'] . '</td>';
                        echo '<td>'. $row['NOM_JOUEUR'] . ' ' .  $row['PRENOM_JOUEUR'] . '</td>';
                        echo '</tr>';
                    }
                    echo'</table>';
                    
                    echo'<h5>Points Marqués et Fautes</h5>';
                    $statement = $db->prepare("SELECT J.NOM_JOUEUR, J.PRENOM_JOUEUR, PO.POINTS_MARQUES, PO.FAUTES FROM EQUIPE E join APPARTENANCE A ON A.NUMERO_EQUIPE = E.NUMERO_EQUIPE JOIN JOUEUR J ON J.NUMERO_LICENCE = A.NUMERO_LICENCE JOIN POINT_JOUEUR PO on PO.NUMERO_LICENCE = J.NUMERO_LICENCE WHERE PO.NUMERO_RENCONTRE = ? and E.NUMERO_EQUIPE = ?");
                    $statement->execute(array($rencontre,$numeroEquipe2));
                    
                    echo '<table class="table table-striped table-bordered">';
                    echo '<thead>';
                    echo '<tr>';
                    
                    echo '<th>Nom Prenom</th>';
                    echo '<th>Points Marqués</th>';
                    echo '<th>Fautes</th>';
                    echo ' </tr>';
                    echo '</thead>';
                    echo '<tbody>'; 
                        
                        
                    while($row = $statement->fetch())
                    {
                        echo '<tr>';
                        echo '<td>'. $row['NOM_JOUEUR'] . ' ' .  $row['PRENOM_JOUEUR'] . '</td>';
                        
                        echo '<td>'. $row['POINTS_MARQUES'] . '</td>';
                        echo '<td>'. $row['FAUTES'] . '</td>';
                        echo '</tr>';
                    }
                    
                    echo'</table>';
                }
                Database::disconnect();
                    
            ?>
            </div> 
        </div>  
            
        <?php

            $db = Database::connect();
            
            if(empty($_POST['rencontre'])){
            }
            else
            {
                $rencontre = $_POST['rencontre'];
                $statement = $db->prepare("SELECT POINTE1, POINTE2 from RENCONTRE WHERE NUMERO_RENCONTRE = ?");
                $statement->execute(array($rencontre));
                $row = $statement->fetch();
                
                echo'<h1>SCORE : ' . $row['POINTE1'] . ' - '. $row['POINTE2'] . '</h1>';
                
            }
            Database::disconnect();
                    
            ?>
            
        </div> 
        
    </body>
</html>