<?php include_once "./db.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>backend</title>
    <link rel="stylesheet" href="./css/basic.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/list.css">
    <link rel="stylesheet" href="./css/reset.css">
</head>
<body>
    <header>
        <a href="index.php">首頁</a>
        <a href="logout.php">登出</a>
   </header>
   <nav>
        <a href="./back/add_vote.php">新增投票</a>
        <a href="./back/que_vote.php">結果查詢</a>
   </nav>
   <main>
        <?php
        //include "./back/topic_list.php";

        /*  if(isset($_GET['do'])){
            $file="./back/".$_GET['do'].".php";
        }else{
            $file="./back/topic_list.php";
        } */
    
        //$do=(isset($_GET['do']))?$_GET['do']:'topic_list';
        $do=$_GET['do']??'topic_list';
    
        $file="./back/".$do.".php";
    
        if(file_exists($file)){
            include $file;
        }else{
            include "./back/topic_list.php";
        }

        //include (file_exists($file))?$file:"./back/topic_list.php";
        /* 
        switch($_GET['do']){
            case "add_vote":
                include "./back/add_vote.php";
            break;
            case 'query_vote':
                include "./back/query_vote.php";
            break;
            default :
                include "./back/topic_list.php";
        } */
        ?>
    </main>
    <footer>

    </footer>



</body>
</html>
