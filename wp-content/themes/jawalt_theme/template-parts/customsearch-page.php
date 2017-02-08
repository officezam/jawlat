<?php

echo '<pre>';
print_r($_REQUEST);
echo '</pre>';

if(Language == 'Arabic'){$ArrowDirection = 'left';}else{$ArrowDirection = 'right';}

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
if(
    $All_Destination  == 'all' &&
    $All_package      == 'all' &&
    $All_duration     == 'all' &&
    $from_date        == ''    &&
    $to_date          == ''    &&
    $price_from       == ''    &&
    $price_to         == ''
){
    $url = get_home_url().'/tour-packages/';
    ?>
    <script type="text/javascript"> window.location= <?php echo "'" . $url . "'"; ?>; </script>

    <?php

}else

    //step 2 When user Search his required City packages
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
            <script type="text/javascript"> window.location= <?php echo "'" . $All_Destination . "'"; ?>;</script>
     <?php
        }else
            //step 3 When user Search his required City packages
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

                        foreach($value as $geturl => $description){
                            //echo $geturl.' => '.$description;

                            echo '<div class="col-sm-12 m-b-25 qwe">';
                            echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                            echo '<div class="col-col-9">';
                            if(Language != 'Arabic'){

                                echo '<h2 class="m-t-0">';
                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($All_package) . ' Packages for ' . ucfirst($title) .'</a>';
                                echo '</h2>';
                                echo '<div class="entry">'.$description. '</div>';
                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';
                                //echo '<a href="'.$geturl.'" class="alert-link"><h3>' . ucfirst($All_package) . ' Packages for ' . ucfirst($title) .'  '.$description. '</h3></a>';

                            }else{
                                if($All_package == 'honeymoon'){ $packages = 'شهر العسل';}elseif($All_package == 'holiday'){ $packages = 'عطلة حزمة';}elseif($All_package == 'family'){ $packages = 'حزمة الأسرة';}

                                echo '<h2 class="m-t-0">';
                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $packages . ' حزم إلى ' . ucfirst($title) .'</a>';
                                echo '</h2><br>';
                                echo '<div class="entry">'.$description. '</div>';
                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                            }
                            echo '</div>';
                            echo '</div>';
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
                //step 4 When user Search his required Duration packages
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

                    echo  '<div class="col-sm-9">';
                    $post_ids_Array = get_duration_package_id($All_duration);

                    if (is_array($post_ids_Array) && !empty($post_ids_Array))
                    {
                        foreach ($post_ids_Array as $key => $value)
                        {
                            $title = get_the_title($key);
                            foreach($value as $geturl => $description)
                            {

                                echo '<div class="col-sm-12 m-b-25 qwe">';
                                echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                echo '<div class="col-col-9">';
                                if(Language != 'Arabic')
                                {

                                    if($All_duration == 3){ $days = '1 - 3 Days';}
                                    if($All_duration == 6){ $days = '4 - 6 Days';}
                                    if($All_duration == 9){ $days = '7 - 9 Days';}

                                    echo '<h2 class="m-t-0">';
                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                    echo '</h2>';
                                    echo '<div class="entry">'.$description. '</div>';
                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                }else{

                                    if($All_duration == 3){ $days = '1 - 3 أيام';}
                                    if($All_duration == 6){ $days = '4 - 6 أيام';}
                                    if($All_duration == 9){ $days = '7 - 9 أيام';}


                                    echo '<h2 class="m-t-0">';
                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                    echo '</h2><br>';
                                    echo '<div class="entry">'.$description. '</div>';
                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                }
                                echo '</div>';
                                echo '</div>';
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
                }
                else
                    //step 5 When user Search his required Date from packages
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
                       // echo 'from_date != "" ';exit;
                        echo  '<div class="col-sm-9">';
                        $post_ids_Array = get_date_from_package_id($from_date);
//
//                        echo '<pre>';
//                        print_r($post_ids_Array);
//                        echo '</pre>';
                        if (is_array($post_ids_Array) && !empty($post_ids_Array))
                        {
                            foreach ($post_ids_Array as $key => $value)
                            {
                                $title = get_the_title($key);
                                //echo $key.' => '.print_r($value);
                                foreach($value as $geturl => $description)
                                {
                                    //echo $geturl.' => '.$description;

                                    echo '<div class="col-sm-12 m-b-25 qwe">';
                                    echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                    echo '<div class="col-col-9">';
                                    if(Language != 'Arabic')
                                    {

                                         $days = 'From Date';


                                        echo '<h2 class="m-t-0">';
                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                        echo '</h2>';
                                        echo '<div class="entry">'.$description. '</div>';
                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                    }else{

                                        $days = 'من التاريخ';


                                        echo '<h2 class="m-t-0">';
                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                        echo '</h2><br>';
                                        echo '<div class="entry">'.$description. '</div>';
                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                    }
                                    echo '</div>';
                                    echo '</div>';
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
                        //step 6 When user Search his required Date from packages
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
                            ///echo 'to_date != "" ';exit;

                            $post_ids_Array = get_date_to_package_id($to_date);
                            echo  '<div class="col-sm-9">';
                            if (is_array($post_ids_Array) && !empty($post_ids_Array))
                            {
                                foreach ($post_ids_Array as $key => $value)
                                {
                                    $title = get_the_title($key);
                                    //echo $key.' => '.print_r($value);
                                    foreach($value as $geturl => $description)
                                    {
                                        //echo $geturl.' => '.$description;

                                        echo '<div class="col-sm-12 m-b-25 qwe">';
                                        echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                        echo '<div class="col-col-9">';
                                        if(Language != 'Arabic')
                                        {

                                            $days = 'To Date';


                                            echo '<h2 class="m-t-0">';
                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                            echo '</h2>';
                                            echo '<div class="entry">'.$description. '</div>';
                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                        }else{

                                            $days = 'ان يذهب في موعد';


                                            echo '<h2 class="m-t-0">';
                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                            echo '</h2><br>';
                                            echo '<div class="entry">'.$description. '</div>';
                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                        }
                                        echo '</div>';
                                        echo '</div>';
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

                            echo  '</div>';
                        }else
                            //step 7 When user Search his required Price from packages
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
//                                echo '<pre>';
//                                print_r($post_ids_Array);
//                                echo '</pre>';

                                echo  '<div class="col-sm-9">';
                                if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                {
                                    foreach ($post_ids_Array as $key => $value)
                                    {
                                        $title = get_the_title($key);
                                        //echo $key.' => '.print_r($value);
                                        foreach($value as $geturl => $description)
                                        {
                                            //echo $geturl.' => '.$description;

                                            echo '<div class="col-sm-12 m-b-25 qwe">';
                                            echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                            echo '<div class="col-col-9">';
                                            if(Language != 'Arabic')
                                            {

                                                $days = 'From Price';

                                                echo '<h2 class="m-t-0">';
                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                echo '</h2>';
                                                echo '<div class="entry">'.$description. '</div>';
                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                            }else{

                                                $days = 'من الأسعار';


                                                echo '<h2 class="m-t-0">';
                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                echo '</h2><br>';
                                                echo '<div class="entry">'.$description. '</div>';
                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                            }
                                            echo '</div>';
                                            echo '</div>';
                                        }
                                    }

                                }else{
                                    echo '<div class="col-sm-12 m-b-25 qwe">';
                                    echo '<div class="col-col-9">';
                                    echo '<h2 class="m-t-0">';
                                    if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                    '</h2>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                                echo  '</div>';
                            }else
                                //step 8 When user Search his required Price to packages
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
                                    echo  '<div class="col-sm-9">';
                                    if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                    {
                                        foreach ($post_ids_Array as $key => $value)
                                        {
                                            $title = get_the_title($key);
                                            //echo $key.' => '.print_r($value);
                                            foreach($value as $geturl => $description)
                                            {
                                                //echo $geturl.' => '.$description;

                                                echo '<div class="col-sm-12 m-b-25 qwe">';
                                                echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                echo '<div class="col-col-9">';
                                                if(Language != 'Arabic')
                                                {

                                                    $days = 'To Price';

                                                    echo '<h2 class="m-t-0">';
                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                    echo '</h2>';
                                                    echo '<div class="entry">'.$description. '</div>';
                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                }else{

                                                    $days = 'إلى السعر';


                                                    echo '<h2 class="m-t-0">';
                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                    echo '</h2><br>';
                                                    echo '<div class="entry">'.$description. '</div>';
                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                }
                                                echo '</div>';
                                                echo '</div>';
                                            }
                                        }

                                    }else{
                                        echo '<div class="col-sm-12 m-b-25 qwe">';
                                        echo '<div class="col-col-9">';
                                        echo '<h2 class="m-t-0">';
                                        if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                        '</h2>';
                                        echo '</div>';
                                        echo '</div>';
                                    }
                                    echo  '</div>';
                                }else
                                    //step 9 When user Search his required date from To end date(to_date)  packages
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
                                       // echo 'Both Date From & Date To';exit;
                                        $post_ids_Array = get_between_date_package_id($from_date , $to_date);
                                        echo  '<div class="col-sm-9">';
                                        if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                        {
                                            foreach ($post_ids_Array as $key => $value)
                                            {
                                                $title = get_the_title($key);
                                                foreach($value as $geturl => $description)
                                                {

                                                    echo '<div class="col-sm-12 m-b-25 qwe">';
                                                    echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                    echo '<div class="col-col-9">';
                                                    if(Language != 'Arabic')
                                                    {

                                                        $days = 'Between Two Dates';
                                                        echo '<h2 class="m-t-0">';
                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                        echo '</h2>';
                                                        echo '<div class="entry">'.$description. '</div>';
                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                    }else{

                                                        $days = 'بين تاريخين';


                                                        echo '<h2 class="m-t-0">';
                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                        echo '</h2><br>';
                                                        echo '<div class="entry">'.$description. '</div>';
                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                    }
                                                    echo '</div>';
                                                    echo '</div>';
                                                }
                                            }

                                        }else{
                                            echo '<div class="col-sm-12 m-b-25 qwe">';
                                            echo '<div class="col-col-9">';
                                            echo '<h2 class="m-t-0">';
                                            if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                            '</h2>';
                                            echo '</div>';
                                            echo '</div>';
                                        }
                                        echo  '</div>';

                                    }else
                                        //step 10 When user Search his required price from To end price(to_price)  packages
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


                                            //echo 'Both Price From & Price To';exit;

                                            $post_ids_Array = get_between_price_package_id($price_from , $price_to);

                                            echo  '<div class="col-sm-9">';
                                            if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                            {
                                                foreach ($post_ids_Array as $key => $value)
                                                {
                                                    $title = get_the_title($key);
                                                    foreach($value as $geturl => $description)
                                                    {
                                                        echo '<div class="col-sm-12 m-b-25 qwe">';
                                                        echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                        echo '<div class="col-col-9">';
                                                        if(Language != 'Arabic')
                                                        {
                                                            $days = 'Between Two Prices';
                                                            echo '<h2 class="m-t-0">';
                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                            echo '</h2>';
                                                            echo '<div class="entry">'.$description. '</div>';
                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                        }else{
                                                            $days = 'بين اثنين من الأسعار';
                                                            echo '<h2 class="m-t-0">';
                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                            echo '</h2><br>';
                                                            echo '<div class="entry">'.$description. '</div>';
                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                        }
                                                        echo '</div>';
                                                        echo '</div>';
                                                    }
                                                }

                                            }else{
                                                echo '<div class="col-sm-12 m-b-25 qwe">';
                                                echo '<div class="col-col-9">';
                                                echo '<h2 class="m-t-0">';
                                                if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                '</h2>';
                                                echo '</div>';
                                                echo '</div>';
                                            }
                                            echo  '</div>';

                                        }else



                                            //step 11 When user Search his required city +  packages
                                            //when All other fields  empty except city And  packages
                                            //Show Result of the required Tabs package if found

                                            if(
                                                $All_Destination  != 'all' &&
                                                $All_package      != 'all' &&
                                                $All_duration     == 'all' &&
                                                $from_date        == ''    &&
                                                $to_date          == ''    &&
                                                $price_from       == ''    &&
                                                $price_to         == ''
                                            )
                                            {
                                                //echo 'Both City & Package';exit;
                                                $post_ids_Array = City_plus_Package($All_Destination , $All_package);

                                                echo  '<div class="col-sm-9">';
                                                if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                {
                                                    foreach ($post_ids_Array as $key => $value)
                                                    {
                                                        $title = get_the_title($key);
                                                        foreach($value as $geturl => $description)
                                                        {
                                                            echo '<div class="col-sm-12 m-b-25 qwe">';
                                                            echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                            echo '<div class="col-col-9">';
                                                            if(Language != 'Arabic')
                                                            {
                                                                $days = 'City & Package';
                                                                echo '<h2 class="m-t-0">';
                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                echo '</h2>';
                                                                echo '<div class="entry">'.$description. '</div>';
                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                            }else{
                                                                $days = 'المدينة وحزمة';
                                                                echo '<h2 class="m-t-0">';
                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                echo '</h2><br>';
                                                                echo '<div class="entry">'.$description. '</div>';
                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                            }
                                                            echo '</div>';
                                                            echo '</div>';
                                                        }
                                                    }

                                                }else{
                                                    echo '<div class="col-sm-12 m-b-25 qwe">';
                                                    echo '<div class="col-col-9">';
                                                    echo '<h2 class="m-t-0">';
                                                    if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                    '</h2>';
                                                    echo '</div>';
                                                    echo '</div>';
                                                }
                                                echo  '</div>';

                                            }else

                                                //step 12 When user Search his required city +  duration
                                                //when All other fields  empty except city And  duration
                                                //Show Result of the required Tabs package if found

                                                if(
                                                    $All_Destination  != 'all' &&
                                                    $All_package      == 'all' &&
                                                    $All_duration     != 'all' &&
                                                    $from_date        == ''    &&
                                                    $to_date          == ''    &&
                                                    $price_from       == ''    &&
                                                    $price_to         == ''
                                                )
                                                {
                                                    //echo 'Both City & duration';exit;
                                                    $post_ids_Array = City_plus_duration($All_Destination , $All_duration);

//                                                    echo '<pre>';
//                                                    print_r($post_ids_Array);
//                                                    echo '<pre>';
                                                    echo  '<div class="col-sm-9">';
                                                    if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                    {
                                                        foreach ($post_ids_Array as $key => $value)
                                                        {
                                                            $title = get_the_title($key);
                                                            foreach($value as $geturl => $description)
                                                            {
                                                                echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                echo '<div class="col-col-9">';
                                                                if(Language != 'Arabic')
                                                                {
                                                                    $days = 'City & Duration';
                                                                    echo '<h2 class="m-t-0">';
                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                    echo '</h2>';
                                                                    echo '<div class="entry">'.$description. '</div>';
                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                }else{
                                                                    $days = 'المدينة ومدة';
                                                                    echo '<h2 class="m-t-0">';
                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                    echo '</h2><br>';
                                                                    echo '<div class="entry">'.$description. '</div>';
                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                }
                                                                echo '</div>';
                                                                echo '</div>';
                                                            }
                                                        }

                                                    }else{
                                                        echo '<div class="col-sm-12 m-b-25 qwe">';
                                                        echo '<div class="col-col-9">';
                                                        echo '<h2 class="m-t-0">';
                                                        if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                        '</h2>';
                                                        echo '</div>';
                                                        echo '</div>';
                                                    }
                                                    echo  '</div>';

                                                }else
                                                    //step 13 When user Search his required city +  From Date
                                                    //when All other fields  empty except city And  From Date
                                                    //Show Result of the required Tabs package if found

                                                    if(
                                                        $All_Destination  != 'all' &&
                                                        $All_package      == 'all' &&
                                                        $All_duration     == 'all' &&
                                                        $from_date        != ''    &&
                                                        $to_date          == ''    &&
                                                        $price_from       == ''    &&
                                                        $price_to         == ''
                                                    )
                                                    {
                                                        //echo 'Both  city +  From Date';exit;
                                                        $post_ids_Array = City_plus_FromDate($All_Destination , $from_date);

                                                        echo  '<div class="col-sm-9">';
                                                        if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                        {
                                                            foreach ($post_ids_Array as $key => $value)
                                                            {
                                                                $title = get_the_title($key);
                                                                foreach($value as $geturl => $description)
                                                                {
                                                                    echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                    echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                    echo '<div class="col-col-9">';
                                                                    if(Language != 'Arabic')
                                                                    {
                                                                        $days = 'City & From Date';
                                                                        echo '<h2 class="m-t-0">';
                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                        echo '</h2>';
                                                                        echo '<div class="entry">'.$description. '</div>';
                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                    }else{
                                                                        $days = 'مدينة ومن التسجيل';
                                                                        echo '<h2 class="m-t-0">';
                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                        echo '</h2><br>';
                                                                        echo '<div class="entry">'.$description. '</div>';
                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                    }
                                                                    echo '</div>';
                                                                    echo '</div>';
                                                                }
                                                            }

                                                        }else{
                                                            echo '<div class="col-sm-12 m-b-25 qwe">';
                                                            echo '<div class="col-col-9">';
                                                            echo '<h2 class="m-t-0">';
                                                            if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                            '</h2>';
                                                            echo '</div>';
                                                            echo '</div>';
                                                        }
                                                        echo  '</div>';

                                                    }else
                                                        //step 14 When user Search his required city +  To Date
                                                        //when All other fields  empty except city And  To Date
                                                        //Show Result of the required Tabs package if found
                                                        if(
                                                            $All_Destination  != 'all' &&
                                                            $All_package      == 'all' &&
                                                            $All_duration     == 'all' &&
                                                            $from_date        == ''    &&
                                                            $to_date          != ''    &&
                                                            $price_from       == ''    &&
                                                            $price_to         == ''
                                                        )
                                                        {
                                                            //echo 'Both  city +  To Date';exit;
                                                            $post_ids_Array = City_plus_ToDate($All_Destination , $to_date);

                                                            echo  '<div class="col-sm-9">';
                                                            if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                            {
                                                                foreach ($post_ids_Array as $key => $value)
                                                                {
                                                                    $title = get_the_title($key);
                                                                    foreach($value as $geturl => $description)
                                                                    {
                                                                        echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                        echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                        echo '<div class="col-col-9">';
                                                                        if(Language != 'Arabic')
                                                                        {
                                                                            $days = 'City & To Date';
                                                                            echo '<h2 class="m-t-0">';
                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                            echo '</h2>';
                                                                            echo '<div class="entry">'.$description. '</div>';
                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                        }else{
                                                                            $days = 'المدينة وإلى تاريخ';
                                                                            echo '<h2 class="m-t-0">';
                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                            echo '</h2><br>';
                                                                            echo '<div class="entry">'.$description. '</div>';
                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                        }
                                                                        echo '</div>';
                                                                        echo '</div>';
                                                                    }
                                                                }

                                                            }else{
                                                                echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                echo '<div class="col-col-9">';
                                                                echo '<h2 class="m-t-0">';
                                                                if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                '</h2>';
                                                                echo '</div>';
                                                                echo '</div>';
                                                            }
                                                            echo  '</div>';

                                                        }else
                                                            //step 15 When user Search his required city +  Date From + Date To
                                                            //when All other fields  empty except city And  Date From  Date To
                                                            //Show Result of the required Tabs package if found
                                                            if(
                                                                $All_Destination  != 'all' &&
                                                                $All_package      == 'all' &&
                                                                $All_duration     == 'all' &&
                                                                $from_date        != ''    &&
                                                                $to_date          != ''    &&
                                                                $price_from       == ''    &&
                                                                $price_to         == ''
                                                            )
                                                            {
                                                                //echo 'Both  city + From Date + To Date';exit;
                                                                $post_ids_Array = City_plus_FromToDate($All_Destination , $from_date , $to_date);

                                                                echo  '<div class="col-sm-9">';
                                                                if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                {
                                                                    foreach ($post_ids_Array as $key => $value)
                                                                    {
                                                                        $title = get_the_title($key);
                                                                        foreach($value as $geturl => $description)
                                                                        {
                                                                            echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                            echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                            echo '<div class="col-col-9">';
                                                                            if(Language != 'Arabic')
                                                                            {
                                                                                $days = 'City & Date From & Date to';
                                                                                echo '<h2 class="m-t-0">';
                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                echo '</h2>';
                                                                                echo '<div class="entry">'.$description. '</div>';
                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                            }else{
                                                                                $days = 'مدينة وتاريخ من والتاريخ ل';
                                                                                echo '<h2 class="m-t-0">';
                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                echo '</h2><br>';
                                                                                echo '<div class="entry">'.$description. '</div>';
                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                            }
                                                                            echo '</div>';
                                                                            echo '</div>';
                                                                        }
                                                                    }

                                                                }else{
                                                                    echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                    echo '<div class="col-col-9">';
                                                                    echo '<h2 class="m-t-0">';
                                                                    if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                    '</h2>';
                                                                    echo '</div>';
                                                                    echo '</div>';
                                                                }
                                                                echo  '</div>';

                                                            }else
                                                                //step 16 When user Search his required city +  Price_from
                                                                //when All other fields  empty except city And  Price_from
                                                                //Show Result of the required Tabs package if found
                                                                if(
                                                                    $All_Destination  != 'all' &&
                                                                    $All_package      == 'all' &&
                                                                    $All_duration     == 'all' &&
                                                                    $from_date        == ''    &&
                                                                    $to_date          == ''    &&
                                                                    $price_from       != ''    &&
                                                                    $price_to         == ''
                                                                )
                                                                {
                                                                    //echo 'Both  city + price From ';exit;
                                                                    $post_ids_Array = City_plus_PriceFrom($All_Destination , $price_from);

                                                                    echo  '<div class="col-sm-9">';
                                                                    if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                    {
                                                                        foreach ($post_ids_Array as $key => $value)
                                                                        {
                                                                            $title = get_the_title($key);
                                                                            foreach($value as $geturl => $description)
                                                                            {
                                                                                echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                echo '<div class="col-col-9">';
                                                                                if(Language != 'Arabic')
                                                                                {
                                                                                    $days = 'City & Price From';
                                                                                    echo '<h2 class="m-t-0">';
                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                    echo '</h2>';
                                                                                    echo '<div class="entry">'.$description. '</div>';
                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                }else{
                                                                                    $days = 'مدينة والسعر من';
                                                                                    echo '<h2 class="m-t-0">';
                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                    echo '</h2><br>';
                                                                                    echo '<div class="entry">'.$description. '</div>';
                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                }
                                                                                echo '</div>';
                                                                                echo '</div>';
                                                                            }
                                                                        }

                                                                    }else{
                                                                        echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                        echo '<div class="col-col-9">';
                                                                        echo '<h2 class="m-t-0">';
                                                                        if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                        '</h2>';
                                                                        echo '</div>';
                                                                        echo '</div>';
                                                                    }
                                                                    echo  '</div>';

                                                                }else
                                                                    //step 17 When user Search his required city +  Price_to
                                                                    //when All other fields  empty except city And  Price_to
                                                                    //Show Result of the required Tabs package if found
                                                                    if(
                                                                        $All_Destination  != 'all' &&
                                                                        $All_package      == 'all' &&
                                                                        $All_duration     == 'all' &&
                                                                        $from_date        == ''    &&
                                                                        $to_date          == ''    &&
                                                                        $price_from       == ''    &&
                                                                        $price_to         != ''
                                                                    )
                                                                    {
                                                                        //echo 'Both  city + price to ';exit;
                                                                        $post_ids_Array = City_plus_PriceTo($All_Destination , $price_to);

                                                                        echo  '<div class="col-sm-9">';
                                                                        if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                        {
                                                                            foreach ($post_ids_Array as $key => $value)
                                                                            {
                                                                                $title = get_the_title($key);
                                                                                foreach($value as $geturl => $description)
                                                                                {
                                                                                    echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                    echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                    echo '<div class="col-col-9">';
                                                                                    if(Language != 'Arabic')
                                                                                    {
                                                                                        $days = 'City & Price to';
                                                                                        echo '<h2 class="m-t-0">';
                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                        echo '</h2>';
                                                                                        echo '<div class="entry">'.$description. '</div>';
                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                    }else{
                                                                                        $days = 'مدينة والسعر ل';
                                                                                        echo '<h2 class="m-t-0">';
                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                        echo '</h2><br>';
                                                                                        echo '<div class="entry">'.$description. '</div>';
                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                    }
                                                                                    echo '</div>';
                                                                                    echo '</div>';
                                                                                }
                                                                            }

                                                                        }else{
                                                                            echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                            echo '<div class="col-col-9">';
                                                                            echo '<h2 class="m-t-0">';
                                                                            if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                            '</h2>';
                                                                            echo '</div>';
                                                                            echo '</div>';
                                                                        }
                                                                        echo  '</div>';

                                                                    }else
                                                                        //step 18 When user Search his required city +  Price_to + Price_from
                                                                        //when All other fields  empty except city And   Price_to + Price_from
                                                                        //Show Result of the required Tabs package if found
                                                                        if(
                                                                            $All_Destination  != 'all' &&
                                                                            $All_package      == 'all' &&
                                                                            $All_duration     == 'all' &&
                                                                            $from_date        == ''    &&
                                                                            $to_date          == ''    &&
                                                                            $price_from       != ''    &&
                                                                            $price_to         != ''
                                                                        )
                                                                        {
                                                                            //echo 'Both  city + price to + Price From ';exit;
                                                                            $post_ids_Array = City_plus_PriceFromTo($All_Destination ,$price_from, $price_to);

                                                                            echo  '<div class="col-sm-9">';
                                                                            if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                            {
                                                                                foreach ($post_ids_Array as $key => $value)
                                                                                {
                                                                                    $title = get_the_title($key);
                                                                                    foreach($value as $geturl => $description)
                                                                                    {
                                                                                        echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                        echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                        echo '<div class="col-col-9">';
                                                                                        if(Language != 'Arabic')
                                                                                        {
                                                                                            $days = 'City & Price From & Price to';
                                                                                            echo '<h2 class="m-t-0">';
                                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                            echo '</h2>';
                                                                                            echo '<div class="entry">'.$description. '</div>';
                                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                        }else{
                                                                                            $days = 'مدينة والسعر من والسعر ل';
                                                                                            echo '<h2 class="m-t-0">';
                                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                            echo '</h2><br>';
                                                                                            echo '<div class="entry">'.$description. '</div>';
                                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                        }
                                                                                        echo '</div>';
                                                                                        echo '</div>';
                                                                                    }
                                                                                }

                                                                            }else{
                                                                                echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                echo '<div class="col-col-9">';
                                                                                echo '<h2 class="m-t-0">';
                                                                                if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                                '</h2>';
                                                                                echo '</div>';
                                                                                echo '</div>';
                                                                            }
                                                                            echo  '</div>';

                                                                        }else
                                                                            //step 19 When user Search his required city +  Package + Duration
                                                                            //when All other fields  empty except city +  Package + Duration
                                                                            //Show Result of the required Tabs package if found
                                                                            if(
                                                                                $All_Destination  != 'all' &&
                                                                                $All_package      != 'all' &&
                                                                                $All_duration     != 'all' &&
                                                                                $from_date        == ''    &&
                                                                                $to_date          == ''    &&
                                                                                $price_from       == ''    &&
                                                                                $price_to         == ''
                                                                            )
                                                                            {
                                                                                //echo 'Both city +  Package + Duration ';exit;
                                                                                $post_ids_Array = City_plus_Package_Duration($All_Destination ,$All_package, $All_duration);

                                                                                echo  '<div class="col-sm-9">';
                                                                                if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                                {
                                                                                    foreach ($post_ids_Array as $key => $value)
                                                                                    {
                                                                                        $title = get_the_title($key);
                                                                                        foreach($value as $geturl => $description)
                                                                                        {
                                                                                            echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                            echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                            echo '<div class="col-col-9">';
                                                                                            if(Language != 'Arabic')
                                                                                            {
                                                                                                $days = 'City & Package & Duration';
                                                                                                echo '<h2 class="m-t-0">';
                                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                                echo '</h2>';
                                                                                                echo '<div class="entry">'.$description. '</div>';
                                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                            }else{
                                                                                                $days = 'مدينة والتعبئة والتغليف ومدة';
                                                                                                echo '<h2 class="m-t-0">';
                                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                                echo '</h2><br>';
                                                                                                echo '<div class="entry">'.$description. '</div>';
                                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                            }
                                                                                            echo '</div>';
                                                                                            echo '</div>';
                                                                                        }
                                                                                    }

                                                                                }else{
                                                                                    echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                    echo '<div class="col-col-9">';
                                                                                    echo '<h2 class="m-t-0">';
                                                                                    if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                                    '</h2>';
                                                                                    echo '</div>';
                                                                                    echo '</div>';
                                                                                }
                                                                                echo  '</div>';

                                                                            }else
                                                                                //step 20 When user Search his required city +  Package + Date From
                                                                                //when All other fields  empty except city +  Package + Date From
                                                                                //Show Result of the required Tabs package if found
                                                                                if(
                                                                                    $All_Destination  != 'all' &&
                                                                                    $All_package      != 'all' &&
                                                                                    $All_duration     == 'all' &&
                                                                                    $from_date        != ''    &&
                                                                                    $to_date          == ''    &&
                                                                                    $price_from       == ''    &&
                                                                                    $price_to         == ''
                                                                                )
                                                                                {
                                                                                    //echo 'Both city +  Package + Date From';exit;
                                                                                    $post_ids_Array = City_plus_Package_DateFrom($All_Destination ,$All_package, $from_date);

                                                                                    echo  '<div class="col-sm-9">';
                                                                                    if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                                    {
                                                                                        foreach ($post_ids_Array as $key => $value)
                                                                                        {
                                                                                            $title = get_the_title($key);
                                                                                            foreach($value as $geturl => $description)
                                                                                            {
                                                                                                echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                                echo '<div class="col-col-9">';
                                                                                                if(Language != 'Arabic')
                                                                                                {
                                                                                                    $days = 'City & Package & Date From';
                                                                                                    echo '<h2 class="m-t-0">';
                                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                                    echo '</h2>';
                                                                                                    echo '<div class="entry">'.$description. '</div>';
                                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                                }else{
                                                                                                    $days = 'مدينة والتعبئة والتغليف وتاريخ من';
                                                                                                    echo '<h2 class="m-t-0">';
                                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                                    echo '</h2><br>';
                                                                                                    echo '<div class="entry">'.$description. '</div>';
                                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                                }
                                                                                                echo '</div>';
                                                                                                echo '</div>';
                                                                                            }
                                                                                        }

                                                                                    }else{
                                                                                        echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                        echo '<div class="col-col-9">';
                                                                                        echo '<h2 class="m-t-0">';
                                                                                        if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                                        '</h2>';
                                                                                        echo '</div>';
                                                                                        echo '</div>';
                                                                                    }
                                                                                    echo  '</div>';

                                                                                }else
                                                                                    //step 21 When user Search his required city +  Package + Date To
                                                                                    //when All other fields  empty except city +  Package + Date To
                                                                                    //Show Result of the required Tabs package if found
                                                                                    if(
                                                                                        $All_Destination  != 'all' &&
                                                                                        $All_package      != 'all' &&
                                                                                        $All_duration     == 'all' &&
                                                                                        $from_date        == ''    &&
                                                                                        $to_date          != ''    &&
                                                                                        $price_from       == ''    &&
                                                                                        $price_to         == ''
                                                                                    )
                                                                                    {
                                                                                        //echo 'Both city +  Package + Date From';exit;
                                                                                        $post_ids_Array = City_plus_Package_DateTo($All_Destination ,$All_package, $to_date);

                                                                                        echo  '<div class="col-sm-9">';
                                                                                        if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                                        {
                                                                                            foreach ($post_ids_Array as $key => $value)
                                                                                            {
                                                                                                $title = get_the_title($key);
                                                                                                foreach($value as $geturl => $description)
                                                                                                {
                                                                                                    echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                    echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                                    echo '<div class="col-col-9">';
                                                                                                    if(Language != 'Arabic')
                                                                                                    {
                                                                                                        $days = 'City & Package & To Date';
                                                                                                        echo '<h2 class="m-t-0">';
                                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                                        echo '</h2>';
                                                                                                        echo '<div class="entry">'.$description. '</div>';
                                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                                    }else{
                                                                                                        $days = 'مدينة والتعبئة والتغليف وإلى تاريخ';
                                                                                                        echo '<h2 class="m-t-0">';
                                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                                        echo '</h2><br>';
                                                                                                        echo '<div class="entry">'.$description. '</div>';
                                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                                    }
                                                                                                    echo '</div>';
                                                                                                    echo '</div>';
                                                                                                }
                                                                                            }

                                                                                        }else{
                                                                                            echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                            echo '<div class="col-col-9">';
                                                                                            echo '<h2 class="m-t-0">';
                                                                                            if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                                            '</h2>';
                                                                                            echo '</div>';
                                                                                            echo '</div>';
                                                                                        }
                                                                                        echo  '</div>';

                                                                                    }else
                                                                                        //step 22 When user Search his required city +  Package + Date From + Date To
                                                                                        //when All other fields  empty except city +  Package + Date From + Date To
                                                                                        //Show Result of the required Tabs package if found
                                                                                        if(
                                                                                            $All_Destination  != 'all' &&
                                                                                            $All_package      != 'all' &&
                                                                                            $All_duration     == 'all' &&
                                                                                            $from_date        != ''    &&
                                                                                            $to_date          != ''    &&
                                                                                            $price_from       == ''    &&
                                                                                            $price_to         == ''
                                                                                        )
                                                                                        {
                                                                                            //echo 'Both city +  Package + Date From + Date To';exit;
                                                                                            $post_ids_Array = City_plus_Package_DateTo_From($All_Destination ,$All_package,$from_date, $to_date);

                                                                                            echo  '<div class="col-sm-9">';
                                                                                            if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                                            {
                                                                                                foreach ($post_ids_Array as $key => $value)
                                                                                                {
                                                                                                    $title = get_the_title($key);
                                                                                                    foreach($value as $geturl => $description)
                                                                                                    {
                                                                                                        echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                        echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                                        echo '<div class="col-col-9">';
                                                                                                        if(Language != 'Arabic')
                                                                                                        {
                                                                                                            $days = 'City & Package & Between Date';
                                                                                                            echo '<h2 class="m-t-0">';
                                                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                                            echo '</h2>';
                                                                                                            echo '<div class="entry">'.$description. '</div>';
                                                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                                        }else{
                                                                                                            $days = 'مدينة وحزمة وبين التسجيل';
                                                                                                            echo '<h2 class="m-t-0">';
                                                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                                            echo '</h2><br>';
                                                                                                            echo '<div class="entry">'.$description. '</div>';
                                                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                                        }
                                                                                                        echo '</div>';
                                                                                                        echo '</div>';
                                                                                                    }
                                                                                                }

                                                                                            }else{
                                                                                                echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                echo '<div class="col-col-9">';
                                                                                                echo '<h2 class="m-t-0">';
                                                                                                if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                                                '</h2>';
                                                                                                echo '</div>';
                                                                                                echo '</div>';
                                                                                            }
                                                                                            echo  '</div>';

                                                                                        }else
                                                                                            //step 23 When user Search his required city +  Package + Price From
                                                                                            //when All other fields  empty except city +  Package + Price From
                                                                                            //Show Result of the required Tabs package if found
                                                                                            if(
                                                                                                $All_Destination  != 'all' &&
                                                                                                $All_package      != 'all' &&
                                                                                                $All_duration     == 'all' &&
                                                                                                $from_date        == ''    &&
                                                                                                $to_date          == ''    &&
                                                                                                $price_from       != ''    &&
                                                                                                $price_to         == ''
                                                                                            )
                                                                                            {
                                                                                                //echo 'Both city +  Package + price From ';exit;
                                                                                                $post_ids_Array = City_plus_Package_price_From($All_Destination ,$All_package,$price_from);

                                                                                                echo  '<div class="col-sm-9">';
                                                                                                if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                                                {
                                                                                                    foreach ($post_ids_Array as $key => $value)
                                                                                                    {
                                                                                                        $title = get_the_title($key);
                                                                                                        foreach($value as $geturl => $description)
                                                                                                        {
                                                                                                            echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                            echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                                            echo '<div class="col-col-9">';
                                                                                                            if(Language != 'Arabic')
                                                                                                            {
                                                                                                                $days = 'City & Package & Between Date';
                                                                                                                echo '<h2 class="m-t-0">';
                                                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                                                echo '</h2>';
                                                                                                                echo '<div class="entry">'.$description. '</div>';
                                                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                                            }else{
                                                                                                                $days = 'مدينة وحزمة وبين التسجيل';
                                                                                                                echo '<h2 class="m-t-0">';
                                                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                                                echo '</h2><br>';
                                                                                                                echo '<div class="entry">'.$description. '</div>';
                                                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                                            }
                                                                                                            echo '</div>';
                                                                                                            echo '</div>';
                                                                                                        }
                                                                                                    }

                                                                                                }else{
                                                                                                    echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                    echo '<div class="col-col-9">';
                                                                                                    echo '<h2 class="m-t-0">';
                                                                                                    if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                                                    '</h2>';
                                                                                                    echo '</div>';
                                                                                                    echo '</div>';
                                                                                                }
                                                                                                echo  '</div>';

                                                                                            }else
                                                                                                //step 24 When user Search his required city +  Package + Price To
                                                                                                //when All other fields  empty except city +  Package + Price To
                                                                                                //Show Result of the required Tabs package if found
                                                                                                if(
                                                                                                    $All_Destination  != 'all' &&
                                                                                                    $All_package      != 'all' &&
                                                                                                    $All_duration     == 'all' &&
                                                                                                    $from_date        == ''    &&
                                                                                                    $to_date          == ''    &&
                                                                                                    $price_from       == ''    &&
                                                                                                    $price_to         != ''
                                                                                                )
                                                                                                {
                                                                                                    //echo 'Both city +  Package + price To ';exit;
                                                                                                    $post_ids_Array = City_plus_Package_price_To($All_Destination ,$All_package,$price_to);

                                                                                                    echo  '<div class="col-sm-9">';
                                                                                                    if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                                                    {
                                                                                                        foreach ($post_ids_Array as $key => $value)
                                                                                                        {
                                                                                                            $title = get_the_title($key);
                                                                                                            foreach($value as $geturl => $description)
                                                                                                            {
                                                                                                                echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                                                echo '<div class="col-col-9">';
                                                                                                                if(Language != 'Arabic')
                                                                                                                {
                                                                                                                    $days = 'City & Package & Between Date';
                                                                                                                    echo '<h2 class="m-t-0">';
                                                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                                                    echo '</h2>';
                                                                                                                    echo '<div class="entry">'.$description. '</div>';
                                                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                                                }else{
                                                                                                                    $days = 'مدينة وحزمة وبين التسجيل';
                                                                                                                    echo '<h2 class="m-t-0">';
                                                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                                                    echo '</h2><br>';
                                                                                                                    echo '<div class="entry">'.$description. '</div>';
                                                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                                                }
                                                                                                                echo '</div>';
                                                                                                                echo '</div>';
                                                                                                            }
                                                                                                        }

                                                                                                    }else{
                                                                                                        echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                        echo '<div class="col-col-9">';
                                                                                                        echo '<h2 class="m-t-0">';
                                                                                                        if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                                                        '</h2>';
                                                                                                        echo '</div>';
                                                                                                        echo '</div>';
                                                                                                    }
                                                                                                    echo  '</div>';

                                                                                                }else
                                                                                                    //step 25 When user Search his required city +  Package + Price To + Price From
                                                                                                    //when All other fields  empty except city +  Package + Price To + Price From
                                                                                                    //Show Result of the required Tabs package if found
                                                                                                    if(
                                                                                                        $All_Destination  != 'all' &&
                                                                                                        $All_package      != 'all' &&
                                                                                                        $All_duration     == 'all' &&
                                                                                                        $from_date        == ''    &&
                                                                                                        $to_date          == ''    &&
                                                                                                        $price_from       != ''    &&
                                                                                                        $price_to         != ''
                                                                                                    )
                                                                                                    {
                                                                                                        //echo 'Both city +  Package + price To ';exit;
                                                                                                        $post_ids_Array = City_plus_Package_price_From_To($All_Destination ,$All_package,$price_from,$price_to);

                                                                                                        echo  '<div class="col-sm-9">';
                                                                                                        if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                                                        {
                                                                                                            foreach ($post_ids_Array as $key => $value)
                                                                                                            {
                                                                                                                $title = get_the_title($key);
                                                                                                                foreach($value as $geturl => $description)
                                                                                                                {
                                                                                                                    echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                    echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                                                    echo '<div class="col-col-9">';
                                                                                                                    if(Language != 'Arabic')
                                                                                                                    {
                                                                                                                        $days = 'City & Package & Between Date';
                                                                                                                        echo '<h2 class="m-t-0">';
                                                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                                                        echo '</h2>';
                                                                                                                        echo '<div class="entry">'.$description. '</div>';
                                                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                                                    }else{
                                                                                                                        $days = 'مدينة وحزمة وبين التسجيل';
                                                                                                                        echo '<h2 class="m-t-0">';
                                                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                                                        echo '</h2><br>';
                                                                                                                        echo '<div class="entry">'.$description. '</div>';
                                                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                                                    }
                                                                                                                    echo '</div>';
                                                                                                                    echo '</div>';
                                                                                                                }
                                                                                                            }

                                                                                                        }else{
                                                                                                            echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                            echo '<div class="col-col-9">';
                                                                                                            echo '<h2 class="m-t-0">';
                                                                                                            if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                                                            '</h2>';
                                                                                                            echo '</div>';
                                                                                                            echo '</div>';
                                                                                                        }
                                                                                                        echo  '</div>';

                                                                                                    }else
                                                                                                        //step 26 When user Search his required Package + Duration
                                                                                                        //when All other fields  empty except city + Package + Duration
                                                                                                        //Show Result of the required Tabs package if found
                                                                                                        if(
                                                                                                            $All_Destination  == 'all' &&
                                                                                                            $All_package      != 'all' &&
                                                                                                            $All_duration     != 'all' &&
                                                                                                            $from_date        == ''    &&
                                                                                                            $to_date          == ''    &&
                                                                                                            $price_from       == ''    &&
                                                                                                            $price_to         == ''
                                                                                                        )
                                                                                                        {
                                                                                                           // echo 'Both Package + Duration ';exit;
                                                                                                            $post_ids_Array = Package_plus_Duration($All_package,$All_duration);

                                                                                                            echo  '<div class="col-sm-9">';
                                                                                                            if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                                                            {
                                                                                                                foreach ($post_ids_Array as $key => $value)
                                                                                                                {
                                                                                                                    $title = get_the_title($key);
                                                                                                                    foreach($value as $geturl => $description)
                                                                                                                    {
                                                                                                                        echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                        echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                                                        echo '<div class="col-col-9">';
                                                                                                                        if(Language != 'Arabic')
                                                                                                                        {
                                                                                                                            $days = 'City & Package & Between Date';
                                                                                                                            echo '<h2 class="m-t-0">';
                                                                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                                                            echo '</h2>';
                                                                                                                            echo '<div class="entry">'.$description. '</div>';
                                                                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                                                        }else{
                                                                                                                            $days = 'مدينة وحزمة وبين التسجيل';
                                                                                                                            echo '<h2 class="m-t-0">';
                                                                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                                                            echo '</h2><br>';
                                                                                                                            echo '<div class="entry">'.$description. '</div>';
                                                                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                                                        }
                                                                                                                        echo '</div>';
                                                                                                                        echo '</div>';
                                                                                                                    }
                                                                                                                }

                                                                                                            }else{
                                                                                                                echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                echo '<div class="col-col-9">';
                                                                                                                echo '<h2 class="m-t-0">';
                                                                                                                if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                                                                '</h2>';
                                                                                                                echo '</div>';
                                                                                                                echo '</div>';
                                                                                                            }
                                                                                                            echo  '</div>';

                                                                                                        }else
                                                                                                            //step 27 When user Search his required Package + Date From
                                                                                                            //when All other fields  empty except  Package + Date From
                                                                                                            //Show Result of the required Tabs package if found
                                                                                                            if(
                                                                                                                $All_Destination  == 'all' &&
                                                                                                                $All_package      != 'all' &&
                                                                                                                $All_duration     == 'all' &&
                                                                                                                $from_date        != ''    &&
                                                                                                                $to_date          == ''    &&
                                                                                                                $price_from       == ''    &&
                                                                                                                $price_to         == ''
                                                                                                            )
                                                                                                            {
                                                                                                                // echo 'Both Package + Date From ';exit;
                                                                                                                $post_ids_Array = Package_plus_Datefrom($All_package,$from_date);

                                                                                                                echo  '<div class="col-sm-9">';
                                                                                                                if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                                                                {
                                                                                                                    foreach ($post_ids_Array as $key => $value)
                                                                                                                    {
                                                                                                                        $title = get_the_title($key);
                                                                                                                        foreach($value as $geturl => $description)
                                                                                                                        {
                                                                                                                            echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                            echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                                                            echo '<div class="col-col-9">';
                                                                                                                            if(Language != 'Arabic')
                                                                                                                            {
                                                                                                                                $days = 'City & Package & Between Date';
                                                                                                                                echo '<h2 class="m-t-0">';
                                                                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                                                                echo '</h2>';
                                                                                                                                echo '<div class="entry">'.$description. '</div>';
                                                                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                                                            }else{
                                                                                                                                $days = 'مدينة وحزمة وبين التسجيل';
                                                                                                                                echo '<h2 class="m-t-0">';
                                                                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                                                                echo '</h2><br>';
                                                                                                                                echo '<div class="entry">'.$description. '</div>';
                                                                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                                                            }
                                                                                                                            echo '</div>';
                                                                                                                            echo '</div>';
                                                                                                                        }
                                                                                                                    }

                                                                                                                }else{
                                                                                                                    echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                    echo '<div class="col-col-9">';
                                                                                                                    echo '<h2 class="m-t-0">';
                                                                                                                    if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                                                                    '</h2>';
                                                                                                                    echo '</div>';
                                                                                                                    echo '</div>';
                                                                                                                }
                                                                                                                echo  '</div>';

                                                                                                            }else
                                                                                                                //step 28 When user Search his required Package + Date To
                                                                                                                //when All other fields  empty except  Package + Date To
                                                                                                                //Show Result of the required Tabs package if found
                                                                                                                if(
                                                                                                                    $All_Destination  == 'all' &&
                                                                                                                    $All_package      != 'all' &&
                                                                                                                    $All_duration     == 'all' &&
                                                                                                                    $from_date        == ''    &&
                                                                                                                    $to_date          != ''    &&
                                                                                                                    $price_from       == ''    &&
                                                                                                                    $price_to         == ''
                                                                                                                )
                                                                                                                {
                                                                                                                    // echo 'Both Package + Date From ';exit;
                                                                                                                    $post_ids_Array = Package_plus_Dateto($All_package,$to_date);

                                                                                                                    echo  '<div class="col-sm-9">';
                                                                                                                    if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                                                                    {
                                                                                                                        foreach ($post_ids_Array as $key => $value)
                                                                                                                        {
                                                                                                                            $title = get_the_title($key);
                                                                                                                            foreach($value as $geturl => $description)
                                                                                                                            {
                                                                                                                                echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                                                                echo '<div class="col-col-9">';
                                                                                                                                if(Language != 'Arabic')
                                                                                                                                {
                                                                                                                                    $days = 'City & Package & Between Date';
                                                                                                                                    echo '<h2 class="m-t-0">';
                                                                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                                                                    echo '</h2>';
                                                                                                                                    echo '<div class="entry">'.$description. '</div>';
                                                                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                                                                }else{
                                                                                                                                    $days = 'مدينة وحزمة وبين التسجيل';
                                                                                                                                    echo '<h2 class="m-t-0">';
                                                                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                                                                    echo '</h2><br>';
                                                                                                                                    echo '<div class="entry">'.$description. '</div>';
                                                                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                                                                }
                                                                                                                                echo '</div>';
                                                                                                                                echo '</div>';
                                                                                                                            }
                                                                                                                        }

                                                                                                                    }else{
                                                                                                                        echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                        echo '<div class="col-col-9">';
                                                                                                                        echo '<h2 class="m-t-0">';
                                                                                                                        if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                                                                        '</h2>';
                                                                                                                        echo '</div>';
                                                                                                                        echo '</div>';
                                                                                                                    }
                                                                                                                    echo  '</div>';

                                                                                                                }else
                                                                                                                    //step 29 When user Search his required Package + Date From+ Date To
                                                                                                                    //when All other fields  empty except  Package + Date From+ Date To
                                                                                                                    //Show Result of the required Tabs package if found
                                                                                                                    if(
                                                                                                                        $All_Destination  == 'all' &&
                                                                                                                        $All_package      != 'all' &&
                                                                                                                        $All_duration     == 'all' &&
                                                                                                                        $from_date        != ''    &&
                                                                                                                        $to_date          != ''    &&
                                                                                                                        $price_from       == ''    &&
                                                                                                                        $price_to         == ''
                                                                                                                    )
                                                                                                                    {
                                                                                                                        // echo 'Both Package +Date From+ Date To ';exit;
                                                                                                                        $post_ids_Array = Package_plus_DateFrom_To($All_package,$from_date,$to_date);

                                                                                                                        echo  '<div class="col-sm-9">';
                                                                                                                        if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                                                                        {
                                                                                                                            foreach ($post_ids_Array as $key => $value)
                                                                                                                            {
                                                                                                                                $title = get_the_title($key);
                                                                                                                                foreach($value as $geturl => $description)
                                                                                                                                {
                                                                                                                                    echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                    echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                                                                    echo '<div class="col-col-9">';
                                                                                                                                    if(Language != 'Arabic')
                                                                                                                                    {
                                                                                                                                        $days = 'City & Package & Between Date';
                                                                                                                                        echo '<h2 class="m-t-0">';
                                                                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                                                                        echo '</h2>';
                                                                                                                                        echo '<div class="entry">'.$description. '</div>';
                                                                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                                                                    }else{
                                                                                                                                        $days = 'مدينة وحزمة وبين التسجيل';
                                                                                                                                        echo '<h2 class="m-t-0">';
                                                                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                                                                        echo '</h2><br>';
                                                                                                                                        echo '<div class="entry">'.$description. '</div>';
                                                                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                                                                    }
                                                                                                                                    echo '</div>';
                                                                                                                                    echo '</div>';
                                                                                                                                }
                                                                                                                            }

                                                                                                                        }else{
                                                                                                                            echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                            echo '<div class="col-col-9">';
                                                                                                                            echo '<h2 class="m-t-0">';
                                                                                                                            if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                                                                            '</h2>';
                                                                                                                            echo '</div>';
                                                                                                                            echo '</div>';
                                                                                                                        }
                                                                                                                        echo  '</div>';

                                                                                                                    }else
                                                                                                                        //step 30 When user Search his required Package + Price From
                                                                                                                        //when All other fields  empty except  Package +  Price From
                                                                                                                        //Show Result of the required Tabs package if found
                                                                                                                        if(
                                                                                                                            $All_Destination  == 'all' &&
                                                                                                                            $All_package      != 'all' &&
                                                                                                                            $All_duration     == 'all' &&
                                                                                                                            $from_date        == ''    &&
                                                                                                                            $to_date          == ''    &&
                                                                                                                            $price_from       != ''    &&
                                                                                                                            $price_to         == ''
                                                                                                                        )
                                                                                                                        {
                                                                                                                            // echo 'Both Package + Price From ';exit;
                                                                                                                            $post_ids_Array = Package_plus_PriceFrom($All_package,$price_from);

                                                                                                                            echo  '<div class="col-sm-9">';
                                                                                                                            if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                                                                            {
                                                                                                                                foreach ($post_ids_Array as $key => $value)
                                                                                                                                {
                                                                                                                                    $title = get_the_title($key);
                                                                                                                                    foreach($value as $geturl => $description)
                                                                                                                                    {
                                                                                                                                        echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                        echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                                                                        echo '<div class="col-col-9">';
                                                                                                                                        if(Language != 'Arabic')
                                                                                                                                        {
                                                                                                                                            $days = 'City & Package & Between Date';
                                                                                                                                            echo '<h2 class="m-t-0">';
                                                                                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                                                                            echo '</h2>';
                                                                                                                                            echo '<div class="entry">'.$description. '</div>';
                                                                                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                                                                        }else{
                                                                                                                                            $days = 'مدينة وحزمة وبين التسجيل';
                                                                                                                                            echo '<h2 class="m-t-0">';
                                                                                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                                                                            echo '</h2><br>';
                                                                                                                                            echo '<div class="entry">'.$description. '</div>';
                                                                                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                                                                        }
                                                                                                                                        echo '</div>';
                                                                                                                                        echo '</div>';
                                                                                                                                    }
                                                                                                                                }

                                                                                                                            }else{
                                                                                                                                echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                echo '<div class="col-col-9">';
                                                                                                                                echo '<h2 class="m-t-0">';
                                                                                                                                if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                                                                                '</h2>';
                                                                                                                                echo '</div>';
                                                                                                                                echo '</div>';
                                                                                                                            }
                                                                                                                            echo  '</div>';

                                                                                                                        }else
                                                                                                                            //step 31 When user Search his required Package + Price to
                                                                                                                            //when All other fields  empty except  Package +  Price to
                                                                                                                            //Show Result of the required Tabs package if found
                                                                                                                            if(
                                                                                                                                $All_Destination  == 'all' &&
                                                                                                                                $All_package      != 'all' &&
                                                                                                                                $All_duration     == 'all' &&
                                                                                                                                $from_date        == ''    &&
                                                                                                                                $to_date          == ''    &&
                                                                                                                                $price_from       == ''    &&
                                                                                                                                $price_to         != ''
                                                                                                                            )
                                                                                                                            {
                                                                                                                                // echo 'Both Package + Price To ';exit;
                                                                                                                                $post_ids_Array = Package_plus_PriceTo($All_package,$price_to);

                                                                                                                                echo  '<div class="col-sm-9">';
                                                                                                                                if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                                                                                {
                                                                                                                                    foreach ($post_ids_Array as $key => $value)
                                                                                                                                    {
                                                                                                                                        $title = get_the_title($key);
                                                                                                                                        foreach($value as $geturl => $description)
                                                                                                                                        {
                                                                                                                                            echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                            echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                                                                            echo '<div class="col-col-9">';
                                                                                                                                            if(Language != 'Arabic')
                                                                                                                                            {
                                                                                                                                                $days = 'City & Package & Between Date';
                                                                                                                                                echo '<h2 class="m-t-0">';
                                                                                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                                                                                echo '</h2>';
                                                                                                                                                echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                                                                            }else{
                                                                                                                                                $days = 'مدينة وحزمة وبين التسجيل';
                                                                                                                                                echo '<h2 class="m-t-0">';
                                                                                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                                                                                echo '</h2><br>';
                                                                                                                                                echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                                                                            }
                                                                                                                                            echo '</div>';
                                                                                                                                            echo '</div>';
                                                                                                                                        }
                                                                                                                                    }

                                                                                                                                }else{
                                                                                                                                    echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                    echo '<div class="col-col-9">';
                                                                                                                                    echo '<h2 class="m-t-0">';
                                                                                                                                    if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                                                                                    '</h2>';
                                                                                                                                    echo '</div>';
                                                                                                                                    echo '</div>';
                                                                                                                                }
                                                                                                                                echo  '</div>';

                                                                                                                            }else
                                                                                                                                //step 32 When user Search his required Package + Price From + Price to
                                                                                                                                //when All other fields  empty except  Package + Price From + Price to
                                                                                                                                //Show Result of the required Tabs package if found
                                                                                                                                if(
                                                                                                                                    $All_Destination  == 'all' &&
                                                                                                                                    $All_package      != 'all' &&
                                                                                                                                    $All_duration     == 'all' &&
                                                                                                                                    $from_date        == ''    &&
                                                                                                                                    $to_date          == ''    &&
                                                                                                                                    $price_from       != ''    &&
                                                                                                                                    $price_to         != ''
                                                                                                                                )
                                                                                                                                {
                                                                                                                                    // echo 'Both Package + Price From + Price to ';exit;
                                                                                                                                    $post_ids_Array = Package_plus_PriceFrom_To($All_package,$price_from ,$price_to);

                                                                                                                                    echo  '<div class="col-sm-9">';
                                                                                                                                    if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                                                                                    {
                                                                                                                                        foreach ($post_ids_Array as $key => $value)
                                                                                                                                        {
                                                                                                                                            $title = get_the_title($key);
                                                                                                                                            foreach($value as $geturl => $description)
                                                                                                                                            {
                                                                                                                                                echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                                                                                echo '<div class="col-col-9">';
                                                                                                                                                if(Language != 'Arabic')
                                                                                                                                                {
                                                                                                                                                    $days = 'City & Package & Between Date';
                                                                                                                                                    echo '<h2 class="m-t-0">';
                                                                                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                                                                                    echo '</h2>';
                                                                                                                                                    echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                                                                                }else{
                                                                                                                                                    $days = 'مدينة وحزمة وبين التسجيل';
                                                                                                                                                    echo '<h2 class="m-t-0">';
                                                                                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                                                                                    echo '</h2><br>';
                                                                                                                                                    echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                                                                                }
                                                                                                                                                echo '</div>';
                                                                                                                                                echo '</div>';
                                                                                                                                            }
                                                                                                                                        }

                                                                                                                                    }else{
                                                                                                                                        echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                        echo '<div class="col-col-9">';
                                                                                                                                        echo '<h2 class="m-t-0">';
                                                                                                                                        if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                                                                                        '</h2>';
                                                                                                                                        echo '</div>';
                                                                                                                                        echo '</div>';
                                                                                                                                    }
                                                                                                                                    echo  '</div>';

                                                                                                                                }else
                                                                                                                                    //step 33 When user Search his required Duration + Date From
                                                                                                                                    //when All other fields  empty except Duration + Date From
                                                                                                                                    //Show Result of the required Tabs package if found
                                                                                                                                    if(
                                                                                                                                        $All_Destination  == 'all' &&
                                                                                                                                        $All_package      == 'all' &&
                                                                                                                                        $All_duration     != 'all' &&
                                                                                                                                        $from_date        != ''    &&
                                                                                                                                        $to_date          == ''    &&
                                                                                                                                        $price_from       == ''    &&
                                                                                                                                        $price_to         == ''
                                                                                                                                    )
                                                                                                                                    {
                                                                                                                                        // echo 'Both Duration + Date From ';exit;
                                                                                                                                        $post_ids_Array = Duration_plus_DateFrom($All_duration,$from_date);

                                                                                                                                        echo  '<div class="col-sm-9">';
                                                                                                                                        if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                                                                                        {
                                                                                                                                            foreach ($post_ids_Array as $key => $value)
                                                                                                                                            {
                                                                                                                                                $title = get_the_title($key);
                                                                                                                                                foreach($value as $geturl => $description)
                                                                                                                                                {
                                                                                                                                                    echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                    echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                                                                                    echo '<div class="col-col-9">';
                                                                                                                                                    if(Language != 'Arabic')
                                                                                                                                                    {
                                                                                                                                                        $days = 'City & Package & Between Date';
                                                                                                                                                        echo '<h2 class="m-t-0">';
                                                                                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                                                                                        echo '</h2>';
                                                                                                                                                        echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                                                                                    }else{
                                                                                                                                                        $days = 'مدينة وحزمة وبين التسجيل';
                                                                                                                                                        echo '<h2 class="m-t-0">';
                                                                                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                                                                                        echo '</h2><br>';
                                                                                                                                                        echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                                                                                    }
                                                                                                                                                    echo '</div>';
                                                                                                                                                    echo '</div>';
                                                                                                                                                }
                                                                                                                                            }

                                                                                                                                        }else{
                                                                                                                                            echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                            echo '<div class="col-col-9">';
                                                                                                                                            echo '<h2 class="m-t-0">';
                                                                                                                                            if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                                                                                            '</h2>';
                                                                                                                                            echo '</div>';
                                                                                                                                            echo '</div>';
                                                                                                                                        }
                                                                                                                                        echo  '</div>';

                                                                                                                                    }else
                                                                                                                                        //step 34 When user Search his required Duration + Date To
                                                                                                                                        //when All other fields  empty except Duration + Date To
                                                                                                                                        //Show Result of the required Tabs package if found
                                                                                                                                        if(
                                                                                                                                            $All_Destination  == 'all' &&
                                                                                                                                            $All_package      == 'all' &&
                                                                                                                                            $All_duration     != 'all' &&
                                                                                                                                            $from_date        == ''    &&
                                                                                                                                            $to_date          != ''    &&
                                                                                                                                            $price_from       == ''    &&
                                                                                                                                            $price_to         == ''
                                                                                                                                        )
                                                                                                                                        {
                                                                                                                                            // echo 'Both Duration + Date To ';exit;
                                                                                                                                            $post_ids_Array = Duration_plus_DateTo($All_duration,$to_date);

                                                                                                                                            echo  '<div class="col-sm-9">';
                                                                                                                                            if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                                                                                            {
                                                                                                                                                foreach ($post_ids_Array as $key => $value)
                                                                                                                                                {
                                                                                                                                                    $title = get_the_title($key);
                                                                                                                                                    foreach($value as $geturl => $description)
                                                                                                                                                    {
                                                                                                                                                        echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                        echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                                                                                        echo '<div class="col-col-9">';
                                                                                                                                                        if(Language != 'Arabic')
                                                                                                                                                        {
                                                                                                                                                            $days = 'City & Package & Between Date';
                                                                                                                                                            echo '<h2 class="m-t-0">';
                                                                                                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                                                                                            echo '</h2>';
                                                                                                                                                            echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                                                                                        }else{
                                                                                                                                                            $days = 'مدينة وحزمة وبين التسجيل';
                                                                                                                                                            echo '<h2 class="m-t-0">';
                                                                                                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                                                                                            echo '</h2><br>';
                                                                                                                                                            echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                                                                                        }
                                                                                                                                                        echo '</div>';
                                                                                                                                                        echo '</div>';
                                                                                                                                                    }
                                                                                                                                                }

                                                                                                                                            }else{
                                                                                                                                                echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                echo '<div class="col-col-9">';
                                                                                                                                                echo '<h2 class="m-t-0">';
                                                                                                                                                if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                                                                                                '</h2>';
                                                                                                                                                echo '</div>';
                                                                                                                                                echo '</div>';
                                                                                                                                            }
                                                                                                                                            echo  '</div>';

                                                                                                                                        }else
                                                                                                                                            //step 35 When user Search his required Duration + Date To + date From
                                                                                                                                            //when All other fields  empty except Duration + Date To +Date From
                                                                                                                                            //Show Result of the required Tabs package if found
                                                                                                                                            if(
                                                                                                                                                $All_Destination  == 'all' &&
                                                                                                                                                $All_package      == 'all' &&
                                                                                                                                                $All_duration     != 'all' &&
                                                                                                                                                $from_date        != ''    &&
                                                                                                                                                $to_date          != ''    &&
                                                                                                                                                $price_from       == ''    &&
                                                                                                                                                $price_to         == ''
                                                                                                                                            )
                                                                                                                                            {
                                                                                                                                                // echo 'Both Duration + Date To ';exit;
                                                                                                                                                $post_ids_Array = Duration_plus_DateFrom_To($All_duration,$from_date,$to_date);

                                                                                                                                                echo  '<div class="col-sm-9">';
                                                                                                                                                if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                                                                                                {
                                                                                                                                                    foreach ($post_ids_Array as $key => $value)
                                                                                                                                                    {
                                                                                                                                                        $title = get_the_title($key);
                                                                                                                                                        foreach($value as $geturl => $description)
                                                                                                                                                        {
                                                                                                                                                            echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                            echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                                                                                            echo '<div class="col-col-9">';
                                                                                                                                                            if(Language != 'Arabic')
                                                                                                                                                            {
                                                                                                                                                                $days = 'City & Package & Between Date';
                                                                                                                                                                echo '<h2 class="m-t-0">';
                                                                                                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                                                                                                echo '</h2>';
                                                                                                                                                                echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                                                                                            }else{
                                                                                                                                                                $days = 'مدينة وحزمة وبين التسجيل';
                                                                                                                                                                echo '<h2 class="m-t-0">';
                                                                                                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                                                                                                echo '</h2><br>';
                                                                                                                                                                echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                                                                                            }
                                                                                                                                                            echo '</div>';
                                                                                                                                                            echo '</div>';
                                                                                                                                                        }
                                                                                                                                                    }

                                                                                                                                                }else{
                                                                                                                                                    echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                    echo '<div class="col-col-9">';
                                                                                                                                                    echo '<h2 class="m-t-0">';
                                                                                                                                                    if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                                                                                                    '</h2>';
                                                                                                                                                    echo '</div>';
                                                                                                                                                    echo '</div>';
                                                                                                                                                }
                                                                                                                                                echo  '</div>';

                                                                                                                                            }else
                                                                                                                                                //step 36 When user Search his required Duration + Price From
                                                                                                                                                //when All other fields  empty except Duration + Price From
                                                                                                                                                //Show Result of the required Tabs package if found
                                                                                                                                                if(
                                                                                                                                                    $All_Destination  == 'all' &&
                                                                                                                                                    $All_package      == 'all' &&
                                                                                                                                                    $All_duration     != 'all' &&
                                                                                                                                                    $from_date        == ''    &&
                                                                                                                                                    $to_date          == ''    &&
                                                                                                                                                    $price_from       != ''    &&
                                                                                                                                                    $price_to         == ''
                                                                                                                                                )
                                                                                                                                                {
                                                                                                                                                    // echo 'Both Duration + Price From ';exit;
                                                                                                                                                    $post_ids_Array = Duration_plus_Price_From($All_duration,$price_from);

                                                                                                                                                    echo  '<div class="col-sm-9">';
                                                                                                                                                    if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                                                                                                    {
                                                                                                                                                        foreach ($post_ids_Array as $key => $value)
                                                                                                                                                        {
                                                                                                                                                            $title = get_the_title($key);
                                                                                                                                                            foreach($value as $geturl => $description)
                                                                                                                                                            {
                                                                                                                                                                echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                                echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                                                                                                echo '<div class="col-col-9">';
                                                                                                                                                                if(Language != 'Arabic')
                                                                                                                                                                {
                                                                                                                                                                    $days = 'City & Package & Between Date';
                                                                                                                                                                    echo '<h2 class="m-t-0">';
                                                                                                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                                                                                                    echo '</h2>';
                                                                                                                                                                    echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                                                                                                }else{
                                                                                                                                                                    $days = 'مدينة وحزمة وبين التسجيل';
                                                                                                                                                                    echo '<h2 class="m-t-0">';
                                                                                                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                                                                                                    echo '</h2><br>';
                                                                                                                                                                    echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                                                                                                }
                                                                                                                                                                echo '</div>';
                                                                                                                                                                echo '</div>';
                                                                                                                                                            }
                                                                                                                                                        }

                                                                                                                                                    }else{
                                                                                                                                                        echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                        echo '<div class="col-col-9">';
                                                                                                                                                        echo '<h2 class="m-t-0">';
                                                                                                                                                        if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                                                                                                        '</h2>';
                                                                                                                                                        echo '</div>';
                                                                                                                                                        echo '</div>';
                                                                                                                                                    }
                                                                                                                                                    echo  '</div>';

                                                                                                                                                }else
                                                                                                                                                    //step 37 When user Search his required Duration + Price To
                                                                                                                                                    //when All other fields  empty except Duration + Price To
                                                                                                                                                    //Show Result of the required Tabs package if found
                                                                                                                                                    if(
                                                                                                                                                        $All_Destination  == 'all' &&
                                                                                                                                                        $All_package      == 'all' &&
                                                                                                                                                        $All_duration     != 'all' &&
                                                                                                                                                        $from_date        == ''    &&
                                                                                                                                                        $to_date          == ''    &&
                                                                                                                                                        $price_from       == ''    &&
                                                                                                                                                        $price_to         != ''
                                                                                                                                                    )
                                                                                                                                                    {
                                                                                                                                                        // echo 'Both Duration + Price To ';exit;
                                                                                                                                                        $post_ids_Array = Duration_plus_Price_To($All_duration,$price_to);

                                                                                                                                                        echo  '<div class="col-sm-9">';
                                                                                                                                                        if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                                                                                                        {
                                                                                                                                                            foreach ($post_ids_Array as $key => $value)
                                                                                                                                                            {
                                                                                                                                                                $title = get_the_title($key);
                                                                                                                                                                foreach($value as $geturl => $description)
                                                                                                                                                                {
                                                                                                                                                                    echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                                    echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                                                                                                    echo '<div class="col-col-9">';
                                                                                                                                                                    if(Language != 'Arabic')
                                                                                                                                                                    {
                                                                                                                                                                        $days = 'City & Package & Between Date';
                                                                                                                                                                        echo '<h2 class="m-t-0">';
                                                                                                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                                                                                                        echo '</h2>';
                                                                                                                                                                        echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                                                                                                    }else{
                                                                                                                                                                        $days = 'مدينة وحزمة وبين التسجيل';
                                                                                                                                                                        echo '<h2 class="m-t-0">';
                                                                                                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                                                                                                        echo '</h2><br>';
                                                                                                                                                                        echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                                                                                                    }
                                                                                                                                                                    echo '</div>';
                                                                                                                                                                    echo '</div>';
                                                                                                                                                                }
                                                                                                                                                            }

                                                                                                                                                        }else{
                                                                                                                                                            echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                            echo '<div class="col-col-9">';
                                                                                                                                                            echo '<h2 class="m-t-0">';
                                                                                                                                                            if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                                                                                                            '</h2>';
                                                                                                                                                            echo '</div>';
                                                                                                                                                            echo '</div>';
                                                                                                                                                        }
                                                                                                                                                        echo  '</div>';

                                                                                                                                                    }else
                                                                                                                                                        //step 38 When user Search his required Duration + Price From + Price To
                                                                                                                                                        //when All other fields  empty except Duration + Price from + Price To
                                                                                                                                                        //Show Result of the required Tabs package if found
                                                                                                                                                        if(
                                                                                                                                                            $All_Destination  == 'all' &&
                                                                                                                                                            $All_package      == 'all' &&
                                                                                                                                                            $All_duration     != 'all' &&
                                                                                                                                                            $from_date        == ''    &&
                                                                                                                                                            $to_date          == ''    &&
                                                                                                                                                            $price_from       != ''    &&
                                                                                                                                                            $price_to         != ''
                                                                                                                                                        )
                                                                                                                                                        {
                                                                                                                                                            // echo 'Both Duration + Price From + Price To ';exit;
                                                                                                                                                            $post_ids_Array = Duration_plus_Price_From_To($All_duration,$price_from ,$price_to);

                                                                                                                                                            echo  '<div class="col-sm-9">';
                                                                                                                                                            if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                                                                                                            {
                                                                                                                                                                foreach ($post_ids_Array as $key => $value)
                                                                                                                                                                {
                                                                                                                                                                    $title = get_the_title($key);
                                                                                                                                                                    foreach($value as $geturl => $description)
                                                                                                                                                                    {
                                                                                                                                                                        echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                                        echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                                                                                                        echo '<div class="col-col-9">';
                                                                                                                                                                        if(Language != 'Arabic')
                                                                                                                                                                        {
                                                                                                                                                                            $days = 'City & Package & Between Date';
                                                                                                                                                                            echo '<h2 class="m-t-0">';
                                                                                                                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                                                                                                            echo '</h2>';
                                                                                                                                                                            echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                                                                                                        }else{
                                                                                                                                                                            $days = 'مدينة وحزمة وبين التسجيل';
                                                                                                                                                                            echo '<h2 class="m-t-0">';
                                                                                                                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                                                                                                            echo '</h2><br>';
                                                                                                                                                                            echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                                                                                                        }
                                                                                                                                                                        echo '</div>';
                                                                                                                                                                        echo '</div>';
                                                                                                                                                                    }
                                                                                                                                                                }

                                                                                                                                                            }else{
                                                                                                                                                                echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                                echo '<div class="col-col-9">';
                                                                                                                                                                echo '<h2 class="m-t-0">';
                                                                                                                                                                if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                                                                                                                '</h2>';
                                                                                                                                                                echo '</div>';
                                                                                                                                                                echo '</div>';
                                                                                                                                                            }
                                                                                                                                                            echo  '</div>';

                                                                                                                                                        }else
                                                                                                                                                            //step 39 When user Search his required Destination + package + Duration + Date From
                                                                                                                                                            //when All other fields  empty except Destination + package + Duration + Date From
                                                                                                                                                            //Show Result of the required Tabs package if found
                                                                                                                                                            if(
                                                                                                                                                                $All_Destination  != 'all' &&
                                                                                                                                                                $All_package      != 'all' &&
                                                                                                                                                                $All_duration     != 'all' &&
                                                                                                                                                                $from_date        != ''    &&
                                                                                                                                                                $to_date          == ''    &&
                                                                                                                                                                $price_from       == ''    &&
                                                                                                                                                                $price_to         == ''
                                                                                                                                                            )
                                                                                                                                                            {
                                                                                                                                                                // echo 'Destination + package + Duration + Date From';exit;
                                                                                                                                                                $post_ids_Array = Dest_Dur_Pack_dateFrom($All_Destination,$All_package ,$All_duration , $from_date);

                                                                                                                                                                echo  '<div class="col-sm-9">';
                                                                                                                                                                if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                                                                                                                {
                                                                                                                                                                    foreach ($post_ids_Array as $key => $value)
                                                                                                                                                                    {
                                                                                                                                                                        $title = get_the_title($key);
                                                                                                                                                                        foreach($value as $geturl => $description)
                                                                                                                                                                        {
                                                                                                                                                                            echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                                            echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                                                                                                            echo '<div class="col-col-9">';
                                                                                                                                                                            if(Language != 'Arabic')
                                                                                                                                                                            {
                                                                                                                                                                                $days = 'City & Package & Between Date';
                                                                                                                                                                                echo '<h2 class="m-t-0">';
                                                                                                                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                                                                                                                echo '</h2>';
                                                                                                                                                                                echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                                                                                                            }else{
                                                                                                                                                                                $days = 'مدينة وحزمة وبين التسجيل';
                                                                                                                                                                                echo '<h2 class="m-t-0">';
                                                                                                                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                                                                                                                echo '</h2><br>';
                                                                                                                                                                                echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                                                                                                            }
                                                                                                                                                                            echo '</div>';
                                                                                                                                                                            echo '</div>';
                                                                                                                                                                        }
                                                                                                                                                                    }

                                                                                                                                                                }else{
                                                                                                                                                                    echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                                    echo '<div class="col-col-9">';
                                                                                                                                                                    echo '<h2 class="m-t-0">';
                                                                                                                                                                    if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                                                                                                                    '</h2>';
                                                                                                                                                                    echo '</div>';
                                                                                                                                                                    echo '</div>';
                                                                                                                                                                }
                                                                                                                                                                echo  '</div>';

                                                                                                                                                            }else
                                                                                                                                                                //step 40 When user Search his required Destination + package + Duration + Date To
                                                                                                                                                                //when All other fields  empty except Destination + package + Duration + Date To
                                                                                                                                                                //Show Result of the required Tabs package if found
                                                                                                                                                                if(
                                                                                                                                                                    $All_Destination  != 'all' &&
                                                                                                                                                                    $All_package      != 'all' &&
                                                                                                                                                                    $All_duration     != 'all' &&
                                                                                                                                                                    $from_date        == ''    &&
                                                                                                                                                                    $to_date          != ''    &&
                                                                                                                                                                    $price_from       == ''    &&
                                                                                                                                                                    $price_to         == ''
                                                                                                                                                                )
                                                                                                                                                                {
                                                                                                                                                                    // echo 'Destination + package + Duration + Date To';exit;
                                                                                                                                                                    $post_ids_Array = Dest_Dur_Pack_dateTo($All_Destination,$All_package ,$All_duration , $to_date);

                                                                                                                                                                    echo  '<div class="col-sm-9">';
                                                                                                                                                                    if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                                                                                                                    {
                                                                                                                                                                        foreach ($post_ids_Array as $key => $value)
                                                                                                                                                                        {
                                                                                                                                                                            $title = get_the_title($key);
                                                                                                                                                                            foreach($value as $geturl => $description)
                                                                                                                                                                            {
                                                                                                                                                                                echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                                                echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                                                                                                                echo '<div class="col-col-9">';
                                                                                                                                                                                if(Language != 'Arabic')
                                                                                                                                                                                {
                                                                                                                                                                                    $days = 'City & Package & Between Date';
                                                                                                                                                                                    echo '<h2 class="m-t-0">';
                                                                                                                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                                                                                                                    echo '</h2>';
                                                                                                                                                                                    echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                                                                                                                }else{
                                                                                                                                                                                    $days = 'مدينة وحزمة وبين التسجيل';
                                                                                                                                                                                    echo '<h2 class="m-t-0">';
                                                                                                                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                                                                                                                    echo '</h2><br>';
                                                                                                                                                                                    echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                                                                                                                }
                                                                                                                                                                                echo '</div>';
                                                                                                                                                                                echo '</div>';
                                                                                                                                                                            }
                                                                                                                                                                        }

                                                                                                                                                                    }else{
                                                                                                                                                                        echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                                        echo '<div class="col-col-9">';
                                                                                                                                                                        echo '<h2 class="m-t-0">';
                                                                                                                                                                        if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                                                                                                                        '</h2>';
                                                                                                                                                                        echo '</div>';
                                                                                                                                                                        echo '</div>';
                                                                                                                                                                    }
                                                                                                                                                                    echo  '</div>';

                                                                                                                                                                }else
                                                                                                                                                                    //step 41 When user Search his required Destination + package + Duration + Date From + Date To
                                                                                                                                                                    //when All other fields  empty except Destination + package + Duration + Date From + Date To
                                                                                                                                                                    //Show Result of the required Tabs package if found
                                                                                                                                                                    if(
                                                                                                                                                                        $All_Destination  != 'all' &&
                                                                                                                                                                        $All_package      != 'all' &&
                                                                                                                                                                        $All_duration     != 'all' &&
                                                                                                                                                                        $from_date        != ''    &&
                                                                                                                                                                        $to_date          != ''    &&
                                                                                                                                                                        $price_from       == ''    &&
                                                                                                                                                                        $price_to         == ''
                                                                                                                                                                    )
                                                                                                                                                                    {
                                                                                                                                                                        // echo 'Destination + package + Duration + Date From + Date To';exit;
                                                                                                                                                                        $post_ids_Array = Dest_Dur_Pack_dateFrom_To($All_Destination,$All_package ,$All_duration ,$from_date, $to_date);

                                                                                                                                                                        echo  '<div class="col-sm-9">';
                                                                                                                                                                        if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                                                                                                                        {
                                                                                                                                                                            foreach ($post_ids_Array as $key => $value)
                                                                                                                                                                            {
                                                                                                                                                                                $title = get_the_title($key);
                                                                                                                                                                                foreach($value as $geturl => $description)
                                                                                                                                                                                {
                                                                                                                                                                                    echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                                                    echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                                                                                                                    echo '<div class="col-col-9">';
                                                                                                                                                                                    if(Language != 'Arabic')
                                                                                                                                                                                    {
                                                                                                                                                                                        $days = 'City & Package & Between Date';
                                                                                                                                                                                        echo '<h2 class="m-t-0">';
                                                                                                                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                                                                                                                        echo '</h2>';
                                                                                                                                                                                        echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                                                                                                                    }else{
                                                                                                                                                                                        $days = 'مدينة وحزمة وبين التسجيل';
                                                                                                                                                                                        echo '<h2 class="m-t-0">';
                                                                                                                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                                                                                                                        echo '</h2><br>';
                                                                                                                                                                                        echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                                                                                                                    }
                                                                                                                                                                                    echo '</div>';
                                                                                                                                                                                    echo '</div>';
                                                                                                                                                                                }
                                                                                                                                                                            }

                                                                                                                                                                        }else{
                                                                                                                                                                            echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                                            echo '<div class="col-col-9">';
                                                                                                                                                                            echo '<h2 class="m-t-0">';
                                                                                                                                                                            if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                                                                                                                            '</h2>';
                                                                                                                                                                            echo '</div>';
                                                                                                                                                                            echo '</div>';
                                                                                                                                                                        }
                                                                                                                                                                        echo  '</div>';

                                                                                                                                                                    }else
                                                                                                                                                                        //step 42 When user Search his required Destination + package + Duration + Price From
                                                                                                                                                                        //when All other fields  empty except Destination + package + Duration + Price From
                                                                                                                                                                        //Show Result of the required Tabs package if found
                                                                                                                                                                        if(
                                                                                                                                                                            $All_Destination  != 'all' &&
                                                                                                                                                                            $All_package      != 'all' &&
                                                                                                                                                                            $All_duration     != 'all' &&
                                                                                                                                                                            $from_date        == ''    &&
                                                                                                                                                                            $to_date          == ''    &&
                                                                                                                                                                            $price_from       != ''    &&
                                                                                                                                                                            $price_to         == ''
                                                                                                                                                                        )
                                                                                                                                                                        {
                                                                                                                                                                            // echo 'Destination + package + Duration + Price From';exit;
                                                                                                                                                                            $post_ids_Array = Dest_Dur_Pack_PriceFrom($All_Destination,$All_package ,$All_duration ,$price_from);

                                                                                                                                                                            echo  '<div class="col-sm-9">';
                                                                                                                                                                            if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                                                                                                                            {
                                                                                                                                                                                foreach ($post_ids_Array as $key => $value)
                                                                                                                                                                                {
                                                                                                                                                                                    $title = get_the_title($key);
                                                                                                                                                                                    foreach($value as $geturl => $description)
                                                                                                                                                                                    {
                                                                                                                                                                                        echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                                                        echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                                                                                                                        echo '<div class="col-col-9">';
                                                                                                                                                                                        if(Language != 'Arabic')
                                                                                                                                                                                        {
                                                                                                                                                                                            $days = 'City & Package & Between Date';
                                                                                                                                                                                            echo '<h2 class="m-t-0">';
                                                                                                                                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                                                                                                                            echo '</h2>';
                                                                                                                                                                                            echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                                                                                                                        }else{
                                                                                                                                                                                            $days = 'مدينة وحزمة وبين التسجيل';
                                                                                                                                                                                            echo '<h2 class="m-t-0">';
                                                                                                                                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                                                                                                                            echo '</h2><br>';
                                                                                                                                                                                            echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                                                                                                                        }
                                                                                                                                                                                        echo '</div>';
                                                                                                                                                                                        echo '</div>';
                                                                                                                                                                                    }
                                                                                                                                                                                }

                                                                                                                                                                            }else{
                                                                                                                                                                                echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                                                echo '<div class="col-col-9">';
                                                                                                                                                                                echo '<h2 class="m-t-0">';
                                                                                                                                                                                if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                                                                                                                                '</h2>';
                                                                                                                                                                                echo '</div>';
                                                                                                                                                                                echo '</div>';
                                                                                                                                                                            }
                                                                                                                                                                            echo  '</div>';

                                                                                                                                                                        }else
                                                                                                                                                                            //step 43 When user Search his required Destination + package + Duration + Price To
                                                                                                                                                                            //when All other fields  empty except Destination + package + Duration + Price To
                                                                                                                                                                            //Show Result of the required Tabs package if found
                                                                                                                                                                            if(
                                                                                                                                                                                $All_Destination  != 'all' &&
                                                                                                                                                                                $All_package      != 'all' &&
                                                                                                                                                                                $All_duration     != 'all' &&
                                                                                                                                                                                $from_date        == ''    &&
                                                                                                                                                                                $to_date          == ''    &&
                                                                                                                                                                                $price_from       == ''    &&
                                                                                                                                                                                $price_to         != ''
                                                                                                                                                                            )
                                                                                                                                                                            {
                                                                                                                                                                                // echo 'Destination + package + Duration + Price To';exit;
                                                                                                                                                                                $post_ids_Array = Dest_Dur_Pack_PriceTo($All_Destination,$All_package ,$All_duration ,$price_to);

                                                                                                                                                                                echo  '<div class="col-sm-9">';
                                                                                                                                                                                if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                                                                                                                                {
                                                                                                                                                                                    foreach ($post_ids_Array as $key => $value)
                                                                                                                                                                                    {
                                                                                                                                                                                        $title = get_the_title($key);
                                                                                                                                                                                        foreach($value as $geturl => $description)
                                                                                                                                                                                        {
                                                                                                                                                                                            echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                                                            echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                                                                                                                            echo '<div class="col-col-9">';
                                                                                                                                                                                            if(Language != 'Arabic')
                                                                                                                                                                                            {
                                                                                                                                                                                                $days = 'City & Package & Between Date';
                                                                                                                                                                                                echo '<h2 class="m-t-0">';
                                                                                                                                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                                                                                                                                echo '</h2>';
                                                                                                                                                                                                echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                                                                                                                            }else{
                                                                                                                                                                                                $days = 'مدينة وحزمة وبين التسجيل';
                                                                                                                                                                                                echo '<h2 class="m-t-0">';
                                                                                                                                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                                                                                                                                echo '</h2><br>';
                                                                                                                                                                                                echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                                                                                                                            }
                                                                                                                                                                                            echo '</div>';
                                                                                                                                                                                            echo '</div>';
                                                                                                                                                                                        }
                                                                                                                                                                                    }

                                                                                                                                                                                }else{
                                                                                                                                                                                    echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                                                    echo '<div class="col-col-9">';
                                                                                                                                                                                    echo '<h2 class="m-t-0">';
                                                                                                                                                                                    if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                                                                                                                                    '</h2>';
                                                                                                                                                                                    echo '</div>';
                                                                                                                                                                                    echo '</div>';
                                                                                                                                                                                }
                                                                                                                                                                                echo  '</div>';

                                                                                                                                                                            }else
                                                                                                                                                                                //step 44 When user Search his required Destination + package + Duration + Price From + Price To
                                                                                                                                                                                //when All other fields  empty except Destination + package + Duration + Price From + Price To
                                                                                                                                                                                //Show Result of the required Tabs package if found
                                                                                                                                                                                if(
                                                                                                                                                                                    $All_Destination  != 'all' &&
                                                                                                                                                                                    $All_package      != 'all' &&
                                                                                                                                                                                    $All_duration     != 'all' &&
                                                                                                                                                                                    $from_date        == ''    &&
                                                                                                                                                                                    $to_date          == ''    &&
                                                                                                                                                                                    $price_from       != ''    &&
                                                                                                                                                                                    $price_to         != ''
                                                                                                                                                                                )
                                                                                                                                                                                {
                                                                                                                                                                                    // echo 'Destination + package + Duration + Price From + Price To';exit;
                                                                                                                                                                                    $post_ids_Array = Dest_Dur_Pack_PriceFromTo($All_Destination,$All_package ,$All_duration , $price_from ,$price_to);

                                                                                                                                                                                    echo  '<div class="col-sm-9">';
                                                                                                                                                                                    if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                                                                                                                                    {
                                                                                                                                                                                        foreach ($post_ids_Array as $key => $value)
                                                                                                                                                                                        {
                                                                                                                                                                                            $title = get_the_title($key);
                                                                                                                                                                                            foreach($value as $geturl => $description)
                                                                                                                                                                                            {
                                                                                                                                                                                                echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                                                                echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                                                                                                                                echo '<div class="col-col-9">';
                                                                                                                                                                                                if(Language != 'Arabic')
                                                                                                                                                                                                {
                                                                                                                                                                                                    $days = 'City & Package & Between Date';
                                                                                                                                                                                                    echo '<h2 class="m-t-0">';
                                                                                                                                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                                                                                                                                    echo '</h2>';
                                                                                                                                                                                                    echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                                                                                                                                }else{
                                                                                                                                                                                                    $days = 'مدينة وحزمة وبين التسجيل';
                                                                                                                                                                                                    echo '<h2 class="m-t-0">';
                                                                                                                                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                                                                                                                                    echo '</h2><br>';
                                                                                                                                                                                                    echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                                                                                                                                }
                                                                                                                                                                                                echo '</div>';
                                                                                                                                                                                                echo '</div>';
                                                                                                                                                                                            }
                                                                                                                                                                                        }

                                                                                                                                                                                    }else{
                                                                                                                                                                                        echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                                                        echo '<div class="col-col-9">';
                                                                                                                                                                                        echo '<h2 class="m-t-0">';
                                                                                                                                                                                        if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                                                                                                                                        '</h2>';
                                                                                                                                                                                        echo '</div>';
                                                                                                                                                                                        echo '</div>';
                                                                                                                                                                                    }
                                                                                                                                                                                    echo  '</div>';

                                                                                                                                                                                }else
                                                                                                                                                                                    //step 45 When user Search his required Destination + package + Duration + Date From + Price from
                                                                                                                                                                                    //when All other fields  empty except Destination + package + Duration + Date From + Price From
                                                                                                                                                                                    //Show Result of the required Tabs package if found
                                                                                                                                                                                    if(
                                                                                                                                                                                        $All_Destination  != 'all' &&
                                                                                                                                                                                        $All_package      != 'all' &&
                                                                                                                                                                                        $All_duration     != 'all' &&
                                                                                                                                                                                        $from_date        != ''    &&
                                                                                                                                                                                        $to_date          == ''    &&
                                                                                                                                                                                        $price_from       != ''    &&
                                                                                                                                                                                        $price_to         == ''
                                                                                                                                                                                    )
                                                                                                                                                                                    {
                                                                                                                                                                                        // echo 'Destination + package + Duration + Date From + Price From';exit;
                                                                                                                                                                                        $post_ids_Array = Dest_Dur_Pack_DateFromPriceFrom($All_Destination,$All_package ,$All_duration , $from_date ,$price_from);

                                                                                                                                                                                        echo  '<div class="col-sm-9">';
                                                                                                                                                                                        if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                                                                                                                                        {
                                                                                                                                                                                            foreach ($post_ids_Array as $key => $value)
                                                                                                                                                                                            {
                                                                                                                                                                                                $title = get_the_title($key);
                                                                                                                                                                                                foreach($value as $geturl => $description)
                                                                                                                                                                                                {
                                                                                                                                                                                                    echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                                                                    echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                                                                                                                                    echo '<div class="col-col-9">';
                                                                                                                                                                                                    if(Language != 'Arabic')
                                                                                                                                                                                                    {
                                                                                                                                                                                                        $days = 'City & Package & Between Date';
                                                                                                                                                                                                        echo '<h2 class="m-t-0">';
                                                                                                                                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                                                                                                                                        echo '</h2>';
                                                                                                                                                                                                        echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                                                                                                                                    }else{
                                                                                                                                                                                                        $days = 'مدينة وحزمة وبين التسجيل';
                                                                                                                                                                                                        echo '<h2 class="m-t-0">';
                                                                                                                                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                                                                                                                                        echo '</h2><br>';
                                                                                                                                                                                                        echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                                                                                                                                    }
                                                                                                                                                                                                    echo '</div>';
                                                                                                                                                                                                    echo '</div>';
                                                                                                                                                                                                }
                                                                                                                                                                                            }

                                                                                                                                                                                        }else{
                                                                                                                                                                                            echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                                                            echo '<div class="col-col-9">';
                                                                                                                                                                                            echo '<h2 class="m-t-0">';
                                                                                                                                                                                            if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                                                                                                                                            '</h2>';
                                                                                                                                                                                            echo '</div>';
                                                                                                                                                                                            echo '</div>';
                                                                                                                                                                                        }
                                                                                                                                                                                        echo  '</div>';

                                                                                                                                                                                    }else
                                                                                                                                                                                        //step 46 When user Search his required Destination + package + Duration + Date From + Price To
                                                                                                                                                                                        //when All other fields  empty except Destination + package + Duration + Date From + Price To
                                                                                                                                                                                        //Show Result of the required Tabs package if found
                                                                                                                                                                                        if(
                                                                                                                                                                                            $All_Destination  != 'all' &&
                                                                                                                                                                                            $All_package      != 'all' &&
                                                                                                                                                                                            $All_duration     != 'all' &&
                                                                                                                                                                                            $from_date        != ''    &&
                                                                                                                                                                                            $to_date          == ''    &&
                                                                                                                                                                                            $price_from       == ''    &&
                                                                                                                                                                                            $price_to         != ''
                                                                                                                                                                                        )
                                                                                                                                                                                        {
                                                                                                                                                                                            // echo 'Destination + package + Duration + Date From + Price From';exit;
                                                                                                                                                                                            $post_ids_Array = Dest_Dur_Pack_DateFromPriceTo($All_Destination,$All_package ,$All_duration , $from_date ,$price_to);

                                                                                                                                                                                            echo  '<div class="col-sm-9">';
                                                                                                                                                                                            if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                                                                                                                                            {
                                                                                                                                                                                                foreach ($post_ids_Array as $key => $value)
                                                                                                                                                                                                {
                                                                                                                                                                                                    $title = get_the_title($key);
                                                                                                                                                                                                    foreach($value as $geturl => $description)
                                                                                                                                                                                                    {
                                                                                                                                                                                                        echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                                                                        echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                                                                                                                                        echo '<div class="col-col-9">';
                                                                                                                                                                                                        if(Language != 'Arabic')
                                                                                                                                                                                                        {
                                                                                                                                                                                                            $days = 'City & Package & Between Date';
                                                                                                                                                                                                            echo '<h2 class="m-t-0">';
                                                                                                                                                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                                                                                                                                            echo '</h2>';
                                                                                                                                                                                                            echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                                                                                                                                        }else{
                                                                                                                                                                                                            $days = 'مدينة وحزمة وبين التسجيل';
                                                                                                                                                                                                            echo '<h2 class="m-t-0">';
                                                                                                                                                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                                                                                                                                            echo '</h2><br>';
                                                                                                                                                                                                            echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                                                                                                                                        }
                                                                                                                                                                                                        echo '</div>';
                                                                                                                                                                                                        echo '</div>';
                                                                                                                                                                                                    }
                                                                                                                                                                                                }

                                                                                                                                                                                            }else{
                                                                                                                                                                                                echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                                                                echo '<div class="col-col-9">';
                                                                                                                                                                                                echo '<h2 class="m-t-0">';
                                                                                                                                                                                                if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                                                                                                                                                '</h2>';
                                                                                                                                                                                                echo '</div>';
                                                                                                                                                                                                echo '</div>';
                                                                                                                                                                                            }
                                                                                                                                                                                            echo  '</div>';

                                                                                                                                                                                        }else
                                                                                                                                                                                            //step 47 When user Search his required Destination + package + Duration + Date From + Price From + Price To
                                                                                                                                                                                            //when All other fields  empty except Destination + package + Duration + Date From + Price From + Price To
                                                                                                                                                                                            //Show Result of the required Tabs package if found
                                                                                                                                                                                            if(
                                                                                                                                                                                                $All_Destination  != 'all' &&
                                                                                                                                                                                                $All_package      != 'all' &&
                                                                                                                                                                                                $All_duration     != 'all' &&
                                                                                                                                                                                                $from_date        != ''    &&
                                                                                                                                                                                                $to_date          == ''    &&
                                                                                                                                                                                                $price_from       != ''    &&
                                                                                                                                                                                                $price_to         != ''
                                                                                                                                                                                            )
                                                                                                                                                                                            {
                                                                                                                                                                                                // echo 'Destination + package + Duration + Date From + Price From +Price To';exit;
                                                                                                                                                                                                $post_ids_Array = Dest_Dur_Pack_DateFromPriceFromTo($All_Destination,$All_package ,$All_duration , $from_date ,$price_from , $price_to);

                                                                                                                                                                                                echo  '<div class="col-sm-9">';
                                                                                                                                                                                                if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                                                                                                                                                {
                                                                                                                                                                                                    foreach ($post_ids_Array as $key => $value)
                                                                                                                                                                                                    {
                                                                                                                                                                                                        $title = get_the_title($key);
                                                                                                                                                                                                        foreach($value as $geturl => $description)
                                                                                                                                                                                                        {
                                                                                                                                                                                                            echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                                                                            echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                                                                                                                                            echo '<div class="col-col-9">';
                                                                                                                                                                                                            if(Language != 'Arabic')
                                                                                                                                                                                                            {
                                                                                                                                                                                                                $days = 'City & Package & Between Date';
                                                                                                                                                                                                                echo '<h2 class="m-t-0">';
                                                                                                                                                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                                                                                                                                                echo '</h2>';
                                                                                                                                                                                                                echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                                                                                                                                            }else{
                                                                                                                                                                                                                $days = 'مدينة وحزمة وبين التسجيل';
                                                                                                                                                                                                                echo '<h2 class="m-t-0">';
                                                                                                                                                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                                                                                                                                                echo '</h2><br>';
                                                                                                                                                                                                                echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                                                                                                                                            }
                                                                                                                                                                                                            echo '</div>';
                                                                                                                                                                                                            echo '</div>';
                                                                                                                                                                                                        }
                                                                                                                                                                                                    }

                                                                                                                                                                                                }else{
                                                                                                                                                                                                    echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                                                                    echo '<div class="col-col-9">';
                                                                                                                                                                                                    echo '<h2 class="m-t-0">';
                                                                                                                                                                                                    if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                                                                                                                                                    '</h2>';
                                                                                                                                                                                                    echo '</div>';
                                                                                                                                                                                                    echo '</div>';
                                                                                                                                                                                                }
                                                                                                                                                                                                echo  '</div>';

                                                                                                                                                                                            }else
                                                                                                                                                                                                //step 48 When user Search his required Destination + package + Duration + Date To + Price From
                                                                                                                                                                                                //when All other fields  empty except Destination + package + Duration + Date To + Price From
                                                                                                                                                                                                //Show Result of the required Tabs package if found
                                                                                                                                                                                                if(
                                                                                                                                                                                                    $All_Destination  != 'all' &&
                                                                                                                                                                                                    $All_package      != 'all' &&
                                                                                                                                                                                                    $All_duration     != 'all' &&
                                                                                                                                                                                                    $from_date        == ''    &&
                                                                                                                                                                                                    $to_date          != ''    &&
                                                                                                                                                                                                    $price_from       != ''    &&
                                                                                                                                                                                                    $price_to         == ''
                                                                                                                                                                                                )
                                                                                                                                                                                                {
                                                                                                                                                                                                    // echo 'Destination + package + Duration + Date To + Price From ';exit;
                                                                                                                                                                                                    $post_ids_Array = Dest_Dur_Pack_DateToPriceFrom($All_Destination,$All_package ,$All_duration , $to_date ,$price_from );

                                                                                                                                                                                                    echo  '<div class="col-sm-9">';
                                                                                                                                                                                                    if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                                                                                                                                                    {
                                                                                                                                                                                                        foreach ($post_ids_Array as $key => $value)
                                                                                                                                                                                                        {
                                                                                                                                                                                                            $title = get_the_title($key);
                                                                                                                                                                                                            foreach($value as $geturl => $description)
                                                                                                                                                                                                            {
                                                                                                                                                                                                                echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                                                                                echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                                                                                                                                                echo '<div class="col-col-9">';
                                                                                                                                                                                                                if(Language != 'Arabic')
                                                                                                                                                                                                                {
                                                                                                                                                                                                                    $days = 'City & Package & Between Date';
                                                                                                                                                                                                                    echo '<h2 class="m-t-0">';
                                                                                                                                                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                                                                                                                                                    echo '</h2>';
                                                                                                                                                                                                                    echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                                                                                                                                                }else{
                                                                                                                                                                                                                    $days = 'مدينة وحزمة وبين التسجيل';
                                                                                                                                                                                                                    echo '<h2 class="m-t-0">';
                                                                                                                                                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                                                                                                                                                    echo '</h2><br>';
                                                                                                                                                                                                                    echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                                                                                                                                                }
                                                                                                                                                                                                                echo '</div>';
                                                                                                                                                                                                                echo '</div>';
                                                                                                                                                                                                            }
                                                                                                                                                                                                        }

                                                                                                                                                                                                    }else{
                                                                                                                                                                                                        echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                                                                        echo '<div class="col-col-9">';
                                                                                                                                                                                                        echo '<h2 class="m-t-0">';
                                                                                                                                                                                                        if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                                                                                                                                                        '</h2>';
                                                                                                                                                                                                        echo '</div>';
                                                                                                                                                                                                        echo '</div>';
                                                                                                                                                                                                    }
                                                                                                                                                                                                    echo  '</div>';

                                                                                                                                                                                                }else
                                                                                                                                                                                                    //step 49 When user Search his required Destination + package + Duration + Date To + Price To
                                                                                                                                                                                                    //when All other fields  empty except Destination + package + Duration + Date To + Price To
                                                                                                                                                                                                    //Show Result of the required Tabs package if found
                                                                                                                                                                                                    if(
                                                                                                                                                                                                        $All_Destination  != 'all' &&
                                                                                                                                                                                                        $All_package      != 'all' &&
                                                                                                                                                                                                        $All_duration     != 'all' &&
                                                                                                                                                                                                        $from_date        == ''    &&
                                                                                                                                                                                                        $to_date          != ''    &&
                                                                                                                                                                                                        $price_from       == ''    &&
                                                                                                                                                                                                        $price_to         != ''
                                                                                                                                                                                                    )
                                                                                                                                                                                                    {
                                                                                                                                                                                                        // echo 'Destination + package + Duration + Date To + Price To ';exit;
                                                                                                                                                                                                        $post_ids_Array = Dest_Dur_Pack_DateToPriceTo($All_Destination,$All_package ,$All_duration , $to_date ,$price_to );

                                                                                                                                                                                                        echo  '<div class="col-sm-9">';
                                                                                                                                                                                                        if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                                                                                                                                                        {
                                                                                                                                                                                                            foreach ($post_ids_Array as $key => $value)
                                                                                                                                                                                                            {
                                                                                                                                                                                                                $title = get_the_title($key);
                                                                                                                                                                                                                foreach($value as $geturl => $description)
                                                                                                                                                                                                                {
                                                                                                                                                                                                                    echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                                                                                    echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                                                                                                                                                    echo '<div class="col-col-9">';
                                                                                                                                                                                                                    if(Language != 'Arabic')
                                                                                                                                                                                                                    {
                                                                                                                                                                                                                        $days = 'City & Package & Between Date';
                                                                                                                                                                                                                        echo '<h2 class="m-t-0">';
                                                                                                                                                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                                                                                                                                                        echo '</h2>';
                                                                                                                                                                                                                        echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                                                                                                                                                    }else{
                                                                                                                                                                                                                        $days = 'مدينة وحزمة وبين التسجيل';
                                                                                                                                                                                                                        echo '<h2 class="m-t-0">';
                                                                                                                                                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                                                                                                                                                        echo '</h2><br>';
                                                                                                                                                                                                                        echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                                                                                                                                                    }
                                                                                                                                                                                                                    echo '</div>';
                                                                                                                                                                                                                    echo '</div>';
                                                                                                                                                                                                                }
                                                                                                                                                                                                            }

                                                                                                                                                                                                        }else{
                                                                                                                                                                                                            echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                                                                            echo '<div class="col-col-9">';
                                                                                                                                                                                                            echo '<h2 class="m-t-0">';
                                                                                                                                                                                                            if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                                                                                                                                                            '</h2>';
                                                                                                                                                                                                            echo '</div>';
                                                                                                                                                                                                            echo '</div>';
                                                                                                                                                                                                        }
                                                                                                                                                                                                        echo  '</div>';

                                                                                                                                                                                                    }else
                                                                                                                                                                                                        //step 50 When user Search his required Destination + package + Duration + Date To + Price From + Price To
                                                                                                                                                                                                        //when All other fields  empty except Destination + package + Duration + Date To + Price From + Price To
                                                                                                                                                                                                        //Show Result of the required Tabs package if found
                                                                                                                                                                                                        if(
                                                                                                                                                                                                            $All_Destination  != 'all' &&
                                                                                                                                                                                                            $All_package      != 'all' &&
                                                                                                                                                                                                            $All_duration     != 'all' &&
                                                                                                                                                                                                            $from_date        == ''    &&
                                                                                                                                                                                                            $to_date          != ''    &&
                                                                                                                                                                                                            $price_from       != ''    &&
                                                                                                                                                                                                            $price_to         != ''
                                                                                                                                                                                                        )
                                                                                                                                                                                                        {
                                                                                                                                                                                                            // echo 'Destination + package + Duration + Date To + Price From + Price To ';exit;
                                                                                                                                                                                                            $post_ids_Array = Dest_Dur_Pack_DateToPriceFromTo($All_Destination,$All_package ,$All_duration , $to_date ,$price_from , $price_to );

                                                                                                                                                                                                            echo  '<div class="col-sm-9">';
                                                                                                                                                                                                            if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                                                                                                                                                            {
                                                                                                                                                                                                                foreach ($post_ids_Array as $key => $value)
                                                                                                                                                                                                                {
                                                                                                                                                                                                                    $title = get_the_title($key);
                                                                                                                                                                                                                    foreach($value as $geturl => $description)
                                                                                                                                                                                                                    {
                                                                                                                                                                                                                        echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                                                                                        echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                                                                                                                                                        echo '<div class="col-col-9">';
                                                                                                                                                                                                                        if(Language != 'Arabic')
                                                                                                                                                                                                                        {
                                                                                                                                                                                                                            $days = 'City & Package & Between Date';
                                                                                                                                                                                                                            echo '<h2 class="m-t-0">';
                                                                                                                                                                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                                                                                                                                                            echo '</h2>';
                                                                                                                                                                                                                            echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                                                                                                                                                        }else{
                                                                                                                                                                                                                            $days = 'مدينة وحزمة وبين التسجيل';
                                                                                                                                                                                                                            echo '<h2 class="m-t-0">';
                                                                                                                                                                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                                                                                                                                                            echo '</h2><br>';
                                                                                                                                                                                                                            echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                                                                            echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                                                                                                                                                        }
                                                                                                                                                                                                                        echo '</div>';
                                                                                                                                                                                                                        echo '</div>';
                                                                                                                                                                                                                    }
                                                                                                                                                                                                                }

                                                                                                                                                                                                            }else{
                                                                                                                                                                                                                echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                                                                                echo '<div class="col-col-9">';
                                                                                                                                                                                                                echo '<h2 class="m-t-0">';
                                                                                                                                                                                                                if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                                                                                                                                                                '</h2>';
                                                                                                                                                                                                                echo '</div>';
                                                                                                                                                                                                                echo '</div>';
                                                                                                                                                                                                            }
                                                                                                                                                                                                            echo  '</div>';

                                                                                                                                                                                                        }else
                                                                                                                                                                                                            //step 51 When user Search his required Destination + package + Duration + Date From + Date To + Price From
                                                                                                                                                                                                            //when All other fields  empty except Destination + package + Duration + Date To + Date From + Price From
                                                                                                                                                                                                            //Show Result of the required Tabs package if found
                                                                                                                                                                                                            if(
                                                                                                                                                                                                                $All_Destination  != 'all' &&
                                                                                                                                                                                                                $All_package      != 'all' &&
                                                                                                                                                                                                                $All_duration     != 'all' &&
                                                                                                                                                                                                                $from_date        != ''    &&
                                                                                                                                                                                                                $to_date          != ''    &&
                                                                                                                                                                                                                $price_from       != ''    &&
                                                                                                                                                                                                                $price_to         == ''
                                                                                                                                                                                                            )
                                                                                                                                                                                                            {
                                                                                                                                                                                                                // echo 'Destination + package + Duration +Date To + Date From + Price From ';exit;
                                                                                                                                                                                                                $post_ids_Array = Dest_Dur_Pack_DateFromToPriceFrom($All_Destination,$All_package ,$All_duration ,$from_date , $to_date ,$price_from );

                                                                                                                                                                                                                echo  '<div class="col-sm-9">';
                                                                                                                                                                                                                if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                                                                                                                                                                {
                                                                                                                                                                                                                    foreach ($post_ids_Array as $key => $value)
                                                                                                                                                                                                                    {
                                                                                                                                                                                                                        $title = get_the_title($key);
                                                                                                                                                                                                                        foreach($value as $geturl => $description)
                                                                                                                                                                                                                        {
                                                                                                                                                                                                                            echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                                                                                            echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                                                                                                                                                            echo '<div class="col-col-9">';
                                                                                                                                                                                                                            if(Language != 'Arabic')
                                                                                                                                                                                                                            {
                                                                                                                                                                                                                                $days = 'City & Package & Between Date';
                                                                                                                                                                                                                                echo '<h2 class="m-t-0">';
                                                                                                                                                                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                                                                                                                                                                echo '</h2>';
                                                                                                                                                                                                                                echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                                                                                                                                                            }else{
                                                                                                                                                                                                                                $days = 'مدينة وحزمة وبين التسجيل';
                                                                                                                                                                                                                                echo '<h2 class="m-t-0">';
                                                                                                                                                                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                                                                                                                                                                echo '</h2><br>';
                                                                                                                                                                                                                                echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                                                                                echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                                                                                                                                                            }
                                                                                                                                                                                                                            echo '</div>';
                                                                                                                                                                                                                            echo '</div>';
                                                                                                                                                                                                                        }
                                                                                                                                                                                                                    }

                                                                                                                                                                                                                }else{
                                                                                                                                                                                                                    echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                                                                                    echo '<div class="col-col-9">';
                                                                                                                                                                                                                    echo '<h2 class="m-t-0">';
                                                                                                                                                                                                                    if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                                                                                                                                                                    '</h2>';
                                                                                                                                                                                                                    echo '</div>';
                                                                                                                                                                                                                    echo '</div>';
                                                                                                                                                                                                                }
                                                                                                                                                                                                                echo  '</div>';

                                                                                                                                                                                                            }else
                                                                                                                                                                                                                //step 52 When user Search his required Destination + package + Duration + Date From + Date To + Price To
                                                                                                                                                                                                                //when All other fields  empty except Destination + package + Duration + Date To + Date From + Price To
                                                                                                                                                                                                                //Show Result of the required Tabs package if found
                                                                                                                                                                                                                if(
                                                                                                                                                                                                                    $All_Destination  != 'all' &&
                                                                                                                                                                                                                    $All_package      != 'all' &&
                                                                                                                                                                                                                    $All_duration     != 'all' &&
                                                                                                                                                                                                                    $from_date        != ''    &&
                                                                                                                                                                                                                    $to_date          != ''    &&
                                                                                                                                                                                                                    $price_from       == ''    &&
                                                                                                                                                                                                                    $price_to         != ''
                                                                                                                                                                                                                )
                                                                                                                                                                                                                {
                                                                                                                                                                                                                    // echo 'Destination + package + Duration +Date To + Date From + Price To ';exit;
                                                                                                                                                                                                                    $post_ids_Array = Dest_Dur_Pack_DateFromToPriceTo($All_Destination,$All_package ,$All_duration ,$from_date , $to_date ,$price_to );

                                                                                                                                                                                                                    echo  '<div class="col-sm-9">';
                                                                                                                                                                                                                    if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                                                                                                                                                                    {
                                                                                                                                                                                                                        foreach ($post_ids_Array as $key => $value)
                                                                                                                                                                                                                        {
                                                                                                                                                                                                                            $title = get_the_title($key);
                                                                                                                                                                                                                            foreach($value as $geturl => $description)
                                                                                                                                                                                                                            {
                                                                                                                                                                                                                                echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                                                                                                echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                                                                                                                                                                echo '<div class="col-col-9">';
                                                                                                                                                                                                                                if(Language != 'Arabic')
                                                                                                                                                                                                                                {
                                                                                                                                                                                                                                    $days = 'City & Package & Between Date';
                                                                                                                                                                                                                                    echo '<h2 class="m-t-0">';
                                                                                                                                                                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                                                                                                                                                                    echo '</h2>';
                                                                                                                                                                                                                                    echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                                                                                                                                                                }else{
                                                                                                                                                                                                                                    $days = 'مدينة وحزمة وبين التسجيل';
                                                                                                                                                                                                                                    echo '<h2 class="m-t-0">';
                                                                                                                                                                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                                                                                                                                                                    echo '</h2><br>';
                                                                                                                                                                                                                                    echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                                                                                    echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                echo '</div>';
                                                                                                                                                                                                                                echo '</div>';
                                                                                                                                                                                                                            }
                                                                                                                                                                                                                        }

                                                                                                                                                                                                                    }else{
                                                                                                                                                                                                                        echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                                                                                        echo '<div class="col-col-9">';
                                                                                                                                                                                                                        echo '<h2 class="m-t-0">';
                                                                                                                                                                                                                        if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                                                                                                                                                                        '</h2>';
                                                                                                                                                                                                                        echo '</div>';
                                                                                                                                                                                                                        echo '</div>';
                                                                                                                                                                                                                    }
                                                                                                                                                                                                                    echo  '</div>';

                                                                                                                                                                                                                }else
                                                                                                                                                                                                                    //step 53 When user Search his required Destination + package + Duration + Date From + Date To + Price To + Price From
                                                                                                                                                                                                                    //when All other fields  empty except Destination + package + Duration + Date To + Date From + Price To + Price From
                                                                                                                                                                                                                    //Show Result of the required Tabs package if found
                                                                                                                                                                                                                    if(
                                                                                                                                                                                                                        $All_Destination  != 'all' &&
                                                                                                                                                                                                                        $All_package      != 'all' &&
                                                                                                                                                                                                                        $All_duration     != 'all' &&
                                                                                                                                                                                                                        $from_date        != ''    &&
                                                                                                                                                                                                                        $to_date          != ''    &&
                                                                                                                                                                                                                        $price_from       != ''    &&
                                                                                                                                                                                                                        $price_to         != ''
                                                                                                                                                                                                                    )
                                                                                                                                                                                                                    {
                                                                                                                                                                                                                        // echo 'Destination + package + Duration + Date To + Date From + Price To + Price From';exit;
                                                                                                                                                                                                                        $post_ids_Array = Dest_Dur_Pack_DateFromToPriceFromTo($All_Destination,$All_package ,$All_duration ,$from_date , $to_date ,$price_from,$price_to );

                                                                                                                                                                                                                        echo  '<div class="col-sm-9">';
                                                                                                                                                                                                                        if (is_array($post_ids_Array) && !empty($post_ids_Array))
                                                                                                                                                                                                                        {
                                                                                                                                                                                                                            foreach ($post_ids_Array as $key => $value)
                                                                                                                                                                                                                            {
                                                                                                                                                                                                                                $title = get_the_title($key);
                                                                                                                                                                                                                                foreach($value as $geturl => $description)
                                                                                                                                                                                                                                {
                                                                                                                                                                                                                                    echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                                                                                                    echo '<div class="col-col-3 arrow"><i class="fa fa-arrow-'.$ArrowDirection.' fa-3x" aria-hidden="true"></i></div>';
                                                                                                                                                                                                                                    echo '<div class="col-col-9">';
                                                                                                                                                                                                                                    if(Language != 'Arabic')
                                                                                                                                                                                                                                    {
                                                                                                                                                                                                                                        $days = 'City & Package & Between Date';
                                                                                                                                                                                                                                        echo '<h2 class="m-t-0">';
                                                                                                                                                                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. ucfirst($days) . ' Packages for ' . ucfirst($title) .'</a>';
                                                                                                                                                                                                                                        echo '</h2>';
                                                                                                                                                                                                                                        echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >View Detail</h3></a>';

                                                                                                                                                                                                                                    }else{
                                                                                                                                                                                                                                        $days = 'مدينة وحزمة وبين التسجيل';
                                                                                                                                                                                                                                        echo '<h2 class="m-t-0">';
                                                                                                                                                                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'"">'. $days . ' حزم إلى ' . ucfirst($title) .'</a>';
                                                                                                                                                                                                                                        echo '</h2><br>';
                                                                                                                                                                                                                                        echo '<div class="entry">'.$description. '</div>';
                                                                                                                                                                                                                                        echo '<a href="'.$geturl.'" rel="bookmark" title="Package for '.$title.'""><h3 class="m-t-0" >عرض التفاصيل</h3></a>';

                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                    echo '</div>';
                                                                                                                                                                                                                                    echo '</div>';
                                                                                                                                                                                                                                }
                                                                                                                                                                                                                            }

                                                                                                                                                                                                                        }else{
                                                                                                                                                                                                                            echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                                                                                            echo '<div class="col-col-9">';
                                                                                                                                                                                                                            echo '<h2 class="m-t-0">';
                                                                                                                                                                                                                            if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                                                                                                                                                                            '</h2>';
                                                                                                                                                                                                                            echo '</div>';
                                                                                                                                                                                                                            echo '</div>';
                                                                                                                                                                                                                        }
                                                                                                                                                                                                                        echo  '</div>';

                                                                                                                                                                                                                    }else{
                                                                                                                                                                                                                        echo '<div class="col-sm-12 m-b-25 qwe">';
                                                                                                                                                                                                                        echo '<div class="col-col-9">';
                                                                                                                                                                                                                        echo '<h2 class="m-t-0">';
                                                                                                                                                                                                                        if(Language =="Arabic"){echo 'معذرة...! لا جولة الحزم تم العثور عليها';}else{ echo 'Sorry...! No Tour Packages Found';}
                                                                                                                                                                                                                        '</h2>';
                                                                                                                                                                                                                        echo '</div>';
                                                                                                                                                                                                                        echo '</div>';
                                                                                                                                                                                                                    }
                                                                                                                                                                                                                    echo  '</div>';
