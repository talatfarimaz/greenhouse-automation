<?php
include("config.php");
error_reporting(E_ALL ^ E_NOTICE); 
session_start();
mysqli_set_charset($conn,"utf8_turkish_ci");
 
?>

    <html>

    <head>
        <title>Kontrol Paneli</title>
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
                border: #666666 solid 1px;
            }

        </style>

    </head>

    <body>

        <div id="header">
            <h1>AKILLI SERA OTOMASYON SİSTEMİ</h1>
        </div>


        <div style="margin:30px">
            <?php
            $port1 = fopen("COM1", "w+");
            $port2 = fopen("COM2", "w+");
            

            sleep(2);
            ?>

            <form action="panel.php" method="POST">
                <input type="hidden" name="turn1" value="Vanayı Aç" />
                <input type="Submit" style="text-align:center; color:darkcyan; padding:3px;" value="Vanayı Aç">
            </form>
            <form action="panel.php" method="POST">
                <input type="hidden" name="turn1" value="Vanayı Kapat" />
                <input type="Submit" style="text-align:center; color:darkcyan; padding:3px;" value="Vanayı Kapat">
            </form>
            <form action="panel.php" method="POST">
                <input type="hidden" name="turn2" value="Havalandırmayı Aç" />
                <input type="Submit" style="text-align:center; color:darkcyan; padding:3px;" value="Havalandırmayı Aç">
            </form>
            <form action="panel.php" method="POST">
                <input type="hidden" name="turn2" value="Havalandırmayı Kapat" />
                <input type="Submit" style="text-align:center; color:darkcyan; padding:3px;" value="Havalandırmayı Kapat">
            </form>
            <form action="panel.php" method="POST">
                <input type="hidden" name="turn3" value="Fanı Aç" />
                <input type="Submit" style="text-align:center; color:darkcyan; padding:3px;" value="Fanı Aç">
            </form>
            <form action="panel.php" method="POST">
                <input type="hidden" name="turn3" value="Fanı Kapat" />
                <input type="Submit" style="text-align:center; color:darkcyan; padding:3px;" value="Fanı Kapat">
            </form>
            <input type="button" name="xx" value="aç">
            <input type="button" name="yy" value="kapat">
            
            <button onclick="ikaz1()">deneme1</button>

            <script>
                function ikaz1() {
                    document.getElementById("demo1").innerHTML = "Vana Açık";
                    <?php  
                   
                    fwrite($port1, "n");
                    fclose($port1);?>;
                }
            </script>

            <p id="demo1"></p>
            
            <button onclick="ikaz2()">deneme2</button>

            <script>
                function ikaz2() {
                    document.getElementById("demo2").innerHTML = "Fan açık";
                        <?php 
                    
                    fwrite($port1, "y"); 
                    fclose($port1);?>;
                }
            </script>

            <p id="demo2"></p>
            
            
            
            
            <?php
            

            if ($_POST["turn1"]=="Vanayı Aç")
            {
                echo "Vana Açık";
                fwrite($port1, "n");
            }

            if ($_POST["turn1"]=="Vanayı Kapat")
            {
                echo "Vana Kapalı";
                fwrite($port1, "f");
            }
            
            if ($_POST["turn2"]=="Havalandırmayı Aç")
            {
                echo "Havalandırma Açık";
                fwrite($port2, "n");
            }

            if ($_POST["turn2"]=="Havalandırmayı Kapat")
            {
                echo "Havalandırma Kapalı";
                fwrite($port2, "f");
            }

            

            //fclose($port1);
            //fclose($port2);
            ?>
            
            
           
        

        </div>

            </div>

        </div>

        <div id="footer">
            Copyright © talat&sedat
        </div>

    </body>

    </html>
