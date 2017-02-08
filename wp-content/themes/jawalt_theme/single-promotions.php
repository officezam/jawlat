<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>


<div class="container ">
    <div class="col-md-9">
	    <div class="post_detail_page">
	    <div id="tabs">
    <ul>
    <li><a href="#tabs-1">Overview</a></li>
    <li><a href="#tabs-2">Regions</a></li>
    <li><a href="#tabs-3">Tours</a></li>
    </ul>
    <div id="tabs-1">
    <?php
            // Start the loop.
            while ( have_posts() ) : the_post();
    
                // Include the single post content template.
                get_template_part( 'template-parts/content', 'single' );
    
            endwhile;
            ?>
    </div>
    <div id="tabs-2">
    <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
    </div>
    <div id="tabs-3">
    <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
    <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
    </div>
    </div>
    </div>
    </div>
    <div class="col-md-3">
    	
Grab us a slabs bloody as cross as a pav. As dry as a knock with lets get some ocker. She’ll be right two up no worries as cross as a dickhead. We’re going khe sanh no dramas he hasn’t got a booze bus.

    </div>
</div>


<style>
.entry-footer{
	display:none	
	}
.post_detail_page	{
	margin:40px; 0	
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
</style>

<?php get_footer(); ?>
