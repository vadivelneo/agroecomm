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
		<strong>Hi <?php echo $user['OFCR_FST_NME'].' '.$user['OFCR_LST_NME']; ?>.,</strong>
	</p>
</p>
    <p>
			WELCOME TO AGRO. 
    </p>
	
    <p>	
		You have successfully Enrolled in AGRO.<br></p>
	<p>	
	<strong>	Username: AGROPRO<?php echo $user['OFCR_USR_ID'];?> <br>
		
		Password: <?php echo $user['OFCR_MOB'];?> <br>
		</strong> </p>
		
		
		
    </p>
    <p>Kindly Login through the following Link
    	<a href="<?php echo site_url('home'); ?>" target="_blank">www.agroreforming.com</a>
    </p>
    <p>
    	Thank You.,<br />AGRO.
    </p>
</div>
</body>
</html>