<?php
/*
Template Name: Single Event
*/
?>
<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
<style>
  .single-event{ margin-top: 40px;}
</style>
<?php global $post;
$catName= $post->post_name; 
$catId = get_cat_ID( $catName);
?>
<div class="container single-event">
    <div class="col-md-12">
	    <div class="post_detail_page">
	 	<h2><?php the_title(); ?></h2>
        
        <div class="">
        <?php
            // Start the loop.
            while ( have_posts() ) : the_post();
    			the_content();
            endwhile;
            ?>
        </div>
          
    	</div>
    </div>
    
</div>


<style>
.entry-footer{
	display:none	
	}
.post_detail_page	{
	margin:40px; 0	
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
</style>

<?php get_footer(); ?>