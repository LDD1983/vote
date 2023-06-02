<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增主題</title>
   
   
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/form.css">
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
        <a href="../api/logout_api.php">登出</a>
    </header>
    <nav>
        <a href="../backend.php">返回管理</a>
        <a href="../backend.php?do=query_vote">結果查詢</a>
    </nav>

    <main>

        <form action="../api/add_vote_api.php" method="post" enctype="multipart/form-data">
            <h3>新增主題</h3>
            <div class="subj">
                <label for="subject">主題說明：</label>
                <input type="text" name="subject" id="subject">


            </div>
            <div class="timeset">
                <div class="time open">
                    <label for="open_time">開始時間：</label>
                    <input type="datetime-local" name="open_date" id="open_date">
                </div>
                <div class="time close">
                    <label for="close_time">結束時間：</label>
                    <input type="datetime-local" name="close_date" id="close_date">
                </div>

            </div>

            <div class="type">
                <label for="type">類型：</label>
                <input type="radio" name="type" id="type1" value="1">單選&nbsp;
                <input type="radio" name="type" id="type2" value="2">複選
            </div>
            <div class="login">
                <label for="login">是否公開</label>
                <input type="radio" name="login" id="login0" value="0">是 &nbsp;
                <input type="radio" name="login" id="login1" value="1" >否
            </div>
            <label for="img" class="custom-file-upload">
            <i class="fa fa-cloud-upload"></i> 上傳圖片
            </label>
            <input id="img" type="file" name="img" />
            <hr>
            <div class="options">
                <div>
                    <label for="description">項目：</label>
                    <input type="text" name="description[]" class="description-input">
                    <span onclick="addOption()">+</span>
                    <span onclick="removeOption(this)">-</span>
                </div>
            </div>
            <div class="subm">
                <input type="submit" value="確定新增" onclick="confirm('確定新增?')">
                
            </div>
            <div class="reset">
            <input type="reset" value="重設">
            </div>
        </form>
    </main>






</body>

</html>
<script src="../Js/jquery-3.7.0.min.js"></script>

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