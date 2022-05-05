<script type="text/javascript">
$(document).ready(function()
{
	
  document.getElementById("addSalesorder").reset();
  $("#last_table_id").val('0');

  

    $('.cus_add_details').click(function()
     {
        var si_invoice_num = $("#si_invoice_num").val();
        var so_customer_name = $("#so_customer_name").val();
		var last_table_id = $("#last_table_id").val();
        var so_customer_code = $("#so_customer_code").val();
        
	
	if(si_invoice_num == "")
    {
      $('#si_invoice_num').css("border","1px solid #FF0000");
      $('.error').html("");
      document.getElementById('purchse_invoice_numError').style.display = 'block';
      $('#si_invoice_num').value="";
      $('#si_invoice_num').focus();
      return false;
    }
        else
    {
      document.getElementById('purchse_invoice_numError').style.display = 'none';
      $('#si_invoice_num').css("border","1px solid #82B04F");
      document.getElementById("purchse_invoice_numError").innerHTML="";
    }
	
	if(so_customer_name == "")
    {
      $('#so_customer_name').css("border","1px solid #FF0000");
      $('.error').html("");
      document.getElementById('so_customer_nameError').style.display = 'block';
      $('#so_customer_name').value="";
      $('#so_customer_name').focus();
      return false;
    }
        else
    {
      document.getElementById('so_customer_nameError').style.display = 'none';
      $('#so_customer_name').css("border","1px solid #82B04F");
      document.getElementById("so_customer_nameError").innerHTML="";
    }
	
	
	
	if(so_customer_code == "")
    {
      $('#so_customer_code').css("border","1px solid #FF0000");
      $('.error').html("");
      document.getElementById('so_customer_codeError').style.display = 'block';
      $('#so_customer_code').value="";
      $('#so_customer_code').focus();
      return false;
    }
        else
    {
      document.getElementById('so_customer_codeError').style.display = 'none';
      $('#so_customer_name').css("border","1px solid #82B04F");
      document.getElementById("so_customer_codeError").innerHTML="";
    }
	
	
 
    });
	
	
	 $( "#sales_invoice_date" ).datepicker({
		 dateFormat: 'dd-mm-yy',
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    });
	
	
});
	
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
			<form class="form-horizontal recordEditView" id="addSalesorder" name="addSalesorder" method="post" action="<?php echo site_url('instant_salesinvoice/add_instant_salesinvoice')?>" enctype="multipart/form-data">
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">Create Sales Invoice</h3>
                     <div class="sessionMsg"><?php echo $this->session->flashdata('message'); ?></div>
					<span class="pull-right">
						<button class="btn-success cus_add_details" value="Save" type="submit" name="save" id="cus_add_details"><strong>Save</strong></button>
                        
						 <button type="reset" value="Reset" class="btn btn-primary">Reset</button>
						<a class="btn-danger materialreq_add_details" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </span>
                </div>
                <input id="login_company_id" name="login_company_id" type="hidden" value="<?php echo $login_company_id; ?>" />
                <input id="tax_value" name="tax_value" type="hidden" value="<?php echo $tax_value; ?>" />
                
                <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">Sales Details</th>
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
                     
                      					<input id="si_invoice_num" type="text" class="input-large uppercase" name="si_invoice_num" value="<?php if(isset($sicode)) { echo $sicode; } ?>"  onkeyup="return codevalidation()" />
                                        <input id="si_invoice_num_prefix" type="hidden" name="si_invoice_num_prefix" value="<?php if(isset($Siprefix)) { echo $Siprefix; } ?>"/>
                     
                                    	<input id="so_no" type="hidden" class="input-large uppercase" name="so_no" value="<?php if(isset($Socode)) { echo $Socode; } ?>"/>
                                        <input id="so_prefix" type="hidden" name="so_prefix" value="<?php if(isset($SoPrefix)) { echo $SoPrefix; } ?>"/>
                                    </span>
                                </div>
                            </td>
						<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Invoice Date</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="sales_invoice_dateError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="sales_invoice_date" value="<?php echo date('d-m-Y')?>" name="sales_invoice_date" readonly type="text" class="input-large nameField" />
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
										 <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="so_customer_nameError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                       </div>
                                       <div class="row-fluid input-prepend input-append">
                                        <input id="so_customer_name" name="so_customer_name" type="text" readonly="readonly"  class="input-large with_plus" />
                                        <span id="plus_customer_details" class="add-on cursorPointer createReferenceRecord plus">
                                              <a href="javascript:void(0);"><i class="icon-plus" title="Create"></i></a>
                                          </span>
                                         <input type="hidden" id="so_customer_id" name="so_customer_id" value="">
                                                                           </div>
                                    </span>
                                 </div>
                             </td>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Total amount</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
									<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="so_customer_codeError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                     </div>
									 <input id="sale_invoice_amount" readonly  name="sale_invoice_amount" required maxlength="6" type="number" class="input-large nameField" value=""/>
                                      
                                       
                                    </span>
                                </div>
                            </td>
						  
						</tr>
						
						
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
									 <select name="so_status" class="chzn-select" id="so_status">
											<option value="Draft">Draft</option>
                                            
                                        </select>
									   
                                    </span>
                                </div>
                            </td>
                           
                           

                           
						
						<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                   Courier Type
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
									 <select name="sales_invo_courier_type" class="chzn-select" id="sales_invo_courier_type">
										   <option value=""  >Select  Courier Type</option>
											 <?php if(isset($courier_type) && !empty($courier_type)) { foreach($courier_type as $CTYP) { ?>
                                            <option value="<?php echo $CTYP['products_type_id']; ?>"><?php echo $CTYP['products_type_name']; ?></option><?php } } ?>
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
                                        <input id="sale_invoice_qty" onkeyup="invoice_calc()"  name="sale_invoice_qty" required maxlength="6" type="number" class="input-large nameField" value=""/>
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
									 <input id="sale_invoice_weight"  name="sale_invoice_weight" maxlength="6" type="number" class="input-large nameField" value=""/>
                                      
                                       
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
                                        <input id="sale_invoice_value" onkeyup="invoice_calc()"  name="sale_invoice_value" required maxlength="6" type="number" class="input-large nameField" value=""/>
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
									 <input id="sale_invoice_freight" onkeyup="invoice_calc()"  name="sale_invoice_freight" maxlength="6" type="number" class="input-large nameField" value=""/>
                                      
                                       
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
                                        <input id="sale_invoice_tax" onkeyup="invoice_calc()"  name="sale_invoice_tax" maxlength="6" type="number" class="input-large nameField" value=""/>
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
									  <select name="sale_invoice_company" required class="chzn-select" id="sale_invoice_company">
										   <option value=""  >Select Company</option>
											 <?php if(isset($manufacturer_srt_name) && !empty($manufacturer_srt_name)) { foreach($manufacturer_srt_name as $MFC) { ?>
                                            <option value="<?php echo $MFC['manufacturer_id']; ?>"><?php echo $MFC['manufacturer_name']; ?></option><?php } } ?>
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
                                       <textarea class="row-fluid" id="sale_invoice_shipper" name="sale_invoice_shipper" ></textarea>
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
                                        <textarea class="row-fluid" id="sale_invoice_receiver" name="sale_invoice_receiver" ></textarea>
                                    </span>
                                </div>
                            </td>
							</tr>
						
                        
                    </tbody>
                    
                </table>
						
                <br>
                 <span class="pin_error" id="add_itemError">
                 Please Enter Number Only
                   </span>
                    
                
			  <br />
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
										<select	data-selected-value="" name="si_payment_mode" class="chzn-select" id="si_payment_mode">
                                             <?php if(isset($paymentmode) && !empty($paymentmode)) { foreach($paymentmode as $PM) { ?>
                                            <option value="<?php echo $PM['payment_mode_id']; ?>"><?php echo $PM['payment_mode_name']; ?></option><?php } } ?>
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
                                        <textarea class="row-fluid" id="sales_invo_terms_conditions" name="sales_invo_terms_conditions" ></textarea>
                                    </span>
                                 </div>
                             </td>
                           
                        </tr>
                       
                    </tbody>
                    
                </table>
			
                
     <!--popup start -->
      <div id="singleitem_to_pop_up" class="pop-up-display-content singleitemscontent">
       
	 </div>
     <!--popup end -->
     
     <!--popup start -->
      <div id="multipleitems_to_pop_up" class="pop-up-display-content multipleitemscontent">
       
	 </div>
     <!--popup end -->
	 
	 <!--popup start -->
      <div id="services_to_pop_up" class="pop-up-display-content multipleitemscontent">
       
	 </div>
     <!--popup end -->

     <!--popup start -->
      <div id="customerdetail_to_popup" class="pop-up-display-content multipleitemscontent">

   	  </div>
     <!--popup end -->   
	 
	 <!--popup start -->
      <div id="sale_quote_to_popup" class="pop-up-display-content multipleitemscontent">

   	  </div>
     <!--popup end -->
     
	 
     
