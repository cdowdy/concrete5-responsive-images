<?php defined('C5_EXECUTE') or die('Access denied.');
class ResponsiveImagePackage extends Package {

	protected $pkgHandle          = 'responsive_image';
	protected $appVersionRequired = '5.6.0';
	protected $pkgVersion         = '0.9.0';
	
	public function getPackageName() {
		return t( 'Responsive Image' );
	}

	public function getPackageDescription() {
		return t( 'Image block that uses Responsive Image Techniques like: Zurb Foundation Interchange and Scott Jehl\'s Picturefill' );
	}
	
	public function install() {
		$pkg = parent::install();

		BlockType::installBlockTypeFromPackage( 'responsive_image', $pkg );
	}
}