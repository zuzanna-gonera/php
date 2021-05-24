<?php
  include('php.php');
  poczatek_sesji();
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
  </head>
  <body>
    <h1>Odzież</h1>
    <p><a href="sklep.php">Sklep internetowy Yoga</a></p>
    <p><a href="akcesoria.php">Akcesoria</a></p>
    <br />
    <form action="odziez.php" method="post">
      <p>
        <label><input type="checkbox" name="towary[]"  
          value="000000Top sportowy" />
          Top sportowy
        </label>
        , cena <input type="text" name="cena0" value="79" style="width:30px;" />
        , ilość <input type="text" name="ile0" style="width:30px;" />
      </p>
      <p>
        <label><input type="checkbox" name="towary[]"  
          value="000001Legginsy sportowe" />
          Legginsy sportowe
        </label>
        , cena <input type="text" name="cena1" value="119" style="width:30px;" />
        , ilość <input type="text" name="ile1" style="width:30px;" />
      </p>
      <p>
        <label><input type="checkbox" name="towary[]"  
          value="000002Bluza sportowa" />
          Bluza sportowa
        </label>
        , cena <input type="text" name="cena2" value="199" style="width:30px;" />
        , lość <input type="text" name="ile2" style="width:30px;" />
      </p>
    
      <input type="submit" name="do_koszyka"  value="Do koszyka" />
      <input type="submit" name="pusty_koszyk"  value="Pusty koszyk" />
      <input type="submit" name="pokaz_koszyk"  value="Pokaż koszyk" />
    </form>
    <?php
      do_koszyka(true);
      pusty_koszyk();
      pokaz_koszyk();
    ?> 
  </body>
</html>