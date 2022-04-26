<?php 
                    
                    if(!empty($product_list))
                    {
                        $itemcount = 1; 
                        foreach($product_list as $PROLST) 
                        { 
                        ?>
                    <tr>
                    	
              			<td class="checkbox"><input type="checkbox" class="itemcheckbox" id="checkbox<?php echo $itemcount; ?>" value="<?php echo $itemcount; ?>" name="item_check[]"></td>
                        <td>
                            <?php if(isset($PROLST['product_code'])) { echo $PROLST['product_code']; } ?>
                            <input id="multiple_item_id_<?php echo $itemcount; ?>" name="multiple_item_id[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['product_id'])) { echo $PROLST['product_id']; } ?>" type="hidden" />
                            <input id="multiple_item_code_<?php echo $itemcount; ?>" name="multiple_item_code[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['product_code'])) { echo $PROLST['product_code']; } ?>" type="hidden" />
                        </td>
                        <td>
                            <?php if(isset($PROLST['product_mfr_part_number'])) { echo $PROLST['product_mfr_part_number']; } ?>
                             <input id="multiple_item_mfg_prtno_<?php echo $itemcount; ?>" name="multiple_item_mfg_prtno[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['product_mfr_part_number'])) { echo $PROLST['product_mfr_part_number']; } ?>" />
                        </td>
                        <td>
                        <?php if(isset($PROLST['product_hsn_sac'])) { echo $PROLST['product_hsn_sac']; } ?>
                            <input id="multiple_item_hsn_sac_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_hsn_sac[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['product_hsn_sac'])) { echo $PROLST['product_hsn_sac']; } ?>" />
                        </td>
                        <td>
                            <?php if(isset($PROLST['product_name'])) { echo $PROLST['product_name']; } ?>
                            <input id="multiple_item_name_<?php echo $itemcount; ?>" name="multiple_item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['product_name'])) { echo $PROLST['product_name']; } ?>" type="hidden" />
                            <input id="multiple_item_uom_id_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_uom_id[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['product_stock_uom_id'])) { echo $PROLST['product_stock_uom_id']; } ?>" />
                        </td>
						<td>
                            <input id="multiple_item_incentive_rate_<?php echo $itemcount; ?>" class="quantity" name="multiple_item_incentive_rate[<?php echo $itemcount; ?>]" onkeyup="return popup_price_book_charge(<?php echo $itemcount; ?>)" type="text" value="" />
                        </td>
						<td>
                            <input id="multiple_item_handling_charge_<?php echo $itemcount; ?>" onkeyup="return popup_price_book_charge(<?php echo $itemcount; ?>)" class="quantity" name="multiple_item_handling_charge[<?php echo $itemcount; ?>]" type="text" value="" />
                        </td>
                        <td>
                            <input id="multiple_item_selling_price_<?php echo $itemcount; ?>" class="quantity" name="multiple_item_selling_price[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($PROLST['product_selling'])) { echo $PROLST['product_selling']; } ?>" />
                        </td>
                        <td>
                            <input id="multiple_item_mrp_<?php echo $itemcount; ?>" class="quantity" name="multiple_item_mrp[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($PROLST['product_mrp'])) { echo $PROLST['product_mrp']; } ?>" />
                        </td>
                        <td>
                            <input id="multiple_item_discount_percentage_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_discount_percentage[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($PROLST['product_discounts'])) { echo $PROLST['product_discounts']; } ?>" />
                        </td>
                       
                        <td>
                            <input id="multiple_item_cgst_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_cgst[<?php echo $itemcount; ?>]" type="text" onkeyup="return popup_price_book_charge(<?php echo $itemcount; ?>)" value="<?php if(isset($PROLST['product_cgst_tax'])) { echo $PROLST['product_cgst_tax']; } ?>" />
                        </td>
                        <td>
                            <input id="multiple_item_sgst_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_sgst[<?php echo $itemcount; ?>]" type="text" onkeyup="return popup_price_book_charge(<?php echo $itemcount; ?>)" value="<?php if(isset($PROLST['product_sgst_tax'])) { echo $PROLST['product_sgst_tax']; } ?>" />
                        </td>
                        <td>
                            <input id="multiple_item_igst_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_igst[<?php echo $itemcount; ?>]" type="text" onkeyup="return popup_price_book_charge(<?php echo $itemcount; ?>)" value="<?php if(isset($PROLST['product_igst_tax'])) { echo $PROLST['product_igst_tax']; } ?>" />
                        </td>
                        <td>
						<input id="multiple_selling_price_with_tax_<?php echo $itemcount; ?>" readonly class="quantity stock_text" name="multiple_selling_price_with_tax[<?php echo $itemcount; ?>]" type="text" value="" />
									 
								</td>
                       
                    </tr>
                <?php 
                $itemcount++; 
                } 
                    }
                ?>