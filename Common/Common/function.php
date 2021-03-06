<?php
use JPush\Client as JPush;
function http($url, $data='', $method='GET'){
    $curl = curl_init(); // 启动一个CURL会话  
    curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址  
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 对认证证书来源的检查  
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); // 从证书中检查SSL加密算法是否存在  
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器  
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转  
    curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer  
    if($method=='POST'){  
        curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求  
        if ($data != ''){  
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // Post提交的数据包  
        }  
    }  
    curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环  
    curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容  
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回  
    $tmpInfo = curl_exec($curl); // 执行操作  
    curl_close($curl); // 关闭CURL会话  
    return $tmpInfo; // 返回数据  
}

function gettopdir($win){
    return "/likeplus/index.php/".$win;
}

function Alert($Str,$Typ,$TopWindow){
    $url = gettopdir($TopWindow);
    if(empty($Str)){
        $Str="网络状态变化，请重新登陆!";
    }
    echo "<script language=\"JavaScript\">\r\n";
    echo " alert(\"{$Str}\");\r\n";
    if($Typ=="back") {
        echo " history.back();\r\n";
    }else {
        echo "window.location.href='$url';\r\n";
    }
    echo "</script>";
}

function checkSurname($user_name)
{
    $array = array( '赵', '钱', '孙', '李', '周', '吴', '郑', '王', '冯', '陈', '楮', '卫', '蒋', '沈', '韩', '杨',
        '朱', '秦', '尤', '许', '何', '吕', '施', '张', '孔', '曹', '严', '华', '金', '魏', '陶', '姜',
        '戚', '谢', '邹', '喻', '柏', '水', '窦', '章', '云', '苏', '潘', '葛', '奚', '范', '彭', '郎',
        '鲁', '韦', '昌', '马', '苗', '凤', '花', '方', '俞', '任', '袁', '柳', '酆', '鲍', '史', '唐',
        '费', '廉', '岑', '薛', '雷', '贺', '倪', '汤', '滕', '殷', '罗', '毕', '郝', '邬', '安', '常',
        '乐', '于', '时', '傅', '皮', '卞', '齐', '康', '伍', '余', '元', '卜', '顾', '孟', '平', '黄',
        '和', '穆', '萧', '尹', '姚', '邵', '湛', '汪', '祁', '毛', '禹', '狄', '米', '贝', '明', '臧',
        '计', '伏', '成', '戴', '谈', '宋', '茅', '庞', '熊', '纪', '舒', '屈', '项', '祝', '董', '梁',
        '杜', '阮', '蓝', '闽', '席', '季', '麻', '强', '贾', '路', '娄', '危', '江', '童', '颜', '郭',
        '梅', '盛', '林', '刁', '锺', '徐', '丘', '骆', '高', '夏', '蔡', '田', '樊', '胡', '凌', '霍',
        '虞', '万', '支', '柯', '昝', '管', '卢', '莫', '经', '房', '裘', '缪', '干', '解', '应', '宗',
        '丁', '宣', '贲', '邓', '郁', '单', '杭', '洪', '包', '诸', '左', '石', '崔', '吉', '钮', '龚',
        '程', '嵇', '邢', '滑', '裴', '陆', '荣', '翁', '荀', '羊', '於', '惠', '甄', '麹', '家', '封',
        '芮', '羿', '储', '靳', '汲', '邴', '糜', '松', '井', '段', '富', '巫', '乌', '焦', '巴', '弓',
        '牧', '隗', '山', '谷', '车', '侯', '宓', '蓬', '全', '郗', '班', '仰', '秋', '仲', '伊', '宫',
        '宁', '仇', '栾', '暴', '甘', '斜', '厉', '戎', '祖', '武', '符', '刘', '景', '詹', '束', '龙',
        '叶', '幸', '司', '韶', '郜', '黎', '蓟', '薄', '印', '宿', '白', '怀', '蒲', '邰', '从', '鄂',
        '索', '咸', '籍', '赖', '卓', '蔺', '屠', '蒙', '池', '乔', '阴', '郁', '胥', '能', '苍', '双',
        '闻', '莘', '党', '翟', '谭', '贡', '劳', '逄', '姬', '申', '扶', '堵', '冉', '宰', '郦', '雍',
        '郤', '璩', '桑', '桂', '濮', '牛', '寿', '通', '边', '扈', '燕', '冀', '郏', '浦', '尚', '农',
        '温', '别', '庄', '晏', '柴', '瞿', '阎', '充', '慕', '连', '茹', '习', '宦', '艾', '鱼', '容',
        '向', '古', '易', '慎', '戈', '廖', '庾', '终', '暨', '居', '衡', '步', '都', '耿', '满', '弘',
        '匡', '国', '文', '寇', '广', '禄', '阙', '东', '欧', '殳', '沃', '利', '蔚', '越', '夔', '隆',
        '师', '巩', '厍', '聂', '晁', '勾', '敖', '融', '冷', '訾', '辛', '阚', '那', '简', '饶', '空',
        '曾', '毋', '沙', '乜', '养', '鞠', '须', '丰', '巢', '关', '蒯', '相', '查', '后', '荆', '红',
        '游', '竺', '权', '逑', '盖', '益', '桓', '公', '仉', '督', '晋', '楚', '阎', '法', '汝', '鄢',
        '涂', '钦', '岳', '帅', '缑', '亢', '况', '后', '有', '琴', '归', '海', '墨', '哈', '谯', '笪',
        '年', '爱', '阳', '佟', '商', '牟', '佘', '佴', '伯', '赏'
    );
    $double_array = array(  "万俟", "司马", "上官", "欧阳", "夏侯", "诸葛", "闻人", "东方", "赫连", "皇甫", "尉迟", "公羊",
        "澹台", "公冶", "宗政", "濮阳", "淳于", "单于", "太叔", "申屠", "公孙", "仲孙", "轩辕", "令狐",
        "锺离", "宇文", "长孙", "慕容", "鲜于", "闾丘", "司徒", "司空", "丌官", "司寇", "子车", "微生",
        "颛孙", "端木", "巫马", "公西", "漆雕", "乐正", "壤驷", "公良", "拓拔", "夹谷", "宰父", "谷梁",
        "段干", "百里", "东郭", "南门", "呼延", "羊舌", "梁丘", "左丘", "东门", "西门", "南宫"
    );

    $first_name = utf8sub($user_name, 1);
    $double_name = utf8sub($user_name, 2);
    if(in_array($first_name,$array) || in_array($double_name, $double_array))
    {
        return true;
    }else{
        return false;
    }
}

