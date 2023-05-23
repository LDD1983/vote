<ul>
<?php
    $sql = "select * from `topic` where `close_date` >= '".date("Y-m-d H:i:s")."'";


    $rows = $pdo->query($sql)->fetchAll();
    // echo "<pre>";
    // print_r($rows);
    // echo "</pre>";
    foreach ($rows as $idx => $row) {
    ?>
        <li class="index-li">
            <p>主題 : <?= $row['subject']; ?> </p>
                <button class="type-info" > 
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
                </button>       
<?php
                        if($row['login']==1){
                        echo "<button class='vip-login'>";
                        echo " ";                
                    }else{
                        echo "<button class='normal'>";
                        echo "公開";
                    }
                ?>
           </button>
            
           <button class="go-vote" onclick="location.href='?do=vote&id=<?=$row['id'];?>'">vote</button>
        </li>
        <hr>
    <?php
    }
    ?>
</ul>