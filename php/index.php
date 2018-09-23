<div class="banner cls_index">
    <img class="mBG" src="<?php echo CONF[0];?>images/banner2.png">
    <div class="warp">
        <h2>
            <?php echo LANG['buy'];?><br><?php echo LANG['assignment'];?>
        </h2>
        <p class="pb">
            <?php echo LANG['gta'];?><b style="color: red"><?php echo LANG['free'];?></b><?php echo LANG['real'];?>
        </p>
        <dl>
            <dd><a id="cHelpVideoLink-<?=(empty($_GET['lan']) ? 'en': $_GET['lan']  )?>" title ="<?php echo LANG['shiwTitle'];?>"><?php echo LANG['shiw'];?><i class="fa fa-arrow-right" ></i></a></dd>
        </dl>
        <img class="b1" src="<?php echo CONF[0];?>images/client-website-hand-and-mobile1.png">
        <div class="imgGroup">
            <a class="qc"><img src="<?php echo CONF[0];?>images/QR_code.png"></a>
            <div>
                <a class="b3"  href="https://itunes.apple.com/ca/app/sesame-booking/id1374036971?mt=8" title="<?php echo LANG['downloadApple'];?>"><img src="<?php echo CONF[0];?>images/iphone.png"></a>
                <a class="b4"  href="https://play.google.com/store/apps/details?id=com.houseagent" title="<?php echo LANG['downloadGoogle'];?>"><img src="<?php echo CONF[0];?>images/andoid.png"></a>
            </div>
        </div>
    </div>
</div>

<?php
get_file('_muc');
?>

<div class="line-con" id="bottom">
    <div class="warp">
        <div>
            <img class="b1" src="<?php echo CONF[0];?>images/website-download-client.png">
        </div>
        <div class="bottomText">
            <dl class="a-2">
                <dt><?php echo LANG['a2'];?></dt>
            </dl>
            <div class="a-1">
                <a id="comingBtn-<?=(empty($_GET['lan']) ? 'en': $_GET['lan']  )?>" class="comingBtn-<?=(empty($_GET['lan']) ? 'en': $_GET['lan']  )?>" title ="<?php echo LANG['Guide'] ?>"><i class="fa fa-caret-right"></i><?php echo LANG['a1'];?></a>
            </div>
            <dl class="a-2">
                <dd>
                    <?php echo LANG['a2d1'];?><br><?php echo LANG['a2d2'];?>
                </dd>
                <div class="mb1">
                    <img src="<?php echo CONF[0];?>images/website-download-client.png">
                </div>
            </dl>
            <div class="a-3">
                <span><?php echo LANG['a31'];?></span><br>
                <div class="dbtnBox">
                    <dd><a href="/?p=downloadapp&redirect=app" class="dbtn"><?php echo LANG['a32'];?></a></dd>
                    <dd  class="apkbtn"><a href="http://www.sesamebooking.com/static/apks/sesamebooking.apk"><?php echo LANG['a33']; ?></a></dd>
                </div>
            </div>
            <div class="a-4">
                <a href="https://itunes.apple.com/ca/app/sesame-booking/id1374036971?mt=8" title ="<?php echo LANG['downloadApple'] ?>"><img src="<?php echo CONF[0];?>images/iphone.png"></a>
                <a href="https://play.google.com/store/apps/details?id=com.houseagent" title ="<?php echo LANG['downloadGoogle'] ?>"><img src="<?php echo CONF[0];?>images/andoid.png"></a>
            </div>
        </div>
    </div>
</div>

<!--This part is for popUp-->

<div class="popUp" id="id_popUp">
    <div><a id="id_popUpClose" class="closeBtn"><i class="fa fa-times-circle"></i></a></div>
    <div class="popContent">
        <img class="mCouponImg" id="id_couponImg" src="<?php echo CONF[0];?>images/mPopup.jpg">
    </div>
</div>
<div class="popUpSwitch" id="id_popUpSwitch"><img id="id_clientImg" src="<?php echo CONF[0];?>images/gift-icon.png"></div>

<div class="cover"></div>
