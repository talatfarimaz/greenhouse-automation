<?php
include ("config.php");
// we need this so that PHP does not complain about deprectaed functions
error_reporting( 0 );


// Fetch the data
$query = "
  SELECT *
  FROM my_chart_data
  ORDER BY category ASC";
$result = $conn->query($query);



// Print out rows
$prefix = '';
echo "[\n";
while ( $row=$result->fetch_assoc() ) {
  echo $prefix . " {\n";
  echo '  "category": "' . $row['category'] . '",' . "\n";
  echo '  "value1": ' . $row['value1'] . ',' . "\n";
  echo '  "value2": ' . $row['value2'] . '' . "\n";
  echo " }";
  $prefix = ",\n";
}
echo "\n]";

// Close the connection
mysql_close( $link );
?>
