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
          body {
              background-image: url(14.jpg);
              background-position: center top;
              background-size: 100% auto;
              font-family: 'Lato', sans-serif;

          }
          
          .header {
              background-color: black;
              color: darkcyan;
              text-align: center;
              padding: 5px;
          }

          .footer {
              background-color: black;
              color: white;
              clear: both;
              text-align: center;
              padding: 5px;
          }

          .section {

              padding: 180px;
          }

          .box {
              border:#666666 solid 1px;
              text-align: center;
          }

          .rcorners2 {
              border-radius: 25px;
              border: 2px solid black;

          }

          .rcorners1 {
              border-radius: 15px 15px;
              border: 3px solid #b3ffda;
              font-family: 'Lato', sans-serif;


          }

          .text {
              text-align: center;
          }
      </style>
      
   </head>
   
   
   
   <body>
	   
	    <div class="rcorners2 header">
        <h1>AKILLI SERA OTOMASYON SİSTEMİ</h1>
    </div>
    
       <div  style="clear:both; text-align: center; color:darkcyan; padding:1px"><br><strong><h2>HOŞGELDİNİZ </h2></strong>
           <p style="text-align:center; color:darkcyan;clear:both;"><strong>Yeni üyelik için isim, eposta ve şifrenizi giriniz. Daha sonra Kaydol butonuna tıklayınız.</strong></p><br>

       </div>
	
      <div class="rcorners2 section" align = "center">
          <div class="rcorners2" style = "width:300px; border: solid 1px #333333; background-color:#e6ffe6  " align = "left">
            <div class="rcorners2" style = "background-color:black; text-align:center; color:darkcyan; padding:3px;"><b>Üye Bilgileri</b></div>
				
            <div class="text" style = "margin:30px">
               
               <form action = "register.php" method = "post">
                   <label align="center"><strong>isim</strong> </label><br><input type = "text" name = "isim" class = "box rcorners1 text"/><br /><br /><br>

                   <label align="center"><strong>eposta</strong> </label><br><input type = "text" name = "eposta" class = "box rcorners1 text"/><br /><br /><br>

                   <label align="center"><strong>şifre</strong></label><br><input type = "password" name = "sifre" class = "box rcorners1 text"/><br /><br /><br>

					<input class="rcorners1"  id="button" type="submit" style="text-align:center; color:darkcyan; font-size:20px" name="submit" value="Kaydol">&nbsp;&nbsp;  <input class="rcorners1" type="button" style="text-align:center; color:darkcyan; font-size:20px" value="Çıkış" onclick="location='login.php'" />
               </form>
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>
      
      <div class="rcorners2 footer">
        Copyright © TSM
    </div>

   </body>
</html>

