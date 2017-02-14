<?php /* Template Name: Tour Packages */

get_header(); ?>



<div class="content" style=' <?php if( Language == 'Arabic') { ?> direction:rtl; <?php } ?> background-image: url("<?php echo page_background_image( get_the_ID()); ?>");background-repeat: no-repeat;background-size: 100% 100%;' >

    <div class="container tourpackages">

        <h2 class="heading col-sm-12"><?php if( Language != 'Arabic') { ?> Tour Packages <?php }else{ ?> جولة الحزم <?php } ?></h2>

        <div class="inner-container">
            <div class="row">
                <?php
                if(Language != 'Arabic') {

                    $args = array(
                        'posts_per_page'   => 100,
                        'offset'           => 0,
                        'category'         => '',
                        'category_name'    => '',
                        'orderby'          => 'title',
                        'order'            => 'ASC',
                        'include'          => '',
                        'exclude'          => '',
                        'meta_key'         => '',
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
                        foreach ( $myposts as $post ) : setup_postdata( $post ); ?>

                            <div class="col-sm-12 m-b-25 qwe">
                                <div class="travel-image col-md-3">
                                    <?php the_post_thumbnail(); ?>
                                </div>
                                <!-- Display the Title as a link to the Post's permalink. -->

                                <div class="col-col-9">

                                    <h3 class="m-t-0">
                                        <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                    <div class="entry">
                                        <?php echo excerpt(220); ?>
                                    </div>
                                </div>
                            </div>

                            <?php
                        endforeach;
                    endif;
                }else {
                    get_template_part( 'template-parts/arabic_tourpackages', 'page' );
                }?>
            </div>
        </div>
    </div>
</div>


<style>
    img {
        height: auto;
        width: 100%;
    }

    .m-t-0{
        margin-top:0px !important;
    }
</style>
<?php get_footer(); ?>









