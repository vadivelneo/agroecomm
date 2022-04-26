<script type="text/javascript"> 
$(document).ready(function () {

	$('#btnSave').click(function ()
	{
			
	var	Code = $("#popup_product_item_cod").val();
	
	var	item_name = $("#popup_product_item_pop").val();
	var	UOM_name  = $("#popup_product_item_uom").val();
	var	UOM_id  = $("#popup_product_item_uom_id").val();
	var	Qty =$("#popup_product_itemqty").val();
	var	item_priceperunit =$("#popup_item_priceperunit").val();
	var	Rate = $("#popup_product_itemrate").val();
	var	table_count = $("#last_table_id").val();
	
	if(Code == "") 
		{
			$('#popup_product_item_code').focus();
			$('#product_itemError').show();
			return false;
		}
		else
		{
			$('#product_itemError').hide();
		}
		
	if(Qty == "") 
		{
			$('#popup_product_itemqty').focus();
			$('#product_itemqtyError').show();
			return false;
		}
		else
		{
			$('#product_itemqtyError').hide();
		}
		
	if(item_priceperunit == "") 
		{
			$('#popup_item_priceperunit').focus();
			$('#item_priceperunitError').show();
			return false;
		}
		else
		{
			$('#item_priceperunitError').hide();
		}
		
	if(Rate == "") 
		{
			$('#popup_product_itemrate').focus();
			$('#product_itemrateError').show();
			return false;
		}
		else if(isNaN(Rate))
		{
			$('#popup_product_itemrate').focus();
			$('#product_itemrateError').show();
			return false;
		}
		else
		{
			$('#product_itemrateError').hide();
		}
			
	var	counter = parseInt(table_count)+1;
	
	var splitCode = Code.split("$");
	
	var item_id = splitCode[0];
	var item_code = splitCode[1];
	
	var myarray = [];

	$('input[name^="item_id"]').each(function()
	{
		var old_item_id = $(this).val();
		myarray.push(old_item_id);
		
	});
	
	if(jQuery.inArray(item_id, myarray)==-1)
	{
			var pro='<tr><td>'+item_code+'<input name="item_code['+counter+']" value="'+item_code+'" type="hidden" /><input name="item_id['+counter+']" value="'+item_id+'" type="hidden" /></td><td>'+item_name+'<input name="item_name['+counter+']" value="'+item_name+'" type="hidden" /></td><td>'+UOM_name+'<input name="UOM_id['+counter+']" type="hidden" value="'+UOM_id+'" /><input name="UOM_name['+counter+']" type="hidden" value="'+UOM_name+'" /></td><td><a href="javascript:void(0);" id="quantity_value_'+counter+'" onclick="return openQuantityBox('+counter+');">'+Qty+'</a><input id="quantity_'+counter+'" onblur="return closeQuantityBox('+counter+');" class="quantity" name="quantity['+counter+']" value="'+Qty+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_priceperunit_value_'+counter+'" onclick="return openPriceperUnitBox('+counter+');">'+item_priceperunit+'</a><input id="item_priceperunit_'+counter+'" onblur="return closePriceperUnitBox('+counter+');" class="quantity" name="item_priceperunit['+counter+']" value="'+item_priceperunit+'" type="hidden" /></td><td><span id="product_items_rate_value_'+counter+'">'+Rate+'</span><input name="rate['+counter+']" value="'+Rate+'"  type="hidden" /></td></tr>';
			
			$('#disp_items').append(pro);
	 		$("#last_table_id").val(counter);
			document.getElementById("frmCadastre").reset();
	}
	else
	{
			var r = confirm("The Item has already selected. Do you want update the Quantity?");
			if (r == true)
			{
				$('input[name^="item_id"]').each(function()
				{
					var serach_id = $(this).val();
					if(serach_id == item_id)
					{
						var search_name = $(this).attr("name");
						
						var search_val = search_name.split("[")[1].split("]")[0];
						
						var search_qty_val = $('[name="quantity['+search_val+']"]').val();
						
						var current_qty = Qty;
						
						var update_qty = parseInt(search_qty_val) + parseInt(Qty);
						
						$('[name="quantity['+search_val+']"]').val(update_qty);
						$("#quantity_value_"+search_val).text(update_qty);
					}
				});
				 
			 	document.getElementById("frmCadastre").reset();
			 	$('#btnSave').addClass("close");
			}
			else
			{
				document.getElementById("frmCadastre").reset();
				$('#btnSave').addClass("close");
			}
	}
	
	 
});
	
	$("#popup_product_itemqty").keypress(function (e)
	{
		 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
		 {	alert('Numbers Only');
			 return false;
		 }
    });
	$("#popup_item_priceperunit").keypress(function (e)
	{
		 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
		 {	alert('Numbers Only');
			 return false;
		 }
    });
	$("#popup_product_itemrate").keypress(function (e)
	{
		 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
		 {	
			 return false;
		 }
    });
	
	
});

