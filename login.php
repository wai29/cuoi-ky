<?php
session_start();
include ('validate.php');
global $db;
if(isset($_POST["adlogin"])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "SELECT login_id,password FROM admin WHERE login_id=:username and password=:password";
    $query = $db ->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0){
        $_SESSION['alogin'] = $_POST['username'];
        echo "<script type='text/javascript'> document.location = 'page.php'; </script>";
    } else {
        echo "<script>alert('Invalid Details');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>login</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="css/list.css" rel="stylesheet">
    <script language="javascript" src="js/error.js"></script>
</head>
<body>
<div class="container">
    <form method="post" name="adlogin" action ="" onsubmit="return(catchErrorLoginAdmin());">
        <div class="row">
                <span id = "error" >
                    <p class="username">
                    <p class="password">
                </span>
        </div>

        <div class="row">
            <div class="col-30">
                <lable class="label1">Họ và tên</lable>
            </div>
            <div class="col-60">
                <input type="text" name="username" value="">
            </div>
        </div>
        <div class="row">
            <div class="col-30">
                <lable class="label1">Mật khẩu</lable>
            </div>
            <div class="col-60">
                <input id="password" type="text" name="password" value="">
            </div>
        </div>
        <div class="row">
            <input type="submit" name="adlogin" value="Đăng nhập" >
        </div>
    </form>
</div>
</body>
</html>
