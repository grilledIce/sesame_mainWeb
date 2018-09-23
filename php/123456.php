<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="renderer" content="webkit"  />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="trustpilot-one-time-domain-verification-id" content="wBG34bPgPKrvKcD17gVPRVLkRDokIjWpdJtIINiz"/>
<title></title>
<meta    name="keywords"         content="" />
<meta    name="description"      content=""/>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?php echo CONF[0];?>css/base.css"   />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

<link type="text/css" rel="stylesheet" href="<?php echo CONF[0];?>css/font-awesome/css/font-awesome.min.css"   />
<script type="text/javascript" charset="utf-8" src="<?php echo CONF[0];?>js/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo CONF[0];?>js/base.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</head>
<body class="<?php echo platfrom;?>">
<header class="warp">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="container">
                    <div class="logo">
                        <dl>
                            <dt><a href="?p=index"><img src="<?php echo CONF[0];?>images/logo.png" alt="SESAME BOOKING" width="95%"></a></dt>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="container">
                    <div class="menu-status">
                        <i class="fa fa-close close"></i>
                        <i class="fa fa-bars bar"></i>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="menu contanin">
                <?php
                    $html = '';
                    $lists = '';
                    $html .= '<ul class="nav nav-tabs justify-content-end">';
                    foreach (Menu as $key => $val)
                    {
                        $class = $val['cls'] ? 'class="'.$val['cls'].'"' : '';
                        $key   = $key == 'downloadapp' ? '?p=index#bottom' : '?p='.$key;
                        if(!$val['list'])
                        {
                            $html .= '<li class="nav-item"><a class="nav-link" href="'.$key.'"  ' . $class . '>' . $val['title'] . '</a></li>';
                            foreach ($val['list'] as $k => $v)
                            {
                                $html .= '<a href="?p='.$k.'"  ><i class="fa fa-angle-right"></i>'.$v['title'].'</a>';
                            }
                        }
                        else{
                            $html .='<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">'.$val['title'].'</a>
                            <div class="dropdown-menu">';
                            foreach ($val['list'] as $k => $v)
                            {
                                $html .= '<a class="dropdown-item" href="?p='.$k.'"  >'.$v['title'].'</a>';
                            }
                            $html .='</div></li>';
                        }
                    }
                    $html .= '</ul>';
                    echo $html;
                    ?>
                </div>
            </div>
        </div>
    </div>
</header>