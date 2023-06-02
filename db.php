<?php 

function pdo(){
    $dsn="mysql:host=localhost;charset=utf8;dbname=vote";
    $pdo=new PDO($dsn, 'root', '');

    return $pdo;

}

$pdo = pdo();



date_default_timezone_set("Asia/Taipei");

session_start();

$msg=[
    1=>"本調查為會員限定，請登入後再進行投票",
    2=>"本調查已結束，請進行其它調查"
];

/* echo "<pre>";
print_r(all('options'));
echo "</pre>"; */

// update('options',['id'=>8,'description'=>'50萬','total'=>200]);
// insert('options',['description'=>'50萬','total'=>200]);

//insert('options',['description'=>'60萬','subject_id'=>5,'total'=>0]);
// del('options',8);
// del('options',['subject_id'=>5]);
/////////////////////////////////////////////////

// select count(*) from $table;


///////////////////////////////////////////////////////////////////

// all($table) all 
// like : select * from `topic`

// all($table,$array) && 
// : select * from `topic` where `type` = 1 && `login`=1 ; 
// all ('topic' , ['type' =>1 && 'login' = 1]);

// all($table,$sql) base on sql string condition 
// : select * from `topic` where open_date <= '2023/06/02' order by `id` desc;
// all(`topic`,"where open_date <= '2023/06/02' order by `id` desc")

// all($table,$array,$sql)  match complex condiitons
// : select * from `topic` where `type` = 1 && `login`=1 order by `id` desc; 
// all()



function all($table,...$arg){
   
    $pdo=pdo();

    $sql="select * from $table ";

    if(!empty($arg)){
        if(is_array($arg[0])){
            foreach($arg[0] as $key => $value){

                $tmp[]="`$key`='$value'";
            }
            // $sql = $sql . join("&&",$tmp);
            $sql .= "where". join(" && ",$tmp);

        }else{
            // $sql = $sql . $arg[0];
            $sql.="where". $arg[0];
        }
    }
    if(isset($arg[1])){
        $sql.="where". $arg[1];
    }
    $rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    return $rows;
}

////////////////////////// for count
function _count($table,...$arg){
   
    $pdo=pdo();

    $sql="select count(*) from $table ";

    if(!empty($arg)){
        if(is_array($arg[0])){
            foreach($arg[0] as $key => $value){

                $tmp[]="`$key`='$value'";
            }
            // $sql = $sql . join("&&",$tmp);
            $sql .= "where". join(" && ",$tmp);

        }else{
            // $sql = $sql . $arg[0];
            $sql.="where". $arg[0];
        }
    }
    if(isset($arg[1])){
        $sql.="where". $arg[1];
    }
    $rows=$pdo->query($sql)->fetchColumn();

    return $rows;
}

/////////////////////////// math 
function math($table,$math,$col,...$arg){
   
    $pdo=pdo();

    $sql="select $math(`$col`) from $table ";

    if(!empty($arg)){
        if(is_array($arg[0])){
            foreach($arg[0] as $key => $value){

                $tmp[]="`$key`='$value'";
            }
            // $sql = $sql . "where". join("&&",$tmp);
            $sql .= "where". join(" && ",$tmp);

        }else{
            // $sql = $sql . $arg[0];
            $sql.="where". $arg[0];
        }
    }
    if(isset($arg[1])){
        $sql.="where" . $arg[1];
    }

    $rows=$pdo->query($sql)->fetchColumn();

    return $rows;
}

function find($table,$arg){

    $pdo = pdo();

    $sql="select * from `$table`  where ";

    if(is_array($arg)){
        foreach($arg as $key => $value){

            $tmp[]="`$key`='$value'";
        }

        $sql .= join(" && ",$tmp);
    }else{

        $sql .= " `id` = '$arg' ";
        
    }

    echo $sql;

    $row=$pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

    return $row;
}

//一次更新一筆
function update($table,$cols){
    $pdo = pdo();

    //['subject'=>'今天天氣很好吧?',
    // 'open_time'=>'2023-05-29',
    // 'close_time'=>'2023-06-05',
    //]

    foreach($cols as $key => $value){
        if($key!='id'){
            $tmp[]= "`$key`='$value'";
        }
    }

    //`subject`='今天天氣很好吧?',`open_time`='2023-05-29',`close_time`='2023-06-05'

    $sql="update `$table` set  ".join(",",$tmp)." where `id`='{$cols['id']}'";

    $result=$pdo->exec($sql);


    return $result;
}

function insert($table,$cols){
    $pdo = pdo();
    $col=array_keys($cols);

/*     $sql ="insert into $table (`";
    $sql .=join("`,`", $col);
    $sql .="`) values('";
    $sql .=join("','",$cols);
    $sql .="')"; */

    $sql="insert into $table (`" . join("`,`", $col) . "`) values('".join("','",$cols)."')";
    //echo $sql;

    $result=$pdo->exec($sql);

    return $result;
}


function del($table,$arg){
    $pdo = pdo();

    $sql="delete from `$table` where ";
    if(is_array($arg)){
        foreach($arg as $key => $value){

            $tmp[]="`$key`='$value'";
        }

        $sql .= join(" && ",$tmp);
    }else{

        $sql .= " `id` = '$arg' ";
        
    }

    echo $sql;
    return $pdo->exec($sql);
}

function save($table,$cols){

    if(isset($cols['id'])){
        update($table,$cols);
    }else{
        insert($table,$cols);
    }
}


function q($sql){
    $pdo = pdo();

    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function dd($array){
    echo"<pre>";
    print_r($array);
    echo"</pre>";
}

function to($url){
    return header("location".$url);
}

?>