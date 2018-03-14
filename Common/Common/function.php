<?php
use JPush\Client as JPush;  
function SendMail($to, $title, $content,$path,$name) {

	 Vendor('PHPMailer.PHPMailerAutoload');
	 $mail = new PHPMailer(); //实例化
	 $mail->IsSMTP(); // 启用SMTP
	 $mail->Host=C('MAIL_HOST'); //smtp服务器的名称（这里以QQ邮箱为例）
	 $mail->SMTPAuth = C('MAIL_SMTPAUTH'); //启用smtp认证
	 $mail->Username = C('MAIL_USERNAME'); //发件人邮箱名
	 $mail->Password = C('MAIL_PASSWORD') ; //163邮箱发件人授权密码
	 $mail->From = C('MAIL_FROM'); //发件人地址（也就是你的邮箱地址）
	 $mail->FromName = C('MAIL_FROMNAME'); //发件人姓名
	 $mail->AddAddress($to,"尊敬的客户");
	 $mail->WordWrap = 31; //设置每行字符长度
	 $mail->AddAttachment($path,$name);//附件的路径和附件名称
	 $mail->IsHTML(C('MAIL_ISHTML')); // 是否HTML格式邮件
	 $mail->CharSet=C('MAIL_CHARSET'); //设置邮件编码
	 $mail->Subject =$title; //邮件主题
	 $mail->Body = $content; //邮件内容
	 $mail->AltBody = "这是一个纯文本的在非营利的HTML电子邮件客户端"; //邮件正文不支持HTML的备用显示
	 return($mail->Send());
}

function send_sms_code($phone,$code){
    //请求地址，格式如下，不需要写https://
    $serverIP='app.cloopen.com';
    //请求端口
    $serverPort='8883';
    //REST版本号
    $softVersion='2013-12-26';
    //主帐号
    $accountSid=C('RONGLIAN_ACCOUNT_SID');
    //主帐号Token
    $accountToken=C('RONGLIAN_ACCOUNT_TOKEN');
    //应用Id
    $appId=C('RONGLIAN_APPID');

    $rest = new Org\Xb\Rest($serverIP,$serverPort,$softVersion);
    $rest->setAccount($accountSid,$accountToken);
    $rest->setAppId($appId);
    // 发送模板短信
    $result=$rest->sendTemplateSMS($phone,array($code,5),1);
    if($result==NULL) {
    	return false;
    }
    if($result->statusCode!=0) {
    	return  false;
    }else{
    	return true;
    }

}




 function voiceVerify($verifyCode,$playTimes,$to,$displayNum,$respUrl,$lang,$userData,$welcomePrompt,$playVerifyCode)
  {

	  	//请求地址，格式如下，不需要写https://
	    $serverIP='sandboxapp.cloopen.com';
	    //请求端口
	    $serverPort='8883';
	    //REST版本号
	    $softVersion='2013-12-26';
	    //主帐号
	    $accountSid=C('RONGLIAN_ACCOUNT_SID');
	    //主帐号Token
	    $accountToken=C('RONGLIAN_ACCOUNT_TOKEN');
	    //应用Id
	    $appId=C('RONGLIAN_APPID');

        // 初始化REST SDK

        $rest =  new Org\Xb\Rest($serverIP,$serverPort,$softVersion);
        $rest->setAccount($accountSid,$accountToken);
        $rest->setAppId($appId);

        //调用语音验证码接口
        echo "Try to make a voiceverify,called is $to <br/>";
        $result = $rest->voiceVerify($verifyCode,$playTimes,$to,$displayNum,$respUrl,$lang,$userData,$welcomePrompt,$playVerifyCode);
         if($result == NULL ) {
            echo "result error!";
            break;
        }

        if($result->statusCode!=0) {
            echo "error code :" . $result->statusCode . "<br>";
            echo "error msg :" . $result->statusMsg . "<br>";
            //TODO 添加错误处理逻辑
        } else{
            echo "voiceverify success!<br>";
            // 获取返回信息
            $voiceVerify = $result->VoiceVerify;
            echo "callSid:".$voiceVerify->callSid."<br/>";
            echo "dateCreated:".$voiceVerify->dateCreated."<br/>";
           //TODO 添加成功处理逻辑
        }
}





