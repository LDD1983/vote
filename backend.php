<?php include_once "./db.php"; 
$do="";
if(isset($_GET['do'])){
    $do=$_GET['do'];
}else{
    if(isset($_SESSION['pr'])){
        $do=$_SESSION['pr'];
    }else{
        $do="error";
    }
}      
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理後台</title>
    <link rel="stylesheet" href="./css/basic.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/list.css">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/form.css">
   


    <style>
        .img{
            display: flex;
        }
        .img>img{
            width: 100%;
        }

    </style>
        
</head>

<body>
    <div class="img">
        <img src="./img/vote2.png" alt="">
    </div>
    <header>
        <a href="index.php">首頁</a>
     
        <a href="./api/logout_api.php">登出</a>
    </header>
    
    <main>
        <?php
        switch($_SESSION['pr']){
            case 'super';
                echo '<nav>';
                echo '<a href="/back/add_vote.php">新增投票</a>';
                echo '<a href="/backend.php">管理首頁</a>';
                echo '<a href="./backend.php?do=query_vote">結果查詢</a>';
                echo '</nav>';
            break;
            case 'admin';
                echo '<nav>';
                echo '<a href="/back/add_vote.php">新增投票</a>';
                echo '<a href="/backend.php">管理首頁</a>';
                echo '<a href="./backend.php?do=query_vote">結果查詢</a>';
                echo '</nav>';
            break;

            case 'member';
            echo '<nav>';
            echo '<a href="./backend.php?do=edit_selt">修改資料</a>';
            echo '<a href="./backend.php?do=vote_history">投票紀錄</a>';
            echo '</nav>';

            break;
        }
        //include "./back/topic_list.php";

        /*  if(isset($_GET['do'])){
            $file="./back/".$_GET['do'].".php";
        }else{
            $file="./back/topic_list.php";
        } */

        //$do=(isset($_GET['do']))?$_GET['do']:'topic_list';
        

        $file = "./back/". $do.".php";

        if (file_exists($file)) {
            include $file;
        } else {
            include "./back/topic_list.php";
        }

        // include (file_exists($file))?$file:"./back/topic_list.php";
        
        // switch($_GET['do']){
        //     case "add_vote":
        //         include "./back/add_vote.php";
        //     break;
        //     case 'query_vote':
        //         include "./back/query_vote.php";
        //     break;
        //     default :
        //         include "./back/topic_list.php";
        // }
        ?>
    </main>
    <footer>

    </footer>



</body>

</html>