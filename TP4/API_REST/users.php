<?php
    require_once('config.php');
    require_once('init_pdo.php');

    function getAllUsers() {
        global $pdo;
        $request = $pdo->prepare("select * from users");
        $request->execute();
        $users = $request->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    function createUser($login, $email) {
        global $pdo;
        $request = $pdo->prepare("insert into users (login, email) values ('$login', '$email')");
        $result = $request->execute();
        if ($result) {
            $id = $pdo->lastInsertId();
            $request = $pdo->prepare("select * from users where id = $id");
            $request->execute();
            $user = $request->fetch(PDO::FETCH_ASSOC);
            return $user;
        } else {
            return false;
        }
    }

    function getUserById($id) {
        global $pdo;
        $request = $pdo->prepare("select * from users where id = $id");
        $request->execute();
        $user = $request->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    function deleteUserById($id) {
        global $pdo;
        //verify if $id exists in the database
        $user = getUserById($id);
        if (!$user) {
            return false;
        }
        //delete user
        $request = $pdo->prepare("delete from users where id = $id");
        $result = $request->execute();
        return $result;
    }

    function updateUserById($id, $login, $email) {
        global $pdo;
        $request = $pdo->prepare("update users set login = '$login', email = '$email' where id = $id");
        $result = $request->execute();
        return $result;
    }
