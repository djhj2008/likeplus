<?php
namespace Home\Controller;
use Tools\HomeController; 
use Think\Controller;
class SaleController extends HomeController {
    public function index(){
        $token = $_GET['token'];
        //var_dump($token);
        $ip = get_client_ip();
        $mytoken = md5($ip);
        //var_dump($mytoken);
        if(empty($token)||empty($mytoken)||$token!=$mytoken){
            //Alert("网络状态变化，请重新登陆!","login/login","",100);
            //exit;
        }
        $this->assign('token',$token);


        $salesname=$_SESSION['name'];
        $this->assign('salesname',$salesname);

        $devSelect=M('lp_sales')->select();
        $wares = M('lp_wares wares, lp_ware_type type')->where('wares.type = type.type and wares.flag = 1')
        ->field('wares.auto_id as id, 
        wares.name as name,
        wares.out_price as out_price,
        wares.other_price as other_price,
        wares.factory_info as info,
        wares.auto_id as id,
        wares.pic_url as pic_url,
        type.name as tname')
        ->order('wares.auto_id desc' )->select();

        $this->assign('wares',$wares);
        $this->display();
    }
    public function login(){
        $this ->redirect('login/login',array(),0,'');
    }

    public function buyware()
    {
        $token = $_GET['token'];
        //var_dump($token);
        $ip = get_client_ip();
        $mytoken = md5($ip);
        //var_dump($mytoken);
        if(empty($token)||empty($mytoken)||$token!=$mytoken){
            //Alert("网络状态变化，请重新登陆!","login/login","",100);
            //exit;
        }
        $this->assign('token',$token);

        $salesname = $_SESSION['name'];
        $this->assign('salesname', $salesname);
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
        $token = $_GET['token'];
        //var_dump($token);
        $ip = get_client_ip();
        $mytoken = md5($ip);
        //var_dump($mytoken);
        if(empty($token)||empty($mytoken)||$token!=$mytoken){
            //Alert("网络状态变化，请重新登陆!","login/login","",100);
            //exit;
        }
        $this->assign('token',$token);

        $salesname=$_SESSION['name'];
        $this->assign('salesname',$salesname);
        $id=$_SESSION['id'];
        $ware_id=$_GET['ware_id'];

        $users=M('lp_users')->where(array('sale_id'=>$id))->select();
        $this->assign('users',$users);
        $this->assign('ware_id',$ware_id);
        //var_dump($users);
        $this->display();
        //$this ->redirect('sale/buyware.html',array(),0,'');
    }

    public function myuserinfo(){
        $token = $_GET['token'];
        //var_dump($token);
        $ip = get_client_ip();
        $mytoken = md5($ip);
        //var_dump($mytoken);
        if(empty($token)||empty($mytoken)||$token!=$mytoken){
            //Alert("网络状态变化，请重新登陆!","login/login","",100);
            //exit;
        }
        $this->assign('token',$token);

        $salesname=$_SESSION['name'];
        $this->assign('salesname',$salesname);
        $id=$_SESSION['id'];
        $ware_id=$_GET['ware_id'];

        $users=M('lp_users')->where(array('sale_id'=>$id))->select();
        $this->assign('users',$users);
        $this->assign('ware_id',$ware_id);
        //var_dump($users);
        $this->display();
        //$this ->redirect('sale/buyware.html',array(),0,'');
    }

    public function useredit(){
        $token = $_GET['token'];
        //var_dump($token);
        $ip = get_client_ip();
        $mytoken = md5($ip);
        //var_dump($mytoken);
        if(empty($token)||empty($mytoken)||$token!=$mytoken){
            //Alert("网络状态变化，请重新登陆!","login/login","",100);
            //exit;
        }
        $this->assign('token',$token);

        $salesname=$_SESSION['name'];
        $this->assign('salesname',$salesname);
        $id=$_SESSION['id'];
        $ware_id=$_GET['ware_id'];
        $uid=$_GET['uid'];

        $user=M('lp_users')->where(array('auto_id'=>$uid))->select();
        $this->assign('user',$user);
        $this->assign('ware_id',$ware_id);
        //var_dump($user);
        $this->display();
        //$this ->redirect('sale/buyware.html',array(),0,'');
    }

    public function myuseredit(){
        $token = $_GET['token'];
        //var_dump($token);
        $ip = get_client_ip();
        $mytoken = md5($ip);
        //var_dump($mytoken);
        if(empty($token)||empty($mytoken)||$token!=$mytoken){
            //Alert("网络状态变化，请重新登陆!","login/login","",100);
            //exit;
        }
        $this->assign('token',$token);

        $salesname=$_SESSION['name'];
        $this->assign('salesname',$salesname);
        $id=$_SESSION['id'];
        $ware_id=$_GET['ware_id'];
        $uid=$_GET['uid'];

        $user=M('lp_users')->where(array('auto_id'=>$uid))->select();
        $this->assign('user',$user);
        //var_dump($user);
        $this->display();
        //$this ->redirect('sale/buyware.html',array(),0,'');
    }

    public function usersave(){
        $token = $_GET['token'];
        //var_dump($token);
        $ip = get_client_ip();
        $mytoken = md5($ip);
        //var_dump($mytoken);
        if(empty($token)||empty($mytoken)||$token!=$mytoken){
            //Alert("网络状态变化，请重新登陆!","login/login","",100);
            //exit;
        }
        $this->assign('token',$token);

        $salesname=$_SESSION['name'];
        $this->assign('salesname',$salesname);
        $id=$_SESSION['id'];
        $ware_id=$_GET['ware_id'];
        $uid=$_GET['uid'];
        if(empty($uid)||empty($ware_id)){
            $this ->redirect('sale/index',array(),0,'');
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
        $this ->redirect('sale/userinfo',array('ware_id'=>$ware_id),0,'');
    }

    public function usersaveonly(){
        $token = $_GET['token'];
        //var_dump($token);
        $ip = get_client_ip();
        $mytoken = md5($ip);
        //var_dump($mytoken);
        if(empty($token)||empty($mytoken)||$token!=$mytoken){
            //Alert("网络状态变化，请重新登陆!","login/login","",100);
            //exit;
        }
        $this->assign('token',$token);

        $salesname=$_SESSION['name'];
        $this->assign('salesname',$salesname);
        $id=$_SESSION['id'];

        $uid=$_GET['uid'];
        if(empty($uid)){
            $this ->redirect('sale/myuserinfo',array(),0,'');
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
        $this ->redirect('sale/myuserinfo',array(),0,'');
    }

    public function myuseradd(){
        $token = $_GET['token'];
        //var_dump($token);
        $ip = get_client_ip();
        $mytoken = md5($ip);
        //var_dump($mytoken);
        if(empty($token)||empty($mytoken)||$token!=$mytoken){
            //Alert("网络状态变化，请重新登陆!","login/login","",100);
            //exit;
        }
        $this->assign('token',$token);

        $salesname=$_SESSION['name'];
        $this->assign('salesname',$salesname);
        $id=$_SESSION['id'];
        if(empty($id)){
            $this ->redirect('login/index',array(),0,'');
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
                $this ->redirect('sale/userinfo',array(),0,'');
            }
        }
        //$this ->redirect('sale/buyware.html',array(),0,'');
    }

    public function useradd(){
        $token = $_GET['token'];
        //var_dump($token);
        $ip = get_client_ip();
        $mytoken = md5($ip);
        //var_dump($mytoken);
        if(empty($token)||empty($mytoken)||$token!=$mytoken){
            //Alert("网络状态变化，请重新登陆!","login/login","",100);
            //exit;
        }
        $this->assign('token',$token);

        $salesname=$_SESSION['name'];
        $this->assign('salesname',$salesname);
        $id=$_SESSION['id'];
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
                $this ->redirect('sale/userinfo',array('ware_id'=>$ware_id),0,'');
            }
        }
        //$this ->redirect('sale/buyware.html',array(),0,'');
    }

