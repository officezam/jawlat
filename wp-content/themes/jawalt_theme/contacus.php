<?php /* Template Name: Contact Us */get_header(); ?>
<style>


.contactUs {
	margin: 40px auto;
	width: 40%;
}
.contactUs .row {
	margin-bottom: 10px;
}
.contactUs label {
	margin-bottom: 0 !important;
}
.contactUs .wpcf7-submit {
	-moz-user-select: none;
	background-image: none;
	border: 1px solid rgba(0, 0, 0, 0);
	border-radius: 4px;
	cursor: pointer;
	display: inline-block;
	font-size: 14px;
	font-weight: 400;
	line-height: 1.42857;
	margin-bottom: 0;
	padding: 6px 12px;
	text-align: center;
	vertical-align: middle;
	white-space: nowrap;
	background-color: #337ab7;
	border-color: #2e6da4;
	color: #ffffff;
}
</style>
<div class="content" style='background-image: url("<?php echo page_background_image( get_the_ID()); ?>");background-repeat: no-repeat;background-size: 100% 100%;'>
  <div class="container contact-us">
    <h2>
      <?php  if( Language != 'Arabic'){ ?>
      Contact Us
      <?php }else{ ?>
      اتصل بنا
      <?php } ?>
    </h2>
    <div class="contactUs">
      <?php  if( Language != 'Arabic'){ ?>
      <?php echo do_shortcode("[contact-form-7 id='35' title='Contact form 1']"); ?>

      <?php }else{ ?>
      <style>          
.container h2{float: right;}        
</style>
      <div role="form" class="wpcf7" id="wpcf7-f35-o1" lang="en-US" dir="rtl" style="float: right;">
        <div class="screen-reader-response"></div>
        <form action="/jawlat/contact-us/#wpcf7-f35-o1" method="post" class="wpcf7-form" novalidate="novalidate">
          <div style="display: none;">
            <input type="hidden" name="_wpcf7" value="35">
            <input type="hidden" name="_wpcf7_version" value="4.4.2">
            <input type="hidden" name="_wpcf7_locale" value="en_US">
            <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f35-o1">
            <input type="hidden" name="_wpnonce" value="ce190cb8d3">
          </div>
          <p>
            <label class="row ">الاسم الاول</label>
          </p>
          <div class="row"> <span class="wpcf7-form-control-wrap FirstName">
            <input type="text" name="FirstName" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required First form-control user-success" id="FirstName" aria-required="true">
            </span> </div>
          <p>
            <label class="row ">الكنية</label>
          </p>
          <div class="row"> <span class="wpcf7-form-control-wrap LastName">
            <input type="text" name="LastName" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required First form-control" id="LastName" aria-required="true" aria-invalid="false">
            </span> </div>
          <p>
            <label class="row ">البريد الإلكتروني</label>
          </p>
          <div class="row"> <span class="wpcf7-form-control-wrap Email">
            <input type="email" name="Email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-email form-control" id="Email" aria-invalid="false">
            </span> </div>
          <p>
            <label class="row ">تعليقات</label>
          </p>
          <div class="row"> <span class="wpcf7-form-control-wrap Comments">
            <textarea name="Comments" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea form-control" id="Comments" aria-invalid="false"></textarea>
            </span> </div>
          <div class="row">
            <p class="">
              <input type="submit" value="إرسال" class="wpcf7-form-control wpcf7-submit">
<!--              <img class="ajax-loader" src="http://localhost/jawlat/wp-content/plugins/contact-form-7/images/ajax-loader.gif" alt="Sending ..." style="visibility: hidden;"></p>-->
          </div>
            <div class="wpcf7-response-output wpcf7-display-none wpcf7-mail-sent-ok" style="display: none;" role="alert">شكرا لرسالتك. وقد تم إرساله ..</div>
        </form>

      <?php } ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
