<?php
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="income_receipt_'.date('d-M-Y').'.xls"');
header("Pragma: no-cache");
header("Expires: 0");    
?>
<table cellspacing="0" cellpadding="0" border="1" width="100%" >
  <tr>
    <td colspan="6" bgcolor="#9799B7" >
    <div align="center"><strong>Income Report</strong></div></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#94CCAA" >
    <div align="left"><strong>From Date : <?php echo date('d-m-Y', strtotime($report_from));?> </strong></div></td>
    <td colspan="3" bgcolor="#94CCAA">
    <div align="left"><strong>To Date :  <?php echo date('d-m-Y', strtotime($report_to));?></strong></div></td>
  </tr>
   
  <tr bgcolor="#CCCCCC">
    <td width="20%"><div align="left">Recipt No</div></td>
    <td width="20%"><div align="left">Customer Name</div></td>
    <td width="20%"><div align="left">Customer Code</div></td>
    <td width="20%"><div align="left">Amount</div></td>
    <td width="20%"><div align="left">Balance Amount</div></td>
     <td width="20%"><div align="left">Payment Mode</div></td>
   </tr>
    <?php
	foreach($income_list as $INC) {?>
  <tr>
    <td><div align="left"><?php echo $INC['invoice_receipt_number'];?></div></td>
     <td><div align="left"><?php echo $INC['customer_name'];?></div></td>
      <td><div align="left"><?php echo $INC['customer_code'];?></div></td>
       <td><div align="left"><?php echo $INC['invoice_receipt_amount'];?></div></td>
       <td><div align="left"><?php echo $INC['invoice_receipt_balance_amount'];?></div></td>
       <td><div align="left"><?php echo $INC['payment_mode_name'];?></div></td>
     </tr>
     <tr>
     <td width="5%"  ><div align="left"><b></b></div></td>
     	<td><div align="left">Invoice No</td>
        		<td><div align="left">Invoive Amount</td>
				<td><div align="left">Adjust Amount</td>
      </tr>
      <?php 
	 
	
	 foreach($INC['invoice_summary'] as $value )
    { 
	//echo "<pre>";
	//print_r($value);
    ?> 
     <tr>
    	<td align="right"><div align="right"></div></td>
        <td align="right"><div align="right"><?php echo $value['sale_invoice_no'];?></div></td>
        <td align="right"><div align="right"><?php echo $value['invoice_payment_invoice_amount'];?></div></td>
        <td align="right"><div align="right"><?php echo $value['amount'];?></div></td>
     
    	
    </tr>         	
  <?php } }?>
</table>
