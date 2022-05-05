<?php
									if(!empty($vendor_quatations)) {
										$i = 1;
										foreach($vendor_quatations as $Vendor) { ?>
	
											<tr>
												<td>
                                                	<a href="javascript:void(0);" class="popup_selection_class venodr_quatation_popup<?php echo $i;?>" onClick="get_vendor_quatation_details('<?php echo $i;?>','<?php echo $Vendor['vendor_quote_id'];?>');">
														<?php echo $Vendor['vendor_quote_qoute_no'];?>
                                                    </a>
                                                    <input type="hidden" id="vendor_quation_id_<?php echo $i;?>" value="<?php echo $Vendor['vendor_quote_id'];?>">
                                					<input type="hidden" id="vendor_quation_number_<?php echo $i;?>" value="<?php echo $Vendor['vendor_quote_qoute_no'];?>">
												</td>
                                                <td>
													<?php echo $Vendor['vendor_name'];?>
                                                     <input type="hidden" id="vendor_quation_vendor_id_<?php echo $i;?>" value="<?php echo $Vendor['vendor_id'];?>">
                                                      <input type="hidden" id="vendor_quation_vendor_name_<?php echo $i;?>" value="<?php echo $Vendor['vendor_name'];?>">
                                                       <input type="hidden" id="vendor_quation_vendor_code_<?php echo $i;?>" value="<?php echo $Vendor['vendor_code'];?>">
                                                       <input type="hidden" id="vendor_quation_req_date_<?php echo $i;?>" value="<?php echo $Vendor['vendor_quote_req_date'];?>">
												</td>
												<td>
                                                    <a href="javascript:void(0);" class="popup_selection_class venodr_quatation_popup<?php echo $i;?>" onClick="get_vendor_quatation_details('<?php echo $i;?>','<?php echo $Vendor['vendor_quote_id'];?>');">
                                                    <?php echo $Vendor['vendor_quote_met_req_no'];?>
                                                    </a>
                                                </td>
												<td><?php echo $Vendor['vendor_quote_req_date'];?></td>
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