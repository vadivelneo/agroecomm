<?php
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="sales_collection_'.date('d-M-Y').'.xls"');
header("Pragma: no-cache");
header("Expires: 0");    
?>
<table cellspacing="1" cellpadding="1" border="1" width="100%">
    <tr>
    	<td colspan="6" bgcolor="#b1ad78" >
    		<div align="center"><strong>Sales Collection Report</strong></div>
        </td>
    </tr>
    <tr>
    	<td colspan="3" bgcolor="#c9ff93" >
    		<div align="left"><strong>From Date : <?php echo date('d-M-Y', strtotime($report_from));?> </strong></div>
        </td>
    	<td colspan="3" bgcolor="#c9ff93">
    		<div align="left"><strong>To Date :  <?php echo date('d-M-Y', strtotime($report_to));?></strong></div>
        </td>
    </tr>
    <?php foreach($invoice_list as $SI)
    { 
    ?>
    <tr>
    	<td width="5%"  bgcolor="#CD853F"><div align="left"><b>Sales Invoice no.</b></div></td>
        <td width="10%"  bgcolor="#CD853F"><div align="left"><b>Invoice Date</b></div></td>
    	<td width="25%"  bgcolor="#CD853F"><div align="left"><b>Customer Name</b></div></td>
        <td width="15%"  bgcolor="#CD853F"><div align="left"><b>Invoice Amount</b></div></td>
        <td width="30%"  bgcolor="#CD853F"><div align="right"><b>Collection Amount</b></div></td>
        <td width="15%"  bgcolor="#CD853F"><div align="right"><b>Due Amount</b></div></td>
    </tr>
    
    <tr>
    	
    	<td><div align="left"><?php echo $SI['sale_invoice_no'];?></div></td>
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
    	<td><div align="left"><?php echo ucfirst($SI['customer_name']);?></div></td>
        <td align="right"><div align="right"><?php echo $SI['invoice_payment_invoice_amount'];?></div></td>
        <td align="right"><div align="right"><?php echo $SI['invoice_payment_paid_amount'];?></div></td>
        <td align="right"><div align="right"><?php echo $SI['invoice_payment_due_amount'];?></div></td>
    </tr>
    <tr>
<td width="5%"  ><div align="left"><b></b></div></td>
    	<td width="5%"  bgcolor="#33FFCC"><div align="left"><b>Invoice No</b></div></td>
        <td width="10%"  bgcolor="#33FFCC"><div align="left"><b>Receipt No</b></div></td>
    	<td width="25%"  bgcolor="#33FFCC"><div align="left"><b>Adjust Amount</b></div></td>
        <td width="30%"  bgcolor="#33FFCC"><div align="right"><b>Receipt Date</b></div></td>
        </tr>
        
        <?php 
		if(!empty($SI['receipt']))
		{
        foreach($SI['receipt'] as $value )
    { 
	//echo "<pre>";
	//print_r($value);
    ?>
    <tr>
    	<td align="right"><div align="right"></div></td>
        <td align="right"><div align="right"><?php echo $value['sale_invoice_company_invoice_no'];?></div></td>
        <td align="right"><div align="right"><?php echo $value['invoice_receipt_number'];?></div></td>
        <td align="right"><div align="right"><?php echo $value['amount'];?></div></td>
        <td align="right"><div align="right">
		<?php 
					if(($value['invoice_receipt_date']) != '0000-00-00' && $value['invoice_receipt_date'] != '' && $value['invoice_receipt_date'] != NULL)
					{ 
						echo date('d-M-Y', strtotime($value['invoice_receipt_date']));
					}
					else
					{
						echo "-";
					}
				?></div></td>
        
    	
    </tr>
	<?php
    }
		}else
	{ ?>
    <tr>
    <td align="right"><div align="right"></div></td>
        <td align="right"><div align="right"><?php echo "-";?></div></td>
        <td align="right"><div align="right"><?php echo "-";?></div></td>
        <td align="right"><div align="right"><?php echo "-"; ?></div></td>
        <td align="right"><div align="right"><?php echo "-"; ?></div></td>
    
    </tr>
		<?php
	}
	}
	?>
    <tr>
        <td width="5%"><div align="left"><b></b></div></td>
        <td width="5%"><div align="left"><b></b></div></td>
        <td width="5%"><div align="left"><b></b></div></td>
    	<td width="10%"  bgcolor="#33FFCC"><div align="left"><b>Total Invoice Amount</b></div></td>
        <td  width="10%" bgcolor="#33FFCC"><div align="left"><b>Total Collection Amount</b></div></td>
    	<td  width="10%" bgcolor="#33FFCC"><div align="left"><b>Total Due Amount</b></div></td>
        
        </tr>
     <tr>
								<td style="text-align:center;"></td>
                                <td style="text-align:center;"></td>
                                <td style="text-align:center;"></td>
                                 <td style="text-align:right;"><?php echo $total_values->INV_AMT;?></td>
                                <td style="text-align:right;"><?php echo $total_values->INV_PAID_AMT;?></td>
                                <td style="text-align:right;"><?php echo $total_values->INV_DUE_AMT;?></td>
							</tr>
</table>
