<?php
/*
	Plugin Name: 802Quits Calulator
	Author: Amanda Iaria @ We Are HMC
	Version: 2.0
	Description: Calulator to figure out how much someone can save when they stop smoking

*/
	# Set php version through phpenv. 5.3, 5.4, 5.5 & 5.6 available
phpenv local 5.5
# Install extensions through Pecl
# yes yes | pecl install memcache

# Install dependencies through Composer
composer install --prefer-source --no-interaction

	require_once("tcp_cal_scripts.php");
	require_once("tcp_cal_shortcode.php");
	require_once("tcp_cal_functions.php");
	


	

	?>