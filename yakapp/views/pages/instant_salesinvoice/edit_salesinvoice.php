<script type="text/javascript">
$(document).ready(function()
{  
	var count_of_items = $("#count_of_items").val();
		$("#last_table_id").val(count_of_items);
	
		
	 
 $('.formError').css("display","none");
  
  $('.sale_edit_details').click(function()
  { 	
	var count_of_items = $("#count_of_items").val();
	$("#last_table_id").val(count_of_items);
    //alert('hi');return false;
    var purchse_invoice_num = $("#purchse_invoice_num").val();
    var purchase_invo_carrier = $("#purchase_invo_carrier").val();
  
    
     
    if(purchse_invoice_num == "" )
    {
      $('#purchse_invoice_numError').css("display","block");
      $('#purchse_invoice_num').focus(); 
      return false;
    }
    else
    {
    $('#purchse_invoice_numError').css("display","none");
    }
	if(purchase_invo_carrier == "" )
    {
      $('#purchase_invo_carrierError').css("display","block");
      $('#purchase_invo_carrier').focus(); 
      return false;
    }
    else
    {
    $('#purchase_invo_carrierError').css("display","none");
    }
   
    
      
  });
    
});

</script>
<style>
.showrec
{
display: none;
}
</style>


<script>
    /*  jQuery ready function. Specify a function to execute when the DOM is fully loaded.  */
$(document).ready(
  
  /* This is the function that will get executed after the DOM is fully loaded */
  function () {
    $( "#purchse_invoice_date1" ).datepicker({
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    }); 
	
  }

);
</script>
<script>
function  invoice_calc() {
	qty = $("#sale_invoice_qty").val();
	amt = $("#sale_invoice_value").val();
	tax = $("#sale_invoice_tax").val();
	freight = $("#sale_invoice_freight").val()?$("#sale_invoice_freight").val():0;
	
	var flat_amt = (qty * (amt)).toFixed(2);
	var flat_tax = (tax / 100).toFixed(2);
	
	var flat_tax_amt = (flat_amt * (flat_tax)).toFixed(2);
	if(tax != '')
	{
		var total_amount = (parseFloat(flat_amt) + parseFloat(flat_tax_amt) + parseFloat(freight)).toFixed(2);
	}
	else
	{
	var total_amount = (parseFloat(flat_amt) + parseFloat(freight)).toFixed(2);
	}
	
	$("#sale_invoice_amount").val(total_amount);
	
	
}
</script>
<?php echo $this->load->view('pages/sales_left_side'); ?>

