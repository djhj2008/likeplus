<?php
namespace Home\Controller;
use Tools\HomeController; 
use Think\Controller;
class LoginController extends HomeController {
		public function register(){
			$this->display();
		}

		public function login(){
            $ip = get_client_ip();
			if($_POST['name'] && $_POST['password']){
				$pwd   =trim($_POST['password']);
				$phone  =trim($_POST['name']);

				$phoneFind=M('lp_sales')->where(array('phone'=>$phone))->find();
				//var_dump($phoneFind);
				if($phoneFind==NULL){
                    echo "<script language=\"JavaScript\">\r\n";
                    echo " alert(\"未注册用户，请联系管理员!\");\r\n";
                    echo " history.back();\r\n";
                    echo "</script>";
                    $this->display();
                    exit;
				}
                $nameArr=array(
                    'phone'=>$phone,
                    'password'=>md5($pwd)
                    );
                $userFind=M('lp_sales')->where($nameArr)->find();
                if($userFind) {
                    $token = md5($ip.$userFind['auto_id']);
                    if($userFind['role']==1) {
                        $this->redirect('manager/index', array('token' => $token,'sale_id'=>$userFind['auto_id']), 0, '');
                    }else{
                        S('token',$token,600000);
                        S('sale_id',$userFind['auto_id'],600000);
                        $this->redirect('shop/index', array(), 0, '');
                    }
				}else{
						$jarr=array('ret'=>array('ret_message'=>'register error','status_code'=>10000107));
                        //echo json_encode(array('UserInfo'=>$jarr));
                         echo "<script language=\"JavaScript\">\r\n";
                         echo " alert(\"密码错误!\");\r\n";
                         echo " history.back();\r\n";
                         echo "</script>";
                         $this->display();
                         exit;
				}
			}
			$this->display();
		}
		
		
			//ajax判断普通用户名
    public function CheckName(){
            $name = addslashes($_GET['name']);
            $exists = D('enduser')->where("enduser_phone_name='$name'")->find();
            if($name==""){
                echo "<span style='color:blue'>用户名不能为空</span>";
            }else if($name=='root' || $exists){
                echo "<span style='color:red'>该用户名已经被占用</span>";
            }else if($exists==null){
                echo "<span style='color:blue'>恭喜！用户名可以使用</span>";
            }
    }

    public function CheckNamesal(){
            $name = addslashes($_GET['name']);
            $exists = D('lp_sales')->where("name='$name'")->find();
            if($name==""){
                echo "<span style='color:blue'>用户名不能为空</span>";
            }else if($exists){
                echo "<span style='color:red'>该用户名已经被占用</span>";
            }else if($exists==null){
                echo "<span style='color:blue'>恭喜！用户名可以使用</span>";
            }
    }

    //ajax判断密码
    function paword(){
        $wd = addslashes($_GET['name']);
        
        if($wd==""){
            echo"<span style='color:red'>密码不能为空</span>";
        }else if(!$wd==null){
            $score = 0;
           if(preg_match("/[0-9]+/",$wd))
           {
              $score ++; 
           }
           if(preg_match("/[0-9]{3,}/",$wd))
           {
              $score ++; 
           }
           if(preg_match("/[a-z]+/",$wd))
           {
              $score ++; 
           }
           if(preg_match("/[a-z]{3,}/",$wd))
           {
              $score ++; 
           }
           if(preg_match("/[A-Z]+/",$wd))
           {
              $score ++; 
           }
           if(preg_match("/[A-Z]{3,}/",$wd))
           {
              $score ++; 
           }
           if(preg_match("/[_|\-|+|=|*|!|@|#|$|%|^|&|(|)]+/",$wd))
           {
              $score += 2; 
           }
           if(preg_match("/[_|\-|+|=|*|!|@|#|$|%|^|&|(|)]{3,}/",$wd))
           {
              $score ++ ; 
           }
           if(strlen($wd) >= 10)
           {
              $score ++; 
           }
           
           echo "<span style='color:blue'>请输入复杂的密码,你的密码级别为{$score}级</span>";
        }else if($wd==null){
            echo"<span style='color:red'>密码不能为空.</span>";
        }
    }

    //ajax判断手机号
    public function checkshouji(){
        $ph = addslashes($_GET['name']);
        $exists = D('lp_sales')->where("phone='$ph'")->find();
        if($ph==""){
            echo"<span style='color:red'>手机号不能为空</span>";
        }else if(!preg_match('/^1[34578]\d{9}$/',$ph)){
            echo "<span style='color:red'>请填写正确的手机号</span>";
        }else if($exists==null){
            echo"<span style='color:blue'>恭喜！可以使用</span>";
        }else{
            echo"<span style='color:red'>该手机号已经被占用</span>";
        }
    }


    public function checkshoujisal(){
        $ph = addslashes($_GET['name']);
        $exists = D('lp_sales')->where("phone='$ph'")->find();
        if($ph==""){
            echo"<span style='color:red'>手机号不能为空</span>";
        }else if(!preg_match('/^1[34578]\d{9}$/',$ph)){
            echo "<span style='color:red'>请填写正确的手机号</span>";
        }else if($exists==null){
            echo"<span style='color:blue'>恭喜！可以使用</span>";
        }else{
            echo"<span style='color:red'>该手机号已经被占用</span>";
        }
    }
}

?>