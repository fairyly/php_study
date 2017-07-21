<?php
    header('Access-Control-Allow-Origin:*');
    /* 设置内部字符编码为 UTF-8 */
    header('Content-Type: text/html; charset=UTF-8');
    mb_internal_encoding('UTF-8'); 
    mb_http_output('UTF-8'); 
    mb_http_input('UTF-8'); 
    mb_regex_encoding('UTF-8'); 
   /* ignore_user_abort();//关闭浏览器仍然执行
    set_time_limit(0);//让程序一直执行下去
    $interval=10;//每隔一定时间运行
    $j = 1;
    do{
        $msg=date("Y-m-d H:i:s");
        file_put_contents("log.log",$msg,FILE_APPEND);//记录日志
        sleep($interval);//等待时间，进行下一次操作。
        echo $j;
        $j++;
    }while($j == 10);*/

    


   /* $int = 123;
     
    if(!filter_var($int, FILTER_VALIDATE_INT))
    {
        echo("不是一个合法的整数");
    }
    else
    {
        echo("是个合法的整数");
    }

    $var=300;
 
    $int_options = array(
        "options"=>array
        (
            "min_range"=>0,
            "max_range"=>256
        )
    );
     
    if(!filter_var($var, FILTER_VALIDATE_INT, $int_options))
    {
        echo("不是一个合法的整数");
    }
    else
    {
        echo("是个合法的整数");
    }*/

   /* filter_input() 函数过滤输入的数据
    if(!filter_has_var(INPUT_GET, "url"))
    {
     echo("没有 url 参数");
    }
    else
    {
     $url = filter_input(INPUT_GET, 
     "url", FILTER_SANITIZE_URL);
     echo $url;
    }


    if(!filter_has_var(INPUT_GET, "email"))
    {
        echo("没有 email 参数");
    }
    else
    {
        if (!filter_input(INPUT_GET, "email", FILTER_VALIDATE_EMAIL))
        {
            echo "不是一个合法的 E-Mail";
        }
        else
        {
            echo "是一个合法的 E-Mail";
        }
    }
    表单通常由多个输入字段组成。为了避免对 filter_var 或 filter_input 函数重复调用，我们可以使用 filter_var_array 或 the filter_input_array 函数。*/
    /*$filters = array
    (
        "name" => array
        (
            "filter"=>FILTER_SANITIZE_STRING
        ),
        "age" => array
        (
            "filter"=>FILTER_VALIDATE_INT,
            "options"=>array
            (
                "min_range"=>1,
                "max_range"=>120
            )
        ),
        "email"=> FILTER_VALIDATE_EMAIL
    );
     
    $result = filter_input_array(INPUT_GET, $filters);
     
    if (!$result["age"])
    {
        echo("年龄必须在 1 到 120 之间。<br>");
    }
    elseif(!$result["email"])
    {
        echo("E-Mail 不合法<br>");
    }
    else
    {
        echo("输入正确");
    }*/


    // 检测一个数字是否在一个范围内
   /* $int = 122;
    $min = 1;
    $max = 200;

    if (filter_var($int, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max))) === false) {
        echo("变量值不在合法范围内");
    } else {
        echo("变量值在合法范围内");
    }

    // 检测 IPv6 地址
    $ip = "2001:0db8:85a3:08d3:1319:8a2e:0370:7334";

    if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === false) {
        echo("$ip 是一个 IPv6 地址");
    } else {
        echo("$ip 不是一个 IPv6 地址");
    }
    if(filter_var($ip,FILTER_VALIDATE_INT,FILTER_FLAG_IPV6) === false)
        array("range"=>array('min_range' =>20 ,'max_range'=>200 ));


    print_r(strtotime("8/5/1974 12:20:03"));
    $arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
    echo json_encode($arr);
    class Emp {
       public $name = "";
       public $hobbies  = "";
       public $birthdate = "";
    }
    $e = new Emp();
    print_r($e);
    echo json_encode($e);


    $json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';

    var_dump(json_decode($json));
*/


 /*   ignore_user_abort(false);//当用户关闭页面时服务停止
    set_time_limit(0);  //设置执行时间，单位是秒。0表示不限制。
    date_default_timezone_set('Asia/Shanghai');//设置时区

    while(TRUE)
    {
        //这里是需要定时执行的任务
        sleep(1);//暂停时间（单位为秒）
    }

    set_time_limit(20);

    while ($i<=10)
    {
            echo "i=$i ";
            sleep(100);
            $i++;
    }


    $redis = new Redis(); //实例化redis
    $redis->pconnect('127.0.0.1', '6379'); //建立redis服务连接
    $redis->set($key, $value); //设置变量和变量值
    $redis->get($key); //获取变量值
    print_r($redis->set($key, $value));//设置变量和变量值
    print_r($redis->get($key));
    $redis->close(); //关闭redis连接

    print( 1 <=> 2);//新增PHP太空船运算符

    $site = $_GET['url'] ?? '菜鸟教程';//合并运算
    define('sites', [//常量数组
       'Google',
       'Runoob',
       'Taobao'
    ]);

    print(sites[1]);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mytestDB";
    创建连接
    $conn = new mysqli($servername, $username, $password,$dbname);
    
    检测连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    } 
    echo "连接成功";

    创建数据库
    $sql = "CREATE DATABASE mytestDB";
    if (mysqli_query($conn, $sql)) {
        echo "数据库创建成功";
    } else {
        echo "Error creating database: " . mysqli_error($conn);
    }

    使用 sql 创建数据表
    $sql = "CREATE TABLE MyGuests (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
    )";
    if (mysqli_query($conn, $sql)) {
        echo "数据表 MyGuests 创建成功";
    } else {
        echo "创建数据表错误: " . mysqli_error($conn);
    }

    插入数据
    $sql = "INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('John', 'Doe', 'john@example.com')";
    mysql
    if ($conn->query($sql) === TRUE) {
        echo "新记录插入成功";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();



    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "myDB";

    // 创建连接
    $conn = new mysqli($servername, $username, $password, $dbname);
    // 检测连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    } 

    // 使用 sql 创建数据表
    $sql = "CREATE TABLE MyGuests (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
    )";

    if (mysqli_query($conn,$sql) === TRUE) {
         echo "Table MyGuests created successfully";
    } else {
         echo "创建数据表错误: " . $conn->error;
    }

    $sqltable = "INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('John', 'Doe', 'john@example.com')";

    if (mysqli_query($conn,$sqltable) === TRUE) {
         echo "新记录插入成功";
    } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
    }



    $sql = "SELECT id, firstname, lastname FROM MyGuests";
    echo "<br/>";
    $result = $conn->query($sql);
     var_dump($result);
    if ($result->num_rows > 0) {
        // 输出数据
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        }
    } else {
        echo "0 结果";
    }

    $conn->close();*/


    /*echo "<div style='width:200px;height:300px;border:1px solid #ccc;'></div>";

    //授权
    function authenticate() {
        header('WWW-Authenticate: Basic realm="Test Authentication System"');
        header('HTTP/1.0 401 Unauthorized');
        echo "You must enter a valid login ID and password to access this resource\n";
        exit;
    }

    if (!isset($_SERVER['PHP_AUTH_USER']) ||
        ($_POST['SeenBefore'] == 1 && $_POST['OldAuth'] == $_SERVER['PHP_AUTH_USER'])) {
        //authenticate();
    }
    else {
        echo "<p>Welcome: {$_SERVER['PHP_AUTH_USER']}<br />";
        echo "Old: {$_REQUEST['OldAuth']}";
        echo "<form action='{$_SERVER['PHP_SELF']}' METHOD='post'>\n";
        echo "<input type='hidden' name='SeenBefore' value='1' />\n";
        echo "<input type='hidden' name='OldAuth' value='{$_SERVER['PHP_AUTH_USER']}' />\n";
        echo "<input type='submit' value='Re Authenticate' />\n";
        echo "</form></p>\n";
    }*/

