
<?php echo $this->load->view('pages/sales_left_side'); ?>

<section>
	<div class="rightPanel" style="padding: 14px 20px; width:96%;">
		<div class='container-fluid editViewContainer'>
			<form class="form-horizontal recordEditView" id="EditView" name="save" method="post" action="<?php echo site_url('salesinvoice/edit_salesinvoice'); ?>/<?php echo $invoice_edit->sale_invoice_id; ?>" enctype="multipart/form-data">
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">View Instant Sales Invoice</h3>
					<span class="pull-right">
				 <a href="<?php echo site_url('salesinvoice/print_salesinvoice');?>/<?php echo $invoice_edit->sale_invoice_id; ?>" class="full_print" ><img src="<?php echo base_url();?>resources/images/print.png" height="25" alt="Print" /></a>
						 <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </span>
                </div>
				<br>
				 <div class="row-fluid">
                    <!--<div class="pull-right">
                        <a class="btn btn-success" name="" id="" href="javascript:void(0);"><strong>Convert from Vendor Quotation</strong></a>
                        <a class="btn btn-success" name="" id="" href="javascript:void(0);"><strong>Convert from Purchase Order</strong></a>
                    </div>-->
                    <div class="clearfix"></div>
                </div>
                
                <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">Instant Sales Invoice Details</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
						
							<td class="fieldLabel medium">
									<label class="muted pull-right marginRight10px"><span class="redColor"></span>Invoice No</label>
								</td>
                                <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="purchse_invoice_numError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
										 
										 <?php if(isset($invoice_edit->sale_invoice_no)) { echo$invoice_edit->sale_invoice_no; } ?>
                                        <input id="inv_prefix" type="hidden" name="inv_prefix" value="<?php if(isset($invprefix)) { echo $invprefix; } ?>"/>
										 
                                       <!-- <input id="purchse_invoice_num" name="purchse_invoice_num" type="text" class="input-large nameField" />-->
                                    </span>
                                </div>
                            </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor"></span>Invoice Date</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="purchse_invoice_dateError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                       <?php if(($invoice_edit->sale_invoice_date)!= "0000-00-00"){echo date('d-m-Y',strtotime($invoice_edit->sale_invoice_date));}?>
                                    </span>
                                </div>
                            </td>
							
                            
                        </tr>
                        
                        <tr>

						<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Customer Name</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="vdrquo_vendor_nameError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
										 <?php if(isset($invoice_edit->customer_name )) { echo $invoice_edit->customer_name; } ?>

                                       <?php if(isset($cus_name)) { echo $cus_name; } ?>
                                        
                                        <input id="cus_id" name="cus_id" type="hidden" class="input-large nameField" value="<?php if(isset($invoice_edit->customer_name )) { echo $invoice_edit->customer_name; } ?>"/>
                                    </span>
                                </div>
                            </td>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Customer Code</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="vdrquo_vendor_nameError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                       <?php if(isset($invoice_edit->customer_code )) { echo $invoice_edit->customer_code; } ?>
                                    </span>
                                </div>
                            </td>
							</tr>
							
						<tr>
						
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Status</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="vdrquo_mr_reqnumError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <?php if(isset($invoice_edit->sale_invoice_status )) { echo $invoice_edit->sale_invoice_status; } ?>
                                    </span>
                                </div>
                            </td>
							
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Courier Type</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <?php if(isset($invoice_edit->products_type_name)) { echo $invoice_edit->products_type_name; } ?>
                                    </span>
                                </div>
                            </td>
							
							</tr>
                         <tr>
						<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor"></span>Quantity
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
										 <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="so_customer_nameError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                       </div>
                                       <div class="row-fluid input-prepend input-append">
                                      <?php if(isset($invoice_edit->sale_invoice_qty)) { echo $invoice_edit->sale_invoice_qty; } ?>
                                                                           </div>
                                    </span>
                                 </div>
                             </td>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor"></span>Weight</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
									<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="so_customer_codeError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                     </div>
									 <?php if(isset($invoice_edit->sale_invoice_weight)) { echo $invoice_edit->sale_invoice_weight; } ?>
                                      
                                       
                                    </span>
                                </div>
                            </td>
						  
						</tr>
						 <tr>
						<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Value
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
										 <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="so_customer_nameError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                       </div>
                                       <div class="row-fluid input-prepend input-append">
                                       <?php if(isset($invoice_edit->sale_invoice_value)) { echo $invoice_edit->sale_invoice_value; } ?>
                                                                           </div>
                                    </span>
                                 </div>
                             </td>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor"></span>Freight Charges</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
									<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="so_customer_codeError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                     </div>
									<?php if(isset($invoice_edit->sale_invoice_freight)) { echo $invoice_edit->sale_invoice_freight; } ?>
                                      
                                       
                                    </span>
                                </div>
                            </td>
						  
						</tr>
						 <tr>
						<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor"></span>Service Tax
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
										 <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="so_customer_nameError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                       </div>
                                       <div class="row-fluid input-prepend input-append">
                                        <?php if(isset($invoice_edit->sale_invoice_tax)) { echo $invoice_edit->sale_invoice_tax; } ?>
                                                                           </div>
                                    </span>
                                 </div>
                             </td>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Company</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
									<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="so_customer_codeError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                     </div>
									    <?php if(isset($invoice_edit->manufacturer_name)) { echo $invoice_edit->manufacturer_name; } ?>
                                        
                                       
                                    </span>
                                </div>
                            </td>
						  
						</tr>
						
						<tr>
					
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Shipper</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="vdrquo_mr_reqnumError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                       <?php if(isset($invoice_edit->sale_invoice_shipper )) { echo $invoice_edit->sale_invoice_shipper; } ?>
                                    </span>
                                </div>
                            </td>
							
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Receiver</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <?php if(isset($invoice_edit->sale_invoice_receiver)) { echo $invoice_edit->sale_invoice_receiver; } ?>
                                    </span>
                                </div>
                            </td>
							
							</tr>
							
							
							<tr>
                             <td class="fieldLabel medium">
                            	<label class="muted pull-right marginRight10px"><span class="redColor"></span>Invoice amount</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="purchse_ind_quonumError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                         <div class="row-fluid input-prepend input-append">
                                        <?php if(isset($invoice_edit->sale_invoice_amount )) { echo $invoice_edit->sale_invoice_amount; } ?>
                                        
                                         
                                          <input type="hidden" id="poindent_sale_oder_id" name="poindent_sale_oder_id" value="">
                                      </div>
                                    </span>
                                </div>
                            </td>
                            
                            <td class="fieldLabel medium">
                                
                            </td>
                            <td class="fieldValue medium" >
                                
                            </td>
                        </tr>
							
                        
                    </tbody>
                    
                </table>
				<br>
				<br>
				
				
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
                                        <?php if(isset($invoice_edit->payment_mode_name )) { echo $invoice_edit->payment_mode_name; } ?>
										

                                    </span>
                                 </div>
                             </td>
							 
							 <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                   Terms & Conditions
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <?php if(isset($invoice_edit->sale_invoice_term_condition )) { echo $invoice_edit->sale_invoice_term_condition; } ?>
                                    </span>
                                 </div>
                             </td>
                           
                        </tr>
						
			           </tbody>
                    
                </table>
						
                <br>
                
                
                
            </form>
				
          </div>

      </div>
	
     
</section>
