<?php if(!empty($stk_products)) { $itemcount = 1; foreach($stk_products as $ITEMS) {  ?>
<tr>
    <td>
    <?php if(isset($ITEMS['product_code'])) { echo $ITEMS['product_code']; } ?>
    <input name="item_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_id'])) { echo $ITEMS['product_id']; } ?>" type="hidden" />
    <input name="item_code[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_code'])) { echo $ITEMS['product_code']; } ?>" type="hidden" />
    </td>
    <td>
    <?php if(isset($ITEMS['product_name'])) { echo $ITEMS['product_name']; } ?>
    <input name="item_name[<?php echo $itemcount; ?>]" value="<?php echo $ITEMS['product_name']; ?>" type="hidden" />
    </td>
    <td>
   <?php if(isset($ITEMS['uom_name'])) { echo $ITEMS['uom_name'];  } ?> 
    <input name="UOM_id[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['uom_id'])) { echo $ITEMS['uom_id']; } ?>" />
    <input name="UOM_name[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['uom_name'])) { echo $ITEMS['uom_name']; } ?>" />
    </td>
    <td>
    <input id="quantity<?php echo $itemcount; ?>" name="quantity[<?php echo $itemcount; ?>]" value="" type="text" class="quantity received_qty" />
    </td>
</tr>
<?php $itemcount++; } } ?>