<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php
require('config.php');
if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['Type'],$_REQUEST['Tel'], $_REQUEST['password'], $_REQUEST['Adresse'] )){
  // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username); 
  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($conn, $email); 
  $Type = stripslashes($_REQUEST['Type']);
  $Type = mysqli_real_escape_string($conn, $Type); 
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password); 
  $Adresse = stripslashes($_REQUEST['Adresse']);
  $Adresse = mysqli_real_escape_string($conn, $Adresse); 
  $Tel = stripslashes($_REQUEST['Tel']);
  $Tel = mysqli_real_escape_string($conn, $Tel);
  // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($conn, $email);
  // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
  //requéte SQL + mot de passe crypté
    $query = "INSERT into `users` (username, email, Type, password, Adresse,Tel)
              VALUES ('$username', '$email', '$Type', '".hash('sha256', $password)."', '$Adresse', '$Tel')";
  // Exécuter la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
       </div>";
    }
}else{
?>
    <form class="box" action="" method="post">
        <h1>Geosante</h1>
        <h1 class="box-title">S'inscrire</h1>
        <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required /><br>
        <input type="text" class="box-input" name="email" placeholder="Email" required /><br>
        <input type="text" class="box-input" name="Type" placeholder="Type" required /><br>

        <input type="password" class="box-input" name="password" placeholder="Mot de passe" required /><br>
        <input type="text" class="box-input" name="Adresse" placeholder="Adresse" required /><br>
        <input type="text" class="box-input" name="Tel" placeholder="Tel" required /><br>

        <input type="submit" name="submit" value="S'inscrire" class="box-button" /><br>
        <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
    </form>
    <?php } ?>
</body>

</html>