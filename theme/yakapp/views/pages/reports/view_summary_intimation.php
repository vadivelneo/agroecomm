<table id="tblList">
				<tr style="font-weight:bold">	
				<th>Sno</th>
                <th>SKU</th>
                <th>Material</th>
                <th>Brand</th>
                <th>UOM</th>
                <th>Control No</th>
                <th>Batch No</th>
				<th>Expiry Date</th>	
                <th>Qty Received</th>
				<th>GRN</th>
				<th>Party Name</th>
				<th>Party Invoice</th>
							
				</tr>
                
				
               <?php if(!empty($invoice_item)) 
					{ 
					
					$itemcount = 1; 
					foreach($invoice_item as $ITEMS) 
					{ 
					?>
					<tr>
					 <td>
					<?php echo $itemcount++;  ?>
                    </td>
					
					 <td>
					<?php if(isset($ITEMS['si_items_hsn_sac'])) { echo $ITEMS['si_items_hsn_sac']; } ?>
                    <input name="items_hsn_sac[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['si_items_hsn_sac'])) { echo $ITEMS['si_items_hsn_sac']; } ?>" type="hidden" />
                    </td>
                    <td>
					<?php if(isset($ITEMS['qm_intin_item_item_name'])) { echo $ITEMS['qm_intin_item_item_name']; } ?>
                    <input name="items_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['qm_intin_item_item_name'])) { echo $ITEMS['qm_intin_item_item_name']; } ?>" type="hidden" /> 
                    </td>
					
					  <td>
					<?php if(isset($ITEMS['qm_intin_brand'])) { echo $ITEMS['qm_intin_brand']; } ?>
                    <input name="items_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['qm_intin_brand'])) { echo $ITEMS['qm_intin_brand']; } ?>" type="hidden" /> 
                    </td>
                     <td>
					<?php if(isset($ITEMS['uom_name'])) { echo $ITEMS['uom_name']; } ?>
                    <input name="items_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['uom_name'])) { echo $ITEMS['uom_name']; } ?>" type="hidden" /> 
                    </td>
					 <td>
					<?php if(isset($ITEMS['qm_intin_item_control_no'])) { echo $ITEMS['qm_intin_item_control_no']; } ?>
                    <input name="items_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['qm_intin_item_control_no'])) { echo $ITEMS['qm_intin_item_control_no']; } ?>" type="hidden" /> 
                    </td>
					 <td>
					<?php if(isset($ITEMS['qm_intin_item_batch_no'])) { echo $ITEMS['qm_intin_item_batch_no']; } ?>
                    <input name="items_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['qm_intin_item_batch_no'])) { echo $ITEMS['qm_intin_item_batch_no']; } ?>" type="hidden" /> 
                    </td>
					 <td>
					<?php if(isset($ITEMS['qm_intin_expiry_date'])) { echo $ITEMS['qm_intin_expiry_date']; } ?>
                    <input name="items_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['qm_intin_expiry_date'])) { echo $ITEMS['qm_intin_expiry_date']; } ?>" type="hidden" /> 
                    </td>
					 <td>
					<?php if(isset($ITEMS['qm_intin_received_qty'])) { echo $ITEMS['qm_intin_received_qty']; } ?>
                    <input name="items_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['qm_intin_received_qty'])) { echo $ITEMS['qm_intin_received_qty']; } ?>" type="hidden" /> 
                    </td>
					 <td>
					<?php if(isset($ITEMS['qm_intin_item_indent_no'])) { echo $ITEMS['qm_intin_item_indent_no']; } ?>
                    <input name="items_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['qm_intin_item_indent_no'])) { echo $ITEMS['qm_intin_item_indent_no']; } ?>" type="hidden" /> 
                    </td>
					 <td>
					
                    </td>
					 <td>
					 
                    </td>
					 
					
                 </tr>
                <?php $itemcount++; } } ?>
				</table>