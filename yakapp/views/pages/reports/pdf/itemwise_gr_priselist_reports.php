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

<table cellspacing="0" cellpadding="0" border="1" width="100%" >
  <tr>
    <td colspan="8" bgcolor="#9799B7" >
    <div align="center"><strong>Goods Received Price Report</strong></div></td>
  </tr>
  
  
   
  <tr bgcolor="#CCCCCC">
    <td width="10%"><div align="left">Date</div></td>
    <td width="20%"><div align="left">Party Name</div></td>
    <td width="25%"><div align="left">Material</div></td>
    <td width="8%"><div align="left">GR No</div></td>
    <td width="7%"><div align="left">UOM</div></td>
    <td width="10%"><div align="left">Control No.</div></td>
     <td width="10%"><div align="left">Batch</div></td>
     <td width="10%"><div align="left">Price</div></td>
   </tr>
    <?php
	foreach($purchase_item_list as $ITEM) {?>
  <tr>
    <td><div align="left"><?php if($ITEM['po_cus_dc_inv_date'] != 0000-00-00) { echo  date("d-m-Y", strtotime($ITEM['po_cus_dc_inv_date'])); } else {echo "-";} ?></div></td>
          <td><div align="left"><?php echo $ITEM['vendor_name'];?></div></td>
       <td><div align="left"><?php echo $ITEM['po_indent_item_name'];?></div></td>
       <td><div align="left"><?php echo $ITEM['po_reference_number'];?></div></td>
       <td><div align="left"><?php echo $ITEM['uom_name'];?></div></td>
       <td><div align="left"><?php echo $ITEM['po_indent_item_control_no'];?></div></td>
       <td><div align="right"><?php echo $ITEM['po_indent_item_batch_no'];?></div></td>
       <td><div align="right"><?php echo $ITEM['po_indent_item_price'];?></div></td>
     </tr>
  <?php }?>
</table>
<div class="footer">
<hr />
<span class="copy">Powered by Vernalsoft © 2017 - 2018  Vernalsoft.com</span>
</div>
</body>
</html>