    public function addorder(){
        $token = $_GET['token'];
        //var_dump($token);
        $ip = get_client_ip();
        $mytoken = md5($ip);
        //var_dump($mytoken);
        if(empty($token)||empty($mytoken)||$token!=$mytoken){
            //Alert("网络状态变化，请重新登陆!","login/login","",100);
            //exit;
        }
        $this->assign('token',$token);

        $salesname=$_SESSION['name'];
        $this->assign('salesname',$salesname);
        $id=$_SESSION['id'];

        $ware_id=$_GET['ware_id'];
        $uid = $_GET['uid'];
        $count = $_GET['count'];
        $money = $_GET['money'];
        $model = $_GET['model'];
        $this->assign('ware_id',$ware_id);

        $sn = str_pad($id,4,'0',STR_PAD_LEFT);
        $sn = $sn.str_pad($uid,4,'0',STR_PAD_LEFT);
        $time = time();//
        $nowtime = date('YmdHis',$time);//
        $sn =$sn.$nowtime.rand(10,99);

        $ware=M('lp_wares')->where(array('auto_id'=>$ware_id))->select();
        $users=M('lp_users')->where(array('auto_id'=>$uid))->select();
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

        $ret=D('lp_order')->add($order);
        if($ret) {
            $myorder = M('lp_order')->where(array('auto_id' => $ret))->select();
        }
        $this->assign('myorder',$myorder);
        $this->display();
    }

