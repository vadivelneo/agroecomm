<tr>
                <th>Customer Code</th>
                <th>Customer Name</th>
                <th>Category</th>
                <th>Email</th>
                <th>Mobile</th>
               
              </tr>
              <?php
				if(!empty($customer_data))
				{
					$i = 1;
		 			foreach($customer_data as $CUS_DATA)
					{
						?>
              			<tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1">
			                <td>
                                <a href="javascript:void(0);" class="popup_selection_class customer_popup<?php echo $i;?>" onClick="get_customer_details('<?php echo $i;?>','<?php echo $CUS_DATA['OFCR_USR_VALUE'];?>');">
                                    <?php echo $CUS_DATA['OFCR_USR_VALUE'];?>
                                </a>
                                <input type="hidden" id="customer_code_<?php echo $i;?>" value="<?php echo $CUS_DATA['OFCR_USR_VALUE'];?>">
                                <input type="hidden" id="customer_id_<?php echo $i;?>" value="<?php echo $CUS_DATA['OFCR_ID'];?>">
                                                       </td>
                            <td>
                                <a href="javascript:void(0);" class="popup_selection_class customer_popup<?php echo $i;?>" onClick="get_customer_details('<?php echo $i;?>','<?php echo $CUS_DATA['OFCR_FST_NME'];?>');">
                                    <?php echo $CUS_DATA['OFCR_FST_NME'];?>
                                </a>
                               <input type="hidden" id="customer_name_<?php echo $i;?>" value="<?php echo $CUS_DATA['OFCR_FST_NME'];?>">
                                <input type="hidden" id="customer_discounts_tax_<?php echo $i;?>" value="<?php echo $CUS_DATA['customer_discounts_tax'];?>">
								 <input type="hidden" id="customer_pricebook_id_<?php echo $i;?>" value="<?php echo $CUS_DATA['customer_price_list'];?>">
                            </td>
			                      
			                       <td>
                                <?php echo $CUS_DATA['OFCR_USR_EMAIL'];?>
                            </td>
                            <td>
                                <?php echo $CUS_DATA['OFCR_MOB'];?>
								
                               
                             
                               
                            
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