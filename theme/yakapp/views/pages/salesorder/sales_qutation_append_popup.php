<?php if($tax_value != 'nontaxable') { ?>
<?php if(!empty($sales_order)) { $itemcount = 1; foreach($sales_order as $ITEMS) { ?>
                       <tr>
					   
					   
                      <td><a href="javascript:void(0);" <?php echo $itemcount; ?>></a><?php echo $itemcount; ?>
                      </td>
                      <td>
                        <input id="item_code_<?php echo $itemcount; ?>" name="item_code[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_code'])) { echo $ITEMS['product_code']; } ?>" type="hidden" />
                        <input id="item_id_<?php echo $itemcount; ?>" name="item_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['salesquote_items_item_id'])) { echo $ITEMS['salesquote_items_item_id']; } ?>" type="hidden" />
                       <a href="javascript:void(0);" id="item_mfg_prtno_value_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['product_mfr_part_number'])) { echo $ITEMS['product_mfr_part_number']; } ?></a>
                        <input id="item_mfg_prtno_<?php echo $itemcount; ?>" name="item_mfg_prtno[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_mfr_part_number'])) { echo $ITEMS['product_mfr_part_number']; } ?>" type="hidden" /></td>
						
						
                      <td><a href="javascript:void(0);" id="item_name_value_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['product_name'])) { echo $ITEMS['product_name']; } ?></a>
                        <input id="item_name_<?php echo $itemcount; ?>" name="item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_name'])) { echo $ITEMS['product_name']; } ?>" type="hidden" /></td>
						
						<td><a href="javascript:void(0);" id="item_hsn_value_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['product_hsn_sac'])) { echo $ITEMS['product_hsn_sac']; } ?></a>
                        <input id="item_hsn_value_<?php echo $itemcount; ?>" name="item_hsn_value[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_hsn_sac'])) { echo $ITEMS['product_hsn_sac']; } ?>" type="hidden" />
                        <input id="item_uom_id_<?php echo $itemcount; ?>" name="item_uom_id[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['uom_id'])) { echo $ITEMS['uom_id']; } ?>" />
                        <input id="item_uom_name_<?php echo $itemcount; ?>" name="item_uom_name[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['uom_name'])) { echo $ITEMS['uom_name'];  } ?> " /></td>
						
						 <td>
					  
                        <input id="item_qty_<?php echo $itemcount; ?>" name="item_qty[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['salesquote_items_qty'])) { echo $ITEMS['salesquote_items_qty']; } ?>" type="text" class="quantity stock_text" onkeyup="return sales_items_grid_total(event, '<?php echo $itemcount; ?>')" /></td>
						
						 <td>
					  
                        <input id="item_mrp_<?php echo $itemcount; ?>" name="item_mrp[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_mrp'])) { echo $ITEMS['product_mrp']; } ?>" type="text" class="quantity stock_text" onkeyup="return sales_items_grid_total(event, '<?php echo $itemcount; ?>')" /></td>
                     
                      <td>
                        <input id="item_priceperunit_<?php echo $itemcount; ?>" name="item_priceperunit[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['salesquote_items_priceperunit'])) { echo $ITEMS['salesquote_items_priceperunit']; } ?>" type="text" class="quantity" onkeyup="return sales_items_grid_total(event, '<?php echo $itemcount; ?>')" /></td>
						
						<td>
						 <input id="item_gross_amount_<?php echo $itemcount; ?>" name="item_gross_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['salesquote_items_gross_amount'])) { echo $ITEMS['salesquote_items_gross_amount']; } ?>" type="text" class="quantity" readonly="readonly" /></td>
                     
                        <td>
                        <input id="item_discount_percent_<?php echo $itemcount; ?>" name="item_discount_percent[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['salesquote_items_discounts_percentage'])) { echo $ITEMS['salesquote_items_discounts_percentage']; } ?>" type="text" class="quantity stock_text" readonly="readonly" /></td>
						
						<td>
                        <input id="item_discount_amount_<?php echo $itemcount; ?>" name="item_discount_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['salesquote_items_discounts_amount'])) { echo $ITEMS['salesquote_items_discounts_amount']; } ?>" type="text" class="quantity stock_text" readonly="readonly" />
                     
                        <input id="item_gross_amount_<?php echo $itemcount; ?>" name="item_gross_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['salesquote_items_gross_amount'])) { echo $ITEMS['salesquote_items_gross_amount']; } ?>" type="hidden" class="quantity" readonly="readonly" />
                         <input id="item_flat_discount_<?php echo $itemcount; ?>" name="item_flat_discount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['salesquote_items_flat_discount'])) { echo $ITEMS['salesquote_items_flat_discount']; } else { echo '0';} ?>"  type="hidden" class="quantity stock_text"  onkeyup="return sales_items_grid_total(event, '<?php echo $itemcount; ?>')" />
                      </td>
					   <td>
                        <input id="item_net_amount_<?php echo $itemcount; ?>" name="item_net_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['salesquote_items_net_amount'])) { echo $ITEMS['salesquote_items_net_amount']; } ?>" type="text" class="quantity" readonly="readonly" /></td>
                      <td>
                        <input id="item_tax_percent_<?php echo $itemcount; ?>" name="item_tax_percent[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['salesquote_items_tax_percent'])) { echo $ITEMS['salesquote_items_tax_percent']; } ?>" type="text" class="quantity stock_text" readonly="readonly" />
                        <input id="item_vat_<?php echo $itemcount; ?>" name="item_vat[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['salesquote_items_vat'])) { echo $ITEMS['salesquote_items_vat']; } ?>" type="hidden" />
                        <input id="item_gst_<?php echo $itemcount; ?>" name="item_gst[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['salesquote_items_gst'])) { echo $ITEMS['salesquote_items_gst']; } ?>" type="hidden" />
                        <input id="item_cst_<?php echo $itemcount; ?>" name="item_cst[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['salesquote_items_cst'])) { echo $ITEMS['salesquote_items_cst']; } ?>" type="hidden" />
                        <input id="item_serv_tax_<?php echo $itemcount; ?>" name="item_serv_tax[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['salesquote_items_service_tax'])) { echo $ITEMS['salesquote_items_service_tax']; } ?>" type="hidden" />
                        <input id="item_exc_<?php echo $itemcount; ?>" name="item_exc[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['salesquote_items_ex_duty'])) { echo $ITEMS['salesquote_items_ex_duty']; } ?>" type="hidden" /></td>
                      <td>
                        <input id="item_tax_amount_<?php echo $itemcount; ?>" name="item_tax_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['salesquote_items_tax_amount'])) { echo $ITEMS['salesquote_items_tax_amount']; } ?>" type="text" class="quantity stock_text" readonly="readonly" /></td>
						
						<td>
                        <input id="item_tax_amount_<?php echo $itemcount; ?>" name="item_tax_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['salesquote_items_tax_amount'])) { echo $ITEMS['salesquote_items_tax_amount']; } ?>" type="text" class="quantity stock_text" readonly="readonly" /></td>
						
						 <td>
                        <input id="item_tax_percent_<?php echo $itemcount; ?>" name="item_tax_percent[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['salesquote_items_tax_percent'])) { echo $ITEMS['salesquote_items_tax_percent']; } ?>" type="text" class="quantity stock_text" readonly="readonly" /></td>
						
                     
						 <td colspan="2">
                            <div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_delete_<?php echo $itemcount; ?>" onclick="return itemsgridrowdelete('<?php echo $itemcount; ?>');" data-item="<?php if(isset($ITEMS['salesquote_items_item_id'])) { echo $ITEMS['salesquote_items_item_id']; } ?>" data-delete="<?php echo $itemcount; ?>" title="Delete"><span class="icon-trash"></span></div>
                        </td>
                    </tr>
                    <?php $itemcount++; } } ?>
					<?php } else { ?>
					<?php if(!empty($sales_order)) { $itemcount = 1; foreach($sales_order as $ITEMS) { ?>
                       <tr>
                      <td><a href="javascript:void(0);" id="item_code_value_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['product_code'])) { echo $ITEMS['product_code']; } ?></a>
                        <input id="item_code_<?php echo $itemcount; ?>" name="item_code[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_code'])) { echo $ITEMS['product_code']; } ?>" type="hidden" />
                        <input id="item_id_<?php echo $itemcount; ?>" name="item_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['salesquote_items_item_id'])) { echo $ITEMS['salesquote_items_item_id']; } ?>" type="hidden" /></td>
                        <td><a href="javascript:void(0);" id="item_mfg_prtno_value_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['product_mfr_part_number'])) { echo $ITEMS['product_mfr_part_number']; } ?></a>
                        <input id="item_mfg_prtno_<?php echo $itemcount; ?>" name="item_mfg_prtno[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_mfr_part_number'])) { echo $ITEMS['product_mfr_part_number']; } ?>" type="hidden" /></td>	
                      <td><a href="javascript:void(0);" id="item_name_value_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['product_name'])) { echo $ITEMS['product_name']; } ?></a>
                        <input id="item_name_<?php echo $itemcount; ?>" name="item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_name'])) { echo $ITEMS['product_name']; } ?>" type="hidden" /></td>
                      <td><a href="javascript:void(0);" id="item_uom_name_value_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['uom_name'])) { echo $ITEMS['uom_name'];  } ?> </a>
                        <input id="item_uom_id_<?php echo $itemcount; ?>" name="item_uom_id[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['uom_id'])) { echo $ITEMS['uom_id']; } ?>" />
                        <input id="item_uom_name_<?php echo $itemcount; ?>" name="item_uom_name[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['uom_name'])) { echo $ITEMS['uom_name'];  } ?> " /></td>
                      <td>
                        <input id="item_priceperunit_<?php echo $itemcount; ?>" name="item_priceperunit[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['salesquote_items_priceperunit'])) { echo $ITEMS['salesquote_items_priceperunit']; } ?>" type="text" class="quantity" onkeyup="return sales_items_grid_total(event, '<?php echo $itemcount; ?>')" /></td>
                      <td>
                        <input id="item_qty_<?php echo $itemcount; ?>" name="item_qty[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['salesquote_items_qty'])) { echo $ITEMS['salesquote_items_qty']; } ?>" type="text" class="quantity stock_text" onkeyup="return sales_items_grid_total(event, '<?php echo $itemcount; ?>')" /></td>
                      
                        <input id="item_gross_amount_<?php echo $itemcount; ?>" name="item_gross_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['salesquote_items_gross_amount'])) { echo $ITEMS['salesquote_items_gross_amount']; } ?>" type="text" class="quantity" readonly="readonly" />
                        <input id="item_tax_percent_<?php echo $itemcount; ?>" name="item_tax_percent[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['salesquote_items_tax_percent'])) { echo $ITEMS['salesquote_items_tax_percent']; } ?>" type="hidden" />
                        <input id="item_vat_<?php echo $itemcount; ?>" name="item_vat[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['salesquote_items_vat'])) { echo $ITEMS['salesquote_items_vat']; } ?>" type="hidden" />
                        <input id="item_gst_<?php echo $itemcount; ?>" name="item_gst[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['salesquote_items_gst'])) { echo $ITEMS['salesquote_items_gst']; } ?>" type="hidden" />
                        <input id="item_cst_<?php echo $itemcount; ?>" name="item_cst[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['salesquote_items_cst'])) { echo $ITEMS['salesquote_items_cst']; } ?>" type="hidden" />
                        <input id="item_serv_tax_<?php echo $itemcount; ?>" name="item_serv_tax[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['salesquote_items_service_tax'])) { echo $ITEMS['salesquote_items_service_tax']; } ?>" type="hidden" />
                        <input id="item_exc_<?php echo $itemcount; ?>" name="item_exc[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['salesquote_items_ex_duty'])) { echo $ITEMS['salesquote_items_ex_duty']; } ?>" type="hidden" />
                        <input id="item_tax_amount_<?php echo $itemcount; ?>" name="item_tax_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['salesquote_items_tax_amount'])) { echo $ITEMS['salesquote_items_tax_amount']; } ?>" type="hidden" />
                       
                      <td>
                        <input id="item_discount_percent_<?php echo $itemcount; ?>" name="item_discount_percent[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['salesquote_items_discounts_percentage'])) { echo $ITEMS['salesquote_items_discounts_percentage']; } ?>" type="text" class="quantity stock_text" readonly="readonly" /></td>
                         <td>
                         <input id="item_gross_amount_<?php echo $itemcount; ?>" name="item_gross_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['salesquote_items_gross_amount'])) { echo $ITEMS['salesquote_items_gross_amount']; } ?>" type="hidden" class="quantity" readonly="readonly" />
                         <input id="item_flat_discount_<?php echo $itemcount; ?>" name="item_flat_discount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['salesquote_items_flat_discount'])) { echo $ITEMS['salesquote_items_flat_discount']; } else { echo '0';} ?>"  type="text" class="quantity stock_text"  onkeyup="return sales_items_grid_total(event, '<?php echo $itemcount; ?>')" />
                      </td>
                      <td>
                        <input id="item_discount_amount_<?php echo $itemcount; ?>" name="item_discount_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['salesquote_items_discounts_amount'])) { echo $ITEMS['salesquote_items_discounts_amount']; } ?>" type="text" class="quantity stock_text" readonly="readonly" /></td>
                      <td>
                        <input id="item_net_amount_<?php echo $itemcount; ?>" name="item_net_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['salesquote_items_net_amount'])) { echo $ITEMS['salesquote_items_net_amount']; } ?>" type="text" class="quantity" readonly="readonly" /></td>
						 <td colspan="2">
                            <div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_delete_<?php echo $itemcount; ?>" onclick="return itemsgridrowdelete('<?php echo $itemcount; ?>');" data-item="<?php if(isset($ITEMS['salesquote_items_item_id'])) { echo $ITEMS['salesquote_items_item_id']; } ?>" data-delete="<?php echo $itemcount; ?>" title="Delete"><span class="icon-trash"></span></div>
                        </td>
                    </tr>
                    <?php $itemcount++; } } ?>
                    <?php } ?>