<?php 

$subjects=$pdo->query("select `topic`.`id`,
                            `topic`.`subject`,
                              sum(`options`.`total`) as '總計' 
                     from `topic`,`options`
                     where `topic`.`id` = `options`.`subject_id`
                     group by `topic`.id;")->fetchAll(PDO::FETCH_ASSOC);

?>

<ul class="vote-result">
<h3>選擇你想看的投票主題</h3>
    <li class="vote-option-title">
        <div class="vote-item">序號</div>
        <div class="vote-item">主題</div>
        <div class="vote-item">票數</div>
    </li>
    <hr>
    <?php 
    foreach($subjects as $idx => $subject){
    ?>
    <li class="vote-option">
        <div class="vote-item"><?=$idx+1;?>. 
    </div>
        <div class="vote-item">
            <a href="index.php?do=res&id=<?=$subject['id'];?>">
                <?=$subject['subject'];?>
            </a>
        </div>
        <div class="vote-item">
            <?=$subject['總計'];?>
        </div>
    </li>
    <?php
    }
    ?>
</ul>