/**
 * UTF8字符串截取函数
 * @param type $str
 * @param type $len
 * @return string
 */
function utf8sub($str,$len,$offset=0)
{
    if($len<0){
        return '';
    }
    $res = '';
    // $offset = 0;
    $chars = 0;
    $count = 0;
    $length = strlen($str);//待截取字符串的字节数
    while($chars<$len && $offset<$length){
        $high = decbin(ord(substr($str,$offset,1)));//先截取客串的一个字节，substr按字节进行截取
        //重要突破，已经能够判断高位字节
        if(strlen($high)<8){//英文字符ascii编码长度为7，通过长度小于8来判断
            $count = 1;
            // echo 'hello,I am in','<br>';
        }elseif (substr($high,0,3) == '110') {
            $count = 2;    //取两个字节的长度
        }elseif (substr($high,0,4) == '1110') {
            $count = 3;    //取三个字节的长度
        }elseif (substr($high,0,5) == '11110') {
            $count = 4;

        }elseif (substr($high,0,6) == '111110') {
            $count = 5;
        }elseif(substr($high,0,7)=='1111110'){
            $count = 6;
        }
        $res .= substr($str,$offset,$count);
        $chars +=1;
        $offset += $count;
    }
    return $res;
}

#define("CONF_PATH", dirname(__FILE__)."/Public/dict/");
function parseaddr($mydata)
{
    header('Content-Type: text/html; charset=gbk');
// 加入头文件, 若用第3版则文件名应为 pscws3.class.php
// 分词结果之回调函数 (param: 分好的词组成的数组)
    $dict = CONF_PATH.'dict/dict.xdb';    // 默认采用 xdb (不需其它任何依赖)
    $encode = mb_detect_encoding($mydata, array('UTF-8', 'GB2312', 'GBK'));
    if ($encode == "UTF-8") {
        $mydata = @iconv('UTF-8', 'GB18030', $mydata);
    }

    $mydata = trim($mydata);
    $version = 3;        // 采用版本
    $autodis = true;    // 是否识别名字
    $ignore = false;    // 是否忽略标点
    $debug = false;    // 是否为除错模式
    $stats = false;    // 是否查看统计结果
    $is_cli = (php_sapi_name() == 'cli');    // 是否为 cli 运行环境
    $object = 'PSCWS' . $version;
    require(strtolower($object) . '.class.php');

    $cws = new $object($dict);
    $cws->set_ignore_mark($ignore);
    $cws->set_autodis($autodis);
    $cws->set_debug($debug);
// hightman.060330: 强行开启统计
    $cws->set_statistics($stats);
    $ret = $cws->segment($mydata);
//var_dump($ret);

    $temp = array();
    $index = array();
    $other = array();
    $i = 0;
    $count = count($ret);
    while ($i < $count) {
        //var_dump($ret[$i]);
        $str = @iconv('GB2312', 'UTF-8', $ret[$i]);
        if (strpos($str, '省') !== false) {
            $temp['pro'] = @iconv('UTF-8', 'GB2312', $str);
            $index['pro'] = $i;
            array_push($other, $i);
        }
        if (strpos($str, '市') !== false) {
            $temp['city'] = @iconv('UTF-8', 'GB2312', $str);
            $index['city'] = $i;
            array_push($other, $i);
        }
        if (is_numeric($str) && strlen($str) == 11 && !in_array($i, $other)) {
            $temp['phone'] = $str;
            $index['phone'] = $i;
            array_push($other, $i);
        }
        $i++;
    }
    //var_dump($index);
    $i = 0;
    while ($i < $count) {
        //var_dump($ret[$i]);
        $str = @iconv('GB2312', 'UTF-8', $ret[$i]);
        if (strpos($str, '区') !== false && !in_array($i, $other)) {
            $temp['area'] = @iconv('UTF-8', 'GB2312', $str);
            $index['area'] = $i;
            array_push($other, $i);
            $j = $i - 1;
            //var_dump($j);
            while ($j >= 0) {
                if (!in_array($j, $index)) {
                    $temp['area'] = $ret[$j] . $temp['area'];
                    array_push($other, $j);
                } else {
                    break;
                }
                $j--;
            }
            break;
        }
        $i++;
    }

    $i = 0;
    while ($i < $count) {
        //var_dump($ret[$i]);
        $str = @iconv('GB2312', 'UTF-8', $ret[$i]);
        if (checkSurname($str) == true && ($i == $index['phone'] - 1 || $i == $index['phone'] + 1 || $i == 0)) {
            $temp['name'] = @iconv('UTF-8', 'GB2312', $str);
            $index['name'] = $i;
            array_push($other, $i);
            $j = $i + 1;
            //var_dump($j);
            while ($j < $count) {
                if (!in_array($j, $index)) {
                    $temp['name'] = $temp['name'] . $ret[$j];
                    array_push($other, $j);
                } else {
                    break;
                }
                $j++;
            }
            break;
        }
        $i++;
    }
    //echo "<br><br>";
    //var_dump($ret);
    //echo "<br><br>";
    //var_dump($other);
    //echo "<br><br>";
    $i = 0;
    while ($i < $count) {
        $str = @iconv('GB2312', 'UTF-8', $ret[$i]);
        if (!in_array($i, $other) && ($i == $index['city'] + 1 || $i == $index['area'] + 1)) {
            //var_dump($ret[$i]);
            $temp['addr'] = @iconv('UTF-8', 'GB2312', $str);
            $index['addr'] = $i;
            $j = $i + 1;
            //var_dump($j);
            while ($j < $count) {
                if (!in_array($j, $index)) {
                    $temp['addr'] = $temp['addr'] . $ret[$j];
                } else {
                    break;
                }
                $j++;
            }
            break;
        }
        $i++;
    }

    return $temp;
}

?>