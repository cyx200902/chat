<?php
error_reporting(0);
session_start();
define('BASE_PATH',str_replace('\\','/',dirname(__FILE__))."/");
define('ROOT_PATH',str_replace('app/','',BASE_PATH));
define('MSGFILE','app/MSG.txt'); 
define('NUMFILE','app/NUM.txt'); 
define('KEYS','bskdl87'); 
define('LSTR','7alk');
date_default_timezone_set('PRC');
function nick($user=''){
if(empty($user)){ 
    $name=rand_nick();
}else{
    $name = $user;
} 
    $arr['msg'] = '<span>'.date('Y-m-d H:i').'</span>';
	$arr['type']= 'sys';
	$str = json_encode($arr);
	$arr['msg'] = '<span class="tips-warning">系统消息：<strong>'.$name.'</strong>进入聊天室</span>';
	$arr['type']= 'sys';
	$str = $str."\n".json_encode($arr);
	file_put_contents(ROOT_PATH.MSGFILE, $str."\n" , FILE_APPEND|LOCK_EX);
	$key = uniqid();
    setcookie(KEYS.'_key',$key,time()+3600*24*90,'/');
    setcookie(KEYS.'_name',urlencode($name),time()+3600*24*30,'/');
    return array('name'=>$name,'key'=>$key); //输出生成的昵称
} 

function rand_nick(){
  $name_tou=array('快乐的','冷静的','醉熏的','潇洒的','糊涂的','积极的','冷酷的','深情的','粗暴的','温柔的','可爱的','愉快的','义气的','认真的','威武的','帅气的','传统的','潇洒的','漂亮的','自然的','专一的','听话的','昏睡的','狂野的','等待的','搞怪的','幽默的','魁梧的','活泼的','开心的','高兴的','超帅的','坦率的','直率的','轻松的','痴情的','完美的','精明的','无聊的','丰富的','繁荣的','饱满的','炙热的','暴躁的','碧蓝的','俊逸的','英勇的','健忘的','故意的','无心的','土豪的','朴实的','兴奋的','幸福的','淡定的','不安的','阔达的','孤独的','独特的','疯狂的','时尚的','落后的','风趣的','忧伤的','大胆的','爱笑的','矮小的','健康的','合适的','玩命的','沉默的','斯文的','任性的','细心的','粗心的','大意的','甜甜的','酷酷的','健壮的','英俊的','霸气的','阳光的','默默的','大力的','孝顺的','忧虑的','着急的','紧张的','善良的','凶狠的','害怕的','重要的','危机的','欢喜的','欣慰的','满意的','跳跃的','诚心的','称心的','如意的','怡然的','娇气的','无奈的','无语的','激动的','愤怒的','美好的','感动的','激情的','激昂的','震动的','虚拟的','超级的','寒冷的','精明的','明理的','犹豫的','忧郁的','寂寞的','奋斗的','勤奋的','现代的','过时的','稳重的','热情的','含蓄的','开放的','无辜的','多情的','纯真的','拉长的','热心的','从容的','体贴的','风中的','曾经的','追寻的','儒雅的','优雅的','开朗的','外向的','内向的','清爽的','文艺的','长情的','平常的','单身的','伶俐的','高大的','懦弱的','柔弱的','爱笑的','乐观的','耍酷的','酷炫的','神勇的','年轻的','唠叨的','瘦瘦的','无情的','包容的','顺心的','畅快的','舒适的','靓丽的','负责的','背后的','简单的','谦让的','彩色的','缥缈的','欢呼的','生动的','复杂的','慈祥的','仁爱的','魔幻的','虚幻的','淡然的','受伤的','雪白的','高高的','糟糕的','顺利的','闪闪的','羞涩的','缓慢的','迅速的','优秀的','聪明的','含糊的','俏皮的','淡淡的','坚强的','平淡的','欣喜的','能干的','灵巧的','友好的','机智的');

  $name_wei=array('嚓茶','凉面','便当','毛豆','花生','可乐','灯泡','野狼','背包','眼神','缘分','雪碧','人生','牛排','蚂蚁','飞鸟','灰狼','斑马','汉堡','悟空','巨人','绿茶','大碗','墨镜','魔镜','煎饼','月饼','月亮','星星','芝麻','啤酒','玫瑰','大叔','小伙','太阳','树叶','芹菜','黄蜂','蜜粉','蜜蜂','信封','西装','外套','裙子','大象','猫咪','母鸡','路灯','蓝天','白云','星月','彩虹','微笑','摩托','板栗','高山','大地','大树','砖头','楼房','水池','鸡翅','蜻蜓','红牛','咖啡','枕头','大船','诺言','钢笔','刺猬','天空','飞机','大炮','冬天','洋葱','春天','夏天','秋天','冬日','航空','毛衣','豌豆','黑米','玉米','眼睛','老鼠','白羊','帅哥','美女','季节','鲜花','服饰','裙子','秀发','大山','火车','汽车','歌曲','舞蹈','老师','导师','方盒','大米','麦片','水杯','水壶','手套','鞋子','鼠标','手机','电脑','书本','奇迹','身影','香烟','夕阳','台灯','宝贝','未来','皮带','钥匙','心锁','故事','花瓣','滑板','画笔','画板','学姐','店员','电源','饼干','宝马','过客','大白','时光','石头','钻石','河马','犀牛','西牛','绿草','抽屉','柜子','往事','寒风','路人','橘子','耳机','鸵鸟','朋友','苗条','铅笔','钢笔','硬币','热狗','大侠','御姐','萝莉','毛巾','期待','盼望','白昼','黑夜','大门','黑裤','哑铃','板凳','枫叶','荷花','乌龟','衬衫','大神','草丛','早晨','心情','茉莉','流沙','蜗牛','猎豹','棒球','篮球','乐曲','电话','网络','世界','中心','老虎','鸭子','羽毛','翅膀','外套','书包','钢笔','冷风','烤鸡','大雁','音响','招牌','冰棍','帽子');
  $t=rand(0,199);
  $w=rand(0,199);
  $name=$name_tou[$t].$name_wei[$w];
  return $name;
}
function logmsg($b, $msg = '操作成功！')
{
    if ($b > 0) {
        $arr['result'] = 200;
        $arr['message'] = $msg;
    } else {
        $arr['result'] = 500;
        if (empty($msg)) {
            $arr['message'] = '操作失败！';
        } else {
            $arr['message'] = $msg;
        }
    }
    $arr['id'] = $b;
    echo json_encode($arr);
    exit;
}
 

function get_token(){
  if(empty($_SESSION[KEY.'token'])){
      $token = md5(uniqid(rand(), true));
      $_SESSION[KEY.'token'] = $token;
  }else{
     $token = $_SESSION[KEY.'token'];
  }
  setcookie(md5(KEY.'token'),$token,time()+3600*24,'/');
  return $token;
}

function check_post($arr,$config=array()){
	$now = time();
    $token = $_COOKIE[md5(KEY.'token')];	
	if(empty($token) or $token !=  $_SESSION[KEY . 'token']){
	   return false;
	}	
	return true;
}