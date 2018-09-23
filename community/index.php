<?php
$_POST['keyword'] = $_POST['keyword'] ?? '';
$_POST['lanAr'] = ['all'];
$_POST['order'] = $_POST['order'] ?? '';
if(rebort == 1){
    $page = $_GET['page'] ?? 1;
    $page = max( intval($page),1);
    $_POST['nextPageUrl'] = 'http://api.sesamebooking.com/api/topic/latest?page='.$page;
}

function getTopic($request) {
    $base = "http://api.sesamebooking.com/api/topic/";
    $response = file_get_contents($base . $request);
    return json_decode($response,1);
}

function getDetial($request){
    $base = "http://api.sesamebooking.com/api/topic/item/";
    $response = file_get_contents($base . $request);
    return json_decode($response, 1);
}

function getAwrDetail($request){
    $base = "http://api.sesamebooking.com/api/topic/answer/";
    $response = file_get_contents($base . $request);
    return json_decode($response, 1);
}

function searchTopic($keyword) {
    $base = "http://api.sesamebooking.com/api/topic/search/";
    $response = file_get_contents($base . $keyword);
    return json_decode($response,1);
}

function getAvatarUrl($request){
    $base = "http://api.sesamebooking.com/file/view/";
    return $base . $request;
}

function getNextPage($url) {
    $response = file_get_contents($url);
    return json_decode($response,1);
}

function getResultList($keyword, $lanAr, $order) {
    $latestBase = "http://api.sesamebooking.com/api/topic/latest";
    $itemBase = "http://api.sesamebooking.com/api/topic/item/";
    $answerBase = "http://api.sesamebooking.com/api/topic/answer/";
    $searchBase = "http://api.sesamebooking.com/api/topic/search/";
    $avatarBase = "http://api.sesamebooking.com/file/view/";
    $request = '';

    if($keyword == ''){
        $request = $latestBase;
    }
    else {
        $request = $searchBase . $keyword;
    }

    if($order == 'date'){
        $sortby = 'sortby=id';
    }
    else{
        $sortby = 'sortby=views%2Blikes';
    }
    $request = $request . '?' . $sortby;

    if(in_array('all', $lanAr)){
        $response = file_get_contents($request);
        $resultList = json_decode($response,1);
    }
    else{
        foreach ($lanAr as &$lan){
            $singleRequest = $request . '&language=' . $lan;
            $response = file_get_contents($singleRequest);
            $singleList = json_decode($response,1);
        }
        unset($lan);
        $resultList = $singleList;
    }
    
    return $resultList;
}

function getNextPageList($url, $lanAr, $order) {
    $latestBase = "http://api.sesamebooking.com/api/topic/latest";
    $itemBase = "http://api.sesamebooking.com/api/topic/item/";
    $answerBase = "http://api.sesamebooking.com/api/topic/answer/";
    $searchBase = "http://api.sesamebooking.com/api/topic/search/";
    $avatarBase = "http://api.sesamebooking.com/file/view/";
    $request = $url;
    if($order == 'date'){
        $sortby = 'sortby=id';
    }
    else{
        $sortby = 'sortby=views%2Blikes';
    }
    $request = $request . '&' . $sortby;

    if(in_array('all', $lanAr)){
        $response = file_get_contents($request);
        $resultList = json_decode($response,1);
    }
    else{
        $singleList='';
        foreach ($lanAr as &$lan){
            $singleRequest = $request . '&language=' . $lan;
            $response = file_get_contents($singleRequest);
            $singleList = json_decode($response,1);
        }
        unset($lan);
        $resultList = $singleList;
    }
    return $resultList;
}