    public function myorder(){
        $token = $_GET['token'];
        //var_dump($token);
        $ip = get_client_ip();
        $mytoken = md5($ip);
        //var_dump($mytoken);
        if(empty($token)||empty($mytoken)||$token!=$mytoken){
            //Alert("网络状态变化，请重新登陆!","login/login","",100);
            //exit;
        }
        $this->assign('token',$token);

        $salesname=$_SESSION['name'];
        $this->assign('salesname',$salesname);
        $id=$_SESSION['id'];

        $today=strtotime(date('Y-m-d 00:00:00'));

        $data = array('egt',$today);
        $User = M('lp_order myorder,lp_users myuser, lp_wares myware');
        $order=$User->Distinct(true)
            ->where(array('myorder.sale_id' => $id,
                'myorder.user_id=myuser.auto_id',
                'myorder.ware_id=myware.auto_id',
                'unix_timestamp(myorder.time)'=>$data))
            ->field('myorder.time as time,
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
        //var_dump($order);
        $this->display();
    }

    public function hisorder(){
        $token = $_GET['token'];
        //var_dump($token);
        $ip = get_client_ip();
        $mytoken = md5($ip);
        //var_dump($mytoken);
        if(empty($token)||empty($mytoken)||$token!=$mytoken){
            //Alert("网络状态变化，请重新登陆!","login/login","",100);
            //exit;
        }
        $this->assign('token',$token);

        $salesname=$_SESSION['name'];
        $this->assign('salesname',$salesname);
        $id=$_SESSION['id'];

        $today=strtotime(date('Y-m-d 00:00:00'));

        $data = array('egt',$today);
        $User = M('lp_order myorder,lp_users myuser, lp_wares myware');
        $order=$User->Distinct(true)
            ->where(array('myorder.sale_id' => $id,
                'myorder.user_id=myuser.auto_id',
                'myorder.ware_id=myware.auto_id'
                ))
            ->field('myorder.time as time,
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
        //var_dump($order);
        $this->display();
    }

    public function todayorder(){
        $salesname=$_SESSION['name'];
        $this->assign('salesname',$salesname);
        $id=$_SESSION['id'];
        $ware_id=$_GET['ware_id'];
        $uid = $_GET['uid'];
        $ware=M('lp_wares')->where(array('auto_id'=>$ware_id))->select();
        $users=M('lp_users')->where(array('auto_id'=>$uid))->select();
        $this->assign('users',$users);
        $this->assign('ware_id',$ware_id);
        $this->display();
    }
}
?>