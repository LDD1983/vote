<?php
  include_once "../db.php";

  echo "<pre>";
  echo print_r($_POST['description']);
  echo "</pre>";



 $sql_chk_subject = "select count(*) from `topic` where subject='{$_POST['subject']}'";
 $chk = $pdo->query($sql_chk_subject)->fetchColumn();
 if ($chk>0) {
    echo "already used";
    echo "<a href='../back/add_vote.php'>返回新增</a>";
    # code...
 }else{
    $sql="insert into 
    `topic`(`subject`, `type`, `open_date`, `close_date`) 
     values ('{$_POST['subject']}','{$_POST['type']}','{$_POST['open_date']}','{$_POST['close_date']}')";

 }

  
 



    // 寫入選項
    $sql_subject_id = "select `id` from `topic` where `subject`='{$_POST['subject']}'";

     //   $pdo->exec($sql);
  
//   header("location:../back/add_vote.php");





