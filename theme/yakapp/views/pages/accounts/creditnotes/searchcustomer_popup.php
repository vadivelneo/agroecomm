  <?php
				if(!empty($customer_data))
				{
					$i = 1;
		 			foreach($customer_data as $CUS_DATA)
					{
						?>
              			<tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1">
			                <td>
                                <a href="javascript:void(0);" class="popup_selection_class customer_popup<?php echo $i;?>" onClick="get_customer_details('<?php echo $i;?>','<?php echo $CUS_DATA['customer_code'];?>');">
                                    <?php echo $CUS_DATA['customer_code'];?>
                                </a>
                                <input type="hidden" id="customer_code_<?php echo $i;?>" value="<?php echo $CUS_DATA['customer_code'];?>">
                                <input type="hidden" id="customer_id_<?php echo $i;?>" value="<?php echo $CUS_DATA['customer_id'];?>">
								<input type="hidden" id="customer_pricebook_id_<?php echo $i;?>" value="<?php echo $CUS_DATA['customer_price_list'];?>">
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="popup_selection_class customer_popup<?php echo $i;?>" onClick="get_customer_details('<?php echo $i;?>','<?php echo $CUS_DATA['customer_name'];?>');">
                                    <?php echo $CUS_DATA['customer_name'];?>
                                </a>
                               <input type="hidden" id="customer_name_<?php echo $i;?>" value="<?php echo $CUS_DATA['customer_name'];?>">
                            </td>
			                       <td>
                               <?php echo $CUS_DATA['customer_category'];?>
                            </td>
			                       <td>
                                <?php echo $CUS_DATA['customer_email'];?>
                            </td>
                            <td>
                                <?php echo $CUS_DATA['customer_mobile'];?>
                            </td>
                             
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