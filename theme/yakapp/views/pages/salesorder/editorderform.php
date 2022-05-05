<script type="text/javascript">
$(document).ready(function()
{	
	var count_of_items = $("#count_of_items").val();
	$("#last_table_id").val(count_of_items);
	
	$('.so_update_details').click(function()
     {
        
        var so_no = $("#so_no").val();
        var so_customer_name = $("#so_customer_name").val();
        var so_customer_code = $("#so_customer_code").val();
       
		var last_table_id  = $("#last_table_id ").val();
		
		var total_gross_amount  = $("#total_gross_amount ").val();
		var grand_total  = $("#grand_total ").val();
		
		
		
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
	
	
	$('.quantity').keyup(function(){
		var val = $(this).val();
		if(isNaN(val)){
			 val = val.replace(/[^0-9\.]/g,'');
			 if(val.split('.').length>2) 
				 val =val.replace(/\.+$/,"");
				 
		}
		$(this).val(val); 
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
	
	$('.amount_calc, .numeric, .quantity, #bill_zip_code, #ship_zip_code').keyup(function(){
		var val = $(this).val();
		if(isNaN(val)){
			 val = val.replace(/[^0-9\.]/g,'');
			 if(val.split('.').length>2) 
				 val =val.replace(/\.+$/,"");
		 $('.nums_error').css("display","block");
			 $(this).val("");
            return false;
		}
		else
		 {
			  $('.nums_error').css("display","none");
             $(this).val(val);
		 }
	});

   var cont_id = $('#cont_id').val();
   var st_id = $('#st_id').val();
   var cty_id = $('#cty_id').val();
   
   $.ajax({
    type: 'POST',
    url: '<?php echo site_url('salesorder/get_state'); ?>',
    data: {country:cont_id, state:st_id},
    success: function(resp) {
      $('select#billing_state').html(resp);
      $('select#shipping_state').html(resp);
    }
   });
   $.ajax({
    type: 'POST',
    url: '<?php echo site_url('salesorder/get_city'); ?>',
    data: {country:cont_id, state:st_id, city:cty_id},
    success: function(resp) {
      $('select#billing_city').html(resp);
      $('select#shipping_city').html(resp);
    }
   });
	
  });
	
</script>
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
 

</script>


<?php echo $this->load->view('pages/sales_left_side'); ?>



<section>
	<div class="rightPanel" style="padding: 14px 20px; width:96%;">
		
		<div class='container-fluid editViewContainer'>
			<form class="form-horizontal recordEditView" id="EditView" name="EditView" autocomplete="off" method="post" action="<?php echo site_url();?>/salesorder/edit_orderform/<?php  echo $so_data->sales_order_id;?>" enctype="multipart/form-data">
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">Update Self Purchase</h3>
					<span class="pull-right">
						<button class="btn-success so_update_details" value="Save" type="submit" name="save" id="so_update_details"><strong>Update</strong></button>
						 <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
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
									    <input id="so_no" type="text" class="input-large uppercase" name="so_no" readonly value="<?php if(isset($so_data->sales_order_number)){ echo $so_data->sales_order_number;}?>" />
										 <input id="so_no_id" type="hidden" class="input-large uppercase" name="so_no_id" readonly value="<?php if(isset($so_data->sales_order_id)){ echo $so_data->sales_order_id;}?>" />
                                        
										
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
								<select name="so_status" class="chzn-select" id="so_status">

								
								<?php
								$sessionData = $this->session->userdata('userlogin');
								if($sessionData['user_id'] == 1)  { ?>
								<option value="confirmorder"  <?php if($so_data->sales_order_status == "confirmorder") { ?> selected="selected" <?php } ?>>Confirm Order</option>
								<option value="approved" <?php if($so_data->sales_order_status == "approved") { ?> selected="selected" <?php } ?>>Approved</option>
								
								<option value="cancelled" <?php if($so_data->sales_order_status == "cancelled") { ?> selected="selected" <?php } ?>>Cancelled</option>
								<?php }
								else {
								?>
								<option value="processed" <?php if($so_data->sales_order_status == "processed") { ?> selected="selected" <?php } ?>>Processed</option>
								<option value="confirmorder"  <?php if($so_data->sales_order_status == "confirmorder") { ?> selected="selected" <?php } ?>>Confirm Order</option>
								<option value="cancelled" <?php if($so_data->sales_order_status == "cancelled") { ?> selected="selected" <?php } ?>>Cancelled</option>
								
								<?php } ?>

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
                                        <input id="so_customer_name" readonly name="so_customer_name" type="text" class="input-large with_plus nosplchar" value="<?php if(isset($so_data->sales_order_customer_name)){ echo $so_data->sales_order_customer_name;}?>" />
                                    <span id="plus_customer_details" class="add-on cursorPointer createReferenceRecord plus">
                                              <a href="javascript:void(0);"><i class="icon-plus" title="Create"></i></a>
                                          </span>
                                          <input type="hidden" id="so_customer_id" name="so_customer_id" value="<?php if(isset($so_data->sales_order_customer_id)) { echo $so_data->sales_order_customer_id; } ?>">
                                            <input type="hidden" id="so_customer_code" name="so_customer_code" value="<?php if(isset($so_data->OFCR_USR_VALUE)) { echo $so_data->OFCR_USR_VALUE; } ?>">
											 <input type="hidden" id="so_customer_mobile" name="so_customer_mobile" value="<?php if(isset($so_data->OFCR_MOB)) { echo $so_data->OFCR_MOB; } ?>">
                                            <input id="pricebook_id" name="pricebook_id" type="hidden" value="<?php if(isset($so_data->sales_order_customer_price_book_id)) { echo $so_data->sales_order_customer_price_book_id; } ?>" />
                                            <input type="hidden" name="customer_discount"  id="customer_discount" value="<?php if(isset($so_data->sales_order_customer_discount_percentage)) { echo $so_data->sales_order_customer_discount_percentage; } ?>"  />
                                            <input type="hidden" name="customer_cash_discount"  id="customer_cash_discount" value="<?php if(isset($so_data->sales_order_customer_cash_discount)) { echo $so_data->sales_order_customer_cash_discount; } ?>"  />
                                            <input type="hidden" name="customer_tax_type"  id="customer_tax_type" value="<?php if(isset($so_data->customer_discounts_tax)) { echo $so_data->customer_discounts_tax; } ?>"  />

                                          </div>
                                    </span>
                                 </div>
                             </td>
                             <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                <span class="redColor">*</span>Customer Code</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="so_customer_codeError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                     </div>
                                       <input id="so_customer_code" readonly name="so_customer_code" type="text" class="input-large uppercase" value="<?php if(isset($so_data->sales_order_customer_code)){ echo $so_data->sales_order_customer_code;}?>" /> 
                                        <input id="material_store_division_id" readonly name="material_store_division_id" type="hidden" value="1" class="input-large uppercase"/>
										  <input id="material_store_id" readonly name="material_store_id" type="hidden" value="1" class="input-large uppercase"/>
                                    </span>
                                </div>
                            </td>
                            </tr>
                           
                        
                        
                      
                        
                    </tbody>
                    
                </table>
						
                <br>
                     <span class="nums_error" id="add_itemError">
                 Please Enter Number Only
                   </span>
                      
               
              <br>
			 
                <br>
                <div class="row-fluid">
                    <div class="pull-right">
                        <?php /*?><a class="btn btn-success" id="sales_singleitem" href="javascript:void(0);"><strong>Add Single Item</strong></a><?php */?>
                        <a class="btn btn-success" id="sales_multipleitems"><strong>Add Item</strong></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
				 <input type ="hidden" value="0" name="last_table_id " id="last_table_id">
				  <input type ="hidden" value="<?php echo count($so_item_data); ?>" name="count_of_items " id="count_of_items">
                <br /> 
				 <br>
                 
                  <span class="grid_error" id="add_itemError">
                 Please Add Some Items
                   </span>
                   
				<table id="tblList">
				<thead>
				<tr>	
                <th>SNo.</th>
                <th>SKU</th>
        		
                <th>Qty</th>
                <th>Price</th>
				
                <th>Gross Amount</th>
				<th>Actions</th>
				</tr>
				</thead>
				<tbody id="disp_items">
				
				<?php if($tax_value != 'nontaxable') { ?>
				<?php //echo "<pre>";print_r($so_item_data);
				if(!empty($so_item_data)) { $itemcount = 1; foreach($so_item_data as $ITEMS) { ?>
				<tr>
				<td><a href="javascript:void(0);" ><?php  echo $itemcount;  ?></a>
				</td>
				<td>	
				<a href="javascript:void(0);" ><?php if(isset($ITEMS['product_sku'])) { echo $ITEMS['product_sku']; } ?></a>				
				<input id="item_id_<?php echo $itemcount; ?>" name="item_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_item_id'])) { echo $ITEMS['so_items_item_id']; } ?>" type="hidden" />
				<input id="item_code_<?php echo $itemcount; ?>" name="item_code[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_code'])) { echo $ITEMS['so_items_code']; } ?>" type="hidden" />
				<input id="item_mfg_prtno_<?php echo $itemcount; ?>" name="item_mfg_prtno[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_mfr_part_number'])) { echo $ITEMS['product_mfr_part_number']; } ?>" type="hidden" />
				<input id="so_items_id_<?php echo $itemcount; ?>" name="so_items_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_id'])) { echo $ITEMS['so_items_id']; } ?>" type="hidden" />
				<input id="item_name_<?php echo $itemcount; ?>" name="item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_name'])) { echo $ITEMS['product_name']; } ?>" type="hidden" />
				</td>

				<td>
				<input id="item_qty_<?php echo $itemcount; ?>" name="item_qty[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_ord_qty'])) { echo $ITEMS['so_items_ord_qty']; } ?>" type="text" class="quantity stock_text" onkeyup="return sales_items_grid_total(event, '<?php echo $itemcount; ?>')" />
				<input  name="item_mrp[<?php echo $itemcount; ?>]" id="item_mrp_<?php echo $itemcount;  ?>" class="quantity" readonly="readonly" type="hidden" value="<?php if(isset($ITEMS['so_items_mrp'])) { echo $ITEMS['so_items_mrp'];  } ?>"> </input>
				</td>

				<td>
				<input id="item_priceperunit_<?php echo $itemcount; ?>" name="item_priceperunit[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_priceperunit'])) { echo $ITEMS['so_items_priceperunit']; } ?>" type="text" class="quantity" readonly="readonly" onkeyup="return sales_items_grid_total(event, '<?php echo $itemcount; ?>')" /></td>

				<td>
				<input id="item_gross_amount_with_disc_<?php echo $itemcount; ?>" name="item_gross_amount_with_disc[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_gross_amount_with_discount'])) { echo $ITEMS['so_items_gross_amount_with_discount']; } ?>" type="text" class="quantity" readonly="readonly" /> 
			</td>
			 <td>
                            <div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_delete_<?php echo $itemcount; ?>" onclick="return orderformrowdelete('<?php echo $itemcount; ?>');" data-item="<?php if(isset($ITEMS['so_items_item_id'])) { echo $ITEMS['so_items_item_id']; } ?>" data-delete="<?php echo $itemcount; ?>" title="Delete"><span class="icon-trash"></span></div>
                        </td>
			<a href="javascript:void(0);" ><?php if(isset($ITEMS['so_items_hsn_sac'])) { echo $ITEMS['so_items_hsn_sac']; } ?></a>
			<input id="item_hsn_value_<?php echo $itemcount; ?>" name="item_hsn_value[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_hsn_sac'])) { echo $ITEMS['so_items_hsn_sac']; } ?>" type="hidden" class="quantity" readonly="readonly"  />
			<input id="multiple_item_division_id_<?php echo $itemcount; ?>" name="multiple_item_division_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_division_id'])) { echo $ITEMS['so_items_division_id']; } ?>" type="hidden" />
			<input id="multiple_item_division_name_<?php echo $itemcount; ?>" name="multiple_item_division_name[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['division_name'])) { echo $ITEMS['division_name']; } ?>" type="hidden" />
			<input id="multiple_item_store_id_<?php echo $itemcount; ?>" name="multiple_item_store_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_store_id'])) { echo $ITEMS['so_items_store_id']; } ?>" type="hidden" />
			<input id="multiple_item_store_name_<?php echo $itemcount; ?>" name="multiple_item_store_name[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['store_name'])) { echo $ITEMS['store_name']; } ?>" type="hidden" />

			<input id="item_incentive_rate_<?php echo $itemcount; ?>" name="item_incentive_rate[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_incentive_rate'])) { echo $ITEMS['so_items_incentive_rate']; } ?>" type="hidden" class="quantity stock_text" onkeyup="return sales_items_grid_total(event, '<?php echo $itemcount; ?>')" />
			
			<input id="item_incentive_total_<?php echo $itemcount; ?>" name="item_incentive_total[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_incentive_total'])) { echo $ITEMS['so_items_incentive_total']; } ?>" type="hidden" class="quantity stock_text" onkeyup="return sales_items_grid_total(event, '<?php echo $itemcount; ?>')" />
			
			<input id="item_uom_id_<?php echo $itemcount; ?>" name="item_uom_id[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['uom_id'])) { echo $ITEMS['uom_id']; } ?>" />
			<input id="item_uom_name_<?php echo $itemcount; ?>" name="item_uom_name[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['uom_name'])) { echo $ITEMS['uom_name'];  } ?> " /> <input id="free_qty_name<?php echo $itemcount; ?>" name="free_qty_name[<?php echo $itemcount; ?>]" readonly="readonly"  value="<?php if(isset($ITEMS['so_items_free_item'])) { echo $ITEMS['so_items_free_item']; } ?>" type="hidden" class="quantity stock_text" onkeyup="return sales_items_grid_total(event, '<?php echo $itemcount; ?>')" /><input type="hidden" id="scheme_id" name="scheme_id" class="scheme_id" value="" readonly="readonly" />
			<input id="item_qty_free_<?php echo $itemcount; ?>" name="item_qty_free[<?php echo $itemcount; ?>]" readonly="readonly" value="<?php if(isset($ITEMS['so_items_free_qty'])) { echo $ITEMS['so_items_free_qty']; } ?>" type="hidden" class="quantity stock_text" onkeyup="return sales_items_grid_total(event, '<?php echo $itemcount; ?>')" />

			<input id="item_batch_no_<?php echo $itemcount; ?>" readonly name="item_batch_no[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_batch_no'])) { echo $ITEMS['so_items_batch_no']; } ?>" type="hidden" class="quantity stock_text" onkeyup="return sales_items_grid_total(event, '<?php echo $itemcount; ?>')" />
			
			<input id="item_inv_qty_<?php echo $itemcount; ?>" readonly name="item_inv_qty[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_inv_qty'])) { echo $ITEMS['so_items_inv_qty']; } ?>" type="hidden" class="quantity stock_text" onkeyup="return sales_items_grid_total(event, '<?php echo $itemcount; ?>')" />
			<input id="item_inv_id_<?php echo $itemcount; ?>" readonly name="item_inv_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_inv_id'])) { echo $ITEMS['so_inv_id']; } ?>" type="hidden" class="quantity stock_text" onkeyup="return sales_items_grid_total(event, '<?php echo $itemcount; ?>')" />
			
			<input id="item_gross_amount_<?php echo $itemcount; ?>" name="item_gross_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_gross_amount'])) { echo $ITEMS['so_items_gross_amount']; } ?>" type="hidden" class="quantity" readonly="readonly" />
			<input id="item_discount_percent_<?php echo $itemcount; ?>" name="item_discount_percent[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_discounts_percentage'])) { echo $ITEMS['so_items_discounts_percentage']; } ?>" type="hidden" class="quantity stock_text" readonly="readonly" />
			<input id="item_discount_amount_<?php echo $itemcount; ?>" name="item_discount_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_discounts_amount'])) { echo $ITEMS['so_items_discounts_amount']; } ?>" type="hidden" class="quantity stock_text" readonly="readonly" />
			<input id="item_tax_amount_<?php echo $itemcount; ?>" name="item_tax_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_tax_amount'])) { echo $ITEMS['so_items_tax_amount']; } ?>" type="hidden" class="quantity stock_text" readonly="readonly" />
			<input id="item_cgst_<?php echo $itemcount; ?>" name="item_cgst[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_gst'])) { echo $ITEMS['so_items_gst']; } ?>" type="hidden" class="quantity stock_text" />

			<input id="item_cgst_amount_<?php echo $itemcount; ?>" name="item_cgst_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_gst_amt'])) { echo $ITEMS['so_items_gst_amt']; } ?>" type="hidden" class="quantity stock_text" />

			
			<input id="item_igst_<?php echo $itemcount; ?>" name="item_igst[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_igst'])) { echo $ITEMS['so_items_igst']; } ?>" type="hidden" class="quantity stock_text" readonly="readonly"/>

			<input id="item_igst_amount_<?php echo $itemcount; ?>" name="item_igst_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_igst_amt'])) { echo $ITEMS['so_items_igst_amt']; } ?>" type="hidden" class="quantity stock_text" readonly="readonly" />

			<input id="item_sgst_<?php echo $itemcount; ?>" name="item_sgst[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_sgst'])) { echo $ITEMS['so_items_sgst']; } ?>" type="hidden" class="quantity stock_text"/>

			<input id="item_sgst_amount_<?php echo $itemcount; ?>" name="item_sgst_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_sgst_amt'])) { echo $ITEMS['so_items_sgst_amt']; } ?>" type="hidden" class="quantity stock_text" />
			
			<input id="item_tax_percent_<?php echo $itemcount; ?>" name="item_tax_percent[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_tax_percent'])) { echo $ITEMS['so_items_tax_percent']; } ?>" type="hidden" class="quantity stock_text" readonly="readonly" />


			<input id="item_damage_discount_percentage_<?php echo $itemcount; ?>" name="item_damage_discount_percentage[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_damage_discount_perc'])) { echo $ITEMS['so_items_damage_discount_perc']; } else { echo '0';} ?>" type="hidden" class="quantity stock_text"  />
			<input id="item_damage_discount_amount_<?php echo $itemcount; ?>" name="item_damage_discount_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_damage_discount_amount'])) { echo $ITEMS['so_items_damage_discount_amount']; } else { echo '0';} ?>" type="hidden" class="quantity stock_text" />
				
                        
                </tr>
					
                    <?php $itemcount++; } } ?>
                        <?php } else { ?>
						<?php if(!empty($so_item_data)) { $itemcount = 1; foreach($so_item_data as $ITEMS) { ?>
                       <tr>
                        <td><a href="javascript:void(0);" ><?php  echo $itemcount;  ?></a>
                       </td>
                      <td><a href="javascript:void(0);" id="item_code_value_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['product_code'])) { echo $ITEMS['product_code']; } ?></a>
                        <input id="item_code_<?php echo $itemcount; ?>" name="item_code[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_code'])) { echo $ITEMS['product_code']; } ?>" type="hidden" />
                        <input id="item_id_<?php echo $itemcount; ?>" name="item_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_item_id'])) { echo $ITEMS['so_items_item_id']; } ?>" type="hidden" /></td>
                        <td><a href="javascript:void(0);" id="item_mfg_prtno_value_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['product_mfr_part_number'])) { echo $ITEMS['product_mfr_part_number']; } ?></a>
                        <input id="item_mfg_prtno_<?php echo $itemcount; ?>" name="item_mfg_prtno[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_mfr_part_number'])) { echo $ITEMS['product_mfr_part_number']; } ?>" type="hidden" /></td>
                      <td><a href="javascript:void(0);" id="item_name_value_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['product_name'])) { echo $ITEMS['product_name']; } ?></a>
                        <input id="item_name_<?php echo $itemcount; ?>" name="item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_name'])) { echo $ITEMS['product_name']; } ?>" type="hidden" /></td>
                      <td><a href="javascript:void(0);" id="item_uom_name_value_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['uom_name'])) { echo $ITEMS['uom_name'];  } ?> </a>
                        <input id="item_uom_id_<?php echo $itemcount; ?>" name="item_uom_id[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['uom_id'])) { echo $ITEMS['uom_id']; } ?>" />
                        <input id="item_uom_name_<?php echo $itemcount; ?>" name="item_uom_name[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['uom_name'])) { echo $ITEMS['uom_name'];  } ?> " /></td>
                      <td>
                        <input id="item_priceperunit_<?php echo $itemcount; ?>" name="item_priceperunit[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_priceperunit'])) { echo $ITEMS['so_items_priceperunit']; } ?>" type="text" class="quantity" onkeyup="return sales_items_grid_total(event, '<?php echo $itemcount; ?>')" /></td>
                      <td>
                        <input id="item_qty_<?php echo $itemcount; ?>" name="item_qty[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_ord_qty'])) { echo $ITEMS['so_items_ord_qty']; } ?>" type="text" class="quantity stock_text" onkeyup="return sales_items_grid_total(event, '<?php echo $itemcount; ?>')" />
                        <input id="item_tax_percent_<?php echo $itemcount; ?>" name="item_tax_percent[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_tax_percent'])) { echo $ITEMS['so_items_tax_percent']; } ?>" type="hidden" />
                        <input id="item_vat_<?php echo $itemcount; ?>" name="item_vat[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_vat'])) { echo $ITEMS['so_items_vat']; } ?>" type="hidden" />
                        <input id="item_gst_<?php echo $itemcount; ?>" name="item_gst[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_cst'])) { echo $ITEMS['so_items_cst']; } ?>" type="hidden" />
                        <input id="item_cst_<?php echo $itemcount; ?>" name="item_cst[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_gst'])) { echo $ITEMS['so_items_gst']; } ?>" type="hidden" />
                        <input id="item_serv_tax_<?php echo $itemcount; ?>" name="item_serv_tax[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_service_tax'])) { echo $ITEMS['so_items_service_tax']; } ?>" type="hidden" />
                        <input id="item_exc_<?php echo $itemcount; ?>" name="item_exc[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_ex_duty'])) { echo $ITEMS['so_items_ex_duty']; } ?>" type="hidden" />
                        <input id="item_tax_amount_<?php echo $itemcount; ?>" name="item_tax_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_tax_amount'])) { echo $ITEMS['so_items_tax_amount']; } ?>" type="hidden" /></td>
                      <td>
                        <input id="item_discount_percent_<?php echo $itemcount; ?>" name="item_discount_percent[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_discounts_percentage'])) { echo $ITEMS['so_items_discounts_percentage']; } ?>" type="text" class="quantity stock_text" readonly="readonly" /></td>
                         <td><input id="item_flat_discount_<?php echo $itemcount; ?>" name="item_flat_discount[<?php echo $itemcount; ?>]" value="<?php  if(isset($ITEMS['so_item_flat_discount'])) { echo $ITEMS['so_item_flat_discount']; } else { echo '0';}  ?>" type="text" class="quantity stock_text"  onkeyup="return sales_items_grid_total(event, '<?php echo $itemcount; ?>')" />
                      </td>
                      <td>
                        <input id="item_discount_amount_<?php echo $itemcount; ?>" name="item_discount_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_discounts_amount'])) { echo $ITEMS['so_items_discounts_amount']; } ?>" type="text" class="quantity stock_text" readonly="readonly" /></td>
                      <td>
                       <input id="item_gross_amount_<?php echo $itemcount; ?>" name="item_gross_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_gross_amount'])) { echo $ITEMS['so_items_gross_amount']; } ?>" type="text" class="quantity" readonly="readonly" />
                       <?php /*?> <input id="item_net_amount_<?php echo $itemcount; ?>" name="item_net_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_net_amount'])) { echo $ITEMS['so_items_net_amount']; } ?>" type="text" class="quantity" readonly="readonly" /><?php */?></td>
						 <td colspan="2">
                            <div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_delete_<?php echo $itemcount; ?>" onclick="return itemsgridrowdelete('<?php echo $itemcount; ?>');" data-item="<?php if(isset($ITEMS['so_items_item_id'])) { echo $ITEMS['so_items_item_id']; } ?>" data-delete="<?php echo $itemcount; ?>" title="Delete"><span class="icon-trash"></span></div>
                        </td>
                    </tr>
                    <?php $itemcount++; } } ?>
						<?php } ?>
                        
        
				
				</tbody>
				</table>
                
               <table style="display:none;" class="popuptable">
                    <tr>	
                       
                        <td><input type="hidden" id="total_quantity_items" name="total_quantity_items" class="quantity" value="<?php if(isset($so_item_total->total_quantity_items)){ echo $so_item_total->total_quantity_items;}?>" readonly="readonly" /></td>
                        <td><input type="hidden" id="total_gross_amount_items" name="total_gross_amount_items" class="quantity" value="<?php if(isset($so_item_total->total_gross_amount_items)){ echo $so_item_total->total_gross_amount_items;}?>" readonly="readonly" /></td>
                         
                        <td><input type="hidden" id="total_discount_percent_items" name="total_discount_percent_items" class="quantity" value="<?php if(isset($so_item_total->total_discount_percent_items)){ echo $so_item_total->total_discount_percent_items;}?>" readonly="readonly" /></td>
                        <td><input type="hidden" id="total_discount_amount_items" name="total_discount_amount_items" class="quantity" value="<?php if(isset($so_item_total->total_discount_amount_items)){ echo $so_item_total->total_discount_amount_items;}?>" readonly="readonly" /></td>	
                        <?php if($tax_value != 'nontaxable') { ?>
                        <td><input type="hidden" id="total_tax_percent_items" name="total_tax_percent_items" class="quantity" value="<?php if(isset($so_item_total->total_tax_percent_items)){ echo $so_item_total->total_tax_percent_items;}?>" readonly="readonly" /></td>
                        <td><input type="hidden" id="total_tax_amount_items" name="total_tax_amount_items" class="quantity" value="<?php if(isset($so_item_total->total_tax_amount_items)){ echo $so_item_total->total_tax_amount_items;}?>" readonly="readonly" /></td>
                        <?php } else { ?>
						<td><input type="hidden" id="total_tax_percent_items" name="total_tax_percent_items" class="quantity" value="<?php if(isset($so_item_total->total_tax_percent_items)){ echo $so_item_total->total_tax_percent_items;}?>" readonly="readonly" /></td>
                        <td><input type="hidden" id="total_tax_amount_items" name="total_tax_amount_items" class="quantity" value="<?php if(isset($so_item_total->total_tax_amount_items)){ echo $so_item_total->total_tax_amount_items;}?>" readonly="readonly" /></td>
						<?php } ?>
                        <td><input type="hidden" id="total_net_amount_items" name="total_net_amount_items" class="quantity" value="<?php if(isset($so_item_total->total_net_amount_items)){ echo $so_item_total->total_net_amount_items;}?>" readonly="readonly" /></td>
                    </tr>
				</table>
                
                
                <br />
                 <input type="hidden" value="<?php echo count($tax_group); ?>" name="tax_group_length" id="tax_group_length"  />
                 <div id="tax_group_calculation">
                 <?php if(!empty($tax_group)) { $taxcount = 0; foreach($tax_group as $TG) {  ?>
                 <div class="inner_tax_group">
					<table style="display:none;" class="tax_group_table table table-bordered blockContainer showInlineTable equalSplit">
                    	<tbody>
                            <tr>
                                <td class="tax_group_lable">
                                    <label>Total Gross Amount</label>
                                </td>
                                <td>
                                    <input class="group_tax_calc" name="tax_group_gross_amount[<?php echo $taxcount; ?>]" id="tax_group_gross_amount_<?php echo $taxcount; ?>" type="text" value="<?php echo $TG['tax_group_total_gross_amount']; ?>" readonly="readonly">
                                </td>
                            </tr>
                    		<tr>
                            	<td class="tax_group_lable">
                                	<label>Discount Percent Amount</label>
                                </td>
                                <td>
                                	<input class="group_tax_calc" name="tax_group_discount_amount[<?php echo $taxcount; ?>]" id="tax_group_discount_amount_<?php echo $taxcount; ?>" type="text" value="<?php echo $TG['tax_group_total_disocunt_amount']; ?>" readonly="readonly">
                                </td>
                             </tr>
                             
                             <tr>
                            	<td class="tax_group_lable">
                                	<label>Damage Discount Amount</label>
                                </td>
                                <td>
                                	<input class="group_tax_calc" name="tax_group_damage_discount_amount[<?php echo $taxcount; ?>]" id="tax_group_damage_discount_amount_<?php echo $taxcount; ?>" type="text" value="<?php echo $TG['tax_group_damage_discount_amt']; ?>" readonly="readonly">
                                </td>
                             </tr>
                           
                             
                             
                               
                             <tr>
                             	<td class="tax_group_lable">
                                	<label>Total Gross Amount Without Tax</label>
                                </td>
                                <td>
                                <input class="group_tax_calc" name="tax_group_without_cash_discount_amount[<?php echo $taxcount; ?>]" id="tax_group_without_cash_discount_amount_<?php echo $taxcount; ?>" type="hidden" value="<?php echo $TG['tax_group_without_cash_disocunt_amount']; ?>" readonly="readonly">
                                	<input class="group_tax_calc" name="tax_group_without_tax_gross_amount[<?php echo $taxcount; ?>]" id="tax_group_without_tax_gross_amount_<?php echo $taxcount; ?>" type="text" value="<?php echo $TG['tax_group_without_tax_gross_amount']; ?>" readonly="readonly">
                                </td>
                             </tr>
                             <tr>
                             	<td class="tax_group_lable">
                                	<label>Tax Amount</label>
                                </td>
                                <td>
                                	<input class="group_tax_calc" name="tax_group_tax_amount[<?php echo $taxcount; ?>]" id="tax_group_tax_amount_<?php echo $taxcount; ?>" type="text" value="<?php echo $TG['tax_group_tax_amount']; ?>" readonly="readonly">
                                    <input name="tax_group_tax_percentage[<?php echo $taxcount; ?>]" id="tax_group_tax_percentage_<?php echo $taxcount; ?>" type="hidden" value="<?php echo $TG['tax_group_tax_percentage']; ?>" readonly="readonly">
                                </td>
                             </tr>
                             <tr>
                                 <td class="tax_group_lable">
                                 <label>Total Net Amount With Tax</label>
                                 </td>
                                 <td>
                                 <input class="group_tax_calc" name="tax_group_with_tax_gross_amount[<?php echo $taxcount; ?>]" id="tax_group_with_tax_gross_amount_<?php echo $taxcount; ?>" type="text" value="<?php echo $TG['tax_group_with_tax_gross_amount']; ?>" readonly="readonly">
								 
								   <input class="group_tax_calc" name="tax_group_total_incentive_amount[<?php echo $taxcount; ?>]" id="tax_group_total_incentive_amount_<?php echo $taxcount; ?>" type="hidden" value="<?php echo $TG['tax_group_incentive_amount']; ?>" readonly="readonly">
                                 </td>
                             </tr>
                         </tbody>
                     </table>
                     </div>
                     <br />
                     <?php $taxcount++; } } ?>
                 </div>
                 <br />
				
				
			<table class="table table-bordered blockContainer showInlineTable equalSplit">
				
				
				<tbody>
				<tr>
				<td class="fieldLabel medium">
					<label class="muted pull-right marginRight10px">
						Total Gross Amount
					</label>
				</td>
				
				<td class="fieldLabel medium" style="width:20%;">
                <span class="totalvalidationmsg" id "add_itemError2"></span>
					<input class="amount_calc" name="total_gross_amount" id="total_gross_amount"  type="text" value="<?php if(isset($so_item_total->so_total_gross_amount)){ echo $so_item_total->so_total_gross_amount;}?>" readonly="readonly">
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
					<input class="amount_calc" name="total_disocunts_amount" value="<?php if(isset($so_item_total->so_total_discount_amount)){ echo $so_item_total->so_total_discount_amount;}?>" id="total_disocunts_amount" type="text" readonly="readonly">
                    <input class="amount_calc" name="total_disocunts_percentage" value="<?php if(isset($so_item_total->so_total_discount_percentage)){ echo $so_item_total->so_total_discount_percentage;}?>"  id="total_disocunts_percentage" type="hidden" readonly="readonly">
                    <?php if($tax_value == 'nontaxable') { ?>
                    <input class="amount_calc" name="total_tax_percentage" id="total_tax_percentage" value="<?php if(isset($so_item_total->so_total_tax_percentage)){ echo $so_item_total->so_total_tax_percentage;}?>" type="hidden" readonly="readonly">
					<input class="amount_calc" name="total_tax_amount"  id="total_tax_amount" type="hidden" value="<?php if(isset($so_item_total->so_total_tax_amount)){ echo $so_item_total->so_total_tax_amount;}?>" readonly="readonly">
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
					<input class="amount_calc" name="total_tax_percentage" id="total_tax_percentage" value="<?php if(isset($so_item_total->so_total_tax_percentage)){ echo $so_item_total->so_total_tax_percentage;}?>" type="hidden" readonly="readonly">
					<input class="amount_calc" name="total_tax_amount"  id="total_tax_amount" type="text" value="<?php if(isset($so_item_total->so_total_tax_amount)){ echo $so_item_total->so_total_tax_amount;}?>" readonly="readonly">
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
					<input class="amount_calc" name="total_shipping_charges" id="total_shipping_charges"  value="<?php if(isset($so_item_total->so_total_shipping_charges)){ echo $so_item_total->so_total_shipping_charges;}?>" type="text" onkeyup="calculateGrandTotal(event);">
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
					<input class="amount_calc" name="total_shipping_tax" id="total_shipping_tax"  value="<?php if(isset($so_item_total->so_total_shipping_tax)){ echo $so_item_total->so_total_shipping_tax;}?>" type="text" onkeyup="calculateGrandTotal(event);">
                    <input class="amount_calc" name="total_adjustments" id="total_adjustments" type="hidden" value="<?php if(isset($so_item_total->so_adjustment)){ echo $so_item_total->so_adjustment;}?>" onkeyup="calculateGrandTotal(event);">
				</td>
			</tr>
			<tr>
				
                <td class="fieldLabel medium">
                <label class="muted pull-right marginRight10px">
					<span class="redColor">*</span>	 Debit Amount</label>
				</td>
				
				<td class="fieldLabel medium" style="width:20%;">
                  
                	<span class="totalvalidationmsg" id="add_itemError1"></span>
					<input class="amount_calc" name="cus_wallet_debit_amt" id="cus_wallet_debit_amt" type="text" onkeyup="calculateGrandTotal(event);" value="<?php if(isset($so_item_total->total_redeem_amount)){ echo $so_item_total->total_redeem_amount;}?>">
				</td>
			</tr>
			<tr>
				<td class="fieldLabel medium">
					<label class="muted pull-right marginRight10px">
					    Total
					Net Amount</label>
				</td>
				
				<td class="fieldLabel medium" style="width:20%;">
                <span class="totalvalidationmsg" id="add_itemError1"></span>
					<input class="amount_calc" name="grand_total" id="grand_total" value="<?php if(isset($so_item_total->so_grand_total)){ echo $so_item_total->so_grand_total;}?>" type="text" readonly="readonly">
				</td>
			</tr>
			<tr>
				<td class="fieldLabel medium">
					<label class="muted pull-right marginRight10px">
					    Total Incentive Amount</label>
				</td>
				
				<td class="fieldLabel medium" style="width:20%;">
                <span class="totalvalidationmsg" id="add_itemError1"></span>
					<input class="amount_calc" name="total_incentive_amount" id="total_incentive_amount" value="<?php if(isset($so_item_total->total_incentive_amount)){ echo $so_item_total->total_incentive_amount;}?>" type="text" readonly="readonly">
				</td>
			</tr>
			</tbody>
				</table>
                <br />				
                <div class="row-fluid">
                    <div class="pull-right">
                        <button class="btn-success so_update_details so_update_details" type="submit" name="save" id="so_update_details"><strong>Update</strong></button>
                        <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
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
     
	 
     
</section>

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
					url: "<?php echo site_url('salespopup/orderform_itemdetails'); ?>",
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
				//url: 'echo site_url('salesorder/customerpopup'); ',
				url: '<?php echo site_url('salespopup/customerpopup'); ?>',
				data: {customer:""},
				success: function(resp) 
				{
					$("#customerdetail_to_popup").html(resp);
						//	alert(resp);return false;
						e.preventDefault();
						$('#customerdetail_to_popup').bPopup({
						position: [100, 50], //x, y
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

