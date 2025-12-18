<?php
session_start(); //เริ่มต้น

$_SESSION['username'] = "fern";
$_SESSION['role'] = "admin";

echo "สร้าง  Session เรียบร้อย";

?>