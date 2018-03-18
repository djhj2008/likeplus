<?php
namespace Home\Controller;
use Tools\HomeController; 
use Think\Controller;
class SaleController extends HomeController {
    public function index(){
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

    public function hisware(){
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

        $wares = M('lp_wares wares, lp_ware_type type')->where(array('wares.type = type.type' , 'wares.flag = 1','wares.date'=>$date))
                ->order('wares.auto_id desc' )->select();

        $this->assign('wares',$wares);
        $this->display();
    }

    public function login(){
        $this ->redirect('login/login',array(),0,'');
    }

    public function buyware()
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
        $this ->redirect('sale/userinfo',array('token'=>$token,'sale_id'=>$id,'uid'=>$uid,'ware_id'=>ware_id),0,'');
    }

    public function usersaveonly(){
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
                $this ->redirect('sale/myuserinfo',array('token'=>$token,'sale_id'=>$id),0,'');
            }
        }
    }

    public function useradd(){
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

        //$ware=M('lp_wares')->where(array('auto_id'=>$ware_id))->select();
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

        $User = M('lp_order myorder,lp_users myuser, lp_wares myware');
        $order=$User->Distinct(true)
            ->where(array('myorder.sale_id' => $id,
                'myorder.user_id=myuser.auto_id',
                'myorder.ware_id=myware.auto_id',
                'myorder.time'=>$date))
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

        $User = M('lp_order myorder,lp_users myuser, lp_wares myware');
        $order=$User->Distinct(true)
            ->where(array('myorder.sale_id' => $id,
                'myorder.user_id=myuser.auto_id',
                'myorder.ware_id=myware.auto_id',
                'myorder.time'=>$date))
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
}
?>