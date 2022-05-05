<?php
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="stock_ledger'.date('d-M-Y').'.xls"');
header("Pragma: no-cache");
header("Expires: 0");    
?>

<table cellspacing="0" cellpadding="0" border="1" width="100%" >
  <tr>
    <td colspan="6" bgcolor="#b1ad78" >
    <div align="center"><strong>Stock Report</strong></div></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#94CCAA" >
    <div align="left"><strong>From Date : <?php echo date('d-m-Y', strtotime($report_from));?> </strong></div></td>
    <td colspan="3" bgcolor="#94CCAA">
    <div align="left"><strong>To Date :  <?php echo date('d-m-Y', strtotime($report_to));?></strong></div></td>
  </tr>
   
  <tr bgcolor="#CCCCCC">
    <td width="20%" bgcolor="#bcbcbc"><div align="left">Material Name</div></td>
    <td width="20%" bgcolor="#bcbcbc"><div align="left">Division Name</div></td>
    <td width="20%" bgcolor="#bcbcbc"><div align="left">UOM</div></td>
    <td width="20%" bgcolor="#bcbcbc"><div align="left">Received Qty</div></td>
     <td width="20%" bgcolor="#bcbcbc"><div align="left">Issued Qty</div></td>
     <td width="20%" bgcolor="#bcbcbc"><div align="left">Available Qty</div></td>
   </tr>
    <?php
	foreach($stock_list as $SO) {?>
  <tr>
     <td><div align="left"><?php echo  ucfirst($SO['product_name']);?></div></td>
        <td><div align="left"><?php echo $SO['division_name'];?></div></td>
       <td><div align="left"><?php echo $SO['uom_name'];?></div></td>
       <td align="right"><div align="right"><?php echo $SO['inventory_received_qty'];?></div></td>
       <td align="right"><div align="right"><?php echo $SO['inventory_received_qty'];?></div></td>
       <td align="right"><div align="right"><?php echo $SO['inventory_qty'];?></div></td>
     </tr>
  <?php }?>
</table>
