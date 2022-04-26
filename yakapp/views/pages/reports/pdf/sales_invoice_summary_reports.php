<?php
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="salessummary_'.date('d-M-Y').'.xls"');
header("Pragma: no-cache");
header("Expires: 0");    
?>
<table cellspacing="1" cellpadding="1" border="1" width="100%">
    <tr>
    	<td colspan="9" bgcolor="#b1ad78" >
    		<div align="center"><strong>Sales Summary Report</strong></div>
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
    <?php foreach($invoice_list as $SI)
    { 
    ?>
    <tr>
    	<td width="5%"  bgcolor="#99FFFF"><div align="left"><b>Created date</b></div></td>
        <td width="10%"  bgcolor="#99FFFF"><div align="left"><b>Sales Invoice No</b></div></td>
        <!--<td width="10%"  bgcolor="#bcbcbc"><div align="left"><b>Sales Order No</b></div></td>-->
    	<td width="25%"  bgcolor="#99FFFF"><div align="left"><b>Customer Name</b></div></td>
        <td width="20%"  bgcolor="#99FFFF"><div align="left"><b>Sales Representative</b></div></td>
        <td width="30%"  bgcolor="#99FFFF"><div align="right"><b>Gross Amount</b></div></td>
        <td width="15%"  bgcolor="#99FFFF"><div align="right"><b>Discount Amount</b></div></td>
         <?php if($tax_value != 'nontaxable') { ?>
        <td width="15%"  bgcolor="#99FFFF"><div align="right"><b>Tax Amount</b></div></td>
         <?php } ?>
    	<td width="30%"  bgcolor="#99FFFF"><div align="right"><b>Net Amount</b></div></td>
        <!--<td width="10%"  bgcolor="#bcbcbc"><div align="left"><b>Region</b></div></td>
        <td width="10%"  bgcolor="#bcbcbc"><div align="left"><b>Zone</b></div></td>
        <td width="10%"  bgcolor="#bcbcbc"><div align="left"><b>Area</b></div></td>-->
    	<td width="5%"  bgcolor="#99FFFF"><div align="left"><b>Status</b></div></td>
    <!--     <td width="5%"  bgcolor="#99FFFF"><div align="left"></div></td>
       <td width="5%"  bgcolor="#99FFFF"><div align="left"></div></td>
        <td width="5%"  bgcolor="#99FFFF"><div align="left"></div></td>
        <td width="5%"  bgcolor="#99FFFF"><div align="left"></div></td>-->
    </tr>
    
    <tr style="font-weight:bold;">
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
    	<td><div align="left"><?php echo $SI['sale_invoice_no'];?></div></td>
        <?php /*?><td><div align="left"><?php echo $SI['sales_order_number'];?></div></td><?php */?>
    	<td><div align="left"><?php echo ucfirst($SI['customer_name']);?></div></td>
        <td><div align="left"><?php echo ucfirst($SI['designation_user_name']);?></div></td>
        <td align="right"><div align="right"><?php echo $SI['sale_invoice_gross_amount'];?></div></td>
        <td align="right"><div align="right"><?php echo $SI['sale_invoice_discount_amount'];?></div></td>
         <?php if($tax_value != 'nontaxable') { ?>
        <td align="right"><div align="right"><?php echo $SI['sale_invoice_tax_amount'];?></div></td>
         <?php } ?>
        <td align="right"><div align="right"><?php echo $SI['sale_invoice_grand_total'];?></div></td>
        <?php /*?><td><div align="left"><?php echo ucfirst($SI['region_name']);?></div></td>
        <td><div align="left"><?php echo ucfirst($SI['zone_name']);?></div></td>
        <td><div align="left"><?php echo ucfirst($SI['area_name']);?></div></td><?php */?>
    	<td><div align="left"><?php echo $SI['sale_invoice_status']?></div></td>
    </tr>
     <tr>
       <!-- <td width="5%"  ><div align="left"><b></b></div></td>-->
    	<td width="5%"  bgcolor="#33FFCC"><div align="left"><b>Item Code</b></div></td>
        <td width="10%"  bgcolor="#33FFCC"><div align="left"><b>Part No</b></div></td>
    	<td width="35%"  bgcolor="#33FFCC"><div align="left"><b>Item Description</b></div></td>
        <td width="30%"  bgcolor="#33FFCC"><div align="right"><b>UOM</b></div></td>
        <td width="15%"  bgcolor="#33FFCC"><div align="right"><b>Price/unit</b></div></td>
        <td width="15%"  bgcolor="#33FFCC"><div align="right"><b>Quantity</b></div></td>
    	
    	<td width="5%"  bgcolor="#33FFCC"><div align="left"><b>Discount(%)</b></div></td>
        <!--<td width="5%"  bgcolor="#33FFCC"><div align="left"><b>Discount Amount</b></div></td>-->
        <td width="10%"  bgcolor="#33FFCC"><div align="left"><b>TAX(%)</b></div></td>
<!--        <td width="5%"  bgcolor="#33FFCC"><div align="left"><b>TAX Amount</b></div></td>
        <td width="5%"  bgcolor="#33FFCC"><div align="left"><b>Net Amount</b></div></td>-->
        <td width="30%"  bgcolor="#33FFCC"><div align="right"><b>Gross Amount</b></div></td>
    </tr>
     <?php 
	 
	
	 foreach($SI['invoice_summary'] as $value )
    { 
	//echo "<pre>";
	//print_r($value);
    ?>
    <tr>
    	<!--<td align="right"><div align="right"></div></td>-->
        <td align="right"><div align="right"><?php echo $value['sale_invoice_item_code'];?></div></td>
        <td align="right"><div align="right"><?php echo $value['sale_invoice_item_model'];?></div></td>
        <td align="right"><div align="right"><?php echo $value['sale_invoice_item_name'];?></div></td>
        <td align="right"><div align="right"><?php echo $value['uom_name'];?></div></td>
        <td align="right"><div align="right"><?php echo $value['sale_invoice_item_priceperunit'];?></div></td>
        <td align="right"><div align="right"><?php echo $value['sale_invoice_item_qty'];?></div></td>
       
        <td align="right"><div align="right"><?php echo $value['sale_invoice_item_discounts_percentage'];?></div></td>
        <?php /*?><td align="right"><div align="right"><?php echo $value['sale_invoice_item_discounts_amount'];?></div></td><?php */?>
        <td align="right"><div align="right"><?php echo $value['sale_invoice_item_tax_percent'];?></div></td>
<?php /*?>        <td align="right"><div align="right"><?php echo $value['sale_invoice_item_tax_amount'];?></div></td>
        <td align="right"><div align="right"><?php echo $value['sale_invoice_item_net_amount'];?></div></td><?php */?>
    	 <td align="right"><div align="right"><?php echo $value['sale_invoice_item_gross_amount'];?></div></td>
    </tr>
	<?php
    }
	}
	?>
</table>
