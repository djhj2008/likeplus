<?php
namespace Home\Controller;
use Tools\HomeController; 
use Think\Controller;

class SaleController extends HomeController {
    public function index(){
        $id=$_GET['sale_id'];
        if(empty($id)){
            Alert("请登陆.",NULL,"login");
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

        $wares = M('lp_wares wares, lp_ware_type type')
            ->where(array('wares.type = type.type ',' wares.flag = 1','wares.date'=>$date))
        ->field('wares.auto_id as id, 
        wares.name as name,
        wares.out_price as out_price,
        wares.other_price as other_price,
        wares.factory_info as info,
        wares.auto_id as wid,
        wares.pic_url as pic_url,
        wares.pic_path as pic_path,
        type.name as tname')
        ->order('wares.date asc' )->select();

        if(empty($wares)){
            $wares = M('lp_wares wares, lp_ware_type type')
                ->where(array('wares.type = type.type ',' wares.flag = 1'))
                ->field('wares.auto_id as id, 
        wares.name as name,
        wares.out_price as out_price,
        wares.other_price as other_price,
        wares.factory_info as info,
        wares.auto_id as wid,
        wares.pic_url as pic_url,
        wares.pic_path as pic_path,
        type.name as tname')
                ->order('wares.date desc' )
                ->limit(3)
                ->select();

        }


        $this->assign('wares',$wares);
        $this->display();
    }

    public function waretop(){
        $id=$_GET['sale_id'];
        if(empty($id)){
            Alert("请登陆.",NULL,"login");
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


        $wares = M('lp_wares wares, lp_ware_type type')
            ->where(array('wares.type = type.type ',' wares.flag = 1'))
            ->field('wares.auto_id as id, 
        wares.name as name,
        wares.out_price as out_price,
        wares.other_price as other_price,
        wares.factory_info as info,
        wares.auto_id as wid,
        wares.pic_url as pic_url,
        wares.pic_path as pic_path,
        type.name as tname')
            ->order('wares.score desc' )->limit(10)->select();

        $this->assign('wares',$wares);
        $this->display();
    }

    public function saleinfo(){
        $id=$_GET['sale_id'];
        if(empty($id)){
            Alert("请登陆.",NULL,"login");
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
            Alert("请登陆.",NULL,"login");
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


    public function hiswarebyname(){
        $id=$_GET['sale_id'];
        if(empty($id)){
            Alert("请登陆.",NULL,"login");
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


        $name = $_POST['name'];

        if(empty($name)){
            $this->display();
            exit;
        }

        $lname = array('like','%'.$name.'%');
        $wares = M('lp_wares wares, lp_ware_type type')
            ->where(array('wares.type = type.type' , 'wares.flag = 1','wares.name'=>$lname))
            ->order('wares.auto_id desc' )
            ->field('wares.name as name,
                     wares.out_price as out_price,
                     wares.number as number,
                     wares.other_price as other_price,
                     wares.factory_info as factory_info,
                     wares.flag as flag,
                     wares.pic_url as pic_url,
                     wares.auto_id as wid,
                     wares.date as date,
                     wares.video_url as video_url')->select();

        $this->assign('wares',$wares);
        $this->display();

    }

    public function hisware()
    {
        $id = $_GET['sale_id'];
        if (empty($id)) {
            Alert("请登陆.", NULL, "login");
            exit;
        }
        $token = $_GET['token'];
        $ip = get_client_ip();
        $mytoken = md5($ip . $id);
        if (empty($token) || empty($mytoken) || $token != $mytoken) {
            Alert(NULL, NULL, "login");
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
            $today = $date;
            $end_time = $date;
            //$this->display();
            //exit;
        }
        $this->assign('date1', $today);
        $this->assign('date2', $end_time);

        $today = date("Y-m-d 0:0:0", strtotime($today));
        $end_time = date("Y-m-d 23:59:59", strtotime($end_time));
        $date = array('between', array($today, $end_time));

        $wares = M('lp_wares wares, lp_ware_type type')
            ->where(array('wares.type = type.type', 'wares.flag = 1', 'wares.date' => $date))
            ->order('wares.auto_id desc')
            ->field('wares.name as name,
                     wares.out_price as out_price,
                     wares.number as number,
                     wares.other_price as other_price,
                     wares.factory_info as factory_info,
                     wares.flag as flag,
                     wares.pic_url as pic_url,
                     wares.pic_path as pic_path,
                     wares.auto_id as wid,
                     wares.date as date,
                     wares.video_url as video_url')->select();

        $this->assign('wares',$wares);
        $this->display();
    }

    public function wareinfo(){
        /*
        $id = $_GET['sale_id'];
        if (empty($id)) {
            Alert("登陆失败.", NULL, "login");
            exit;
        }
        $token = $_GET['token'];
        $ip = get_client_ip();
        $mytoken = md5($ip . $id);
        if (empty($token) || empty($mytoken) || $token != $mytoken) {
            Alert(NULL, NULL, "login");
            exit;
        }
        */
        $id = $_GET['sale_id'];
        $token = $_GET['token'];
        $this->assign('id', $id);
        $this->assign('token', $token);

        $ware_id = $_GET['ware_id'];

        $wares = M('lp_wares wares')
            ->where(array('wares.auto_id'=>$ware_id, 'wares.flag = 1'))
            ->order('wares.auto_id desc')
            ->field('wares.name as name,
                     wares.out_price as out_price,
                     wares.number as number,
                     wares.other_price as other_price,
                     wares.factory_info as factory_info,
                     wares.flag as flag,
                     wares.pic_url as pic_url,
                     wares.pic_path as pic_path,
                     wares.auto_id as wid,
                     wares.date as date,
                     wares.video_url as video_url')->find();

        $photos = explode(";", $wares['pic_path']);

        if (!empty($photos)) {
            foreach ($photos as $photo) {
                if (!empty($photo)) {
                    $pic_path[] = $photo;
                }
            }
        }

        $this->assign('paths',$pic_path);
        $this->assign('ware',$wares);
        $this->display();
    }

    public function login(){
        $this ->redirect('login/login',array(),0,'');
    }

    public function buyware()
    {
        $id=$_GET['sale_id'];
        if(empty($id)){
            Alert("请登陆.",NULL,"login");
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

        $uid = $_GET['uid'];
        if ($uid != null && !empty($uid)) {
            $users = M('lp_users')->where(array('auto_id' => $uid))->limit(0, 1)->select();

            $pro = $users[0]['province'];
            $city = $users[0]['city'];
            $area = $users[0]['area'];
            $ad = $users[0]['addr'];
            //var_dump($users);
            $user = $users[0]['name'] . "&nbsp;&nbsp;&nbsp;&nbsp;" . $users[0]['phone'];
            $addr = $pro . $city . $area . "<br>" . $ad;
            if ($users) {
                //var_dump($addr);
                $this->assign('uid', $uid);
                $this->assign('user', $user);
                $this->assign('addr', $addr);
            }
        }
        $ware_id = $_GET['ware_id'];
        $this->assign('ware_id', $ware_id);
        $ware = D('lp_wares')->where(array('auto_id' => $ware_id))->select();
        if ($ware) {
            //var_dump($ware);
            if($ware[0]['model']==1) {
                $model = D('lp_ware_model')->where(array('ware_id' => $ware_id))->select();
                if (count($model)>0){
                    $this->assign('model', $model);
                }
            }
            $this->assign('ware', $ware);
            $this->display();
        }
    }

    public function userinfo(){
        $id=$_GET['sale_id'];
        if(empty($id)){
            Alert("请登陆.",NULL,"login");
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

        $ware_id=$_GET['ware_id'];
        $users=M('lp_users')->where(array('sale_id'=>$id))->select();
        $this->assign('users',$users);
        $this->assign('ware_id',$ware_id);
        //var_dump($users);
        $this->display();
    }

    public function myuserinfo(){
        $id=$_GET['sale_id'];
        if(empty($id)){
            Alert("请登陆.",NULL,"login");
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

        $ware_id=$_GET['ware_id'];
        $users=M('lp_users')->where(array('sale_id'=>$id))->select();
        $this->assign('users',$users);
        $this->assign('ware_id',$ware_id);
        //var_dump($users);
        $this->display();
    }

    public function useredit(){
        $id=$_GET['sale_id'];
        if(empty($id)){
            Alert("请登陆.",NULL,"login");
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

        $ware_id=$_GET['ware_id'];
        $uid=$_GET['uid'];
        $user=M('lp_users')->where(array('auto_id'=>$uid))->select();
        $this->assign('user',$user);
        $this->assign('ware_id',$ware_id);
        //var_dump($user);
        $this->display();
    }

    public function myuseredit(){
        $id=$_GET['sale_id'];
        if(empty($id)){
            Alert("请登陆.",NULL,"login");
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

        $ware_id=$_GET['ware_id'];
        $uid=$_GET['uid'];
        $user=M('lp_users')->where(array('auto_id'=>$uid))->select();
        $this->assign('user',$user);
        //var_dump($user);
        $this->display();
    }

    public function usersave(){
        $id=$_GET['sale_id'];
        if(empty($id)){
            Alert("请登陆.",NULL,"login");
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

        $ware_id=$_GET['ware_id'];
        $uid=$_GET['uid'];
        if(empty($uid)||empty($ware_id)){
            $this ->redirect('sale/index',array('token'=>$token,'sale_id'=>$id),0,'');
            exit;
        }
        $user=M('lp_users')->where(array('auto_id'=>$uid))->select();
        $name = $_POST['name'];
        $phone = $_POST['number'];
        $pro = $_POST['pro'];
        $ci = $_POST['ci'];
        $ar = $_POST['ar'];
        $ad = $_POST['ad'];
        $user = $user[0];
        $save_user = array();
        if($name!=$user['name']){
            $save_user['name']=$name;
        }
        if($phone!=$user['phone']){
            $save_user['phone']=$phone;
        }
        if($pro!=$user['province']){
            $save_user['province']=$pro;
        }
        if($ci!=$user['city']){
            $save_user['city']=$ci;
        }
        if($ar!=$user['area']){
            $save_user['area']=$ar;
        }
        if($ad!=$user['addr']){
            $save_user['addr']=$ad;
        }
        if(!empty($save_user)) {
            //var_dump($save_user);
            $ret=M('lp_users')->where(array('auto_id'=>$uid))->save($save_user);
            if(empty($ret)) {
                //var_dump($ret);
                exit;
            }else{
                //var_dump($ret);
            }
        }
        $this->assign('uid',$uid);
        $this->assign('ware_id',$ware_id);
        //var_dump($user);
        $this ->redirect('sale/userinfo',array('token'=>$token,'sale_id'=>$id,'uid'=>$uid,'ware_id'=>$ware_id),0,'');
    }

    public function usersaveonly(){
        $id=$_GET['sale_id'];
        if(empty($id)){
            Alert("请登陆.",NULL,"login");
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

        $uid=$_GET['uid'];
        if(empty($uid)){
            $this ->redirect('sale/myuserinfo',array('token'=>$token,'sale_id'=>$id),0,'');
            exit;
        }
        $user=M('lp_users')->where(array('auto_id'=>$uid))->select();
        $name = $_POST['name'];
        $phone = $_POST['number'];
        $pro = $_POST['pro'];
        $ci = $_POST['ci'];
        $ar = $_POST['ar'];
        $ad = $_POST['ad'];
        $user = $user[0];
        $save_user = array();
        if($name!=$user['name']){
            $save_user['name']=$name;
        }
        if($phone!=$user['phone']){
            $save_user['phone']=$phone;
        }
        if($pro!=$user['province']){
            $save_user['province']=$pro;
        }
        if($ci!=$user['city']){
            $save_user['city']=$ci;
        }
        if($ar!=$user['area']){
            $save_user['area']=$ar;
        }
        if($ad!=$user['addr']){
            $save_user['addr']=$ad;
        }
        if(!empty($save_user)) {
            //var_dump($save_user);
            $ret=M('lp_users')->where(array('auto_id'=>$uid))->save($save_user);
            if(empty($ret)) {
                //var_dump($ret);
                exit;
            }else{
                //var_dump($ret);
            }
        }
        $this->assign('uid',$uid);
        //var_dump($user);
        $this ->redirect('sale/myuserinfo',array('token'=>$token,'sale_id'=>$id,'uid'=>$uid),0,'');
    }

    public function myuseradd(){
        $id=$_GET['sale_id'];
        if(empty($id)){
            Alert("请登陆.",NULL,"login");
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

        if(empty($id)){
            $this ->redirect('login/index',array(),0,'');
        }

        $parse = $_POST['parse'];
        if(!empty($parse)){
            $mydata = $_POST['mydata'];
            $ret = parseaddr($mydata);
            $name = @iconv('GB2312', 'UTF-8', $ret['name']);
            $phone = @iconv('GB2312', 'UTF-8', $ret['phone']);
            $pro = @iconv('GB2312', 'UTF-8', $ret['pro']);
            $ci = @iconv('GB2312', 'UTF-8', $ret['city']);
            $ar = @iconv('GB2312', 'UTF-8', $ret['area']);
            $ad = @iconv('GB2312', 'UTF-8', $ret['addr']);

            if(empty($pro)){
                $pro = $ci;
            }

            $this->assign('name',$name);
            $this->assign('phone',$phone);
            $this->assign('pro',$pro);
            $this->assign('ci',$ci);
            $this->assign('ar',$ar);
            $this->assign('ad',$ad);
            $this->assign('sale_id',$id);
            $this->assign('mydata',$mydata);
            $this->display();
            exit;
        }


        $name = $_POST['name'];
        $phone = $_POST['number'];
        $pro = $_POST['pro'];
        $ci = $_POST['ci'];
        $ar = $_POST['ar'];
        $ad = $_POST['ad'];

        if(empty($name)){
            $this->display();
            exit;
        }else{
            $save_user = array();
            $save_user['name']=$name;
            $save_user['phone']=$phone;
            $save_user['province']=$pro;
            $save_user['city']=$ci;
            $save_user['area']=$ar;
            $save_user['addr']=$ad;
            $save_user['sale_id']=$id;
            $ret=D('lp_users')->add($save_user);
            if(empty($ret)){
                $this->display();
            }else{
                $this ->redirect('sale/myuserinfo',array('token'=>$token,'sale_id'=>$id),0,'');
            }
        }
    }

    public function useradd(){
        $id=$_GET['sale_id'];
        if(empty($id)){
            Alert("请登陆.",NULL,"login");
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

        if(empty($id)){
            $this ->redirect('login/index',array(),0,'');
        }
        $ware_id=$_GET['ware_id'];
        $name = $_POST['name'];
        $phone = $_POST['number'];
        $pro = $_POST['pro'];
        $ci = $_POST['ci'];
        $ar = $_POST['ar'];
        $ad = $_POST['ad'];

        if(empty($name)){
            $this->assign('ware_id',$ware_id);
            $this->display();
            exit;
        }else{
            $this->assign('ware_id',$ware_id);
            $save_user = array();
            $save_user['name']=$name;
            $save_user['phone']=$phone;
            $save_user['province']=$pro;
            $save_user['city']=$ci;
            $save_user['area']=$ar;
            $save_user['addr']=$ad;
            $save_user['sale_id']=$id;
            $ret=D('lp_users')->add($save_user);
            if(empty($ret)){
                $this->assign('ware_id',$ware_id);
                $this->display();
            }else{
                $this ->redirect('sale/userinfo',array('token'=>$token,'sale_id'=>$id,'ware_id'=>$ware_id),0,'');
            }
        }
    }

    public function addorder(){
        $id=$_GET['sale_id'];
        if(empty($id)){
            Alert("请登陆.",NULL,"login");
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

        $ware_id=$_GET['ware_id'];
        $uid = $_GET['uid'];

        $count = $_POST['count'];
        $money = $_POST['money'];
        $model = $_POST['model'];
        $winfo = $_POST['winfo'];
        $this->assign('ware_id',$ware_id);

        $sn = str_pad($id,4,'0',STR_PAD_LEFT);
        $sn = $sn.str_pad($uid,4,'0',STR_PAD_LEFT);
        $time = time();//
        $nowtime = date('YmdHis',$time);//
        $sn =$sn.$nowtime.rand(10,99);

        //$ware=M('lp_wares')->where(array('auto_id'=>$ware_id))->select();
        $users=M('lp_users')->where(array('auto_id'=>$uid))->select();
        if(empty($users)){

        }
        $this->assign('users',$users);
        $this->assign('ware_id',$ware_id);

        $order = array(
            'sale_id'=>$id,
            'ware_id'=>$ware_id,
            'count'=>$count,
            'user_id'=>$uid,
            'flag'=>0,
            'sn'=>$sn,
            'price'=>$money,
        );
        if(!empty($model)){
            $order['ware_model']=$model;
        }
        if(!empty($winfo)){
            $order['winfo']=$winfo;
        }

        $ret=D('lp_order')->add($order);
        if($ret) {
            $myorder = M('lp_order')->where(array('auto_id' => $ret))->select();
        }
        $this->assign('myorder',$myorder);
        $this->display();
    }

    public function myorder(){
        $id=$_GET['sale_id'];
        if(empty($id)){
            Alert("请登陆.",NULL,"login");
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

        $User = M('lp_order myorder,lp_users myuser, lp_wares myware');
        $order=$User->Distinct(true)
            ->where(array('myorder.sale_id' => $id,
                'myorder.user_id=myuser.auto_id',
                'myorder.ware_id=myware.auto_id',
                'myorder.time'=>$date))
            ->field('myorder.time as time,
            myorder.auto_id as auto_id,
            myorder.sn as sn,
            myware.name as name,
            myorder.ware_model as model,
            myorder.count as count,
            myorder.winfo as winfo,
            myware.auto_id as wid,
            myuser.name as uname,
            myuser.phone as phone,
            myuser.province as pro,
            myuser.city as city,
            myuser.area as area,
            myuser.addr as addr,
            myware.out_price as out_price,
            myorder.price as price,
            myorder.exid as exid,
            myorder.express as express,
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
        //var_dump($order);
        $this->display();
    }

    public function hisorder(){
        $id=$_GET['sale_id'];
        if(empty($id)){
            Alert("请登陆.",NULL,"login");
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
        $this->assign('date1',$today);
        $this->assign('date2',$end_time);

        $today = date("Y-m-d 0:0:0", strtotime($today));
        $end_time = date("Y-m-d 23:59:59", strtotime($end_time));
        $date = array('between', array($today, $end_time));

        $User = M('lp_order myorder,lp_users myuser, lp_wares myware');
        $order=$User->Distinct(true)
            ->where(array('myorder.sale_id' => $id,
                'myorder.user_id=myuser.auto_id',
                'myorder.ware_id=myware.auto_id',
                'myorder.time'=>$date))
            ->field('myorder.time as time,
            myorder.sn as sn,
            myorder.auto_id as auto_id,
            myware.name as name,
            myware.auto_id as wid,
            myware.out_price as out_price,
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
            myorder.exid as exid,
            myorder.express as express,
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
        $sum2=0;
        for($i=0;$i<count($order);$i++){
            if($order[$i]['flag']==0||$order[$i]['flag']==2) {
                $sum2 += $order[$i]['out_price']*$order[$i]['count'];
            }
        }

        $this->assign('money',$sum);
        $this->assign('money2',$sum2-$sum);

        //var_dump($order);
        $this->display();
    }

    function chkorder(){
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
        $this->assign('date1',$today);
        $this->assign('date2',$end_time);

        $order_id = $_POST['order_id'];
        $flag =  $_POST['flag'];
        $save_flag = array(
            'flag'=>$flag
        );
        $user = M('lp_order');
        $ret = $user->where(array('auto_id' => $order_id))->save($save_flag);

        if($flag==1){
            $str = '取消';
        }else{
            $str = '恢复';
        }


        if (!empty($ret)) {
            echo "<script language=\"JavaScript\">\r\n";
            echo " alert(\"{$str}成功!\");\r\n";
            echo "window.location.href='hisorder?token={$token}&sale_id={$id}&date1={$today}&date2={$end_time}';\r\n";
            echo "</script>";
            exit;
        } else {
            echo "<script language=\"JavaScript\">\r\n";
            echo " alert(\"{$str}失败!\");\r\n";
            echo " history.back();\r\n";
            echo "</script>";
            exit;
        }
    }

    function touch(){
        $id = $_GET['sale_id'];
        $token = $_GET['token'];
        $this->assign('id', $id);
        $this->assign('token', $token);
        $this->display();
    }


    function touch2(){
        $id = $_GET['sale_id'];
        $token = $_GET['token'];
        $this->assign('id', $id);
        $this->assign('token', $token);
        $this->display();
    }

    function mysaleinfo(){
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

        $beginThismonth=mktime(0,0,0,date('m'),1,date('Y'));
        $endThismonth=mktime(23,59,59,date('m'),date('t'),date('Y'));
        $begin= date("Y-m-d 0:0:0", $beginThismonth);
        $end = date("Y-m-d 23:59:59", $endThismonth);

        $date = date("Y-m-d");
        $timestamp=strtotime($date);
        $firstday=date('Y-m-01 0:0:0',strtotime(date('Y',$timestamp).'-'.(date('m',$timestamp)-1).'-01'));
        $lastday=date('Y-m-d 23:59:59',strtotime("$firstday +1 month -1 day"));

        $month = date('m',strtotime(date('Y',$timestamp).'-'.(date('m',$timestamp)-1).'-01'));

        $date = array('between',array($begin,$end));
        $pre_date = array('between',array($firstday,$lastday));

        $User = M('lp_order');
        //$orders = $user->where(array('sale_id' =>$id ,date_format('time','%Y-%m')=>$this_month))->select();
        $orders=$User->table('lp_order myorder')
            ->join('LEFT JOIN lp_users myuser on myorder.user_id=myuser.auto_id')
            ->join('LEFT JOIN lp_wares myware on myorder.ware_id=myware.auto_id')
            ->join('LEFT JOIN lp_sales mysale on myorder.sale_id=mysale.auto_id')
            ->where(array(
                'myorder.sale_id'=>$id,
                'myorder.flag'=>2,
                'myorder.time'=>$date,
                ))
            ->field('myorder.auto_id as auto_id,
            myorder.time as time,
            myorder.sn as sn,
            myware.name as name,
            myorder.ware_model as model,
            myorder.count as count,
            myware.out_price as out_price,
            myorder.winfo as winfo,
            myuser.name as uname,
            myuser.phone as phone,
            myuser.province as pro,
            myuser.city as city,
            myuser.area as area,
            myuser.addr as addr,
            myorder.price as price,
            mysale.auto_id as sid,
            mysale.name as sname,
            mysale.group_name as group_name,
            myorder.express as express,
            myorder.flag as flag')
            ->select();

        $pre_orders=$User->table('lp_order myorder')
            ->join('LEFT JOIN lp_users myuser on myorder.user_id=myuser.auto_id')
            ->join('LEFT JOIN lp_wares myware on myorder.ware_id=myware.auto_id')
            ->join('LEFT JOIN lp_sales mysale on myorder.sale_id=mysale.auto_id')
            ->where(array(
                'myorder.sale_id'=>$id,
                'myorder.flag'=>2,
                'myorder.time'=>$pre_date,
            ))
            ->field('myorder.auto_id as auto_id,
            myorder.time as time,
            myorder.sn as sn,
            myware.name as name,
            myorder.ware_model as model,
            myorder.count as count,
            myware.out_price as out_price,
            myorder.winfo as winfo,
            myuser.name as uname,
            myuser.phone as phone,
            myuser.province as pro,
            myuser.city as city,
            myuser.area as area,
            myuser.addr as addr,
            myorder.price as price,
            mysale.auto_id as sid,
            mysale.name as sname,
            mysale.group_name as group_name,
            myorder.express as express,
            myorder.flag as flag')
            ->select();

        $sum_all=0;
        $sum_pay=0;
        $sum_type1=0;
        $sum_type2=0;
        $sum_type3=0;
        $sum_type4=0;
        $sum_type5=0;
        $sum_type6=0;
        $sum_type7=0;
        $sum_type8=0;

        foreach ($orders as $order ){
            $sum_all+=$order['out_price']*$order['count'];
            $sum_pay+=$order['price'];
            if($order['type']==1){
                $sum_type1+=$order['out_price']*$order['count'];
            }else if($order['type']==2){
                $sum_type2+=$order['out_price']*$order['count'];
            }else if($order['type']==3){
                $sum_type3+=$order['out_price']*$order['count'];
            }else if($order['type']==4){
                $sum_type4+=$order['out_price']*$order['count'];
            }else if($order['type']==5){
                $sum_type5+=$order['out_price']*$order['count'];
            }else if($order['type']==6){
                $sum_type6+=$order['out_price']*$order['count'];
            }else if($order['type']==7){
                $sum_type7+=$order['out_price']*$order['count'];
            }else if($order['type']==8){
                $sum_type8+=$order['out_price']*$order['count'];
            }
        }
        $sum_get = $sum_all-$sum_pay;

        $pre_sum_all=0;
        $pre_sum_pay=0;

        foreach ($pre_orders as $pre_order ){
            $pre_sum_all+=$pre_order['out_price']*$pre_order['count'];
            $pre_sum_pay+=$pre_order['price'];
        }

        $pre_sum_get = $pre_sum_all-$pre_sum_pay;

        $types = M('lp_ware_type')->select();

        $this->assign('types', $types);
        $this->assign('orders', $orders);
        $this->assign('month', $month);
        $this->assign('sum_all', $sum_all);
        $this->assign('sum_pay', $sum_pay);
        $this->assign('sum_get', $sum_get);
        $this->assign('sum_type1', $sum_type1);
        $this->assign('sum_type2', $sum_type2);
        $this->assign('sum_type3', $sum_type3);
        $this->assign('sum_type4', $sum_type4);
        $this->assign('sum_type5', $sum_type5);
        $this->assign('sum_type6', $sum_type6);
        $this->assign('sum_type7', $sum_type7);
        $this->assign('sum_type8', $sum_type8);

        $this->assign('pre_orders', $pre_orders);
        $this->assign('pre_sum_all', $pre_sum_all);
        $this->assign('pre_sum_pay', $pre_sum_pay);
        $this->assign('pre_sum_get', $pre_sum_get);
        $this->display();
    }
}
?>