</section>
<script>
function pack_size_calc(id)
{	
	var item_qty1  = $("#item_qty1_"+id).val()?$("#item_qty1_"+id).val():1;
	var item_qty2  = $("#item_qty2_"+id).val()?$("#item_qty2_"+id).val():1;
	var item_qty3  = $("#item_qty3_"+id).val()?$("#item_qty3_"+id).val():1;
	var item_qty4  = $("#item_qty4_"+id).val()?$("#item_qty4_"+id).val():1;
	var item_actual_qty  = $("#item_actual_qty_"+id).val()?$("#item_actual_qty_"+id).val():1;
	
	var total_qty  = item_qty1 * item_qty2 * item_qty3 * item_qty4 * item_actual_qty;
	
	$("#item_qty_"+id).val(total_qty)
sales_items_grid_total(event, id)
}
</script>
<script>
// Semicolon (;) to ensure closing of earlier scripting
// Encapsulation
// $ is assigned to jQuery
;(function($) {

	 // DOM Ready
	$(function() {
		
		$('#sales_singleitem').bind('click', function(e) {

			var pricebook_id = $("#pricebook_id").val();
			var so_customer_id = $("#so_customer_id").val();
			//alert(so_customer_id);
			if(pricebook_id != "")
			{
				$.ajax({
					type: 'POST',
					url: "<?php echo site_url('salespopup/instantsales_single_item'); ?>",
					data: {pricebook:pricebook_id, customer_id: so_customer_id},
					success: function(resp) 
					{
						$("#singleitem_to_pop_up").html(resp);
					
								e.preventDefault();
							$('#singleitem_to_pop_up').bPopup({
								position: [10, 10], //x, y
								closeClass:'close',
								follow: [true, true],
								modalClose: true
							});				 
					}
				});
			}
			else
			{
				var body = $("html, body");
				body.animate({scrollTop:0}, '500', 'swing', function() { 
				   $('#so_customer_nameError').css("display", "block");
				});
				return false;
			}
			 

		});
		
		$('#sales_multipleitems').bind('click', function(e) {

			var pricebook_id = $("#pricebook_id").val();
			var so_customer_id = $("#so_customer_id").val();
			var customer_discount = $("#customer_discount").val();
			var division_id = $("#material_store_division_id").val();
			var store_id = $("#material_store_id").val();			
			
 			if(pricebook_id != "" )
			{
				$.ajax({
					type: 'POST',
					url: "<?php echo site_url('salespopup/instantsales_getmultipleitemdetails'); ?>",
					data: {pricebook:pricebook_id, customer_id: so_customer_id, customer_discount: customer_discount,division_id: division_id,store_id:store_id},
					success: function(resp) 
					{
						$("#multipleitems_to_pop_up").html(resp);
					
								e.preventDefault();
							$('#multipleitems_to_pop_up').bPopup({
								position: [10, 10], //x, y
								closeClass:'close',
								follow: [true, true],
								modalClose: true
							});				 
					}
				});
			}
			else
			{
			   
			
			    if(division_id == "")
				{
					var body = $("html, body");
					body.animate({scrollTop:0}, '500', 'swing', function() { 
					   $('#division_nameError').css("display", "block");
					});
					return false;
				}
				else
			   {
					  document.getElementById('division_nameError').style.display = 'none';
					  $('#material_store_division_id').css("border","1px solid #82B04F");
					  document.getElementById("division_nameError").innerHTML="";
			   }
				if(store_id == "")
				{
					var body = $("html, body");
					body.animate({scrollTop:0}, '500', 'swing', function() { 
					   $('#store_nameError').css("display", "block");
					});
					return false;
				}
				else
			   {
					  document.getElementById('store_nameError').style.display = 'none';
					  $('#material_store_id').css("border","1px solid #82B04F");
					  document.getElementById("store_nameError").innerHTML="";
			   }
			}
			 

		});
		$('#sales_services').bind('click', function(e) {

			var pricebook_id = $("#pricebook_id").val();
			var so_customer_id = $("#so_customer_id").val();
			var customer_discount = $("#customer_discount").val();

 			if(pricebook_id != "")
			{
				$.ajax({
					type: 'POST',
					url: "<?php echo site_url('salespopup/sales_getservices'); ?>",
					data: {pricebook:pricebook_id, customer_id: so_customer_id, customer_discount: customer_discount},
					success: function(resp) 
					{
						$("#services_to_pop_up").html(resp);
					
								e.preventDefault();
							$('#services_to_pop_up').bPopup({
								position: [10, 10], //x, y
								closeClass:'close',
								follow: [true, true],
								modalClose: true
							});				 
					}
				});
			}
			else
			{
				var body = $("html, body");
				body.animate({scrollTop:0}, '500', 'swing', function() { 
				   $('#so_customer_nameError').css("display", "block");
				});
				return false;
			}
			 

		});
		

		$('#plus_customer_details').bind('click', function(e) {
			
			$.ajax({
				type: 'POST',
				url: '<?php echo site_url('salespopup/customerpopup'); ?>',
				data: {customer:""},
				success: function(resp) 
				{
					$("#customerdetail_to_popup").html(resp);
						
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
		
		$('#plus_so_quote_details').bind('click', function(e) {
			
			$.ajax({
				type: 'POST',
				url: '<?php echo site_url('salesorder/salesquotepopup'); ?>',
				data: {customer:""},
				success: function(resp) 
				{
					$("#sale_quote_to_popup").html(resp);
						
						e.preventDefault();
						$('#sale_quote_to_popup').bPopup({
						position: [350, 50], //x, y
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

