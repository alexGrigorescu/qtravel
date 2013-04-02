<?php
error_reporting(E_ALL);
#$filename = '/home/qtravel/public_html/usr/contracts/311/contract-voucher-3030-voucher-3030-10-06-2011.rtf';
$filename = 'x.rtf';
echo($filename);
$file = file ($filename);
echo '<pre>';
print_r($file);
#header('Content-Type: application/rtf');
#header('Content-Disposition: attachment; filename="contract.rtf"');
#echo file_get_contents($filename);
?>
