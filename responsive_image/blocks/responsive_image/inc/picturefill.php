<?php defined('C5_EXECUTE') or die('Access denied.');
  // for edit mode clash fixes 
  $page            = Page::getCurrentPage();
  // v is view. used in switch to place script in footer
  $v               = View::GetInstance();
  // Image helper
  $image           = Loader::helper('image');
  if (!empty($pictureID)) {
  // default picture 
  $default         = File::getByID($pictureID);
  $defaultPath     = $default->getVersion()->getRelativePath();
  }
  // grab file desription or file title 
  $fileDescription = $default->getApprovedVersion()->getDescription();
  $file_title_alt  = $default->getApprovedVersion()->getTitle();
  // medium picture
  if (!empty($mediumPictureFID)) {
  $medium          = File::getByID($mediumPictureFID);
  $mediumPath      = $medium->getVersion()->getRelativePath();
  }
  // large picture
  if (!empty($largePictureFID)) {
  $large           = File::getByID($largePictureFID);
  $largePath       = $large->getVersion()->getRelativePath();
  }
  // extra large retina images
  if (!empty($retinaPictureFID)) {
  $retina          = File::getByID($retinaPictureFID);
  $retinaPath      = $retina->getVersion()->getRelativePath();
  }

  // convert foundation media query strings to actual media querires to be used by 
  // match media in picturefill js
  // probably a better way to do this but... well im having a giant brain fart 

  // For $mediumQuery
  if ($mediaQuery == 'foundation' && $mediumQuery == 'default') {
    $mediumQuery = '(min-width: 1px)';
  }
  if ($mediaQuery == 'foundation' && $mediumQuery == 'small') {
    $mediumQuery == '(min-width: 1px)';
  }
  if ($mediaQuery == 'foundation' && $mediumQuery == 'medium') {
    $mediumQuery = '(min-width: 641px)';
  }
  if ($mediaQuery == 'foundation' && $mediumQuery == 'large') {
    $mediumQuery = '(min-width: 1024px)';
  }
  if ($mediaQuery == 'foundation' && $mediumQuery == 'landscape') {
    $mediumQuery = '(orientation: landscape)';
  }
  if ($mediaQuery == 'foundation' && $mediumQuery == 'portrait') {
    $mediumQuery = '(orientation: portrait)';
  }
  if ($mediaQuery == 'foundation' && $mediumQuery == 'retina') {
    $mediumQuery = '(-webkit-min-device-pixel-ratio: 2),(min--moz-device-pixel-ratio: 2),(-o-min-device-pixel-ratio: 2/1),(min-device-pixel-ratio: 2),(min-resolution: 192dpi),(min-resolution: 2dppx)';
  }
  // for $largeQuery 
  if ($mediaQuery == 'foundation' && $largeQuery == 'default') {
    $largeQuery = '(min-width: 1px)';
  }
  if ($mediaQuery == 'foundation' && $largeQuery == 'small') {
    $largeQuery == '(min-width: 1px)';
  }
  if ($mediaQuery == 'foundation' && $largeQuery == 'medium') {
    $largeQuery = '(min-width: 641px)';
  }
  if ($mediaQuery == 'foundation' && $largeQuery == 'large') {
    $largeQuery = '(min-width: 1024px)';
  }
  if ($mediaQuery == 'foundation' && $largeQuery == 'landscape') {
    $largeQuery = '(orientation: landscape)';
  }
  if ($mediaQuery == 'foundation' && $largeQuery == 'portrait') {
    $largeQuery = '(orientation: portrait)';
  }
  if ($mediaQuery == 'foundation' && $largeQuery == 'retina') {
    $largeQuery = '(-webkit-min-device-pixel-ratio: 2),(min--moz-device-pixel-ratio: 2),(-o-min-device-pixel-ratio: 2/1),(min-device-pixel-ratio: 2),(min-resolution: 192dpi),(min-resolution: 2dppx)';
  }

  // for $retinaQuery 
  if ($mediaQuery == 'foundation' && $retinaQuery == 'default') {
    $retinaQuery = '(min-width: 1px)';
  }
  if ($mediaQuery == 'foundation' && $retinaQuery == 'small') {
    $retinaQuery == '(min-width: 1px)';
  }
  if ($mediaQuery == 'foundation' && $retinaQuery == 'medium') {
    $retinaQuery = '(min-width: 641px)';
  }
  if ($mediaQuery == 'foundation' && $retinaQuery == 'large') {
    $retinaQuery = '(min-width: 1024px)';
  }
  if ($mediaQuery == 'foundation' && $retinaQuery == 'landscape') {
    $retinaQuery = '(orientation: landscape)';
  }
  if ($mediaQuery == 'foundation' && $retinaQuery == 'portrait') {
    $retinaQuery = '(orientation: portrait)';
  }
  if ($mediaQuery == 'foundation' && $retinaQuery == 'retina') {
    $retinaQuery = '(-webkit-min-device-pixel-ratio: 2),(min--moz-device-pixel-ratio: 2),(-o-min-device-pixel-ratio: 2/1),(min-device-pixel-ratio: 2),(min-resolution: 192dpi),(min-resolution: 2dppx)';
  }
  $alternateText = '';

  switch ($altChoice) {
    case 'fileTitle':
      $alternateText = $file_title_alt;
      break;
    case 'fileDesc':
      $alternateText = $fileDescription;
      break;
    case 'custom':
      $alternateText = $altText;
      break;
   }
?>
<span data-picture data-alt="<?php echo $alternateText; ?>">
  <span data-src="<?php echo $defaultPath;?>"></span>
<?php if ($mediaQuery == 'foundation' ) {?>
  <?php if (!empty($mediumPictureFID)) { ?>
  <span data-src="<?php echo $mediumPath;?>" data-media="<?php echo $mediumQuery;?>"></span>
  <?php } ?>
  <?php if (!empty($largePictureFID)) { ?>
  <span data-src="<?php echo $largePath;?>" data-media="<?php echo $largeQuery;?>"></span>
  <?php } ?>
  <?php if (!empty($retinaPictureFID)) {  ?>
  <span data-src="<?php echo $retinaPath;?>" data-media="<?php echo $retinaQuery;?>"></span>
  <?php } ?>
<?php } ?>
<?php if ($mediaQuery == 'customQuery') { ?>
  <?php if (!empty($mediumPictureFID)) { ?>
  <span data-src="<?php echo $mediumPath;?>" data-media="<?php echo $customMedium;?>"></span>
  <?php } ?>
  <?php if (!empty($largePictureFID)) { ?>
  <span data-src="<?php echo $largePath;?>" data-media="<?php echo $customLarge;?>"></span>
  <?php } ?>
  <?php if (!empty($retinaPictureFID)) {  ?>
  <span data-src="<?php echo $retinaPath;?>" data-media="<?php echo $customretina;?>"></span>
<?php } ?>
<?php } ?>
  <?php if ($ieSupport == 'yes' ) { ?>
  <!--[if (lt IE 9) & (!IEMobile)]>
  <span data-src="<?php echo $mediumPath;?>"></span>
  <![endif]-->
  <?php }?>
  <!-- Fallback content for non-JS browsers. Same img src as the initial, unqualified source element. -->
  <noscript>
    <img src="<?php echo $defaultPath;?>" alt="<?php echo $alternateText; ?>">
  </noscript>
</span>