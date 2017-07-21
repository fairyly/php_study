<?php

    /*include('index.php');
    require('index.php');*/

    // $fp = fopen("order20170703.txt","w");//

    // fputs($fp,"hhhhhhhhhhh");

    /*$fp = file_get_contents("order.txt");
    var_dump($fp);*/

    /*$fp = readfile("order.txt");
    var_dump($fp);*/

    /*echo "<br/>";
    $fp = file("order.txt");
    var_dump($fp);*/

    /*echo "<br/>";
    $fp = fopen("order.txt","rb");
    var_dump(fpassthru($fp))*/

   /* $DOCUMNET_ROOT = $_SERVER['DOCUMNET_ROOT'];
    flock($fp,LOCK_EX);
    if (!$fp) {
        # code...
        echo "<p>请稍等......</p>";
        exit;
    }*/

   /* $tie = $_POST['qty'];
    $oil = $_POST['oil'];
    $address = $_POST['address'];
    $date = date('H:i,js F Y');
    $DOCUMNET_ROOT = $_SERVER['DOCUMNET_ROOT'];
    echo "$tie.<br/>";
    echo "$oil.<br/>";
    echo "$address.<br/>";
    echo "$date.<br/>";
    echo "$DOCUMNET_ROOT<br/>";*/

   /* $outputstring = "\t".$tie ."\t". $oil ."\t". $address;
    fwrite($fp,$outputstring);
    flock($fp,LOCK_UN);*/
    

   /*if ($fp) {
        echo "$fp";
        # code...
        while (!feof($fp)) {
            # code...
            $line = fgets($fp);
            echo $line."<br/>";
        }
    }*/

    //查看文件是否存在
    /*if (file_exists("order.txt")) {
        # code...
        echo readfile("order.txt")."<br/>";
    }

    echo filesize("order.txt")."<br/>";
*/
    // unlink("order20170703.txt");//删除文件
    
    $arr = array('red','blue','yellow');
    // foreach ($arr as $value) {
    //     # code...
    //     echo ":".$value."<br/>";
    // }
    // $sarr = sort($arr);
    // echo $sarr;
    // var_dump($sarr);
    // echo "1111111.<br/>";

    $data = trim($_POST["qty"]);
    $return = trim($_POST["oil"]);
    echo json_encode(array('error'=>'0','data'=>array('user'=>$data,'similar'=>$return)));

    echo "<br/>";
    
    $one = 1;
    $two = 2;
    // return $one."/".$two;
    function quto(&$a,$b)
    {
        $sum = $a + $b;
        $a++;
        $b++;
        return array($a,$b);
    }
    $result = list($cd,$ef) = quto($one,$two);
    // $result = quto($one,$two);

    var_dump($result);
    echo $one;
    echo $two;








    // fclose($fp);
?>