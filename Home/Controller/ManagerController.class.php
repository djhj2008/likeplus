<?php
namespace Home\Controller;
use Tools\HomeController;
use Think\Controller;
class ManagerController extends HomeController
{
    public function saleinfo(){
        $id=$_GET['sale_id'];
        if(empty($id)){
            Alert("登陆失败.",NULL,"login");
            exit;
        }
        $token = $_GET['token'];
        $ip = get_client_ip();
        $mytoken = md5($ip.$id);
        if (empty($token) || empty($mytoken) || $token != $mytoken) {
            Alert(NULL,NULL,"login");
            exit;
        }
        $this->assign('id', $id);
        $this->assign('token', $token);

        $this->display();
    }

    public function saleedit(){
        $id=$_GET['sale_id'];
        if(empty($id)){
            Alert("登陆失败.",NULL,"login");
            exit;
        }
        $token = $_GET['token'];
        $ip = get_client_ip();
        $mytoken = md5($ip.$id);
        if (empty($token) || empty($mytoken) || $token != $mytoken) {
            Alert(NULL,NULL,"login");
            exit;
        }
        $this->assign('id', $id);
        $this->assign('token', $token);

        if(!empty($_POST)){
            $oldpwd=$_POST['oldpass'];
            $pwd=$_POST['pass'];
            $pwd2=$_POST['pass2'];
            if($pwd!=$pwd2){
                Alert("新密码不匹配.","back",NULL);
                exit;
            }
            $ret = M('lp_sales')->where(array('auto_id'=>$id ,'password'=>md5($oldpwd)))
                ->find();
            if(empty($ret)){
                Alert("原密码错误.","back",NULL);
                exit;
            }
            $ret2 = M('lp_sales')->where(array('auto_id'=>$id ))->save(array('password'=>md5($pwd)));
            if(empty($ret2)){
                Alert("修改失败.","back",NULL);
                exit;
            }else{
                Alert("修改成功,请重新登录.",NULL,"login");
                exit;
            }
        }
        Alert("修改失败.","back",NULL);
        exit;
    }

    public function regsale(){
        //error_reporting(E_ALL);
        $id=$_GET['sale_id'];
        if(empty($id)){
            Alert(NULL,"登陆失败.","login");
            exit;
        }

        $token = $_GET['token'];
        $ip = get_client_ip();
        $mytoken = md5($ip.$id);

        if (empty($token) || empty($mytoken) || $token != $mytoken) {
            Alert(NULL,NULL,"login");
            exit;
        }
        $this->assign('id', $id);
        $this->assign('token', $token);

        if(!empty($_POST)){
            $name=$_POST['name'];
            $phone=$_POST['number'];
            $info=$_POST['info'];
            $pwd = substr($phone,5,6);
            $phone2=$_POST['number2'];

            $ret = M('lp_sales')->where(array('phone'=>$phone ))
                ->find();

            if(!empty($ret)){
                Alert("手机已被注册.","back",NULL);
                exit;
            }
            $ret = M('lp_sales')->where(array('group_name'=>$info))
                ->find();
            if(!empty($ret)){
                Alert("群号以被注册.","back",NULL);
                exit;
            }

            $user = array();
            $ret2 = M('lp_sales')->where(array('group_name'=>$phone2 ))
                ->find();
            if(empty($phone2)){
                $user['lev1_id'] = 0;
            }else{
                if(empty($ret2)){
                    Alert("推荐人不存在.","back",NULL);
                    exit;
                }else {
                    $user['lev1_id'] = $ret2['auto_id'];
                }
            }
            $user['name']=$name;
            $user['group_name']=$info;
            $user['phone']=$phone;
            $user['password']=md5($pwd);
            $user['role']=0;
            $ret3 = M('lp_sales')->add($user);
            if(empty($ret3)){
                Alert("注册失败.","back",NULL);
                exit;
            }else{
                echo "<script language=\"JavaScript\">\r\n";
                echo " alert(\"注册成功.\");\r\n";
                echo "</script>";
                $this ->redirect('manager/mysaleinfo',array('token'=>$token,'sale_id'=>$id),0,'');
                exit;
            }
        }
        $this->display();
    }

