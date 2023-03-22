<?php
    header("Content-Type: application/json; charset=UTF-8");

    require_once('config.php');
    require_once('init_pdo.php');

    // on récupère la méthode la requête HTTP
    $request_method = $_SERVER['REQUEST_METHOD'];
    
    // on récupère l'URL
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);  
    
    // on découpe l'URL selon les "/" et on range chaque partie dans un tableau
    $uri = explode( '/', $uri );     
    
    //actions différentes en fonction du type de méthode HTTP utilisé
    switch($request_method){
        case 'GET':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $request = $pdo->prepare("SELECT * FROM Users WHERE id = $id");
                $request->execute();
                $resultat = $request->fetchAll(PDO::FETCH_ASSOC);
                $affich = json_encode($resultat);
            }
            else {
                $request = $pdo->prepare("SELECT * FROM Users");
                $request->execute();
                $resultat = $request->fetchAll(PDO::FETCH_ASSOC);
                $affich = json_encode($resultat);
                echo $affich;
            }
        break;

        case 'POST':
            if(isset($_POST['name']) && isset($_POST['email'])) {
                $json = json_decode(file_get_contents('php://input'));
                print_r($json);      
                $name = $json['name'];
                $email = $json['email'];         
                $request = $pdo->prepare("INSERT INTO Users (name, email) VALUES ('$name', '$email')");         
                $request->execute();         
                $resultat = $request->fetchAll(PDO::FETCH_ASSOC);
                $affich = json_encode($resultat);
                echo $affich;
            }
        break;

        case 'PUT':
            if(!empty($uri[5])) {
                $json = json_decode(file_get_contents('php://input'), true);
                $name = $json['name'];
                $email = $json['email'];
                $request = $pdo->prepare("UPDATE Users SET email='" . $email . "' WHERE id=" . $uri[5]);
                $request->execute();
                $request = $pdo->prepare("UPDATE Users SET name='" . $name . "' WHERE id=" . $uri[5]);
                $request->execute();
            }
            break;

        case 'DELETE':
            if(!empty($uri[5])) {
                $request = $pdo->prepare("DELETE FROM Users WHERE id=$uri[5])");
                $request->execute();
            }
            break;
    }

    // close link to database
    $pdo = null;