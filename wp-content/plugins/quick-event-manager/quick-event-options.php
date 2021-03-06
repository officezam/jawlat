<?php

function event_get_stored_options () {	
    $event = get_option('event_settings');
    if(!is_array($event)) $event = array();
    $default = array(
        'active_buttons' => array(
            'field1' =>'on',
            'field2' =>'on',
            'field3' =>'on',
            'field4' =>'on',
            'field5' =>'on',
            'field6' =>'on',
            'field7' =>'on',
            'field8' =>'on',
            'field9' =>'on',
            'field10'=>'on',
            'field11' =>'on',
            'field12'=>'on',
            'field13'=>'',
        ),
        'summary' => array(
            'field1'=>'checked',
            'field2'=>'checked',
            'field3'=>'checked'
        ),
        'label' => array(
            'field1' => __('Short Description', 'quick-event-manager'),
            'field2' => __('Event Time', 'quick-event-manager'),
            'field3' => __('Venue', 'quick-event-manager'),
            'field4' => __('Address', 'quick-event-manager'),
            'field5' => __('Event Website', 'quick-event-manager'),
            'field6' => __('Cost', 'quick-event-manager'),
            'field7' => __('Organiser', 'quick-event-manager'),
            'field8' => __('Full Description', 'quick-event-manager'),
            'field9' => __('Places Taken', 'sminqle-event-manager'),
            'field10' => __('Attendees', 'sminqle-event-manager'),
            'field11' => __('Places Available', 'sminqle-event-manager'),
            'field12' => __('Registration Form', 'sminqle-event-manager'),
            'field13' => __('Category', 'sminqle-event-manager'),

        ),
        'sort' => 'field1,field2,field3,field4,field5,field6,field7,field8,field9,field10,field11,field12,field13',
        'bold' => array('field2'=>'checked','field10'=>'checked'),
        'italic' => array('field4'=>'checked',),
        'colour' => array('field2'=>'#343838','field6'=>'#008C9E'),
        'size' => array('field1'=>'110','field2'=>'120','field6'=>'120'),
        'address_label' => '',
        'url_label' => '',
        'description_label' => '',
        'cost_label' => '',
        'deposit_before_label' => __('Deposit', 'quick-event-manager'),
        'deposit_after_label' => __('per person', 'quick-event-manager'),
        'organiser_label' => '',
        'category_label' => __('Category', 'quick-event-manager'),
        'start_label' => __('From', 'quick-event-manager'),
        'finish_label' => __('until', 'quick-event-manager'),
        'location_label' => __('At', 'quick-event-manager'),
        'address_style' => 'italic',
        'website_link' => 'checked',
        'show_telephone' => 'checked',
        'whoscoming' => '',
        'whoscomingmessage' => __('Look who\'s coming: ', 'quick-event-manager'),
        'placesbefore' => __('There are', 'quick-event-manager'),
        'placesafter' => __('places available.', 'quick-event-manager'),
        'numberattendingbefore' => __('There are', 'quick-event-manager'),
        'numberattendingafter' => __('people coming.', 'quick-event-manager'),
        'oneplacebefore' => __('There is one place available', 'sminqle-event-manager'),
        'oneattendingbefore' => __('There is one person coming', 'sminqle-event-manager'),
        'whoscoming' => 'checked',
        'whosavatar' => 'checked',
    );
    $event = array_merge($default, $event);
    $upgrade = get_option('qem_upgrade');
    if ($upgrade != 'newfields') {
        $register = qem_get_stored_register ();
        $style = qem_get_stored_style();
        $display = event_get_stored_display ();
        $calendar = qem_get_stored_calendar();
        if (!strpos($event['sort'],'13')) $event['sort'] = $event['sort'].',field9,field10,field11,field12,field13';
        $event['placesbefore'] = $register['placesbefore'];
        $event['placesafter'] = $register['placesafter'];
        $event['numberattendingbefore'] = $register['numberattendingbefore'];
        $event['numberattendingafter'] = $register['numberattendingafter'];
        $event['whoscoming'] = $register['whoscoming'];
        $event['whosavatar'] = $register['whosavatar'];
        $event['category_label'] = 'Category:';
        $event['whoscomingmessage'] = $register['whoscomingmessage'];
        if ($register['useform']) $event['active_buttons']['field12']= 'on';
        if ($register['numberattending']) $event['active_buttons']['field9']= 'on';
        if ($register['whoscoming']) $event['active_buttons']['field10'] ='on';
        if ($register['placesavailable']) $event['active_buttons']['field11'] ='on';
        if ($register['useform']) $event['active_buttons']['field12']= 'on';
        if ($register['eventlist']) $event['summary']['field11']= 'checked';
        $event['label']['field9'] = __('Places Taken', 'sminqle-event-manager');
        $event['label']['field10'] = __('Attendees', 'sminqle-event-manager');
        $event['label']['field11'] = __('Places Available', 'sminqle-event-manager');
        $event['label']['field12'] = __('Registration Form', 'sminqle-event-manager');
        $event['label']['field13'] = __('Category', 'sminqle-event-manager');
        $display['linktocategory'] = $style['linktocategory'];
        $display['showuncategorised'] = $style['showuncategorised'];
        $display['keycaption'] = $style['keycaption'];
        $display['showkeyabove'] = $style['showkeyabove'];
        $display['showkeybelow'] = $style['showkeybelow'];
        $display['showcategory'] = $style['showcategory'];
        $display['showcategorycaption'] = $style['showcategorycaption'];
        $display['cat_border'] = $style['cat_border'];
        $display['catallevents'] = $style['catallevents'];
        $display['catalleventscaption'] = $style['catalleventscaption'];
        
        $arr = array('a','b','c','d','e','f','g','h','i','j');
        foreach ($arr as $i) {
            $style['cat'.$i] = $calendar['cat'.$i];
            $style['cat'.$i.'back'] = $calendar['cat'.$i.'back'];
            $style['cat'.$i.'text'] = $calendar['cat'.$i.'text'];
        }
        update_option('event_settings', $event);
        update_option('qem_style', $style);
        update_option('event_display', $display);
        update_option('qem_upgrade', 'newfields');
    }
    return $event;
}

