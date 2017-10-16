<?php
include("config.php");
error_reporting(E_ALL ^ E_NOTICE); 
$eposta = $_POST["eposta"];
$isim = $_POST["isim"];
$sifre = $_POST["sifre"];

$sql="INSERT INTO kisi_bilgileri (eposta, isim, sifre) VALUES ('$eposta', '$isim', '$sifre')";
$conn->query($sql);



?>


<html>
   
   <head>
      <title>Kaydol</title>
      <meta charset="UTF-8">
      <style type = "text/css">
          #header {
            background-color: black;
            color: darkcyan;
            text-align: center;
            padding: 5px;
        }
        
        #footer {
            background-color: black;
            color: white;
            clear: both;
            text-align: center;
            padding: 5px;
        }
        
        #section {
            background-color: beige;          
            padding: 140px;
        }
        
         
         
         
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   
   
   <body>
	   
	    <div id="header">
        <h1>AKILLI SERA OTOMASYON SİSTEMİ</h1>
    </div>
	
      <div id="section" align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:black; text-align:center; color:darkcyan; padding:3px;"><b>Üye Bilgileri</b></div>
				
            <div style = "margin:30px">
               
               <form action = "register.php" method = "post">
                    <label>isim    : </label><input type = "text" name = "isim" class = "box"/><br /><br />

					<label>eposta  : </label><input type = "text" name = "eposta" class = "box"/><br /><br />

					<label>şifre   : </label><input type = "password" name = "sifre" class = "box"/><br /><br />

					<input id="button" type="submit" style="text-align:center; color:darkcyan; padding:3px;" name="submit" value="Kaydol">&nbsp;&nbsp;  <input type="button" style="text-align:center; color:darkcyan; padding:3px;" value="Çıkış" onclick="location='login.php'" />
               </form>
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>
      
      <div id="footer">
        Copyright © talat&sedat
    </div>

   </body>
</html>

