<?php defined('C5_EXECUTE') or die('Access denied.');
// $this->inc( 'form_setup_html.php' );

	// load form helper
	$form      = Loader::helper( 'form' );
	// load asset library (for photos)
	$al        = Loader::helper('concrete/asset_library');	
	
	$bf        = null;
	$bf_Medium = null;
	$bf_Large  = null;
	$bf_retina = null;

if ($controller->getDefaultPicture() > 0) { 
	$bf = $controller->getDefaultPictureObject();
}
if ($controller->getMediumPicture() > 0) { 
	$bf_Medium = $controller->getMediumPictureObject();
}
if ($controller->getLargePicture() > 0) { 
	$bf_Large = $controller->getLargePictureObject();
}
if ($controller->getRetinaPicture() > 0) { 
	$bf_retina = $controller->getRetinaPictureObject();
}
$foundationMedia = array(
	'default'   => 'only screen and (min-width: 1px)',
	'small'     => 'only screen and (min-width: 1px)',
	'medium'    => 'only screen and (min-width: 641px)',
	'large'     => 'only screen and (min-width: 1024px)',
	'landscape' => 'only screen and (orientation: landscape)',
	'portrait'  => 'only screen and (orientation: portrait)',
	'retina'    => 'only screen and (min-device-pixel-ratio: 2)',
	);
?>

<!-- 
	Tabbed Navigation 
-->
<div class="clearfix">
	<ul id="responsive_tabs" class="ccm-dialog-tabs tabs">
		<li class="ccm-nav-active"><a href="javascript:void(0)" id="images"><?php echo t('Images');?></a></li>
		<li><a href="javascript:void(0)" id="media_queries"><?php echo t('Media Queries'); ?></a></li>
		<li><a href="javascript:void(0)" id="picturefill_help"><?php echo t('Help'); ?></a></li>
	</ul>
</div> <!-- End .clearfix and tabs -->
<!-- 
	Media Queries tab
-->
<div id="media_queries-tab" class="clearfix ui-helper-hidden">
	<div>
		<h4><?php echo t( 'Interchange Media Queries' ); ?></h4>
	</div>
	<table class="table table-striped">
		<thead>
			<tr>
				<th><?php echo t( 'Name' ); ?></th>
				<th><?php echo t( 'Media Query' ); ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo t( 'default' ); ?></td>
	 			<td><?php echo t( 'only screen and (min-width: 1px)' ); ?></td>
	 		</tr>
	 		<tr>
	 			<td><?php echo t( 'small' ); ?></td>
	 			<td><?php echo t( 'only screen and (min-width: 1px)' ); ?></td>
	 		</tr>
	 		<tr>
	 			<td><?php echo t( 'medium' ); ?></td>
	 			<td><?php echo t( 'only screen and (min-width: 641px)' ); ?></td>
	 		</tr>
	 		<tr>
	 			<td><?php echo t( 'large' ); ?></td>
	 			<td><?php echo t( 'only screen and (min-width: 1024px)' ); ?></td>
	 		</tr>
	 		<tr>
	 			<td><?php echo t( 'landscape' ); ?></td>
	 			<td><?php echo t( 'only screen and (orientation: landscape)' ); ?></td>
	 		</tr>
	 		<tr>
	 			<td><?php echo t( 'portrait' ); ?></td>
	 			<td><?php echo t( 'only screen and (orientation: portrait)' ); ?></td>
	 		</tr>
	 		<tr>
	 			<td><?php echo t( 'retina ' ); ?></td>
	 			<td><?php echo t( 'only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2/1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx)' ); ?></td>
	 		</tr>
	 	</tbody>
 </table>
</div> <!-- end of #media_queries-tab -->
<!-- 
	help tab 
