<ul class="topic-list">
    <li class="list-row">
        <div class="list-item-title">主題</div>
        <div class="list-item-title">狀態</div>
        <div class="list-item-title">期間</div>
        <div class="list-item-title">投票數</div>
        <div class="list-item-title">操作</div>
    </li>
    <?php
    $sql="  SELECT `topic`.*,
                        sum(`options`.`total`) as '總計'
            FROM `topic`,`options` 
            WHERE `topic`.`id`=`options`.`subject_id` 
            GROUP BY `topic`.`id`;";
    $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    // echo"<pre>";
    // print_r($rows);
    // echo "</pre>";
    foreach ($rows as $row) {
    ?>
        <li class="list-row">
            <div class="list-item"><?= $row['subject']; ?></div>          
            <div class="list-item">
            <?php
                $now=strtotime('now');
                $open=strtotime($row['open_date']);
                $close=strtotime($row['close_date']);

                if($now<$open){
                    echo "<div class='await'>未開始</div>";
                }else if($now >= $open && $now <=$close){
                    echo "<div class='in-process'>投票中</div>";
                }else{
                    echo "<div class='finish'>己截止</div>";
                }

            ?>
        </div>
            <div class="list-item">
                <?= $row['open_date'] . " ~ " . $row['close_date']; ?>
            </div>
            <div class="list-item"> <?=$row['總計'];?></div>
            <div class="list-item">
                <button onclick="location.href='./back/edit_vote.php?id=<?= $row['id']; ?>'">編輯</button>
                <button onclick="location.href='./back/del_vote.php?id=<?= $row['id']; ?>'">刪除</button>
                <button onclick="location.href='./back/open.php?id=<?=$row['id'];?>'">立即上線</button>
                <button onclick="location.href='./back/close.php?id=<?=$row['id'];?>'">立即結束</button>
            </div>
        </li>
    <?php
    }
    ?>
</ul>