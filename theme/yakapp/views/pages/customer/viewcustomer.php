<?php echo $this->load->view('pages/master_left_side'); ?>

<section>
	<div class="rightPanel" style="padding: 14px 20px; width:96%;">
		
		<div class='container-fluid editViewContainer'>
			<form class="form-horizontal recordEditView" id="EditView" name="EditView" method="post" action="<?php echo site_url();?>/customer/editcustomer/<?php  echo $Editcus->customer_id;?>" enctype="multipart/form-data">
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">View Customer</h3>
					<span class="pull-right">
<!--						<button class="btn-success cus_update_details" value="Save" type="submit" name="cus_update_details" id="cus_update_details"><strong>Update</strong></button>
-->						 <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </span>
                </div>
                <span class="grid_error" id="add_itemError" >
				 Please Enter Number Only
				 </span>
                <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">Customer Details</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Customer Name
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
										 <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="customer_nameError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                       </div>
                                        <?php if(isset($Editcus->customer_name)){ echo $Editcus->customer_name;}?>
                                    </span>
                                 </div>
                             </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Customer Code</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
									<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="customer_codeError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                     </div>
                                      <?php if(isset($Editcus->customer_code)){ echo $Editcus->customer_code;}?> 
                                        
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Email
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
									<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="customer_emailError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                     </div>
                                     <?php if(isset($Editcus->customer_email)){ echo $Editcus->customer_email;}?>
                                    </span>
                                 </div>
                             </td>
							 <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    Mobile
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
									<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="customer_mobileError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                     </div>
                                   <?php if(isset($Editcus->customer_mobile)){ echo $Editcus->customer_mobile;}?>
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
									<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="customer_categoryError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                     </div>
								 <?php if(isset($Editcus->customer_category)){ echo $Editcus->customer_category;}?>

                                
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
									<?php if(isset($Editcus->customer_pan)){ echo $Editcus->customer_pan;}?>
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
                                       <?php if(isset($Editcus->customer_gst)){ echo $Editcus->customer_gst;}?>
                                    </span>
                                </div>
                            </td> 
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Contact Person</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                      <?php if(isset($Editcus->customer_con_person)){ echo $Editcus->customer_con_person;}?> 
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
                                     <?php if(isset($Editcus->customer_credit_limit)){ echo $Editcus->customer_credit_limit;}?> 
                                    </span>
                                 </div>
                             </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Credit Days</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                      <?php if(isset($Editcus->customer_credit_days)){ echo $Editcus->customer_credit_days;}?>
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
									<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="customer_areaError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                     </div>
                                      <?php if(isset($Editcus->area_name)){ echo $Editcus->area_name;}?>

                                    </span>
                                </div>
                            </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Discount (%)</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <?php if(isset($Editcus->customer_discount_percent)){ echo $Editcus->customer_discount_percent;}?>
                                       
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
                                        <?php if(isset($Editcus->customer_status)){ echo $Editcus->customer_status;}?>
                                    </span>
                                </div>
                            </td>
                        	<td class="fieldLabel medium"><span class="muted pull-right marginRight10px">Transport</span>
                                
                            </td>
                            <td class="fieldValue medium"><span class="span10">
                              <?php if(isset($Editcus->shipping_carrier_name)){ echo $Editcus->shipping_carrier_name;}?>
                            </span>
                                
                            </td>
                        </tr>
						<tr>
						  <td class="fieldLabel medium"><span class="muted pull-right marginRight10px">Remarks</span></td>
						  <td class="fieldValue medium" ><span class="span10">
						    <?php if(isset($Editcus->customer_remarks)){ echo $Editcus->customer_remarks;}?>
						  </span></td>
						  <td class="fieldLabel medium">&nbsp;</td>
						  <td class="fieldValue medium">&nbsp;</td>
					  </tr>
                    </tbody>
                    
                </table>
						
                <br>
                 
                 <span class="nums_error" id="add_itemError" >
 					Please Enter Number Only
					 </span>       
                <table class="table table-bordered blockContainer showInlineTable equalSplit">
              <thead>
                 <input type="hidden" name="cont_id" id="cont_id" value="<?php echo $Editcus_bill->customer_billing_country_id ;?>" />
                 <input type="hidden" name="st_id" id="st_id" value="<?php echo $Editcus_bill->customer_billing_state_id ;?>" />
                 <input type="hidden" name="cty_id" id="cty_id" value="<?php echo $Editcus_bill->customer_billing_city_id ;?>" />
                <tr>
                  <th class="blockHeader" colspan="4">Address Details</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor">*</span>Billing Address</label></td>
                  <td class="fieldValue medium" >
                   <div class="row-fluid"><span class="span10">
           <div class="row-fluid"><span class="span10">
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="cus_bill_addressError" style="margin-top: -30px;">
                     <div class="formErrorContent">* Enter Your Billing Address<br></div>
                     <div class="formErrorArrow"><div class="line10"></div>
                  </div>
                  </div> 
                  </span>
                  </div>
              <?php if(isset($Editcus_bill->customer_billing_address)){ echo $Editcus_bill->customer_billing_address; } ?>
                      </span></div></td>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Shipping Address</label></td>
                  
                  <td class="fieldValue medium" >
                  
                  <div class="row-fluid"><span class="span10">
           <div class="row-fluid"><span class="span10">
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="org_ship_addressError" style="margin-top: -30px;">
                     <div class="formErrorContent">* Enter Your Shipping Address<br></div>
                     <div class="formErrorArrow"><div class="line10"></div>
                  </div>
                  </div> 
                  </span>
                  </div>
                  
