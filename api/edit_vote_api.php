<?php
include_once "../db.php";

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";



$sql="update `topic` 
        set  `subject`='{$_POST['subject']}',
             `type`='{$_POST['type']}',
             `open_date`='{$_POST['open_date']}',
             `close_date`='{$_POST['close_date']}'
        where `id`='{$_POST['subject_id']}'";


// $sql="update `topic` 
//         set  `subject`='{$_POST['subject']}',
//              `open_date`='{$_POST['open_date']}',
//              `close_date`='{$_POST['close_date']}',
//              `type`='{$_POST['type']}'
//         where `id`='{$_POST['subject_id']}'";

$pdo->exec($sql);

$options=$pdo->query("select `id` from `options` where `subject_id`='{$_POST['subject_id']}'")
             ->fetchAll(PDO::FETCH_ASSOC);

if(!empty($options)){
    if(isset($_POST['opt_id'])){
        foreach($options as $opt){
            if(!in_array($opt['id'],$_POST['opt_id'])){
                $pdo->exec("delete from `options` where `id`='{$_POST['id']}'");
            }
        }
    }else{
        $pdo->exec("delete from `options` where `subject_id`='{$_POST['subject_id']}'");
    }
}
// update
if(isset($_POST['opt_id'])){
    foreach($_POST['opt_id'] as $idx => $id){
        $pdo->exec("update `options` set `description`='{$_POST['description'][$idx]}' where `id`='$id'");
        unset($_POST['description'][$idx]);
    }
};
// add 
if(!empty($_POST['description'])){
    foreach($_POST['description'] as $desc){
        $pdo->exec("insert into `options` (`description`,`subject_id`) value ('$desc',{$_POST['subject_id']})");
    }
};

echo "<pre>";
print_r($_POST);
echo "</pre>";
echo "<pre>";
echo '$options';
print_r($options);
echo "</pre>";

header("location:../backend.php")

?>

