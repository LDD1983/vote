<?php include_once "./db.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>黑箱作業</title>
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/basic.css">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/center.css">
   
    <style>
        ul {
            width: 80%;
            list-style: none;
            margin: 0;
        }
    </style>
</head>

<body>
    <header>
        <a href="index.php">首頁</a>
        <a href="./front/res.php">結果</a>
        <a href="./front/login.php">登入</a>
        <a href="./front/reg.php">註冊</a>
        <a href="./backend.php">管理</a>


    </header>
    <main>
        <?php

        $do = $_GET['do'] ?? 'list';

        $file = "./front/" . $do . ".php";

        if (file_exists($file)) {
            include $file;
        } else {
            include "./front/list.php";
        }
        ?>




    </main>
    <footer>

    </footer>

</body>

</html>