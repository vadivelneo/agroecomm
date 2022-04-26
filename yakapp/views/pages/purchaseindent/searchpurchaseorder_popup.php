 <?php //echo "<PRE>"; print_r($purchase_order);
				if(!empty($purchase_order))
				{
					$i = 1;
		 			foreach($purchase_order as $POORD)
					{
						?>
              			<tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1">
			                <td>
                                <a href="javascript:void(0);" class="popup_selection_class purchase_order_popup<?php echo $i;?>" onClick="get_purchase_order_details('<?php echo $i;?>','<?php echo $POORD['po_po_id'];?>');">
                                    <?php echo $POORD['po_po_no'];?>
                                </a>
                                <input type="hidden" id="purchase_order_no_<?php echo $i;?>" value="<?php echo $POORD['po_po_no'];?>">
                                <input type="hidden" id="purchase_order_id_<?php echo $i;?>" value="<?php echo $POORD['po_po_id'];?>">

                            </td>
                            <td>
                               <input type="hidden" id="vdrquo_vendor_name_<?php echo $i;?>" value="<?php echo $POORD['vendor_name'];?>"><?php echo $POORD['vendor_name'];?>
							   <input type="hidden" id="vdrquo_vendor_id_<?php echo $i;?>" value="<?php echo $POORD['vendor_id'];?>">
                                <input type="hidden" id="po_store_id_<?php echo $i;?>" value="<?php echo $POORD['po_store_id'];?>">
                               <input type="hidden" id="po_store_division_id_<?php echo $i;?>" value="<?php echo $POORD['po_store_division_id'];?>">
                               
                            </td>
			                <td>
                               <?php echo $POORD['po_req_date'];?>
                            </td>
			                <td><?php echo $POORD['po_po_status'];?></td>
              			</tr>
		             <?php 
					 $i++;
					 }
				}
				else
				{
					?>
              	<tr>
                	<td colspan="6" style="text-align:center;"> No Records Found </td>
              	</tr>
              	<?php 
				} 
				?>