function event_get_stored_display () {
    $display = get_option('qem_display');
    if(!is_array($display)) $display = array();
    $default = array(
        'read_more' => __('Find out more...', 'quick-event-manager'),
        'noevent' => __('No event found', 'quick-event-manager'),
        'event_image' => '',
        'usefeatured' => 'checked',
        'monthheading' => '',
        'back_to_list_caption' => __('Return to Event list', 'quick-event-manager'),
        'image_width' => 300,
        'event_image_width' => 300,
        'event_order' => 'newest',
        'event_archive' => '',
        'map_width' => 200,
        'max_width' => 40,
        'map_height' => 200,
        'useics' => '',
        'uselistics' => '',
        'useicsbutton' => __('Download Event to Calendar', 'quick-event-manager'),
        'usetimezone' => '',
        'timezonebefore' => __('Timezone:', 'quick-event-manager'),
        'timezoneafter' => __('time', 'quick-event-manager'),
        'show_map' => 'checked',
        'map_and_image' => 'checked',
        'localization' => '',
        'monthtype' => 'short',
        'categorylocation' => 'title',
        'showcategory' => '',
        'recentposts' => '',
        'lightboxwidth' => 60,
        'fullpopup' => 'checked',
        'linktocategory' => 'checked',
        'showuncategorised' => '',
        'keycaption' => __('Event Categories:', 'quick-event-manager'),
        'showkeyabove' => '',
        'showkeybelow' => '',
        'showcategory' => '',
        'showcategorycaption' => __('Current Category:', 'quick-event-manager'),
        'cat_border' => 'checked',
        'catallevents' => '',
        'catalleventscaption' => 'Show All'
    );
    $display = array_merge($default, $display);
    return $display;
}

