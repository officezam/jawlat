<?php/** * The template for displaying the footer * * Contains the closing of the #content div and all content after * * @package WordPress * @subpackage Twenty_Sixteen * @since Twenty Sixteen 1.0 */?>

<footer>
  <div class="inner-container footer-width">
    <div class="social-icon" >
      <style>					
@media (min-width: 800px) {						.bottom_post {							padding-left: 360px;						}					}				
</style>
      <?php   if ( function_exists(dynamic_sidebar('Footer Social Icon')) ) :					dynamic_sidebar('Footer Social Icon');				endif;				?>
    </div>
    <div class="footer-menu">
      <?php if( Language != 'Arabic'){ ?>
      <h1 style="color:white;"><?php echo homepage_content_title('englishadress' , 'post_title'); ?></h1>
      <p></p>
      <?php echo homepage_content_title('englishadress' , 'post_content'); ?>
      </p>
      <?php }else{ ?>
      <h1 style="color:white;"><?php echo homepage_content_title('arabicaddrees' , 'post_title'); ?></h1>
      <p></p>
      <?php echo homepage_content_title('arabicaddrees' , 'post_content'); ?>
      </p>
      <?php } ?>
    </div>
    <div class="footer-menu">
      <style>
            @media (max-width: 800px)
            { .menu{ display: none;}}
            ul li:hover{
                /*background: linear-gradient(to bottom, rgba(113,14,10,1) 0%, rgba(133,13,6,1) 36%, rgba(133,13,6,1) 50%, rgba(135,12,6,1) 55%, rgba(155,13,3,1) 100%);*/
                color: #fff;}
            .sub-menu{display: none;}
            ul li:hover ul {
                display:block;
            }
        </style>
      <?php
      if( Language == 'Arabic')
      {
          //wp_nav_menu( array( 'theme_location' => 'my-custom-menu', 'menu_class' => 'nav-menu','depth' => 1 , 'sub_menu'  => true ,) );
          wp_nav_menu( array('theme_location' => 'my-custom-menu'));
      }else{
         // wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu','depth' => 1 , 'sub_menu'  => true ,) );
         wp_nav_menu( array('theme_location' => 'primary' ));
      }
      ?>
    </div>
    <div class="copyright">
      <p>
        <?php if( Language != 'Arabic') { ?>
        All Rights Reserved. Copyright © 2016.
        <?php }else{ ?>
        كل الحقوق محفوظة. جميع الحقوق محفوظة © 2016.
        <?php } ?>
      </p>
    </div>
  </div>
</footer>
<script src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="<?php echo home_url(); ?>/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<script>$(function() {$( "#tabs" ).tabs();});</script>
 <script>
 $(document).ready(function(){    
 
 $("#add_more").click(function(event){
	 
	 event.preventDefault();
	 var counterVal = $("#counter").val();
	 var newVal = parseInt(counterVal ) + 1;
	 $.post('http://www.jawlat.com.sa/wp-admin/admin-ajax.php',{'action' : 'my_action' ,'newVal' : newVal },function (response) {
	 $('#replace_country'+newVal).replaceWith(response);
	 	    });	    
			$.post('http://www.jawlat.com.sa/wp-admin/admin-ajax.php' , {'action' : 'destination_action' , 'newVal' : newVal} , function (response) {
			$('#destination'+newVal).replaceWith(response);
			});	    
			if (newVal > 7){	
			alert("You can add maximum 7 Destinations. For adding more destinations, please contact us.");	
			}	
			$("#block" + newVal).show();	
			$("#counter").val(newVal);	
			});
			});
            </script>
<script type="text/javascript" src="http://www.jawlat.com.sa/wp-content/themes/jawalt_theme/js/jquery-1.11.3.js" ></script>
	
    <script>	
	$.post('http://www.jawlat.com.sa/wp-admin/admin-ajax.php' , {'action' : 'my_action' , 'newVal' : '1' } , function (response) {
	$('#replace_country1').replaceWith(response);	
	});	
	
	$.post('http://www.jawlat.com.sa/wp-admin/admin-ajax.php' , {'action' : 'destination_action' , 'newVal' : '1'} , function (response) {
	$('#destination1').replaceWith(response);	
	});
	function fetch_hotels(value , htmlvalue){	
	$.post('http://www.jawlat.com.sa/wp-admin/admin-ajax.php' , {'action' : 'get_hotels' , 'post_id':value , 'htmlvalue':htmlvalue} , function (response) {
	$('#hotel_show'+htmlvalue).replaceWith(response[0]);		
	$('#replace_able'+htmlvalue).replaceWith(response[0]);		
	$('#hide'+htmlvalue).val(response[1]);	
	});
	}
    </script>
    <!-- cdn for modernizr, if you haven't included it already -->
	<script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
    <!-- polyfiller file to detect and load polyfills -->
	<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
	<script>
	webshims.setOptions('waitReady', false);	
	webshims.setOptions('forms-ext', {types: 'date'});	
	webshims.polyfill('forms forms-ext');
    </script>
<script>

    $(window).scroll(function () {
        if($(window).scrollTop() > 790){
            $( ".container2" ).addClass( "menu-custom" );
            //console.log($(window).scrollTop());
        }else{
            $( ".container2" ).removeClass( "menu-custom" );
        }
    });

    $(window).scroll(function () {
        if($(window).scrollTop() > 600){
            $( ".travel-box-1" ).addClass( "fadeInLeft animated" );
            $( ".travel-box-2" ).addClass( "fadeInUp animated" );
            $( ".travel-box-3" ).addClass( "fadeInDown animated" );
            $( ".travel-box-4" ).addClass( "fadeInRight animated" );
            //console.log($(window).scrollTop());
        }else{
            $( ".travel-box-1" ).removeClass( "fadeInLeft animated" );
            $( ".travel-box-2" ).removeClass( "fadeInUp animated" );
            $( ".travel-box-3" ).removeClass( "fadeInDown animated" );
            $( ".travel-box-4" ).removeClass( "fadeInRight animated" );
        }

        if($(window).scrollTop() > 1100){
            $( ".map-container2" ).addClass( "fadeInLeft animated" );
            $( ".search_option" ).addClass( "fadeInRight animated" );
        }else{
            $( ".map-container2" ).removeClass( "fadeInLeft animated" );
            $( ".search_option" ).removeClass( "fadeInRight animated" );

        }
        if($(window).scrollTop() > 2700){
            $( ".promotion-widget" ).addClass( "fadeInLeft animated" );
            $( ".footer-width" ).addClass( "fadeInUp animated" );
        }else{
            $( ".promotion-widget" ).removeClass( "fadeInLeft animated" );
            $( ".footer-width" ).removeClass( "fadeInUp animated" );
        }



    });

//       $(document).ready(function () {
//           $('.tourpackages').children('h2').addClass('col-sm-12 headeing');
//       });

//    var i;
//    for (i = 0; i <= 4; i++) {
//        $(".travel-box-"+i).mouseover(function () {
//            $(this).find('div.entry').addClass("rotateIn animated show");
//        }).mouseleave(function () {
//            $(this).find('div.entry').hide(1000, function () {
//                $('.entry').removeClass("rotateIn animated show");
//            });
//        });
//    }




</script>
<?php wp_footer(); ?>
</body>

</html>