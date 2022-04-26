<?php
									if(!empty($sales_order)) {
										$i = 1;
										foreach($sales_order as $Sales) { ?>
	
											<tr>
												<td>
                                                	<a href="javascript:void(0);" class="popup_selection_class sales_order_popup<?php echo $i;?>" onClick="get_sales_order_details('<?php echo $i;?>','<?php echo $Sales['sales_order_id'];?>');">
														<?php echo $Sales['sales_order_number'];?>
                                                    </a>
                                                    <input type="hidden" id="sales_order_id_<?php echo $i;?>" value="<?php echo $Sales['sales_order_id'];?>">
                                					<input type="hidden" id="sales_order_number_<?php echo $i;?>" value="<?php echo $Sales['sales_order_number'];?>">
												</td>
                                                <td>
													<?php echo $Sales['sales_order_customer_name'];?>
												</td>
												<td><?php echo $Sales['sales_order_requested_date'];?></td>
												<td><?php echo $Sales['sales_order_status'];?></td>
											</tr>
											<?php 
										$i++;
										}
									} 
									else{?>
										<tr>
											<td colspan="6" style="text-align:center;"> No Records Found </td>
										</tr>
									<?php }?>