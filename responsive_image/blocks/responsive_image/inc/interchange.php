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

  if ($altChoice == 'fileTitle') {
    $altText = $file_title_alt;
  }
  
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
<?php if ($page->isEditMode()) { ?>
<div class="ccm-edit-mode-disabled-item" style="height: 400px">
  <div style="padding: 200px 0px 0px 0px"><?php echo t('Interchange Images Not Displayed in Edit Mode')?></div>
</div>
<?php } ?>
<img data-interchange="[<?php echo $defaultPath;?>, (<?php echo $first_query; ?>)]<?php if (!empty($mediumPictureFID)) { ?>,[<?php echo $mediumPath;?>, (<?php echo $second_query;?>)]<?php }?><?php if (!empty($largePictureFID)) { ?>,[<?php echo $largePath;?>, (<?php echo $third_query;?>)]<?php }?><?php if (!empty($retinaPictureFID)) {  ?>,[<?php echo $retinaPath;?>, (<?php echo $fourth_query;?>)]<?php }?>" alt="<?php echo $alternateText; ?>">
<noscript><img src="<?php echo $defaultPath;?>" alt="<?php echo $alternateText; ?>"></noscript>



<?php
// send js to footer
$html = Loader::helper( 'html' );

if ( !$page->isEditMode() ) {
  $v->addFooterItem( "<script>$(document).foundation('reflow');</script>" );
}
?>