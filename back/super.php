<style>
    main{
        text-align: center;
    }
    
    table{
        border: 1px solid #000;
        border-collapse: collapse;
        width: 50%;
        margin: 10px auto;
        text-align: center;
    }
    td{
        border: 1px solid #000;
      }

</style>

<h3>管理權限</h3>
<?php
$sql = "select * from `members`";
$mems = $pdo->query($sql)->fetchAll();


?>
<table>
    <tr>
    <td>帳號</td>
    <td>身分</td>
    <td>操作</td>
</tr>
<?php
foreach($mems as $mem){
?>


<form action="/api/changr_pr.php" method="post">
    <tr>
        <td><?=$mem['name'];?></td>
        <td>
            <select name="pr" id="">
                <option value="super" <?=($mem['pr']=='super')?'selected':'';?>>super</option>
                <option value="admin" <?=($mem['pr']=='admin')?'selected':'';?>>admin</option>
                <option value="member" <?=($mem['pr']=='member')?'selected':'';?>>mem</option>
            </select>
        </td>
        <td>
        <input type="hidden" name="id" value="<?=$mem['id'];?>">
        <button type="submit">edit</button><button type="button">del</button> 
        </td>
    </tr>
    
 </form>




<?php
}
?>

</table>
