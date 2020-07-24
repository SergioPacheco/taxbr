##############################################################################
# DodosMail                       Version 2.5                                #
# Copyright 2001 Ying Zhang       http://pure-essence.net/about/contact	     #
# Created 09/04/01                Last Modified 11/23/06                     #
# Regretless.com                  http://www.regretless.com/                 #
##############################################################################
# COPYRIGHT NOTICE                                                           #
# Copyright 2001-2006 Ying Zhang.  All Rights Reserved.                      #
#                                                                            #
# DodosMail may be used and modified free of charge by anyone so long as     #
# this copyright notice and the comments above remain intact.  By using this #
# code you agree to indemnify Ying Zhang from any liability that             #
# might arise from its use.                                                  #
#                                                                            #
# Selling the code for this program without prior written consent is         #
# expressly forbidden.  In other words, please ask first before you try and  #
# make money off of my program.                                              #
#                                                                            #
# Obtain permission before redistributing this software over the Internet or #
# in any other medium.	In all cases copyright and header must remain intact.#
##############################################################################

================================================================================
About
================================================================================
DodosMail is an easy-to-install PHP email script for everyone.
This zip file includes
	dodosmail.php		- the php file that does the mail delivering
	dodoscaptcha.php	- the php file that does the captcha image 	
				  generation
	readme.txt		- instructions about how to install
	header.php		- default header file
	footer.php		- default footer file
	reservoir.css		- default css file
	back.png		- background image
	test.php		- demo how to use header and footer files.
	captchaTest.php		- demo how to use captcha
	longform.php		- demo how to use dodosmail for a multi-page 	
			  form.
	test.html		- demo backward compatibility




================================================================================
Requirements
================================================================================
A server that supports PHP. A server that supports http://php.net/mail function.
Some basic understanding of PHP includes.




================================================================================
What's New?
================================================================================
Now you may opt to use captcha to help spam protection.
Allows you specify a php header and footer file.
Backward compatible with older version setting.
An improved email checking function.
Compatible with checkboxes
Demo to show you how to use DodosMail with a long multi-page form




================================================================================
Installation
================================================================================
You should have some basic knowledge about form in html. Open test.html, you 
will see a very basic sample form code.
hidden fields are:
  <input type="hidden" name="required_fields" 
value="subject,after_url,name,email,message" />
	-- put all the names of the required fields in here

  <input type="hidden" name="your_email_address" value="you@yourdomain.com" />
	-- put your real email address here or to do it a more secure way, check 
out "Customize your email address" section

  <input type="hidden" name="check_email_address" value="yes" />
	-- put "no" if you do not want the script to check the sender's email 
address for validity.

  <input type="hidden" name="subject" value="DodosMail" />
	-- you can have this field either as text or hidden. if it's text, then 
sender may change the subject of the email freely, otherwise it'll be 
the same subject regardless who sends it.




================================================================================
How to use captcha (take a look at captchaTest.php)
================================================================================
You must have PHP & GD library installed on your server for this to work. 

First you must indicate in your form that you plan to use this feature by 
putting the code below in your form:
	<!-- indicate below that you will use captcha -->
	<input type="hidden" name="use_dodos_captcha" value="yes" />

Then you must include a field that allows the user to input the text and link 
the captcha image by doing something like:
	Spam protection (enter the text <img 
src="dodoscaptcha.php?captchabgcolor=EEEEEE&amp;captchatextcolor=900000" 
style="vertical-align: middle" /> below):
	<br />
	<input type="text" name="use_dodos_captcha_typed" size="6" /> 

Notice you may change the background and text color by passing the hexcode for 
the two colors. If you do not pass in any colors, you will have black text on 
white background.

If the image does not show up on your page after you have included the file, 
it's most likely GD library is not appropriately installed on your server. 
Please contact your host for more information.

----------------REMEMBER----------------
The two variable names:
use_dodos_captcha
use_dodos_captcha_typed
may only be used for captcha purpose.




----------------------------------------------------------------------------
following fields MUST appear if you wish to use captcha
----------------------------------------------------------------------------
  <input type="hidden" name="use_dodos_captcha" value="yes" />
Spam protection (enter the text <img 
src="dodoscaptcha.php?captchabgcolor=EEEEEE&amp;captchatextcolor=900000" 
style="vertical-align: middle" /> below):
	<br />
	<input type="text" name="use_dodos_captcha_typed" size="6" /> 
----------------------------------------------------------------------------
END OF following fields MUST appear if you wish to use captcha
----------------------------------------------------------------------------




----------------------------------------------------------------------------
following fields MUST appear if you wish to use php header and footer
----------------------------------------------------------------------------
  <input type="hidden" name="dodosmail_header_file" value="header.php" />
  <input type="hidden" name="dodosmail_footer_file" value="footer.php" />
----------------------------------------------------------------------------
END OF following fields MUST appear if you wish to use php header and footer
----------------------------------------------------------------------------




----------------------------------------------------------------------------
following fields should NOT appear if you choose to include php header and 
footer
----------------------------------------------------------------------------
  <input type="hidden" name="background_color" value="#FFFFFF">
	-- the html color code for page backgroud

  <input type="hidden" name="background_image" value="bk.gif">
	-- the image name for background. you may put it as the format 
