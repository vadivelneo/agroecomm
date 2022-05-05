<?php
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="purchaseorder_'.date('d-M-Y').'.xls"');
header("Pragma: no-cache");
header("Expires: 0");    
?>
<table cellspacing="1" cellpadding="1" border="1" width="100%">
    <tr>
    	<td colspan="14" bgcolor="#b1ad78" >
    		<div align="center"><strong>Purchase Order Report</strong></div>
        </td>
    </tr>
    <tr>
    	<td colspan="7" bgcolor="#c9ff93" >
    		<div align="left"><strong>From Date : <?php echo date('d-m-Y', strtotime($report_from));?> </strong></div>
        </td>
    	<td colspan="7" bgcolor="#c9ff93">
    		<div align="left"><strong>To Date :  <?php echo date('d-m-Y', strtotime($report_to));?></strong></div>
        </td>
    </tr>
    <tr>
        <td width="10%"  bgcolor="#bcbcbc"><div align="left"><b>Purchase Order No</b></div></td>
    	<td width="25%"  bgcolor="#bcbcbc"><div align="left"><b>Vendor Name</b></div></td>
        <td width="30%"  bgcolor="#bcbcbc"><div align="right"><b>Gross Amount</b></div></td>
        <td width="15%"  bgcolor="#bcbcbc"><div align="right"><b>Discount Amount</b></div></td>
        <td width="15%"  bgcolor="#bcbcbc"><div align="right"><b>Tax Amount</b></div></td>
    	
    	<td width="5%"  bgcolor="#bcbcbc"><div align="left"><b>Created date</b></div></td>
    	<td width="5%"  bgcolor="#bcbcbc"><div align="left"><b>Status</b></div></td>
    </tr>
    <?php foreach($po_list as $PO)
    { 
    ?>
    <tr>
        <td><div align="left"><?php echo $PO['po_po_no'];?></div></td>
    	<td><div align="left"><?php echo ucfirst($PO['vendor_name']);?></div></td>
        <td align="right"><div align="right"><?php echo $PO['po_total_gross_amount'];?></div></td>
        <td align="right"><div align="right"><?php echo $PO['po_total_discount_amount'];?></div></td>
        <td align="right"><div align="right"><?php echo $PO['po_total_tax_amount'];?></div></td>
       <!-- <td align="right"><div align="right"><?php echo $PO['excise_group_excise_amount'];?></div></td>-->
    	<td>
        	<div align="left">
				<?php 
					if(($PO['po_add_date']) != '0000-00-00' && $PO['po_add_date'] != '' && $PO['po_add_date'] != NULL)
					{ 
						echo date('d-m-Y', strtotime($PO['po_add_date']));
					}
					else
					{
						echo "-";
					}
				?>
			</div>
        </td>
    	<td><div align="left"><?php echo $PO['po_po_status']?></div></td>
    </tr>
	
		
	 <tr>
        <td width="10%" "><div align="left"><b></b></div></td>
        <td width="10%"  bgcolor="#f4f4b0"><div align="left"><b>SKU</b></div></td>
    	<td width="25%"  bgcolor="#f4f4b0"><div align="left"><b>Item</b></div></td>
		<td width="25%"  bgcolor="#f4f4b0"><div align="left"><b>HSN/SAC</b></div></td>
		<td width="25%"  bgcolor="#f4f4b0"><div align="left"><b>Division</b></div></td>
		<td width="25%"  bgcolor="#f4f4b0"><div align="left"><b>Store</b></div></td>
		<td width="25%"  bgcolor="#f4f4b0"><div align="left"><b>UOM</b></div></td>
		 <td width="15%"  bgcolor="#f4f4b0"><div align="left"><b>Brand</b></div></td>
        <td width="30%"  bgcolor="#f4f4b0"><div align="left"><b>Price</b></div></td>
       
        <td width="15%"  bgcolor="#f4f4b0"><div align="left"><b>Qty</b></div></td>
    	<td width="5%"  bgcolor="#f4f4b0"><div align="left"><b>Gross amt</b></div></td>
    	<td width="5%"  bgcolor="#f4f4b0"><div align="left"><b>CGST amt</b></div></td>
    	<td width="5%"  bgcolor="#f4f4b0"><div align="left"><b>SGST amt</b></div></td>
    	
    </tr>
     <?php foreach($PO['purchase_order'] as $value)
    { 
    ?>
    <tr>
    	<td><div align="left"></div></td>
        <td><div align="left"><?php echo $value['product_sku'];?></div></td>
        <td align="left"><div align="left"><?php echo ($value['po_items_name']);?></div></td>
		<td align="left"><div align="left"><?php echo ($value['po_items_hsn_sac']);?></div></td>
		<td align="left"><div align="left"><?php echo ($value['division_name']);?></div></td>
		<td align="left"><div align="left"><?php echo ($value['store_name']);?></div></td>
        <td align="left"><div align="left"><?php echo ($value['uom_name']);?></div></td>
        <td align="left"><div align="left"><?php echo ($value['po_items_brand']);?></div></td>
    	<td><div align="left"><?php echo ($value['po_items_priceperunit']);?></div></td>
        <td><div align="left"><?php echo ($value['po_items_ord_qty']);?></div></td>
        <td><div align="left"><?php echo ($value['po_items_gross_amount']);?></div></td>
        <td><div align="left"><?php echo ($value['po_items_tax_amount']);?></div></td>
        <td><div align="left"><?php echo ($value['po_items_excise_amount']);?></div></td>
        
    </tr>
	
	
	<?php
    }
	}
	?>
</table>
