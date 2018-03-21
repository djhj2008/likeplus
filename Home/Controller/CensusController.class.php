<?php
namespace Home\Controller;
use Think\Controller;
class CensusController extends Controller {
    public function saleinfo(){

    }

    public function regsale(){
        if(!empty($_POST)){
            $name=$_POST['name'];
            $phone=$_POST['number'];
            $info=$_POST['info'];
            $phone2=$_POST['number2'];

            $ret = M('lp_census')->where(array('phone'=>$phone ))
                ->find();

            if(!empty($ret)){
                Alert("手机已被注册.",NULL,"Census/regsale");
                exit;
            }
            $user = array();
            $user['name']=$name;
            $user['group_num']=$info;
            $user['phone']=$phone;
            $user['levl_group']=$phone2;
            $ret3 = M('lp_census')->add($user);
            if(empty($ret3)){
                Alert("注册失败.",NULL,"Census/regsale");
                exit;
            }else{
                echo "<script language=\"JavaScript\">\r\n";
                echo " alert(\"注册成功.\");\r\n";
                echo "</script>";
            }
        }
        $this->display();
    }

    public function mysaleinfo()
    {

        $userFind = M('lp_census')->order('group_num desc')->select();
        $this->assign('sales', $userFind);
        $this->display();
    }
}