"http://yourdomain.com/images/bk.gif"

  <input type="hidden" name="text_color" value="#000000">
	-- the html color code for text color

  <input type="hidden" name="link_color" value="#C000C0">
	-- the html color code for link text color

  <input type="hidden" name="visited_link_color" value="#0000C0">
	-- the html color code for visted link text color

  <input type="hidden" name="active_link_color" value="#0000C0">
	-- the html color code for active link text color

  <input type="hidden" name="font_name" value="Verdana">
	-- the font you want to use for the output and error page

  <input type="hidden" name="font_size" value="2">
	-- the font size

  <input type="hidden" name="highlight_color" value="red">
	-- the highlight color for required field on error page.
	for example:
		The required field <font color=highlight_color>name</font> is 
empty.

  <input type="hidden" name="css_file" value="">
	-- if you have a css file you'd like to use, please fill it in, 
otherwise leave it blank
----------------------------------------------------------------------------
END OF following fields should NOT appear if you choose to include php header 
and footer
----------------------------------------------------------------------------




  <input type="hidden" name="autoresponse" value="yes" />
	-- put "no" in the value if you do not wish the sender to get an auto 
response mail from you.
	
  <input type="hidden" name="owner_name" value="me" />
	-- replace "me" with YOUR NAME (the owner of the mail form)

  <input type="hidden" name="response_subject" value="Thank you for your mail!" 
/>
	-- the auto response mail subject

  <input type="hidden" name="response_mail" value="This is an auto response to 
let you know that I've successfully received your email sent through my email 
form. Thanks!" />
	-- what do you want it to say in the auto response mail?


  <input type="hidden" name="after_url" value="thankyou.html" />
	-- this is the url where you want the mail form to redirect to after it 
has successfully sent the mail. if want the dodosmail to print an output 
instead of redirect. just get rid of this line. if you got rid of it, 
dodosmail will print something like:

	The following has been sent successfully!
		name: test
		email: test@regretless.com
		message: just a test
		money: no money
		food: need food

	with your css file definition




================================================================================
IMPORTANT NOTE!
================================================================================
Please do not use the following variable names other than for layout purpose. 
They are all reserved variable names.

"css_file", "background_color", "background_image", "text_color", "link_color", 
"visited_link_color", "active_link_color", "font_name", "font_size", 
"highlight_color", "required_fields", "after_url", "check_email_address", 
"subject", "your_email_address", "env_report", "owner_name", "autoresponse", 
"response_subject", "response_mail", "dodosmail_header_file", 
"dodosmail_footer_file"

If you wish to use checkbox in your form, the name of your check box must end 
with []. For example:
<input type="checkbox" name="checkboxtest[]" value="1">1 
<input type="checkbox" name="checkboxtest[]" value="2">2 
<input type="checkbox" name="checkboxtest[]" value="3">3 
<input type="checkbox" name="checkboxtest[]" value="4">4




================================================================================
Modify Header and Footer
================================================================================
The values for your header and footer files can be modified at two locations. 
	put in the correct file names for:
	<input type="hidden" name="dodosmail_header_file" value="header.php" />
	<input type="hidden" name="dodosmail_footer_file" value="dodofooter.php" 
/>
	in the form code




================================================================================
Add more fields
================================================================================
You can add as many new fields as you want. Please keep in mind name the fields 
using smart naming techniques. NO SPACES!! ALWAYS USE UNDERSCORE!!! or your mail 
script wont work!

for exmaple:
	Who's your favorite singer?
	<input type="text" name="favorite_singer" />




================================================================================
Customize your email address
================================================================================
There are two ways to put your email address in this script. You can either put 
it in the form as an hidden field or you can hide your email address from the 
public and put it in the dodosmail.php

WAY ONE:
	put in your correct address for:
	<input type="hidden" name="your_email_address" 
value="you@yourdomain.com" />
	in the form code

	**********
	advantage:
	**********
	without modifying dodosmail.php, you can call this script from anywhere 
and as many times as you want.
	*************
	disadvantage:
	*************
	your email address is not really hidden, people can still find it out by 
view source

WAY TWO:
	open dodosmail.php
	get rid of the "##" in front of 
$your_email_address="you@yourdomain.com";
	and replace you@yourdomain.com with your real email address
	delete
	<input type="hidden" name="your_email_address" 
value="you@yourdomain.com" />
	in the form code

	**********
	advantage:
	**********
	your email address is now truly hidden from public. no one can view it 
from the server.
	*************
	disadvantage:
	*************
	if you wish to set up another mail form to ANOTHER email address, you 
must use a second copy of dodosmail.php




================================================================================
Comments or Suggestions
================================================================================
You are welcome to send comments or suggestions to 
http://pure-essence.net/about/contact
However, do not expect a reply. That will depend on the complexity of your 
problem and my schedule.




================================================================================
Script Log
================================================================================
09/04/01 started.
09/05/01 finished version 1.0 ;)
09/06/01 fixed a minor bug for env_report thing
09/06/01 added extra option to have dodosmail show mail output as well as 
rediret. and released as v1.05
11/18/01 added extra option to allow auto response mail for your sender.
02/14/05 upgrading the script to Version 2.0.1
09/19/05 added global register code
12/02/05 upgrading the script to Version 2.1 by securing the script from header 
injection 
http://securephp.damonkohler.com/index.php/Email_Injection
11/23/06 upgrading the script to Version 2.5 by adding the captcha support
04/13/07 fixed gmail issue by removing \r in headers. for more info, visit 
http://www.bigroom.co.uk/blog/php-mail-and-gmail/
