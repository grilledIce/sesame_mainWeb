<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="renderer" content="webkit"  />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="trustpilot-one-time-domain-verification-id" content="wBG34bPgPKrvKcD17gVPRVLkRDokIjWpdJtIINiz"/>
<title><?php echo SEO['title'];?></title>
<meta    name="keywords"         content="<?php echo SEO['keyword'];?>" />
<meta    name="description"      content="<?php echo SEO['description'];?>"/>
<meta name="format-detection" content="telephone=no" />
<link type="text/css" rel="stylesheet" href="<?php echo CONF[0];?>css/base.css?vv=1.3"   />
<link rel="shortcut icon" href="<?php echo CONF[0];?>images/tagicon.ico">
<!--<link type="text/css" rel="stylesheet" href="--><?php //echo CONF[0];?><!--css/font-awesome/css/fontawesome.min.css"   />-->
<!--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">-->
<link type="text/css" rel="stylesheet" href="<?php echo CONF[0];?>css/web-fonts-with-css/css/fontawesome-all.css"   />
<link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
<script> 
var lan = '<?php echo language ?>';
var deviceType = '<?php echo deviceType ?>';
var http = '<?php echo CONF[1];?>';
var rebort = '<?php echo rebort;?>';
</script>
<script type="text/javascript" charset="utf-8" src="<?php echo CONF[0];?>js/jquery-3.3.1.min.js"></script>
<!--<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js'></script>-->
<!--<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>-->
<!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=GA_TRACKING_ID"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-118638899-2');
</script>
<script type="text/javascript" charset="utf-8" src="<?php echo CONF[0];?>js/base.js?vv=1"></script>
</head>
<body class="<?php echo platform;?>">
<header class="warp">
    <div class="logo" style="margin-bottom: 10px">
    <dl>
        <dt><a href="?p=index&lan=<?php echo language; ?>"><img src="<?php echo CONF[0];?>images/logo.png" alt="SESAME BOOKING"></a></dt>
    </dl>
    </div>
    <div class="menu-status">
        <i class="fas fa-times close"></i>
        <i class="fas fa-bars bar"></i>
    </div>
    <div class="menu">
        <li class="mLogo">
            <img src="<?php echo CONF[0];?>images/Sesame Booking Logo_White-01.png">
        </li>
        <?php
        $html = '';
        $currentPage = '';
        foreach (Menu as $key => $val)
        {
            $class = $val['cls'] ?  $val['cls'] : '';
            $id = $val['id'] ?  $val['id'] : '';
            $html .= '<li>';
            $html .= '<a id="'.$id.'" class="'.$class.' navItem" href="?p='.$key.lan.'" title="'.$val['title'].'" '.$class.'>'.$val['title'].'</a>';
            if($val['cls']=='on')
                $currentPage =  $key;
            if($val['list'])
            {
                $html .= '<ul>';
                foreach ($val['list'] as $k => $v)
                {
                    $cls = $v['cls'] ? $v['cls'] : '';
                    $html .= '<a class="'.$cls.' navItem" href="?p='.$k.lan.'" title = "'.$v['title'].' "><i class="fa fa-angle-right"></i>'.$v['title'].'</a>';
                }
                $html .= '</ul>';
            }
            $html .= '</li>';
        }
        echo $html;
        echo '
        <li>
            <a class=" navItem">'.LANG['language'].'</a>
            <ul>
                <a class="navItem lanS" href="?p='.$currentPage.'&lan=en">
                    <i class="fa fa-angle-right"></i>English
                </a>
                <a class="navItem lanS" href="?p='.$currentPage.'&lan=cn">
                    <i class="fa fa-angle-right"></i>中文
                </a>
            </ul>
        </li>'
        ?>
    </div>
    <div class="light-box"></div>
</header>
