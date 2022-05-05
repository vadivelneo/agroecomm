<input id="item_igst_name_" name="item_igst_name" value="<?php  echo $item_igst_name; ?>" type="hidden" />
<?php
//echo "<pre>"; print_r($product_list);
//echo 'item_igst_name : '.$item_igst_name; 

 $itemcount = 1; foreach($product_list as $PROLST) { ?>
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
              <?php if(isset($PROLST['product_hsn_sac'])) { echo $PROLST['product_hsn_sac']; } ?>
              <input id="multiple_item_hsn_sac_<?php echo $itemcount; ?>" name="multiple_item_hsn_sac[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['product_hsn_sac'])) { echo $PROLST['product_hsn_sac']; } ?>" type="hidden" />
              </td>
			 
			 <td>
              <?php if(isset($PROLST['division_name'])) { echo $PROLST['division_name']; } ?>
              <input id="multiple_item_hsn_sac_<?php echo $itemcount; ?>" name="multiple_item_hsn_sac[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['product_hsn_sac'])) { echo $PROLST['product_hsn_sac']; } ?>" type="hidden" />
              <input id="multiple_item_division_name_<?php echo $itemcount; ?>" name="multiple_item_division_name[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['division_name'])) { echo $PROLST['division_name']; } ?>" type="hidden" />
              <input id="multiple_item_division_id_<?php echo $itemcount; ?>" name="multiple_item_division_id[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['division_id'])) { echo $PROLST['division_id']; } ?>" type="hidden" />
              </td>
              
               <td>
              <?php if(isset($PROLST['store_name'])) { echo $PROLST['store_name']; } ?>
             
              <input id="multiple_item_store_id_<?php echo $itemcount; ?>" name="multiple_item_store_id[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['store_id'])) { echo $PROLST['store_id']; } ?>" type="hidden" />
               <input id="multiple_item_store_name_<?php echo $itemcount; ?>" name="multiple_item_store_name[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['store_name'])) { echo $PROLST['store_name']; } ?>" type="hidden" />
              
              </td>
			  
              <td>
             <?php if(isset($PROLST['uom_name'])) { echo $PROLST['uom_name'];  } ?> 
              <input id="multiple_item_uom_id_<?php echo $itemcount; ?>" name="multiple_item_uom_id[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['product_uom'])) { echo $PROLST['product_uom']; } ?>" />
              <input id="multiple_item_uom_name_<?php echo $itemcount; ?>" name="multiple_item_uom_name[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['uom_name'])) { echo $PROLST['uom_name']; } ?>" />
			  <input id="item_brand_'+counter+'" name="item_brand['+counter+']" value="" type="hidden" class="quantity stock_text"  />
              </td>
              
              <td>
              <input id="multiple_item_qty_<?php echo $itemcount; ?>" onkeyup="return purchase_multiplepopuptotal(event, <?php echo $itemcount; ?>)" name="multiple_item_qty[<?php echo $itemcount; ?>]" type="text" class="quantity stock_text"  value="" />
              </td>
               <td>
              <input id="multiple_item_priceperunit_<?php echo $itemcount; ?>" onkeyup="return purchase_multiplepopuptotal(event, <?php echo $itemcount; ?>)"  name="multiple_item_priceperunit[<?php echo $itemcount; ?>]" type="text" class="quantity" value="<?php if(isset($PROLST['price_book_price_selling_price'])) { echo $PROLST['price_book_price_selling_price']; } ?>" />
              </td>
              
              <td>
              <input id="multiple_item_discount_<?php echo $itemcount; ?>" onkeyup="return purchase_multiplepopuptotal(event, <?php echo $itemcount; ?>)" name="multiple_item_discount[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['price_book_price_discount_percentage'])) { echo $PROLST['price_book_price_discount_percentage']; } ?>" type="text" class="quantity stock_text" />
              </td>
             <?php  
              if($item_igst_name == 0)
              {
				  ?>
              <td>
              <input id="multiple_item_tax_percent_<?php echo $itemcount; ?>" onkeyup="return purchase_multiplepopuptotal(event, <?php echo $itemcount; ?>)" name="multiple_item_tax_percent[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['price_book_price_gst'])) { echo $PROLST['price_book_price_gst']; } ?>" type="text" class="quantity stock_text" />
              </td>
			 
               <td>
              <input id="multiple_item_excise_percent_<?php echo $itemcount; ?>" onkeyup="return purchase_multiplepopuptotal(event, <?php echo $itemcount; ?>)" name="multiple_item_excise_percent[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['price_book_price_sgst'])) { echo $PROLST['price_book_price_sgst']; } ?>" type="text" class="quantity stock_text" />
              </td>			 
			 <?php }  else if($item_igst_name == 1)   {	  ?>
              
               <td>
              <input id="multiple_item_igst_percent_<?php echo $itemcount; ?>" onkeyup="return purchase_multiplepopuptotal(event, <?php echo $itemcount; ?>)" name="multiple_item_igst_percent[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['price_book_price_igst'])) { echo $PROLST['price_book_price_igst']; } ?>" type="text" class="quantity stock_text" />
              </td>
              
              <?php } ?>
			  
			  <td>
              <input id="multiple_item_rate_<?php echo $itemcount; ?>" name="multiple_item_rate[<?php echo $itemcount; ?>]" readonly="readonly" type="text" class="quantity" value="" />
              </td>
              </tr>
              <?php $itemcount++; } ?>