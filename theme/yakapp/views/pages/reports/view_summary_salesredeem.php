<table id="tblList">
				<tr style="font-weight:bold">
				<td>Sno</td>				
				<td>Receipt No</td>
				<td>Customer Name</td>
				<td>Redeem Amount</td>	
				
				
				       
				</tr>
                
				
               <?php 
			   //echo "<pre>"; print_r($incentive_item); exit; 
			   if(!empty($incentive_item)) 
					{ 
					
					$itemcount = 1; 
					foreach($incentive_item as $ITEMS) 
					{ 
					if($ITEMS['USR_REDEEM_AMT'] !=0) {
					?>
					<tr>
					 <td>
					<?php echo $itemcount;  ?>
                    </td>
                    <td>
					<?php if(isset($ITEMS['SO_NO'])) { echo $ITEMS['SO_NO']; } ?>
                    </td>
                    
                   
                     <td>
					<?php if(isset($ITEMS['OFCR_FST_NME'])) { echo $ITEMS['OFCR_FST_NME'].' '.$ITEMS['OFCR_LST_NME']; } ?>
                   </td>
                   
				  <td>
   				 <?php if(isset($ITEMS['USR_REDEEM_AMT'])) { echo $ITEMS['USR_REDEEM_AMT']; } ?>
    		       </td>
                
					
                  
                
                 
    
                 </tr>
					<?php $itemcount++; } } } ?>
				</table>