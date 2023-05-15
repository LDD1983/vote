<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>神奇投票所</title>
    <link rel="stylesheet" href="./css/index_style.css">
</head>
<body>
    <header>
        <a href="index.php">首頁</a>
        <a href="./front/res.php">結果</a>
        <a href="./front/login.php">登入</a>
        <a href="./front/reg.php">註冊</a>
        <a href="./backend.php">後台</a>


    </header>
    <main>
        <ul>
        <?php
     include_once "db.php";


$sql="select * from `topic`";
$rows=$pdo->query($sql)->fetchAll();
foreach ($rows as $row) {
    ?>
    <li>
       <?=$row['subject'];?>
    </li>
    <?php
    # code...
}
?>
</ul>


          

    </main>
    <footer>

    </footer>
    
</body>
</html>