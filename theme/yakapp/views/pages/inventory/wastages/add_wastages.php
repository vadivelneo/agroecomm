
<?php echo $this->load->view('pages/inventory_left_side'); 

 //echo "<pre>";print_r($so_list);exit;
?>
<section>

	<div class="rightPanel" style="padding: 14px 20px; width:96%;">

		<div class='container-fluid editViewContainer'>
			<form class="form-horizontal proicelistForm" id="proicelistForm" name="proicelistForm" method="post" action="<?php echo site_url('inventory/')?>">
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">Add Wastages</h3>
					<div class="pull-right">
						<!--<button class="btn-success priceBookAdd" type="submit" name="priceBookAdd" id="priceBookAdd"><strong>save</strong></button>-->
						<a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
					</div>
				</div>

				<table class="table table-bordered blockContainer showInlineTable equalSplit">
					<thead>
						<tr>
							<th class="blockHeader" colspan="4">Wastages Details</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="fieldLabel medium">
								<label class="muted pull-right marginRight10px">
									<span class="redColor">*</span>Wastages Code
								</label>
							</td>
							<td class="fieldValue medium">
								<div class="row-fluid">
									<span class="span10">
										<div class="formError" id="pricebooknameError" style="margin-top: -30px;">
											<div class="formErrorContent">This field is required</div>
											<div class="formErrorArrow"></div>
										</div>
										<input type="text" value="" name="pricebookname" class="input-large nameField" id="pricebookname"></span>
									</span>
								</div>
							</td>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Wastages Date</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
								<div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id= "product_groupError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                    <span class="span10">
                                       <input type="text" value="" name="pricebookname" class="input-large nameField" id="pricebookname"></span>
                                    </span>
                                </div>
                            </td>
							 
							
							</tr>
							<tr>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Branch</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
										 <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id= "product_secqError" style="margin-top: -30px;">
                                            <div class="formErrorContent">Enter Sequence Numbers</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                         <select	data-selected-value="" name="product_manufacturer" class="chzn-select" id="product_manufacturer">
                                            <option value="">Select an Option</option>
                                            <option value="">Main Office</option>
                                            <option value="">Branch Office</option>
                                             
                                        </select>
                                    </span>
                                </div>
                            </td>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    Wastages type
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <select	data-selected-value="" name="product_manufacturer" class="chzn-select" id="product_manufacturer">
                                            <option value="">Select an Option</option>
                                            <option value="">Finished Goods</option>
                                            <option value="">Purchase Materials</option>
                                            <option value="">Raw Materials</option>
                                           
                                        </select>
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
                                        <select	data-selected-value="" name="product_manufacturer" class="chzn-select" id="product_manufacturer">
                                            <option value="">Select an Option</option>
                                            <option value="">Project Manager</option>
                                            <option value="">Branch Manager</option>
                                            <option value="">Sales Manager</option>
                                          
                                           
                                        </select>
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
                                        <select	data-selected-value="" name="product_manufacturer" class="chzn-select" id="product_manufacturer">
                                            <option value="">Select an Option</option>
                                            <option value="">Draft</option>
                                            <option value="">Approved</option>
                                            <option value="">Completed</option>
                                            <option value="">cancelled</option>
                                           
                                        </select>
                                    </span>
                                 </div>
                             </td>
							
						</tr>
						<tr>
							 <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                  Reason
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <textarea class="row-fluid" id="purchse_ord_payment_terms" name="purchse_ord_payment_terms" ></textarea>
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

				<table>
					<thead>
						<tr>
							<th>Item Code</th>
							<th>Item Name</th>
							<th>UOM</th>
							<th>Quantity </th>
							<th> Cost </th>
							
						</tr>
                    </thead>
                    <tbody>
							<?php
			  
							if(!empty($product_list))
							{
								$itemcount = 1; 
								foreach($product_list as $PROLST) 
								{ 
								?>
							<tr>
								<td>
									<?php if(isset($PROLST['product_code'])) { echo $PROLST['product_code']; } ?>
                                    <input id="item_id_<?php echo $itemcount; ?>" name="item_id[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['product_id'])) { echo $PROLST['product_id']; } ?>" type="hidden" />
                                    <input id="item_code_<?php echo $itemcount; ?>" name="item_code[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['product_code'])) { echo $PROLST['product_code']; } ?>" type="hidden" />
								</td>
								<td>
									<?php if(isset($PROLST['product_name'])) { echo $PROLST['product_name']; } ?>
									<input id="item_name_<?php echo $itemcount; ?>" name="item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['product_name'])) { echo $PROLST['product_name']; } ?>" type="hidden" />
                                    <input id="item_uom_id_<?php echo $itemcount; ?>" class="quantity" name="item_uom_id[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['product_stock_uom_id'])) { echo $PROLST['product_stock_uom_id']; } ?>" />
								</td>
								<td>
									<input id="item_selling_price_<?php echo $itemcount; ?>" onkeyup="return multiplepopuptotal(<?php echo $itemcount; ?>)" class="quantity" name="item_selling_price[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($PROLST['product_selling'])) { echo $PROLST['product_selling']; } ?>" />
								</td>
                                <td>
									<input id="item_mrp_<?php echo $itemcount; ?>" onkeyup="return multiplepopuptotal(<?php echo $itemcount; ?>)" class="quantity" name="item_mrp[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($PROLST['product_mrp'])) { echo $PROLST['product_mrp']; } ?>" />
								</td>
                                <td>
									<input id="item_discount_percentage_<?php echo $itemcount; ?>" class="quantity" name="item_discount_percentage[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($PROLST['product_discounts'])) { echo $PROLST['product_discounts']; } ?>" />
								</td>
                                <td>
									<input id="item_discount_amount_<?php echo $itemcount; ?>" class="quantity" name="item_discount_amount[<?php echo $itemcount; ?>]" type="text" value="" />
								</td>
								<td>
									<input id="item_vat_<?php echo $itemcount; ?>" class="quantity" name="item_vat[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($PROLST['product_vat_tax'])) { echo $PROLST['product_vat_tax']; } ?>" />
								</td>
								<td>
									<input id="item_gst_<?php echo $itemcount; ?>" class="quantity" name="item_gst[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($PROLST['product_gst_tax'])) { echo $PROLST['product_gst_tax']; } ?>" />
								</td>
								<td>
									<input id="item_cst_<?php echo $itemcount; ?>" class="quantity" name="item_cst[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($PROLST['product_cst_tax'])) { echo $PROLST['product_cst_tax']; } ?>" />
								</td>
								<td>
									<input id="item_ser_tax_<?php echo $itemcount; ?>" class="quantity" name="item_ser_tax[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($PROLST['product_service_tax'])) { echo $PROLST['product_service_tax']; } ?>" />
								</td>
								<td>
									<input id="item_exc_<?php echo $itemcount; ?>" class="quantity" name="item_exc[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($PROLST['product_excise_duty_tax'])) { echo $PROLST['product_excise_duty_tax']; } ?>" />
								</td>
								<!--<td>
									<input id="item_tax_perncentage_<?php echo $itemcount; ?>" class="quantity" name="item_tax_perncentage[<?php echo $itemcount; ?>]" type="hidden" value="" />
                                    <input id="item_tax_amount_<?php echo $itemcount; ?>" class="quantity" name="item_tax_amount[<?php echo $itemcount; ?>]" type="text" value="" />
								</td>-->
								<!--<td>
									<input id="item_net_amount_<?php echo $itemcount; ?>" class="quantity" name="item_net_amount[<?php echo $itemcount; ?>]" type="text" value="" />
								</td>-->
							</tr>
						<?php 
						$itemcount++; 
						} 
							}
						?>
					</tbody>
				</table>
				<br />
				<br />
				<br />
				<br />
				<div class="row-fluid">
					<div class="pull-right">
						<!--<button class="btn-success priceBookAdd" type="submit" name="priceBookAdd" id="priceBookAdd"><strong>save</strong></button>-->
						<a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
					</div>
					<div class="clearfix"></div>
				</div>

				<br>
			</form>
        </div>

	</div>

</section>
