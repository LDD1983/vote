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
     $pdo->exec($sql);

    //寫入選項
    $sql_subject_id="select `id` from `topic` where `subject`='{$_POST['subject']}'";
    //echo $sql_subject_id;
    $subject_id=$pdo->query($sql_subject_id)->fetchColumn();
    
    //echo $subject_id;

    foreach($_POST['description'] as $desc){
        if($desc!=''){
            $sql_option="INSERT INTO `options`(`description`,`subject_id`) 
                       VALUES ('$desc','$subject_id')";
            $pdo->exec($sql_option);
        }
    }
}
header("location:../backend.php");


  
 



    // 寫入選項
   //  $sql_subject_id = "select `id` from `topic` where `subject`='{$_POST['subject']}'";

     //   $pdo->exec($sql);
  
//   header("location:../back/add_vote.php");