function qem_get_stored_style() {
    $style = get_option('qem_style');
    if(!is_array($style)) $style = array();
    $default = array(
        'font' => 'theme',
        'font-family' => 'arial, sans-serif',
        'font-size' => '1em',
        'header-size' => '100%',
        'width' => 600,
        'widthtype' => 'percent',
        'event_border' => '',
        'event_background' => 'bgtheme',
        'event_backgroundhex' => '#FFF',
        'date_colour' => '#FFF',
        'month_colour' => '#343838',
        'date_background' => 'grey',
        'date_backgroundhex' => '#FFF',
        'month_background' => 'white',
        'month_backgroundhex' => '#FFF',
        'date_border_width' => '2',
        'date_border_colour' => '#343838',
        'date_bold' => '',
        'date_italic' => 'checked',
        'calender_size' => 'medium',
        'icon_corners' => 'rounded',
        'styles' => '',
        'uselabels' => '',
        'startlabel' => __('Starts', 'quick-event-manager'),
        'finishlabel' => __('Ends', 'quick-event-manager'),
        'event_margin' => 'margin: 0 0 20px 0,',
        'line_margin' => 'margin: 0 0 8px 0,padding: 0 0 0 0',
        'custom' => ".qem {\r\n}\r\n.qem h2{\r\n}",
        'combined' => 'checked',
        'iconorder' => 'default',
        'vanillaw' => '',
        'vanillawidget' => '',
        'vanillamonth' => '',
        'use_head' => '',
        'linktocategory' => 'checked',
        'showuncategorised' => '',
        'keycaption' => __('Event Categories:', 'quick-event-manager'),
        'showkeyabove' => '',
        'showkeybelow' => '',
        'showcategory' => '',
        'showcategorycaption' => __('Current Category:', 'quick-event-manager'),
        'dayborder' => 'checked',
        'catallevents' => '',
        'catalleventscaption' => 'Show All'
    );
    $style = array_merge($default, $style);
    return $style;
}

function qem_get_stored_calendar() {
    $calendar = get_option('qem_calendar');
    if(!is_array($calendar)) $calendar = array();
    $default = array(
        'day' => '#EBEFC9',
        'calday' => '#EBEFC9',
        'eventday' => '#EED1AC',
        'oldday' => '#CCC',
        'eventhover' => '#F2F2E6',
        'eventdaytext' => '#343838',
        'eventbackground' => '#FFF',
        'eventtext' => '#343838',
        'eventlink' => 'linkpopup',
        'calendar_text' => __('View as calendar', 'quick-event-manager'),
        'calendar_url' => '',
        'eventlist_text' => __('View as a list of events', 'quick-event-manager'),
        'eventlist_url' => '',
        'eventlength' => '20',
        'connect' => '',
        'startday' => 'sunday',
        'archive' => 'checked',
        'archivelinks' => 'checked',
        'prevmonth' => 'Prev',
        'nextmonth' => 'Next',
        'smallicon' => 'arrow',
        'unicode' => '\263A',
        'eventtext' => '#343838',
        'eventtextsize' => '80%',
        'trigger' => '480px',
        'eventbackground' => '#FFF',
        'eventhover' => '#EED1AC',
        'eventborder' => '1px solid #343838',
        'keycaption' => __('Event Key:', 'quick-event-manager'),
        'navicon' => 'arrows',
        'linktocategory' => 'checked',
        'showuncategorised' => '',
        'tdborder' => '',
        'cellspacing' => 3,
        'header' =>'h2',
        'headerstyle' => '',
        'eventimage' => '',
        'imagewidth' => '80',
        'usetootlip' => '',
        'event_corner' => 'rounded',
        'fixeventborder' => '',
        'showmonthsabove' => '',
        'showmonthsbelow' => '',
        'monthscaption' => 'Select Month:',
        'hidenavigation' => '',
        'jumpto' => 'checked',
        'calallevents' => 'checked',
        'calalleventscaption' => 'Show All'
    );
    $calendar = array_merge($default, $calendar);
    return $calendar;
}

