<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Customer_Debit_Note_'.date('d-M-Y').'.xls"');
header("Pragma: no-cache");
header("Expires: 0");    
?>
<table cellspacing="1" cellpadding="1" border="1" width="100%">
    <tr>
    	<td colspan="9" bgcolor="#c9ff93" >
    		<div align="center"><strong>Agro</strong></div>
        </td>
    </tr>
    
    <tr>
    	
        <td width="10%"  bgcolor="#bcbcbc"><div align="left"><b>Customer Code</b></div></td>
    	<td width="25%"  bgcolor="#bcbcbc"><div align="left"><b>Customer Name</b></div></td>
        <td width="20%"  bgcolor="#bcbcbc"><div align="left"><b>Debit Note</b></div></td>
        <td width="5%"  bgcolor="#bcbcbc"><div align="left"><b>Credit Note</b></div></td>
         </tr>
    <?php
	//echo $credit_count; exit;
	 foreach($credit_details as $CD)
   // echo "<pre>";
   // print_r($credit_details);
    { 
    ?>
    <tr>
    	
        <td><div align="left"><?php echo $CD['customer_code'];?></div></td>
    	<td><div align="left"><?php echo $CD['customer_name'];?></div></td>
        <td><div align="left"><?php echo $CD['customer_accounts_debit'];?></div></td>
        <td><div align="left"><?php echo $CD['customer_accounts_credit'];?></div></td>
       
    </tr>
    
	<?php
    }
	?>
     <tr>
    	
        <td width="10%"  bgcolor="#bcbcbc"><div align="left"><b></b></div></td>
    	<td width="25%"  bgcolor="#bcbcbc"><div align="left"><b>Total</b></div></td>
        <td width="20%"  bgcolor="#bcbcbc"><div align="left"><b><div align="left"><?php echo $debit_count;?></b></div></td>
        <td width="5%"  bgcolor="#bcbcbc"><div align="left"><b><div align="left"><?php echo $credit_count;?></b></div></td>
         </tr>
</table>
