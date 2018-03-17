<?php
namespace Home\Controller;
use Tools\HomeController;
use Think\Controller;
class ManagerController extends HomeController
{
    public function index()
    {
        $token = $_GET['token'];
        $ip = get_client_ip();
        $mytoken = md5($ip);
        if (empty($token) || empty($mytoken) || $token != $mytoken) {
            //Alert("网络状态变化，请重新登陆!","login/login","",100);
            //exit;
        }
        $this->assign('token', $token);
        $salesname = $_SESSION['name'];
        $id = $_SESSION['id'];
        $this->assign('salesname', $salesname);
        $userFind = M('lp_sales')->where(array('auto_id' => $id, 'role' => 1))->find();
        if (empty($userFind)) {
            //Alert("身份验证失败!","login/login","",100);
            //exit;
        }
        $date = date("Y-m-d");
        $this->assign('date', $date);
        $this->display();
    }

    //自带上传类
    public function upload()
    {
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
            echo "<script language=\"JavaScript\">\r\n";
            echo " alert(\"请选择上传图片!\");\r\n";
            echo " history.back();\r\n";
            echo "</script>";
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
            'type' => 1,
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
        $token = $_GET['token'];
        //var_dump($token);
        $ip = get_client_ip();
        $mytoken = md5($ip);
        //var_dump($mytoken);
        if (empty($token) || empty($mytoken) || $token != $mytoken) {
            //Alert("网络状态变化，请重新登陆!","login/login","",100);
            //exit;
        }
        $this->assign('token', $token);

        $salesname = $_SESSION['name'];
        $this->assign('salesname', $salesname);
        $id = $_SESSION['id'];

        $time = strtotime(date('Y-m-d 00:00:00'), time());
        $end_time = date("Y-m-d", $time + 86400 - 1);
        $today = date("Y-m-d", $time);
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
        $token = $_GET['token'];
        //var_dump($token);
        $ip = get_client_ip();
        $mytoken = md5($ip);
        //var_dump($mytoken);
        if (empty($token) || empty($mytoken) || $token != $mytoken) {
            //Alert("网络状态变化，请重新登陆!","login/login","",100);
            //exit;
        }
        $this->assign('token', $token);

        $salesname = $_SESSION['name'];
        $this->assign('salesname', $salesname);
        $id = $_SESSION['id'];

        $today = $_POST['date'];
        $end_time = date("Y-m-d", strtotime($today) + 86400 - 1);
        $date = array('between', array($today, $end_time));

        if (empty($today)) {
            $date = date("Y-m-d");
            $this->assign('date', $date);
            $this->display();
            exit;
        }
        $user = M('lp_wares');
        $wares = $user->where(array('date' => $date))->select();
        //var_dump($user->getLastSql());

        if ($wares) {
            $this->assign('dateware', $wares);
        }
        $this->assign('date', $today);
        $this->display();
    }

    public function chkwaremore()
    {
        $token = $_GET['token'];
        //var_dump($token);
        $ip = get_client_ip();
        $mytoken = md5($ip);
        //var_dump($mytoken);
        if (empty($token) || empty($mytoken) || $token != $mytoken) {
            //Alert("网络状态变化，请重新登陆!","login/login","",100);
            //exit;
        }
        $this->assign('token', $token);

        $salesname = $_SESSION['name'];
        $this->assign('salesname', $salesname);
        $id = $_SESSION['id'];

        $today = $_POST['date1'];
        $end_time = $_POST['date2'];
        $date = array('between', array($today, $end_time));

        if (empty($today)) {
            $date = date("Y-m-d");
            $this->assign('date1', $date);
            $this->assign('date2', $date);
            $this->display();
            exit;
        }
        $user = M('lp_wares');
        $wares = $user->where(array('date' => $date))->select();
        //var_dump($user->getLastSql());

        if ($wares) {
            $this->assign('dateware', $wares);
        }
        $this->assign('date1', $today);
        $this->assign('date2', $end_time);
        $this->display();
    }

    public function changeware()
    {
        $token = $_GET['token'];
        //var_dump($token);
        $ip = get_client_ip();
        $mytoken = md5($ip);
        //var_dump($mytoken);
        if (empty($token) || empty($mytoken) || $token != $mytoken) {
            Alert("网络状态变化，请重新登陆!", "login/login", "", 100);
            //exit;
        }

        $this->assign('token', $token);

        $salesname = $_SESSION['name'];
        $this->assign('salesname', $salesname);
        $id = $_SESSION['id'];
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
            echo "window.location.href='myware?token={$token}';\r\n";
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
        $token = $_GET['token'];
        //var_dump($token);
        $ip = get_client_ip();
        $mytoken = md5($ip);
        //var_dump($mytoken);
        if (empty($token) || empty($mytoken) || $token != $mytoken) {
            Alert("网络状态变化，请重新登陆!", "login/login", "", 100);
            //exit;
        }

        $this->assign('token', $token);

        $salesname = $_SESSION['name'];
        $this->assign('salesname', $salesname);
        $id = $_SESSION['id'];
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
            echo "window.location.href='mywarebydate?token={$token}';\r\n";
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

    public function changewaremore()
    {
        $token = $_GET['token'];
        //var_dump($token);
        $ip = get_client_ip();
        $mytoken = md5($ip);
        //var_dump($mytoken);
        if (empty($token) || empty($mytoken) || $token != $mytoken) {
            Alert("网络状态变化，请重新登陆!", "login/login", "", 100);
            //exit;
        }

        $this->assign('token', $token);

        $salesname = $_SESSION['name'];
        $this->assign('salesname', $salesname);
        $id = $_SESSION['id'];
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
            echo "window.location.href='mywaremore?token={$token}';\r\n";
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
}
?>