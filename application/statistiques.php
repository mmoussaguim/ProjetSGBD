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
        <div class="row">

        <div class="col-md-6">
            <?php
            $db = Database::connect();
            
                $statement1 = $db->prepare("SELECT AVG(points)
                FROM(
                Select SUM(RENCONTRE.POINTE1+RENCONTRE.POINTE2) AS points,RENCONTRE.NUMERO_RENCONTRE
                FROM RENCONTRE
                WHERE YEAR(RENCONTRE.DATE_RENCONTRE) =(Select YEAR(MAX(RENCONTRE.DATE_RENCONTRE))
                                                       From RENCONTRE)
                GROUP BY RENCONTRE.NUMERO_RENCONTRE
                ORDER BY 2 ) AS Moyenne;");
                $statement1->execute(array());
                $statement1->execute();
                $row1 = $statement1->fetch();
                
                echo ' <h4> La Moyenne des points marqués depuis le début de la saison est de '. $row1['AVG(points)'] .' </h4>';
                Database::disconnect();
            ?>
            </div>

            <div class="col-md-6">

            <h4> <b> Choisir la date jusqu'à laquelle vous souhaitez calculer la moyenne des points marqués </b> </h4>
            <form class="form" action="statistiques.php" role="form" method="post" >
            <div class="form-group">
                <label for="date">Date </label>
                <input type="date" class="form-control" id="date" name="date" placeholder="Date" value="<?php echo $date;?>">
            </div>
                <div class="col-auto my-1">
                  <button type="submit" class="btn btn-primary">Choisir</button>
                </div>
            </form>
            <?php
            $db = Database::connect();
            if(!empty($_POST['date'])) {
                $date = $_POST['date'];
                $statement = $db->prepare("SELECT AVG(points) FROM(
                    Select SUM(RENCONTRE.POINTE1+RENCONTRE.POINTE2) AS points,RENCONTRE.NUMERO_RENCONTRE
                    FROM RENCONTRE
                    WHERE RENCONTRE.DATE_RENCONTRE <= ?
                    GROUP BY RENCONTRE.NUMERO_RENCONTRE
                    ORDER BY 2 ) AS Moyenne;");
                $statement->execute(array($date));
            
                
                $row = $statement->fetch();
                
                echo ' <h5> La Moyenne des points marqués par rencontre  jusqu\' à ' . $date . ' est de '. $row['AVG(points)'] .' </h5>';

            }
            Database::disconnect();
            ?>
            
            </div>
            </div>
            

            <div class="row">
            <div class="col-md-6">
            <br>
            <br>
            <h4> <b> Afficher les meilleurs joueurs d'une catégorie à une date donnée ou de la saison (dans ce cas, veuiller ne pas renseigner le champ "Date") </b> </h4>
            <form class="form" action="statistiques.php" role="form" method="post" >
            <div class="form-group">
                <label for="date">Date </label>
                <select class="form-control" id="date" name="date">
                <option selected></option>
                    <?php

                        $db = Database::connect();
                        foreach ($db->query('SELECT distinct DATE_RENCONTRE from RENCONTRE') as $row) 
                        {
                            echo '<option value="'. $row['DATE_RENCONTRE'] .'">'. $row['DATE_RENCONTRE'] . '</option>';
                        }
                        Database::disconnect();
                     ?>
                    </select>
            </div>
            <div class="form-group">
                            <label for="nomCategorie">Catégorie</label>
                            <select class="form-control" id="nomCategorie" name="nomCategorie">
                            <?php
                                $db = Database::connect();
                                $result = $db->query("SELECT * FROM CATEGORIE");
                                foreach ($result as $rows)
                                {
                                    echo '<option value="'. $rows['NOM_CATEGORIE'] .'">'. $rows['NOM_CATEGORIE'] . '</option>';
                                }
                               Database::disconnect();
                            ?>
                            </select>
                        </div>
                <div class="col-auto my-1">
                  <button type="submit" class="btn btn-primary">Choisir</button>
                </div>
            </form>
            <?php
            $db = Database::connect();
            if(!empty($_POST['nomCategorie'])) {
                $nomCategorie = $_POST['nomCategorie'];
                
                if(!empty($_POST['date']))
                {
                    $date = $_POST['date'];
                    $statement = $db->prepare("SELECT JOUEUR.NOM_JOUEUR, JOUEUR.PRENOM_JOUEUR, SUM(POINT_JOUEUR.POINTS_MARQUES)
                    FROM ((((JOUEUR LEFT OUTER JOIN POINT_JOUEUR
                    ON JOUEUR.NUMERO_LICENCE=POINT_JOUEUR.NUMERO_LICENCE) 
                    INNER JOIN RENCONTRE
                    ON POINT_JOUEUR.NUMERO_RENCONTRE=RENCONTRE.NUMERO_RENCONTRE) 
                    INNER JOIN PARTIE
                    ON RENCONTRE.NUMERO_RENCONTRE= PARTIE.NUMERO_RENCONTRE)
                    INNER JOIN EQUIPE
                    ON PARTIE.NUMERO_EQUIPE1=EQUIPE.NUMERO_EQUIPE)
                    INNER JOIN CATEGORIE
                    ON EQUIPE.NUMERO_CATEGORIE=CATEGORIE.NUMERO_CATEGORIE
                    WHERE RENCONTRE.DATE_RENCONTRE= ?
                    AND CATEGORIE.NOM_CATEGORIE=?
                    GROUP BY JOUEUR.NOM_JOUEUR, JOUEUR.PRENOM_JOUEUR
                    ORDER BY 2 DESC");
                    $statement->execute(array($date, $nomCategorie));

                }
                else 
                {
                    $statement = $db->prepare("SELECT JOUEUR.PRENOM_JOUEUR,JOUEUR.NOM_JOUEUR, SUM(POINT_JOUEUR.POINTS_MARQUES)
                    FROM ((((JOUEUR LEFT OUTER JOIN POINT_JOUEUR
                    ON JOUEUR.NUMERO_LICENCE=POINT_JOUEUR.NUMERO_LICENCE) 
                    INNER JOIN RENCONTRE
                    ON POINT_JOUEUR.NUMERO_RENCONTRE=RENCONTRE.NUMERO_RENCONTRE) 
                    INNER JOIN PARTIE
                    ON RENCONTRE.NUMERO_RENCONTRE= PARTIE.NUMERO_RENCONTRE)
                    INNER JOIN EQUIPE
                    ON PARTIE.NUMERO_EQUIPE1=EQUIPE.NUMERO_EQUIPE)
                    INNER JOIN CATEGORIE
                    ON EQUIPE.NUMERO_CATEGORIE=CATEGORIE.NUMERO_CATEGORIE
                    WHERE YEAR(RENCONTRE.DATE_RENCONTRE)=(Select YEAR(MAX(RENCONTRE.DATE_RENCONTRE))
                                                           From RENCONTRE)
                    AND CATEGORIE.NOM_CATEGORIE= ?
                    GROUP BY JOUEUR.NOM_JOUEUR,JOUEUR.PRENOM_JOUEUR
                    ORDER BY 3 DESC;
                    ");
                    $statement->execute(array($nomCategorie));

                }


                echo '<table class="table table-striped table-bordered">';
                echo '<thead>';
                echo '<tr>';
                
                echo '<th>Nom Prenom Joueur</th>';
                echo '<th>Somme des Points marqués</th>';
                echo ' </tr>';
                echo '</thead>';
                echo '<tbody>'; 
                    
                    
                while($row = $statement->fetch())
                {
                    echo '<tr>';
                    echo '<td>'. $row['NOM_JOUEUR'] . ' ' . $row['PRENOM_JOUEUR'] . '</td>';
                    echo '<td>'. $row['SUM(POINT_JOUEUR.POINTS_MARQUES)'] . '</td>';
                    echo '</tr>';
                }
                
                echo'</table>';

            }
            Database::disconnect();
            ?>
            </div>

            <div class="col-md-6">
                <br>
                <br>
                <h4>  <b>Classement des équipes </b></h4>
                <?php
                $db = Database::connect();
                
                    $statement = $db->prepare("SELECT EQUIPE.NOM_EQUIPE, SUM(PE1) 
                    FROM(
                    SELECT EQUIPE.NOM_EQUIPE AS Nom, SUM(RENCONTRE.POINTE1) AS PE1
                    FROM (EQUIPE LEFT OUTER JOIN PARTIE
                    ON EQUIPE.NUMERO_EQUIPE = PARTIE.NUMERO_EQUIPE1)
                    INNER JOIN RENCONTRE 
                    ON PARTIE.NUMERO_RENCONTRE=RENCONTRE.NUMERO_RENCONTRE
                    WHERE RENCONTRE.DATE_RENCONTRE <= (SELECT MAX(RENCONTRE.DATE_RENCONTRE)
                                                      FROM RENCONTRE)
                    GROUP BY EQUIPE.NOM_EQUIPE
                    UNION
                    SELECT EQUIPE.NOM_EQUIPE, SUM(RENCONTRE.POINTE2)
                    FROM (EQUIPE LEFT OUTER JOIN PARTIE
                    ON EQUIPE.NUMERO_EQUIPE = PARTIE.NUMERO_EQUIPE2)
                    INNER JOIN RENCONTRE 
                    ON PARTIE.NUMERO_RENCONTRE=RENCONTRE.NUMERO_RENCONTRE
                    WHERE RENCONTRE.DATE_RENCONTRE <= (SELECT MAX(RENCONTRE.DATE_RENCONTRE)
                                                      FROM RENCONTRE)
                    GROUP BY EQUIPE.NOM_EQUIPE) AS TOTAL ,EQUIPE
                    WHERE EQUIPE.NOM_EQUIPE=Nom
                    GROUP BY EQUIPE.NOM_EQUIPE
                    ORDER BY 2 DESC");
                    $statement->execute(array());
                    $statement->execute();
                    echo '<table class="table table-striped table-bordered">';
                    echo '<thead>';
                    echo '<tr>';
                    
                    echo '<th>Equipe</th>';
                    echo '<th>Somme des Points</th>';
                    echo ' </tr>';
                    echo '</thead>';
                    echo '<tbody>'; 
                        
                        
                    while($row = $statement->fetch())
                    {
                        echo '<tr>';
                        echo '<td>'. $row['NOM_EQUIPE'] . '</td>';
                        echo '<td>'. $row['SUM(PE1)'] . '</td>';
                        echo '</tr>';
                    }
                    
                    echo'</table>';
                    
                    
                    Database::disconnect();
                ?>
            </div>
            </div> 
            <a href="index.html" class="btn btn-success btn-lg">Menu Principal</a>  

            </body>
</html>