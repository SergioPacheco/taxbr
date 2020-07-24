<? include "include/header.php"; ?>
  <div id="breadCrumb">
    <ul>
      <li> <a href="index.php"     >Home</a> </li>
      <li> <a href="forms_paye.php"     >Formul&aacute;rios</a> </li>
      <li class="lastCrumb"> <a href="Forms_paye.php" >PAYE (Pay as You Earn)</a> </li>
    </ul>
  </div>
  <div id="content">
    <div id="leftColumnHome">
      <div id="homecontent">
        <div id="title">
          <h1>Formul&aacute;rios</h1>
        </div>
        <table >
          <tr>
            <td width="430" colspan="4" align="left" valign="bottom"><table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="1%" height="239" valign="top" background="images/left_mid_wht.gif" bgcolor="#FFFFFF">&nbsp;</td>
                  <td colspan="2" valign="top" bgcolor="#FFFFFF"><table width="95%" border="0" align="center" cellpadding="2" cellspacing="2">
                      <tr>
                        <td height="23" bgcolor="" ><span style="font-weight: bold; font-size: 1.5em; line-height: 1.3em; color: #FF0000;">Opção 1: <span style="color: #000000">Download</span></span></td>
                      </tr>
                      <tr>
                        <td width="51%" valign="top" class="borderrgt"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td height="49">&nbsp;</td>
                              <td><p><a href="/download/WelcomePack2.pdf"><img src="/images/ico_check.gif" alt="Download" width="39" height="57" /></a></p>
                                <p>&nbsp;</p>
                                <p>&nbsp;&nbsp;<a href="/download/WelcomePack2.pdf">Download Formul&aacute;rios</a></p></td>
                              <td>&nbsp;</td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td height="23" bgcolor="" ><span style="font-weight: bold; font-size: 1.5em; line-height: 1.3em; color: #FF0000;">Opção 2: <span style="color: #000000">Receba pelo correio</span></span>
                      </tr>
                      <tr>
                        <td class="calcformBackground" background=""><form id="form" name="form" method="post" action="/dodosmail/dodosmail.php">
                            <input name="required_fields" type="hidden" id="required_fields" value="Name,Tel,Email,Address" />
                            <input type="hidden" name="check_email_address" value="yes" />
                            <!-- the font color for highlighting required field -->
                            <input type="hidden" name="highlight_color" value="red" />
                            <!-- leave it blank if you don't have a css file or know what it is -->
                            <input type="hidden" name="css_file" value="/dodosmail/reservoir.css" />
                            <!-- if you want dodosmail to show the send info without redirection, get rid of the following -->
                            <input name="after_url" type="hidden" id="after_url" value="http://www.taxbr.com/forms_paye.php" />
                            <input name="your_email_address" type="hidden" id="your_email_address" value="info@taxbr.com" />
                            <input name="subject" type="hidden" id="subject" value="Tax Refund - Send TAXPACK by mail" />
                            <!-- these variables are for the auto response email sent to your sender, feel free to disable by putting a "no" in the first line -->
                            <input type="hidden" name="autoresponse" value="yes">
                            <input type="hidden" name="owner_name"   value="me">
                            <input type="hidden" name="response_subject" value="Thank you for your mail!">
                            <input type="hidden" name="response_mail" value="This is an auto response to let you know that I've successfully received your email sent through our email form. Thanks!">
                            <table width="90%" border="0" align="center" cellpadding="1" cellspacing="1" >
                              <tr>
                                <td colspan="2"><p>&nbsp;</p></td>
                              </tr>
                              <tr>
                                <td width="38%">Nome</td>
                                <td width="62%"><input name="Name" type="text"  id="Name" size="30" /></td>
                              </tr>
                              <tr>
                                <td>Telefone</td>
                                <td><input name="Tel" type="text"  id="Tel" size="30" /></td>
                              </tr>
                              <tr>
                                <td>E-mail</td>
                                <td><input name="Email" type="text" class="formbkg" id="email" size="30" />
                                  </font></td>
                              </tr>
                              <tr>
                                <td valign="top">Endere&ccedil;o</td>
                                <td><textarea name="Address" cols="30" rows="3"  id="Address"></textarea></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td><input name="Submit" type="submit" class="strong" value="Enviar " /></td>
                              </tr>
                            </table>
                          </form></td>
                      </tr>
                    </table></td>
                </tr>
              </table></td>
          </tr>
        </table>
        </td>
        </tr>
        </table>
        <? include "include/footer.php"; ?>
