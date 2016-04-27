<?php
/*
Template Name: quem-participou
*/
get_header(); ?>
<style type="text/css">
	body{overflow: scroll;}
</style>
<div class="row">
	<div class="small-12 medium-3 large-3 columns logo" >
		<div class="logo-interna"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/logo-help-cosbel.png"></a></div>
	</div>



	<div class="small-12 medium-7 large-7 columns panel" role="main">

	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title text-center"><?php //the_title(); ?></h1>
			</header>
			<div class="entry-content">

				<?php the_content(); ?>
				</div>

<div class="depoimentos">
	<div class="small-12 medium-12 large-12 columns">
			<p><ul class="small-block-grid-2">
							<?php
							global $post;
							$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							$args = array(  'paged' => $paged, 'posts_per_page' => 4, 'cat' => 4);
						//	query_posts( array( 'cat' => 4, 'paged' => get_query_var('page') ) );
							$myposts = get_posts($args);
							foreach( $myposts as $post ) : setup_postdata($post); ?>
							<!--  query_posts( array( 'paged' => $paged, 'posts_per_page' => 30, 'cat' => 4)); ?> -->
<?php

?>
									<li>
										<div class="text-center"><?php echo the_post_thumbnail('avatar'); ?></div>
										<h6 class="text-center"><?php the_title(); ?></h6>
																				<p class="text-left"><?php echo excerpt('10'); ?></p><br>
																				<p><a href="<?php echo esc_url( get_permalink() ); ?>">Veja mais</a></p>

									</li>
										<?php// endwhile; ?>
							<?php endforeach; ?>
							
						</ul>


						<div class="large-12 medium-12 small-12 columns">
							<div class="paginacao"><?php
wp_pagenavi();
?></div></div>
			</p>
		</div><br><br><br>
	</div>

			<footer>
				<?php// wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'FoundationPress'), 'after' => '</p></nav>' )); ?>
				<p><?php// the_tags(); ?></p>
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

	<div><img src="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/logo-cosbel-rodape.png"></div>
	<div class="small-12 medium-12 large-12 columns logo-rodape" >
	</div>
</div>


<?php get_footer(); ?>
