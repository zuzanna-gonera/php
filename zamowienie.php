<?php
        $ilosc = $_POST['ilosc'];
        $cena = $_POST['cena'];
        $suma = $ilosc * $cena;

        echo "Podaj ilość produktów: $ilosc <br/>";
        echo "Podaj cenę: $cena <br/><br/>";
        echo "Wartość zamówienia: $suma"; 

        echo "<table>";
        echo "<tr><td>" . 'Ilość produktów: ' . $ilosc . "</td></tr>";
        echo "<tr><td>" . 'Cena: ' . $cena . "</td></tr>";
        echo "<tr><td>" . 'Wartość produktów: ' . $suma . "</td></tr>";
        echo "</table>";
        
        echo "<a href=formularz.php>Powrót</a>";
?>