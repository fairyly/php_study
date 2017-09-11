# PHP 面向对象


## 类

```
文件名与类名相同

class Test
{
  public $name;
  
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
    self::$name = "hello";
  }
}

$test = new Test('john');

class Child extends Parent
{
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
