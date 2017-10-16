<?php
   include("config.php");
   error_reporting(E_ALL ^ E_NOTICE); 
   session_start();
   mysqli_set_charset($conn,"utf8_turkish_ci");

  

   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $eposta = $_POST["eposta"];
      $sifre = $_POST["sifre"];
      $sql = "SELECT kisi_id FROM kisi_bilgileri WHERE eposta = '$eposta' and sifre = '$sifre'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();      
      $count = mysqli_num_rows($result);
     	
      if($count == 1) {
		 $_SESSION["oturum"] = true;
		 $_SESSION["eposta"] = $eposta;
		 $_SESSION["sifre"] = $sifre;
		 
         header("location: welcome.php");
      }else {
         $error = "Eposta veya sifre hatali";
         
      }
   }  
?>

<html>
   
   <head>
      <title>Giriş</title>
      <meta charset="UTF-8">
      <style>
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
            <div  style = "background-color:black; text-align:center; color:darkcyan; padding:3px;"><b>Giriş</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>eposta  :</label><input type = "text" name = "eposta" class = "box"/><br /><br />
                  <label>şifre  :</label><input type = "password" name = "sifre" class = "box" /><br/><br />
                  <input type = "submit" style="text-align:center; color:darkcyan; padding:3px;" value = " Giriş "/>&nbsp;&nbsp; <input type="button" style="text-align:center; color:darkcyan; padding:3px;" value="Kaydol" onclick="location='register.php'" />
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
