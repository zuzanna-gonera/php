<?php
  include('php.php');
  poczatek_sesji();
?>
<!doctype html>
<html>
  <head>
    <title>Produkty</title>
    <meta charset="utf-8" />
  </head>
  <body>
    <h1>Koszyk</h1>
    <p><a href="odziez.php">Odzież</a></p>
    <p><a href="akcesoria.php">Akcesoria</a></p>
    <br />
    <form action="sklep.php" method="post">
      <input type="submit" name="pusty_koszyk"  value="Pusty koszyk" />
      <input type="submit" name="pokaz_koszyk"  value="Pokaż koszyk" />
    </form>
    <?php
      pusty_koszyk();
      pokaz_koszyk();
    ?> 
  </body>
</html>