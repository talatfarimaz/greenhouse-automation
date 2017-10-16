<?php
$counter = isset($_POST['counter']) ? $_POST['counter'] : 0;
   if($_POST['submit'] == true) {
       $counter++;
       }
         switch ($counter) {
               case 0:
               break;
               case 1:
               break;
               default:
               $counter=0; }
?>

<!DOCTYPE html>
<html>
<head>
<title>Light On/Off Switch</title>
</head>
<body>
<H1>Light Switch Example</H1>
<form name="LED" method="POST" action="#">
<input type="hidden" name="counter" value="<?php print $counter; ?>" />
<input type="submit" name="submit" style="height: 100px; width: 100px" value="LED Switch">
</form>
<br />
<?php echo "Counter: " . $counter; ?>
</body>
</html>
