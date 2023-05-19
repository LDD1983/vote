<ul>
<?php
$sql="select * from `topic`";


$rows=$pdo->query($sql)->fetchAll();
// echo "<pre>";
// print_r($sql);
// echo "</pre>";
foreach($rows as $row){
?>
<li>
    <?=$row['subject'];?>
    <button onclick="location.href='?do=vote&id=<?=$row['id'];?>'">我要投票</button>
</li>
<?php
}
?>
</ul>