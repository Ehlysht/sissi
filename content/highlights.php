<?php
	session_start();
	error_reporting(0);
	ini_set('display_errors', 0);
	if ($_SESSION['name'] == '') {
		$_SESSION['name'] = time();

	}else{
		echo "<p class='d-none'></p>";
	}
	if ($_SESSION['name'] == 'Tomash') {
		echo "<form action='logout.php' method='POST'><button>Log out</button></form>";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Google fonts -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Unica+One&display=swap" rel="stylesheet">
	<!-- Bootstrap style -->
	<link rel="stylesheet" href="../css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<!-- SlickSlider style -->
	<link rel="stylesheet" href="../css/slick.css">
	<link rel="stylesheet" href="../css/slick-theme.css">
	<!-- Animate CSS 
	<link rel="stylesheet" href="css/animate.min.css"/>-->
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<!-- Main style -->
	<link rel="stylesheet" href="../css/style.css">
	<title>Highlights</title>
</head>
<?php include ('../header.php');
    echo "<p class='d-none loadWho'>" . $_POST['who'] . "</p>";
    echo "<p class='d-none loadWhere'>" . $_POST['where'] . "</p>";
?> 
<section class="highlights" id="highlights">
    <img src="../../img/highlightsbg1.png" alt="Background" class="highlights__full_bg highlights__full_bg1">
    <img src="../img/highlightsbg2.png" alt="Background" class="highlights__full_bg highlights__full_bg2">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="highlights__full highlights1 d-none">
                    <a href="../index.php" class="highlights__back_arrow align-self-start"><i class="fas fa-arrow-left highlights__back_icon"></i></a>
                    <div class="highlights__full_list">
                        <img src="../img/highlightsfullmob1.png" alt="highlights" class="highlights__full_img d-md-none d-block">
                        <img src="../img/highlightsfull1.png" alt="highlights" class="highlights__full_img d-md-block d-none">
                        <p class="highlights__full_text text-center">
                            Маска для обличча: як її обрати?
                        </p>
                    </div>
                    <p class="highlights__full_textdecs highlights__full_textdecs-one">
                        Щоб розслабитися наприкінці напруженого дня, підготувати шкіру до нанесення макіяжу або просто насолодитися сеансом догляду, гідним будь-якого салону<br> можна завжди поставитись на маски для обличчя!
                    </p>
                    <p class="highlights__full_texttitle">
                        Але як вибрати правильну маску для своєї шкіри?
                    </p>
                    <p class="highlights__full_textdecs highlights__full_textdecs-two">
                        Легко, якщо дотримуватись рекомендацій нашого міні-путівника, який  навчить орієнтуватися в чарівному світі процедур по догляду за шкірою
                    </p>
                     <p class="highlights__full_texttitle">
                        Маски для обличчя - для кожного типу шкіри
                    </p>
                    <p class="highlights__full_textdecs highlights__full_textdecs-three">
                        Маски трохи схожі на нас - усі вони різні! З огляду на це, перше, що нам потрібно зробити, щоб вибрати правильну маску, - це визначити тип шкіри та її потреби.
                    </p>
                    <p class="highlights__full_textdecs highlights__full_textdecs-four">
                        Давайте назвемо це «принципом користі»: ви визначите, до якого типу відноситься ваша шкіра (і що їй потрібно), а ми скеруємо вас до ідеальної маски.
                    </p>
                    <p class="highlights__full_textdecs">
                        1. Якщо у вас <span>суха</span> шкіра, вам знадобиться зволожуюча маска та / або живильний варіант.
                    </p>
                    <div class="highlights__desc text-center">
                        <img src="../img/highlightsdesc1.jpg" alt="Картинка з опису" class="highlights__descimg highlights__descimg_first">
                        <p class="highlights__desc_subtext">
                            Глибоко зволожуюча маска QianDi с нікотиномідом
                        </p>
                    </div>
                    <p class="highlights__full_textdecs highlights__full_textdecs-five">
                        З першого ж нанесення ви побачите легкодосяжні результати - ваша шкіра буде виглядати м’якшою та зволоженою.  
                    </p>
                    <p class="highlights__full_textdecs">
                        2. Якщо у Вас <span>жирна / комбінована</span> шкіра, матуюча маска – те що Вам потрібно.
                    </p>
                    <div class="highlights__desc text-center">
                        <img src="../img/highlightsdesc2.jpg" alt="Картинка з опису" class="highlights__descimg highlights__descimg_second">
                        <p class="highlights__desc_subtext">
                            Матуюча маска Lulanjina
                        </p>
                    </div>
                    <p class="highlights__full_textdecs highlights__full_textdecs-six">
                        Завдяки специфічній дії цього типу масок ваша шкіра миттєво стане менш блискучою і матиме здоровий та доглянутий вигляд вигляд.
                    </p>
                    <p class="highlights__full_textdecs">
                        3. Якщо Ваша шкіра <span>страждає від недоліків</span>, спробуйте очищувальну маску.
                    </p>
                    <div class="highlights__desc text-center">
                        <img src="../img/highlightsdesc3.jpg" alt="Картинка з опису" class="highlights__descimg highlights__descimg_mask">
                        <p class="highlights__desc_subtext">
                            Очищуюча киснева SPA-маска NCEKO
                        </p>
                    </div>
                    <p class="highlights__full_textdecs highlights__full_textdecs-seven">
                        Ваша шкіра  буде виглядати очищеною від домішок і залишків косметики, що призведе до оновленого сяйва, позбавлення від почервонінь та інших недоліків.
                    </p>
                    <p class="highlights__full_textdecs">
                        4. Якщо Ваша шкіра <span>чутлива</span>, вибирайте заспокійливу маску.
                    </p>
                    <div class="highlights__desc text-center">
                        <img src="../img/highlightsdesc4.jpg" alt="Картинка з опису" class="highlights__descimg highlights__descimg_green">
                        <p class="highlights__desc_subtext highlights__desc_subtext-green">
                            Заспокійлива маска Zhenrentang з екстрактом алоє
                        </p>
                    </div>
                    <p class="highlights__full_textdecs highlights__full_textdecs-eight">
                        Це забезпечіть вашій шкірі негайне полегшення, свіжість і відчуття повного комфорту та. легкості.
                    </p>
                    <p class="highlights__full_textdecs">
                        5. Нарешті, якщо Ваша шкіра відноситься до <span>нормального типу</span>, додайте їй припливу вічної енергії.
                    </p>
                    <div class="highlights__desc text-center">
                        <img src="../img/highlightsdesc5.jpg" alt="Картинка з опису" class="highlights__descimg highlights__descimg_big">
                        <p class="highlights__desc_subtext">
                            Живильна маска Zhenrentang з червоним вином
                        </p>
                    </div>
                    <p class="highlights__full_textdecs highlights__full_textdecs-other">
                        Завдяки специфічним активним речовинам, таким як екстракти кави та чаю, що містяться в масках для обличчя або формулам проти втоми, ваша шкіра буде готова сміливо боротися з усіма випробуваннями та будь-якими викликами, що трапляються на шляху.
                    </p>
                    <p class="highlights__full_texttitle">
                        Як часто потрібно  “маскувати”?
                    </p>
                    <p class="highlights__full_textdecs highlights__full_textdecs-nine">
                        Оскільки кожна маска має свої особливі властивості, ми зазвичай рекомендуємо використовувати маски один-два рази на тиждень, можливо, чергуючи тип використовуваного лікування.
                    </p>
                    <div class="highlights__desc text-center">
                        <img src="../img/highlightsdesc6.jpg" alt="Картинка з опису" class="highlights__descimg highlights__descimg_ladi">
                        <p class="highlights__desc_subtext highlights__desc_subtext-ladi">
                            Зволожуюча гідрогелева маска KIKO Milano
                        </p>
                    </div>
                    <p class="highlights__full_textdecs highlights__full_textdecs-end">
                        Рекомендований проміжок часу, протягом якого слід витримувати маску, завжди вказаний на упаковці або листівці, що постачається разом із продуктом (перевищення цього значення не збільшить ефективності маски :D).
                    </p>
                </div>
                <div class="highlights__full highlights2 d-none">
                    <a href="../index.php" class="highlights__back_arrow align-self-start"><i class="fas fa-arrow-left highlights__back_icon"></i></a>
                    <div class="highlights__full_list">
                        <img src="../img/highlightsfullmob2.png" alt="highlights" class="highlights__full_img d-md-none d-block">
                        <img src="../img/highlightsfull2.png" alt="highlights" class="highlights__full_img highlights__full_img-two d-md-block d-none">
                        <p class="highlights__full_text text-center">
                            Що заважає відростити довгу косу?
                        </p>
                    </div>
                    <p class="highlights__full_textdecs highlights__full_textdecs-hair1">
                        Що заважає відростити довгу косу?
                    </p>
                    <p class="highlights__full_textdecs highlights__full_textdecs-hair1">
                        Коротке - відростити, довге - підстригти, хвилясте - випрямити, пряме - накрутити. Вічне замкнене коло жіночої вдачі. 
                    </p>
                    <p class="highlights__full_textdecs highlights__full_textdecs-hair1">
                        Та що робити якщо не вдається відростити довге волосся, та складається враження що ріст волосся просто зупинився?
                    </p>
                    <p class="highlights__full_textdecs highlights__full_textdecs-hair2">
                        Відповідь на це питання простіша ніж здається. І як би це банально не звучало - правильно підібраний та виконаний догдяд - основа здорових та довгих пасом!
                    </p>
                    <p class="highlights__full_texttitle">
                        Як правильно обрати засоби по догляду?
                    </p>
                    <p class="highlights__full_textdecs highlights__full_textdecs-hair3">
                        При виборі засобів по очищенню та догляду за волоссям перш за все потрібно звертати увагу на Ваш тип шкіри голови та довжини волосся.
                    </p>
                    <div class="highlights__desc text-center">
                        <img src="../img/highlightshair.png" alt="Картинка з опису" class="highlights__descimg">
                    </div>
                    <p class="highlights__full_textdecs highlights__full_textdecs-hair4">
                        Часто трапляється що тип та стан довжини волосся та коренів різняться (наприклад, шкіра голови жирна, а кінчики - сухі), тому засоби потрібно обирати ретельно для того щоб добитися максимально комфортного поєднання очищення та догляду.
                    </p>
                    <p class="highlights__full_textdecs highlights__full_textdecs-hair5">
                        Нижче, ми приведемо приклади схем доляду для основних типів волосся, продукцію з яких також можна придбати в Sissi Beauty Shop.
                    </p>
                    <p class="highlights__full_texttitle">
                        Сухий тип шкіри + сухі кінчики
                    </p>
                    <p class="highlights__full_textdecs highlights__full_textdecs-hair6">
                        1.	Цей тип волосся так і просить вологи. Відпустити волосся такого типу може завадити схильність до ламкості кінчиків.  Саме тому йому потрібен шампунь який м‘яко очистить шкіру та кондиціонер який згладитть пухнастісь.
                    </p>
                    <div class="highlights__desc text-center">
                        <img src="../img/highlightsproduct1.png" alt="Картинка з опису" class="highlights__descimg highlights__descimg-poducts">
                    </div>
                    <p class="highlights__full_textdecs highlights__full_textdecs-hair7">
                        Для цього типу волосся ми рекомендуємо використовувати Hask Keratin Complex - поєднання шампунь+маска+ кондиціонер+олійка
                    </p>
                    <p class="highlights__full_textdecs">
                        Шампунь м’яко очистить шкіру голови та залишить не залишить її пересушеною
                    </p>
                    <div class="highlights__desc text-center">
                        <img src="../img/highlightsproduct2.png" alt="Картинка з опису" class="highlights__descimg highlights__descimg-bottle">
                        <p class="highlights__desc_subtext highlights__desc_subtext-hair1">
                             Hask Keratin Protein Smoothing Shampoo
                        </p>
                    </div>
                    <p class="highlights__full_textdecs highlights__full_textdecs-hair8">
                        Маска Keratin Complex згладить сухі пасма та додасть їм пружності завдяки кератину, що міститься в ній
                    </p>
                    <div class="highlights__desc text-center">
                        <img src="../img/highlightsproduct3.png" alt="Картинка з опису" class="highlights__descimg highlights__descimg-pink">
                        <p class="highlights__desc_subtext highlights__desc_subtext-hair2">
                            Hask Kertin Protein Smoothing Deep Conditioner
                        </p>
                    </div>
                    <p class="highlights__full_textdecs highlights__full_textdecs-hair9">
                        Кератинізований кондиціонер згладить волосся та забере пухнастітсть
                    </p>
                    <div class="highlights__desc text-center">
                        <img src="../img/highlightsproduct4.png" alt="Картинка з опису" class="highlights__descimg highlights__descimg-hair1">
                        <p class="highlights__desc_subtext highlights__desc_subtext-hair3">
                            Keratin Protein Smoothing Conditioner
                        </p>
                    </div>
                    <p class="highlights__full_textdecs highlights__full_textdecs-hair10">
                        Олійка додасть блиску та здорового вигляду
                    </p>
                    <div class="highlights__desc text-center">
                        <img src="../img/highlightsproduct5.png" alt="Картинка з опису" class="highlights__descimg highlights__descimg-longbottle">
                        <p class="highlights__desc_subtext highlights__desc_subtext-hair4">
                            Keratin Protein Smoothing Hair Oil
                        </p>
                    </div>
                    <p class="highlights__full_texttitle">
                        Жирний тип шкіри + сухі кінчики
                    </p>
                    <p class="highlights__full_textdecs highlights__full_textdecs-hair11">
                        Для цього типу волосся необхідне ретельне очищення шкіри голови та зволоження пасом.
                    </p>
                    <div class="highlights__desc text-center">
                        <img src="../img/highlightsproduct6.png" alt="Картинка з опису" class="highlights__descimg highlights__descimg-bighask">
                    </div>
                    <p class="highlights__full_textdecs highlights__full_textdecs-hair12">
                        Саме тому для цього типу ми рекомендуємо користуватись біотиновим комплексом від HASK.
                    </p>
                    <div class="highlights__desc text-center">
                        <img src="../img/highlightsproduct7.png" alt="Картинка з опису" class="highlights__descimg highlights__descimg-bottle1">
                        <p class="highlights__desc_subtext highlights__desc_subtext-hair5">
                            Biotin Boost Thickening Shampoo
                        </p>
                    </div>
                    <p class="highlights__full_texttitle highlights__full_textdecs-hair13">
                        Біотиновий шампунь зміцнить волосся від коренів, добре очищуючи його. Завдяки біотину, шампунь також має властивість зміцнювати та відновлювати волосинки.
                    </p>
                    <div class="highlights__desc text-center">
                        <img src="../img/highlightsproduct8.png" alt="Картинка з опису" class="highlights__descimg highlights__descimg-product1">
                        <p class="highlights__desc_subtext highlights__desc_subtext-hair6">
                            Argan Oil Repairing Deep Conditioner 
                        </p>
                    </div>
                    <p class="highlights__full_texttitle highlights__full_textdecs-hair14">
                        Для зволоження довжини можна обрати масочку від HASK з аргановою олією, яка доповнить догляд та зробить волосся більш слухняним та ніжним.
                    </p>
                    <div class="highlights__desc text-center">
                        <img src="../img/highlightsproduct9.png" alt="Картинка з опису" class="highlights__descimg highlights__descimg-product2">
                        <p class="highlights__desc_subtext highlights__desc_subtext-hair7">
                            Biotin Boost Thickening Conditioner
                        </p>
                    </div>
                    <p class="highlights__full_textdecs highlights__full_textdecs-hair15">
                        Кондиціонер - розгладить довжину не обтяжуючи волосся. Крім цього він створює неймовірно красивий візуал, що змусить Вас пишатися своїми пасмами.
                    </p>
                    <p class="highlights__full_texttitle">
                        Сухий тип шкіри голови та нормальні кінчики
                    </p>
                    <p class="highlights__full_textdecs highlights__full_textdecs-hair16">
                        Такий тип волосся зустрічається зазвичай у власниць не фарбованого волосся.
                    </p>
                    <div class="highlights__desc text-center">
                        <img src="../img/highlightsproduct10.png" alt="Картинка з опису" class="highlights__descimg highlights__descimg-product3">
                        <p class="highlights__desc_subtext highlights__desc_subtext-hair8">
                            Monoi Coconut Oil Nourishing Shampoo
                        </p>
                    </div>
                    <p class="highlights__full_textdecs highlights__full_textdecs-hair17">
                        Для ретельного відмивання та наповнення шкіри голови вологою рекомендуємо Monoi Coconut Oil шампунь.
                    </p>
                    <p class="highlights__full_textdecs highlights__full_textdecs-hair18">
                        А для зволоження кінчиків, щоб уникнути сухості -  маску-кондиціонер з цього ж набору.
                    </p>
                    <div class="highlights__desc text-center">
                        <img src="../img/highlightsproduct11.png" alt="Картинка з опису" class="highlights__descimg highlights__descimg-product4">
                        <p class="highlights__desc_subtext highlights__desc_subtext-hair9">
                            Monoi Coconut Oil Nourishing Deep Conditioner
                        </p>
                    </div>
                    <p class="highlights__full_textdecs highlights__full_textdecs-hair19">
                        Вона захистить волосся від пошкоджень під час миття та додасть м’якості. В даному випадку радимо використовувати маску 1 раз на тиждень, щоб уникнути переобтяження волосся.
                    </p>
                    <div class="highlights__desc text-center">
                        <img src="../img/highlightsproduct12.png" alt="Картинка з опису" class="highlights__descimg">
                        <p class="highlights__desc_subtext highlights__desc_subtext-hair10">
                            Monoi Coconut Oil Nourishing Conditioner 
                        </p>
                    </div>
                    <p class="highlights__full_textdecs highlights__full_textdecs-hair20">
                        Фінальним етапом миття стане кондиціонер з кокосом – він розгладить волосся та вирівняє його, для уникнення хвилястості та створення рівномірного візуалу.
                    </p>
                    <div class="highlights__desc text-center">
                        <img src="../img/highlightsproduct13.png" alt="Картинка з опису" class="highlights__descimg">
                    </div>
                    <p class="highlights__full_textdecs highlights__full_textdecs-hair21">
                        Корисна порада: нанесіть трохи кондиціонеру на вологе волосся перед миттям - таким чином він не лише зволожить їх, але і захистить від тертя та механічних пошкоджень під час промивання.
                    </p>
                    <p class="highlights__full_texttitle">
                        Порада для власниць будь-якого з перелічених типів волосся:
                    </p>
                    <p class="highlights__full_textdecs highlights__full_textdecs-hair22">
                        Для полегшення розчісування волосся, після миття та уникнення пошкоджень завданих щіткою, використовуйте на вимитому волоссі незмивні кондиціонери.
                    </p>
                    <div class="highlights__desc text-center">
                        <img src="../img/highlightsproduct14.png" alt="Картинка з опису" class="highlights__descimg">
                        <p class="highlights__desc_subtext highlights__desc_subtext-hair11">
                            Hask Argan Oil 5-in-1 Leave-In Spray
                        </p>
                    </div>
                    <p class="highlights__full_textdecs highlights__full_textdecs-hair23">
                        Це може бути HASK Argan Oil of Morocco 5 in 1 -  спрей з маслом аргани, що має цілих 5 корисних властивостей – серед яких зволоження та термозахист.
                    </p>
                    <div class="highlights__desc text-center">
                        <img src="../img/highlightsproduct15.png" alt="Картинка з опису" class="highlights__descimg">
                        <p class="highlights__desc_subtext highlights__desc_subtext-hair12">
                            Monoi Coconut  5-in-1 Leave-In Spray 
                        </p>
                    </div>
                    <p class="highlights__full_textdecs highlights__full_textdecs-hair24">
                        Або HASK Coconut Oil, що має аналогічні властивості – зволожує волосинки, допомагає при розчісуванні, захищає від високих температур та неймовірно пахне!
                    </p>
                    <p class="highlights__full_textdecs">
                        З урахуванням усіх наших порад, ми впевнені що і Ви зможете віростити омріяну довжину!
                    </p>
                </div>
                <div class="highlights__full highlights3 d-none">
                    
                    <a href="../index.php" class="highlights__back_arrow align-self-start"><i class="fas fa-arrow-left highlights__back_icon"></i></a>
                    <div class="highlights__full_list">
                        <img src="../img/highlightsfullmob3.png" alt="highlights" class="highlights__full_img d-md-none d-block">
                        <img src="../img/highlightsfull3.png" alt="highlights" class="highlights__full_img highlights__full_img-three d-md-block d-none">
                        <p class="highlights__full_text text-center">
                            Макіяж за 10 хвилин? Легко!
                        </p>
                    </div>
                    <p class="highlights__full_textdecs highlights__full_textdecs-make1">
                        Макіяж за 10 хвилин ? Легко!<br>
                        У цій статті ми розповімо про всі засоби які знажобляться для створення швидкого мейку! Цей міні-гайд, саме те, що Вам знадобиться для створення експрес-макіяжу зранку!
                    </p>
                    <p class="highlights__full_texttitle">
                        Етап 1. Тон
                    </p>
                    <p class="highlights__full_textdecs highlights__full_textdecs-make2">
                        У підборі тону важливо не тільки вгадати з відтінком, але й зауважити потреби шкіри обличчя, які засіб може вирішити або замаскувати.
                    </p>
                    <p class="highlights__full_textdecs highlights__full_textdecs-make3">
                        Ми рекомендуємо віддавати перевагу лешким тональним засобам так як вони не надто забивають пори та не перевантажують макіяж. 
                    </p>
                    <div class="highlights__desc text-center">
                        <img src="../img/highlightslips1.png" alt="Картинка з опису" class="highlights__descimg">
                        <p class="highlights__desc_subtext highlights__desc_subtext-make1">
                            KIKO MILANO Smart Hydrating Foundation
                        </p>
                    </div>
                    <p class="highlights__full_textdecs highlights__full_textdecs-make4">
                        Одним з таких засобів може бути тональний крем KIKO Smart Hydrating Foundation, який зволожить шкіру, та захистить її від сонячних променів завдяки SPF 15, що в ньому міститься.
                    </p>
                    <p class="highlights__full_texttitle">
                        Етап 2. Скульптурування/контуринг
                    </p>
                    <p class="highlights__full_textdecs highlights__full_textdecs-make5">
                        На етапі скульптурування, важливо звернути увагу на легкість використання (нанесення) скульптурчого засобу та на його стікість.
                    </p>
                    <p class="highlights__full_textdecs highlights__full_textdecs-make6">
                        Вирішує обидва цих питання скульптуруючий стік від KIKO MILANO Sculpting Touch Creamy Stick Contour.Його кремова текстура забезпечує стійкий ефект, а форма стіку - легкість нанесення.
                    </p>
                    <div class="highlights__desc text-center">
                        <img src="../img/highlightslips2.png" alt="Картинка з опису" class="highlights__descimg">
                        <p class="highlights__desc_subtext highlights__desc_subtext-make2">
                            KIKO MILANO Sculpting Touch Creamy Stick Contour
                        </p>
                    </div>
                    <p class="highlights__full_textdecs highlights__full_textdecs-make7">
                        Порада: наносячи контур, уявіть що малюєте цифру 3 на обличчі. Так Вам буде легше зрозуміти та втілити на собі оптимальну схему нанесення контуру
                    </p>
                    <p class="highlights__full_texttitle">
                        Етап 3. Пудра
                    </p>
                    <p class="highlights__full_textdecs highlights__full_textdecs-make8">
                        Для закріплення ефекту створеного від попередніх етапів необхідна пудра. Вона втримає макіяж на місці протягом усього дня!
                    </p>
                    <p class="highlights__full_textdecs highlights__full_textdecs-make9">
                        Ми радимо використовувати прозору, легку пудру, KIKO Invisible Touch Face Fixing Pouder.Вона легко лягає на обличчя та не зтягує шкіру. За допомогою цієї пудри також можна вдало приховати недоліки шкіри та вирівняти тон.
                    </p>
                    <div class="highlights__desc text-center">
                        <img src="../img/highlightslips3.png" alt="Картинка з опису" class="highlights__descimg">
                        <p class="highlights__desc_subtext highlights__desc_subtext-make3">
                            KIKO MILANO Invisible Touch Face Fixing Powder
                        </p>
                    </div>
                    <p class="highlights__full_texttitle">
                        Етап 4. Олівець для підкреслення очей
                    </p>
                    <p class="highlights__full_textdecs highlights__full_textdecs-make10">
                        Очі - основний елемент будь-якого образу. Саме тому візажисти рекомендують підкреслювати міжвійну зону коричневим олівцем. Такий не хитрий прийом додасть Вашому погляду виразності та зробить макіяж ще більш ефектним. 
                    </p>
                    <p class="highlights__full_textdecs highlights__full_textdecs-make11">
                        Олівець для міжвійки повинен бути м‘яким - щоб ним було зручно профарбувати всі куточки ока. В той самий час він аовинен бути і стійким, аби не зтікати на протязі дня. 
                    </p>
                    <p class="highlights__full_textdecs highlights__full_textdecs-make12">
                        Наш варіант - олівець KIKO Color Kajal - м‘який олівець з яскравим відтінком, як ий тримається на очах на протязі всього дня. Його можна використовувати як на міжвійці так і еа поверхні ока. 
                    </p>
                    <div class="highlights__desc text-center">
                        <img src="../img/highlightslips4.png" alt="Картинка з опису" class="highlights__descimg">
                        <p class="highlights__desc_subtext highlights__desc_subtext-make4">
                            KIKO MILANO Colour Kajal
                        </p>
                    </div>
                    <p class="highlights__full_texttitle">
                        Етап 5. Універсальні тіні
                    </p>
                    <p class="highlights__full_textdecs highlights__full_textdecs-make13">
                        У косметичці кожної жінки повинні бути універсальні тіні коричневого кольору для щоденного макіяжу. А якщо Ви подюбляєте різні відтінки коричневого - рекомендємо звернути увагу на палетку KIKO Smart Eyeshadow Palette - яка вміщує в собі цілих 10 універсальних відтінків - від темно коричневого до бежевого і дозволить Вам втілити будь-які ідеї до денного макіяжу у життя! 
                    </p>
                    <div class="highlights__desc text-center">
                        <img src="../img/highlightslips5.png" alt="Картинка з опису" class="highlights__descimg">
                        <p class="highlights__desc_subtext highlights__desc_subtext-make5">
                            KIKO MILANO Smart Eyeshadow Palette
                        </p>
                    </div>
                    <p class="highlights__full_texttitle">
                        Етап 6. Туш для вій
                    </p>
                    <p class="highlights__full_textdecs highlights__full_textdecs-make14">
                         При виборі туші потрібно звертати увагу на форму вій, а також на схильність туші осипатись та залишати темні кола на очах. 
                    </p>
                    <p class="highlights__full_textdecs highlights__full_textdecs-make15">
                        Якщо ж Ви шукаєте туш, що видовжить Ваші вії та в той самий час протримається на них цілий деньт- туш KIKO Lost in Amalfi Click Mascara – те, що Вам потрібно. 
                    </p>
                    <p class="highlights__full_textdecs highlights__full_textdecs-make16">
                        Ця туш неймовірно видовжух вії, додає їм пыгментованого чорного кольору, а також є гіпоалергенною! Бонус - вона не залишає темних кіл під очима. Ми перевірили.
                    </p>
                    <div class="highlights__desc text-center">
                        <img src="../img/highlightslips6.png" alt="Картинка з опису" class="highlights__descimg">
                        <p class="highlights__desc_subtext highlights__desc_subtext-make6">
                            KIKO MILANO Lost In Amalfi 24h Lasting Click Mascara
                        </p>
                    </div>
                    <p class="highlights__full_texttitle">
                        Етап 7. Брови
                    </p>
                    <p class="highlights__full_textdecs highlights__full_textdecs-make17">
                        Брови - вирішують усе. Так так, вони можуть зробити або зруйнувати весь попередній макіяж! 
                    </p>
                    <p class="highlights__full_textdecs highlights__full_textdecs-make18">
                        Саме тому для догляду за ними потрібен засіб яким легко користуватися та який не потребує докладання особливих талантів бровиста.
                    </p>
                    <p class="highlights__full_textdecs">
                        Тут наша рекомендація – KIKO Eyebrow Fibers Coloured Mascara 
                    </p>
                    <p class="highlights__full_textdecs highlights__full_textdecs-make19">
                        Це гель для брів із кольором що виконує одразу 2 функції: фарбує брови у бажаний відтінок та вкладає їх. Таким чином здійснивши всього кілька рухів ви зможете створити собі брови не гірші ніж після відаідування бровиста.
                    </p>
                    <div class="highlights__desc text-center">
                        <img src="../img/highlightslips7.png" alt="Картинка з опису" class="highlights__descimg">
                        <p class="highlights__desc_subtext highlights__desc_subtext-make7">
                            KIKO MILANO Eyebrow Fibers Coloured Mascara
                        </p>
                    </div>
                    <p class="highlights__full_texttitle">
                        Етап 8. Хайлайтер та Рум‘яна
                    </p>
                    <p class="highlights__full_textdecs highlights__full_textdecs-make20">
                        Для того щоб виклристання рум‘ян не зіпсувало образу, потрібно обрати саме легкий відтінок, що не буде відривати увагу від основного мейку. 
                    </p>
                    <p class="highlights__full_textdecs highlights__full_textdecs-make21">
                        Ми рекомендуємо спробувати KIKO Holiday Gems Double Shine Blush and Highlighter. Цей кремовий стік поєднує хайлайтер та ніжні рожеві рум‘яна в одному засобі. Завдяки кремовій текстурі він легко наноситься та розподіляється по шкірі. 
                    </p>
                    <div class="highlights__desc text-center">
                        <img src="../img/highlightslips8.png" alt="Картинка з опису" class="highlights__descimg">
                        <p class="highlights__desc_subtext highlights__desc_subtext-make8">
                            KIKO MILANO Holiday Gems Double Shine Blush & Highlighter
                        </p>
                    </div>
                    <p class="highlights__full_texttitle">
                        Етап 9. Блиск для губ
                    </p>
                    <p class="highlights__full_textdecs highlights__full_textdecs-make22">
                        Фінальний етап в нашому експрес макіяжі - губи. Аби додати завершального блиску образу та зробити його неаовторним - ми ректмендуємо скористатись одним з блисків з серії KIKO 3D HYDRA від Kiko Milano. Ці блиски не лише красиво переливаються, але і зволожують губи, роблячи їх ще більш привабливими. 
                    </p>
                    <div class="highlights__desc text-center">
                        <img src="../img/highlightslips9.png" alt="Картинка з опису" class="highlights__descimg">
                        <p class="highlights__desc_subtext highlights__desc_subtext-make9">
                            KIKO MILANO 3d Hydra Lipgloss
                        </p>
                    </div>
                    <p class="highlights__full_textdecs highlights__full_textdecs-make23">
                        Сподіваємось наша міні-нстоукція допоможе Вам у ранішніх зборах та зробить їх трішки приємнішими. 
                    </p>
                    <p class="highlights__full_textdecs">
                        <span>P.s</span> - усі перераховані засоби Ви можете придбати у нас в <span>Sissi Beauty Shop</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section> 
<?php include '../footer-index.php'; ?>