//php实战经典
header("Content-type: text/html; charset=utf-8");//设置编码，防止乱码
mb_internal_encoding('UTF-8'); 
mb_http_output('UTF-8'); 
mb_http_input('UTF-8'); 
mb_regex_encoding('UTF-8'); 
// 使用打印
/*echo "test\078 \0x67";
echo "<br/>";
echo <<<GOD
jjjjjjjj\n.hhhhhh
jjjjjkkkk.lll
GOD;
echo "<br/>";
var_dump("test");
echo "<br/>";
$str = "test string";
print_r($str[3]);
print_r($str[5]);
echo "<br/>";
echo $str[5];
echo "<br/>";
echo "strpos()使用:查找子字符串:".strpos("hello world","w");
echo "<br/>";
echo "substr()使用:提取字符串的一部分,3是开始的索引:".substr("hello world! 的", 3);
echo "<br/>";
echo "substr()使用:提取字符串的一部分,3是开始的索引,5是截取长度:".substr("hello world! haohaohao", 3,5);
echo "<br/>";
echo "substr()使用:提取字符串的一部分,-1是反向开始的索引:".substr("hello world! gho", -1);
echo "<br/>";
echo "mb_substr()使用:(注意设置mb_internal_encoding)提取带有中文字符串的一部分,3是开始的索引:".mb_substr("你还事假急急急的", 3);
echo "<br/>";
echo "substr_replace(string, replacement, start)使用:替换子字符串,3是开始的索引,5是长度:".substr_replace("helloworld!","wr", 3,5);
echo "<br/>";
echo "substr_count(haystack, needle)使用:子字符串出现的次数:".substr_count("hello world!","o");
echo "<br/>";
echo "substr_compare(main_str, str, offset)使用:从指定的开始位置比较两个字符串,从偏移位置 offset 开始比较 main_str 与 str，比较长度为 length 个字符。6是开始的索引:".substr_compare("hello world!","world",6);
echo <<<T
返回值 
如果 main_str 从偏移位置 offset 起的子字符串小于 str，则返回小于 0 的数；如果大于 str，则返回大于 0 的数；如果二者相等，则返回 0。如果 offset 大于等于 main_str 的长度或 length 被设置为小于 1 的值（ PHP 5.6 之前的版本），substr_compare() 将打印出一条警告信息并且返回 FALSE。
T;
echo "<br/>";
echo substr_compare("abcde", "abc", 2, 1); // warning
echo substr_compare("abcde", "bcG", 1, 4);
echo "strstr — 查找字符串的首次出现:".strstr("hello world","l");
echo "<br/>";
echo "strrev(string):反转".strrev("helloworld")."<br/>";
$s = "this is test";
$w = explode(' ', $s);//返回由字符串组成的数组
$re = array_reverse($w);
echo implode(' ', $re) ;//将一个一维数组的值转化为字符串
echo "<br/>";
//制表符与空格符置换，也可以使用pc_tab_expand
$r = mysql_query("select mess from user where id=9");
$ob = mysql_fetch_object($r);
$tabed = str_replace(' ', '\t', $ob->mess);
echo "<br/>";
echo "控制大小写：".ucfirst("hello world")."<br/>";
echo "控制大小写：".ucwords("hello world")."<br/>";
echo "控制大小写：".strtoupper("hello world")."<br/>";
echo "控制大小写：".strtolower("Hello World")."<br/>";
echo "删除空白字符：".trim(" hello world ")."<br/>";
echo "删除空白字符：".ltrim(" hello world ")."<br/>";
echo "删除空白字符：".rtrim(" hello world ")."<br/>";
$s = array(
    array('test','test4'),
    array('test','test5'),
    array('test','test6'),
    );
$fh = fopen('s.cvs', 'w');
foreach ($s as $k) {
    if (fputcsv($fh, $k) === false) {
        die("cant write");
    }
}
fclose($fh);
echo "逗号分隔符.fputcsv().："."<br/>";
$s = array(
    array('test','test4'),
    array('test','test5'),
    array('test','test6'),
    );
ob_start();
$fh = fopen('php://output', 'w');
foreach ($s as $k) {
    if (fputcsv($fh, $k) === false) {
        die("cant write");
    }
}
fclose($fh);
$output = ob_get_contents();
ob_get_clean();
echo "逗号分隔符："."<br/>";
$st = "
helloworld,helloworld,
helloworld
";
echo "换行：<pre>".wordwrap($st)."</pre>.<br/>";
echo "存储二进制：".pack("ss",1657,567,888)."<br/>";
    $a1 = mktime(17,32,56,5,10,2012);
    $b1 = mktime(18,33,59,6,10,2015);
    echo "$a1<br/>";
    $dis_second = $b1-$a1;
    echo $dis_second."<br/>";
    $dis_week = floor($dis_second/3600/24/7);
    $dis_day = floor(($dis_second-$dis_week*3600*24*7)/3600/24);
    $dis_hour = floor(($dis_second-$dis_week*3600*24*7-$dis_day*3600*24)/3600);
    $minute = floor(($dis_second-$dis_week*3600*24*7-$dis_day*3600*24-$dis_hour*3600)/60);
    $dis_s = ($dis_second-$dis_week*3600*24*7-$dis_day*3600*24-$dis_hour*3600-$minute*60)%60;
    // echo $dis_day."-".$dis_hour."-".$minute;
    echo "两个日期时间差".$dis_day."day".$dis_hour."hour".$minute."minute".$dis_s."seconds<br/>";

echo "end 6.19 <br/>";
$zero1=strtotime (date("y-m-d h:i:s")); //当前时间  ,注意H 是24小时 h是12小时 
$zero2=strtotime ("2018-1-1 00:00:00");  //过年时间，不能写2014-1-21 24:00:00  这样不对 
$guonian=ceil(($zero2-$zero1)/86400); //60s*60min*24h   
echo "离过年还有<strong>$guonian</strong>天！";   
echo "<br/>";
//PHP计算两个时间差的方法 
$startdate="2010-12-11 11:40:00";
$enddate="2012-12-12 11:45:09";
$date=floor((strtotime($enddate)-strtotime($startdate))/86400);
$hour=floor((strtotime($enddate)-strtotime($startdate))%86400/3600);
$minute=floor((strtotime($enddate)-strtotime($startdate))%86400/60);
$second=floor((strtotime($enddate)-strtotime($startdate))%86400%60);
echo $date."天<br>";
echo $hour."小时<br>";
echo $minute."分钟<br>";
echo $second."秒<br>";
echo "<br/>";

echo <<<END
等待时间，进行下一次操作。
END;

echo "检查变量是否包含数字值：".is_numeric(05)."<br/>";//1
echo "检查变量是否包含数字值：".is_numeric("05")."<br/>";//1
var_dump ("检查变量是否包含数字值：".is_numeric('bnhh')."<br/>");//0

$v = is_numeric ('58635272821786587286382824657568871098287278276543219876543') ? true : false;
    
var_dump ($v);

$d = 0.0000001;
$a = 1.0000000;
$b = 1.0000001;
$c = abs($a-$b) < $d ? 'true':'false';
echo "<br/>";

echo "比较两个浮点数:".$c."<br/>";
echo "取整浮点数:".round(1.2555)."<br/>";
echo "向上取整浮点数:".ceil(1.2555)."<br/>";
echo "向下取整浮点数:".floor(1.2555)."<br/>";

echo "plot_point"."<br/>";
// for ($i=0; $i < 10; $i++) { 
//  # code...
//  plot_point($i);
// }


print_r(range(l,p));
echo "<br/>";

echo "生成随机数：".mt_rand(1,100)."<br/>";
echo "生成随机数：".mt_rand(1,100)."<br/>";
echo "生成随机数：".rand(20,50)."<br/>";

echo "生成偏随机数：";
function pc_rand_weighted($nums){
    $total = 0;
    foreach ($nums as $num => $weight) {
        # code...
        $total += $weight;
        $distribution[$num] = $total;
    }
    $rand = mt_rand(0,$total - 1);
    foreach ($distribution as $num => $weights) {
        # code...
        if ($rand < $weights) {
            # code...
            return $num;
        }
    }
}
$ads = array('fff'=>12234,
    'ggg'=>33424,
    'hhh'=>16823);
print_r(pc_rand_weighted($ads));

echo "<br/>";
echo log10(10)."<br/>";
echo exp(10)."<br/>";
echo pow(2,10)."<br/>";
echo "格式化整数:".number_format(10.415525)."<br/>";

echo "格式化整数,指定小数位数:".number_format(10.415525,2)."<br/>";

print_r(localeconv());
echo "setlocale — 设置地区信息";
setlocale(LC_MONETARY,'en_US');*/
// print money_format('%n',1234.56);//windows不适用

