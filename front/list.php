<ul>
    <?php
    $sql = "select * from `topic`";


    $rows = $pdo->query($sql)->fetchAll();
    // echo "<pre>";
    // print_r($sql);
    // echo "</pre>";
    foreach ($rows as $row) {
    ?>
        <li>
            <p><?= $row['subject']; ?></p>
            <button onclick="location.href='?do=vote&id=<?= $row['id']; ?>'">我要投票</button>
        </li>
        <hr>
    <?php
    }
    ?>
</ul>