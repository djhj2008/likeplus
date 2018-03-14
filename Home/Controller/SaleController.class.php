<?php
namespace Home\Controller;
use Tools\HomeController; 
use Think\Controller;
class SaleController extends HomeController {
    public function index(){
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
		
    public function buyware(){
        $salesname=$_SESSION['name'];
        $this->assign('salesname',$salesname);
        $uid=$_GET['uid'];
        if($uid!=null&&!empty($uid)){
            $users=M('lp_users')->where(array('auto_id'=>$uid))->limit(0,1)->select();

            $pro = $users[0]['province'];
            $city = $users[0]['city'];
            $area = $users[0]['area'];
            $ad = $users[0]['addr'];
            //var_dump($users);
            $user=$users[0]['name']."&nbsp;&nbsp;&nbsp;&nbsp;".$users[0]['phone'];
            $addr=$pro.$city.$area."<br>".$ad;
            if($users) {
                //var_dump($addr);
                $this->assign('user', $user);
                $this->assign('addr', $addr);
            }
        }

        $id=$_GET['ware_id'];
        //var_dump($id);
        $ware=M('lp_wares')->where(array('auto_id'=>$id))->select();
        $this->assign('devSelect',$ware);
        //var_dump($ware);
        $this->assign('ware',$ware);
        $this->display();
    }

    public function userinfo(){
        $salesname=$_SESSION['name'];
        $this->assign('salesname',$salesname);
        $id=$_SESSION['id'];
        $ware_id=$_GET['ware_id'];
        //var_dump($ware_id);
        $users=M('lp_users')->where(array('sale_id'=>$id))->select();
        $this->assign('users',$users);
        $this->assign('ware_id',$ware_id);
        //var_dump($users);
        $this->display();
        //$this ->redirect('sale/buyware.html',array(),0,'');
    }

    public function useredit(){
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

    public function usersave(){
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

    public function useradd(){
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


    public function todayorder(){
        //var_dump($_SESSION);
        $salesname=$_SESSION['name'];
        $this->assign('salesname',$salesname);
        $devSelect=M('lp_sales')->select();
        $this->assign('devSelect',$devSelect);
        //}
        $this->display();
        exit;
    }
}
?>