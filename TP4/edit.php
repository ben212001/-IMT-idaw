<?php 
    require_once('init_pdo.php');

    $idToEdit = $_GET['id'];

    $log = $pdo->prepare("SELECT login FROM users WHERE id = $idToEdit");
    $log -> execute();
    $loginToEdit = $log -> fetch(PDO::FETCH_ASSOC);

    $email = $pdo->prepare("SELECT email FROM users WHERE id = $idToEdit");
    $email -> execute();
    $emailToEdit = $email -> fetch(PDO::FETCH_ASSOC);

    // $sql = "DELETE FROM users WHERE id = $idToEdit";
    // $request = $pdo->prepare($sql);
    // $request->execute();


    echo'</table>
    <br>
    <h3> Ajouter un utilisateur :</h3>
    <form id="add_form" method="POST">
        <table>
            <tr>
                <th>Login :</th>
                <td><input type="text" id="login" value="'. $loginToEdit['login'] . '"></td>
            </tr><tr>
                <th>Email :</th>
                <td><input type="email" id="email" value="' . $emailToEdit['email'] . '"></td>
            </tr><tr>
                <th></th>
                <td><input type="submit" name="submit" value="Ajouter" /></td>
            </tr>
        </table>';

    // require_once('users.php');
    // header('Location: users.php');