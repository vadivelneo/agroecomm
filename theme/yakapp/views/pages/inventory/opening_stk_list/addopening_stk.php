<script language="javascript" type="text/javascript">
         
$(document).ready(function () {

		 $("#last_table_id").val('0');

	
	 $('.open_stk_add').click(function()
     {
        
        var open_stk_code = $("#open_stk_code").val();
        var product_type = $("#product_type").val();
        var opt_stk_loc = $("#opt_stk_loc").val();
        var last_table_id = $("#last_table_id").val();
		var store_division_id = $("#material_store_division_id").val();
		
     
	 if(open_stk_code == "")
    {
      $('#open_stk_code').css("border","1px solid #FF0000");
      $('.error').html("");
      //document.getElementById("vendor_nameError").innerHTML="* This field is required";
      document.getElementById('open_stk_codeError').style.display = 'block';
      $('#open_stk_code').value="";
      $('#open_stk_code').focus();
      return false;
    }
      else
    {
      document.getElementById('open_stk_codeError').style.display = 'none';
      $('#open_stk_code').css("border","1px solid #82B04F");
      document.getElementById("open_stk_codeError").innerHTML="";
    }
	
	if(product_type == "")
    {
      $('#product_type').css("border","1px solid #FF0000");
      $('.error').html("");
      //document.getElementById("vendor_nameError").innerHTML="* This field is required";
      document.getElementById('product_typeError').style.display = 'block';
      $('#product_type').value="";
      $('#product_type').focus();
      return false;
    }
      else
    {
      document.getElementById('product_typeError').style.display = 'none';
      $('#product_type').css("border","1px solid #82B04F");
      document.getElementById("product_typeError").innerHTML="";
    }
	
	
	
	if(opt_stk_loc == "")
    {
      $('#opt_stk_loc').css("border","1px solid #FF0000");
      $('.error').html("");
      //document.getElementById("vendor_nameError").innerHTML="* This field is required";
      document.getElementById('opt_stk_locError').style.display = 'block';
      $('#opt_stk_loc').value="";
      $('#opt_stk_loc').focus();
      return false;
    }
      else
    {
      document.getElementById('opt_stk_locError').style.display = 'none';
      $('#opt_stk_loc').css("border","1px solid #82B04F");
      document.getElementById("opt_stk_locError").innerHTML="";
    }
	
	if(store_division_id == "0")
    {
      $('#material_store_division_id').css("border","1px solid #FF0000");
      $('.error').html("");
      //document.getElementById("vendor_nameError").innerHTML="* This field is required";
      document.getElementById('store_division_typeError').style.display = 'block';
      $('#material_store_division_id').value="";
      $('#material_store_division_id').focus();
      return false;
    }
      else
    {
      document.getElementById('store_division_typeError').style.display = 'none';
      $('#material_store_division_id').css("border","1px solid #82B04F");
      document.getElementById("store_division_typeError").innerHTML="";
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

});

});
</script>
<script>

function codevalidation()
{
	var code = $("#open_stk_code").val();
	var prefix = $("#open_stk_code_prefix").val();
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
	
<script>
    /*  jQuery ready function. Specify a function to execute when the DOM is fully loaded.  */
$(document).ready(
  
  /* This is the function that will get executed after the DOM is fully loaded */
  function () {
    $( "#opt_stk_adddate" ).datepicker({
		dateFormat:"dd-mm-yy",
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    }); 
	
  }

);
</script>

<script type="text/javascript">
function onkeyupfordate(id)
{
	 $(function() {
		 
    	$( ".datepicker" ).datepicker({
			dateFormat:"dd-mm-yy",
			changeMonth: true,//this option for allowing user to select month
			changeYear: true //this option for allowing user to select from year range
    });
  });
     
}
</script>
	
<?php echo $this->load->view('pages/inventory_left_side'); 

 //echo "<pre>";print_r($so_list);exit;
?>
<section>

	<div class="rightPanel" style="padding: 14px 20px; width:96%;">

		<div class='container-fluid editViewContainer'>
			<form class="form-horizontal openingstkForm" id="openingstkForm" name="openingstkForm" method="post" action="<?php echo site_url('inventory/addopeningstock')?>">
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">Add Opening Stock</h3>
					<div class="pull-right">
						<button class="btn-success open_stk_add" type="submit" name="open_stk_add" id="open_stk_add"><strong>save</strong></button>
                         <input type="reset" name="reset" id="rest" class="btn btn-primary" style="width:80px;" />
						<a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
					</div>
				</div>

				<table class="table table-bordered blockContainer showInlineTable equalSplit">
					<thead>
						<tr>
							<th class="blockHeader" colspan="4">Stock Details</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="fieldLabel medium">
								<label class="muted pull-right marginRight10px">
									<span class="redColor">*</span>Opening Stock Code
								</label>
							</td>
							<td class="fieldValue medium">
								<div class="row-fluid">
									<span class="span10">
										<div class="formError" id="open_stk_codeError" style="margin-top: -30px;">
											<div class="formErrorContent">This field is required</div>
											<div class="formErrorArrow"></div>
										</div>
										 <input id="open_stk_code" readonly="readonly" type="text" class="input-large uppercase" onkeyup="return codevalidation()" name="open_stk_code" value="<?php if(isset($Opscode)) { echo $Opscode; } ?>"/>
                                        <input id="open_stk_code_prefix" type="hidden" name="open_stk_code_prefix" value="<?php if(isset($opsprefix)) { echo $opsprefix; } ?>"/>
									</span>
								</div>
							</td>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Product Type</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
								<div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id= "product_typeError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                    <span class="span10">
                                        <select	name="product_type" class="chzn-select" id="product_type" onchange="getdata()">
                                            <option value="">Select Product Type</option>
                                            <?php if(isset($product_type) && !empty($product_type)) { foreach($product_type as $TYPE) { ?>
                                            <option value="<?php echo $TYPE['products_type_id']; ?>"><?php echo $TYPE['products_type_name']; ?></option>
                                           	<?php } } ?>
                                        </select>
                                       
                                    </span>
                                </div>
                            </td>
							 
							
							</tr>
							<tr>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Added Location</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
										 <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id= "opt_stk_locError" style="margin-top: -30px;">
                                            <div class="formErrorContent">Enter Location</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        
										 <select class="chzn-select"  name="opt_stk_loc" id="opt_stk_loc">
                        <option value="">Select an Option</option>
                        <?php foreach($locationdata as $LOC) {    ?>
                 <option value="<?php echo $LOC['location_id']; ?>"  ><?php echo $LOC['location_name']; ?></option>
        <?php } ?>

                      </select>
                           
                                    </span>
                                </div>
                            </td>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    Added date
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <input type="text" 	value="<?php echo date('d-m-Y');?> " name="opt_stk_adddate" class="input-large" id="opt_stk_adddate">
                                    </span>
                                 </div>
                             </td>
						</tr>
						<tr>
						 <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    Approved By
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <select	data-selected-value="" name="opt_stk_appr_by" class="chzn-select" id="opt_stk_appr_by">
                                            <?php foreach($users as $USR) { ?>
                                          <option value="<?php echo $USR['user_id']; ?>" <?php if($userid == $USR['user_id']) { ?> selected="selected" <?php } ?>>
                                          <?php echo $USR['user_name']; ?>
                                          </option>
                                        <?php } ?>
                                        </select>
                                    </span>
                                 </div>
                             </td>
							 <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    Status
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <select	data-selected-value="" name="opt_stk_status" class="chzn-select" id="opt_stk_status">
                                            <option value="">Select an Option</option>
                                            <option value="Draft">Draft</option>
                                            <option value="Approved">Approved</option>
                                            <option value="Completed">Completed</option>
                                            <option value="cancelled">Cancelled</option>
                                           
                                        </select>
                                    </span>
                                 </div>
                             </td>
						</tr>
						<tr>
						  <td class="fieldLabel medium"> <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Division
                                </label></td>
						  <td class="fieldValue medium"><div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="store_division_typeError">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                            <select name="material_store_division_id" class="chzn-select" id="material_store_division_id" onchange="getstore_division()" >
										 <option value="0">Select Division</option>
                                        <?php if(isset($store_division) && !empty($store_division)) { foreach($store_division as $STD) { ?>
                                            <option value="<?php echo $STD['division_id']; ?>"><?php echo $STD['division_name']; ?></option><?php } } ?>
                                        </select></td>
						  <td class="fieldLabel medium">&nbsp;</td>
						  <td class="fieldValue medium">&nbsp;</td>
					  </tr>
						

					</tbody>
				</table>

				<br />
				<br />
			 
				<div class="pull-right">
					<!--<a class="btn btn-success" name="vendor_add_details" id="singleitem" href="javascript:void(0);"><strong>Add Single Item</strong></a>-->
					<a class="btn btn-success" name="vendor_add_details" id="multipleitems"><strong>Add Items</strong></a>
				</div>
				<div class="clearfix"></div>
			
			<input type ="hidden" value="0" name="last_table_id " id="last_table_id">
			<br /> 
			<br />
			<span class="grid_error" id="last_table_idError" >
                  Please Add Some Items
            </span>


				<table>
					<thead>
						<tr id ="tblList">
							
							<th>Item Code</th>
                            <th>SKU</th>
							<th>Item Name</th>
                            <th>HSN/SAC</th>
                            <th>Division</th>
                            <th>Store</th>
                            <th>Control No</th>
                            <th>Batch No</th>
							<th>UOM</th>
                            <th>Expiry Date</th>
							<th>Quantity </th>
                            <th>Action</th>
                           
				  
						</tr>
                    </thead>
                   
					<tbody id="disp_items">
	
				</tbody>
				</table>
				<br />
				<br />
				<br />
				<br />
				<div class="row-fluid">
					<div class="pull-right">
						<button class="btn-success open_stk_add" type="submit" name="open_stk_add" id="open_stk_add"><strong>save</strong></button>
                         <input type="reset" name="reset" id="rest" class="btn btn-primary" style="width:80px;" />
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
            position: [500, 100], //x, y
            closeClass:'close',
            follow: [true, true],
            modalClose: true
          });      
        }
      });
    });

   

	});
})(jQuery);
/* function getdata()
{
	var cout = $('select#product_type').val();
	 
 	//var state = $('select#shipping_state').val();
 	$.ajax({
 		type: 'POST',
 		url: '<?php echo site_url('inventory/get_opsstk_products'); ?>',
 		data: {productid: cout},
 		success: function(resp) { //alert(resp);
			$('#items_list').html(resp);
 		}
	 });
}
*/
</script>

