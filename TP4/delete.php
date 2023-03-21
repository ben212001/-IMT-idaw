<?php 
    require_once('init_pdo.php');

    // print_r($_GET);
    $idToDelete = $_GET['id'];
    $sql = "DELETE FROM users WHERE id = $idToDelete";

    $request = $pdo->prepare($sql);
    $request->execute();

    // require_once('users.php');
    header('Location: users.php');