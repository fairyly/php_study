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

```
//分页实现
<?php 

header("Content-type: text/html; charset=UTF-8");
// error_reporting(0);// 关闭错误报告 

$pagesize = 2;//设置每页显示2个记录
$page; //当前页数

if(@isset($_GET[page])){
    $page = (int)$_GET['page']; //获取页数
}else {
    $page = 1;
}

include('./connect.php');//引入数据库连接
$conn = new PDO($dns,$user,$pass);
$conn->query("set names utf8");//设置编码 
$conn->exec("set names utf8");

$conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//设置以异常的形式报错
$conn ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE , PDO::FETCH_ASSOC );//设置fetch时返回数据形式为数组
$sql = "select * from books";

$sel = $conn->prepare($sql);
$rs = $sel->execute();

$total = $sel->rowCount($sel,0,"total");//查询总数
$pagecount = (int)ceil($total/$pagesize);//计算总页数


// echo $total.'/'.$pagecount;exit;
$from = ($page-1)*$pagesize; // 分页计算，从第几个开始

$pagesql = "select * from books limit $from,$pagesize";


?>


//分页实现显示页面

<?php 

include_once('header.php');
/*
*
header("Content-type: text/html; charset=UTF-8");
*
*/
if (isset($_SESSION['uname'])) {
    echo "<script language=\"javascript\">";
    echo "alert('请登录');";
    echo "document.location=\"./login.php\"";
    echo "</script>";
}
include_once('./action/booklist.php');

?>

<div class="booklist">
     <a href="./addbook.php">添加图书</a>
     <div class="list">
         <table>
             
            <?php
                
                $sels = $conn->prepare($pagesql);
                $rss = $sels->execute();
           
                // var_dump($sels->fetchAll(PDO::FETCH_ASSOC));//exit;
                $sels = $sels->fetchAll(PDO::FETCH_ASSOC);
                foreach ($sels as $key => $value) {
                    echo "<tr>";
                    echo "<td>".$value['id']."</td>";
                    echo "<td>".$value['isbn']."</td>";
                    echo "<td>".$value['author']."</td>";
                    echo "<td>".$value['title']."</td>";
                    echo "<td>".$value['catid']."</td>";
                    echo "<td>".$value['price']."</td>";
                    echo "<td>".$value['description']."</td>";
                    echo "<td><a href='modify.php?id=".$value['id']."'>修改</a></td>";
                    echo "<td><a href='del.php?id=".$value['id']."'>删除</a></td>";
                    echo "</tr>";
                }
            ?>
            <td width="40px"><a href="book.php?page=1">首页</a></td>        
              <td width="45px"><a href="book.php?page=<?php 
                if ($page <= 1) {
                    echo 1;
                }else {
                    echo intval($page) - 1;
                }

              ?>">上一页</a></td>
              
              <td width="45px"><a href="book.php?page=<?php 
              if($page == $pagecount){
                  echo $pagecount;
              }else{
                  echo $page+1;
              }
              ?>">下一页</a></td>
              <td width="40px"><a href="book.php?page=<?php echo $pagecount?>">尾页</a></td>
         </table>
     </div>
</div>

<?php 

include_once('footer.php');

?>

```
