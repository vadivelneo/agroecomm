<table id="tblList">
				<thead>
				<tr>	
				<th>SKU</th>	
				<th>Item</th>
				<th>HSN/SAC</th>
				<th>Division</th>
				<th>Store</th>
				<th>UOM</th>
				<th>Brand</th>
				<th>Price</th>
                <th>Qty</th>	
				<th>Gross amt</th>
				<th>CGST amt</th>
				<th>SGST amt</th>
				
				</tr>
				</thead>
				<tbody id="disp_items">
				  
          <?php if(!empty($editpurchaseorder_items)) { $itemcount = 1; foreach($editpurchaseorder_items as $ITEMS) { ?>
                        <tr>
                            <td>
                            <?php if($ITEMS['product_sku']!= '') { echo $ITEMS['product_sku']; } else { echo '-'; } ?>
                            <input name="item_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_po_id'])) { echo $ITEMS['po_items_po_id']; } ?>" type="hidden" />
                            <input name="item_code[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_sku'])) { echo $ITEMS['product_sku']; } ?>" type="hidden" />
                            </td>
                            <td>
                            <?php if(isset($ITEMS['po_items_name'])) { echo $ITEMS['po_items_name']; } ?>
                            <input name="item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_name'])) { echo $ITEMS['po_items_name']; } ?>" type="hidden" />
                            </td>
							
							
							<td>
                            <?php if($ITEMS['po_items_hsn_sac'] != '') { echo $ITEMS['po_items_hsn_sac']; } else { echo '-'; } ?>
                            <input name="item_name_hsn_san[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_hsn_sac'])) { echo $ITEMS['po_items_hsn_sac']; } ?>" type="hidden" />
                            </td>
							
							
							
							<td>
                            <?php if(isset($ITEMS['division_name'])) { echo $ITEMS['division_name']; } ?>
                            <input name="item_division_name[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['division_name'])) { echo $ITEMS['division_name']; } ?>" type="hidden" />
                            </td>
							
							
							<td>
                            <?php if(isset($ITEMS['store_name'])) { echo $ITEMS['store_name']; } ?>
                            <input name="item_store_name[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['store_name'])) { echo $ITEMS['store_name']; } ?>" type="hidden" />
                            </td>
							
							
							<td>
                           <?php if(isset($ITEMS['uom_name'])) { echo $ITEMS['uom_name'];  } ?> 
                           <input name="UOM_id[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['uom_id'])) { echo $ITEMS['uom_id']; } ?>" />
                           <input name="UOM_name[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['uom_name'])) { echo $ITEMS['uom_name']; } ?>" />
                           </td>
							
							<td>
                            <?php if(isset($ITEMS['po_items_brand'])) { echo $ITEMS['po_items_brand']; } ?>
                            <input name="item_brand[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_brand'])) { echo $ITEMS['po_items_brand']; } ?>" type="hidden" />
                            </td>
							
							
                            <td>
                           <?php if(isset($ITEMS['po_items_priceperunit'])) { echo $ITEMS['po_items_priceperunit'];  } ?> 
                            <input name="items_priceperunit[<?php echo $itemcount; ?>]" type="hidden"  value="<?php if(isset($ITEMS['po_items_priceperunit'])) { echo $ITEMS['po_items_priceperunit']; } ?>" />
                            </td>
                            
                            <td>
                            
                           <?php if(isset($ITEMS['po_items_ord_qty'])) { echo $ITEMS['po_items_ord_qty'];  } ?> 
                            <input name="items_ord_qty[<?php echo $itemcount; ?>]" type="hidden"  value="<?php if(isset($ITEMS['po_items_ord_qty'])) { echo $ITEMS['po_items_ord_qty']; } ?>" class="quantity" />
                            </td>
							
                            <td>
                           <?php if(isset($ITEMS['po_items_gross_amount'])) { echo $ITEMS['po_items_gross_amount'];  } ?> 
                            <input  name="items_gross_amount[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['po_items_gross_amount'])) { echo $ITEMS['po_items_gross_amount']; } ?>" />
                            </td> 

							<td>
                           <?php if(isset($ITEMS['po_items_tax_amount'])) { echo $ITEMS['po_items_tax_amount'];  } ?> 
                            <input  name="items_tax_amount[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['po_items_tax_amount'])) { echo $ITEMS['po_items_tax_amount']; } ?>" />
                            </td>
							
							<td>
                           <?php if(isset($ITEMS['po_items_excise_amount'])) { echo $ITEMS['po_items_excise_amount'];  } ?> 
                            <input name="items_excise_amount[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['po_items_excise_amount'])) { echo $ITEMS['po_items_excise_amount']; } ?>" />
                            </td>
							
							<?php /*?><td>
                           <?php if(isset($ITEMS['po_items_net_amount'])) { echo $ITEMS['po_items_net_amount'];  } ?> 
                            <input  name="items_net_amount[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['po_items_net_amount'])) { echo $ITEMS['po_items_net_amount']; } ?>" />
                            </td><?php */?>
                        </tr>
                         <?php $itemcount++; } } ?>

				</tbody>
				</table>