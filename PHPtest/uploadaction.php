<?php 
system('pngquant --quality=85 image.png');
$data = $_POST;

$file = $_FILES;

 echo json_encode($file);


if ($_FILES['myfile'][error]>0) {
	# code...
	echo "occur problem";
	switch($_FILES['myfile']['error']){
		case 1: echo "文件大小超出约定值";
			break;
		case 2: echo "文件超过指定最大值";
			break;
		case 3: echo "文件只被部分上传";
			break;
		case 4: echo "没有上传任何文件";
			break;
		case 6: echo "php.ini中没有指定临时目录";
			break;
		case 7: echo "文件写入磁盘失败";
			break;
	}

}

$arr = explode(".",$_FILES['myfile']['name']);
$upfile = './upload/'.time().".".$arr[count($arr)-1];

echo $_FILES['myfile']['name'];

echo json_encode($arr)."<br/>";

// $path = "/PHPtest/upload.php";
// $file = basename($path);//输出文件中文件名
// echo $file.PHP_EOL;

echo "1) ".basename("/etc/sudoers.d", ".d").PHP_EOL;

// move_uploaded_file($_FILES['myfile']['tmp_name'],$upfile);
if (is_uploaded_file($_FILES['myfile']['tmp_name'])) {
	# code...
	if (!move_uploaded_file($_FILES['myfile']['tmp_name'],$upfile)) {
		# code...
		echo "不能移动文件到指定目录";
	}else{
		echo "已经移动";
	}
}
else{
	echo $_FILES['myfile']['name'];
}



//打开浏览的目录，读取目录内文件名
$current_dir = './upload';
$dir = opendir($current_dir);
while (false !== ($file = readdir($dir))) {
	# code...
	if ($file !='.' && $file != "..") {
		# code...
		echo "$file";
	}
}
closedir($dir);






// $content  = file_get_contents($upfile);
// $content = strip_tags($content);
// file_put_contents($_FILES['myfile']['name'],$content);
// echo n12br($content);
echo "it is ok";
exit;
 ?>