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
    <div align="center"><strong>Sales Representative Report</strong></div></td>
  </tr>
   <tr>
    <td colspan="3" bgcolor="#94CCAA" >
    <div align="left"><strong>From Date : <?php echo date('d-m-Y', strtotime($report_from));?> </strong></div></td>
    <td colspan="3" bgcolor="#94CCAA">
    <div align="left"><strong>To Date :  <?php echo date('d-m-Y', strtotime($report_to));?></strong></div></td>
  </tr>
   
  <tr bgcolor="#CCCCCC">
    <td width="20%"><div align="left">Sales Order No</div></td>
    <td width="20%"><div align="left">Customer Name</div></td>
    <td width="20%"><div align="left">Requested Date</div></td>
    <td width="20%"><div align="left">Valid Till</div></td>
    <td width="20%"><div align="left">Amount</div></td>
    <td width="20%"><div align="left">Status</div></td>
   </tr>
    <?php
	foreach($so_list as $SO) {?>
  <tr>
    <td><div align="left"><?php echo $SO['sales_order_number'];?></div></td>
     <td><div align="left"><?php echo  ucfirst($SO['sales_order_customer_name']);?></div></td>
      <td><div align="left"><?php if(($SO['sales_order_requested_date']) != '0000-00-00' && $SO['sales_order_requested_date'] != '' && $SO['sales_order_requested_date'] != NULL) { ?>
                  <?php echo date('d-m-Y', strtotime($SO['sales_order_requested_date'])); ?>
                <?php } else { ?>
                  -
         <?php } ?></div></td>
      <td><div align="left"><?php if(($SO['sales_order_valid_till']) != '0000-00-00' && $SO['sales_order_valid_till'] != '' && $SO['sales_order_valid_till'] != NULL) { ?>
                  <?php echo date('d-m-Y', strtotime($SO['sales_order_valid_till'])); ?>
                <?php } else { ?>
                  -
         <?php } ?></div></td>
       <td><div align="left"><?php echo $SO['so_grand_total'];?></div></td>
       <td><div align="left"><?php echo $SO['sales_order_status'];?></div></td>
     </tr>
  <?php }?>
</table>
<div class="footer">
<hr />
<span class="copy">Powered by Vernalsoft CRM  © 2014 - 2015  Vernalsoft.com</span>
</div>
</body>
</html>