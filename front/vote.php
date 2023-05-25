<?php

$topic=$pdo->query("select * from `topic` where `id`='{$_GET['id']}'")->fetch(PDO::FETCH_ASSOC);
if($topic['login']==1){
    if(!isset($_SESSION['login'])){
        $_SESSION['position']="/index.php?do=vote&id={$_GET['id']}";
        header("location:index.php?do=login&msg=1");
    }
}

$options=$pdo->query("select * from `options` where `subject_id`='{$_GET['id']}'")->fetchAll(PDO::FETCH_ASSOC);
?>
    
<form action="./api/vote_api.php" method="post" class="vote">
    <h3><?= $topic['subject']; ?></h3>

    <ul class="desc-ul">
<?php
        foreach ($options as $idx => $opt) {
            echo "<li>";
            if($topic['type']==1){
                echo "<input type='radio' name='desc' value='{$opt['id']}'>";
            }else if($topic['type']==2){
                echo "<input type='checkbox' class='chebox'  name='desc[]' value='{$opt['id']}'>";
            }
           
            echo "<span>" . ($idx + 1) . ". </span>";
            echo "<span>{$opt['description']}</span>";
            echo "</li>";
        }
        ?>
    </ul>

    <div class="f-inB">
        <input type="hidden" name="subject_id" value="<?=$_GET['id'];?>">
        <input class="go-vote-in" type="submit" value="">       
    </div>
    <hr>
    <div class="f-inB">             
        <input class="go-vote-out" type="button" value="取消" onclick="location.href='./index.php'">
    </div>

</form>