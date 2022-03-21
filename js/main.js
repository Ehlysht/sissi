$(document).ready(function($){
	if (window.screen.width >= 576){
        function preLoad() {
            $("#load").addClass("hidden");
        }
        window.setInterval(function loaded() {
            $("#load").removeClass("hidden");
            $('div#load').css({display:'none'}).remove();
        }, 2000);
        preLoad();
    }
	if (window.screen.width <= 576) { //После загрузки если экран меньше 576
		$('.exposed').removeClass('d-block').addClass('d-none'); //Скрыть слайдер для больших экранов
		$('.exposed__mobile').removeClass('d-none').addClass('d-block'); //Открыть слайдер для маленьких экранов
	}else if (window.screen.width >= 576) { //После загрузки если экран больще 576
		$('.exposed').removeClass('d-none').addClass('d-block'); //Открыть слайдер для больших экранов
		$('.exposed__mobile').removeClass('d-block').addClass('d-none'); //Скрыть слайдер для маленьких экранов
		
	}
	$('.slick__arrow_right').trigger('click');
	function buttonWidth(){
	    if (window.screen.width <= 576) {
    	    var needWidth = window.screen.width - 60;
    	    $('.description__btn').css('width', needWidth);
    	    $('.description__qty_block').css('width', needWidth);
    	    $('.populars h2:before').css('width', needWidth);
    	    $('.description__delivery_block').css('width', needWidth);
    	    $('.description__desc_text').css('width', needWidth);
    	    $('.nav__menu').css('width', needWidth + 60);
    	    $('.history__items_other').css('width', needWidth + 60);
    	    $('.titlelines').css('width', needWidth + 30);
    	    $('.subtitle__lineleft_pop, .subtitle__lineright_pop, .subtitle__lineleft_highlights, .subtitle__lineright_highlights').css('width', ((needWidth + 30) / 2) - 80);
    	    $('.insta__lineleft, .insta__lineright').css('width', ((needWidth + 30) / 2) - 113);
    	    $('.subtitle__lineleft_history, .subtitle__lineright_history').css('width', ((needWidth + 30) / 2) - 160);
    	    $('.subtitle__lineleft_consultation, .subtitle__lineright_consultation, .subtitle__lineleft_maps, .subtitle__lineright_maps').css('width', ((needWidth + 30) / 2) - 90);
	    }
	}
	buttonWidth();
	function arrowHeight(){
	    widthSlick = $('.item__slick').width();
	    widthSlickCart = $('.item__slick_cart').width();
	    sumDots = ($('.item__slick .slick-dots li').length) * 17;
	    sumDotsCart = ($('.item__slick_cart .slick-dots li').length) * 23;
	    if (window.screen.width >= 600) {
	        $('.slick__arrow_left_cart').css('right', widthSlickCart/2 + sumDotsCart);
            $('.slick__arrow_right_cart').css('left', widthSlickCart/2 + sumDotsCart);
            $('.slick__arrow_left').css('right', widthSlick/2 + sumDots);
            $('.slick__arrow_right').css('left', widthSlick/2 + sumDots);
	    }else{
	        $('.slick__arrow_left').css('left', widthSlick/2 - sumDots);
            $('.slick__arrow_right').css('right', widthSlick/2 - sumDots);
	        $('.slick__arrow_left_mob').css('left', widthSlick/2 + sumDots);
            $('.slick__arrow_right_mob').css('right', widthSlick/2 + sumDots);
            $('.slick__arrow_left_cart').css('right', widthSlickCart/2 + sumDotsCart);
            $('.slick__arrow_right_cart').css('left', widthSlickCart/2 + sumDotsCart);
	    }
	}
	/*function arrowHeight(){
	    var pageName = $('.pagename').text();
	    var wCont = ($('.container').offset().left);
        var IdText = $('.item__slick_cart .slick-dots li').length;
        var arrowLeft = (IdText * 20) + (($('.test__offset').offset().left) - 595);
        $('.slick__arrow_left_cart').css('right', arrowLeft);
        $('.slick__arrow_right_cart').css('left', arrowLeft);
        IdText = $('.item__slick .slick-dots li').length;
        arrowLeft =(IdText * 20) + (($('.test__offset').offset().left));
        $('.slick__arrow_left').css('right', arrowLeft - wCont);
        $('.slick__arrow_right').css('left', arrowLeft - wCont);
	    if (window.screen.width <= 600) {
	        IdTextMob = $('.item__slick .slick-dots li').length;
	        var arrowLeftMob = (IdTextMob * 20) + ($('.test__offset').offset().left);
    	    $('.slick__arrow_right_mob').css('left', arrowLeftMob - 47);
    	    $('item__slick_cart .slick__arrow_right').css('left', arrowLeftMob -35);
    	    $('.slick__arrow_right').css('left', arrowLeftMob -35);
    	    $('.slick__arrow_left_mob').css('right', arrowLeftMob - 47);
    	    $('item__slick_cart .slick__arrow_left').css('right', arrowLeftMob -35);
    	    $('.slick__arrow_left').css('right', arrowLeftMob -35);
	    }
	}*/

	//Калькуляция общей суммы
	function calculate(){ 
	    var tmp = 0; //Начальная сумма
	    var bonus1 = 350; //Сколько нужно для подарка
	    var bonus2 = 500; //Сколько нужно для бесплатной доставки
	    //перебрать все значение с классом "cart__price_sum"
	    $('.cart__price_sum').each(function() {
	    	tmp += parseInt($(this).text()); //Суммировать все значения с классом "cart__price_sum"
	    });
	    bonus1 -= tmp; // Посчитаться сколько нужно для подарка
    	bonus2 -= tmp; // Посчитаться сколько нужно для бесплатной доставки

    	$('.cart__allsum').text(tmp); // Вывести общую сумму корзины
    	// Если значени первого бонуса меньше или ровно 0 тогда оставить 0 если нет тогда посчитать
	    if (bonus1 <= 0) {  
	    	$('.cart__bonus_sum1').text(0);
	    }else{
		    $('.cart__bonus_sum1').text(bonus1);
	    };
	    // Если значени второго бонуса меньше или ровно 0 тогда оставить 0 если нет тогда посчитать
	    if (bonus2 <= 0) {
	    	$('.cart__bonus_sum2').text(0);
	    }else{
	    	$('.cart__bonus_sum2').text(bonus2);
	    };
	}
    calculate();
    function orderCalculate(){ 
	    var tmp = 0; //Начальная сумма
	    $('.order__sum').each(function() {
	    	tmp += parseInt($(this).text()); //Суммировать все значения с классом "cart__price_sum"
	    });
    	$('.cartdelivery__sum_sum-price').text(tmp); // Вывести общую сумму корзины
	}
    orderCalculate();
    // Считать количество позиций в корзине 
	function countCart(){
		var qtyCart = $('.inCart').length // Количество классов ".inCart" 
		var allPrice = $('.cart__sum_sum-price').text(); // Значение в классе "cart__sum_sum-price"
		// Если количество ровно 0 тогда не отображать счётчик если нет тогда показать его з количеством товаров
		if (qtyCart == 0) { 
			$('.cart__couter_item').addClass('d-none');
		}else{
			$('.cart__couter_item').addClass('d-block');
			$('.cart__couter_item').text(qtyCart);
		}

	}
    countCart();
	function countColor(){
	    var qtyColor = $('.colname').length;
	    $('.countColor').val(qtyColor + 1);
	}
	countColor();
	// Если нажать не на меню в мобильной версии
	$(document).mouseup(function (e){ // событие клика по веб-документу
		var div = $('.nav__menu'); // тут указываем ID элемента
		if (!div.is(e.target) // если клик был не по нашему блоку
		&& div.has(e.target).length === 0) { // и не по его дочерним элементам
			div.removeClass('d-flex').addClass('d-none'); // скрываем его
			$('.menu__closer').removeClass('d-block').addClass('d-none');
			$('.menu__burger').removeClass('d-none').addClass('d-block'); 
		}
  	});
  	$(window).scroll(function() {
  	    if(window.screen.width >= 600){
            if($(window).scrollTop() >= 516){
      	        $('.highlights__back_arrow').addClass('position-fixed');
      	        $('.highlights__back_arrow').css('top', '60px');
      	    }else{
      	        $('.highlights__back_arrow').removeClass('position-fixed');
      	        $('.highlights__back_arrow').css('top', '408px');
      	    }
  	    }else{
  	        if($(window).scrollTop() >= 180){
      	        $('.highlights__back_arrow').addClass('position-fixed');
      	        $('.highlights__back_arrow').css('top', '100px');
      	    }else{
      	        $('.highlights__back_arrow').removeClass('position-fixed');
      	        $('.highlights__back_arrow').css('top', '184px');
      	    }
  	    }
  	    
  	});
  	$(window).scroll(function() {
        if(($(window).width()) <  700){
          if($(window).scrollTop() < 10){
            $('.header, .header__logo_block, .logo__text, .gotocart, .logo__text_sub').removeAttr( 'style' );
          }else{
            $('.header__logo_block').css({
                'padding': '15px 0',
                'alignItems': 'center'
            });
            $('.header').css({
               'height': 'auto',
               'alignItems': 'center'
            });
            $('.logo__text').css({
                'margin': '0'
            });
            $('.logo__text_sub').css({
                'display': 'none'
            })
            $('.gotocart').css('bottom', '-10px')
          }
        }
    });
  	// Переключения подпунктов меню
	/*function subPage() {
		var item = $('.subpagename').text();
		var pageNameSub = $('.subpagename').text();
		var title = 'Макіяж'
		if (window.screen.width <= 576) {
		    $('.nav__item').hover(function() {
                $('.nav__item').css('border-bottom', 'none')
            });
		}
		$('.pagesubname').val(pageNameSub);
		$('.product__item').removeClass('product-active');
		$('.makeup__items').removeClass('d-flex').addClass('d-none');
		if (item == ''){
		    $('.makeupface').removeClass('d-none').addClass('d-flex');
		}
		$('.makeup' + item).removeClass('d-none').addClass('d-flex');
		$('.product__makeup').removeClass('product-active');
		$('.poduct__menu_subitem').removeClass('product-active');
		$('.poduct__menu_subitem-' + item).addClass('product-active');
		var subText =  $('.page__' + item).text();
		$('.routing__point_makeup').removeClass('d-none').addClass('d-block');
		$('.crumbs__two').removeClass('d-none').addClass('d-block');
	    $('.routing__point_two').text(subText);
    	$('.makeup__title').text(title + ' ' + subText);
	};
	subPage();*/

  	// Подчеркнуть тот пункт меню на котором находиться пользователь
	function siteName(){
	    var loadWhere = $('.loadWhere').text();
	    if (loadWhere == 'highlights'){
	        $('.highlights').css('background', 'none');
	    }
		var name = $('.pagename').text();
		var subname = $('.subpagename').text();
		var nameBrand = $('.loadWho').text();
		if (window.screen.width <= 576) {
	        $('.nav__makeup>a').attr('href', '#');
        }else{
    		   $('.poduct__headermenu_subitem, .brand__headermenu_subitem').css('padding-left', 0);
    		   $('.poduct__headermenu_sublink, .brand__headermenu_sublink').css('color', '#fff');
    		   $('.poduct__headermenu_sublink, .brand__headermenu_sublink').css('font-weight', '500');
		    }
		if (name != '') {
			if (window.screen.width <= 576) {
			    $('.nav_item').removeClass('product-active');
    			$('.nav__' + name).addClass('product-active');
			}else{
				$('.nav__item').removeClass('active-menu');
				$('.nav__' + name).addClass('active-menu');
			}
			if (name == 'makeup'){
			    $('.poduct__menu_subitem-' + subname).addClass('product-active');
			}else{
			    if(name == 'brand'){
    			    if(nameBrand == 'Kiko_Milano'){
    			        $('.poduct__menu_brand li:nth-child(1)').addClass('product-active');
    			    }else if(nameBrand == 'Hask'){
    			        $('.poduct__menu_brand li:nth-child(2)').addClass('product-active');
    			    }else if(nameBrand == 'Rolanjona'){
    			        $('.poduct__menu_brand li:nth-child(3)').addClass('product-active');
    			    }else{
    			        $('.product__item_' + name).addClass('product-active');
            			$('.product__item_' + name + '>a').attr('href', '#');
    			    }
			    }
			    $('.nav__' + name + '>a').attr('href', '#');
    			var routName = $('.product__item_' + name + '>a').text();
			}
    		}else{
    		    $('.header').removeClass('index-header');
    		}
	};
	siteName();
	function createRouting(){
        var manufName = $('.description__name').text();
        $('.routing__point_three').text(manufName);
	}
	createRouting();
	// Для больших экранов логика переключения слайдов
	if (window.screen.width >= 1199) {
		$('.exposed__img_3').css('left', '1060px'); // Начальная позиция второй картинки
		$('.exposed__img_5').css('left', '1110px'); // Начальная позиция третьей картинки
		var oldPosition = 0; 
		var startPosition = 1110;
		var visitedImg = 0;
		var nextImg = 1060;
		var prevImg = -1060;
	}else if (window.screen.width <= 992){
		$('.about__text_first').text('');
		$('.about__text_first').text('Пропонуємо косметику світових брендів KIKO MILANO, pupa H&M, Charlotte Tilbury, HUSK, Loreal Professionne, Nashi Argan');
		$('.exposed__img_3').css('left', '580px');
		$('.exposed__img_5').css('left', '669px');
		var oldPosition = 0;
		var startPosition = 669;
		var visitedImg = 0;
		var nextImg = 580;
		var prevImg = -580;
	}else if (window.screen.width <= 1199){
		$('.exposed__img_3').css('left', '733px');
		$('.exposed__img_5').css('left', '902px');
		var oldPosition = 0;
		var startPosition = 902;
		var visitedImg = 0;
		var nextImg = 733;
		var prevImg = -733;
	}
	
    $('.arrow__right').click(function changeImg() {
    	var imgcount = $(this).attr('id');
    	$('.dots__point').removeClass('active-dots');
    	if (imgcount == 1) { 
    		$('.exposed__img_5').css('left', startPosition);
    		$('.arrow__right').attr('id', '2');
    		$('.arrow__left').attr('id', '2');
    		$('.exposed__img_3').css('left', '1060px');
    		$('.exposed__img_5').css('opacity', '0.1');
    		$('.exposed__img_3').css('opacity', '1');
    		$('.exposed__img_1').animate({
				left: prevImg
			});
			$('.exposed__img_3').animate({
				left: visitedImg
			});
			$('.exposed__img_5').animate({
				left: nextImg
			},400);
    		$('.dots__point_2').addClass('active-dots');
    	}else if (imgcount == 2) {
    		$('.exposed__img_1').css('left', startPosition);
    		$('.exposed__img_5').css('left', '1060px');
    		$('.exposed__img_1').css('opacity', '0.1');
    		$('.exposed__img_5').css('opacity', '1');
    		$('.exposed__img_1').animate({
				left: nextImg
			},400);
			$('.exposed__img_3').animate({
				left: prevImg
			});
			$('.exposed__img_5').animate({
				left: visitedImg
			});
			$('.arrow__right').attr('id', '3');
    		$('.arrow__left').attr('id', '3');
    		$('.dots__point_3').addClass('active-dots');
    	}else if (imgcount = 3) {
    		$('.exposed__img_3').css('left', startPosition);
    		$('.exposed__img_1').css('left', '1060px');
    		$('.exposed__img_3').css('opacity', '0.1');
    		$('.exposed__img_1').css('opacity', '1');
    		$('.exposed__img_1').animate({
				left: visitedImg
			});
			
			$('.exposed__img_3').animate({
				left: nextImg
			},400);
			$('.exposed__img_5').animate({
				left: prevImg
			});
    		$('.arrow__right').attr('id', '1');
    		$('.arrow__left').attr('id', '1');
    		$('.dots__point_1').addClass('active-dots');
    	}
	});
	$('.arrow__left').click(function() {
    	var imgcount = $(this).attr('id');
    	$('.dots__point').removeClass('active-dots');
    	$('.exposed__img_5').css('left' , '-1000px');
    	$('.exposed__img_1').css('opacity', '0.1');
    	$('.exposed__img_5').css('opacity', '1');
    	if (imgcount == 1) {
    		$('.exposed__img_1').animate({
				left: nextImg 
			});
			$('.exposed__img_3').animate({
				left: nextImg + 166
			});
			$('.exposed__img_5').animate({
				left: visitedImg
			});
    		$('.arrow__left').attr('id', '3');
    		$('.arrow__right').attr('id', '3');
    		$('.dots__point_3').addClass('active-dots');
    	}else if (imgcount == 2) {
    		$('.exposed__img_5').css('left' , '910px');
    		$('.exposed__img_1').css('left' , '-1000px');
    		$('.exposed__img_3').css('opacity', '0.1');
        	$('.exposed__img_1').css('opacity', '1');
    		$('.exposed__img_1').animate({
				left: visitedImg
			});
			$('.exposed__img_3').animate({
				left: nextImg
			});
			$('.exposed__img_5').animate({
				left: nextImg + 166
			});
    		$('.arrow__left').attr('id', '1');
    		$('.arrow__right').attr('id', '1');
    		$('.dots__point_1').addClass('active-dots');
    	}else if (imgcount = 3) {
    		$('.exposed__img_3').css('left' , '-1000px');
			$('.exposed__img_5').css('left' , '0px');
			$('.exposed__img_5').css('opacity', '0.1');
    	    $('.exposed__img_3').css('opacity', '1');
    		$('.exposed__img_1').animate({
				left: nextImg + 166
			});
			$('.exposed__img_3').animate({
				left: visitedImg
			});
			$('.exposed__img_5').animate({
				left: nextImg
			});
    		$('.arrow__left').attr('id', '2');
    		$('.arrow__right').attr('id', '2');
    		$('.dots__point_2').addClass('active-dots');
    	}
	});
	
	// Логика подпунктов меню макияж
	$('.product__item_makeup').click(function() {
	    $('.product__item').removeClass('product-active');
		$(this).addClass('product-active');
		$('.poduct__menu_subitem').removeClass('product-active');
		$('.poduct__menu_sub').toggleClass('d-none');
		$('i', this).toggleClass('rotate-icon');
	});
	$('.product__brand').click(function() {
	    $('.product__item').removeClass('product-active');
		$(this).addClass('product-active');
		$('.poduct__menu_subitem').removeClass('product-active');
		$('.poduct__menu_brand').toggleClass('d-none');
		$('i', this).toggleClass('rotate-icon');
	});
	$('.nav__makeup').click(function() {
	    if (window.screen.width <= 576) { //После загрузки если экран меньше 576
    	    $('.nav__makeup>a').css('color', '#fff');
    	    $('.product__link_header').toggleClass('rotate-icon');
    	    $('.poduct__menu_header').toggleClass('d-none');
    		if ($('.poduct__menu_header').attr('class') != 'poduct__menu_header order-3 d-md-none d-none'){
    	        $('.nav__menu').css('height', 478);
    	        $('.brand__menu_header').css('top', '375px');
    	    }else{
    	        $('.nav__menu').css('height', 365);
    	        $('.brand__menu_header').css('top', '263px');
    	    }
        }else{
            $('.brand__menu_header').addClass('d-md-none');
            $('.poduct__menu_header').toggleClass('d-md-none');
        }
	});
	$('.nav__brand').click(function() {
	    if (window.screen.width >= 576) { //После загрузки если экран меньше 576
    	    $('.brand__menu_header').toggleClass('d-md-none');
    	    $('.poduct__menu_header').addClass('d-md-none');
	    }
	});
	$('.poduct__menu_subitem').click(function() {
        $('.nav__item').removeClass('product-active');
        var subpage = $(this).attr('id');
        $('.pagesubname').val(subpage);
	});
	
	// Переключения цветов в описании
	
	$('.description__color_img').click(function() {
	    
		$('.description__color_img').removeClass('active-color color-click');
		$(this).addClass('active-color color-click');
		var itemsId = $('.opened__items').text();
		var itemsLink = $('input:nth-child(2)', this).val(); 
		$('.description__color_drop-text').text($(this).find('input').val());
		$('.description__img_' + itemsId).attr('src', itemsLink);
		$('.description__color_drop').removeClass('drop-open');
        $('.description__color_drop').addClass('d-none');
        $('.userColors' + itemsId).val($('input:nth-child(1)', this).val());
        $('.userColorsHex' + itemsId).val($(this).text());
        $('.userLinks' + itemsId).val($('input:nth-child(2)', this).val());
		setTimeout(colorPrev, 100);
		userColor();
	});
	$('.description__color_drop-text, .description__color_icon').click(function() {
	    dropList();
    }); 
	function dropList() {
	    var clickedId =  $(this).attr('id');
        $('.description__color_drop').toggleClass('drop-open');
        $('.description__color_drop').toggleClass('d-none');
	};
	$('.description__color_text').click(function() {
	    dropList();
	    var clickedText = $('p', this).text();
	    var clickedImg = $('input', this).val();
	    var itemsId = $('.opened__items').text();
	    $('.description__color_drop-text').text(clickedText);
	    var clickedId2 = $(this).attr('id');
	    $('.description__color_img').removeClass('active-color color-click');
		$('.' + clickedId2).addClass('active-color color-click');
		$('.description__img_' + itemsId).attr('src', clickedImg);
		var clickedHex = $('.' + clickedId2).text();
		if (clickedHex.length >= 7){
		    clickedHex = clickedHex.substr(0, 7);
		}else{
		    clickedHex = clickedHex;
		}
	    $('.userColorsHex' + itemsId).val(clickedHex);
	    $('.userColors' + itemsId).val($('input:nth-child(1)', '.' + clickedId2).val());
	    $('.userLinks' + itemsId).val($('input:nth-child(2)', '.' + clickedId2).val());
		setTimeout(colorPrev, 100);
		userColor();
	});
	function colorPrev(){
	    var prevColor = $('.color-click').text();
	    if (prevColor.length >= 7){
		    prevColor = prevColor.substr(0, 7);
		}else{
		    prevColor = prevColor;
		}
        $('.description__prev').css('background-color', prevColor);
	}
	function userColor() {
	    var userCId = $('.userColors').attr('id');
	    var userC = $('.description__color_drop-text' + userCId).text();
	    $('.userColors' + userCId).val(userC);
	}
	userColor();
	function hidderMobile(){
	    $('.exposed__mobile').removeClass('d-block').addClass('d-none');
	    $('.popular').removeClass('d-block').addClass('d-none');
	    $('.secondmenu').removeClass('d-block').addClass('d-none');
	    $('.insta').removeClass('d-block').addClass('d-none');
	    $('.highlights').removeClass('d-block').addClass('d-none');
	    $('.history').removeClass('d-block').addClass('d-none');
	    $('.consultation').removeClass('d-block').addClass('d-none');
	    $('.maps').removeClass('d-block').addClass('d-none');
	    $('.about').removeClass('d-block').addClass('d-none');
	}
	function visiterMobile(){
	    $('.exposed__mobile').removeClass('d-none').addClass('d-block');
	    $('.popular').removeClass('d-none').addClass('d-block');
	    $('.secondmenu').removeClass('d-none').addClass('d-block');
	    $('.insta').removeClass('d-none').addClass('d-block');
	    $('.highlights').removeClass('d-none').addClass('d-block');
	    $('.history').removeClass('d-none').addClass('d-block');
	    $('.consultation').removeClass('d-none').addClass('d-block');
	    $('.maps').removeClass('d-none').addClass('d-block');
	    $('.about').removeClass('d-none').addClass('d-block');
	}
	$('.subForm').click(function() {
	    $(this).submit();
	});
	$('.poduct__menu_subitem, .brand__menu_subitem, .brand__footer_subitem').click(function() {
	    $('form', this).submit();
	});
	$('.brand__menu_sublink').click(function() {
	    var menuId = $(this).attr('id');
	    $('.' + menuId + '__list').submit();
	});
    
    function isiPhone(){
        return (
            (navigator.platform.indexOf("iPhone") != -1) ||
            (navigator.platform.indexOf("iPod") != -1)
        );
    }
    
    
    
    $('.openDesc').click(function() {
     	
        if (window.screen.width <= 600) {
            if(isiPhone()){
                $(this).submit();
                $('.gotocart').css('top', '50px');
            }else{
    	        var itemId = $(this).attr('id');
                if (itemId == 'done__open'){
                    $(this).submit();
                }else{
                    $(this).attr('id', 'done__open');
                }
    	    }
    	    }else{
                $(this).submit();
            }
	    
	});
	function loadWho(){
	    var who = $('.loadWho').text();
	    var where = $('.loadWhere').text();
	    if (where != ''){
	        $('.highlights__back_arrow').attr('href', '../index.php#' + where);
	    }
	    if (who != ''){
	        $('.' + who).removeClass('d-none');
	        $('.' + who + '_img').removeClass('d-none');
	    }
	}
	loadWho();
	// Переключения в описании товара
	$('.description__desc_title').click(function() {
		var item = $(this).attr('id');
		$('.description__desc_title').removeClass('active-decs-title');
		$(this).addClass('active-decs-title');
		$('.description__item').removeClass('d-block').addClass('d-none');
		$('.description__item_' + item).removeClass('d-none').addClass('d-block');
	});
	$('.radio__label').click(function() {
		$('.radio__label').removeClass('active-radio');
		$(this).addClass('active-radio');
	});
	$('.cart__bonus_btn').click(function() {
	    $('html, body').animate({
            scrollTop: $(".header").offset().top
        }, 10);
		$('.cart__routing_icon').removeClass('active-cart');
		$('.cart__routing_one').removeClass('d-block').addClass('d-none');
		$('.complete-cart-one').removeClass('d-none').addClass('d-block');
		$('.cart__routing_two').addClass('active-cart');
		
		$('.cart__routing_textone').removeClass('complete-cart-text');
		$('.cart__routing_texttwo').addClass('complete-cart-text');
		$('.cart__sum_firts').css('margin-top', '-6px');
		$('.cart__sum_items').css('top', '145px');
		if (window.screen.width >= 576) {
			$('.cart__sum_firts').css('padding', '15px 8px 0 15px');
			$('.cartdelivery__sum_text-desc').removeClass('d-none').addClass('d-lg-block');
		}
		if (window.screen.width <= 990) {
			$('.cart__sum_firts').css('padding', '10px');
			$('.cart__sum_items-tablet').css('botton', 'auto');
			$('.cart__sum_items-tablet').css('top', '21px');
		}
		$('.cart__populars').removeClass('d-block').addClass('d-none');
		$('.cart').removeClass('d-block').addClass('d-none');
		$('.cartbouns').removeClass('d-md-block').addClass('d-none');
		$('.cartbouns').removeClass('d-block').addClass('d-none');
		$('.cartdelivery').removeClass('d-none').addClass('d-block');
		$('.cart__form_action').removeClass('d-none').addClass('d-flex');
		$('.cart__bonus_btn').removeClass('d-block').addClass('d-none');
		
	});
	//Заказать в один клик
	$('.cart__onebtn').click(function(){
	    $('.cart__routing_icon').removeClass('active-cart');
		$('.cart__routing_one').removeClass('d-block').addClass('d-none');
		$('.cart__routing_two').removeClass('d-block').addClass('d-none');
		$('.cart__routing_three').removeClass('d-block').addClass('d-none');
		$('.complete-cart-one').removeClass('d-none').addClass('d-block');
		$('.complete-cart-two').removeClass('d-none').addClass('d-block');
		$('.complete-cart-three').removeClass('d-none').addClass('d-block');
		$('.cartdelivery').removeClass('d-block').addClass('d-none');
		$('.cart__sum_firts').css('margin-top', '-6px');
		$('.cart__sum_items').css('top', '145px');
		if (window.screen.width >= 576) {
			$('.cart__sum_firts').css('padding', '15px 8px 0 15px');
			$('.cartdelivery__sum_text-desc').removeClass('d-none').addClass('d-lg-block');
		}
		if (window.screen.width <= 990) {
			$('.cart__sum_firts').css('padding', '10px');
			$('.cart__sum_items-tablet').css('botton', 'auto');
			$('.cart__sum_items-tablet').css('top', '21px');
		}
		$('.cart__populars').removeClass('d-block').addClass('d-none');
		$('.cart').removeClass('d-block').addClass('d-none');
		$('.cartbouns').removeClass('d-md-block').addClass('d-none');
		$('.cartbouns').removeClass('d-block').addClass('d-none');
		$('.OneClick').removeClass('d-none').addClass('d-block');
		$('.cart__bonus_btn').removeClass('d-block').addClass('d-none');
		
	});
	// Открыть выбор оплаты и закрыть форму для покупки
	$('.cart__form_next').click(function() {
	    $('html, body').animate({
            scrollTop: $(".header").offset().top
        }, 10);
		var customer = $('.cart__form_lname').val() + ' ' + $('.cart__form_fname').val();
		var city = $('.cart__form_city').val();
		var delyvery = $('.cart__form_delivery').val();
		var phone = $('.cart__form_tel').val();
		$('.cartdelivery__user_name').text(customer);
		$('.cartdelivery__user_adress').text(city);
		$('.cartdelivery__user_np').text(delyvery);
		$('.cartdelivery__user_tel').text(phone);
		$('.cart__sum_firts').css('margin-top', '-17px');
		$('.cart__routing_two').removeClass('d-block').addClass('d-none');
		$('.complete-cart-two').removeClass('d-none').addClass('d-block');
		$('.subtitle__second').removeClass('d-none').addClass('d-block');
		$('.cart__routing_three').addClass('active-cart');
		$('.cart__routing_texttwo').removeClass('complete-cart-text');
		$('.cart__routing_textthree').addClass('complete-cart-text');
		$('.subtitle__firts').removeClass('d-block').addClass('d-none');
		$('.cartdelivery').removeClass('d-none').addClass('d-block');
		$('.form__radio').removeClass('d-none').addClass('d-block');
		$('.cartdelivery__user').removeClass('d-none').addClass('d-block');
		$('.cart__form_second_actions').removeClass('d-none').addClass('d-flex');
		$('.cart__form_imput').removeClass('d-block').addClass('d-none');
		$('.cart__form_text').removeClass('d-block').addClass('d-none');
		$('.radio__label_firts').removeClass('d-block').addClass('d-none');
		$('.cart__form_action').removeClass('d-flex').addClass('d-none');
		$('.cart__sum_items').css('top', '125px');
		if (window.screen.width <= 576) {
			$('.cart__sum_items-tablet').css('bottom', '145px');
			$('.cart__sum_firts').css('padding', '10px 10px 0');
		}
		if (window.screen.width <= 990) {
			$('.cart__sum_items-tablet').css('width', '100%');
			$('.cart__sum_items-tablet').css('top', '-5px');
		}
		if (window.screen.width <= 760) {
			$('.cart__sum_items-tablet').css('width', '95%');
			$('.cart__sum_items-tablet').css('top', '-430px');
			$('.cartdelivery__sum_text-desc').removeClass('d-none d-md-none').addClass('d-block');
		}
	});
	// Открыть форму для покупки и закрыть форму выбор оплаты 
	$('.cart__form_second_back').click(function() {
	    $('html, body').animate({
            scrollTop: $(".header").offset().top
        }, 10);
		$('.cart__routing_two').removeClass('d-none').addClass('d-block');
		$('.complete-cart-two').removeClass('d-block').addClass('d-none');
		$('.cart__routing_three').removeClass('active-cart');
		$('.cart__sum_firts').css('margin-top', '-6px');
		$('.cart__routing_textthree').removeClass('complete-cart-text');
		$('.cart__routing_texttwo').addClass('complete-cart-text');
		$('.cartdelivery').removeClass('d-none').addClass('d-block');
		$('.form__radio').removeClass('d-block').addClass('d-none');
		$('.cartdelivery__user').removeClass('d-block').addClass('d-none');
		$('.cart__form_second_actions').removeClass('d-flex').addClass('d-none');
		$('.cart__form_imput').removeClass('d-none').addClass('d-block');
		$('.cart__form_text').removeClass('d-none').addClass('d-block');
		$('.radio__label_firts').removeClass('d-none').addClass('d-block');
		$('.cart__form_action').removeClass('d-none').addClass('d-flex');
		$('.cart__sum_items').css('top', 145)
		if (window.screen.width <= 576) {
			$('.cart__sum_items-tablet').css('bottom', '-79px');
			$('.cart__sum_firts').css('padding', '10px');
			$('.cartdelivery__sum_text-desc').removeClass('d-block').addClass('d-none d-md-none');
		}
		if (window.screen.width <= 990) {
			$('.cart__sum_items-tablet').css('width', '200px');
			$('.cart__sum_items-tablet').css('top', '21px');
		}
		if (window.screen.width <= 990) {
			$('.cart__sum_items-tablet').css('width', '95%');
			$('.cart__sum_items-tablet').css('top', '21px');
		}
	});
	function sumAfterChange(){
		$('.cart__qty_change').click();
	}
	sumAfterChange();
	// Добавить количество в корзине для товара
	$('.cart__qty_change').click(function() {
		var changeId = $(this).attr('id');
		var cartQty = $('.cart__qty_' + changeId).val();
		var cartPrice = $('.cart__price_' + changeId).text();
 		if ($(this).attr('class') == 'cart__qty_change cart__plus') {
			cartQty ++;	
			$('.cart__qty_' + changeId).val(cartQty);
		}else if ($(this).attr('class') == 'cart__qty_change cart__minus') {
			if (cartQty <= 1) {
				$('.cart__qty_' + changeId).val(1);
	 		}else{
				cartQty --; 	
				$('.cart__qty_' + changeId).val(cartQty);
			}
		}
		var oldQty = $('.userqty__' + changeId).val();
		$('.userqty__' + changeId).attr('value', cartQty);
		var sendQty = $('.userqty__' + changeId).val();
		var forSender = $('.usersender__' + changeId).val();
		$('.usersender__' + changeId).val(forSender.replace(' Кiлькiсть: '+ oldQty,' Кiлькiсть: ' + sendQty));
		$('.cart__price_sum_' + changeId).text(parseInt(cartPrice) * parseInt(cartQty));
		calculate();
	});
	// Открыть описание товаров
	/*$('.makeup__item_first, .forhair__item_first, .giftset__item_first, .forface__item_first, .forbody__item_first, .popular__item_first').click(function() {
	    if (window.screen.width >= 576) {
            
	    }else{
	        var pageName = $('.pagename').text();
	        if($('input', this).val() == 'popular'){
	            var checker = 'popular__item_first popular__open';
	            var pageName = 'popular';
	        }else if (pageName == 'makeup' || pageName == 'giftset'){
	            var checker = pageName + '__item_first ' + pageName + '__open';
	        }else {
	            var checker = 'for' + pageName + '__item_first ' + pageName + '__open';
	        }
	        if ($(this).attr('class') == checker){
        		var idDesc = $(this).attr('id');
        		var itemName = $('.product__name_' + idDesc).text();
        		$('.description__color_img').removeClass('active-color color-click');
        		$('.option1_' + idDesc).addClass('active-color color-click');
            	var optionText = $('input:nth-child(1)', '.option1_' + idDesc).val(); 
            	var optionImg = $('input:nth-child(2)', '#option1_' + idDesc).val(); 
            	var optionColor = $('.option1_' + idDesc).text();
	        }else{
    	        $('.makeup__item_first, .forhair__item_first, .giftset__item_first, .forface__item_first, .forbody__item_first').removeClass(pageName + '__open');
    	        $(this).addClass('done__open');
	        }
	    }
	});*/
	
	// Окрыть категорию товаров

	$('.routing__back').click(function() {
		var pageName = $('.pagename').text();
	    var pageNameSub = $('.pagesubname').text();
		$('.products').removeClass('d-none').addClass('d-block');
		$('.firstimg__all').removeClass('d-none').addClass('d-block');
		$('.routing').removeClass('d-flex').addClass('d-none');
		$('.description').removeClass('d-block').addClass('d-none');
		$('.populars').addClass('d-none');
		$('.crumbs__three').removeClass('d-block').addClass('d-none');
		$('.crumbs__one').removeClass('d-none').addClass('d-block');
		$('.makeup' + pageNameSub).removeClass('d-none').addClass('d-flex');
		$('.routing__point_three').text('');
		$('.makeup__item_first, .hair__item_first, .giftset__item_first, .forface__item_first, .body__item_first, .popular__item_first').removeClass(pageName + '__open');
		setTimeout(function(){ $('.routing__back').attr('href', 'index.php'); }, 50);
		if (window.screen.width >= 576) {
		    $('.exposed').removeClass('d-none').addClass('d-block');
		}else{
		    $('.exposed__mobile').removeClass('d-none').addClass('d-block');
		}
		$('.cart__routings').removeClass('d-none').addClass('d-block');
		$('.cart').removeClass('d-none').addClass('d-block');
		$('.cartbouns__cart').removeClass('d-md-none').addClass('d-md-block');
		$('.about').removeClass('d-none').addClass('d-block');
		$('.about__pop').removeClass('d-block').addClass('d-none');
		$('.routings').removeClass('d-none').addClass('d-flex');
		$('.routing__popular').removeClass('d-flex').addClass('d-none');
		$('.cart__populars').removeClass('d-none').addClass('d-block');
		visiterMobile();
		if (pageName == ''){
		    if (window.screen.width >= 576) {
		        $('.populars').removeClass('d-none').addClass('d-block');
		    }else{
		        $('.popular').removeClass('d-none').addClass('d-block');
		    }
		    $('.routing__point_two').text('обличчя');
		}
		$('.slick__arrow_right').click();
	});
	
	$('.routing__point_two').click(function() {
        $('.products').removeClass('d-none').addClass('d-block');
    	$('.description').removeClass('d-block').addClass('d-none');
    	$('.populars').addClass('d-none');
    	$('.crumbs').removeClass('d-block').addClass('d-none');
    	$('.crumbs__one').removeClass('d-none').addClass('d-block');
    	$('.crumbs__two').removeClass('d-none').addClass('d-block');
	});
	// Окрыть меню товаров в мобильной версии
	$('.menu__burger').click(function() {
	    $('.nav__menu').removeClass('d-none').addClass('d-flex').css({height: 0}).animate({
            height: 478
        }, 1000,);
		$('.menu__closer').removeClass('d-none').addClass('d-block');
		$('.menu__burger').removeClass('d-block').addClass('d-none');
	});
	function test(){
	    $('.nav__menu').removeClass('d-flex').addClass('d-none');
	}
	$('.menu__closer, .nav__item, .poduct__menu_subitem, .brand__menu_subitem').click(function() {
	    if (window.screen.width <= 576) {
    	    if ($(this).attr('id') == 'makeup'){
    	        
	        }else{
        		$('.nav__menu').removeClass('d-none').addClass('d-flex').css({height: 478}).animate({
                    height: 0,
                }, 500,);
                setTimeout(test, 490);
                $('.poduct__menu_header').removeClass('d-none');
                $('.brand__menu_header').css('top', '375px');
        		$('.menu__closer').removeClass('d-block').addClass('d-none');
        		$('.menu__burger').removeClass('d-none').addClass('d-block');
	        }
	    }
	});
	$('.description__qty').change(function() {
	    var fromId = $(this).attr('id');
	    var fromQty = $(this).val();
	    $('.description__qty_' + fromId).val(fromQty);
    });
	// Закрыть меню товаров в мобильной версии
	$('.nav__back').click(function() {
		$('.nav__menu').removeClass('d-flex').addClass('d-none');
	});
	$('.color__icon').click(function() {
		$('.color__list').toggleClass('d-none');
	});
	$('.color__mobile').click(function() {
		color = $(this).css('background');
		$('.description__colors_mobile').css('background', color);
		$('.color__list').addClass('d-none');
	});
	/*Slick slider for Popular*/
	function slickGo(){
	   if (window.screen.width >= 576) {
        	$('.item__slick').slick({
        		dots: true,
        		centerMode: false,
        		slidesToShow: 4,
        		slidesToScroll: 4,
        		nextArrow: '<i class="fas fa-chevron-right slick__arrow slick__arrow_right"></i>',
        		prevArrow: '<i class="fas fa-chevron-left slick__arrow slick__arrow_left"></i>'
        	});
    	}else{
        	$('.item__slick').slick({
    		    slidesToShow: 1,
    		    slidesToScroll: 1,
        	    dots: true,
        	    nextArrow: '<i class="fas fa-chevron-right slick__arrow_right slick__arrow"></i>',
        	    prevArrow: '<i class="fas fa-chevron-left slick__arrow_left slick__arrow"></i>',
                variableWidth: true  
        	});
        // 	$('.description__carusel').slick({
        //         arrows: false,
        //         dots: false,
        //         vertical: true,
        //         verticalSwiping: true,
        //         slidesToShow: 3,
        //         focusOnSelect: 1,
        //         centerMode: true
        // 	});
        }
	   $('.item__slick_cart').slick({
			dots: true,
			infinite: false,
			speed: 300,
			rows: 1,
			slidesToShow: 4,
			slidesToScroll: 4,
			nextArrow: '<i class="fas fa-chevron-right d-none d-md-block slick__arrow slick__arrow_right_cart"></i>',
    		prevArrow: '<i class="fas fa-chevron-left d-none d-md-block  slick__arrow slick__arrow_left_cart"></i>',
			responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 4,
					slidesToScroll: 4,
					infinite: true,
					dots: true
				}
			},
		{
			breakpoint: 600,
			settings: {
			    nextArrow: '<i class="fas fa-chevron-right slick__arrow slick__arrow_right_cart"></i>',
    		prevArrow: '<i class="fas fa-chevron-left slick__arrow slick__arrow_left_cart"></i>',
				slidesToShow: 2,
				slidesToScroll: 2
			}
		},
		{
			breakpoint: 480,
			settings: {
			    nextArrow: '<i class="fas fa-chevron-right slick__arrow slick__arrow_right_cart"></i>',
    		    prevArrow: '<i class="fas fa-chevron-left slick__arrow slick__arrow_left_cart"></i>',
				slidesToShow: 2,
				slidesToScroll: 2
			}
		}
		// You can unslick at a given breakpoint now by adding:
		// settings: "unslick"
		// instead of a settings object
		]
    	});
    	$('.exposed__images_mobile').slick({
    		dots: true,
    		arrows: false
    	});
    	/*$('.item__slick').slick({
    	    centerMode: true,
    	    dots: true,
    	    nextArrow: '<i class="fas fa-chevron-right slick__arrow_right slick__arrow"></i>',
    	    prevArrow: '<i class="fas fa-chevron-left slick__arrow_left slick__arrow"></i>',
            centerPadding: '0px',
            slidesToShow: 1,
    		variableWidth: true
    	});*/
    	$('.secondmenu__list').slick({
    	    slidesToShow: 3,
            slidesToScroll: 1,
    		variableWidth: true,
    		arrows: false
    	});
    	$('.history__slick').slick({
    	    dots: true,
    		infinite: false,
    		speed: 300,
    		rows: 1,
    		slidesToShow: 2,
    		slidesToScroll: 1,
    		variableWidth: true,
    		responsive: [
        		{
        			breakpoint: 600,
                    settings: "unslick"
        		}
    		]
    	});
    	$('.highlights__lists').slick({
    	    slidesToShow: 2,
            slidesToScroll: 1,
    		variableWidth: true,
    		infinite: false,
    		arrows: true,
    		nextArrow: '<i class="fas fa-chevron-right slick__arrow_right slick__arrow"></i>',
    	    prevArrow: '<i class="fas fa-chevron-left slick__arrow_left slick__arrow"></i>',
    		dots: true,
    		responsive: [
        		{
        		    breakpoint: 600,
                    settings: {
                        slidesToScroll: 1,
                        arrows: false,
                        infinite: true
                    }
        		}
    		]
    	});
    	$('.insta__slick').slick({
    	    slidesToShow: 4,
            slidesToScroll: 4,
    		variableWidth: true,
    		infinite: false,
    		arrows: true,
    		nextArrow: '<i class="fas fa-chevron-right slick__arrow_right slick__arrow"></i>',
    	    prevArrow: '<i class="fas fa-chevron-left slick__arrow_left slick__arrow"></i>',
    		dots: true,
    		responsive: [
        		{
        		    breakpoint: 600,
                    settings: {
                        slidesToScroll: 1,
                        arrows: false,
                        infinite: true
                    }
        		}
    		]
    	});
    	 $('.consultation__slick').slick({
    	    slidesToShow: 2,
            slidesToScroll: 1,
    		variableWidth: true,
    		arrows: true,
    		nextArrow: '<div class="arrow__cons arrow__cons_right"><img src="img/arrow__cons.png" alt="arrow" class="arrow__cons_img"></div>',
    	    prevArrow: '<div class="arrow__cons arrow__cons_left"><img src="img/arrow__cons.png" alt="arrow" class="arrow__cons_img"></div>',
    		responsive: [
        		{
        		    breakpoint: 600,
                    settings: {
                        arrows: false
                    }
        		}
    		]
    	}); 
	}
	// Написание номера телефона
	$('#phone').mask("+380 99 999 99 99");
	$('#phone').on('focus click', function() {
	  $(this)[0].setSelectionRange(4, 4);
	});
	function destroyCarousel() {
      if ($('.content__slick').hasClass('slick-initialized')) {
        $('.content__slick').slick('destroy');
      };
      if ($('.item__slick').hasClass('slick-initialized')) {
        $('.item__slick').slick('destroy');
      };
      if ($('.content__top').hasClass('slick-initialized')) {
        $('.content__top').slick('destroy');
      };  
      if ($('.comments__slider').hasClass('slick-initialized')) {
        $('.comments__slider').slick('destroy');
      };  
    }
    destroyCarousel();
    slickGo();
	arrowHeight();
	AOS.refreshHard();
	$('.addBtn').click(function() {
	    var buttonValue = $('.addbutton').val();
	    var newValue = parseInt(buttonValue) + 1;
	    $('.item' + newValue).removeClass('d-none');
	    $('.addbutton').val(newValue);
	});
	
	$('.shortText').each(function() {
	    var initText = $(this).text();
    	if (initText.length > 30){
    	    $(this).text(initText.substring(0,30) + "...");
    	}
    });
});