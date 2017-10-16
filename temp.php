


<!DOCTYPE HTML>
<html>
<head> 
<meta charset="utf-8"> 
 <style>
        .button {
            display: inline-block;
            border-radius: 4px;
            background-color: #eeeeee;
            border: none;
            color: darkcyan;
            text-align: center;
            padding: 5px;
            width: 200px;
            transition: all 0.5s;
            cursor: pointer;
            margin: 5px;
            clear: both;
        }
        
        .button span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }
        
        .button span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }
        
        .button:hover span {
            padding-right: 25px;
        }
        
        .button:hover span:after {
            opacity: 1;
            right: 0;
        }
        
        #header {
            background-color: black;
            color: darkcyan;
            text-align: center;
            padding: 5px;
        }
        
        #section {
            background-color: beige;
            clear: both;
            text-align: center;
            padding: 140px;
        }
        
        #footer {
            background-color: black;
            color: white;
            clear: both;
            text-align: center;
            padding: 5px;
        }

    </style>
<?php
include ("config.php");
$sql="select sicaklik_deger from sera_bilgileri where kisi_id_sera='2' and ruzgar_deger='102'";
$result=$conn->query($sql);
$result2 = $result->fetch_assoc();
?>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Son bir saate ait sıcaklık değerleriniz:"
	},
	axisY:{
		includeZero: false
	},
	data: [{        
		type: "line",       
		dataPoints: [
			{ y: 450 },
			{ y: 414},
			{ y: 520, indexLabel: "highest",markerColor: "red", markerType: "triangle" },
			{ y: 460 },
			{ y: <?php echo $result2["sicaklik_deger"]; ?>},
			{ y: 500 },
			{ y: 480 },
			{ y: 480 },
			{ y: 410 , indexLabel: "lowest",markerColor: "DarkSlateGrey", markerType: "cross" },
			{ y: 500 },
			{ y: 480 },
			{ y: 510 }
		]
	}]
});
chart.render();

}
</script>
</head>
<body>
 <div id="header">
        <h1>AKILLI SERA OTOMASYON SİSTEMİ</h1>
    </div>

    <div style="text-align: center"><strong>
       <a href="anasayfa.html" class="button" style="vertical-align: middle"><span>Anasayfa</span></a></strong> &nbsp;&nbsp;&nbsp;&nbsp; <strong><a href="misyonumuz.html" class="button" style="vertical-align: middle"><span>Misyonumuz</span></a></strong>&nbsp;&nbsp;&nbsp;&nbsp;  <strong><a href="tanıtım.html" class="button" style="vertical-align: middle"><span>Sistem Hakkında</span></a></strong>&nbsp;&nbsp;&nbsp;&nbsp; <strong><a href="login.php" class="button" target="_blank" style="vertical-align: middle"><span>Sisteme Giriş</span></a></strong> &nbsp;&nbsp;&nbsp;&nbsp; <strong> <a href="iletişim.html" class="button" style="vertical-align: middle"><span>İletişim</span></a></strong>

    </div>

<div id="chartContainer" style="height: 200px; width: 50%;" text-align="right" ></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<script src="https://canvasjs.com/assets/script/canvasjs.min.js" style="text-align:center" ></script>
<div id="footer">
        Copyright © talat&sedat
    </div>   
    
</body>
</html>
