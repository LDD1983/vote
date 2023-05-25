<?php

if(isset($_GET['error'])){
    echo "<span style='color:red'>";
    echo "帳號密碼不可為空";
    echo "</span>";
}

?>
<form action="./api/reg_api.php" method="post">
    <h3>會員註冊</h3>
    <div>
        <label for="acc">帳 號 : </label>
        <input type="text" name="acc" id="acc">
    </div>
    <div>
        <label for="pw">密 碼 : </label>
        <input type="password" name="pw" id="pw">
    </div>
    <div>
        <label for="name">姓 名 : </label>
        <input type="text" name="name" id="name">
    </div>
    <div>
        <label for="addr">地 址 : </label>
        <input type="text" name="addr" id="addr">
    </div>
    <div class="email">
        <label for="email">E-mail : </label>
        <input type="text" name="email" id="email">
    </div>
    <div>
        <input type="submit" value="註冊">
    </div>
</form>