function qem_get_stored_register () {
    $register = get_option('qem_register');
    if(!is_array($register)) $register = array();
    $default = array(
        'sort' => 'field1,field2,field3,field4,field5,field6,field7,field8,field9,field10,field11,field12,field13,field14',
        'useform' => '',
        'formwidth' => 280,
        'usename' => 'checked',
        'usemail' => 'checked',
        'useblank1' => '',
        'useblank2' => '',
        'usedropdown' => '',
        'usenumber1' => '',
        'useaddinfo' => '',
        'reqname' => 'checked',
        'reqmail' => 'checked',
        'reqblank1' => '',
        'reqblank2' => '',
        'reqdropdown' => '',
        'reqnumber1' => '',
        'formborder' => '',
        'notificationsubject' => __('New registration for', 'quick-event-manager'),
        'title' => __('Register for this event', 'quick-event-manager'),
        'blurb' => __('Enter your details below', 'quick-event-manager'),
        'replytitle' => __('Thank you for registering', 'quick-event-manager'),
        'replyblurb' => __('We will be in contact soon', 'quick-event-manager'),
        'yourname' => __('Your Name', 'quick-event-manager'),
        'youremail' => __('Email Address', 'quick-event-manager'),
        'yourtelephone' => __('Telephone Number', 'quick-event-manager'),
        'yourplaces' => __('Places required', 'quick-event-manager'),
        'yourmessage' => __('Message', 'quick-event-manager'),
        'yourattend' => __('I will not be attending this event', 'quick-event-manager'),
        'yourblank1' => __('More Information', 'quick-event-manager'),
        'yourblank2' => __('More Information', 'quick-event-manager'),
        'yourdropdown' => __('Separate,With,Commas', 'quick-event-manager'),
        'yourselector' => __('Separate,With,Commas', 'quick-event-manager'),
        'yournumber1' => __('Number', 'quick-event-manager'),
        'addinfo' => __('Fill in this field', 'quick-event-manager'),
        'captchalabel' => __('Answer the sum', 'quick-event-manager'),
        'usemorenames' => '',
        'morenames' => __('Enter all names:','quick-event-manager'),
        'useterms' => '',
        'termslabel' => __('I agree to the Terms and Conditions', 'quick-event-manager'),
        'termsurl' => '',
        'termstarget' => '',
        'useattachment' => '',
        'attachmentlabel' => 'Attach an image',
        'attachmenttypes' => 'jpeg,jpg,gif,png',
        'attachmentsize' => '200kb',
        'notattend' => '',
        'replytitle' => 'Thank you for registering',
        'replyblurb' => 'We will be in contact soon',
        'error' => __('Please complete the form', 'quick-event-manager'),
        'qemsubmit' => __('Register', 'quick-event-manager'),
        'whoscoming' => '',
        'whoscomingmessage' => __('Look who\'s coming: ', 'quick-event-manager'),
        'placesbefore' => __('There are', 'quick-event-manager'),
        'placesafter' => __('places available.', 'quick-event-manager'),
        'numberattendingbefore' => __('There are', 'quick-event-manager'),
        'numberattendingafter' => __('people coming.', 'quick-event-manager'),
        'eventlist' => '',
        'eventfull' => '',
        'eventfullmessage' => __('Registration is closed', 'quick-event-manager'),
        'waitinglist' => '',
        'waitinglistreply' => __('Your name has been added to the waiting list', 'quick-event-manager'),
        'waitinglistmessage' => __('But you can register for the waiting list', 'quick-event-manager'),
        'moderate' => '',
        'moderatereply' => __('Your registration is awaiting approval', 'quick-event-manager'),
        'read_more' => __('Return to the event', 'quick-event-manager'),
        'useread_more' => '',
        'sendemail' => get_bloginfo('admin_email'),
        'qemmail' => 'wpmail',
        'sendcopy' => '',
        'usecopy' => '',
        'completed' => '',
        'copyblurb' => __('Send registration details to your email address', 'quick-event-manager'),
        'alreadyregistered' => __('You are already registered for this event', 'quick-event-manager'),
        'nameremoved' => __('You have been removed from the list', 'quick-event-manager'),
        'checkremoval' => '',
        'spam' => __('Your Details have been flagged as spam', 'quick-event-manager'),
        'thanksurl' => '',
        'cancelurl' => '',
        'allowmultiple' => '',
        'couponcode' => __('Coupon code', 'quick-event-manager'),
        'ignorepayment' => '',
        'ignorepaymentlabel'  => __('Pay on arrival', 'quick-event-manager'),
        'placesavailable' => 'checked',
        'submitbackground' => '#343838',
        'hoversubmitbackground' => '#888888'
    );
    $register = array_merge($default, $register);
    return $register;
}

