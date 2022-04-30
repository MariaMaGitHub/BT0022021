<?php 
    require('db.php');

    $sql = 'SELECT * FROM users';
    
    $preparation = $connexion->prepare($sql);

    $preparation->execute();

    $customer = $preparation->fetchAll(PDO::FETCH_OBJ);


    require('header.php');
?>


<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Utilisateur</h2>
        </div>

        <div class="card-body">
            <table style="font-size:15px;" class=" table-bordered">
                <tr>
                    <th>id</th>
                    <th>username</th>
                    <th>email</th>
                    <th>Type</th>
                    <th>password</th>
                    <th>Tel</th>
                    <th>Adresse</th>
                    <th>Action</th>
                </tr>
                <?php foreach($customer as $person): ?>
                <tr>
                    <td><?=$person->id;  ?></td>
                    <td><?=$person->username;  ?></td>
                    <td><?=$person->email;  ?></td>
                    <td><?=$person->Type;  ?></td>
                    <td><?=$person->password;  ?></td>
                    <td><?=$person->Adresse;  ?></td>
                    <td><?=$person->Tel;  ?></td>

                    <td>
                        <a href="modifier.php?id=<?= $person->id;?>" class=""><i class="fa fa-edit"
                                style="font-size:30px;color:blue"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a onclick="return confirm('Voulez-vous vraiment supprimer cet enregistrement?')"
                            href="supprimer.php?id=<?= $person->id;?>" class=""><i class="fa fa-trash-o"
                                style="font-size:30px;color:red"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;


                    </td>
                </tr>

                <?php endforeach; ?>


            </table>

        </div>

    </div>
</div>



<?php require('footer.php'); ?>