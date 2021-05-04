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
    
    <title>Formularz rejestracji</title>
    
</head>
<body>
<div id="register-form">
    <h1>Rejestracja</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <div class="form-group">
            <label for="usernameInput">Login:</label>
            <input id="usernameInput"  class="form-control" type="text" name="username" />
        </div>
        <div class="form-group">
            <label for="passwordInput">Hasło:</label>
            <input id="passwordInput" class="form-control" type="password" name="password" />
        </div>
        <div class="form-group">
            <label for="firstnameInput">Imię:</label>
            <input id="firstnameInput" class="form-control" type="text" name="first_name" />
        </div>
        <div class="form-group">
            <label for="lastnameInput">Nazwisko:</label>
            <input id="lastnameInput" class="form-control" type="text" name="last_name" />
        </div>
        <div class="form-group">
            <label for="emailInput">E-mail:</label>
            <input id="emailInput" class="form-control" type="text" name="email" />
        </div>
        <input type="submit" class="btn btn-default" name="submit" value="Zarejestruj" />
    </form>

    <?php
 
    if (isset($_POST['submit'])) {
        
        require_once __DIR__ . '\config.php';

        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($mysqli->connect_error) {
            
            echo "<p class='red'>Wystąpił błąd podczas łączenia z bazą danych: {$mysqli->connect_error}</p>";
            exit();
        }

        $username	= $_POST['username'];
        $password	= sha1($_POST['password']);
        $first_name	= $_POST['first_name'];
        $last_name	= $_POST['last_name'];
        $email	= $_POST['email'];

        
        if (empty($username) || empty($password) || empty($email)) {
            echo '<p class="red">Login, hasło i email nie mogą być puste</p>';

        } else {
            $isLoginTaken = false;
            $isEmailTaken = false;
            
            $result = $mysqli->query("SELECT username from users WHERE username = '{$username}' LIMIT 1");
            if ($result->num_rows === 1) {
                $isLoginTaken = true;
            }
           
            $result = $mysqli->query("SELECT email from users WHERE email = '{$email}' LIMIT 1");
            if ($result->num_rows === 1) {
                $isEmailTaken = true;
            }


            if ($isLoginTaken && $isEmailTaken) {
               
                echo '<p class="red">Konto z podaną nazwą użytkownika i adresem email już istnieje.</p>';
            } elseif($isLoginTaken) {
               
                echo '<p class="red">Nazwa użytkownika jest zajęta.</p>';
            } elseif ($isEmailTaken) {
               
                echo '<p class="red">Konto z podanym adresem email już istnieje.</p>';
            } else {
               
                $sql = "INSERT  INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `email`) 
            VALUES (NULL, '{$username}', '{$password}', '{$first_name}', '{$last_name}', '{$email}')";

                if ($mysqli->query($sql)) {
                  
                    header('Location: strona_logowania.php');
                } else {
                    
                    echo "<p class='red' '>Wystąpił błąd podczas dodawania użytkownika: {$mysqli->connect_error}</p>";
                    exit();
                }
            }

        }
    }
    ?>
</div>
</body>
</html>