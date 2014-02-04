<?php defined('C5_EXECUTE') or die('Access denied.');
	// load form helper
	$form = Loader::helper( 'form' );
	// load asset library (for photos)
	$al   = Loader::helper('concrete/asset_library');	
?>
<style>
table {
  background: white;
  margin-bottom: 1.25rem;
  border: solid 1px #dddddd; }
  table thead,
  table tfoot {
    background: whitesmoke; }
    table thead tr th,
    table thead tr td,
    table tfoot tr th,
    table tfoot tr td {
      padding: 0.5rem 0.625rem 0.625rem;
      font-size: 0.875rem;
      font-weight: bold;
      color: #222222;
      text-align: left; }
  table tr th,
  table tr td {
    padding: 0.5625rem 0.625rem;
    font-size: 0.875rem;
    color: #222222;}
  table tr.even, table tr.alt, table tr:nth-of-type(even) {
    background: #f9f9f9; }
  table thead tr th,
  table tfoot tr th,
  table tbody tr td,
  table tr td,
  table tfoot tr td {
    display: table-cell;
    line-height: 1.125rem; }
</style>
<div class="clearfix">
	<ul id="responsive_tabs" class="ccm-dialog-tabs tabs">
    <li class="ccm-nav-active"><a href="javascript:void(0)" id="images"><?php echo t('Images');?></a></li>
    <li><a href="javascript:void(0)" id="media_queries"><?php echo t('Media Queries'); ?></a></li>
  </ul>
</div>
<!-- 
	Media Queries tab
-->
<div id="media_queries-tab" class="clearfix ui-helper-hidden">
	<div>
		<h4><?php echo t( 'Interchange Media Queries' ); ?></h4>
	</div>
	 <table>
	 	<thead>
	 		<tr>
	 			<th><?php echo t( 'Media Query Name' ); ?></th>
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
	 			<td><?php echo t( 'only screen and (-webkit-min-device-pixel-ratio: 2),
only screen and (min--moz-device-pixel-ratio: 2),
only screen and (-o-min-device-pixel-ratio: 2/1),
only screen and (min-device-pixel-ratio: 2),
only screen and (min-resolution: 192dpi),
only screen and (min-resolution: 2dppx)' ); ?></td>
	 		</tr>
	 	</tbody>
 </table>
	
</div>
<div id="images-tab">
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
</div>

<script type="text/javascript">
  var ActiveTab = "images"; 
  $("#responsive_tabs a").click(function() {
    $("li.ccm-nav-active").removeClass('ccm-nav-active');
    $("#" + ActiveTab + "-tab").hide();
    ActiveTab = $(this).attr('id');
    $(this).parent().addClass("ccm-nav-active");
    $("#" + ActiveTab + "-tab").show();
  });
</script>
