<table id="tblList">
				<thead>
				<tr>	
				<th>SKU</th>
                <th>Material Id</th>	
				<th>Material Name</th>
				<th>HSN/SAC</th>
				<!--<th>GR Number</th>-->
                <th>Control No</th>	
                <th>Batch No</th>
               				
                <th>Expiry Date</th>
                <th>Current Stock</th>	
                <th>Added Date</th>	
				
				
				</tr>
				</thead>
				<tbody id="disp_items">
				  
          <?php if(!empty($inventory_stock)) { $itemcount = 1; foreach($inventory_stock as $ITEMS) {
			  
			 // echo "<pre>";
			//  print_r($inventory_stock);
			   ?>
                        <tr>
                            <td>
                            <?php if(isset($ITEMS['product_mfr_part_number'])) { echo $ITEMS['product_mfr_part_number']; } ?>
                            <input name="item_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_indent_item_item_id'])) { echo $ITEMS['po_indent_item_item_id']; } ?>" type="hidden" />
                            <input name="item_code[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_mfr_part_number'])) { echo $ITEMS['product_mfr_part_number']; } ?>" type="hidden" />
                            </td>
                              <td>
                            <?php if(isset($ITEMS['inventory_id'])) { echo $ITEMS['inventory_id']; } ?>
                            
                            </td>
                            <td>
                            <?php if(isset($ITEMS['product_name'])) { echo $ITEMS['product_name']; } ?>
                            <input name="item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_name'])) { echo $ITEMS['product_name']; } ?>" type="hidden" />
                            </td>
							
							
							<td>
                            <?php if(isset($ITEMS['product_hsn_sac'])) { echo $ITEMS['product_hsn_sac']; } ?>
                            <input name="item_name_hsn_san[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_hsn_sac'])) { echo $ITEMS['product_hsn_sac']; } ?>" type="hidden" />
                            </td>
                           

						  
							                          
                           
                            <td>
                           
                           <?php if(isset($ITEMS['inventory_control_no'])) { echo $ITEMS['inventory_control_no'];  } ?> 
                            <input id="received_qty_<?php echo $itemcount; ?>" onblur="return closeQuantityBox('<?php echo $itemcount; ?>');" name="received_qty[<?php echo $itemcount; ?>]" type="hidden" onkeyup="return onkeyupfortotal(<?php echo $itemcount; ?>)" value="<?php if(isset($ITEMS['inventory_control_no'])) { echo $ITEMS['inventory_control_no']; } ?>" class="quantity" />
                            </td>
                            <td>
                           <?php if(isset($ITEMS['inventory_batch_no'])) { echo $ITEMS['inventory_batch_no'];  } ?> 
                            <input id="pending_qty_<?php echo $itemcount; ?>" name="pending_qty[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['inventory_batch_no'])) { echo $ITEMS['inventory_batch_no']; } ?>" />
                            </td>
							                  
							 <td>
							<?php if(($ITEMS['inventory_expiry_date']) != '0000-00-00' && $ITEMS['inventory_expiry_date'] != '1970-01-01' && $ITEMS['inventory_expiry_date'] != NULL) { ?>
                	<?php echo date('d-m-Y', strtotime($ITEMS['inventory_expiry_date'])); ?>
                <?php } else { ?>
                	-
				 <?php } ?> 
                            <input id="pending_qty_<?php echo $itemcount; ?>" name="pending_qty[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['inventory_expiry_date'])) { echo $ITEMS['inventory_expiry_date']; } ?>" />
                            </td>
							<td>
                           <?php if(isset($ITEMS['inventory_qty'])) { echo $ITEMS['inventory_qty'];  } ?> 
                            <input id="ordered_qty_<?php echo $itemcount; ?>" name="ordered_qty[<?php echo $itemcount; ?>]" type="hidden" onkeyup="return onkeyupfortotal(<?php echo $itemcount; ?>)" value="<?php if(isset($ITEMS['inventory_qty'])) { echo $ITEMS['inventory_qty']; } ?>" />
                            </td>
							
							<td>
							<?php if(($ITEMS['inventory_add_date'])!= "0000-00-00") { echo date('d-m-Y', strtotime($ITEMS['inventory_add_date'])); } ?>
                           <?php //if(isset($ITEMS['inventory_add_date'])) { echo $ITEMS['inventory_add_date'];  } ?> 
                            <input id="ordered_qty_<?php echo $itemcount; ?>" name="ordered_qty[<?php echo $itemcount; ?>]" type="hidden" onkeyup="return onkeyupfortotal(<?php echo $itemcount; ?>)" value="<?php if(isset($ITEMS['inventory_add_date'])) { echo $ITEMS['inventory_add_date']; } ?>" />
                            </td>
                              
                        </tr>
                         <?php $itemcount++; } } ?>

				</tbody>
				</table>