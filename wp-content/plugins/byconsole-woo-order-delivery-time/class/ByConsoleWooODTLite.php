<?php
defined( 'ABSPATH' ) OR exit;
class ByConsoleWooODTLite{
	
	public function get_wooodtlite_label_text($option_name){
		
		$byc_option_value = get_option($option_name);
		
		if(empty($byc_option_value)){
			
			if($option_name=='byconsolewooodt_takeaway_lable'){
				
				$byc_option_value = __('Take away','byconsole-woo-order-delivery-time');
				
				}
			
			if($option_name=='byconsolewooodt_delivery_lable'){
				
				$byc_option_value = __('Delivery','byconsole-woo-order-delivery-time');
				
				}
				
			if($option_name=='byconsolewooodt_date_field_text'){
				
				$byc_option_value = __('Select date','byconsole-woo-order-delivery-time');
				
				}
				
			if($option_name=='byconsolewooodt_time_field_text'){
				
				$byc_option_value = __('Select time','byconsole-woo-order-delivery-time');
				
				}

			if($option_name=='byconsolewooodt_chekout_page_hrs_value'){
				
				$byc_option_value = __('Hrs','byconsole-woo-order-delivery-time');
				
				}
			if($option_name=='byconsolewooodt_chekout_page_tips_label'){
				
				$byc_option_value = __('Tips','byconsole-woo-order-delivery-time');
				
				}
				
			if($option_name=='byconsolewooodt_chekout_page_delivery_tip_label'){
				
				$byc_option_value = __('Tips to delivery person','byconsole-woo-order-delivery-time');
				
				}
			if($option_name=='byconsolewooodt_select_tip_lable_text'){
				
				$byc_option_value = __('No tips this time!','byconsole-woo-order-delivery-time');
				
				}
						
			}
		return $byc_option_value;
		
		}
		
		//get option values for settings related 
		public function get_wooodtlite_settings($option_name){
		
		$byc_option_value = get_option($option_name);
		
		if(empty($byc_option_value)){
			
			if($option_name=='byconsolewooodt_order_type'){
				
				$byc_option_value = __('both','byconsole-woo-order-delivery-time');
				
				}
			
			if($option_name=='byconsolewooodt_preorder_days'){
				
				$byc_option_value = __('15','byconsole-woo-order-delivery-time');
				
				}
				
			if($option_name=='byconsolewooodt_time_field_show'){
				
				$byc_option_value = __('yes','byconsole-woo-order-delivery-time');
				
				}
				
			if($option_name=='byconsolewooodt_time_field_validation'){
				
				$byc_option_value = __('yes','byconsole-woo-order-delivery-time');
				
				}

			if($option_name=='byconsolewooodt_opening_hours_from'){
				
				$byc_option_value = __('10:00','byconsole-woo-order-delivery-time');
				
				}
			if($option_name=='byconsolewooodt_opening_hours_to'){
				
				$byc_option_value = __('20:00','byconsole-woo-order-delivery-time');
				
				}
				
			if($option_name=='byconsolewooodt_delivery_hours_from'){
				
				$byc_option_value = __('11:00','byconsole-woo-order-delivery-time');
				
				}
			if($option_name=='byconsolewooodt_delivery_hours_to'){
				
				$byc_option_value = __('19:00','byconsole-woo-order-delivery-time');
				
				}
				
			if($option_name=='byconsolewooodt_delivery_times'){
				
				$byc_option_value = __('30','byconsole-woo-order-delivery-time');
				
				}
			if($option_name=='byconsolewooodt_widget_field_position'){
				
				$byc_option_value = __('bottom','byconsole-woo-order-delivery-time');
				
				}
			if($option_name=='byconsolewooodt_display_time_as'){
				
				$byc_option_value = __('time_slot','byconsole-woo-order-delivery-time');
				
				}
			if($option_name=='time_slot'){
				
				$byc_option_value = __('H:i','byconsole-woo-order-delivery-time');
				
				}
			if($option_name=='add_delivery_pickup_date_time_in_order_note'){
				
				$byc_option_value = __('','byconsole-woo-order-delivery-time');
				
				}
						
			}
		return $byc_option_value;
		
		}
		
	public function set_wooodtlite_default_setings(){
		
		global $wpdb;

		if(!get_option('byconsolewooodt_free_plugin_activation_date')){		

			$currentActivatedDate = date("m/d/Y");

			update_option('byconsolewooodt_free_plugin_activation_date',$currentActivatedDate);

		}


		if(!get_option('byconsolewooodt_order_type')){

			update_option('byconsolewooodt_order_type','both');

		}


		if(!get_option('byconsolewooodt_preorder_days')){

			update_option('byconsolewooodt_preorder_days','10');

		}


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
	

		if(!get_option('byconsolewooodt_display_time_as'))	{

			update_option('byconsolewooodt_display_time_as','time_slot');

		}	

		
		}
		
	public function remove_wooodtlite_options(){
		
		delete_option('byconsolewooodt_chekout_page_date_label');
		
		delete_option('byconsolewooodt_chekout_page_order_type_label');
		
		delete_option('byconsolewooodt_chekout_page_section_heading');
		
		delete_option('byconsolewooodt_date_field_text');
		
		delete_option('byconsolewooodt_delivery_hours_from');
		
		delete_option('byconsolewooodt_delivery_hours_to');
		
		delete_option('byconsolewooodt_delivery_lable');
		
		delete_option('byconsolewooodt_discount_percentage_amount');
		
		delete_option('byconsolewooodt_display_time_as');
		
		delete_option('byconsolewooodt_free_plugin_activation_date');
		
		delete_option('byconsolewooodt_free_plugin_admin_access_date');
		
		delete_option('byconsolewooodt_hours_format');
		
		delete_option('byconsolewooodt_opening_hours_from');
		
		delete_option('byconsolewooodt_opening_hours_to');
		
		delete_option('byconsolewooodt_order_type');
		
		delete_option('byconsolewooodt_orders_delivered');
		
		delete_option('byconsolewooodt_preorder_days');
		
		delete_option('byconsolewooodt_takeaway_lable');
		
		delete_option('byconsolewooodt_time_field_text');

		}
		
