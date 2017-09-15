# thinkphp 自学手册

* [thinkphp 自学手册地址](https://www.kancloud.cn/manual/thinkphp5/118003)
* [Composer中文文档](https://www.kancloud.cn/thinkphp/composer/35668)
* [h-ui.admin 后台模板](http://www.h-ui.net/H-ui.admin.shtml)
* [Thinkphp视频教程](https://www.kancloud.cn/tpshop/thinkphp5/220686)


## 安装部署在本地服务器

* 下载 Thinkphp 的稳定版本
  - 可以去 Thinkphp 网站下载 http://www.thinkphp.cn/down.html;
  - Composer安装 在 Windows 中，你需要下载并运行  [Composer-Setup.exe](https://getcomposer.org/Composer-Setup.exe)
    然后在命令行下面，切换到你的web根目录下面并执行下面的命令：composer create-project topthink/think tp5  --prefer-dist
  - Git安装
    ```
      git clone https://github.com/top-think/think tp5
      然后切换到tp5目录下面，再克隆核心框架仓库
      git clone https://github.com/top-think/framework thinkphp
      如果需要更新核心框架的时候，只需要切换到thinkphp核心目录下面，然后执行：
      git pull https://github.com/top-think/framework
      
      在浏览器中输入地址： http://localhost/tp5/public/
      如果浏览器输出 ThinkPHP V5,说明安装成功;  
      5.0的部署建议是public目录作为web目录访问内容，其它都是web目录之外  
    ```


## 配置 application/config.php
  
  开启调试
  
  ```
  // 应用调试模式
    'app_debug'              => true,
    // 应用Trace
    'app_trace'              => true,
  ```

## 创建目录控制器访问

* 进入 application/index 下创建目录  model,/view
  view/index 目录中创建 html 文件,index.html,head.html;
  
  ```
  //application/index/controller/Index.php 代码如下：
  
  namespace app\index\controller;

  use \think\Controller;

  class Index extends Controller
  {
    public function index()
    {
        return  $this->display('index');//也可以使用fetch();
    }
    
    public function head()
    {
        return  $this->display('head');
    }
  }
  
  index.html 的访问地址：http://localhost/thinkphp/public/index
  head.html 的访问地址： http://localhost/thinkphp/public/index/Index/head
  这个也可以理解成手册上讲到的 “分层控制器”；
  
  ```
  
* 在controller 中创建一个类 User.php,view/user 目录中创建index.html

  ```
  User.php 代码如下：
  
  namespace app\index\controller;

  use \think\Controller;

  class User extends Controller
  {
    public function index()
    {
        return  $this->fetch('index');
    }

  }
  user下index.html的访问地址 ：http://localhost/thinkphp/public/index/user/index
  
  ```