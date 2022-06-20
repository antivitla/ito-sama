<?php include("markup/scripts.php");
ito_page_start("Магазин-ателье Ito-sama","mainpage"); $default_img_dir = "fabric"; ?>

<!-- Заголовок -->
<div class="full bar wide-typo">
    <div class="safepin-divider"></div>    
    <h2>Мой мозг и дальнейшая судьба Ito-sama <strong><em>Under Construction</em></strong>!</h2>
</div>

<!-- Каталог -->
<div class="half bar narrow-typo">
    <div class="flower-divider"></div>
    <h1><a href="catalog.php">Каталог одежды</a></h1>
    <p class="center"><a href="catalog.php">
    <img src="<?php 
		/* Get all half-width images from catalog */
		$catalogImages = glob("catalog/images/preview/*half*.png");
		/* Choose random */	
		echo $catalogImages[rand(0,(count($catalogImages)-1))]; 
	?>" alt="Каталог одежды Ito-sama" /></a></p>
    <p class="center"><small>Обновление 18 ноября 2010.</small></p>
</div>

<!-- Ткань -->
<div class="half bar narrow-typo">
    <div class="safepin-divider"></div>
    <h1><a href="fabric.php">Моя ткань</a></h1>
    <p class="center"><a href="fabric.php">
    	<?php 
		/* Get all fabric collection images */
		$fabricImages = glob("fabric/images/preview/*collection*");
		/* Choose random */	
		$randomImage = $fabricImages[rand(0,(count($fabricImages)-1))]; 
		/* Insert mahmozidex image */
		ito_mahromized_img($randomImage,410,260);
		?>
    </a></p>
    <p class="center">Из неё фон для рабочего стола хороший. <br /><small>Обновлено 21 июня 2010.</small></p>
</div>

<!-- Велкам-инфа -->
<div class="full bar wide-typo">
    <p>Я шью одежду, а это магазин где её можно посмотреть и заказать на свои размеры. Что требуется:</p>
</div>

<!-- Нужны размеры -->
<div class="single bar narrow-typo">
    <div class="flower-divider"></div>
    <h1><!--a href="/help/#how-to-know-your-size"-->Ваши размеры<!--/a--></h1>
    <p>Потребуются ваши размеры. Их нужно всего четыре для любого типа одежды:</p>
    <ul>
        <li><strong>Рост</strong></li>
        <li><strong>Грудь</strong></li>
        <li><strong>Талия</strong></li>
        <li><strong>Бёдра</strong></li>
    </ul>
    <p>А по <a href="help/size/index.html" title="Поиск типовой фигуры">этой проге</a> я найду все остальные. Кстати вы можете прислать мне ссылку на вашу фигуру из этой проги сами.</p>
  <p>Если вас страшит процесс самоизмерения себя, я <a href="help.php#how-to-know-your-size">написал хелп</a>.</p>
</div>

<!-- Нужна фотка -->
<div class="single bar narrow-typo">
    <div class="flower-divider"></div>
    <h1>Ваша фотка</h1>
    <p>Нужна ваша фотка, где у вас спокойное улыбающеся/довольное жизнью лицо. </p>
    <p><img src="markup/smiling-girl.gif" width="198" height="99" alt="Спокойное улыбающееся довольное жизнью лицо" /></p>
    <p>По вашей фотке я подбираю ткань.</p>
</div>

<!-- Ваши комментарии и заказ-->
<div class="single bar narrow-typo">
    <div class="red-flower-divider"></div>
    <h1>Небольшие комментарии</h1>
    <p>Несколько слов куда эта одежка, может быть ваших предпочтения в одежде или цвете.</p>
    <h1>Заказываем</h1>
    <p>Имея всё это (размеры, фотки, комментарии) вы просто пишите мне письмо <a href="mailto:mail@ito-sama.ru">mail@ito-sama.ru</a></p>
</div>

<?php ito_page_end() ?>