<script>
 (function($) {
	$(function() {

		$('#singleitem').bind('click', function(e) {
			
			$.ajax({
					type: 'POST',
					url: '<?php echo site_url('inventory/getsingleitem'); ?>',
					data: {},
					success: function(resp) 
					{
						$("#singleitem_to_pop_up").html(resp);
						
						e.preventDefault();
						$('#singleitem_to_pop_up').bPopup({
							position: [300, 50], //x, y
							closeClass:'close',
							follow: [true, true],
							modalClose: true
						});			 
					}
				});
			 
		});

		$('#multipleitems').bind('click', function(e) {
			
			var division_id = $("#material_store_division_id").val();
			var store_id = $("#material_store_id").val();
			var store_division_id = $("#material_store_division_id").val();
			
			if(store_division_id == "0")
    {
      $('#material_store_division_id').css("border","1px solid #FF0000");
      $('.error').html("");
      //document.getElementById("vendor_nameError").innerHTML="* This field is required";
      document.getElementById('store_division_typeError').style.display = 'block';
      $('#material_store_division_id').value="";
      $('#material_store_division_id').focus();
      return false;
    }
      else
    {
      document.getElementById('store_division_typeError').style.display = 'none';
      $('#material_store_division_id').css("border","1px solid #82B04F");
      document.getElementById("store_division_typeError").innerHTML="";
    }
			
			$.ajax({
					type: 'POST',
					url: '<?php echo site_url('inventory/getmultipleitemdetails'); ?>',
					data: {division_id:division_id,store_id:store_id},
					success: function(resp) 
					{
						$("#multipleitems_to_pop_up").html(resp);
						
						e.preventDefault();
						$('#multipleitems_to_pop_up').bPopup({
							position: [100, 50], //x, y
							closeClass:'close',
							follow: [true, true],
							modalClose: true
						});			 
					}
				});
			 
		});

		 

	});
})(jQuery);

