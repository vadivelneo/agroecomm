<script type="text/javascript">
$(document).ready(function()
{
	
  document.getElementById("pay_receipt").reset();

 

    $('.pay_receipt_edit').click(function()
     {
        var pay_recp = $("#pay_recp").val();
        var vdrquo_vendor_name = $("#vdrquo_vendor_name").val();
        var pay_recp_amount = $("#pay_recp_amount").val();
      
   
   if(pay_recp == "")
    {
      $('#pay_recp').css("border","1px solid #FF0000");
      $('.error').html("");
      document.getElementById('pay_recpError').style.display = 'block';
      $('#pay_recp').value="";
      $('#pay_recp').focus();
      return false;
    }
        else
    {
      document.getElementById('pay_recpError').style.display = 'none';
      $('#pay_recp').css("border","1px solid #82B04F");
      document.getElementById("pay_recpError").innerHTML="";
    }

    if(vdrquo_vendor_name == "")
    {
      $('#vdrquo_vendor_name').css("border","1px solid #FF0000");
      $('.error').html("");
      document.getElementById('vdrquo_vendor_nameError').style.display = 'block';
      $('#vdrquo_vendor_name').value="";
      $('#vdrquo_vendor_name').focus();
      return false;
    }
        else
    {
      document.getElementById('vdrquo_vendor_nameError').style.display = 'none';
      $('#vdrquo_vendor_name').css("border","1px solid #82B04F");
      document.getElementById("vdrquo_vendor_nameError").innerHTML="";
    }
     
   if(pay_recp_amount == "")
    {
      $('#pay_recp_amount').css("border","1px solid #FF0000");
      $('.error').html("");
      document.getElementById('pay_recp_amountError').style.display = 'block';
      $('#pay_recp_amount').value="";
      $('#pay_recp_amount').focus();
      return false;
    }
        else
    {
      document.getElementById('pay_recp_amountError').style.display = 'none';
      $('#pay_recp_amount').css("border","1px solid #82B04F");
      document.getElementById("pay_recp_amountError").innerHTML="";
    }
	
	});
	
    $( "#chk_date" ).datepicker({
		 dateFormat: 'dd-mm-yy',
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    }); 
	 $( "#pay_recp_date" ).datepicker({
		 dateFormat: 'dd-mm-yy',
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    }); 
	
	
	$('#pay_recp_amount,#chk_no').keyup(function(){
		var val = $(this).val();
		if(isNaN(val)){
			 val = val.replace(/[^0-9\.]/g,'');
			 if(val.split('.').length>5) 
			val =val.replace(/\.+$/,"");
			 $('.pin_error').css("display","block");
			 $(this).val("");
            return false;
		}
		else
		 {
			  $('.pin_error').css("display","none");
             $(this).val(val);
		 }
		 
	});
	
	
	
});
	
</script>

<script>

function codevalidation()
{
	var code = $("#pay_recp").val();
	var prefix = $("#pay_recp_prefix").val();
	var codelength = code.length;
	var prefixlength = prefix.length;
	var res = code.substr(0,prefixlength); 
	if(codelength >= prefixlength)
	{
		if(res != prefix)
		{
			alert('Customer Code Should be Prefix With '+prefix);
		}
	}
}

</script>

<?php echo $this->load->view('pages/accounts_left_side'); ?>



