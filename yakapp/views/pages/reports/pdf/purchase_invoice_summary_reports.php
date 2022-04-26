<?php
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Purchase_summary'.date('d-M-Y').'.xls"');
header("Pragma: no-cache");
header("Expires: 0");    
?>
<table cellspacing="1" cellpadding="1" border="1" width="100%">
    <tr>
    	<td colspan="16" bgcolor="#b1ad78" >
    		<div align="center"><strong>Purchase Summary Report</strong></div>
        </td>
    </tr>
    <tr>
    	<td colspan="10" bgcolor="#c9ff93" >
    		<div align="left"><strong>From Date : <?php echo date('d-M-Y', strtotime($report_from));?> </strong></div>
        </td>
    	<td colspan="6" bgcolor="#c9ff93">
    		<div align="left"><strong>To Date :  <?php echo date('d-M-Y', strtotime($report_to));?></strong></div>
        </td>
    </tr>
  
    <?php foreach($invoice_list as $SI)
    { 
    ?>
      <tr>
    	<td width="5%"  bgcolor="#CD853F"><div align="left"><b>Created date</b></div></td>
        <td width="10%"  bgcolor="#CD853F"><div align="left"><b>PI Number</b></div></td>
    	<td width="25%"  bgcolor="#CD853F"><div align="left"><b>Vendor Name</b></div></td>
        <td width="30%"  bgcolor="#CD853F"><div align="right"><b>Gross Amount</b></div></td>
        <td width="15%"  bgcolor="#CD853F"><div align="right"><b>Discount Amount</b></div></td>
        <td width="15%"  bgcolor="#CD853F"><div align="right"><b>CGST Amount</b></div></td>
		<td width="15%"  bgcolor="#CD853F"><div align="right"><b>SGST Amount</b></div></td>
    	<td width="30%"  bgcolor="#CD853F"><div align="right"><b>Net Amount</b></div></td>
    	<td width="5%"  bgcolor="#CD853F"><div align="left"><b>Status</b></div></td>
        <td width="5%"  bgcolor="#CD853F"><div align="left"></div></td>
        <td width="5%"  bgcolor="#CD853F"><div align="left"></div></td>
        <td width="5%"  bgcolor="#CD853F"><div align="left"></div></td>
        <td width="5%"  bgcolor="#CD853F"><div align="left"></div></td>
        <td width="5%"  bgcolor="#CD853F"><div align="left"></div></td>
		<td width="5%"  bgcolor="#CD853F"><div align="left"></div></td>
        <td width="5%"  bgcolor="#CD853F"><div align="left"></div></td>
    </tr>
    <tr>
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
    	<td><div align="left"><?php echo $SI['po_invoice_number'];?></div></td>
    	<td><div align="left"><?php echo ucfirst($SI['vendor_name']);?></div></td>
        <td align="right"><div align="right"><?php echo $SI['po_invoice_total_gross_amount'];?></div></td>
        <td align="right"><div align="right"><?php echo $SI['po_invoice_total_discount_amount'];?></div></td>
        <td align="right"><div align="right"><?php echo $SI['tax_group_tax_amount'];?></div></td>
		  <td align="right"><div align="right"><?php echo $SI['tax_group_excise_amount'];?></div></td>
        <td align="right"><div align="right"><?php echo $SI['po_invoice_grand_total'];?></div></td>
    	<td><div align="left"><?php echo $SI['po_invoice_status']?></div></td>
        <td><div align="left"></div></td>
        <td><div align="left"></div></td>
        <td><div align="left"></div></td>
        <td><div align="left"></div></td>
        <td><div align="left"></div></td>
		<td><div align="left"></div></td>
        <td><div align="left"></div></td>
    </tr>
        <tr>
        <td width="5%"  ><div align="left"><b></b></div></td>
    	<td width="5%"  bgcolor="#33FFCC"><div align="left"><b>Item Code</b></div></td>
        <td width="10%"  bgcolor="#33FFCC"><div align="left"><b>Part No</b></div></td>
    	<td width="25%"  bgcolor="#33FFCC"><div align="left"><b>Item Description</b></div></td>
		<td width="25%"  bgcolor="#33FFCC"><div align="left"><b>HSN/SAC</b></div></td>
        <td width="30%"  bgcolor="#33FFCC"><div align="right"><b>UOM</b></div></td>
        <td width="15%"  bgcolor="#33FFCC"><div align="right"><b>Price/unit</b></div></td>
        <td width="15%"  bgcolor="#33FFCC"><div align="right"><b>Quantity</b></div></td>
    	<td width="30%"  bgcolor="#33FFCC"><div align="right"><b>Gross Amount</b></div></td>
    	<td width="5%"  bgcolor="#33FFCC"><div align="left"><b>Discount(%)</b></div></td>
        <td width="5%"  bgcolor="#33FFCC"><div align="left"><b>Discount Amount</b></div></td>
        <td width="5%"  bgcolor="#33FFCC"><div align="left"><b>CGST(%)</b></div></td>
        <td width="5%"  bgcolor="#33FFCC"><div align="left"><b>CGST Amount</b></div></td>
		<td width="5%"  bgcolor="#33FFCC"><div align="left"><b>SGST(%)</b></div></td>
        <td width="5%"  bgcolor="#33FFCC"><div align="left"><b>SGST Amount</b></div></td>
        <td width="5%"  bgcolor="#33FFCC"><div align="left"><b>Net Amount</b></div></td>
    </tr>
     <?php 
	 
	
	 foreach($SI['invoice_summary'] as $value )
    { 
	//echo "<pre>";
	//print_r($value);
    ?>
    <tr>
    	<td align="right"><div align="right"></div></td>
        <td align="right"><div align="right"><?php echo $value['po_invoice_items_code'];?></div></td>
        <td align="right"><div align="right"><?php echo $value['po_invoice_items_model'];?></div></td>
        <td align="right"><div align="right"><?php echo $value['po_invoice_items_name'];?></div></td>
		<td align="right"><div align="right"><?php echo $value['po_invoice_items_hsn_sac'];?></div></td>
        <td align="right"><div align="right"><?php echo $value['uom_name'];?></div></td>
        <td align="right"><div align="right"><?php echo $value['po_invoice_items_priceperunit'];?></div></td>
        <td align="right"><div align="right"><?php echo $value['po_invoice_items_qty'];?></div></td>
        <td align="right"><div align="right"><?php echo $value['po_invoice_items_gross_amount'];?></div></td>
        <td align="right"><div align="right"><?php echo $value['po_invoice_items_discounts_percentage'];?></div></td>
        <td align="right"><div align="right"><?php echo $value['po_invoice_items_discounts_amount'];?></div></td>
        <td align="right"><div align="right"><?php echo $value['po_invoice_items_tax_percent'];?></div></td>
        <td align="right"><div align="right"><?php echo $value['po_invoice_items_tax_amount'];?></div></td>
		<td align="right"><div align="right"><?php echo $value['po_invoice_items_excise_percent'];?></div></td>
        <td align="right"><div align="right"><?php echo $value['po_invoice_items_excise_amount'];?></div></td>
        <td align="right"><div align="right"><?php echo $value['po_invoice_items_net_amount'];?></div></td>
    	
    </tr>
	<?php
    }
	}
	?>
</table>
