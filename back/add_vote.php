<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add_vote</title>
    <link rel="stylesheet" href="../css/center.css">
    <style>
       
        form>div{
            margin-bottom: 10px;
        }
        .timeset{
            display: flex;}
        .time{
            margin-right: 20px;
        }   
        #subject{
            width: 300px;
        }
        .subm{
            text-align: center;
            margin-top: 30px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    
    <form action="../api/add_vote_api.php" method="post">
        <div class="subj">
            <label for="subject">主題說明：</label>
            <input type="text" name="subject" id="subject">
            
            
        </div>
    <div class="timeset">
        <div class="time open">
            <label for="open_time">開始時間&nbsp;&nbsp;</label>
            <input type="datetime-local" name="open_date" id="open_date">
        </div>
        <div class="time close">
            <label for="close_time">結束時間&nbsp;&nbsp;</label>
            <input type="datetime-local" name="close_date" id="close_date">
        </div>

     </div>
        
        <div class="type">
            <label for="type">類型：</label>
            <input type="radio" name="type" id="type1" value="1">單選&nbsp;
            <input type="radio" name="type" id="type2" value="2">複選
        </div>
        <hr>
        <div class="option" id="option">
        <div class="des">
            <label for="description">項目：</label>
            <input type="text" name="description[]" id="description">

        </div>
        <div class="des">
            <label for="description">項目：</label>
            <input type="text" name="description[]" id="description">

        </div>
        <div class="des">
            <label for="description">項目：</label>
            <input type="text" name="description[]" id="description">

        </div>
        <div class="des">
            <label for="description">項目：</label>
            <input type="text" name="description[]" id="description">

        </div>
        </div>
        <div class="subm">
            <input type="submit" value="新增主題" onclick="confirm('確定新增?')">
        </div>
    </form>
    




    <script>
        let option = document.getElementById('option')
        console.log(option);
    </script>
</body>
</html>