<?php

// add mmenu

add_action('admin_menu','byconsolewooodt_add_plugin_menu');

function byconsolewooodt_add_plugin_menu(){

global $byconsolewooodt_admin_settings;

global $byconsolewooodt_admin_modification_request;

global $byconsolewooodt_admin_location_settings;

global $byconsolewooodt_admin_delivery_pickup_calender;

$byconsolewooodt_admin_settings = add_menu_page( 'ByConsole Order Delivery Time', 'Order Delivery Time management', 'manage_options', 'byconsolewooodt_general_settings', 'byconsolewooodt_admin_general_settings_form' );

$byconsolewooodt_admin_modification_request = add_submenu_page('byconsolewooodt_general_settings', 'Custom Modification Request','Custom Modification Request', 'manage_options', 'byconsolewooodt_admin_modification_request_settings', 'byconsolewooodt_admin_modification_request_form');

$byconsolewooodt_admin_holiday = add_submenu_page('byconsolewooodt_general_settings', 'Holiday Management','Holiday Management', 'manage_options', 'byconsolewooodt_admin_holiday_settings', 'byconsolewooodt_free_admin_holiday_form');

$byconsolewooodt_admin_location_settings=add_submenu_page('byconsolewooodt_general_settings', 'Location Settings','Location Settings', 'manage_options', 'byconsolewooodt_wooodt_location_settings_page', 'byconsolewooodt_admin_wooodt_location_settings_form');

$byconsolewooodt_admin_delivery_pickup_calender=add_submenu_page('byconsolewooodt_general_settings', 'Delivery Pickup Calendar','Delivery Pickup Calendar', 'manage_options', 'byconsolewooodt_admin_delivery_pickup_calender_settings_page', 'byconsolewooodt_admin_delivery_pickup_calender_settings_form');

$byconsolewooodt_deactivation_survey=add_submenu_page('byconsolewooodt_general_settings', 'Plugin deactivation survey','Plugin deactivation survey', 'manage_options', 'byc_wooodtlite_deactivation_survey', 'byc_wooodtlite_deactivation_survey');

include('bycwooodt_delivery_pickup_calender_settings.php');

// hide the survey form as it is not requird for general use of the plugin
function byconsolewooodt_general_settings_submenu_filter( $submenu_file ) {

    global $plugin_page;

    $hidden_submenus = array(
        'byc_wooodtlite_deactivation_survey' => true,
    );

    // Select another submenu item to highlight
    if ( $plugin_page && isset( $hidden_submenus[ $plugin_page ] ) ) {
        $submenu_file = 'byconsolewooodt_general_settings';
    }

    // Hide the submenu
    foreach ( $hidden_submenus as $submenu => $unused ) {
        remove_submenu_page( 'byconsolewooodt_general_settings', $submenu );
    }

    return $submenu_file;
}
add_filter( 'submenu_file', 'byconsolewooodt_general_settings_submenu_filter' );



/**** Handle activation hook vars for those who just update the plugin ****/

	global $wpdb;

	if(!get_option('byconsolewooodt_free_plugin_activation_date')){		

		$currentActivatedDate = date("m/d/Y");

		update_option('byconsolewooodt_free_plugin_activation_date',$currentActivatedDate);

	}

	if(!get_option('byconsolewooodt_order_type')){

		update_option('byconsolewooodt_order_type','both');

	}

	/*

		if(!get_option('byconsolewooodt_preorder_days')){

		update_option('byconsolewooodt_preorder_days','12');

	}

	*/

	if(!get_option('byconsolewooodt_opening_hours_from')){

		update_option('byconsolewooodt_opening_hours_from','10:00');

	}

	if(!get_option('byconsolewooodt_opening_hours_to')){

		update_option('byconsolewooodt_opening_hours_to','21:00');

	}

	if(!get_option('byconsolewooodt_delivery_hours_from')){

		update_option('byconsolewooodt_delivery_hours_from','11:00');

	}

	if(!get_option('byconsolewooodt_delivery_hours_to')){

		update_option('byconsolewooodt_delivery_hours_to','19:00');

	}

	if(!get_option('byconsolewooodt_hours_format'))	{

		update_option('byconsolewooodt_hours_format','h:i A');

	}	

if(!get_option('byconsolewooodt_takeaway_lable'))	{

		update_option('byconsolewooodt_takeaway_lable','Pickup');

	}	

if(!get_option('byconsolewooodt_delivery_lable'))	{

		update_option('byconsolewooodt_delivery_lable','Delivery');

	}	


if(!get_option('byconsolewooodt_date_field_text'))	{

		update_option('byconsolewooodt_date_field_text','Date');

	}	

if(!get_option('byconsolewooodt_time_field_text'))	{

		update_option('byconsolewooodt_time_field_text','Time');

	}	

if(!get_option('byconsolewooodt_orders_delivered'))	{

		update_option('byconsolewooodt_orders_delivered','The order will be delivered on [byc_delivery_date]');

	}	

if(!get_option('byconsolewooodt_chekout_page_section_heading'))	{

		update_option('byconsolewooodt_chekout_page_section_heading','Select date and time');

	}	

if(!get_option('byconsolewooodt_chekout_page_order_type_label'))	{

		update_option('byconsolewooodt_chekout_page_order_type_label','Choose your order type');

	}	

if(!get_option('byconsolewooodt_chekout_page_date_label'))	{

		update_option('byconsolewooodt_chekout_page_date_label','Choose a date');

	}	

if(!get_option('byconsolewooodt_free_plugin_admin_access_date')){		

		$adminAccessDate = date("m/d/Y");

		update_option('byconsolewooodt_free_plugin_admin_access_date',$adminAccessDate);

	}

/******************************/

}

