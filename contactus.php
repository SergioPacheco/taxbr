<? include "include/header.php"; ?>
  <div id="breadCrumb">
    <ul>
      <li> <a href="index.php"     >Home</a> </li>
      <li class="lastCrumb"> <a href="contactus.php" >Contato</a> </li>
    </ul>
  </div>
  <div id="content">
    <div id="leftColumn">
      <div id="maincontent">
        <div id="title"> <h1> Contato</h1> </br>
          <h2>Telefone: 0207 2895 983</h2>   
          <h2>Email: <a href="mailto:info@taxbr.com" class="hiLighted"> info@taxbr.com</a> </h2>  </br>   
          <h2>Horário de Atendimento: </h2>
          <p>de Segunda a Sexta - 11:00 as 16:00 horas </br>
             402B, Harrow Road</br>
             London, W9 2HU</br>
          <p>&nbsp;</p>
        </div>
        <div id="title"> <h1>Online contato </h1> </div>

        <form id="form2" name="form2" method="post" action="/dodosmail/dodosmail.php">
          <input name="required_fields" type="hidden" id="required_fields" value="Name,Tel,Email,Address" />
          <input type="hidden" name="check_email_address" value="yes" />
          <!-- the font color for highlighting required field -->
          <input type="hidden" name="highlight_color" value="red" />
          <!-- leave it blank if you don't have a css file or know what it is -->
          <input type="hidden" name="css_file" value="dodosmail/reservoir.css" />
          <!-- if you want dodosmail to show the send info without redirection, get rid of the following -->
          <input name="after_url" type="hidden" id="after_url" value="http://www.taxbr.com/contactus.php" />
          <input name="your_email_address" type="hidden" id="your_email_address" value="info@taxbr.com" />
          <input name="subject" type="hidden" id="subject" value="Tax Refund - Call me Back Urgently" />
          <!-- these variables are for the auto response email sent to your sender, feel free to disable by putting a "no" in the first line -->
          <input type="hidden" name="autoresponse" value="no">
          <input type="hidden" name="owner_name"   value="me">
          <input type="hidden" name="response_subject" value="Thank you for your mail!">
          <input type="hidden" name="response_mail" value="This is an auto response to let you know that I've successfully received your email sent through our email form. Thanks!">
             <p> Preencha o formulários abaixo que em breve entraremos em contato: </p>
             
            
            <table class="countriesTable">
            <tr>
              <td >Nome</td>
              <td ><input name="Name" type="text"  id="Name" size="30" /></td>
            </tr>
            <tr>
              <td>Telefone</td>
              <td><input name="Tel" type="text"  id="Tel" size="30" /></td>
            </tr>
            <tr>
              <td>E-mail</td>
              <td><font color="#FFFFFF">
                <input name="Email" type="text" class="formbkg" id="email" size="30" />
                </font></td>
            </tr>
            <tr>
              <td valign="top">Assunto</td>
              <td><textarea name="Address" cols="30" rows="4"  id="Address"></textarea></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><input name="Submit2" type="submit" class="strong" value="Enviar " /></td>
            </tr>
          </table>
        </form>
        
        
        <div id="title"> <h1>Mapa</h1> </div>

        <p>&nbsp;</p>
        <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.uk/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=402B,+Harrow+Road,+London,+W9+2HU&amp;aq=&amp;sll=51.522389,-0.193806&amp;sspn=0.013164,0.042272&amp;ie=UTF8&amp;hq=&amp;hnear=402+Harrow+Rd,+Paddington,+Greater+London+W9+3,+United+Kingdom&amp;ll=51.52343,-0.196953&amp;spn=0.018691,0.036478&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="http://maps.google.co.uk/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=402B,+Harrow+Road,+London,+W9+2HU&amp;aq=&amp;sll=51.522389,-0.193806&amp;sspn=0.013164,0.042272&amp;ie=UTF8&amp;hq=&amp;hnear=402+Harrow+Rd,+Paddington,+Greater+London+W9+3,+United+Kingdom&amp;ll=51.52343,-0.196953&amp;spn=0.018691,0.036478&amp;z=14&amp;iwloc=A" style="color:#0000FF;text-align:left">View Larger Map</a></small>
        <div align="center"><br />
            
        </div>
        <h2>&nbsp;</h2>
              
                                          
        <p>&nbsp;</p>
        <? include "include/footer.php"; ?>
