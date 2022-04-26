   <div class="row-fluid">
    <div class="span12">
      <div class="content-wrapper">
        <div class="container-fluid">
          <div class="row-fluid">
            <div class="span6"></div>
            <div class="span6">
              <div class="login-area">
               <div class="login-box">
                <?php echo $this->session->flashdata('message'); ?>
                  <form class="form-horizontal login-form" style="margin:0;" action="<?php echo site_url('signin/forgotpassword'); ?>" method="POST">
                    <!--<input type='hidden' name='__vtrftk' value="sid:a231a82d498eb7bb1f040cbe625f66b22184a433,1429248195" />-->
                    <div class="">
                      <h3 class="login-header">Forgot Password</h3>
                    </div>
                    
                    <div class="control-group">
                      <label class="control-label" for="email"><b>Email</b></label>
                      <div class="controls">
                        <input type="email" name="emailId" id="emailId"  placeholder="Email"  required>
                      </div>
                    </div>
                    <div class="control-group signin-button">
                      <div class="controls">
                        <input type="submit" id="send" name="send" class="btn btn-primary sbutton" value="Submit" name="retrievePassword">
                        &nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('signin/login'); ?>">Back</a></div>
                    </div>
                  </form>
                </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>