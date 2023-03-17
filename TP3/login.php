<!DOCTYPE html>
<head>
    <title>BenPuz</title>
    <link rel="stylesheet" href="<?php echo $style; ?>.css">
</head>

<body>
    <form id="login_form" action="connected.php" method="POST">
        <table>
            <tr>
                <th>Login :</th>
                <td><input type="text" name="login"></td>
            </tr>
            <tr>
                <th>Mot de passe :</th>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="Se connecter" /></td>
            </tr>
        </table>
    </form>
    <h2>Ton login de session est <?php $login_session ?> </h2>;
</body>