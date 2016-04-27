<?php
/*
Template Name: Homepage
*/
get_header(); ?>
<div class="row">
	<div class="small-12 medium-6 large-6 columns" >
			<div class="logo-home"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/logo-help-cosbel.png"></a></div>
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php //the_title(); ?></h1>
			</header>
	
	<div class="entry-content"><div class="panel-home"><div class="txt-home">
				<?php the_content(); ?></div>
</div>
</div>
			<a href="http://daumhelpcosbel.com.br/inscricao/" class="button expand">• PARTICIPE •</a>
			
			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'FoundationPress'), 'after' => '</p></nav>' )); ?>
				<p><?php the_tags(); ?></p>
			</footer>
			<?php// comments_template(); ?>
		</article>
	<?php endwhile; // End the loop ?>


</div>

<div class="small-12 medium-6 large-6 columns social" >
<ul class="social">
	<li><a href="http://cosbel.com.br" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/icon-www.png">www.cosbel.com.br</a></li>
		<li><a href="http://facebook.com" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/face-icon.png">cosbel</a></li>
			<li><a href="http://instagram.com" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/instagram-icon.png">@cosbel</a></li>
			<li></li>
</ul>

</div>
<div class="small-12 medium-6 large-6 columns logo-rodape" >
<img src="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/logo-cosbel-rodape.png"></div>

<?php get_footer(); ?>
