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
            margin-top: 10px;
            margin-bottom: 15px;
            width: 20%;
        }
        .desc-ul>li{
            margin-bottom: 5px;
        }
        ul>.vote-option-title{
            font-size: 1.5rem;
            letter-spacing: 3px;
            opacity: 0.6;
            margin-top: 5px;
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
            font-size: 1.4rem;
            color: #501313;
            opacity: 1;
        }
        .vote-item>a:hover{
            color: #ff7575;
            
        }

        .vote-item:first-child{
            width: 8%;
            text-align: left;
        }
        .vote-item:nth-child(2){
            width: 40%;
            text-align: left;
            padding-left: 4%;
        }
        .vote-item:nth-child(3){
            width: 10%;
        }       
        .index-li{
            position: relative;
        }



       
         
        
        li>button{
            width: 100px;
            height: 30px;
            background-color:#FFC1C1;
            /* color: white; */
            border: 1px solid #ccc;
       
            font-size: 0.9rem;
            position: relative;
            left: 10%;

        }
     
      
        /* li>.go-vote:after{
            content: 'vote';
        } */
       
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
       
        li>input{
            margin-right: 5px;
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
        
        
        div>.img-logoT{
            position: relative;
            bottom: 500px;
        }
        .img{
           display: flex;
        }
        .img>img{
            max-width: 100%;
            height: auto;
            
        }
        #logoB{
            display: none;
        }
        main{
            height: auto;
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
    <a href="index.php?do=res.list">結果</a>
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
        switch($_SESSION['pr']){
            case 'super';
                echo '<a href="backend.php?do=super">超管</a>';

            break;
            case 'admin';
                echo '<a href="backend.php?do=admin">網管</a>';
            break;
            default : 'member';
                echo '<a href="backend.php?do=member">管理</a>';
            break;
        }
    }
    ?>
    

</header>
    <main>

<?php
if(isset($_SESSION['login']) && isset($_SESSION ['pr'])){
    echo '<p>您的身分為 : ';
    echo "";
    echo $_SESSION['pr'];}

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