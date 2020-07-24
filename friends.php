<?php
// Connects to your Database
include "include/dbconnect.php"; 


//Checks if there is a login cookie
if(isset($_COOKIE['ID_taxbr']))

//if there is, it logs you in and directes you to the members page
{
$username = $_COOKIE['ID_taxbr'];
$pass = $_COOKIE['Key_taxbr'];
$check = mysql_query("SELECT * FROM users WHERE username = '$username'")or die(mysql_error());
while($info = mysql_fetch_array( $check ))
{
  if ($pass != $info['password'])
  {
  }
  else
  {
  header("Location: friends_home.php");
  }
}
}

//if the login form is submitted
if (isset($_POST['submit'])) { // if form has been submitted

// makes sure they filled it in
if(!$_POST['username'] | !$_POST['pass']) {
die('You did not fill in a required field.');
}
// checks it against the database

if (!get_magic_quotes_gpc()) {
$_POST['email'] = addslashes($_POST['email']);
}
$check = mysql_query("SELECT * FROM users WHERE username = '".$_POST['username']."'")or die(mysql_error());

//Gives error if user dosen't exist
$check2 = mysql_num_rows($check);
if ($check2 == 0) {
die('That user does not exist in our database. <a href=registration.php>Click Here to Register</a>');
}
while($info = mysql_fetch_array( $check ))
{
$_POST['pass'] = stripslashes($_POST['pass']);
$info['password'] = stripslashes($info['password']);
$_POST['pass'] = md5($_POST['pass']);

//gives error if the password is wrong
if ($_POST['pass'] != $info['password']) {
die('Incorrect password, please try again.');
}
else
{

// if login is ok then we add a cookie
$_POST['username'] = stripslashes($_POST['username']);
$hour = time() + 3600;
setcookie(ID_taxbr, $_POST['username'], $hour);
setcookie(Key_taxbr, $_POST['pass'], $hour);

//then redirect them to the members area
header("Location: friends_home.php");
}
}
}
else
{

// if they are not logged in
?>
<? include "include/header.php"; ?>
  <div id="breadCrumb">
    <ul>
      <li> <a href="index.php"       >Home</a> </li>
      <li class="lastCrumb"> <a href="friends.php"     >Indique Amigos</a> </li>
    </ul>
  </div>
  <div id="content">
    <div id="leftColumnHome">
      <div id="homecontent">
        <div id="title">
          <h1>GANHE DINHEIRO</h1>
        </div>
        <p> Tax Returns Accountants oferece uma ótima oportunidade. Para cada pessoa que você indicar,  e que obtenha exito em seu pedido de reembolso, vamos lhe pagar £10.</p>
        <p>Por exemplo, você tem 5 amigos (ou colegas, ou alguém) concluem com sucesso  sua restituição através da Tax Returns Accountants, você receberá £50 em dinheiro. Não há limite para a quantidade de pessoas que indique! </p>
        <p> Fornecemos todo suporte online, que lhe permite apresentar, monitorar e acompanhar as suas indicações. Você pode sacar seu dinheiro sempre que quiser.* </p>
        <h2> Para você começar </h2>
        <p>As pessoas  que preencham os seguintes critérios são quase garantida uma restituição fiscal:
        <ul>
          <li> Elas não trabalharam todo a ano fiscal </li>
          <li> Os seus rendimentos durante o ano fiscal foram menos do que o limite anual de isenção (atualmente £ 6,035) </li>
          <li>Estão no código fiscal errado </li>
          <li> Tem empregos de meio-período </li>
          <li> Trabalharam em empregos temporários </li>
          <li> Elas têm um segundo emprego </li>
        </ul>
        <h2> Comece a fazer dinheiro agora.</h2>
        <p>*Você somete será capaz de sacar quando receber £ 50 ou mais. </p>
        <? include "include/footer_login.php"; ?>
<?php
}

?>
