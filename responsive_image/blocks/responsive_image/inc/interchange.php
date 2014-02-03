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
<?php if ($page->isEditMode()) { ?>
<div class="ccm-edit-mode-disabled-item" style="height: 400px">
	<div style="padding: 200px 0px 0px 0px"><?php echo t('Interchange Images Not Displayed in Edit Mode')?></div>
</div>
<?php } ?>
<div>
	<img data-interchange="[<?php echo $defaultPath;?>, (small)], [<?php echo $mediumPath;?>, (medium)], [<?php echo $largePath;?>, (large)]">
	<noscript><img src="<?php echo $defaultPath;?>"></noscript>
</div>
<?php
// send js to footer
$html = Loader::helper( 'html' );

if ( !$page->isEditMode() ) {
	$v->addFooterItem( "<script>$(document).foundation('reflow');</script>" );
}
?>