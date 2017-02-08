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
                        //echo '<pre>';
                        //print_r($_REQUEST);
                        //echo '</pre>';
                        //exit;


                        //$your_destination   = $_REQUEST['your_destination'];
                        $All_Destination    = $_REQUEST['All_Destination'];
                        $All_package        = $_REQUEST['All_package'];
                        $All_duration       = $_REQUEST['All_duration'];
                        $from_date          = $_REQUEST['from_date'];
                        $to_date            = $_REQUEST['to_date'];
                        $price_from         = $_REQUEST['price_from'];
                        $price_to           = $_REQUEST['price_to'];

                        // step 1 - When Customer Search All packages
                        //when All other fields of from empty & user search his All Place
                        //Redirect To the tour Page
                        if( Language == 'Arabic'){ echo '<h1>نتيجة البحث</h1><br>'; }else{ echo '<h1>'.get_the_title().'</h1>'; }

                    if(
                        $All_Destination  == 'all' &&
                        $All_package      == 'all' &&
                        $All_duration     == 'all' &&
                        $from_date        == ''    &&
                        $to_date          == ''    &&
                        $price_from       == ''    &&
                        $price_to         == ''
                    )
                    {
                        $url = get_home_url().'/tour-packages/';
                        ?>
                        <script type="text/javascript">
                            <!--
                            window.location= <?php echo "'" . $url . "'"; ?>;
                            //-->
                        </script>
                    <?php
                    //$url = get_home_url().'/tour-packages/';
                    //wp_redirect($url);
                    //wp_redirect( 'http://dev.virtual-base.com/jawlat/' );
                    //wp_redirect( admin_url( $url ) );
                    //print('<script>window.location.href="'.$url.'"</script>');
                    exit;
                    }else

                        //step 2 When user Search his required City packages
                        //when All other fields of from empty except your_destination
                        //Show Result of the required city package if found

                        if($your_destination != ''    &&
                            $All_Destination  == 'all' &&
                            $All_package      == 'all' &&
                            $All_duration     == 'all' &&
                            $from_date        == ''    &&
                            $to_date          == ''    &&
                            $price_from       == ''    &&
                            $price_to         == ''
                        )
                        {
                            //echo 'your_destination';exit;

                            $post_ids_Array = get_package_id($_REQUEST['your_destination']);

                            if(!empty($post_ids_Array))
                            {
                                foreach ($post_ids_Array as $package)
                                {
                                    echo  '<div class="col-sm-9">';

                                    echo do_shortcode("[tabs id='$package']");
                                    echo '</div>';
                                }

                            }else{

                                echo  '<div class="col-sm-9">';
                                if( Language == 'Arabic'){
                                    echo  '<div class="alert alert-danger" >آسف...! لا جولة الحزم تم العثور عليها </div>';
                                }else{
                                    echo  '<div class="alert alert-danger" >Sorry...! No Tour Packages Found </div>';
                                }
                                echo  '</div>';

                            }
                        }else
                            //step 3 When user Search his required City packages
                            //when All other fields of from empty except your_destination
                            //Show Result of the required city package if found

                            if(
                                $All_Destination  != 'all' &&
                                $All_package      == 'all' &&
                                $All_duration     == 'all' &&
                                $from_date        == ''    &&
                                $to_date          == ''    &&
                                $price_from       == ''    &&
                                $price_to         == ''
                            )
                            {
                                //echo 'All_Destination != "" ';exit;
                                 ?>
                                 <script type="text/javascript">
                                 <!--
                                    window.location= <?php echo "'" . $All_Destination . "'"; ?>;
                                    //-->
                                </script>
                    <?php
                            }else
                                //step 4 When user Search his required City packages
                                //when All other fields of from empty except your_destination
                                //Show Result of the required city package if found

                                if(
                                    $All_Destination  == 'all' &&
                                    $All_package      != 'all' &&
                                    $All_duration     == 'all' &&
                                    $from_date        == ''    &&
                                    $to_date          == ''    &&
                                    $price_from       == ''    &&
                                    $price_to         == ''
                                )
                                {
                                    //echo 'All_package != "" ';exit;

                                    echo  '<div class="col-sm-9">';
                                    $result = get_selected_post_value($All_package);
//                                    echo '<pre>';
//                                    print_r($result);
//                                    echo '</pre>';
                                    if (is_array($result) && !empty($result))
                                    {
                                        foreach ($result as $key => $value)
                                        {
                                            $title = get_the_title($key);
                                            //echo $key.' => '.print_r($value);
                                            $Numberofpackages = 1;
                                            foreach($value as $geturl => $description){
                                            //echo $geturl.' => '.$description;

                                                echo '<div class="col-sm-12 m-b-25 qwe">';
                                                echo '<div class="col-col-9">';
                                            if(Language != 'Arabic'){

                                                echo '<h2 class="m-t-0">';
                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">' .$Numberofpackages .'-'. ucfirst($All_package) . ' Packages for ' . ucfirst($title) .'</a>';
                                                echo '</h2>';
                                                echo '<div class="entry">'.$description. '</div>';
                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';
                                                //echo '<a href="'.$geturl.'" class="alert-link"><h3>' . ucfirst($All_package) . ' Packages for ' . ucfirst($title) .'  '.$description. '</h3></a>';

                                            }else{
                                                if($All_package == 'honeymoon'){ $packages = 'شهر العسل';}elseif($All_package == 'holiday'){ $packages = 'عطلة حزمة';}elseif($All_package == 'family'){ $packages = 'حزمة الأسرة';}

                                                echo '<h2 class="m-t-0">';
                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'.$Numberofpackages  .'-'. $packages . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                echo '</h2><br>';
                                                echo '<div class="entry">'.$description. '</div>';
                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                            }
                                                echo '</div>';
                                                echo '</div>';
                                                $Numberofpackages++;
                                            }
                                        }
                                    }else {


                                        echo '<div class="col-sm-12 m-b-25 qwe">';
                                        echo '<div class="col-col-9">';
                                        echo '<h2 class="m-t-0">';
                                        if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                        '</h2>';
                                        echo '</div>';
                                        echo '</div>';
                                    }

                                    echo '</div>';

                                }else
                                    //step 5 When user Search his required Duration packages
                                    //when All other fields of from empty except Duration
                                    //Show Result of the required city package if found

                                    if(
                                        $All_Destination  == 'all' &&
                                        $All_package      == 'all' &&
                                        $All_duration     != 'all' &&
                                        $from_date        == ''    &&
                                        $to_date          == ''    &&
                                        $price_from       == ''    &&
                                        $price_to         == ''
                                    )
                                    {
                                        //echo 'All_duration != "" ';exit;

                                        $post_ids_Array = get_duration_package_id($All_duration);
                                        //echo $All_duration;
                                        //echo '<pre>';
                                        //print_r($post_ids_Array);
                                        //echo '</pre>';
                                        //die();

                                        if(!empty($post_ids_Array))
                                        {
                                            if (is_array($post_ids_Array)){

                                                foreach ($post_ids_Array as $package) {
                                                    echo '<div class="col-sm-9">';
                                                    echo do_shortcode("[tabs id='$package']");
                                                    echo '</div>';

                                                }
                                            }else{
//                                                echo '<pre>';
//                                                print_r($post_ids_Array);
//                                                echo '</pre>';
//                                                echo 'All_duration != "" ';exit;
                                                echo '<div class="col-sm-9">';
                                                echo do_shortcode("[tabs id='$post_ids_Array']");
                                                echo '</div>';
                                            }

                                        }else{

                                            echo  '<div class="col-sm-9">';
                                            if( Language == 'Arabic'){
                                                echo  '<div class="alert alert-danger" >آسف...! لا جولة الحزم تم العثور عليها </div>';
                                            }else{
                                                echo  '<div class="alert alert-danger" >Sorry...! No Tour Packages Found </div>';
                                            }
                                            echo  '</div>';

                                        }

                                    }
                                    else
                                        //step 6 When user Search his required Date from packages
                                        //when All other fields of from empty except date_from
                                        //Show Result of the required city package if found

                                        if(
                                            $All_Destination  == 'all' &&
                                            $All_package      == 'all' &&
                                            $All_duration     == 'all' &&
                                            $from_date        != ''    &&
                                            $to_date          == ''    &&
                                            $price_from       == ''    &&
                                            $price_to         == ''
                                        )
                                        {
                                            //echo 'from_date != "" ';exit;

                                            $post_ids_Array = get_date_from_package_id($from_date);

                                            if(!empty($post_ids_Array))
                                            {
                                                foreach ($post_ids_Array as $package)
                                                {
                                                    echo  '<div class="col-sm-9">';

                                                    echo do_shortcode('[tabs id="'.$package.'"]');
                                                    echo '</div>';
                                                }

                                            }else{

                                                echo  '<div class="col-sm-9">';
                                                if( Language == 'Arabic'){
                                                    echo  '<div class="alert alert-danger" >آسف...! لا جولة الحزم تم العثور عليها </div>';
                                                }else{
                                                    echo  '<div class="alert alert-danger" >Sorry...! No Tour Packages Found </div>';
                                                }
                                                echo  '</div>';

                                            }

                                        }else
                                            //step 7 When user Search his required Date from packages
                                            //when All other fields of from empty except date_to
                                            //Show Result of the required city package if found

                                            if(
                                                $All_Destination  == 'all' &&
                                                $All_package      == 'all' &&
                                                $All_duration     == 'all' &&
                                                $from_date        == ''    &&
                                                $to_date          != ''    &&
                                                $price_from       == ''    &&
                                                $price_to         == ''
                                            )
                                            {
                                                //echo 'from_date != "" ';exit;

                                                $post_ids_Array = get_date_to_package_id($to_date);

                                                if(!empty($post_ids_Array))
                                                {
                                                    foreach ($post_ids_Array as $package)
                                                    {
                                                        echo  '<div class="col-sm-9">';

                                                        echo do_shortcode("[tabs id='$package']");
                                                        echo '</div>';
                                                    }

                                                }else{

                                                    echo  '<div class="col-sm-9">';
                                                    if( Language == 'Arabic'){
                                                        echo  '<div class="alert alert-danger" >آسف...! لا جولة الحزم تم العثور عليها </div>';
                                                    }else{
                                                        echo  '<div class="alert alert-danger" >Sorry...! No Tour Packages Found </div>';
                                                    }
                                                    echo  '</div>';

                                                }

                                            }else
                                                //step 8 When user Search his required Price from packages
                                                //when All other fields of from empty except price_from
                                                //Show Result of the required city package if found

                                                if(
                                                    $All_Destination  == 'all' &&
                                                    $All_package      == 'all' &&
                                                    $All_duration     == 'all' &&
                                                    $from_date        == ''    &&
                                                    $to_date          == ''    &&
                                                    $price_from       != ''    &&
                                                    $price_to         == ''
                                                )
                                                { ?>

                                                    <?php


                                                    $post_ids_Array = get_price_from_package_id($price_from);
//                                                            echo '<pre>';
//                                                            print_r($post_ids_Array);
//                                                            echo '</pre>';


                                                    if (is_array($post_ids_Array) || is_object($post_ids_Array))
                                                    {
                                                        echo  '<div class="col-sm-9">';
                                                        for($i = 0 ; $i < sizeof($post_ids_Array) ; $i++)
                                                        {  $id = '"'.$post_ids_Array[$i].'"';

                                                            echo do_shortcode('[tabs id='.$id.']');

                                                            echo '<br>';

                                                        }
                                                        echo '</div>';


                                                    }else{

                                                        echo  '<div class="col-sm-9">';
                                                        if( Language == 'Arabic'){
                                                            echo  '<div class="alert alert-danger" >آسف...! لا جولة الحزم تم العثور عليها </div>';
                                                        }else{
                                                            echo  '<div class="alert alert-danger" >Sorry...! No Tour Packages Found </div>';
                                                        }
                                                        echo  '</div>';

                                                    }

                                                }else
                                                    //step 9 When user Search his required Price to packages
                                                    //when All other fields of from empty except price_to
                                                    //Show Result of the required city package if found

                                                    if(
                                                        $All_Destination  == 'all' &&
                                                        $All_package      == 'all' &&
                                                        $All_duration     == 'all' &&
                                                        $from_date        == ''    &&
                                                        $to_date          == ''    &&
                                                        $price_from       == ''    &&
                                                        $price_to         != ''
                                                    )
                                                    {
                                                        //echo 'price_from != "" '.$price_from;exit;

                                                        $post_ids_Array = get_price_to_package_id($price_to);
                                                        //echo $post_ids_Array;exit;
                                                        if (is_array($post_ids_Array) || is_object($post_ids_Array))
                                                        {
                                                            echo  '<div class="col-sm-9">';
                                                            for($i = 0 ; $i < sizeof($post_ids_Array) ; $i++)
                                                            {  $id = '"'.$post_ids_Array[$i].'"';

                                                                echo do_shortcode('[tabs id='.$id.']');

                                                                echo '<br>';

                                                            }
                                                            echo '</div>';


                                                        }else{

                                                            echo  '<div class="col-sm-9">';
                                                            if( Language == 'Arabic'){
                                                                echo  '<div class="alert alert-danger" >آسف...! لا جولة الحزم تم العثور عليها </div>';
                                                            }else{
                                                                echo  '<div class="alert alert-danger" >Sorry...! No Tour Packages Found </div>';
                                                            }
                                                            echo  '</div>';

                                                        }

                                                    }else
                                                        //step 10 When user Search his required date fro To end date(to_date)  packages
                                                        //when All other fields  empty except from date & to date
                                                        //Show Result of the required city package if found

                                                        if(
                                                            $All_Destination  == 'all' &&
                                                            $All_package      == 'all' &&
                                                            $All_duration     == 'all' &&
                                                            $from_date        != ''    &&
                                                            $to_date          != ''    &&
                                                            $price_from       == ''    &&
                                                            $price_to         == ''
                                                        )
                                                        {

                                                            $post_ids_Array = get_between_date_package_id($from_date , $to_date);
                                                            if(!empty($post_ids_Array))
                                                            {
                                                                foreach ($post_ids_Array as $package)
                                                                {
                                                                    echo  '<div class="col-sm-9">';

                                                                    echo do_shortcode("[tabs id='$package']");
                                                                    echo '</div>';
                                                                }

                                                            }else{

                                                                echo  '<div class="col-sm-9">';
                                                                if( Language == 'Arabic'){
                                                                    echo  '<div class="alert alert-danger" >آسف...! لا جولة الحزم تم العثور عليها </div>';
                                                                }else{
                                                                    echo  '<div class="alert alert-danger" >Sorry...! No Tour Packages Found </div>';
                                                                }
                                                                echo  '</div>';

                                                            }

                                                        }else
                                                            //step 11 When user Search his required price from To end price(to_price)  packages
                                                            //when All other fields  empty except from price & to price
                                                            //Show Result of the required city package if found

                                                            if(
                                                                $All_Destination  == 'all' &&
                                                                $All_package      == 'all' &&
                                                                $All_duration     == 'all' &&
                                                                $from_date        == ''    &&
                                                                $to_date          == ''    &&
                                                                $price_from       != ''    &&
                                                                $price_to         != ''
                                                            )
                                                            {

                                                                $post_ids_Array = get_between_price_package_id($price_from , $price_to);

                                                                if(!empty($post_ids_Array))
                                                                {
                                                                    foreach ($post_ids_Array as $package)
                                                                    {
                                                                        echo  '<div class="col-sm-9">';

                                                                        echo do_shortcode("[tabs id='$package']");
                                                                        echo '</div>';
                                                                    }

                                                                }else{

                                                                    echo  '<div class="col-sm-9">';
                                                                    if( Language == 'Arabic'){
                                                                        echo  '<div class="alert alert-danger" >آسف...! لا جولة الحزم تم العثور عليها </div>';
                                                                    }else{
                                                                        echo  '<div class="alert alert-danger" >Sorry...! No Tour Packages Found </div>';
                                                                    }
                                                                    echo  '</div>';

                                                                }

                                                            }else{
                                                                //step 12 else Part


                                                                echo  '<div class="col-sm-9">';
                                                                if( Language == 'Arabic'){
                                                                    echo  '<div class="alert alert-danger" >آسف...! لا جولة الحزم تم العثور عليها </div>';
                                                                }else{
                                                                    echo  '<div class="alert alert-danger" >Sorry...! No Tour Packages Found </div>';
                                                                }

                                                                echo  '</div>';

                                                            }




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
