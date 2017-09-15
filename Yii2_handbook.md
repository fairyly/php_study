# yii2 手册

* [Yii2 用户手册中文版](https://robinfan.gitbooks.io/yiiguid2/content/start-installation.html)
* [Yii Framework 2.0 权威指南 ](http://www.yiichina.com/doc/guide/2.0)


# 下载和安装

* [yii2 github 发布版本](https://github.com/yiisoft/yii2/releases) 要下载 basic 版本，如果完整和高级版中运行：php yii serve --port=8888,会提示   Could not open input file: yii;

* [官网下载](http://www.yiiframework.com/download/)

* 将下载的文件解压缩到 Web 目录中。
  - 修改 config/web.php 文件，给 cookieValidationKey 配置项添加一个密钥（若你通过 Composer 安装，则此步骤会自动完成）：
  - // !!! 在下面插入一段密钥（若为空） - 以供 cookie validation 的需要
    ` 'cookieValidationKey' => '在此处输入你的密钥', `
  - 安装完成后，就可以使用浏览器通过如下 URL 访问刚安装完的 Yii 应用了：http://localhost/basic/web/index.php
    ```
    当安装完成之后， 或配置你的Web服务器(看下面的文章)或使用内置Web Server， 当在项目 web 目录下可以通过下面的命令:

    php yii serve
    
    注意: 默认情况下Https-server将监听8080。可是如果这个端口已经使用或者你想通过这个方式运行多个应用程序，你可以指定使用哪些端口。
    只加上 --port 参数：
    
    php yii serve --port=8888
    
    安装完成后，就可以使用浏览器通过如下 URL 访问刚安装完的 Yii 应用了：

    http://localhost:8080/
    
    ```
  - 你应该可以在浏览器中看到如上所示的 “Congratulations!” 页面。如果没有，请通过以下任意一种方式，检查当前 PHP 环境是否满足 Yii 最基本需求：
    通过浏览器访问 URL http://localhost/basic/requirements.php
    执行如下命令：
    cd basic
    php requirements.php
    你需要配置好 PHP 安装环境，使其符合 Yii 的最小需求。主要是需要 PHP 5.4 以上版本。如果应用需要用到数据库，那还要安装 PDO PHP 扩展 和相应的数据     库驱动    （例如访问 MySQL 数据库所需的 pdo_mysql）。
