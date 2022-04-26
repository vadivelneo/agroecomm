<script type="text/javascript">
$(document).ready(function()
{
  document.getElementById("EditView").reset();
  $('.formError').css("display","none");
  
  $('.po_add_details').click(function(e)
  { 
    var purchse_ind_indentnum = $("#purchse_ind_indentnum").val();
    var purchse_ind_quonum = $("#purchse_ind_quonum").val();
    var purchse_ind_vname = $("#vdrquo_vendor_name").val();
    var purchse_int_created = $("#purchse_int_created").val();
    var purchse_int_approver = $("#purchse_int_approver").val();
	var purchse_int_loc = $("#purchse_int_loc").val();
	
	//var ordered_qty = $("#ordered_qty_"+id).val();
 //   var received_qty = $("#received_qty_"+id).val();
	//var pending_qty = $("#pending_qty_"+id).val();

     
    if(purchse_ind_indentnum == "" )
    {
      $('#purchse_ind_indentnumError').css("display","block");
      $('#purchse_ind_indentnum').focus(); 
      return false;
    }
    else
    {
    $('#purchse_ind_indentnumError').css("display","none");
    }
 
    if(purchse_ind_quonum == "")
    {
      $('#purchse_ind_quonumError').css("display","block");
      $('#purchse_ind_quonum').focus();  
      return false;
    }
      else
    {
      $('#purchse_ind_quonumError').css("display","none");
    }

    if(purchse_ind_vname == "")
    {
      $('#purchse_ind_vnameError').css("display","block");
      $('#vdrquo_vendor_name').focus();  
      return false;
    }
      else
    {
      $('#purchse_ind_vnameError').css("display","none");
    }
	
	if(purchse_int_created == "")
    {
      $('#purchse_int_createdError').css("display","block");
      $('#purchse_int_created').focus();  
      return false;
    }
      else
    {
      $('#purchse_int_createdError').css("display","none");
    }
	if(purchse_int_approver == "")
    {
      $('#purchse_int_approverError').css("display","block");
      $('#purchse_int_approver').focus();  
      return false;
    }
      else
    {
      $('#purchse_int_approverError').css("display","none");
    }
	if(purchse_int_loc == "")
    {
      $('#purchse_int_locError').css("display","block");
      $('#purchse_int_loc').focus();  
      return false;
    }
      else
    {
      $('#purchse_int_locError').css("display","none");
    }

	var $filledTextboxes = $("input[id^=received_qty_][value]").filter(function(){
	   return $.trim($(this).val()) != "";
	});
	if($filledTextboxes.length == 0)
	{
		$("#ind_error").text("Please Enter Received Qty");
		$("input").filter(".received_qty").css("background-color","#FFCECE");
	    return false;
	}
	else
	{
		$("#ind_error").text('');
		$("input").filter(".received_qty").css("background-color","");
	}
	

	
 });
});

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
						//alert(resp);
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
    $( "#intent_date" ).datepicker({
		dateFormat: 'dd-mm-yy',
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    }); 
	
  
   $('.quantity1').keyup(function(){
    var val = $(this).val();
    if(isNaN(val)){
         val = val.replace(/[^0-9\.]/g,'');
         if(val.split('.').length>2) 
             val =val.replace(/\.+$/,"");
    }
    $(this).val(val); 
});

});
</script>





<?php echo $this->load->view('pages/purchase_left_side'); ?>

