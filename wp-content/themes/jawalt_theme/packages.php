<?php /* Template Name: packages */ 
get_header(); ?>
<style>



.cPackages{
  margin: 40px auto;
  width: 40%;
}
.cPackages .row{
	margin-bottom:10px;
	}
	
.cPackages .wpcf7-form-control.wpcf7-submit {
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
  margin-top: 40px;
}		
.cPackages .wpcf7-form-control {
  background-color: #ffffff;
  background-image: none;
  border: 1px solid #cccccc;
  border-radius: 4px;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
  color: #555555;
  display: block;
  font-size: 14px;
  height: 34px;
  line-height: 1.42857;
  padding: 6px 12px;
  transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
  width: 100%;
}
.cPackages .block_cp {
  background-color: #f0f0f0;
  border-radius: 5px;
  display: block;
  float: left;
  margin: 25px -15px;
  padding: 10px;
}
.m-l-0{
margin-left:0px !important;	
	}
.m-r-0{
margin-right:0px !important;	
	}	
.cPackages label {
    margin-bottom: 0 !important;
}
.custom_text{font-size: 1em; }
</style>



<div class="content" style='background-image: url("<?php echo page_background_image( get_the_ID()); ?>");background-repeat: no-repeat;background-size: 100% 100%;'>

<div class="container packages">

  <?php  if( Language == 'Arabic'){ ?>
    <style>
      h2{text-align: right;}
      .custom_text{text-align: right;}
    </style>

    <h2>باقات مخصصة</h2></br>
    <div class="custom_text">يرجى ملء النموذج أدناه ليقول لنا ما حزمة كنت تبحث عنه؟</div>
  <?php }else{ ?>
	<h2>Custom Packages</h2>
  <div class="custom_text">Please fill up the form below to tell us what package you are looking for?</div>
  <?php } ?>
	<div class="cPackages">


      <?php  if( Language != 'Arabic'){ ?>
<?php echo do_shortcode("[contact-form-7 id='95' title='Custom Packages Form']"); ?>


      <?php }else{ ?>













        <div role="form" class="wpcf7" id="wpcf7-f95-o1" lang="en-US" dir="rtl">

          <div class="screen-reader-response"></div>
          <form action="/jawlat/customer-packages/#wpcf7-f95-o1" method="post" class="wpcf7-form" novalidate="novalidate">

            <div style="display: none;">
              <input type="hidden" name="_wpcf7" value="95">
              <input type="hidden" name="_wpcf7_version" value="4.5.1">
              <input type="hidden" name="_wpcf7_locale" value="en_US">
              <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f95-o1">
              <input type="hidden" name="_wpnonce" value="9c0c52f5f0">

            </div>

            <p><label class="row"> اسم</label></p>
            <div class="row">
              <span class="wpcf7-form-control-wrap cutomername">
                <input type="text" name="cutomername" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" id="cutomername" aria-required="true" aria-invalid="false">
              </span>
            </div>

            <p><label class="row">البريد الإلكتروني</label></p>
            <div class="row">
              <span class="wpcf7-form-control-wrap cutomeremail">
                <input type="email" name="cutomeremail" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" id="cutomeremail" aria-required="true" aria-invalid="false">
              </span>
            </div>

            <p><label class="row">هاتف</label></p>
            <div class="row">
              <span class="wpcf7-form-control-wrap cutomerphone">
                <input type="tel" name="cutomerphone" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel" id="cutomerphone" aria-required="true" aria-invalid="false">
              </span>
            </div>
            <p><input type="hidden" id="counter" value="1"></p>









            <div id="block1" class="block_cp">
              <div class="col-md-6">
                <label class="row ">مصدر</label><p></p>
                <div class="row m-r-0 " id="replace_country1">
                  <span class="wpcf7-form-control-wrap source1">
                    <input type="text" name="source1" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false">
                  </span>
                </div>
                <p></p>
              </div>

              <div class="col-md-6 ">
                <label class="row m-l-0">المكان المقصود  </label><p></p>
                <div class="row m-l-0" id="destination1">
                  <span class="wpcf7-form-control-wrap destination1">
                    <input type="text" name="destination1" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" id="destination1" aria-required="true" aria-invalid="false">
                  </span>
                </div>

                <div style="display:none">
                  <span class="wpcf7-form-control-wrap hide1">
                    <input type="text" name="hide1" value="" size="40" class="wpcf7-form-control wpcf7-text" id="hide1" aria-invalid="false">
                  </span>
                </div>
                <p></p>
              </div>

              <div class="col-md-6 ">
                <label class="row ">من التاريخ </label><p></p>
                <div class="row m-r-0">
                  <span class="wpcf7-form-control-wrap from_date1">
                    <input type="date" name="from_date1" value="" class="wpcf7-form-control wpcf7-date wpcf7-validates-as-required wpcf7-validates-as-date required" min="<?php echo date('Y-m-d'); ?>" placeholder="Year/Mon/Date"  step="7" aria-required="true" aria-invalid="false">
                  </span>
                </div>

                <p></p>
              </div>

              <div class="col-md-6">
                <label class="row m-l-0">ان يذهب في موعد </label><p></p>
                <div class="row m-l-0">
                  <span class="wpcf7-form-control-wrap to_date1">
                    <input type="date" name="to_date1" value="" class="wpcf7-form-control wpcf7-date wpcf7-validates-as-required wpcf7-validates-as-date required" min="<?php echo date('Y-m-d', strtotime('+7 Day')); ?>" placeholder="Year/Mon/Date"  step="7" aria-required="true" aria-invalid="false">
                  </span>
                </div>

                <p></p>
              </div>

              <div class="col-md-6 ">
                <label class="row ">الفندق</label><p></p>
                <div class="row m-r-0" id="hotel_show1">
                  <span class="wpcf7-form-control-wrap hotel1">
                    <input type="text" name="hotel1" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" id="hotel1" aria-required="true" aria-invalid="false">
                  </span>
                </div>
                <p></p>
              </div>

              <div class="col-md-6">
                <label class="row m-l-0">عدد ليلة للبقاء </label><p></p>
                <div class="row m-l-0">
                  <span class="wpcf7-form-control-wrap stay1">
                    <input type="text" name="stay1" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" id="stay1" aria-required="true" aria-invalid="false">
                  </span>
                </div>
                <p></p>
              </div>

            </div>





















            <div id="block2" class="block_cp" style="display:none;">
              <div class="col-md-6">
                <label class="row ">مصدر</label><p></p>
                <div class="row m-r-0 " id="replace_country2">
                  <span class="wpcf7-form-control-wrap source2">
                    <input type="text" name="source2" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false">
                  </span>
                </div>
                <p></p></div>
              <div class="col-md-6 ">
                <label class="row m-l-0"> المكان المقصود </label><p></p>
                <div class="row m-l-0" id="destination2">
                  <span class="wpcf7-form-control-wrap destination2">
                    <input type="text" name="destination2" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" id="destination2" aria-required="true" aria-invalid="false">
                  </span>
                </div>

                <div style="display:none">
                  <span class="wpcf7-form-control-wrap hide2">
                    <input type="text" name="hide2" value="" size="40" class="wpcf7-form-control wpcf7-text" id="hide2" aria-invalid="false">
                  </span>
                </div>

                <p></p></div>
              <div class="col-md-6 ">
                <label class="row ">من التاريخ </label><p></p>
                <div class="row m-r-0"><span class="wpcf7-form-control-wrap from_date2"><input type="date" name="from_date2" value="" class="wpcf7-form-control wpcf7-date wpcf7-validates-as-required wpcf7-validates-as-date required" min="<?php echo date('Y-m-d'); ?>"  step="7" aria-required="true" aria-invalid="false"></span></div>
                <p></p></div>
              <div class="col-md-6">
                <label class="row m-l-0">ان يذهب في موعد </label><p></p>
                <div class="row m-l-0"><span class="wpcf7-form-control-wrap to_date2"><input type="date" name="to_date2" value="" class="wpcf7-form-control wpcf7-date wpcf7-validates-as-required wpcf7-validates-as-date required" min="<?php echo date('Y-m-d', strtotime('+7 Day')); ?>" step="7" aria-required="true" aria-invalid="false"></span> </div>
                <p></p></div>
              <div class="col-md-6 ">
                <label class="row ">الفندق</label><p></p>
                <div class="row m-r-0" id="hotel_show2">
                  <span class="wpcf7-form-control-wrap hotel2">
                    <input type="text" name="hotel2" value="" size="40" class="wpcf7-form-control wpcf7-text" id="hotel2" aria-invalid="false">
                  </span>
                </div>
                <p></p>
              </div>

              <div class="col-md-6">
                <label class="row m-l-0">عدد ليلة للبقاء </label><p></p>
                <div class="row m-l-0"><span class="wpcf7-form-control-wrap stay2"><input type="text" name="stay2" value="" size="40" class="wpcf7-form-control wpcf7-text" id="stay2" aria-invalid="false"></span></div>
                <p></p></div>
            </div>



            <div id="block3" class="block_cp" style="display:none;">
              <div class="col-md-6">
                <label class="row ">مصدر</label><p></p>

                <div class="row m-r-0 " id="replace_country3">
                  <span class="wpcf7-form-control-wrap source3">
                    <input type="text" name="source3" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false">
                  </span>
                </div>

                <p></p></div>
              <div class="col-md-6 ">
                <label class="row m-l-0">المكان المقصود </label><p></p>
                <div class="row m-l-0" id="destination3">
                  <span class="wpcf7-form-control-wrap destination3">
                    <input type="text" name="destination3" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" id="destination3" aria-required="true" aria-invalid="false">
                  </span>
                </div>

                <div style="display:none">
                  <span class="wpcf7-form-control-wrap hide3">
                    <input type="text" name="hide3" value="" size="40" class="wpcf7-form-control wpcf7-text" id="hide3" aria-invalid="false">
                  </span>
                </div>

                <p></p></div>
              <div class="col-md-6 ">
                <label class="row ">من التاريخ </label><p></p>
                <div class="row m-r-0"><span class="wpcf7-form-control-wrap from_date3"><input type="date" name="from_date3" value="" class="wpcf7-form-control wpcf7-date wpcf7-validates-as-date" min="<?php echo date('Y-m-d'); ?>" id="from_date3" aria-invalid="false" placeholder="Year/Mon/Date"></span></div>
                <p></p></div>
              <div class="col-md-6">
                <label class="row m-l-0">ان يذهب في موعد </label><p></p>
                <div class="row m-l-0"><span class="wpcf7-form-control-wrap to_date3"><input type="date" name="to_date3" value="" class="wpcf7-form-control wpcf7-date wpcf7-validates-as-date" id="to_date3" min="<?php echo date('Y-m-d', strtotime('+7 Day')); ?>" aria-invalid="false" placeholder="Year/Mon/Date"></span> </div>
                <p></p></div>
              <div class="col-md-6 ">
                <label class="row ">الفندق</label><p></p>
                <div class="row m-r-0" id="hotel_show3"><span class="wpcf7-form-control-wrap hotel3"><input type="text" name="hotel3" value="" size="40" class="wpcf7-form-control wpcf7-text" id="hotel3" aria-invalid="false"></span></div>
                <p></p></div>
              <div class="col-md-6">
                <label class="row m-l-0">عدد ليلة للبقاء </label><p></p>
                <div class="row m-l-0"><span class="wpcf7-form-control-wrap stay3"><input type="text" name="stay3" value="" size="40" class="wpcf7-form-control wpcf7-text" id="stay3" aria-invalid="false"></span></div>
                <p></p></div>
            </div>




            <div id="block4" class="block_cp" style="display:none;">
              <div class="col-md-6">
                <label class="row ">مصدر</label><p></p>

                <div class="row m-r-0 " id="replace_country4">
                  <span class="wpcf7-form-control-wrap source4">
                    <input type="text" name="source4" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false">
                  </span>
                </div>
                <p></p></div>
              <div class="col-md-6 ">
                <label class="row m-l-0">المكان المقصود </label><p></p>
                <div class="row m-l-0" id="destination4">
                  <span class="wpcf7-form-control-wrap destination4">
                    <input type="text" name="destination4" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" id="destination4" aria-required="true" aria-invalid="false">
                  </span>
                </div>

                <div style="display:none">
                  <span class="wpcf7-form-control-wrap hide4">
                    <input type="text" name="hide4" value="" size="40" class="wpcf7-form-control wpcf7-text" id="hide4" aria-invalid="false">
                  </span>
                </div>
                 <p></p></div>
              <div class="col-md-6 ">
                <label class="row ">من التاريخ </label><p></p>
                <div class="row m-r-0"><span class="wpcf7-form-control-wrap from_date4"><input type="date" name="from_date4" value="" class="wpcf7-form-control wpcf7-date wpcf7-validates-as-date" id="from_date4" min="<?php echo date('Y-m-d'); ?>" aria-invalid="false" placeholder="Year/Mon/Date"></span></div>
                <p></p></div>
              <div class="col-md-6">
                <label class="row m-l-0">ان يذهب في موعد </label><p></p>
                <div class="row m-l-0"><span class="wpcf7-form-control-wrap to_date4"><input type="date" name="to_date4" value="" class="wpcf7-form-control wpcf7-date wpcf7-validates-as-date" id="to_date4" aria-invalid="false" min="<?php echo date('Y-m-d', strtotime('+7 Day')); ?>" placeholder="Year/Mon/Date"></span> </div>
                <p></p></div>
              <div class="col-md-6 ">
                <label class="row ">الفندق</label><p></p>
                <div class="row m-r-0" id="hotel_show4"><span class="wpcf7-form-control-wrap hotel4"><input type="text" name="hotel4" value="" size="40" class="wpcf7-form-control wpcf7-text" id="hotel4" aria-invalid="false"></span></div>
                <p></p></div>
              <div class="col-md-6">
                <label class="row m-l-0">عدد ليلة للبقاء </label><p></p>
                <div class="row m-l-0"><span class="wpcf7-form-control-wrap stay4"><input type="text" name="stay4" value="" size="40" class="wpcf7-form-control wpcf7-text" id="stay4" aria-invalid="false"></span></div>
                <p></p></div>
            </div>



            <div id="block5" class="block_cp" style="display:none;">
              <div class="col-md-6">
                <label class="row ">مصدر</label><p></p>
                <div class="row m-r-0 " id="replace_country5">
                  <span class="wpcf7-form-control-wrap source5">
                    <input type="text" name="source5" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false">
                  </span>
                </div>
                <p></p></div>
              <div class="col-md-6 ">
                <label class="row m-l-0">المكان المقصود </label><p></p>
                <div class="row m-l-0" id="destination5">
                  <span class="wpcf7-form-control-wrap destination5">
                    <input type="text" name="destination5" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" id="destination5" aria-required="true" aria-invalid="false">
                  </span>
                </div>

                <div style="display:none">
                  <span class="wpcf7-form-control-wrap hide5">
                    <input type="text" name="hide5" value="" size="40" class="wpcf7-form-control wpcf7-text" id="hide5" aria-invalid="false">
                  </span>
                </div>
                <p></p></div>
              <div class="col-md-6 ">
                <label class="row ">من التاريخ </label><p></p>
                <div class="row m-r-0"><span class="wpcf7-form-control-wrap from_date5"><input type="date" name="from_date5" value="" class="wpcf7-form-control wpcf7-date wpcf7-validates-as-date" min="<?php echo date('Y-m-d'); ?>" id="from_date5" aria-invalid="false" placeholder="Year/Mon/Date"></span></div>
                <p></p></div>
              <div class="col-md-6">
                <label class="row m-l-0">ان يذهب في موعد </label><p></p>
                <div class="row m-l-0"><span class="wpcf7-form-control-wrap to_date5"><input type="date" name="to_date5" value="" class="wpcf7-form-control wpcf7-date wpcf7-validates-as-date" id="to_date5" aria-invalid="false" min="<?php echo date('Y-m-d', strtotime('+7 Day')); ?>" placeholder="Year/Mon/Date"></span> </div>
                <p></p></div>
              <div class="col-md-6 ">
                <label class="row ">الفندق</label><p></p>
                <div class="row m-r-0" id="hotel_show5"><span class="wpcf7-form-control-wrap hotel5"><input type="text" name="hotel5" value="" size="40" class="wpcf7-form-control wpcf7-text" id="hotel5" aria-invalid="false"></span></div>
                <p></p></div>
              <div class="col-md-6">
                <label class="row m-l-0">عدد ليلة للبقاء </label><p></p>
                <div class="row m-l-0"><span class="wpcf7-form-control-wrap stay5"><input type="text" name="stay5" value="" size="40" class="wpcf7-form-control wpcf7-text" id="stay5" aria-invalid="false"></span></div>
                <p></p></div>
            </div>



            <div id="block6" class="block_cp" style="display:none;">
              <div class="col-md-6">
                <label class="row ">مصدر</label><p></p>
                <div class="row m-r-0 " id="replace_country6">
                  <span class="wpcf7-form-control-wrap source6">
                    <input type="text" name="source6" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false">
                  </span>
                </div>
                <p></p></div>
              <div class="col-md-6 ">
                <label class="row m-l-0">المكان المقصود </label><p></p>

                <div class="row m-l-0" id="destination6">
                  <span class="wpcf7-form-control-wrap destination6">
                    <input type="text" name="destination6" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" id="destination6" aria-required="true" aria-invalid="false">
                  </span>
                </div>

                <div style="display:none">
                  <span class="wpcf7-form-control-wrap hide1">
                    <input type="text" name="hide6" value="" size="40" class="wpcf7-form-control wpcf7-text" id="hide6" aria-invalid="false">
                  </span>
                </div>

                 <p></p></div>
              <div class="col-md-6 ">
                <label class="row ">من التاريخ </label><p></p>
                <div class="row m-r-0"><span class="wpcf7-form-control-wrap from_date6"><input type="date" name="from_date6" value="" class="wpcf7-form-control wpcf7-date wpcf7-validates-as-date" min="<?php echo date('Y-m-d'); ?>" id="from_date6" aria-invalid="false" placeholder="Year/Mon/Date"></span></div>
                <p></p></div>
              <div class="col-md-6">
                <label class="row m-l-0">ان يذهب في موعد </label><p></p>
                <div class="row m-l-0"><span class="wpcf7-form-control-wrap to_date6"><input type="date" name="to_date6" value="" class="wpcf7-form-control wpcf7-date wpcf7-validates-as-date" id="to_date6" min="<?php echo date('Y-m-d', strtotime('+7 Day')); ?>" aria-invalid="false" placeholder="Year/Mon/Date"></span> </div>
                <p></p></div>
              <div class="col-md-6 ">
                <label class="row ">الفندق</label><p></p>
                <div class="row m-r-0" id="hotel_show6"><span class="wpcf7-form-control-wrap hotel6"><input type="text" name="hotel6" value="" size="40" class="wpcf7-form-control wpcf7-text" id="hotel6" aria-invalid="false"></span></div>
                <p></p></div>
              <div class="col-md-6">
                <label class="row m-l-0">عدد ليلة للبقاء </label><p></p>
                <div class="row m-l-0"><span class="wpcf7-form-control-wrap stay6"><input type="text" name="stay6" value="" size="40" class="wpcf7-form-control wpcf7-text" id="stay6" aria-invalid="false"></span></div>
                <p></p></div>
            </div>


            <div id="block7" class="block_cp" style="display:none;">
              <div class="col-md-6">
                <label class="row ">مصدر</label><p></p>
                <div class="row m-r-0 " id="replace_country7">
                  <span class="wpcf7-form-control-wrap source7">
                    <input type="text" name="source7" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false">
                  </span>
                </div>
                <p></p></div>
              <div class="col-md-6 ">
                <label class="row m-l-0">المكان المقصود </label><p></p>
                <div class="row m-l-0" id="destination7">
                  <span class="wpcf7-form-control-wrap destination7">
                    <input type="text" name="destination7" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" id="destination7" aria-required="true" aria-invalid="false">
                  </span>
                </div>

                <div style="display:none">
                  <span class="wpcf7-form-control-wrap hide1">
                    <input type="text" name="hide7" value="" size="40" class="wpcf7-form-control wpcf7-text" id="hide7" aria-invalid="false">
                  </span>
                </div>
                 <p></p></div>
              <div class="col-md-6 ">
                <label class="row ">من التاريخ </label><p></p>
                <div class="row m-r-0"><span class="wpcf7-form-control-wrap from_date7"><input type="date" name="from_date7" value="" min="<?php echo date('Y-m-d'); ?>" class="wpcf7-form-control wpcf7-date wpcf7-validates-as-date" id="from_date7" aria-invalid="false" placeholder="Year/Mon/Date"></span></div>
                <p></p></div>
              <div class="col-md-6">
                <label class="row m-l-0">ان يذهب في موعد </label><p></p>
                <div class="row m-l-0"><span class="wpcf7-form-control-wrap to_date7"><input type="date" name="to_date7" value="" min="<?php echo date('Y-m-d', strtotime('+7 Day')); ?>" class="wpcf7-form-control wpcf7-date wpcf7-validates-as-date" id="to_date7" aria-invalid="false" placeholder="Year/Mon/Date"></span> </div>
                <p></p></div>
              <div class="col-md-6 ">
                <label class="row ">الفندق</label><p></p>
                <div class="row m-r-0" id="hotel_show7"><span class="wpcf7-form-control-wrap hotel7"><input type="text" name="hotel7" value="" size="40" class="wpcf7-form-control wpcf7-text" id="hotel7" aria-invalid="false"></span></div>
                <p></p></div>
              <div class="col-md-6">
                <label class="row m-l-0">عدد ليلة للبقاء </label><p></p>
                <div class="row m-l-0"><span class="wpcf7-form-control-wrap stay7"><input type="text" name="stay7" value="" size="40" class="wpcf7-form-control wpcf7-text" id="stay7" aria-invalid="false"></span></div>
                <p></p></div>
            </div>
            <p><a href="#." id="add_more" style="margin: 10px 0px; border-radius: 50%; font-size: 14px; float: right;" class="btn btn-danger add_more">+</a></p>
            <div class="row">
              <p><input type="submit" value="إرسال" class="wpcf7-form-control wpcf7-submit"></p>
            </div>
            <div class="wpcf7-response-output wpcf7-display-none"></div></form></div>










      <?php } ?>











	</div>
</div>    
</div>

<?php get_footer(); ?>




