<?php
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Material_Pending_Report_'.date('d-M-Y').'.xls"');
header("Pragma: no-cache");
header("Expires: 0");    
?>

<table cellspacing="0" cellpadding="0" border="1" width="100%" >
  <tr>
    <td colspan="9" bgcolor="#b1ad78" >
    <div align="center"><strong>Material Pending Report</strong></div></td>
  </tr>
  <tr>
    <td colspan="5" bgcolor="#94CCAA" >
    <div align="left"><strong>From Date : <?php echo date('d-m-Y', strtotime($report_from));?> </strong></div></td>
    <td colspan="4" bgcolor="#94CCAA">
    <div align="left"><strong>To Date :  <?php echo date('d-m-Y', strtotime($report_to));?></strong></div></td>
  </tr>
   
  <tr bgcolor="#CCCCCC">
    <td width="20%" bgcolor="#bcbcbc"><div align="left">PO No.</div></td>
    <td width="20%" bgcolor="#bcbcbc"><div align="left">PO Date.</div></td>
    <td width="20%" bgcolor="#bcbcbc"><div align="left">Party Name</div></td>
    <td width="20%" bgcolor="#bcbcbc"><div align="left">Material Name</div></td>
    <td width="20%" bgcolor="#bcbcbc"><div align="left">HSN</div></td>
    <td width="20%" bgcolor="#bcbcbc"><div align="left">UOM</div></td>
    <td width="20%" bgcolor="#bcbcbc"><div align="left">Ordered Qty</div></td>
    <td width="20%" bgcolor="#bcbcbc"><div align="left">Received Qty</div></td>
     <td width="20%" bgcolor="#bcbcbc"><div align="left">Pending Qty</div></td>
   </tr>
    <?php
	foreach($po_list as $POI) {
		/*if(($POI['po_items_ord_qty'] - $POI['po_items_qty']) != 0)
								{*/
		?>
  <tr>
    <td><div align="left"><?php echo $POI['po_po_no'];?></div></td>
     <td><div align="left"><?php echo date('d-m-Y', strtotime($POI['po_trans_date']));?></div></td>
       <td><div align="left"><?php echo $POI['vendor_name'];?></div></td>
        <td><div align="left"><?php echo $POI['po_items_name'];?></div></td>
       <td><div align="left"><?php echo $POI['po_items_hsn_sac'];?></div></td>
        <td><div align="left"><?php echo $POI['uom_name'];?></div></td>
       <td><div align="left"><?php echo $POI['po_items_ord_qty'];?></div></td>
       <td align="right"><div align="right"><?php echo $POI['po_items_ord_qty'] - $POI['po_items_qty'];?></div></td>
       <td><div align="left"><?php echo $POI['po_items_qty'];?></div></td>
       
      
     </tr>
  <?php 
	}?>
</table>
