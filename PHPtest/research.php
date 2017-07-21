<?php 

//获取接受数据
$type = $_POST['searchtype'];
$item = trim($_POST['searchitem']);

//非空验证
if (!$type || !$item) {
    # code...
    echo "请填入数据"."<br/>";
}

//
if (!get_magic_quotes_gpc()) {
    # code...
    $type = addslashes($type);
    $item = addslashes($item);
}

// 链接数据库
@ $db = new mysqli('localhost','root','','webstudy');
/*try
{
   @ $db = new PDO("mysql:host='localhost';dbname='webstudy'", 'root', ''); 
}
catch(Exception $e)
{
    $e->getMessage();
}*/

if (mysqli_connect_errno()) {
    # code...
    echo "can't connect db"."<br/>";
}
$query = "select * from books where ".$type. " like '%".$item."%'";
$res = $db->query($query );

$rows = $res->num_rows;
echo $rows."<br/>";
//输出每行数据
for ($i=0; $i < $rows; $i++) { 
    # code...
    $rowdata = $res->fetch_assoc();
    echo htmlspecialchars(stripcslashes($rowdata['title']))."<br/>";
    echo stripcslashes($rowdata['author'])."<br/>";
    echo stripcslashes($rowdata['isbn'])."<br/>";

}
$res->free();//释放结果集
$db->close();

// $db = null;
// echo json_encode(array('error'=>'0','data'=>array('date'=>$res)));
?>