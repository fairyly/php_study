<?php 

header("Content-type: text/html; charset=UTF-8");
include('connect.php');//引入
/*$isbn = trim($_POST['isbn']);
$author = trim($_POST['author']);
$title = trim($_POST['title']);
$price = trim($_POST['price']);

if (!$isbn || !$author || !$title || !$price) {
	# code...
	echo "不能为空";
}

if (!get_magic_quotes_gpc()) {
	# code...
	$isbn = addslashes($_POST['isbn']);
	$author = addslashes($_POST['author']);
	$title = addslashes($_POST['title']);
	$price = doubleval($_POST['price']);
}*/

// $data = $_POST;
// echo json_encode($data);


$name = trim($_POST['name']);
$address = trim($_POST['address']);
$city = trim($_POST['city']);

if (!$name || !$address || !$city) {
	# code...
	echo "不能为空";
	exit;
}

if (!get_magic_quotes_gpc()) {
	# code...
	$name = addslashes($_POST['name']);
	$address = addslashes($_POST['address']);
	$city = addslashes($_POST['city']);
}


@ $conn = new mysqli($host,$user,$pass,$dbname);
if (mysqli_connect_errno()) {
	# code...
	echo "mysql can't connect!!!";
	exit;
}

mysqli_set_charset($conn, "utf8");

// $query = "insert into books values ('".$isbn."','".$author."','".$title."','".$price."')";
// $query = "update books set author='".$author."',title='".$title."',price='".$price."' where isbn='".$isbn."'";


$query = "insert into customers values (NULL,'".$name."','".$address."','".$city."')"; //插入id自增数据


$res = $conn->query($query);
// printf("Last inserted record has id %d\n", mysql_insert_id());
var_dump($res);
if ($res) {
	# code...
	echo date('Y-m-d H:i:s')."<br/>";
	echo $conn->affected_rows."本书已经加入";
	echo json_encode($_POST);

}else{
	echo "an error occurred";
}
$conn->close();


// var_dump($_SERVER);


echo "<br/>";



//授权
  /*  function authenticate() {
        header('WWW-Authenticate: Basic realm="Test Authentication System"');
        header('HTTP/1.0 401 Unauthorized');
        echo "You must enter a valid login ID and password to access this resource\n";
        exit;
    }

    if (!isset($_SERVER['PHP_AUTH_USER']) ||
        ($_POST['SeenBefore'] == 1 && $_POST['OldAuth'] == $_SERVER['PHP_AUTH_USER'])) {
        authenticate();
    }
    else {
        echo "<p>Welcome: {$_SERVER['PHP_AUTH_USER']}<br />";
        echo "Old: {$_REQUEST['OldAuth']}";
        echo "<form action='{$_SERVER['PHP_SELF']}' METHOD='post'>\n";
        echo "<input type='hidden' name='SeenBefore' value='1' />\n";
        echo "<input type='hidden' name='OldAuth' value='{$_SERVER['PHP_AUTH_USER']}' />\n";
        echo "<input type='submit' value='Re Authenticate' />\n";
        echo "</form></p>\n";
    }*/
?>