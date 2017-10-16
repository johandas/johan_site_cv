<?php require('co.php');?>

<?php
    // mise à jour d'une compétence
    if(isset($_POST['loisirs'])) { // Par le nom du premier input
        $loisirs = addslashes($_POST['loisirs']);
        $id_loisir = $_POST['id_loisir'];
        $pdo->exec("UPDATE t_loisirs SET loisirs = '$loisirs' WHERE id_loisir = '$id_loisir'");
        header('location:loisirs.php');
        exit();
    }
    // je récupère la compétence
    $id_loisir = $_GET['id_loisir']; // par l'id et de $_GET
    $sql = $pdo->query("SELECT * FROM t_loisirs WHERE id_loisir = '$id_loisir' "); // La requête est égale à l'id
    $ligne_loisirs = $sql->fetch();
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
    <h2>Modification d'un loisir</h2>
    <p><a href="loisirs.php">Loisir</a></p>
    <p><?= $ligne_loisirs['loisirs']; ?></p>

    <form action="modif_loisirs.php" method="post">
        <fieldset style="width:0;">
            <legend>Modifier les loisirs</legend>
                <label for="loisirs">Loisirs</label>
                <input id="loisirs" name="loisirs" type="text" value="<?= $ligne_loisirs['loisirs']; ?>" placeholder="Modifier un loisir">
                <input hidden name="id_loisir" value="<?= $ligne_loisirs['id_loisir']; ?>">
                <input type="submit" value= "Mettre à jour">
        </fieldset>
    </form>
</body>
</html>
