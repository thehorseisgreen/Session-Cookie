<!DOCTYPE html >
<html >
<body >

<?php
$myfile = fopen( "webdictionary.txt" , "r" ) or die ( "ไม่สามารถเปิดไฟล์ได้!" );
while(!feof($myfile)) {
echo fgets($myfile)."<br>"; //อ่านเป็นบรรทัด
//echo fgetc($myfile)."<br>"; อ่านทีละตัว

}
fclose($myfile);
?>

</body >
</html >