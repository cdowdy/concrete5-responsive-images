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

	switch ($responsive_solution) {
		case 'interchange':
			$this->inc('/inc/interchange.php');
			break;
		
		case 'pictureFill':
			$this->inc('/inc/picturefill.php');
			break;
	}
?>