<section>
	<div class="rightPanel" style="padding: 14px 20px; width:96%;">
		<div class='container-fluid editViewContainer'>
			<form class="form-horizontal recordEditView" id="EditView" name="EditView" method="post" action="<?php echo site_url('purchaseindent/edit_po_indent').'/'.$this->uri->segment('3'); ?>" enctype="multipart/form-data">
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">Update GRN</h3>
					<span class="pull-right">
						<button class="btn-success po_add_details" id="edit_po_int_details" name="edit_po_int_details" type="submit"><strong>Update</strong></button>
						 <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </span>
                </div>
				<br>
    
			  <div class="row-fluid">
                    <!--<div class="pull-right">
                      <a class="btn btn-success" name="" id="" href="javascript:void(0);"><strong>Create from Purchase Order</strong></a>
                    </div>-->
                    <div class="clearfix"></div>
                </div>
				 <br /> 
                <span class="grid_error" id="received_qtyError" >
                  Please Add Some Items
                 </span>
				
              <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">GRN Details</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
													
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>PO Reference No</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="purchse_ind_quonumError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                    </div>
                                         <div class="row-fluid input-prepend input-append">
                                        <input id="purchse_ind_quonum" name="purchse_ind_quonum" value="<?php if(isset($edit_indent->po_reference_number)) {echo $edit_indent->po_reference_number; } ?>" readonly="readonly"  type="text" class="input-large nameField" />
                                        <input type="hidden" id="poindent_po_oder_id" name="poindent_po_oder_id" value="<?php if(isset($edit_indent->po_purchase_order_id)) {echo $edit_indent->po_purchase_order_id; } ?>">
                                    </div>
                                    </span>
                                </div>
                            </td>
                            
                            <td class="fieldLabel medium">
									<label class="muted pull-right marginRight10px"><span class="redColor">*</span>GRN No</label>
								</td>
                                <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="purchse_ind_indentnumError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="purchse_ind_indentnum" name="purchse_ind_indentnum"  value="<?php if(isset($edit_indent->po_indent_number)) {echo $edit_indent->po_indent_number; } ?>" readonly="readonly" type="text" class="input-large nameField" />
                                         <input id="purchase_indent_store_id" name="purchase_indent_store_id" type="hidden" class="input-large nameField" value="<?php if(isset($edit_indent->po_indent_store_id)) {echo $edit_indent->po_indent_store_id; } ?>" />
                                        <input id="purchase_indent_division_id" name="purchase_indent_division_id" type="hidden"  value="<?php if(isset($edit_indent->po_indent_division_id)) {echo $edit_indent->po_indent_division_id; } ?>" class="input-large nameField" />
                                        
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
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="purchse_ind_vnameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <!--<input id="purchse_ind_vname" name="purchse_ind_vname" value="<?php if(isset($edit_indent->po_indent_vendor_name)) {echo $edit_indent->po_indent_vendor_name; } ?>" type="text" class="input-large nameField" />-->
                                    <div class="row-fluid input-prepend input-append">    
                                    <input type="text" class="input-large nameField" id="vdrquo_vendor_name" name="vdrquo_vendor_name" value="<?php if(isset($edit_indent->vendor_name)) {echo $edit_indent->vendor_name; } ?>" readonly placeholder="Type to search">
                                     <span id="plus_vendor" class="add-on cursorPointer createReferenceRecord plus">
                                                <a href="javascript:void(0);"><i class="icon-plus" title="Create"></i></a>
                                            </span>
                                            <input type="hidden" id="vdrquo_vendor_id" name="vdrquo_vendor_id" value="<?php if(isset($edit_indent->vendor_id)) {echo $edit_indent->vendor_id; } ?>">
                                            <input type="hidden" id="vdrquo_vendor_code" name="vdrquo_vendor_code" value="">
                                    
                              </div>
                            </td>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Status</label>
                            </td>
							<td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="sales_ret_statusError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                       
											<select name="ind_status" class="chzn-select" id="ind_status">

											<option value="created"<?php if($edit_indent->po_indent_active_status == "created") { ?> selected="selected" <?php } ?>>Created</option>
											<option value="approved"<?php if($edit_indent->po_indent_active_status == "approved") { ?> selected="selected" <?php } ?>>Approved</option>
											<option value="cancelled"<?php if($edit_indent->po_indent_active_status == "cancelled") { ?> selected="selected" <?php } ?>>Cancelled</option>
											<?php /*?><option value="completed"<?php if($edit_indent->po_indent_active_status == "completed") { ?> selected="selected" <?php } ?>>Completed</option><?php */?>


											</select>
                                    </span>
                                </div>
                            </td>

                        
                            
                        </tr>   


						<tr>
							<td class="fieldLabel medium">
									<label class="muted pull-right marginRight10px"><span class="redColor">*</span>Created By</label>
								</td>
                                <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="purchse_int_createdError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <!--<input id="purchse_int_created" name="purchse_int_created" value="<?php if(isset($edit_indent->po_indent_create_by)) {echo $edit_indent->po_indent_create_by; } ?>" type="text" class="input-large nameField" />-->
                                        
                                        <select class="chzn-select"  name="purchse_int_created" id="purchse_int_created">
                        				<option value="1">Admin</option>
                                        
       									</select>
                                    </span>
                                </div>
                            </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Approved By</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="purchse_int_approverError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                       <!-- <input id="purchse_int_approver" name="purchse_int_approver" value="<?php if(isset($edit_indent->po_indent_approved_by)) {echo $edit_indent->po_indent_approved_by; } ?>" type="text" class="input-large nameField" />-->
                                       <select class="chzn-select"  name="purchse_int_approver" id="purchse_int_approver">
                                    <option value="">Select an Option</option>
									<option value="1">Admin</option>
                                       </select>
                                    </span>
                                </div>
                            </td>
							
                            
                        </tr>
						<tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">GRN Date</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="vdrquo_vendor_nameError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="intent_date" name="intent_date" value="<?php if(($edit_indent->po_indent_date)!= "0000-00-00") { echo date('d-m-Y', strtotime($edit_indent->po_indent_date)); } ?>" type="text" class="input-large nameField" />
                                    </span>
                                </div>
							</td>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Location</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="purchse_int_locError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <!--<input id="purchse_int_loc" name="purchse_int_loc" value="<?php if(isset($edit_indent->po_location)) {echo $edit_indent->po_location; } ?>" type="text" class="input-large nameField" />-->
                                    <select class="chzn-select"  name="purchse_int_loc" id="purchse_int_loc">
                                    <option value="">Select an Option</option>
									<?php foreach($locationdata as $LOC) {    ?>
                                        <option value="<?php echo $LOC['location_id']; ?>" <?php if($edit_indent->po_location == $LOC['location_id']) { ?> selected="selected" <?php } ?> ><?php echo $LOC['location_name']; ?></option>
                                    <?php } ?></select>
                                    </span>
                                </div>
                            </td>
							
							
                            
                        </tr>
                        <tr>
						 <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor"></span>Customer DC/INV	