-->
<div id="picturefill_help-tab" class="clearfix ui-helper-hidden">
	<h5><?php echo t( 'PictureFill' ); ?></h5>
	<p><?php echo t( 'Instead of the normal media query: <code>only screen and (min-width: 1000px)</code><br />
	PictureFill takes the last media part <code>(min-width: 1000px)</code> and places it into a data-media selector' );?></p>
	<p><?php echo t( 'The HTML output is as follows' );?></p>
	<code>&ltspan data-src="<?php echo t('extralarge.jpg');?>" data-media="(min-width: 1000px)"&gt&lt/span&gt</code>
	<br />
	<br />
	<p><?php echo t( 'When writting your custom query write <code>min-width: YOUR VIEWPORT/SCREENSIZE</code> with no parentheses or brackets.');?></p>
	<div>
		<p><?php echo t( 'Example' );?></p>
		<p><?php echo t( 'Custom Query');?></p>
		<input type="text" value="<?php echo t('min-width: 1000px');?>" />
	</div>
</div>
<!-- 
	MAIN 
-->
<div id="images-tab">
	<div class="clearfix">
	  <h5><?php echo t( 'Choose Your Responsive Image Solution' ); ?></h5>
  </div>
	<div class="clearfix">
		<div class="ccm-block-field-group">
			<div class="control-group">
				<label for="responsive_solution" class="control-label"><?php echo t( 'Choose Solution' );?></label>
				<div class="controls">
					<select name="responsive_solution" id="responsive_solution">
						<option value="empty_select"><?php echo t( 'Select Solution' ); ?></option>
						<option value="interchange" id="interchange" <?php if ($responsive_solution == 'interchange') {?>selected<?php }?> name="responsive_solution"><?php echo t( 'Foundation interchange' ); ?></option>
						<option value="pictureFill" id="pictureFill" <?php if ($responsive_solution == 'pictureFill') {?>selected<?php }?> name="responsive_solution"><?php echo t( 'PictureFill by Scott Jehl' );?></option>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label for="altChoice" class="control-label"><?php echo t( 'Alternate Text Choice' ); ?></label>
				<div class="controls">
					<select name="altChoice" id="altChoice">
						<option value="fileTitle" id="fileTitle" <?php if ($altChoice == 'fileTitle') {?>selected<?php }?> name="altChoice"><?php echo t( 'File Title' ); ?></option>
						<option value="fileDesc" id="fileDesc" <?php if ($altChoice == 'fileDesc') {?>selected<?php }?> name="altChoice"><?php echo t( 'File Description' ); ?></option>
						<option value="custom" id="custom" <?php if ($altChoice == 'custom') {?>selected<?php }?> name="altChoice"><?php echo t( 'Custom Alternate Text' ); ?></option>
					</select>
				</div>
			</div>
			<div id="custom_div" class="control-group">
				<?php echo $form->label( 'altText', 'alt Text' ); ?>
				<div class="controls">
					<textarea id="altText" name="altText" class="span4" rows="2"><?php echo $altText;?></textarea>
				</div>
			</div>
			<div  class="control-group">
				<label for="mediaQuery" class="control-label"><?php echo t( 'Media Queries'); ?></label>
				<div class="controls">
					<select  name="mediaQuery" id="mediaQuery">
						<option value="foundation" id="foundation" <?php if ($mediaQuery == 'foundation') {?>selected<?php }?> name="mediaQuery"><?php echo t( 'Foundation (see queries tab)' ); ?></option>
						<option value="customQuery" id="customQuery"  <?php if ($mediaQuery == 'customQuery') {?>selected<?php }?> name="mediaQuery"><?php echo t( 'Your Own Media Query' ); ?></option>
					</select>
				</div>
			</div><!-- end of #mediaQuery -->
		</div> <!-- end of ccm field group for responsive solution -->
	</div>
<!--
	Default (smallest) Picture 
-->
	<div id="default" class="clearfix">
		<div id="Image" class="ccm-block-field-group">
			<div class="control-group">
				<?php echo $form->label('pictureID', 'Choose Default Image'); ?>
				<div class="controls">
					<?php echo $al->image('ccm-b-image', 'pictureID', t('Choose Image'), $bf); ?>
				</div>
			</div>
			<div id="first_query" class="control-group">
				<?php echo $form->label( 'defaultQuery', 'Choose Query' ); ?>
				<div class="controls">
					<?php echo $form->select( 'defaultQuery', $foundationMedia, 'defaultQuery', array('style' => 'width: 80%') ); ?>
					<span class="help-block">Default Media Query Not Used In PictureFill</span>
				</div>
			</div>
			<div id="custom_default" class="control-group">
				<?php echo $form->label( 'customDefault', 'Custom Default Query' ); ?>
				<div class="controls">
					<textarea id="customDefault" class="span4" name="customDefault" rows="2"><?php echo $customDefault;?></textarea>
					<span class="help-block">ex: <code>only screen and (min-width: 1px)</code></span>
					<span class="help-block">Default Media Query Not Used In PictureFill</span>
				</div>
			</div>
		</div> <!-- #Image -->
	</div><!-- Clearfix -->

<div class="pic_container">
    <?php if(isset($bf_Medium)) { ?>
	<!--
		Medium Picture 
	-->
		<div id="medium" class="clearfix ">
			<div  class="ccm-block-field-group">
				<div class="control-group">
					<?php echo $form->label('mediumPictureFID', 'Choose Medium Image'); ?>
					<div class="controls">
						<?php echo $al->image('ccm-b-image2', 'mediumPictureFID', t('Choose Medium Image'), $bf_Medium); ?>
					</div>
				</div>
				<div id="second_query" class="control-group">
					<?php echo $form->label( 'mediumQuery', 'Choose Query' ); ?>
					<div class="controls">
						<?php echo $form->select( 'mediumQuery', $foundationMedia, 'medium', array('style' => 'width: 80%') ); ?>
					</div>
				</div>
				<div id="custom_medium" class="control-group">
					<?php echo $form->label( 'customMedium', 'Custom Medium Query' ); ?>
					<div class="controls">
						<textarea id="customMedium" class="span4" name="customMedium" rows="2"><?php echo $customMedium;?></textarea>
						<span class="help-block">ex: <code>only screen and (min-width: 650px)</code></span>
					</div>
				</div>
			</div>
		</div><!-- Clearfix medium pictures -->
	<?php } ?>
	<?php if(isset($bf_Large)) { ?>
	<!--
		Large Picture 
	-->
		<div id="large" class="clearfix ">
			<div class="ccm-block-field-group">
				<div class="control-group">
					<?php echo $form->label('largePictureFID', 'Choose Large Image'); ?>
					<div class="controls">
						<?php echo $al->image('ccm-b-image3', 'largePictureFID', t('Choose Large Image'), $bf_Large); ?>
					</div>
				</div>
				<div id="third_query" class="control-group">
					<?php echo $form->label( 'largeQuery', 'Choose Query' ); ?>
					<div class="controls">
						<?php echo $form->select( 'largeQuery', $foundationMedia, 'large', array('style' => 'width: 80%') ); ?>
					</div>
				</div>
				<div id="custom_large" class="control-group">
					<?php echo $form->label( 'customLarge', 'Custom Large Query' ); ?>
					<div class="controls">
						<textarea id="customLarge" class="span4" name="customLarge" rows="2"><?php echo $customLarge;?></textarea>
						<span class="help-block">ex: <code>only screen and (min-width: 900px)</code></span>
					</div>
				</div>
			</div>
		</div><!-- Clearfix large pictures -->
	<?php } ?>
	<?php if(isset($bf_retina)) { ?>
	<!--
		Retina Picture 
	-->
		<div id="retina" class="clearfix ">
			<div class="ccm-block-field-group">
				<div class="control-group">
					<?php echo $form->label('retinaPictureFID', 'Choose Retina Image'); ?>
					<div class="controls">
						<?php echo $al->image('ccm-b-image4', 'retinaPictureFID', t( 'Choose Retina Image' ), $bf_retina); ?>
					</div>
				</div>
				<div id="fourth_query" class="control-group">
					<?php echo $form->label( 'retinaQuery', 'Choose Query' ); ?>
					<div class="controls">
						<?php echo $form->select( 'retinaQuery', $foundationMedia, 'retina', array('style' => 'width: 80%') ); ?>
					</div>
				</div>
				<div id="custom_retina" class="control-group">
					<?php echo $form->label( 'customretina', 'Custom Retina Query' ); ?>
					<div class="controls">
						<textarea id="customretina" class="span4" name="customretina" rows="2"><?php echo $customretina;?></textarea>
						<span class="help-block">ex: <code>only screen and (min-device-pixel-ratio: 2)</code></span>
					</div>
				</div>
			</div>
		</div><!-- Clearfix large pictures -->
	<?php }?>
	</div> <!-- end .pic_container -->
		
</div> <!-- End of #images-tab -->
