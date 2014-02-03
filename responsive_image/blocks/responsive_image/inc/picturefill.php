<?php defined('C5_EXECUTE') or die('Access denied.');
	// for edit mode clash fixes 
	$page        = Page::getCurrentPage();
	// v is view. used in switch to place script in footer
	$v           = View::GetInstance();
	// Image helper
	$image       = Loader::helper('image');
	// default picture 
	$default     = File::getByID($pictureID);
	$defaultPath = $default->getVersion()->getRelativePath();
	// medium picture
	$medium      = File::getByID($mediumpictureID);
	$mediumPath  = $medium->getVersion()->getRelativePath();
	// large picture
	$large       = File::getByID($largepictureID);
	$largePath   = $large->getVersion()->getRelativePath();

	
?>
<span data-picture data-alt="<?php echo $altText; ?>">
    <span data-src="<?php echo $defaultPath;?>"></span>
    <?php if (isset($medium)) {?>
    <span data-src="<?php echo $mediumPath;?>"     data-media="(min-width: 400px)"></span>
    <?php }?>
    <?php if (isset($large)) {?>
    <span data-src="<?php echo $largePath;?>"      data-media="(min-width: 800px)"></span>
    <?php }?>
    <?php if (isset($retina)) {?>
	<span data-src="<?php echo $retinaPath;?>" 	   data-media="(min-device-pixel-ratio: 2)"></span>
	<?php } ?>

    <!-- Fallback content for non-JS browsers. Same img src as the initial, unqualified source element. -->
    <noscript>
        <img src="<?php echo $defaultPath;?>" alt="<?php echo $altText; ?>">
    </noscript>
</span>