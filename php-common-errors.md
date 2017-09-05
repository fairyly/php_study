# 常见PHP Mistakes


## 语法错误

* 缺少分号
  - Parse error: syntax error, unexpected in xxx.php on line 44

* 缺少单引号或双引号
  - Parse error: syntax error, unexpected

* 缺少括号
  - Parse error: syntax error, unexpected
  
* 缺少 $ 符号
  - Parse error: syntax error, unexpected
  
## 定义错误

* 调用不存在的常量或者变量
  -  Notice: Undefined variable: 
  
## 逻辑错误

## 运行错误

* 操作只具备只读属性的文件
* 包含的文件不存在
* 数据库表连接引发错误
  - Warning: mysql_connect(): Access denied for user 'test'@'localhost' (using password: YES)
  
## 环境错误

* 操作系统

* PHP 版本

* PHP配置--php.ini文件
