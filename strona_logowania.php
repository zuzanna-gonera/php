<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Zuzanna Gonera">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Sklep internetowy, Yoga, Joga, Akcesoria do jogi, Odzież do jogi">
    <meta name="description" content="Sklep internetowy z akcesoriami do jogi">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="register_style.css" />
    
    <title>Strona logowania</title>
 
    <link rel="stylesheet" href="style.css" />
 
    <title>Strona logowania</title>
</head>
    
<body>
<?php
session_start();
// Sprawdzamy czy użytkownik jest zalogowany
if (!empty($_SESSION['user'])) {

    if (isset($_GET['logout'])) {
    
        unset($_SESSION['user']);
       
        header('Location: strona_logowania.php');
    }

    $user = $_SESSION['user'];
    echo ' 
        <div id="loggedin">
            Jesteś zalogowany jako <b>'.$user['first_name'].' '.$user['last_name'].' </b>
            <br /><br />
            <a class="btn btn-default" href="\strona_logowania.php?logout=1">Wyloguj się</a>
        </div>
        ';
} else {

    require_once __DIR__. '\login.php';
}
?>
</body>
</html>