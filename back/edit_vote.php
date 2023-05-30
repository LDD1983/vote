<?php include_once "../db.php";
$topic = $pdo->query("select * from `topic` where `id`='{$_GET['id']}'")
    ->fetch(PDO::FETCH_ASSOC);

$options = $pdo->query("select * from `options` where `subject_id`='{$_GET['id']}'")
    ->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編輯主題</title>
   
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../css/list.css">
    <script src="../Js/jquery-3.7.0.min.js"></script>
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
        <img src="/img/vote2.png" alt="">
    </div>
    <header>
        <a href="../index.php">首頁</a>
        <a href="/api/logout_api.php">登出</a>
    </header>
    <nav>
        <a href="../backend.php">返回管理</a>
        <a href="./back/que_vote.php">結果查詢</a>
    </nav>
    <main>
        <form action="../api/edit_vote_api.php" method="post">
            <h1>編輯主題</h1>
            <div class="subj">
                <label for="subject">主題說明：</label>
                <input type="text" name="subject" id="subject" value="<?= $topic['subject']; ?>">
            </div>
            <div class="timeset">
                <div class="time open">
                    <label for="open_time">開始時間：</label>
                    <input type="datetime-local" name="open_date" id="open_date" value="<?= $topic['open_date']; ?>">
                </div>
                <div class="time close">
                    <label for="close_time">結束時間：</label>
                    <input type="datetime-local" name="close_date" id="close_date" value="<?= $topic['close_date']; ?>">
                </div>

            </div>
            <div class="type">
                <label for="type">類型：</label>
                <input type="radio" name="type" id="type1" value="1" <?= ($topic['type'] == 1) ? 'checked' : ''; ?>>單選&nbsp;
                <input type="radio" name="type" id="type2" value="2" <?= ($topic['type'] == 2) ? 'checked' : ''; ?>>複選
            </div>
            <div class="login">
                <label for="login">是否公開</label>
                <input type="radio" name="login" id="login0" value="0" <?= ($topic['login'] == 0) ? 'checked' : ''; ?>>是 &nbsp;
                <input type="radio" name="login" id="login1" value="1" <?= ($topic['login'] == 1) ? 'checked' : ''; ?>>否
            </div>
            <hr>
            <div class="options">
                <?php
                foreach ($options as $opt) {
                ?>
                    <div>
                        <label for="description">項目：</label>
                        <input type="text" name="description[]" class="description-input" value="<?= $opt['description']; ?>">
                        <span onclick="addOption()" width="50px">+</span>
                        <span onclick="removeOption(this)" width="50px">-</span>
                        <input type="hidden" name="opt_id[]" value="<?= $opt['id']; ?>">
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="subm">
                <input type="hidden" name="subject_id" value="<?= $topic['id']; ?>">
                <input type="submit" value="確定編輯" >
                <button onclick="location.href='../backend.php'">取消</button>
            </div>
        </form>
    </main>






</body>

</html>

<script>
    function addOption() {
        let opt = `<div>
                    <label for="description">項目：</label>
                    <input type="text" name="description[]"  class="description-input">
                    <span onclick="addOption()">+</span>
                    <span onclick="removeOption(this)">-</span>
                </div>`
        $(".options").append(opt);
    }

    function removeOption(el) {
        let dom = $(el).parent()
        $(dom).remove();
    }
</script>