# thinkphp5 自学手册

```
ThinkPHP5的环境要求如下：
PHP >= 5.4.0
PDO PHP Extension
MBstring PHP Extension
CURL PHP Extension
```

* [thinkphp 自学手册地址](https://www.kancloud.cn/manual/thinkphp5/118003)
* [Composer中文文档](https://www.kancloud.cn/thinkphp/composer/35668)
* [h-ui.admin 后台模板](http://www.h-ui.net/H-ui.admin.shtml)
* [Thinkphp视频教程](https://www.kancloud.cn/tpshop/thinkphp5/220686)
* [基于thinkphp5小功能设计与实现](https://www.kancloud.cn/zhiqiang/helper/247201)
* [ThinkPHP5数据库实例详解](https://www.kancloud.cn/ldkt/tp5_db/224479)
* [ThinkPHP5模型实例详解](https://www.kancloud.cn/ldkt/tp5_model/237252)
* [ThinkPhP5.0.10-增删改查-API接口开发-源码下载-在线演示-Layer-新手入门](https://www.kancloud.cn/q113211/xinshou/383616)
* [ThinkPHP5从入门到努力之入门实践](https://www.kancloud.cn/liuzhen153/tp5-demo/259697)
* [ThinkPHP5快速入门](https://www.kancloud.cn/thinkphp/thinkphp5_quickstart/147278)
* [Thinkphp5工具箱](https://www.kancloud.cn/phper123/tools/289760)
* [挑战者笔记](https://www.kancloud.cn/weber_lzw/book/208026)

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
      
      注意: 如果本地使用的PHP版本比较低，如果是5.3,打开浏览器就会出现
      Parse error: syntax error, unexpected '[' in E:\phpStudy\WWW\thinkphp5\thinkphp\library\think\Loader.php on line 18
      
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


# 使用 include 包含文件加入公共头和公共尾

* 参考 https://www.kancloud.cn/manual/thinkphp5/125009

在 view/index 目录中新建 head.html 和 foot.html, index.html 中加入下面代码即可；

```
{include file="index/head" /}

<div>hello </div>

{include file="index/foot" /}

```

# 页面中链接的写法 

* 参考 https://www.kancloud.cn/manual/thinkphp5/118041

```
<div>hello <a href="{:Url('index/index')}">tesr</a></div>

两种用法：
<p><a href="{url::build('index/index/index');}">index</a></p>
<p><a href="{:url('index/index/add');}">add</a></p>
```

# 阻止直接打开页面访问

```
var_dump($_SERVER);
!$_SERVER['HTTP_REFERER'] or die('forbidden!'); 

if (!isset($_SERVER['HTTP_REFERER'])) {
    # code...
    die('forbidden!');
}
```

# 获取客户端IP的方法

引入 use \think\Request;

```
$request = Request::instance();
echo '访问ip地址：' . $request->ip();
```

# 通过phpexcel导入数据

我们经常会在系统中用到excel导入的功能。运营人员将需要的数据，写在excel中，直接导入系统。比他们在 后台中一个一个的添加要方便快捷。phpexcel 是php操作excel的神奇，可以进行excel的生成以及解析。这里我不讲 利用 phpexcel 生成 excel,因为这个类在生成大的 excel 时效率非常的低，还容易导致失败。所以大的数据导出，建议导出成 csv 格式。

thinkphp5 集成 phpexcel
依旧是到 packagist 的官网 https://packagist.org ，搜索 phpexcel，复制安装语句。打开 cmd ，进入项目根目录
composer require phpoffice/phpexcel


应用phpexcel导入excel
控制器方面，我们在 Tools.php 中新建 excel
namespace app\index\controller;

use \think\Controller;

class Tools extends controller
{

	// 导入excel
	public function excel()
	{
		if(request()->isPost()){
			
		}
		
		return $this->fetch();
	}
}
然后我们来新建一个页面，添加一个 上传按钮，让用户可以上传excel，新建 application\index\view\tools\excel.html

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>上传excel</title>
</head>
<body>
<form action="{:url('tools/excel')}" method="post" enctype="multipart/form-data">
	<input type="file" name="excel" />
	<input type="submit" value="提交"/>
</form>
</body>
</html>
访问 http://www.phper.com/index/tools/excel 一个最简易的 页面，不要介意啊。我们主要看功能。


下面，我们整理一个excel，将他上传，交给 excel 这个函数来处理。我在本地新建了一个 text.xlsx


这样就可以上传了，让我们来看看，如何获取这个excel中的内容。

	// 导入excel
	public function excel()
	{
		if(request()->isPost()){
			
			$excel = request()->file('excel')->getInfo();
			$objPHPExcel = \PHPExcel_IOFactory::load($excel['tmp_name']);//读取上传的文件
			$arrExcel = $objPHPExcel->getSheet(0)->toArray();//获取其中的数据
			
			print_r($arrExcel);die;
		}
		
		return $this->fetch();
	}
提交excel会得到如下的数组

## 导出Excel

```
namespace app\index\controller;

use \think\Controller;
use \think\Db;

use PHPExcel_IOFactory;
use PHPExcel;

class Tools extends controller
{

    public function index()
    {
        return $this->fetch();
    }

    public function excel()
    {
        // var_dump(dirname(__FILE__));
        // if(request()->isPost()){
            
        //     $excel = request()->file('excel')->getInfo();
        //     $objPHPExcel = \PHPExcel_IOFactory::load($excel['tmp_name']);//读取上传的文件
        //     $arrExcel = $objPHPExcel->getSheet(0)->toArray();//获取其中的数据
            
        //     print_r($arrExcel);die;
        // }

        $sql = Db::table('think_users')->select();
        
        $objPHPExcel = new PHPExcel();

        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'ID编号')
            ->setCellValue('B1', '用户名')
            ->setCellValue('C1', '密码');

        $i=2;  //定义一个i变量，目的是在循环输出数据是控制行数
        $count = count($sql);  //计算有多少条数据
        for ($i = 2; $i <= $count+1; $i++) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $sql[$i-2]['id']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $sql[$i-2]['uname']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $sql[$i-2]['upass']);


        }

        $objPHPExcel->getActiveSheet()->setTitle('user');      //设置sheet的名称
        $objPHPExcel->setActiveSheetIndex(0);                   //设置sheet的起始位置
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');   //通过PHPExcel_IOFactory的写函数将上面数据写出来
        $PHPWriter = \PHPExcel_IOFactory::createWriter( $objPHPExcel,"Excel2007");
        header('Content-Disposition: attachment;filename="用户信息.xlsx"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $PHPWriter->save("php://output"); //表示在$path路径下面生成demo.xlsx文件


        return $this->fetch();
    }
}
```


# 页面重定向

$this->redirect('http://thinkphp.cn');


# 数据库 CURD

注意： **ThinkPHP 5.0查询构造器使用 PDO参数绑定，以保护应用程序免于 SQL注入，因此传入的参数不需额外转义特殊字符。**

```
// 插入记录
Db::table('think_data')
    ->insert(['id' => 18, 'name' => 'thinkphp', 'status' => 1]);

// 更新记录
Db::table('think_data')
    ->where('id', 18)
    ->update(['name' => "hello"]);

// 查询数据
$list = Db::table('think_data')
    ->where('id', 18)
    ->select();

// 删除数据
Db::table('think_data')
    ->where('id', 18)
    ->delete();
```
注意：**由于需要用到事务的功能，请先修改数据表的类型为InnoDB，而不是MyISAM。**

```
Db::transaction(function () {
    Db::table('think_user')
        ->delete(1);
    Db::table('think_data')
        ->insert(['id' => 28, 'name' => 'thinkphp', 'status' => 1]);
});
```