    public function index()
    {
        //error_reporting(E_ALL);
        $id=$_GET['sale_id'];
        if(empty($id)){
            Alert(NULL,"登陆失败.","login");
            exit;
        }

        $token = $_GET['token'];
        $ip = get_client_ip();
        $mytoken = md5($ip.$id);

        if (empty($token) || empty($mytoken) || $token != $mytoken) {
            Alert(NULL,NULL,"login");
            exit;
        }
        $this->assign('id', $id);
        $this->assign('token', $token);


        $userFind = M('lp_sales')->where(array('auto_id' => $id, 'role' => 1))->find();
        if (empty($userFind)) {
            Alert("身份验证失败!","login/login","",100);
            exit;
        }

        $type = M('lp_ware_type')->select();

        if(empty($type)){

        }else{
            $this->assign('type', $type);
        }

        if (empty($userFind)) {
            Alert("身份验证失败!","login/login","",100);
            exit;
        }

        $date = date("Y-m-d");
        $this->assign('date', $date);
        $this->display();
    }

    //自带上传类
    public function upload()
    {
        $id=$_GET['sale_id'];
        if(empty($id)){
            Alert("登陆失败.",NULL,"login");
            exit;
        }
        $token = $_GET['token'];
        $ip = get_client_ip();
        $mytoken = md5($ip.$id);
        if (empty($token) || empty($mytoken) || $token != $mytoken) {
            Alert(NULL,NULL,"login");
            exit;
        }
        $this->assign('id', $id);
        $this->assign('token', $token);

        $sn = $_POST['sn'];
        if (empty($sn)) {
            $this->display();
            exit;
        }
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 31457280;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg', 'pdf');// 设置附件上传类型
        $upload->rootPath = 'home/public/Uploads/'; // 设置附件上传根目录
        $upload->savePath = $sn . '/'; // 设置附件上传（子）目录
        // 上传文件
        $info = $upload->upload();
        if (!$info) {// 上传错误提示错误信息
            Alert("请选择上传图片!","back",NULL);
            exit;
            exit;
        } else {// 上传成功
            foreach ($info as $file) {
                $filename[] = $file['savepath'] . $file['savename'];
            }
        }

        $name = $_POST['name'];
        $in_price = $_POST['in_price'];
        $out_price = $_POST['out_price'];
        $date = $_POST['date'];
        $pic_path = $_POST['pic_path'];
        $video_url = $_POST['video_url'];
        $finfo = $_POST['info'];
        $other_price = $_POST['other_price'];
        $video_url = $_POST['video_url'];
        $type = $_POST['type'];

        $finfo3 = str_replace("\r\n", "<br>", $finfo);

        $ret = D('lp_wares')->where(array('number' => $sn))->find();
        if (!empty($ret)) {
            echo "<script language=\"JavaScript\">\r\n";
            echo " alert(\"编号重复，请修改编号!\");\r\n";
            echo " history.back();\r\n";
            echo "</script>";
            exit;
        }

        $ware = array(
            'name' => $name,
            'model' => 0,
            'number' => $sn,
            'in_price' => $in_price,
            'out_price' => $out_price,
            'other_price' => $other_price,
            'flag' => 1,
            'factory_info' => $finfo3,
            'date' => $date,
            'time' => time(),
            'pic_url' => $filename[0],
            'pic_path' => $pic_path,
            'video_url' => $video_url,
        );
        if(!empty($type)){
            $ware['type']=$type;
        }
        $ret = D('lp_wares')->add($ware);
        if (empty($ret)) {
            echo $ret;
            exit;
        }
        $this->assign('ware', $ware);
        $this->assign('filename', $filename);
        $this->display();
    }

