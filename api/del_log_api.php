<?php

// $pdo ->exec("delete from `logs` where `id`= '{$POST['id']}'");
del('logs',$POST['id']);



to("/backend.php?do=items&sub_id={$_POST['topic_id']}");