<section>
	<div class="rightPanel" style="padding: 14px 20px; width:96%;">
		<div class='container-fluid editViewContainer'>
			<form class="form-horizontal recordEditView" id="EditView" name="save" method="post" action="<?php echo site_url('instant_salesinvoice/update_instant_salesinvoice'); ?>/<?php echo $invoice_edit->sale_invoice_id; ?>" enctype="multipart/form-data">
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">Update Sales Invoice</h3>
					<span class="pull-right">
						<button class="btn-success sale_edit_details" type="submit" name="save"><strong>Update</strong></button>
						 <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </span>
                </div>
				<br>
                <input id="login_company_id" name="login_company_id" type="hidden" value="<?php echo $login_company_id; ?>" />
                <input id="tax_value" name="tax_value" type="hidden" value="<?php echo $tax_value; ?>" />
				 <div class="row-fluid">
                    <div class="clearfix"></div>
                </div>
                
                <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">Invoice Details</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
						
							<td class="fieldLabel medium">
									<label class="muted pull-right marginRight10px"><span class="redColor">*</span>Invoice No</label>
								</td>
                                <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="purchse_invoice_numError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
										 
										  <input id="si_invoice_num" type="text" class="input-large uppercase" name="si_invoice_num" value="<?php if(isset($invoice_edit->sale_invoice_no)) { echo $invoice_edit->sale_invoice_no; } ?>" readonly="readonly"/>
                                        <input id="inv_prefix" type="hidden" name="inv_prefix" value="<?php if(isset($invprefix)) { echo $invprefix; } ?>"/> 
 
                                    </span>
                                </div>
                            </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Invoice Date</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="purchse_invoice_dateError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="sales_invoice_date" name="sales_invoice_date" readonly type="text" class="input-large nameField" value="<?php if(($invoice_edit->sale_invoice_date)!= "0000-00-00"){echo date('d-m-Y',strtotime($invoice_edit->sale_invoice_date));}?>"/>
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
                                        <input id="so_customer_name" name="so_customer_name" type="text" class="input-large nameField" value="<?php if(isset($invoice_edit->customer_name )) { echo $invoice_edit->customer_name; } ?>"/>
                                        
                                        <input id="so_customer_id" name="so_customer_id" type="hidden" class="input-large nameField" value="<?php if(isset($invoice_edit->sale_invoice_customer_id )) { echo $invoice_edit->sale_invoice_customer_id; } ?>"/>
                                       										
                                    </span>
                                </div>
                            </td>
                            <td class="fieldLabel medium">
                            	<label class="muted pull-right marginRight10px"><span class="redColor">*</span>Total amount</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="purchse_ind_quonumError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                         <div class="row-fluid input-prepend input-append">
                                        <input id="sale_invoice_amount" readonly  name="sale_invoice_amount" required  maxlength="6" type="number" class="input-large with_plus" value="<?php if(isset($invoice_edit->sale_invoice_amount)) { echo $invoice_edit->sale_invoice_amount; } ?>"/>
                                     
                                      </div>
                                    </span>
                                </div>
                            </td>
                        </tr>
						
							<tr>
						
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"> <span class="redColor">*</span>Status</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="vdrquo_mr_reqnumError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
										 <select name="so_status" class="chzn-select" id="so_status">
										 
                                            <option value="draft"  <?php if($invoice_edit->sale_invoice_status == "draft") { ?> selected="selected" <?php } ?>>Draft</option>
                                            <option value="delivered" <?php if($invoice_edit->sale_invoice_status == "delivered") { ?> selected="selected" <?php } ?>>Delivered</option>
                                            <option value="cancelled" <?php if($invoice_edit->sale_invoice_status == "cancelled") { ?> selected="selected" <?php } ?>>Cancelled</option>
                                         </select>
                                        
                                    </span>
                                </div>
                            </td>
							
							
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Courier Type</label>
                            </td>
                           <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="purchase_invo_carrierError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
										<select name="sales_invo_courier_type" class="chzn-select" id="sales_invo_courier_type">
											<?php foreach($courier_type as $CARR) { ?>
                                            	<option value="<?php echo $CARR['products_type_id']; ?>" <?php if($invoice_edit->sales_invo_courier_type == $CARR['products_type_id']) { ?> selected="selected" <?php } ?> ><?php echo $CARR['products_type_name']; ?></option>
                                        	<?php } ?>
                                        </select>
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
                                        <input id="sale_invoice_qty"  name="sale_invoice_qty" required maxlength="6" type="number" class="input-large nameField" onkeyup="invoice_calc()" value="<?php if(isset($invoice_edit->sale_invoice_qty)) { echo $invoice_edit->sale_invoice_qty; } ?>"/>
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
									 <input id="sale_invoice_weight"  name="sale_invoice_weight" maxlength="6" type="number" class="input-large nameField" value="<?php if(isset($invoice_edit->sale_invoice_weight)) { echo $invoice_edit->sale_invoice_weight; } ?>"/>
                                      
                                       
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
                                        <input id="sale_invoice_value"  name="sale_invoice_value" required maxlength="6" type="number" class="input-large nameField" onkeyup="invoice_calc()" value="<?php if(isset($invoice_edit->sale_invoice_value)) { echo $invoice_edit->sale_invoice_value; } ?>"/>
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
									 <input id="sale_invoice_freight" onkeyup="invoice_calc()"  name="sale_invoice_freight" maxlength="6" type="number" class="input-large nameField" value="<?php if(isset($invoice_edit->sale_invoice_freight)) { echo $invoice_edit->sale_invoice_freight; } ?>"/>
                                      
                                       
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
                                        <input id="sale_invoice_tax"  name="sale_invoice_tax" maxlength="6" type="number" class="input-large nameField" onkeyup="invoice_calc()" value="<?php if(isset($invoice_edit->sale_invoice_tax)) { echo $invoice_edit->sale_invoice_tax; } ?>"/>
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
									  <select required name="sale_invoice_company" class="chzn-select" id="sale_invoice_company">
										   <option value=""  >Select Company</option>
										   
										   <?php foreach($manufacturer_srt_name as $MFC) { ?>
                                            	<option value="<?php echo $MFC['manufacturer_id']; ?>" <?php if($invoice_edit->sale_invoice_company == $MFC['manufacturer_id']) { ?> selected="selected" <?php } ?> ><?php echo $MFC['manufacturer_name']; ?></option>
                                        	<?php } ?>
										   					
                                         </select>
                                      
                                       
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
										 <textarea class="row-fluid" id="sale_invoice_shipper" name="sale_invoice_shipper" ><?php if(isset($invoice_edit->sale_invoice_shipper )) { echo $invoice_edit->sale_invoice_shipper; } ?></textarea>
                                       
                                    </span>
                                </div>
                            </td>
							
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Receiver</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="purchse_ord_validError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
										 <textarea class="row-fluid" id="sale_invoice_receiver" name="sale_invoice_receiver" ><?php if(isset($invoice_edit->sale_invoice_receiver )) { echo $invoice_edit->sale_invoice_receiver; } ?></textarea>
                                       
                                    </span>
                                </div>
                            </td>
							
							
							</tr>
                        
                    </tbody>
                    
                </table>
				
				
				
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
										<select	data-selected-value="" name="si_payment_mode" class="chzn-select" id="si_payment_mode">
                                             <?php if(isset($paymentmode) && !empty($paymentmode)) { foreach($paymentmode as $PM) { ?>
                                            <option value="<?php echo $PM['payment_mode_id']; ?>"<?php if($invoice_edit->sale_invoice_payment_mode == $PM['payment_mode_id']) { ?> selected="selected" <?php } ?>><?php echo $PM['payment_mode_name']; ?></option><?php } } ?>
                                        </select>
                                        
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
                                        <textarea class="row-fluid" id="sales_invo_terms_conditions" name="sales_invo_terms_conditions" ><?php if(isset($invoice_edit->sale_invoice_term_condition )) { echo $invoice_edit->sale_invoice_term_condition; } ?></textarea>
                                    </span>
                                 </div>
                             </td>
                           
                        </tr>
                        
						
			           </tbody>
                    
                </table>
						
                <br>
                
     
     
       <!--popup start -->
      <div id="purchase_order_to_pop_up" class="pop-up-display-content multipleitemscontent">
       
   </div>
     <!--popup end -->
     
       <div id="dc_pop_up" class="pop-up-display-content multipleitemscontent">
      
   </div>
   
     
</section>

<script>
// Semicolon (;) to ensure closing of earlier scripting
// Encapsulation
// $ is assigned to jQuery
;(function($) {

	 // DOM Ready
	$(function() {
		
	$('#plus_purchase_order_request').bind('click', function(e) {
    
    $.ajax({
        type: 'POST',
        url: '<?php echo site_url('salesinvoice/getsalesorderpopup'); ?>',
        data: {},
        success: function(resp) 
        {
          $("#purchase_order_to_pop_up").html(resp);
          
          e.preventDefault();
          $('#purchase_order_to_pop_up').bPopup({
            position: [500, 50], //x, y
            closeClass:'close',
            follow: [true, true],
            modalClose: true
          });      
        }
      });
    });


     $('#plus_dcno_request').bind('click', function(e) {
    
    $.ajax({
        type: 'POST',
        url: '<?php echo site_url('salesinvoice/getdeliverychallenpopup'); ?>',
        data: {},
        success: function(resp) 
        {
          $("#dc_pop_up").html(resp);
          
          e.preventDefault();
          $('#dc_pop_up').bPopup({
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
