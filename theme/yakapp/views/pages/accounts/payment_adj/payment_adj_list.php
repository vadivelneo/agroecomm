<script language="javascript" type="text/javascript">
         
$(document).ready(function () {

	$("#last_table_id").val('0');
	$('#payment_adjustment_form')[0].reset();
	
	$('.pay_adj_add').click(function()
    {
        var recp_no = $("#recp_no").val();
        var recp_loc = $("#recp_loc").val();
        var recp_appr = $("#recp_appr").val();
        var pay_adj_status = $("#pay_adj_status").val();
        var open_stk_code = $("#open_stk_code").val();
        var product_type = $("#product_type").val();
        var opt_stk_loc = $("#opt_stk_loc").val();
        var last_table_id = $("#last_table_id").val();
       
   
		if(recp_no == "")
		{
		  $('.formError').css("display","none");
		  document.getElementById('recp_noError').style.display = 'block';
		  $('#recp_no').value="";
		  $('#recp_no').focus();
		  return false;
		}
		else
		{
		  $('.formError').css("display","none");
		  $('#recp_no').css("border","1px solid #82B04F");
		  document.getElementById("recp_noError").innerHTML="";
		}
	
		if(recp_loc == "")
		{
		  $('.formError').css("display","none");
		  document.getElementById('recp_locError').style.display = 'block';
		  $('#recp_loc').value="";
		  $('#recp_loc').focus();
		  return false;
		}
		  else
		{
		  $('.formError').css("display","none");
		  $('#recp_loc').css("border","1px solid #82B04F");
		  document.getElementById("recp_locError").innerHTML="";
		}
	
		if(recp_appr == "")
		{
		  $('.formError').css("display","none");
		  document.getElementById('recp_apprError').style.display = 'block';
		  $('#recp_appr').value="";
		  $('#recp_appr').focus();
		  return false;
		}
		  else
		{
		  document.getElementById('recp_apprError').style.display = 'none';
		  $('#recp_appr').css("border","1px solid #82B04F");
		  document.getElementById("recp_apprError").innerHTML="";
		}
	
		if(pay_adj_status == "")
		{
		  $('.formError').css("display","none");
		  document.getElementById('pay_adj_statusError').style.display = 'block';
		  $('#pay_adj_status').value="";
		  $('#pay_adj_status').focus();
		  return false;
		}
		  else
		{
		  $('.formError').css("display","none");
		  $('#pay_adj_status').css("border","1px solid #82B04F");
		  document.getElementById("pay_adj_statusError").innerHTML="";
		}
		
		if(last_table_id == "0" )
        {
        $('#last_table_idError').css("display","block");
        $('#last_table_id').focus(); 
        return false;
        }
        else
        {
        $('#last_table_idError').css("display","none");
        }
  
		
		$('#payment_adjustment_form').submit();
		
	});
	
	$("#pay_adj_type").change(function(){
    	$('#disp_items').html("");
		var selected_val = $(this).val();
		$('#payment_adjustment_form')[0].reset();
		$('#pay_adj_type').val(selected_val);
	});
	

});
</script>
	
	
<?php echo $this->load->view('pages/accounts_left_side'); ?>

