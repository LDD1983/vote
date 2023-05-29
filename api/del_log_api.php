<?php

$pdo ->exec("delete from `logs` where `id`= '{$POST['id']}'");


header("locaction:/backend.php?do=items&sub_id={$_POST['topic_id']}");
