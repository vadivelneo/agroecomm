<script type="text/javascript"> 
$(document).ready(function () {
	
	document.getElementById("frmCadastre").reset();
	
	$('#btnSave').click(function ()
	{
		var	search_product_type = $("#search_product_type").val();
		var	popup_item_id = $("#popup_item_id").val();
		var	popup_item_code = $("#popup_item_code").val();
		var	popup_item_name = $("#popup_item_name").val();
		var	popup_item_mfg_prtno = $("#popup_item_mfg_prtno").val();
		var	popup_item_uom_name  = $("#popup_item_uom_name").val();
		var	popup_item_uom_id  = $("#popup_item_uom_id").val();
		var	popup_item_qty = $("#popup_item_qty").val();
		var	popup_item_model = $("#popup_item_model").val();
		
		if($("#popup_item_tax_percent").val() != "")
		{
			var	tax_percent = $("#popup_item_tax_percent").val();
		}
		else
		{
			var	tax_percent = 0.00;
		}
		
		if($("#popup_item_discount").val() != "")
		{
			var	popup_item_discount_percent = $("#popup_item_discount").val();
		}
		else
		{
			var	popup_item_discount_percent = 0.00;
		}
		
		var popup_item_priceperunit = $("#popup_item_priceperunit").val();
		
		var	popup_gross_amount = (parseFloat(popup_item_qty)) * (parseFloat(popup_item_priceperunit));
		
		if(search_product_type == "") 
		{
			$('#search_product_type').focus();
			$('#search_product_typeError').show();
			return false;
		}
		else
		{
			$('#search_product_typeError').hide();
		}
		if(popup_item_code == "") 
		{
			$('#popup_item_code').focus();
			$('#popup_item_idError').show();
			return false;
		}
		else
		{
			$('#popup_item_idError').hide();
		}
		
		if(popup_item_uom_name == "") 
		{
			$('#popup_item_uom_name').focus();
			$('#product_itemusageunitError').show();
			return false;
		}
		else
		{
			$('#product_itemusageunitError').hide();
		}
		
		if(popup_item_priceperunit == "") 
		{
			$('#popup_item_priceperunit').focus();
			$('#product_item_priceperunit_Error').show();
			return false;
		}
		else
		{
			$('#product_item_priceperunit_Error').hide();
		}
		
	 	if(popup_item_qty == "") 
		{
			$('#popup_item_qty').focus();
			$('#item_qtyError').show();
			return false;
		}
		else
		{
			$('#item_qtyError').hide();
		}
		
		if(popup_gross_amount == "") 
		{
			$('#popup_item_rate').focus();
			$('#itemrate_Error').show();
			return false;
		}
		else
		{
			$('#itemrate_Error').hide();
		} 
			
		var	table_count = $("#last_table_id").val();
			
		var	counter = parseInt(table_count)+1;

	
		var myarray = [];
	
		$('input[name^="item_id"]').each(function()
		{
			var old_item_id = $(this).val();
			myarray.push(old_item_id);
			
		});
		
		
		
		if(jQuery.inArray(popup_item_id, myarray)==-1)
		{
			var item_tax_percent = (parseFloat(tax_percent)).toFixed(2);
			
			var item_discount_amount = (popup_gross_amount * (isNaN(popup_item_discount_percent) ? 0 : popup_item_discount_percent) / 100).toFixed(2);;
			
			var item_gross_amount_with_discount = parseFloat(popup_gross_amount)- parseFloat(item_discount_amount);
			
			var item_tax_amount = (item_gross_amount_with_discount * (isNaN(item_tax_percent) ? 0 : item_tax_percent) / 100).toFixed(2);
		
			var item_net_amount = ( (item_gross_amount_with_discount) + parseFloat(item_tax_amount)).toFixed(2);
			
			var items ='<tr><td><a href="javascript:void(0);" id="item_code_value_'+counter+'">'+popup_item_code+'</a><input id="item_code_'+counter+'" name="item_code['+counter+']" value="'+popup_item_code+'" type="hidden" /><input id="item_id_'+counter+'" name="item_id['+counter+']" value="'+popup_item_id+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_mfg_prtno_value_'+counter+'">'+popup_item_mfg_prtno+'</a><input id="item_mfg_prtno_'+counter+'" name="item_mfg_prtno['+counter+']" value="'+popup_item_mfg_prtno+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_name_value_'+counter+'">'+popup_item_name+'</a><input id="item_name_'+counter+'" name="item_name['+counter+']" value="'+popup_item_name+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_uom_name_value_'+counter+'">'+popup_item_uom_name+'</a><input id="item_uom_id_'+counter+'" name="item_uom_id['+counter+']" type="hidden" value="'+popup_item_uom_id+'" /><input id="item_uom_name_'+counter+'" name="item_uom_name['+counter+']" type="hidden" value="'+popup_item_uom_name+'" /></td><td><input id="item_priceperunit_'+counter+'" name="item_priceperunit['+counter+']" value="'+popup_item_priceperunit+'" type="text" class="quantity" onkeyup="return purchase_items_grid_total(event, '+counter+')" /></td><td><input id="item_qty_'+counter+'" name="item_qty['+counter+']" value="'+popup_item_qty+'" type="text" class="quantity stock_text" onkeyup="return purchase_items_grid_total(event, '+counter+')" /></td><td><input id="item_gross_amount_'+counter+'" name="item_gross_amount['+counter+']" value="'+popup_gross_amount+'" type="text" class="quantity stock_text" readonly="readonly" /></td><td><input id="item_discount_percent_'+counter+'" name="item_discount_percent['+counter+']" value="'+popup_item_discount_percent+'" type="text" class="quantity stock_text" onkeyup="return purchase_items_grid_total(event, '+counter+')" /></td><td><input id="item_discount_amount_'+counter+'" name="item_discount_amount['+counter+']" value="'+item_discount_amount+'" type="text" class="quantity stock_text" readonly="readonly" /></td><td><input id="item_tax_percent_'+counter+'" name="item_tax_percent['+counter+']" value="'+item_tax_percent+'" type="text" class="quantity stock_text" onkeyup="return purchase_items_grid_total(event, '+counter+')" /></td><td><input id="item_tax_amount_'+counter+'" name="item_tax_amount['+counter+']" value="'+item_tax_amount+'" type="text" class="quantity stock_text" readonly="readonly" /></td><td><input id="item_net_amount_'+counter+'" name="item_net_amount['+counter+']" value="'+item_net_amount+'" type="text" class="quantity" readonly="readonly" /></td><td colspan="2"><div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_delete_'+counter+'" onclick="return purchase_itemsgridrowdelete('+counter+');" data-item="'+popup_item_id+'" data-delete="'+counter+'" title="Delete"><span class="icon-trash"></span></div></td></tr>';
							 
			$('#disp_items').append(items);
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
					
					if(serach_id == popup_item_id)
					{
						var search_name = $(this).attr("name");
						
						var search_val = search_name.split("[")[1].split("]")[0];
						
						var search_qty_val = $('[name="item_qty['+search_val+']"]').val();
						var search_prc_val = $('[name="item_priceperunit['+search_val+']"]').val();
						
						var current_qty = popup_item_qty;
						var current_price = popup_item_priceperunit;
						
						var update_qty = parseInt(search_qty_val) + parseInt(popup_item_qty);
						var update_rate = parseInt(update_qty) * parseInt(popup_item_priceperunit);
						
						$('[name="item_priceperunit['+search_val+']"]').val(current_price);
						$("#item_priceperunit_value_"+search_val).text(current_price);
						
						$('[name="item_qty['+search_val+']"]').val(update_qty);
						$("#item_qty_value_"+search_val).text(update_qty);
						
						$('[name="item_gross_amount['+search_val+']"]').val(update_rate);
						$("#item_gross_amount_value_"+search_val).text(update_rate);
						
						var item_tax_percent = (parseFloat(tax_percent)).toFixed(2);
						var item_discount_amount = (update_rate * (isNaN(popup_item_discount_percent) ? 0 : popup_item_discount_percent) / 100).toFixed(2);;
		
						var item_tax_amount = (update_rate * (isNaN(item_tax_percent) ? 0 : item_tax_percent) / 100).toFixed(2);
		
						var item_net_amount = (parseFloat(update_rate)+parseFloat(item_tax_amount)-parseFloat(item_discount_amount)).toFixed(2);
						
						$('[name="item_tax_percent['+search_val+']"]').val(item_tax_percent);
						$("#item_tax_percent_value_"+search_val).text(item_tax_percent);
						
						$('[name="item_tax_amount['+search_val+']"]').val(item_tax_amount);
						$("#item_tax_amount_value_"+search_val).text(item_tax_amount);
						
						$('[name="item_discount_percent['+search_val+']"]').val(popup_item_discount_percent);
						$("#item_discount_percent_value_"+search_val).text(popup_item_discount_percent);
						
						$('[name="item_discount_amount['+search_val+']"]').val(item_discount_amount);
						$("#item_discount_amount_value_"+search_val).text(item_discount_amount);
						
						$('[name="item_net_amount['+search_val+']"]').val(item_net_amount);
						$("#item_net_amount_value_"+search_val).text(item_net_amount);
						
					}
				});
			}
			else
			{
				document.getElementById("multiple_item_form").reset();
				$('#btnmultipleSave').addClass("close");
			}
		}
		
		purchase_calculatetotal();
	 
	});
	
	
});


