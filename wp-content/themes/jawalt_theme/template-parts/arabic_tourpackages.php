

<?php

$args = array(
	'posts_per_page'   => 100,
	'offset'           => 0,
	'category'         => '',
	'category_name'    => '',
	'orderby'          => 'meta_value',
	'order'            => 'ASC',
	'include'          => '',
	'exclude'          => '',
	'meta_key'         => 'arabic_post_title',
	'meta_value'       => '',
	'post_type'        => 'post',
	'post_mime_type'   => '',
	'post_parent'      => '',
	'author'	   => '',
	'author_name'	   => '',
	'post_status'      => 'publish',
	'suppress_filters' => true
);
$posts_array = get_posts( $args );
$myposts = get_posts( $args );


if ( !empty($myposts) ):
	foreach ( $myposts as $post ) : setup_postdata( $post );
		?>
		<div class="col-sm-12 m-b-25">
			<div class="travel-image col-md-3">
				<?php the_post_thumbnail(); ?>
			</div>
			<!-- Display the Title as a link to the Post's permalink. -->
			<div class="col-col-9" dir="rtl">
				<h3 class="m-t-0">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
						<?php echo get_post_title_arabic(get_the_ID()); ?>
					</a>
				</h3>
				</br>
				<div class="entry">
					<?php echo my_excerpt(130 , get_the_ID()); ?>
				</div>
			</div>
		</div>
		<?php
	endforeach;
endif;
?>
















