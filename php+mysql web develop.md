# php和mysql web开发第四版


                  ,--.    ,--.
                 ((O ))--((O ))
               ,'_`--'____`--'_`.
              _:  ____________  :_
             | | ||::::::::::|| | |
             | | ||::::::::::|| | |
             | | ||::::::::::|| | |
             |_| |/__________\| |_|
               |________________|
            __..-'            `-..__
         .-| : .----------------. : |-.
       ,\ || | |\______________/| | || /.
      /`.\:| | ||  __  __  __  || | |;/,'\
     :`-._\;.| || '--''--''--' || |,:/_.-':
     |    :  | || .----------. || |  :    |
     |    |  | || '----SSt---' || |  |    |
     |    |  | ||   _   _   _  || |  |    |
     :,--.;  | ||  (_) (_) (_) || |  :,--.;
     (`-'|)  | ||______________|| |  (|`-')
      `--'   | |/______________\| |   `--'
             |____________________|
              `.________________,'
               (_______)(_______)
               (_______)(_______)
               (_______)(_______)
               (_______)(_______)
              |        ||        |
              '--------''--------'


## 第一篇 PHP快速入门

- PHP代码 必须 使用 `<?php ?>` 长标签 或 `<?= ?>` 短输出标签;

- 常量: 全部用大写字母,单词间用下划线分隔;
- 变量：一般小写;
- PHP所有 关键字 必须 全部小写;
- 常量 true 、false 和 null 也 必须 全部小写;
- 所有PHP文件 必须 以一个空白行作为结束;
- 纯PHP代码文件 必须 省略最后的 ?> 结束标签;

- namespace 声明后 必须 插入一个空白行。  
  所有 use 必须 在 namespace 后声明。  
  每条 use 声明语句 必须 只有一个 use 关键词。  
  use 声明语句块后 必须 要有一个空白行。
  ```
  <?php
  // PHP 5.3及以后版本的写法
  namespace Vendor\Model;

  class Foo
  {
  }
  ```

- 类的命名 必须 遵循 StudlyCaps 大写开头的驼峰命名规范;  
  每个类都独立为一个文件，且命名空间至少有一个层次：顶级的组织名称（vendor name）;  
  
  类的开始花括号 必须 独占一行，结束花括号也 必须 在类主体后独占一行;  
  方法名称 必须 符合 camelCase 式的小写开头驼峰命名规范;  
  ```
  <?php
  namespace Vendor\Package;

  use FooClass;
  use BarClass as Bar;
  use OtherVendor\OtherPackage\BazClass;

  class ClassName extends ParentClass implements \ArrayAccess, \Countable
  {
    // 这里面是常量、属性、类方法
  }
  ```
  implements 的继承列表也 可以 分成多行，这样的话，每个继承接口名称都 必须 分开独立成行，包括第一个  
  ```
  <?php
  namespace Vendor\Package;

  use FooClass;
  use BarClass as Bar;
  use OtherVendor\OtherPackage\BazClass;

  class ClassName extends ParentClass implements
    \ArrayAccess,
    \Countable,
    \Serializable
  {
    // 这里面是常量、属性、类方法
  }
  ```
  
  每个属性都 必须 添加访问修饰符;

  一定不可 使用关键字 var 声明一个属性;  
  类的属性命名 可以 遵循：  
    - 大写开头的驼峰式 ($StudlyCaps)
    - 小写开头的驼峰式 ($camelCase)
    - 下划线分隔式 ($under_score)
  方法名称后 一定不可 有空格符，其开始花括号 必须 独占一行，  
  结束花括号也 必须 在方法主体后单独成一行。参数左括号后和右括号前  
  一定不可 有空格。
  
  方法的参数：
    - 参数列表中，每个逗号后面 必须 要有一个空格，而逗号前面 一定不可 有空格。

    - 有默认值的参数，必须 放到参数列表的末尾。
  
  ```
  <?php
  namespace Vendor\Package;

  class ClassName
  {
    public function fooBarBaz($arg1, &$arg2, $arg3 = [])
    {
        // method body
    }
  }
  ```
- 需要添加 abstract 或 final 声明时，必须 写在访问修饰符前，而 static 则 必须 写在其后。
  ```
  <?php
  namespace Vendor\Package;

  abstract class ClassName
  {
    protected static $foo;

    abstract protected function zim();

    final public static function bar()
    {
        // method body
    }
  }
  ```
  
- 访问修饰符: public private protect


```
常用设置：
header('Access-Control-Allow-Origin:*');
/* 设置内部字符编码为 UTF-8 */
header('Content-Type: text/html; charset=UTF-8');
mb_internal_encoding('UTF-8'); 
mb_http_output('UTF-8'); 
mb_http_input('UTF-8'); 
mb_regex_encoding('UTF-8'); 
```

PHP_EOL : 换行;

- 错误提示  
  // 关闭错误报告
  error_reporting(0);

  // 报告 runtime 错误
  error_reporting(E_ERROR | E_WARNING | E_PARSE);

  // 报告所有错误
  error_reporting(E_ALL);

  // 等同 error_reporting(E_ALL);
  ini_set("error_reporting", E_ALL);

  // 报告 E_NOTICE 之外的所有错误
  error_reporting(E_ALL & ~E_NOTICE);

* 1 超级全局变量
  - $GLOBALS  ------ 所有全局变量数组
  - $_SERVER  ------ 服务器环境变量数组
  - $_GET ---------- 通过 get 方法传递的变量数组
  - $_POST --------- 通过 post 方法传递的变量数组 
  - $_COOKIE ------- cookie 变量数组 
  - $_REQUEST ------ 用户所有输入的变量数组，包括 $_GET,$_POSE,$_COOKIE 所包含的输入内容 
  - $_ENV ---------- 环境变量数组 
  - $_FILES -------- 与文件上传相关的变量数组 

* 2 一些特定类型的函数
  - is_array() : 检查变量是否是数组;
  - is_double(),is_float(),is_real() : 检查变量是否是浮点数;
  - is_long(),is_int(),is_integer()  : 检查变量是否是整数;
  - is_string() : 检查变量是否是字符串;
  - is_bool() : 检查变量是否是布尔值;
  - is_object() : 检查变量是否是一个对象;
  - is_resource() : 检查变量是否是一个资源;
  - is_null() : 检查变量是否是 null ;
  - is_scallar() : 检查变量是否是标量,即一个整数,布尔值,字符串或浮点数;
  - is_numberic() : 检查变量是否是任何类型的数字或数字字符串;
  - is_callaber() : 检查变量是否是有效的函数名称。

* 3 测试变量类型  变量状态
  - gettype($a) : 获取变量类型
  - settype($a,'double') : 设置变量类型
  - isset($a) 变量是否存在
  - unset($a) 销毁变量

* 4 文件

  - 打开一个文件的时候有三种选择：**只读,只写,读和写**。   
  - fopen(打开的文件名,文件模式：'w','r'等) : 将**打开文件**,如果文件不存在会创建文件;
  - fclose($file) : **关闭文件**;
  - unlink(文件名) :  **删除文件**;
  - fwrite($file即打开的文件,$outputstring即写入的内容) : **写文件**,还可以用 fputs($file即打开的文件,$outputstring即写入的内容),
    还可以使用 file_put_contents ,file_put_content($file即打开的文件,$outputstring即写入的内容);
  - feof($file即打开的文件) : 表示File End Of File,看是否读完文件, 文件指针指向结尾,返回true; 读文件时候判断书否读到文件末尾,常见: 
    while(!feof($file)){#code}
  - fgets($file即打开的文件), fgetss($file), fgetcsv($file): 每次读取一行数据;
  - readfile($file), file($file), fpassthru($file) :读取整个文件;
  - fgetc($file) : 读取一个字符;
  - fread($file) :读取任意长度;
  - file_exists($file) : 检查文件是否存在;
  - filesize($file) : 确定文件大小;
  - rewind($file) : 将文件指针复位到文件开始;
  - ftell($file) : 以字节为单位报告文件指针在文件中的位置;
  - fseek($file) : 将文件指针指向文件某个位置;
  - flock($file,LOCK_SH/EX/UN/NB) : 文件锁定;

* 5 数组



* 6 异常内置类-Exception
  - try  
    {  
        throw new Exception("Error Processing Request", 1);  
    }  
    catch(Exception $e)  
    {  
        echo $e->getCode();  
    }  

  - 内置方法
  - getCode() : 返回传递给构造函数的代码;
  - getMessage()
  - getFile()
  - getLine()
  - getTrace()
  - getTraceAsString()
  - _toString()

* 函数 

```
class PersonFace
{
    public $name;
    public static function getName()
    {
        return $this->name;
        if ($i>1) {
            # code...
            for ($i=0; $i < 10; $i++) { 
                # code...
            }
        }
    }
    final public function setName($name)
    {
        $this->name = $name;
        echo $name."<br/>";
    }
}

class Men extends PersonFace
{
    public $tryCathl;
    public function __construct()
    {
        parent::setName("build");
    }
}

$b = new Men();
$b->setName("john");
```
  
## 第二篇 MySQL

  - 命令行登陆 : mysql -h 127.0.0.1 -u root -p
  - 使用数据库 : use databasename;
  - 
  
  - ** 注意：进入MySQL中，每个命令执行都是以 ** `;` 结尾,不然不会执行;
  
  - create database web : 创建数据库命令
  - drop database web : 删除数据库;


  - 用户和权限 : grant , revoke
  - 创建数据表 : create table tablename(id int not null auto_increment primary key,name char(50) not null);
  - 删除数据表 : drop table tablename;
  - 修改数据表字段 : alter table tablename modify name char(70) not nulll;
  - 增加数据表字段 : alter table tablename add distance float(6,2) not null after price;//在price字段后增加distance字段
  - 删除一列，即删除一个字段 : alter table tablename drop distance;


  - 查看数据库列表 ： show databases;
  - 查看所有数据表 : show tables;
  - 查看特定表详细信息 : describe books;
  - 创建索引 : create index indexname on tablename;
  - 插入数据 : insert into tablename values ('');
  - 自增id数据插入 : $query = "insert into customers values (NULL,'".$name."','".$address."','".$city."')";
  - 更新数据 : update tabalename set bookprice = bookprice+1.5 [where bookid=115];
  - 删除数据 : delete from tablename where bookid=12;
  
  ```
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
  $db->close();//关闭连接
  
  //PDO方式
  try{
    $host = 'localhost';
    $user ='root';
    $pass = '';
    $dbname = 'book_sc';
    $dns = "mysql:host=$host;dbname=$dbname";
    
    @ $conn = new PDO($dns,$user,$pass);
    
    $obj ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//设置以异常的形式报错
    $obj ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE , PDO::FETCH_ASSOC );//设置fetch时返回数据形式为数组
    
    $query = "insert into customers values (NULL,'".$name."','".$address."','".$city."','11','ads','123')"; //插入id自增数据
    $ps = $conn->prepare($query);
    $res = $ps->execute(); //正式执行。
    
  } catch(Exception $e){
    exit($e->getMessage());
  }
  
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // 设置 PDO 错误模式为异常
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    // 预处理 SQL 并绑定参数
    $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) 
    VALUES (:firstname, :lastname, :email)");
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);
 
    // 插入行
    $firstname = "John";
    $lastname = "Doe";
    $email = "john@example.com";
    $stmt->execute();
 
    // 插入其他行
    $firstname = "Mary";
    $lastname = "Moe";
    $email = "mary@example.com";
    $stmt->execute();
 
    // 插入其他行
    $firstname = "Julie";
    $lastname = "Dooley";
    $email = "julie@example.com";
    $stmt->execute();
 
    echo "新记录插入成功";
  }
  catch(PDOException $e)
  {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;
  ```
  
* 若显示中文或可以在数据库中插入中文数据，需设置

  ```
  header("Content-type: text/html; charset=utf-8");//设置编码，防止乱码
  mb_internal_encoding('UTF-8'); 
  mb_http_output('UTF-8'); 
  mb_http_input('UTF-8'); 
  mb_regex_encoding('UTF-8'); 
  
  mysqli_set_charset($conn, "utf8");
  ```

* 使用ajax发送请求，PHP接收数据并返回

```
    $data = $_POST;
    echo json_encode($data);
```

* 解析 url 和 email MX记录

  - parse_url — 解析 URL，返回其组成部分
  - gethostbyname($host) :获得该url主机的IP地址，如果存在返回IP，不存在返回false;
  
```
    $url = "http://www.baidu.com";
    $u = parse_url($url);
    $host = $u['host'];
    $ip = gethostbyname($host);
```

```
$email = "yueheqing@tusdk.com";
$email = explode('@', $email);
var_dump($email);

$emailhost = $email[1];

dns_get_mx($emailhost,$mxhostsarr);
foreach ($mxhostsarr as $key => $value) {
	echo $key.'/'.$value;
	# code...
}
```
* 从FTP服务器下载最新版本文件脚本

  - (1).连接远程FTP服务器;
  
    $conn = ftp_connect($host);
    
  - (2).登录FTP服务器;
  
    $result = @ftp_login($host,$user,$pass);
    
  - (3).检查远程文件是否更新;

    if(file_exists($loclfile)){//确认是否存在本地文件副本,    
        $localtime = filemtime($localfile) //获取文件最后修改时间    
    }    
    //获取远程文件修改时间    
    $remotefiletime = ftp_mdtm($conn,$remotefile);    
    然后比较$localtime 和 $remotetime;  

  - (4).如果更新过，下载文件;

    $fp = fopen($localfile,'w');//打开本地文件  
    ftp_fget($conn,$fp,$re,otefile,FTP_BINARY);//下载文件存储本地  
    $fclose($fp);   
    
    上传文件： ftp_fput(),ftp_put();  
    $file = 'somefile.txt';  
    $remote_file = 'readme.txt';  

    // set up basic connection  
    $conn_id = ftp_connect($ftp_server);  

    // login with username and password  
    $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);  

    // upload a file
    if (ftp_put($conn_id, $remote_file, $file, FTP_ASCII)) {  
    echo "successfully uploaded $file\n";  
    } else {  
    echo "There was a problem while uploading $file\n";  
    }  

    // close the connection  
    ftp_close($conn_id);  

  - (5).关闭FTP连接;
  
    ftp_quit($conn);
    
* 日期和时间
  - time():时间戳;
  - date("Y-m-d H:i:s",time()): 当前日期和时间;
  - mktime(): 将日期和时间转换成UNIX时间戳;
  - getdate():返回日期时间的数组;
  - checkdate():检查日期的有效性;
  - strftime('%c'): 格式化时间戳;
  - microtime(): 使用微妙;
  - date_default_timezone_set("Asia/Shanghai"): 设置时区;


* 创建图像
  - 创建画布 ：$img = imagecreatetruecolor($width, $height);
  - 选择颜色 ：$color = imagecolorallocate($img,107,107,107);
  - 填充背景 ： imagefill($img,0,0,$green);
  - 画线     ：imageline($img,0,0,$w, $h,$color);
  - 画文字   ：imagestring($img,14,50,150,'dalee',$red);
  - 画中文   ：$text = "回忆经典"; $font = 'Semibold.ttf';imagettftext($img, 20, 0, 12, 21, $red, $font, $text);

  - 输出：header('Content-type:image/png');
          imagepng($img);

  - 销毁： imagedestroy($img);
  
  - //加入噪点干扰
  ```
       for($i=0;$i<100;$i++) {
         imagesetpixel($img, rand(0, 100) , rand(0, 100) , $black); 
         imagesetpixel($img, rand(0, 100) , rand(0, 100) , $green);
         imagesetpixel($img, rand(0, 100) , rand(0, 100) , $red); 
       }
  ```
  - //加入干扰线
  ```
    for($j=0;$j<5;$j++){
        imageline($img, rand(0, 100) , rand(0, 100) , rand(0, 10) , rand(0, 100) , $black); 
        imageline($img, rand(0, 100) , rand(0, 100) , rand(0, 10) , rand(0, 100) , $green);
        imageline($img, rand(0, 100) , rand(0, 100) , rand(0, 10) , rand(0, 100) , $red);
    }
  ```
  - 从已知图片绘图
  
  ```
  $w = 200;
  $h = 200;
  $imgname = './images/1.jpg';
  header('Content-type:image/png');

  $img = imagecreatefromjpeg($imgname);

  imagepng($img,null,0);

  imagedestroy($img);
  ```

## eval(),exit() or die();

* eval("echo 'hello';"); 计算出php代码字符串的值;
* exit; 终止执行; 或者---exit("提示信息");
* die; 终止执行,  或者---die("提示信息");

## 两种方法清空memcache缓存

```
默认memcache会监听11221端口，如果想清空服务器上memecache的缓存，大家一般使用的是：
telnet localhost 11211
flush_all

同样也可以使用：
echo "flush_all" | nc localhost 11211

使用flush_all 后并不是删除memcache上的key，而是置为过期
```