function itemsgridrowdelete(id)
{
	sure = confirm('Are you sure to Delete?');
	
  	if(sure == true) 
  	{
		
		var deleteid = $("#itemsgrid_delete_"+id).attr('data-delete');
		var itemid = $("#itemsgrid_delete_"+id).attr('data-item');
		
		var myarray = new Array();
		
		$('input[name^="grid_item_id"]').each(function() {
   			myarray.push($(this).val());			
		});
		
		length = $("#last_table_id").val();
		
		var newarray = "";
		
		var i = 0;
		for(var counter=1; counter<=length; counter++)
		{
			var	item_id = $("#grid_item_id_"+counter).val();
			var	item_code = $("#item_code_"+counter).val();
			var	item_name = $("#item_name_"+counter).val();
			var	item_name_hsn_sac = $("#item_name_hsn_sac_"+counter).val();
			var	item_control_no = $("#item_control_no_"+counter).val();
			var	item_batch_no = $("#item_batch_no_"+counter).val();
			var	item_expiry_date  = $("#item_expiry_date_"+counter).val();
			var item_store_division_id = $("#material_store_division_id_"+counter).val();
			var item_store_division_name = $("#material_store_division_name_"+counter).val();
			var item_store_id = $("#material_store_id_"+counter).val();
			var item_store_name = $("#material_store_name_"+counter).val();
			var	UOM_name  = $("#UOM_name_"+counter).val();
			var	UOM_id  = $("#UOM_id_"+counter).val();
			var	Qty =$("#quantity_"+counter).val();
			var	item_mfg_prtno =$("#item_mfg_prtno_"+counter).val();
			 
			if(item_id != itemid)	
			{	
				 i++;
				 
				 var mritms='<tr><td>'+item_code+'<input name="item_code['+i+']" id="item_code_'+i+'" value="'+item_code+'" type="hidden" /><input name="grid_item_id['+i+']" value="'+item_id+'" id="grid_item_id_'+i+'" type="hidden" /></td><td>'+item_mfg_prtno+'<input id="item_mfg_prtno_'+i+'" name="item_mfg_prtno['+i+']" value="'+item_mfg_prtno+'" type="hidden" /></td><td>'+item_name+'<input id="item_name_'+i+'" name="item_name['+i+']" value="'+item_name+'" type="hidden" /></td><td>'+item_name_hsn_sac+'<input id="item_name_hsn_sac_'+i+'" name="item_name_hsn_sac['+i+']" value="'+item_name_hsn_sac+'" type="hidden" /></td><td>'+item_store_division_name+'<input id="material_store_division_id_'+i+'" name="material_store_division_id['+i+']" value="'+item_store_division_id+'" type="hidden" /></td><td>'+item_store_name+'<input id="material_store_id_'+i+'" name="material_store_id['+i+']" value="'+item_store_id+'" type="hidden" /></td><td><input id="item_control_no_'+i+'" name="item_control_no['+i+']" value="'+item_control_no+'" class="quantity stock_text" type="text" /></td><td><input id="item_batch_no_'+i+'" name="item_batch_no['+i+']" value="'+item_batch_no+'" class="quantity stock_text" type="text" /></td><td>'+UOM_name+'<input name="UOM_id['+i+']" id="UOM_id_'+i+'" type="hidden" value="'+UOM_id+'" /><input name="UOM_name['+i+']" type="hidden" id="UOM_name_'+i+'" value="'+UOM_name+'" /></td><td><input name="item_expiry_date['+i+']" id="item_expiry_date_'+i+'" class="quantity datepicker" onmouseover="return onkeyupfordate('+i+')" type="text" value="'+item_expiry_date+'" /><input name="item_expiry_date['+i+']" id="item_expiry_date_'+i+'" type="hidden" value="'+item_expiry_date+'" /></td><td><a href="javascript:void(0);"></a><input name="quantity['+i+']" value="'+Qty+'" id="quantity_'+i+'" class="quantity" type="text" /></td><td colspan="2"><div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_delete_'+i+'" onclick="return itemsgridrowdelete('+i+');" data-item="'+item_id+'" data-delete="'+i+'" title="Delete"><span class="icon-trash"></span></div></td></tr>';
				  
				  newarray = newarray.concat(mritms);
				  
				 
			}
			else
			{
				
			}
		}
		$("#last_table_id").val(i);
		$('#disp_items').html(newarray);

		return false;
    }
  	else 
  	{
      return false;
    }
	
}

 
 </script>