function qem_get_register_style() {
    $style = get_option('qem_register_style');
    $register = qem_get_stored_register();
    if(!is_array($style)) $style = array();
    $default = array(
        'header' => '',
        'header-type' => 'h2',
        'header-size' => '1.6em',
        'header-colour' => '#465069',
        'text-font-family' => 'arial, sans-serif',
        'text-font-size' => '1em',
        'text-font-colour' => '#465069',
        'error-font-colour' => '#D31900',
        'error-border' => '1px solid #D31900',
        'form-width' => $register['formwidth'],
        'submitwidth' => 'submitpercent',
        'submitposition' => 'submitleft',
        'border' => 'none',
        'form-border' => '1px solid #415063',
        'input-border' => '1px solid #415063',
        'input-required' => '1px solid #00C618',
        'bordercolour' => '#415063',
        'inputborderdefault' => '1px solid #415063',
        'inputborderrequired' => '1px solid #00C618',
        'inputbackground' => '#FFFFFF',
        'inputfocus' => '#FFFFCC',
        'background' => 'theme',
        'backgroundhex' => '#FFF',
        'submit-colour' => '#FFF',
        'submit-background' => $register['submitbackground'],
        'submit-hover-background' => $register['hoversubmitbackground'],
        'submit-button' => '',
        'submit-border' => '1px solid #415063',
        'submitwidth' => 'submitpercent',
        'submitposition' => 'submitleft',
        'corners' => 'corner',
        'line_margin' => 'margin: 2px 0 3px 0;padding: 6px;'
    );
    $style = array_merge($default, $style);
    return $style;
}

function qem_get_stored_payment () {
    $payment = get_option('qem_payment');
    if(!is_array($payment)) $payment = array();
    $default = array(
        'useqpp' => '',
        'qppform' => '',
        'currency' => 'USD',
        'paypalemail' => '',
        'useprocess' => '',
        'waiting' => __('Waiting for PayPal', 'quick-event-manager').'...',
        'processtype' => 'processfixed',
        'processpercent' => '5',
        'processfixed' => '2',
        'qempaypalsubmit' => __('Register and Pay', 'quick-event-manager'),
        'ipn' => '',
        'ipnblock' => '',
        'title' => __('Payment', 'quick-event-manager'),
        'paid' => __('Complete', 'quick-event-manager'),
        'usecoupon' => '',
        'couponcode' => __('Coupon code', 'quick-event-manager')
    );
    $payment = array_merge($default, $payment);
    return $payment;
}

function qem_get_stored_coupon () {
    $coupon = get_option('qem_coupon');
    if(!is_array($coupon)) $coupon = array();
    $default = qem_get_default_coupon();
    $coupon = array_merge($default, $coupon);
    return $coupon;
}

function qem_get_default_coupon () {
    for ($i=1; $i<=10; $i++) {
        $coupon['couponget'] = 'Coupon Code:';
        $coupon['coupontype'.$i] = 'percent'.$i;
        $coupon['couponpercent'.$i] = '10';
        $coupon['couponfixed'.$i] = '5';
    }
    $coupon['couponget'] = 'Coupon Code:';
    $coupon['couponnumber'] = '10';
    $coupon['duplicate'] = '';
    $coupon['couponerror'] = 'Invalid Code';
    return $coupon;
}

function qem_get_stored_autoresponder () {
    $auto = get_option('qem_autoresponder');
    if(!is_array($auto)) $auto = array();
    $fromemail = get_bloginfo('admin_email');
    $title = get_bloginfo('name');
    $default = array(
        'enable' => '',
        'whenconfirm' => 'aftersubmission',
        'subject' => 'You have registered for ',
        'subjecttitle' => 'checked',
        'subjectdate' => '',
        'message' => 'Thank you for registering, we will be in contact soon. If you have any questions please reply to this email.',
        'useeventdetails' => '',
        'eventdetailsblurb' => __('Event Details', 'quick-event-manager'),
        'useregistrationdetails' => 'checked',
        'registrationdetailsblurb' => __('Your registration details', 'quick-event-manager'),
        'sendcopy' => 'checked',
        'fromname' => $title,
        'fromemail' => $fromemail,
        'permalink' => ''
    );
    $auto = array_merge($default, $auto);
    return $auto;
}

