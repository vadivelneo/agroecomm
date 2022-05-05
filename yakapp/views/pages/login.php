<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AGro | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>adminlte/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url();?>"><img  style="width: 55%;" src="<?php echo base_url(); ?>/resources/images/erp_logo.png"></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
		<div class="sessionMsg" id="ErrorMsg" style="text-align: center; color: red;"><?php echo $this->session->flashdata('message'); ?></div>
      <form action="<?php echo site_url('signin/userlogin'); ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="AGRO Id/ Phone no." name="username" id="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name='password' id='password' class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
		  <!--
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>-->
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

       
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="<?php echo site_url('signin/forgotpassword'); ?>">I forgot my password</a>
      </p>
       
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url();?>adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>adminlte/dist/js/adminlte.min.js"></script>
</body>
</html>


<script type="text/javascript">
$(document).ready(function()
{
	
	$('#signin').click(function()
	{
		
		var username = $("#username").val();
		var password = $("#password").val();
		
	
	if(username == "")
	{	
		$('.flashmessage').html("");
		document.getElementById("ErrorMsg").innerHTML="Enter your User Name";
		$('#username').value="";
		$('#username').focus();
		return false;
	}
	
	if(password == "")
	{	
		$('.flashmessage').html("");
		document.getElementById("ErrorMsg").innerHTML="Enter your Password";
		$('#password').value="";
		$('#password').focus();
		return false;
	}
	    else
		{
			document.getElementById("ErrorMsg").innerHTML="";
		}
		
	});
	
});


</script> 
<script type="text/javascript">
$(document).ready(function(){
    $("#forgot").click(function(){
        $("#loginDiv").hide();
		$("#forgotPasswordDiv").show();
    });
    $("#back").click(function(){
        $("#loginDiv").show();
		$("#forgotPasswordDiv").hide();
    });
});
</script>



