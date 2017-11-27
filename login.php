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
         $error = "Eposta veya şifre hatalı";
         
      }
   }  
?>

<html>
   
   <head>
      <title>Giriş</title>
      <meta charset="UTF-8">
      <style>
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
                    
            padding: 140px;
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
              
              
          }
          
          .text {
              text-align: center;
          }
          
      </style>
      
   </head>
   
   <body>
	   
	    <div class="header rcorners2">
        <h1>AKILLI SERA OTOMASYON SİSTEMİ</h1>
    </div>
       <div  style="clear:both; text-align: center; color:darkcyan; padding:1px"><br><strong><h2>HOŞGELDİNİZ </h2></strong>
           <p style="text-align:center; color:darkcyan;clear:both;"><strong>Sisteme giriş yapmak için lütfen mail adresinizi ve şifrenizi giriniz. Yeni üyelik oluşturmak için Kaydol butonuna tıklayınız.</strong></p><br>

       </div>
	
      <div class="section rcorners2" align = "center">
          
          <div class="rcorners2" style = "width:300px; border: solid 1px #333333; background-color:#e6ffe6 "  align = "left">
              <div class="rcorners2" style = "background-color:black; text-align:center; color:darkcyan; padding:3px;"><b>Giriş</b></div>
				
            <div class="text" style = "margin:30px">
               
               <form action = "" method = "post">
                   <label color="darkcyan" align="center"><strong>eposta</strong></label><br><input type = "text" name = "eposta" class = "box rcorners1 text"/><br /><br /><br>
                   <label color="darkcyan" align="center"><strong>şifre</strong></label><br><input type = "password" name = "sifre" class = "box rcorners1 text" /><br/><br />
                  <input type = "submit" class="rcorners1" style="text-align:center; font-size:20px; color:darkcyan" value = " Giriş "/>&nbsp;&nbsp; <input type="button" class="rcorners1" style="text-align:center; font-size:20px; color:darkcyan; " value="Kaydol" onclick="location='register.php'" />
               </form>
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>
      
      
      <div class="footer rcorners2">
        Copyright © TSM
    </div>

   </body>
</html>
