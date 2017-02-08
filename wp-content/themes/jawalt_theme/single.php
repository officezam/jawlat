<?php get_header(); ?>
<style>

.entry-footer {
	display: none
}

.destination-content h5.destination-name, .destination-specs h5, .box-region h5.region-name, .box-tour h5.tour-title, .box-tour .tour-experience h5 {
	font-family: Cambria;
	font-size: 24px;
	padding-bottom: 20px;
}
.destination-specs ul {
	list-style-type: circle;
}
.ui-tabs .ui-tabs-nav .ui-tabs-anchor {
	float: left;
	padding: 0.5em 1em;
	text-decoration: none;
}
.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default, .ui-button, html .ui-button.ui-state-disabled:hover, html .ui-button.ui-state-disabled:active {
	background: #ffffff none repeat scroll 0 0;
	border: 1px solid #c5c5c5;
	color: #454545;
	font-weight: normal;
}
.ui-tabs .ui-tabs-nav .ui-tabs-anchor {
	float: left;
	padding: 0.5em 1em;
	text-decoration: none;
}
.ui-tabs .ui-tabs-nav li {
	border-bottom-width: 0;
	float: left;
	list-style: outside none none;
	margin: 1px 0.2em 0 0;
	padding: 0;
	position: relative;
	top: 0;
	white-space: nowrap;
}
.ui-tabs .ui-tabs-nav li.ui-tabs-active {
	margin-bottom: -1px;
	padding-bottom: 1px;
}
.ui-helper-clearfix::before, .ui-helper-clearfix::after {
	border-collapse: collapse;
	content: "";
	display: table;
}
.ui-corner-all, .ui-corner-bottom, .ui-corner-right, .ui-corner-br {
	border-bottom-right-radius: 3px;
}
.ui-tabs .ui-tabs-panel {
	background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
	border-width: 0;
	display: block;
	float: left;
	padding: 20px 0;
}
.ui-widget-header {
	background: #e9e9e9 none repeat scroll 0 0;
	border: 1px solid #dddddd;
	color: #333333;
	font-weight: bold;
}
.ui-tabs .ui-tabs-nav li.ui-tabs-active {
	margin-bottom: -1px;
	padding-bottom: 1px;
}
.ui-corner-all, .ui-corner-bottom, .ui-corner-left, .ui-corner-bl {
	border-bottom-left-radius: 3px;
}
.ui-widget-content {
	background: #ffffff none repeat scroll 0 0;
	color: #333333;
}
.ui-widget-header {
	background: #e9e9e9 none repeat scroll 0 0;
	border: 1px solid #dddddd;
	color: #333333;
	font-weight: bold;
}
.ui-helper-reset {
	border: 0 none;
	font-size: 100%;
	line-height: 1.3;
	list-style: outside none none;
	margin: 0;
	outline: 0 none;
	padding: 0;
	text-decoration: none;
}
.attachment-post-thumbnail.size-post-thumbnail.wp-post-image {
	height: 100%;
	width: 100%;
}
	.qem-columns{ width: 100% !important;}
