<?php
    require_once('init_pdo.php');

    $request = $pdo->prepare("select * from users");

        //print_r($_POST);
        if (isset($_POST['submit'])) {
            $login = $_POST['login'];
            $email = $_POST['email'];
    
            $sql = "INSERT INTO users(login, email) VALUES('$login' , '$email')";
    
            $pdo->exec($sql);
        }
    
        $pdo = null;

    $request -> execute();

    echo '<html>
    <h1> Liste des utilisateurs </h1>
    <table> 
        <tr> 
            <td> Id </td>
            <td> Login </td>
            <td> Email </td>
        </tr>' ;

    $resultat = $request->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($resultat as $row) {
        
        echo '<tr> 
                <td> ' . $row['id'] . ' </td> 
                <td> ' . $row['login'] . ' </td>
                <td> ' . $row['email'] . '</td>
                <td><a href="edit.php?id=' . $row['id'] . '">Modifier</a></td>
                <td><a href="delete.php?id=' . $row['id'] . '">Supprimer</a></td>
            </tr>';
    }
    
    echo '</table>';

    /*echo '<pre>';
    print_r($resultat);
    echo '</pre>';
    */

    echo'  
    <br>
    <h3> Ajouter un utilisateur :</h3>
    <form id="add_form" method="POST">
        <table>
            <tr>
                <th>Login :</th>
                <td><input type="text" id="login" name="login"></td>
            </tr>
            <tr>
                <th>Email :</th>
                <td><input type="email" id="email" name="email"></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" name="submit" value="Ajouter" /></td>
            </tr>
        </table>
    </form> ';
?>