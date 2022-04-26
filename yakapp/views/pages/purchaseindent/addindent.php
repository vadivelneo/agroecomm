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
	var purchase_indent_store_id = $("#purchase_indent_store_id").val();
   
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

	/*var isValid = true;
	$('input[id^=received_qty_]').each(function() {
            if ($.trim($(this).val()) == '') {
                isValid = false;
                $(this).css({
                    "border": "1px solid red",
                    "background": "#FFCECE"
                });
				$("#ind_error").text("Please Enter Received Qty"); 
            }
            else {
                $(this).css({
                    "border": "",
                    "background": ""
                });
            }
        });
		 if (isValid == false) 
            e.preventDefault();*/
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

function codevalidation()
{
	var code = $("#purchse_ind_indentnum").val();
	var prefix = $("#purchse_ind_indentprefix").val();
	var codelength = code.length;
	var prefixlength = prefix.length;
	var res = code.substr(0,prefixlength); 
	if(codelength >= prefixlength)
	{
		if(res != prefix)
		{
			alert('Vendor Code Should be Prefix With '+prefix);
		}
	}
}
</script>


<?php echo $this->load->view('pages/purchase_left_side'); ?>

<section>
	<div class="rightPanel" style="padding: 14px 20px; width:96%;">
		<div class='container-fluid editViewContainer'>
			<form class="form-horizontal recordEditView" id="EditView" name="EditView" method="post" action="<?php echo site_url('purchaseindent/add_po_indent'); ?>" enctype="multipart/form-data">
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">Creating GRN</h3>
					<span class="pull-right">
						<button class="btn-success po_add_details" id="po_int_details" name="po_int_details" type="submit"><strong>Save</strong></button>
						 <button type="reset" value="Reset" class="btn btn-primary">Reset</button>
						<a class="btn-danger materialreq_add_details" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </span>
                </div>
				<br>
        <br>
				 <div class="row-fluid">
                    <div class="clearfix"></div>
                </div>
                
                
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
                                        <input id="purchse_ind_quonum" name="purchse_ind_quonum" type="text" class="input-large with_plus" />
                                        <span id="plus_purchase_order_request" class="add-on cursorPointer createReferenceRecord plus">
                                              <a href="javascript:void(0);"><i class="icon-plus" title="Create"></i></a>
                                          </span>
                                          <input type="hidden" id="poindent_po_oder_id" name="poindent_po_oder_id" value="">
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
										 
										  <input id="purchse_ind_indentnum"  type="text" class="input-large uppercase"  readonly="readonly" name="purchse_ind_indentnum" value="<?php /*?><?php if(isset($picode)) { echo $picode; } ?><?php */?>"  />
                                        <input id="purchse_ind_indentprefix" type="hidden" name="purchse_ind_indentprefix" value="<?php if(isset($piprefix)) { echo $piprefix; } ?>"/>
										 
                                        <input id="purchase_indent_store_id" name="purchase_indent_store_id" type="hidden" class="input-large nameField" />
                                        <input id="purchase_indent_division_id" name="purchase_indent_division_id" type="hidden" class="input-large nameField" />
                                        <input id="purchase_indent_product_type_id" name="purchase_indent_product_type_id" type="hidden" class="input-large nameField" />
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
                                        <div class="row-fluid input-prepend input-append">
                                    <input type="text" class="input-large nameField" id="vdrquo_vendor_name" name="vdrquo_vendor_name" readonly >
                                             <span id="plus_vendor" class="add-on cursorPointer createReferenceRecord plus">
                                                <a href="javascript:void(0);"><i class="icon-plus" title="Create"></i></a>
                                            </span>
                                            <input type="hidden" id="vdrquo_vendor_id" name="vdrquo_vendor_id" value="">
                                            <input type="hidden" id="vdrquo_vendor_code" name="vdrquo_vendor_code" value="">
                                        </div>
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
                                     <select name="ind_status" class="chzn-select" id="ind_status">
                                            <option value="created">Created</option>
											
                                     </select>
                                    </span>
                                </div>
                            </td>


           
              
              </tr> 
						
						
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
                                        <!--<input id="purchse_int_created" name="purchse_int_created" type="text" class="input-large nameField" />-->
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
                                       <!-- <input id="purchse_int_approver" name="purchse_int_approver" type="text" class="input-large nameField" />-->
                                         <select class="chzn-select"  name="purchse_int_approver" id="purchse_int_approver">
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
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="vdrquo_vendor_dateError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="intent_date" name="intent_date" value="<?php echo date('d-m-Y');?>" type="text" class="input-large nameField" />
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
                                            <div class="formErrorContent">Select Location</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                       <!-- <input id="purchse_int_loc" name="purchse_int_loc" type="text" class="input-large nameField" />-->
                                        <select class="chzn-select"  name="purchse_int_loc" id="purchse_int_loc">
                        <option value="">Select an Option</option>
                        <?php foreach($locationdata as $LOC) {    ?>
                 <option value="<?php echo $LOC['location_id']; ?>"  ><?php echo $LOC['location_name']; ?></option>
        <?php } ?>

                      </select>
                                    </span>
                                </div>
                            </td>
                            
                        </tr>
                        <tr>
						 <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor"></span>Customer DC/INV</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="purchse_ind_vnameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <div class="row-fluid input-prepend input-append">
                                    <input type="text" class="input-large nameField" id="vdrquo_cus_dc_inv" name="vdrquo_cus_dc_inv"  >
                                            
                                         
                                        </div>
                                    </span>
                                </div>
                            </td>
                           <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Customer DC/INV Date</label>
                            </td>
                           <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="vdrquo_vendor_invError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="cus_dc_inv_date" name="cus_dc_inv_date" value="" type="text" class="input-large nameField" />
                                    </span>
                                </div>
							</td>
                        </tr>
						<tr>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Vehicle Number</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="purchse_ord_validError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="lr_number" name="lr_number" type="text" class="input-large nameField" />
                                    </span>
                                </div>
                            </td>
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
							</tr>
                        
                    </tbody>
                    
                </table>
			<br /> 
				  <div class="row-fluid">
                     <div class="pull-right">
                    
                        <a class="btn btn-success" id="purchase_multipleitems"><strong>Add Items</strong></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
				 
                <br /> 
                <span style="color:#FF0000; text-align:center; width:100%; height: 25px; float: left;" id="ind_error"></span>
				 <br>
                  <br>
                
               
                <div style="overflow:scroll;">
				<table id="tblList">
				<thead>
				<tr>	
				<th>SKU</th>	
				<th>Item</th>
				
				<th>Control No</th>
				
				<th>Expiry Date</th>
				<th>Packing Size</th>
				
				
                <th>Price</th>
				<th>Ordered Qty</th>
                			
				<th>Received Qty</th>
				<th>Pending Qty</th>
				
                <th>Total amt</th>
				<th>Remark</th>
				</tr>
				</thead>
				<tbody id="disp_items">
				
				</tbody>
				</table>
                </div>
                <br />
				<br />				
                                        
                <br />           
                <br>
                
                <div class="row-fluid">
                    <div class="pull-right">
                        <button class="btn-success po_add_details" type="submit" name="po_int_details" id="po_int_details"><strong>Save</strong></button>
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
			 
			/* //$("#ind_error").text("Recived Quantity Value is More than Ordered Quantity");
			$("#received_qty_"+id).val("");
			$("#pending_qty_"+id).val("");
			 $("#extra_qty_"+id).val();
			return false; */
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


<script type="text/javascript">
function onkeyupfordate(id)
{
	
	 $(function() {
    	$( ".datepicker" ).datepicker({
			dateFormat: 'dd-mm-yy',
			changeMonth: true,//this option for allowing user to select month
			changeYear: true //this option for allowing user to select from year range
    });
  });
     
}

$('#purchase_multipleitems').bind('click', function(e) {

			var vendor_id = $("#vdrquo_vendor_id").val();
			var poindent_po_oder_id = $("#poindent_po_oder_id").val();
			if(vendor_id != "")
			{
				$.ajax({
					type: 'POST',
					url: '<?php echo site_url('purchasepopup/gr_getmultipleitemdetails'); ?>',
					data: {vendor:vendor_id,poindent_po_oder_id:poindent_po_oder_id},
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
				   $('#purchse_ind_quonumError').css("display", "block");
				});
				return false;
				}
				/*else if(division_id == "")
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
				}*/
			}
			 

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