</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        
                                      
                                    <div class="row-fluid input-prepend input-append">    
                                    <input type="text" class="input-large nameField" id="vdrquo_cus_dc_inv" name="vdrquo_cus_dc_inv" value="<?php if(isset($edit_indent->po_cus_dc_inv)) {echo $edit_indent->po_cus_dc_inv; } ?>" >
                                           
                              </div>
                            </td>
							
							
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor"></span>Customer DC/INV Date	
</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="vdrquo_vendor_nameError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="cus_dc_inv_date" name="cus_dc_inv_date" value="<?php if(($edit_indent->po_cus_dc_inv_date)!= "0000-00-00") { echo date('d-m-Y', strtotime($edit_indent->po_cus_dc_inv_date)); } ?>" type="text" class="input-large nameField" />
                                    </span>
                                </div>
							</td>
                        </tr>
                        <tr>
						
						 <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor"></span>Vehicle Number	

</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        
                                      
                                    <div class="row-fluid input-prepend input-append">    
                                    <input type="text" class="input-large nameField" id="lr_number" name="lr_number" value="<?php if(isset($edit_indent->po_lr_number)) {echo $edit_indent->po_lr_number; } ?>" >
                                </div>
                            </td>
                           <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor"></span>Transport Name	
</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        
                                       
                                    <select class="chzn-select"  name="purchase_carrier" id="purchase_carrier">
                                    <option value="">Select an Option</option>
									<?php foreach($carrier as $CAR) {    ?>
                                        <option value="<?php echo $CAR['shipping_carrier_id']; ?>" <?php if($edit_indent->po_purchase_carrier == $CAR['shipping_carrier_id']) { ?> selected="selected" <?php } ?> ><?php echo $CAR['shipping_carrier_name']; ?></option>
                                    <?php } ?></select>
                                    </span>
                                </div>
								<?php //echo"<pre>"; print_r($carrier);  ?>
                            </td>
                        </tr>
						
                        
                    </tbody>
                    
                </table>
				<!--<div class="row-fluid">
                    <div class="pull-right">
                        <a class="btn btn-success" name="vendor_add_details" id="singleitem" href="javascript:void(0);"><strong>Add Single Item</strong></a>
                        <a class="btn btn-success" name="vendor_add_details" id="multipleitems"><strong>Add Multiples Item</strong></a>
                    </div>
                    <div class="clearfix"></div>
                </div>-->
                <div style="overflow:scroll;">
				 <input type ="hidden" value="0" name="last_table_id " id="last_table_id">
                <br /> 
                <span style="color:#FF0000; text-align:center; width:100%; height: 25px; float: left;" id="ind_error"></span>
				 <br />
				<table id="tblList">
				<thead>
				<tr>	
				<th>SKU</th>	
				<th>Item</th>
				<th>HSN/SAC</th>
				<th>Control No</th>
				<th>Batch No</th>
				<th>Expiry Date</th>
				<th>Packing Size</th>
				<th>UOM</th>
				<th>Brand</th>
                <th>Price</th>
                <th>Ordered Qty</th>	
                <th>Billed Qty</th>	
				<th>Received Qty</th>
				<th>Pending Qty</th>
				<th>Extra Qty</th>
                <th>Total amt</th>
				<th>Remark</th>
				</tr>
				</thead>
				<tbody id="disp_items">
				  
          <?php 
		  //echo "<pre>"; print_r($edit_indent_items); 
		  if(!empty($edit_indent_items)) { $itemcount = 1; foreach($edit_indent_items as $ITEMS) { ?>
                        <tr>
                            <td>
                            <?php if(isset($ITEMS['po_indent_item_sku'])) { echo $ITEMS['po_indent_item_sku']; } ?>
                            <input name="item_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_indent_item_item_id'])) { echo $ITEMS['po_indent_item_item_id']; } ?>" type="hidden" />
                            <input name="item_code[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_indent_item_code'])) { echo $ITEMS['po_indent_item_code']; } ?>" type="hidden" />
                             <input name="sno_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_indent_item_id'])) { echo $ITEMS['po_indent_item_id']; } ?>" type="hidden" />
                              <input name="po_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_indent_po_id'])) { echo $ITEMS['po_indent_po_id']; } ?>" type="hidden" />
                              <input name="pur_ind_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_indent_item_indent_id'])) { echo $ITEMS['po_indent_item_indent_id']; } ?>" type="hidden" />
                            </td>
                            <td>
                            <?php if(isset($ITEMS['product_name'])) { echo $ITEMS['product_name']; } ?>
                            <input name="item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_name'])) { echo $ITEMS['product_name']; } ?>" type="hidden" />
                            </td>
                            <td>
							 <?php if(isset($ITEMS['po_indent_item_hsn_san'])) { echo $ITEMS['po_indent_item_hsn_san']; } ?>
                            <input name="item_name_hsn_sac[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_indent_item_hsn_san'])) { echo $ITEMS['po_indent_item_hsn_san']; } ?>" type="hidden" />
                            </td>
                            <td>
							 
                            <input name="item_control_no[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_indent_item_control_no'])) { echo $ITEMS['po_indent_item_control_no']; } ?>"  class="quantity stock_text" type="text" />
                            </td>
                            <td>
							 <input name="item_batch_no[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_indent_item_batch_no'])) { echo $ITEMS['po_indent_item_batch_no']; } ?>"  class="quantity stock_text" type="text" />
                            </td> 
							<td>
							
							 <input name="item_expiry_date[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_indent_item_expiry_date'])){ 
										$originalDate=$ITEMS['po_indent_item_expiry_date'];
										if($originalDate == '0000-00-00'){ }
										else
										{
											$newDate=date("d-m-Y", strtotime($originalDate));
											echo $newDate;
										}
										} ?>"  class="quantity datepicker" onmouseover="return onkeyupfordate(<?php echo $itemcount; ?>)" type="text" />
                            </td>
							
						   <td>
                           
                           <input name="item_pack_size[<?php echo $itemcount; ?>]" class="quantity stock_text" type="text" value="<?php if(isset($ITEMS['po_indent_item_pack_size'])) { echo $ITEMS['po_indent_item_pack_size']; } ?>" />
                           </td>
							
							
							
							 <td>
                           <?php if(isset($ITEMS['uom_name'])) { echo $ITEMS['uom_name'];  } ?> 
                           <input name="UOM_id[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['uom_id'])) { echo $ITEMS['uom_id']; } ?>" />
                           <input name="UOM_name[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['uom_name'])) { echo $ITEMS['uom_name']; } ?>" />
                           </td>
						   
						    <td>
                           <input name="item_brand[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($ITEMS['po_indent_item_brand'])) { echo $ITEMS['po_indent_item_brand']; } ?>"  class="quantity stock_text" />
                           </td>
                            <td>
    <input id="item_price_<?php echo $itemcount; ?>" name="item_price[<?php echo $itemcount; ?>]"  value="<?php if(isset($ITEMS['po_indent_item_price'])) { echo $ITEMS['po_indent_item_price']; } ?>" class="quantity stock_text"  onkeyup="calc_price(<?php echo $itemcount; ?>)" type="text" />
    </td>
                            <td>
                           <?php if(isset($ITEMS['po_indent_order_qty'])) { echo $ITEMS['po_indent_order_qty'];  } ?> 
                            <input id="ordered_qty_<?php echo $itemcount; ?>" name="ordered_qty[<?php echo $itemcount; ?>]" type="hidden" onkeyup="return onkeyupfortotal(<?php echo $itemcount; ?>)" value="<?php if(isset($ITEMS['po_indent_order_qty'])) { echo $ITEMS['po_indent_order_qty']; } ?>" />
                            </td>
							
							  <td>
                            <input id="build_qty_<?php echo $itemcount; ?>" name="build_qty[<?php echo $itemcount; ?>]" type="text"  value="<?php if(isset($ITEMS['po_indent_build_qty'])) { echo $ITEMS['po_indent_build_qty']; } ?>" class="quantity build_qty" />
                            </td>
                           
                            <td>
                            <input id="received_qty_<?php echo $itemcount; ?>" name="received_qty[<?php echo $itemcount; ?>]" type="text" onkeyup="return onkeyupfortotal(<?php echo $itemcount; ?>)" value="<?php if(isset($ITEMS['po_indent_received_qty'])) { echo $ITEMS['po_indent_received_qty']; } ?>" class="quantity received_qty" />
                            </td>
                            <td>
                            <input id="pending_qty_<?php echo $itemcount; ?>" name="pending_qty[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($ITEMS['po_indent_pending_qty'])) { echo $ITEMS['po_indent_pending_qty']; } ?>" class="quantity" readonly="readonly" />
                            </td>
							
							 <td>
                            <input id="extra_qty_<?php echo $itemcount; ?>" name="extra_qty[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($ITEMS['po_indent_extra_qty'])) { echo $ITEMS['po_indent_extra_qty']; } ?>" class="quantity" readonly="readonly" />
                            </td>
                             <td>
    <input id="item_total_price_<?php echo $itemcount; ?>" name="item_total_price[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_indent_item_total'])) { echo $ITEMS['po_indent_item_total']; } ?>" class="quantity stock_text" readonly="readonly"  type="text" />
    </td>
							
							<td>
                            <input id="item_remark_<?php echo $itemcount; ?>" name="item_remark[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($ITEMS['po_indent_item_remark'])) { echo $ITEMS['po_indent_item_remark']; } ?>" />
                            </td>
							
							
                        </tr>
                         <?php $itemcount++; } } ?>

				</tbody>
				</table>
                </div>
                <br />
				<br />				
                                        
                <br />
						
               				
                                       
                <br>
                
                <div class="row-fluid">
                    <div class="pull-right">
                        <button class="btn-success po_add_details" type="submit" name="edit_po_int_details" id="edit_po_int_details"><strong>Update</strong></button>
                        <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <br>
            
            </form>
				
          </div>

      </div>
	

     
   
     <!--popup end -->
      <!--popup start -->
      <!--<div id="vendors_to_pop_up" class="pop-up-display-content multipleitemscontent">
      
   </div>-->
     <!--popup end -->

     <!--popup start -->
      <div id="purchase_order_to_pop_up" class="pop-up-display-content multipleitemscontent">
   </div>
     <!--popup end -->
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

		// Binding a click event
		// From jQuery v.1.7.0 use .on() instead of .bind()
		

    $('#plus_purchase_order_request').bind('click', function(e) {
    
    $.ajax({
        type: 'POST',
        url: '<?php echo site_url('purchaseindent/getpurchaseorderpopup'); ?>',
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

	});
})(jQuery);
</script>
<script type="text/javascript">
   

    function openQuantityBox(id)
    {
  $('#received_value_'+id).hide();
  $("#received_qty_"+id).attr('type','textbox');
  return false;
    }

