<?php

header("Content-type: text/html; charset=utf-8");//设置编码，防止乱码
mb_internal_encoding('UTF-8'); 
mb_http_output('UTF-8'); 
mb_http_input('UTF-8'); 
mb_regex_encoding('UTF-8'); 

// 使用打印
echo "test\078 \0x67";

echo "<br/>";
echo <<<GOD
jjjjjjjj\n.hhhhhh
jjjjjkkkk.lll
GOD;
echo "<br/>";

var_dump("test");
echo "<br/>";

$str = "test string";
print_r($str[3]);
print_r($str[5]);
echo "<br/>";

echo $str[5];
echo "<br/>";

echo "strpos()使用:查找子字符串:".strpos("hello world","w");
echo "<br/>";

echo "substr()使用:提取字符串的一部分,3是开始的索引:".substr("hello world! 的", 3);
echo "<br/>";

echo "substr()使用:提取字符串的一部分,3是开始的索引,5是截取长度:".substr("hello world! haohaohao", 3,5);
echo "<br/>";

echo "substr()使用:提取字符串的一部分,-1是反向开始的索引:".substr("hello world! gho", -1);
echo "<br/>";

echo "mb_substr()使用:(注意设置mb_internal_encoding)提取带有中文字符串的一部分,3是开始的索引:".mb_substr("你还事假急急急的", 3);
echo "<br/>";

echo "substr_replace(string, replacement, start)使用:替换子字符串,3是开始的索引,5是长度:".substr_replace("helloworld!","wr", 3,5);
echo "<br/>";

echo "substr_count(haystack, needle)使用:子字符串出现的次数:".substr_count("hello world!","o");
echo "<br/>";

echo "substr_compare(main_str, str, offset)使用:从指定的开始位置比较两个字符串,从偏移位置 offset 开始比较 main_str 与 str，比较长度为 length 个字符。6是开始的索引:".substr_compare("hello world!","world",6);
echo <<<T
返回值 
如果 main_str 从偏移位置 offset 起的子字符串小于 str，则返回小于 0 的数；如果大于 str，则返回大于 0 的数；如果二者相等，则返回 0。如果 offset 大于等于 main_str 的长度或 length 被设置为小于 1 的值（ PHP 5.6 之前的版本），substr_compare() 将打印出一条警告信息并且返回 FALSE。
T;
echo "<br/>";
echo substr_compare("abcde", "abc", 2, 1); // warning
echo substr_compare("abcde", "bcG", 1, 4);


echo "strstr — 查找字符串的首次出现:".strstr("hello world","l");
echo "<br/>";

echo "strrev(string):反转".strrev("helloworld")."<br/>";

$s = "this is test";
$w = explode(' ', $s);//返回由字符串组成的数组
$re = array_reverse($w);
echo implode(' ', $re) ;//将一个一维数组的值转化为字符串
echo "<br/>";

//制表符与空格符置换，也可以使用pc_tab_expand

$r = mysql_query("select mess from user where id=9");
$ob = mysql_fetch_object($r);
$tabed = str_replace(' ', '\t', $ob->mess);

echo "<br/>";

echo "控制大小写：".ucfirst("hello world")."<br/>";
echo "控制大小写：".ucwords("hello world")."<br/>";
echo "控制大小写：".strtoupper("hello world")."<br/>";
echo "控制大小写：".strtolower("Hello World")."<br/>";

echo "删除空白字符：".trim(" hello world ")."<br/>";
echo "删除空白字符：".ltrim(" hello world ")."<br/>";
echo "删除空白字符：".rtrim(" hello world ")."<br/>";

$s = array(
	array('test','test4'),
	array('test','test5'),
	array('test','test6'),
	);
$fh = fopen('s.cvs', 'w');
foreach ($s as $k) {
	if (fputcsv($fh, $k) === false) {
		die("cant write");
	}
}
fclose($fh);
echo "逗号分隔符.fputcsv().："."<br/>";

$s = array(
	array('test','test4'),
	array('test','test5'),
	array('test','test6'),
	);
ob_start();
$fh = fopen('php://output', 'w');
foreach ($s as $k) {
	if (fputcsv($fh, $k) === false) {
		die("cant write");
	}
}
fclose($fh);
$output = ob_get_contents();
ob_get_clean();
echo "逗号分隔符："."<br/>";

$st = "
helloworld,helloworld,
helloworld
";
echo "换行：<pre>".wordwrap($st)."</pre>.<br/>";


echo "存储二进制：".pack("ss",1657,567,888)."<br/>";



	$a1 = mktime(17,32,56,5,10,1987);
	$b1 = mktime(18,33,56,6,10,1989);
	
	$dis_second = $b1-$a1;
	// echo $dis_second;
	$dis_day = floor($dis_second/3600/24);
	$dis_hour = floor($dis_second/3600);
	$dis_minite = floor($dis_second/60);
	// echo $dis_day."-".$dis_hour."-".$dis_minite;
	echo $dis_day."-".$dis_hour."-".$dis_minite;


?>