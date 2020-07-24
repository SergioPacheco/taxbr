<?php 
//PHP Script: Tell A Friend : Copyright Christian-web-masters.com
//You can get free and friendly help with this script at the 
//Christian Web Masters forums: www.christian-web-masters.com/forums

//Copy and paste this code into your PHP page, where you want 
//the Tell a Friend Form to appear.
//Note if you do not know PHP, just make a regular HTML page
//and save it as a .php file.  

//You can also save this as a .php file such as "tell.php"
//and include it in the php file(s) of your choice
//using: include("tell.php");

//Then just link to this page from wherever you want.

//You will need to configure the script.  
//It's easy, just use a text editor.
//Follow the instructions in the "Begin Configure" section below.

//Note: This script contains a link to our site.  
//We'd like it if you left it, but you have permission to remove it. :)

//This script uses the new $_POST and $_SERVER['HTTP_REFERRER']
//If you have an issue with an older version of PHP, you can get help at:

// ************Begin Configure***************

//Put your website name between the quotes below:
$websiteName = "Tax Returns Accountants";

//Put your website address between the quotes below:
$websiteAddress = "www.taxbr.com";


// If you have a privacy policy, put in the link title: 
$privacyPolicyLinkText = "";


// Put in the "" the url to you your privacy policy, if you have one,
$privacyPolicyLinkURL = "";


// Change the 0 to a 1 below, 
//if you want to recieve a notice when people are refered:
$notice = 1;


//Put your email address in the " " if you changed the notice to 1
$adminEmail = "info@taxbr.com";


//Put the subject line text you want the email to read in the  "":
$subject = "Voce esta sendo convidado a visitar Tax Returns Accountants";

// Put your default message intro text in the first set of quotes below
//This is what the people who are referred will see
//along with any personal message entered by the referer.
$defaultMessageIntro = "Voce foi convidado a visitar: " . "\n" ; 


//Put in the "" your default close (this will be at the end of the message):
//$defaultMessageClose = "MySiteName is about ..... You can visit MySiteName at: http://www.mysiteaddress.com";
$defaultMessageClose = "";



// ************End Configure****************

// Set the link that will be in intro/invite and used to send the referer back
if (isset($_POST['link'])) {
$link = $_POST['link'];
}
else {
	if (empty($_SERVER['HTTP_REFERER'])) { 
     $link = 'http://' . $websiteAddress;
 	} else { 
     $link = $_SERVER['HTTP_REFERER']; 
	 
 	} 
}
// Add the link to the intro
$defaultMessageIntro = $defaultMessageIntro . $link . "\n";

//Adds a space infront of the subject line (to add a name latter
$subject = ' ' . $subject;
?>
<?php
function doTellForm ($privacyPolicyLinkText, $privacyPolicyLinkURL, $defaultMessageIntro, $link) 
{
// If you understand HTML, you can make changes to the form layout below.
// I just copy the HTML from the "<form" opening to the "</form>"
// Put it into Dreamweaver (WYSIWYG Editor), work on it and put it back.
$theForm = <<<EOD
<form id="form2" name="tellForm" method="post" action="">


<p>
Se voc&ecirc; tem amigos que possam se beneficiar de nossos servi&ccedil;os, indique nosso website. Eles ir&atilde;o te agradecer!
</p>
<br/>
  <table width="400px" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr> 
      <td width="50%"><div align="center">Seu nome:</div></td>
      <td width="50%"><div align="center">Seu e-mail:</div></td>
    </tr>
    <tr> 
      <td> <div align="center"> 
          <input name="your_name" type="text" id="your_name">
        </div></td>
      <td> <div align="center"> 
          <input name="your_email" type="text" id="your_email">
        </div></td>
    </tr>
    <tr> 
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
    </tr>
    <tr> 
      <td><div align="center">Nome Amigo(a):</div></td>
      <td><div align="center">E-mail Amigo(a):</div></td>
    </tr>
    <tr> 
      <td> <div align="center"> 
          <input name="friend_name1" type="text" id="friend_name1">
        </div></td>
      <td width="50%"> <div align="center"> 
          <input name="friend_email1" type="text" id="friend_email1">
        </div></td>
    </tr>
    <tr> 
      <td> <div align="center"> 
          <input name="friend_name2" type="text" id="friend_name2">
        </div></td>
      <td> <div align="center"> 
          <input name="friend_email2" type="text" id="friend_email2">
        </div></td>
    </tr>
    <tr> 
      <td> <div align="center"> 
          <input name="friend_name3" type="text" id="friend_name3">
        </div></td>
      <td> <div align="center"> 
          <input name="friend_email3" type="text" id="friend_email3">
        </div></td>
    </tr>
    <tr> 
      <td colspan="2"><div align="center"> 
	  <br/>
          <p>Sua Mensagem: 
            <input name="tellsubmit" type="hidden" id="tellsubmit4" value="doTheSend">
            <input name="link" type="hidden" id="link" value="$link">
            <br>
            <textarea name="message" cols="40" rows="10" id="textarea">$defaultMessageIntro</textarea>
          </p>
          </div></td>
    </tr>
    <tr> 
      <td colspan="2"><p align="center"> 
          <input type="submit" name="Submit" value="Enviar">
        </p>
        <p align="center"><a href="$privacyPolicyLinkURL" target="_blank">$privacyPolicyLinkText</a><br>
</p></td>
    </tr>
  </table>
  <div align="center"> </div>
</form>
EOD;
echo ($theForm);
}
?>
<?php 

