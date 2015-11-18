<?php

	function pl_scripts(){
		global $is_ie;
		wp_register_style('cal-style', plugins_url("802Quits-Calculator_Production/assets/style/css/main.css") );
		wp_register_style('report-style', plugins_url("802Quits-Calculator_Production/assets/style/css/report.css") );
		wp_register_style('jQuery-UI', plugins_url("802Quits-Calculator_Production/assets/style/css/aristo/jquery-ui-1.8.7.custom.css") );
		wp_register_style('reset', "http://yui.yahooapis.com/3.3.0/build/cssreset/reset-min.css" );
		

		wp_register_style('cal-style-IE', plugins_url("802Quits-Calculator_Production/assets/style/css/main-ie.css") );
		wp_register_style('report-style-IE', plugins_url("802Quits-Calculator_Production/assets/style/css/report-ie.css") );


		wp_register_script("jQuery-UI-Script", "https://code.jquery.com/ui/1.11.4/jquery-ui.js", array(), '1.0', false);
		
		wp_register_script("autoNumeric", plugins_url("802Quits-Calculator_Production/assets/script/plugins/autoNumeric-1.6.2.js"), array(), '1.0', false);

		wp_enqueue_script('jquery');

		if(is_page('calculator') or is_page("report")){
			wp_enqueue_style('reset');
			wp_enqueue_style('jQuery-UI');
			wp_enqueue_script('jQuery-UI-Script');
			wp_enqueue_script('autoNumeric');
		}

		if(is_page('calculator')){
			if($is_ie) wp_enqueue_style('cal-style-IE');
			else 	wp_enqueue_style('cal-style');
		}

		if(is_page('report')){
			if($is_ie) wp_enqueue_style('report-style-IE');
			else 	wp_enqueue_style('report-style');
		}



	}

	add_action( 'wp_enqueue_scripts', 'pl_scripts' );
