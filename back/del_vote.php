<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>刪除主題</title>
    <link rel="stylesheet" href="../css/basic.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/center.css">
    <link rel="stylesheet" href="../css/reset.css">
    <style>
        li {
            
            text-align: left;
            padding-left: 45%;
        }
    </style>


</head>

<body>
    <header>
        <a href="index.php">首頁</a>
        <a href="/api/logout_api.php">登出</a>
    </header>
    <nav>
        <a href="../backend.php">返回管理</a>
        <a href="./back/que_vote.php">結果查詢</a>
    </nav>
    <main>
        <?php
        include_once "../db.php";
        $row = $pdo->query("select * from `topic` where `id`='{$_GET['id']}'")->fetch(PDO::FETCH_ASSOC);
        $row2 = $pdo->query("select * from `options` where `subject_id`='{$_GET['id']}'")->fetchAll(PDO::FETCH_ASSOC);
        // echo"<pre>";
        // print_r($row2);
        // echo "</pre>";
        ?>
        <h3>確定刪除?</h3>
        <div>
            <p>主題 : </p>
            <?= $row['subject']; ?>
            <p>項目 : </p>
            <?php
            foreach ($row2 as $row2d) {
            ?>
                <li>
                    <?= $row2d['description']; ?>
                </li>
            <?php
            }
            ?>
            <br>
        </div>
        <div>
            <button onclick="location.href='../api/del_vote_api.php?id=<?= $_GET['id']; ?>'" onclick="confirm('確定刪除?')">刪除主題</button>
            <button onclick="location.href='../backend.php'">取消</button>
        </div>
    </main>
</body>

</html>