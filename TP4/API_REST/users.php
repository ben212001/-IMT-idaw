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
            }

            else {
                $request = $pdo->prepare("SELECT * FROM Users");
            }

            $request->execute();
            $resultat = $request->fetchAll(PDO::FETCH_ASSOC);
            $affich = json_encode($resultat);
            echo $affich;

        break;

        case 'POST':

            if(isset($_POST['name']) && isset($_POST['email'])) {        
                $request = $pdo->prepare("INSERT INTO Users (name, email) VALUES ('".$_POST['name']."', '".$_POST['email']."')");         
                $request->execute();
                $resultat = $request->fetchAll(PDO::FETCH_ASSOC);
                $affich = json_encode($resultat);
                echo $affich;
            }

            else {
                http_response_code(400);
            }

        break;

        case 'PUT':

            // if(!empty($uri[5])) {
            //     $json = json_decode(file_get_contents('php://input'), true);
            //     $name = $json['name'];
            //     $email = $json['email'];
            //     $request = $pdo->prepare("UPDATE Users SET email='" . $email . "' WHERE id=" . $uri[5]);
            //     $request->execute();
            //     $request = $pdo->prepare("UPDATE Users SET name='" . $name . "' WHERE id=" . $uri[5]);
            //     $request->execute();
            // }

        break;

        case 'DELETE':
            
            // if(!empty($uri[5])) {
            //     $request = $pdo->prepare("DELETE FROM Users WHERE id=$uri[5])");
            //     $request->execute();
            // }

        break;
    }

    echo '
    <!DOCTYPE html>
        <html>
            <head>
            </head>
            <body>
                <h1>Liste des utilisateurs</h1>
                    <table>
                        <tr>
                            <td>".$id."</td>
                            <td>".$name."</td>
                            <td>".$email."</td>
                            <td><a href=users.php?id=".$id.">Supprimer</a></td>
                            <td><a href=users.php?id=".$id."&name=".$name."&email=".$email.">Modifier</a></td>
                         </tr>
                    </table>
                    </br>
                    <form id="user_add_form" action="users.php" method="GET">
                        </div>
                        <div class="form-example">
                            <label for="name">Nom :</label>
                            <input type="text" name="name" id="name">
                        </div>
                        <div class="form-example">
                            <label for="email">Email :</label>
                            <input type="email" name="email" id="email">
                        </div>
                            <div class="form-example">
                            <input type="submit" value="Ajouter!">
                        </div>
                    </form>
                    </br>';
    
    // close link to database
    $pdo = null;

    ?>
            </body>
        </html>