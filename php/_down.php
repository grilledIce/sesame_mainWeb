<div class="line-con" id="bottom">
    <div class="warp">
        <div>
            <img class="b1" src="<?php echo CONF[0];?>images/website-download-client.png">
        </div>
        <div class="bottomText">
            <dl class="a-2">
                <dt><?php echo LANG['dpage1'];?></dt>
            </dl>
            <div class="a-1">
                <a id="comingBtn-<?=(empty($_GET['lan']) ? 'en': $_GET['lan']  )?>" class="comingBtn-<?=(empty($_GET['lan']) ? 'en': $_GET['lan']  )?>"title="<?php echo LANG['Guide'];?>"><i class="fa fa-caret-right"></i><?php echo LANG['a1'];?></a>
                <a id="realtorGuide" class="comingBtn "><?php echo LANG['a1-r'];?></a>
            </div>
            <div class="a-3">
                <span><?php echo LANG['dpage3'];?></span><br>
                <div class="dbtnBox">
                    <dd><a href="/?p=downloadapp&redirect=app" class="dbtn"><?php echo LANG['a32'];?></a></dd>
                    <dd  class="apkbtn"><a href="http://www.sesamebooking.com/static/apks/sesamebooking.apk"><?php echo LANG['a33']; ?></a></dd>
                </div>
            </div>
            <div class="a-4">
                <a href="https://itunes.apple.com/ca/app/sesame-booking/id1374036971?mt=8" title="<?php echo LANG['downloadApple'];?>"><img src="<?php echo CONF[0];?>images/iphone.png"></a>
                <a href="https://play.google.com/store/apps/details?id=com.houseagent" title="<?php echo LANG['downloadGoogle'];?>"><img src="<?php echo CONF[0];?>images/andoid.png"></a>
            </div>
        </div>
    </div>
</div>
<!--<div class="fullScreen helpFull">-->
<!--    <iframe src="https://www.youtube.com/embed/9A6smfCS4Uo" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>-->
<!--</div>-->