// $number = 1234.56;
// // 让我们打印 en_US locale 的国际化格式
// setlocale(LC_MONETARY, 'en_US');
// echo money_format('%i', $number) . "\n";
// /*/*/*echo "<br/>";
// echo "$ " . number_format(15.2586715, 2);
// echo "<br/>";

// function pc_may_pluralize($sig_word,$amount_of){
//     $pus = array('fish' => 'fish','person' => 'person' );
//     if (1 == $amount_of) {
//         # code...
//         return $sig_word;
//     }
//     if (isset($pus[$sig_word])) {
//         # code...
//         return $pus[$sig_word];
//     }
//     return $sig_word.'s';
// }
// echo pc_may_pluralize('fishes',4);



// echo "<br/>";
// echo PHP_OS;
// echo "<br/>";

// echo deg2rad(45)."<br/>";
// var_dump(deg2rad(45) === M_PI_4);
// echo "<br/>";

// echo mb_substr("截取中文字符串", 3);//设置mb_internal_encoding();
// echo "<br/>";
// /* 显示当前的内部字符编码*/
// echo mb_internal_encoding();

// echo "<br/>";
// echo "BCMath库加法:".bcadd('123458745','457811335544')."<br/>";
// echo "BCMath库减法:".bcsub('123458745','457811335544')."<br/>";
// echo "BCMath库乘法:".bcmul('123458745','457811335544')."<br/>";
// echo "BCMath库比较:".bccomp('123458745','457811335544')."<br/>";

