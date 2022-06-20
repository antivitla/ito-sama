<?php 

$ito_htmlinfo = file_get_contents("markup/htmlinfo.html");
$ito_charset = "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\r\n";
$ito_metamainpage = file_get_contents("markup/metamainpage.html");
$ito_links = file_get_contents("markup/links.html");
$ito_header = file_get_contents("markup/header.html");
$ito_footer = file_get_contents("markup/footer.html");
$default_img_dir = "";

// Page start
function ito_page_start($pagetitle,$type="workpage")
{
    echo $GLOBALS["ito_htmlinfo"].$GLOBALS["ito_charset"]."<title>".$pagetitle."</title>\r\n";
    if ($type == "mainpage") echo $GLOBALS["ito_metamainpage"]; // Insert mainpage header
    echo $GLOBALS["ito_links"].$GLOBALS["ito_header"];//.$GLOBALS["ito_open_content"];
}
// Page end
function ito_page_end()
{
    echo $GLOBALS["ito_footer"];
}
// Insert Thickbox powered image
function ito_thickbox_img($image,$preview,$descr="")
{
	$dir = $GLOBALS["default_img_dir"];
	echo "<p class=\"center\">".
		 "<a href=\"".$dir."/images/".$image."\" title=\"".$descr."\" class=\"thickbox\">".
		 "<img src=\"".$dir."/images/preview/".$preview."\" alt=\"".$descr."\" />".
		 "</a></p>";
}
// Mahromize images (insert fabric borders around pictures)
function ito_mahromized_thickbox_img($image,$descr="",$w,$h)
{
	$preview = $GLOBALS["default_img_dir"]."/images/preview/".$image;
	$image = $GLOBALS["default_img_dir"]."/images/".$image;
	$mahromafile = getMahromaFile((int)$w,(int)$h);		
	echo "\t<a href=\"".$image."\" title=\"".$descr."\" class=\"thickbox\">\r\n".
		 "\t\t<span class=\"mahromized\" style=\"background-image: url(". $preview.")\">\r\n".
		 "\t\t\t<img src=\"".$mahromafile."\" alt=\"".$descr."\" />\r\n".
		 "\t\t</span>\r\n".
		 "\t</a>\r\n";
}
function ito_mahromized_img($img,$w,$h)
{
	$mahromafile = getMahromaFile((int)$w,(int)$h);		
	echo "<span class=\"mahromized\" style=\"background-image: url(".$img.")\">".
		 "<img src=\"".$mahromafile."\" /></span>\r\n";
}
function getMahromaFile($w,$h)
{
	$mahromafile = "";
	if($w == 410 && $h == 260) $mahromafile = "markup/ito-half-horz1.png";
	if($w == 410 && $h == 410) $mahromafile = "markup/ito-half-rect.png";
	return $mahromafile;
}
?>