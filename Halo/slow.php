<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$patname="simonLandau";
$program3="mkdir gallery/Patients/";
echo "program3 " . $program3 . "<br>";
$str3=$program3 . $patname;
echo "str3 " . $str3 . "<br";
    $Result=exec($str3, $output, $return);
echo "Result " . $Result . "<br>";
    
echo "patname " . $patname . "<br>";
echo "program3 " . $program3 . "<br>";
echo "str3 " . $str3 . "<br>";
echo "Result " . $Result . "<br>";
?>
