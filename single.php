<?php get_header(); ?>

<!-- <style type="text/css"> body{overflow: scroll;}</style> -->
<div class="small-12 medium-4 large-4 columns logo-single"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/logo-help-cosbel.png"></a></div>
<?php while (have_posts()) : the_post(); ?>

<div class="row">
<!--	<div class="small-12 medium-4 large-4 columns logo-home"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/logo-help-cosbel.png"></a></div>-->
  <div class="small-12 medium-8 large-8 columns"><h1 class="entry-title titulo"><?php the_title(); ?></h1></div>
</div>

		<div class="row">

				  <div class="small-12 medium-4 large-4 columns"><?php if ( has_post_thumbnail() ): ?><?php the_post_thumbnail('single', array('class' => 'imagemsingle')); ?><?php endif; ?></div>

				  <div class="small-12 medium-8 large-8 columns panel my-div"><?php the_content(); ?></div>
		</div>
<?php endwhile;?>
</div>

<!--<div class="row">
	<div class="small-12 medium-12 large-12 columns" role="main">

	<?php// do_action('foundationPress_before_content'); ?>

	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title text-center"><?php the_title(); ?></h1>
				<?php// FoundationPress_entry_meta(); ?>
			</header>
			<?php// do_action('foundationPress_post_before_entry_content'); ?>

				<div class="small-12 medium-6 large-6 columns">
					<div class="entry-content">
						<?php if ( has_post_thumbnail() ): ?>
							<div class="row">
								<div class="column">
									<?php the_post_thumbnail('', array('class' => 'th')); ?>
								</div>
							</div>
						<?php endif; ?></div>

					<div class="small-12 medium-6 large-6 columns panel">		
						<?php the_content(); ?>
				</div></div>
			<footer>
				<?php// wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'FoundationPress'), 'after' => '</p></nav>' )); ?>
				<p><?php// the_tags(); ?></p>
			</footer>
			<?php// do_action('foundationPress_post_before_comments'); ?>
			<?php// comments_template(); ?>
			<?php// do_action('foundationPress_post_after_comments'); ?>
		</article>
	<?php endwhile;?>

	<?php// do_action('foundationPress_after_content'); ?>

	</div>
	<?php// get_sidebar(); ?>
</div> -->
<?php get_footer(); ?>