    public function myware()
    {
        $id=$_GET['sale_id'];
        if(empty($id)){
            Alert("登陆失败.",NULL,"login");
            exit;
        }
        $token = $_GET['token'];
        $ip = get_client_ip();
        $mytoken = md5($ip.$id);
        if (empty($token) || empty($mytoken) || $token != $mytoken) {
            Alert(NULL,NULL,"login");
            exit;
        }
        $this->assign('id', $id);
        $this->assign('token', $token);

        $today=date('Y-m-d 00:00:00',time());
        $end_time = date("Y-m-d H:i:s", strtotime($today) + 86400 - 1);
        $date = array('between', array($today, $end_time));

        $user = M('lp_wares');
        $wares = $user->where(array('date' => $date))->select();
        //var_dump($user->getLastSql());

        if ($wares) {
            $this->assign('myware', $wares);
        }

        $this->display();
    }

    public function chkwarebydate()
    {
        $id=$_GET['sale_id'];
        if(empty($id)){
            Alert("登陆失败.",NULL,"login");
            exit;
        }
        $token = $_GET['token'];
        $ip = get_client_ip();
        $mytoken = md5($ip.$id);
        if (empty($token) || empty($mytoken) || $token != $mytoken) {
            Alert(NULL,NULL,"login");
            exit;
        }
        $this->assign('id', $id);
        $this->assign('token', $token);

        $today = $_POST['date'];
        if (empty($today)){
            $today = $_GET['date'];
        }
        if (empty($today)) {
            $date = date("Y-m-d");
            $this->assign('date', $date);
            $this->display();
            exit;
        }
        $this->assign('date', $today);
        $today =date("Y-m-d 00:00:00", strtotime($today));
        $end_time = date("Y-m-d 23:59:59", strtotime($today));
        $date = array('between', array($today, $end_time));


        $user = M('lp_wares');
        $wares = $user->where(array('date' => $date))->select();
        //var_dump($user->getLastSql());

        if ($wares) {
            $this->assign('dateware', $wares);
        }
        $this->display();
    }

    public function chkwaremore()
    {
        $id=$_GET['sale_id'];
        if(empty($id)){
            Alert("登陆失败.",NULL,"login");
            exit;
        }
        $token = $_GET['token'];
        $ip = get_client_ip();
        $mytoken = md5($ip.$id);
        if (empty($token) || empty($mytoken) || $token != $mytoken) {
            Alert(NULL,NULL,"login");
            exit;
        }
        $this->assign('id', $id);
        $this->assign('token', $token);

        $today = $_POST['date1'];
        $end_time = $_POST['date2'];

        if (empty($today)) {
            $today = $_GET['date1'];
            $end_time = $_GET['date2'];
        }

        if (empty($today)) {
            $date = date("Y-m-d");
            $this->assign('date1', $date);
            $this->assign('date2', $date);
            $this->display();
            exit;
        }
        $this->assign('date1', $today);
        $this->assign('date2', $end_time);

        $today = date("Y-m-d 0:0:0", strtotime($today));
        $end_time = date("Y-m-d 23:59:59", strtotime($end_time));
        $date = array('between', array($today, $end_time));

        $user = M('lp_wares');
        $wares = $user->where(array('date' => $date))->select();
        //var_dump($user->getLastSql());

        if ($wares) {
            $this->assign('dateware', $wares);
        }
        $this->display();
    }

    public function changeware()
    {
        $id=$_GET['sale_id'];
        if(empty($id)){
            Alert("登陆失败.",NULL,"login");
            exit;
        }
        $token = $_GET['token'];
        $ip = get_client_ip();
        $mytoken = md5($ip.$id);
        if (empty($token) || empty($mytoken) || $token != $mytoken) {
            Alert(NULL,NULL,"login");
            exit;
        }
        $this->assign('id', $id);
        $this->assign('token', $token);

        $ware_id = $_GET['ware_id'];
        $flag = $_GET['flag'];
        $save_flag = array();
        if ($flag == 1) {
            $save_flag['flag'] = 0;
        } else {
            $save_flag['flag'] = 1;
        }
        $user = M('lp_wares');
        $ret = $user->where(array('auto_id' => $ware_id))->save($save_flag);

        if (!empty($ret)) {
            echo "<script language=\"JavaScript\">\r\n";
            if ($flag == 1) {
                echo " alert(\"下架成功!\");\r\n";
            } else {
                echo " alert(\"上架成功!\");\r\n";
            }
            echo "window.location.href='myware?token={$token}&sale_id={$id}';\r\n";
            echo "</script>";
            exit;
        } else {
            echo "<script language=\"JavaScript\">\r\n";
            if ($flag == 1) {
                echo " alert(\"下架失败!\");\r\n";
            } else {
                echo " alert(\"上架失败!\");\r\n";
            }
            echo " history.back();\r\n";
            echo "</script>";
            exit;
        }
        //exit;
        //$this ->redirect('manager/myware',array('token'=>$token),0,'');

    }

