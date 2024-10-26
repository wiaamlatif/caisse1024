<?php

    $pdo = new PDO("mysql:host=localhost;dbname=caisse1024","root","root");

    $users = $pdo -> query('SELECT * FROM users')
                  ->fetchAll(PDO::FETCH_ASSOC);

    foreach($users as $user ){
?>
    <h1> <?= $user['name'] ?> <h1>
<?php
    }
?>