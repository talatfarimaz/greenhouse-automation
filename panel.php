<?php
include("config.php");
error_reporting(E_ALL ^ E_NOTICE); 
session_start();
mysqli_set_charset($conn,"utf8_turkish_ci");

$eposta = $_SESSION["eposta"];
$sifre = $_SESSION["sifre"];
$sql="SELECT kisi_id FROM kisi_bilgileri WHERE eposta='$eposta' and sifre='$sifre'";
$result=$conn->query($sql);
$row = $result->fetch_assoc(); 
$id=$row["kisi_id"];
 
?>

    <html>

    <head>
        <title>Kontrol Paneli</title>
        <meta charset="UTF-8">
        <style>
            body {
                background-image: url(14.jpg);
                background-position: center top;
                background-size: 100% auto;
            }

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

                padding: 60px;
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



        <div style="clear:both; text-align: center; color:darkcyan; padding:1px"><br><strong><h2>HOŞGELDİN <?php $sql="select isim from kisi_bilgileri where kisi_id='$id'";
            $result=$conn->query($sql);
            $row=$result->fetch_assoc();
            echo $row["isim"]; ?></h2></strong><br>
            <p style="text-align:center; color:darkcyan;clear:both;"><strong>Seranızı butonlarla kontrol edebilirsiniz.</strong></p>
        </div>

        <div id="section" align="center">
            <div style="width:400px; border: solid 1px #333333; background-color:#e6ffe6" align="left">
                <div style="background-color:black; clear:both; text-align:center; color:darkcyan; padding:3px;"><b>Kontrol Paneli</b></div>


                <div style="margin:30px">




                    <?php
            $port1 = fopen("COM1", "w+");
            
            

            sleep(2);
            ?>

                        <form action="panel.php" method="POST">
                            <input type="hidden" name="turn" value="Vanayı Aç" />
                            <input type="Submit" style="text-align:center; color:darkcyan; padding:3px;" value="Vanayı Aç">
                        </form>
                        <form action="panel.php" method="POST">
                            <input type="hidden" name="turn" value="Vanayı Kapat" />
                            <input type="Submit" style="text-align:center; color:darkcyan; padding:3px;" value="Vanayı Kapat">
                        </form>

                        <?php
            

            if ($_POST["turn"]=="Vanayı Aç")
            {
                echo "Vana Açık";
                fwrite($port1, "n");
            }

            if ($_POST["turn"]=="Vanayı Kapat")
            {
                echo "Vana Kapalı";
                fwrite($port1, "f");
            }
           

            

            fclose($port1);
            
            ?>




                </div>
            </div>
        </div>



        <div id="footer">
            Copyright © TMS
        </div>

    </body>

    </html>