<section>
	<div class="rightPanel" style="padding: 14px 20px; width:96%;">
		
		<div class='container-fluid editViewContainer'>
			<form class="form-horizontal recordEditView" id="pay_receipt" name="pay_receipt" method="post" action="#" enctype="multipart/form-data">
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">Update Payment Receipt</h3>
					<span class="pull-right">
						<button class="btn-success pay_receipt_edit" value="Save" type="submit" name="pay_receipt_edit" id="pay_receipt_edit"><strong>Update</strong></button>
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
									    <input id="pay_recp" type="text" class="input-large uppercase" readonly name="pay_recp" value="<?php if(isset($editpay_recp->payment_receipt_number)){ echo $editpay_recp->payment_receipt_number;}?>"/>
                                        <input id="pay_recp_prefix" type="hidden" name="pay_recp_prefix" value="<?php if(isset($pay_recpPrefix)) { echo $pay_recpPrefix; } ?>"/>
										
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
                                        <input id="pay_recp_date" name="pay_recp_date" value="<?php if(isset($editpay_recp->payment_receipt_date)){ echo date('d-m-Y', strtotime($editpay_recp->payment_receipt_date));}?>" type="text" class="input-large nameField" />
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
                            				<input type="text" class="input-large" id="vdrquo_vendor_name" name="vdrquo_vendor_name" value="<?php if(isset($editpay_recp->vendor_name)){ echo $editpay_recp->vendor_name;}?>" readonly="">
                                            <input type="hidden" id="vdrquo_vendor_id" name="vdrquo_vendor_id" value="<?php if(isset($editpay_recp->vendor_id)){ echo $editpay_recp->vendor_id;}?>">
                                            <!--<input type="hidden" id="vdrquo_vendor_code" name="vdrquo_vendor_code" value="">-->
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
                                       <input id="vdrquo_vendor_code" readonly value="<?php if(isset($editpay_recp->vendor_code)){ echo $editpay_recp->vendor_code;}?>" name="vdrquo_vendor_code" type="text" class="input-large uppercase"/>
                                       
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
                                        <input id="pay_recp_amount" name="pay_recp_amount" type="text" class="input-large nameField" value="<?php if(isset($editpay_recp->payment_receipt_amount)){ echo $editpay_recp->payment_receipt_amount;}?>" />
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
                                     <select name="pay_recp_status" class="chzn-select" id="pay_recp_status">
                                           <!-- <option value="">Select an Option</option>-->
                                            <option value="draft" <?php if(isset($editpay_recp->payment_receipt_status)){if($editpay_recp->payment_receipt_status == 'draft') { ?>selected="selected" <?php } } ?>>Draft</option>
                                            <option value="onprocess" <?php if(isset($editpay_recp->payment_receipt_status)){if($editpay_recp->payment_receipt_status == 'onprocess') { ?>selected="selected" <?php } } ?>>On process</option>
                                            <option value="approved" <?php if(isset($editpay_recp->payment_receipt_status)){if($editpay_recp->payment_receipt_status == 'approved') { ?>selected="selected" <?php } } ?>>Approved</option>
                                            <option value="cancelled" <?php if(isset($editpay_recp->payment_receipt_status)){if($editpay_recp->payment_receipt_status == 'cancelled') { ?>selected="selected" <?php } } ?>>Cancelled</option>
                                        </select>
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
                                        <textarea class="row-fluid" id="pay_recp_descp" name="pay_recp_descp" ><?php if(isset($editpay_recp->payment_receipt_descrption)){ echo $editpay_recp->payment_receipt_descrption;}?></textarea>
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
										<select	data-selected-value="" name="pay_recp_payment_mode" class="chzn-select" id="pay_recp_payment_mode">
                                             <?php if(isset($paymentmode) && !empty($paymentmode)) { foreach($paymentmode as $PM) { ?>
                                            <option value="<?php echo $PM['payment_mode_id']; ?>" <?php if($editpay_recp->payment_receipt_payment_mode_id == $PM['payment_mode_id']) { ?> selected="selected"  <?php } ?>><?php echo $PM['payment_mode_name']; ?></option><?php } } ?>
                                        </select>
                                        
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
                                        <input id="bank_name" name="bank_name" type="text" value="<?php if(isset($editpay_recp->payment_receipt_payment_bank)){ echo $editpay_recp->payment_receipt_payment_bank;}?>" class="input-large nameField" />
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
                                        <input id="chk_no" name="chk_no" value="<?php if(isset($editpay_recp->payment_receipt_payment_check_dd_number)){ echo $editpay_recp->payment_receipt_payment_check_dd_number;}?>" type="text" class="input-large nameField" />
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
                                        <input id="chk_date" name="chk_date" value="<?php if(isset($editpay_recp->payment_receipt_payment_check_dd_date)){ echo date('d-m-Y', strtotime($editpay_recp->payment_receipt_payment_check_dd_date));}?>" type="text" class="input-large nameField" />
                                    </span>
                                </div>
                            </td>
 
                        </tr>                            
					</tbody>
                    
                </table>
			
                        
                <br />
             			
                <div class="row-fluid">
                    <div class="pull-right">
                        <button class="btn-success po_add_details pay_receipt_edit" type="submit" name="pay_receipt_edit" id="pay_receipt_edit"><strong>Update</strong></button>
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

