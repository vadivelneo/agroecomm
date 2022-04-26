<?php
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="salessummary_'.date('d-M-Y').'.xls"');
header("Pragma: no-cache");
header("Expires: 0");    
?>
<table cellspacing="1" cellpadding="1" border="1" width="100%">
    <tr>
    	<td colspan="6" bgcolor="#b1ad78" >
    		<div align="center"><strong>Sales Incentive Report</strong></div>
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
    <?php
$i = 1;	
	foreach($invoice_list as $SI)
    { 
    ?>
    <tr>
		<td width="5%"  bgcolor="#99FFFF"><div align="left"><b>Sno</b></div></td>
    	<td width="5%"  bgcolor="#99FFFF"><div align="left"><b>Date</b></div></td>
        <td width="10%"  bgcolor="#99FFFF"><div align="left"><b>Officer Name</b></div></td>
    	<td width="25%"  bgcolor="#99FFFF"><div align="left"><b>Officer ID</b></div></td>
		<td width="25%"  bgcolor="#99FFFF"><div align="left"><b>Sponsor ID</b></div></td>
        <td width="15%"  bgcolor="#99FFFF"><div align="right"><b>Incentive Value</b></div></td>
    	
    </tr>
    
    <tr style="font-weight:bold;">
	<td><div align="left"><?php echo $i;?></div></td>
    	<td>
        	<div align="left">
				<?php 
					 
						echo date('d-M-Y');
					
				?>
			</div>
        </td>
    	<td><div align="left"><?php echo $SI['OFCR_NAME'];?></div></td>
        <td align="right"><div align="right"><?php echo $SI['OFCR_USR_VALUE'];?></div></td>
		 <td align="right"><div align="right"><?php echo $SI['OFCR_TRE_SPNCR_ID'];?></div></td>
    	<td><div align="right"><?php echo $SI['incentive_amt'] - $SI['redeem_amt']?></div></td>
    </tr>
     <tr>
    	<td width="5%"  bgcolor="#33FFCC"><div align="left"><b>SO NO</b></div></td>
        <td width="30%"  bgcolor="#33FFCC"><div align="right"><b>Customer Name</b></div></td>
        <td width="15%"  bgcolor="#33FFCC"><div align="right"><b>Incentive Amount</b></div></td>
    	<td width="5%"  bgcolor="#33FFCC"><div align="left"><b>Redeem Amount</b></div></td>
       <td width="5%"  bgcolor="#33FFCC"><div align="left"><b></b></div></td>
	   <td width="5%"  bgcolor="#33FFCC"><div align="left"><b></b></div></td>
    </tr>
     <?php 
	 
	
	 foreach($SI['invoice_summary'] as $value )
    { 
	//echo "<pre>";
	//print_r($value);
    ?>
    <tr>
        <td align="right"><div align="right"><?php echo $value['SO_NO'];?></div></td>
        <td align="right"><div align="right"><?php echo $value['OFCR_FST_NME'].' '.$value['OFCR_LST_NME'];?></div></td>
        <td align="right"><div align="right"><?php echo $value['USR_INCENTIVE_AMT'];?></div></td>
        <td align="right"><div align="right"><?php echo $value['USR_REDEEM_AMT'];?></div></td>
		 <td align="right"><div align="right"><?php echo '';?></div></td>
		  <td align="right"><div align="right"><?php echo '';?></div></td>
       
    </tr>
	<?php
    }
	$i++;
	}
	?>
</table>
