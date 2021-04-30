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
            <h1>Choisir la table à afficher</h1>
            <form action="consult.php" method="post" class="text-center">
              <div class="form-row align-items-center">
                <div class="col-auto my-1">
                  <label class="mr-sm-3" for="inlineFormCustomSelect">Choix</label>
                  <select class="custom-select mr-sm-3" id="inlineFormCustomSelect" type="text" name="statut">
                    <option selected></option>
                    <option value="Clubs">Clubs</option>
                    <option value="Equipes">Equipes</option>
                    <option value="Joueurs">Joueurs</option>
                    <option value="Matchs">Matchs</option>
                    <option value="Scores">Scores</option>
                  </select>
                </div>
                
                <div class="col-auto my-1">
                    <label class="mr-sm-3" for="inlineFormCustomSelect">Date</label>
                    <select class="custom-select mr-sm-3" id="inlineFormCustomSelect" type="text" name="date">
                    <option selected></option>
                    <?php

                        $db = Database::connect();
                        foreach ($db->query('SELECT distinct DATE_RENCONTRE from RENCONTRE') as $row) 
                        {
                            echo '<option value="'. $row['DATE_RENCONTRE'] .'">'. $row['DATE_RENCONTRE'] . '</option>';;
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
            
                if(empty($_POST['statut'])){
                }
                else if($_POST['statut'] == "Clubs")
                {
                    $statement = $db->prepare("Select C.NUMERO_CLUB, NOM_CLUB, PRENOM_PERSONNEL, NOM_PERSONNEL from CLUB C join FONCTION F on C.NUMERO_CLUB = F.NUMERO_CLUB join PERSONNEL P on F.NUMERO_PERSONNEL = P.NUMERO_PERSONNEL where NOM_POSTE = 'Président'");
                    $statement->execute();
                    echo '<div class="row">';
                    echo '<h1>Liste des Clubs</h1>';
                    echo '<br>';
                    echo '<table class="table table-striped table-bordered">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>Numero Club</th>';
                    echo '<th>Nom Club</th>';
                    echo '<th>Président Club</th>';
                    echo '<th>Actions</th>';
                    echo ' </tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    while($row = $statement->fetch())
                    {
                        echo '<tr>';
                        echo '<td>'. $row['NUMERO_CLUB'] . '</td>';
                        echo '<td>'. $row['NOM_CLUB'] . '</td>';
                        echo '<td>'. $row['PRENOM_PERSONNEL'] . " " . $row['NOM_PERSONNEL'] . '</td>';
                        echo '<td width=280>';
                            
                        echo '<a class="btn btn-primary" href="updateClub.php?id='.$row['NUMERO_CLUB'].'"><span class="oi oi-pencil"></span> Modifier</a>';
                        echo ' ';
                        echo '<a class="btn btn-danger" href="deleteClub.php?id='.$row['NUMERO_CLUB'].'"><span class="oi oi-x"></span> Supprimer</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    echo'</table>';
                    
                    echo '<h1>Les clubs sans président ne sont pas affichés</h1>';
                }
            
                else if($_POST['statut'] == "Equipes")
                {
                    
                    if(!empty($_POST['date'])){
                        $statement = $db->prepare("select NUMERO_EQUIPE, NOM_EQUIPE, NOM_CLUB, NOM_CATEGORIE from EQUIPE E JOIN CLUB C on E.NUMERO_CLUB = C.NUMERO_CLUB join CATEGORIE CA on CA.NUMERO_CATEGORIE = E.NUMERO_CATEGORIE where E.NUMERO_EQUIPE IN (SELECT E.NUMERO_EQUIPE  from PARTIE P join RENCONTRE R on P.NUMERO_RENCONTRE = R.NUMERO_RENCONTRE join EQUIPE E on E.NUMERO_EQUIPE = P.NUMERO_EQUIPE1 where R.DATE_RENCONTRE = ?) OR NUMERO_EQUIPE IN (SELECT E.NUMERO_EQUIPE  from PARTIE P join RENCONTRE R on P.NUMERO_RENCONTRE = R.NUMERO_RENCONTRE join EQUIPE E on E.NUMERO_EQUIPE = P.NUMERO_EQUIPE2 where R.DATE_RENCONTRE = ?)");
                        $statement->execute(array($_POST['date'],$_POST['date']));
                        echo '<div class="row">';
                        echo '<h1>Liste des Equipes à la date  ' . $_POST['date'] . '</h1>';
                    }
                    else
                    {
                        $statement = $db->prepare("select NUMERO_EQUIPE, NOM_EQUIPE, NOM_CLUB, NOM_CATEGORIE from EQUIPE E JOIN CLUB C on E.NUMERO_CLUB = C.NUMERO_CLUB join CATEGORIE CA on CA.NUMERO_CATEGORIE = E.NUMERO_CATEGORIE");
                        $statement->execute();
                        echo '<div class="row">';
                        echo '<h1>Liste des Equipes</h1>';
                        }
                    echo '<table class="table table-striped table-bordered">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>Numéro Equipe</th>';
                    echo '<th>Nom Club</th>';
                    echo '<th>Nom Catégorie</th>';
                    echo '<th>Nom Equipe</th>';
                    echo '<th>Actions</th>';
                    echo ' </tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    while($row = $statement->fetch())
                    {
                        echo '<tr>';
                        echo '<td>'. $row['NUMERO_EQUIPE'] . '</td>';
                        echo '<td>'. $row['NOM_CLUB'] . '</td>';
                        echo '<td>'. $row['NOM_CATEGORIE'] . '</td>';
                        echo '<td>'. $row['NOM_EQUIPE'] . '</td>';
                        echo '<td width=280>';
                            
                        echo '<a class="btn btn-primary" href="updateEquipe.php?id='.$row['NUMERO_EQUIPE'].'"><span class="oi oi-pencil"></span> Modifier</a>';
                        echo ' ';
                        echo '<a class="btn btn-danger" href="deleteEquipe.php?id='.$row['NUMERO_EQUIPE'].'"><span class="oi oi-x"></span> Supprimer</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    echo'</table>';
                }
                else if($_POST['statut'] == "Joueurs")
                {
                    if(!empty($_POST['date'])){
                        $statement = $db->prepare("Select * from JOUEUR J join CLUB C on J.NUMERO_CLUB = C.NUMERO_CLUB where NUMERO_LICENCE IN (SELECT NUMERO_LICENCE from PARTIE P join RENCONTRE R on P.NUMERO_RENCONTRE = R.NUMERO_RENCONTRE join APPARTENANCE A on A.NUMERO_EQUIPE = P.NUMERO_EQUIPE1 where R.DATE_RENCONTRE = ?) OR NUMERO_LICENCE IN (SELECT NUMERO_LICENCE from PARTIE P join RENCONTRE R on P.NUMERO_RENCONTRE = R.NUMERO_RENCONTRE join APPARTENANCE A on A.NUMERO_EQUIPE = P.NUMERO_EQUIPE2 where R.DATE_RENCONTRE = ?)");
                        $statement->execute(array($_POST['date'],$_POST['date']));
                        echo '<div class="row">';
                        echo '<h1>Liste des Joueurs à la date  ' . $_POST['date'] . '</h1>';
                    }
                    else
                    {
                        $statement = $db->prepare("Select * from JOUEUR J join CLUB C on J.NUMERO_CLUB = C.NUMERO_CLUB");
                        $statement->execute();
                        echo '<div class="row">';
                        echo '<h1>Liste des Joueurs</h1>';
                    }
                    echo '<table class="table table-striped table-bordered">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>Numéro Licence</th>';
                    echo '<th>Nom Club</th>';
                    echo '<th>Nom-Prénom</th>';
                    echo '<th>Adresse</th>';
                    echo '<th>Date de Naissance</th>';
                    echo '<th>Date entrée</th>';
                    echo '<th>Actions</th>';
                    echo ' </tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    while($row = $statement->fetch())
                    {
                        echo '<tr>';
                        echo '<td>'. $row['NUMERO_LICENCE'] . '</td>';
                        echo '<td>'. $row['NOM_CLUB'] . '</td>';
                        echo '<td>'. $row['NOM_JOUEUR'] . " " . $row['PRENOM_JOUEUR'] . '</td>';
                        echo '<td>'. $row['ADRESSE'] . '</td>';
                        echo '<td>'. $row['DATE_DE_NAISSANCE'] . '</td>';
                        echo '<td>'. $row['DATE_ENTREE'] . '</td>';
                        echo '<td width=280>';
                            
                        echo '<a class="btn btn-primary" href="updateJoueur.php?id='.$row['NUMERO_LICENCE'].'"><span class="oi oi-pencil"></span> Modifier</a>';
                        echo ' ';
                        echo '<a class="btn btn-danger" href="deleteJoueur.php?id='.$row['NUMERO_LICENCE'].'"><span class="oi oi-x"></span> Supprimer</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    echo'</table>';
                }
                
                else if($_POST['statut'] == "Matchs")
                {
                    if(!empty($_POST['date']))
                    {
                        $statement = $db->prepare("Select R.NUMERO_RENCONTRE, E.NOM_EQUIPE as NOM1, EQ.NOM_EQUIPE as NOM2, NUMERO_EQUIPE1, NUMERO_EQUIPE2, DATE_RENCONTRE from RENCONTRE R join PARTIE P on R.NUMERO_RENCONTRE = P.NUMERO_RENCONTRE join EQUIPE E on E.NUMERO_EQUIPE = P.NUMERO_EQUIPE1 join EQUIPE EQ on EQ.NUMERO_EQUIPE = P.NUMERO_EQUIPE2 where R.DATE_RENCONTRE = ? ORDER BY R.NUMERO_RENCONTRE");
                        $statement->execute(array($_POST['date']));
                        echo '<div class="row">';
                        echo '<h1>Liste des Matchs à la date  ' . $_POST['date'] . '</h1>';
                    }
                    else
                    {
                        $statement = $db->prepare("Select R.NUMERO_RENCONTRE, E.NOM_EQUIPE as NOM1, EQ.NOM_EQUIPE as NOM2, NUMERO_EQUIPE1, NUMERO_EQUIPE2, DATE_RENCONTRE from RENCONTRE R join PARTIE P on R.NUMERO_RENCONTRE = P.NUMERO_RENCONTRE join EQUIPE E on E.NUMERO_EQUIPE = P.NUMERO_EQUIPE1 join EQUIPE EQ on EQ.NUMERO_EQUIPE = P.NUMERO_EQUIPE2 ORDER BY R.NUMERO_RENCONTRE");
                        $statement->execute();
                        echo '<div class="row">';
                        echo '<h1>Liste des Matchs</h1>';
                    }
                    echo '<table class="table table-striped table-bordered">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>Numéro Rencontre</th>';
                    echo '<th>Equipe 1</th>';
                    echo '<th>Equipe 2</th>';
                    echo '<th>Date Rencontre</th>';
                    echo '<th>Actions</th>';
                    echo ' </tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    while($row = $statement->fetch())
                    {
                        echo '<tr>';
                        echo '<td>'. $row['NUMERO_RENCONTRE'] . '</td>';
                        echo '<td>'. $row['NOM1'] . '</td>';
                        echo '<td>'. $row['NOM2'] . '</td>';
                        echo '<td>'. $row['DATE_RENCONTRE'] . '</td>';
                        echo '<td width=280>';
                            
                        echo '<a class="btn btn-primary" href="updateMatch.php?id='.$row['NUMERO_RENCONTRE'].'"><span class="oi oi-pencil"></span> Modifier</a>';
                        echo ' ';
                        echo '<a class="btn btn-danger" href="deleteMatch.php?id='.$row['NUMERO_RENCONTRE'].'"><span class="oi oi-x"></span> Supprimer</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    echo'</table>';
                }
            
                else if($_POST['statut'] == "Scores")
                {
                    if(empty($_POST['date'])){
                        $statement = $db->prepare("Select R.NUMERO_RENCONTRE, E.NOM_EQUIPE as NOM1, EQ.NOM_EQUIPE as NOM2, NUMERO_EQUIPE1, NUMERO_EQUIPE2, POINTE1, POINTE2, DATE_RENCONTRE from RENCONTRE R join PARTIE P on R.NUMERO_RENCONTRE = P.NUMERO_RENCONTRE join EQUIPE E on E.NUMERO_EQUIPE = P.NUMERO_EQUIPE1 join EQUIPE EQ on EQ.NUMERO_EQUIPE = P.NUMERO_EQUIPE2 ORDER BY R.NUMERO_RENCONTRE");
                        $statement->execute();
                        echo '<div class="row">';
                        echo '<h1>Liste des Scores</h1>';
                    }
                    else
                    {
                        $statement = $db->prepare("Select R.NUMERO_RENCONTRE, E.NOM_EQUIPE as NOM1, EQ.NOM_EQUIPE as NOM2, NUMERO_EQUIPE1, NUMERO_EQUIPE2, POINTE1, POINTE2, DATE_RENCONTRE from RENCONTRE R join PARTIE P on R.NUMERO_RENCONTRE = P.NUMERO_RENCONTRE join EQUIPE E on E.NUMERO_EQUIPE = P.NUMERO_EQUIPE1 join EQUIPE EQ on EQ.NUMERO_EQUIPE = P.NUMERO_EQUIPE2 where DATE_RENCONTRE = ? ORDER BY R.NUMERO_RENCONTRE");
                        $statement->execute(array($_POST['date']));
                        echo '<div class="row">';
                        echo '<h1>Liste des Scores à la date ' . $_POST['date'] . '</h1>' ;
                    }

                        echo '<table class="table table-striped table-bordered">';
                        echo '<thead>';
                        echo '<tr>';
                        echo '<th>Numéro Rencontre</th>';
                        echo '<th>Equipe 1</th>';
                        echo '<th>Equipe 2</th>';
                        echo '<th>Point Equipe 1</th>';
                        echo '<th>Point Equipe 2</th>';
                        echo '<th>Date Rencontre</th>';
                        echo '<th>Actions</th>';
                        echo ' </tr>';
                        echo '</thead>';
                        echo '<tbody>';
                        while($row = $statement->fetch())
                        {
                            echo '<tr>';
                            echo '<td>'. $row['NUMERO_RENCONTRE'] . '</td>';
                            echo '<td>'. $row['NOM1'] . '</td>';
                            echo '<td>'. $row['NOM2'] . '</td>';
                            echo '<td>'. $row['POINTE1'] . '</td>';
                            echo '<td>'. $row['POINTE2'] . '</td>';
                            echo '<td>'. $row['DATE_RENCONTRE'] . '</td>';
                            echo '<td width=180>';

                            echo '<a class="btn btn-primary" href="updateScore.php?id='.$row['NUMERO_RENCONTRE'].'"><span class="oi oi-pencil"></span> Modifier</a>';
                            
                            echo '</td>';
                            echo '</tr>';
                        }
                    echo'</table>';
                    
                }
                Database::disconnect();
                ?>
        </div>  
        
    </body>
</html>