
<?php echo $this->load->view('pages/accounts_left_side'); ?>



<section>
	<div class="rightPanel" style="padding: 14px 20px; width:96%;">
		
		<div class='container-fluid editViewContainer'>
			<form class="form-horizontal recordEditView" id="addinvoicereceipt" name="addinvoicereceipt" method="post" action="#" enctype="multipart/form-data">
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">View Income Receipt</h3>
					
					<span class="pull-right">
                    <a href="<?php echo site_url('accounts/print_inv_recp');?>/<?php echo $editinv_recp->invoice_receipt_id; ?>" class="full_print" ><img src="<?php echo base_url();?>resources/images/print.png" height="25" alt="Print" /></a>
						
						 <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </span>
					
                </div>
				
                 <br>
                 <span class="pin_error" id="add_itemError">
                 Please Enter Number Only
                   </span>
				   
				  <div class="sessionMsg"><?php echo $this->session->flashdata('message'); ?></div>
             
			  <br />
                <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">Receipt Details</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Invoice Receipt No
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
										 <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="so_noError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                       </div>
									  <?php if(isset($editinv_recp->invoice_receipt_number)){ echo $editinv_recp->invoice_receipt_number;}?>
                                     
                                    </span>
                                 </div>
                             </td>
							  <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                   Receipt Date
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                      <?php if(($editinv_recp->invoice_receipt_date)!= "0000-00-00") { echo date('d-m-Y', strtotime($editinv_recp->invoice_receipt_date)); } ?>
                                    </span>
                                 </div>
                             </td>
						    
                        </tr>
						<tr>
						<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Customer Name
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
										 <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="inv_recp_customer_nameError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                       </div>
                                       <div class="row-fluid input-prepend input-append">
                                       <?php if(isset($editinv_recp->customer_name)){ echo $editinv_recp->customer_name;}?>
                                       </div>
                                    </span>
                                 </div>
                             </td>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Customer Code</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
									<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="so_customer_codeError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                     </div>
                                       <?php if(isset($editinv_recp->customer_code)){ echo $editinv_recp->customer_code;}?>
                                    </span>
                                </div>
                            </td>
						  
						</tr>
						<tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"> <span class="redColor">*</span>Amount</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="inv_recp_amountError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                       <?php if(isset($editinv_recp->invoice_receipt_amount)){ echo $editinv_recp->invoice_receipt_amount;}?>
                                    </span>
                                </div>
                            </td>
							
                            
                       	<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Status</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
									<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="customer_categoryError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                     </div>
									 
                                          <?php if(isset($editinv_recp->invoice_receipt_status)) {echo ucfirst($editinv_recp->invoice_receipt_status);} ?> 
							        </span>
                                </div>
                            </td>
							
						</tr>
						<tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                   Description
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                      <?php echo $editinv_recp->invoice_receipt_descrption;?>
                                    </span>
                                 </div>
                             </td>
                            <td class="fieldLabel medium">&nbsp;
                                
                            </td>
                            <td class="fieldValue medium" >&nbsp;
                                
                            </td>
                        </tr>
                    </tbody>
                    
                </table>
						
               
              <br>
			 <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">Payment Mode</th>
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
									   <?php if(isset($editinv_recp->payment_mode_name)){ echo $editinv_recp->payment_mode_name;}?>
                                   
                                    </span>
                                 </div>
                             </td>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Bank Name</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="vdrquo_vendor_nameError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                       <?php if(isset($editinv_recp->invoice_receipt_payment_bank)){ echo $editinv_recp->invoice_receipt_payment_bank;}?>
                                    </span>
                                </div>
                            </td>
 
                        </tr>
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Cheque No/DD Number</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="vdrquo_vendor_nameError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
										<?php if(isset($editinv_recp->invoice_receipt_payment_check_dd_number)){ echo $editinv_recp->invoice_receipt_payment_check_dd_number;}?>
                                    </span>
                                </div>
                            </td>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Cheque No/DD Date</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="vdrquo_vendor_nameError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                     <?php if(($editinv_recp->invoice_receipt_payment_check_dd_date)!= "0000-00-00") { echo date('d-m-Y', strtotime($editinv_recp->invoice_receipt_payment_check_dd_date)); } ?>
                                    </span>
                                </div>
                            </td>
 
                        </tr>
                        
                        
					</tbody>
                    
                </table>
				
				
			
                        
                <br />
				
				 <div class="sessionMsg"><?php echo $this->session->flashdata('message'); ?></div>

        <div class="content">
          <table>
            <tbody>
              <tr>
                 
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Invoice No&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Invoive Amount&nbsp;&nbsp;</a></th>
               <!-- <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Paid Amount &nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Due Amount  &nbsp;&nbsp;</a></th>-->
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Adjust Amount &nbsp;&nbsp;</a></th>
              </tr>
              <?php
			  //echo "<pre>"; print_r($credit_details); exit;
		if(!empty($credit_details)) {
			$i = 1;
		 foreach($credit_details as $Cus) { ?>
              <tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1">
                <td><?php echo $Cus['sale_invoice_no'];?></a></td>
                <td><?php echo $Cus['invoice_payment_invoice_amount'];?></a></td>
                <!--<td><?php //echo $Cus['invoice_payment_paid_amount'];?></td>
                <td><?php //echo $Cus['invoice_payment_due_amount'];?></td>-->
                <td><?php echo $Cus['amount'];?></td>
				
              </tr>
              <?php $i++;}} else{?>
              <tr>
                <td colspan="7" style="text-align:center;"> No Records Found </td>
              </tr>
              <?php }?>
            </tbody>
          </table>
          
        </div>
             			
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
	

     <!--popup start -->
      <div id="customerdetail_to_popup" class="pop-up-display-content multipleitemscontent">

   	  </div>
     <!--popup end -->   
	
     
	 
     
</section>
