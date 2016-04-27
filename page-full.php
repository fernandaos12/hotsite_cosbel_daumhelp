<?php
/*
Template Name: Full Width
*/
get_header(); ?>

<style type="text/css">
	body{overflow: scroll;}
</style>

<div class="row">
	<div class="small-12 medium-4 large-4 columns logo" >
		<div class="logo-interna"><a href="<?php bloginfo(); ?>"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/logo-help-cosbel.png"></a></div>
	</div>



	<div class="small-12 medium-6 large-6 columns panel" role="main">

	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title text-center"><?php //the_title(); ?></h1>
			</header>
			<div class="entry-content">

				<?php the_content(); ?>
				</div>

			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'FoundationPress'), 'after' => '</p></nav>' )); ?>
				<p><?php the_tags(); ?></p>
			</footer>
			<?php// comments_template(); ?>
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
