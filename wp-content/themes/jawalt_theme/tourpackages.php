<?php /* Template Name: Tour Packages */

get_header(); ?>



<div class="content" style=' <?php if( Language == 'Arabic') { ?> direction:rtl; <?php } ?> background-image: url("<?php echo page_background_image( get_the_ID()); ?>");background-repeat: no-repeat;background-size: 100% 100%;' >

    <div class="container tourpackages">

        <h2 class="heading col-sm-12"><?php if( Language != 'Arabic') { ?> Tour Packages <?php }else{ ?> جولة الحزم <?php } ?></h2>

        <div class="inner-container">
            <div class="row">
                <?php
                if(Language != 'Arabic') {
                    $home_query = new WP_Query('showposts=1000');

                    if ( $home_query -> have_posts() ) : while ( $home_query -> have_posts() ) : $home_query -> the_post(); ?>

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

                    <?php endwhile;
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









