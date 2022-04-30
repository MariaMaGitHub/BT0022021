<?php

    require ('db.php');

    $id = $_GET['id'];

    $sql = 'DELETE FROM users WHERE id=:id';

    $preparation = $connexion->prepare($sql);

    if ($preparation->execute([':id' => $id])) {
        header('location: Admin.php');
    }
    
 ?>