<?php
$id = $_GET['id'];
// echo $_GET['id'];
$options = $pdo->query("select * from `options` where `subject_id` = $id")->fetchAll(PDO::FETCH_ASSOC);
$subject = $pdo->query("select * from `topic` where `id` = $id")->fetch(PDO::FETCH_ASSOC);


// print_r($options);
// print_r($subject);
?>



<ul class="vote-res">
   
    <h3><?=$subject['subject'];?></h3>
     <li class="vote-option-title">
            <div class="vote-item">序號</div>
            <div class="vote-item">項目</div>
            <div class="vote-item">票數</div>
    </li>
   
    <?php
    foreach($options as $idx => $option){
        ?>
        <li class="vote-option">
            <div class="vote-item"><?=$idx+1;?> . </div>
            <div class="vote-item"><?=$option['description'];?></div>
            <div class="vote-item"><?=$option['total'];?></div>
        </li>
    <?php
    }
    ?>
</ul>