<section>

	<div class="rightPanel" style="padding: 14px 20px; width:96%;">

		<div class='container-fluid editViewContainer'>
        			<form class="form-horizontal recordEditView" id="payment_adjustment_form" name="payment_adjustment_form" method="post" action="<?php echo site_url('accounts/add_payment_adjustment');?>" enctype="multipart/form-data">

			<div class="sessionMsg" id="ErrorMsg"><?php echo $this->session->flashdata('message'); ?></div>
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">Payment Adjustment</h3>
					<div class="pull-right">
						<button class="btn-success pay_adj_add" type="submit" name="pay_adj_add" id="pay_adj_add">
                        <strong>Save</strong>
                        </button>
						 <button type="reset" value="Reset" class="btn btn-primary">Reset</button>
						<a class="btn-danger materialreq_add_details" type="reset" onClick="javascript:window.history.back();">Cancel</a>
					</div>
				</div>

				<table class="table table-bordered blockContainer showInlineTable equalSplit">
					<thead>
						<tr>
							<th class="blockHeader" colspan="4">Payment Details</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="fieldLabel medium">
								<label class="muted pull-right marginRight10px">
									<span class="redColor">*</span>Receipt No
								</label>
							</td>
							<td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
										 <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="recp_noError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                       </div>
                                       <div class="row-fluid input-prepend input-append">
                                       <input type="hidden"  name="pay_adj_type" id="pay_adj_type" value="invoicereceipt" />
                                        <input id="recp_no" name="recp_no" type="text" class="input-large with_plus" value=""/>
                                        <span id="plus_receipt_details" class="add-on cursorPointer createReferenceRecord plus">
                                              <a href="javascript:void(0);"><i class="icon-plus" title="Select"></i></a>
                                          </span>
										  
                                         <input id="receipt_no" name="receipt_no" type="hidden" />
                                         <input id="receipt_id" name="receipt_id" type="hidden" />
                                       </div>
                                    </span>
                                 </div>
                             </td>
							
						
							<td class="fieldLabel medium">
								<label class="muted pull-right marginRight10px">
									<span class="redColor">*</span>Customer Name
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
                                        <input id="recp_party_name" name="recp_party_name" type="text" class="input-large" readonly="readonly" />
                                         <input id="recp_party_id" name="recp_party_id" type="hidden" />
                                    </div>
                                    </span>
                                 </div>
                             </td>
                             </tr>
                             <tr>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                   Amount
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                     <input type="text" name="amount" class="input-large" id="amount" readonly="readonly">
                                     <input type="hidden" name="receiptAmount" value="" id="receiptAmount" />
                                    </span>
                                 </div>
                             </td>
							 
							
							
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Location</label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
										 <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id= "recp_locError" style="margin-top: -30px;">
                                            <div class="formErrorContent">Select Location</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
										 <select class="chzn-select"  name="recp_loc" id="recp_loc">
											<?php foreach($locationdata as $LOC) {    ?>
                                                     <option value="<?php echo $LOC['location_id']; ?>"><?php echo $LOC['location_name']; ?></option>
                                            <?php } ?>
                      					</select>
                                    </span>
                                </div>
                            </td>
                            </tr>
							<tr>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    Receipt date
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <input type="text" 	value="<?php echo date('d-m-Y');?> " name="recp_date" class="input-large" id="recp_date">
                                    </span>
                                 </div>
                             </td>
						
						 <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    Approved By
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                    <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id= "recp_apprError" style="margin-top: -30px;">
                                            <div class="formErrorContent">Select Field</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <select	data-selected-value="" name="recp_appr" class="chzn-select" id="recp_appr">
                                            <?php foreach($users as $USR) { ?>
                                            	<option value="<?php echo $USR['user_id']; ?>" <?php if($userid == $USR['user_id']) { ?> selected="selected" <?php } ?>>
												<?php echo $USR['user_name']; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </span>
                                 </div>
                             </td>
                             </tr>
							<tr>
							 <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    Status
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                    <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id= "pay_adj_statusError" style="margin-top: -30px;">
                                            <div class="formErrorContent">Select Status</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <select	data-selected-value="" name="pay_adj_status" class="chzn-select" id="pay_adj_status">
                                            <option value="Draft">Draft</option>
                                            <option value="Approved">Approved</option>
                                            <option value="Completed">Completed</option>
                                            <option value="cancelled">Cancelled</option>
                                        </select>
                                    </span>
                                 </div>
                             </td>
						</tr>
					</tbody>
				</table>

				<br /> 
				<br />
				<div class="row-fluid">
                    <div class="clearfix"></div>
                </div>
					<input type ="hidden" value="0" name="last_table_id " id="last_table_id">
                	<br /> 
					<span class="grid_error" id="last_table_idError" >
					Please Add Some Items
					</span>
					<span class="grid_error" id="payment_adjustment_error" style="display: block;"></span>
					<br>
				<table>
					<thead>
						<tr id="items_list">
							<th width="40">S.no</th>
							<th width="100">Invoice No</th>
							<th width="150">Customer Name</th>
							<th width="130">Invoice Amount</th>
							<!--<th width="130">TDS</th>-->
							<th width="130">Paid Amount</th>
                            <th width="130">Payable Amount</th>
							<th width="130">Due Amount</th>
							<th widht="150">Adjusted Amount</th>
							<th widht="150">Payment Status</th>
                         </tr>
                    </thead>
					<tbody id ="disp_items">
					</tbody>
				</table>
				<br />
				<br />
				<br />
				<br />
				<div class="row-fluid">
					<div class="pull-right">
						<button class="btn-success pay_adj_add" type="submit" name="pay_adj_add" id="pay_adj_add">
                        <strong>Save</strong>
                        </button>
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
      <div id="receipt_pop_up" class="pop-up-display-content singleitemscontent">
   </div>

</section>

<script>
// Semicolon (;) to ensure closing of earlier scripting
// Encapsulation
// $ is assigned to jQuery
;(function($) {

	 // DOM Ready
	$(function() {

		// Binding a click event 
		// From jQuery v.1.7.0 use .on() instead of .bind()
	 $('#plus_receipt_details').bind('click', function(e) {
	 
	var receipt = $('#pay_adj_type').val();
	

    $.ajax({
        type: 'POST',
        url: '<?php echo site_url('accounts/get_receipt_popup'); ?>',
       data: 'receipt_type='+receipt,
        success: function(resp) 
        {
          $("#receipt_pop_up").html(resp);
          
          e.preventDefault();
          $('#receipt_pop_up').bPopup({
            position: [500, 50], //x, y
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

<script type="text/javascript">
function decimalvalidation(event,id)
{

  var target = $(event.target);
  
  var typeval = $(event.target).val();
  
  if(isNaN(typeval))
  {
	$(".numeric_error").text("");
	$(target).val("");
	$("#numeric_error_"+id).text("Please Enter Numberic Only");
	$(target).focus();
	return false;
  }
  else
  {
	  var floatval = parseFloat(typeval).toFixed(2);
	  $(target).val(floatval);
	  
	  $(".numeric_error").text("");
		
		var paid_amt = $("#paid_amt_"+id).val();
		var due_amt = $("#due_amt_"+id).val();
		var adj_amt = $("#adj_amt_"+id).val();
		var recp_amt = $("#recp_amt_"+id).val();
	
  }
    
}


function getstatus(id)
 {
		
	var	popup_invoice_status = $("#invoice_status_"+id).val();
	var	popup_due_amt = $("#due_amt_"+id).val();
	var	popup_inv_tds_amt = $("#inv_tds_amt_"+id).val();
		

	if(parseFloat(popup_due_amt) <= parseFloat(popup_inv_tds_amt))
	{
		var status = popup_invoice_status;
		$("#invoice_status_"+id).val(status);
		return false ;
		
	}
	else
	{	
		$('.flashmessage').html("");
		document.getElementById("ErrorMsg").innerHTML="Sorry!!! The Status Cant be Changed";
		var status = 'Pending';
		$("#invoice_status_"+id).val(status);
							
	}
					
	
 }
</script>

