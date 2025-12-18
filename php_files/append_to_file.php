<?php
$filename = 'data.txt'; // ชื่อไฟล์ที่ต้องการเขียน
$data_to_append = "เฟินนนนน\n"; // ข้อมูลที่ต้องการเพิ่ม

// ใช้ FILE_APPEND เพื่อเพิ่มข้อมูลต่อท้าย และ LOCK_EX เพื่อป้องกันการเขียนพร้อมกัน
file_put_contents($filename, $data_to_append, FILE_APPEND | LOCK_EX);

echo "เพิ่มข้อมูลสำเร็จ!";
?>