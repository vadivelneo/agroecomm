 <input id="poindent_po_oder_id" name="poindent_po_oder_id" type="hidden" value="<?php echo $poindent_po_oder_id;  ?>" />
             <?php 
			 //echo "<pre>"; print_r($product_list); exit;
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
             <?php if(isset($PROLST['uom_name'])) { echo $PROLST['uom_name'];  } ?> 
              <input id="multiple_item_uom_id_<?php echo $itemcount; ?>" name="multiple_item_uom_id[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['uom_id'])) { echo $PROLST['uom_id']; } ?>" />
              <input id="multiple_item_uom_name_<?php echo $itemcount; ?>" name="multiple_item_uom_name[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['uom_name'])) { echo $PROLST['uom_name']; } ?>" />
              </td>
              
              <td>
              <input id="multiple_item_qty_<?php echo $itemcount; ?>" onkeyup="return purchase_multiplepopuptotal(event, <?php echo $itemcount; ?>)" name="multiple_item_qty[<?php echo $itemcount; ?>]" type="text" class="quantity stock_text" value="" />
              </td>
              </tr>
              <?php $itemcount++; } ?>