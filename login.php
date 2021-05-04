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
    
</head>

<body>
<div id="login-form">
<h1>Zaloguj się</h1>
<form class="login-form" action="strona_logowania.php" method="post">
    <div class="form-group">
        <label for="usernameInput">Login:</label>
        <input class="form-control" id="usernameInput" type="text" name="username" /><br />
    </div>
    <div class="form-group">
        <label for="passwordInput">Hasło:</label>
        <input class="form-control" type="password" name="password" /><br />
    </div>
    <input type="submit" name="submit" class="btn btn-default" value="Login" />
</form>
<p>Nie jeszcze masz konta? <a href="/php/register.php">Zarejestruj się</a> </p>
<?php

if (isset($_POST['submit'])){
 
    require_once __DIR__ . "/config.php";
 
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
 
    if ($mysqli->connect_error) {
        
        echo "<p>Wystąpił błąd podczas lączenia z bazą danych: {$mysqli->connect_error}</p>";
        exit();
    }
 
    $username = $_POST['username'];
   
    $password = sha1($_POST['password']);
 
    $sql = "SELECT id, username, first_name, last_name, email from users WHERE username LIKE '{$username}' AND password LIKE '{$password}' LIMIT 1";
    $result = $mysqli->query($sql);
 
    if ($result->num_rows === 0) {
        
        echo '<p class="red">Zły login lub hasło.</p>';
    } else {
        
        $_SESSION['user'] = $user;
        
        header('Location: strona_logowania.php');
    }
}
?>
</div>
</body>
</html>