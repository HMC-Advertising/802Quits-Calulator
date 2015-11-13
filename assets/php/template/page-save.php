<?php 
/*
Template Name: Save Page
*/

get_header(); ?>

<div class="container">
	<main class="main col-lg-9 col-md-8 col-sm-12" role="main">
		<div class="main-indent">
		
	
			
<!-- BEGINING OF THE CALULATOR -->
	
	<?php 
	include(pl()."assets/cal/save.php");
	?>



<!-- END OF THE CALCULATOR -->



		</div>
	</main>
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>