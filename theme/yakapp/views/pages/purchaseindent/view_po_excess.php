<table id="tblList">
				<thead>
				<tr>	
				<th>Item Code</th>	
				<th>Item Description</th>
				<th>HSN/SAC</th>
				<th>Control No</th>
				<th>Batch No</th>
				<th>Expiry Date</th>
				<th>UOM</th>
				<th>Extra Qty</th>
				</tr>
				</thead>
				<tbody id="disp_items">
				  
          <?php if(!empty($edit_indent_items)) { $itemcount = 1; foreach($edit_indent_items as $ITEMS) { ?>
                        <tr>
                            <td>
                            <?php if(isset($ITEMS['po_indent_item_code'])) { echo $ITEMS['po_indent_item_code']; } ?>
                            <input name="item_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_indent_item_item_id'])) { echo $ITEMS['po_indent_item_item_id']; } ?>" type="hidden" />
                            <input name="item_code[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_indent_item_code'])) { echo $ITEMS['po_indent_item_code']; } ?>" type="hidden" />
                            </td>
                            <td>
                            <?php if(isset($ITEMS['po_indent_item_name'])) { echo $ITEMS['po_indent_item_name']; } ?>
                            <input name="item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_indent_item_name'])) { echo $ITEMS['po_indent_item_name']; } ?>" type="hidden" />
                            </td>
							
							
							<td>
                            <?php if(isset($ITEMS['po_indent_item_hsn_san'])) { echo $ITEMS['po_indent_item_hsn_san']; } ?>
                            <input name="item_name_hsn_san[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_indent_item_hsn_san'])) { echo $ITEMS['po_indent_item_hsn_san']; } ?>" type="hidden" />
                            </td>
							
							
							
							<td>
                            <?php if(isset($ITEMS['po_indent_item_control_no'])) { echo $ITEMS['po_indent_item_control_no']; } ?>
                            <input name="item_control_no[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_indent_item_control_no'])) { echo $ITEMS['po_indent_item_control_no']; } ?>" type="hidden" />
                            </td>
							
							
							<td>
                            <?php if(isset($ITEMS['po_indent_item_batch_no'])) { echo $ITEMS['po_indent_item_batch_no']; } ?>
                            <input name="item_batch_no[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_indent_item_batch_no'])) { echo $ITEMS['po_indent_item_batch_no']; } ?>" type="hidden" />
                            </td>
							
							<td>
                             <?php 
							 	if(isset($ITEMS['po_indent_item_expiry_date'])){ 
										$originalDate=$ITEMS['po_indent_item_expiry_date'];
										if($originalDate == '0000-00-00'){ echo '-'; }
										else
										{
											$newDate=date("d-m-Y", strtotime($originalDate));
											echo $newDate;
										}
										} 
							 ?>
                            <input name="item_expiry_date[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_indent_item_expiry_date'])) { echo $ITEMS['po_indent_item_expiry_date']; } ?>" type="hidden" />
                            </td>
							
							<td>
                           <?php if(isset($ITEMS['uom_name'])) { echo $ITEMS['uom_name'];  } ?> 
                           <input name="UOM_id[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['uom_id'])) { echo $ITEMS['uom_id']; } ?>" />
                           <input name="UOM_name[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['uom_name'])) { echo $ITEMS['uom_name']; } ?>" />
                           </td>
							
							
                           
							
							<td>
                           <?php if(isset($ITEMS['po_indent_extra_qty'])) { echo $ITEMS['po_indent_extra_qty'];  } ?> 
                            <input id="extra_qty<?php echo $itemcount; ?>" name="extra_qty[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['po_indent_extra_qty'])) { echo $ITEMS['po_indent_extra_qty']; } ?>" />
                            </td>
                        </tr>
                         <?php $itemcount++; } } ?>

				</tbody>
				</table>