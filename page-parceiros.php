<?php
/*
Template Name: Parceiros
*/
get_header(); ?>

<style type="text/css">
	body{overflow-y: scroll;}
</style>

<div class="row">
	<div class="small-12 medium-4 large-4 columns logo" >
		<div class="logo-interna"><a href="<?php bloginfo(); ?>"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/logo-help-cosbel.png"></a></div>
	</div>



	<div class="small-12 medium-6 large-6 columns panel my-div2" role="main">

	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
<!--			<header>
				<h1 class="entry-title text-center"><?php //the_title(); ?></h1>
			</header>-->
<?php the_content(); ?>
			<!-- <div class="small-12 medium-8 large-8 columns panel my-div"><?php the_content(); ?></div> -->				

		</article>
	<?php endwhile; // End the loop ?>
	</div>

	<div class="small-12 medium-2 large-2 columns social" >
	<ul class="social">
		<li><a href="http://www.cosbel.com.br" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/icon-www.png">www.cosbel.com.br</a></li>
			<li><a href="https://www.facebook.com/LojasCosbel/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/face-icon.png">lojascosbel</a></li>
				<li><a href="https://instagram.com/cosbel/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/instagram-icon.png">cosbel</a></li>
				<li></li>
	</ul>

	</div>

	<div class="small-12 medium-2 large-2 columns logo-rodape" >
	<img src="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/logo-cosbel-rodape.png"></div>
</div>

<?php get_footer(); ?>