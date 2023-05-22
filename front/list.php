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
            <p>主題 : <?= $row['subject']; ?>
                <span><button class="type-info" >
                    <?php
                        switch($row['type']){
                         case 1:
                                echo "單選";
                            break;
                            case 2:
                                echo "多選";
                            break;
                        
                        }
                        ?>
                </button> </span>      
           </p>
            
            <button onclick="location.href='?do=vote&id=<?= $row['id']; ?>'">來去投票</button>
        </li>
        <hr>
    <?php
    }
    ?>
</ul>