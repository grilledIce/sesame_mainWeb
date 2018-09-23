<?php
  $url = "http://api.sesamebooking.com/api/topic/item/";
  $itemUrl = $url . $_GET['id'];
  $item = file_get_contents($itemUrl);
  $decode = json_decode($item, 1);
  $resultItem = $decode['data']['item'];
  $replyItem = $decode['data']['item']['replies'];
  if(language == 'cn'){
    $downUrl = '?p=downloadapp&lan=cn#bottom';
    $dAPPtvm = '下载应用查看更多';
  }else {
    $downUrl = '?p=downloadapp&#bottom';
    $dAPPtvm = 'Download APP to view more';
  }
  echo "
  <div class=\"background\">
    <div class=\"container\">
      <div class=\"box\">
        <div class=\"bar\"></div>
        <div class =\"icon\">
          <h1 style='background-color: ".$resultItem['bgcolor']."'>" . strtoupper(mb_substr($resultItem['last_name'],0,1)). "</h1>
        </div>
        <h3 style=\"grid-area:q\">" . $resultItem['question'] . "</h3>
        <div style=\"grid-area:v\" class=\"v\">
          <p>Views: ".$resultItem['views']."</p>
          <p>Answers: ".sizeof($replyItem)."</p>
        </div>
        <div class=\"d\" style=\"grid-area: d\">
          <a href=\"".$downUrl."\">".$dAPPtvm."</a>
        </div>
      </div>";
// answer box
foreach($replyItem as $answer){
echo"
      <div class=\"answer\">
        <div class=\"agentBox\">
          <div class=\"avatar\" style=\"grid-area:avatar\">
            <img src=\"http://api.sesamebooking.com/file/view/".$answer['avatar']."\">
          </div>
          <div class=\"title\" style=\"grid-area:title\">
            <p class=\"name\">".$answer['first_name']." ".$answer['last_name']."</p>";
      if($answer['is_verified']==1){
    echo "<i class=\"fas fa-shield-alt\"></i>";}

    echo
           "<p class=\"position\">".$answer['position']."</p>
            </div>
            <div class=\"stars\"style=\"grid-area:star\">";
            $stars = $answer['star'];
            for($i=0;$i<5;$i++){
              if($stars>=10){
                echo "<i class=\"far fa-star\" style=\"font-weight:900\"></i>";}
              else if(($stars<10) && ($stars>0)){
                echo "<i class=\"fas fa-star-half\"></i>";}
              else{
                echo "<i class=\"far fa-star\" style=\"font-weight:400\"></i>";}
              $stars = $stars-10;
            }
    echo
          "</div>
        </div>
        <div class=\"message\">
          <p>".$answer['answer']."</p>
        </div>
        <div class=\"time\">
          <p>".$answer['created_at']."</p>
          <i class=\"far fa-smile shareBtn\">" .$answer['likes']."</i>
        </div>
        <hr>
        <div class=\"comments\">
            ";
    $answerUrl = "http://api.sesamebooking.com/api/topic/answer/".$replyItem[0]['id']."";
    $answerJson = file_get_contents($answerUrl);
    $comments = json_decode($answerJson, 1)['data']['answer']['comments'];
    foreach($comments as $comment){
      echo"
      <div class=\"commentBox\">
        <h1 style=\"background-color:".$comment['bgcolor']."\">".strtoupper(mb_substr($comment['last_name'],0,1))."</h1>
        <div class=\"info\">
          <p class=\"message\">".$comment['comment']."</p>
          <p class=\"time\">".$comment['created_at']."</p>
        </div>
      </div>
      ";
    }
    echo
        "</div>
        </div>";
  }
    echo "
      </div>
    </div>
    <div class=\"dlPopUp\">
    <p class=\"pText\">";
    echo LANG['popUpContent'];
    echo"</p>
    <div class=\"btns\">
      <a class=\"btn-1 dlPClose\">";
      echo LANG['closeBtn'];
      echo "</a>
      <a class=\"btn-2\" href=\"?p=downloadapp#bottom\">";
      echo LANG['dlBtn'];
      echo"</a>
    </div>
  </div>
  <div class=\"dp fullScreen\"></div>
  ";
  // echo "
  // <>
  // ";
  // <a href=\" ".$downUrl."\">Download APP to view more</a>
  echo "</div>";
?>
