<?php
namespace Home\Controller;
use Think\Controller;
class CensusController extends Controller {
    public function saleinfo(){

    }

    public function auto_reg(){

        $census = M('lp_census')->order('group_num asc')->select();

        $count=0;
        foreach ($census as $user){
            $name=$user['name'];
            $phone=$user['phone'];
            $info=$user['group_num'];
            $pwd = substr($phone,5,6);
            $phone2=$user['levl_group'];

            $ret = M('lp_sales')->where(array('phone'=>$phone ))
                ->find();

            if(!empty($ret)){
                $sale_err1[]=$phone;
                continue;
            }

            $ret = M('lp_sales')->where(array('group_name'=>$info))
                ->find();
            if(!empty($ret)){
                $sale_err2[]=$info;
                continue;
            }
            //var_dump($phone2);
            $user = array();
            $ret2 = M('lp_sales')->where(array('group_name'=>$phone2 ))
                ->find();
            if($phone2==0){
                $user['lev1_id'] = 0;
            }
            else{
                if(empty($ret2)){
                    $sale_err3[]=$phone2;
                    continue;
                }else {
                    $user['lev1_id'] = $ret2['auto_id'];
                }
            }

            //var_dump($user['lev1_id']);
            $user['name']=$name;
            $user['group_name']=$info;
            $user['phone']=$phone;
            $user['password']=md5($pwd);
            $user['role']=0;
            //$count++;
            //var_dump($user);
            $ret3 = M('lp_sales')->add($user);

            if(empty($ret3)){
                $sale_err4[]=$name;
            }else{
                $sale_err5[]=$name;
            }
        }
        echo "电话存在";
        echo "<br>";
        var_dump($sale_err1);
        echo "<br>";
        echo "群组存在";
        echo "<br>";
        var_dump($sale_err2);
        echo "<br>";
        echo "推荐人不存在";
        echo "<br>";
        var_dump($sale_err3);
        echo "<br>";
        echo "写入失败";
        echo "<br>";
        var_dump($sale_err4);
        echo "<br>";
        echo "成功注册";
        echo "<br>";
        var_dump($sale_err5);
        exit;
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

        $user=M('lp_sales');
        $userFind =  $user
            ->join('as sale1 left join lp_sales as sale2 on sale1.lev1_id=sale2.auto_id')
            ->where('sale1.group_name>1019')
            ->field('sale1.name as name,
            sale1.phone as phone,
            sale1.group_name as group_num,
            sale2.group_name as levl_group')
            ->order('sale1.group_name asc')->select();

        //var_dump($user->getLastSql());
        //exit;

        $this->assign('sales', $userFind);
        $this->display();
    }
}