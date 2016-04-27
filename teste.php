<?php
/*
Template Name: teste
*/
get_header(); ?>
<style type="text/css">
	body{overflow-y: scroll;}
</style>
<div class="row">
	<div class="small-12 medium-3 large-3 columns logo" >
		<div class="logo-interna"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/logo-help-cosbel.png"></a></div>
	</div>



	<div class="small-12 medium-7 large-7 columns panel depoimentos my-div2" role="main">

			<ul class="small-block-grid-2">
							<?php
							global $post;
							$args = array('numberposts' => -1, 'cat' => 4 );
							$myposts = get_posts( $args );
							foreach( $myposts as $post ) : setup_postdata($post); ?>
									<li>
										<div class="text-center"><?php echo the_post_thumbnail('avatar'); ?></div>
										<h6 class="text-center"><?php the_title(); ?></h6>
										<p class="text-left"><?php echo excerpt('10'); ?></p><br>
										<p><a href="<?php echo esc_url( get_permalink() ); ?>">Veja mais</a></p>
									</li>
							<?php endforeach; ?>
			</ul>
						
				
	</div> <!-- div depoimentos -->

			<div class="small-12 medium-2 large-2 columns social" >
			<ul class="social">
			<li><a href="http://www.cosbel.com.br" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/icon-www.png">www.cosbel.com.br</a></li>
				<li><a href="https://www.facebook.com/LojasCosbel/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/face-icon.png">lojascosbel</a></li>
					<li><a href="https://instagram.com/cosbel/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/instagram-icon.png">cosbel</a></li>
			</ul>

			</div>
<?php // endwhile; ?>
	<div><img src="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/logo-cosbel-rodape.png"></div>
	
	</div> <!-- div row -->



<?php get_footer(); ?>
