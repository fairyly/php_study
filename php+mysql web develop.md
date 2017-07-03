# php和mysql web开发第四版

## 第一篇 PHP快速入门

常量全部用大写字母；

* 1 超级全局变量
  - $GLOBALS  ------ 所有全局变量数组
  - $_SERVER  ------ 服务器环境变量数组
  - $_GET ---------- 通过get方法传递的变量数组
  - $_POST --------- 通过post方法传递的变量数组 
  - $_COOKIE ------- cookie 变量数组 
  - $_REQUEST ------ 用户所有输入的变量数组，包括$_GET,$_POSE,$_COOKIE所包含的输入内容 
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
  - is_null() : 检查变量是否是null;
  - is_scallar() : 检查变量是否是标量,即一个整数,布尔值,字符串或浮点数;
  - is_numberic() : 检查变量是否是任何类型的数字或数字字符串;
  - is_callaber() : 检查变量是否是有效的函数名称。

* 3 测试变量类型  变量状态
  - gettype($a)
  - settype($a,'double')
  - isset($a) 变量是否存在
  - unset($a) 销毁变量
