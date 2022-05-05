<?php
				if(!empty($sales_quote_data))
				{
					$i = 1;
		 			foreach($sales_quote_data as $SQ_DATA)
					{
						?>
              			<tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1">
			                <td>
                                <a href="javascript:void(0);" class="popup_selection_class sales_quote_popup<?php echo $i;?>" onClick="get_sales_quote_details('<?php echo $i;?>','<?php echo $SQ_DATA['sales_quote_id'];?>');">
                                    <?php echo $SQ_DATA['sales_quote_qoute_no'];?>
                                </a>
                                <input type="hidden" id="sales_quote_code_<?php echo $i;?>" value="<?php echo $SQ_DATA['sales_quote_qoute_no'];?>">
								<input type="hidden" id="sales_quote_id_<?php echo $i;?>" value="<?php echo $SQ_DATA['sales_quote_id'];?>">
                                <input type="hidden" id="customer_code_<?php echo $i;?>" value="<?php echo $SQ_DATA['customer_code'];?>">
                                <input type="hidden" id="customer_id_<?php echo $i;?>" value="<?php echo $SQ_DATA['customer_id'];?>">
								<input type="hidden" id="customer_pricebook_id_<?php echo $i;?>" value="<?php echo $SQ_DATA['customer_price_list'];?>">
                            </td>
                            <td>
                                
                                    <?php echo $SQ_DATA['customer_name'];?>
                                
                               <input type="hidden" id="customer_name_<?php echo $i;?>" value="<?php echo $SQ_DATA['customer_name'];?>">
                            </td>
			                       <td>
                               <?php echo $SQ_DATA['sales_quote_req_date'];?>
                            </td>
			                       <td>
                                <?php echo $SQ_DATA['sales_quote_cur_status'];?>
                            </td>
                           
                            <td>
                             
								<input type="hidden" id="customer_discounts_<?php echo $i;?>" value="<?php echo $SQ_DATA['customer_discounts'];?>">
                                <input type="hidden" id="customer_region_<?php echo $i;?>" value="<?php echo $SQ_DATA['customer_region'];?>">
                                <input type="hidden" id="customer_zone_<?php echo $i;?>" value="<?php echo $SQ_DATA['customer_zone'];?>">
                                <input type="hidden" id="customer_area_<?php echo $i;?>" value="<?php echo $SQ_DATA['customer_area'];?>">
                                <input type="hidden" id="customer_bill_address_<?php echo $i;?>" value="<?php echo $SQ_DATA['customer_billing_address'];?>">
                                <input type="hidden" id="customer_bill_country_<?php echo $i;?>" value="<?php echo $SQ_DATA['customer_billing_country_id'];?>">
                                <input type="hidden" id="customer_bill_state_<?php echo $i;?>" value="<?php echo $SQ_DATA['customer_billing_state_id'];?>">
                                <input type="hidden" id="customer_bill_city_<?php echo $i;?>" value="<?php echo $SQ_DATA['customer_billing_city_id'];?>">
                                <input type="hidden" id="customer_bill_zip_<?php echo $i;?>" value="<?php echo $SQ_DATA['customer_billing_zipcode'];?>">
                                <input type="hidden" id="customer_ship_country_<?php echo $i;?>" value="<?php echo $SQ_DATA['customer_shipping_country_id'];?>">
                                <input type="hidden" id="customer_ship_state_<?php echo $i;?>" value="<?php echo $SQ_DATA['customer_shipping_state_id'];?>">
                                <input type="hidden" id="customer_ship_city_<?php echo $i;?>" value="<?php echo $SQ_DATA['customer_shipping_city_id'];?>">
                                <input type="hidden" id="customer_ship_address_<?php echo $i;?>" value="<?php echo $SQ_DATA['customer_shipping_address'];?>">
                                <input type="hidden" id="customer_ship_zip_<?php echo $i;?>" value="<?php echo $SQ_DATA['customer_shipping_zipcode'];?>">
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