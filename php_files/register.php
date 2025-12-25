<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ฟอร์มลงทะเบียนอบรม</title>
<style>
    body{font-family:tahoma;background:#eaf2ff;margin:0;padding:0;}
    .container{width:450px;margin:40px auto;background:white;padding:25px;border-radius:10px;box-shadow:0 0 12px rgba(0,0,0,.1);}    
    h2{text-align:center;color:#2b4fa2;margin-bottom:20px;}
    label{display:block;margin-bottom:5px;font-weight:bold;}
    input,select{width:100%;padding:8px;margin-bottom:15px;border:1px solid #ccc;border-radius:5px;}
    .group-inline input{width:auto;margin-right:6px;}
    button{width:100%;padding:10px;font-size:16px;background:#2b4fa2;color:white;border:none;border-radius:5px;cursor:pointer;}
    button:hover{background:#1d347a;}
    table{width:90%;margin:30px auto;border-collapse:collapse;background:white;}
    th,td{border:1px solid #ccc;padding:10px;text-align:center;}
    th{background:#2b4fa2;color:white;}
    .result{width:450px;margin:20px auto;background:#d1f0d1;padding:15px;border-radius:8px;text-align:center;}
</style>
</head>
<body>
    <div class="container">
    <h2>ฟอร์มลงทะเบียนอบรม</h2>
    <form method="post">
        <label>ชื่อ-นามสกุล</label>
        <input type="text" name="fullname" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>หัวข้ออบรม</label>
        <select name="course">
            <option>AI สำหรับงานสำนักงาน</option>
            <option>Excel สำหรับการทำงาน</option>
            <option>การเขียนเว็บด้วย PHP</option>
        </select>

        <label>อาหารที่ต้องการ</label>
        <div class="group-inline">
        <input type="checkbox" name="food[]" value="ปกติ"> ปกติ
        <input type="checkbox" name="food[]" value="มังสวิรัติ"> มังสวิรัติ
        <input type="checkbox" name="food[]" value="ฮาลาล"> ฮาลาล
        </div>

        <label>รูปแบบการเข้าร่วม</label>
        <div class="group-inline">
        <input type="radio" name="type" value="Onsite" required> Onsite
        <input type="radio" name="type" value="Online"> Online
        </div>

        <button type="submit" name="submit">ลงทะเบียน</button>
    </form>
    </div>

<?php
if(isset($_POST['submit'])){
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $course=$_POST['course'];
    $type=$_POST['type'];

    if(isset($_POST['food'])){$food=implode(",",$_POST['food']);}else{$food="ไม่ระบุ";}

    $price=($type=="Onsite")?1500:800;

    $data="$fullname|$email|$course|$food|$type|$price\n";
    file_put_contents("register.txt",$data,FILE_APPEND);

    echo"<div class='result'>
    <h3>ลงทะเบียนสำเร็จ</h3>
    ชื่อ: $fullname <br>
    อีเมล: $email <br>
    หัวข้ออบรม: $course <br>
    อาหาร: $food <br>
    รูปแบบ: $type <br>
    ค่าลงทะเบียน: ".number_format($price,2)." บาท</div>";
}
?>

<?php
if(file_exists("register.txt")){
    $lines=file("register.txt");
    echo"<table>
        <tr><th>ชื่อ</th><th>Email</th><th>หัวข้อ</th><th>อาหาร</th><th>รูปแบบ</th><th>ค่าลงทะเบียน</th></tr>";
    foreach($lines as $line){
        list($name,$email,$course,$food,$type,$price)=explode("|",trim($line));
        echo"<tr><td>$name</td><td>$email</td><td>$course</td><td>$food</td><td>$type</td><td>".number_format($price,2)."</td></tr>";
    }
    echo"</table>";
}
?>
</body></html>
