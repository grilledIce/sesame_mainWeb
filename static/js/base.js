$(function(){

    var isPopUp = false;
    var sL = {'all': true, 'en': false, 'zh': false, 'fr': false, 'es': false, 'ar': false, 'it': false, 'ru': false, 'de': false, 'ja': false, 'ko': false, 'other': false };
    var nextPageUrl = null;
    var isMorePage = false;
    var loadActive = false;
    var endPageNote = false;
    var hotTopicsAr = ['Buy','Sell','Lease','Assignment','Pre-construction','Agent','Pre-purchase','Choosing Property','Community Overview','Problems and Solutions','Mortgage','Tax','Insurance','Investment','Commercial','Maintenance and Repair','Furnishing and decorating','Market Analysis'];
    var lanAr = [];
    var isLoading = false;
    var resultHtml = '';

    localStorage.order = 'recommended';

    // if($('.mobileDevice').length){
    //     $('body').addClass('mobile-box');
    //     if($(window).width() < 423){
    //         $('body').addClass('mobile-box');
    //     }
    //     else if($(window).width() < 1000){
    //         $('body').addClass('ipad-box');
    //         $('body').removeClass('mobile-box');
    //     }
    // }s
    if(deviceType == 'ios'){
        window.location.href = "https://itunes.apple.com/ca/app/sesame-booking/id1374036971?mt=8";
    } else if(deviceType == 'android'){
        window.location.href = "https://play.google.com/store/apps/details?id=com.houseagent";
    }


    if($(window).width() <= 423){
        $('body').addClass('mobile-box');
        $('body').removeClass('ipad-box');
    }
    else if($(window).width() <= 1024){
        $('body').addClass('ipad-box');
        $('body').removeClass('mobile-box');
    }
    else
    {
        $('body').removeClass('mobile-box');
        $('body').removeClass('ipad-box');
    }
    $(window).resize(function() {
        if($(window).width() <= 423){
            $('body').addClass('mobile-box');
            $('body').removeClass('ipad-box');
        }
        else if($(window).width() <= 1000){
            $('body').addClass('ipad-box');
            $('body').removeClass('mobile-box');
        }
        else
        {
            $('body').removeClass('mobile-box');
            $('body').removeClass('ipad-box');
        }
    })

    if($('.banner').hasClass('cls_index')){
        if(localStorage.load == undefined){
            isPopUp = true;
            var popUpId='';
            localStorage.load = "loaded";
        }
    }
    if($('.banner').hasClass('cls_realtors')) {
        if (localStorage.rLoad == undefined) {
            isPopUp = true;
            localStorage.rLoad = "loaded";
            var popUpId='realtor';
        }
    }
    if($('.warp').hasClass('community')) {
        searching();
        renderHotTopics();
    }

    $('body').on('mouseover','.resultCard',function () {
        $(this).children('.resultBox').children('.vC').children('.vCB').children('.vCShow').toggle();
        $(this).children('.replyBox').css("display","grid");
    });
    $('body').on('mouseout','.resultCard',function () {
        $(this).children('.resultBox').children('.vC').children('.vCB').children('.vCShow').toggle();
        $(this).children('.replyBox').css("display","none");
    });


    $('body').on('click','.resultBox',function(){
        var base ='/?p=community&lan='+lan+'&id=';
        // console.log($(this).attr('id'));
        var url = base + $(this).attr('id')
        window.open(url);
    });

    if(localStorage.selectedLan == undefined) {
        localStorage.setItem('selectedLan', JSON.stringify(sL));
    }
    loadLan();



    function checkPopUp(id) {
        if(isPopUp == true){
            if(id==='event'){
                $('#id_popUp').css("display","block");
                $('#id_invImg').css("display","block");
                $('#id_mcouponImg').css("display","none");
                $('.cover').fadeIn();
                $('#id_popUp').addClass('onPop');
            } else if (id ==='realtor'){
                $('#id_popUp').css("display","block");
                $('#id_mcouponImg').css("display","block");
                $('#id_invImg').css("display","none");
                $('.cover').fadeIn();
                $('#id_popUp').addClass('onPop');
            } else {
                $('#id_popUp').css("display","block");
                $('#id_couponImg').css("display","block");
                //$('#id_couponImg').css("display","block");
                $('.cover').fadeIn();
                $('#id_popUp').addClass('onPop');
            }
            // $('#id_popUp').css("display","block");
            // $('#id_invImg').css("display","none");
            // $('.cover').fadeIn();
            // $('#id_popUp').addClass('onPop');
        }
        else if(isPopUp == false){
            if($('#id_popUp').hasClass('onPop')){
                $('#id_popUp').animate({
                    bottom:'120px',
                    right:'20px',
                    width: "0",
                    opacity: '0.5'
                },500,function () {
                    if($('body').hasClass('mobile-box')) {
                        $('#id_popUp').animate({
                            bottom: '50%',
                            right: '50%',
                            width: "83%",
                            opacity: '1'
                        }, 0);
                    }
                    else{
                        $('#id_popUp').animate({
                            bottom: '50%',
                            right: '50%',
                            width: "40%",
                            opacity: '1'
                        }, 0);
                    }
                    $('#id_popUp').css("display","none");
                });
                $('.cover').fadeOut();
            }
        }
    }
    checkPopUp(popUpId);
    $('.menu-status').click(function(){
        if($('.menu-status').hasClass('on'))
        {
            $('.menu-status').removeClass('on');
            $('.menu').removeClass('on');
            $('.light-box').fadeOut();
            $('body').css("overflow-y","scroll");
        }
        else
        {
            $('.menu-status').addClass('on');
            $('.menu').addClass('on');
            $('.light-box').fadeIn();
            $('body').css("overflow-y","hidden");
        }
    })
    $('.light-box').click(function(){
        $('.menu-status').click();
    })
    function top(){
        $(window).scroll(function(){
            var scrH=document.documentElement.scrollTop+document.body.scrollTop;
            var scrH2 = $(this).scrollTop() + $(this).height();
            if(scrH>200){
                $('#goTop').fadeIn(400);
            }else{
                $('#goTop').stop().fadeOut(400);
            }
        });
        $('#goTop').click(function(){
            $('html,body').animate({scrollTop:'0px'},200);
        });
    }

    top();

    $('#id_clientImg').click(function () {
        isPopUp = true;
        checkPopUp('');
    })

    $('#id_switchImg').click(function () {
        isPopUp = true;
        checkPopUp('realtor');
    })

    $('#id_eventImg').click(function () {
        isPopUp = true;
        checkPopUp('event');
    })

    $('#id_popUpClose').click(function () {
        isPopUp = false;
        checkPopUp();
    })
    $('#ask-btn, .shareBtn, .mSBtn').click(function () {
        $('.dlPopUp').fadeIn();
        $('.dp').fadeIn();
    })
    $('.dlPClose, .dp').click(function () {
        $('.dlPopUp').fadeOut();
        $('.dp').fadeOut();
    })

    $('.helpBox').click(function () {
        $(this).children('.helpAwr').toggle();
        $(this).children('h2').children('span').children('i').toggle();
    })

    function createLanAr() {
        lanAr = [];
        $.each(JSON.parse(localStorage.getItem('selectedLan')), function (key, value) {
            if(value == true) {
                lanAr.push(key);
            }
        });
    }

    function searching() {
        if(rebort == 1)return ''
        if(!isLoading){
            var loadingHtml = "<div class=\"loading\"> <img src=\"./static/images/loading.png\"></div>"
            $('#community').prepend(loadingHtml);
        }
        isLoading = true;
        nextPageUrl = null;
        var keyword = $('body').hasClass('mobile-box') ? $.trim($('#msearch-keyword').val()) : $.trim($('#search-keyword').val());
        createLanAr();
        $.post(http+"?p=community-list",{
            keyword: keyword,
            lanAr: lanAr,
            order: localStorage.order,
            lan: lan
            },
            function(data){
                resultHtml = data;
                var thisResult = '<div class="htmlBox">' + resultHtml + '</div>';
                $('#community').html(thisResult);
                $.post(http+"?p=community-list",{
                        url: 'url',
                        keyword: keyword,
                        lanAr: lanAr,
                        order: localStorage.order,
                        lan: lan
                    },
                    function(data){
                        isMorePage = false;
                        isLoading = false;
                        nextPageUrl = data;
                        endPageNote = true;
                        if(nextPageUrl != null && nextPageUrl != undefined && nextPageUrl != ''){
                            isMorePage = true;
                            endPageNote = false;
                        }
                    }
                );
            }
        );
    }

    $('.mgo-btn').click(searching);
    $('.go-btn').click(searching);
    $("#search-keyword").keydown(function (event) {
        if(event.which==13){
            searching();
        }
    });

    $('#id_order').click(function () {
        if($(this).hasClass('dateOn')){
            var a1 = $('#p-2').text();
            var a2 = $('#p-1').text();
            $(this).removeClass('dateOn');
            $('#p-1').html(a1);
            $('#p-2').html(a2);
            localStorage.order = 'recommended';
        }
        else {
            var a1 = $('#p-2').text();
            var a2 = $('#p-1').text();
            $(this).addClass('dateOn');
            $('#p-2').html(a2);
            $('#p-1').html(a1);
            localStorage.order = 'date';
        }
        searching();
    })

    $('.language').click(function () {
        $('.show').toggle();
        $('.selectWarp').toggle();
        if(!$('.selectWarp').hasClass('lanOn')){
            $('.selectWarp').addClass('lanOn');
        }
        else{
            $('.selectWarp').removeClass('lanOn');
        }
    });

    $(document).click(function (e) {
        if($('.selectWarp').hasClass('lanOn') && ($(e.target).attr('class')!='lanGroup') && ($(e.target).attr('class')!='language') && ($(e.target).parent().attr('class')!='language') && (($(e.target)).parent().attr('class')!='lanGroup')) {
            $('.language').click();
        }
        if($('.warp').hasClass('community') && $(e.target).attr('class')!='dropdown' && $(e.target).attr('class')!='search-keyword'){
            disappear();
        }
    });

    $('.rBtn').on("click",function () {
        var tem = $(this).attr('id');
        var selectedLan = JSON.parse(localStorage.getItem('selectedLan'));
        $.each(selectedLan, function (key, value) {
            selectedLan[key] = false;
        });
        selectedLan[tem] = true;
        localStorage.setItem('selectedLan', JSON.stringify(selectedLan));
        loadLan();
        searching();
    })

    function loadLan() {
        $.each(JSON.parse(localStorage.getItem('selectedLan')), function (key, value) {
            if(value == true) {
                var x = '.' + key;
                $(x).children('.checkMark').children('.circle').css("display","block");
                var text = $(x).text();
                $('#selectedLan').html(text);
            }
            else {
                var x = '.' + key;
                $(x).children('.checkMark').children('.circle').css("display","none");
            }
        })
    }
    if(rebort == 2)
    {
    $(window).scroll(function(){
        var scrH2 = $(this).scrollTop() + $(this).height();
        if((scrH2+1) >= $(document).height()) {
            if (isMorePage == true && loadActive == false) {
                loadActive = true;
                $('.loadingEnd').css("display","none");
                $('.loadingContent').css("display", "block");
                createLanAr();
                $.post(http+"?p=community-list", {
                        nextPageUrl: nextPageUrl,
                        lanAr: lanAr,
                        lan: lan,
                        order: localStorage.order
                    },
                    function (data) {
                        loadActive = false;
                        resultHtml = $('.htmlBox').html();
                        resultHtml += data;
                        var thisResult = '<div class="htmlBox">' + resultHtml + '</div>';
                        $('#community').html(thisResult);
                        $('.loadingContent').css("display", "none");
                        $.post(http+"?p=community-list", {
                                url: 'url',
                                nextPageUrl: nextPageUrl,
                                lanAr: lanAr,
                                order: localStorage.order,
                                lan: lan
                            },
                            function (data) {
                                isMorePage = false;
                                nextPageUrl = data;
                                endPageNote = true;
                                if(nextPageUrl != null && nextPageUrl != undefined && nextPageUrl != ''){
                                    isMorePage = true;
                                    endPageNote = false;
                                }
                                else {
                                    $('.loadingEnd').css("display","block");
                                }
                            }
                        );
                    }
                );
            }
            else if(endPageNote == true){
                $('.loadingEnd').css("display","block");
            }
        }
    });
    }

    function renderHotTopics() {
        var str ='';
        $.each(hotTopicsAr, function (key,value) {
            str += '<p class="ht">'+ value + '</p>';
        })
        $('.dropdown').html(str);
    }

    $('#search-keyword').focus(function () {
        $('.dropdown').css("display","flex");
    });
    $('#search-keyword').blur(function () {
        setTimeout(disappear,100);
    });
    $('.ht').click(function () {
        var ht = $(this).text();
        $('#search-keyword').val(ht);
        searching();
    });
    function disappear() {
        $('.dropdown').css("display","none");
    }

    $('#mWeChatIcon').click(function () {
        $('#weChatImg').fadeIn().css("display","flex");
    })
    $('#weChatImg').click(function () {
        $('#weChatImg').fadeOut();
    })

    $('.order').on("touchstart",function () {
        if($('.order').hasClass('onOrder on')){
            $('.order').removeClass('onOrder on');
        }
        else{
            $('.order').addClass('onOrder on');
        }
    })
    $('.order').mouseenter(function () {
        if(!$('.order').hasClass('onOrder on')){
            $('.order').addClass('onOrder');
        }
    })
    $('.order').mouseleave(function () {
        if(!$('.order').hasClass('on')){
            $('.order').removeClass('onOrder');
        }
    })
    $('#cHelpVideoLink-en, #rHelpVideoLink-en').click(function () {
        var videoHTML="<iframe id='helpVideo' src='https://www.youtube.com/embed/SNPrUNTUKm0?autoplay=1' frameborder='0' allow='autoplay; encrypted-media' allowfullscreen></iframe>\n";
        $('.helpFull').html(videoHTML);
        $('.helpFull').fadeIn();
        var height = $('#helpVideo').width() / 560 * 315;
        $('#helpVideo').css("height",height);
    })

    $('#cHelpVideoLink-cn, #rHelpVideoLink-cn').click(function () {
        var videoHTML="<iframe id='helpVideo' src='https://www.youtube.com/embed/HKl4iNNS_hQ?autoplay=1' frameborder='0' allow='autoplay; encrypted-media' allowfullscreen></iframe>\n";
        $('.helpFull').html(videoHTML);
        $('.helpFull').fadeIn();
        var height = $('#helpVideo').width() / 560 * 315;
        $('#helpVideo').css("height",height);
    })


    $('.helpFull').click(function () {
        $(this).fadeOut();
        $('#helpVideo').remove();
    })

    $('#comingBtn-en').click(function () {
        var videoHTML="<iframe id='helpVideo' src='https://www.youtube.com/embed/UwLOhUfn8ko?autoplay=1' frameborder='0' allow='autoplay; encrypted-media' allowfullscreen></iframe>\n";
        $('.helpFull').html(videoHTML);
        $('.helpFull').fadeIn();
        var height = $('#helpVideo').width() / 560 * 315;
        $('#helpVideo').css("height",height);

//        $('.comingFull').fadeIn();
    })

    $('#comingBtn-cn').click(function () {
        var videoHTML="<iframe id='helpVideo' src='https://www.youtube.com/embed/IUIbRByp3l8?autoplay=1' frameborder='0' allow='autoplay; encrypted-media' allowfullscreen></iframe>\n";
        $('.helpFull').html(videoHTML);
        $('.helpFull').fadeIn();
        var height = $('#helpVideo').width() / 560 * 315;
        $('#helpVideo').css("height",height);

//        $('.comingFull').fadeIn();
    })

    $('#realtorGuide').click(function () {
        // var hostname = document.domain;
        if($('body').hasClass('mobile-box')){
            var PopUpHTML = `<div id='realtorGuidePop' style ='position:fixed;top:25%;left:10%;right:10%'> <img style='width:100%' src="static/images/realtorPopUp.png"></div>`;
        } else {
            var PopUpHTML = `<div id='realtorGuidePop' style ='position:fixed;top:25%;left:30%;right:30%'> <img style='width:100%' src="static/images/realtorPopUp.png"></div>`;
        }
        $('.helpFull').html(PopUpHTML);
        $('.helpFull').fadeIn();
    })

    $('.comingFull, #close').click(function () {
        $('.comingFull').fadeOut();
    })

})