    public function changewarebydate()
    {
        $id=$_GET['sale_id'];
        if(empty($id)){
            Alert("登陆失败.",NULL,"login");
            exit;
        }
        $token = $_GET['token'];
        $ip = get_client_ip();
        $mytoken = md5($ip.$id);
        if (empty($token) || empty($mytoken) || $token != $mytoken) {
            Alert(NULL,NULL,"login");
            exit;
        }
        $this->assign('id', $id);
        $this->assign('token', $token);

        $date = $_GET['date'];

        $ware_id = $_GET['ware_id'];
        $flag = $_GET['flag'];
        $save_flag = array();
        if ($flag == 1) {
            $save_flag['flag'] = 0;
        } else {
            $save_flag['flag'] = 1;
        }
        $user = M('lp_wares');
        $ret = $user->where(array('auto_id' => $ware_id))->save($save_flag);

        if (!empty($ret)) {
            echo "<script language=\"JavaScript\">\r\n";
            if ($flag == 1) {
                echo " alert(\"下架成功!\");\r\n";
            } else {
                echo " alert(\"上架成功!\");\r\n";
            }
            echo "window.location.href='chkwarebydate?token={$token}&sale_id={$id}&date={$date}';\r\n";
            echo "</script>";
            exit;
        } else {
            echo "<script language=\"JavaScript\">\r\n";
            if ($flag == 1) {
                echo " alert(\"下架失败!\");\r\n";
            } else {
                echo " alert(\"上架失败!\");\r\n";
            }
            echo " history.back();\r\n";
            echo "</script>";
            exit;
        }
    }

    public function changewaremore()
    {
        $id=$_GET['sale_id'];
        if(empty($id)){
            Alert("登陆失败.",NULL,"login");
            exit;
        }
        $token = $_GET['token'];
        $ip = get_client_ip();
        $mytoken = md5($ip.$id);
        if (empty($token) || empty($mytoken) || $token != $mytoken) {
            Alert(NULL,NULL,"login");
            exit;
        }
        $this->assign('id', $id);
        $this->assign('token', $token);

        $date1 = $_GET['date1'];
        $date2 = $_GET['date2'];

        $ware_id = $_GET['ware_id'];
        $flag = $_GET['flag'];
        $save_flag = array();
        if ($flag == 1) {
            $save_flag['flag'] = 0;
        } else {
            $save_flag['flag'] = 1;
        }
        $user = M('lp_wares');
        $ret = $user->where(array('auto_id' => $ware_id))->save($save_flag);

        if (!empty($ret)) {
            echo "<script language=\"JavaScript\">\r\n";
            if ($flag == 1) {
                echo " alert(\"下架成功!\");\r\n";
            } else {
                echo " alert(\"上架成功!\");\r\n";
            }
            echo "window.location.href='chkwaremore?token={$token}&sale_id={$id}&date1={$date1}&date2={$date2}';\r\n";
            echo "</script>";
            exit;
        } else {
            echo "<script language=\"JavaScript\">\r\n";
            if ($flag == 1) {
                echo " alert(\"下架失败!\");\r\n";
            } else {
                echo " alert(\"上架失败!\");\r\n";
            }
            echo " history.back();\r\n";
            echo "</script>";
            exit;
        }
    }

