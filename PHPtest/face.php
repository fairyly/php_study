<?php 

  
    $image="images/1.jpg";
    $fp = fopen($image, 'rb');
    $content = fread($fp, filesize($image)); //二进制数据
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
                                   CURLOPT_URL => "https://api.faceid.com/faceid/v1/detect",
                                   CURLOPT_RETURNTRANSFER => true,
                                   CURLOPT_ENCODING => "",
                                   CURLOPT_MAXREDIRS => 10,
                                   CURLOPT_TIMEOUT => 30,
                                   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                   CURLOPT_CUSTOMREQUEST => "POST",
                                   CURLOPT_POSTFIELDS => array('image";filename="image'=>"$content", 'api_key'=>"Gu5vIswoAiTdmBUZ2MVbTn33i7_WgO_E",'api_secret'=>"u8UDH66MySl_sn7nMVoxxH9j1mcQfAYq"),
                                   CURLOPT_HTTPHEADER => array(
                                                               "cache-control: no-cache",
                                                               ),
                                   ));
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    
    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo $response;
    }

 ?>