<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<style>
    .about-pages{ padding-top: 150px;}
    .col-col-9{    padding: 10px;
    }
    .tour-widget h1 { color: #000000}

    @media all and (max-width: 480px) {
        .about-pages {
            padding-top: 72px;
        }

</style>

<?php if( Language == 'Arabic'){ ?>
<style>
    .col-sm-9{float: right;}
    .entry{direction: rtl; float: right;}
    .m-t-0{    float: right;
        direction: rtl;
        margin-top:5px}

</style>

<?php }else{ ?>
    <style>
        .m-t-0{
            margin-top:5px
        }

    </style>
<?php } ?>





<?php $Background_image  = page_background_image( get_the_ID()); ?>
<section class="tour" style='background-image: url("<?php echo $Background_image; ?>");background-repeat: no-repeat;background-size: 100% 100%;'>






    <div class="inner-container about-pages">

        <div class="row">


            <?php //echo do_shortcode("[tabs id='1087']"); ?>
            <style>
                .menu-css ul li {
                    list-style: none;
                }
                @media (min-width: 484px) {
                    #mega-menu-wrap-page-sidebar-menu-English {
                        margin-top: 5%;
                    }

                    #mega-menu-wrap-page-sidebar-menu-Arabic {
                        margin-top: 25%;
                    }
                }
                .menu-css{ margin-left: -35px;}
                <?php if( Language == 'Arabic'){ ?>
                .menu-css{ direction:rtl; float: right; margin-right: -45px;}
                #mega-menu-wrap-page-sidebar-menu-Arabic #mega-menu-page-sidebar-menu-Arabic > li.mega-menu-item > a.mega-menu-link {text-align: right; }
                <?php } ?>
            </style>
            <?php if(!isset($_REQUEST['Search'])){ ?>
                <div class="col-sm-4 menu-css">
                    <?php
                    if( Language == 'Arabic')
                    {
                        //wp_nav_menu( array( 'theme_location' => 'my-custom-menu', 'menu_class' => 'nav-menu','depth' => 1 , 'sub_menu'  => true ,) );
                        wp_nav_menu( array('theme_location' => 'page-sidebar-menu-Arabic'));
                    }else{
                        // wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu','depth' => 1 , 'sub_menu'  => true ,) );
                        wp_nav_menu( array('theme_location' => 'page-sidebar-menu-English' ));
                    }
                    ?>
                </div>
            <?php } ?>

            <div class="col-sm-<?php if(!isset($_REQUEST['Search'])){ ?>8<?php }else{ ?> 12 <?php } ?>">



                <div class="tour-widget">


                    <?php if( Language == 'Arabic'){ ?>
                        <style>
                            .table {
                                direction: rtl;
                            }

                            .text-left {
                                text-align: right;
                            }
                            .r-tabs ul{direction: rtl; text-align: right;}
                            .r-tabs p{direction: rtl;text-align: right;}
                            .r-tabs h1{direction: rtl;text-align: right;}
                        </style>
                    <?php } ?>

                    <style>
                        .col-sm-9 img {
                            height:200px;
                        }
                    </style>

                    <?php if(isset($_REQUEST['Search']) && $_REQUEST['Search'] != '' )
                    {

                        if( Language == 'Arabic'){ echo '<h1>نتيجة البحث</h1><br>'; }else{ echo '<h1>'.get_the_title().'</h1>'; }

                        get_template_part('template-parts/customsearch' , 'page');

                    } else{?>

                        <style>
                            .entry-title{color: #fff !important; }
                        </style>
                        <?php

                        // Start the loop.

                    while ( have_posts() ) : the_post();

                        // Include the page content template.
                    if(Language != 'Arabic') {
                        echo get_template_part( 'template-parts/content', 'page' );
                    }else{ ?>

                        <style>

                            .entry-content{float: right;}

                        </style>

                        <article id="post-<?php the_ID(); ?>" class="post-<?php the_ID(); ?> page type-page status-publish hentry">
                            <header class="entry-header">
                                <h1 class="entry-title" ><?php arabic_page_title(get_the_ID()); ?></h1>
                            </header>
                            <!-- .entry-header -->


                            <div class="entry-content">
                                <p><?php echo arabic_page_content(get_the_ID()); ?></p>

                            </div>
                            <!-- .entry-content -->

                        </article>



                        <?php
                    }


                        // If comments are open or we have at least one comment, load up the comment template.

                        if ( comments_open() || get_comments_number() ) {

                            comments_template();

                        }



                        // End of the loop.

                    endwhile;

                        ?>


                    <?php } //end else part ?>






                </div>

            </div>

        </div>

    </div>

</section>



<?php get_footer(); ?>
