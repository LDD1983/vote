<?php include_once "../db.php";


////////////////////////////////////////////////////////////////////////////////////////////////////
// $sql = "select count(*) from `members` 
//                         where `acc` = '{$_POST['acc']}' && `pw` = '{$_POST['pw']}'";
// $chk = $pdo->query($sql)->fetchColumn();
$chk =_count('members',['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);

////////////////////////////////////////////////////////////////////////////////

// $sql = "select `pr` from `members` where `acc` = '{$_POST['acc']}' && `pw` = '{$_POST['pw']}'";
// $pr = $pdo->query($sql_pr)->fetchColumn()
// $_SESSION['login'] = ['acc'];

if ($chk) {
    $sql_pr="select `pr` from `members` where `acc`='{$_POST['acc']}' && `pw`='{$_POST['pw']}'";
    
    $pr=$pdo->query($sql_pr)->fetchColumn();

    $_SESSION['login']=$_POST['acc'];
    
    $_SESSION['pr']=$pr;

    $_SESSION['login']=$_POST['acc'];

    if(isset($_SESSION['posotion'])){
        header("loction:".$_SESSION['position']);
        unset($_SESSION['position']);
        exit();
    }

    header("location:../index.php");
}else{
    header("location:../index.php?do=login&error=1");
}