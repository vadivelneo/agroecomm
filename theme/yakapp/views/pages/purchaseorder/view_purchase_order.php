<?php echo $this->load->view('pages/purchase_left_side'); ?>
<section>
	<div class="rightPanel" style="padding: 14px 20px; width:96%;">
		<div class='container-fluid editViewContainer'>
			<form class="form-horizontal recordEditView" id="EditView" name="EditView" method="post" action="#" enctype="multipart/form-data">
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">View Purchase Order</h3>
					<span class="pull-right">
					<!--	<button class="btn-success po_update_details" name="po_update_details" type="submit"><strong>Save</strong></button>-->
						 <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                          <a href="<?php echo site_url('purchaseorder/print_purchaseorder/'); ?>/<?php echo $editpurchaseorder->po_po_id; ?>"  title="Print" target="_blank"><span class="icon-print" ></span></a>
                    </span>
                </div>
				<br />
				<br />
				               
                <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">PO Details</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
						
							<td class="fieldLabel medium">
									<label class="muted pull-right marginRight10px"><span class="redColor">*</span>Purchase Order No</label>
								</td>
                                <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="purchse_ord_numError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <?php if(isset($editpurchaseorder->po_po_no)){ echo $editpurchaseorder->po_po_no;}?> 
                                    </span>
                                </div>
                            </td>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Vendor Name</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="vdrquo_vendor_nameError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                         <div class="row-fluid input-prepend input-append">
                            				 <?php if(isset($editpurchaseorder->vendor_name)){ echo $editpurchaseorder->vendor_name;}?>
                                            
                                            <input type="hidden" id="vdrquo_vendor_id" name="vdrquo_vendor_id" value="">
                                            <input type="hidden" id="vdrquo_vendor_code" name="vdrquo_vendor_code" value="">
                                        </div>
                                        
                                    </span>
                                </div>
                            </td>
                         <!--   <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Vendor Name</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="purchse_ordvendor_nameError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="purchse_ordvendor_name" name="purchse_ordvendor_name" type="text" class="input-large nameField" />
                                    </span>
                                </div>
                            </td>-->
							
                            
                        </tr>
						<tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Requested Date</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="vdrquo_vendor_nameError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                        </div>
										 <?php
                                        	if(isset($editpurchaseorder->po_req_date)){ 
										$originalDate=$editpurchaseorder->po_req_date;
										if($originalDate == '0000-00-00'){ echo '-'; }
										else
										{
											$newDate=date("d-m-Y", strtotime($originalDate));
											echo $newDate;
										}
										} 
										?> 
                                       
                                    </span>
                                </div>
                            </td>
							
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Valid till</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="purchse_ord_validError">
                                        <div class="formErrorContent">This field is required</div>
                                        <div class="formErrorArrow"></div>
                                        </div>
                                        <?php
                                        	if(isset($editpurchaseorder->po_valid_til)){ 
										$originalDate=$editpurchaseorder->po_valid_til;
										if($originalDate == '0000-00-00'){ echo '-'; }
										else
										{
											$newDate=date("d-m-Y", strtotime($originalDate));
											echo $newDate;
										}
										} 
										?> 
									</span>                               
								</div>
                            </td>
                        </tr>
						
              <tr>
             				<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Vendor Quotation No</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="vdrquo_mr_reqnumError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                     <?php if(isset($editpurchaseorder->po_ventor_qoute_no)){ echo $editpurchaseorder->po_ventor_qoute_no;}?> 
                                    </span>
                                </div>
                            </td>
                           <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Deliverable Date</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="purchse_ord_validError">
                                        <div class="formErrorContent">This field is required</div>
                                        <div class="formErrorArrow"></div>
                                        </div>
                                        <?php
                                        	if(isset($editpurchaseorder->po_delivery_date)){ 
										$originalDate=$editpurchaseorder->po_delivery_date;
										if($originalDate == '0000-00-00'){ echo '-'; }
										else
										{
											$newDate=date("d-m-Y", strtotime($originalDate));
											echo $newDate;
										}
										} 
										?> 
									</span>                               
								</div>
                            </td>
              </tr>	
			  <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    Division
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                       <?php if(isset($editpurchaseorder->division_name)){ echo $editpurchaseorder->division_name;}?>  
                                    </span>
                                 </div>
                             </td> 
							 
							 <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    Store
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                       <?php if(isset($editpurchaseorder->store_name)){ echo $editpurchaseorder->store_name;}?>  
                                    </span>
                                 </div>
                             </td>
                           
                        </tr>
                        <tr>
						<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    Transport Name
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                       <?php if(isset($editpurchaseorder->shipping_carrier_name)){ echo $editpurchaseorder->shipping_carrier_name;}?> 
                                    </span>
                                 </div>
                             </td>
                             <td class="fieldLabel medium">
                             </td>
                             <td>
                             </td>
                        </tr>
                        
                    </tbody>
                    
                </table>
                <br />
               
				<table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">Terms & Conditions</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    Payment Mode
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                       <?php if(isset($editpurchaseorder->payment_mode_name)){ echo $editpurchaseorder->payment_mode_name;}?> 
                                    </span>
                                 </div>
                             </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Credit Limit</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
										 <?php if(isset($editpurchaseorder->po_credit_limit)){ echo $editpurchaseorder->po_credit_limit;}?> 
                                       <!-- <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <select name="requistation_status" class="chzn-select" id="requistation_status">
                                            <option value="draft" readonly>Draft</option>
                                        </select>-->
                                    </span>
                                </div>
                            </td>
                        </tr>
						 <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    Transaction Date
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                       <?php if(isset($editpurchaseorder->po_trans_date)){ $originalDate=$editpurchaseorder->po_trans_date;
									   $newDate=date("d-m-Y", strtotime($originalDate));
									   echo $newDate;}?> 
                                    </span>
                                 </div>
                             </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Status</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                    
                                      <?php if(isset($editpurchaseorder->po_po_status)){ echo $editpurchaseorder->po_po_status;}?> 
										 
                                       <!-- <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <select name="requistation_status" class="chzn-select" id="requistation_status">
                                            <option value="draft" readonly>Draft</option>
                                        </select>-->
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                   Terms & Conditions
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <?php if(isset($editpurchaseorder->po_terms)){ echo $editpurchaseorder->po_terms;}?> 
                                    </span>
                                 </div>
                             </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                  Payment Terms
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                         <?php if(isset($editpurchaseorder->po_payment_terms)){ echo $editpurchaseorder->po_payment_terms;}?> 
                                    </span>
                                 </div>
                             </td>
                        </tr>
						
                        

                    </tbody>
                    
                </table>
						
                <br>
                
                <div class="row-fluid">
                    <div class="pull-right">
                       <!-- <a class="btn btn-success" name="vendor_add_details" id="singleitem" href="javascript:void(0);"><strong>Add Single Item</strong></a>
                        <a class="btn btn-success" name="vendor_add_details" id="multipleitems"><strong>Add Multiples Item</strong></a>-->
                    </div>
                    <div class="clearfix"></div>
                </div>
				 <input type ="hidden" value="0" name="last_table_id " id="last_table_id">
				 <input type ="hidden" value="<?php echo count($editpurchaseorder_items); ?>" name="count_of_items " id="count_of_items">
                <br /> 
				 <br>
				<table id="tblList">
				<thead>
				<tr>	
				
                <th>Material Code</th>
        		<th>Item</th>
        		<th>HSN/SAC</th>
				<!--<th>Batch No</th>
				<th>Expiry Date</th>-->
                <th>Price</th>	
				<th>Qty</th>
                <th>Gross amt</th>
				<th>Dis.(%)</th>
				<th>Dis. amt</th>
                
                <?php $po_igst = $editpurchaseorder->po_igst;
				 if($po_igst == 0){?>
                <th>CGST(%)</th>
				<th>CGST amt</th>
				<th>SGST(%)</th>
				<th>SGST amt</th>
                <?php } 
				else if($po_igst == 1)
				{
				?>
                <th>IGST(%)</th>
				<th>IGST amt</th>
                <?php } ?>
				<th>Net amt</th>
               
				</tr>
				</thead>
				<tbody id="disp_items">
				<?php   
				if(!empty($editpurchaseorder_items)) { $itemcount = 1; foreach($editpurchaseorder_items as $ITEMS) { ?>
                       <tr>
                   <td><a href="javascript:void(0);" id="item_code_value_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['product_code'])) { echo $ITEMS['product_code']; } ?></a>
                        <input id="item_code_<?php echo $itemcount; ?>" name="item_code[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_code'])) { echo $ITEMS['product_code']; } ?>" type="hidden" />
                        <input id="item_id_<?php echo $itemcount; ?>" name="item_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_item_id'])) { echo $ITEMS['po_items_item_id']; } ?>" type="hidden" /></td>
                      
                      <td><a href="javascript:void(0);" id="item_name_value_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['product_name'])) { echo $ITEMS['product_name']; } ?></a>
                     <?php /*?> <br /><a href="javascript:void(0);"><?php if(isset($ITEMS['po_items_name_desc'])) { echo $ITEMS['po_items_name_desc']; } ?></a><?php */?>
                        <input id="item_name_<?php echo $itemcount; ?>" name="item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_name'])) { echo $ITEMS['product_name']; } ?>" type="hidden" /></td>
                  
						<td><a href="javascript:void(0);" id="product_hsn_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['po_items_hsn_sac'])) { echo $ITEMS['po_items_hsn_sac']; } ?></a>
                        <input id="product_hsn_<?php echo $itemcount; ?>" name="product_hsn[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_hsn_sac'])) { echo $ITEMS['po_items_hsn_sac']; } ?>" type="hidden" /></td>
				
                      <td><a href="javascript:void(0);" id="item_priceperunit_value_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['po_items_priceperunit'])) { echo $ITEMS['po_items_priceperunit']; } ?></a>
                        <input id="item_priceperunit_<?php echo $itemcount; ?>" name="item_priceperunit[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_priceperunit'])) { echo $ITEMS['po_items_priceperunit']; } ?>" type="hidden" /></td>
                      <td><a href="javascript:void(0);" id="item_qty_value_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['po_items_ord_qty'])) { echo $ITEMS['po_items_ord_qty']; } ?></a>
                        <input id="item_qty_<?php echo $itemcount; ?>" class="quantity" name="item_qty[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_ord_qty'])) { echo $ITEMS['po_items_ord_qty']; } ?>" type="hidden" /></td>
                      <td><a href="javascript:void(0);" id="item_gross_amount_value_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['po_items_gross_amount'])) { echo $ITEMS['po_items_gross_amount']; } ?></a>
                        <input id="item_gross_amount_<?php echo $itemcount; ?>" name="item_gross_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_gross_amount'])) { echo $ITEMS['po_items_gross_amount']; } ?>" type="hidden" /></td>
                        <td><a href="javascript:void(0);" id="item_discount_percent_value_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['po_items_discounts_percentage'])) { echo $ITEMS['po_items_discounts_percentage']; } ?></a>
                        <input id="item_discount_percent_<?php echo $itemcount; ?>" name="item_discount_percent[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_discounts_percentage'])) { echo $ITEMS['po_items_discounts_percentage']; } ?>" type="hidden" /></td>
                      <td><a href="javascript:void(0);" id="item_discount_amount_value_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['po_items_discounts_amount'])) { echo $ITEMS['po_items_discounts_amount']; } ?></a>
                        <input id="item_discount_amount_<?php echo $itemcount; ?>" name="item_discount_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_discounts_amount'])) { echo $ITEMS['po_items_discounts_amount']; } ?>" type="hidden" /></td>
                     <?php /* <td><a href="javascript:void(0);" id="item_tax_percent_value_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['po_items_tax_percent'])) { echo $ITEMS['po_items_tax_percent']; } ?></a>
                        <input id="item_tax_percent_<?php echo $itemcount; ?>" name="item_tax_percent[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_tax_percent'])) { echo $ITEMS['po_items_tax_percent']; } ?>" type="hidden" />
                        <input id="item_vat_<?php echo $itemcount; ?>" name="item_vat[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_vat'])) { echo $ITEMS['po_items_vat']; } ?>" type="hidden" />
                        <input id="item_gst_<?php echo $itemcount; ?>" name="item_gst[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_cst'])) { echo $ITEMS['po_items_cst']; } ?>" type="hidden" />
                        <input id="item_cst_<?php echo $itemcount; ?>" name="item_cst[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_gst'])) { echo $ITEMS['po_items_gst']; } ?>" type="hidden" />
                        <input id="item_serv_tax_<?php echo $itemcount; ?>" name="item_serv_tax[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_service_tax'])) { echo $ITEMS['po_items_service_tax']; } ?>" type="hidden" />
                        <input id="item_exc_<?php echo $itemcount; ?>" name="item_exc[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_ex_duty'])) { echo $ITEMS['po_items_ex_duty']; } ?>" type="hidden" /></td> */?>
						 
						<?php if($po_igst == 0){?>
                         <td><a href="javascript:void(0);" id="multiple_item_tax_percent_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['po_items_tax_percent'])) { echo $ITEMS['po_items_tax_percent']; } ?></a>
                        <input id="item_discount_amount_<?php echo $itemcount; ?>" name="multiple_item_tax_percent[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_tax_percent'])) { echo $ITEMS['po_items_tax_percent']; } ?>" type="hidden" /></td>
             
                      <td><a href="javascript:void(0);" id="item_tax_amount_value_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['po_items_tax_amount'])) { echo $ITEMS['po_items_tax_amount']; } ?></a>
                        <input id="item_tax_amount_<?php echo $itemcount; ?>" name="item_tax_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_tax_amount'])) { echo $ITEMS['po_items_tax_amount']; } ?>" type="hidden" /></td>
						
						  <td><a href="javascript:void(0);" id="multiple_item_excise_percent_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['po_items_excise_percent'])) { echo $ITEMS['po_items_excise_percent']; } ?></a>
                        <input id="multiple_item_excise_percent_<?php echo $itemcount; ?>" name="multiple_item_excise_percent[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_excise_percent'])) { echo $ITEMS['po_items_excise_percent']; } ?>" type="hidden" /></td>
						 
						 <td><a href="javascript:void(0);" id="item_excise_amount_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['po_items_excise_amount'])) { echo $ITEMS['po_items_excise_amount']; } ?></a>
                        <input id="item_excise_amount_<?php echo $itemcount; ?>" name="item_excise_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_excise_amount'])) { echo $ITEMS['po_items_excise_amount']; } ?>" type="hidden" /></td>
                        
                        <?php } else if($po_igst == 1){ ?>
                        
                        <td><a href="javascript:void(0);" id="multiple_item_igst_percent_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['po_items_igst_percent'])) { echo $ITEMS['po_items_igst_percent']; } ?></a>
                        <input id="multiple_item_igst_percent_<?php echo $itemcount; ?>" name="multiple_item_igst_percent[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_igst_percent'])) { echo $ITEMS['po_items_igst_percent']; } ?>" type="hidden" /></td>
						 
						 <td><a href="javascript:void(0);" id="multiple_item_igst_amount_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['po_items_igst_amount'])) { echo $ITEMS['po_items_igst_amount']; } ?></a>
                        <input id="multiple_item_igst_amount_<?php echo $itemcount; ?>" name="multiple_item_igst_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_igst_amount'])) { echo $ITEMS['po_items_igst_amount']; } ?>" type="hidden" /></td>
                         <?php } ?>
                        
                        
                      <td><a href="javascript:void(0);" id="item_net_amount_value_<?php echo $itemcount; ?>"> <?php if(isset($ITEMS['po_items_net_amount'])) { echo $ITEMS['po_items_net_amount']; } ?></a>
                        <input id="item_net_amount_<?php echo $itemcount; ?>" name="item_net_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_net_amount'])) { echo $ITEMS['po_items_net_amount']; } ?>" type="hidden" /></td>
                       
                    </tr>
                    <?php $itemcount++; } } ?>
				
				</tbody>
				</table>
                
                <br />
                 <div id="tax_group_calculation">
                 <?php //echo "<PRE>"; print_r($tax_group);
				 if(!empty($tax_group)) { $taxcount = 0; foreach($tax_group as $TG) {  ?>
                 
					<table class="tax_group_table table table-bordered blockContainer showInlineTable equalSplit">
                    	<tbody>
                            <tr>
                                <td class="tax_group_lable">
                                    <label>Total Gross Amount</label>
                                </td>
                                <td>
                                    <?php echo $TG['tax_group_total_gross_amount']; ?>
                                </td>
                            </tr>
                    		<tr>
                            	<td class="tax_group_lable">
                                	<label>Total Discount</label>
                                </td>
                                <td>
                                	<?php echo $TG['tax_group_total_disocunt_amount']; ?>
                                </td>
                             </tr>
                             <tr>
                             	<td class="tax_group_lable">
                                	<label>Total Gross Amount Without Tax</label>
                                </td>
                                <td>
                                	<?php echo $TG['tax_group_without_tax_gross_amount']; ?>
                                </td>
                             </tr>
                              <?php if($po_igst == 0){ ?>
                             <tr>
                             	<td class="tax_group_lable">
                                	<label>CGST Amount</label>
                                </td>
                                <td>
                                	<?php echo $TG['tax_group_tax_amount']; ?>
                                </td>
                             </tr>
							 <tr>
                             	<td class="tax_group_lable">
                                	<label>SGST Amount</label>
                                </td>
                                <td>
                                	<?php echo $TG['excise_group_excise_amount']; ?>
                                </td>
                             </tr>
                              <?php } else if($po_igst == 1){ ?>
                              <tr>
                             	<td class="tax_group_lable">
                                	<label>IGST Amount</label>
                                </td>
                                <td>
                                	<?php echo $TG['tax_group_igst_amount']; ?>
                                </td>
                             </tr>
                             <?php } ?>
							 
                             <tr>
                                 <td class="tax_group_lable">
                                 <label>Total Gross Amount With Tax</label>
                                 </td>
                                 <td>
                                 <?php echo $TG['tax_group_with_tax_gross_amount']; ?>
                                 </td>
                             </tr>
                         </tbody>
                     </table><br />
                     <?php } } ?>
                 </div>
                               
                <br />
				
			 <table class="table table-bordered blockContainer showInlineTable equalSplit">
				
				
				<tbody>
				<tr>
				<td class="fieldLabel medium">
					<span class="tot_error" id="add_itemError">
                 Please Enter Total Gross Amount
                   </span>
					<label class="muted pull-right marginRight10px">
						Total Gross Amount
					</label>
				</td>
				
				<td class="fieldLabel medium" style="width:20%;">
					<p class="amount_calc"><?php if(isset($editpurchaseorder_total->po_total_gross_amount)){ echo $editpurchaseorder_total->po_total_gross_amount;}?></p>
				</td>
				
			</tr>
            <tr>
				<!--<td class="fieldLabel medium">
					<label class="muted pull-right marginRight10px">
						Total Tax (%)
					</label>
				</td>
				<td class="fieldLabel medium" style="width:20%;">
					<p class="amount_calc"><?php if(isset($editpurchaseorder_total->po_total_tax_percentage)){ echo $editpurchaseorder_total->po_total_tax_percentage;}?></p>
				</td>
			</tr>-->
           
            <!--<tr>
				<td class="fieldLabel medium">
					<label class="muted pull-right marginRight10px">
						Total Discount (%)
					</label>
				</td>
				<td class="fieldLabel medium" style="width:20%;">
					<p class="amount_calc"><?php if(isset($editpurchaseorder_total->po_total_discount_percentage)){ echo $editpurchaseorder_total->po_total_discount_percentage;}?></p>
				</td>
			</tr>-->
            <tr>
				<td class="fieldLabel medium">
					<label class="muted pull-right marginRight10px">
						Total Discount Amount
					</label>
				</td>
				<td class="fieldLabel medium" style="width:20%;">
					<p class="amount_calc"><?php if(isset($editpurchaseorder_total->po_total_discount_amount)){ echo $editpurchaseorder_total->po_total_discount_amount;}?></p>
				</td>
			</tr>
             <tr>
				<td class="fieldLabel medium">
					<label class="muted pull-right marginRight10px">
						Total Tax Amount
					</label>
				</td>
				<td class="fieldLabel medium" style="width:20%;">
					<p class="amount_calc"><?php if(isset($editpurchaseorder_total->po_total_tax_amount)){ echo $editpurchaseorder_total->po_total_tax_amount;}?></p>
				</td>
			</tr>
			<tr>
				<td class="fieldLabel medium">
					<label class="muted pull-right marginRight10px">
						Shipping & Handling Charges
					</label>
				</td>
				
				<td class="fieldLabel medium" style="width:20%;">
					<p class="amount_calc"><?php if(isset($editpurchaseorder_total->po_total_shipping_charges)){ echo $editpurchaseorder_total->po_total_shipping_charges;}?></p>
				</td>
				
			</tr>
			<tr>
				<td class="fieldLabel medium">
					<label class="muted pull-right marginRight10px">
						Shipping Tax
					</label>
				</td>
				
				<td class="fieldLabel medium" style="width:20%;">
					<p class="amount_calc"><?php if(isset($editpurchaseorder_total->po_total_shipping_tax)){ echo $editpurchaseorder_total->po_total_shipping_tax;}?></p>
				</td>
			</tr>
			<!--<tr>
				<td class="fieldLabel medium">
					<label class="muted pull-right marginRight10px">
						Adjustment
					</label>
				</td>
				
				<td class="fieldLabel medium" style="width:20%;">
					<p class="amount_calc"><?php if(isset($editpurchaseorder_total->po_adjustment)){ echo $editpurchaseorder_total->po_adjustment;}?></p>
				</td>
			</tr>-->
			<tr>
				<td class="fieldLabel medium">
					 <span class="tot_net_error" id="add_itemError">
                 Please Enter Grand Total
                   </span>	
					<label class="muted pull-right marginRight10px">
						Grand Total
					</label>
				</td>
				
				<td class="fieldLabel medium" style="width:20%;">
					<p class="amount_calc"><?php if(isset($editpurchaseorder_total->po_grand_total)){ echo $editpurchaseorder_total->po_grand_total;}?></p>
				</td>
			</tr>
			</tbody>
		</table>
                <br />				
                <div class="row-fluid">
                    <div class="pull-right">
                       <!-- <button class="btn-success po_update_details" type="submit" name="po_update_details" id="po_update_details"><strong>Save</strong></button>-->
                        <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <br>
            
            </form>
				
          </div>

      </div>
	
    
     
</section>


