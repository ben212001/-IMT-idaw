<?php
    $style = "style1";
    if(isset($_COOKIE['cookie_style'])) {
        $style = $_COOKIE['cookie_style'];
    }
    if(isset($_GET['css'])) {
        $style = $_GET['css'];
    }
    setcookie("cookie_style", $style, time()+ 300);
?>

<!DOCTYPE html>
<head>
    <title>BenPuz</title>
    <link rel="stylesheet" href="<?php echo $style; ?>.css">
</head>

<body>
    <h1>Le style est <?php echo $style; ?> </h1>;
    <form id="style_form" action="index.php" method="GET">
        <select name="css">
            <option value="style1">style1</option>
            <option value="style2">style2</option>
        </select>
        <input type="submit" value="Appliquer" />
    </form>
    <h2>Ton login de session est <?php $login_session ?> </h2>;
</body>