


<form action="../api/login_api.php" method="post">
<h3>會員登入</h3>
<?php
    if(isset($_GET['error'])){
        echo "<span style='color:red'>";
        echo "帳號密碼錯誤";
        echo "</span>";
        }
    if(isset($_GET['msg'])){
        echo "<span style='color:orange'>";
        echo $msg[$_GET['msg']];
        echo "</span>"; 
    }
?>
   
   
    <div>
        <label for="acc">帳號 : </label>
            <input type="text" name="acc" id="">
    </div>
    <div>
        <label for="pw">密碼 : </label>
            <input type="password" name="pw" id="">
    </div>
    <div>
        <label for=""></label>
        <input type="submit" name="" id="" value="確定">
    </div>


</form>