<?php
/*
Template Name: quem-participou
*/
get_header(); ?>

<style type="text/css">
	body{overflow-y: scroll;}

::-webkit-scrollbar {
  width: 10px;
  height: 10px;
}
 
::-webkit-scrollbar-button:start:decrement,
::-webkit-scrollbar-button:end:increment  {
  display: none;
}
 
::-webkit-scrollbar-track-piece  {
  background-color: #E50076;
  -webkit-border-radius: 6px;
}
 
::-webkit-scrollbar-thumb:vertical {
  background-color: #f1cebb;
  -webkit-border-radius: 6px;
}

.rodape-cosbel{margin-left: 30px;}
.part{margin-left: 60px;}

</style>
<div class="row">
	<div class="small-12 medium-3 large-3 columns logo" >
		<div class="logo-interna"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/logo-help-cosbel.png"></a></div>
	</div>



	<div class="small-12 medium-7 large-7 columns panel my-div2" role="main">
		<div class="part"><img src="http://daumhelpcosbel.com.br/wp-content/uploads/2015/10/participantes-R01.png" alt="" width="419" height="127" /></div><br>
		<p style="text-align: center; font-size: 20px;">	
			Veja os textos das participantes. Elas já pediram um help! -
você pode pedir também. Confira e participe.</p>
	<div class="depoimentos">
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
									<!--	<p><a href="<?php echo esc_url( get_permalink() ); ?>">Veja mais</a></p> -->
									</li>
							<?php endforeach; ?>
			</ul>
						
				
	</div> <!-- div depoimentos -->
</div>
			<div class="small-12 medium-2 large-2 columns social" >
			<ul class="social">
			<li><a href="http://www.cosbel.com.br" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/icon-www.png">www.cosbel.com.br</a></li>
				<li><a href="https://www.facebook.com/LojasCosbel/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/face-icon.png">lojascosbel</a></li>
					<li><a href="https://instagram.com/cosbel/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/instagram-icon.png">cosbel</a></li>
			</ul>

			</div>
<?php // endwhile; ?>
	<div><img class="rodape-cosbel" src="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/logo-cosbel-rodape.png"></div>
	
	</div> <!-- div row -->



<?php get_footer(); ?>
