
<?php echo $this->load->view('pages/accounts_left_side'); ?>



<section>
	<div class="rightPanel" style="padding: 14px 20px; width:96%;">
		
		<div class='container-fluid editViewContainer'>
			<form class="form-horizontal recordEditView" id="pay_receipt" name="pay_receipt" method="post" action="#" enctype="multipart/form-data">
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">View Payment Receipt</h3>
					<span class="pull-right">
						
						 <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </span>
                </div>
                 <br>
                 <span class="pin_error" id="add_itemError">
                 Please Enter Number Only
                   </span>
             
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
                                    <span class="redColor">*</span>Payment Receipt No
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
										 <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="pay_recpError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                       </div>
									    <?php if(isset($editpay_recp->payment_receipt_number)){ echo $editpay_recp->payment_receipt_number;}?>
                                        
										
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
                                       <?php if(isset($editpay_recp->payment_receipt_date)){ echo date('d-m-Y', strtotime($editpay_recp->payment_receipt_date));}?>
                                    </span>
                                 </div>
                             </td>
						    
                        </tr>
						<tr>
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
                            				<?php if(isset($editpay_recp->vendor_name)){ echo $editpay_recp->vendor_name;}?>
                                        </div>
                                        
                                    </span>
                                </div>
                            </td>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Vendor Code</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
									<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="so_customer_codeError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                     </div>
                                       <?php if(isset($editpay_recp->vendor_code)){ echo $editpay_recp->vendor_code;}?>
                                       
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
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="pay_recp_amountError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <?php if(isset($editpay_recp->payment_receipt_amount)){ echo $editpay_recp->payment_receipt_amount;}?>
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
                                     <?php if(isset($editpay_recp->payment_receipt_status)){ echo $editpay_recp->payment_receipt_status;}?>
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
                                        <?php if(isset($editpay_recp->payment_receipt_descrption)){ echo $editpay_recp->payment_receipt_descrption;}?>
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
										<?php if(isset($editpay_recp->payment_mode_name)){ echo $editpay_recp->payment_mode_name;}?>
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
                                        <?php if(isset($editpay_recp->payment_receipt_payment_bank)){ echo $editpay_recp->payment_receipt_payment_bank;}?>
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
                                        <?php if(isset($editpay_recp->payment_receipt_payment_check_dd_number)){ echo $editpay_recp->payment_receipt_payment_check_dd_number;}?>
                                    </span>
                                </div>
                            </td>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Cheque No/DD Date</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;"  id="vdrquo_vendor_nameError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <?php if(isset($editpay_recp->payment_receipt_payment_check_dd_date)){ echo date('d-m-Y', strtotime($editpay_recp->payment_receipt_payment_check_dd_date));}?>
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
		 foreach($credit_details as $Ven) { ?>
              <tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1">
                <td><?php echo $Ven['po_invoice_number'];?></a></td>
                <td><?php echo $Ven['payment_payment_invoice_amount'];?></a></td>
                <!--<td><?php //echo $Ven['payment_payment_paid_amount'];?></td>
                <td><?php //echo $Ven['payment_payment_due_amount'];?></td>-->
                <td><?php echo $Ven['amount'];?></td>
				
              </tr>
              <?php $i++;}} else{?>
              <tr>
                <td colspan="7" style="text-align:center;"> No Records Found </td>
              </tr>
              <?php }?>
            </tbody>
          </table>
          
        </div>
			
                        
                <br />
             			
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
      <div id="vendors_to_pop_up" class="pop-up-display-content multipleitemscontent">
       </div>
     <!--popup end -->
	
     
	 
     
</section>

<script>
// Semicolon (;) to ensure closing of earlier scripting
// Encapsulation
// $ is assigned to jQuery
;(function($) {

	 // DOM Ready
	$(function() {
	
		 $('#plus_vendor').bind('click', function(e) {
      
      $.ajax({
          type: 'POST',
          url: '<?php echo site_url('accounts/getvendorpopup'); ?>',
          data: {},
          success: function(resp) 
          {
            $("#vendors_to_pop_up").html(resp);
            
            e.preventDefault();
            $('#vendors_to_pop_up').bPopup({
              position: [200, 50], //x, y
              closeClass:'close',
              follow: [true, true],
              modalClose: true
            });      
          }
        });
       
    });
		
		
		
	

	});
})(jQuery);
</script>

