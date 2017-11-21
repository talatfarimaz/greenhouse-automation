<?php
include("config.php");
session_start();
mysqli_set_charset($conn,"utf8");
error_reporting(E_ALL ^ E_NOTICE); 


$eposta = $_SESSION["eposta"];
$sifre = $_SESSION["sifre"];
$sql="SELECT kisi_id FROM kisi_bilgileri WHERE eposta='$eposta' and sifre='$sifre'";
$result=$conn->query($sql);
$row = $result->fetch_assoc(); 
$id=$row["kisi_id"];

//5 dakika öncesine ait verileri siliyor
/*$sql2="delete from sera_bilgileri where saat < DATE_SUB(NOW(), INTERVAL 5 minute) and kisi_id_sera='$id'";
$conn->query($sql2);*/ 

?>


    <html>

    <head>
        <title>Sera Bilgileri</title>
        <meta http-equiv="refresh" content="60">
        <meta charset="UTF-8">
        <style>
            body {
                background-image: url(14.jpg);
                background-position: center top;
                background-size: 100% auto;
            }
            
            label {
                font-size: 21px;
                text-decoration:underline;
                color:  #008042 ;
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

                padding: 60px;
            }

            .box {
                border: #666666 solid 1px;
            }

            .rcorners2 {
                border-radius: 25px;
                border: 2px solid black;

            }

            .rcorners1 {
                border-radius: 15px 15px;
                border: 3px solid #b3ffda;
                font-size: 18px;
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

        <div style="clear:both; text-align: center; color:darkcyan; padding:1px"><br><strong><h2>HOŞGELDİN <?php $sql="select isim from kisi_bilgileri where kisi_id='$id'";
            $result=$conn->query($sql);
            $row=$result->fetch_assoc();
            echo $row["isim"]; ?></h2></strong>
            <p style="text-align:center; color:darkcyan;clear:both;"><strong>Sera bilgileriniz aşağıdaki gibidir. Lütfen seranızı kontrol etmek için kontrol panelini kullanınız.</strong></p>
        </div>

        <div class="section rcorners2" align="center">
            <div class="rcorners2" style="width:400px; border: solid 1px #333333; background-color:#e6ffe6" align="left">
                <div class="rcorners2" style="background-color:black; clear:both; text-align:center; color:darkcyan; padding:3px;"><b>Sera Durumu</b></div>

                <div class="text" style="margin:30px">

                    <form action="" method="post">
                        <label>rüzgar</label></br>
                        </br><strong>
                  <?php $sql="SELECT ruzgar_deger FROM sera_bilgileri WHERE kisi_id_sera='$id'";
					$result=$conn->query($sql);
					$row = $result->fetch_assoc(); 
                echo $row["ruzgar_deger"]; ?>&nbsp;km/s</strong></br>
                        </br>
                        

                        <label>sıcaklık</label></br>
                        </br><strong>
                  <?php $sql="SELECT sicaklik_deger FROM sera_bilgileri WHERE kisi_id_sera='$id'";
					$result=$conn->query($sql);
					$row = $result->fetch_assoc(); 
                            echo $row["sicaklik_deger"]; ?>&nbsp;&#8451;</strong></br>
                        </br>

                        <label>nem</label></br>
                        </br><strong>
                  <?php $sql="SELECT nem_degerleri FROM sera_bilgileri WHERE kisi_id_sera='$id'";
					$result=$conn->query($sql);
					$row = $result->fetch_assoc(); 
					echo $row["nem_degerleri"]; ?>&nbsp;&#37;</strong></br>
                        </br>

                        <label>vana</label></br>
                        </br><strong>
                  <?php $sql="SELECT vana FROM vana_havalandırma WHERE kisi_id_vh='$id'";
					$result=$conn->query($sql);
					$row = $result->fetch_assoc(); 
					echo $row["vana"]; ?></strong></br>
                        </br>

                        <label>havalandırma</label></br>
                        </br><strong>
                            <?php $sql="SELECT havalandirma FROM vana_havalandırma WHERE kisi_id_vh='$id'";
                            $result=$conn->query($sql);
                            $row = $result->fetch_assoc(); 
                            echo $row["havalandirma"]; ?></strong></br>
                        </br>

                        <label>fan</label></br>
                        </br><strong>
                            <?php $sql="SELECT fan FROM vana_havalandırma WHERE kisi_id_vh='$id'";
                            $result=$conn->query($sql);
                            $row = $result->fetch_assoc(); 
                            echo $row["fan"]; ?></strong></br>
                        </br>

                        <label>saat</label></br>
                        </br><strong>
    <?php $sql="SELECT saat FROM sera_bilgileri WHERE kisi_id_sera='$id'";
    $result=$conn->query($sql);
    $row = $result->fetch_assoc(); 
    echo $row["saat"]; ?></strong></br>
                        </br>


                        <input type="button" class="rcorners1" style="text-align:center; color:darkcyan" value="Çıkış" onclick="location='login.php'" /> &nbsp;&nbsp;&nbsp;
                        <input type="button" class="rcorners1" style="text-align:center; color:darkcyan" value="Kontrol" onclick="location='panel.php'" /> &nbsp;&nbsp;&nbsp;
                        <input type="button" class="rcorners1" style="text-align:center; color:darkcyan" value="Grafik" onclick="location='grafik.php'" />




                </div>

            </div>

        </div>

        <div class="footer rcorners2">
            Copyright © TMS
        </div>

    </body>

    </html>
