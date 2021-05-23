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
    
    <title>Formularz - wiek</title>
    
</head>
<body>
<div id="register-form">
    <h1>Wiek</h1>
    <form>
        <div class="form-group">
            <label for="age">Podaj swój wiek</label>
            <input id="age"  class="form-control" type="text" name="age" />
        </div>
        <input type="submit_age" class="btn btn-default" name="submit_age" value="Prześlij" />
    </form>

    <?php
  
  extract($_REQUEST);
  if (! isset ($submit_age)) { exit; } 
  
  if($age < 18) {
    print "Oferta jest dostępna dla osób powyżej 18 lat - jeżeli chcesz skorzystać z naszych usług - poproś osobę dorosłą o to aby wyraziła zgodę na zawarcie umowy";
  }
  else {
    print "Możesz skorzystać z naszych usług - zobacz wszystkie.”;
  }
    
    ?>
</div>
</body>
</html>