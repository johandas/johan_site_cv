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
<?php include('index.php');?>
    <?php
    $sql = $pdo->prepare("SELECT * FROM t_loisirs WHERE utilisateur_id='1'");
    $sql -> execute();
    $nbr_loisirs = $sql->rowCount();
    ?>
    <div    >
    <h2>Il y a  <?= $nbr_loisirs; ?> loisirs</h2>
    <div class="container">
    <table class="table" border="3" style="border-collapse:collapse;">
        <tr>
            <th>Loisirs</th>
            <th>Suppression</th>
            <th>Modification</th>

        </tr>
        <tr>
            <?php while($ligne_loisir = $sql->fetch()) { ?>
                <td><?= $ligne_loisir['loisirs']; ?></td>
                <td class = "supr"><a href="loisirs.php?id_loisir=<?= $ligne_loisir['id_loisir']; ?>"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a></td>
                <td class = "modif"><a href="modif_loisirs.php?id_loisir=<?= $ligne_loisir['id_loisir']; ?>"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></button></a></td>
            </tr>
        <?php } ?>
    </table>
    </div>
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
