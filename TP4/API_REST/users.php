<?php
    require_once('config.php');
    require_once('init_pdo.php');

    function getAllUsers() {
        $request = $pdo->prepare("select * from users");
        $request->execute();
        $users = $request->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    function createUser($name, $email) {
        $request = $pdo->prepare("insert into users (name, email) values ($name, $email)");
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
        $request = $pdo->prepare("select * from users where id = $id");
        $request->execute();
        $user = $request->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    function deleteUserById($id) {
        $request = $pdo->prepare("delete from users where id = $id");
        $result = $request->execute();
        return $result;
    }

    function updateUserById($id, $name, $email) {
        $request = $pdo->prepare("update users set name = $name, email = $email where id = $id");
        $result = $request->execute();
        return $result;
    }
