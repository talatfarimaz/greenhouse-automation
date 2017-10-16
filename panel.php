<?php
$port = fopen("COM1", "w+");  
sleep(2);
?>

    <br><br>
    <form action="welcome.php" method="POST">
        <input type="hidden" name="turn" value="Vanayı Aç" />
        <input type="Submit" style="text-align:center; color:darkcyan; padding:3px;" value="Vanayı Aç">
    </form>
    <form action="welcome.php" method="POST">
        <input type="hidden" name="turn" value="Vanayı Kapat" />
        <input type="Submit" style="text-align:center; color:darkcyan; padding:3px;" value="Vanayı Kapat">

    </form>

<?php

if ($_POST["turn"]=="Vanayı Aç")
{
	echo "Vana Açık";
	fwrite($port, "n");
}

if ($_POST["turn"]=="Vanayı Kapat")
{
	echo "Vana Kapalı";
	fwrite($port, "f");
}

fclose($port);
?>
