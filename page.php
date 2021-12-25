<?php
    session_start();
    error_reporting(0);
    if (strlen($_SESSION['alogin']) == 0) {
        header('location:login.php');
    }
    include ('validate.php');
    global $db;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Trang đăng nhập</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="css/list.css" rel="stylesheet">
    <script language="javascript" src="js/error.js"></script>
</head>
<body>
<div class="container">
    <form >
            <div class="row">
                <br>
                <?php 
                    echo "Tên login: ";
                    echo $_SESSION['alogin'];
                ?>
                <br/>
                <br>
                <?php 
                    echo " Thời gian login: ";
                    echo date("Y-m-d H:i"); 
                ?>
                <br/>
            </div>
            <div align="center">
                <a class="button" href="regist.php">Đăng ký</a>
            </div>
    </form>
</div>
</body>
</html>