include('byconsolewooodt_modification_request_details.php');

include('byconsolewooodt_holiday_management.php');

include('byconsolewooodt_location_field_settings.php');

function byconsolewooodt_admin_general_settings_form(){

?>

			<div class="wrap">

			<h1>ByConsole Woocommerce Order Delivery Time management settings panel</h1>

            <div class="" style="width:20%; float:right;">

            <input type="button" value="Get Pro version" onClick="getproFunction()"  id="byconsolewooodt_get_pro_version" style="background-color:#ffa500; color:#fff; font-size:18px; cursor: pointer;"/>

            <input type="button" value="Read HOW TOs" onClick="readBlog()"  id="byconsolewooodt_get_pro_version" style="background-color:#ffa500; color:#fff; font-size:18px; cursor: pointer;"/>

			<style>

#byconsolewooodt_get_pro_version:hover{background-color:#fff !important; color:#ffa500 !important; border:1px solid #ffa500;}

</style>

<div class="">
<p><?php echo __('The pro version includes:','byconsole-woo-order-delivery-time');?></p>
 <ol>

    <li><?php echo __('Set multiple delivery/pickup locations as many as you wish.','byconsole-woo-order-delivery-time');?></li>

    <li><?php echo __('Time slot fee – add extra fees for delivery on special time slots.');?></li>

    <li><?php echo __('Set shop closing days based on week/week-end days like (every Sunday/Monday/../..)','byconsole-woo-order-delivery-time');?></li>

    <li><?php echo __('Set unlimited holidays (In free version its limites to two only).','byconsole-woo-order-delivery-time');?></li>

    <li><?php echo __('Delivery/pickup date & time is now visible on WooCommerce orders page in admin dashboard for each order summery row.','byconsole-woo-order-delivery-time');?></li>

    <li><?php echo __('Create time slot with any custom duration.','byconsole-woo-order-delivery-time');?></li>

    <li><?php echo __('You can customize date picker calendar according to your theme.','byconsole-woo-order-delivery-time');?></li>

    <li><?php echo __('Minimum lead time / wait time.','byconsole-woo-order-delivery-time');?></li>

    <li><?php echo __('Order placing cutoff time for sameday & nextday delivery & pickup <a class="byconsolebloglink" href=" separatelyhttps://blog.byconsole.com/same-day-delivery-cut-off-time-in-woocommerce/" target="_blank">Show me how!</a>.','byconsole-woo-order-delivery-time');?></li>

    <li><?php echo __('Freedom to decide on which days to allow deliveries & pickups separately.','byconsole-woo-order-delivery-time');?></li>

    <li><?php echo __('Option add extra fees for delivery on specific week days.','byconsole-woo-order-delivery-time');?></li>

	<li><?php echo __('Different delivery times for each delivery location (from v-1.0.3.0).','byconsole-woo-order-delivery-time');?></li>

    <li><?php echo __(' Special dates open with additional fees <a class="byconsolebloglink" href="https://blog.byconsole.com/special-date-charges-in-woocommerce/" target="_blank">Show me how!</a>.','byconsole-woo-order-delivery-time');?></li>

    <li><?php echo __('Set minimum order value for each pickup location and/or delivery area (from v-1.0.3.0).','byconsole-woo-order-delivery-time');?></li>

    <li><?php echo __('Extra delivery charges for same day/next day/day after tomorrow delivery (from v-1.0.6.0 and with another addon).','byconsole-woo-order-delivery-time');?></li>

    <li><?php echo __('Separated minimum waiting time for pickup and delivery.','byconsole-woo-order-delivery-time');?></li>

    <li><?php echo __('Each delivery and pickup location can have separate email address to receive new order notification mail (from v-1.0.4.0).','byconsole-woo-order-delivery-time');?></li>

    <li><?php echo __('Hide shipping fields when order type is pickup.','byconsole-woo-order-delivery-time');?></li>

	<li><?php echo __('Short code to list up all your delivery/pickup points(from v-1.0.5.0).','byconsole-woo-order-delivery-time');?></li>

    <li><?php echo __('override regular time slots on specia dates. <a class="byconsolebloglink" href="https://blog.byconsole.com/special-dates-with-special-time-slots/" target="_blank">Show me how!</a>.','byconsole-woo-order-delivery-time');?></li>

    <li><?php echo __('Short code to display order date time location and type on any other pages/plugin(from v-1.0.5.0).','byconsole-woo-order-delivery-time');?></li>

    <li><?php echo __('Lead time management for orders posted on store closing days(from v-1.0.6.0).','byconsole-woo-order-delivery-time');?></li>

    <li><?php echo __('Option to limit number of pickups & deliveries separately per time slots <a class="byconsolebloglink" href="https://blog.byconsole.com/maximum-order-deliveries-per-time-slot/" target="_blank">Show me how!</a>.','byconsole-woo-order-delivery-time');?></li>

    <li><?php echo __('Assign extra shipping charges per delivery areas / pickup hubs (from v-1.0.6.0).','byconsole-woo-order-delivery-time');?></li>

    <li><?php echo __('Delivery on special calendar date with additioanl fees <a class="byconsolebloglink" href="https://blog.byconsole.com/special-date-charges-in-woocommerce/" target="_blank">Show me how!</a>.','byconsole-woo-order-delivery-time');?></li>

    <li><?php echo __('Product wise location based sale record and option export to CSV file (With our  another plugin).','byconsole-woo-order-delivery-time');?></li>

	<li><?php echo __('Get location on map and customer can pick a location directly from map(with map add-on plugin).','byconsole-woo-order-delivery-time');?></li>

    <li><?php echo __('Suggest nearest pickup location by geo location calculation(with map add-on plugin).','byconsole-woo-order-delivery-time');?></li>

    <li><?php echo __('Remove chosen address fields from billing/shipping section of checkout page for pickup & delivery separately. <a class="byconsolebloglink" href="https://blog.byconsole.com/removing-billing-shipping-fields-on-woocommerce-checkout-page/" target="_blank">Show me how!</a>','byconsole-woo-order-delivery-time');?></li>

    <li><?php echo __('Get customized/more extended copy to suit your all needs(may be paid).','byconsole-woo-order-delivery-time');?></li>

</ol>

            </div>

            <input type="button" value="Get Pro version" onClick="getproFunction()"  id="byconsolewooodt_get_pro_version" style="background-color:#ffa500; color:#fff; font-size:18px; cursor: pointer;"/>

            <input type="button" value="Read HOW TOs" onClick="readBlog()"  id="byconsolewooodt_get_pro_version" style="background-color:#ffa500; color:#fff; font-size:18px; cursor: pointer;"/>

            </div>

            <script>

            function getproFunction() {

            window.open("https://plugins.byconsole.com/product/byconsole-wooodt-extended/");

            }

			function readBlog() {

            window.open("https://blog.byconsole.com/category/wooodt-extended/");

            }

            </script>

            <div class="" style="width:80%; float:left;">

			<form method="post" class="form_byconsolewooodt_plugin_settings" action="options.php">

				<?php

					settings_fields("section");

					do_settings_sections("byconsolewooodt_plugin_options");      

					submit_button(); 

				?>          

			</form>

			</div>

<?php 

}

	function byconsolewooodt_chekout_page_section_heading()

	{

?>

 <input type="text" name="byconsolewooodt_chekout_page_section_heading" id="byconsolewooodt_chekout_page_section_heading" style="width:30%; padding:7px;" value="<?php printf( __('%s','byconsole-woo-order-delivery-time'),get_option('byconsolewooodt_chekout_page_section_heading')); ?>"/>

 <label><?php echo __('Texts to display on checkout page as section heading.','byconsole-woo-order-delivery-time');?></label><br />

<span style="color:#a0a5aa">(Eg: Desired delivery date and time)</span>

<?php

	}

	function byconsolewooodt_chekout_page_date_label()

	{

?>

 <input type="text" name="byconsolewooodt_chekout_page_date_label" id="byconsolewooodt_chekout_page_date_label" style="width:30%; padding:7px;" value="<?php printf( __('%s','byconsole-woo-order-delivery-time'),get_option('byconsolewooodt_chekout_page_date_label')); ?>"/>

<label><?php echo __('displayed as calendar label on checkout page.','byconsole-woo-order-delivery-time');?></label><br />







 <span style="color:#a0a5aa">(Eg: Select date)</span>



<?php



	}







	function byconsolewooodt_chekout_page_time_label()



	{



?>



 <input type="text" name="byconsolewooodt_chekout_page_time_label" id="byconsolewooodt_chekout_page_time_label" style="width:30%; padding:7px;" value="<?php printf( __('%s','byconsole-woo-order-delivery-time'),get_option('byconsolewooodt_chekout_page_time_label')); ?>"/>



 <label><?php echo __('displayed as time drop-down label on checkout page.','byconsole-woo-order-delivery-time');?></label><br />



<span style="color:#a0a5aa">(Eg: Select time)</span>



<?php



	}







	function byconsolewooodt_chekout_page_order_type_label()



	{



?>



 <input type="text" name="byconsolewooodt_chekout_page_order_type_label" id="byconsolewooodt_chekout_page_order_type_label" style="width:30%; padding:7px;" value="<?php printf( __('%s','byconsole-woo-order-delivery-time'),get_option('byconsolewooodt_chekout_page_order_type_label')); ?>"/>



 <label><?php echo __('This will ask customer if the order is for delivery or self pickup on checkout page.','byconsole-woo-order-delivery-time');?></label><br />



 <span style="color:#a0a5aa">(Eg: Select order type)</span>



<?php



	}



	



	function byconsolewooodt_chekout_page_select_pickup_location_label()

	{	?>

 <input type="text" name="byconsolewooodt_chekout_page_select_pickup_location_label" id="byconsolewooodt_chekout_page_select_pickup_location_label" style="width:30%; padding:7px;" value="<?php printf( __('%s','byconsole-woo-order-delivery-time'),get_option('byconsolewooodt_chekout_page_select_pickup_location_label')); ?>"/>

 <label><?php echo __('This will ask customer to choose a pickup location on checkout page, in case Multiple Pickup Location is enabled on Location Settings page','byconsole-woo-order-delivery-time');?></label><br />

 <span style="color:#a0a5aa">(Eg: Select order type)</span>

<?php

	}			



	function byconsolewooodt_chekout_page_hrs_value()

	{	

?>	 

<input type="text" name="byconsolewooodt_chekout_page_hrs_value" id="byconsolewooodt_chekout_page_hrs_value" style="width:30%; padding:7px;" value="<?php printf( __('%s','byconsole-woo-order-delivery-time'),get_option('byconsolewooodt_chekout_page_hrs_value')); ?>"/>	 <label><?php echo __('Will be shown in time slot as time unit. ','byconsole-woo-order-delivery-time');?></label><br />	 <span style="color:#a0a5aa">(Eg: Hrs)</span>	

<?php	

	}		



	function byconsolewooodt_chekout_page_tips_label()

	{	

?>	 

<input type="text" name="byconsolewooodt_chekout_page_tips_label" id="byconsolewooodt_chekout_page_tips_label" style="width:30%; padding:7px;" value="<?php printf( __('%s','byconsole-woo-order-delivery-time'),get_option('byconsolewooodt_chekout_page_tips_label')); ?>"/>	 <label><?php echo __('This text will displayed on order summary table as extra fees paid for','byconsole-woo-order-delivery-time');?></label><br />	 <span style="color:#a0a5aa">(Eg: Tips to delivery person)</span>	

<?php	

	}				



	function byconsolewooodt_chekout_page_delivery_tip_label()	

	{	

?>	 <input type="text" name="byconsolewooodt_chekout_page_delivery_tip_label" id="byconsolewooodt_chekout_page_delivery_tip_label" style="width:30%; padding:7px;" value="<?php printf( __('%s','byconsole-woo-order-delivery-time'),get_option('byconsolewooodt_chekout_page_delivery_tip_label')); ?>"/>	 <label><?php echo __('This text will be displayed on order summary table, email & order details page as extra fees paid for','byconsole-woo-order-delivery-time');?></label><br />	 <span style="color:#a0a5aa">(Eg: Tips to delivery person)</span>	



<?php	

	}

	function byconsolewooodt_display_time_as()

	{

	$byconsolewooodt_display_time_as_val = get_option('byconsolewooodt_display_time_as');

?>

<label>

	<input type="radio" name="byconsolewooodt_display_time_as" id="byconsolewooodt_display_time_as" value="time_slot" class="byconsolewooodt_admin_element_field radio" <?php if($byconsolewooodt_display_time_as_val == 'time_slot') {?> checked="checked" <?php }?>  />&nbsp; <?php echo __('Time Slot','byconsole-woo-order-delivery-time');?></label>

<label>

    <input type="radio" name="byconsolewooodt_display_time_as" id="byconsolewooodt_display_time_as" value="fixed_time" class="byconsolewooodt_admin_element_field radio" <?php if($byconsolewooodt_display_time_as_val == 'fixed_time') {?> checked="checked" <?php }?>  />&nbsp; <?php echo __('Fixed Time','byconsole-woo-order-delivery-time');?></label><br />

    <span style="color:#a0a5aa; line-height:50px !important;"><?php echo __('NB: Time Slot will always be displayed as in 24 hours format.');?></span><br />

<?php	

	}

	function byconsolewooodt_hours_format()

	{                                        

?>

 <select id="byconsolewooodt_hours_format" name="byconsolewooodt_hours_format" style="width:35%;" >

 <option   value="H:i A" <?php if( get_option('byconsolewooodt_hours_format')=='H:i A'){?> selected="selected"<?php }?> >24 hours(With AM/PM)</option>

 <option   value="H:i" <?php if( get_option('byconsolewooodt_hours_format')=='H:i'){?> selected="selected"<?php }?> >24 hours(Without AM/PM)</option>

 <option   value="h:i A"<?php if( get_option('byconsolewooodt_hours_format')=='h:i A'){?> selected="selected"<?php }?> >12 hours</option>

 </select>

 <label><?php echo __('24 hours or 12 hours with AM / PM.','byconsole-woo-order-delivery-time');?> </label>

<?php

	}

	function byconsolewooodt_preorder_days()

	{

?>

<input type="number" name="byconsolewooodt_preorder_days" id="byconsolewooodt_preorder_days" style="width:30%; padding:7px;" value="<?php printf( __('%s','byconsole-woo-order-delivery-time'),get_option('byconsolewooodt_preorder_days')); ?>"/>

<label><?php echo __('Leave blank to not set and pre-order days, this is number of days customer can pre order in advance.','byconsole-woo-order-delivery-time');?></label><br />

<span style="color:#a0a5aa">(Eg: 10 Only number)</span>

<?php

	}

	function byconsolewooodt_time_field_validation(){

		$byconsolewooodt_time_field_validation = get_option('byconsolewooodt_time_field_validation');

		if($byconsolewooodt_time_field_validation == 'yes'){

			$checked = 'checked="checked"';

		}else{

			$checked = '';

		}

		?>

			<input type="checkbox" name="byconsolewooodt_time_field_validation" class="byconsolewooodt_admin_element_field checkbox" id="byconsolewooodt_time_field_validation" value="yes" <?php echo $checked;?>/>

            <label><?php echo __('Make time selection mendatory.','byconsole-woo-order-delivery-time');?></label>

		<?php

	}

	///////////////////////////

	function byconsolewooodt_order_type(){

?>

<label>

    <input type="radio" name="byconsolewooodt_order_type" id="byconsolewooodt_order_type" class="byconsolewooodt_admin_element_field radio" value="levering" <?php if( get_option('byconsolewooodt_order_type')=='levering'){?> checked="checked"<?php }?> />Delivery

</label>

<label>

  <input type="radio" name="byconsolewooodt_order_type" id="byconsolewooodt_order_type" class="byconsolewooodt_admin_element_field radio" value="take_away" <?php if( get_option('byconsolewooodt_order_type')=='take_away'){?> checked="checked"<?php }?> />Pickup    
</label>

<label>

  <input type="radio" name="byconsolewooodt_order_type" id="byconsolewooodt_order_type" class="byconsolewooodt_admin_element_field radio" value="both" <?php if( get_option('byconsolewooodt_order_type')=='both'){?> checked="checked"<?php }?> />Both    

</label>

<script>

</script>

<?php 

	} 

	///////////////////////////

	function add_delivery_pickup_date_time_in_order_note(){	

	$add_delivery_pickup_date_time_in_order_note=get_option('add_delivery_pickup_date_time_in_order_note');

?>	

	<input type="checkbox" name="add_delivery_pickup_date_time_in_order_note" id="add_delivery_pickup_date_time_in_order_note" class="byconsolewooodt_admin_element_field checkbox" value="yes" <?php if($add_delivery_pickup_date_time_in_order_note == 'yes') { ?>  checked <?php } ?> /><label><?php echo __('If checked then it will add delivery/pickup date time in order note. Useful for third party apps those access order data by WooCommerce REST API','byconsole-woo-order-delivery-time');?></label>

<?php

	}
	
	function byconsolewooodt_time_field_show(){

		$byconsolewooodt_time_field_show = get_option('byconsolewooodt_time_field_show');

		if($byconsolewooodt_time_field_show == 'yes'){

			$checked = 'checked="checked"';

		}else{

			$checked = '';

		}

		?>

			<input type="checkbox" name="byconsolewooodt_time_field_show" class="byconsolewooodt_admin_element_field checkbox" id="byconsolewooodt_time_field_show" value="yes" <?php echo $checked;?>/>

            <label><?php echo __('Ask for delivery/pickup time.','byconsole-woo-order-delivery-time');?></label>

		<?php

	}
	
	function byconsolewooodt_tips_show_on_checkout_page(){	

	$byconsolewooodt_tips_show_on_checkout_page=get_option('byconsolewooodt_tips_show_on_checkout_page');
?>	
	<input type="checkbox" name="byconsolewooodt_tips_show_on_checkout_page" id="byconsolewooodt_tips_show_on_checkout_page" class="byconsolewooodt_admin_element_field checkbox" value="yes" <?php if($byconsolewooodt_tips_show_on_checkout_page == 'yes') { ?>  checked <?php } ?> /><label><?php echo __('If checked then it will optionally ask for "Tips for delivery person" on checkout page.','byconsole-woo-order-delivery-time');?></label>

<?php

	}

	function byconsolewooodt_opening_hours()

	{

?>



<label><?php echo __('From','byconsole-woo-order-delivery-time');?></label>



<input type="time" name="byconsolewooodt_opening_hours_from" id="byconsolewooodt_opening_hours_from" style="width:30%; padding:7px;" value="<?php printf( __('%s','byconsole-woo-order-delivery-time'),get_option('byconsolewooodt_opening_hours_from')); ?>" />



<label><?php echo __('To','byconsole-woo-order-delivery-time');?></label>



<input type="time" name="byconsolewooodt_opening_hours_to" id="byconsolewooodt_opening_hours_to" style="width:30%; padding:7px;" value="<?php printf( __('%s','byconsole-woo-order-delivery-time'),get_option('byconsolewooodt_opening_hours_to')); ?>" />



<label><?php echo __('Allowable Pickup Time.','byconsole-woo-order-delivery-time');?></label>



<?php



	}







	function byconsolewooodt_delivery_hours()
	{

?>

<label><?php echo __('From','byconsole-woo-order-delivery-time');?></label>

<input type="time" name="byconsolewooodt_delivery_hours_from" id="byconsolewooodt_delivery_hours_from" style="width:30%; padding:7px;" value="<?php printf( __('%s','byconsole-woo-order-delivery-time'),get_option('byconsolewooodt_delivery_hours_from')); ?>" />

<label><?php echo __('To','byconsole-woo-order-delivery-time');?></label>

<input type="time" name="byconsolewooodt_delivery_hours_to" id="byconsolewooodt_delivery_hours_to" style="width:30%; padding:7px;" value="<?php printf( __('%s','byconsole-woo-order-delivery-time'),get_option('byconsolewooodt_delivery_hours_to')); ?>" />

<label><?php echo __('Allowable Delivery Time.','byconsole-woo-order-delivery-time');?></label>

<?php

	}


	function byconsolewooodt_delivery_times()

	{

?>

<input type="text" name="byconsolewooodt_delivery_times" id="byconsolewooodt_delivery_times" style="width:30%; padding:7px;" value="<?php printf( __('%s','byconsole-woo-order-delivery-time'),get_option('byconsolewooodt_delivery_times')); ?>" />

<label> <?php echo __('This is visible on widget front end if customer has chosen delivery.','byconsole-woo-order-delivery-time');?></label><br />

<span style="color:#a0a5aa">(Eg: Minimum Delivery time 30 minutes)</span>

<?php

	}


	function byconsolewooodt_takeaway_lable()

	{

?>

<input type="text" name="byconsolewooodt_takeaway_lable" id="byconsolewooodt_takeaway_lable" style="width:50%; padding:7px;" value="<?php echo get_option('byconsolewooodt_takeaway_lable'); ?>" />

<label> <?php echo __('Take away label shown on checkout page and in widget.');?></label><br />

<?php		

	}


	function byconsolewooodt_delivery_lable()

	{

?>

<input type="text" name="byconsolewooodt_delivery_lable" id="byconsolewooodt_delivery_lable" style="width:50%; padding:7px;" value="<?php echo get_option('byconsolewooodt_delivery_lable'); ?>" />

<label> <?php echo __('Delivery label shown on checkout page and in widget.');?></label><br />

<?php		

	}

	function byconsolewooodt_date_field_text()

	{

?>

<input type="text" name="byconsolewooodt_date_field_text" id="byconsolewooodt_date_field_text" style="width:50%; padding:7px;" value="<?php echo get_option('byconsolewooodt_date_field_text'); ?>" />

<label> <?php echo __('Placeholder text for date-picker calendar input box.');?></label><br />

<?php		

	}

	function byconsolewooodt_time_field_text()

	{

?>

<input type="text" name="byconsolewooodt_time_field_text" id="byconsolewooodt_time_field_text" style="width:50%; padding:7px;" value="<?php echo get_option('byconsolewooodt_time_field_text'); ?>" />

<label> <?php echo __('Placeholder text for time drop-down input box.');?></label><br />

<?php		

	}

	function byconsolewooodt_orders_delivered()

	{

?>

<input type="text" name="byconsolewooodt_orders_delivered" id="byconsolewooodt_orders_delivered" style="width:50%; padding:7px;" value="<?php printf( __('%s','byconsole-woo-order-delivery-time'),get_option('byconsolewooodt_orders_delivered')); ?>" />

<label> <?php echo __('This is the text is shown on Order details page of customer side.','byconsole-woo-order-delivery-time');?></label><br />

<span style="color:#a0a5aa">(<?php echo __('Eg: The order will be delivered on','byconsole-woo-order-delivery-time');?>  [byc_delivery_date] <?php echo __('at','byconsole-woo-order-delivery-time');?>   [byc_delivery_time])</span>

<?php

	}

	function byconsolewooodt_orders_pick_up()

	{

?>

<input type="text" name="byconsolewooodt_orders_pick_up" id="byconsolewooodt_orders_pick_up" style="width:50%; padding:7px;" value="<?php printf( __('%s','byconsole-woo-order-delivery-time'),get_option('byconsolewooodt_orders_pick_up')); ?>" />

<label> <?php echo __('This is the text is shown on Order details page of customer side.','byconsole-woo-order-delivery-time');?></label><br />

<span style="color:#a0a5aa">(<?php echo __('Eg: The order can be Picked Up on','byconsole-woo-order-delivery-time');?>  [byc_pickup_date] <?php echo __('at','byconsole-woo-order-delivery-time');?>  [byc_pickup_time])</span>

<?php

	}


	function byconsolewooodt_widget_field_position()

	{                                        

?>

<select id="byconsolewooodt_widget_field_position" name="byconsolewooodt_widget_field_position" style="width:35%;" >

<option   value="top" <?php if( get_option('byconsolewooodt_widget_field_position')=='top'){?> selected="selected"<?php }?> >Show on top</option>

<option   value="bottom"<?php if( get_option('byconsolewooodt_widget_field_position')=='bottom'){?> selected="selected"<?php }?> >Show on Bottom</option>

</select>

<label><?php echo __('Choose if tracking text have to be shown on top (before order product list) or bottom (after product list).','byconsole-woo-order-delivery-time');?> </label>

<?php } 

