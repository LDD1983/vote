<?php
include_once "../db.php";

// echo "<pre>";
// echo print_r($_POST['description']);
// echo "</pre>";
// echo "<pre>";
// echo print_r($_FILES);
// echo "</pre>";



$sql_chk_subject = "select count(*) from `topic` where subject='{$_POST['subject']}'";
$chk = $pdo->query($sql_chk_subject)->fetchColumn();

$image='';
if(!empty($_FILES['img']['tmp_name'])){
    if(in_array($_FILES['img']['type'],['image/jpeg','image/png','image/gif'])){
        move_uploaded_file($_FILES['img']['tmp_name'],'../upload/'.$_FILES['img']['name']);
        $image=$_FILES['img']['name'];
    }else{
        header("location:../backend.php?do=add_vote&error=非圖片格式");
        exit();
    }
}

// echo "<pre>";
// echo print_r($image);
// echo "</pre>";




if ($chk > 0) {
    echo "already used";
    echo "<a href='../back/add_vote.php'>返回新增</a>";
    # code...
} else {
    // $sql = "insert into 
    // `topic`(`subject`, `type`,`image`,`login`, `open_date`, `close_date`) 
    //  values ('{$_POST['subject']}','{$_POST['type']}','$image','{$_POST['login']}','{$_POST['open_date']}','{$_POST['close_date']}')";
    // $pdo->exec($sql);
    //  $_FILES
   save('topic',['subject'=>$_POST['subject'],
                    'type' => $_POST['type'],
                    'image'=>$image,
                    'login'=>$_POST['login'],
                    'open_date'=>$_POST['open_date'],
                    'close_date'=>$_POST['close_date']]);

    //寫入選項
    // $sql_subject_id = "select `id` from `topic` where `subject`='{$_POST['subject']}'";
    //echo $sql_subject_id;
    // $subject_id = $pdo->query($sql_subject_id)->fetchColumn();

    $subject_id = find ('topic',['subject'=>$_POST['subject']])['id'];

    //echo $subject_id;

    foreach ($_POST['description'] as $desc) {
        if ($desc != '') {
            // $sql_option = "INSERT INTO `options`(`description`,`subject_id`) 
            //            VALUES ('$desc','$subject_id')";
            // $pdo->exec($sql_option);

            save('options',['description'=>$desc,'subject_id'=>$subject_id]);
        }
    }
}
header("location:../backend.php");


  
 



    // 寫入選項
   //  $sql_subject_id = "select `id` from `topic` where `subject`='{$_POST['subject']}'";

     //   $pdo->exec($sql);
  
//   header("location:../back/add_vote.php");
