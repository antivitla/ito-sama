<?php include("markup/scripts.php");
ito_page_start("Ткани Ito-sama"); $default_img_dir = "fabric"; ?>

<!-- Заголовок тканей -->
<div class="full bar wide-typo">
<div class="safepin-divider"></div>
</div>

<div class="half bar narrow-typo">
<p class="center">
<?php ito_mahromized_thickbox_img("fabric-collection-04.jpg","",410,260); ?>
</p>
</div>

<div class="half bar narrow-typo">
<p class="center">
<?php ito_mahromized_thickbox_img("fabric-collection-03.jpg","",410,260); ?>
</p>
</div>

<div class="half bar narrow-typo">
<p class="center">
<?php ito_mahromized_thickbox_img("fabric-collection-02.jpg","",410,260); ?>
</p>
</div>

<div class="half bar narrow-typo">
<p class="center">
<?php ito_mahromized_thickbox_img("fabricCHINA-collection-01.jpg","",410,260); ?>
</p>
</div>

<br class="csshack-clearer" />

<div class="full bar wide-typo"><div class="flower-divider"></div></div>
<?php 
$all = glob("fabric/images/preview/*.jpg");
$temp = "";
$c = 0;
for($i = 0; $i < count($all); $i++)
{
	// get filename only (without path)
	$temp = explode("preview/",$all[$i]);
	// skip "collection" fabric images
	if( count(explode("collection",$temp[1])) > 1) continue;
	// insert divider
	if($c == 2)
	{
		echo "<div class=\"full bar wide-typo\"><div class=\"flower-divider\"></div></div>\r\n\r\n";
	}
	if($c == 4)
	{
		echo "<div class=\"full bar wide-typo\"><div class=\"flower-divider\"></div></div>\r\n\r\n";
		$c = 0;
	}
	$c++;
	// insert block
	echo "<div class=\"half bar narrow-typo\">\r\n<p class=\"center\">\r\n";
	// insert mahromized picture
	ito_mahromized_thickbox_img($temp[1],"",410,260);
	// end block
	echo "</p>\r\n</div>\r\n\r\n";
}
?>
<?php ito_page_end() ?>