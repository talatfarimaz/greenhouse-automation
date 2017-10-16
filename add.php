<?php
   include("config.php");
   /*session_start();
   $eposta = $_SESSION["eposta"];
   $sifre = $_SESSION["sifre"];  */
   $Sql="insert into sera_bilgileri (sicaklik_deger,nem_degerleri,vana_durum,havalandirma_durum,ruzgar_deger, kisi_id_sera) 
    values ('".$_GET["sicaklik_deger"]."', '".$_GET["nem_degerleri"]."', '".$_GET["vana_durum"]."', 
   '".$_GET["havalandirma_durum"]."','".$_GET["ruzgar_deger"]."', '".$_GET["kisi_id_sera"]."')";     
   $conn->query($sql);
 
   
   //kisi id 8 olacak
?>
