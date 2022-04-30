<?php  require('db.php');  ?>

<?php
@$id = $_GET['id'];

$sql = 'SELECT * FROM users WHERE id=:id';
$preparation = $connexion->prepare($sql);
$preparation->execute([':id' => $id]);
$person = $preparation->fetch(PDO::FETCH_OBJ);

?>


<?php

if (isset($_POST['username'], $_POST['email'], $_POST['Type'],$_POST['Tel'], $_POST['password'], $_POST['Adresse'] )){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $Type = $_POST['Type'];
    $password = $_POST['password'];
    $Tel = $_POST['Tel'];
    $Adresse = $_POST['Adresse'];

        $sql = 'UPDATE users SET username=:username, email=:email,  type=:type, mot de passe=:mot de passe, Tel=:Tel, Adresse=:Adresse, WHERE id=:id';

        $preparation = $connexion->prepare($sql);

        if ($preparation->execute([':username' => $username, ':email' => $email, ':Type' => $Type, ':mot de passe' => $password, ':Tel' => $phone, ':Adresse' => $Adresse, ':id' => $id])) {
            header("location: Admin.php");
        }

}
    


?>



<?php require 'header.php' ?>




<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Mettre à jour utlisateur</h2>

        </div>
        <div class="card-body">
            <?php  if (!empty($message)): ?>

            <div class="alert alert-success">
                <?= $message; ?>
            </div>
            <?php endif; ?>

            <form action="" method="post">
                <div class="form-group">
                    <label for="username">username</label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>

                <div class="form-group">
                    <select class="box-input" name="type" id="type">
                        <option value="" disabled selected>Type</option>

                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="mot de passe">password</label>
                    <input type="password" class="form-control" name="password" placeholder="Mot de passe" required />
                </div>
                <div class="form-group">
                    <label for="phone">Tel</label>
                    <input type="text" name="phone" id="phone" class="form-control">
                </div>

                <div class="form-group">
                    <label for="Adresse">Adresse</label>
                    <input type="text" name="Adresse" id="Adresse" class="form-control">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>

                </div>
            </form>


        </div>
    </div>

</div>


<?php require('footer.php'); ?>