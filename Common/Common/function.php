<?php
use JPush\Client as JPush;  

function http($url, $data='', $method='GET'){
    $curl = curl_init(); // 启动一个CURL会话  
    curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址  
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 对认证证书来源的检查  
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); // 从证书中检查SSL加密算法是否存在  
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器  
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转  
    curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer  
    if($method=='POST'){  
        curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求  
        if ($data != ''){  
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // Post提交的数据包  
        }  
    }  
    curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环  
    curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容  
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回  
    $tmpInfo = curl_exec($curl); // 执行操作  
    curl_close($curl); // 关闭CURL会话  
    return $tmpInfo; // 返回数据  
}

function Alert($Str,$Typ="back",$TopWindow="",$Tim=100){
    echo "<script>".chr(10);
    if(!empty($Str)){
        echo "alert(\"Warning:\\n\\n{$Str}\\n\\n\");".chr(10);
    }
    echo "function _r_r_(){";
    $WinName=(!empty($TopWindow))?"top":"self";
    switch (StrToLower($Typ)){
        case "#":
            break;
        case "back":
            echo $WinName.".history.go(-1);".chr(10);
            break;
        case "reload":
            echo $WinName.".window.location.reload();".chr(10);
            break;
        case "close":
            echo "window.opener=null;window.close();".chr(10);
            break;
        case "function":
            echo "var _T=new function('return {$TopWindow}')();_T();".chr(10);
            break;
        //Die();
        Default:
            if($Typ!=""){
                //echo "window.{$WinName}.location.href='{$Typ}';";
                echo "window.{$WinName}.location=('{$Typ}');";
            }
    }
    echo "}".chr(10);
    //為防止Firefox不執行setTimeout
    echo "if(setTimeout(\"_r_r_()\",".$Tim.")==2){_r_r_();}";
    if($Tim==100){
        echo "_r_r_();".chr(10);
    }else{
        echo "setTimeout(\"_r_r_()\",".$Tim.");".chr(10);
    }
    echo "</script>".chr(10);
    Exit();
}
?>