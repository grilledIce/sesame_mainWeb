<?php 
header("Content-type:text/html;charset=utf-8");
$hostname = $_SERVER["HTTP_HOST"]; 
define('HTTP_HOST', 'http://'.$hostname);
define('CONF',[ '//'.$hostname.'/static/','//'.$hostname.'/']);
//define('CONF',[ HTTP_HOST.'/static/']);
ini_set('date.timezone','Asia/Shanghai');
if(checkrobot()){
    define('rebort',1);
}else{
    define('rebort',2);
}
if(isMobile()){
    define('platform','mobileDevice');
}
else
{
    define('platform','');
}
$language = $_GET['lan'] ?? '';
if($language){
    $language = $language == 'cn' ? 'cn' : 'en';
    setcookie('lang',$language, time()+3600*24*365);
}
else{
    if(!isset($_COOKIE['lang'])){
        $language = 'en';
        setcookie('lang',$language, time()+3600*24*365);
    }
    else{
        $language = $_COOKIE['lang'] == 'cn' ? 'cn' : 'en';
    }
}


define('LANG',require(dirname(__FILE__).'/lang/'.$language.'.php'));

$lan = '';

define('language',$language);

$page = $_GET['p'] ?? '';
$page = strtolower($page);
if($page == 'success'){
    get_file('../html/success','.html');
    die;
}
if($page == 'error'){
    get_file('../html/error','.html');
    die;
}

if($page == strtolower('community-list')){
    get_file('../community/index');
}
else{
    $Menu = [
        'Index'         =>['title'=>LANG['clients'],'cls'=>'','id'=>'','list'=>[]],
        'Realtors'      =>['title'=>LANG['realtors'],'cls'=>'','id'=>'id_realtorsPage','list'=>[]],
        'Community'     =>['title'=>LANG['community'],'cls'=>'','id'=>'','list'=>[]],
        'DownloadApp'   =>['title'=>LANG['downloadApp'],'cls'=>'','id'=>'','list'=>[]],
        'Aboutus'       =>['title'=>LANG['aboutUs'],'cls'=>'','id'=>'','list'=>[]],
        'client-help'       =>['title'=>LANG['help'],'cls'=>'','id'=>'','list'=>['client-help'=>['title'=>LANG['cHelp'],'cls'=>''],'realtors-help'=>['title'=>LANG['rHelp'],'cls'=>'']]],
    ];
    $list      = [];
    $thisIndex = '';
    foreach ($Menu as $key => $val)
    {
        $arr = [];
        foreach ($val['list'] as $k => $v)
        {
            $k = strtolower($k);
            $arr[$k] = $v;
            if(!$thisIndex && $page == $k){
                $thisIndex = $k;
                $val['cls']= 'on';
                $arr[$k]['cls'] = 'on';
                $v['cls']='on';
            }
        }
        $val['list'] = $arr;
        $key = strtolower($key);
        if(!$thisIndex && $page == $key){
            $thisIndex = $key;
            $val['cls']= 'on';
        }
        $list[$key] = $val;
    }
    
    if(!$thisIndex)
    {
        $list['index']['cls'] = 'on';
        $thisIndex = 'index';
    }
    seo($thisIndex,$language);
    define('Menu', $list);
    define('lan',$lan);
    
    $redirect = $_GET['redirect'] ?? '';
    if($redirect == 'app' ){
        define('deviceType', get_device_type());
    }
    else{
        define('deviceType', '');
    }
    
    
    get_file('_header');
    
    get_file($thisIndex);
    
    get_file('_footer');
}


function get_file($file,$ext = '.php'){
    $file = dirname(__FILE__).'/php/'.$file.$ext;
    if(is_file($file))
    {
        require($file);
    }
}


function get_device_type(){
    //全部变成小写字母
    $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
    $type = '';
    //分别进行判断
    if(strpos($agent, 'iphone') || strpos($agent, 'ipad')){
        $type = 'ios';
    } 
    if(strpos($agent, 'android')){
        $type = 'android';
    }
    return $type;
}
function isMobile() { 
  // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
  if (isset($_SERVER['HTTP_X_WAP_PROFILE'])) {
    return true;
  } 
  // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
  if (isset($_SERVER['HTTP_VIA'])) { 
    // 找不到为flase,否则为true
    return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
  } 
  // 脑残法，判断手机发送的客户端标志,兼容性有待提高。其中'MicroMessenger'是电脑微信
  if (isset($_SERVER['HTTP_USER_AGENT'])) {
    $clientkeywords = array('nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel','lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi','openwave','nexusone','cldc','midp','wap','mobile','MicroMessenger');
    // 从HTTP_USER_AGENT中查找手机浏览器的关键字
    if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
      return true;
    } 
  } 
  // 协议法，因为有可能不准确，放到最后判断
  if (isset ($_SERVER['HTTP_ACCEPT'])) { 
    // 如果只支持wml并且不支持html那一定是移动设备
    // 如果支持wml和html但是wml在html之前则是移动设备
    if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
      return true;
    } 
  } 
  return false;
}

