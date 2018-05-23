
<html lang="en-ca">

<body>

    <header>
        <!-- BEGIN mynav.php INCLUDE -->
        <?php include "./mynav.php"; ?>

        <!-- END mynav.php INCLUDE -->
    </header>

    <main class="section" style="margin-left: 75px; margin-right: 75px; margin-top: 45px">
        <div class="row "><h4 class="teal-text">
Please contact us if you have a question!
            </h4>
             <?php

if(isset($_GET['status']))
{
    ?> <b style='color:green'>
 <?php  echo "Your message is sent successfully" ; ?>
  </b><br /> <?php
} ?>
            <form class="col s12 form-contact" action="../Functions/ContactPro.php" method="POST">
               <div class="card">
                   <div class="card-content">
                       <div class="row">
                           <!-- Name -->
                           <div class="input-field col s12">
                                <b for="inputName">Name</b><br>
                                <input  id="inputName" type="text" class="form-control" name="name" required><br>
                           </div>
                           <!-- Email -->
                           <div class="input-field col s12">
                              <b for="inputEmail">Email</b><br> 
                              <input  id="inputEmail" type="text" class="form-control" name="email" required><br>
                           </div>
                           <!-- Message -->
                           <div class="input-field col s12">
                              <b for="inputMessage" >Message</b><br> 
                              <textarea class="form-control materialize-textarea" id="inputMessage" col=6 row=50 name="message"></textarea><br>
                           </div>
                         
                          <div class="input-field col s12">
                               <div class="g-recaptcha" data-sitekey="6LerzlkUAAAAAN_sVuSAuvU7sSMbbnaN-RfbJMEj"></div><br>
                           </div>
                           <div class="input-field col s12">
                               <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="SUBMIT">Send your message</button>
                           </div>
                       </div>
                   </div>
               </div>
           </form>
        </div>
    
    </main>


<footer class="page-footer teal darken-4">
<?php include "./footer.php"; ?>
    </footer>

</body>
</html>