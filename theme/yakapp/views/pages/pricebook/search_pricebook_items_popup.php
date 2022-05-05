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
                            <input id="multiple_item_uom_id_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_uom_id[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['uom_id'])) { echo $PROLST['uom_id']; } ?>" />
                        </td>
						<td>
                            <input id="multiple_item_incentive_rate_<?php echo $itemcount; ?>" class="quantity" name="multiple_item_incentive_rate[<?php echo $itemcount; ?>]" onkeyup="return popup_price_book_charge(<?php echo $itemcount; ?>)" type="text" value="<?php if(isset($PROLST['price_book_price_incentive_rate'])) { echo $PROLST['price_book_price_incentive_rate']; } ?>" />
                        </td>
						<td>
                            <input id="multiple_item_handling_charge_<?php echo $itemcount; ?>" onkeyup="return popup_price_book_charge(<?php echo $itemcount; ?>)" class="quantity" name="multiple_item_handling_charge[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($PROLST['price_book_price_handling_charge'])) { echo $PROLST['price_book_price_handling_charge']; } ?>" />
                        </td>
                        <td>
                            <input id="multiple_item_selling_price_<?php echo $itemcount; ?>" class="quantity" name="multiple_item_selling_price[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($PROLST['price_book_price_selling_price'])) { echo $PROLST['price_book_price_selling_price']; } ?>" />
                        </td>
                        <td>
                            <input id="multiple_item_mrp_<?php echo $itemcount; ?>" class="quantity" name="multiple_item_mrp[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($PROLST['price_book_price_mrp'])) { echo $PROLST['price_book_price_mrp']; } ?>" />
                        </td>
                        <td>
                            <input id="multiple_item_discount_percentage_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_discount_percentage[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($PROLST['price_book_price_discount_percentage'])) { echo $PROLST['price_book_price_discount_percentage']; } ?>" />
                       
                            <input id="multiple_item_discount_amount_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_discount_amount[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['price_book_price_discount_amount'])) { echo $PROLST['price_book_price_discount_amount']; } ?>" />
                       <input id="item_damage_discount_percentage_<?php echo $itemcount; ?>" class="quantity stock_text" name="item_damage_discount_percentage[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['price_book_damage_discount_percentage'])) { echo $PROLST['price_book_damage_discount_percentage']; } ?>" /></td>
                        
                         <td>
                            <input id="multiple_item_cgst_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_cgst[<?php echo $itemcount; ?>]" onkeyup="return popup_price_book_charge(<?php echo $itemcount; ?>)"  type="text" value="<?php if(isset($PROLST['price_book_price_gst'])) { echo $PROLST['price_book_price_gst']; } ?>" />
                        </td>
                        <td>
                            <input id="multiple_item_sgst_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_sgst[<?php echo $itemcount; ?>]" onkeyup="return popup_price_book_charge(<?php echo $itemcount; ?>)"  type="text" value="<?php if(isset($PROLST['price_book_price_sgst'])) { echo $PROLST['price_book_price_sgst']; } ?>" />
                        </td>
                        <td>
                            <input id="multiple_item_igst_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_igst[<?php echo $itemcount; ?>]" onkeyup="return popup_price_book_charge(<?php echo $itemcount; ?>)"  type="text" value="<?php if(isset($PROLST['price_book_price_igst'])) { echo $PROLST['price_book_price_igst']; } ?>" />
                        </td>
                      <td>
									<?php
									$item_selling_total = (($PROLST['price_book_price_incentive_rate'] * 30) / 100) + $PROLST['price_book_price_handling_charge']  + $PROLST['price_book_price_incentive_rate'];
									$gst_tax = $PROLST['price_book_price_gst'] + $PROLST['price_book_price_sgst'];
									$selling_price_tax = ($item_selling_total * $gst_tax) / 100 ;
									?>
									
									 <input id="multiple_selling_price_with_tax_<?php echo $itemcount; ?>" readonly class="quantity stock_text" name="multiple_selling_price_with_tax[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($PROLST['price_book_price_selling_price'])) {echo $item_selling_total + $selling_price_tax; } ?>" />
									 
								</td>
                    </tr>
                <?php 
                $itemcount++; 
                } 
              }
             ?>