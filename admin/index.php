<?php require('co.php')?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Admin : <?= $ligne_utilisateurs['pseudo']; ?></title>
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/styleadmin.css" rel="stylesheet">
  <?php
  $sql = $pdo->query("SELECT * FROM t_utilisateurs WHERE id_utilisateur='1' ");
  $ligne_utilisateurs = $sql->fetch();
  ?>
</head>
<body>
  <!-- navbar bootstrap -->
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Acceuil</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <a class="navbar-brand" href="#">Utilisateur</a>
          <a class="navbar-brand" href="#">Titre CV</a>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Parcours<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Expériences</a></li>
              <li><a href="#">Réalisations</a></li>
              <li><a href="#">Formations</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Compétences<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Compétences</a></li>
              <li><a href="#">Loisirs</a></li>
              <li><a href="#">Réseaux</a></li>
            </ul>
          </li>
        </ul>
        <form class="navbar-form navbar-left">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Recherche...">
          </div>
          <button type="submit" class="btn btn-default">Rechercher</button>
        </form>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $ligne_utilisateurs['pseudo']?><span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Déconnexion</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <h1>Admin : <?= $ligne_utilisateurs['prenom'] . ' ' . $ligne_utilisateurs['nom'];  ?></h1>
  <h2></h2>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
