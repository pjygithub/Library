$(function(){
    // nav收缩展开
    $('.nav-item>a').on('click',function(){
        if (!$('.nav-mini').hasClass('nav-show')) {
            if ($(this).next().css('display') == "none") {
                //展开未展开
                $('.nav-item').children('ul').slideUp(300);
                $(this).next('ul').slideDown(300);
                $(this).parent('li').addClass('nav-show').siblings('li').removeClass('nav-show');
                if ($('.nav-item').hasClass('nav-show')){
                    $('.nav-show>ul').css('display','block');
                }
            }else{
                //收缩已展开
                $(this).next('ul').slideUp(300);
                $('.nav-item.nav-show').removeClass('nav-show');            

            }
        }
    });
    $('.nav-item>a').on('blur',function(){    
        if ($('.nav-item').hasClass('nav-show')){
            $('.nav-show>ul').css('display','block');
        }else{
            $('.nav-item>ul').css('display','none');
            // $(this).removeClass('nav-show');
        }
        // $('.nav-item>ul>li').css('display'=="none");
    });
     // 标志点击样式
     $('#aat').on('click','.nav-item>ul>li',function(){
    	$('.nav-item>ul>li').css('background','none')
    	$(this).css('background','yellow')
//  	$(this).siblings().css('background','none')
    });
    //nav-mini切换
    // $('#mini').on('click',function(){
    //     if (!$('.nav-mini').hasClass('nav')) {
    //         $('.nav-item.nav-show').removeClass('nav-show');
    //         $('.nav-item').children('ul').removeAttr('style');
    //         $('.nav-mini').addClass('nav');            
    //         $('.userinfo-mini').addClass('userinfo');
    //         $('.userinfo-mini.userinfo').removeClass('userinfo-mini');
    //         $('#mini').hasElements('img');
    //     }else{
    //         $('.nav-mini').removeClass('nav');
    //         $('.userinfo').addClass('userinfo-mini');
    //         $('.userinfo-mini.userinfo').removeClass('userinfo');            
    //     }
    // });
});
