<table id="tblList">
				<tr style="font-weight:bold">
				<td>Sno</td>				
				<td>Invoice No</td>
				<td>Customer Name</td>
				<td>Incentive Amount</td>	
				
				
				       
				</tr>
                
				
               <?php 
			   //echo "<pre>"; print_r($incentive_item); exit;
			   if(!empty($incentive_item)) 
					{ 
					
					$itemcount = 1; 
					foreach($incentive_item as $ITEMS) 
					{ 
					if($ITEMS['USR_INCENTIVE_AMT'] != 0.00)
					{
					?>
					<tr>
					 <td>
					<?php echo $itemcount;  ?>
                    </td>
                    <td>
					<?php if(isset($ITEMS['SO_NO'])) { echo $ITEMS['SO_NO']; } ?>
                    </td>
                    
                   
                     <td>
					<?php if(isset($ITEMS['ofcr_name'])) { echo $ITEMS['ofcr_name'].' '.$ITEMS['ofcr_name2']; } ?>
                   </td>
                   
				  <td>
   				 <?php if(isset($ITEMS['USR_INCENTIVE_AMT'])) { echo $ITEMS['USR_INCENTIVE_AMT']; } ?>
    		       </td>
                
					
                  
                
                 
    
                 </tr>
					<?php $itemcount++; } } } ?>
				</table>