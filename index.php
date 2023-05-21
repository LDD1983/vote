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
    <link rel="stylesheet" href="./css/form.css">
   
    <style>
        ul {
            width: 80%;
            list-style: none;
            margin: 0;
        }
        .desc-ul{
            text-align: left;
            padding-left: 45%;
            margin-bottom: 15px;
        }
        .desc-ul>li{
            margin-bottom: 5px;
        }
        li>p{
            font-size: 1.1rem;
            letter-spacing: 5px;
            opacity: 0.7;
        }
        li>button{
            width: 100px;
            height: 30px;
            background-color:#FFC1C1;
            /* color: white; */
            border: 1px solid pink;
            opacity: 0.5;
            font-size: 0.9rem;
            
        }
        li>button:hover{
            opacity: 0.9;
            /* background-color:white; */
        }
        h3{
            letter-spacing: 10px;
            opacity: 0.6;
            border-bottom: 1px solid #ccc;
            width: 60%;
            margin: 10px auto;
            padding-bottom: 5px;
        }
        hr{
            border:0.5px solid #ccc;
            opacity: 0.6;
            width: 40%;
            margin-top: 15px;
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