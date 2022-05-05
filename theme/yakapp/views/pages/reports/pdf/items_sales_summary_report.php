<?php
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="delivery_'.date('d-M-Y').'.xls"');
header("Pragma: no-cache");
header("Expires: 0");    
?>
<table cellspacing="1" cellpadding="1" border="1" width="100%">
    <tr>
    	<td colspan="7" bgcolor="#b1ad78" >
    		<div align="center"><strong>Delivery Report</strong></div>
        </td>
    </tr>
    <tr>
    	<td colspan="4" bgcolor="#c9ff93" >
    		<div align="left"><strong>From Date : <?php echo date('d-M-Y', strtotime($report_from));?> </strong></div>
        </td>
    	<td colspan="3" bgcolor="#c9ff93">
    		<div align="left"><strong>To Date :  <?php echo date('d-M-Y', strtotime($report_to));?></strong></div>
        </td>
    </tr>
    <tr>
        <tr>
    	<td width="5%"  bgcolor="#CD853F"><div align="left"><b>Item Code</b></div></td>
        <td width="10%"  bgcolor="#CD853F"><div align="left"><b>Mfr. Part No</b></div></td>
        <td width="10%"  bgcolor="#CD853F"><div align="left"><b>Item Name</b></div></td>
    	<td width="25%"  bgcolor="#CD853F"><div align="left"><b>Price Per Unit</b></div></td>
        <td width="20%"  bgcolor="#CD853F"><div align="left"><b>Total Quantity</b></div></td>
        <td width="5%"  bgcolor="#CD853F"><div align="left"><b></b></div></td>

    </tr>

    <?php 
	//echo "<pre>";
	//print_r($sales_item_list);
	foreach($sales_item_list['item_details'] as $ITM)
    { 
    ?>
    
    	<tr>
        <td><div align="left"><?php echo $ITM['sale_invoice_item_code'];?></div></td>
        <td><div align="left"><?php echo ucfirst($ITM['sale_invoice_item_model']);?></div></td>
    	<td><div align="left"><?php echo ucfirst($ITM['sale_invoice_item_name']);?></div></td>
        <td><div align="left"><?php echo ucfirst($ITM['sale_invoice_item_priceperunit']);?></div></td>
    	<td><div align="left"><?php echo $ITM['Qty_total']?></div></td>
        <td><div align="left"></div></td>
    </tr>
        
         <?php 
	 
	}
	?>
</table>
