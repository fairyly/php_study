<?php
    echo "换行'.'word! \n";
	echo 'test!'.'word';

	echo 25+6;
	echo ($_POST['user']);
	echo "<br/>";
	echo ($_POST['pass']);
	echo "<br/>";
	
	$users = array(
		"name"=>$_POST['user'],
		"pass"=>$_POST['pass']
	);
	foreach ($users as $key => $value) {
		echo $key.':'.$value;
		echo "<br/>";
	}

	header("Content-Type:text/html;charset=utf-8");      //设置头部信息
  //isset()检测变量是否设置
  if(isset($_REQUEST['authcode'])){
    session_start();
    //strtolower()小写函数
    if(strtolower($_REQUEST['authcode'])== $_SESSION['authcode']){
      //跳转页面
      echo "<script language=\"javascript\">";
      echo "document.location=\"./test.php\"";
      echo "</script>";
    }else{
      //提示以及跳转页面
      echo "<script language=\"javascript\">";
      echo "alert('验证码输入错误!');";
      echo "document.location=\"./test.html\"";
      echo "</script>";
    }
    exit();
  }
?>