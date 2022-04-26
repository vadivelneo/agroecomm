<?php
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="goods-received_'.date('d-M-Y').'.xls"');
header("Pragma: no-cache");
header("Expires: 0");    
?>
<table cellspacing="1" cellpadding="1" border="1" width="100%">
    <tr>
    	<td colspan="12" bgcolor="#b1ad78" >
    		<div align="center"><strong>Goods Received Report</strong></div>
        </td>
    </tr>
    <tr>
    	<td colspan="6" bgcolor="#c9ff93" >
    		<div align="left"><strong>From Date : <?php echo date('d-m-Y', strtotime($report_from));?> </strong></div>
        </td>
    	<td colspan="6" bgcolor="#c9ff93">
    		<div align="left"><strong>To Date :  <?php echo date('d-m-Y', strtotime($report_to));?></strong></div>
        </td>
    </tr>
   
    <?php foreach($po_ind_list as $PO_IND)
    { 
    ?>
     <tr>
        <td width="10%"  bgcolor="#CD853F"><div align="left"><b>Goods Received No</b></div></td>
    	<td width="25%"  bgcolor="#CD853F"><div align="left"><b>Goods Received Date</b></div></td>
        <td width="30%"  bgcolor="#CD853F"><div align="left"><b>Purchase Order No</b></div></td>
        <td width="15%"  bgcolor="#CD853F"><div align="left"><b>Vendor Name</b></div></td>
        <td width="15%"  bgcolor="#CD853F"><div align="left"><b>Location</b></div></td>
    	<td width="5%"  bgcolor="#CD853F"><div align="left"><b>Status</b></div></td>
        <td width="5%"  bgcolor="#CD853F"><div align="left"><b></b></div></td>
    </tr>
    <tr>
        <td><div align="left"><?php echo $PO_IND['po_indent_number'];?></div></td>
    	<td>
        	<div align="left">
				<?php if(($PO_IND['po_indent_date']) != '0000-00-00' && $PO_IND['po_indent_date'] != '' && $PO_IND['po_indent_date'] != NULL) 
				{ 
					echo date('d-m-Y', strtotime($PO_IND['po_indent_date'])); 
				}
				else
				{ ?>
				-
				<?php 
				} 
				?>
			</div>
        </td>
        <td align="left"><div align="left"><?php echo ucfirst($PO_IND['po_reference_number']);?></div></td>
        <td align="left"><div align="left"><?php echo ucfirst($PO_IND['vendor_name']);?></div></td>
        <td align="left"><div align="left"><?php echo ucfirst($PO_IND['location_name']);?></div></td>
    	<td><div align="left"><?php echo ucfirst($PO_IND['po_indent_active_status']);?></div></td>
        <td><div align="left"></div></td>
    </tr>
     <tr>
        <td width="10%" "><div align="left"><b></b></div></td>
        <td width="10%"  bgcolor="#33FFCC"><div align="left"><b>Item Code</b></div></td>
    	<td width="25%"  bgcolor="#33FFCC"><div align="left"><b>Item Description</b></div></td>
		<td width="25%"  bgcolor="#33FFCC"><div align="left"><b>HSN/SAC</b></div></td>
		<td width="25%"  bgcolor="#33FFCC"><div align="left"><b>Control No</b></div></td>
		<td width="25%"  bgcolor="#33FFCC"><div align="left"><b>Batch No</b></div></td>
		<td width="25%"  bgcolor="#33FFCC"><div align="left"><b>Expiry Date</b></div></td>
		 <td width="15%"  bgcolor="#33FFCC"><div align="left"><b>UOM</b></div></td>
        <td width="30%"  bgcolor="#33FFCC"><div align="left"><b>Ordered Qty</b></div></td>
       
        <td width="15%"  bgcolor="#33FFCC"><div align="left"><b>Received Qty</b></div></td>
    	<td width="5%"  bgcolor="#33FFCC"><div align="left"><b>Pending Qty</b></div></td>
    	<td width="5%"  bgcolor="#33FFCC"><div align="left"><b>Extra Qty</b></div></td>
    </tr>
     <?php foreach($PO_IND['purchase_indent'] as $value)
    { 
    ?>
    <tr>
    	<td><div align="left"></div></td>
        <td><div align="left"><?php echo $value['po_indent_item_code'];?></div></td>
        <td align="left"><div align="left"><?php echo ($value['po_indent_item_name']);?></div></td>
		<td align="left"><div align="left"><?php echo ($value['po_indent_item_hsn_san']);?></div></td>
		<td align="left"><div align="left"><?php echo ($value['po_indent_item_control_no']);?></div></td>
		<td align="left"><div align="left"><?php echo ($value['po_indent_item_batch_no']);?></div></td>
		<td align="left"><div align="left"><?php 
							 	if(isset($value['po_indent_item_expiry_date'])){ 
										$originalDate=$value['po_indent_item_expiry_date'];
										if($originalDate == '0000-00-00'){ echo '-'; }
										else
										{
											$newDate=date("d-m-Y", strtotime($originalDate));
											echo $newDate;
										}
										} 
							 ?></div></td>
        <td align="left"><div align="left"><?php echo ($value['po_indent_order_qty']);?></div></td>
        <td align="left"><div align="left"><?php echo ($value['uom_name']);?></div></td>
    	<td><div align="left"><?php echo ($value['po_indent_received_qty']);?></div></td>
        <td><div align="left"><?php echo ($value['po_indent_pending_qty']);?></div></td>
        <td><div align="left"><?php echo ($value['po_indent_extra_qty']);?></div></td>
    </tr>
	<?php
    }
	}
	?>
</table>
