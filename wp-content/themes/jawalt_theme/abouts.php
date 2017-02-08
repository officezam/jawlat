<?php /* Template Name: About Us */


get_header(); ?>

	<?php if(Language != 'Arabic') { ?>
 <section class="tour">
			<div class="inner-container">
				<div class="row">
					
					<div class="col-sm-12">
						<div class="tour-widget">
                         <?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			// End of the loop.
		endwhile;
		?>
						</div>
					</div>
				</div>
			</div>
		</section>

	<?php }else{ ?>

	<style>
		h1{
			float: right;
		}

		.entry-content{float: right;}
	</style>
	<section class="tour">
		<div class="inner-container">
			<div class="row">

				<div class="col-sm-12">
					<div class="tour-widget">
						<article id="post-<?php the_ID(); ?>" class="post-<?php the_ID(); ?> page type-page status-publish hentry">
							<header class="entry-header">
								<h1 class="entry-title"><?php arabic_page_title(get_the_ID()); ?></h1>	</header><!-- .entry-header -->


							<div class="entry-content">
								<p><?php echo arabic_page_content(get_the_ID()); ?></p>
							</div><!-- .entry-content -->
						</article>
					</div>
				</div>
			</div>
		</div>
	</section>


<?php } ?>

<style>
.entry-footer{
display:none;	
	}
</style>
<?php get_footer(); ?>