<?php
    require_once('init_pdo.php');

    $sql = "DROP TABLE users";
    $pdo->exec($sql);

    $createDB = file_get_contents('TP4 IDAW.sql');
    $pdo->exec($createDB);

