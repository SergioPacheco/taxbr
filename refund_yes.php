<?php 
include("include/functions.php");
$vl_refund=get_refund();
if   ($vl_refund <= 0) {header("Location: refund_no.php");}?>          

<? include "include/header.php"; ?>
  <div id="breadCrumb">
    <ul>
      <li> <a href="index.php"            >Home</a> </li>
      <li> <a href="service_paye.php"     >Services</a> </li>
      <li class="lastCrumb"               > <a href="service_paye.php" >Tax Refund (PAYE)</a> </li>
    </ul>
  </div>

<div id="content">
<div id="leftColumnHome">
<div id="homecontent">
 <div id="title">
     <h1>Você tem um reembolso de&nbsp;  <span style="font-weight: bold; font-size: 2em; line-height: 1.3em; color: #FF0000;">£<?PHP echo("$vl_refund") ?> </span>
</h1>
 </div>
 <div id="columnL"><img src="/images/screenshots_4.jpg" alt="" width="193" height="300" /><br/>
 </div>
 <div id="columnR">
 <p>
 Para receber o seu reembolso você precisa fazer o download do nossos <a href="/download/WelcomePack2.pdf"> formulários</a>  (application forms) ou pedir para ser postado ao seu endereço. <a href="/forms_PAYE.php">clique aqui</a></p> 
<p>Se preferir  falar conosco antes, ficaremos felizes em responder qualquer duvida e também conferir o valor estimado do seu reembolso. </p>
<p> Você pode nos ligar no numero <strong>02072895983</strong> das 10:00h as 18:00h de segunda a sexta-feira. </p>

<p>Nossos serviços custam apenas <span style="font-weight: bold">20%</span> do valor do reembolso, e serão cobrados somente quando o reembolso for pago.</p>
<p> Você não tem nada a perder,  então o que esta esperando? </p>


 </div>
 <div align="right"> </div>
 <? include "include/footer.php"; ?>