</style>
<?php if( Language == 'Arabic'){ ?>
<style>  
.table {    direction: rtl;  }
.text-left {    text-align: right;  }
.r-tabs ul{direction: rtl; text-align: right;}
.r-tabs p{direction: rtl;text-align: right;}
.r-tabs h1{direction: rtl;text-align: right;}

</style>
<?php } ?>
<div class="container">


	<div class="col-md-9">
		<div class="post_detail_page">
			<h2><?php if( Language != 'Arabic'){ the_title(); }else{ echo  get_post_title_arabic(get_the_ID()); } ?></h2>
			<div class="">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
					if( Language != 'Arabic'){
						the_content();
					}else{
						$tabs_content = get_tabs_content_arabic(get_the_ID());
						echo do_shortcode(get_tabs_content_arabic(get_the_ID()));
						?>
						<div class="sfsi_Sicons" style="width: 100%; display: inline-block; vertical-align: middle; text-align:right;">

							<div style="margin:0px 8px 0px 0px; line-height: 24px">
								<span dir="rtl">يرجى اتباع ومثلنا:</span>
							</div>
							<div class="sfsi_socialwpr">
								<div class="sf_subscrbe" style="text-align:left;float:left;width:64px">
									<a href="http://www.specificfeeds.com/widgets/emailSubscribeEncFeed/ckdvTW9VMm1NMmFVMmxkN1lrWHJXSW5HVGNub2dXMHJCRjFldGZnOEE2aCtHOHFYNHE2Q29DZ0NCTmlmSmlEd05SWEp0OU94b05Vc0FxUzZqK3dhemVESitFN1pudHJlWWZGYzE5eFIwejQrbCt3ZnQ1RGJ4b2UrZEExQ3dGNVd8VjUzT2V0Z3U0RW1zZ01vZXRTZ25wSjZJYXFITWpVVm1qWlhOMXVCWFl4UT0=/OA==/" target="_blank">
										<img src="http://www.jawlat.com.sa/wp-content/plugins/ultimate-social-media-icons/images/follow_subscribe.png">
									</a>
								</div>
								<div class="sf_fb" style="text-align:left;width:98px">
									<div class="fb-like fb_iframe_widget" href="<?php echo get_permalink(); ?>" width="180" send="false" showfaces="false" action="like" data-share="true" data-layout="button" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=&amp;container_width=98&amp;href=<?php echo get_permalink(); ?>&amp;layout=button&amp;locale=en_US&amp;sdk=joey&amp;send=false&amp;share=true&amp;show_faces=false&amp;width=180">
								<span style="vertical-align: bottom; width: 95px; height: 20px;">
									<iframe name="f3529265271592" width="180px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like Facebook Social Plugin" src="https://www.facebook.com/v2.5/plugins/like.php?action=like&amp;app_id=&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FfTmIQU3LxvB.js%3Fversion%3D42%23cb%3Df2a162d0852abd8%26domain%3Dwww.jawlat.com.sa%26origin%3Dhttp%253A%252F%252Fwww.jawlat.com.sa%252Ff1426fba1cac4e4%26relation%3Dparent.parent&amp;container_width=98&amp;href=http%3A%2F%2Fwww.jawlat.com.sa%2Fcroatia%2F&amp;layout=button&amp;locale=en_US&amp;sdk=joey&amp;send=false&amp;share=true&amp;show_faces=false&amp;width=180" style="border: none; visibility: visible; width: 95px; height: 20px;" class="">

									</iframe>
								</span>
									</div>
								</div>
								<div class="sf_twiter" style="text-align:left;float:left;width:auto">
									<iframe id="twitter-widget-1" scrolling="no" frameborder="0" allowtransparency="true" class="twitter-share-button twitter-share-button-rendered twitter-tweet-button" title="Twitter Tweet Button" src="http://platform.twitter.com/widgets/tweet_button.f7908d4abf5ce27173c69bdbb93aedb6.en.html#dnt=false&amp;id=twitter-widget-1&amp;lang=en&amp;original_referer=<?php echo get_permalink(); ?>&amp;size=m&amp;text=Croatia&amp;time=1479970602487&amp;type=share&amp;url=<?php echo get_permalink(); ?>" style="position: static; visibility: visible; width: 60px; height: 20px;" data-url="<?php echo get_permalink(); ?>">

									</iframe>
								</div>

								<div class="sf_addthis">
									<script type="text/javascript">
										var addthis_config = {
											url: "<?php echo get_permalink(); ?>",
											title: "<?php echo get_the_title(); ?>"
										}
									</script>
									<div class="addthis_toolbox addthis_default_style addthis_20x20_style" addthis:url="<?php echo get_permalink(); ?>" addthis:title="<?php echo get_the_title(); ?>">
										<a class="addthis_button_compact " href="#">
											<img src="http://www.jawlat.com.sa/wp-content/plugins/ultimate-social-media-icons/images/sharebtn.png" border="0" alt="Share">
										</a>
										<div class="atclear">

										</div>
									</div>
								</div>
							</div>
						</div>
						<?php
					}
				endwhile;
				else:
					?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				<?php  endif;   ?>
			</div>
		</div>
	</div>


	<div class="col-md-3">
		<div class="post_detail_page">
			<h2  <?php if( Language == 'Arabic') { ?> dir="rtl" <?php } ?>>
				<?php if( Language != 'Arabic') { ?>Events<?php }else{ ?>
					أحداث      <?php }?>
			</h2>
			<div class="destination-specs">
				<div class="row" id="event-container">
					<?php
					if( Language != 'Arabic') {
						$categoryName = Events_data_fetch(get_the_ID());
						echo do_shortcode('[qem category='.$categoryName.']');
					}else{

						$categoryName = Arabic_event_Name(get_the_ID());
						echo do_shortcode('[qem category='.$categoryName.']');

					}?>
				</div>
				<!-- end .row -->
			</div>
		</div>
	</div>


</div>
<?php get_footer(); ?>