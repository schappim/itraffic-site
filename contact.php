<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Platinum | Contact Us</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen, projection"/>
<link rel="stylesheet" href="css/print.css" type="text/css" media="print"/>
<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen, projection"/>
<link rel="stylesheet" type="text/css" href="css/ui.tabs.css" media="screen" />
<link rel="stylesheet" id="defaultStyle" href="css/style.css" type="text/css" media="screen, projection" />
<!--[if IE]>
  <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen, projection"/>
<![endif]-->
<script type="text/javascript" src="js/jquery-1.3.1.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/contact.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('HTML').addClass('JS');
});
</script>
<!--[if lt IE 7]>
 <link rel="stylesheet" href="css/style_ie6.css" type="text/css" media="screen, projection"/>
<script src="js/DD_belatedPNG_0.0.7a-min.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function(){
    DD_belatedPNG.fix('.ui-tabs, .ui-tabs-nav, .ui-tabs-nav li,.ui-tabs-nav li a,#slide-wrapper .inner, .button, .testimonial, .testimonial .inner, .feature-list img, #content-zone .outer, #content-zone .inner');
    
});
</script>
<![endif]-->
</head>
<body>
<div class="header">
  <div class="container">
    <h1><a href="index.html" title="Back to home">platinum</a></h1>
   <div id="login"> <a href="signup.html" title="Sign Up">Sign Up</a> | <a href="login.html" title="Log In">Log In</a> </div>    <div id="nav">
      <ul>
        <li><a href="index.html" title="Home">home</a></li>
        <li><a href="tour.html" title="take the tour">take the tour</a></li>
        <li><a href="http://www.twitter.com/itraffic"  title="micro blog">micro blog</a></li>
        <li class="current"><a href="contact.php"  title="contact">contact</a></li>
      </ul>
    </div>
  </div>
</div>
<!-- *************** content *************** -->
<div id="page">
  <div class="wrapper">
    <div class="container">
      <div id="content-zone" class="prepend-6 span-12 append-6 last">
        <h2>Contact Us</h2>
        <div class="outer">
          <div class="inner">
            <div class="sub">
                  <div class="contact-messages content">
        <?php 
	  if(isset($_POST['submitted'])) {
		
		if($_POST['sp_catcher'] != '') {
		$spamError = true;
	}	

		if($_POST['name'] == '') {
		$nameError = 'You forgot to enter your name.';
	}
	
	if($_POST['email'] == '') {
		$emailError = 'You forgot to enter your email address';
	} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", $_POST['email'])) {
		$emailError = 'Enter a valid email address';
	}
	
	if($_POST['message'] == '') {
		$messageError = 'You forgot to enter the message.';
	}

	if(!isset($spamError) && !isset($nameError) && !isset($emailError) && !isset($messageError)) {
		$mailTo = $_POST['mailTo'];
		$subject = $_POST['subject'];
		$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$headers = 'From: '.$name.'<'.$email .'> "\r\n" ' .
		'X-Mailer: PHP/' . phpversion();
mail($mailTo, $subject, $message, $headers);
		?>
        <div class="box success">Thanks ! Your email was successfully sent.</div>
        <?php
	}else{
		?>
        <div class="box error">
          <ul class="no-margin">
            <?php if(isset($nameError)) echo '<li class="">'.$nameError.'</li>'; ?>
            <?php if(isset($emailError)) echo '<li class="">'.$emailError.'</li>'; ?>
            <?php if(isset($messageError)) echo '<li class="">'.$messageError.'</li>'; ?>
          </ul>
        </div>
        <?php
		}
}else{
	?>
        <p>Don't hesitate to contact us ! We will answer your inquiry as soon as possible.</p>
        <p>You can modify the address the message will be sent to, as well as the subject in the form's source code. </p>
        <?php
	}
?>
</div>
<hr/>
              <form action="contact.php" method="post" id="sendEmail" class="horizontal">
                <!-- ================= put your email address here ================ -->
                <input type="hidden" id="mailTo" name="mailTo" value="your_name_here@your_domain.com" />
                <!-- ======== you will receive messages with this subject ========= -->
                <input type="hidden" id="subject" name="subject" value="Steelfolio Message" />
                <!-- ============================================================== -->
                <input type="hidden" name="submitted" value="1" />
                <div class="field">
                  <label for="name">Your name</label>
                  <input name="name" id="name" value="<?= $_POST['name']; ?>" type="text"/>
                </div>
                <div class="field">
                  <label for="mail">Your email</label>
                  <input name="email" id="mail" value="<?= $_POST['email']; ?>" type="text"/>
                </div>
                <div class="field">
                  <label for="message">Your message</label>
                  <textarea name="message" id="message" cols="30" rows="5"><?= $_POST['message']; ?>
</textarea>
                </div>
                <div class="submit-row">
                  <button id="submit" type="submit" class="button" title="Send"><span>Send your message !</span></button>
                  <div id="spam_catcher">
                    <input type="text" value="" name="sp_catcher"/>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- *************** footer *************** -->
<div class="footer">
  <div class="container"><div class="span-24 content"><p>Copyright &copy; 2009 <a href="http://www.appovation.com" title="AppOvation">AppOvation Pty Ltd</a>. All rights reserved.</p></div> </div>
</div></body>
</html>
