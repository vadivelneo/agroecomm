<?php
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="salesreturn_'.date('d-M-Y').'.xls"');
header("Pragma: no-cache");
header("Expires: 0");    
?>
<table cellspacing="1" cellpadding="1" border="1" width="100%">
    <tr>
    	<td colspan="7" bgcolor="#b1ad78" >
    		<div align="center"><strong>Sales Return Report</strong></div>
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
    	<td width="5%"  bgcolor="#bcbcbc"><div align="left"><b>Created date</b></div></td>
        <td width="10%"  bgcolor="#bcbcbc"><div align="left"><b>Sales Return No</b></div></td>
        <?php if($sess_user_group == '1') { ?>
        <td width="10%"  bgcolor="#bcbcbc"><div align="left"><b>Region</b></div></td>
        <?php } ?>
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
    	
    </tr>
    <?php foreach($invoice_list as $SI)
    { 
    ?>
    <tr>
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
       	<?php if($sess_user_group == '1') { ?>
        <td><div align="left"><?php echo $SI['region_name'];?></div></td>
        <?php } ?>
    	<td><div align="left"><?php echo ucfirst($SI['customer_name']);?></div></td>
        
        <td align="right"><div align="right"><?php echo $SI['sale_invoice_gross_amount'];?></div></td>
        <td align="right"><div align="right"><?php echo $SI['sale_invoice_discount_amount'];?></div></td>
         <?php if($tax_value != 'nontaxable') { ?>
        <td align="right"><div align="right"><?php echo $SI['sale_invoice_tax_amount'];?></div></td>
         <?php } ?>
        <td align="right"><div align="right"><?php echo $SI['sale_invoice_grand_total'];?></div></td>
        <?php /*?><td><div align="left"><?php echo ucfirst($SI['region_name']);?></div></td>
        <td><div align="left"><?php echo ucfirst($SI['zone_name']);?></div></td>
        <td><div align="left"><?php echo ucfirst($SI['area_name']);?></div></td><?php */?>
    	
    </tr>
	<?php
    }
	?>
</table>
