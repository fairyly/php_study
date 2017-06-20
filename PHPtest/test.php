<?php
    echo "换行'.'word! \n";
	echo 'test!'.'word';

	echo 25+6;
	echo ($_POST['user']);
	echo "<br/>";
	echo ($_POST['pass']);
	echo "<br/>";
	echo $_REQUEST['user'];
	echo $_REQUEST['pass'];
	
	$users = array(
		"name"=>$_POST['user'],
		"pass"=>$_POST['pass']
	);
	foreach ($users as $key => $value) {
		echo $key.':'.$value;
		echo "<br/>";
	}

	$expire=time()+60*60*24*30;
    setcookie("user", "runoob", $expire);

	header("Content-Type:text/html;charset=utf-8");      //设置头部信息
	  //isset()检测变量是否设置
	if(isset($_REQUEST['authcode'])){
	    session_start();
	    //strtolower()小写函数
	    if(strtolower($_REQUEST['authcode'])== $_SESSION['authcode']){
	      //跳转页面
	      // echo "<script language=\"javascript\">";
	      // echo "document.location=\"./test.php\"";
	      // echo "</script>";
	    }else{
	      //提示以及跳转页面
	      echo "<script language=\"javascript\">";
	      echo "alert('验证码输入错误!');";
	      echo "document.location=\"./test.html\"";
	      echo "</script>";
	    }
	}

	 // 允许上传的图片后缀
	$allowedExts = array("gif", "jpeg", "jpg", "png");
	$temp = explode(".", $_FILES["file"]["name"]);
	echo $_FILES["file"]["size"];
	$extension = end($temp);     // 获取文件后缀名
	if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/jpg")
	|| ($_FILES["file"]["type"] == "image/pjpeg")
	|| ($_FILES["file"]["type"] == "image/x-png")
	|| ($_FILES["file"]["type"] == "image/png"))
	&& ($_FILES["file"]["size"] < 204800)   // 小于 200 kb
	&& in_array($extension, $allowedExts))
	{
		if ($_FILES["file"]["error"] > 0)
		{
			echo "错误：: " . $_FILES["file"]["error"] . "<br>";
		}
		else
		{
			echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
			echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
			echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
			echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";
			
			// 判断当期目录下的 upload 目录是否存在该文件
			// 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
			if (file_exists("upload/" . $_FILES["file"]["name"]))
			{
				echo $_FILES["file"]["name"] . " 文件已经存在。 ";
			}
			else
			{
				// 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
				move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . time().rand(0,100).".jpg");
				// echo "文件存储在: " . "upload/" . $_FILES["file"]["name"];
				echo "文件存储在: " . "upload/" . time().rand(0,100).".jpg";
			}
		}
	}
	else
	{
		echo "非法的文件格式";
	}
?>