sklep.php

<?php
  include('php.php');
  poczatek_sesji();
?>
<!doctype html>
<html>
  <head>
    <title>Testowanie skryptów PHP</title>
    <meta charset="utf-8" />
  </head>
  <body>
    <h1>Sklep internetowy</h1>
    <p><a href="ksiazki.php">Książki</a></p>
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