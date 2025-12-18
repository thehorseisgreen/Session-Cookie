<?php
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = "ม้าเป็นสีเขียว\n";
fwrite($myfile, $txt);
$txt = "จิตรสุภา\n";
fwrite($myfile, $txt);
fclose($myfile);
echo "บันทึกข้อมูลแล้ววววววววว";

?>