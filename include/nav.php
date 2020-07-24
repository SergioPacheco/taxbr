<?php 
$menu2=$menu; 
if ($menu== "7") {$menu="1";} ?>

<div class="header_top"></div>
<div class="header"><img src="images/logotrc.gif" width="198" height="73" alt="UK TAX REFUND ESPECIALIST" />

   <div class="sf_right">
      <div id="nav">
         <ul>
            <li <?php if ($menu=="1") {echo("id='current'");}?> ><a href="index.php">Home</a></li>
            <li <?php if ($menu=="2") {echo("id='current'");}?> ><a href="ourservices.php">Our Services</a></li>
            <li <?php if ($menu=="3") {echo("id='current'");}?> ><a href="claimnow.php">Friends</a></li>
            <li <?php if ($menu=="4") {echo("id='current'");}?> ><a href="forms.php">Forms</a></li>
            <li <?php if ($menu=="5") {echo("id='current'");}?> ><a href="faq.php">FAQ</a></li>
            <li <?php if ($menu=="6") {echo("id='current'");}?> ><a href="contactus.php">Contact Us</a></li>
         </ul>
      </div>
      <div class="sf_search">
         <?php if ($menu2=="1") {echo("<p><b>Bem vindo a Tax Returns Accountants</b>&nbsp;</p>");} ?>
         <?php if ($menu2=="2") {echo("<p><b>Somos especializados em CIS, P45, P60 e Tax Returns</b>&nbsp;</p>");} ?>
         <?php if ($menu2=="3") {echo("<p><b>Indique um amigo e ganhe &pound;10</p>");} ?>
         <?php if ($menu2=="4") {echo("<p><b>Download nosso TAXPACK </b>&nbsp;</p>");} ?>
         <?php if ($menu2=="5") {echo("<p><b>Perguntas e Respostas Mais Frequentes </b>&nbsp;</p>");} ?>
         <?php if ($menu2=="6") {echo("<p><b>Entre em contato</b>&nbsp;</p>");} ?>
         <?php if ($menu2=="7") {echo("<p><b></b>&nbsp;</p>");} ?>
      </div>
   </div>
</div>
 
<div class="header_bottom"></div>
 <div class="subheader" >UK Tax Refund Specialists</div>
 <div class="header_top"></div>
