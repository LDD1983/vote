<?php 
include_once "./db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>黑箱作業</title>
        <link rel="stylesheet" href="./css/basic.css">
        <link rel="stylesheet" href="./css/center.css">
        <link rel="stylesheet" href="./css/header.css">
        <link rel="stylesheet" href="./css/list.css">
        <link rel="stylesheet" href="./css/reset.css">
        <link rel="stylesheet" href="./css/form.css">


    

    <style>
        ul {
            width:100%;
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
        ul>.vote-option-title{
            font-size: 1.5rem;
            letter-spacing: 2px;
            opacity: 0.8;

            text-align:center;
        }
        .vote-item{
            display: inline-block;
            margin-bottom: 5px;

        }
        .vote-item>a{
            text-decoration: none;
            font-size: 1.15rem;
        }
        .vote-item:first-child{
            width: 5%;
        }
        .vote-item:nth-child(2){
            width: 20%;
            text-align: left;
            padding-left: 5%;
        }
        .vote-item:nth-child(3){
            width: 10%;
        }
        .index-li{
            position: relative;
        }



        .index-li>p{
            font-size: 1.2rem;
            letter-spacing: 5px;
            opacity: 0.7;
            position: relative;
            text-align: left;
            left: 21%;
            margin-bottom: 25px;
            border-left: 8rem solid #ccc;
            padding-left: 1rem;
        }
        li>button{
            width: 100px;
            height: 30px;
            background-color:#FFC1C1;
            /* color: white; */
            border: 1px solid #ccc;
            opacity: 0.5;
            font-size: 0.9rem;
            position: relative;
            left: 10%;

        }
        li>.go-vote{
            position: absolute;
            bottom: 0px;
            height: 66px;
            left: 70%;
            width: 80px;
            rotate: 3deg;
            text-transform: uppercase;
        }
        li>.go-vote:hover{
            rotate: 20deg;
            bottom: -12px;
            height: 50px;
            font-size: 0;
            opacity: 0.4;
            border: 1px solid black;
            background-color: #FFC1C1;
            content: 'vote';
            }
        /* li>.go-vote:after{
            content: 'vote';
        } */
        .type-info,
        .vip-login,
        .normal{
            border-radius: 20px;
            width: 50px;
            background-color: #fff;
            border-color: rosybrown;
            height: 20px;
            font-size: 0.5rem;
         
        }
        .chebox{
            border-radius: 10px;
        }
        li>.type-info:hover{
            opacity: 0.5;
        }
        li>button:hover{
            opacity: 0.9;
            /* background-color:white; */
        }
        li>input{
            margin-right: 5px;
        }
        h3{
            letter-spacing: 10px;
            opacity: 0.6;
            border-bottom: 1px solid #ccc;
            width: 70%;
            margin: 10px auto;
            padding-bottom: 5px;
            font-size: 2rem;
        }
        hr{
            border:0.5px solid #ccc;
            opacity: 0.6;
            width: 60%;
            margin-top: 10px;
        }
        .img{
            display: flex;
        }
        .img>img{
         
            width: 100%;
        }
        .vip-login,
        .normal{
         position: absolute;
         border: 2px solid  #FFC1C1;
         width: 73px;
         bottom: 0px;
         height: 30px;
         left: 63%;

        }
        .vip-login{
            box-shadow: 2px 2px 1px rosybrown;
        }
        
          
    </style>
</head>
<body>  
    <div class="img">
        <img src="./img/vote.png" alt="">
    </div>
    <header>
    <a href="index.php">首頁</a>
    <a href="index.php?do=result_list">結果</a>
    <?php
    if(!isset($_SESSION['login'])){
    ?>
        <a href="index.php?do=login">登入</a>
        <a href="index.php?do=reg">註冊</a>
    <?php
    }else{
    ?>
        <a href="./api/logout.php">登出</a>
    <?php
    }
    ?>
       <a href="./backend.php">back</a>

</header>
    <main>

<?php

$do=$_GET['do']??'list';

$file="./front/".$do.".php";

if(file_exists($file)){
    include $file;
}else{
    include "./front/list.php";
}
?>

</main>
<footer></footer>

</body>
</html>