<?php require('co.php');?>
<?php
    // je récupère la compétence 
    $id_competence = $_GET['id_competence']; // par l'id et de $_GET 
    $sql = $pdo->query("SELECT * FROM t_competences WHERE id_competence='$id_competence' "); // La requête est égale à l'id
    $ligne_competence = $sql->fetch();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    
    // WHERE id_utilisateur='1'
    $sql = $pdo->query("SELECT * FROM t_utilisateurs WHERE id_utilisateur='1' ");
    $ligne_utilisateurs = $sql->fetch();
    
    echo '<pre>';
    print_r($ligne_utilisateurs);
    echo '</pre>';
    ?>    
    <title>Admin du site CV : <?= $ligne_utilisateurs['pseudo']; ?></title>
</head>
<body>
    <h1>Admin du site CV : <?= $ligne_utilisateurs['prenom'] . ' ' . $ligne_utilisateurs['nom'];  ?></h1>
    <p>texte</p>
    <hr>
    
    <h2>Accueil admin</h2>
    <p><a href="competences.php">Compétences</a></p>
    <p><?= $ligne_competence['competence']; ?></p>
    
    <form action="modif_competence.php" method="post">
        <fieldset style="width:0;">
            <legend>Modifier des compétences</legend>
                <label for="competence">Compétence</label>
                <input id="competence" name="competence" type="text" placeholder="Modifier une compétence">
                <label>Niveau</label>
                <input id="c_niveau" name="c_niveau" type="text" placeholder="Modifier le niveau">
                <input type="submit" value= "ajouté une compétence"
        </fieldset>
    </form>
    
</body>
</html>