// //echo "GMP库:".gmp_strval(gmp_add('123458745','457811335544'))."<br/>";//未绑定库

// echo function_exists('func')? "exists":"unexists"."<br/>";
// //echo function_defined('gmp_init')? "exists":"unexists"."<br/>";

// echo "进制转换:".base_convert('a1',16,10)."<br/>";
// echo "二进制转换:".bindec('10')."<br/>";
// echo "十进制转换:".octdec('10')."<br/>";
// echo "十六进制转换:".hexdec('10')."<br/>";
// echo "十进制转换二八十六进制:".decbin('10').",".decoct('10').",".dechex('10')."<br/>";

// echo mktime(0,0,0,1,1,1985);
// echo "<br/>";
// echo "l格式显示星期几:".date('l',mktime(0,0,0,1,1,1985));
// echo "<br/>";
// echo "查看日期:".date('r');
// echo "<br/>";
// echo strftime('%c');
// echo "<br/>";
// echo "设置显示日期名:".date('Y-m-d');
// echo "<br/>";
// echo date('Y-m-d H:i:s')."<br/>";
// echo time()."<br/>";
// echo date('Y-m-d H:i:s',time())."<br/>";

// var_dump(getdate());
// echo "<br/>";
// var_dump(localtime());
// echo "<br/>";