function spamcheck($array) {
  # returns true if data is ok, otherwise false if it is spam-looking
  return (!preg_match("/(MIME-Version:|Content-Type:|\n|\r)/i", join('',array_values($array)) ));
}


function myMailFunction($mailto, $subject, $message, $headers, $defaultMessageClose, $adminEmail, $notice) {
	$message = $message . "\n\n" . $defaultMessageClose;
  
  // Check for suspected spam content
  if (!spamcheck(array($mailto,$subject,$headers))) {
    die('no spam please');
  }
  
	if (@mail($mailto, $subject, $message, $headers)) {
  		echo ('<p>Your message was successfully sent to ' . $mailto . '</p>');
			if ($notice == 1) {
			$message = "From email " . $headers . "\n\n" . "To email " . "\n\n" . $mailto . "\n\n" . $message;
			@mail($adminEmail, "Referal notice", $message);
			}
		} 
	else {
  // This echo's the error message if the email did not send.  
  // You could change  the text in between the <p> tags.
  echo('<p>Mail could not be sent to ' . $mailto .  ' Please use your back button to try them again.</p>');
	}
}
?>
<?php 

function doTell ($notice, $adminEmail, $subject, $websiteName, $defaultMessageClose, $link) {
	if ($_POST['your_email'] != "") {
	$headers = 'From: ' . $_POST['your_name'] . '<' . $_POST['your_email'] . '>'; 
		}
	else {
	$headers = 'From: ' . $websiteName . '<' . $adminEmail . '>';
	}
	

	if ($_POST['friend_email1'] != "") {
	
	$mailto1 = $_POST['friend_email1'];
	
	//This tacs the name onto the subject line
	$subject1 = $_POST['friend_name1'] . $subject; 
	//This tacs the name onto the message
	$message1 = $_POST['friend_name1'] . "\r\n" . $_POST['message'];  
	
	
	myMailFunction($mailto1, $subject1, $message1, $headers, $defaultMessageClose, $adminEmail, $notice);
	}
	
	if ($_POST['friend_email2'] != "") {
	
	$mailto2 = $_POST['friend_email2'];
	
	//This tacs the name onto the subject line
	$subject2 = $_POST['friend_name2'] . $subject; 
	//This tacs the name onto the message
	$message2 = $_POST['friend_name2'] . "\r\n" . $_POST['message'];  
	
	myMailFunction($mailto2, $subject2, $message2, $headers, $defaultMessageClose, $adminEmail, $notice);
	}
	if ($_POST['friend_email3'] != "") {
	
	$mailto3 = $_POST['friend_email3'];
	
	//This tacs the name onto the subject line
	$subject3 = $_POST['friend_name3'] . $subject; 
	//This tacs the name onto the message
	$message3 = $_POST['friend_name3'] . "\r\n" . $_POST['message'];  
	
	myMailFunction($mailto3, $subject3, $message3, $headers, $defaultMessageClose, $adminEmail, $notice);
	}
	
	$return = <<<EOD
	<p align="center"><a href="$link">Retorna para pagina original.</a></p>
EOD;
	
echo ($return);	
}
?>
<?php

if (isset($_POST['tellsubmit'])) {
doTell($notice, $adminEmail, $subject, $websiteName, $defaultMessageClose, $link);
}
else {
doTellForm($privacyPolicyLinkText, $privacyPolicyLinkURL, $defaultMessageIntro, $link);
}
?>
