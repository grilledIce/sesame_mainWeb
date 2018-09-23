<div class="banner cls_realtors">
    <img class="mBG" src="<?php echo CONF[0];?>images/banner2.png">
    <div class="warp">
        <h2>
            <?php echo LANG['connect'];?>
        </h2>
        <p>
            <?php echo LANG['theReal'];?>
        </p>
        <p class="pb">
            <?php echo LANG['try'];?><b style="color: red"><?php echo LANG['free'];?></b><?php echo LANG['2mon'];?>
        </p>
        <dl>
            <dd><a id="cHelpVideoLink-<?=(empty($_GET['lan']) ? 'en': $_GET['lan']  )?>" class="cHelpVideoLink"  title ="<?php echo LANG['shiwTitle'];?>"><?php echo LANG['shiw'];?>  <i class="fa fa-arrow-right" ></i></a></dd>
        </dl>
        <img class="b1" src="<?php echo CONF[0];?>images/Realtor-website-hand-and-mobile1.png">
        <div class="imgGroup">
            <a class="qc"><img src="<?php echo CONF[0];?>images/QR_code.png"></a>
            <div>
                <a class="b3"  href="https://itunes.apple.com/ca/app/sesame-booking/id1374036971?mt=8" title="<?php echo LANG['downloadApple'];?>"><img src="<?php echo CONF[0];?>images/iphone.png"></a>
                <a class="b4"  href="https://play.google.com/store/apps/details?id=com.houseagent" title="<?php echo LANG['downloadGoogle'];?>"><img src="<?php echo CONF[0];?>images/andoid.png"></a>
            </div>
        </div>
    </div>
</div>

<div class="clearfix warp muc">
    <div>
        <div>
            <img src="<?php echo CONF[0];?>images/m1.jpg">
        </div>
        <dl>
            <dt><?php echo LANG['iI'];?></dt>
            <dd>
                <?php echo LANG['nbtf'];?>
            </dd>
        </dl>
    </div>
    <div>
        <div>
            <img src="<?php echo CONF[0];?>images/m2.jpg">
        </div>
        <dl>
            <dt><?php echo LANG['etu'];?></dt>
            <dd>
                <?php echo LANG['suae'];?>
            </dd>
        </dl>
    </div>
    <div>
        <div>
            <img src="<?php echo CONF[0];?>images/m3.jpg">
        </div>
        <dl>
            <dt><?php echo LANG['fg'];?></dt>
            <dd>
                <?php echo LANG['ersts'];?>
            </dd>
        </dl>
    </div>
    <div>
        <div>
            <img src="<?php echo CONF[0];?>images/m4.jpg">
        </div>
        <dl>
            <dt><?php echo LANG['sm'];?>​</dt>
            <dd>
                <?php echo LANG['detpc'];?>
            </dd>
        </dl>
    </div>
</div>

<div class="line-pop">
    <div class="warp">
        <h3>
            <?php echo LANG['sbcyd'];?>
        </h3>
        <div>
            <div class="step-1">
                <p><?php echo LANG['s1'];?></p>
                <dl>
                    <dt><img src="<?php echo CONF[0];?>images/t1.png"></dt>
                    <dd><?php echo LANG['s1d'];?></dd>
                </dl>
            </div>
            <div class="step-2">
                <p><?php echo LANG['s2'];?></p>
                <dl>
                    <dt><img src="<?php echo CONF[0];?>images/t2.png"></dt>
                    <dd><?php echo LANG['s2d1'];?><br><?php echo LANG['s2d2'];?></dd>
                </dl>
            </div>
            <div class="step-3">
                <p><?php echo LANG['s3'];?></p>
                <dl>
                    <dt><img src="<?php echo CONF[0];?>images/t3.png"></dt>
                    <dd><?php echo LANG['s3d'];?></dd>
                </dl>
            </div>
            <div class="step-4">
                <p><?php echo LANG['s4'];?></p>
                <dl>
                    <dt><img src="<?php echo CONF[0];?>images/t4.png"></dt>
                    <dd><?php echo LANG['s4d'];?></dd>
                </dl>
            </div>
        </div>
    </div>
</div>

<div class="line-con" id="bottom">
    <div class="warp">
        <div>
            <img class="b1" src="<?php echo CONF[0];?>images/website-download-realtor.png">
        </div>
        <div class="bottomText">
            <dl class="a-2">
                <dt><?php echo LANG['tewtf'];?></dt>
            </dl>
            <div class="a-1">
                <a id="realtorGuide" class="comingBtn-<?=(empty($_GET['lan']) ? 'en': $_GET['lan']  )?>" title =""><?php echo LANG['rug'];?></a>
            </div>
            <dl class="a-2">
                <dd>
                    <?php echo LANG['dtsbaa'];?><br>
                    <?php echo LANG['rerqti'];?>
                </dd>
                <div class="mb1">
                    <img src="<?php echo CONF[0];?>images/website-download-realtor.png">
                </div>
            </dl>
            <div class="a-3">
                <span><?php echo LANG['etft'];?></span><br>
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
<!--This part is for popUp-->

<div class="popUp" id="id_popUp">
    <div class="titleBar"><a id="id_popUpClose" class="closeBtn"><i class="fa fa-times-circle"></i></a></div>
    <div class="popContent"><img class="mCouponImg" id="id_mcouponImg" src="<?php echo CONF[0];?>images/rPopup.jpg">
    <img class="invImg" id="id_invImg" src="<?php echo CONF[0];?>images/invitation.jpg"></div>
</div>
<div class="popUpSwitch" id="id_popUpSwitch">
  <!-- <img id="id_eventImg" src="<?php echo CONF[0];?>images/event-icon.png" alt=""> -->
  <img id="id_switchImg" src="<?php echo CONF[0];?>images/gift-icon.png"></div>
<div class="cover"></div>