<!--                     <a href="javascropt:void(0);" onclick="return copy_address()" style="text-decoration:underline; padding-bottom:5px;"> Copy Billing Address</a>
-->                     <?php if(isset($Editcus_ship->customer_shipping_address)){ echo $Editcus_ship->customer_shipping_address; } ?> 
                      </span></div></td>
                </tr>
                
                   <tr>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor">*</span>Billing Country</label></td>
                  <td class="fieldValue medium" > 
                  
                  <div class="row-fluid"><span class="span10">
           <div class="row-fluid"><span class="span10">
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="billing_countryError" style="margin-top: -30px;">
                     <div class="formErrorContent">* Select Your Billing Country<br></div>
                     <div class="formErrorArrow"><div class="line10"></div>
                  </div>
                  </div> 
                  </span>
                  </div>
                     <?php if(isset($Editcus_bill->country_name)){ echo $Editcus_bill->country_name; } ?>
                      
                      </span></div></td>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Shipping Country</label></td>
                  <td class="fieldValue medium" >
                    <div class="row-fluid"><span class="span10">
           <div class="row-fluid"><span class="span10">
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="shipping_countryError" style="margin-top: -30px;">
                     <div class="formErrorContent">* Select Your Shipping Country<br></div>
                     <div class="formErrorArrow"><div class="line10"></div>
                  </div>
                  </div> 
                  </span>
                  </div>
                <?php if(isset($Editcus_ship->country_name)){ echo $Editcus_ship->country_name; } ?>

                      </span></div></td>
                </tr>
                 <tr>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor">*</span>Billing State</label></td>
                  <td class="fieldValue medium" >
                  
                     <div class="row-fluid"><span class="span10">
           <div class="row-fluid"><span class="span10">
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="billing_stateError" style="margin-top: -30px;">
                     <div class="formErrorContent">*Select Your Billing State<br></div>
                     <div class="formErrorArrow"><div class="line10"></div>
                  </div>
                  </div> 
                  </span>
                  </div>
                   <?php if(isset($Editcus_bill->state_name)){ echo $Editcus_bill->state_name; } ?>
                       
                      </span></div></td>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Shipping State</label></td>
                  <td class="fieldValue medium" >
                   <div class="row-fluid"><span class="span10">
           <div class="row-fluid"><span class="span10">
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="shipping_stateError" style="margin-top: -30px;">
                     <div class="formErrorContent">* Select Your Shipping State<br></div>
                     <div class="formErrorArrow"><div class="line10"></div>
                  </div>
                  </div> 
                  </span>
                  </div>
                  <?php if(isset($Editcus_ship->state_name)){ echo $Editcus_ship->state_name; } ?>
                    
                      </span></div></td>
                </tr>
                <tr>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor">*</span>Billing Line</label></td>
                  <td class="fieldValue medium" >
                  <div class="row-fluid"><span class="span10">
           <div class="row-fluid"><span class="span10">
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="billing_cityError" style="margin-top: -30px;">
                     <div class="formErrorContent">*Select Your Billing Line<br></div>
                     <div class="formErrorArrow"><div class="line10"></div>
                  </div>
                  </div> 
                  </span>
                  </div>
                  <?php if(isset($Editcus_bill->city_name)){ echo $Editcus_bill->city_name; } ?>
                     
                      </span></div></td>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Shipping Line</label></td>
                  <td class="fieldValue medium" >
                  
           <div class="row-fluid"><span class="span10">
           <div class="row-fluid"><span class="span10">
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="shipping_cityError" style="margin-top: -30px;">
                     <div class="formErrorContent">*Select Your Shipping Line<br></div>
                     <div class="formErrorArrow"><div class="line10"></div>
                  </div>
                  </div> 
                  </span>
                  </div>
                      <?php if(isset($Editcus_ship->city_name)){ echo $Editcus_ship->city_name; } ?>
                      </span></div></td>
                </tr>
               
             
                 <tr>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor">*</span>Billing Zip Code</label></td>
                  <td class="fieldValue medium" >
                    <div class="row-fluid"><span class="span10">
           <div class="row-fluid"><span class="span10">
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="bill_zip_codeError" style="margin-top: -30px;">
                     <div class="formErrorContent">* Enter Your Billing Zipcode<br></div>
                     <div class="formErrorArrow"><div class="line10"></div>
                  </div>
                  </div> 
                  </span>
                  </div>
                      <?php if(isset($Editcus_bill->customer_billing_zipcode)){ echo $Editcus_bill->customer_billing_zipcode;}?>
                      </span></div></td>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Shipping Zip Code</label></td>
                  <td class="fieldValue medium" >
                     <div class="row-fluid"><span class="span10">
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="ship_zip_codeError" style="margin-top: -30px;">
                     <div class="formErrorContent">* Enter Your Shipping Zipcode<br></div>
                     <div class="formErrorArrow"><div class="line10"></div>
                  </div>
                  </div> 
                  </span>
                  </div>
                  
                      <?php if(isset($Editcus_ship->customer_shipping_zipcode)){ echo $Editcus_ship->customer_shipping_zipcode;}?>
                     </td>
                </tr>
              </tbody>
            </table>
			  <br />
              <br>
			
                        
                <br />
                <br>
                
                <div class="row-fluid">
                    <div class="pull-right">
                        <!--<button class="btn-success cus_update_details" value="save" type="submit" name="cus_update_details" id="cus_update_details"><strong>Update</strong></button>-->
                        <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <br>
            
            </form>
				
          </div>

      </div>

</section>
