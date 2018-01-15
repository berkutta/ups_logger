<?php


while(true) {
preg_match_all("/LINEV    : (\d\d\d.\d) Volts/", shell_exec("apcaccess"), $myarrray);

$mydata_date = json_decode( file_get_contents("log_date.json") );
$mydata_voltage = json_decode( file_get_contents("log_voltage.json") );

$mydata_date[] = date("Y-m-d H:i:s");
$mydata_voltage[] = $myarrray[1][0];

file_put_contents("log_date.json", json_encode($mydata_date) );
file_put_contents("log_voltage.json", json_encode($mydata_voltage) );


sleep(5);
}

?>
