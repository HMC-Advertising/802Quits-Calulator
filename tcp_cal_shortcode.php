<?php

	function cal(){
		 ob_start();
          //include the specified file
          include_once(pl()."assets/cal/index.php"); 
          //assign the file output to $content variable and clean buffer
          $content = ob_get_clean();
          //return the $content
          //return is important for the output to appear at the correct position
          //in the content
          return $content;
	}
	function save(){
		ob_start();
          //include the specified file
         include_once(pl()."assets/cal/save.php"); 
          //assign the file output to $content variable and clean buffer
          $content = ob_get_clean();
          //return the $content
          //return is important for the output to appear at the correct position
          //in the content
          return $content;
	}
	function report(){

		 ob_start();
          //include the specified file
         include_once(pl()."assets/cal/report.php"); 
          //assign the file output to $content variable and clean buffer
          $content = ob_get_clean();
          //return the $content
          //return is important for the output to appear at the correct position
          //in the content
          return $content;

	}
	add_shortcode("cal", "cal");
		add_shortcode("save", "save");
	add_shortcode("report", "report");
   

