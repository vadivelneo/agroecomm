<?php
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="payment_receipt_'.date('d-M-Y').'.xls"');
header("Pragma: no-cache");
header("Expires: 0");    
?>
<table cellspacing="0" cellpadding="0" border="1" width="100%" >
  <tr>
    <td colspan="6" bgcolor="#9799B7" >
    <div align="center"><strong>Payment Report</strong></div></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#94CCAA" >
    <div align="left"><strong>From Date : <?php echo date('d-m-Y', strtotime($report_from));?> </strong></div></td>
    <td colspan="3" bgcolor="#94CCAA">
    <div align="left"><strong>To Date :  <?php echo date('d-m-Y', strtotime($report_to));?></strong></div></td>
  </tr>
   
  <tr>
    <td width="20%" bgcolor="#CCCCCC"><div align="left">Recipt No</div></td>
    <td width="20%" bgcolor="#CCCCCC"><div align="left">Vendor Name</div></td>
    <td width="20%" bgcolor="#CCCCCC"><div align="left">Vendor Code</div></td>
    <td width="20%" bgcolor="#CCCCCC"><div align="left">Amount</div></td>
    <td width="20%" bgcolor="#CCCCCC"><div align="left">Balance Amount</div></td>
    <td width="20%" bgcolor="#CCCCCC"><div align="left">Payment Mode</div></td>
   </tr>
    <?php
	foreach($payment_list as $PAY) { ?>
  <tr>
    <td><div align="left"><?php echo $PAY['payment_receipt_number'];?></div></td>
     <td><div align="left"><?php echo $PAY['vendor_name'];?></div></td>
      <td><div align="left"><?php echo $PAY['vendor_code'];?></div></td>
       <td><div align="left"><?php echo $PAY['payment_receipt_amount'];?></div></td>
       <td><div align="left"><?php echo $PAY['payment_receipt_balance_amount'];?></div></td>
       <td><div align="left"><?php echo $PAY['payment_mode_name'];?></div></td>
     </tr>
     <tr>
     <td width="5%"  ><div align="left"><b></b></div></td>
     	<td bgcolor="#dcdcdc"><div align="left">Invoice No</td>
		<td bgcolor="#dcdcdc"><div align="left">Invoive Amount</td>
		<td bgcolor="#dcdcdc"><div align="left">Adjust Amount</td>
		<td><div align="left"></td>
		<td><div align="left"></td>
      </tr>
      <?php 	 	
	 foreach($PAY['invoice_summary'] as $value )
     { 
     ?> 
		<tr>
			<td align="right"><div align="right"></div></td>
			<td align="right"><div align="right"><?php echo $value['po_invoice_number'];?></div></td>
			<td align="right"><div align="right"><?php echo $value['payment_payment_invoice_amount'];?></div></td>
			<td align="right"><div align="right"><?php echo $value['amount'];?></div></td>
			<td align="right"><div align="right"></div></td>
			<td align="right"><div align="right"></div></td>
		</tr> 
	<?php } } ?>
</table>
