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
        /* label{
            width: 500px;
        } */
        /* .timeset{
            display: flex;} */
        .time{
            margin-bottom: 10px;
        }   
        .subj,.type,#option{
            text-align: center;
        }
        #subject,
        #open_date,
        #close_date{
            width: 200px;
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
        <hr>
        <div id="option" >
        <div class="option" >
        <div class="des">
            <label for="description">項目：</label>
            <input type="text" name="description[]" >
            <button type="button" onclick="plusO()">+</button>
         </div>

        </div>
        </div>
        

        </div>
        <div class="subm">
            <input type="submit" value="新增主題" onclick="confirm('確定新增?')">
            <input type="reset" value="重設">
        </div>
    </form>
    




    <script>
      
        function plusO() {
           option.innerHTML = option.innerHTML + optionC[0].innerHTML ;
            }
        let option = document.getElementById('option')
        let optionC = document.getElementsByClassName('option')

        console.log(option);
        console.log(optionC[0]);

    </script>
</body>
</html>