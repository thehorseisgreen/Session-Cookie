<!DOCTYPE html >
<html >
<body >

<?php
$myfile = fopen( "webdictionary.txt" , "r" ) or die ( "ไม่สามารถเปิดไฟล์ได้!" );
echo fread($myfile,filesize( "webdictionary.txt" ));
fclose($myfile);
?>

</body >
</html >