// $da = getdate();
// printf('%s %d, %d',$da['mon'],$da['mday'],$da['year']);

// var_dump(date("h a|F D, y"));
// var_dump(explode('|',date("h a|F D, y")));
// echo "<br/>";


// echo "一月中的第几天".date('d');
// echo "<br/>";
// echo "一月中的第几天".strftime('%d');
// echo "<br/>";
// echo "一年中的第几天".date('z');
// echo "<br/>";
// echo "一年中的第几天".strftime('%j');

// checkdate(12,3,1998);
// echo "<br/>";
// echo str_replace(',',' ',"18,12,56,10,5,1989");
// echo "<br/>";
// echo strtotime("last Monday"), "\n";
// echo strtotime("2017-1-1 10:25:25");
// echo "<br/>";
// $d = preg_split('/[-:]/', "2017-1-1 10:25:25");

// var_dump($d);

// echo "<br/>";
// print_r($d);
// echo "<br/>";
// date_default_timezone_set("America/New York");
// var_dump(date('c',time()));
// echo date_default_timezone_get();
// // echo date_default_timezone_get();//获取时区

// echo "用环境改变时区：<br/>";
// putenv('TZ=PST8PDT');
// var_dump(date('c',time()));
// echo "<br/>";


// //枚举一周内的七天
// $now = time();
// if(3<strftime('%H',$now)){
//     $now += 7200;
// }

// $today = strftime('%w',$now);
// echo $today."<br/>";

// $start_day = $now -(86400*$today);
// for($i = 0; $i < 7; $i++){
//     print strftime('%c',$start_day + 86400*$i);
//     echo "<br/>";
// }

// //数组
// $arr = array();
// for ($i=0; $i < 20; $i++) { 
//     # code...
//     $arr[] = $i;
// }
// var_dump($arr);
// echo "<br/>";
// foreach ($arr as $key => $value) {
//     # code...
//     echo $key.":".$value."<br/>";
// }

