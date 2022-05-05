<?php 
if(!empty($product_list)) { $itemcount = 0; foreach($product_list as $PROLST) { ?>
	  <tr>
	  <td class="checkbox"><input type="checkbox" class="itemcheckbox" id="checkbox<?php echo $itemcount; ?>" value="<?php echo $itemcount; ?>" name="item_check[]"></td>
	  <td>
	  <?php if(isset($PROLST['product_code'])) { echo $PROLST['product_code']; } ?>
	  <input id="item_id<?php echo $itemcount; ?>" name="item_id[<?php echo $itemcount; ?>]" value="<?php echo $PROLST['product_id']; ?>" type="hidden" />
	  <input id="item_code<?php echo $itemcount; ?>" name="item_code[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['product_code'])) { echo $PROLST['product_code']; } ?>" type="hidden" />
       <input id="item_inventory_id<?php echo $itemcount; ?>" name="item_inventory_id[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['inventory_id'])) { echo $PROLST['inventory_id']; } ?>" type="hidden" />
	  </td>
	  <td>
	  <?php if(isset($PROLST['product_mfr_part_number'])) { echo $PROLST['product_mfr_part_number']; } ?>
	  <input id="item_mfg_prtno<?php echo $itemcount; ?>" name="item_mfg_prtno[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['product_mfr_part_number'])) { echo $PROLST['product_mfr_part_number']; } ?>" type="hidden" />
	  </td>
	  <td>
	  <?php if(isset($PROLST['product_name'])) { echo $PROLST['product_name']; } ?>
	  <input id="item_name<?php echo $itemcount; ?>" name="item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['product_name'])) { echo $PROLST['product_name']; } ?>" type="hidden" />
	  </td>
       <td>
              <?php if(isset($PROLST['inventory_control_no'])) { echo $PROLST['inventory_control_no']; } ?>
              <input id="item_control_no<?php echo $itemcount; ?>" name="item_control_no[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['inventory_control_no'])) { echo $PROLST['inventory_control_no']; } ?>" type="hidden" />
              </td>
               <td>
              <?php if(isset($PROLST['inventory_batch_no'])) { echo $PROLST['inventory_batch_no']; } ?>
              <input id="item_batch_no<?php echo $itemcount; ?>" name="item_batch_no[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['inventory_batch_no'])) { echo $PROLST['inventory_batch_no']; } ?>" type="hidden" />
              </td>
               <td>
              <?php if(isset($PROLST['inventory_expiry_date'])) { echo $PROLST['inventory_expiry_date']; } ?>
              <input id="item_expiry_date<?php echo $itemcount; ?>" name="item_expiry_date[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['inventory_expiry_date'])) { echo $PROLST['inventory_expiry_date']; } ?>" type="hidden" />
              </td>
               <td>
              <?php if(isset($PROLST['inventory_arn_no'])) { echo $PROLST['inventory_arn_no']; } ?>
              <input id="item_arn_no<?php echo $itemcount; ?>" name="item_arn_no[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['inventory_arn_no'])) { echo $PROLST['inventory_arn_no']; } ?>" type="hidden" />
              </td>
	  <td>
	 <?php if(isset($PROLST['uom_name'])) { echo $PROLST['uom_name'];  } ?> 
	  <input id="UOM_id<?php echo $itemcount; ?>" name="UOM_id[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['uom_id'])) { echo $PROLST['uom_id']; } ?>" />
	  <input id="UOM_name<?php echo $itemcount; ?>" name="UOM_name[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['uom_name'])) { echo $PROLST['uom_name']; } ?>" />
	  </td>
	  <td>
	   <?php if(isset($PROLST['inventory_qty'] )) { echo $PROLST['inventory_qty'];  } ?> 
	  <input id="quantity<?php echo $itemcount; ?>" class="quantity numonly" name="quantity[<?php echo $itemcount; ?>]" type="hidden" value="<?php echo $PROLST['inventory_qty'];?>" />
	  </td>
	  <td>
	  <input id="cur_qty<?php echo $itemcount; ?>" class="quantity numonly" name="cur_qty[<?php echo $itemcount; ?>]" type="text" value="" onkeyup="return onkeyupfortotal_cac(<?php echo $itemcount; ?>)" />
	  </td>
	  <td>
	  <input id="adj_qty<?php echo $itemcount; ?>" class="quantity numonly" name="adj_qty[<?php echo $itemcount; ?>]" type="text" value=""  readonly="readonly" />
	  </td>
	  
	  </tr>
	  <?php $itemcount++; } } else { ?>
	  <tr>
	  <td colspan="6">
		No Records Found
	  </td>
	  </tr>
<?php } ?>