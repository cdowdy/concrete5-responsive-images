<?php defined('C5_EXECUTE') or die('Access denied.');
	
class ResponsiveImageBlockController extends BlockController {
	protected $btTable           = 'btResponsiveImage';
	protected $btInterfaceWidth  = "590";
	protected $btInterfaceHeight = "500";
	protected $btWrapperClass    = 'ccm-ui';

	
	protected $btCacheBlockRecord                   = true;
	protected $btCacheBlockOutput                   = true;
	protected $btCacheBlockOutputOnPost             = true;
	protected $btCacheBlockOutputForRegisteredUsers = true;
	protected $btCacheBlockOutputLifetime           = CACHE_LIFETIME;

	public function getBlockTypeDescription() {
		return t( 'Image block that uses Responsive Image Techniques.' );
	}

	public function getBlockTypeName() {
		return t( 'Responsive Image' );
	}

	// default (small no javascript) pictures
	public function getDefaultPicture() {
		return $this->pictureID;
	}
	function getDefaultPictureObject() {
		return File::getByID( $this->pictureID );
	}

	// medium pictures
	public function getMediumPicture() {
		return $this->mediumPictureFID;
	}
	public function getMediumPictureObject() {
		return File::getByID( $this->mediumPictureFID ); 
	}

	// Large pictures
	public function getLargePicture() {
		return $this->largePictureFID;
	}
	public function getLargePictureObject() {
		return File::getByID( $this->largePictureFID ); 
	}

/*
	REMINDER:: PUT DEFAULT PICTURE, SMALL-MEDIUM AND LARGE QUERIES IN THE VIEW FUNCTION

*/

	public function view() {
		$fs = FileSet::getByID( $this->pictureID );
		$ms = FileSet::getByID( $this->mediumPictureFID );
		$ls = FileSet::getByID( $this->largePictureFID );

		$this->set( 'picture', $this->getDefaultPicture() );
		$this->set( 'medium', $this->getMediumPicture() );
		$this->set( 'large', $this->getLargePicture() );
	}
/*
	public function on_page_view() {
			$html = Loader::helper( 'html' );
			$bv   = new BlockView();
			$bv->setBlockObject( $this->getBlockObject() );
			$this->addHeaderItem( $html->css( $bv->getBlockURL() . '/responsive_css/foundation_mq.css' ) );
	}
*/
}