function renderR($resultList, $numOfLoad, $showAwrID) {
    $numOfLoad = $numOfLoad > count($resultList['data']['data'])? count($resultList['data']['data']):$numOfLoad;
    $url = (language =='cn')? '?p=downloadapp&lan=cn#bottom':'?p=downloadapp#bottom';
    $dAPPtvm = (language =='cn')?'下载应用查看更多':'Download APP to view more';
    $html = '';
    if(!empty($resultList['data']['data'])) {
        for ($i = 0; $i < $numOfLoad; $i++) {
            $resultItem = getDetial($resultList['data']['data'][$i]['id']);
            $resultDetail = $resultItem['data']['item'];
            $html .= "
                <div class=\"resultCard\">
                    <a href=\"/?p=community&id=".$resultDetail['id']." \"></a>
                    <div class=\"bar\"></div>
                    <div class=\"resultBox\" id=\"".$resultDetail['id']."\">
                        <div class=\"userIcon\">
                            <h6 style='background-color: ".$resultDetail['bgcolor']."'>" . strtoupper(mb_substr($resultDetail['last_name'],0,1)). "</h6>
                        </div>
                        <div class='vC'>
                            <p>Views: ".$resultDetail['views']."</p>
                            <p>Answers: ".sizeof($resultDetail['replies'])."</p>
                            <a class=\"vCB\">
                                <i class=\"fa fa-angle-double-down vCShow vDown\"></i>
                                <i class=\"fa fa-angle-double-up vCShow vUp\"></i>
                            </a>
                        </div>
                        <h3 class=\"q\">" . $resultDetail['question'] . "</h3>
                    </div>
                    <div class=\"replyBox\">                   
                        <div class=\"bot\">
                            <i class=\"far fa-smile\">".$resultDetail['likes']."</i>
                            <i class=\"far fa-share-square\"></i>
                            <a href=\" ".$url."\">".$dAPPtvm."</a>
                        </div>
                    
                ";
            if (!empty($resultDetail['replies'])) {
                $awrDetail = getAwrDetail($resultDetail['replies'][$showAwrID]['id'])['data']['answer'];
                if (!empty($awrDetail['avatar']))
                {
                    $avatarLink = getAvatarUrl($awrDetail['avatar']);
                }
                else
                {
                    $avatarLink = './static/images/user@3x.png';
                }
                $verified = '';
                if($awrDetail['is_verified'] == 1){
                    $verified = '<i class="fas fa-shield-alt"></i>';
                }
                $html .= "
                    <div class='aIcon'><img src=". $avatarLink ."></div>
                        <div class=\"aName\">
                            " . $awrDetail['first_name'] . " " . $awrDetail['last_name'] . " ". $verified ."
                            <span>". $awrDetail['position'] ."</span>
                        </div>
                        <a class=\"pBtn\">
                            <i class='fas fa-phone' ></i>
                        </a>
                        <div class=\"sL\">
                            <div class=\"sR\">";
                for($a = 0; $a<5; $a++){
                    if($a<($awrDetail['star']/10 - 0.5))
                    $html .= "<i class=\"fas fa-star\"></i>";
                    else if(($awrDetail['star']%10) != 0)
                    $html .= "<i class=\"fas fa-star-half\"></i>";
                    else
                    $html .= "<i class=\"far fa-star\"></i>";
                }
                $html .=   "</div><div class=\"lan\">";
                $limit = count($awrDetail['languages']) > 3? 3:count($awrDetail['languages']);
                for($x=0;$x<$limit;$x++){
                    $html .= "<p>" . $awrDetail['languages'][$x] . "</p>";
                }
                if(count($awrDetail['languages']) > 3){
                    $html .= "<h3>···</h3>";
                }
                $html .=    "</div></div>
                        <p class=\"awr\">" . $awrDetail['answer'] . "</p>
                        <p class=\"time\">" . $awrDetail['created_at'] . "</p>
                    ";
            }
            else {
                $html .= "
                        <div class='aIcon'></div>
                        <p class='aName'></p>
                        <a class='pBtn'></a>
                        <div class='sL'></div>
                        <p class='awr' style='color:gray'>No Answer Currently</p>
                        <p class='time'></p>
                ";
            }
            $html .= "</div></div>";
        }
    }
    else{
        $html .= '<h4>No Result!</h4>';
    }
    return $html; 
}

function get_data(){
    $result = '';
    if(!empty($_POST['keyword'])){
        $result = renderR(getResultList($_POST['keyword'],$_POST['lanAr'],$_POST['order']), 10, 0);
    }
    else {
        if(empty($_POST['nextPageUrl']))
        $result = renderR(getResultList($_POST['keyword'],$_POST['lanAr'],$_POST['order']), 10, 0);
        else {
            $temp = getNextPageList($_POST['nextPageUrl'],$_POST['lanAr'],$_POST['order']);
            $result = renderR($temp, 10, 0);
            $temp = $temp['data'];
            unset($temp['data']);
            define('page_list',$temp);
        }
    }
    return $result;
}
if(empty($_POST['url'])){
    
    if(rebort == 1)
    {
    }else{
        echo get_data();
    }
}
else {
    if(!empty($_POST['keyword'])){
        echo getResultList($_POST['keyword'],$_POST['lanAr'],$_POST['order'])['data']['next_page_url'];
    }
    else {
        if(empty($_POST['nextPageUrl']))
            echo getResultList($_POST['keyword'],$_POST['lanAr'],$_POST['order'])['data']['next_page_url'];
        else {
            echo getNextPageList($_POST['nextPageUrl'],$_POST['lanAr'],$_POST['order'])['data']['next_page_url'];
        }
    }
}
