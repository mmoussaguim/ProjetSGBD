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
            <h1>Nombre de Matchs gagnés, perdus ou nuls pour chaque Club</h1>
            
            <?php   
            require 'database.php';
            $db = Database::connect();
            $victoire = $db->prepare("Select CLUB.NOM_CLUB,SUM(Victoire) FROM( Select CLUB.NOM_CLUB AS Nom,COUNT(*) AS Victoire FROM ((CLUB INNER JOIN EQUIPE ON CLUB.NUMERO_CLUB=EQUIPE.NUMERO_CLUB)INNER JOIN PARTIE ON EQUIPE.NUMERO_EQUIPE=PARTIE.NUMERO_EQUIPE1) INNER JOIN RENCONTRE ON PARTIE.NUMERO_RENCONTRE=RENCONTRE.NUMERO_RENCONTRE WHERE RENCONTRE.POINTE1>RENCONTRE.POINTE2 GROUP BY CLUB.NOM_CLUB UNION Select CLUB.NOM_CLUB,COUNT(*) FROM ((CLUB INNER JOIN EQUIPE ON CLUB.NUMERO_CLUB=EQUIPE.NUMERO_CLUB)INNER JOIN PARTIE ON EQUIPE.NUMERO_EQUIPE=PARTIE.NUMERO_EQUIPE2) INNER JOIN RENCONTRE ON PARTIE.NUMERO_RENCONTRE=RENCONTRE.NUMERO_RENCONTRE WHERE RENCONTRE.POINTE1<RENCONTRE.POINTE2 GROUP BY CLUB.NOM_CLUB) AS NB_Victoire, CLUB WHERE CLUB.NOM_CLUB=Nom GROUP BY CLUB.NOM_CLUB ");
            $defaite = $db->prepare("Select CLUB.NOM_CLUB,SUM(Defaite) FROM( Select CLUB.NOM_CLUB AS Nom,COUNT(*) AS Defaite FROM ((CLUB INNER JOIN EQUIPE ON CLUB.NUMERO_CLUB=EQUIPE.NUMERO_CLUB)INNER JOIN PARTIE ON EQUIPE.NUMERO_EQUIPE=PARTIE.NUMERO_EQUIPE1) INNER JOIN RENCONTRE ON PARTIE.NUMERO_RENCONTRE=RENCONTRE.NUMERO_RENCONTRE WHERE RENCONTRE.POINTE1<RENCONTRE.POINTE2 GROUP BY CLUB.NOM_CLUB UNION Select CLUB.NOM_CLUB,COUNT(*) FROM ((CLUB INNER JOIN EQUIPE ON CLUB.NUMERO_CLUB=EQUIPE.NUMERO_CLUB)INNER JOIN PARTIE ON EQUIPE.NUMERO_EQUIPE=PARTIE.NUMERO_EQUIPE2) INNER JOIN RENCONTRE ON PARTIE.NUMERO_RENCONTRE=RENCONTRE.NUMERO_RENCONTRE WHERE RENCONTRE.POINTE1>RENCONTRE.POINTE2 GROUP BY CLUB.NOM_CLUB) AS NB_Defaite, CLUB WHERE CLUB.NOM_CLUB=Nom GROUP BY CLUB.NOM_CLUB ");

            $nul = $db->prepare("Select CLUB.NOM_CLUB,SUM(Egalite) FROM( Select CLUB.NOM_CLUB AS Nom,COUNT(*) AS Egalite FROM ((CLUB INNER JOIN EQUIPE ON CLUB.NUMERO_CLUB=EQUIPE.NUMERO_CLUB)INNER JOIN PARTIE ON EQUIPE.NUMERO_EQUIPE=PARTIE.NUMERO_EQUIPE1) INNER JOIN RENCONTRE ON PARTIE.NUMERO_RENCONTRE=RENCONTRE.NUMERO_RENCONTRE WHERE RENCONTRE.POINTE1=RENCONTRE.POINTE2 GROUP BY CLUB.NOM_CLUB UNION Select CLUB.NOM_CLUB,COUNT(*) FROM ((CLUB INNER JOIN EQUIPE ON CLUB.NUMERO_CLUB=EQUIPE.NUMERO_CLUB)INNER JOIN PARTIE ON EQUIPE.NUMERO_EQUIPE=PARTIE.NUMERO_EQUIPE2) INNER JOIN RENCONTRE ON PARTIE.NUMERO_RENCONTRE=RENCONTRE.NUMERO_RENCONTRE WHERE RENCONTRE.POINTE1=RENCONTRE.POINTE2 GROUP BY CLUB.NOM_CLUB) AS NB_Egalite, CLUB WHERE CLUB.NOM_CLUB=Nom GROUP BY CLUB.NOM_CLUB ");
            $victoire->execute();
            $defaite->execute();
            $nul->execute();
            
            echo '<table class="table table-striped table-bordered">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>Nom Club</th>';
                    echo '<th>Nombre de Victoire</th>';
                    echo '<th>Nombre de defaite</th>';
                    echo '<th>Nombre de Match nul</th>';
                    echo ' </tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    while(($row1 = $victoire->fetch()) && ($row2 = $defaite->fetch()) && ($row3 = $nul->fetch()))
                    {
                        echo '<tr>';
                        echo '<td>'. $row1['NOM_CLUB'] . '</td>';
                        echo '<td>'. $row1['SUM(Victoire)'] . '</td>';
                        echo '<td>'. $row2['SUM(Defaite)'] . '</td>';
                        echo '<td>'. $row3['SUM(Egalite)'] . '</td>';

                        echo '</tr>';
                    }
            echo '</table>';
            Database::disconnect();
        ?>
             <a href="index.html" class="btn btn-success btn-lg">Menu Principal</a>           
        </div>  
        
        
    </body>
</html>