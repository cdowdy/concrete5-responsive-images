<?php defined('C5_EXECUTE') or die('Access denied.');
	// for edit mode clash fixes 
	$page            = Page::getCurrentPage();
	// v is view. used in switch to place script in footer
	$v               = View::GetInstance();
	// Image helper
	$image           = Loader::helper('image');
	// default picture 
	$default         = File::getByID($pictureID);
	$defaultPath     = $default->getVersion()->getRelativePath();
	// grab file desription or file title 
	$fileDescription = $default->getApprovedVersion()->getDescription();
	$fileTitle       = $default->getApprovedVersion()->getTitle();
	// medium picture
	$medium          = File::getByID($mediumPictureFID);
	$mediumPath      = $medium->getVersion()->getRelativePath();
	// large picture
	$large           = File::getByID($largePictureFID);
	$largePath       = $large->getVersion()->getRelativePath();
	// extra large retina images
	$retina          = File::getByID($retinaPictureFID);
	$retinaPath      = $retina->getVersion()->getRelativePath();
	
	$defaultQuery    = 'min-width: 1px';
	$mediumQuery     = 'min-width: 641px';
	$largeQuery      = 'min-width: 1024px';
	$retinaQuery     = 'min-device-pixel-ratio: 2';

	if ($mediaQuery  == 'foundation' && isset($defaultQuery)) {
		$first_query = $defaultQuery;
	}
	if ($mediaQuery  == 'foundation' && isset($mediumQuery)) {
		$second_query = $mediumQuery;
	}
	if ($mediaQuery  == 'foundation' && isset($largeQuery)) {
		$third_query = $largeQuery;
	}
	if ($mediaQuery  == 'foundation' && isset($retinaQuery)) {
		$fourth_query = $retinaQuery;
	}
	if ($mediaQuery  == 'customQuery' && isset($customDefault)) {
		$first_query = $customDefault;
	}
	if ($mediaQuery  == 'customQuery' && isset($customMedium)) {
		$second_query = $customMedium;
	}
	if ($mediaQuery  == 'customQuery' && isset($customLarge)) {
		$third_query = $customLarge;
	}
	if ($mediaQuery  == 'customQuery' && isset($customretina)) {
		$fourth_query = $customretina;
	}
?>
<span data-picture data-alt="<?php echo $altText; ?>">
    <span data-src="<?php echo $defaultPath;?>"></span>
    <?php if (isset($medium)) {?>
    <span data-src="<?php echo $mediumPath;?>"     data-media="(<?php echo $second_query;?>)"></span>
    <?php }?>
    <?php if (isset($large)) {?>
    <span data-src="<?php echo $largePath;?>"      data-media="(<?php echo $third_query;?>)"></span>
    <?php }?>
    <?php if (isset($retina)) {?>
	<span data-src="<?php echo $retinaPath;?>" 	   data-media="(<?php echo $fourth_query;?>)"></span>
	<?php } ?>

    <!-- Fallback content for non-JS browsers. Same img src as the initial, unqualified source element. -->
    <noscript>
        <img src="<?php echo $defaultPath;?>" alt="<?php echo $altText; ?>">
    </noscript>
</span>