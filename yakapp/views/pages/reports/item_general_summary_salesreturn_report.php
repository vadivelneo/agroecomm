<?php
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="itemwise_salesreturn_report_'.date('d-M-Y').'.xls"');
header("Pragma: no-cache");
header("Expires: 0");    
?>
<table >
         
            <tbody>
             <tr>
    	<td colspan="7" bgcolor="#b1ad78" >
    		<div align="center"><strong>Itemwise Report</strong></div>
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
              <?php
		error_reporting(0);
		if(!empty($sales_item_list)) {
			$i = 1;
			
					$plotArr=array(); 
					$plotTotArr=array(); 
					$plotColArr=array();

		 foreach($sales_item_list['item_details'] as $ITM) { 
		 
					$product_name=$ITM["sale_invoice_item_model"];
					$emp_name=$ITM["customer_name"];
					$sum_qty=$ITM["sum_qty"];
					
					$plotColArr[$product_name]=$product_name;
					$plotArr[$emp_name][$product_name]=$sum_qty;
					$plotTotArr[$product_name]+=$sum_qty;
		 
		 ?>
               <?php $i++;}} else{?>
              
             
              <?php }?>
              
               <table width="100%" border="1" cellspacing="0" cellpadding="">
  <tr>
    <td style="font-weight:bold">Sno</td>
	<td style="font-weight:bold">Customer Name</td> 
	<?php foreach($plotColArr as $plotColKey=>$plotColVal){ ?>
    <td style="font-weight:bold"><?php echo $plotColVal;?></td>
	<?php } // Column loop end ?> 
  </tr> <!-- Header row end -->
  
  <?php 
  $sno=0;
  foreach($plotArr as $plotKey=>$plotVal)
  {
  	$sno++;
   ?>
  <tr>
    <td><?php echo $sno;?></td>
	<td><?php echo $plotKey;?></td> 
	<?php foreach($plotColArr as $plotColKey=>$plotColVal){ ?>
    <td><?php if($plotVal[$plotColKey]) { echo $plotVal[$plotColKey]; } else { echo 0; }?></td>
	<?php } // Column loop end  ?> 
  </tr>
  <?php } // Row loop end ?> 
  
  
  <!-- TOTAL --> 
  <tr>
    <td>&nbsp;</td>
	<td style="font-weight:bold">TOTAL</td> 
	<?php foreach($plotColArr as $plotColKey=>$plotColVal){ ?>
    <td style="font-weight:bold"><?php echo $plotTotArr[$plotColKey]; ?></td>
	<?php } // Column loop end  ?> 
  </tr> 
</table>
               
             
              
               </tr>

              
               
                
                 
            </tbody>
          </table>
