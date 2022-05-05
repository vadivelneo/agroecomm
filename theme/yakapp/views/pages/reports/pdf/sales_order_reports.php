<?php
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="sales-order-report_'.date('d-M-Y').'.xls"');
header("Pragma: no-cache");
header("Expires: 0");    
?>
<table cellspacing="1" cellpadding="1" border="1" width="100%">
    <tr>
    	<td colspan="9" bgcolor="#b1ad78" >
    		<div align="center"><strong>Case Details Report</strong></div>
        </td>
    </tr>
    <tr>
    	<td colspan="5" bgcolor="#c9ff93" >
    		<div align="left"><strong>From Date : <?php echo date('d-M-Y', strtotime($report_from));?> </strong></div>
        </td>
    	<td colspan="4" bgcolor="#c9ff93">
    		<div align="left"><strong>To Date :  <?php echo date('d-M-Y', strtotime($report_to));?></strong></div>
        </td>
    </tr>
    <tr>
    	<td width="5%"  bgcolor="#bcbcbc"><div align="left"><b>Created date</b></div></td>
        <td width="10%"  bgcolor="#bcbcbc"><div align="left"><b>Sales Order No</b></div></td>
    	<td width="25%"  bgcolor="#bcbcbc"><div align="left"><b>Customer Name</b></div></td>
        <td width="30%"  bgcolor="#bcbcbc"><div align="right"><b>Gross Amount</b></div></td>
        <td width="15%"  bgcolor="#bcbcbc"><div align="right"><b>Discount Amount</b></div></td>
        <?php if($tax_value != 'nontaxable') { ?>
        <td width="15%"  bgcolor="#bcbcbc"><div align="right"><b>Tax Amount</b></div></td>
        <?php } ?>
    	<td width="30%"  bgcolor="#bcbcbc"><div align="right"><b>Net Amount</b></div></td>
        <!--<td width="10%"  bgcolor="#bcbcbc"><div align="left"><b>Region</b></div></td>
        <td width="10%"  bgcolor="#bcbcbc"><div align="left"><b>Zone</b></div></td>
        <td width="10%"  bgcolor="#bcbcbc"><div align="left"><b>Area</b></div></td>-->
    	<td width="5%"  bgcolor="#bcbcbc"><div align="left"><b>Status</b></div></td>
    </tr>
    <?php foreach($so_list as $SO)
    { 
    ?>
    <tr>
    	<td>
        	<div align="left">
				<?php 
					if(($SO['sales_order_add_date']) != '0000-00-00' && $SO['sales_order_add_date'] != '' && $SO['sales_order_add_date'] != NULL)
					{ 
						echo date('d-M-Y', strtotime($SO['sales_order_add_date']));
					}
					else
					{
						echo "-";
					}
				?>
			</div>
        </td>
        <td><div align="left"><?php echo $SO['sales_order_number'];?></div></td>
    	<td><div align="left"><?php echo ucfirst($SO['customer_name']);?></div></td>
        <td align="right"><div align="right"><?php echo $SO['so_total_gross_amount'];?></div></td>
        <td align="right"><div align="right"><?php echo $SO['so_total_discount_amount'];?></div></td>
        <?php if($tax_value != 'nontaxable') { ?>
        <td align="right"><div align="right"><?php echo $SO['so_total_tax_amount'];?></div></td>
        <?php } ?>
        <td align="right"><div align="right"><?php echo $SO['so_grand_total'];?></div></td>
        <?php /*?><td><div align="left"><?php echo ucfirst($SO['region_name']);?></div></td>
        <td><div align="left"><?php echo ucfirst($SO['zone_name']);?></div></td>
        <td><div align="left"><?php echo ucfirst($SO['area_name']);?></div></td><?php */?>
    	<td><div align="left"><?php echo $SO['sales_order_status']?></div></td>
    </tr>
	<?php
    }
	?>
</table>
