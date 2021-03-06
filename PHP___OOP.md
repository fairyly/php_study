# PHP 面向对象


## 类

* php面向对象之private、protected、public三者权限控制区别

```
class Human {
    private $name = 'zhangsan';
    protected $money = 3000;
    public $age = 28;

    public function say() {
        echo '我叫',$this->name,'<br />';
        echo '我有',$this->money,'元钱<br />';
        echo '我今年',$this->age,'岁';
    }
}

class Stu extends Human {
    private $friend = '小花';

    public function talk() {
        echo '我叫',$this->name,'<br />';
        echo '我有',$this->money,'元钱<br />';
        echo '我今年',$this->age,'岁<br />';        
    }
}
$ming = new Stu();
echo $ming->age,'<br />'; // 28

echo $ming->friend; //出错：因为类外不能调用private
echo $ming->money; //出错：因为类外不能调用protected属性
$ming->talk();
/**
出错：
Notice: Undefined property: Stu::$name in 。。。
我有3000元钱
我今年28岁

分析原因: Undefined property: Stu::$name 这是说明:stu对象 没有name属性
但昨天说,私有的不是可以继承吗?
是可以继承过来,但系统有标记,标记其为父类层面的私有属性.
因此无权调用,导致此错发生.


可以分析出:
protected 可以在 子类内访问

protected能在子类访问,本类内能否访问?
答:当然可以

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
   <?
    //父类
    class father{
     public function a(){
      echo "function a";
     }
     private function b(){
      echo "function b";
     }
     protected function c(){
      echo "function c";
     }
    }
    //子类
    class child extends father{
      function d(){
        parent::a();//调用父类的a方法
      }
      function e(){
       parent::c(); //调用父类的c方法
      }
     function f(){
        parent::b(); //调用父类的b方法
      }
    }
    $father=new father();
    $father->a();
    $father->b(); //显示错误 外部无法调用私有的方法 Call to protected method father::b()
    $father->c(); //显示错误 外部无法调用受保护的方法Call to private method father::c()
    $chlid=new child();
    $chlid->d();
    $chlid->e();
    $chlid->f();//显示错误 无法调用父类private的方法 Call to private method father::b()
    ?>
```
* 文件名与类名相同
```


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

## final 最终的类和方法，不能继承，该关键字修饰的方法不能被重写

```
final class MyClass{//此类将不允许被继承  
    final function fun1(){......}//此方法将不允许被重写  
}  
```

## 静态绑定

在类的内部方法访问已经声明为const及static的属性时，需要使用self::$name的形式调用

双冒号操作符即作用域限定操作符Scope Resolution Operator,可以访问静态、const和类中重写的属性与方法

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
