<?php
namespace Home\Controller;
use Tools\HomeController;
use Think\Controller;
class ManagerController extends HomeController {
    public function index(){
        $token = $_GET['token'];
        $ip = get_client_ip();
        $mytoken = md5($ip);
        if(empty($token)||empty($mytoken)||$token!=$mytoken){
            //Alert("网络状态变化，请重新登陆!","login/login","",100);
            //exit;
        }
        $this->assign('token',$token);

        $salesname = $_SESSION['name'];
        $id = $_SESSION['id'];
        $this->assign('salesname', $salesname);
        $userFind=M('lp_sales')->where(array('auto_id'=>$id,'role'=>1))->find();
        if(empty($userFind)){
            //Alert("身份验证失败!","login/login","",100);
            //exit;
        }
        $this->display();
    }

    //自带上传类
    public function upload(){
        $sn = $_POST['sn'];
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     31457280 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg','pdf');// 设置附件上传类型
        $upload->rootPath  =     'home/public/Uploads/'; // 设置附件上传根目录
        $upload->savePath  =     $sn.'/'; // 设置附件上传（子）目录
        // 上传文件
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            echo $upload->getError()."\r\n";
            exit;
        }else{// 上传成功
            foreach($info as $file){
                $filename[]= $file['savepath'].$file['savename'];
            }
        }

        $name = $_POST['name'];
        $in_price = $_POST['in_price'];
        $out_price = $_POST['out_price'];
        $data = $_POST['data'];
        $pic_path = $_POST['pic_path'];
        $video_url= $_POST['video_url'];

        $ware=array(
            'name'=>$name,
            'type'=>1,
            'model'=>0,
            'number'=>$sn,
            'in_price'=>$in_price,
            'out_price'=>$out_price,
            'flag'=>0,
            'factory_info'=>$info,
            'data'=>$data,
            'pic_url'=>$filename[0],
            'pic_path'=>$pic_path,
            'video_url'=>$video_url,

        );
        var_dump($ware);

        $this->assign('filename', $filename);
        $this->display();
    }


    //插件图像上传
    public function uploadify(){
        if (!empty($_FILES)) {
            //图片上传设置
            $config = array(
                'maxSize'    =>    3145728,
                'savePath'   =>    '',
                'saveName'   =>    array('uniqid',''),
                'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
                'autoSub'    =>    true,
                'subName'    =>    array('date','Ymd'),
            );
            $upload = new \Think\Upload($config);// 实例化上传类
            $images = $upload->upload();
            //判断是否有图
            if($images){
                $info=$images['Filedata']['savepath'].$images['Filedata']['savename'];
                //返回文件地址和名给JS作回调用
                echo $info;
            }else{
                $this->error($upload->getError());//获取失败信息
            }
        }
        $model = M('img');
        // 保存当前数据对象
        $data['goods_img'] = $info;
        $model->add($data);
    }
}
?>