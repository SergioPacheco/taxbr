<?php
include_once("header.php");
?>
	
	<form action="dodosmail.php" method="post">
	<p>
	<!-- these variables require customization -->
	<input type="hidden" name="required_fields" value="subject,name,email,message" />
	<input type="hidden" name="subject" value="DodosMail" />
	<input type="hidden" name="your_email_address" value="you@yourdomain.com" />
	<input type="hidden" name="check_email_address" value="yes" />

	<!-- old variables for error page and output page are not replaced by css -->
	<!-- now you may choose to define the header and footer files for your dodosmail.php below -->
	<input type="hidden" name="dodosmail_header_file" value="header.php" />
	<input type="hidden" name="dodosmail_footer_file" value="footer.php" />

	<!-- these variables are for the auto response email sent to your sender, feel free to disable by putting a "no" in the first line -->
	<input type="hidden" name="autoresponse" value="no" />
	<input type="hidden" name="owner_name" value="me" />
	<input type="hidden" name="response_subject" value="Thank you for your mail!" />
	<input type="hidden" name="response_mail" value="This is an auto response to let you know that I've successfully received your email sent through my email form. Thanks!" />

	<!-- if you want dodosmail to do redirection, uncomment the following and edit appropriately -->
	<!--input type="hidden" name="after_url" value="thankyou.html"-->

	Name:
	<br />
	<input type="text" name="name" style="width: 50%" />
	<br />
	<br />

	Email:
	<br />
	<input type="text" name="email" style="width: 50%" />
	<br />
	<br />

	Message:
	<br />
	<textarea cols="40" rows="5" name="message" style="width: 50%"></textarea>
	<br />
	<br />
	Money:
	<br />
	<input type="text" name="money" style="width: 50%" />

	<br />
	<br />


	Food:
	<br />
	<input type="text" name="food" style="width: 50%" />


	<br />
	<br />

	Checkbox Test:
	<br />
	<input type="checkbox" name="checkboxtest[]" value="1">1 
	<input type="checkbox" name="checkboxtest[]" value="2">2 
	<input type="checkbox" name="checkboxtest[]" value="3">3 
	<input type="checkbox" name="checkboxtest[]" value="4">4


	<br />
	<br />


	<input type="submit" value="Submit" />
	</p>
	</form>

<?php
include_once("footer.php");
?>