function byconsolewooodt_select_tip_lable_text(){

	?>	

	<input type="text" name="byconsolewooodt_select_tip_lable_text" id="byconsolewooodt_select_tip_lable_text" style="width:30%; padding:7px;" value="<?php printf( __('%s','byconsole-woo-order-delivery-time'),get_option('byconsolewooodt_select_tip_lable_text')); ?>" />

	<label> <?php echo __('Texts for "No tips" option, like "Not this time!"');?></label><br />

	<?php

	

}



function byconsolewooodt_admin_wooodt_location_settings_form() 

{?>

<div class="wrap">

<h1>ByConsole Woocommerce Order Delivery Location Settings</h1>

<form method="post" class="form_byconsolewooodt_wooodt_location_settings" action="options.php">

<?php

settings_fields("wooodtlocationsetting");

do_settings_sections("byconsolewooodt_wooodt_location_settings_options");

submit_button(); 

?>          

</form>

</div>	

<?php 

}

function byc_wooodtlite_deactivation_survey(){
	include'bycwooodt_deactivation.php';
	}

add_action('admin_init', 'byconsolewooodt_plugin_settings_fields');

function byconsolewooodt_plugin_settings_fields()

	{

	add_settings_section("section", "All Settings", null, "byconsolewooodt_plugin_options");

	add_settings_field("byconsolewooodt_order_type", __('Allow order for:','byconsole-woo-order-delivery-time'), "byconsolewooodt_order_type", "byconsolewooodt_plugin_options", "section");

	add_settings_field("byconsolewooodt_preorder_days", __('Preorder Days:','byconsole-woo-order-delivery-time'), "byconsolewooodt_preorder_days", "byconsolewooodt_plugin_options", "section");
	
	add_settings_field("add_delivery_pickup_date_time_in_order_note", __('Add delivery/pickup date time in order note:','byconsole-woo-order-delivery-time'), "add_delivery_pickup_date_time_in_order_note", "byconsolewooodt_plugin_options", "section");

	add_settings_field("byconsolewooodt_time_field_show", __('Ask for time:','byconsole-woo-order-delivery-time'), "byconsolewooodt_time_field_show", "byconsolewooodt_plugin_options", "section");

	add_settings_field("byconsolewooodt_time_field_validation", __('Time field validation:','byconsole-woo-order-delivery-time'), "byconsolewooodt_time_field_validation", "byconsolewooodt_plugin_options", "section");

	add_settings_field("byconsolewooodt_tips_show_on_checkout_page", __('Optionally ask for tips:','byconsole-woo-order-delivery-time'), "byconsolewooodt_tips_show_on_checkout_page", "byconsolewooodt_plugin_options", "section");

	add_settings_field("byconsolewooodt_opening_hours", __('Pickup Hours:','byconsole-woo-order-delivery-time'), "byconsolewooodt_opening_hours", "byconsolewooodt_plugin_options", "section");

	add_settings_field("byconsolewooodt_delivery_hours", __('Delivery Hours:','byconsole-woo-order-delivery-time'), "byconsolewooodt_delivery_hours", "byconsolewooodt_plugin_options", "section");

	add_settings_field("byconsolewooodt_delivery_times", __('Minimum delivery Times:','byconsole-woo-order-delivery-time'), "byconsolewooodt_delivery_times", "byconsolewooodt_plugin_options", "section");

	add_settings_field("byconsolewooodt_takeaway_lable", __('Pickup label text:','byconsole-woo-order-delivery-time'), "byconsolewooodt_takeaway_lable", "byconsolewooodt_plugin_options", "section");	

	add_settings_field("byconsolewooodt_delivery_lable", __('Delivery label text:','byconsole-woo-order-delivery-time'), "byconsolewooodt_delivery_lable", "byconsolewooodt_plugin_options", "section");

	add_settings_field("byconsolewooodt_date_field_text", __('Date field text:','byconsole-woo-order-delivery-time'), "byconsolewooodt_date_field_text", "byconsolewooodt_plugin_options", "section");

	add_settings_field("byconsolewooodt_time_field_text", __('Time field text:','byconsole-woo-order-delivery-time'), "byconsolewooodt_time_field_text", "byconsolewooodt_plugin_options", "section");	

	add_settings_field("byconsolewooodt_orders_delivered", __('The order will be delivered:','byconsole-woo-order-delivery-time'), "byconsolewooodt_orders_delivered", "byconsolewooodt_plugin_options", "section");

	add_settings_field("byconsolewooodt_orders_pick_up", __('The order can be Picked up:','byconsole-woo-order-delivery-time'), "byconsolewooodt_orders_pick_up", "byconsolewooodt_plugin_options", "section");

	add_settings_field("byconsolewooodt_widget_field_position", __('Position of the text in the orders page:','byconsole-woo-order-delivery-time'), "byconsolewooodt_widget_field_position", "byconsolewooodt_plugin_options", "section");

	add_settings_field("byconsolewooodt_chekout_page_section_heading", __('Checkout page section heading','byconsole-woo-order-delivery-time'), "byconsolewooodt_chekout_page_section_heading", "byconsolewooodt_plugin_options", "section");

	add_settings_field("byconsolewooodt_chekout_page_order_type_label", __('Order type label on checkout page:','byconsole-woo-order-delivery-time'), "byconsolewooodt_chekout_page_order_type_label", "byconsolewooodt_plugin_options", "section");

	add_settings_field("byconsolewooodt_chekout_page_select_pickup_location_label", __('Select pickup location label on checkout page:','byconsole-woo-order-delivery-time'), "byconsolewooodt_chekout_page_select_pickup_location_label", "byconsolewooodt_plugin_options", "section");

	add_settings_field("byconsolewooodt_chekout_page_date_label", __('Calendar label on checkout page:','byconsole-woo-order-delivery-time'), "byconsolewooodt_chekout_page_date_label", "byconsolewooodt_plugin_options", "section");

	add_settings_field("byconsolewooodt_chekout_page_time_label", __('Time select label on checkout page:','byconsole-woo-order-delivery-time'), "byconsolewooodt_chekout_page_time_label", "byconsolewooodt_plugin_options", "section");				
	
	add_settings_field("byconsolewooodt_chekout_page_hrs_value", __('Hours text:','byconsole-woo-order-delivery-time'), "byconsolewooodt_chekout_page_hrs_value", "byconsolewooodt_plugin_options", "section");		
	
	add_settings_field("byconsolewooodt_chekout_page_tips_label", __('Tips label text:','byconsole-woo-order-delivery-time'), "byconsolewooodt_chekout_page_tips_label", "byconsolewooodt_plugin_options", "section");						
	
	add_settings_field("byconsolewooodt_chekout_page_delivery_tip_label", __('Delivery tips text label on checkout page:','byconsole-woo-order-delivery-time'), "byconsolewooodt_chekout_page_delivery_tip_label", "byconsolewooodt_plugin_options", "section");

	add_settings_field("byconsolewooodt_display_time_as", __('Display time as:','byconsole-woo-order-delivery-time'), "byconsolewooodt_display_time_as", "byconsolewooodt_plugin_options", "section");

	add_settings_field("byconsolewooodt_hours_format", __('Time format:','byconsole-woo-order-delivery-time'), "byconsolewooodt_hours_format", "byconsolewooodt_plugin_options", "section");

	add_settings_field("byconsolewooodt_select_tip_lable_text", __('No tips text:','byconsole-woo-order-delivery-time'), "byconsolewooodt_select_tip_lable_text", "byconsolewooodt_plugin_options", "section");

	register_setting("section", "byconsolewooodt_order_type");

	register_setting("section", "byconsolewooodt_preorder_days");

	register_setting("section", "byconsolewooodt_time_field_validation");

	register_setting("section", "byconsolewooodt_tips_show_on_checkout_page");

	register_setting("section", "add_delivery_pickup_date_time_in_order_note");

	register_setting("section", "byconsolewooodt_time_field_show");

	register_setting("section", "byconsolewooodt_opening_hours_from");

	register_setting("section", "byconsolewooodt_opening_hours_to");

	register_setting("section", "byconsolewooodt_delivery_hours_from");

	register_setting("section", "byconsolewooodt_delivery_hours_to");

	register_setting("section", "byconsolewooodt_delivery_times");

	register_setting("section", "byconsolewooodt_takeaway_lable");

	register_setting("section", "byconsolewooodt_delivery_lable");

	register_setting("section", "byconsolewooodt_date_field_text");

	register_setting("section", "byconsolewooodt_time_field_text");	

	register_setting("section", "byconsolewooodt_orders_delivered");

	register_setting("section", "byconsolewooodt_orders_pick_up");

	register_setting("section", "byconsolewooodt_widget_field_position");

	register_setting("section", "byconsolewooodt_chekout_page_section_heading");

	register_setting("section", "byconsolewooodt_chekout_page_order_type_label");

	register_setting("section", "byconsolewooodt_chekout_page_select_pickup_location_label");

	register_setting("section", "byconsolewooodt_chekout_page_date_label");

	register_setting("section", "byconsolewooodt_chekout_page_time_label");		

	register_setting("section", "byconsolewooodt_chekout_page_hrs_value");		

	register_setting("section", "byconsolewooodt_chekout_page_tips_label");		

	register_setting("section", "byconsolewooodt_chekout_page_delivery_tip_label");

	register_setting("section", "byconsolewooodt_display_time_as");

	register_setting("section", "byconsolewooodt_hours_format");

	register_setting("section", "byconsolewooodt_select_tip_lable_text");

	}

?>