function getitemname()
 {
 	var product_item_cod = $('select#popup_product_item_cod').val();
	var splitCode = product_item_cod.split("$");
	var item_id = splitCode[0];
	var item_code = splitCode[1];

 	$.ajax({
 		type: 'POST',
 		url: '<?php echo site_url('product/getitemdetails'); ?>',
		data: {product_item_cod:item_code,product_item_id:item_id},
 		success: function(resp) 
		{
			var myData = JSON.parse(resp);
			var uom_name = myData.uom_name;
			var uom_id = myData.uom_id;
			var product_name = myData.product_name;
			var product_selling = myData.product_selling;
			
			$('#popup_product_item_uom').val(uom_name);
			$('#popup_product_item_uom_id').val(uom_id);
 			$('#popup_product_item_pop').val(product_name);
			$('#popup_item_priceperunit').val(product_selling);
 			
 		}
	});
	return false;
	
}

	

function onkeyupfortotal()
{
	var product_itemqty = $("#popup_product_itemqty").val();
	var	item_priceperunit = $("#popup_item_priceperunit").val();
	if(product_itemqty != "" && item_priceperunit != "")
	{
		var totalRate = parseInt(product_itemqty) * parseInt(item_priceperunit);
		$("#popup_product_itemrate").val(totalRate);
	}
		 
} 	
	
</script>


</script>
<div class="p-popup">

<form class="item_popup_blank" id="frmCadastre">
	 <a class="close"><img src="<?php echo base_url(); ?>/resources/images/close-button.png" width="25" /></a>
	  <div class="title_head"><p>Form Title</p>
			<ul>
				<!--<li><a class="btn-danger" href="#">Remove</a></li>-->
				<li><a class="insert close" id="btnSave" href="#">Insert</a></li>
				<!--<li><a class="btn-success" href="#">Done</a></li>-->
			</ul>
	  </div>
	<table id="insert_items" class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">Items Included</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    Item Code<span class="redColor">*</span>
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                    	<div class="formError" id="product_itemError" style="margin-top: -30px;">
                                            <div class="formErrorContent" id="product_itemError_content">Select field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
									     <select name="popup_product_item_cod" class="chzn-select" id="popup_product_item_cod" onchange="getitemname()" >
                                            <option value="">Select item</option>
											<?php foreach($product_list as $PROLST) { ?>
                                    		<option value="<?php echo $PROLST['product_id']; ?>$<?php echo $PROLST['product_code']; ?>"><?php echo $PROLST['product_code']; ?>
                                            </option>
                                			<?php } ?>
											
                                            </select>
                                    </span>
                                 </div>
                             </td>
							 <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    Item Name<span class="redColor">*</span>
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                    	<div class="formError"  style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
										  <input type="text" value="" id="popup_product_item_pop" name="popup_product_item_pop" class="input-large">
                                      
                                    </span>
                                 </div>
                             </td>
                            
                        </tr>
                        
                        <tr>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">UOM<span class="redColor">*</span></label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                    	<div class="formError" id="" style="margin-top: -30px;">
                                            <div class="formErrorContent" id="product_itemusageunit_content">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
										 	  <input type="text" value="" id="popup_product_item_uom" name="popup_product_item_uom" class="input-large"> 
											  <input type="hidden" value="" id="popup_product_item_uom_id" name="popup_product_item_uom" class="input-large">
                                    
                                    </span>
                                </div>
                            </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    Quantity<span class="redColor">*</span>
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                    	<div class="formError" id="product_itemqtyError" style="margin-top: -30px;">
                                            <div class="formErrorContent" id="product_itemqty_content">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input type="text" value="" name="popup_product_itemqty" onkeyup="return onkeyupfortotal()" class="input-large" id="popup_product_itemqty">
                                    </span>
                                 </div>
                             </td>
                            
                        </tr>
                        <tr>
						<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                	Price/Unit<span class="redColor">*</span>
                                </label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                    	<div class="formError" id="item_priceperunitError" style="margin-top: -30px;">
                                            <div class="formErrorContent" id="item_priceperunit_content">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input type="text" 	value="" name="popup_item_priceperunit" pattern="[0-9.]*" class="input-large" onkeyup="return onkeyupfortotal()"  id="popup_item_priceperunit">
                                    </span>
                                </div>
                            </td>
						<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                	Rate<span class="redColor">*</span>
                                </label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                    	<div class="formError" id="product_itemrateError" style="margin-top: -30px;">
                                            <div class="formErrorContent" id="product_itemrate_content">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input type="text" name="popup_product_itemrate" class="input-large" id="popup_product_itemrate">
                                    </span>
                                </div>
                            </td>
                        </tr>
						
                        
                    </tbody>
                    
                </table>
    </form>           
                
</div>