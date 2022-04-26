<?php
	$sessionData = $this->session->userdata('userlogin');
	$vat_display_mode = $sessionData['company_vat'];
	$cst_display_mode = $sessionData['company_cst'];
	$gst_display_mode = $sessionData['company_gst'];
	$service_display_mode = $sessionData['company_service'];
	$excise_display_mode = $sessionData['company_excise'];
?>
<?php if(!empty($product_list)) { $itemcount = 1; foreach($product_list as $PROLST) { ?>
<tr>
<td class="checkbox"><input type="checkbox" class="itemcheckbox" id="checkbox<?php echo $itemcount; ?>" value="<?php echo $itemcount; ?>" name="item_check[]"></td>
<td>
<?php if(isset($PROLST['product_code'])) { echo $PROLST['product_code']; } ?>
<input id="multiple_item_id_<?php echo $itemcount; ?>" name="multiple_item_id[<?php echo $itemcount; ?>]" value="<?php echo $PROLST['product_id']; ?>" type="hidden" />
<input id="multiple_item_code_<?php echo $itemcount; ?>" name="multiple_item_code[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['product_code'])) { echo $PROLST['product_code']; } ?>" type="hidden" />
</td>
<td>
<?php if(isset($PROLST['product_mfr_part_number'])) { echo $PROLST['product_mfr_part_number']; } ?>
<input id="multiple_item_mfg_prtno_<?php echo $itemcount; ?>" name="multiple_item_mfg_prtno[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['product_mfr_part_number'])) { echo $PROLST['product_mfr_part_number']; } ?>" />
</td>
<td>
<?php if(isset($PROLST['product_name'])) { echo $PROLST['product_name']; } ?>
<input id="multiple_item_name_<?php echo $itemcount; ?>" name="multiple_item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['product_name'])) { echo $PROLST['product_name']; } ?>" type="hidden" />
</td>
<td>
<?php if(isset($PROLST['uom_name'])) { echo $PROLST['uom_name'];  } ?> 
<input id="multiple_item_uom_id_<?php echo $itemcount; ?>" name="multiple_item_uom_id[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['uom_id'])) { echo $PROLST['uom_id']; } ?>" />
<input id="multiple_item_uom_name_<?php echo $itemcount; ?>" name="multiple_item_uom_name[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['uom_name'])) { echo $PROLST['uom_name']; } ?>" />
</td>
<td>
<input id="multiple_item_priceperunit_<?php echo $itemcount; ?>" class="quantity" name="multiple_item_priceperunit[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($PROLST['price_book_price_selling_price'])) { echo $PROLST['price_book_price_selling_price']; } ?>" readonly="readonly" />
</td>
<td>
<input id="multiple_item_inv_id_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_inv_id[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['inventory_item_id'])) { echo $PROLST['inventory_item_id']; } ?>"  /> 
<input id="multiple_item_inv_qty_<?php echo $itemcount; ?>"  class="quantity stock_text" name="multiple_item_inv_qty[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['inventory_qty'])) { echo $PROLST['inventory_qty']; } ?>" />
<input id="multiple_item_qty_<?php echo $itemcount; ?>" onkeyup="return salse_multiplepopuptotal(event, <?php echo $itemcount; ?>)" class="quantity stock_text" name="multiple_item_qty[<?php echo $itemcount; ?>]" type="text" value="" />
</td>
<td>
<input type="text" value="<?php if(isset($customer_discount)) { echo $customer_discount; } ?>" name="multiple_item_percentage_discount[<?php echo $itemcount; ?>]" class="quantity stock_text" id="multiple_item_percentage_discount_<?php echo $itemcount; ?>" readonly="readonly">
</td>
<td>
<input type="text" value="<?php if(isset($PROLST['price_book_price_discount_amount'])) { echo $PROLST['price_book_price_discount_amount']; } ?>" id="multiple_item_flat_discount_<?php echo $itemcount; ?>" name="multiple_item_flat_discount[<?php echo $itemcount; ?>]" class="quantity stock_text" readonly="readonly">
</td>
<td>
<input id="multiple_item_discount_amount_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_discount_amount[<?php echo $itemcount; ?>]" type="text" value="" readonly="readonly" />
</td>
<?php
if(isset($tax_value)) 
{ 
	if($tax_value != 'nontaxable') 
	{ 
	?>
	<?php if($vat_display_mode == 'yes') { ?>
	<td>
	<input id="multiple_item_vat_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_vat[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($PROLST['price_book_price_vat'])) { echo $PROLST['price_book_price_vat']; } ?>" readonly="readonly" />
	</td>
	<?php } if($gst_display_mode == 'yes') { ?>
	<td>
	<input id="multiple_item_gst_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_gst[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($PROLST['price_book_price_gst'])) { echo $PROLST['price_book_price_gst']; } ?>" readonly="readonly" />
	</td>
	<?php } if($cst_display_mode == 'yes') { ?>
	<td>
	<input id="multiple_item_cst_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_cst[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($PROLST['price_book_price_cst'])) { echo $PROLST['price_book_price_cst']; } ?>" readonly="readonly" />
	</td>
	<?php } if($service_display_mode == 'yes') { ?>
	<td>
	<input id="multiple_item_ser_tax_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_ser_tax[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($PROLST['price_book_price_service'])) { echo $PROLST['price_book_price_service']; } ?>" readonly="readonly" />
	</td>
	<?php } if($excise_display_mode == 'yes') { ?>
	<td>
	<input id="multiple_item_exc_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_exc[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($PROLST['price_book_price_excise'])) { echo $PROLST['price_book_price_excise']; } ?>" readonly="readonly" />
	</td>
	<?php } ?>
	<?php if($vat_display_mode == 'no') { ?>
	<input id="multiple_item_vat_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_vat[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['price_book_price_vat'])) { echo $PROLST['price_book_price_vat']; } ?>" readonly="readonly" />
	<?php } ?>
	<?php if($gst_display_mode == 'no') { ?>
	<input id="multiple_item_gst_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_gst[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['price_book_price_gst'])) { echo $PROLST['price_book_price_gst']; } ?>" readonly="readonly" />
	<?php } ?>
	<?php if($cst_display_mode == 'no') { ?>
	<input id="multiple_item_cst_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_cst[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['price_book_price_cst'])) { echo $PROLST['price_book_price_cst']; } ?>" readonly="readonly" />
	<?php } ?>
	<?php if($service_display_mode == 'no') { ?>
	<input id="multiple_item_ser_tax_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_ser_tax[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['price_book_price_service'])) { echo $PROLST['price_book_price_service']; } ?>" readonly="readonly" />
	<?php } ?>
	<?php if($excise_display_mode == 'no') { ?>
	<input id="multiple_item_exc_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_exc[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['price_book_price_excise'])) { echo $PROLST['price_book_price_excise']; } ?>" readonly="readonly" />
	<?php } ?>
	<?php 
	} 
} 
else 
{ 
?>
<input id="multiple_item_vat_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_vat[<?php echo $itemcount; ?>]" type="hidden" value="0.00" readonly="readonly" />
<input id="multiple_item_gst_<?php echo $itemcount; ?>" class="quantity" name="multiple_item_gst[<?php echo $itemcount; ?>]" type="hidden" value="0.00" readonly="readonly" />
<input id="multiple_item_cst_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_cst[<?php echo $itemcount; ?>]" type="hidden" value="0.00" readonly="readonly" />
<input id="multiple_item_ser_tax_<?php echo $itemcount; ?>" class="quantity" name="multiple_item_ser_tax[<?php echo $itemcount; ?>]" type="hidden" value="0.00" readonly="readonly" />
<input id="multiple_item_exc_<?php echo $itemcount; ?>" class="quantity" name="multiple_item_exc[<?php echo $itemcount; ?>]" type="hidden" value="0.00" readonly="readonly" />
<?php } ?>
<td>
<input id="multiple_item_rate_<?php echo $itemcount; ?>" class="quantity" name="multiple_item_rate[<?php echo $itemcount; ?>]" readonly="readonly" type="text" value="" />
</td>
</tr>
<?php $itemcount++; } } ?>