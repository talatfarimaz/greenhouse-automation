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
$port1 = fopen("COM1", "w+");

sleep(2);
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Kontrol Paneli</title>
        <style>
            body {
                background-image: url(14.jpg);
                background-position: center top;
                background-size: 100% auto;
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
            
            .text {
                text-align: center;
            }


        </style>




    </head>

    <body>
        <div class="rcorners2 header">
            <h1>AKILLI SERA OTOMASYON SİSTEMİ</h1>
        </div>

        <div style="clear:both; text-align: center; color:darkcyan; padding:1px"><br><strong><h2>HOŞGELDİN <?php $sql="select isim from kisi_bilgileri where kisi_id='$id'";
            $result=$conn->query($sql);
            $row=$result->fetch_assoc();
            echo $row["isim"]; ?></h2></strong>
            <p style="text-align:center; color:darkcyan;clear:both;"><strong>Sera bilgileriniz aşağıdaki gibidir. Lütfen seranızı kontrol etmek için kontrol panelini kullanınız.</strong></p>
        </div>
        <div class="section rcorners2" align="center">
            <div class="rcorners2" style="width:350px; border: solid 1px #333333; background-color:#e6ffe6" align="left">
                <div class="rcorners2" style="background-color:black; clear:both; text-align:center; color:darkcyan; padding:10px;"><b>Kontrol Paneli</b></div>

                <div  style="margin:50px">
                    <form action="panel.php" method="post">
                        <strong>-----------------------</strong>
                        <div style="background-color:#e6ffe6; clear:both; text-align:left; color:darkcyan; padding:10px;"><b>VANA</b></div><br>
                        <div>
                            <input type="radio" name="aç-kapat1" value="aç" />&nbsp;&nbsp;
                            <font color="green"><strong>AÇ</strong></font>
                        </div><br>

                        <div>
                            <input type="radio" name="aç-kapat1" value="kapat" />&nbsp;&nbsp;
                            <font color="red"><strong>KAPAT</strong></font>
                        </div> <strong>-----------------------</strong>
                        <div style="background-color:#e6ffe6; clear:both; text-align:left; color:darkcyan; padding:10px;"><b>FAN</b></div><br>
                        <div>
                            <input type="radio" name="aç-kapat2" value="aç" />&nbsp;&nbsp;
                            <font color="green"><strong>AÇ</strong></font>
                        </div><br>

                        <div>
                            <input type="radio" name="aç-kapat2" value="kapat" />&nbsp;&nbsp;
                            <font color="red"><strong>KAPAT</strong></font>
                        </div> <strong>-----------------------</strong>
                        <div style="background-color:#e6ffe6; clear:both; text-align:left; color:darkcyan; padding:10px;"><b>HAVALANDIRMA</b></div><br>
                        <div>
                            <input type="radio" name="aç-kapat3" value="aç" />&nbsp;&nbsp;
                            <font color="green"><strong>AÇ</strong></font>
                        </div><br>

                        <div>
                            <input type="radio" name="aç-kapat3" value="kapat" />&nbsp;&nbsp;
                            <font color="red"><strong>KAPAT</strong></font>
                        </div><strong>-----------------------</strong>

                        <div>
                            <br>
                            <input type="submit" style="text-align:center; color:darkcyan; padding:3px;" value="Uygula">&nbsp;&nbsp;
                            <input type="button" style="text-align:center; color:darkcyan; padding:3px;" value="Geri" onclick="location='welcome.php'" />
                        </div><br>
                        <div>
                            <?php


                            if ($_POST["aç-kapat1"]=="aç")
                            {
                                echo '<font color="green" ><strong>Vana Açık</strong></font><br>';
                                fwrite($port1, "A");
                                $vanaac = "UPDATE `sys`.`vana_havalandırma` SET `vana`='açık' WHERE `kisi_id_vh`='$id'";
                                $change = $conn->query($vanaac);
                            }

                            if ($_POST["aç-kapat1"]=="kapat")
                            {
                                echo '<font color="red"><strong>Vana Kapalı</strong></font><br>';
                                fwrite($port1, "B");
                                $vanakapat = "UPDATE `sys`.`vana_havalandırma` SET `vana`='kapalı' WHERE `kisi_id_vh`='$id'";
                                $change = $conn->query($vanakapat);
                            }

                            if ($_POST["aç-kapat2"]=="aç")
                            {
                                echo '<font color="green"><strong>Fan Açık</strong></font><br>';
                                fwrite($port1, "C");
                                $fanac = "UPDATE `sys`.`vana_havalandırma` SET `fan`='açık' WHERE `kisi_id_vh`='$id'";
                                $change = $conn->query($fanac);
                            }

                            if ($_POST["aç-kapat2"]=="kapat")
                            {
                                echo '<font color="red"><strong>Fan Kapalı</strong></font><br>';
                                fwrite($port1, "D");
                                $fankapat = "UPDATE `sys`.`vana_havalandırma` SET `fan`='kapalı' WHERE `kisi_id_vh`='$id'";
                                $change = $conn->query($fankapat);
                            }
                            if ($_POST["aç-kapat3"]=="aç")
                            {
                                echo '<font color="green"><strong>Havalandırma Açık</strong></font><br>';
                                fwrite($port1, "E");
                                $havaac = "UPDATE `sys`.`vana_havalandırma` SET `havalandirma`='açık' WHERE `kisi_id_vh`='$id'";
                                $change = $conn->query($havaac);
                            }

                            if ($_POST["aç-kapat3"]=="kapat")
                            {
                                echo '<font color="red"><strong>Havalandırma Kapalı</strong></font><br>';             
                                fwrite($port1, "F");
                                $havakapat = "UPDATE `sys`.`vana_havalandırma` SET `havalandirma`='kapalı' WHERE `kisi_id_vh`='$id'";
                                $change = $conn->query($havakapat);
                            }


                            fclose($port1);


                            ?>
                        </div>


                    </form>

                </div>

            </div>

        </div>

        <div class="footer rcorners2">
            Copyright © TMS
        </div>


    </body>

    </html>
