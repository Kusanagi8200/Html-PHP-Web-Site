<!DOCTYPE html>
<html>
<head>
  <title>LOGIN</title>
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

<body>

<br><br>

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
session_start();

if (isset($_POST['username'])){
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `users` WHERE username='$username' and password='".hash('sha256', $password)."'";
  $result = mysqli_query($conn,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
  if($rows==1){
      $_SESSION['username'] = $username;
      header("Location: /registration/site/index.html");
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}
?>

<br><br>

<form class="box" action="" method="post" name="login">
<h1 class="box-logo box-title"><font color="#F5FFFA"><b>PROJET SRVAPP01</b></font></h1>
<h3 class="box-title"><font color="#244B5C"><center>BIENVENUE</center></font></h3>
<input type="text" class="box-input" name="username" placeholder="IDENTIFIANT">
<input type="password" class="box-input" name="password" placeholder="PASSWORD">
<input type="submit" value="CONNEXION " name="submit" class="box-button">
<p class="box-register"><b>NOUVEL UTILISATEUR ?</b> <a href="register.php"><b>INSCRIPTION</b></a></p>
<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>

<br><br>

<center>
<table>
<th width="1000"><h3 style="color:#4e7db0">Site développé par Nathanael Desnoyers&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;Repository<a target="_blank" style="color:#7b2bc3;" href="https://github.com/Kusanagi8200">&nbsp;github.com/Kusanagi8200</a></h3></th>
</table>
</center>

</body>
</html>
