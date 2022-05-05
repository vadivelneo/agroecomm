

 
<?php echo $this->load->view('pages/inventory_left_side'); ?>
<section>

	<div class="rightPanel" style="padding: 14px 20px; width:96%;">

		<div class='container-fluid editViewContainer'>
			<form class="form-horizontal openingstkForm" id="openingstkForm" name="openingstkForm" method="post" action="<?php echo site_url('inventory/addopeningstock')?>">
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">View Opening Stock</h3>
					<div class="pull-right">
						<!--<button class="btn-success open_stk_add" type="submit" name="open_stk_add" id="open_stk_add"><strong>save</strong></button>-->
						<a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
					</div>
				</div>

				<table class="table table-bordered blockContainer showInlineTable equalSplit">
					<thead>
						<tr>
							<th class="blockHeader" colspan="4">Stock Details</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="fieldLabel medium">
								<label class="muted pull-right marginRight10px">
									<span class="redColor">*</span>Opening Stock Code
								</label>
							</td>
							<td class="fieldValue medium">
								<div class="row-fluid">
									<span class="span10">
										<div class="formError" id="open_stk_codeError" style="margin-top: -30px;">
											<div class="formErrorContent">This field is required</div>
											<div class="formErrorArrow"></div>
										</div>
										<?php if(isset($view_opstk->opening_stock_code)) {echo $view_opstk->opening_stock_code; } ?> 
                                       
									</span>
								</div>
							</td>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Product Type</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
								<div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id= "product_typeError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                    <span class="span10">
                                       	<?php if(isset($view_opstk->opening_stock_prd_type_id)) {echo $view_opstk->products_type_name; } ?> 
                                       
                                    </span>
                                </div>
                            </td>
							 
							
							</tr>
							<tr>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Added Location</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
										 <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id= "opt_stk_locError" style="margin-top: -30px;">
                                            <div class="formErrorContent">Enter Location</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        	<?php if(isset($view_opstk->location_name)) {echo $view_opstk->location_name; } ?> 
                           
                                    </span>
                                </div>
                            </td>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    Added date
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                          <?php if(($view_opstk->opening_stock_added_date)!= "0000-00-00"){echo date('d-m-Y',strtotime($view_opstk->opening_stock_added_date));}?>
                                   </span>
                                 </div>
                             </td>
						</tr>
						<tr>
						 <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    Approved By
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                      	<?php if(isset($view_opstk->user_first_name)) {echo $view_opstk->user_first_name; } ?> 
                                    </span>
                                 </div>
                             </td>
							 <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    Status
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                      	<?php if(isset($view_opstk->opening_stock_status)) {echo $view_opstk->opening_stock_status; } ?> 
                                    </span>
                                 </div>
                             </td>
						</tr>
						

					</tbody>
				</table>

				<br />
				<br />

				<table>
					<thead>
						<tr id ="disp_items">
							<th>Item Code</th>
							<th>SKU</th>
							<th>Item Name</th>
							<th>HSN/SAC</th>
							<th>Division</th>
							<th>Store</th>
							<th>Control No</th>
							<th>Batch No</th>
							<th>UOM</th>
							<th>Expiry Date</th>
							<th>Quantity </th>
                         </tr>
                    </thead>
                   
						
					<tbody id ="items_list">
					
					  <?php if(!empty($view_opstk_items)) { $itemcount = 1; foreach($view_opstk_items as $ITEMS) { ?>
                        <tr>
                            <td>
                            <?php if(isset($ITEMS['product_code'])) { echo $ITEMS['product_code']; } ?>
                            <input name="item_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['opt_stk_items_id'])) { echo $ITEMS['opt_stk_items_id']; } ?>" type="hidden" />
                            <input name="item_code[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_code'])) { echo $ITEMS['product_code']; } ?>" type="hidden" />
                            </td>
							
                            <td>
                            <?php if(isset($ITEMS['product_mfr_part_number'])) { echo $ITEMS['product_mfr_part_number']; } ?>
                            <input name="item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_mfr_part_number'])) { echo $ITEMS['product_mfr_part_number']; } ?>" type="hidden" />
                            </td> 
							
							
							
                            <td>
                            <?php if(isset($ITEMS['product_name'])) { echo $ITEMS['product_name']; } ?>
                            <input name="item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_name'])) { echo $ITEMS['product_name']; } ?>" type="hidden" />
                            </td> 
							
							<td>
                            <?php if(isset($ITEMS['opt_stk_item_name_hsn_sac'])) { echo $ITEMS['opt_stk_item_name_hsn_sac']; } ?>
                            <input name="item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['opt_stk_item_name_hsn_sac'])) { echo $ITEMS['opt_stk_item_name_hsn_sac']; } ?>" type="hidden" />
                            </td>
							
							<td>
                            <?php if(isset($ITEMS['division_name'])) { echo $ITEMS['division_name']; } ?>
                           
                            </td>
							
							<td>
                            <?php if(isset($ITEMS['store_name'])) { echo $ITEMS['store_name']; } ?>
                           
                            </td>
							
							
							<td>
                            <?php if(isset($ITEMS['opt_stk_item_control_no'])) { echo $ITEMS['opt_stk_item_control_no']; } ?>
                            <input name="item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['opt_stk_item_control_no'])) { echo $ITEMS['opt_stk_item_control_no']; } ?>" type="hidden" />
                            </td> 
							
							<td>
                            <?php if(isset($ITEMS['opt_stk_item_batch_no'])) { echo $ITEMS['opt_stk_item_batch_no']; } ?>
                            <input name="item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['opt_stk_item_batch_no'])) { echo $ITEMS['opt_stk_item_batch_no']; } ?>" type="hidden" />
                            </td> 
							
							
							
							
							
							
                            <td>
                           <?php if(isset($ITEMS['uom_name'])) { echo $ITEMS['uom_name'];  } ?> 
                           <input name="UOM_id[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['uom_id'])) { echo $ITEMS['uom_id']; } ?>" />
                           <input name="UOM_name[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['uom_name'])) { echo $ITEMS['uom_name']; } ?>" />
                           </td>
						   
						   <td>
						   <?php 
							 	if(isset($ITEMS['opt_stk_item_expiry_date'])){ 
										$originalDate=$ITEMS['opt_stk_item_expiry_date'];
										if($originalDate == '1970-01-01'){ echo '-'; }
										else
										{
											$newDate=date("d-m-Y", strtotime($originalDate));
											echo $newDate;
										}
										} 
							 ?>
						   
                          
                            </td> 
                           
                            <td>
                           <?php if(isset($ITEMS['opt_stk_items_qty'])) { echo $ITEMS['opt_stk_items_qty'];  } ?> 
                            <input id="pending_qty_<?php echo $itemcount; ?>" name="pending_qty[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['opt_stk_items_qty'])) { echo $ITEMS['opt_stk_items_qty']; } ?>" />
                            </td>
                        </tr>
                         <?php $itemcount++; } } ?>

				</tbody>
					
					
					
					</tbody>
				</table>
				<br />
				<br />
				<br />
				<br />
				<div class="row-fluid">
					<div class="pull-right">
						<!--<button class="btn-success open_stk_add" type="submit" name="open_stk_add" id="open_stk_add"><strong>save</strong></button>-->
						<a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
					</div>
					<div class="clearfix"></div>
				</div>

				<br>
			</form>
        </div>

	</div>

</section>
