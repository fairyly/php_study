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
