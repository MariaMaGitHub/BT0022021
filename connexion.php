<?php


$user='root';
$password='';

try {
    $db=new PDO ('mysql:host=localhost;dbname=registration',$user,$password);
    //echo "Connexion avec succées";

} catch (PDOException $th) {
    echo "erreur:".$th->getMessage()."<br>";

}
?>