function purchase_getitemname()
{
 	var popup_item_id = $('select#popup_item_id').val();

 	$.ajax({
 		type: 'POST',
 		url: '<?php echo site_url('purchasepopup/purchase_getitemdetails'); ?>',
		data: {product_item_id:popup_item_id},
 		success: function(resp) 
		{
			var myData = JSON.parse(resp);
			
			var uom_name = myData.uom_name;
			var uom_id = myData.uom_id;
			var product_name = myData.product_name;
			var product_code = myData.product_code;
			var product_model_number = myData.product_model_number;
			var product_mfr_part_number = myData.product_mfr_part_number;
			
			$("#popup_item_code").val(product_code);
		 	$('#popup_item_name').val(product_name);
			$('#popup_item_uom_id').val(uom_id); 
 			$('#popup_item_uom_name').val(uom_name);
			$("#popup_item_model").val(product_model_number);
			$("#popup_item_mfg_prtno").val(product_mfr_part_number);
			 
 		}
	});
	return false;
	
}


function onchangegetitemspopup()
 {	
	var search_product_type = $('select#search_product_type').val();
	var search_product_group = $('select#search_product_group').val();
	
	 	$.ajax({
 		type: 'POST',
 		url: '<?php echo site_url('purchaseorder/onchangegetitemspopup'); ?>',
 		data: {product_type: search_product_type, product_group: search_product_group},
 		success: function(resp)
		{ 
			$('#popup_item_id').html(resp);
			//$('#popup_item_mfg_prtno').html(resp);
			$('#insert_items').find('input:text').val(''); 
 		}
		
	 });
}