function qem_get_stored_smtp () {
    $smtp = get_option('qem_smtp');
    if(!is_array($smtp)) $smtp = array();
    $default = array(
        'smtp_host' => 'localhost',
        'smtp_port' => '25',
        'smtp_ssl' => 'none',
        'smtp_auth' => 'authfalse',
        'smtp_user' => '',
        'smtp_pass' => ''
    );
    $smtp = array_merge($default, $smtp);
    return $smtp;
}

function qem_get_stored_incontext () {
    $payment = get_option('qem_incontext');
    if(!is_array($payment)) $payment = array();
    $default = array(
		'useincontext' => false,
        'merchantid' => '',
        'api_username' => '',
        'api_password' => '',
        'api_key' => ''
    );
    $payment = array_merge($default, $payment);
    return $payment;
}

function qem_get_stored_sandbox () {
    $payment = get_option('qem_sandbox');
    if(!is_array($payment)) $payment = array();
    $default = array(
		'useincontext' => true,
        'merchantid' => '',
        'api_username' => '',
        'api_password' => '',
        'api_key' => ''
    );
    $payment = array_merge($default, $payment);
    return $payment;
}

function qem_get_stored_api () {
    $api = get_option('qem_api');
    if(!is_array($api)) $api = array();
    $default = array(
        'validating' => 'Validating payment information...',
        'waiting' => 'Waiting for PayPal...',
        'errortitle' => 'There is a problem',
        'errorblurb' => 'Your payment could not be processed. Please try again',
        'technicalerrorblurb' => 'There seems to be a technical issue, contact an administrator!',
        'failuretitle' => 'Order Failure',
        'failureblurb' => 'The payment has not been completed.',
        'failureanchor' => 'Try again',
        'pendingtitle' => 'Payment Pending',
        'pendingblurb' => 'The payment has been processed, but confimration is currently pending. Refresh this page for real-time changes to this order.',
        'pendinganchor' => 'Refresh This Page',
        'confirmationtitle' => 'Registration Confirmation',
        'confirmationblurb' => 'The transaction has been completed successfully. Keep this information for your records.',
        'confirmationreference' => 'Payment Reference:',
        'confirmationamount' => 'Amount Paid:',
        'confirmationanchor' => 'Register another person',
    );
    $api = array_merge($default, $api);
    return $api;
}

function qem_get_addons () {
    $qemkey = get_option('qpp_key');
    if (!$qemkey['authorised']) {
        $arr = get_option('qem_addons');
        if(!is_array($arr)) $arr = array();
        $default = array(
            'sendtoorganiser' => false,
            'mailchimpuser' =>'',
            'mailchimpid' =>'',
            
            );
        $arr = array_merge($default, $arr);
        return $payment;
    }
    else {
        return array();
    }
}

