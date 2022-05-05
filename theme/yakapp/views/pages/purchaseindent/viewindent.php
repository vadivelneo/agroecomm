<?php echo $this->load->view('pages/purchase_left_side'); ?>

<section>
	<div class="rightPanel" style="padding: 14px 20px; width:96%;">
		<div class='container-fluid editViewContainer'>
			<form class="form-horizontal recordEditView" id="EditView" name="EditView" method="post" action="<?php echo site_url('purchaseindent/edit_po_indent').'/'.$this->uri->segment('3'); ?>" enctype="multipart/form-data">
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">View GRN</h3>
					<span class="pull-right">
                    <a href="<?php echo site_url('purchaseindent/print_po_indent');?>/<?php echo $this->uri->segment('3'); ?>" class="full_print" ><img src="<?php echo base_url();?>resources/images/print.png" height="25" alt="Print" /></a>
 					 <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </span>
                </div>
				<br>
        <br>
				 <div class="row-fluid">
                    <!--<div class="pull-right">
                      <a class="btn btn-success" name="" id="" href="javascript:void(0);"><strong>Create from Purchase Order</strong></a>
                    </div>-->
                    <div class="clearfix"></div>
                </div>
                
                <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">GRN Details</th>
                        </tr>
                    </thead>
                    
                    <tbody>
						<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>PO Reference No</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="purchse_ind_quonumError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                         <div class="row-fluid input-prepend input-append">
                                         <?php if(isset($edit_indent->po_reference_number)) {echo $edit_indent->po_reference_number; } ?>
                                   <!-- <span id="plus_purchase_order_request" class="add-on cursorPointer createReferenceRecord plus">
                                              <a href="javascript:void(0);"><i class="icon-plus" title="Create"></i></a>
                                          </span>-->
                                    </div>
                                    </span>
                                </div>
                            </td>
							<td class="fieldLabel medium">
									<label class="muted pull-right marginRight10px"><span class="redColor">*</span>GRN No</label>
								</td>
                                <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="purchse_ind_indentnumError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                         <?php if(isset($edit_indent->po_indent_number)) {echo $edit_indent->po_indent_number; } ?> 
                                    </span>
                                </div>
                            </td>
                            
							
                            
                        </tr>
						
                        <tr>

                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Vendor Name</label>
                            </td>
                            <td class="fieldValue medium" >
                                
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="purchse_ind_vnameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <!--<input id="purchse_ind_vname" name="purchse_ind_vname" value="<?php if(isset($edit_indent->po_indent_vendor_name)) {echo $edit_indent->po_indent_vendor_name; } ?>" type="text" class="input-large nameField" />-->
                                    <div class="row-fluid input-prepend input-append">    
                                     <?php if(isset($edit_indent->vendor_name)) {echo $edit_indent->vendor_name; } ?> 
                                            <input type="hidden" id="vdrquo_vendor_id" name="vdrquo_vendor_id" value="<?php if(isset($edit_indent->vendor_id)) {echo $edit_indent->vendor_id; } ?>">
                                            <input type="hidden" id="vdrquo_vendor_code" name="vdrquo_vendor_code" value="">
                                   
                                </div>
                            </td>
							<td class="fieldLabel medium">
									<label class="muted pull-right marginRight10px"><span class="redColor"></span>Status</label>
								</td>
                                <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="purchse_ind_indentnumError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                         <?php //if(isset($edit_indent->po_indent_number)) {echo $edit_indent->po_indent_number; } ?> 
                                    </span>
                                </div>
                            </td>

                        
                            
                        </tr>   


						<tr>
							<td class="fieldLabel medium">
									<label class="muted pull-right marginRight10px">Created By</label>
								</td>
                                <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="purchse_ord_numError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <?php if(isset($edit_indent->user_name)) {echo $edit_indent->user_name; } ?>
                                    </span>
                                </div>
                            </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Approved By</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="purchse_ordvendor_nameError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                    <?php if(isset($edit_indent->user_name)) {echo $edit_indent->user_name; } ?>
                                    </span>
                                </div>
                            </td>
							
                            
                        </tr>
						<tr>
						<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">GRN Date</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="vdrquo_vendor_nameError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                       <?php if(($edit_indent->po_indent_date)!= "0000-00-00") { echo date('d-m-Y', strtotime($edit_indent->po_indent_date)); } ?> 
                                    </span>
                                </div>
							</td>
                            
							
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Location</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="vdrquo_mr_reqnumError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <!--<input id="purchse_int_loc" name="purchse_int_loc" value="<?php if(isset($edit_indent->po_location)) {echo $edit_indent->po_location; } ?>" type="text" class="input-large nameField" />-->
                                        
                                          <?php if(isset($edit_indent->location_name)) {echo $edit_indent->location_name; } ?>
                                     
                                    </span>
                                </div>
                            </td>
                            </tr><tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">LR Number</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="vdrquo_vendor_nameError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                       <?php if(($edit_indent->po_lr_number)) { echo $edit_indent->po_lr_number; } ?> 
                                    </span>
                                </div>
							</td>
							
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Transport Name</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="vdrquo_mr_reqnumError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        
                                          <?php if(isset($edit_indent->shipping_carrier_name)) {echo $edit_indent->shipping_carrier_name; } ?>
                                     
                                    </span>
                                </div>
                            </td>
                            </tr>
                            <tr>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Customer DC/INV</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="vdrquo_vendor_nameError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                       <?php if(($edit_indent->po_cus_dc_inv)) { echo $edit_indent->po_cus_dc_inv; } ?> 
                                    </span>
                                </div>
							</td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Customer DC/INV Date</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="vdrquo_vendor_nameError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                       <?php if(($edit_indent->po_cus_dc_inv_date)!= "0000-00-00") { echo date('d-m-Y', strtotime($edit_indent->po_cus_dc_inv_date)); } ?> 
                                    </span>
                                </div>
							</td>
                            </tr>
							
                            
                        
                        
                    </tbody>
                    
                </table>
				<!--<div class="row-fluid">
                    <div class="pull-right">
                        <a class="btn btn-success" name="vendor_add_details" id="singleitem" href="javascript:void(0);"><strong>Add Single Item</strong></a>
                        <a class="btn btn-success" name="vendor_add_details" id="multipleitems"><strong>Add Multiples Item</strong></a>
                    </div>
                    <div class="clearfix"></div>
                </div>-->
				 <input type ="hidden" value="0" name="last_table_id " id="last_table_id">
                <br /> 
				 <br>
				<table id="tblList">
				<thead>
				<tr>	
				<th>SKU</th>	
				<th>Item</th>
				<th>HSN/SAC</th>
				<th>Control No</th>
				<th>Batch No</th>
				<th>Expiry Date</th>
				<th>Packing Size</th>
				<th>UOM</th>
				<th>Brand</th>
                <th>Price</th>
                <th>Ordered Qty</th>	
				<th>Billed Qty</th>	
				<th>Received Qty</th>
				<th>Pending Qty</th>
				<th>Extra Qty</th>
				<th>Total amt</th>
                <th>Remark</th>
				</tr>
				</thead>
				<tbody id="disp_items">
				  
          <?php if(!empty($edit_indent_items)) { $itemcount = 1; foreach($edit_indent_items as $ITEMS) { ?>
                        <tr>
                            <td>
                            <?php if(isset($ITEMS['po_indent_item_sku'])) { echo $ITEMS['po_indent_item_sku']; } ?>
                            <input name="item_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_indent_item_item_id'])) { echo $ITEMS['po_indent_item_item_id']; } ?>" type="hidden" />
                            <input name="item_code[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_indent_item_code'])) { echo $ITEMS['po_indent_item_code']; } ?>" type="hidden" />
                            </td>
                            <td>
                            <?php if(isset($ITEMS['product_name'])) { echo $ITEMS['product_name']; } ?>
                            <input name="item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_name'])) { echo $ITEMS['product_name']; } ?>" type="hidden" />
                            </td>
							
							 <td>
                            <?php if(isset($ITEMS['po_indent_item_hsn_san'])) { echo $ITEMS['po_indent_item_hsn_san']; } ?>
                            <input name="item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_indent_item_hsn_san'])) { echo $ITEMS['po_indent_item_hsn_san']; } ?>" type="hidden" />
                            </td>
							
							 <td>
                            <?php if(isset($ITEMS['po_indent_item_control_no'])) { echo $ITEMS['po_indent_item_control_no']; } ?>
                            <input name="item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_indent_item_control_no'])) { echo $ITEMS['po_indent_item_control_no']; } ?>" type="hidden" />
                            </td>
							
							<td>
                            <?php if(isset($ITEMS['po_indent_item_batch_no'])) { echo $ITEMS['po_indent_item_batch_no']; } ?>
                            <input name="item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_indent_item_batch_no'])) { echo $ITEMS['po_indent_item_batch_no']; } ?>" type="hidden" />
                            </td>
							
							<td>
							<?php 
							 	if(isset($ITEMS['po_indent_item_expiry_date'])){ 
										$originalDate=$ITEMS['po_indent_item_expiry_date'];
										if($originalDate == '0000-00-00'){ echo '-'; }
										else
										{
											$newDate=date("d-m-Y", strtotime($originalDate));
											echo $newDate;
										}
										} 
							 ?>
                            </td>
							
							<td>
                            <?php if(isset($ITEMS['po_indent_item_pack_size'])) { echo $ITEMS['po_indent_item_pack_size']; } ?>
                            <input name="item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_indent_item_pack_size'])) { echo $ITEMS['po_indent_item_pack_size']; } ?>" type="hidden" />
                            </td>
							
							
							
							 <td>
                           <?php if(isset($ITEMS['uom_name'])) { echo $ITEMS['uom_name'];  } ?> 
                           <input name="UOM_id[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['uom_id'])) { echo $ITEMS['uom_id']; } ?>" />
                           <input name="UOM_name[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['uom_name'])) { echo $ITEMS['uom_name']; } ?>" />
                           </td>
						   
						    <td>
                           <?php if(isset($ITEMS['po_indent_item_brand'])) { echo $ITEMS['po_indent_item_brand'];  } ?> 
                           <input name="item_brand[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['po_indent_item_brand'])) { echo $ITEMS['po_indent_item_brand']; } ?>" />
                          
                           </td>
							 <td>
                           <?php if(isset($ITEMS['po_indent_item_price'])) { echo $ITEMS['po_indent_item_price'];  } ?> 
                                                    
                           </td>
							
                            <td>
                           <?php if(isset($ITEMS['po_indent_order_qty'])) { echo $ITEMS['po_indent_order_qty'];  } ?> 
                            <input id="ordered_qty_<?php echo $itemcount; ?>" name="ordered_qty[<?php echo $itemcount; ?>]" type="hidden" onkeyup="return onkeyupfortotal(<?php echo $itemcount; ?>)" value="<?php if(isset($ITEMS['po_indent_order_qty'])) { echo $ITEMS['po_indent_order_qty']; } ?>" />
                            </td>
							
							 <td>
                           <?php if(isset($ITEMS['po_indent_build_qty'])) { echo $ITEMS['po_indent_build_qty'];  } ?> 
                           
                            </td>
                           
                            <td>
                            <a href="javascript:void(0);" id="received_value_<?php echo $itemcount; ?>" onclick="return openQuantityBox('<?php echo $itemcount; ?>');">
                            <?php if(isset($ITEMS['po_indent_received_qty'])) { echo $ITEMS['po_indent_received_qty']; } ?>
                          </a>
                           <!--<?php if(isset($ITEMS['po_indent_received_qty'])) { echo $ITEMS['po_indent_received_qty'];  } ?> -->
                            <input id="received_qty_<?php echo $itemcount; ?>" onblur="return closeQuantityBox('<?php echo $itemcount; ?>');" name="received_qty[<?php echo $itemcount; ?>]" type="hidden" onkeyup="return onkeyupfortotal(<?php echo $itemcount; ?>)" value="<?php if(isset($ITEMS['po_indent_received_qty'])) { echo $ITEMS['po_indent_received_qty']; } ?>" class="quantity" />
                            </td>
                            <td>
                           <?php if(isset($ITEMS['po_indent_pending_qty'])) { echo $ITEMS['po_indent_pending_qty'];  } ?> 
                            <input id="pending_qty_<?php echo $itemcount; ?>" name="pending_qty[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['po_indent_pending_qty'])) { echo $ITEMS['po_indent_pending_qty']; } ?>" />
                            </td>
							
							<td>
                           <?php if(isset($ITEMS['po_indent_extra_qty'])) { echo $ITEMS['po_indent_extra_qty'];  } ?> 
                            <input id="pending_qty_<?php echo $itemcount; ?>" name="pending_qty[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['po_indent_extra_qty'])) { echo $ITEMS['po_indent_extra_qty']; } ?>" />
                            </td>
                             <td>
                           <?php if(isset($ITEMS['po_indent_item_total'])) { echo $ITEMS['po_indent_item_total'];  } ?> 
                           </td>
 							<td>
                           <?php if(isset($ITEMS['po_indent_item_remark'])) { echo $ITEMS['po_indent_item_remark'];  } ?> 
                           </td>                
                            </tr>
                         <?php $itemcount++; } } ?>

				</tbody>
				</table>
                <br />
				<br />				
                                        
                <br />
						
               				
                                       
                <br>
                
                <div class="row-fluid">
                    <div class="pull-right">
<!--                        <button class="btn-success po_add_details" type="submit" name="edit_po_int_details" id="edit_po_int_details"><strong>Save</strong></button>
-->                        <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <br>
            
            </form>
				
          </div>

      </div>
	

     
     <!--popup end -->
     
     <!--popup start -->
      <div id="purchase_order_to_pop_up" class="pop-up-display-content multipleitemscontent">
       </div>
     <!--popup end -->
      
     
</section>
 