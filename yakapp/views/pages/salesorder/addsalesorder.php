<script type="text/javascript">
function onkeyupfortotal(id)
{
    var ordered_qty = $("#item_qty_"+id).val();
	var inventory_qty = $("#item_inv_qty_"+id).val();
	
	
	 if((!isNaN(ordered_qty)) || (ordered_qty < 0))
	 {
		 if(parseFloat(ordered_qty) > parseFloat(inventory_qty))
		 {
			$("#dc_error").text("Ordered Qty Value is More than  Inventory Qty. Stock Available: "+inventory_qty+" Only");
			$("#item_qty_"+id).val("");
			return false;
		 }
		 
	 }
	 else
	 {
		$("#dc_error").text("Please Enter Numeric only");
		$("#received_qty_"+id).val("");
		$("#pending_qty_"+id).val("");
		return false;
	 }
	

}
</script>


<script type="text/javascript">
$(document).ready(function()
{
	
  document.getElementById("addSalesorder").reset();

  var cont_id = $('#billing_country').val();
    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('salesorder/get_state'); ?>',
      data: 'country='+cont_id,
      success: function(resp) {
          $('select#billing_state').html(resp);
			var st = $('select#billing_state').val();
			$.ajax({
			type: 'POST',
			url: '<?php echo site_url('salesorder/get_city'); ?>',
			data: {country: cont_id, state: st},
			success: function(resp) { 
			  $('select#billing_city').html(resp);
			}
      	});
      }
   });

    var cont_ship_id = $('#shipping_country').val();
  $.ajax({
    type: 'POST',
    url: '<?php echo site_url('salesorder/get_state'); ?>',
    data: 'country='+cont_ship_id,
    success: function(resp) {
      $('select#shipping_state').html(resp);
      var st_ship_id = $('select#shipping_state').val();
      $.ajax({
        type: 'POST',
        url: '<?php echo site_url('salesorder/get_city'); ?>',
        data: {country: cont_ship_id, state: st_ship_id},
        success: function(resp) {
          $('select#shipping_city').html(resp);
        }
      });
    }
  });

    $('.cus_add_details').click(function()
     {
        
        var so_no = $("#so_no").val();
        var so_customer_name = $("#so_customer_name").val();
        var so_customer_code = $("#so_customer_code").val();
       
		var last_table_id  = $("#last_table_id ").val();
		
		var total_gross_amount  = $("#total_gross_amount ").val();
		var grand_total  = $("#grand_total ").val();
		var item_qty = $("#item_qty_ ").val();
		
		 
     
   if(so_no == "")
    {
      $('#so_no').css("border","1px solid #FF0000");
      $('.error').html("");
      document.getElementById('so_noError').style.display = 'block';
      $('#so_no').value="";
      $('#so_no').focus();
      return false;
    }
        else
    {
      document.getElementById('so_noError').style.display = 'none';
      $('#so_no').css("border","1px solid #82B04F");
      document.getElementById("so_noError").innerHTML="";
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
	
	
	
	
	
	 
	if(last_table_id == '0') 
	{
      $('.grid_error').css("display","block");
            return false;
    }
        else
    {
     $('.grid_error').css("display","none");
    }
	
	if(total_gross_amount == "" || total_gross_amount == 0.00 || total_gross_amount == NaN)
    
	{
		 
      $('#add_itemError2').text("Invalid Gross Total");
	  $('#add_itemError2').focus();
            return false;
    }
        else
    {
		$('#add_itemError2').css("display","none");
    }
	
	
	if(grand_total == "" || grand_total == 0.00 || grand_total == NaN)
    {
		 
      $('#add_itemError1').text("Invalid Grand Total");
	  $('#add_itemError1').focus();
            return false;
    }
        else
    {
    $('#add_itemError1').css("display","none");
    }
 
    });
	
	
	
     $( "#purchse_ord_transac_date" ).datepicker({
		 dateFormat: 'dd-mm-yy',
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    }); 
	 $( "#purchse_ord_req_date" ).datepicker({
		  dateFormat: 'dd-mm-yy',
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    }); 
	
	 $( "#purchse_ord_valid" ).datepicker({
		  dateFormat: 'dd-mm-yy',
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    }); 
	
	 $( "#purchase_invo_po_date" ).datepicker({
		  dateFormat: 'dd-mm-yy',
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    }); 
	
	$('#bill_zip_code, #ship_zip_code').keyup(function(){
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
function copy_address()
{
 
  var tb1 = document.getElementById("cus_bill_address");
  var tb2 = document.getElementById("cus_ship_address");
  var tb3 = document.getElementById("bill_zip_code");
  var tb4 = document.getElementById("ship_zip_code");
    
    
    if (tb1.value != "") {
        tb2.value = tb1.value;
		  tb4.value = tb3.value;
		  
	var $options = $("#billing_country > option").clone();
    $('#shipping_country').empty();
    $('#shipping_country').append($options);
    $('#shipping_country').val($('#billing_country').val());
	
	var $options1 = $("#billing_state > option").clone();
    $('#shipping_state').empty();
    $('#shipping_state').append($options1);
    $('#shipping_state').val($('#billing_state').val());
	
	var $options2 = $("#billing_city > option").clone();
    $('#shipping_city').empty();
    $('#shipping_city').append($options2);
    $('#shipping_city').val($('#billing_city').val());
	
		  
			return false;
    }  
    
	 
	return false;
}

 
</script>
<script>

function codevalidation()
{
	var code = $("#customer_code").val();
	var prefix = $("#customer_code_prefix").val();
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


function getcountry()
 {
 	var cout = $('select#billing_country').val();
	 
 	$.ajax({
 		type: 'POST',
 		url: '<?php echo site_url('salesorder/get_state'); ?>',
 		data: 'country='+cout,
 		success: function(resp) {
 			$('select#billing_state').html(resp);
      var st = $('select#billing_state').val();
        $.ajax({
        type: 'POST',
        url: '<?php echo site_url('salesorder/get_city'); ?>',
        data: {country: cout, state: st},
        success: function(resp) { 
          $('select#billing_city').html(resp);
        }
      });
 		}
});
}
 function getstate()
{
	var cout = $('select#billing_country').val();
	 
 	var state = $('select#billing_state').val();
 	$.ajax({
 		type: 'POST',
 		url: '<?php echo site_url('salesorder/get_city'); ?>',
 		data: {country: cout, state: state},
 		success: function(resp) { 
			$('select#billing_city').html(resp);
 		}
	 });
}


function getship_country()
 {
 	var cout = $('select#shipping_country').val();
	
 	$.ajax({
 		type: 'POST',
 		url: '<?php echo site_url('salesorder/get_state'); ?>',
 		data: 'country='+cout,
 		success: function(resp) {
 			$('select#shipping_state').html(resp);
      var st_ship_id = $('select#shipping_state').val();
      $.ajax({
        type: 'POST',
        url: '<?php echo site_url('salesorder/get_city'); ?>',
        data: {country: cout, state: st_ship_id},
        success: function(resp) {
          $('select#shipping_city').html(resp);
        }
      });
 		}
	 });
 }
 function getship_state()
{
	var cout = $('select#shipping_country').val();
	 
 	var state = $('select#shipping_state').val();
 	$.ajax({
 		type: 'POST',
 		url: '<?php echo site_url('salesorder/get_city'); ?>',
 		data: {country: cout, state: state},
 		success: function(resp) { 
			$('select#shipping_city').html(resp);
 		}
	 });
}

function codevalidation()
{
	var code = $("#so_no").val();
	var prefix = $("#so_prefix").val();
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

function getstore_division()
 {
 	var material_store_division_id = $('select#material_store_division_id').val();
	
 	$.ajax({
		
 		type: 'POST', 
 		url: '<?php echo site_url('product/getprostore_division'); ?>',
 		data: {material_store_division_id: material_store_division_id},
		
 		success: function(resp) {
			$('select#material_store_id').html(resp);
		}
 		
		
	 });
 	
}

</script>

<?php echo $this->load->view('pages/sales_left_side'); ?>

<section>
	<div class="rightPanel" style="padding: 14px 20px; width:96%;">
		
		<div class='container-fluid editViewContainer'>
			<form class="form-horizontal recordEditView" id="addSalesorder" name="addSalesorder" autocomplete="off" method="post" action="<?php echo site_url('salesorder/addsalesorder')?>" enctype="multipart/form-data">
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">New Self Purchase Details</h3>
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
                            <th class="blockHeader" colspan="4">Self Purchase Details</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Self Purchase no
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
										 <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="so_noError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                       </div>
									    <input id="so_no" readonly="readonly" type="text" class="input-large uppercase" onkeyup="return codevalidation()" name="so_no" value="<?php if(isset($Socode)) { echo $Socode; } ?>"/>
                                        <input id="so_prefix" type="hidden" name="so_prefix" value="<?php if(isset($SoPrefix)) { echo $SoPrefix; } ?>"/>
										
                                    </span>
                                 </div>
                             </td>
						<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    Status
                                </label>
                            </td>
                             <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
									<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="customer_categoryError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                     </div>
                                     <select name="so_status" class="chzn-select" id="so_status">
                                            <option value="created">Created</option>
                                     </select>
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
                                        <input id="so_customer_name" name="so_customer_name" readonly type="text" class="input-large with_plus" />
                                        <span id="plus_customer_details" class="add-on cursorPointer createReferenceRecord plus">
                                              <a href="javascript:void(0);"><i class="icon-plus" title="Create"></i></a>
                                          </span>
                                          <input type="hidden" id="so_customer_id" name="so_customer_id" value="">
                                          <input id="pricebook_id" name="pricebook_id" type="hidden" />
										  <input type="hidden" name="customer_discount"  id="customer_discount" value=""  />
                                          <input type="hidden" name="customer_cash_discount"  id="customer_cash_discount" value=""  />
                                          <input type="hidden" name="customer_tax_type"  id="customer_tax_type" value=""  />
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
                                       <input id="so_customer_code" readonly name="so_customer_code" type="text" class="input-large uppercase"/>
                                       
                                    </span>
                                </div>
                            </td>
						  
						</tr>
						
						
                        
                        <tr>
                        <td class="fieldLabel medium">
                            <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Division
                                </label>
                            </td>
                            <td>
                            <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="division_nameError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                            <select name="material_store_division_id" class="chzn-select" id="material_store_division_id" onchange="getstore_division()" >
										<option value="1">GST</option>
                                        </select>
                            </td>
                            
                              <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                <span class="redColor">*</span>Store</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="store_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
										 <input id="purchse_ord_transac_date" name="purchse_ord_transac_date" value="<?php echo date('d-m-Y');?>" type="hidden" class="input-large nameField" />
                                       
                                       <select name="material_store_id" class="chzn-select" id="material_store_id"><option value="3">Agro- Gobi</option><option value="1">Agro- Erode</option><option value="2">Agro- Tiruppur</option></select>
                                        </select>
                                    </span>
                                </div>
                            </td>
                        </tr>
                       
					   
					    <tr>
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
                            
                              <td class="fieldLabel medium">
                               
                            </td>
                            <td class="fieldValue medium" >
                               
                            </td>
                        </tr>
                    </tbody>
                    
                </table>
						
                <br>
                 <span class="pin_error" id="add_itemError">
                 Please Enter Number Only
                   </span>
                    
               
			  <br />
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
										<select	data-selected-value="" name="purchse_ord_payment_mode" class="chzn-select" id="purchse_ord_payment_mode">
                                             <?php if(isset($paymentmode) && !empty($paymentmode)) { foreach($paymentmode as $PM) { ?>
                                            <option value="<?php echo $PM['payment_mode_id']; ?>"><?php echo $PM['payment_mode_name']; ?></option><?php } } ?>
                                        </select>
                                        
                                    </span>
                                 </div>
                             </td>
                           
                        
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    Transaction Date
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <input id="purchse_ord_transac_date" name="purchse_ord_transac_date" value="<?php echo date('d-m-Y');?>" type="text" class="input-large nameField" />
                                    </span>
                                 </div>
                             </td>
                           
                        </tr>
                        
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                  Payment Terms	
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <textarea class="row-fluid" id="purchse_ord_terms_conditions" name="purchse_ord_terms_conditions" ></textarea>
                                    </span>
                                 </div>
                             </td>
                           <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                  Comments
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <textarea class="row-fluid" id="purchse_ord_payment_terms" name="purchse_ord_payment_terms" ></textarea>
                                    </span>
                                 </div>
                             </td>
                        </tr>
						
                    </tbody>
                    
                </table>
			
                 
                 <div class="row-fluid">
                 
                <span style="color:#FF0000; text-align:center; width:100%; height: 25px; float: left;" id="dc_error"></span>
                    <div class="pull-right">
                       <?php /*?> <a class="btn btn-success" id="sales_singleitem" href="javascript:void(0);"><strong>Add Single Item</strong></a><?php */?>
                        <a class="btn btn-success" id="sales_multipleitems"><strong>Add Item</strong></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
				 <input type ="hidden" value="0" name="last_table_id " id="last_table_id">
                <br /> 
				 <br>
                  <span class="grid_error" id="add_itemError">
                 Please Add Some Items
                   </span>
                   
                   
				<table id="tblList">
				<thead>
				<tr>	
                <th>SN.</th>
                <!--<th>Item Code</th>-->
                <th>SKU</th>
        		<th>Item</th>
               
                <th>Qty</th>
				<th>Incentive Rate</th>
				<th>Incentive total</th>
                <th>MRP</th>
                <th>Price</th>
				<th>Batch No</th>
				<th>Inventory Qty</th>
                <th>Gross Amount</th>	
				<th>Discount (%)</th>
				<th>Discount Amount</th>
              <!--  <th>Damage Discount (%)</th>
                <th>Damage Discount Amount</th>-->
                <th>Gross Amount</th>
                <?php if($tax_value != 'nontaxable') { ?>
				<th>CGST %</th>
                <!--<th>CGST Amount</th>-->
                <th>SGST %</th>
                <!--<th>SGST Amount</th>-->
              <!--  <th>IGST %</th>
                <th>IGST Amount</th>-->
                <?php } ?>
                
				<th>Actions</th>
				 
				</tr>
				</thead>
				<tbody id="disp_items">
				
				</tbody>
				</table>
                
                <table class="popuptable">
                    <tr>	
                    	<td>&nbsp </td>
                        <td>&nbsp </td>
                        <td>&nbsp </td>
                        <td>&nbsp </td>	
                        <td>&nbsp </td>
                        <input type="hidden" id="scheme_id" name="scheme_id" class="scheme_id" value="0.00" readonly="readonly" />
                        <td><input type="hidden" id="total_quantity_items" name="total_quantity_items" class="quantity" value="0.00" readonly="readonly" /></td>

                        <td><input type="hidden" id="total_discount_percent_items" name="total_discount_percent_items" class="quantity" value="0.00" readonly="readonly" /></td>
                        
                         <td><input type="hidden" id="total_item_flat_discount" name="total_item_flat_discount" class="quantity" value="0.00" readonly="readonly" /></td>
                        
                        <td><input type="hidden" id="total_discount_amount_items" name="total_discount_amount_items" class="quantity" value="0.00" readonly="readonly" /></td>
                        <?php if($tax_value != 'nontaxable') { ?>
                        <td><input type="hidden" id="total_tax_percent_items" name="total_tax_percent_items" class="quantity" value="0.00" readonly="readonly" /></td>
                        <td><input type="hidden" id="total_tax_amount_items" name="total_tax_amount_items" class="quantity" value="0.00" readonly="readonly" /></td>
                        <?php } else { ?>
						<td><input type="hidden" id="total_tax_percent_items" name="total_tax_percent_items" class="quantity" value="0.00" readonly="readonly" /></td>
                        <td><input type="hidden" id="total_tax_amount_items" name="total_tax_amount_items" class="quantity" value="0.00" readonly="readonly" /></td>
						<?php } ?>
                        <input type="hidden" id="total_net_amount_items" name="total_net_amount_items" class="quantity" value="0.00" readonly="readonly" />
                        <td><input type="hidden" id="total_gross_amount_items" name="total_gross_amount_items" class="quantity" value="0.00" readonly="readonly" /></td>
                        <td>&nbsp </td>
                    </tr>
				</table>
                 
                
               <br/>
                 <input type="hidden" value="" name="tax_group_length" id="tax_group_length"  />
                 <div id="tax_group_calculation">

                 </div>
                <br/>
				 
			<table class="table table-bordered blockContainer showInlineTable equalSplit">
				
				
				<tbody>
				<tr>
				
						<td class="fieldLabel medium" style="width:20%;">
                    <label class="muted pull-right marginRight10px">
						<span class="redColor">*</span>Total Gross Amount
					</label>
				</td>
				
				<td class="fieldLabel medium" style="width:20%;">
                 
                     <span class="totalvalidationmsg" id="add_itemError2"></span>
					<input class="amount_calc" name="total_gross_amount" id="total_gross_amount" type="text" readonly="readonly">
				</td>
				
			</tr>
            
           
            
            <tr>
				<td class="fieldLabel medium">
					<label class="muted pull-right marginRight10px">
						Total Discount Amount
					</label>
				</td>
				<td class="fieldLabel medium" style="width:20%;">
                	<span class="totalvalidationmsg"></span>
					<input class="amount_calc" name="total_disocunts_amount"  id="total_disocunts_amount" type="text" readonly="readonly">
                    <input class="amount_calc" name="total_disocunts_percentage"  id="total_disocunts_percentage" type="hidden" readonly="readonly"  >
                    <?php if($tax_value == 'nontaxable') { ?>
                    <input class="amount_calc" name="total_tax_amount"  id="total_tax_amount" type="hidden" value="0.00" readonly="readonly">
                    <?php } ?>
				</td>
			</tr>
            <?php if($tax_value != 'nontaxable') { ?>
            <tr>
				<td class="fieldLabel medium">
					<label class="muted pull-right marginRight10px">
						Total Tax Amount
					</label>
				</td>
				<td class="fieldLabel medium" style="width:20%;">
                	<span class="totalvalidationmsg"></span>
					<input class="amount_calc" name="total_tax_amount"  id="total_tax_amount" type="text" readonly="readonly">
				</td>
			</tr>
            <?php } ?>
			<tr>
				<td class="fieldLabel medium">
					<label class="muted pull-right marginRight10px">
						Shipping & Handling Charges
					</label>
				</td>
				
				<td class="fieldLabel medium" style="width:20%;">
                	<span class="totalvalidationmsg"></span>
					<input class="amount_calc" name="total_shipping_charges" id="total_shipping_charges" type="text" onkeyup="calculateGrandTotal(event);">
				</td>
				
			</tr>
			<tr>
				<td class="fieldLabel medium">
					<label class="muted pull-right marginRight10px">
						Shipping Tax
					</label>
				</td>
				
				<td class="fieldLabel medium" style="width:20%;">
                	<span class="totalvalidationmsg"></span>
					<input class="amount_calc" name="total_shipping_tax" id="total_shipping_tax" type="text" readonly="readonly" />
				</td>
			</tr>
			<tr>
				
                <td class="fieldLabel medium">
                <label class="muted pull-right marginRight10px">
					<span class="redColor">*</span>	 Debit Amount</label>
				</td>
				
				<td class="fieldLabel medium" style="width:20%;">
                  
                	<span class="totalvalidationmsg" id="add_itemError1"></span>
					<input class="amount_calc" name="cus_wallet_debit_amt" id="cus_wallet_debit_amt" type="text" onkeyup="calculateGrandTotal(event);">
				</td>
			</tr>
			
			<tr>
				<td class="fieldLabel medium">
                <label class="muted pull-right marginRight10px">
					<span class="redColor">*</span>	 Total
					Net Amount</label>
				</td>
				
				<td class="fieldLabel medium" style="width:20%;">
                  
                	<span class="totalvalidationmsg" id="add_itemError1"></span>
					<input class="amount_calc" name="grand_total" id="grand_total" type="text" readonly="readonly">
				</td>
			</tr>
			
			<tr>
				<td class="fieldLabel medium">
					<label class="muted pull-right marginRight10px">
					    Total Incentive Amount</label>
				</td>
				
				<td class="fieldLabel medium" style="width:20%;">
                <span class="totalvalidationmsg" id="add_itemError1"></span>
					<input class="amount_calc" name="total_incentive_amount" id="total_incentive_amount" value="<?php if(isset($so_item_total->so_grand_total_incentive)){ echo $so_item_total->so_grand_total_incentive;}?>" type="text" readonly="readonly">
				</td>
			</tr>
			</tbody>
				</table>
                <br />				
                <div class="row-fluid">
                    <div class="pull-right">
                        <button class="btn-success po_add_details cus_add_details" type="submit" name="save" id="cus_add_details"><strong>Save</strong></button>
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
      <div id="singleitem_to_pop_up" class="pop-up-display-content singleitemscontent">
       
	 </div>
     <!--popup end -->
     
     <!--popup start -->
      <div id="multipleitems_to_pop_up" class="pop-up-display-content multipleitemscontent">
       
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
			if(pricebook_id != "")
			{
				$.ajax({
					type: 'POST',
					url: "<?php echo site_url('salespopup/sales_single_item'); ?>",
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
			
 			if(pricebook_id != "" && division_id != "" && store_id != "")
			{
				$.ajax({
					type: 'POST',
					url: "<?php echo site_url('salespopup/sales_getmultipleitemdetails'); ?>",
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
				if(so_customer_id == "")
				{
					var body = $("html, body");
					body.animate({scrollTop:0}, '500', 'swing', function() { 
					   $('#so_customer_nameError').css("display", "block");
					});
					return false;
				}
               else
			   {
					  document.getElementById('so_customer_nameError').style.display = 'none';
					  $('#so_customer_id').css("border","1px solid #82B04F");
					  document.getElementById("so_customer_nameError").innerHTML="";
			   }
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
						position: [10, 10], //x, y
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
						//	alert(resp);return false;
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
