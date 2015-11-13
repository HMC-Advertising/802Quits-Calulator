<?php
	//add_action("template_redirect", 'my_theme_redirect');

	function do_theme_redirect($url) {
	    global $post, $wp_query;
	    if (have_posts()) {
	        include($url);
	        die();
	    } else {
	        $wp_query->is_404 = true;
	    }
	}

	function my_theme_redirect() {
	    $plugindir = dirname( __FILE__ );
		
		$templatefilename = 'page-calculator.php';
		$templatefilename2 = 'page-save.php';
		$templatefilename3 = 'page-report.php';
	    $return_template = $plugindir . '/assets/php/template/' . $templatefilename;
	    $return_template2 = $plugindir . '/assets/php/template/' . $templatefilename2;
	    $return_template3 = $plugindir . '/assets/php/template/' . $templatefilename3;
	    
	    if(is_page('calculator')) do_theme_redirect($return_template);
	    if(is_page('save')) do_theme_redirect($return_template2);
	    if(is_page('report')) do_theme_redirect($return_template3);
	   
	}
	function pl(){
		$plugindir =  plugin_dir_path( __FILE__ );
		return $plugindir;
	}
?>