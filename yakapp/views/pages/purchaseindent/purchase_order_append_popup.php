 
 
<?php 
//echo "<pre>"; print_r($purchase_order);
if(!empty($purchase_order)) { $itemcount = 1; foreach($purchase_order as $ITEMS) {  ?>
<tr>
    <td>
    <?php if(isset($ITEMS['po_items_item_id'])) { echo $ITEMS['po_items_model']; } ?>
    <input name="item_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_item_id'])) { echo $ITEMS['po_items_item_id']; } ?>" type="hidden" />
     <input name="sno_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_id'])) { echo $ITEMS['po_items_id']; } ?>" type="hidden" />
    <input name="item_code[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_code'])) { echo $ITEMS['po_items_code']; } ?>" type="hidden" />
    <input name="item_mfg_prtno[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_model'])) { echo $ITEMS['po_items_model']; } ?>" type="hidden" />
    </td>
    <td>
    <?php if(isset($ITEMS['po_items_name'])) { echo $ITEMS['po_items_name']; } ?>
    <input name="item_name[<?php echo $itemcount; ?>]" value="<?php echo $ITEMS['po_items_name']; ?>" type="hidden" />
   
    <input name="item_name_hsn_sac[<?php echo $itemcount; ?>]" value="<?php echo $ITEMS['po_items_hsn_sac']; ?>" type="hidden" />
    </td>
	
		
	 <td>
    <input id="item_control_no_[<?php echo $itemcount; ?>]" name="item_control_no[<?php echo $itemcount; ?>]" class="quantity stock_text"   value="" type = "text"  />
   
    <input id="item_batch_no_[<?php echo $itemcount; ?>]" name="item_batch_no[<?php echo $itemcount; ?>]" value="<?php echo $ITEMS['po_batch_no']; ?>" class="quantity stock_text" type="hidden" />
    </td>
    
   
	
	<td>
	 
    <?php //if(isset($ITEMS['po_expiry_date'])) { echo $ITEMS['po_expiry_date']; } ?>
    <input id="item_expiry_date_[<?php echo $itemcount; ?>]" name="item_expiry_date[<?php echo $itemcount; ?>]" value="" class="quantity datepicker" onmouseover="return onkeyupfordate(<?php echo $itemcount; ?>)" type="text" />
    </td>
	
	<td>
    
    <input id="item_pack_size_[<?php echo $itemcount; ?>]" name="item_pack_size[<?php echo $itemcount; ?>]" value="" class="quantity stock_text" type="text" />
   
    <input name="UOM_id[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['po_items_uom_id'])) { echo $ITEMS['po_items_uom_id']; } ?>" />
    <input name="UOM_name[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['uom_name'])) { echo $ITEMS['uom_name']; } ?>" />
     
    <input id="item_brand_[<?php echo $itemcount; ?>]" name="item_brand[<?php echo $itemcount; ?>]" value="" class="quantity stock_text" type="hidden" />
    </td>
	
	 <td>
    <input id="item_price_<?php echo $itemcount; ?>" name="item_price[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_priceperunit'])) { echo $ITEMS['po_items_priceperunit']; } ?>" class="quantity stock_text"  onkeyup="calc_price(<?php echo $itemcount; ?>)" type="text" />
    </td>
    <td>
    <?php if(isset($ITEMS['po_items_qty'])) { echo $ITEMS['po_items_qty']; } ?>
    <input id="ordered_qty_<?php echo $itemcount; ?>" name="ordered_qty[<?php echo $itemcount; ?>]" onkeyup="return onkeyupfortotal(<?php echo $itemcount; ?>)" value="<?php if(isset($ITEMS['po_items_qty'])) { echo $ITEMS['po_items_qty']; } ?>" type="hidden"  />
   
    <input id="build_qty_<?php echo $itemcount; ?>" name="build_qty[<?php echo $itemcount; ?>]" value="" type="hidden" class="quantity1 quantity build_qty" />
    </td>
	
    <td>
    <input id="received_qty_<?php echo $itemcount; ?>" name="received_qty[<?php echo $itemcount; ?>]" onkeyup="return onkeyupfortotal(<?php echo $itemcount; ?>)" value="" type="text" class="quantity1 quantity received_qty" />
    </td>
	
	 
    
    <td>
    <input id="pending_qty_<?php echo $itemcount; ?>" readonly="" name="pending_qty[<?php echo $itemcount; ?>]" value="" class="quantity pending_qty"  type="text" />
   
    <input id="extra_qty_<?php echo $itemcount; ?>" readonly="" name="extra_qty[<?php echo $itemcount; ?>]" value="" class="quantity pending_qty"  type="hidden" />
    </td> 
	 <td>
    <input id="item_total_price_<?php echo $itemcount; ?>" name="item_total_price[<?php echo $itemcount; ?>]" value="" class="quantity stock_text" readonly="readonly" type="text" />
    </td>
	<td>
    <input id="item_remark_<?php echo $itemcount; ?>"  name="item_remark[<?php echo $itemcount; ?>]" value="" class="input-large nameField"  type="text" />
    </td>
	
</tr>
<?php $itemcount++; }  ?>
<input type ="hidden" value="<?php echo $itemcount-1; ?>" name="last_table_id " id="last_table_id">
<?php } ?>