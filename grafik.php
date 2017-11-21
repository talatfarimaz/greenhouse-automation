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

$sql1="SELECT sicaklik_deger FROM sera_bilgileri WHERE kisi_id_sera='$id'";

$sql2="SELECT ruzgar_deger FROM sera_bilgileri WHERE kisi_id_sera='$id'";

$sql3="SELECT nem_degerleri FROM sera_bilgileri WHERE kisi_id_sera='$id'";

$sql4="SELECT saat FROM sera_bilgileri WHERE kisi_id_sera='$id'";



$result1=$conn->query($sql1);
$result2=$conn->query($sql2);
$result3=$conn->query($sql3);
$result4=$conn->query($sql4);



$Sdegerler = array();
$Rdegerler= array();
$Ndegerler= array(); 
$saat= array();

$count1=0;
$count2=0;
$count3=0;
$count4=0;

while ($row1 = $result1->fetch_assoc()) {
    $Sdegerler[$count1]= $row1["sicaklik_deger"];
    $count1++;
} 

while ($row2 = $result2->fetch_assoc()) {
    $Rdegerler[$count2]=$row2["ruzgar_deger"];
    $count2++;
}

while ($row3 = $result3->fetch_assoc()) {
    $Ndegerler[$count3]=$row3["nem_degerleri"];
    $count3++;
}

while ($row4 = $result4->fetch_assoc()) {
    $saat[$count4]=$row4["saat"];
    $count4++;
}





?>



<html>

    <head>
        <title>Sera Bilgileri</title>

        <meta charset="UTF-8">
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
        <div class="rcorners2 header">
            <h1>AKILLI SERA OTOMASYON SİSTEMİ</h1>
        </div>
        <div class="rcorners2" style="clear:both; text-align: center; color:darkcyan; padding:1px"><br><strong><h2>HOŞGELDİN <?php $sql="select isim from kisi_bilgileri where kisi_id='$id'";
            $result=$conn->query($sql);
            $row=$result->fetch_assoc();
            echo $row["isim"]; ?></h2></strong>
            <p style="text-align:center; color:darkcyan;clear:both;"><strong>Seranızın son birkaç saat içindeki değerlerine ait grafik aşağıdaki gibidir.</strong></p><br>
            <input type="button" class="rcorners1 text" style="text-align:center; color:darkcyan; font-size:20px;" value="Geri" onclick="location='welcome.php'" />
        </div>

        <div class="section" align="center">



            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load('current', {'packages':['line']});
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {

                    var data = new google.visualization.DataTable();
                    data.addColumn('number', 'Saat');
                    data.addColumn('number', 'Rüzgar Değerleri');
                    data.addColumn('number', 'Nem Değerleri');
                    data.addColumn('number', 'Sıcaklık Değerleri');

                    data.addRows([
                        [1, <?php echo $Rdegerler[0] ; ?>  , <?php echo $Ndegerler[0] ; ?> , <?php echo $Sdegerler[0] ; ?>],
                        [2,  <?php echo $Rdegerler[1] ; ?> , <?php echo $Ndegerler[1] ; ?>, <?php echo $Sdegerler[1] ; ?>],
                        [3, <?php echo $Rdegerler[2] ; ?> ,  <?php echo $Ndegerler[2] ; ?>, <?php echo $Sdegerler[2] ; ?>],
                        [4,  <?php echo $Rdegerler[3] ; ?> , <?php echo $Ndegerler[3] ; ?>, <?php echo $Sdegerler[3] ; ?>],
                        [5, <?php echo $Rdegerler[4] ; ?> , <?php echo $Ndegerler[4] ; ?>, <?php echo $Sdegerler[4] ; ?>],
                        [6,  <?php echo $Rdegerler[5] ; ?> , <?php echo $Ndegerler[5] ; ?>,  <?php echo $Sdegerler[5] ; ?>],
                        [7,  <?php echo $Rdegerler[6] ; ?> , <?php echo $Ndegerler[6] ; ?>,  <?php echo $Sdegerler[7] ; ?>],
                        [8,  <?php echo $Rdegerler[7] ; ?> , <?php echo $Ndegerler[7] ; ?>,  <?php echo $Sdegerler[7] ; ?>]

                    ]);

                    var options = {
                        chart: {
                            title: 'Sera Değerleriniz',

                        },
                        width: 1200,
                        height: 700,
                        axes: {
                            x: {
                                0: {side: 'down'}
                            }
                        }
                    };

                    var chart = new google.charts.Line(document.getElementById('line_top_x'));

                    chart.draw(data, google.charts.Line.convertOptions(options));
                }
            </script>


            <div id="line_top_x"></div>

        </div>
        <div class="rcorners2 footer">
            Copyright © TMS
        </div>


    </body>

</html>









