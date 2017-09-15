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

## 配置服务器
 
推荐使用的 Apache 配置

在 Apache 的 httpd.conf 文件或在一个虚拟主机配置文件中使用如下配置。注意，你应该将 path/to/basic/web 替换为实际的 basic/web 目录。

```
# 设置文档根目录为 “basic/web”  
DocumentRoot "path/to/basic/web"

<Directory "path/to/basic/web">
    # 开启 mod_rewrite 用于美化 URL 功能的支持（译注：对应 pretty URL 选项）
    RewriteEngine on
    # 如果请求的是真实存在的文件或目录，直接访问
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    # 如果请求的不是真实文件或目录，分发请求至 index.php
    RewriteRule . index.php

    # ...其它设置...
</Directory>
```

推荐使用的 Nginx 配置

为了使用 Nginx，你应该已经将 PHP 安装为 [FPM SAPI](http://php.net/install.fpm) 了。使用如下 Nginx 配置，将 path/to/basic/web 替换为实际的 basic/web 目录，mysite.local 替换为实际的主机名以提供服务。

```
server {
    charset utf-8;
    client_max_body_size 128M;

    listen 80; ## 监听 ipv4 上的 80 端口
    #listen [::]:80 default_server ipv6only=on; ## 监听 ipv6 上的 80 端口

    server_name mysite.local;
    root        /path/to/basic/web;
    index       index.php;

    access_log  /path/to/basic/log/access.log main;
    error_log   /path/to/basic/log/error.log;

    location / {
        # 如果找不到真实存在的文件，把请求分发至 index.php
        try_files $uri $uri/ /index.php?$args;
    }

    # 若取消下面这段的注释，可避免 Yii 接管不存在文件的处理过程（404）
    #location ~ \.(js|css|png|jpg|gif|swf|ico|pdf|mov|fla|zip|rar)$ {
    #    try_files $uri =404;
    #}
    #error_page 404 /404.html;

    location ~ \.php$ {
        include fastcgi.conf;
        fastcgi_pass   127.0.0.1:9000;
        #fastcgi_pass unix:/var/run/php5-fpm.sock;
        try_files $uri =404;
    }

    location ~ /\.(ht|svn|git) {
        deny all;
    }
}
```

使用该配置时，你还应该在 php.ini 文件中设置 cgi.fix_pathinfo=0 ，能避免掉很多不必要的 stat() 系统调用。  
还要注意当运行一个 HTTPS 服务器时，需要添加 fastcgi_param HTTPS on; 一行，这样 Yii 才能正确地判断连接是否安全。  
