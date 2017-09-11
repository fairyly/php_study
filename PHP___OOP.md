# PHP 面向对象


## 类

```
文件名与类名相同

class Test
{
  public $name;
  static $num = 0;
  
  function __construct($name)
  {
    $this->name = $name;
  }
  
  function getName()
  {
    return $this->name;
  }
  
  function setName($name)
  {
    $this->name = $name;
  }
  
  function hello()
  {
    self::$num++;// self:在类内部调用静态成员时使用
  }
}

$test = new Test('john');

class Child extends Parent
{
  function __construct($n)
  {
    parent::__construct( "PBPHome" ); //使用parent调用了父类的构造函数
    $this->n = $n;
  }
  
  public function test()
  {
  parent::$name = 'world';
  }
  
}

```

## 抽象类

1. 抽象方法  
在类中，没有方法体的方法就是抽象方法。  
abstract 可见性 function 方法名称(参数1,.....);      // 如果没有显示地指定可见性，则默认为public  
如：  
public function hello($args);  
abstract function work();            // 修饰符abstract，也可以省略  

2. 抽象类  
abstract class 类名{  
        属性;  
        方法;  
        抽象方法;  
}  

抽象类不能实例化，只能被继承。  
抽象类不一定有抽象方法，有抽象方法的类，一定是抽象类。  
抽象方法的可见性不能是private  
抽象方法在子类中，需要重写。  

```
abstract class Parent
{
  public function test($name);
}

class Child extends Parent
{
  public function test()
  {
  }
}

```


## 接口

接口中不能声明变量；

```

interface Test
{
  public function test($name);
}

class TestOne implements Test
{
  public function test()
  {
  }
}

```

## 静态绑定

```
class A {
    public static function who() {
        echo __CLASS__;
    }
    public static function test() {
        self::who();
    }
}

class B extends A {
    public static function who() {
        echo __CLASS__;
    }
}

B::test();

```
## PHP中 self 和 parent 的区别

在子类中常用到这两个对像。他们的主要区别在于self可以调用父类中的公有或受保护的属性，但parent不可以调用

self:: 它表示当前类的静态成员(方法和属性)　与 $this　不同,$this是指当前对像 附代码：

```
/**
 * parent　只能调用父类中的公有或受保护的方法，不能调用父类中的属性
 * self 　可以调用父类中除私有类型的方法和属性外的所有数据
 */
class User{
    public $name;
    private $passwd;
    protected $email;    
    public  function __construct(){
        //print __CLASS__." ";
        $this->name= 'simple';
        $this->passwd='123456';
        $this->email = 'bjbs_270@163.com';
    }    
    public function show(){
        print "good ";
    }    
    public function inUserClassPublic() {
        print __CLASS__.'::'.__FUNCTION__." ";
    }    
    protected  function inUserClassProtected(){
        print __CLASS__.'::'.__FUNCTION__." ";
    }    
    private function inUserClassPrivate(){
        print __CLASS__.'::'.__FUNCTION__." ";
    }
}
class simpleUser extends User {    
    public function __construct(){        
        //print __CLASS__." ";
        parent::__construct();
    }
    
    public function show(){
        print $this->name."//public ";        
        print $this->passwd."//private ";
        print $this->email."//protected ";
    }
    
    public function inSimpleUserClassPublic() {
        print __CLASS__.'::'.__FUNCTION__." ";
    }
    
    protected function inSimpleUserClassProtected(){
        print __CLASS__.'::'.__FUNCTION__." ";
    }
    
    private function inSimpleUserClassPrivate() {
        print __CLASS__.'::'.__FUNCTION__." ";
    }
}
class adminUser extends simpleUser {
    protected $admin_user;
    public function __construct(){
        //print __CLASS__." ";
        parent::__construct();
    }
    
    public function inAdminUserClassPublic(){
        print __CLASS__.'::'.__FUNCTION__." ";
    }
    
    protected function inAdminUserClassProtected(){
        print __CLASS__.'::'.__FUNCTION__." ";
    }
    
    private function inAdminUserClassPrivate(){
        print __CLASS__.'::'.__FUNCTION__." ";
    }
}
class administrator extends adminUser {
    public function __construct(){        
        parent::__construct();
    }
}
/**
 * 在类的实例中 只有公有属性和方法才可以通过实例化来调用
 */
$s = new administrator();
print '-------------------';
$s->show();
```
