# php分页原理

1、首先了解SQL语句中的limit用法
```
SELECT * FROM table …… limit   开始位置 ， 操作条数    （其中开始位置是从0开始的）
``` 

例子：

取前20条记录：SELECT * FROM table …… limit  0 ， 20

从第11条开始取20条记录：SELECT * FROM table …… limit   10 ， 20
 
LIMIT n 等价于 LIMIT 0,n

如select * from table LIMIT 5; //返回前5行,和 select * from table LIMIT 0，5一样

2、分页原理

 所谓分页显示，也就是讲数据库中的结果集，一段一段显示出来

怎么分段，当前在第几段 （每页有几条，当前再第几页）

前10条记录：select * from table limit 0,10

第11至20条记录：select * from table limit 10,10

第21至30条记录：select * from table limit 20,10
 
分页公式：

（当前页数 - 1 ）X 每页条数 ， 每页条数

Select * from table limit ($Page- 1) * $PageSize, $PageSize
 
 
3、$_SERVER["REQUEST_URI"]函数

预定义服务器变量的一种，所有$_SERVER开头的都叫做预定于服务器变量。

REQUEST_URI的作用是取得当前URI，也就除域名外后面的完整的地址路径。

例子：

当前页为：http://www.test.com/home.php?id=23&cid=22

echo $_SERVER["REQUEST_URI"]

结果为：/home.php?id=23&cid=22

 

4、parse_url()解析URL函数

 parse_url() 是讲URL解析成有固定键值的数组的函数
 
例子

$ua=parse_url("http://username:password@hostname/path?arg=value#anchor");

print_r($ua);

结果：
```
Array
(
    [scheme] => http                ；协议
    [host] => hostname              ；主机域名
   [user] => username             ；用户
    [pass] => password              ；密码
    [path] => /path                 ；路径
    [query] => arg=value            ；取参数
   [fragment] => anchor           ；
)
```

5、代码实例

 这个一个留言的分页，分为3个部分，一个是数据库设计，一个是连接页面，一个是显示页面。
 
（1）设计数据库

 设计数据库名为bbs，有一个数据表为message，里面包含title，lastdate，user，content等字段，分别表示留言标题，留言日前，留言人，留言的内容
 
（2）连接页面
```
<?php
$conn = @ mysql_connect("localhost", "root", "123456") or die("数据库链接错误");
mysql_select_db("bbs", $conn);
mysql_query("set names 'GBK'"); //使用GBK中文编码;
//将空格，换行转换为HTML可解析
function htmtocode($content) {
 $content = str_replace("\n", "<br>", str_replace(" ", "&nbsp;", $content)); //两个str_replace嵌套
 return $content;
}
//$content=str_replace("'","‘",$content);
 //htmlspecialchars();
 
?>
```

（3）显示页面

```
<?php
 include("conn.php");
$pagesize=2;       //设置每页显示2个记录
$url=$_SERVER["REQUEST_URI"];  
$url=parse_url($url);
$url=$url[path];

$numq=mysql_query("SELECT * FROM `message`");
$num = mysql_num_rows($numq);
if($_GET[page]){
$pageval=$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
if($num > $pagesize){
 if($pageval<=1)$pageval=1;
 echo "共 $num 条".
 " <a href=$url?page=".($pageval-1).">上一页</a> <a href=$url?page=".($pageval+1).">下一页</a>";
}
$SQL="SELECT * FROM `message` limit $page $pagesize ";
    $query=mysql_query($SQL);
 
  while($row=mysql_fetch_array($query)){
?>
<table width=500 border="0" cellpadding="5" cellspacing="1" bgcolor="#add3ef">
  <tr bgcolor="#eff3ff">
  <td>标题：<?php echo $row[title]?></td> <td>时间：<?php echo $row[lastdate]?></td>
  </tr>
  <tr bgcolor="#eff3ff">
  <td> 用户：<?php echo $row[user]?></td><td></td>
  </tr>
  <tr>
  <td>内容：<?php echo htmtocode($row[content]);?></td>
  </tr>
  <br>
</table>
<?php
  }
?>
```
（4）最后显示
