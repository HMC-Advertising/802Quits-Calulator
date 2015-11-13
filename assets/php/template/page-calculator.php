<?php get_header(); ?>

<div class="container">
	<main class="main col-lg-9 col-md-8 col-sm-12" role="main">
		<div class="main-indent">
		
			<?php the_content(); ?>
			
<!-- BEGINING OF THE CALULATOR -->
	
			<?php
				//$plugindir = dirname( __FILE__ );
				
				include_once(pl()."assets/cal/index.php"); 
				//include_once("assets/cal/index.php");
			?>

<!-- END OF THE CALCULATOR -->
		
		</div>
	</main>
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>