function closeQuantityBox(id)
{
   var that = $("#received_qty_"+id);
   $('#received_value_'+id).text(that.val()).show(); //updated text value and show text
   $("#received_qty_"+id).attr('type','hidden');
   return false;
}
</script>
<script>
function calc_price(id)
{
	var price = $("#item_price_"+id).val();
	var received_qty = $("#received_qty_"+id).val();

	if((!isNaN(price)))
		{
			var total_price = (parseFloat(price) * parseFloat(received_qty)).toFixed(2);
			$("#item_total_price_"+id).val(total_price);
		}
	 else
	 {
		$("#ind_error").text("Please Enter Numeric only");
		$("#item_price_"+id).val('');
		$("#item_total_price_"+id).val('');
	 }
}
</script>
<script type="text/javascript">
function onkeyupfortotal(id)
{
	
		var ordered_qty = $("#ordered_qty_"+id).val();
		var received_qty = $("#received_qty_"+id).val();
		var pending_qty = $("#pending_qty_"+id).val();
		var extra_qty = $("#extra_qty_"+id).val();
		var build_qty = $("#build_qty_"+id).val()
	
		
		
		if((!isNaN(received_qty)) || (received_qty < 0))
		{
		  if(parseFloat(received_qty) > parseFloat(ordered_qty))
		  {
			 
		
		  } 
		 else
		 {
			if(ordered_qty != "" && received_qty != "" )
			{
				var totalQuan = parseFloat(ordered_qty) - parseFloat(received_qty);
				$("#pending_qty_"+id).val(totalQuan);
				$("#build_qty_"+id).val(received_qty);
				$("#extra_qty_"+id).val(0);
				
				var price = $("#item_price_"+id).val();
				var received_qty = $("#received_qty_"+id).val();
				var total_price = (parseFloat(price) * parseFloat(received_qty)).toFixed(2);
				$("#item_total_price_"+id).val(total_price);
	 
				  return false;
			} 
		
		 }
			 
		 if(parseFloat(received_qty) < parseFloat(ordered_qty))
		 {
			 
			
		 } 
		
		 else
		 {
			if(ordered_qty != "" && received_qty != "" )
			{
				$("#pending_qty_"+id).val(0);
				var totalQuan1 = parseFloat(received_qty) - parseFloat(ordered_qty);
				$("#extra_qty_"+id).val(totalQuan1);
				$("#build_qty_"+id).val(received_qty);
				
				var price = $("#item_price_"+id).val();
				var received_qty = $("#received_qty_"+id).val();
				var total_price = (parseFloat(price) * parseFloat(received_qty)).toFixed(2);
				$("#item_total_price_"+id).val(total_price);
				
				 return false;
			} 
		 }
	 }
	 else
	 {
		$("#ind_error").text("Please Enter Numeric only");
		$("#received_qty_"+id).val("");
		$("#pending_qty_"+id).val("");
		$("#extra_qty_"+id).val("");
		return false;
	 }
		 
}
</script>

<script>
$(document).ready(
  
  /* This is the function that will get executed after the DOM is fully loaded */
  function () {
    $( "#cus_dc_inv_date" ).datepicker({
		dateFormat: 'dd-mm-yy',
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    }); 
	
   $('.quantity1').keyup(function(){
    var val = $(this).val();
    if(isNaN(val)){
         val = val.replace(/[^0-9\.]/g,'');
         if(val.split('.').length>2) 
             val =val.replace(/\.+$/,"");
    }
    $(this).val(val); 
});

});
</script>

<script type="text/javascript">
function onkeyupfordate(id)
{

	 $(function() {
    	$(".datepicker").datepicker({
			
			dateFormat: 'dd-mm-yy',
			changeMonth: true,//this option for allowing user to select month
			changeYear: true //this option for allowing user to select from year range
    });
  });
     
}
</script>