</script>

 

<div class="p-popup">

<form class="item_popup_blank" id="frmCadastre">
	 <a class="close"><img src="<?php echo base_url(); ?>/resources/images/close-button.png" width="25" /></a>
	  <div class="title_head">
      	<p>Single Item</p>
        
			<ul style="top: 8px !important;">
				<!--<li><a class="btn-danger" href="#">Remove</a></li>-->
				<li><a class="insert close" id="btnSave" href="#">Insert</a></li>
				<!--<li><a class="btn-success" href="#">Done</a></li>-->
			</ul>
	  </div>
      <span class="singleitem_popup_error nums_error" id="singleitem_popup_error">Please Enter Numeric only</span>
      
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
                        Product Type
                    </label>
                </td>
                <td class="fieldValue medium">
                    <div class="row-fluid">
                        <span class="span10">
                         <div class="formError" id="search_product_typeError" style="margin-top: -30px;">
                                <div class="formErrorContent" id="product_popup_item_id_content">This field is required</div>
                                <div class="formErrorArrow"></div>
                             </div>
                           <select	name="search_product_type" class="chzn-select" id="search_product_type" onchange="onchangegetitemspopup()">
                                <?php if(isset($product_type) && !empty($product_type)) { foreach($product_type as $TYPE) { ?>
                                <option value="<?php echo $TYPE['products_type_id']; ?>"><?php echo $TYPE['products_type_name']; ?></option>
                                <?php } } ?>
                            </select>
                        </span>
                     </div>
                 </td>
                 
                 <td class="fieldLabel medium">
                    <label class="muted pull-right marginRight10px">
                        Product Group
                    </label>
                </td>
                <td class="fieldValue medium">
                    <div class="row-fluid">
                        <span class="span10">
                             <select name="search_product_group" class="chzn-select" id="search_product_group" onchange="onchangegetitemspopup()">
                                <option value="">Select Product Group</option>
                                <?php if(isset($product_group) && !empty($product_group)) { foreach($product_group as $GROUP) { ?>
                                <option value="<?php echo $GROUP['products_group_id']; ?>"><?php echo $GROUP['products_group_name']; ?></option>
                                <?php } } ?>
                            </select>
                        </span>
                     </div>
                 </td>
                 
            </tr>
            
            <tr>
                <td class="fieldLabel medium">
                    <label class="muted pull-right marginRight10px">
                        Item Code
                    </label>
                </td>
                <td class="fieldValue medium">
                    <div class="row-fluid">
                        <span class="span10">
                            <div class="formError" id="popup_item_idError" style="margin-top: -30px;">
                                <div class="formErrorContent" id="product_popup_item_id_content">This field is required</div>
                                <div class="formErrorArrow"></div>
                             </div>
                           <select name="popup_item_id" class="chzn-select" id="popup_item_id" onchange="purchase_getitemname()" >
                                <option value="">Select item</option>
                                <?php foreach($product_list as $PROLST) { ?>
                                <option value="<?php echo $PROLST['product_id']; ?>">
                                    <?php echo $PROLST['product_code']; ?>
                                </option>
                                <?php } ?>
                            </select>
                        </span>
                     </div>
                 </td>
                 
                 <td class="fieldLabel medium">
                    <label class="muted pull-right marginRight10px">
                        Item Name
                    </label>
                </td>
                <td class="fieldValue medium">
                    <div class="row-fluid">
                        <span class="span10">
                            <div class="formError" id="product_itemError" style="margin-top: -30px;">
                                <div class="formErrorContent" id="product_itemError_content">This field is required</div>
                                <div class="formErrorArrow"></div>
                             </div>
                            <input type="text" value="" name="popup_item_name" class="input-large" id="popup_item_name" readonly="readonly">
							  <input type="hidden" value="" name="popup_item_code" id="popup_item_code">
                        </span>
                     </div>
                 </td>
                 
            </tr>
            
            <tr>
				<td class="fieldLabel medium">
                    <label class="muted pull-right marginRight10px">
                        SKU
                    </label>
                </td>
                <td class="fieldValue medium">
                    <div class="row-fluid">
                        <span class="span10">
                            <div class="formError" id="popup_item_mfg_prtnoError" style="margin-top: -30px;">
                                <div class="formErrorContent" id="popup_item_mfg_prtno_content">This field is required</div>
                                <div class="formErrorArrow"></div>
                             </div>
                             <!--<select name="popup_item_mfg_prtno" class="chzn-select" id="popup_item_mfg_prtno" onchange="purchase_getitemname()" >
                                <option value="">Select Mfr.Part No</option>
                                <?php foreach($product_list as $PROLST) { ?>
                                <option value="<?php echo $PROLST['product_id']; ?>">
                                    <?php echo $PROLST['product_mfr_part_number']; ?>
                                </option>
                                <?php } ?>
                            </select>-->
                            <input type="text" value="" id="popup_item_mfg_prtno" name="popup_item_mfg_prtno" class="input-large" readonly="readonly">
                        </span>
                     </div>
                </td>
				<td class="fieldLabel medium">
                    <label class="muted pull-right marginRight10px">
                        Model
                    </label>
                </td>
                <td class="fieldValue medium">
                    <div class="row-fluid">
                        <span class="span10">
                            <div class="formError" id="modelError" style="margin-top: -30px;">
                                <div class="formErrorContent" id="product_itemmodel_content">This field is required</div>
                                <div class="formErrorArrow"></div>
                             </div>
                            <input type="text" value="" id="popup_item_model" name="popup_item_model" class="input-large" readonly="readonly">
                        </span>
                     </div>
                </td>
            	
                
          </tr>
          <tr>
				<td class="fieldLabel medium">
                    <label class="muted pull-right marginRight10px">UOM</label>
                </td>
                <td class="fieldValue medium" >
                    <div class="row-fluid">
                        <span class="span10">
                            <div class="formError" id="product_itemusageunitError" style="margin-top: -30px;">
                                <div class="formErrorContent" id="product_itemusageunit_content">This field is required</div>
                                <div class="formErrorArrow"></div>
                             </div>
							  <input type="text" value="" id="popup_item_uom_name" name="popup_item_uom_name" class="input-large" readonly="readonly"> 
							  <input type="hidden" value="" id="popup_item_uom_id" name="popup_item_uom_id">
                        </span>
                    </div>
                </td>
				<td class="fieldLabel medium">
                  <label class="muted pull-right marginRight10px">
                      Price/Unit
                  </label>
				</td>
				<td class="fieldValue medium" >
                  <div class="row-fluid">
                      <span class="span10">
                          <div class="formError" id="product_item_priceperunit_Error" style="margin-top: -30px;">
                              <div class="formErrorContent" id="product_item_priceperunit_content">This field is required</div>
                              <div class="formErrorArrow"></div>
                           </div>
                          <input type="text" value="" name="popup_item_priceperunit" onkeyup="return purchase_popup_onkeyupfortotal(event)" class="input-large numeric" id="popup_item_priceperunit">
                      </span>
                  </div>
				</td>
          </tr>
			<tr>
            	
                <td class="fieldLabel medium">
                    <label class="muted pull-right marginRight10px">
                        Quantity
                    </label>
                </td>
                <td class="fieldValue medium">
                    <div class="row-fluid">
                        <span class="span10">
                            <div class="formError" id="item_qtyError" style="margin-top: -30px;">
                                <div class="formErrorContent" id="product_itemqty_content">This field is required</div>
                                <div class="formErrorArrow"></div>
                             </div>
                            <input type="text" value="" name="popup_item_qty" onkeyup="return purchase_popup_onkeyupfortotal(event)" class="input-large numeric" id="popup_item_qty">
                        </span>
                     </div>
                 </td>
                 
				<td class="fieldLabel medium">
                    <label class="muted pull-right marginRight10px">
                        Discount(%)
                    </label>
                </td>
                <td class="fieldValue medium">
                    <div class="row-fluid">
                        <span class="span10">
                            <div class="formError" id="item_discountError" style="margin-top: -30px;">
                                <div class="formErrorContent" id="item_discountontent">This field is required</div>
                                <div class="formErrorArrow"></div>
                             </div>
                            <input type="text" value="" id="popup_item_discount" onkeyup="return purchase_popup_onkeyupfortotal(event)" name="popup_item_discount" class="input-large numeric">
                        </span>
                     </div>
                </td>
			</tr>
			<tr>
              <td class="fieldLabel medium">
                  <label class="muted pull-right marginRight10px">
                     Tax(%)
                  </label>
              </td>
              <td class="fieldValue medium" >
                  <div class="row-fluid">
                      <span class="span10">
                          <div class="formError" id="product_item_vat_Error" style="margin-top: -30px;">
                              <div class="formErrorContent" id="product_item_vat_content">This field is required</div>
                              <div class="formErrorArrow"></div>
                           </div>
                          <input type="text" value="" onkeyup="return purchase_popup_onkeyupfortotal(event)" name="popup_item_tax_percent"  class="input-large numeric" id="popup_item_tax_percent">
                      </span>
                  </div>
				</td>
			
				<td class="fieldLabel medium">
                    <label class="muted pull-right marginRight10px">
                        Net Amount
                    </label>
                </td>
                <td class="fieldValue medium" >
                    <div class="row-fluid">
                        <span class="span10">
                            <div class="formError" id="itemrate_Error" style="margin-top: -30px;">
                                <div class="formErrorContent" id="product_itemrate_content">This field is required</div>
                                <div class="formErrorArrow"></div>
                             </div>
                            <input type="text" 	value="" readonly="readonly" name="popup_item_rate" class="input-large numeric" id="popup_item_rate">
                        </span>
                    </div>
                </td>
			</tr>
        </tbody>
        
    </table>
    </form>            
                
</div>