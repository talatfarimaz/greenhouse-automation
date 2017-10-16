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
        <style type="text/css">
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
                padding: 100px;
            }


            .box {
                border: #666666 solid 1px;
            }

        </style>

    </head>

    <body>

        <div id="header">
            <h1>AKILLI SERA OTOMASYON SİSTEMİ</h1>
        </div>

        <div style="background-color:beige; clear:both; text-align: center; color:darkcyan; padding:1px"><br><strong><h2>HOŞGELDİN <?php $sql="select isim from kisi_bilgileri where kisi_id='$id'";
            $result=$conn->query($sql);
            $row=$result->fetch_assoc();
            echo $row["isim"]; ?></h2></strong><br>
            <p style="text-align:center; color:darkcyan;clear:both;">Sera bilgileriniz aşağıdaki gibidir. Lütfen seranızı kontrol etmek için butonları kullanınız.</p>
        </div>

        <div id="section" align="center">
            <div style="width:400px; border: solid 1px #333333; background-color:#e6ffe6" align="left">
                <div style="background-color:black; clear:both; text-align:center; color:darkcyan; padding:3px;"><b>Sera Durumu</b></div>

                <div style="margin:30px">

                    <form action="" method="post">
                        <label>rüzgar  :</label></br>
                        </br><strong>
                  <?php $sql="SELECT ruzgar_deger FROM sera_bilgileri WHERE kisi_id_sera='$id'";
					$result=$conn->query($sql);
					$row = $result->fetch_assoc(); 
					echo $row["ruzgar_deger"]; ?></strong></br>
                        </br>

                        <label>sıcaklık  :</label></br>
                        </br><strong>
                  <?php $sql="SELECT sicaklik_deger FROM sera_bilgileri WHERE kisi_id_sera='$id'";
					$result=$conn->query($sql);
					$row = $result->fetch_assoc(); 
					echo $row["sicaklik_deger"]; ?></strong></br>
                        </br>

                        <label>nem  :</label></br>
                        </br><strong>
                  <?php $sql="SELECT nem_degerleri FROM sera_bilgileri WHERE kisi_id_sera='$id'";
					$result=$conn->query($sql);
					$row = $result->fetch_assoc(); 
					echo $row["nem_degerleri"]; ?></strong></br>
                        </br>

                        <label>vana  :</label></br>
                        </br><strong>
                  <?php $sql="SELECT vana_durum FROM sera_bilgileri WHERE kisi_id_sera='$id'";
					$result=$conn->query($sql);
					$row = $result->fetch_assoc(); 
					echo $row["vana_durum"]; ?></strong></br>
                        </br>

                        <label>havalandırma  :</label></br>
                        </br><strong>
                  <?php $sql="SELECT havalandirma_durum FROM sera_bilgileri WHERE kisi_id_sera='$id'";
					$result=$conn->query($sql);
					$row = $result->fetch_assoc(); 
					echo $row["havalandirma_durum"]; ?></strong></br>
                        </br>

                        <label>saat  :</label></br>
                        </br><strong>
                  <?php $sql="SELECT saat FROM sera_bilgileri WHERE kisi_id_sera='$id'";
					$result=$conn->query($sql);
					$row = $result->fetch_assoc(); 
					echo $row["saat"]; ?></strong></br>
                        </br>

                        <input type="button" style="text-align:center; color:darkcyan; padding:3px;" value="Çıkış" onclick="location='login.php'" />



                </div>

            </div>

        </div>

        <div id="footer">
            Copyright © talat&sedat
        </div>

    </body>

    </html>