// echo "<br/>";
// unset($arr[8]);
// echo "删除数组元素";
// var_dump($arr);
// echo "<br/>";
// array_splice($arr,10,2);
// var_dump($arr);
// foreach ($arr as $key => $value) {
//     # code...
//     echo $key.":".$value."<br/>";
// }
// echo "增大数组:<br/>";
// array_pad($arr,20,'hh');
// var_dump($arr);
// echo "<br/>";
// echo "追加数组：<br/>";
// $arry = array(444,555,777,222,444,555);
// $acon = array_merge($arr,$arry);
// var_dump($acon);
// echo "<br/>";
// echo "数组转字符串：<br/>";
// $astr = join(',',$arry);
// var_dump($astr);
// echo "<br/>";
// echo "数组转字符串：<br/>";
// $aay= explode(',',$astr);
// var_dump($aay);
// echo "<br/>";
// echo "数组检查键值是否存在：<br/>";
// if(array_key_exists(0, $arry))
// {
//     echo "存在：$arry[0]";
// }
// echo "<br/>";
// echo "数组检查是否包含某个元素：<br/>";
// $val = 444;
// if(in_array($val, $arry))
// {
//     echo "存在：$val";
// }
// echo "<br/>";
// $pos = array_search($val,$arry);
// if ($pos !== false) {
//     # code...
//     echo "$val 在数组中文位置：$pos";
// }
// echo "<br/>";
// echo max($arry);
// echo min($arry);
// echo "<br/>";
// $rearr = array_reverse($arry);
// var_dump($rearr);
// echo "<br/>";

// sort($rearr);
// var_dump($rearr);
// echo "<br/>";

// rsort($rearr);
// var_dump($rearr);
// echo "<br/>";

// $age= array('peter'=>444,'tom'=>555,'jom'=>777,'cat'=>222);
// ksort($age);
// var_dump($age);
// echo "<br/>";
// $arr1 = $arr2 = array("img12.png", "img10.png", "img2.png", "img1.png");
// echo "Standard string comparison\n";
// usort($arr1, "strcmp");
// print_r($arr1);
// echo "<br/>";

// $stuff = array('colors' => array('red','white','blue'),
//                 'city' => array('bth','new york','chicago')
//          );
// array_multisort($stuff['colors'],$stuff['city']);
// print_r($stuff);

// echo "<br/>";
// $unique = array_unique($arry);
// var_dump($unique);
// echo "<br/>";

// //array_walk使用用户自定义函数对数组中的每个元素做回调处理
// $fruits = array("d" => "lemon", "a" => "orange", "b" => "banana", "c" => "apple");
// array_push($fruit,"test","toil");
// function test_alter(&$item1, $key, $prefix)
// {
//     $item1 = "$prefix: $item1";
// }

// function test_print($item2, $key)
// {
//     echo "$key. $item2<br />\n";
// }

// echo "Before ...:\n";
// array_walk($fruits, 'test_print');
// echo "<br/>";

// $fruits = array("lemon", "orange", "banana", "apple");
// array_push($fruits,"test","toil");
// var_dump($fruits);
// echo " <br/>";

// $fruit = array('sweet' => array('a' => 'apple', 'b' => 'banana'), 'sour' => 'lemon');

// function test_printy($item, $key)
// {
//     echo "$key holds $item\n";
// }

// array_walk_recursive($fruit, 'test_printy');
// echo " <br/>";
// echo "计算两个数组的差集交集并集：";
// echo " <br/>";
// $old = array(444,555,777,222);
// $new = array(444,666,888,999,555,777,222);
// $diff = array_diff($new,$old);
// var_dump($diff);
// foreach ($diff as $key => $value) {
//     # code...
//     echo "$key:$value <br/>";
// }
// echo " <br/>";
// $bing = array_unique(array_merge($new,$old));
// var_dump($bing);
// echo " <br/>";
// foreach ($bing as $key => $value) {
//     # code...
//     echo "$key:$value <br/>";
// }
// echo " <br/>";
// $jiao = array_intersect($new,$old);
// var_dump($jiao);
// echo " <br/>";
// foreach ($jiao as $key => $value) {
//     # code...
//     echo "$key:$value <br/>";
// }
// echo " <br/>";
// echo getcwd() . "<br>";

// // Change directory
// chdir("images");

// // Get current directory
// echo getcwd();
// echo " <br/>";
// var_dump(gd_info());
// echo " <br/>";
// $dddd = isset($abc)? "1":"2";
// echo $dddd;
// echo " <br/>";
// $a = 1;
// $b = 2;
// list($a,$b) = array($b,$a);
// echo "交换a和b的值：".$a.$b;
// echo " <br/>";
// $ads = create_function('$x,$y','return $x+$y;');
// $ads(2,3);
// echo $ads(2,3);


// echo " <br/>";


// class test{
//     var $a = 1;
//     public $name = "jphn";
//     function getName(){
//         return $this->name;
//     }
//     function getAge($a){
//         $this->age = $a;
//     }
//     function __construct(){
//         print "jjjj\n";

