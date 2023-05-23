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
            margin: 0 auto;
        }
        .desc-ul{
            text-align: left;
            padding-left: 7%;
            margin-bottom: 15px;
            width: 20%;
        }
        .desc-ul>li{
            margin-bottom: 5px;
        }
        ul>.vote-option-title{
            font-size: 1.5rem;
            letter-spacing: 3px;
            opacity: 0.8;

            text-align:center;
        }
        .vote-item{
            display: inline-block;
            margin-bottom: 5px;
            font-size: 1.rem;

        }
        .vote-item>a{
            text-decoration: none;
            letter-spacing: 1px;
            font-size: 1.15rem;
            color: rosybrown;
            opacity: 0.9;
        }
        .vote-item>a:hover{
            font-weight: 100;
        }

        .vote-item:first-child{
            width: 8%;
            text-align: left;
        }
        .vote-item:nth-child(2){
            width: 20%;
            text-align: left;
            padding-left: 4%;
        }
        .vote-item:nth-child(3){
            width: 10%;
        }       
        .index-li{
            position: relative;
        }



        .index-li>p{
            font-size: 1.3rem;
            letter-spacing: 5.5px;
            opacity: 0.7;
            position: relative;
            text-align: left;
            left: 21%;
            margin:0;
            border-left: 7rem solid #393434;
            padding-left: 1rem;
            margin-top: 20px;
         
        }
        li>button{
            width: 100px;
            height: 30px;
            background-color:#FFC1C1;
            /* color: white; */
            border: 1px solid #ccc;
            opacity: 0.6;
            font-size: 0.9rem;
            position: relative;
            left: 10%;

        }
        li>.go-vote{
            position: absolute;
            bottom: -8px;
            height: 66px;
            left: 70%;
            width: 80px;
            rotate: 3deg;
            text-transform: uppercase;
            text-shadow: 1px 1px 2px rosybrown;
        }
        li>.go-vote:hover,
        .go-vote-in:hover{
            rotate: 20deg;
            bottom: -12px;
            height: 50px;
            font-size: 0;
            opacity: 0.4;
            border: 1px solid black;
            background-color: white;
            content: 'vote';
            background-image: url(./img/vote_ticket.png);
            }
        .go-vote-in{
            position: absolute;
            height: 66px;
            right: 47%;
           
            width: 100px;
            rotate: 3deg;
            text-transform: uppercase;
            margin-bottom: 20px;
            background-color: #FFC1C1;
            bottom: -10 ;          

        }
        /* li>.go-vote:after{
            content: 'vote';
        } */
        .type-info,
        .vip-login,
        .normal{
            border-radius: 30px;
            width: 50px;
            background-color: #fff;
            border-color: rosybrown;
            height: 30px;
            font-size: 0.5rem;
         
        }
        /* .type-info{
            position: absolute;
            bottom: -10px;
            left: 50%; */
        
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
            border: 0.3px solid #ccc;
            opacity: 0.4;
            width: 60%;
            margin-top: 10px;
        }
        .img{
            display:flex;
           
        }
        .img>img{
         
            width: 100%;
        }
        .vip-login,
        .normal{
         position: absolute;
         border: none;
         width: 73px;
         bottom: 0px;
         height: 30px;
         left: 63%;
         opacity: 0.9;

        }
        .normal{
            box-shadow: 3px 3px 8px 3px lightpink;
        }
        .vip-login{
            /* color: white;
            box-shadow: 3px 3px 20px 6px #ccc; */
            /* box-shadow: 2px 2px 15px 3px lightgrey; */
            /* background-color: silver;
            border: 1px solid whitesmoke; */
            background-image: url(./img/vip_logo.png);
            background-size:cover;
        }
        div>.img-logoT{
            position: relative;
            bottom: 500px;
        }
        .text{
            display: flex;
        }
        .logo{
            display:none;

        }

        
          
    </style>
</head>
<body>  
    <div class="img logo" id="logoB">
        <img src="./img/logo.png" alt="">
    </div>
    <div class="img text" id="logoA">
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
        <a href="./api/logout_api.php">登出</a>
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

<script>
    let logoA = document.getElementById('logoA');
    let logoB = document.getElementById('logoB');

    logoA.addEventListener('mouseover', function(){
        // console.log('AA');
        this.style.display='none';
        logoB.style.display='flex';
        
    })
    logoA.addEventListener('mouseout', function(){
        // console.log('AA');
        this.style.display='flex';
        logoB.style.display='none';
        
    })


</script>
</body>
</html>