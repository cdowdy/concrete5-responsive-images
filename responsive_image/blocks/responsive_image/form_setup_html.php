<?php defined('C5_EXECUTE') or die('Access denied.');
	// load form helper
	$form = Loader::helper( 'form' );
	// load asset library (for photos)
	$al   = Loader::helper('concrete/asset_library');	
?>
<div class="clearfix">
	<h5><?php echo t('Choose Your Responsive Image Solution'); ?></h5>
</div>
<div class="clearfix">
	<div class="ccm-block-field-group">
		<div class="control-group">
			<label for="responsive_solution" class="control-label"><?php echo t('Choose Solution');?></label>
			<div class="controls">
				<select name="responsive_solution" id="responsive_solution">
					<option value="empty_select"><?php echo t( 'Select Solution' ); ?></option>
					<option value="interchange" id="interchange" <?php if ($responsive_solution == 'interchange') {?>selected<?php }?> name="responsive_solution"><?php echo t( 'Foundation interchange' ); ?></option>
					<option value="pictureFill" id="pictureFill" <?php if ($responsive_solution == 'pictureFill') {?>selected<?php }?> name="responsive_solution"><?php echo t( 'PictureFill by Scott Jehl' );?></option>
				</select>
			</div>
		</div>
	</div>
</div>
<div class="clearfix">
	<div id="Image" class="ccm-block-field-group">
		<div class="control-group">
			<?php echo $form->label('pictureID', 'Choose Default Image'); ?>
			<div class="controls">
				<?php echo $al->image('ccm-b-image', 'pictureID', t('Choose Image'), $this->controller->getDefaultPicture()); ?>
			</div>
		</div>
		<div class="control-group">
			<?php echo $form->label( 'altText', 'alt Text' ); ?>
			<div class="controls">
				<input type="text" id="altText" name="altText" valu="<?php echo $altText;?>" />
			</div>
		</div>
	</div>
</div>
<div class="clearfix">
	<div  class="ccm-block-field-group">
		<div class="control-group">
			<?php echo $form->label('mediumpictureID', 'Choose Medium Image'); ?>
			<div class="controls">
				<?php echo $al->image('ccm-b-image2', 'mediumpictureID', t('Choose Medium Image'), $this->controller->getMediumPicture()); ?>
			</div>
		</div>
	</div>
</div>
<div class="clearfix">
	<div class="ccm-block-field-group">
		<div class="control-group">
			<?php echo $form->label('largepictureID', 'Choose Large Image'); ?>
			<div class="controls">
				<?php echo $al->image('ccm-b-image3', 'largepictureID', t('Choose Large Image'), $this->controller->getLargePicture()); ?>
			</div>
		</div>
	</div>
</div>
