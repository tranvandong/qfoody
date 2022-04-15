<?php
if(isset($_REQUEST['action']) && isset($_REQUEST['plugin']) && isset($_REQUEST['wooodtlitereqk'])){ 
 
$ByConsoleWooODTLite = new ByConsoleWooODTLite();
$wooodtlite_deactivation_info=$ByConsoleWooODTLite->set_wooodtlite_deactivation_info('null');
$bycwooodtlitesurvey=wp_create_nonce( 'bycwooodtlitesurvey' );
$location = sprintf( admin_url( 'plugins.php?action='.$_REQUEST['action'].'&plugin=%s&plugin_status=all&paged=1&s&_wpnonce=%s&didbycwooodtlitesurvey=%s' ), $_REQUEST['plugin'], $_REQUEST['wooodtlitereqk'], esc_attr( $bycwooodtlitesurvey ) );
?>
<div class="wrap">

<form name="deactivate_bycwooodtlite" action="" method="post">
<h2><?php echo __('Sorry to see you you go away','byconsole-woo-order-delivery-time');?>...</h2>
<b><?php echo __('Please choose your deactivation reason & help us to improve the plugin along with your feedback.','byconsole-woo-order-delivery-time');?></b>
<p><input name="bycwooodtlite_deactivation_cause" type="radio" value="temporary" /><label>Its a temporary deactivation</label></p>
<p><input name="bycwooodtlite_deactivation_cause" type="radio" value="other_plugin" /><label>I found better plugin</label></p>
<p><input name="bycwooodtlite_deactivation_cause" type="radio" value="Does_not_match" /><label>Does not match my criteria</label></p>
<p><input name="bycwooodtlite_deactivation_cause" type="radio" value="No_more_required" /><label>No more required as per my business plan</label></p>
<p><input name="bycwooodtlite_deactivation_cause" type="radio" value="Others" /><label>Others</label></p>
<p><label>Any suggestion for us</label></p>
<p><textarea name="byc_wooodtLite_suggestion" class="byc_wooodtLite_suggestion" rows="5" cols="100"></textarea></p>
<p><input name="submit_deactivate_bycwooodtlite" type="button" class="bycwooodtlite_deactivation_confirm" value="Deactivate" /></p>
</form>
</div>
<script type="text/javascript">
jQuery("input[name='bycwooodtlite_deactivation_cause']").click(function(){
	var $reason=jQuery("input[name='bycwooodtlite_deactivation_cause']:checked").val();	
	$wooodtlite_deactivation_info=jQuery.extend(<?php echo $wooodtlite_deactivation_info;?>,{"deactivation_reason":jQuery("input[name='bycwooodtlite_deactivation_cause']:checked").val(),"suggestion":jQuery(".byc_wooodtLite_suggestion").val()});
	});

jQuery(".byc_wooodtLite_suggestion").focusout(function(){
	var $suggestion=jQuery(".byc_wooodtLite_suggestion").val();
	$wooodtlite_deactivation_info=jQuery.extend(<?php echo $wooodtlite_deactivation_info;?>,{"deactivation_reason":jQuery("input[name='bycwooodtlite_deactivation_cause']:checked").val(),"suggestion":jQuery(".byc_wooodtLite_suggestion").val()});
	})
	
function surveydone(){
	window.location.href="<?php echo sprintf( admin_url( 'plugins.php?action='.$_REQUEST['action'].'&plugin=%s&plugin_status=all&paged=1&s&_wpnonce=%s&didbycwooodtlitesurvey=%s' ), $_REQUEST['plugin'], $_REQUEST['wooodtlitereqk'], esc_attr( $bycwooodtlitesurvey ) );?>";
	};
</script>
	
<?php }else{
	echo __('You are not allowed to access this page!','byconsole-woo-order-delivery-time');
	}?>