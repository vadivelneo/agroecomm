<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>
<style>
body
{
	font-family: Calibri;
	font-size: 15px;
}
.content
{
	width: 600px;
	height: auto;
	padding: 10px;
	border: 5px solid #699736;
}
.content p
{
	
}
</style>
<body>
<div class="content">
	<p>
		<strong>Hi <?php echo $user->user_first_name.' ' ?>.,</strong>
	</p>
    <p>
    	You recently requested to reset your password for your account. click the below link to change your password.
    </p>
     <p>
    	<a href="<?php echo site_url('signin/resetpassword/').'/'.$user->user_id.'/'.$user->user_reset_pwd.'/'; ?>" target="_blank"><?php echo site_url('signin/resetpassword/').'/'.$user->user_id.'/'.$user->user_reset_pwd.'/'; ?></a>
    </p>
    <p>
    	<strong>Your User Name is:</strong> <?php echo $user->user_name; ?>
    </p>
    <p>
    	If you have remembered the password now or if you did not request a password reset, Please ignore this email and reply to let us know.
    </p>
    <p>
    	Thank You.,<br />Yakshna ERP Team.
    </p>
</div>
</body>
</html>