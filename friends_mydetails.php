<?php
// Connects to your Database
include "include/dbconnect.php"; 

//checks cookies to make sure they are logged in
if (isset($_COOKIE['ID_taxbr']))
   {
   $username = $_COOKIE['ID_taxbr'];
   $pass = $_COOKIE['Key_taxbr'];
   $check = mysql_query("SELECT * FROM users WHERE username = '$username'")or die(mysql_error());
   while($info = mysql_fetch_array( $check ))
   {

   //if the cookie has the wrong password, they are taken to the login page
   if ($pass != $info['password'])
      { header("Location: friends.php");
   }

   //otherwise they are shown the admin area
   else
   {

       include "include/header_friends.php"; ?>
        <div id="breadCrumb">
          <ul>
             <li class="lastCrumb"> <a href="friends_home.php"     >Friends Home</a> </li>
          </ul>
        </div>
        <div id="content">
          <div id="leftColumnHome">
            <div id="homecontent">
              <div id="title">
                 <h1>Bem vindo</h1>
              </div>
      <? include "include/footer_logout.php"; 
    }
    }
}
else

//if the cookie does not exist, they are taken to the login screen
{
header("Location: friends.php");
}
?> 
