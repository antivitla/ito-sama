<!--    
    All praise to Allah, maintainer of the World    
    Project: Ito-sama (http://ito-sama.ru)
    Code author: Mr.Woodman (http://mr-woodman.ru)
-->
<?php

$ito_doctype = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" ".
    "\"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n";

$ito_htmlns = "http://www.w3.org/1999/xhtml";

$ito_charset = "utf-8";

$ito_head_mainpage_includes = "<meta name=\"google-site-verification\" ".
    "content=\"Ht9Lj1wiDBAGc2gzwys8C6kJdYAnpxQEVq8uj3AWBzs\" />\r\n".
    "<meta name=\"yandex-verification\" ".
        "content=\"507c187400c9c293\" />\r\n".
    "<meta name=\"verify-reformal\" ".
        "content=\"9b0c28aa76b78a8e41a19c04\" />\r\n".
    "<link rel=\"openid.server\" ".
        "href=\"http://openid.yandex.ru/server/\" />\r\n".
    "<link rel=\"openid.delegate\" ".
        "href=\"http://openid.yandex.ru/ito-sama/\" />\r\n";

$ito_head_includes = "<link href=\"_markup/icon.png\" rel=\"shortcut icon\" type=\"image/png\" />\r\n".
    "<link href=\"thickbox.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n".
    "<link href=\"styles.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n".
    "<link href=\"constructor.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n".
    "<link href=\"content.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n".
    "<script type=\"text/javascript\" src=\"jquery-1.3.2.js\"></script>\r\n".
    "<script type=\"text/javascript\" src=\"thickbox.js\"></script>\r\n".
    "<script type=\"text/javascript\" src=\"scripts.js\"></script>\r\n".
    "<!--[if lte IE 6]>\r\n".
    "<link href=\"ie6.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n".
    "<script type=\"text/javascript\" src=\"DD_belatedPNG_0.0.8a.js\"></script>\r\n".
    "<![endif]-->\r\n";

$ito_header = "<div><a name=\"top\" id=\"top\"></a></div>\r\n".
    "<div id=\"header\">".
    "<img src=\"_markup/header.jpg\" alt=\"Мужская и женская одежда ITO-SAMA\" ".
        "title=\"Мужская и женская одежда ITO-SAMA\" width=\"1070\" ".
        "height=\"310\" usemap=\"#catalogMenu\" />".
    "<map name=\"catalogMenu\" id=\"catalogMenu\"><area shape=\"rect\" ".
        "coords=\"735,201,868,242\" href=\"catalog.php\" ".
        "alt=\"Каталог мужской и женской одежды Ito-sama\" ".
        "title=\"Каталог мужской и женской одежды Ito-sama\" />".
    "<area shape=\"rect\" coords=\"90,111,470,241\" href=\"index.php\" ".
        "alt=\"Перейти на главную страницу магазина\" ".
        "title=\"Перейти на главную страницу магазина\" />".
    "<area shape=\"rect\" coords=\"906,203,949,238\" ".
        "href=\"mailto:mail@ito-sama.ru\" alt=\"Написать мне письмо\" ".
        "title=\"Написать мне письмо\" />".
    "<area shape=\"rect\" coords=\"952,203,982,237\" href=\"help.php\" ".
        "alt=\"Помощь по магазину\" title=\"Помощь по магазину\" />".
    "</map></div>\r\n";

$ito_footer = "<div id=\"footer\">".
    "<ul>".
    "<li class=\"ito-sama\"><a href=\"maito:mail@ito-sama.ru\" ".
        "title=\"Написать мне письмо\">Маньяк-швея ".
        "<span class=\"no-style\">ITO-SAMA</span></a></li>".
    "<li class=\"year2009\">Эх, время, время <span class=\"no-style\">".
        "- 2009 г.</span></li>".
    "<li class=\"mr-woodman\"><a href=\"http://mr-woodman.ru\" ".
        "title=\"Перейти на сайт Mr.Woodman'а\">Зебб-дизайнер &amp; кодер ".
        "<span class=\"no-style\">Mr.Woodman</span></a></li>".
    "</ul>".
    "<div class=\"foto-credits\">Фотки by: <span class=\"name\">".
        "<img src=\"_markup/lj-user-icon.gif\" alt=\"\" width=\"15\" ".
        "height=\"15\" class=\"lj-user-icon\" /> ".
        "<a href=\"http://saulene.livejournal.com/\">saulene</a></span></div>".
    "<div class=\"download-wallpaper\">Скачать этот клёвый ".
        "<a href=\"_files/cute-flowers-bg.jpg\" ".
        "title=\"Картинка для фона рабочего стола\" ".
        "style=\"text-decoration: underline\">бэкграунд с <span class=\"emphase\">".
        "цветочками</span></a> себе на рабочий стол. <br />".
        "(В свойствах поставить &#8220;расположение: рядом&#8221;)</div>".
    "</div>\r\n".
    "<!--[if lte IE 6]><script>DD_belatedPNG.fix('#footer, .content-wrapper, img');".
        "</script><![endif]-->\r\n";

$ito_external_js = "<!-- Reformal.ru -->\r\n".
    "<script type=\"text/javascript\" ".
        "src=\"http://reformal.ru/tab.js".
        "?title=%CC%E0%E3%E0%E7%E8%ED-%E0%F2%E5%EB%FC%E5+Ito-sama".
        "&domain=ito-sama".
        "&color=5283cc&align=left&charset=utf-8&ltitle=&lfont=&lsize=".
        "&waction=0&regime=0\"></script>\r\n".
    "<!-- Google Analytics -->\r\n".
    "<script type=\"text/javascript\">\r\n".
    "var gaJsHost = ((\"https:\" == document.location.protocol) ".
        "? \"https://ssl.\" : \"http://www.\");\r\n".
    "document.write(unescape(\"%3Cscript src='\" + gaJsHost ".
        "+ \"google-analytics.com/ga.js' ".
        "type='text/javascript'%3E%3C/script%3E\"));\r\n".
    "</script>\r\n".
    "<script type=\"text/javascript\">\r\n".
    "try {\r\n".
    "var pageTracker = _gat._getTracker(\"UA-7463960-2\");\r\n".
    "pageTracker._trackPageview();\r\n".
    "} catch(err) {}\r\n".
    "</script>\r\n";
    
$ito_open_content = "<div class=\"content-wrapper\"><div id=\"content\">\r\n";
$ito_close_content= "</div><br class=\"csshack-clearer\" /></div>\r\n";

$default_img_dir = "";

// Page start
function ito_page_start($pagetitle,$type="workpage")
{
    echo $GLOBALS["ito_doctype"].
         "<html xmlns=\"".$GLOBALS["ito_htmlns"]."\">\r\n".
         "<head>\r\n".
         "<meta http-equiv=\"Content-Type\" ".
         "content=\"text/html; charset=".$GLOBALS["ito_charset"]."\" />\r\n".
         "<title>".$pagetitle."</title>\r\n";
    if ($type == "mainpage") echo $GLOBALS["ito_head_mainpage_includes"]; // Insert mainpage header
    echo $GLOBALS["ito_head_includes"]."</head>\r\n".
         "<body>\r\n".
         "\r\n<!-- Header -->\r\n".$GLOBALS["ito_header"].
         "\r\n<!-- Content start -->\r\n".$GLOBALS["ito_open_content"];
}
// Page end
function ito_page_end()
{
    echo "<!-- Content end -->\r\n".$GLOBALS["ito_close_content"].
         "\r\n<!-- Footer -->\r\n".$GLOBALS["ito_footer"]."\r\n".$GLOBALS["ito_external_js"].
         "\r\n</body>\r\n</html>";
}
// Insert Thickbox powered image
function ito_thickbox_img($image,$preview,$descr="")
{
	$dir = $GLOBALS["default_img_dir"];
	echo "<p class=\"center\">".
		 "<a href=\"".$dir."/images/".$image."\" ".$descr."class=\"thickbox\">".
		 "<img src=\"".$dir."/images/preview/".$preview."\" "."alt=\"".$descr."\" />".
		 "</a></p>";
}
?>
