<?php
if(isset($_POST["submit"])){
    $username = $_POST["username"];

    setcookie("user", $username,time()+ 3600,"/");
}

if(isset($_COOKIE["user"])){
    $welcome_message ="ยินดีต้อนรับกลับ คุณ " . $_COOKIE["user"] . "!";
}else {
    $welcome_message = "Welcome, Guest!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1><?php echo $welcome_message; ?></h1>

<form method="post" action="">
    <label for="username">Enter your username:</label>
    <input type="text" id="username" name="username">
    <button type="submit" name="submit">submit</button>
</form>
    
</body>
</html>