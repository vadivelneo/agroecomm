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
		<strong>Hi <?php echo $user['OFFICER_NAME']; ?>.,</strong>
	</p>
</p>
    <p>
			WELCOME TO AGRO. 
    </p>
	
   
	<p>	
	<strong>
		Your cash amount of Rs. <?php echo $user['TOTAL_AMT'];?> deposited in Agroreforming.Kindly login through the following link, www.agroreforming.com <br>
		</strong> </p>
		
		
    </p>
   
    <p>
    	Thank You.,<br />AGRO.
    </p>
</div>
</body>
</html>