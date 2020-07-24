<?php

// Connects to your Database
include "include/dbconnect.php"; 

//This code runs if the form has been submitted
if (isset($_POST['submit'])) {

//This makes sure they did not leave any fields blank
if (!$_POST['username'] | !$_POST['pass'] | !$_POST['pass2'] ) {
die('You did not complete all of the required fields');
}

// checks if the username is in use
if (!get_magic_quotes_gpc()) {
$_POST['username'] = addslashes($_POST['username']);
}
$usercheck = $_POST['username'];
$check = mysql_query("SELECT username FROM users WHERE username = '$usercheck'") or die(mysql_error());
$check2 = mysql_num_rows($check);

//if the name exists it gives an error
if ($check2 != 0) {
die('Sorry, the username '.$_POST['username'].' is already in use.');
}

// this makes sure both passwords entered match
if ($_POST['pass'] != $_POST['pass2']) {
die('Your passwords did not match. ');
}

// here we encrypt the password and add slashes if needed
$_POST['pass'] = md5($_POST['pass']);
if (!get_magic_quotes_gpc()) {
$_POST['pass'] = addslashes($_POST['pass']);
$_POST['username'] = addslashes($_POST['username']);
}

// now we insert it into the database
$insert = "INSERT INTO users (username, password)
VALUES ('".$_POST['username']."', '".$_POST['pass']."')";
$add_member = mysql_query($insert);
?>



<? include "include/header_friends.php"; ?>
<div class="clearer"> </div>
<div id="breadCrumb">
    <ul>
        <li class="lastCrumb"> <a href="index.Php">Home</a> </li>
    </ul>
</div>
<div id="content">
<div id="leftColumnHome">
<div id="homecontent">
 <div id="title">
     <h1>Voce esta registrado</h1>
 </div>
 <div id="columnL"><img src="/images/taxbr_ban.jpg" alt="" width="475" height="326" /><br/>
 </div>
 <div id="columnR">

 </div>
 <div align="right"> </div>
 <? include "include/footer_login.php"; ?>

<?php
}
else
{
?>
<? include "include/header_friends.php"; ?>
<div class="clearer"> </div>
<div id="breadCrumb">
    <ul>
        <li class="lastCrumb"> <a href="index.Php">Home</a> </li>
        <li class="lastCrumb"> <a href=""     >Registration</a> </li>

    </ul>
</div>
<div id="content">
<div id="leftColumnHome">
<div id="homecontent">
 <div id="title">
     <h1>Registration</h1>
 </div>
</div>

<div id="curvebothome"><img src="/images/left_col_bg_bot.gif" alt="" width="505" height="8" /></div>
</div>
<div class="floatLeft">
  <div id="rightColumn">
    <div id="calc_now">
      <img src="/images/reg_header.gif" alt="Registration" width="194" height="65" border="0">
      
      <div class="calcformBackground">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <table border="0">
            <tr>
              <td>Use rname:</td>
              <td><input type="text" name="username" >
              </td>
            </tr>
            <tr>
              <td>Password:</td>
              <td><input type="password" name="pass" >
              </td>
            </tr>
            <tr>
              <td>Confirme:</td>
              <td><input type="password" name="pass2" >
              </td>
            </tr>
            <tr>
              <th colspan=2><input type="submit" name="submit" value="Register"></th>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>
  <div id="right_col_bottom"><img src="/images/right_col_bottom.gif" alt="" width="214" height="16" border="0" usemap="#Map2" />
    <map name="Map2" id="Map2">
      <area shape="poly" coords="9,1" href="#" alt="" />
    </map>
  </div>
</div>
</div>
<div id="footer">
  <div style="clear:both; line-height:0; font-size:1px; margin-bottom:-1px;"> &nbsp;</div>
</div>
</div>
</body>
</html>


<? 

}
?> 