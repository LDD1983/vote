<ul class="topic-list">
    <li class="list-row">
        <div class="list-item-title">主題</div>
        <div class="list-item-title">狀態</div>
        <div class="list-item-title">期間</div>
        <div class="list-item-title">投票數</div>
        <div class="list-item-title">操作</div>
    </li>
    <?php
    $sql = "select * from `topic`";
    $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    // echo"<pre>";
    // print_r($rows);
    // echo "</pre>";
    foreach ($rows as $row) {
    ?>
        <li class="list-row">
            <div class="list-item"><?= $row['subject']; ?></div>
            <div class="list-item"></div>
            <div class="list-item">
                <?= $row['open_date'] . " ~ " . $row['close_date']; ?>
            </div>
            <div class="list-item"></div>
            <div class="list-item">
                <button onclick="location.href='./back/edit_vote.php?id=<?= $row['id']; ?>'">編輯</button>
                <button onclick="location.href='./back/del_vote.php?id=<?= $row['id']; ?>'">刪除</button>
            </div>
        </li>
    <?php
    }
    ?>
</ul>