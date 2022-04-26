<script type="text/javascript">
$(document).ready(function()
{
  document.getElementById("EditView").reset();
  var count_of_items = $("#count_of_items").val();
  var item_igst_name = $("#item_igst_name_").val();
  
  //alert(item_igst_name);
         if(item_igst_name == 1)
		 { 
       		$('th.igst_value').show();
	         $('td.igst_value').show();
			 $('tr.tax_group_igst_amount').show();
			 $('th.cgst_sgst_value').hide();
			 $('td.cgst_sgst_value').hide();
			 $('tr.tax_group_sgst_amount').hide();
			 //$('tr.tax_group_amount').hide();
	     }
		 else 
		 {
			 
			 $('.check_igstname').hide();
			 $('.check_igstvalue').hide();
	         //$('th.cgst_sgst_value').show();
	         //$('td.cgst_sgst_value').show();
			 $('th.igst_value').hide();
			 $('td.igst_value').hide();
			 $('tr.tax_group_igst_amount').hide();
			}   
				
		$("#last_table_id").val(count_of_items);
  
    $('.po_update_details').click(function()
     {
		var count_of_items = $("#count_of_items").val();
		//$("#last_table_id").val(count_of_items);
   		var purchse_ord_num = $("#purchse_ord_num").val();
		var vdrquo_vendor_name = $("#vdrquo_vendor_name").val();
		
		var division_id = $("#material_store_division_id").val();
	    var store_id = $("#material_store_id").val();
		
		var last_table_id = $("#last_table_id").val();
		var purchse_ord_recurring = document.getElementById("purchse_ord_recurring").checked;
		var total_gross_amount  = $("#total_gross_amount ").val();
		var grand_total  = $("#grand_total ").val();	
			 if( purchse_ord_recurring == true)
			{ 
				$('.showrec').show();
			} 
				else 
			{

				$('.showrec').hide();
			}

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
	
	
	if(division_id == "")
    {
      $('#material_store_division_id').css("border","1px solid #FF0000");
      $('.error').html("");
     // document.getElementById("vdrquo_vendor_nameError").innerHTML="* This field is required";
      document.getElementById('division_nameError').style.display = 'block';
      $('#material_store_division_id').value="";
      $('#material_store_division_id').focus();
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
      $('#material_store_id').css("border","1px solid #FF0000");
      $('.error').html("");
     // document.getElementById("vdrquo_vendor_nameError").innerHTML="* This field is required";
      document.getElementById('store_nameError').style.display = 'block';
      $('#material_store_id').value="";
      $('#material_store_id').focus();
      return false;
    }
      else
    {
      document.getElementById('store_nameError').style.display = 'none';
      $('#material_store_id').css("border","1px solid #82B04F");
      document.getElementById("store_nameError").innerHTML="";
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

$(function() {
	  
	  $('.recshow').click('change', function(){
		 
	      if ( $(this).is(':checked') ) {
			
	         $('.showrec').show();
	     } else {
	         $('.showrec').hide();
	     }
	 });
	 });
</script>


<script>

$(function(){
	  
	 	 
	 $('.igstshow').on('change',function()
	  {
	      if ($(this).is(':checked'))
		  {
			  
			 this.value = this.checked ? 1 : 0;
			  //alert(this.value);
	         $('th.igst_value').show();
	         $('td.igst_value').show();
			 $('th.cgst_sgst_value').hide();
			 $('td.cgst_sgst_value').hide();
	     } else {
			 this.value = this.checked ? 0 : 1;
			 
	         //$('th.cgst_sgst_value').show();
	         //$('td.cgst_sgst_value').show();
			 //$('th.igst_value').hide();
			 //$('td.igst_value').hide();
	     }
	 });
	 
});
	 

	
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
		dateFormat: 'dd-mm-yy',
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    });
	$( "#vdrquo_valid" ).datepicker({
		dateFormat: 'dd-mm-yy',
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
			<form class="form-horizontal recordEditView" id="EditView" name="EditView" autocomplete="off" method="post" action="<?php echo site_url('purchaseorder/editpurchaseorder_details').'/'.$this->uri->segment('3'); ?>" enctype="multipart/form-data">
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">Edit Purchase Order</h3>
					<span class="pull-right">
						<button class="btn-success po_update_details" name="po_update_details" id="po_update_details" type="submit"><strong>Update</strong></button>
						 <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </span>
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
                                        <input id="purchse_ord_num" name="purchse_ord_num" type="text" class="input-large nameField"  value="<?php if(isset($editpurchaseorder->po_po_no)){ echo $editpurchaseorder->po_po_no;}?>" readonly="readonly" />
                                    </span>
                                </div>
                            </td>
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
                            				<input type="text" class="input-large nameField" id="vdrquo_vendor_name" name="vdrquo_vendor_name" value="<?php if(isset($editpurchaseorder->vendor_name)){ echo $editpurchaseorder->vendor_name;}?>" readonly placeholder="Type to search">
                                            <span id="plus_vendor" class="add-on cursorPointer createReferenceRecord plus">
                                                <a href="javascript:void(0);"><i class="icon-plus" title="Create"></i></a>
                                            </span>
                                            <input type="hidden" id="vdrquo_vendor_id" name="vdrquo_vendor_id" value="<?php if(isset($editpurchaseorder->po_vendor_id)){ echo $editpurchaseorder->po_vendor_id;}?>">
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
                                        <input id="purchse_ord_req_date" name="purchse_ord_req_date" type="text" class="input-large nameField" value="<?php    if(isset($editpurchaseorder->po_req_date)){ 
										$originalDate=$editpurchaseorder->po_req_date;
										if($originalDate == '0000-00-00'){ }
										else
										{
											$newDate=date("d-m-Y", strtotime($originalDate));
											echo $newDate;
										}
										}?>" />
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
                                        <input id="purchse_ord_valid" name="purchse_ord_valid" type="text" class="input-large nameField" value="<?php 
										if(isset($editpurchaseorder->po_valid_til)){ $originalDate=$editpurchaseorder->po_valid_til;
										if($originalDate == '0000-00-00'){}
										else
										{
											$newDate=date("d-m-Y", strtotime($originalDate));
											echo $newDate;
										}
										}?>" />
                                    </span>
                                </div>
                            </td>
                        </tr>
						
              <tr>
            
			<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Vendor Quotation No</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="vdrquo_mr_reqnumError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="purchse_ord_ven_quonum" name="purchse_ord_ven_quonum" type="text" class="input-large nameField"  value="<?php if(isset($editpurchaseorder->po_ventor_qoute_no)){ echo $editpurchaseorder->po_ventor_qoute_no;}?>" />
                                    </span>
                                </div>
                            </td>
							
                           <td class="fieldLabel medium">
                            <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Store Division
                                </label>
                            </td>
                            <td>
                            <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="division_nameError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                         
                                        <select name="material_store_division_id" class="chzn-select" id="material_store_division_id" >
										 <option value="">Select Division</option>
                                        <?php if(isset($store_division) && !empty($store_division)) { foreach($store_division as $STD) { ?>
                                        <option value="<?php echo $STD['division_id']; ?>" <?php if($STD['division_id'] == $editpurchaseorder->po_store_division_id) { ?> selected="selected"  <?php } ?>  ><?php echo $STD['division_name']; ?></option><?php } } ?>
                                        </select>
										<?php //echo "<pre>"; print_r($store_division);  ?>
                            </td>
              </tr>
              
              <tr>
                            <td class="fieldLabel medium">
                            <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Store
                                </label>
                            </td>
                            <td>
                            <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="store_nameError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                         
                                        <select name="material_store_id" class="chzn-select" id="material_store_id" >
										 <option value="">Select Store</option>
                                        <?php if(isset($store) && !empty($store)) { foreach($store as $STR) { ?>
                                        <option value="<?php echo $STR['store_id']; ?>" <?php if($STR['store_id'] == $editpurchaseorder->po_store_id) { ?> selected="selected"  <?php } ?>  ><?php echo $STR['store_name']; ?></option><?php } } ?>
                                        </select>
                            </td>
                            
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Deliverable Date</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="vdrquo_vendor_nameError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="purchse_delivery_date" name="purchse_delivery_date" type="text" class="input-large nameField" value="<?php    if(isset($editpurchaseorder->po_delivery_date)){ 
										$originalDate=$editpurchaseorder->po_delivery_date;
										if($originalDate == '0000-00-00'){ }
										else
										{
											$newDate=date("d-m-Y", strtotime($originalDate));
											echo $newDate;
										}
										}?>" />
                                    </span>
                                </div>
                            </td>
              </tr>
              <tr>
                <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor"></span>Transport Name	
</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        
                                       
                                    <?php ?><select class="chzn-select"  name="purchase_carrier" id="purchase_carrier">
                                    <option value="">Select an Option</option>
									<?php foreach($carrier as $CAR) {    ?>
                                        <option value="<?php echo $CAR['shipping_carrier_id']; ?>" <?php if($editpurchaseorder->po_purchase_carrier == $CAR['shipping_carrier_id']) { ?> selected="selected" <?php } ?> ><?php echo $CAR['shipping_carrier_name']; ?></option>
                                    <?php } ?></select><?php ?>
                                    </span>
                                </div>
								<?php //echo"<pre>"; print_r($carrier);  ?>
                            </td>
                <td class="fieldLabel medium">&nbsp;</td>
                <td class="fieldValue medium" >&nbsp;</td>
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
                                            <option <?php if($PM['payment_mode_id'] == $editpurchaseorder->po_payment_mode) { ?> selected="selected" <?php } ?> value="<?php echo $PM['payment_mode_id']; ?>"><?php echo $PM['payment_mode_name']; ?></option>
                                           	<?php } } ?>
                                            
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
										<input id="purchse_ord_credit_limit" value="<?php if(isset($editpurchaseorder->po_credit_limit))
										{ echo $editpurchaseorder->po_credit_limit;}?>" name="purchse_ord_credit_limit" type="text" class="input-large nameField"  />
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
                                        <input id="purchse_ord_transac_date" name="purchse_ord_transac_date" value="<?php if(isset($editpurchaseorder->po_trans_date)){ $originalDate=$editpurchaseorder->po_trans_date;
										$newDate=date("d-m-Y", strtotime($originalDate));
										echo $newDate;}?>" type="text" class="input-large nameField" />
                                    </span>
                                 </div>
                             </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Status</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
										<select name="purchse_ord_status" class="chzn-select" id="purchse_ord_status">
                                              <option <?php if(isset($editpurchaseorder->po_po_status)) { if($editpurchaseorder->po_po_status == 'draft') { ?> selected="selected" <?php } } ?> value="draft">Draft</option>
											  <option value="approved" <?php if(isset($editpurchaseorder->po_po_status)){if($editpurchaseorder-> po_po_status == 'approved') { ?>selected="selected" <?php } } ?>>Approved</option> 
											  <option value="cancelled" <?php if(isset($editpurchaseorder->po_po_status)){if($editpurchaseorder->po_po_status == 'cancelled') { ?>selected="selected" <?php } } ?>>Cancelled</option>
                                        </select>
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
                                        <textarea class="row-fluid" id="purchse_ord_terms_conditions" name="purchse_ord_terms_conditions"><?php if(isset($editpurchaseorder->po_terms)){ echo $editpurchaseorder->po_terms;}?></textarea>
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
                                        <textarea class="row-fluid" id="purchse_ord_payment_terms" name="purchse_ord_payment_terms" ><?php if(isset($editpurchaseorder->po_payment_terms)){ echo $editpurchaseorder->po_payment_terms;}?></textarea>
                                    </span>
                                 </div>
                             </td>
                            </tr> 
							
                    </tbody>
                    
                </table>
						
                <br>
                
                <div class="row-fluid">
                    <div class="pull-right">
                       <!-- <a class="btn btn-success" id="purchase_singleitem" href="javascript:void(0);"><strong>Add Single Item</strong></a>-->
                        <a class="btn btn-success" id="purchase_multipleitems"><strong>Add Items</strong></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
				 <input type ="hidden" value="0" name="last_table_id " id="last_table_id">
				 <input type ="hidden" value="<?php echo count($editpurchaseorder_items); ?>" name="count_of_items " id="count_of_items">
                <br /> 
                <span class="grid_error" id="last_table_idError" >
                  Please Add Some Items
                 </span>
				 <br />
				 <div style="overflow:scroll;width:100%">
				<table id="tblList">
				<thead>
				<tr>	
				<th>SKU</th>
        		<th width="10%"><center>Item</center></th>
        		
				<th>Qty</th>
                <th>Price</th>
                <th>Gross amt</th>
				
				
				
                 <?php //$po_igst = $editpurchaseorder->po_igst;
				 //if($po_igst == 0){ ?>
                <th class="cgst_sgst_value">CGST(%)</th>
				
				<th class="cgst_sgst_value">SGST(%)</th>
				
                <?php //} else if($po_igst == 1) { ?>
                <th class="igst_value">IGST(%)</th>
				
                <?php //} ?>
				<th>Net amt</th>
                <th>Actions</th>
				</tr>
				</thead>
				<tbody id="disp_items">
				<?php //echo "<PRE>";print_r($editpurchaseorder_items);
				 	if(!empty($editpurchaseorder_items)) { $itemcount = 1; foreach($editpurchaseorder_items as $ITEMS) { ?>
                       <tr>
                        <td>
                        <input id="item_code_<?php echo $itemcount; ?>" name="item_code[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_code'])) { echo $ITEMS['product_code']; } ?>" type="hidden" />
                        <input id="item_id_<?php echo $itemcount; ?>" name="item_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_item_id'])) { echo $ITEMS['po_items_item_id']; } ?>" type="hidden" />
                        <a href="javascript:void(0);" ><?php if(isset($ITEMS['product_sku'])) { echo $ITEMS['product_sku']; } ?></a>
                        <input id="item_mfg_prtno_<?php echo $itemcount; ?>" name="item_mfg_prtno[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_sku'])) { echo $ITEMS['product_sku']; } ?>" type="hidden" />
						</td>
                        <td>
					    <a href="javascript:void(0);" id="item_name_value_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['product_name'])) { echo $ITEMS['product_name']; } ?></a>
                        <input id="item_name_<?php echo $itemcount; ?>" name="item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_name'])) { echo $ITEMS['product_name']; } ?>" type="hidden" />
                        <input id="item_name_hsn_sac_<?php echo $itemcount; ?>" name="item_name_hsn_sac[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_hsn_sac'])) { echo $ITEMS['po_items_hsn_sac']; } ?>" type="hidden" />
						
                        <input id="multiple_item_store_id_<?php echo $itemcount; ?>" name="multiple_item_store_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_store_id'])) { echo $ITEMS['po_items_store_id']; } ?>" type="hidden" />
                        <input id="multiple_item_store_name_<?php echo $itemcount; ?>" name="multiple_item_store_name[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['store_name'])) { echo $ITEMS['store_name']; } ?>" type="hidden" />
						 <input id="multiple_item_division_id_<?php echo $itemcount; ?>" name="multiple_item_division_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_store_division_id'])) { echo $ITEMS['po_items_store_division_id']; } ?>" type="hidden" />
                        <input id="multiple_item_division_name_<?php echo $itemcount; ?>" name="multiple_item_division_name[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['division_name'])) { echo $ITEMS['division_name']; } ?>" type="hidden" />
						
                        <input id="item_uom_id_<?php echo $itemcount; ?>" name="item_uom_id[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['uom_id'])) { echo $ITEMS['uom_id']; } ?>" />
                        <input id="item_uom_name_<?php echo $itemcount; ?>" name="item_uom_name[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['uom_name'])) { echo $ITEMS['uom_name'];  } ?> " />
						</td>
                        <td>
                        <input id="item_qty_<?php echo $itemcount; ?>" onkeyup="return purchase_items_grid_total(event, <?php echo $itemcount; ?>)" class="quantity stock_text" name="item_qty[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_ord_qty'])) { echo $ITEMS['po_items_ord_qty']; } ?>" type="text" /></td>
						
                      <td>
                        <input id="item_priceperunit_<?php echo $itemcount; ?>" onkeyup="return purchase_items_grid_total(event, <?php echo $itemcount; ?>)" class="quantity"  name="item_priceperunit[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_priceperunit'])) { echo $ITEMS['po_items_priceperunit']; } ?>" type="text" /></td>
                      
                        
                       
                      <td>
                        <input id="item_gross_amount_<?php echo $itemcount; ?>" class="quantity stock_text"  name="item_gross_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_gross_amount'])) { echo $ITEMS['po_items_gross_amount']; } ?>" readonly="readonly" type="text" /></td>
						
						 <td>
					     <input id="item_sale_price_<?php echo $itemcount; ?>" name="item_sale_price[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_sale_price'])) { echo $ITEMS['po_items_sale_price']; } ?>" type="hidden" class="quantity stock_text" onkeyup="calc_gain_percent(<?php echo $itemcount; ?>)" >
						<input id="item_gain_percent_<?php echo $itemcount; ?>" name="item_gain_percent[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_gain_percent'])) { echo $ITEMS['po_items_gain_percent']; } ?>" readonly="readonly" type="hidden" class="quantity stock_text">
						<input id="item_scheme_percent_<?php echo $itemcount; ?>" name="item_scheme_percent[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_scheme_percent'])) { echo $ITEMS['po_items_scheme_percent']; } ?>" onkeyup="return purchase_items_grid_total(event, <?php echo $itemcount; ?>)" type="hidden" class="quantity stock_text">
						<input id="item_scheme_amount_<?php echo $itemcount; ?>" name="item_scheme_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_scheme_amt'])) { echo $ITEMS['po_items_scheme_amt']; } ?>" readonly="readonly" type="hidden" class="quantity stock_text">
						
                        <input id="item_discount_percent_<?php echo $itemcount; ?>" onkeyup="return purchase_items_grid_total(event, <?php echo $itemcount; ?>)" class="quantity stock_text"  name="item_discount_percent[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_discounts_percentage'])) { echo $ITEMS['po_items_discounts_percentage']; } ?>" type="hidden" />
                        <input id="item_discount_amount_<?php echo $itemcount; ?>" readonly="readonly" class="quantity stock_text"  name="item_discount_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_discounts_amount'])) { echo $ITEMS['po_items_discounts_amount']; } ?>" type="hidden" />
                         <?php //if($po_igst == 0){?>
                      
                        <input id="item_tax_percent_<?php echo $itemcount; ?>" onkeyup="return purchase_items_grid_total(event, <?php echo $itemcount; ?>)" class="quantity stock_text"  name="item_tax_percent[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_tax_percent'])) { echo $ITEMS['po_items_tax_percent']; } ?>" type="text" />
                       
                        <input id="item_tax_amount_<?php echo $itemcount; ?>" readonly="readonly" class="quantity stock_text"  name="item_tax_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_tax_amount'])) { echo $ITEMS['po_items_tax_amount']; } ?>"  type="hidden" /></td>
						
						 <td class="cgst_sgst_value">
                        <input id="item_excise_percent_<?php echo $itemcount; ?>" onkeyup="return purchase_items_grid_total(event, <?php echo $itemcount; ?>)" class="quantity stock_text"  name="item_excise_percent[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_excise_percent'])) { echo $ITEMS['po_items_excise_percent']; } ?>" type="text" />
                       
                        <input id="item_excise_amount_<?php echo $itemcount; ?>" readonly="readonly" class="quantity stock_text"  name="item_excise_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_excise_amount'])) { echo $ITEMS['po_items_excise_amount']; } ?>" type="hidden" />
						</td>
						
						<?php //} else if($po_igst == 1)	{ ?>
						
						 <td class="igst_value">
                        <input id="item_igst_tax_percent_<?php echo $itemcount; ?>" onkeyup="return purchase_items_grid_total(event, <?php echo $itemcount; ?>)" class="quantity stock_text"  name="item_igst_tax_percent[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_igst_percent'])) { echo $ITEMS['po_items_igst_percent']; } ?>" type="text" />
                        <input id="item_igst_tax_amount_<?php echo $itemcount; ?>" readonly="readonly" class="quantity stock_text"  name="item_igst_tax_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_igst_amount'])) { echo $ITEMS['po_items_igst_amount']; } ?>" type="hidden" />
						</td>
					
						<?php //} ?>
				
                      <td>
                        <input id="item_net_amount_<?php echo $itemcount; ?>"  class="quantity"  name="item_net_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_items_net_amount'])) { echo $ITEMS['po_items_net_amount']; } ?>" type="text"  readonly="readonly"/></td>
                        <td>
                           <!-- <div class="itemsgrid_action itemsgrid_edit" title="Edit"><span class="icon-pencil"></span></div>-->
                            <div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_delete_<?php echo $itemcount; ?>" onclick="return purchase_itemsgridrowdelete('<?php echo $itemcount; ?>');" data-item="<?php if(isset($ITEMS['po_items_item_id'])) { echo $ITEMS['po_items_item_id']; } ?>" data-delete="<?php echo $itemcount; ?>" title="Delete"><span class="icon-trash"></span></div>
                        </td>
                    </tr>
                    <?php $itemcount++; } } ?>
				
				</tbody>
				</table>
                </div>
                
                <br />
                 <input type="hidden" value="<?php echo count($tax_group); ?>" name="tax_group_length" id="tax_group_length"  />
                 <div id="tax_group_calculation">
                 <?php 
				 
				  //echo "<PRE>";print_r($tax_group);
				 if(!empty($tax_group)) { $taxcount = 0; foreach($tax_group as $TG) {  ?>
                 
					<table class="tax_group_table table table-bordered blockContainer showInlineTable equalSplit">
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
                                	<label>Total Discount</label>
                                </td>
                                <td>
                                	<input class="group_tax_calc" name="tax_group_discount_amount[<?php echo $taxcount; ?>]" id="tax_group_discount_amount_<?php echo $taxcount; ?>" type="text" value="<?php echo $TG['tax_group_total_disocunt_amount']; ?>" readonly="readonly">
                                </td>
                             </tr>
                             <tr>
                             	<td class="tax_group_lable">
                                	<label>Total Gross Amount Without Tax</label>
                                </td>
                                <td>
                                	<input class="group_tax_calc" name="tax_group_without_tax_gross_amount[<?php echo $taxcount; ?>]" id="tax_group_without_tax_gross_amount_<?php echo $taxcount; ?>" type="text" value="<?php echo $TG['tax_group_without_tax_gross_amount']; ?>" readonly="readonly">
                                </td>
                             </tr>
                             <tr class="tax_group_sgst_amount">
                             	<td class="tax_group_lable">
                                	<label>CGST<?php //echo $TG['tax_group_tax_percentage']; ?> Amount</label>
                                </td>
                                <td>
                                	<input class="group_tax_calc" name="tax_group_tax_amount[<?php echo $taxcount; ?>]" id="tax_group_tax_amount_<?php echo $taxcount; ?>" type="text" value="<?php echo $TG['tax_group_tax_amount']; ?>" readonly="readonly">
                                    <input name="tax_group_tax_percentage[<?php echo $taxcount; ?>]" id="tax_group_tax_percentage_<?php echo $taxcount; ?>" type="hidden" value="<?php echo $TG['tax_group_tax_percentage']; ?>" readonly="readonly">
                                </td>
                             </tr>
							 <tr class="tax_group_sgst_amount">
                             	<td class="tax_group_lable">
                                	<label>SGST<?php //echo $TG['tax_group_tax_percentage']; ?>  Amount</label>
                                </td>
                                <td>
                                	<input class="group_tax_calc" name="excise_group_excise_amount[<?php echo $taxcount; ?>]" id="excise_group_excise_amount_<?php echo $taxcount; ?>" type="text" value="<?php echo $TG['excise_group_excise_amount']; ?>" readonly="readonly">
                                    <input name="excise_group_excise_percentage[<?php echo $taxcount; ?>]" id="excise_group_excise_percentage_<?php echo $taxcount; ?>" type="hidden" value="<?php echo $TG['excise_group_excise_percentage']; ?>" readonly="readonly">
                                </td>
                             </tr>
                             
                             <tr class="tax_group_igst_amount" >
                             	<td class="tax_group_lable">
                                	<label>IGST Amount</label>
                                </td>
                                <td>
                                	<input class="group_tax_calc" name="tax_group_tax_igst_amount[<?php echo $taxcount; ?>]" id="tax_group_tax_igst_amount_<?php echo $taxcount; ?>" type="text" value="<?php echo $TG['tax_group_igst_amount']; ?>" readonly="readonly">
                                    <input name="tax_group_tax_igst_percentage[<?php echo $taxcount; ?>]" id="tax_group_tax_igst_percentage_<?php echo $taxcount; ?>" type="hidden" value="<?php echo $TG['tax_group_igst_percentage']; ?>" readonly="readonly">
                                </td>
                             </tr>
							 
                             <tr>
                                 <td class="tax_group_lable">
                                 <label>Total Gross Amount With Tax</label>
                                 </td>
                                 <td>
                                 <input class="group_tax_calc" name="tax_group_with_tax_gross_amount[<?php echo $taxcount; ?>]" id="tax_group_with_tax_gross_amount_<?php echo $taxcount; ?>" type="text" value="<?php echo $TG['tax_group_with_tax_gross_amount']; ?>" readonly="readonly">
                                 </td>
                             </tr>
                         </tbody>
                     </table><br />
                     <?php $taxcount++;} } ?>
                 </div>
                 <br />           
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
					<input class="amount_calc" name="total_gross_amount" value="<?php if(isset($editpurchaseorder_total->po_total_gross_amount)){ echo $editpurchaseorder_total->po_total_gross_amount;}?>" id="total_gross_amount" type="text"  onkeyup="calculateGrandTotal(event);" readonly="readonly">
				</td>
				
			</tr>
            <!--<tr>
				<td class="fieldLabel medium">
					<label class="muted pull-right marginRight10px">
						Total Tax (%)
					</label>
				</td>
				<td class="fieldLabel medium" style="width:20%;">-->
					<input class="amount_calc" name="total_tax_percentage"  value="<?php if(isset($editpurchaseorder_total->po_total_tax_percentage)){ echo $editpurchaseorder_total->po_total_tax_percentage;}?>" id="total_tax_percentage" type="hidden" readonly="readonly">
				<!--</td>
			</tr>-->
            
            <!--<tr>
				<td class="fieldLabel medium">
					<label class="muted pull-right marginRight10px">
						Total Discount (%)
					</label>
				</td>
				<td class="fieldLabel medium" style="width:20%;">
					<input class="amount_calc" name="total_disocunts_percentage"   id="total_disocunts_percentage" type="text" onkeyup="calculateGrandTotal(event);" 
          value="<?php if(isset($editpurchaseorder_total->po_total_discount_percentage)){ echo $editpurchaseorder_total->po_total_discount_percentage;}?>">
				</td>
			</tr>-->
            <input class="amount_calc" name="total_disocunts_percentage"   id="total_disocunts_percentage" type="hidden" onkeyup="calculateGrandTotal(event);" 
          value="<?php if(isset($editpurchaseorder_total->po_total_discount_percentage)){ echo $editpurchaseorder_total->po_total_discount_percentage;}?>" readonly="readonly">
            <tr>
				<td class="fieldLabel medium">
					<label class="muted pull-right marginRight10px">
						Total Discount Amount
					</label>
				</td>
				<td class="fieldLabel medium" style="width:20%;">
					<input class="amount_calc" name="total_disocunts_amount" value="<?php if(isset($editpurchaseorder_total->po_total_discount_amount)){ echo $editpurchaseorder_total->po_total_discount_amount;}?>"  id="total_disocunts_amount" type="text"  onkeyup="calculateGrandTotal(event);" readonly="readonly">
				</td>
			</tr>
            <tr>
				<td class="fieldLabel medium">
					<label class="muted pull-right marginRight10px">
						Total Tax Amount
					</label>
				</td>
				<td class="fieldLabel medium" style="width:20%;">
					<input class="amount_calc" name="total_tax_amount" value="<?php if(isset($editpurchaseorder_total->po_total_tax_amount)){ echo $editpurchaseorder_total->po_total_tax_amount;}?>"  id="total_tax_amount" type="text"  onkeyup="calculateGrandTotal(event);" readonly="readonly">
				</td>
			</tr>
			<tr>
				<td class="fieldLabel medium">
					<label class="muted pull-right marginRight10px">
						Shipping & Handling Charges
					</label>
				</td>
				
				<td class="fieldLabel medium" style="width:20%;">
					<input class="amount_calc" name="total_shipping_charges" value="<?php if(isset($editpurchaseorder_total->po_total_shipping_charges)){ echo $editpurchaseorder_total->po_total_shipping_charges;}?>" id="total_shipping_charges" type="text" onkeyup="calculateGrandTotal(event);">
				</td>
				
			</tr>
			<tr>
				<td class="fieldLabel medium">
					<label class="muted pull-right marginRight10px">
						Shipping Tax
					</label>
				</td>
				
				<td class="fieldLabel medium" style="width:20%;">
					<input class="amount_calc" name="total_shipping_tax" id="total_shipping_tax" value="<?php if(isset($editpurchaseorder_total->po_total_shipping_tax)){ echo $editpurchaseorder_total->po_total_shipping_tax;}?>" type="text" readonly="readonly" >
				</td>
			</tr>
			<!--<tr>
				<td class="fieldLabel medium">
					<label class="muted pull-right marginRight10px">
						Adjustment
					</label>
				</td>
				
				<td class="fieldLabel medium" style="width:20%;">-->
					<input class="amount_calc" name="total_adjustments" value="<?php if(isset($editpurchaseorder_total->po_adjustment)){ echo $editpurchaseorder_total->po_adjustment;}?>" id="total_adjustments" type="hidden"  onkeyup="calculateGrandTotal(event);">
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
					<input class="amount_calc" name="grand_total" value="<?php if(isset($editpurchaseorder_total->po_grand_total)){ echo $editpurchaseorder_total->po_grand_total;}?>" id="grand_total" type="text"  onkeyup="calculateGrandTotal(event);" readonly="readonly">
				</td>
			</tr>
			</tbody>
		</table>
           
			
                <br />				
                <div class="row-fluid">
                    <div class="pull-right">
                        <button class="btn-success po_update_details" type="submit" name="po_update_details" id="po_update_details"><strong>Update</strong></button>
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
      <div id="vendors_to_pop_up" class="pop-up-display-content multipleitemscontent">
	 </div>
     <!--popup end -->
     
</section>
<script>
function calc_gain_percent(id)
{
	var pur_price = $("#item_priceperunit_"+id).val();
	var sale_price = $("#item_sale_price_"+id).val();
	
	var discount_percent = $("#item_discount_percent_"+id).val();
	
	var pur_price_discount = ((parseFloat(pur_price)).toFixed(2) * discount_percent)/100;
	
	var cgst_percent = $("#item_tax_percent_"+id).val();
	var sgst_percent = $("#item_excise_percent_"+id).val();
	var tax_percent = (parseFloat(cgst_percent) + parseFloat(sgst_percent)).toFixed(2);
	
	var tax_value = ((parseFloat(pur_price_discount)).toFixed(2) * tax_percent)/100;
	
	var pur_price_value = (parseFloat(pur_price) - parseFloat(pur_price_discount) + parseFloat(tax_value)).toFixed(2);
	var gain_value = (parseFloat(sale_price) - parseFloat(pur_price_value)).toFixed(2);
	var gain_percent = (((parseFloat(gain_value) / parseFloat(pur_price)).toFixed(2)) * 100);
	//alert(gain_percent);
	
	$("#item_gain_percent_"+id).val(gain_percent);
}
</script>
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
								position: [10,10], //x, y
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
			
			if(vendor_id != "" && division_id != "" && store_id != "")
			{
				$.ajax({
					type: 'POST',
					url: '<?php echo site_url('purchasepopup/purchase_getmultipleitemdetails'); ?>',
					data: {vendor:vendor_id,division_id:division_id,store_id:store_id,purchse_ord_igst:purchse_ord_igst},
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
							position: [300, 50], //x, y
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
						position: [300, 50], //x, y
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
