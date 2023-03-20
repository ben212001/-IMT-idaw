<?php 
    require_once('init_pdo.php');

    $idToDelete = $_GET(['id']);
    $sql = "DELETE FROM users WHERE id = $idToDelete";
    $request = $pdo->prepare($sql);
    $request->execute();

    require_once('users.php');
