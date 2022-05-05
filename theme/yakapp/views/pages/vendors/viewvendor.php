

<?php echo $this->load->view('pages/master_left_side'); ?>

<section>
	<div class="rightPanel" style="padding: 14px 20px; width:96%;">
		
		<div class='container-fluid editViewContainer'>
			<form class="form-horizontal recordEditView" id="EditView" name="EditView" method="post" action="<?php echo site_url();?>/vendor/editvendor/<?php echo $editvendor->vendor_id; ?>" enctype="multipart/form-data">
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">View Vendor</h3>
					<span class="pull-right">
						 
						 <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </span>
                </div>
                
                <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">Vendor Details</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Vendor Name
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="vendor_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <?php if(isset($editvendor->vendor_name)){ echo $editvendor->vendor_name;}?>
                                    </span>
                                 </div>
                             </td>
							 <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    Vendor Code
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
										<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id= "vendor_codeError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <?php if(isset($editvendor->vendor_code)){ echo $editvendor->vendor_code;}?>
                                    </span>
                                 </div>
                             </td>
                        </tr>
                        
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor"></span>Mobile
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id= "vendor_mobileError" style="margin-top: -30px;">
                                            <div class="formErrorContent">Please Enter Valid Mobile No.</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <?php if(isset($editvendor->vendor_mobile)){ echo $editvendor->vendor_mobile;}?>
                                    </span>
                                 </div>
                             </td>
							 
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor"></span>Email</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="vendor_emailError" style="margin-top: -30px;">
                                            <div class="formErrorContent">Please Enter Valid Email</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <?php if(isset($editvendor->vendor_email)){ echo $editvendor->vendor_email;}?>
                                    </span>
                                </div>
                            </td>
                        </tr>
                
                       						
                          <tr>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Category</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
									<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="vendor_categoryError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                     </div>
								 <?php if(isset($editvendor->vendor_category)){ echo $editvendor->vendor_category;}?>

                                
                                    </span>
                                </div>
                            </td>
                            
                        <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    PAN
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
									<?php if(isset($editvendor->vendor_pan)){ echo $editvendor->vendor_pan;}?>
                                    </span>
                                 </div>
                             </td>
						<tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">GST Number</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                       <?php if(isset($editvendor->vendor_gst_no)){ echo $editvendor->vendor_gst_no;}?>
                                    </span>
                                </div>
                            </td> 
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Contact Person</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                      <?php if(isset($editvendor->vendor_con_person)){ echo $editvendor->vendor_con_person;}?> 
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                </tbody>
                </table>
				<br />
			
				<table class="table table-bordered blockContainer showInlineTable equalSplit">
                    
                    
                    <tbody>
						
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    Credit Limit
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                     <?php if(isset($editvendor->vendor_credit_limit)){ echo $editvendor->vendor_credit_limit;}?> 
                                    </span>
                                 </div>
                             </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Credit Days</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                      <?php if(isset($editvendor->vendor_credit_days)){ echo $editvendor->vendor_credit_days;}?>
                                    </span>
                                </div>
                            </td>
                        </tr>
						
						<tr>
                           
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Area</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
									<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="vendor_areaError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                     </div>
                                      <?php if(isset($editvendor->area_name)){ echo $editvendor->area_name;}?>

                                    </span>
                                </div>
                            </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Discount (%)</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <?php if(isset($editvendor->vendor_discount_percent)){ echo $editvendor->vendor_discount_percent;}?>
                                       
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
                                        <?php if(isset($editvendor->vendor_status)){ echo $editvendor->vendor_status;}?>
                                    </span>
                                </div>
                            </td>
                        	<td class="fieldLabel medium"><span class="muted pull-right marginRight10px">Transport</span>
                                
                            </td>
                            <td class="fieldValue medium"><span class="span10">
                              <?php if(isset($editvendor->shipping_carrier_name)){ echo $editvendor->shipping_carrier_name;}?>
                            </span>
                                
                            </td>
                        </tr>
						<tr>
						  <td class="fieldLabel medium"><span class="muted pull-right marginRight10px">Remarks</span></td>
						  <td class="fieldValue medium" ><span class="span10">
						    <?php if(isset($editvendor->vendor_remarks)){ echo $editvendor->vendor_remarks;}?>
						  </span></td>
						  <td class="fieldLabel medium">&nbsp;</td>
						  <td class="fieldValue medium">&nbsp;</td>
					  </tr>
                    </tbody>
                    
                </table>
						
                <br>
                        
                <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">Address Details</th>
                            <input type="hidden" name="cont_id" id="cont_id" value="<?php echo $editvendor_addr->vendor_country ;?>" />
                            <input type="hidden" name="st_id" id="st_id" value="<?php echo $editvendor_addr->vendor_state ;?>" />
                            <input type="hidden" name="cty_id" id="cty_id" value="<?php echo $editvendor_addr->vendor_city ;?>" />
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Billing Address
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
									<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="vendor_address_error" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <?php if(isset($editvendor_addr->vendor_address)){ echo $editvendor_addr->vendor_address;}?>
                                    </span>
                                 </div>
                             </td>
							 <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor"></span>
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                
                     
                        </td>  
						</tr>	 
						<tr>	 
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>
								Billing Country
								</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="country_error" style="margin-top: -30px;">
                                            <div class="formErrorContent">Select Country</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
											
											<?php foreach($ctry as $CON) { ?>
											<option value="<?php echo $CON['country_id'];?> " <?php if($editvendor_addr->vendor_country == $CON['country_id']) { ?> selected="selected" <?php } ?>>  <?php echo $CON['country_name']; ?></option>
											<?php } ?>
									
                                    </span>
                                </div>
                            </td>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor"></span>
								
								</label>
								</td>
                            <td class="fieldValue medium" >
                                
                            </td>
                        </tr>
                        <tr>
						<?php //echo"<pre>"; print_r($editvendor_addr); ?>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                <span class="redColor">*</span> Billing State
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="state_error" style="margin-top: -30px;">
                                            <div class="formErrorContent">Select State</div>
                                            <div class="formErrorArrow"></div>
                                        </div>
                                      
										<?php if(isset($editvendor_addr->state_name)){ echo $editvendor_addr->state_name;}?>
										
                                    </span>
                                 </div>
                            </td>
							 
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                <span class="redColor"></span>
                                </label>
                            </td>
                            <td class="fieldValue medium">
                               
                             </td>
							</tr>
							
							<tr>
							
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span> Billing Line
                                </label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                    	<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="city_error" style="margin-top: -30px;">
                                        <div class="formErrorContent">Select Line</div>
                                        <div class="formErrorArrow"></div>
                                        </div>
                                       
										<?php if(isset($editvendor_addr->city_name)){ echo $editvendor_addr->city_name;}?>
                                    </span>
                                </div>
                            </td>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                <span class="redColor"></span>
                                </label>
                            </td>
                            <td class="fieldValue medium" >
                               
                            </td>
                        </tr>
                
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                  Billing  Pin Code
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                       <?php if(isset($editvendor_addr->venor_zipcode)){ echo $editvendor_addr->venor_zipcode;}?>
                                 </div>
                             </td>
							 <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                 
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                
                             </td>
                        </tr>

                    </tbody>
                    
                </table>
                        
                <br />
                        
               
						
                <br>
                
                <div class="row-fluid">
                    <div class="pull-right">
                        
                        <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <br>
            
            </form>
				
          </div>

      </div>

</section>
