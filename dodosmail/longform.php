<?php
include_once("header.php");
?>
	<script type="text/javascript">
	function toggleDiv(divName) {
		thisDiv = document.getElementById(divName);
		if (thisDiv) {
			if (thisDiv.style.display == "none") {
				thisDiv.style.display = "block";
			}
			else {
				thisDiv.style.display = "none";
			}
		}
		else {
			alert("Error: Could not locate div with id: " + divName);
		}
	}
	</script>
	<form action="dodosmail.php" method="post">
	<p>
	<!-- these variables require customization -->
	<input type="hidden" name="required_fields" value="subject,name,email,message" />
	<input type="hidden" name="subject" value="DodosMail" />
	<input type="hidden" name="your_email_address" value="you@domain.com" />
	<input type="hidden" name="check_email_address" value="yes" />

	<!-- old variables for error page and output page are not replaced by css -->
	<!-- now you may choose to define the header and footer files for your dodosmail.php below -->
	<input type="hidden" name="dodosmail_header_file" value="header.php" />
	<input type="hidden" name="dodosmail_footer_file" value="dodofooter.php" />

	<!-- these variables are for the auto response email sent to your sender, feel free to disable by putting a "no" in the first line -->
	<input type="hidden" name="autoresponse" value="no" />
	<input type="hidden" name="owner_name" value="me" />
	<input type="hidden" name="response_subject" value="Thank you for your mail!" />
	<input type="hidden" name="response_mail" value="This is an auto response to let you know that I've successfully received your email sent through my email form. Thanks!" />

	<!-- if you want dodosmail to do redirection, uncomment the following and edit appropriately -->
	<!--input type="hidden" name="after_url" value="thankyou.html"-->
	<b>This is a long form, it will use multiple pages.</b>
	</p>

	<!-- page 1 -->
	<p id="page1">
	
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

	Telephone:
	<br />
	<input type="text" name="telephone" style="width: 50%" />
	<br />
	<br />


	<!-- hide page 1, load page 2 -->
	
	<a href="#" onclick="toggleDiv('page1');toggleDiv('page2')">Next Page</a>
	</p>
	
	 


	<!-- page 2 -->
	<p id="page2" style="display: none">

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

	<!-- hide page 2, load page 3 -->
	<a href="#" onclick="toggleDiv('page1');toggleDiv('page2')">Previous Page</a> | 
	<a href="#" onclick="toggleDiv('page2');toggleDiv('page3')">Next Page</a>
	</p>
	 


	<!-- page 3 -->
	<p id="page3" style="display: none">
	Checkbox Test:
	<br />
	<input type="checkbox" name="checkboxname[]" value="1" /> 1 
	<input type="checkbox" name="checkboxname[]" value="2" /> 2 
	<input type="checkbox" name="checkboxname[]" value="3" /> 3 

	<br />
	<br />

	Message 2:
	<br />
	<textarea cols="40" rows="5" name="message2" style="width: 50%"></textarea>
	<br />
	<br />
	Money 2:
	<br />
	<input type="text" name="money2" style="width: 50%" />

	<br />
	<br />


	Food 2:
	<br />
	<input type="text" name="food2" style="width: 50%" />

	<br />
	<br />


	<input type="submit" value="Submit" />

	<br />
	<br />

	<a href="#" onclick="toggleDiv('page2');toggleDiv('page3')">Previous Page</a>
	</p>

	</form>

<?php
include_once("footer.php");
?>