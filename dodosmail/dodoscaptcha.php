<?
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
function dodoscaptcha_hextorgb($hexcode) {
	if(substr($hexcode, 0, 1) == "#") {
		$hexcode = substr($hexcode, -6);
	}
	$foo[r] = hexdec(substr($hexcode, 0, 2));
	$foo[g] = hexdec(substr($hexcode, 2, 2));
	$foo[b] = hexdec(substr($hexcode, 4, 2));
	return $foo;
}

session_start();
srand((double)microtime()*1000000); 
$string = md5(rand(0,9999)); 
$_SESSION['captcharand_string'] = substr($string, 17, 5);

/* default text color is black and bgcolor is white, you may pass in a customized text & bg color in hexcode */
if(isset($_GET['captchabgcolor'])) {
	$captchabg_rgb = dodoscaptcha_hextorgb($_GET['captchabgcolor']);
} else {
	$captchabg_rgb = array('r'=>'255', 'g'=>'255', 'b'=>'255');
}

if(isset($_GET['captchatextcolor'])) {
	$captchatext_rgb = dodoscaptcha_hextorgb($_GET['captchatextcolor']);
} else {
	$captchatext_rgb = array('r'=>'0', 'g'=>'0', 'b'=>'0');
}

// create a 50*20 image
$captcha_im = imagecreate(50, 20);

// white background and black text
$captcha_bg = imagecolorallocate($captcha_im, $captchabg_rgb[r], $captchabg_rgb[g], $captchabg_rgb[b]);
$captcha_textcolor = imagecolorallocate($captcha_im, $captchatext_rgb[r], $captchatext_rgb[g], $captchatext_rgb[b]);

// write the string at somewhat center
imagestring($captcha_im, 4, 6, 2, $_SESSION['captcharand_string'], $captcha_textcolor);

// output the image
header("Content-type: image/jpeg");
imagejpeg($captcha_im);
?>