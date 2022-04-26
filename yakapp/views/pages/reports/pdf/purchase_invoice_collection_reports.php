<?php
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Purchase_Collection_'.date('d-M-Y').'.xls"');
header("Pragma: no-cache");
header("Expires: 0");    
?>
<table cellspacing="1" cellpadding="1" border="1" width="100%">
    <tr>
    	<td colspan="6" bgcolor="#b1ad78" >
    		<div align="center"><strong>Purchase Invoice Collection Report</strong></div>
        </td>
    </tr>
    <tr>
    	<td colspan="3" bgcolor="#c9ff93" >
    		<div align="left"><strong>From Date : <?php echo date('d-M-Y', strtotime($report_from));?> </strong></div>
        </td>
    	<td colspan="3" bgcolor="#c9ff93">
    		<div align="left"><strong>To Date :  <?php echo date('d-M-Y', strtotime($report_to));?></strong></div>
        </td>
    </tr>
    <tr>
    	<td width="5%"  bgcolor="#CD853F"><div align="left"><b>Purchase Invoice no.</b></div></td>
        <td width="10%"  bgcolor="#CD853F"><div align="left"><b>Invoice Date</b></div></td>
    	<td width="25%"  bgcolor="#CD853F"><div align="left"><b>Vendor Name</b></div></td>
        <td width="30%"  bgcolor="#CD853F"><div align="right"><b>Invoice Amount</b></div></td>
        <td width="15%"  bgcolor="#CD853F"><div align="right"><b>Collection Amount</b></div></td>
        <td width="15%"  bgcolor="#CD853F"><div align="right"><b>Due Amount</b></div></td>

    </tr>
    <?php foreach($invoice_list as $SI)
    { 
    ?>
    
    <tr>
     <td><div align="left"><?php echo $SI['po_invoice_number'];?></div></td>
    	<td>
        	<div align="left">
           
				<?php 
					if(($SI['po_invoice_add_date']) != '0000-00-00' && $SI['po_invoice_add_date'] != '' && $SI['po_invoice_add_date'] != NULL)
					{ 
						echo date('d-M-Y', strtotime($SI['po_invoice_add_date']));
					}
					else
					{
						echo "-";
					}
				?>
			</div>
        </td>
    	
    	<td><div align="left"><?php echo ucfirst($SI['vendor_name']);?></div></td>
        <td align="right"><div align="right"><?php echo $SI['payment_payment_invoice_amount'];?></div></td>
        <td align="right"><div align="right"><?php echo $SI['payment_payment_paid_amount'];?></div></td>
        <td align="right"><div align="right"><?php echo $SI['payment_payment_due_amount'];?></div></td>
    	
   
	<?php
    
	}
	?>
</table>
