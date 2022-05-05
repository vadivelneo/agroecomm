	<script type="text/javascript">
$(document).ready(function()
{
	$("#last_table_id").val('0');
	document.getElementById("EditView").reset();
	
    $('.po_add_details').click(function()
     {
       
        var purchse_ord_num = $("#purchse_ord_num").val();
		var vdrquo_vendor_name = $("#vdrquo_vendor_name").val();
        var last_table_id = $("#last_table_id").val();
		var total_gross_amount  = $("#total_gross_amount ").val();
		var grand_total  = $("#grand_total ").val();
    
       
		if(purchse_ord_num == "")
		{
		  $('#purchse_ord_num').css("border","1px solid #FF0000");
		  $('.error').html("");
		 // document.getElementById("purchse_ord_numError").innerHTML="* This field is required";
		  document.getElementById('purchse_ord_numError').style.display = 'block';
		  $('#purchse_ord_num').value="";
		  $('#purchse_ord_num').focus();
		  return false;
		}
		else
		{
		  document.getElementById('purchse_ord_numError').style.display = 'none';
		  $('#purchse_ord_num').css("border","1px solid #82B04F");
		  document.getElementById("purchse_ord_numError").innerHTML="";
		}
		
		if(vdrquo_vendor_name == "")
		{
		  $('#vdrquo_vendor_name').css("border","1px solid #FF0000");
		  $('.error').html("");
		 // document.getElementById("vdrquo_vendor_nameError").innerHTML="* This field is required";
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
		
	  if(total_gross_amount == "" || total_gross_amount == 0.00 || total_gross_amount == NaN)
	   
	{
		 
      $('.tot_error').css("display","block");
	  $('.tot_error').focus();
            return false;
    }
        else
    {
     $('.tot_error').css("display","none");
    }
	
	
	if(grand_total == "" || grand_total == 0.00 || grand_total == NaN)
    {
		 
      $('.tot_net_error').css("display","block");
	  $('.tot_net_error').focus();
            return false;
    }
        else
    {
     $('.tot_net_error').css("display","none");
    }

        $('#purchse_ord_credit_limit').keyup(function(){
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

$(function(){
	  
	  $('.recshow').click('change',function()
	  {
	      if ( $(this).is(':checked'))
		  {
	         $('.showrec').show();
	     } else {
	         $('.showrec').hide();
	     }
	 });
	 
	 $('.igstshow').on('change',function()
	  {
	      if ($(this).is(':checked'))
		  {
			   
			 this.value = this.checked ? 1 : 0;
	         $('th.igst_value').show();
			 $('th.cgst_sgst_value').hide();
	      }else {
			 this.value = this.checked ? 1 : 0;
	         $('th.cgst_sgst_value').show();
			 $('th.igst_value').hide();
	      }
	 });
	 
});
	 
function codevalidation()
{
	var code = $("#purchse_ord_num").val();
	var prefix = $("#po_prefix").val();
	var codelength = code.length;
	var prefixlength = prefix.length;
	var res = code.substr(0,prefixlength); 
	if(codelength >= prefixlength)
	{
		if(res != prefix)
		{
			alert('Purchase Order Code Should be Prefix With '+prefix);
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
	 
	 	$.ajax({
		
 		type: 'POST', 
 		url: '<?php echo site_url('purchaseorder/getpurchaseorder_code'); ?>',
 		data: {material_store_division_id: material_store_division_id},
		
 		success: function(resp) {
			//alert(resp);
			$('#purchse_ord_num').val(resp);
		}
 		
		
	 });
	 
 	
}

</script>
	
	
<script>
    /*  jQuery ready function. Specify a function to execute when the DOM is fully loaded.  */
$(document).ready(
  
  /* This is the function that will get executed after the DOM is fully loaded */
  function () {
    $( "#purchse_ord_req_date" ).datepicker({
		dateFormat: 'dd-mm-yy',
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    });  
	
	$( "#purchse_delivery_date" ).datepicker({
		dateFormat: 'dd-mm-yy',
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    }); 
	
	$( "#purchse_ord_valid" ).datepicker({
		dateFormat: 'dd-mm-yy',
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    }); 
	$( "#purchse_ord_transac_date" ).datepicker({
		dateFormat: 'dd-mm-yy',
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    }); 
	$( "#vdrquo_req_date" ).datepicker({
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    });
	$( "#vdrquo_valid" ).datepicker({
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    });
	$( "#purchse_ord_rec_frmdate" ).datepicker({
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    });
	$( "#purchse_ord_rec_todate" ).datepicker({
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    });
	$( "#purchse_ord_rec_end_date" ).datepicker({
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    });
	
	$('.amount_calc, .numeric, .quantity, #purchse_ord_credit_limit').keyup(function(){
		var val = $(this).val();
		if(isNaN(val)){
			 val = val.replace(/[^0-9\.]/g,'');
             if(val.split('.').length>5) 
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

	
  });

</script>

<?php echo $this->load->view('pages/purchase_left_side'); ?>

<section>
	<div class="rightPanel" style="padding: 14px 20px; width:96%;">
		<div class='container-fluid editViewContainer'>
			<form class="form-horizontal recordEditView" id="EditView" name="EditView" method="post" action="<?php echo site_url('purchaseorder/addpurchaseorder_details'); ?>" enctype="multipart/form-data">
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">Creating Purchase Order</h3>
					<span class="pull-right">
						<button class="btn-success po_add_details" name="po_add_details" id="po_add_details" type="submit"><strong>Save</strong></button>
						<button type="reset" value="Reset" class="btn btn-primary">Reset</button>
						<a class="btn-danger materialreq_add_details" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </span>
                </div>
				<br>
				 <div class="row-fluid">
                    <div class="pull-right">
                       
                        <a class="btn btn-success" name="convert_to_vendor_qutation" id="convert_to_vendor_qutation" href="javascript:void(0);"><strong>Convert from Supplier Quotation</strong></a>
                        
                    </div>
                    <div class="clearfix"></div>
                </div>
                <br />
                <br />
                <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">PO Details</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
						
							<td class="fieldLabel medium">
									<label class="muted pull-right marginRight10px"><span class="redColor">*</span>Purchase Order No</label>
								</td>
                                <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="purchse_ord_numError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
										 <input id="purchse_ord_num" type="text" class="input-large uppercase" name="purchse_ord_num" value="<?php //if(isset($pocode)) { echo $pocode; } ?>" readonly="readonly"/>
                                        <input id="po_prefix" type="hidden" name="po_prefix" value="<?php if(isset($poprefix)) { echo $poprefix; } ?>"/>
										 
                                       
                                    </span>
                                </div>
                            </td>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Supplier Name</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="vdrquo_vendor_nameError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                         <div class="row-fluid input-prepend input-append">
                            				<input type="text" class="input-large with_plus" id="vdrquo_vendor_name" name="vdrquo_vendor_name" readonly placeholder="Type to search">
                                            <span id="plus_vendor" class="add-on cursorPointer createReferenceRecord plus">
                                                <a href="javascript:void(0);"><i class="icon-plus" title="Create"></i></a>
                                            </span>
                                            <input type="hidden" id="vdrquo_vendor_id" name="vdrquo_vendor_id" value="">
                                            <input type="hidden" id="vdrquo_vendor_code" name="vdrquo_vendor_code" value="">
                                        </div>
                                        
                                    </span>
                                </div>
                            </td>
                        </tr>
						<tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Requested Date</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="vdrquo_vendor_nameError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="purchse_ord_req_date" name="purchse_ord_req_date" type="text" class="input-large nameField" />
                                    </span>
                                </div>
                            </td>
							
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Valid till</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="purchse_ord_validError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="purchse_ord_valid" name="purchse_ord_valid" type="text" class="input-large nameField" />
                                    </span>
                                </div>
                            </td>
                        </tr>
							<tr>
                                <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Supplier Quotation No</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="vdrquo_mr_reqnumError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                       <input id="purchse_ord_ven_quonum" name="purchse_ord_ven_quonum"  type="text" class="input-large nameField" />
										 <input type="hidden" id="purchse_vdrquo_quote_id" name="purchse_vdrquo_quote_id" value="">
                                    </span>
                                </div>
                            </td>
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
										 <option value="">Select Division</option>
                                        <?php if(isset($store_division) && !empty($store_division)) { foreach($store_division as $STD) { ?>
                                            <option value="<?php echo $STD['division_id']; ?>"><?php echo $STD['division_name']; ?></option><?php } } ?>
                                        </select>
                            </td>
                            </tr>	
                            
                            <tr>
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
                                        <select name="material_store_id" class="chzn-select" id="material_store_id">
                                        <option value='0'>Select Store</option>
                                        </select>
                                    </span>
                                </div>
                            </td>
                          <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Deliverable Date</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="vdrquo_delivery_nameError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="purchse_delivery_date" name="purchse_delivery_date" type="text" class="input-large nameField" />
                                    </span>
                                </div>
                            </td>
                            </tr>
                            <tr>
                               <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Transport Name</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="purchase_invo_carrierError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
										<select name="purchase_carrier" class="chzn-select" id="purchase_carrier">
                                            
                                              <?php foreach($carrier as $CARR) { ?>
                                    			<option value="<?php echo $CARR['shipping_carrier_id']; ?>"  ><?php echo $CARR['shipping_carrier_name']; ?></option>
                                			<?php } ?> 
                                        </select>
                                    </span>
                                </div>
                            </td>
                              <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Price Book</label></td>
                               <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="price_book_Error">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
										<select name="price_book_id" class="chzn-select" id="price_book_id">
                                            <option value=""  >Select Pricebook</option>
                                              <?php foreach($price_book as $PB) { ?>
                                    			<option value="<?php echo $PB['price_book_id']; ?>"  ><?php echo $PB['price_book_name']; ?></option>
                                			<?php } ?> 
                                        </select>
                                    </span>
                                </div>
                            </td>
                            </tr>
                        
                    </tbody>
                </table>
                <br />
               
				<table class="table table-bordered blockContainer showInlineTable equalSplit">

                    <span class="nums_error" id="add_itemError">
                        Please Enter Number Only
                   </span>
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
                                <label class="muted pull-right marginRight10px">Credit Limit(in days)</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
										<input id="purchse_ord_credit_limit" value="" name="purchse_ord_credit_limit" type="text" class="input-large nameField" />
                                    </span>
                                </div>
                            </td>
                        </tr>
						 <tr>
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
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Status</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
										<input id="purchse_ord_status" value="Draft" name="purchse_ord_status" type="text" class="input-large nameField" readonly />
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                   Terms & Conditions
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
                                  Payment Terms
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
                            
                            <tr>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                  Recurring
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <input id="purchse_ord_recurring" class="recshow" value="active" type="checkbox" name="purchse_ord_recurring">
                                    </span>
                                 </div>
                             </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                  IGST
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <input id="purchse_ord_igst" value="0" class="igstshow" type="checkbox" name="purchse_ord_igst">
                                    </span>
                                 </div>
                             </td>
							
                        </tr>
						<tr class="showrec">
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                   Recurring Type
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <input id="purchse_ord_rec_type" name="purchse_ord_rec_type" type="text" class="input-large nameField" />
                                    </span>
                                 </div>
                             </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Notification Email</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
										<input id="purchse_ord_rec_email" value="" name="purchse_ord_rec_email" type="text" class="input-large nameField" />
                                    </span>
                                </div>
                            </td>
                        </tr>
						 <tr class="showrec">
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    From Date
                                </label>
                            </td>
                            <td class="fieldValue medium ">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <input id="purchse_ord_rec_frmdate" name="purchse_ord_rec_frmdate" value="" type="text" class="input-large nameField" />
                                    </span>
                                 </div>
                             </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    To Date
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <input id="purchse_ord_rec_todate" name="purchse_ord_rec_todate" type="text" class="input-large nameField" />
                                    </span>
                                 </div>
                             </td>
                        </tr>
						<tr class="showrec">
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                   Repeat on Day of Month
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <input id="purchse_ord_rec_date_rep" name="purchse_ord_rec_date_rep" value="" type="text" class="input-large nameField" />
                                    </span>
                                 </div>
                             </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    End Date
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <input id="purchse_ord_rec_end_date" name="purchse_ord_rec_end_date" type="text" class="input-large nameField" />
                                    </span>
                                 </div>
                             </td>
                        </tr>

                    </tbody>
                    
                </table>
						
                <br>
                
                <div class="row-fluid">
                     <div class="pull-right">
                     <!--   <a class="btn btn-success" id="purchase_singleitem" href="javascript:void(0);"><strong>Add Single Item</strong></a>-->
                        <a class="btn btn-success" id="purchase_multipleitems"><strong>Add Items</strong></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
				 <input type ="hidden" value="0" name="last_table_id " id="last_table_id">
                <br /> 
                <span class="grid_error" id="last_table_idError" >
                  Please Add Some Items
                 </span>
				 <br />
				  <div style="overflow:scroll;width:100%">
				<table id="tblList">
				<thead>
				<tr>	
				<?php /* <th>Item Code</th> */ ?>
                <th>SKU</th>
        		<th width="10%"><center>Item</center></th>
        		
				<th>Qty</th>
                <th>Price</th>
                <th>Gross amt</th>
				
                
                <th class="cgst_sgst_value">CGST(%)</th>
				<th class="cgst_sgst_value">SGST(%)</th>
                
                 
                <th class="igst_value" style="display:none">IGST(%)</th>
				<th class="igst_value" style="display:none">IGST amt</th>
                
				<th>Net amt</th>
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
                        <td><input type="hidden" id="total_quantity_items" name="total_quantity_items" class="quantity" value="0.00" readonly="readonly" /></td>
                        <td><input type="hidden" id="total_gross_amount_items" name="total_gross_amount_items" class="quantity" value="0.00" readonly="readonly" /></td>
                        <td><input type="hidden" id="total_discount_percent_items" name="total_discount_percent_items" class="quantity" value="0.00" readonly="readonly" /></td>
                        <td><input type="hidden" id="total_discount_amount_items" name="total_discount_amount_items" class="quantity" value="0.00" readonly="readonly" /></td>
                        <td><input type="hidden" id="total_tax_percent_items" name="total_tax_percent_items" class="quantity" value="0.00" readonly="readonly" /></td>
                        <td><input type="hidden" id="total_tax_amount_items" name="total_tax_amount_items" class="quantity"  value="0.00" readonly="readonly" /></td>
                        <td><input type="hidden" id="total_net_amount_items" name="total_net_amount_items" class="quantity" value="0.00" readonly="readonly" /></td>
                        <td>&nbsp </td>
                    </tr>
				</table>
                 </div>
                <br>
                 <input type="hidden" value="" name="tax_group_length" id="tax_group_length"  />
                 <div id="tax_group_calculation">
                
                 </div>
                <br>
            
                
			<table class="table table-bordered blockContainer showInlineTable equalSplit">
				
				
				<tbody>
				<tr>
				<td class="fieldLabel medium">
					<span class="tot_error" id="add_itemError">
                 Invalid Total Gross Amount
                   </span>
					<label class="muted pull-right marginRight10px">
						Total Gross Amount
					</label>
				</td>
				
				<td class="fieldLabel medium" style="width:20%;">
					<input class="amount_calc" name="total_gross_amount" id="total_gross_amount" type="text" readonly="readonly">
				</td>
				
			</tr>
            <!--<tr>
				<td class="fieldLabel medium">
                	<input type="checkbox" class="taxbox">
					<label class="muted pull-right marginRight10px">
						Total Tax (%)
					</label>
				</td>
				<td class="fieldLabel medium" style="width:20%;">-->
					<input class="amount_calc" name="total_tax_percentage"  id="total_tax_percentage" value="0.00" type="hidden">
                 
				<!--</td>
			</tr>-->
           
            <!--<tr>
				<td class="fieldLabel medium">
					<label class="muted pull-right marginRight10px">
						Total Discount (%)
					</label>
				</td>
				<td class="fieldLabel medium" style="width:20%;">
					<input class="amount_calc" name="total_disocunts_percentage"  id="total_disocunts_percentage" onkeyup="calculateGrandTotal(event);" type="text" readonly="readonly">
				</td>
			</tr>-->
            <input class="amount_calc" name="total_disocunts_percentage"  id="total_disocunts_percentage" onkeyup="calculateGrandTotal(event);" type="hidden" readonly="readonly">
            <tr>
				<td class="fieldLabel medium">
					<label class="muted pull-right marginRight10px">
						Total Discount Amount
					</label>
				</td>
				<td class="fieldLabel medium" style="width:20%;">
					<input class="amount_calc" name="total_disocunts_amount"  id="total_disocunts_amount" type="text"   readonly="readonly">
				</td>
			</tr>
             <tr>
				<td class="fieldLabel medium">
					<label class="muted pull-right marginRight10px">
						Total Tax Amount
					</label>
				</td>
				<td class="fieldLabel medium" style="width:20%;">
					<input class="amount_calc" name="total_tax_amount"  id="total_tax_amount" type="text"  value=""  readonly="readonly">
				</td>
			</tr>
			<tr>
				<td class="fieldLabel medium">
					<label class="muted pull-right marginRight10px">
						Shipping & Handling Charges
					</label>
				</td>
				
				<td class="fieldLabel medium" style="width:20%;">
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
					<input class="amount_calc" name="total_shipping_tax" id="total_shipping_tax" type="text" value="0.00" readonly="readonly" />
				</td>
			</tr>
			<!--<tr>
				<td class="fieldLabel medium">
					<label class="muted pull-right marginRight10px">
						Adjustment
					</label>
				</td>
				
				<td class="fieldLabel medium" style="width:20%;">-->
					<input class="amount_calc" name="total_adjustments" id="total_adjustments" type="hidden" value="0.00">
				<!--</td>
			</tr>-->
			<tr>
				<td class="fieldLabel medium">
					 <span class="tot_net_error" id="add_itemError">
                 Invalid Grand Total
                   </span>	
					<label class="muted pull-right marginRight10px">
						Grand Total
					</label>
				</td>
				
				<td class="fieldLabel medium" style="width:20%;">
					<input class="amount_calc" name="grand_total" readonly="readonly" id="grand_total" type="text" onkeyup="calculateGrandTotal(event);">
				</td>
			</tr>
			</tbody>
				</table>
                <br />				
                <div class="row-fluid">
                    <div class="pull-right">
                        <button class="btn-success po_add_details" type="submit"  name="po_add_details" id="po_add_details"><strong>Save</strong></button>
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
      <div id="vendors_to_pop_up" class="pop-up-display-content multipleitemscontent">
       
	 </div>
     <!--popup end -->

     <!--popup start -->
      <div id="material_request_popup" class="pop-up-display-content multipleitemscontent">
   	 </div>
     <!--popup end -->
     
      <!--popup start -->
      <div id="venodor_qutation_popup" class="pop-up-display-content multipleitemscontent">
   	 </div>
     <!--popup end -->

     <!--popup start -->
      <div id="sales_order_popup" class="pop-up-display-content multipleitemscontent">
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
		
		$('#purchase_singleitem').bind('click', function(e) {

			var vendor_id = $("#vdrquo_vendor_id").val();
			if(vendor_id != "")
			{
				$.ajax({
					type: 'POST',
					 url: '<?php echo site_url('purchasepopup/purchase_single_item'); ?>',
					data: {vendor:vendor_id},
					success: function(resp) 
					{
						$("#singleitem_to_pop_up").html(resp);
					//	alert(resp);return false;
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
				   $('#vdrquo_vendor_nameError').css("display", "block");
				});
				return false;
			}
			 

		});
		
		$('#purchase_multipleitems').bind('click', function(e) {

			var vendor_id = $("#vdrquo_vendor_id").val();
			var division_id = $("#material_store_division_id").val();
			var store_id = $("#material_store_id").val();
			var purchse_ord_igst = $("#purchse_ord_igst").val();
			var pricebook_id = $("#price_book_id").val();
			//alert(pricebook_id);
			if(vendor_id != "" && division_id != "" && store_id != "" && pricebook_id != "" )
			{
				$.ajax({
					type: 'POST',
					url: '<?php echo site_url('purchasepopup/purchase_getmultipleitemdetails'); ?>',
					data: {vendor:vendor_id,division_id:division_id,store_id:store_id,purchse_ord_igst:purchse_ord_igst,pricebook_id:pricebook_id},
					success: function(resp) 
					{
						$("#multipleitems_to_pop_up").html(resp);
					//	alert(resp);return false;
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
				//alert('123');
				if(vendor_id == "")
				{
				var body = $("html, body");
				body.animate({scrollTop:0}, '500', 'swing', function() { 
				   $('#vdrquo_vendor_nameError').css("display", "block");
				});
				return false;
				}
				
				else if(division_id == "")
				{
					var body = $("html, body");
				body.animate({scrollTop:0}, '500', 'swing', function() { 
				   $('#division_nameError').css("display", "block");
				});
				return false;
				}
				
				else if(store_id == "")
				{
					var body = $("html, body");
				body.animate({scrollTop:0}, '500', 'swing', function() { 
				   $('#store_nameError').css("display", "block");
				});
				return false;
				}
				else if(pricebook_id == "")
				{
					//alert('dvd');
					var body = $("html, body");
				body.animate({scrollTop:0}, '500', 'swing', function() { 
				   $('#price_book_Error').css("display", "block");
				});
				return false;
				}
			}
			 

		});
		

	});
})(jQuery);
</script>

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
					url: '<?php echo site_url('purchasepopup/getvendorpopup'); ?>',
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

    $('#convert_to_material_request').bind('click', function(e) {
		
		$.ajax({
				type: 'POST',
				url: '<?php echo site_url('purchasepopup/getmaterialrequest'); ?>',
				data: {},
				success: function(resp) 
				{
					$("#material_request_popup").html(resp);
					
					e.preventDefault();
					$('#material_request_popup').bPopup({
						position: [400, 50], //x, y
						closeClass:'close',
						follow: [true, true],
						modalClose: true
					});			 
				}
			});
    });
	
	
	$('#convert_to_vendor_qutation').bind('click', function(e) {
		
		$.ajax({
				type: 'POST',
				url: '<?php echo site_url('purchasepopup/getvendorqutationpopup'); ?>',
				data: {},
				success: function(resp) 
				{
					$("#venodor_qutation_popup").html(resp);
					
					e.preventDefault();
					  $('#venodor_qutation_popup').bPopup({
						position: [400, 50], //x, y
						closeClass:'close',
						follow: [true, true],
						modalClose: true
					  });		 
				}
			});
       

    });

    $('#convert_to_sales_order').bind('click', function(e) {
		
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('purchaseorder/getsalesorderpopup'); ?>',
			data: {},
			success: function(resp) 
			{
				$("#sales_order_popup").html(resp);
				
				e.preventDefault();
				  $('#sales_order_popup').bPopup({
					position: [400, 50], //x, y
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
