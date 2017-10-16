<?php require('co.php');?>

<?php
    // mise à jour d'une compétence
    if(isset($_POST['competence'])) { // Par le nom du premier input
        $competence = addslashes($_POST['competence']);
        $c_niveau = addslashes($_POST['c_niveau']);
        $id_competence = $_POST['id_competence'];

        $pdo->exec("UPDATE t_competences SET competence = '$competence', c_niveau = '$c_niveau' WHERE id_competence = '$id_competence'");
        header('location:competences.php');
        exit();
    }
    // je récupère la compétence
    $id_competence = $_GET['id_competence']; // par l'id et de $_GET
    $sql = $pdo->query("SELECT * FROM t_competences WHERE id_competence = '$id_competence' "); // La requête est égale à l'id
    $ligne_competence = $sql->fetch();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"  href="css/styleadmin.css">
    <?php
    // WHERE id_utilisateur='1'
    $sql = $pdo->query("SELECT * FROM t_utilisateurs WHERE id_utilisateur='1' ");
    $ligne_utilisateurs = $sql->fetch();
    // echo '<pre>';
    // print_r($ligne_utilisateurs);
    // echo '</pre>';
    ?>
    <title>Admin du site CV : <?= $ligne_utilisateurs['pseudo']; ?></title>
</head>
<body>
    <h1>Admin du site CV : <?= $ligne_utilisateurs['prenom'] . ' ' . $ligne_utilisateurs['nom'];  ?></h1>
    <p>texte</p>
    <hr>
    <h2>Modification d'une compétence</h2>
    <p><a href="competences.php">Compétences</a></p>
    <p><?= $ligne_competence['competence']; ?></p>

    <form action="modif_competence.php" method="post">
        <fieldset style="width:0;">
            <legend>Modifier des compétences</legend>
                <label for="competence">Compétence</label>
                <input id="competence" name="competence" type="text" value="<?= $ligne_competence['competence']; ?>" placeholder="Modifier une compétence">
                <label>Niveau</label>
                <input id="c_niveau" name="c_niveau" type="number" value="<?= $ligne_competence['c_niveau']; ?>" placeholder="Modifier le niveau">
                <input hidden name="id_competence" value="<?= $ligne_competence['id_competence']; ?>">
                <input type="submit" value= "Mettre à jour">
        </fieldset>
    </form>
</body>
</html>
