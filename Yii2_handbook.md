# yii2 手册

* [Yii2 用户手册中文版](https://robinfan.gitbooks.io/yiiguid2/content/start-installation.html)
* [Yii Framework 2.0 权威指南 ](http://www.yiichina.com/doc/guide/2.0)


# 下载和安装

* [yii2 github 发布版本](https://github.com/yiisoft/yii2/releases) 可下载 basic 版本
* [官网下载](http://www.yiiframework.com/download/)
* 将下载的文件解压缩到 Web 目录中。
  - 修改 config/web.php 文件，给 cookieValidationKey 配置项添加一个密钥（若你通过 Composer 安装，则此步骤会自动完成）：
  - // !!! 在下面插入一段密钥（若为空） - 以供 cookie validation 的需要
    ` 'cookieValidationKey' => '在此处输入你的密钥', `
  - 安装完成后，就可以使用浏览器通过如下 URL 访问刚安装完的 Yii 应用了：
    ```
    当安装完成之后， 或配置你的Web服务器(看下面的文章)或使用内置Web Server， 当在项目 web 目录下可以通过下面的命令:

    php yii serve
    注意: 默认情况下Https-server将监听8080。可是如果这个端口已经使用或者你想通过这个方式运行多个应用程序，你可以指定使用哪些端口。 只加上 --port 参数：
    php yii serve --port=8888
    安装完成后，就可以使用浏览器通过如下 URL 访问刚安装完的 Yii 应用了：

    http://localhost:8080/
    
    ```