    public function editwaremore(){
        $id=$_GET['sale_id'];
        if(empty($id)){
            Alert("登陆失败.",NULL,"login");
            exit;
        }
        $token = $_GET['token'];
        $ip = get_client_ip();
        $mytoken = md5($ip.$id);
        if (empty($token) || empty($mytoken) || $token != $mytoken) {
            Alert(NULL,NULL,"login");
            exit;
        }
        $this->assign('id', $id);
        $this->assign('token', $token);


        $date1 = $_GET['date1'];
        $date2 = $_GET['date2'];
        $this->assign('date1', $date1);
        $this->assign('date2', $date2);


        $ware = D('lp_wares')->where(array('auto_id' => $_GET['ware_id']))->find();
        if ($ware) {
            $time = strtotime($ware['date']);
            $date = date('Y-m-d',$time);
            $this->assign('date', $date);
            $this->assign('ware', $ware);
            $this->display();
            exit;
         }else{
            echo "<script language=\"JavaScript\">\r\n";
            echo " alert(\"商品错误!\");\r\n";
            echo " history.back();\r\n";
            echo "</script>";
            exit;
        }
    }

    public function uploadmore(){
        $id=$_GET['sale_id'];
        if(empty($id)){
            Alert("登陆失败.",NULL,"login");
            exit;
        }
        $token = $_GET['token'];
        $ip = get_client_ip();
        $mytoken = md5($ip.$id);
        if (empty($token) || empty($mytoken) || $token != $mytoken) {
            Alert(NULL,NULL,"login");
            exit;
        }
        $this->assign('id', $id);
        $this->assign('token', $token);

        $date1 = $_GET['date1'];
        $date2 = $_GET['date2'];
        $this->assign('date1', $date1);
        $this->assign('date2', $date2);

        if(!empty($_POST)) {
            $sn = $_POST['sn'];
            if (empty($sn)) {
                $this->display();
                exit;
            }
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 31457280;// 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg', 'pdf');// 设置附件上传类型
            $upload->rootPath = 'home/public/Uploads/'; // 设置附件上传根目录
            $upload->savePath = $sn . '/'; // 设置附件上传（子）目录
            // 上传文件
            $info = $upload->upload();
            if (!$info) {// 上传错误提示错误信息

            } else {// 上传成功
                foreach ($info as $file) {
                    $filename[] = $file['savepath'] . $file['savename'];
                }
            }
            $name = $_POST['name'];
            $in_price = $_POST['in_price'];
            $out_price = $_POST['out_price'];
            $date = $_POST['date'];
            $pic_path = $_POST['pic_path'];
            $finfo = $_POST['info'];
            $other_price = $_POST['other_price'];
            $video_url = $_POST['video_url'];
            $finfo3 = str_replace("\r\n", "<br>", $finfo);

            $ware_id = $_POST['ware_id'];
            if(empty($ware_id)){
                $ware_id=$_GET['ware_id'];
            }
            $user = D('lp_wares');
            $ret = $user->where(array('auto_id' => $ware_id))->find();

            if (empty($ret)) {
                echo "<script language=\"JavaScript\">\r\n";
                echo " alert(\"商品错误!\");\r\n";
                echo " history.back();\r\n";
                echo "</script>";
                exit;
            }


            $ware = array();
            if($name!=$ret['name']){
                $ware[ 'name'] = $name;
            }
            if($sn!=$ret['number']){
                $ware[ 'number'] = $sn;
            }
            if($in_price!=$ret['in_price']){
                $ware[ 'in_price'] = $in_price;
            }
            if($out_price!=$ret['out_price']){
                $ware[ 'out_price'] = $out_price;
            }
            if($other_price!=$ret['other_price']){
                $ware[ 'other_price'] = $other_price;
            }
            if($finfo3!=$ret['factory_info']){
                $ware[ 'factory_info'] = $finfo3;
            }
            if(date("Y-m-d 0:0:0", strtotime($date))!=date("Y-m-d 0:0:0", strtotime($ret['date']))){
                $ware[ 'date'] = $date;
            }
            if(!empty($filename[0])){
                $ware[ 'pic_url'] = $filename[0];
            }
            if($video_url!=$ret['video_url']){
                $ware[ 'video_url'] = $video_url;
            }

            if(!empty($ware)){
                $ware[ 'time'] = time();
                $ret2 = M('lp_wares')->where(array('auto_id' => $ware_id))->save($ware);
                if (empty($ret2)) {
                    echo $ret2;
                    exit;
                }
            }
            $this->assign('ware', $ret);
            $this->assign('filename', $ret['pic_url']);
            $this->display();
        }

    }

