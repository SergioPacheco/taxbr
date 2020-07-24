<?
#$your_email_address="you@yourdomain.com";
##############################################################################
# DodosMail                       Version 2.5                                #
# Copyright 2001 Ying Zhang       http://pure-essence.net/about/contact		 #
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

if(empty($_GET) && empty($_POST)) {
	die('Please do not access this file directly. Visit <a href="http://regretless.com/scripts/" target="_blank">dodo\'s scripts collection</a> for more information!');
}

// emular register_globals on
if (!ini_get('register_globals')) {
	$superglobales = array($_SERVER, $_ENV, $_FILES, $_COOKIE, $_POST, $_GET);
	if (isset($_SESSION)) {
		array_unshift($superglobales, $_SESSION);
	}
	foreach ($superglobales as $superglobal) {
		extract($superglobal, EXTR_SKIP);
	}
}

// to prevent header injection
if (eregi("\r",$_POST['your_email_address']) || eregi("\n",$_POST['your_email_address'])){
     exit('Please do not exploit this file. Visit <a href="http://regretless.com/scripts/" target="_blank">dodo\'s scripts collection</a> for more information!');
}

// clean & test exploits
foreach ($_POST as $key => $val) {
	if(is_string($val)) {
		$c[$key] = clean($val);
		testExploit($val);
	} else if(is_array($val)) {
		foreach($val as $vKey => $vVal) {
			$c[$key][$vKey] = clean($vVal);
			testExploit($vVal);
		}
	}
}

$fields = array_keys($c);

// protect the variable $reserved_vars
if(isset($reserved_vars)) {
	unset($reserved_vars);
}
$reserved_vars = array("css_file", "background_color", "background_image", "text_color", "link_color", "visited_link_color", "active_link_color", "font_name", "font_size", "highlight_color", "required_fields", "after_url", "check_email_address", "subject", "your_email_address", "env_report", "owner_name", "autoresponse", "response_subject", "response_mail", "dodosmail_header_file", "dodosmail_footer_file", "use_dodos_captcha", "use_dodos_captcha_typed");

// checking required fields
// in case they used comma and space, replace
if(strstr($required_fields, ", ")) {
	$required_fields = str_replace(", ", ",", $required_fields);
} else {
	$required_fields = $required_fields;
}
$required_fields = explode(",", $required_fields);

for($i = 0; $i < count($required_fields); $i++) {
	$required_var_name = $required_fields[$i];
	if(empty($$required_var_name)) {
	
	
		include_dodosmail_header($dodosmail_header_file);
		echo "<p class=\"DodosMailError\">Error - the required field ".dodosmail_error_handle($required_var_name)." is not filled.\n";
		echo "<br /><br /><a href=\"javascript:history.back(1)\">Back</a>\n";
		echo "</p>\n";
		include_dodosmail_footer($dodosmail_footer_file);
		exit;

	}
}
if($check_email_address == "yes" && !empty($email)) {
	if(!check_email($email)) {
		include_dodosmail_header($dodosmail_header_file);
		echo "<p class=\"DodosMailError\">DodosMail Error - the email ".dodosmail_error_handle($email)." is not valid.\n";
		echo "<br /><br /><a href=\"javascript:history.back(1)\">Back</a>\n";
		echo "</p>\n";
		include_dodosmail_footer($dodosmail_footer_file);
		exit;
	}
}
if($use_dodos_captcha == "yes" && !dodoscaptcha_verify($use_dodos_captcha_typed)) {
	include_dodosmail_header($dodosmail_header_file);
	echo "<p class=\"DodosMailError\">DodosMail Error - the spam protection text  ".dodosmail_error_handle($use_dodos_captcha_typed)." you entered does not match what was shown on the image.\n";
	echo "<br /><br /><a href=\"javascript:history.back(1)\">Back</a>\n";
	echo "</p>\n";
	include_dodosmail_footer($dodosmail_footer_file);
	exit;
}


for($i = 0; $i < count($fields); $i++) {
	$actual_var = $fields[$i];
	if(in_array($actual_var, $reserved_vars)) {
		$inside_mail = $inside_mail;
	} else {
		if(is_array($$actual_var)) {
			$inside_mail.= "$actual_var: ";
			foreach($$actual_var as $actual_val) {
				$inside_mail.= "$actual_val ";
			}
			$inside_mail.= "\n";
		} else {
			$actual_val = stripslashes($$actual_var);
			$inside_mail.= "$actual_var: $actual_val\n";
		}
	}
}

// getting other information from the form
$cname = gethostbyaddr($_SERVER[REMOTE_ADDR]);
$inside_mail.=
"
-----------------------------------------------------------------------
 SENDER INFO:
 IP: $_SERVER[REMOTE_ADDR]
 Computer Name: $cname
 Browser Type: $_SERVER[HTTP_USER_AGENT]
 Page Referer: $_SERVER[HTTP_REFERER]
-----------------------------------------------------------------------
";






