<?php
/*
Template Name: edicoes_passadas
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

<div class="edicoes">
	<div class="small-12 medium-12 large-12 columns">
			<p><ul class="small-block-grid-2">
							<?php
							global $post;
							$args = array('cat' => 3, 'paged' => $paged );
							$myposts = get_posts( $args );
							foreach( $myposts as $post ) : setup_postdata($post); ?>
								<!--  query_posts( array( 'paged' => $paged, 'posts_per_page' => 30, 'cat' => 4)); ?> -->

									<li>
										<a href="<?php the_field('url_you_tube');?>" rel="prettyPhoto"><?php if ( has_post_thumbnail()) the_post_thumbnail(); ?></a>
										<h6 class="text-center"><?php the_title(); ?></h6>
									</li>
										<?php// endwhile; ?>
							<?php endforeach; ?>
						</ul>

						<div class="large-12 medium-12 small-12 columns">
					 										 	<div class="paginacao">
					 											<?php wp_pagenavi(); ?>
					 											</div>
					 										</div>
			</p>
		</div>
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
		<li><a href="http://cosbel.com.br" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/icon-www.png">www.cosbel.com.br</a></li>
			<li><a href="http://facebook.com" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/face-icon.png">cosbel</a></li>
				<li><a href="http://instagram.com" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/instagram-icon.png">@cosbel</a></li>
				<li></li>
	</ul>

	</div>
	<div class="small-12 medium-2 large-2 columns logo-rodape" >
	<img src="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/logo-cosbel-rodape.png"></div>
</div>


<?php get_footer(); ?>
