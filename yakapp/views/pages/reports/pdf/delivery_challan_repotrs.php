<?php
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="deliverychallan_'.date('d-M-Y').'.xls"');
header("Pragma: no-cache");
header("Expires: 0");    
?>
<table cellspacing="1" cellpadding="1" border="1" width="100%">
    <tr>
    	<td colspan="7" bgcolor="#b1ad78" >
    		<div align="center"><strong>Delivery Challan Report</strong></div>
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

    <?php foreach($dc_list as $DC)
    { 
    ?>
    <tr>
        <tr>
    	<td width="5%"  bgcolor="#CD853F"><div align="left"><b>Created date</b></div></td>
        <td width="10%"  bgcolor="#CD853F"><div align="left"><b>DC No</b></div></td>
        <td width="10%"  bgcolor="#CD853F"><div align="left"><b>So No</b></div></td>
    	<td width="25%"  bgcolor="#CD853F"><div align="left"><b>Customer Name</b></div></td>
        <td width="20%"  bgcolor="#CD853F"><div align="left"><b>Sales Representative</b></div></td>
    	<td width="5%"  bgcolor="#CD853F"><div align="left"><b>Status</b></div></td>
        <td width="5%"  bgcolor="#CD853F"><div align="left"><b></b></div></td>
    </tr>
    	<td>
        	<div align="left">
				<?php 
					if(($DC['delivery_challan_date']) != '0000-00-00' && $DC['delivery_challan_date'] != '' && $DC['delivery_challan_date'] != NULL)
					{ 
						echo date('d-M-Y', strtotime($DC['delivery_challan_date']));
					}
					else
					{
						echo "-";
					}
				?>
			</div>
        </td>
        <td><div align="left"><?php echo $DC['delivery_challan_number'];?></div></td>
        <td><div align="left"><?php echo ucfirst($DC['delivery_challan_sales_reference_number']);?></div></td>
    	<td><div align="left"><?php echo ucfirst($DC['customer_name']);?></div></td>
        <td><div align="left"><?php echo ucfirst($DC['designation_user_name']);?></div></td>
    	<td><div align="left"><?php echo $DC['delivery_challan_status']?></div></td>
        <td><div align="left"></div></td>
    </tr>
        <tr>
        <td width="5%" ><div align="left"><b></b></div></td>
    	<td width="5%"  bgcolor="#33FFCC"><div align="left"><b>Item Code</b></div></td>
        <td width="10%"  bgcolor="#33FFCC"><div align="left"><b>Item Name</b></div></td>
        <td width="10%"  bgcolor="#33FFCC"><div align="left"><b>Ordered Quantity</b></div></td>
    	<td width="25%"  bgcolor="#33FFCC"><div align="left"><b>UOM</b></div></td>
        <td width="20%"  bgcolor="#33FFCC"><div align="left"><b>Delivered Quantity</b></div></td>
    	<td width="5%"  bgcolor="#33FFCC"><div align="left"><b>Pending Quantity</b></div></td>
    </tr>
         <?php 
	 
	
	 foreach($DC['delivery_challan'] as $value )
    { 
	//echo "<pre>";
	//print_r($value);
    ?>    
      <tr>
       <td><div align="left"></div></td>
        <td><div align="left"><?php echo $value['delivery_challan_item_code'];?></div></td>
        <td><div align="left"><?php echo ($value['delivery_challan_item_name']);?></div></td>
    	<td><div align="left"><?php echo ($value['delivery_challan_order_qty']);?></div></td>
        <td><div align="left"><?php echo ($value['uom_name']);?></div></td>
    	<td><div align="left"><?php echo $value['delivery_challan_delivered_qty']?></div></td>
        <td><div align="left"><?php echo $value['delivery_challan_pending_qty']?></div></td>
    </tr>
	<?php
    }
	}
	?>
</table>