$headers .= "MIME-Version: 1.0\n";
$headers .= "X-Priority: 3\n";
$headers .= "X-MSMail-Priority: Normal\n";
$headers .= "X-Mailer: DodosMail 2.5 http://regretless.com/scripts/\n";
$headers .= "Content-type: text/plain; charset=\"iso-8859-1\"\n";
$headers .= "From: $name <$email>\n";
$headers .= "Reply-To: $name <$email>\n";


$success = mail($your_email_address, $subject, $inside_mail, $headers);
if($success) {
	if($autoresponse == "yes") {
		$response_subject = stripslashes($response_subject);
		$response_mail = stripslashes($response_mail);
		mail($email, $response_subject, $response_mail, "From: $owner_name <$your_email_address>");
	}
	if($after_url == "") {
		// out put send info
		include_dodosmail_header($dodosmail_header_file);


		echo "<p>\n";
		
		echo "The following email has been sent successfully!</p><ul>";
		for($i = 0; $i < count($fields); $i++) {
			$actual_var = $fields[$i];
			if(in_array($actual_var, $reserved_vars))
				echo "";
			else {
				if(is_array($$actual_var)) {
					echo "<li>$actual_var: ";
					foreach($$actual_var as $actual_val) {
						echo "$actual_val ";
					}
					echo "</li>\n";
				} else {
					$actual_val = stripslashes($$actual_var);
					echo "<li>$actual_var: $actual_val</li>\n";
				}
			}
		}
		echo "</ul>\n<p><a href=\"http://regretless.com/scripts/\">DodosMail</a> v2.5</p>";
		include_dodosmail_footer($dodosmail_footer_file);
		exit;
	} else {
		headfunction($after_url);
	}
} else {
	include_dodosmail_header($dodosmail_header_file);
	echo "<p class=\"DodosMailError\">DodosMail Error - the owner's server is experiencing techinical difficulties. Please email use ".dodosmail_error_handle($your_email_address)." to send your email.\n";
	echo "<br /><br /><a href=\"javascript:history.back(1)\">Back</a>\n";
	echo "</p>\n";
	include_dodosmail_footer($dodosmail_footer_file);
	exit;
}








/*****************************************************************************
/* Layout related functions
*****************************************************************************/
function include_dodosmail_header($dodosmail_header_file) {
	global $reserved_vars;
	foreach($reserved_vars as $reserved_var) {
		global $$reserved_var;
	}

	if(is_file($dodosmail_header_file)) {
		include_once($dodosmail_header_file);
		return;
	} else {
		echo "<html>\n";
		echo "<head>\n";
		echo "<title>\n";
		echo "DodosMail\n";
		echo "</title>\n";
		if($css_file != "")
			echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"$css_file\">\n";
		echo "</head>\n";
		echo "<body bgcolor=\"$background_color\" background=\"$background_image\" text=\"$text_color\" link=\"$link_color\" vlink=\"$visited_link_color\" alink=\"$active_link_color\">\n";
		echo "<font face=\"$font_name\" size=\"$font_size\">\n";
	}
}

function include_dodosmail_footer($dodosmail_footer_file) {
	global $reserved_vars;
	foreach($reserved_vars as $reserved_var) {
		global $$reserved_var;
	}
	if(is_file($dodosmail_footer_file)) {
		include_once($dodosmail_footer_file);
		return;
	} else {
		echo "</font>\n</body>\n</html>";
	}
}

function dodosmail_error_handle($msg) {
	global $highlight_color;
	if(isset($highlight_color)) {
		$extra_begin = "<font color=\"".$highlight_color."\">";
		$extra_end = "</font>";
	} else {
		$extra_begin = "<span class=\"DodosMailErrorHighLight\">";
		$extra_end = "</span>";
	}

	return $extra_begin.$msg.$extra_end;
}

function headfunction($url) {
	header ("Location: $url");
}


/*****************************************************************************
/* Other functions
*****************************************************************************/

function clean($data) {
	$data = stripslashes($data);
	$data = strip_tags($data);
	$data = trim(htmlspecialchars($data));
	return $data;
}

function testExploit($var) {
	$exploits = "/(content-type|bcc:|cc:|document.cookie|onclick|onload|mime-version:|content-transfer-encoding:)/i";
	if(preg_match($exploits, $var)) {
		exit('Please do not exploit this file. Visit <a href="http://regretless.com/scripts/" target="_blank">dodo\'s scripts collection</a> for more information!');
	}
}

function check_email($email) {
	if( (preg_match('/(@.*@)|(\.\.)|(@\.)|(\.@)|(^\.)/', $email)) ||
		(preg_match('/^.+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,3}|[0-9]{1,3})(\]?)$/',$email)) ) {
		return true;
	}
	return false;
}

function dodoscaptcha_verify($typed) {
	session_start();
	$ans = false;
	if($typed === $_SESSION['captcharand_string']) {
		$ans = true;
		setcookie(session_name(), '', time()-36000, '/');
		$_SESSION = array();
		session_destroy();
	}
	return $ans;
}
?>