# php和mysql web开发第四版

## 第一篇 PHP快速入门

常量全部用大写字母；

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
  
## 第二篇 MySQL
  - 登陆 : mysql -h 127.0.0.1 -u root -p
