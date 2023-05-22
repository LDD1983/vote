<?php 
include_once "../db.php";

$subject=$pdo->query("select * from `topic` where `id`='{$_GET['id']}'")->fetch(PDO::FETCH_ASSOC);

//先計算投票期間長度
$duration=strtotime($subject['close_date'])-strtotime($subject['open_date']);

$new_close=date("Y-m-d H:i:s",strtotime("-1 seconds"));
$new_open=date("Y-m-d H:i:s",strtotime("now")-$duration);

$sql="update `topic` set `open_date`='$new_open',`close_date`='$new_close' where `id`='{$_GET['id']}'";

$pdo->exec($sql);

header("location:../backend.php");