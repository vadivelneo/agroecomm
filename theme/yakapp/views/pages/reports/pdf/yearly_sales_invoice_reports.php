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
    <td colspan="5" bgcolor="#9799B7" >
    <div align="center"><strong>Yearly Sales Invoice Report</strong></div></td>
  </tr>
  <tr>
    
     <td colspan="5" bgcolor="#94CCAA" >
    <div align="left"><strong>Year : <?php echo $year;?> </strong></div></td>
  </tr>
   
  <tr bgcolor="#CCCCCC">
    <td width="20%"><div align="left">Sales Invoice No</div></td>
    <td width="20%"><div align="left">Sales Invoice Date</div></td>
    <td width="20%"><div align="left">Sales Order No</div></td>
    <td width="20%"><div align="left">Amount</div></td>
     <td width="20%"><div align="left">Status</div></td>
   </tr>
    <?php
	foreach($si_list as $SI) {?>
  <tr>
       <td><div align="left"><?php echo $SI['sale_invoice_company_invoice_no'];?></div></td>
       <td><div align="left"><?php echo date('d-m-Y', strtotime($SI['sale_invoice_date']));?></div></td>
       <td><div align="left"><?php echo $SI['sale_invoice_so_ref_no'];?></div></td>
       <td><div align="left"><?php echo $SI['total_net_amount_items'];?></div></td>
       <td><div align="left"><?php echo $SI['sale_invoice_status'];?></div></td>
     </tr>
  <?php }?>
</table>
<div class="footer">
<hr />
<span class="copy">Powered by Vernalsoft CRM  © 2014 - 2015  Vernalsoft.com</span>
</div>
</body>
</html>