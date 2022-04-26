<?php
header('Content-Type: application/vnd.ms-excel');
header('Content-Description: File Transfer');
header('Content-Disposition: attachment;filename="purchaseinvoice_'.date('d-M-Y').'.xls"');
header("Pragma: no-cache");
header("Expires: 0");    
?>
<table cellspacing="1" cellpadding="1" border="1" width="100%">
    <tr>
    	<td colspan="9" bgcolor="#b1ad78" >
    		<div align="center"><strong>Purchase Invoice Report</strong></div>
        </td>
    </tr>
    <tr>
    	<td colspan="4" bgcolor="#c9ff93" >
    		<div align="left"><strong>From Date : <?php echo date('d-m-Y', strtotime($report_from));?> </strong></div>
        </td>
    	<td colspan="5" bgcolor="#c9ff93">
    		<div align="left"><strong>To Date :  <?php echo date('d-m-Y', strtotime($report_to));?></strong></div>
        </td>
    </tr>
    <tr>
    	<td width="10%"  bgcolor="#bcbcbc"><div align="left"><b>Purchase Invoice No</b></div></td>
        <td width="10%"  bgcolor="#bcbcbc"><div align="left"><b>Purchase Order No</b></div></td>
    	<td width="25%"  bgcolor="#bcbcbc"><div align="left"><b>Vendor Name</b></div></td>
        <td width="30%"  bgcolor="#bcbcbc"><div align="right"><b>Gross Amount</b></div></td>
        <td width="15%"  bgcolor="#bcbcbc"><div align="right"><b>Discount Amount</b></div></td>
        <td width="15%"  bgcolor="#bcbcbc"><div align="right"><b>CGST Amount</b></div></td>
    	<td width="30%"  bgcolor="#bcbcbc"><div align="right"><b>SGST Amount</b></div></td>
    	<td width="5%"  bgcolor="#bcbcbc"><div align="left"><b>Created date</b></div></td>
    	<td width="5%"  bgcolor="#bcbcbc"><div align="left"><b>Status</b></div></td>
    </tr>
    <?php foreach($invoice_list as $INVOICE)
    { 
    ?>
    <tr>
    	<td><div align="left"><?php echo $INVOICE['po_invoice_number'];?></div></td>
        <td><div align="left"><?php echo $INVOICE['po_invoice_po_reference_number'];?></div></td>
    	<td><div align="left"><?php echo ucfirst($INVOICE['vendor_name']);?></div></td>
        <td align="right"><div align="right"><?php echo $INVOICE['po_invoice_total_gross_amount'];?></div></td>
        <td align="right"><div align="right"><?php echo $INVOICE['po_invoice_total_discount_amount'];?></div></td>
        <td align="right"><div align="right"><?php echo $INVOICE['tax_group_tax_amount'];?></div></td>
        <td align="right"><div align="right"><?php echo $INVOICE['tax_group_excise_amount'];?></div></td>
    	<td>
        	<div align="left">
				<?php 
					if(($INVOICE['po_invoice_add_date']) != '0000-00-00' && $INVOICE['po_invoice_add_date'] != '' && $INVOICE['po_invoice_add_date'] != NULL)
					{ 
						echo date('d-m-Y', strtotime($INVOICE['po_invoice_add_date']));
					}
					else
					{
						echo "-";
					}
				?>
			</div>
        </td>
    	<td><div align="left"><?php echo $INVOICE['po_invoice_status']?></div></td>
    </tr>
	<?php
    }
	?>
</table>