function qem_stored_guest () {
	$guest = get_option('qem_guest');
	if(!is_array($guest )) $guest = array();
	$default = array(
	'title' => 'Create an Event',
	'blurb' => 'Complete the form below to add your own event',
	'thankstitle' => 'Thank you for submitting your event',
    'thanksblurb' => 'View all current events',
    'allowimage' => false,
    'imagesize' => 100000,
    'pendingblurb' => 'Your event is awaiting review and will be published soon.',
    'errormessage' => 'Please complete all marked fields',
    'errorduplicate' => 'An Event with that Title already exists...',
    'errorcaptcha' => 'The captcha answer is incorrect',
    'errorimage' => 'There is an error with the chosen image',
    'errorenddate' => 'The event ends before it starts',
    'noui' => '',
    'event_title_checked' => 'checked',
    'event_details_checked' => '',
    'event_tags_checked' => '',
    'event_category_checked' => '',
    'event_date_checked' => 'checked',
    'event_end_date_checked' => '',
    'event_start_checked' => '',
    'event_finish_checked' => '',
    'event_desc_checked' => '',
    'event_location_checked' => '',
    'event_address_checked' => '',
    'event_link_checked' => '',
    'event_anchor_checked' => '',
    'event_cost_checked' => '',
    'event_forms_checked' => '',
    'event_image_checked' => '',
    'event_register_checked' => '',
    'event_pay_checked' => '',
    'event_image_upload_checked' => '',
    'event_captcha_checked' => 'checked',
    'event_author_checked' => 'checked',
    'event_author_email_checked' => 'checked',
    'event_title_use' => 'checked',
    'event_details_use' => 'checked',
    'event_tags_use' => '',
    'event_category_use' => '',
    'event_date_use' => 'checked',
    'event_end_date_use' => 'checked',
    'event_start_use' => 'checked',
    'event_finish_use' => 'checked',
    'event_desc_use' => 'checked',
    'event_location_use' => 'checked',
    'event_address_use' => 'checked',
    'event_link_use' => 'checked',
    'event_anchor_use' => 'checked',
    'event_cost_use' => 'checked',
    'event_organiser_use' => 'checked',
    'event_telephone_use' => 'checked',
    'event_forms_use' => 'checked',
    'event_image_upload_use' => '',
    'event_register_use' => '',
    'event_image_upload_use' => '',
    'event_captcha_use' => 'checked',
    'event_author_use' => 'checked',
    'event_author_email_use' => 'checked',
    'event_title_caption' => 'Event Title',
    'event_details_caption' => 'Event Details',
    'event_tags_caption' => 'Tags',
    'event_category_caption' => 'Category',
    'event_date_caption' => 'Start Date',
    'event_end_date_caption' => 'End Date',
    'event_start_caption' => 'Start Time',
    'event_finish_caption' => 'End Time',
    'event_desc_caption' => 'Description',
    'event_location_caption' => 'Location',
    'event_address_caption' => 'Address',
    'event_link_caption' => 'Website',
    'event_anchor_caption' => 'Display As',
    'event_cost_caption' => 'Cost',
    'event_organiser_caption' => 'Organiser',
    'event_telephone_caption' => 'Telephone',
    'event_register_caption' => 'Registration Form',
    'event_image_upload_caption' => 'Event Image',
    'event_captcha_label_caption' => 'Captcha',
    'event_author_caption' => 'Author Name',
    'event_author_email_caption' => 'Author Email',
    'event_forms_caption' => 'Event Forms',
    'event_title' => 'Event Title',
    'event_details' => 'Event Details',
    'event_tags' => 'Tags',
    'event_category' => '1',
    'event_date' => 'Start Date',
    'event_end_date' => 'End Date',
    'event_start' => 'Start Time',
    'event_finish' => 'End Time',
    'event_desc' => 'Description',
    'event_location' => 'Venue',
    'event_address' => 'Address',
    'event_link' => 'Website',
    'event_anchor' => 'Website Name',
    'event_cost' => 'Cost',
    'event_organiser' => 'Organiser',
    'event_telephone' => 'Telephone',
    'event_forms' => 'Event Forms',
    'event_register' => 'Add a registration form to your event',
    'event_image_details' => 'jpg, gif or png only. Max file size 100kb',
    'event_image_upload' => 'Event Image (jpg, gif or png only. Max file size 100kb)',
    'event_captcha_label' => 'Anti spam Captcha',
    'event_author' => 'Your Name',
    'event_author_email' => 'Your Email'
        );
	$guest = array_merge($default, $guest );
	return $guest ;
	}

function qem_guest_list () {
    $event = array(
        'event_title',
        'event_date',
        'event_end_date',
        'event_start',
        'event_finish',
        'event_desc',
        'event_location',
        'event_address',
        'event_link',
        'event_anchor',
        'event_number',
        'event_cost',
        'event_organiser',
        'event_telephone',
        'event_details',
        'event_register',
        'event_tags',
        'event_author',
        'event_author_email',
        'event_image_upload',
        'event_category',
        'event_repeat',
        'theday',
        'thenumber',
        'therepetitions',
        'thewmy'
    );
    return $event;
}