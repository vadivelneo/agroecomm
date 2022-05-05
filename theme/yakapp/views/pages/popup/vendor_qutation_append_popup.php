
<?php if(!empty($vendor_qoute_item)) { $itemcount = 1; foreach($vendor_qoute_item as $ITEMS) { ?>
<tr>
  <td>
    <input id="item_code_<?php echo $itemcount; ?>" name="item_code[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_code'])) { echo $ITEMS['product_code']; } ?>" type="hidden" />
    <input id="item_id_<?php echo $itemcount; ?>" name="item_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['vquote_items_item_id'])) { echo $ITEMS['vquote_items_item_id']; } ?>" type="hidden" />
  <a href="javascript:void(0);" id="item_mfg_prtno_value_<?php echo $itemcount; ?>">
    <?php if(isset($ITEMS['product_mfr_part_number'])) { echo $ITEMS['product_mfr_part_number']; } ?>
    </a>
    <input id="item_mfg_prtno_<?php echo $itemcount; ?>" name="item_mfg_prtno[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_mfr_part_number'])) { echo $ITEMS['product_mfr_part_number']; } ?>" type="hidden" /></td>
 
 <td><a href="javascript:void(0);" id="item_name_value_<?php echo $itemcount; ?>">
    <?php if(isset($ITEMS['product_name'])) { echo $ITEMS['product_name']; } ?>
    </a>
    <input id="item_name_<?php echo $itemcount; ?>" name="item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_name'])) { echo $ITEMS['product_name']; } ?>" type="hidden" /></td> 
	
	
	<td><a href="javascript:void(0);" id="item_hsn_sac_value_<?php echo $itemcount; ?>">
    <?php if(isset($ITEMS['vquote_items_hsn_sac'])) { echo $ITEMS['vquote_items_hsn_sac']; } ?>
    </a>
    <input id="item_name_hsn_sac_<?php echo $itemcount; ?>" name="item_name_hsn_sac[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['vquote_items_hsn_sac'])) { echo $ITEMS['vquote_items_hsn_sac']; } ?>" type="hidden" /></td>
	
  <td><a href="javascript:void(0);" id="item_uom_name_value_<?php echo $itemcount; ?>">
    <?php if(isset($ITEMS['uom_name'])) { echo $ITEMS['uom_name'];  } ?>
    </a>
    <input id="item_uom_id_<?php echo $itemcount; ?>" name="item_uom_id[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['uom_id'])) { echo $ITEMS['uom_id']; } ?>" />
    <input id="item_uom_name_<?php echo $itemcount; ?>" name="item_uom_name[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['uom_name'])) { echo $ITEMS['uom_name'];  } ?> " /></td>
  <td>
    <input id="item_priceperunit_<?php echo $itemcount; ?>" name="item_priceperunit[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['vquote_items_priceperunit'])) { echo $ITEMS['vquote_items_priceperunit']; } ?>" type="text" class="quantity" onkeyup="return purchase_items_grid_total(event, <?php echo $itemcount; ?>)" /></td>
  <td>
    <input id="item_qty_<?php echo $itemcount; ?>" name="item_qty[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['vquote_items_qty'])) { echo $ITEMS['vquote_items_qty']; } ?>" type="text" class="quantity stock_text" onkeyup="return purchase_items_grid_total(event, <?php echo $itemcount; ?>)" /></td>
  <td>
    <input id="item_gross_amount_<?php echo $itemcount; ?>" name="item_gross_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['vquote_items_gross_amount'])) { echo $ITEMS['vquote_items_gross_amount']; } ?>" type="text" readonly="readonly" class="quantity" /></td>
  <td>
    <input id="item_discount_percent_<?php echo $itemcount; ?>" name="item_discount_percent[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['vquote_items_discounts_percentage'])) { echo $ITEMS['vquote_items_discounts_percentage']; } ?>" type="text" class="quantity stock_text" onkeyup="return purchase_items_grid_total(event, <?php echo $itemcount; ?>)" /></td>
  <td>
    <input id="item_discount_amount_<?php echo $itemcount; ?>" name="item_discount_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['vquote_items_discounts_amount'])) { echo $ITEMS['vquote_items_discounts_amount']; } ?>" type="text" class="quantity stock_text" readonly="readonly"  /></td>
  
  <td>
    <input id="item_tax_percent_<?php echo $itemcount; ?>" name="item_tax_percent[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['vquote_items_cgst_percent'])) { echo $ITEMS['vquote_items_cgst_percent']; } ?>" type="text" class="quantity stock_text" onkeyup="return purchase_items_grid_total(event, <?php echo $itemcount; ?>)" /></td>
	
  <td>
    <input id="item_tax_amount_<?php echo $itemcount; ?>" name="item_tax_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['vquote_items_cgst_amount'])) { echo $ITEMS['vquote_items_cgst_amount']; } ?>" type="text" class="quantity stock_text" readonly="readonly" /></td>
  
  <td>
    <input id="item_excise_percent_<?php echo $itemcount; ?>" name="item_excise_percent[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['vquote_items_sgst_percent'])) { echo $ITEMS['vquote_items_sgst_percent']; } ?>" type="text" class="quantity stock_text" onkeyup="return purchase_items_grid_total(event, <?php echo $itemcount; ?>)" /></td>
	
  <td>
    <input id="item_excise_amount_<?php echo $itemcount; ?>" name="item_excise_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['vquote_items_sgst_amount'])) { echo $ITEMS['vquote_items_sgst_amount']; } ?>" type="text" class="quantity stock_text" readonly="readonly" /></td>
 

 <td>
    <input id="item_net_amount_<?php echo $itemcount; ?>" name="item_net_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['vquote_items_net_amount'])) { echo $ITEMS['vquote_items_net_amount']; } ?>" type="text" class="quantity" readonly="readonly" /></td>
  <td colspan="2">
    <div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_delete_<?php echo $itemcount; ?>" onclick="return purchase_itemsgridrowdelete('<?php echo $itemcount; ?>');" data-item="<?php if(isset($ITEMS['vquote_items_item_id'])) { echo $ITEMS['vquote_items_item_id']; } ?>" data-delete="<?php echo $itemcount; ?>" title="Delete"><span class="icon-trash"></span></div></td>
</tr>
<?php $itemcount++; } } ?>