	public static function wooodtlite_deactivate(){
		
		if ( ! current_user_can( 'activate_plugins' ) )
            return;
        $plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';
        check_admin_referer( "deactivate-plugin_{$plugin}" );
		
		if ( ! wp_verify_nonce( $_REQUEST['didbycwooodtlitesurvey'], 'bycwooodtlitesurvey' ) ) {
		//if($_REQUEST['didsurvey']!='yes'){

			if ( wp_safe_redirect( 'admin.php?page=byc_wooodtlite_deactivation_survey&plugin='.$plugin.'&wooodtlitereqk='.$_REQUEST['_wpnonce'].'&action='.$_REQUEST['action'] ) ) {
	    		//echo 'ABC...';
				exit;
			}else{
				
				//die;
				exit( var_dump( $_GET ) );
				
				}
			
		}
		//include plugin_dir_path(__FILE__).'../inc/survey.php';
		//die;
		//exit( var_dump( $_GET ) );
		}
		
	public function is_wooodtlite_settings_page(){
		
		$current_page = get_current_screen();
		
		$return = false;
		
		$wooodtlite_admin_pages=array(
			'byconsolewooodt_general_settings', 
			'byconsolewooodt_admin_modification_request_settings', 
			'byconsolewooodt_admin_holiday_settings', 
			'byconsolewooodt_wooodt_location_settings_page',  
			'byconsolewooodt_admin_delivery_pickup_calender_settings_page',
			'byc_wooodtlite_deactivation_survey'
			); 
		
		foreach($wooodtlite_admin_pages as $wooodtlite_admin_page){
			if(strpos($current_page->base, $wooodtlite_admin_page) !== false){
				$return = true;
				break;
				}
			}
		return $return;
		}
	public static function set_wooodtlite_deactivation_info($survey_data){
		
 		$currentsiteurl=site_url();
		$current_timezone=wp_timezone_string();
		$byc_plugin_data=get_plugin_data(WP_PLUGIN_DIR.'/byconsole-woo-order-delivery-time/ByConsoleWooODT.php');
		$byc_plugin_slug=$byc_plugin_data['TextDomain'];
		$byc_plugin_version=$byc_plugin_data['Version'];
		$byc_plugin_activation_date=get_option('byconsolewooodt_free_plugin_activation_date');
		$byc_plugin_deactivation_date=current_time('mysql');
 		$currentwpversion=get_bloginfo('version');
 		$current_wc_version='';
 		$current_active_theme_slug=wp_get_theme();
 		$current_active_theme_version=wp_get_theme()->get('Version');
		$current_active_plugins_arr=get_option('active_plugins');
		$i=0;
		foreach($current_active_plugins_arr as $current_active_plugins_arr_ele){
			$current_active_plugins_arr_arr['plug'.$i]=$current_active_plugins_arr_ele;
			$i++;
			}
		$current_active_plugins=json_encode($current_active_plugins_arr_arr);
		$plugins=get_plugins();
		foreach($plugins as $plugin){
			$plugs_arr[$plugin['TextDomain']]['Name']=$plugin['Name'];
			$plugs_arr[$plugin['TextDomain']]['Version']=$plugin['Version'];
			$plugs_arr[$plugin['TextDomain']]['Author']=$plugin['Author'];
			$plugs_arr[$plugin['TextDomain']]['PluginURI']=$plugin['PluginURI'];
			if($plugin['TextDomain']=='woocommerce'){
				$current_wc_version=$plugin['Version'];
				}
			}
		//$plugs_arr=(['zbc'=>'xyz']);
		$plugs_added=json_encode($plugs_arr);
		$byc_deactivation_reason='None selected';
		$byc_suggestion='No suggestion';
				/*$wooodtlite_deactivation_info='{"url":"testurl999","plugin_slug":"test-slug","plugin_version":"2.2.0","activation_date":"10\/12\/2021","deactivation_date":"11-12-2021","wp_version":"5.6","wc_version":"4.0","active_theme_slug":"test-theme","active_theme_version":"1.0.0","active_plugins":"a long list","deactivation_reason":"temporary deactivation","suggestion":"this is a test"}';*/
		$wooodtlite_deactivation_info='{"url":"'.$currentsiteurl.'","wp_time_zone":"'.$current_timezone.'","plugin_slug":"'.$byc_plugin_slug.'","plugin_version":"'.$byc_plugin_version.'","activation_date":"'.$byc_plugin_activation_date.'","deactivation_date":"'.$byc_plugin_deactivation_date.'","wp_version":"'.$currentwpversion.'","wc_version":"'.$current_wc_version.'","active_theme_slug":"'.$current_active_theme_slug.'","active_theme_version":"'.$current_active_theme_version.'","active_plugins":'.$current_active_plugins.',"plugins_added":'.$plugs_added.',"deactivation_reason":"'.$byc_deactivation_reason.'","suggestion":"'.$byc_suggestion.'"}';
		return $wooodtlite_deactivation_info;
		}


	}
?>