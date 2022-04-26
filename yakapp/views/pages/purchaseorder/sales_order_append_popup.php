<?php if(!empty($sales_order_item)) { $itemcount = 1; foreach($sales_order_item as $ITEMS) { ?>
                       <tr>
                      <td>
                        <input id="item_code_<?php echo $itemcount; ?>" name="item_code[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_code'])) { echo $ITEMS['product_code']; } ?>" type="hidden" />
                        <input id="item_id_<?php echo $itemcount; ?>" name="item_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_item_id'])) { echo $ITEMS['so_items_item_id']; } ?>" type="hidden" />
                      <a href="javascript:void(0);" id="item_mfg_prtno_value_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['product_mfr_part_number'])) { echo $ITEMS['product_mfr_part_number']; } ?></a>
                        <input id="item_mfg_prtno_<?php echo $itemcount; ?>" name="item_mfg_prtno[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_mfr_part_number'])) { echo $ITEMS['product_mfr_part_number']; } ?>" type="hidden" /></td>
						
						
                        <td><a href="javascript:void(0);" id="item_name_value_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['product_name'])) { echo $ITEMS['product_name']; } ?></a>
                        <input id="item_name_<?php echo $itemcount; ?>" name="item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_name'])) { echo $ITEMS['product_name']; } ?>" type="hidden" /></td>
						
						 <td><a href="javascript:void(0);" id="item_name_hsn_sac_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['product_hsn_sac'])) { echo $ITEMS['product_hsn_sac']; } ?></a>
                        <input id="item_name_hsn_sac_<?php echo $itemcount; ?>" name="item_name_hsn_sac[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_hsn_sac'])) { echo $ITEMS['product_hsn_sac']; } ?>" type="hidden" /></td>
						
						
                      <td><a href="javascript:void(0);" id="item_uom_name_value_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['uom_name'])) { echo $ITEMS['uom_name'];  } ?> </a>
                        <input id="item_uom_id_<?php echo $itemcount; ?>" name="item_uom_id[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['uom_id'])) { echo $ITEMS['uom_id']; } ?>" />
                        <input id="item_uom_name_<?php echo $itemcount; ?>" name="item_uom_name[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['uom_name'])) { echo $ITEMS['uom_name'];  } ?> " /></td>
						
						
						
                      <td>
                        <input id="item_priceperunit_<?php echo $itemcount; ?>" name="item_priceperunit[<?php echo $itemcount; ?>]" class="quantity stock_text" value="" type="text" onkeyup="return purchase_items_grid_total(event, <?php echo $itemcount; ?>)" /></td>
						
						
						
                      <td>
                        <input id="item_qty_<?php echo $itemcount; ?>"  name="item_qty[<?php echo $itemcount; ?>]" class="quantity stock_text" value="" type="text" onkeyup="return purchase_items_grid_total(event, <?php echo $itemcount; ?>)" /></td>
						
						
                      <td>
                        <input id="item_gross_amount_<?php echo $itemcount; ?>" name="item_gross_amount[<?php echo $itemcount; ?>]" class="quantity stock_text" value="" type="text" /></td>
						
                         <td>
                        <input id="item_discount_percent_<?php echo $itemcount; ?>" name="item_discount_percent[<?php echo $itemcount; ?>]" class="quantity stock_text" value="" type="text" onkeyup="return purchase_items_grid_total(event, <?php echo $itemcount; ?>)" /></td>
						
						
                      <td>
                        <input id="item_discount_amount_<?php echo $itemcount; ?>" name="item_discount_amount[<?php echo $itemcount; ?>]" class="quantity stock_text" value="" type="text" /></td>
						
						
                      <td>
                        <input id="item_tax_percent_<?php echo $itemcount; ?>" name="item_tax_percent[<?php echo $itemcount; ?>]"  class="quantity stock_text"value="" type="text" onkeyup="return purchase_items_grid_total(event, <?php echo $itemcount; ?>)" />
                        <input id="item_vat_<?php echo $itemcount; ?>" name="item_vat[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_vat'])) { echo $ITEMS['so_items_vat']; } ?>" type="hidden" />
                        <input id="item_gst_<?php echo $itemcount; ?>" name="item_gst[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_cst'])) { echo $ITEMS['so_items_cst']; } ?>" type="hidden" />
                        <input id="item_cst_<?php echo $itemcount; ?>" name="item_cst[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_gst'])) { echo $ITEMS['so_items_gst']; } ?>" type="hidden" />
                        <input id="item_serv_tax_<?php echo $itemcount; ?>" name="item_serv_tax[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_service_tax'])) { echo $ITEMS['so_items_service_tax']; } ?>" type="hidden" />
                        <input id="item_exc_<?php echo $itemcount; ?>" name="item_exc[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_ex_duty'])) { echo $ITEMS['so_items_ex_duty']; } ?>" type="hidden" /></td>
						
						
						
                      <td>
                        <input id="item_tax_amount_<?php echo $itemcount; ?>" name="item_tax_amount[<?php echo $itemcount; ?>]" class="quantity stock_text" value="" type="text" /></td> 
						
						
						<td>
                        <input id="item_excise_percent_<?php echo $itemcount; ?>" name="item_excise_percent[<?php echo $itemcount; ?>]" class="quantity stock_text" value="" type="text" onkeyup="return purchase_items_grid_total(event, <?php echo $itemcount; ?>)" /></td> 
						<td>
                        <input id="item_excise_amount_<?php echo $itemcount; ?>" name="item_excise_amount[<?php echo $itemcount; ?>]" class="quantity stock_text" value="" type="text" /></td>
                     
                      <td>
                        <input id="item_net_amount_<?php echo $itemcount; ?>" name="item_net_amount[<?php echo $itemcount; ?>]" class="quantity"  value="" type="text" /></td>
                        <td colspan="2">
                           <!-- <div class="itemsgrid_action itemsgrid_edit" title="Edit"><span class="icon-pencil"></span></div>-->
                            <div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_delete_<?php echo $itemcount; ?>" onclick="return purchase_itemsgridrow_delete('<?php echo $itemcount; ?>');" data-item="<?php if(isset($ITEMS['so_items_item_id'])) { echo $ITEMS['so_items_item_id']; } ?>" data-delete="<?php echo $itemcount; ?>" title="Delete"><span class="icon-trash"></span></div>
                        </td>
                    </tr>
                    <?php $itemcount++; } } ?>