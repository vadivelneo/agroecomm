<html>
<head>
<style>
.footer
{
	float:left;
	height:auto;
	width:100%;
	text-align:center;
	margin-top:50px;
	}
.copy
{
	float:left;
	font:normal 14px Verdana, Geneva, sans-serif;
}
table
{
	font:12px Verdana, Geneva, sans-serif;
	padding:2px 3px;
}
</style>
</head>

<body>
<?php if($sess_company == 1){?>
<img src="<?php echo base_url();?>resources/images/cAs_logo.png" width:"250" height="100" align="middle" style="float:left; 
margin-bottom:30px; text-align: center;">
<?php } 
else if($sess_company == 2){?>
 <img src="<?php echo base_url();?>resources/images/cAsI_logo.png" width:"250" height="100" align="middle" style="float:left; 
margin-bottom:30px; text-align: center;">
<?php } else {?>  

<?php }?>  
<table cellspacing="0" cellpadding="0" border="1" width="100%" >
  <tr>
    <td colspan="6" bgcolor="#9799B7" >
    <div align="center"><strong>Vendor Accounts Report</strong></div></td>
  </tr>
   
  <tr bgcolor="#CCCCCC">
    <td width="20%"><div align="left">Vendor Code</div></td>
    <td width="20%"><div align="left">Vendor Name</div></td>
    <td width="20%"><div align="left">E-Mail</div></td>
    <td width="20%"><div align="left">Mobile</div></td>
    <td width="20%"><div align="left">Credit Amount</div></td>
    <td width="20%"><div align="left">Debit Amount</div></td>
   </tr>
    <?php
	foreach($ven_list as $VEN) {?>
  <tr>
    <td><div align="left"><?php echo $VEN['vendor_code'];?></div></td>
    <td><div align="left"><?php echo ucfirst($VEN['vendor_name']);?></div></td>
    <td><div align="left"><?php echo ucfirst($VEN['vendor_email']);?></div></td>
    <td><div align="left"><?php echo ucfirst($VEN['vendor_phone']);?></div></td>
    <td><div align="left"><?php echo ucfirst($VEN['vendors_accounts_debit']);?></div></td>
    <td><div align="left"><?php echo ucfirst($VEN['vendors_accounts_credit']);?></div></td>
     </tr>
  <?php }?>
</table>
<div class="footer">
<hr />
<span class="copy">Powered by Vernalsoft CRM  © 2014 - 2015  Vernalsoft.com</span>
</div>
</body>
</html>