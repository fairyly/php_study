# Window 下安装 redis

下载地址：https://github.com/dmajkic/redis/downloads

* [redis 扩展下载地址](http://windows.php.net/downloads/pecl/releases/redis/) 
* [Redis 中文文档](https://wizardforcel.gitbooks.io/redis-doc/content/)

**注意：安装扩展要查看 PHPinfo 中的{Compiler，PHP Extension 版本，PHP Extension Build 版本等}**

下载到的 Redis 支持 32bit 和 64bit。根据自己实际情况选择，将 64bit的内容cp到自定义盘符安装目录取名redis。 如 C:\reids

打开一个 cmd 窗口 使用cd命令切换目录到 C:\redis 运行 redis-server.exe redis.conf 。

如果想方便的话，可以把redis的路径加到系统的环境变量里，这样就省得再输路径了，后面的那个redis.conf可以省略，如果省略，会启用默认的。输入之后，会显示如下界面：

Redis 安装
这时候另启一个cmd窗口，原来的不要关闭，不然就无法访问服务端了。

切换到redis目录下运行 redis-cli.exe -h 127.0.0.1 -p 6379 。

设置键值对 set myKey abc

取出键值对 get myKey

Redis 安装


## 扩展安装

* 下载 redis 和igbinary 扩展 地址：http://windows.php.net/downloads/pecl/releases/
* 将 php_redis.dll 和 php_igbinary.dll 拷贝至 php 的 ext 目录下
* 修改php.ini，在该文件中加入： 
  ```
  ; php_redis

  extension=php_igbinary.dll

  extension=php_redis.dll
  ```
* 打开 PHPinfo 查看安装是否完成；

* 开启自启动 redis 方法

```
新建 start.bat，写入内容
D:
D:\dev\redis-2.4.5
redis-server.exe redis.conf

新建 redis.vbs，写入内容

createobject("wscript.shell").run "D:\dev\redis-2.4.5\start.bat",0
之后，把 start.bat 放在redis-2.4.5目录下，把redis.vbs放在启动目录下

```

* 清空 redis 缓存

```
redis-cli flushall
```