//     }
//     function __destruct(){
//         print "jj\n";
//     }
//     final public function con(){

//     }
// }*/*/*/
// final class mysql(){

// }
/*$f = new test();//实例化的时候 会自动调用构造函数__construct，这里会输出一个字符串
echo " <br/>";
echo $f->getName(); 
echo " <br/>";

var_dump($f);
echo " <br/>";

unset($f);//实例销毁时候调用__destruct
echo " <br/>";


interface jiekou{
    public function getName();
    public function setName($name);
}
class imptest implements jiekou {
    public $name;
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }
}
class Man{
    const p = 12.544;
}


echo " <br/>";
$path_parts = pathinfo('/www/htdocs/inc/lib.inc.php');//获取文件后缀名

echo $path_parts['dirname'], "\n";echo " <br/>";
echo $path_parts['basename'], "\n";echo " <br/>";
echo $path_parts['extension'], "\n";echo " <br/>";
echo $path_parts['filename'], "\n";echo " <br/>";

echo " <br/>";


define('radius',5);//定义全局常量
//定义类常量
class Math
{
    const p = 12.5;
    const r = 2;

    public function cal()
    {
        return self::p + 10;
    }
    public function __sleep()
    {
        //对象序列化
    }
    public function __wakeUp()
    {
        //反序列化
    }

}
Reflection::export(new ReflectionClass('Math'));//反射查看类的信息
echo " <br/>";

$area = math::p * math::r;
echo $area;
echo " <br/>";
$cals = new Math();
print $cals->cal();

echo " <br/>";

$fh = fopen('text.txt', 'w');
foreach ($s as $k) {
    if (fputcsv($fh, $k) === false) {
        die("cant write");
    }else{
        var_dump($k) ;
    }
}
fclose($fh);
echo "<br/>";

// header('Location:http://www.baidu.com');
// exit;
// $browser = get_browser();
// var_dump($browser);
// echo "<br/>";
echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";
echo "<br/>";
// $browser = get_browser(null, true);
// print_r($browser);
echo "<br/>";


echo date('H:i,js F');

const VERSION = '1.0.0';


echo "<br/>";
echo "<br/>";

// namespace Vender\Package;

// use FooInterFace;

class Foo
{
    public $a = 14;
    public function testFace()
    {
        if ($i == 1) {
            # code...
            $face = true;
            $person = null;
            for ($i=0; $i < 7; $i++) { 
                # code...
            }
        }else{

        }
    }
}


echo "<br/>";
$a = 1;
echo is_array($a) ? 'true' : 'false';
echo "<br/>";
echo empty($a) ? 'true' : 'false';

echo isset($b) ? 'true' : 'false';
echo "<br/>";
$ab = 5;
while ($ab <= 50) {
    echo "<p>
        <span>".$ab."</span>
        <span>".($ab/5)."</span>
        </p>";
    # code...
    $ab += 5;
}
echo "<br/>";
$arry = array("red"=>55,"blue"=>111,"yellow"=>33);
    // foreach ($arr as $value) {
    //     # code...
    //     echo ":".$value."<br/>";
    // }
    sort($arry);
    var_dump($arry);
    echo " <br/>";

    rsort($arry);
    var_dump($arry);
    echo " <br/>";

    krsort($arry);
    var_dump($arry);
    echo " <br/>";


    $array_sort = array(
        "anim"=>array(
            "face"=>"square",
            "hand"=>"large"
        ),
        "person"=>array(
            "face"=>"circle",
            "hand"=>"small"
        )
    );

    function com($a,$b)
    {
        if ($a[1] == $b[1]) {
            # code...
            return 0;
        }elseif ($a[1] < $b[1]) {
            # code...
            return -1;
        }else{
            return 1;
        }
    }
    usort($array_sort,'com');
    var_dump($array_sort);

echo "<br/>";
echo strtoupper("hello world")."<br/>";
echo ucfirst("hello world")."<br/>";
echo ucwords("hello world")."<br/>";
$a_b = 1;
var_dump(explode(',',"hello,world"))."<br/>";
echo "<br/>";
var_dump(strtok("this is \tb,wor\nld","\n\t"))."<br/>";
echo "<br/>";
var_dump(strcmp("hello",",world"))."<br/>";
echo "<br/>";
echo "<br/>";
$data = array("face" => "red","person" => "large");
$return = array('anim' => 'monkey','moon' => 'month' );

echo json_encode(array('error'=>'0','data'=>array('user'=>$data,'similar'=>$return)));
echo "<br/>";

class PersonFace
{
    public $name;
    public static function getName()
    {
        return $this->name;
        if ($i>1) {
            # code...
            for ($i=0; $i < 10; $i++) { 
                # code...
            }
        }
    }
    final public function setName($name)
    {
        $this->name = $name;
        echo $name."<br/>";
    }
}

class Men extends PersonFace
{
    public $tryCathl;
    public function __construct()
    {
        parent::setName("build");
    }
}

$b = new Men();
$b->setName("john");

echo "[]<br/>";
interface InfoCheck
{
    public function dem();
}
class SearchInfo implements InfoCheck
{
    public function dem()
    {
        return(var_export($this,TRUE));
    }
}
echo "<br/>";
class Info
{
    public function dem()
    {

    }
}
class Search 
{
    public $time;
    public function __toString(){
        return(var_export($this,TRUE));//类转字符串
    }
}
 

try
{
    throw new Exception("Error Processing Request", 1);
}
catch(Exception $e)
{
    echo $e->getCode();
}
// $ppp = new Search();
// echo $ppp;
// Reflection::export(new ReflectionClass('Math'));



try {   
    $mgr = new Men();   
    $cmd = $mgr->setName("realcommand");   
    throw new Exception("Error Processing Request", 1);
    
}
catch (Exception $e) {   
    print $e->getMessage();   
    // exit();   
}   
echo "<br/>";

*/


