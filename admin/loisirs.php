<?php require('co.php');?>
<?php
    // Gestion des contenus de la Base de données
    // Insertion d'un loisir
    if(isset($_POST['loisirs'])) { // Si on a posté un nouveau loisir
        if($_POST['loisirs'] != '')  { // Si loisir n'est pas vide
            $loisir = addslashes($_POST['loisirs']);
            $pdo->exec("INSERT INTO t_loisirs VALUES (NULL, '$loisir', '1')"); // mettre $id_utilisateur quand on l'aura dans la varible de session
            header('location: loisirs.php');
            exit();
        } // ferme le if $_POST
    } // ferme le if isset du form
    // Suppression d'un loisir
    if(isset($_GET['id_loisir'])) { // on récupère le loisir. par son id dans l'url
        $efface = $_GET['id_loisir']; //  je mets cela dans une variable
        $sql = " DELETE FROM `t_loisirs` WHERE id_loisir = '$efface'";
        $pdo->query($sql); // on peut avec exec aussi si on veut
        header('location: loisirs.php'); // pour revenir sur la page

    } // ferme le if isset
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"  href="css/styleadmin.css">
    <?php
    $sql = $pdo->query("SELECT * FROM t_utilisateurs WHERE id_utilisateur='1'");
    $ligne_utilisateurs = $sql -> fetch();
    ?>
    <title>Admin : <?= $ligne_utilisateurs['pseudo']; ?></title>
</head>
<body>
    <h1>Admin : <?= $ligne_utilisateurs['prenom'] . ' ' . $ligne_utilisateurs['nom'];  ?></h1>
    <p>texte</p>
    <hr>
    <?php
    $sql = $pdo->prepare("SELECT * FROM t_loisirs WHERE utilisateur_id='1'");
    $sql -> execute();
    $nbr_loisirs = $sql->rowCount();
    ?>
    <div    >
    <h2>Il y a  <?= $nbr_loisirs; ?> loisirs</h2>
    <table border="3" style="border-collapse:collapse;">
        <tr>
            <th>Loisirs</th>
            <th>Suppression</th>
            <th>Modification</th>

        </tr>
        <tr>
            <?php while($ligne_loisir = $sql->fetch()) { ?>
                <td><?= $ligne_loisir['loisirs']; ?></td>
                <td class = "supr"><a href="loisirs.php?id_loisir=<?= $ligne_loisir['id_loisir']; ?>">Delete</a></td>
                <td class = "modif"><a href="modif_loisirs.php?id_loisir=<?= $ligne_loisir['id_loisir']; ?>">Modifier</a></td>
            </tr>
        <?php } ?>
    </table>
    <hr>
    <h3>Insertion d'un loisir</h3>
    <form action="loisirs.php" method="post">
        <fieldset style="width:0;">
            <legend>Ajout des loisirs</legend>
                <label for="loisirs">Loisirs</label>
                <input id="loisirs" name="loisirs" type="text" placeholder="Inserer un loisir">
                <input type="submit" value= "ajouté un loisir">
        </fieldset>
    </form>
</body>
</html>
