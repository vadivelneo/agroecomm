<?php
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="customer_debit_'.date('d-M-Y').'.xls"');
header("Pragma: no-cache");
header("Expires: 0");    
?>
<form id="form1" name="form1" method="post" action="">
<table cellspacing="1" cellpadding="1" border="1" width="100%">
    <tr>
    	<td colspan="6" bgcolor="#c9ff93" >
    		<div align="left"><strong>Sales Collection</strong></div>
        </td>
    	<td colspan="4" bgcolor="#c9ff93">
    		<div align="left"><strong>Customer Debit</strong></div>
        </td>
    </tr>
    <tr>
    	<td colspan="6" ><table width="100%" border="1">
    	  <tr>
    	<td width="5%"  bgcolor="#bcbcbc"><div align="left"><b>Invoice no.</b></div></td>
        <td width="10%"  bgcolor="#bcbcbc"><div align="left"><b>Invoice Date</b></div></td>
    	<td width="25%"  bgcolor="#bcbcbc"><div align="left"><b>Customer Name</b></div></td>
        <td width="15%"  bgcolor="#bcbcbc"><div align="left"><b>Invoice Amount</b></div></td>
        <td width="15%"  bgcolor="#bcbcbc"><div align="left"><b>Collection Amount</b></div></td>
         <td width="15%"  bgcolor="#bcbcbc"><div align="left"><b></b></div></td>
  	    </tr>
          <?php foreach($invoice_list as $SI)
    { 
    ?>
    <tr>
    	
    	<td><div align="left"><?php echo $SI['sale_invoice_no'];?></div></td>
        <td>
        	<div align="left">
				<?php 
					if(($SI['sale_invoice_add_date']) != '0000-00-00' && $SI['sale_invoice_add_date'] != '' && $SI['sale_invoice_add_date'] != NULL)
					{ 
						echo date('d-M-Y', strtotime($SI['sale_invoice_add_date']));
					}
					else
					{
						echo "-";
					}
				?>
			</div>
        </td>
    	<td><div align="left"><?php echo ucfirst($SI['customer_name']);?></div></td>
        <td align="right"><div align="right"><?php echo $SI['invoice_payment_invoice_amount'];?></div></td>
        <td align="right"><div align="right"><?php echo $SI['invoice_payment_paid_amount'];?></div></td>
        <td align="right"><div align="right"></div></td>
    </tr>
	<?php
    }
	?>
     			   <td></td>
                   <td></td>
                   <td></td>
                   <td class="amt_right"> <?php if(isset($total_values->INV_AMT)) { echo $total_values->INV_AMT; } ?> </td>
                   <td class="amt_right"> <?php if(isset($total_values->INV_PAID_AMT)) { echo $total_values->INV_PAID_AMT; } ?> </td
  	  ></table></td>
    	<td colspan="4" ><table width="100%" border="1">
    	  <tr>
    	   <td width="10%"  bgcolor="#bcbcbc"><div align="left"><b>Added By</b></div></td>
           <td width="10%"  bgcolor="#bcbcbc"><div align="left"><b>Customer Name</b></div></td>
    	<td width="25%"  bgcolor="#bcbcbc"><div align="left"><b>Account amount</b></div></td>
        <td width="15%"  bgcolor="#bcbcbc"><div align="left"><b>Account add date</b></div></td>
  	    </tr>
        <tr>
    	   <?php foreach($debit_note as $CRD)
    { 
    ?>
        <td><div align="left"><?php echo ucfirst($CRD['user_name']);?></div></td>
        <td><div align="left"><?php echo ucfirst($CRD['customer_name']);?></div></td>
        <td align="right"><div align="right"><?php echo $CRD['account_amount'];?></div></td>
        <td><div align="left"><?php echo date('d-m-Y', strtotime($CRD['account_add_date']));?></div></td>
     
    </tr> <?php }  ?>
     <td>  </td>
      <td>  </td>
                   <td class="amt_right"><?php if(isset($total_debit->debit_total)) { echo $total_debit->debit_total; } ?> </td>
                    <td>  </td>
  	  </table></td>
    </tr>
</table>
</form>


