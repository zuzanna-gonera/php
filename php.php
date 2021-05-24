<?php
  function poczatek_sesji()
  {
    @session_start();
    if (!isset($_SESSION['koszyk']))
    {
      $_SESSION['koszyk']=array('odziez'=>array(),'akcesoria'=>array());
    }
  }

  function do_koszyka($odziez)
  {
    if (!isset($_POST['do_koszyka'])) return;
    if (count($_POST['towary'])===0) return;
    $towary=$_POST['towary'];
    foreach($towary as $towar)
    {
      $id=(int)(substr($towar,0,6));
      $klucz_cena='cena'.$id;
      $klucz_ilosc='ile'.$id;
      if ($odziez)
      {
        $count=count($_SESSION['koszyk']['odziez']);
        $_SESSION['koszyk']['odziez'][$count]['opis']=substr($towar,6);
        $_SESSION['koszyk']['odziez'][$count]['cena']=$_POST[$klucz_cena];
        $_SESSION['koszyk']['odziez'][$count]['ilosc']=$_POST[$klucz_ilosc];
      }
      else
      {
        $count=count($_SESSION['koszyk']['akcesoria']);
        $_SESSION['koszyk']['akcesoria'][$count]['opis']=substr($towar,6);
        $_SESSION['koszyk']['akcesoria'][$count]['cena']=$_POST[$klucz_cena];
        $_SESSION['koszyk']['akcesoria'][$count]['ilosc']=$_POST[$klucz_ilosc];
      }
    }
  }  

  function pusty_koszyk()
  {
    if (!isset($_POST['pusty_koszyk'])) return;
    $_SESSION['koszyk']['odziez']=array();
    $_SESSION['koszyk']['akcesoria']=array();
    echo '<br />Koszyk jest pusty!';
  }
  
  function pokaz_koszyk()
  {
    if (!isset($_POST['pokaz_koszyk'])) return;
    $odziez=$_SESSION['koszyk']['odziez'];
    $akcesoria=$_SESSION['koszyk']['akcesoria'];
    
    echo '<br />';
    if (count($odziez)===0 && count($akcesoria)===0)
    {
      echo 'Koszyk jest pusty!';
      return;
    }
    
    $suma=0;
    if (count($odziez)>0)
    {
      echo 'Odzież:<br />';
      for($k=0;$k<count($odziez);$k++)
      {
        $suma+=$odziez[$k]['cena']*$odziez[$k]['ilosc'];
        echo ($k+1).'. '.$odziez[$k]['opis'].', cena: '
            .$odziez[$k]['cena'].', ilość: '.$odziez[$k]['ilosc'].'<br />'."\n";
      }
    }
    
    if (count($akcesoria)>0)
    {
      echo '<br />Akcesoria:<br />';
      for($k=0;$k<count($akcesoria);$k++)
      {
        $suma+=$akcesoria[$k]['cena']*$akcesoria[$k]['ilosc'];
        echo ($k+1).'. '.$akcesoria[$k]['opis'].
            ', cena: '.$akcesoria[$k]['cena'].', ilość: '.$akcesoria[$k]['ilosc'].'<br />'."\n";
      }
    }
    echo '<br />Wartość towarów w koszyku: '.$suma;    
  }
?>