function seo($index,$language)
{
  $lang_text = [
    'cn'=>[
            'title'         =>'芝麻约房',
            'keyword'       =>'芝麻约房,找房,买房,租房,出租,房源,房产问答,公寓,酒店式公寓,单身公寓,北约克房,万锦房,列治文山房,湖景房,密西沙加房,世嘉堡房,旺市房,怡陶碧谷房,新市房',
            'description'   =>'芝麻约房-多伦多房产投资,房产维修,中文房产经纪,经纪合作,多伦多,好房子,海外买家税,商业地产,多伦多大学,约克大学,圣力嘉,买地,经纪合作,私卖'
            ],
     'en'=>[
            'title'         =>'Sesame booking',
            'keyword'       =>'Sesame booking, Looking for a house,Buy a house,Rental,renting,Listing,Apartment,Condo,bachelor condo,North York apartment,Markham house,Richmond Hill house,lakeshore house/apartment,mississauga house/condo,scarborough house/condo,vaughan house/apartment,etobicoke house/apartment,Newmarket house,apartment finder',
            'description'   =>'Sesame booking-Toronto Housing Market,Property Mantanance and repairing,landing home,Foreign buyer tax,Commercial,Land purchase ,agent coop,private sale'
            ],       
    'index'=>[
        'cn'=>[
            // 'title'         =>'芝麻,芝麻App,多伦多芝麻',
            'title'         =>'客户主页',
            ],
        'en'=>[
            // 'title'         =>'Sesame,Sesame App,Toronto Sesame',
            'title'         =>'Home Page: Clients',
            ]    
    ],
    'realtors'=>[
        'cn'=>[
            // 'title' =>'房地产经纪人',
            'title'         =>'经纪主页',
            ],
        'en'=>[
            // 'title'=>'realtors'
            'title'         =>'Home Page: Realtors',
            ]
    ],
    'community'=>[
        'cn'=>[
            // 'title' =>'房产问答',
            'title' =>'房产问答社区',
            
            ],
        'en'=>[
            // 'title'=>'Property question and answer'
            'title'=>'Community: Property Questions'
            ]
    ],
    'downloadapp'=>[
        'cn'=>[
            'title'=>'芝麻App下载',
            ],
        'en'=>[
            // 'title'=>'Sesame App'
            'title'=>'Download: Sesame App'
            ]
    ],
    'aboutus'=>[
        'cn'=>[
            'title'=>'关于我们',
            ],
        'en'=>[
            'title'=>'About Us'
            ]
    ],
    'client-help'=>[
        'cn'=>[
            'title'=>'客户常见问题',
            ],
        'en'=>[
            'title'=>'FAQ: Clients'
            ]
    ],
    'realtors-help'=>[
        'cn'=>[
            'title'=>'经纪常见问题',
            ],
        'en'=>[
            'title'=>'FAQ: Realtors'
            ]
    ],
];
if(isset($lang_text[$index])){
  $title = $lang_text[$language]['title'];
  $lang_text[$language] = $lang_text[$index][$language] + $lang_text[$language];
  $lang_text[$language]['title'] = $lang_text[$language]['title'].' - '.$title;
}
define('SEO',$lang_text[$language]);
}

function checkrobot($useragent=''){
    static $kw_spiders = array('bot', 'crawl', 'spider' ,'slurp', 'sohu-search', 'lycos', 'robozilla');
    static $kw_browsers = array('msie', 'netscape', 'opera', 'konqueror', 'mozilla');
 
    $useragent = strtolower(empty($useragent) ? $_SERVER['HTTP_USER_AGENT'] : $useragent);
    if(strpos($useragent, 'http://') === false && dstrpos($useragent, $kw_browsers)) return false;
    if(dstrpos($useragent, $kw_spiders)) return true;
    return false;
}
function dstrpos($string, $arr, $returnvalue = false) {
    if(empty($string)) return false;
    foreach((array)$arr as $v) {
        if(strpos($string, $v) !== false) {
            $return = $returnvalue ? $v : true;
            return $return;
        }
    }
    return false;
}

