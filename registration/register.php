<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" />
</head>
<style>
th, td {
  border: 1px solid black;
  border-radius: 7px;
  background-color: #1e2d5c;
}
th, td {
  padding-top: 0px;
  padding-bottom: 0px;
  padding-left: 12px;
  padding-right: 12px;
}
</style>
<br><br>

<body>

<center>
<table>
<th width="1000"><h2 style="color:#4e7db0"></h2></th>
</table>

<br><br>

<table>
<th width="1000"><h3 style="color:#4e7db0"></h3></th>
</table>
</center>

<br><br>

<?php
require('config.php');
if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){
  // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username);
  // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($conn, $email);
  // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
  //requéte SQL + mot de passe crypté
    $query = "INSERT into `users` (username, email, password)
              VALUES ('$username', '$email', '".hash('sha256', $password)."')";
  // Exécuter la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
             <h2>Vous êtes inscrit avec succès.</h2>
             <p><a href='login.php'><b>CONNEXION</b></a></p>
       </div>";
    }
}else{
?>
<form class="box" action="" method="post">
  <h1 class="box-logo box-title"><font color="#F5FFFA">PROJET SRVAPP01</font></h1>
    <h3 class="box-title"><font color="#244B5C"><center>CRÉEZ VOTRE COMPTE</center></font></h3>
  <input type="text" class="box-input" name="username" placeholder="IDENTIFIANT" required />
    <input type="text" class="box-input" name="email" placeholder="EMAIL" required />
    <input type="password" class="box-input" name="password" placeholder="PASSWORD" required />
    <input type="submit" name="submit" value="S'INSCRIRE" class="box-button" />
    <p class="box-register"><b>DÉJA INSCRIT ?&nbsp;</b><a href="login.php"><b>&nbsp; CONNEXION</b></a></p>
</form>
<?php } ?>

<br><br><br><br>

<center>
<table>
<th width="1000"><h3 style="color:#4e7db0">Site développé par Nathanael Desnoyers&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;Repository<a target="_blank" style="color:#7b2bc3;" href="https://github.com/Kusanagi8200">&nbsp;github.com/Kusanagi8200</a></h3></th>
</table>
</center>

</body>
</html>
