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
    <td colspan="7" bgcolor="#9799B7" >
    <div align="center"><strong><?php if(isset($itm_name)){ echo $itm_name; }?> Sales Report</strong></div></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#94CCAA" >
    <div align="left"><strong>Item Name : <?php if(isset($itm_name)){ echo $itm_name; }?> </strong></div></td>
	<td colspan="2" bgcolor="#94CCAA" >
    <div align="left"><strong>Item Code : <?php if(isset($itm_code)){ echo $itm_code; }?> </strong></div></td>
    <td colspan="2" bgcolor="#94CCAA">
    <div align="left"><strong>Mfg PArt No :  <?php if(isset($itm_mfg)){ echo $itm_mfg; }?></strong></div></td>
  </tr>
  <tr>
    <td colspan="4" bgcolor="#CCFF66" >
    <div align="right"><strong>Total Quantity : <?php if(isset($tot_qty)){ echo $tot_qty; }?> </strong></div></td>
	<td colspan="3" bgcolor="#CCFF66" >
    <div align="right"><strong>Total Amount : <?php if(isset($tot_amt)){ echo $tot_amt; }?> </strong></div></td>
   
  </tr>
   
  <tr bgcolor="#CCCCCC">
    <td width="15%"><div align="left">Item Code</div></td>
    <td width="10%"><div align="left">UOM</div></td>
    <td width="15%"><div align="left">Invoice No</div></td>
    <td width="25%"><div align="left">Vendor Name </div></td>
    <td width="15%"><div align="left">Quantity</div></td>
    <td width="15%"><div align="left">Type</div></td>
     <td width="20%"><div align="left">Amount</div></td>
   </tr>
    <?php
	foreach($list_items as $ITEM) {?>
  <tr>
    <td><div align="left"><?php echo $ITEM['sale_invoice_item_code'];?></div></td>
       <td><div align="left"><?php echo $ITEM['uom_name'];?></div></td>
       <td><div align="left"><?php echo $ITEM['sale_invoice_no'];?></div></td>
       <td><div align="left"><?php echo $ITEM['customer_name'];?></div></td>
       <td><div align="left"><?php echo $ITEM['sale_invoice_item_qty'];?></div></td>
       <td><div align="left"><?php if(($ITEM['sale_invoice_item_net_amount']) == 0) { echo "DC"; } else{ echo "SI";} ?></div></td>
       <td><div align="right"><?php echo $ITEM['sale_invoice_item_net_amount'];?></div></td>
     </tr>
  <?php }?>
</table>
<div class="footer">
<hr />
<span class="copy">Powered by Vernalsoft CRM  © 2014 - 2015  Vernalsoft.com</span>
</div>
</body>
</html>