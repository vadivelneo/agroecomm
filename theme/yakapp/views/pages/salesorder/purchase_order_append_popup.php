<?php if(!empty($purchase_order)) { $itemcount = 1; foreach($purchase_order as $ITEMS) { 
$sum=0;
 ?>
<tr>
    <td>
    <?php if(isset($ITEMS['po_items_item_id'])) { echo $ITEMS['po_items_item_id']; } ?>
    <input name="item_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_item_id'])) { echo $ITEMS['po_items_item_id']; } ?>" type="hidden" />
    <input name="item_code[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_code'])) { echo $ITEMS['po_items_code']; } ?>" type="hidden" />
    </td>
    <td>
    <?php if(isset($ITEMS['po_items_name'])) { echo $ITEMS['po_items_name']; } ?>
    <input name="item_name[<?php echo $itemcount; ?>]" value="<?php echo $ITEMS['po_items_name']; ?>" type="hidden" />
    </td>
    <!--<td>
    <?php if(isset($ITEMS['product_model_number'])) { echo $ITEMS['product_model_number']; } ?>
    <input name="item_model[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_model_number'])) { echo $ITEMS['product_model_number']; } ?>" type="hidden" />
    </td>-->
    <td>
    <?php if(isset($ITEMS['po_indent_order_qty'])) { echo $ITEMS['po_indent_order_qty']; } ?>
    <input name="ordered_qty[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_indent_order_qty'])) { echo $ITEMS['po_indent_order_qty']; } ?>" type="hidden"  />
    </td>
    <td>
   <?php if(isset($ITEMS['uom_name'])) { echo $ITEMS['uom_name'];  } ?> 
    <input name="UOM_id[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['po_items_uom_id'])) { echo $ITEMS['po_items_uom_id']; } ?>" />
    <input name="UOM_name[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['uom_name'])) { echo $ITEMS['uom_name']; } ?>" />
    </td>
    <td>
    <input name="received_qty[<?php echo $itemcount; ?>]" value="" type="text" class="quantity" />
    </td>
    
    <td>
    <input name="pending_qty[<?php echo $itemcount; ?>]" value="" class="quantity"  type="text" />
    </td> 
	
</tr>
<?php $itemcount++; } } ?>