<?php
include_once "../db.php";

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

$opt = $_POST['desc'];
$subject_id = $_POST['subject_id'];

$pdo->exec("update `options` set `total`=`total`+1 where `id`='$opt'");

header("location:../index.php");
