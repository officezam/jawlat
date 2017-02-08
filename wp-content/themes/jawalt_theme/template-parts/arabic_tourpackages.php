

				<?php

				$home_query = new WP_Query('showposts=1000');

				if ( $home_query -> have_posts() ) : while ( $home_query -> have_posts() ) : $home_query -> the_post(); ?>



					<div class="col-sm-12 m-b-25">



						<div class="travel-image col-md-3">



							<?php the_post_thumbnail(); ?>


						</div>



						<!-- Display the Title as a link to the Post's permalink. -->

						<div class="col-col-9" dir="rtl">

							<h3 class="m-t-0"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">



									<?php //the_title(); the_ID();
									echo get_post_title_arabic(get_the_ID()); ?>



								</a></h3>
								</br>


							<div class="entry">
								<?php echo my_excerpt(130 , get_the_ID()); ?>
								<?php //echo substr(get_post_excerpt_arabic(get_the_ID()), 0, 1500); ?>

								<?php //echo get_post_excerpt_arabic(get_the_ID());  ?>



							</div>
						</div>


					</div>



				<?php endwhile; ?>

				<?php endif; ?>

















