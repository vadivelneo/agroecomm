<?php echo $this->load->view('pages/inventory_left_side');?>
<section>

	<div class="rightPanel" style="padding: 14px 20px; width:96%;">

		<div class='container-fluid editViewContainer'>

				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">View Adjustment Stock</h3>
					<div class="pull-right">
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
									<span class="redColor">*</span>Adjustment Stock Code
								</label>
							</td>
							<td class="fieldValue medium">
								<div class="row-fluid">
									<span class="span10">
										<div class="formError" id="adj_stk_codeError" style="margin-top: -30px;">
											<div class="formErrorContent">This field is required</div>
											<div class="formErrorArrow"></div>
										</div>
										<?php if(isset($view_adjstk->stock_adjustments_code)) {echo $view_adjstk->stock_adjustments_code; } ?> 
									</span>
								</div>
							</td>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Adjustment Date</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
								<div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id= "adj_stk_dateError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                    <span class="span10">
									 <?php if(($view_adjstk->stock_adjustments_adjustment_date)!= "0000-00-00"){echo date('d-m-Y',strtotime($view_adjstk->stock_adjustments_adjustment_date));}?>
                                    
                                    </span>
                                </div>
                            </td>
							 
							
							</tr>
							<tr>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Branch</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
										 <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id= "adj_stk_locError" style="margin-top: -30px;">
                                            <div class="formErrorContent">Select Branch </div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        
										 <?php if(isset($view_adjstk->location_name)) {echo $view_adjstk->location_name; } ?> 
                                    </span>
                                </div>
                            </td>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    Approved By
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <?php if(isset($view_adjstk->user_first_name)) {echo $view_adjstk->user_first_name; } ?> 
                                    </span>
                                 </div>
                             </td>
							
						</tr>
						<tr>
						 
							 <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    Status
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                       <?php if(isset($view_adjstk->stock_adjustments_status)) { echo ucfirst($view_adjstk->stock_adjustments_status); } ?>
                                    </span>
                                 </div>
                             </td>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                  Cause
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
										<?php if(isset($view_adjstk->stock_adjustmentse_cause)) { echo $view_adjstk->stock_adjustmentse_cause; } ?>
                                    </span>
                                 </div>
                             </td>
						</tr>
						<tr>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                  Sales Inovice Number
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
										<?php if(isset($view_adjstk->stock_adjustments_reason)) { echo $view_adjstk->stock_adjustments_reason; } ?>
                                    </span>
                                 </div>
                             </td>
                            <td class="fieldLabel medium">&nbsp;
                                
                            </td>
						</tr>
						

					</tbody>
				</table>

				<br />
				<br />
				 <div id="multiple_item_error" style="color: #FF0000; text-align:center;"></div>
				<span style="color:#FF0000; text-align:center; width:100%; height: 25px; float: left;" id="ind_error"></span>
				<table>
					<thead>
						<tr>
							
							<th>Item Code</th>
							<th>SKU</th>
							<th>Item Name</th>
                            <th>Control No</th>
                            <th>Batch No</th>
                            <th>Expiry Date</th>
                            <th>ARN No</th>
							<th>UOM</th>
							<th>System Quantity </th>
							<th>Current Quantity </th>
							<th>Adjustment Quantity </th>
						</tr>
                    </thead>
                    <tbody id ="items_list">
					
					  <?php if(!empty($view_adjtk_items)) { $itemcount = 1; foreach($view_adjtk_items as $ITEMS) { ?>
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
                            <?php if(isset($ITEMS['stk_adj_items_control_no'])) { echo $ITEMS['stk_adj_items_control_no']; } ?>
                            </td>
                             <td>
                            <?php if(isset($ITEMS['stk_adj_items_batch_no'])) { echo $ITEMS['stk_adj_items_batch_no']; } ?>
                            </td>
                             <td>
                            <?php if(isset($ITEMS['stk_adj_items_expiry_date'])) { echo $ITEMS['stk_adj_items_expiry_date']; } ?>
                            </td>
                             <td>
                            <?php if(isset($ITEMS['stk_adj_items_arn_no'])) { echo $ITEMS['stk_adj_items_arn_no']; } ?>
                            </td>
                            <td>
                           <?php if(isset($ITEMS['uom_name'])) { echo $ITEMS['uom_name'];  } ?> 
                           <input name="UOM_id[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['uom_id'])) { echo $ITEMS['uom_id']; } ?>" />
                           <input name="UOM_name[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['uom_name'])) { echo $ITEMS['uom_name']; } ?>" />
                           </td>
						   <td>
                           <?php if(isset($ITEMS['stk_adj_items_system_qty'])) { echo $ITEMS['stk_adj_items_system_qty'];  } ?> 
                            <input id="sys_qty<?php echo $itemcount; ?>" name="sys_qty[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['stk_adj_items_system_qty'])) { echo $ITEMS['stk_adj_items_system_qty']; } ?>" />
                            </td>
                           
                            <td>
                           <?php if(isset($ITEMS['stk_adj_items_current_qty'])) { echo $ITEMS['stk_adj_items_current_qty'];  } ?> 
                            <input id="pending_qty_<?php echo $itemcount; ?>" name="pending_qty[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['stk_adj_items_current_qty'])) { echo $ITEMS['stk_adj_items_current_qty']; } ?>" />
                            </td> 
							<td>
                           <?php if(isset($ITEMS['stk_adj_items_adjustment_qty'])) { echo $ITEMS['stk_adj_items_adjustment_qty'];  } ?> 
                            <input id="pending_qty_<?php echo $itemcount; ?>" name="pending_qty[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['stk_adj_items_adjustment_qty'])) { echo $ITEMS['stk_adj_items_adjustment_qty']; } ?>" />
                            </td>
							
                        </tr>
                         <?php $itemcount++; } } ?>

				</tbody>
					
				</table>
				<br />
				<br />
				<br />
				<br />
				<div class="row-fluid">
					<div class="pull-right">					
						<a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
					</div>
					<div class="clearfix"></div>
				</div>

				<br>
			
        </div>

	</div>

</section>