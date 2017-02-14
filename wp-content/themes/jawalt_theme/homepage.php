<?php /* Template Name: Home Page */get_header(); ?>
<style>
    .m-t-10 {
        margin-top: 10px !important;
    }


    .attachment-post-thumbnail{width:340px; height: 270px;}
</style>
<div class="content">
    <section class="slider"> <?php echo do_shortcode("[huge_it_slider id='1']"); ?> </section>



    <section class="travel">

        <div class="inner-container">

            <div class="row">

                <div class="col-sm-12">

                    <h2 >
                        <?php
                        if( Language != 'Arabic'){
                            echo homepage_content_title('packageheading' , 'post_title');
                        }else{
                            echo homepage_content_title('packageheading' , 'post_excerpt');
                        }
                        ?>
                    </h2>

                </div>

            </div>

            <div class="row ">

                <?php
                $CountDiv = 1;
                $home_query = new WP_Query('showposts=4');
                if ( $home_query -> have_posts() ) : while ( $home_query -> have_posts() ) : $home_query -> the_post();


                    ?>

                    <div class="col-sm-3">
                        <div class="Package-margin">
                            <div class=" travel-box-<?php echo $CountDiv; ?> row-main">
                                <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
                                    <div class="travel-image">
                                        <?php the_post_thumbnail(); ?>

                                        <div class="hidden-image">
                                            <div class="entry">
                                                <?php if( Language != 'Arabic')
                                                {
                                                    echo excerpt(150); //the_excerpt();
                                                }else{
                                                    echo my_excerpt(80 , get_the_ID()); //echo get_post_excerpt_arabic(get_the_ID());
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <!-- Display the Title as a link to the Post's permalink. -->
                                <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
                                    <h3 class="travel-anchor">
                                        <?php if( Language != 'Arabic'){ the_title(); }else{ echo get_post_title_arabic(get_the_ID()); } ?>
                                    </h3>

                                </a>
                            </div>
                        </div>
                    </div>

                <?php $CountDiv++; endwhile; ?>

                <?php endif; ?>

            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="line">
<!--                        <img src="--><?php //bloginfo('template_directory'); ?><!--/images/line.png"> -->
                    </div>
                </div>
            </div>

        </div>

    </section>








    <section class="map">
        <div class="map-container2">
            <?php
            if ( shortcode_exists( 'mm_map' ) ){
                echo do_shortcode('[mm_map]');
            }
            ?>
        </div>
    </section>



    <section class="accordion" style="background-color:#8ebce8;">
        <div class="accordion-container">
            <div class="row">

                <?php
                for ($count = 0 ; $count < 3 ; $count++)
                {
                    ?>
                <div class="col-md-6 col-lg-4">
                    <article class="card accordion-card">
                        <header2>
                            <h3 class="section-title">Explore <?php echo get_categories()[$count]->name ?> !</h3>
                        </header2>
                        <div class="accordion-panel">
                            <div class="panel-group" id="accordion-<?php echo $count ?>" role="tablist" aria-multiselectable="true">
                                <?php

                                $cate_slug = get_categories()[$count]->slug;

                                //echo get_category_link( get_categories()[$count]->cat_ID ).'<br>';
                                $args = array(
                                    'posts_per_page'   => 3,
                                    'offset'           => 0,
                                    'category'         => '',
                                    'category_name'    => $cate_slug,
                                    'orderby'          => 'rand',
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

                                $CountAccordion = 1;
                                foreach ( $myposts as $post ) : setup_postdata( $post );
                                    ?>
                                <!-- Guide Panel -->
                                <div class="panel panel-default" style="background-image: url(<?php echo  get_the_post_thumbnail_url(); ?>)">
                                    <div id="collapse-<?php echo $count ?>-<?php echo $CountAccordion; ?>" class="panel-collapse collapse <?php if($CountAccordion ==1){ ?> in <?php } ?>" role="tabpanel" aria-labelledby="heading-<?php echo $count ?>-<?php echo $CountAccordion; ?>">
                                        <a href="<?php the_permalink(); ?>">
                                            <div class="panel-body">
                                                <div class="read-more">Details <i class="fa fa-arrow-right"></i></div>
                                                <div class="spacer"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <a data-toggle="collapse" data-parent="#accordion-<?php echo $count ?>" href="#collapse-<?php echo $count ?>-<?php echo $CountAccordion; ?>" aria-expanded="<?php if($CountAccordion ==1){ ?>true <?php }else{ ?>false <?php } ?>" aria-controls="collapse-<?php echo $count ?>-<?php echo $CountAccordion; ?>" class="">
                                        <div class="panel-heading" role="tab" id="heading-<?php echo $count ?>-<?php echo $CountAccordion; ?>">
                                            <div class="panel-icon">
                                                <i class="fa fa-map-marker"></i>
                                            </div>
                                            <h4 class="panel-title">

                                                <?php if( Language != 'Arabic'){ the_title(); }else{ echo get_post_title_arabic(get_the_ID()); } ?>
                                            </h4>
                                            <ul class="hierarchy">
                                                <li><?php echo get_categories()[$count]->name; ?></li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                              <?php
                                    $CountAccordion++;
                                endforeach;
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div> <!-- /.accordion-panel -->
                        <footer><a href="<?php echo get_home_url().'/tour-packages/'; ?>">Find More &nbsp; <i class="fa fa-arrow-right"></i></a></footer>
                    </article> <!-- /.accordion-card -->
                </div>

<?php } ?>

            </div> <!-- /.row -->
        </div>
    </section>







    <!--- CUstom Search option Created -->
    <section class="search" >
        <div class="container search-container2">

            <div class="search_option">
                <div class="container-fluid">
                    <?php
                    if(Language == 'Arabic')
                    {


//                        echo '<pre>';
//                        print_r(get_destination_arabic());
//                        echo '</pre';
                        //get_template_part( 'template-parts/search_form_arabic', 'page' );							?>
                        <h2>بحث</h2>
                        <div class="row">
                            <form id="test" action="search/" method="get">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="disabledTextInput">جميع دراسات الرموز</label>
                                        <select name="All_package" class="form-control"  >
                                            <option value="all" >جميع دراسات الرموز</option>
                                            <option value="honeymoon" >باقة شهر العسل</option>
                                            <option value="holiday" >عطلة حزمة</option>
                                            <option value="family" >حزمة الأسرة</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="disabledTextInput">جميع الوجهات</label>
                                        <select name="All_Destination" class="form-control"  >
                                            <option value="all" >جميع الوجهات</option>
                                            <?php

                                            foreach (get_destination_arabic() as $place) {
                                                $destination_explode = ( explode( "_", $place->destination ) );
                                                $city                = $destination_explode[0];
                                                $url                 = $destination_explode[1];

                                                ?>
                                                <option value="<?php  if(strpos($destination_explode[0], 'http://') !== false){ echo $destination_explode[0]; }else{echo $destination_explode[1];} ?>" >
                                                    <?php if (strpos($destination_explode[0], 'http://') !== false){ echo $destination_explode[1]; }else{echo $destination_explode[0];}; ?>
                                                </option>
                                            <?php }	?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="disabledTextInput">كل مدة</label>
                                        <select name="All_duration" class="form-control"  >
                                            <option value="all" >كل مدة</option>
                                            <option value="3" >1 - 3 أيام</option>
                                            <option value="6" >4 - 6 أيام</option>
                                            <option value="9" >7 - 9 أيام</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="disabledTextInput">تاريخ ل</label>
                                        <input type="date" min="<?php echo date('Y-m-d', strtotime('+1 year')); ?>"   name="to_date" value=""  class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="disabledTextInput"> التاريخ من</label>
                                        <input type="date"   name="from_date" value="" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group col-sm-6">
                                        <label for="disabledTextInput">السعر إلى</label>
                                        <input type="text"  name="price_to" value=""  class="form-control " placeholder="السعر يبدأ من">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="disabledTextInput">السعر يبدأ من</label>
                                        <input type="text"  name="price_from" value="" class="form-control " placeholder="السعر يبدأ من">
                                    </div>
                                </div>


                                <div class="col-sm-4"></div> <div class="col-sm-4"></div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="disabledTextInput">&nbsp;</label>
                                        <input type="submit"  class="btn btn-primary" name="Search" value="بحث">
                                    </div>
                                </div>

                            </form>
                        </div>
                    <?php						}else{							//get_template_part( 'template-parts/search_form_english', 'page' );							?>
                    <h2>Search</h2>
                    <div class="row">
                        <form id="test" action="search/" method="get">

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="disabledTextInput">All Destination</label>
                                    <select name="All_Destination" class="form-control"  >
                                        <option value="all" >All Destination</option>
                                        <?php
                                        $home_query = new WP_Query('showposts=20');
                                        if ( $home_query -> have_posts() ) : while ( $home_query -> have_posts() ) : $home_query -> the_post(); ?>
                                            <option value="<?php the_permalink() ?>" ><?php the_title() ?></option>
                                            <?php
                                        endwhile;
                                        endif;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="disabledTextInput">All Typologies</label>
                                    <select name="All_package" class="form-control"  >
                                        <option value="all" >All Typologies</option>
                                        <option value="honeymoon" >HonyMoon Package</option>
                                        <option value="holiday" >Holiday Package</option>
                                        <option value="family" >Familys Package</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="disabledTextInput">All Duration</label>
                                    <select name="All_duration" class="form-control"  >
                                        <option value="all" >All Duration</option>
                                        <option value="3" >1 - 3 Days</option>
                                        <option value="6" >4 - 6 Days</option>
                                        <option value="9" >7 - 9 Days</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="disabledTextInput">Date From </label>
                                    <input type="date"  name="from_date" value="" class="form-control" >
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="disabledTextInput">Date To  </label>
                                    <input type="date"  name="to_date" value=""  min="<?php echo date('Y-m-d', strtotime('+1 year')); ?>"   class="form-control">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group col-sm-6">
                                    <label for="disabledTextInput">Price From </label>
                                    <input type="text"  name="price_from" value="" class="form-control " placeholder="Price From">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="disabledTextInput">Price To </label>
                                    <input type="text"  name="price_to" value=""  class="form-control " placeholder="Price To">
                                </div>
                            </div>
                    </div>
                    <div class="col-sm-4"></div><div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="disabledTextInput">&nbsp;</label>
                            <input type="submit"  class="btn btn-primary  pull-right" name="Search" value="Search">
                        </div>
                    </div>

                    </form>
                </div>
                <?php } ?>
            </div>
        </div>
</div>
</section>
<!---End of CUstom Search option Create By Amir-->
<section class="tour inner-container2">
    <div class="inner-container">
        <div class="row">
            <div class="col-sm-4">


                <div class="tour-widget">
                    <h2 style="color:#ffffff;">
                        <?php if(Language == 'Arabic'){ ?> أخبار <?php }else{?> News <?php } ?>
                    </h2>
                    <div class="main-tour">
                        <div class="inner-tour">
                            <?php $args=array('post_type' => 'news','post_status' => 'publish',	'posts_per_page' => 4,'caller_get_posts'=> 1									);									$my_query = null;									$my_query = new WP_Query($args);									?>
                            <ul>
                                <?php	if( $my_query->have_posts() )
                                {
                                while ($my_query->have_posts()) : $my_query->the_post(); ?>
                                    <?php if(Language == 'Arabic'){echo get_news_title_arabic(get_the_ID());
                                    }else{
                                        ?>
                                        <h4>
                                            <?php the_title(); ?>
                                        </h4>
                                    <?php } ?>
                                    <div class="entry">

                                        <?php
                                        if(Language == 'Arabic'){ ?>
                                            <style>
                                                .entry img{
                                                    height: 70px;
                                                    width: 265px;
                                                }
                                            </style>
                                            <?php echo substr(get_news_text_arabic(get_the_ID()), 0, 190); ?>
                                        <?php }else{?>
                                            <?php the_excerpt(); ?>
                                        <?php } ?>
                                    </div>
                                    <a href="<?php echo  the_permalink(); ?>" class="m-t-10">
                                        <?php if(Language == 'Arabic'){ ?>  شاهد المزيد <?php }else{?> view more<?php } ?>
                                    </a>
                                    <?php	if(Language == 'Arabic'){ echo '<br>'; }
                                endwhile;
                                ?>
                            </ul>
                        <?php
                        } else { echo "No such posts";}
                        wp_reset_query();  // Restore global post data stomped by the_post().
                        ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="tour-widget tour-widget-points">
                    <?php if( Language != 'Arabic'){ ?>
                        <h1><?php echo homepage_content_title('englishcontent' , 'post_title'); ?></h1>

                        <?php echo homepage_content_title('englishcontent' , 'post_content'); ?>

                    <?php }else{ ?>
                        <h1><?php echo homepage_content_title('arabiccontent' , 'post_title'); ?></h1>

                        <?php echo homepage_content_title('arabiccontent' , 'post_content'); ?>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="promotion">
    <div class="inner-container">
        <div class="row">
            <div class="col-sm-12">
                <h2>
                    <?php if( Language != 'Arabic'){ ?>
                        Latest Promotions
                    <?php }else{ ?>
                        أحدث الترقيات
                    <?php } ?>
                </h2>
            </div>
        </div>
        <div class="row">
            <ul>
                <?php
                $posts_get = latest_promotion_post();
                if( $posts_get->have_posts() )
                {

                    while ($posts_get->have_posts()) : $posts_get->the_post(); ?>

                        <div class="col-sm-3 arabic_right" >
                        <div class="promotion-widget">
                            <div class="promotion-image img_radius">
                                <?php the_post_thumbnail(); ?>
                            </div>
                            <a class="latest" href="<?php echo get_the_permalink(get_the_ID()); ?>" target="_blank" >
                                <?php if( Language != 'Arabic'){ ?>
                                    <h4>Special Package For
                                        <?php the_title(); ?>
                                    </h4>
                                <?php }else{ ?>
                                    <h4> حزمة خاصة ل <?php echo get_post_title_arabic(get_the_ID());  ?></h4>
                                <?php } ?>
                            </a> </div>
                    </div>
                <?php
                    endwhile;
                } else { echo "No such posts";}
                wp_reset_query();  // Restore global post data stomped by the_post().						?>
            </ul>
        </div>
    </div>
</section>
</div>
<?php get_footer(); ?>