    public function myorder(){
        $id=$_GET['sale_id'];
        if(empty($id)){
            Alert("登陆失败.",NULL,"login");
            exit;
        }
        $token = $_GET['token'];
        $ip = get_client_ip();
        $mytoken = md5($ip.$id);
        if (empty($token) || empty($mytoken) || $token != $mytoken) {
            Alert(NULL,NULL,"login");
            exit;
        }
        $this->assign('id', $id);
        $this->assign('token', $token);

        $today = $_POST['date1'];
        $end_time = $_POST['date2'];

        if (empty($today)) {
            $date = date("Y-m-d");
            $today = $date;
            $end_time = $date;
        }

        $this->assign('date1', $today);
        $this->assign('date2', $end_time);

        $today = date("Y-m-d 0:0:0", strtotime($today));
        $end_time = date("Y-m-d 23:59:59", strtotime($end_time));
        $date = array('between', array($today, $end_time));

        $User = M('lp_order myorder,lp_users myuser, lp_wares myware,lp_sales mysale');
        $order=$User->Distinct(true)
            ->where(array(
                'myorder.user_id=myuser.auto_id',
                'myorder.ware_id=myware.auto_id',
                'myorder.sale_id=mysale.auto_id',
                'myorder.time'=>$date))
            ->field('myorder.auto_id as auto_id,
            myorder.time as time,
            myorder.sn as sn,
            myware.name as name,
            myorder.ware_model as model,
            myorder.count as count,
            myorder.winfo as winfo,
            myuser.name as uname,
            myuser.phone as phone,
            myuser.province as pro,
            myuser.city as city,
            myuser.area as area,
            myuser.addr as addr,
            myorder.price as price,
            mysale.name as sname,
            mysale.group_name as group_name,
            myorder.flag as flag')->select();

        if($order) {
            $this->assign('myorder',$order);
        }
        $sum=0;
        for($i=0;$i<count($order);$i++){
            if($order[$i]['flag']==0||$order[$i]['flag']==2) {
                $sum += $order[$i]['price'];
            }
        }
        $this->assign('money',$sum);
        $this->display();
    }

    function makeorder(){
        $id=$_GET['sale_id'];
        if(empty($id)){
            Alert("登陆失败.",NULL,"login");
            exit;
        }
        $token = $_GET['token'];
        $ip = get_client_ip();
        $mytoken = md5($ip.$id);
        if (empty($token) || empty($mytoken) || $token != $mytoken) {
            Alert(NULL,NULL,"login");
            exit;
        }
        $this->assign('id', $id);
        $this->assign('token', $token);

        $order_id = $_GET['order_id'];
        $save_flag = array(
            'flag'=>2
        );
        $user = M('lp_order');
        $ret = $user->where(array('auto_id' => $order_id))->save($save_flag);

        if (!empty($ret)) {
            echo "<script language=\"JavaScript\">\r\n";
            echo " alert(\"订单确认成功!\");\r\n";
            echo "window.location.href='myorder?token={$token}&sale_id={$id}';\r\n";
            echo "</script>";
            exit;
        } else {
            echo "<script language=\"JavaScript\">\r\n";
            echo " alert(\"订单确认失败!\");\r\n";
            echo " history.back();\r\n";
            echo "</script>";
            exit;
        }
    }

    function cancelorder(){
        $id=$_GET['sale_id'];
        if(empty($id)){
            Alert("登陆失败.",NULL,"login");
            exit;
        }
        $token = $_GET['token'];
        $ip = get_client_ip();
        $mytoken = md5($ip.$id);
        if (empty($token) || empty($mytoken) || $token != $mytoken) {
            Alert(NULL,NULL,"login");
            exit;
        }
        $this->assign('id', $id);
        $this->assign('token', $token);

        $order_id = $_GET['order_id'];
        $save_flag = array(
            'flag'=>3
        );

        $user = M('lp_order');
        $ret = $user->where(array('auto_id' => $order_id))->save($save_flag);

        if (!empty($ret)) {
            echo "<script language=\"JavaScript\">\r\n";
            echo " alert(\"订单取消成功!\");\r\n";
            echo "window.location.href='myorder?token={$token}&sale_id={$id}';\r\n";
            echo "</script>";
            exit;
        } else {
            echo "<script language=\"JavaScript\">\r\n";
            echo " alert(\"订单取消失败!\");\r\n";
            echo " history.back();\r\n";
            echo "</script>";
            exit;
        }
    }

    public function mysaleinfo()
    {
        //error_reporting(E_ALL);
        $id=$_GET['sale_id'];
        if(empty($id)){
            Alert(NULL,"登陆失败.","login");
            exit;
        }

        $token = $_GET['token'];
        $ip = get_client_ip();
        $mytoken = md5($ip.$id);

        if (empty($token) || empty($mytoken) || $token != $mytoken) {
            Alert(NULL,NULL,"login");
            exit;
        }
        $this->assign('id', $id);
        $this->assign('token', $token);

        $role = M('lp_sales')->where( array('auto_id'=>$id))->field('role')->find();
        if(!empty($role)){
            $this->assign('role', $role['role']);
            //var_dump($role);
            //exit;
        }

        $qos = array();
        $qos['role']=array('neq',1);
        $userFind = M('lp_sales')->where( $qos)->select();

        $date = date("Y-m-d");
        $this->assign('sales', $userFind);
        $this->display();
    }

    public function chksaleorder(){
        $id=$_GET['sale_id'];
        if(empty($id)){
            Alert("登陆失败.",NULL,"login");
            exit;
        }
        $token = $_GET['token'];
        $ip = get_client_ip();
        $mytoken = md5($ip.$id);
        if (empty($token) || empty($mytoken) || $token != $mytoken) {
            Alert(NULL,NULL,"login");
            exit;
        }
        $this->assign('id', $id);
        $this->assign('token', $token);

        /*
        $today = $_POST['date1'];
        $end_time = $_POST['date2'];

        if (empty($today)) {
            $date = date("Y-m-d");
            $this->assign('date1', $date);
            $this->assign('date2', $date);
            $this->display();
            exit;
        }
        $this->assign('date1',$today);
        $this->assign('date2',$end_time);

        $today = date("Y-m-d 0:0:0", strtotime($today));
        $end_time = date("Y-m-d 23:59:59", strtotime($end_time));
        $date = array('between', array($today, $end_time));
        */
        $sid = $_GET['sid'];
        $User = M('lp_order myorder,lp_users myuser, lp_wares myware');
        $order=$User->Distinct(true)
            ->where(array(
                'myorder.user_id=myuser.auto_id',
                'myorder.ware_id=myware.auto_id',
                'myorder.sale_id'=>$sid))
            ->field('myorder.auto_id as auto_id,
            myorder.time as time,
            myorder.sn as sn,
            myware.name as name,
            myorder.ware_model as model,
            myorder.count as count,
            myuser.name as uname,
            myuser.phone as phone,
            myuser.province as pro,
            myuser.city as city,
            myuser.area as area,
            myuser.addr as addr,
            myorder.price as price,
            myorder.flag as flag')->select();

        if($order) {
            $this->assign('myorder',$order);
        }
        $sum=0;
        for($i=0;$i<count($order);$i++){
            $sum +=$order[$i]['price'];
        }
        $this->assign('money',$sum);
        $this->display();
    }

}
?>