function more(){
    $fopentext=fopen('visitlog.txt',"r");
    $freadtext=fread($fopentext,filesize("visitlog.txt"));

    $pattern[]="/login/i";
    $pattern[]="/reg/i";
    $pattern[]="/index\/index/i";
    $pattern[]="/manager\/adduserinfo/i";
    // $pattern[]="/index\/index/i";
    // $pattern[]="/index\/index/i";
    // $pattern[]="/index\/index/i";
    // $pattern[]="/index\/index/i";
    // $pattern[]="/index\/index/i";

    for($i=0;$i<count($pattern);$i++){
        $more=preg_match_all($pattern[$i], $freadtext, $matches);
        echo $pattern[$i]."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp".$more;
        echo "<br/>";
    }
    
    
}




//推送消息
 /**     
     * 将数据先转换成json,然后转成array 
     */  
function json_array($result){  
   $result_json = json_encode($result);  
   return json_decode($result_json,true);  
}  
  
/** 
 * 向所有设备推送消息 
 * @param string $message 需要推送的消息 
 */  
function sendNotifyAll($message){  
   require_once "JPush/autoload.php";  
   $app_key = 'bf74ed9e18f0f2771d1e959e';                //填入你的app_key  
   $master_secret = '230e49626a5987a514b11c93';    //填入你的master_secret  
   $client = new JPush($app_key,$master_secret);  
   $result = $client->push()->setPlatform('all')->addAllAudience()->setNotificationAlert($message)
   ->iosNotification('Hello IOS', array(
                'sound' => 'hello jpush',
                'badge' => 1,
                'content-available' => true,
                'category' => 'jiguang',
                'extras' => array(
                    'key' => 'value',
                    'jiguang'
                ),
            ))
   ->send();  
   
   return json_array($result);  
}  
  
  
/** 
 * 向特定设备推送消息 
 * @param array $regid 特定设备的设备标识 
 * @param string $message 需要推送的消息 
 */  
function sendNotifySpecial($regid,$message){  
   require_once "JPush/autoload.php";  
   $app_key = 'bf74ed9e18f0f2771d1e959e';                //填入你的app_key  
   $master_secret = '230e49626a5987a514b11c93';    //填入你的master_secret  
   $client = new JPush($app_key,$master_secret);  
   $result = $client->push()->setPlatform('all')->addRegistrationId($regid)->setNotificationAlert($message)->send();  
   return json_array($result);  
}  


 /** 
 * 向指定设备推送自定义消息 
 * @param string $message 发送消息内容 
 * @param array $regid 特定设备的id 
 * @param int $did 状态值1 
 * @param int $mid 状态值2 
 */  
  
function sendSpecialMsg($regid,$message,$did,$mid){  
   require_once "JPush/autoload.php";  
   $app_key = 'bf74ed9e18f0f2771d1e959e';                //填入你的app_key  
   $master_secret = '230e49626a5987a514b11c93';    //填入你的master_secret  
   $client = new JPush($app_key,$master_secret);  
   $result = $client->push()->setPlatform('all')->addRegistrationId($regid)  
      ->addAndroidNotification($message,'',1,array('did'=>$did,'mid'=>$mid))  
      ->addIosNotification($message,'','+1',true,'',array('did'=>$did,'mid'=>$mid))->send();  
  
   return json_array($result);  
}  
  
/** 
 * 得到各类统计数据 
 * @param array $msgIds 推送消息返回的msg_id列表 
 */  
function reportNotify($msgIds){  
   require_once "JPush/autoload.php";  
   $app_key = 'bf74ed9e18f0f2771d1e959e';                //填入你的app_key  
   $master_secret = '230e49626a5987a514b11c93';    //填入你的master_secret  
   $client = new JPush($app_key,$master_secret);  
   $response = $client->report()->getReceived($msgIds);  
   return json_array($response);  
} 



//下载
// function query(){
//     $file_name = "EASYLOOK.ipa";
//     $file_dir = "www.easylook.com";


// } 


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

?>