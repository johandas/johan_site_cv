<?php require('co.php');?>
<?php
    // Gestion des contenus de la Base de données
    // Insertion d'une compétence
    if(isset($_POST['competence'])) { // Si on a posté une nouvelle compétence
        if($_POST['competence'] != '' && $_POST['c_niveau'] != '')  { // Si compétence n'est pas vide
            $competence = addslashes($_POST['competence']);
            $c_niveau   = addslashes($_POST['c_niveau']);
            $pdo->exec("INSERT INTO t_competences VALUES (NULL, '$competence', '$c_niveau', '1')"); // mettre $id_utilisateur quand on l'aura dans la varible de session
            header('location:competences.php');
            exit();
        } // ferme le if $_POST
    } // ferme le if isset du form
    // Suppression d'une compétence
    if(isset($_GET['id_competence'])) { // on récupère la comp. par son id dans l'url
        $efface = $_GET['id_competence']; //  je mets cela dans une variable
        $sql = " DELETE FROM t_competences WHERE id_competence = '$efface'";
        $pdo->query($sql); // on peut avec exec aussi si on veut
        header('location:competences.php'); // pour revenir sur la page

    } // ferme le if isset
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    $sql = $pdo->prepare("SELECT * FROM t_competences");
    $sql -> execute();
    $nbr_competences = $sql->rowCount();
    ?>
    <h2>Il y a  <?= $nbr_competences; ?> compétences</h2>
    <table border="3" style="border-collapse:collapse;">
        <tr>
            <th>Compétences</th>
            <th>Niveau en %</th>
            <th>Suppression</th>
            <th>Modification</th>

        </tr>
        <tr>
            <?php while($ligne_competences = $sql->fetch()) {      ?>
                <td><?= $ligne_competences['competence']; ?></td>
                <td><?= $ligne_competences['c_niveau']; ?></td>
                <td><a href="competences.php?id_competence=<?= $ligne_competences['id_competence']; ?>">Supprimer</a></td>
                <td><a href="modif_competence.php?id_competence=<?= $ligne_competences['id_competence']; ?>">Modifier</a></td>

            </tr>
        <?php } ?>
    </table>
    <hr>
    <h3>Insertion d'une compétence</h3>
    <form action="competences.php" method="post">
        <fieldset style="width:0;">
            <legend>Ajout des compétences</legend>
                <label for="competence">Compétence</label>
                <input id="competence" name="competence" type="text" placeholder="Inserer une compétence">
                <label>Niveau</label>
                <input id="c_niveau" name="c_niveau" type="text" placeholder="Inserer le niveau">
                <input type="submit" value= "ajouté une compétence"
        </fieldset>
    </form>
</body>
</html>
