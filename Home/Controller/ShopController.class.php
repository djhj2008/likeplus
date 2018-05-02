<?php
namespace Home\Controller;
use Think\Controller;
class ShopController extends Controller {
    public function index(){

        $banner = D('lp_banner')->limit(3)->select();

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

        $today=date('Y-m-d 00:00:00',time());
        $end_time = date("Y-m-d H:i:s", strtotime($today) + 86400 - 1);
        $date = array('between', array($today, $end_time));

        $wares2 = M('lp_wares wares, lp_ware_type type')
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

        if(empty($wares2)){
            $wares2 = M('lp_wares wares, lp_ware_type type')
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
                ->limit(2)
                ->select();

        }

        $this->assign('banner',$banner);
        $this->assign('wares',$wares);
        $this->assign('wares2',$wares2);
        $this->display();
    }
}