<?php
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="inventory_stock_'.date('d-M-Y').'.xls"');
header("Pragma: no-cache");
header("Expires: 0");    
?>
<table cellspacing="1" cellpadding="1" border="1" width="100%">
    <tr>
    	<td colspan="10" bgcolor="#b1ad78" >
    		<div align="center"><strong>Inventory Stock Report</strong></div>
        </td>
    </tr>
   
    <tr>
    	<td width="5%"  bgcolor="#bcbcbc"><div align="left"><b>SKU</b></div></td>
        <td width="10%"  bgcolor="#bcbcbc"><div align="left"><b>Material Id</b></div></td>
    	<td width="25%"  bgcolor="#bcbcbc"><div align="left"><b>Material Name</b></div></td>
        <td width="20%"  bgcolor="#bcbcbc"><div align="left"><b>HSN/SAC</b></div></td>
        <td width="30%"  bgcolor="#bcbcbc"><div align="right"><b>Control No</b></div></td>
        <td width="15%"  bgcolor="#bcbcbc"><div align="right"><b>Batch No</b></div></td>
        <td width="15%"  bgcolor="#bcbcbc"><div align="right"><b>UOM</b></div></td>
    	<td width="10%"  bgcolor="#bcbcbc"><div align="right"><b>Expiry Date</b></div></td>
        <td width="10%"  bgcolor="#bcbcbc"><div align="right"><b>Received Quantity</b></div></td>
       	<td width="5%"  bgcolor="#bcbcbc"><div align="left"><b>Added Date</b></div></td>
    </tr>
    <?php foreach($inventory_stock as $ITEMS)
    { 
    ?>
    <tr>
    	
        <td><div align="left"><?php echo $ITEMS['product_stock_name'];?></div></td>
    	<td><div align="left"><?php echo $ITEMS['inventory_id'];?></div></td>
        <td><div align="left"><?php echo ucfirst($ITEMS['product_name']);?></div></td>
        <td align="right"><div align="right"><?php echo $ITEMS['product_hsn_sac'];?></div></td>
        <td align="right"><div align="right"><?php echo $ITEMS['inventory_control_no'];?></div></td>
        <td align="right"><div align="right"><?php echo $ITEMS['inventory_batch_no'];?></div></td>
        <td align="right"><div align="right"><?php echo $ITEMS['uom_name'];?></div></td>
      <td>
        	<div align="left">
				<?php 
					if(($ITEMS['inventory_expiry_date']) != '0000-00-00' && $ITEMS['inventory_expiry_date'] != '' && $ITEMS['inventory_expiry_date'] != NULL)
					{ 
						echo date('d-M-Y', strtotime($ITEMS['inventory_expiry_date']));
					}
					else
					{
						echo "-";
					}
				?>
			</div>
        </td>
    	<td><div align="left"><?php echo $ITEMS['inventory_qty']?></div></td>
        <td>
        	<div align="left">
				<?php 
					if(($ITEMS['inventory_add_date']) != '0000-00-00' && $ITEMS['inventory_add_date'] != '' && $ITEMS['inventory_add_date'] != NULL)
					{ 
						echo date('d-M-Y', strtotime($ITEMS['inventory_add_date']));
					}
					else
					{
						echo "-";
					}
				?>
			</div>
    </tr>
	<?php
    }
	?>
</table>
