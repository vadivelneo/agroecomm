<script type="text/javascript">
$(document).ready(function()
{
	
  document.getElementById("addinvoicereceipt").reset();

    $('.add_inv_recp').click(function()
     {
        var inv_recp_customer_name = $("#inv_recp_customer_name").val();
		var inv_recp_amount = $("#inv_recp_amount").val();
		var inv_recp_no = $("#inv_recp_no").val();
		var inv_recp_customer_code = $("#inv_recp_customer_code").val();
		var inv_recp_payment_mode = $("#inv_recp_payment_mode").val();
    
	if(inv_recp_no == "")
    {
      $('#inv_recp_no').css("border","1px solid #FF0000");
      $('.error').html("");
      document.getElementById('inv_recp_noError').style.display = 'block';
      $('#inv_recp_no').value="";
      $('#inv_recp_no').focus();
      return false;
    }
        else
    {
      document.getElementById('inv_recp_noError').style.display = 'none';
      $('#inv_recp_no').css("border","1px solid #82B04F");
      document.getElementById("inv_recp_noError").innerHTML="";
    }
	if(inv_recp_customer_name == "")
    {
      $('#inv_recp_customer_name').css("border","1px solid #FF0000");
      $('.error').html("");
      document.getElementById('inv_recp_customer_nameError').style.display = 'block';
      $('#inv_recp_customer_name').value="";
      $('#inv_recp_customer_name').focus();
      return false;
    }
        else
    {
      document.getElementById('inv_recp_customer_nameError').style.display = 'none';
      $('#inv_recp_customer_name').css("border","1px solid #82B04F");
      document.getElementById("inv_recp_customer_nameError").innerHTML="";
    }
	if(inv_recp_customer_code == "")
    {
      $('#inv_recp_customer_code').css("border","1px solid #FF0000");
      $('.error').html("");
      document.getElementById('inv_recp_customer_codeError').style.display = 'block';
      $('#inv_recp_customer_code').value="";
      $('#inv_recp_customer_code').focus();
      return false;
    }
        else
    {
      document.getElementById('inv_recp_customer_codeError').style.display = 'none';
      $('#inv_recp_customer_code').css("border","1px solid #82B04F");
      document.getElementById("inv_recp_customer_codeError").innerHTML="";
    }
	
	if(inv_recp_amount == "")
    {
      $('#inv_recp_amount').css("border","1px solid #FF0000");
      $('.error').html("");
      document.getElementById('inv_recp_amountError').style.display = 'block';
      $('#inv_recp_amount').value="";
      $('#inv_recp_amount').focus();
      return false;
    }
        else
    {
      document.getElementById('inv_recp_amountError').style.display = 'none';
      $('#inv_recp_amount').css("border","1px solid #82B04F");
      document.getElementById("inv_recp_amountError").innerHTML="";
    }
	
	if(inv_recp_payment_mode == "0")
    {
      $('#inv_recp_payment_mode').css("border","1px solid #FF0000");
      $('.error').html("");
      document.getElementById('inv_recp_paymodeError').style.display = 'block';
      $('#inv_recp_payment_mode').value="";
      $('#inv_recp_payment_mode').focus();
      return false;
    }
        else
    {
      document.getElementById('inv_recp_paymodeError').style.display = 'none';
      $('#inv_recp_payment_mode').css("border","1px solid #82B04F");
      document.getElementById("inv_recp_paymodeError").innerHTML="";
    }
	
	});
	
    $( "#inv_recp_chk_date" ).datepicker({
		 dateFormat: 'dd-mm-yy',
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    }); 
	
	 $( "#inv_recp_date" ).datepicker({
		 dateFormat: 'dd-mm-yy',
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    }); 
	
	
	$('#inv_recp_amount').keyup(function(){
		var val = $(this).val();
		if(isNaN(val)){
			 val = val.replace(/[^0-9\.]/g,'');
			 if(val.split('.').length>2) 
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
	var code = $("#inv_recp_no").val();
	var prefix = $("#inv_recp_prefix").val();
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

<?php echo $this->load->view('pages/sales_left_side'); ?>



<section>
	<div class="rightPanel" style="padding: 14px 20px; width:96%;">
		
		<div class='container-fluid editViewContainer'>
			<form class="form-horizontal recordEditView" id="addinvoicereceipt" name="addinvoicereceipt" method="post" action="#" enctype="multipart/form-data">
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">New Cash Receipt</h3>
					
					<span class="pull-right">
						<button class="btn-success add_inv_recp"  type="submit" name="add_inv_recp" id="add_inv_recp"><strong>Save</strong></button>
						 <button type="reset" value="Reset" class="btn btn-primary">Reset</button>
						<a class="btn-danger materialreq_add_details" type="reset" onClick="javascript:window.history.back();">Cancel</a>
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
                                    <span class="redColor">*</span>Cash Receipt No
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
										 <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="inv_recp_noError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                       </div>
									    <input id="inv_recp_no" readonly="readonly" type="text" class="input-large uppercase" onkeyup="return codevalidation()" name="inv_recp_no" value="<?php if(isset($inv_recp_code)) { echo $inv_recp_code; } ?>"/>
                                        <input id="inv_recp_prefix" type="hidden" name="inv_recp_prefix" value="<?php if(isset($inv_recp_Prefix)) { echo $inv_recp_Prefix; } ?>"/>
										
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
                                        <input id="inv_recp_date" name="inv_recp_date" value="<?php echo date('d-m-Y');?>" type="text" class="input-large nameField" />
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
                                        <input id="inv_recp_customer_name" name="inv_recp_customer_name" type="text" class="input-large with_plus" />
                                        <span id="plus_customer_details" class="add-on cursorPointer createReferenceRecord plus">
                                              <a href="javascript:void(0);"><i class="icon-plus" title="Create"></i></a>
                                          </span>
                                         <input id="so_customer_id" name="so_customer_id" type="hidden" />
                                      
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
									<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="inv_recp_customer_codeError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                     </div>
                                       <input id="inv_recp_customer_code" readonly name="inv_recp_customer_code" type="text" class="input-large uppercase"/>
                                       
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
                                        <input id="inv_recp_amount" name="inv_recp_amount" type="text" class="input-large nameField" />
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
									 <input id="inv_recp_status" name="inv_recp_status" value="Draft" readonly="readonly" type="text" class="input-large nameField" />
                                    
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
                                        <textarea class="row-fluid" id="inv_recp_descp" name="inv_recp_descp" ></textarea>
                                    </span>
                                 </div>
                             </td>
                            <td class="fieldLabel medium">
                            <label class="muted pull-right marginRight10px">
                                    <span class="redColor"></span>Incentive Amount
                                </label>
                            </td>
                            <td>
                            <div class="row-fluid">
                                    <span class="span10">
                                        <input id="cus_inc_amt" name="cus_inc_amt" readonly value="" type="text" class="input-large nameField" />
                                    </span>
                                 </div>
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
                                     <span class="redColor">*</span>Payment Mode
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                    <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="inv_recp_paymodeError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
										<select	data-selected-value="" name="inv_recp_payment_mode" class="chzn-select" id="inv_recp_payment_mode">
                                         <option value="0">Select</option>
                                             <?php if(isset($paymentmode) && !empty($paymentmode)) { foreach($paymentmode as $PM) { ?>
                                            <option value="<?php echo $PM['payment_mode_id']; ?>"><?php echo $PM['payment_mode_name']; ?></option><?php } } ?>
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
                                        <input id="inv_recp_bank" name="inv_recp_bank" type="text" class="input-large nameField" />
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
                                        <input id="inv_recp_chk_no" name="inv_recp_chk_no" type="text" class="input-large nameField" />
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
                                        <input id="inv_recp_chk_date" name="inv_recp_chk_date" type="text" class="input-large nameField" />
                                    </span>
                                </div>
                            </td>
 
                        </tr>
                        
                        
					</tbody>
                    
                </table>
			
                        
                <br />
             			
                <div class="row-fluid">
                    <div class="pull-right">
                        <button class="btn-success po_add_details add_inv_recp" type="submit" name="add_inv_recp" id="add_inv_recp"><strong>Save</strong></button>
                         <button type="reset" value="Reset" class="btn btn-primary">Reset</button>
						<a class="btn-danger materialreq_add_details" type="reset" onClick="javascript:window.history.back();">Cancel</a>
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

<script>
// Semicolon (;) to ensure closing of earlier scripting
// Encapsulation
// $ is assigned to jQuery
;(function($) {

	 // DOM Ready
	$(function() {
		
		$('#plus_customer_details').bind('click', function(e) {
			
			$.ajax({
				type: 'POST',
				url: '<?php echo site_url('accounts/customerpopup'); ?>',
				data: {customer:""},
				success: function(resp) 
				{
					$("#customerdetail_to_popup").html(resp);
						//	alert(resp);return false;
						e.preventDefault();
						$('#customerdetail_to_popup').bPopup({
						position: [200, 50], //x, y
						closeClass:'close',
						follow: [true, true],
						modalClose: true
					});			 
				}
		});
		return false;
		
		
		
		
		});
		
	

	});
})(jQuery);
</script>

