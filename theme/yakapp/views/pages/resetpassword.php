 <script language="javascript" type="text/javascript">
$(document).ready(function()
{ 

  $('.formError').css("display","none");
  
  $('#resetpwd').click(function()
  { 
    var newpassword = $("#newpassword").val();
    var confirmpassword = $("#confirmpassword").val();
     
    if(newpassword == "" )
    {
      $('#newpass_error').css("display","block");
      $('#newpassword').focus(); 
      return false;
    }
    else
    {
    $('#newpass_error').css("display","none");
    }

    if(newpassword != confirmpassword)
    {
      $('#confirmpass_error').css("display","block");
      $('#confirmpassword').focus();  
      return false;
    }
      else
    {
      $('#confirmpass_error').css("display","none");
    }
     
  });

});
 

</script>

  <?php
  $uri1 = $this->uri->segment('3');
  $uri2 = $this->uri->segment('4');
  ?>

<section class="login_container">
  <div class="span6">
  <h3 class="login-header">Login to Vsoft CRM</h3>
    <div class="login-area">
        <div id="loginDiv" class="login-box">
        <div class="">
          <h3 class="login-header">Login to Vsoft CRM</h3>
        </div>

        <form method="POST" action="<?php echo site_url('signin/resetpassword').'/'.$uri1.'/'.$uri2.'/'; ?>" style="margin:0;" class="form-horizontal login-form">
        <img src="<?php echo base_url(); ?>/resources/images/login_logo.png">
        
          <div class="control-group icon username">
            <div class="controls">
              <div style="margin-top: -30px;" class="Products_editView_fieldName_productnameformError parentFormEditView formError " id="newpass_error">
                  <div class="formErrorContent">* This field is required</div>
                  <div class="formErrorArrow"></div>
               </div>	
              <input type="password" placeholder="New Password" name="newpassword" id="newpassword">
            </div>
          </div>
          <div class="control-group icon password">
            <div class="controls">
            	<div style="margin-top: -30px;" class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="confirmpass_error">
                  <div class="formErrorContent">Confirm Password is Wrong</div>
                  <div class="formErrorArrow"></div>
               </div>
              <input type="password" placeholder="Confirm Password" name="confirmpassword" id="confirmpassword">
            </div>
          </div>
          <div class="control-group signin-button">
            <div id="forgotPassword" class="controls">
              <button class="btn btn-primary sbutton" type="submit" name="resetpwd" id="resetpwd">Reset Password</button>
              &nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('signin/login'); ?>">Back to Login</a></div>
          </div>
        </form>
      </div>
      </div>
   </div>
</section>