echo "<br/>";
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PHP过滤器test</title>
</head>
<body>
    <!-- <form action="index.php">
        <input type="name" name="name" placeholder="john" class ="<?php echo 12>5? "reb": "blue" ?>"/>
        <input type="number" name="age" placeholder="hh@qq.com"/>
        <input type="email" name="email" placeholder="hh@qq.com"/>
        <input type="text" name="url" placeholder="http://www.cleanthem.com"/>
        <input type="submit" value="submit"/>
        <?php 
            list($hour,$minute,$second,$month,$day,$year)= split(':',date('h:i:s:m:d:Y'));
            for($i=0; $i < 7; $i++) { 
                # code...
                $timestamp = mktime($hour,$minute,$second,$month,$day+$i,$year);
                $date = date("D,F J,Y",$timestamp);
                print "<option value='$timestamp'>$date</option>";
            }
        ?>
    </form> -->
    <!-- <form action="action.php" method="post">
        <div><input type="name" name="qty" placeholder="john" class ="<?php echo 12>5? "reb": "blue" ?>"/></div>
        <div><input type="number" name="oil" placeholder=""/></div>
        <div><input type="email" name="address" placeholder=""/></div>
        <div><input type="text" name="url" placeholder="http://www.cleanthem.com"/></div>
        <div><input type="submit" value="submit"/></div>
        <?php 
            list($hour,$minute,$second,$month,$day,$year)= split(':',date('h:i:s:m:d:Y'));
            for($i=0; $i < 7; $i++) { 
                # code...
                $timestamp = mktime($hour,$minute,$second,$month,$day+$i,$year);
                $date = date("D,F J,Y",$timestamp);
                print "<option value='$timestamp'>$date</option>";
            }
        ?>
    </form>
    <script>console.log(window.navigator.userAgent)</script>
    <?php
        $array_pic = array('images/1.jpg','images/r1.jpg','images/r1@2x.jpg');
        shuffle($array_pic);//打乱数组
        for ($i=0; $i < 1; $i++) { 
            # code...
            // echo "<img src='".$array_pic[$i]."' alt=''/>";
        }
        echo extract($array_pic);
        echo "<br/>";
        var_dump($array_pic);
    ?> -->


    <!-- 搜索列表 -->
    <form action="research.php" method="post">
        <div>
            <select name="searchtype">
                <option value="title">Title</option>
                <option value="author">Author</option>
                <option value="isbn">Isbn</option>
            </select>
        </div>
        <div><input type="name" name="searchitem" placeholder=" " class ="<?php echo 12>5? "reb": "blue" ?>"/></div>
        <!-- <div><input type="number" name="oil" placeholder=""/></div>
        <div><input type="email" name="address" placeholder=""/></div>
        <div><input type="text" name="url" placeholder="http://www.cleanthem.com"/></div> -->
        <div><input type="submit" value="search"/></div>
    </form>
</body>
</html>