
hideDiv = function() {
	$("#first_query").hide();
	$("#second_query").hide();
	$("#third_query").hide();
	$("#fourth_query").hide();
	$("#custom_retina").hide();
	$("#custom_large").hide();
	$("#custom_medium").hide();
	$("#custom_default").hide();
};

handleNewSelection = function() {

	hideDiv();

	switch ($(this).val()) {
		case 'interchange':
			$("#first_query").show();
			$("#second_query").show();
			$("#third_query").show();
			$("#fourth_query").show();
			break;
		case 'foundation':
			$("#first_query").show();
			$("#second_query").show();
			$("#third_query").show();
			$("#fourth_query").show();
			break;
		case 'customQuery':
			$("#custom_retina").show();
			$("#custom_large").show();
			$("#custom_medium").show();
			$("#custom_default").show();
			break;
	}
};

$(document).ready(function() {
	$("#mediaQuery").change(handleNewSelection);
    
    // Run the event handler once now to ensure everything is as it should be
    handleNewSelection.apply($("#mediaQuery"));

   $('#custom_div').hide();
   $('#altChoice').change(function() {
   ($(this).val() == "custom") ? $('#custom_div').show() : $('#custom_div').hide();
  });
   $('#internetExplorer').hide();
   $('#responsive_solution').change(function() {
   ($(this).val() == "pictureFill") ? $('#internetExplorer').show() : $('#internetExplorer').hide();
  });
});
// tabs 
  var ActiveTab = "images"; 
  $("#responsive_tabs a").click(function() {
    $("li.ccm-nav-active").removeClass('ccm-nav-active');
    $("#" + ActiveTab + "-tab").hide();
    ActiveTab = $(this).attr('id');
    $(this).parent().addClass("ccm-nav-active");
    $("#" + ActiveTab + "-tab").show();
  });
// input validation 
function ccmValidateBlockForm() {

  if ($('#responsive_solution').val() == 'empty_select') {
    ccm_addError(ccm_t('selection-required'));
  }
  return false;
}