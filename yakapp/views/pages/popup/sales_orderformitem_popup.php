<script>
function getsub_group()
 {
 	var product_group = $('select#search_multiple_product_group').val();
	
 	$.ajax({
		
 		type: 'POST', 
 		url: '<?php echo site_url('product/getprosub_group'); ?>',
 		data: {product_group: product_group},
		
 		success: function(resp) {
			//alert(resp);
			$('select#material_sub_group').html(resp);
			search_multiple_product();
 			
		}
 		
	 });
 	
}

</script>
<script type="text/javascript">

function search_multiple_product()
{
	//alert('hhh');
		var checked_id = [];
		$("input[name='item_check[]']:checked").each(function ()
        {
			
			var check_box_val = this.value;
			var multiple_item_id = $("#multiple_item_id_"+check_box_val).val();
			checked_id.push(multiple_item_id);
			
        });
		
		var data_to_send = JSON.stringify(checked_id);
		
		   var item_mfg_prtno = $("#search_multiple_item_mfg_prtno").val();
		   var item_name = $("#search_multiple_item_name").val();
		   var item_code = $("#search_multiple_item_code").val();
 		   var pricebook_id = $("#pricebook_id").val();
           var search_product_type = $("#search_multiple_product_type").val();
		   var search_product_group = $("#search_multiple_product_group").val();
		   var material_sub_group = $("#material_sub_group").val();
		   var search_item_code = $("#search_multiple_item_code").val();
		   var search_item_name = $("#search_multiple_item_name").val();
		   var search_item_mfg_prtno = $("#search_multiple_item_mfg_prtno").val();
		   var customer_discount = $("#customer_discount").val();
		   var tax_value = $("#tax_value").val();
		   var store_id = $("#material_store_id").val();
		   var vat_display_mode = $("#vat_display_mode").val();
		   var cst_display_mode = $("#cst_display_mode").val();
		   var gst_display_mode = $("#gst_display_mode").val();
		   var service_display_mode = $("#service_display_mode").val();
		   var excise_display_mode = $("#excise_display_mode").val();
		   var customer_tax_type = $("#customer_tax_type").val();
		
			if(item_mfg_prtno !='' || item_name !='' || item_code !='' )
			{
			
			$.ajax({
			type: "POST",
			url: "<?php echo site_url('salespopup/get_item_partnumber'); ?>",
			data: {material_sub_group: material_sub_group, pricebook: pricebook_id, product_type: search_product_type, product_group: search_product_group, item_code: search_item_code, item_name: search_item_name, item_mfg_prtno: search_item_mfg_prtno, customer_discount: customer_discount, item_mfg_prtno: item_mfg_prtno, item_name: item_name, item_code: item_code,store_id:store_id},
			success: function(html)
			{
			//alert(html);
			if(html == ''){$('#multiple_items').html('');}
			var json_obj = $.parseJSON(html);//parse JSON
			var itemcount = 1;
			var output="<ul>";
			
			if(tax_value != 'nontaxable')
			{
				for (var i in json_obj) 
				{
				 	output+='<tr>';
			
					output+='<td class="checkbox"><input type="checkbox" class="itemcheckbox" id="checkbox' + itemcount + '" value="' + itemcount + '" name="item_check[]">';
					output+='</td>';
					
					
					output+='<td>';
					output+='<li>' + json_obj[i].product_sku + '</li>';
					output+='<input id="multiple_item_id_' + itemcount + '" name="multiple_item_id[' + itemcount + ']" value="' + json_obj[i].product_id + '" type="hidden" />';
					output+='<input id="multiple_item_product_code_' + itemcount + '" name="multiple_item_product_code[' + itemcount + ']" value="' + json_obj[i].product_code + '" type="hidden" />';
					output+='<input id="multiple_item_code_' + itemcount + '" name="multiple_item_code[' + itemcount + ']" value="' + json_obj[i].product_code + '" type="hidden" />';
					
					output+='<input id="multiple_item_hsn_' + itemcount + '" name="multiple_item_hsn[' + itemcount + ']" value="' + json_obj[i].price_book_price_hsn + '" type="hidden" />';
					output+='<input id="multiple_item_name_' + itemcount + '" name="multiple_item_name[' + itemcount + ']" value="' + json_obj[i].product_name + '" type="hidden" />';
					
					output+='  <input id="inventory_batch_no_' + itemcount + '" class="quantity stock_text" name="multiple_item_inv_qty[' + itemcount + ']" value="' + json_obj[i].inventory_batch_no + '" type="hidden" readonly  />';
					
					output+='  <input id="multiple_item_inv_qty_' + itemcount + '" class="quantity stock_text" name="multiple_item_inv_qty[' + itemcount + ']" value="' + json_obj[i].inventory_qty + '" type="hidden" readonly  />';
					output+='<input id="multiple_item_uom_id_' + itemcount + '" name="multiple_item_uom_id_[' + itemcount + ']" value="' + json_obj[i].uom_id + '" type="hidden" />';
					output+='<input id="multiple_item_uom_name_' + itemcount + '" name="multiple_item_uom_name_[' + itemcount + ']" value="' + json_obj[i].uom_name + '" type="hidden" />';
					output+='<input id="multiple_item_mrp_' + itemcount + '" name="multiple_item_mrp_[' + itemcount + ']" value="' + json_obj[i].price_book_price_mrp + '" type="hidden" />';
					output+='</td>';
					
					output+='<td>';
					output+='  <input id="multiple_item_inv_qty_' + itemcount + '" class="quantity stock_text" name="multiple_item_inv_qty[' + itemcount + ']" value="' + json_obj[i].inventory_qty + '" type="hidden"  />';
					output+='  <input id="multiple_item_inv_id_' + itemcount + '" class="quantity stock_text" name="multiple_item_inv_id_[' + itemcount + ']"  value="' + json_obj[i].inventory_id + '"  type="hidden"  />';
					output+='  <input id="multiple_item_qty_' + itemcount + '" class="quantity stock_text" name="multiple_item_qty[' + itemcount + ']" onkeyup="return salse_multiplepopuptotal(event, ' + itemcount + ')"  type="text" value="0"  type="text"  />';
					
					output+='  <input id="multiple_incentive_rate_' + itemcount + '" class="quantity stock_text" name="multiple_incentive_rate[' + itemcount + ']" value="' + json_obj[i].price_book_price_incentive_rate + '" type="hidden"   />';
					output+='  <input id="multiple_incentive_total_' + itemcount + '" class="quantity stock_text" name="multiple_incentive_total[' + itemcount + ']" value="" type="hidden"   />';
					output+='</td>';
					
					output+='<td>';
					output+='  <input id="multiple_item_priceperunit_' + itemcount + '" class="quantity" name="multiple_item_priceperunit[]" type="text" value="' + json_obj[i].price_book_price_selling_price + '" readonly="readonly" />';
					output+='  <input id="multiple_item_percentage_discount_' + itemcount + '" class="quantity stock_text" name="multiple_item_percentage_discount[' + itemcount + ']" value="' + json_obj[i].price_book_price_discount_percentage + '" readonly="readonly" type="hidden"  />';			
					output+='  <input id="multiple_item_damage_discount_percent_' + itemcount + '" class="quantity stock_text" name="multiple_item_damage_discount_percent_[' + itemcount + ']" value="' + json_obj[i].price_book_damage_discount_percentage + '" type="hidden" />';				
					output+='</td>';
				
					
					if(customer_tax_type == 'gst') {
						
						output+='  <input id="multiple_item_cgst_' + itemcount + '" class="quantity stock_text" name="multiple_item_cgst[' + itemcount + ']" value="' + json_obj[i].price_book_price_gst + '" type="hidden" readonly="readonly"  />';
						output+='  <input id="multiple_item_sgst_' + itemcount + '" class="quantity stock_text" name="multiple_item_sgst[' + itemcount + ']" value="' + json_obj[i].price_book_price_sgst + '" type="hidden" readonly="readonly"  />';
						
						
					 }
					 else
					 {
						
						output+='  <input id="multiple_item_igst_' + itemcount + '" class="quantity stock_text" name="multiple_item_igst[' + itemcount + ']" value="' + json_obj[i].price_book_price_igst + '" type="hidden" readonly="readonly"  />';
						
					 }
					
							
					output+='<td>';
					output+='  <input id="multiple_item_rate_' + itemcount + '" class="quantity" name="multiple_item_rate[' + itemcount + ']" value="" type="text" readonly="readonly"  />';
					output+='</td>';
					output+='</tr>';
					
					
					itemcount++;
				}
			}
			else
			{
				for (var i in json_obj) 
				{
				 	output+='<tr>';
			
					output+='<td class="checkbox"><input type="checkbox" class="itemcheckbox" id="checkbox' + itemcount + '" value="' + itemcount + '" name="item_check[]">';
					output+='</td>';
					
					output+='<td>';
					output+='<li>' + json_obj[i].product_code + '</li>';
					output+='<input id="multiple_item_id_' + itemcount + '" name="multiple_item_id[' + itemcount + ']" value="' + json_obj[i].product_id + '" type="hidden" />';
					output+='<input id="multiple_item_code_' + itemcount + '" name="multiple_item_code[' + itemcount + ']" value="' + json_obj[i].product_code + '" type="hidden" />';
					output+='</td>';
					
					output+='<td>';
					output+='<li>' + json_obj[i].product_mfr_part_number + '</li>';
					output+='<input id="multiple_item_mfg_prtno_' + itemcount + '" name="multiple_item_mfg_prtno[' + itemcount + ']" value="' + json_obj[i].product_mfr_part_number + '" type="hidden" />';
					output+='</td>';
					
					output+='<td>';
					output+='<li>' + json_obj[i].product_name + '</li>';
					output+='<input id="multiple_item_name_' + itemcount + '" name="multiple_item_name[' + itemcount + ']" value="' + json_obj[i].product_name + '" type="hidden" />';
					output+='</td>';
					
					output+='<td>';
					output+='<li>' + json_obj[i].uom_name + '</li>';
					output+='<input id="multiple_item_uom_id_' + itemcount + '" name="multiple_item_uom_id_[' + itemcount + ']" value="' + json_obj[i].uom_id + '" type="hidden" />';
					output+='<input id="multiple_item_uom_name_' + itemcount + '" name="multiple_item_uom_name_[' + itemcount + ']" value="' + json_obj[i].uom_name + '" type="hidden" />';
					output+='</td>';
					
					output+='<td>';
					output+='  <input id="multiple_item_priceperunit_' + itemcount + '" class="quantity" name="multiple_item_priceperunit[]" type="text" value="' + json_obj[i].price_book_price_selling_price + '" readonly="readonly" />';
					output+='</td>';
					
					output+='<td>';
					output+='  <input id="inventory_batch_no_' + itemcount + '" class="quantity stock_text" name="multiple_item_inv_qty[' + itemcount + ']" value="' + json_obj[i].inventory_batch_no + '" type="text" readonly  />';
					output+='</td>';
					
					output+='<td>';
					output+='  <input id="multiple_item_inv_qty_' + itemcount + '" class="quantity stock_text" name="multiple_item_inv_qty[' + itemcount + ']" value="' + json_obj[i].inventory_qty + '" type="text" readonly  />';
					output+='</td>';
					
					
					
					
					output+='<td>';
					output+='  <input id="multiple_item_inv_qty_' + itemcount + '" class="quantity stock_text" name="multiple_item_inv_qty[' + itemcount + ']" value="' + json_obj[i].inventory_qty + '" type="hidden"  />';
					output+='  <input id="multiple_item_inv_id_' + itemcount + '" class="quantity stock_text" name="multiple_item_inv_id_[' + itemcount + ']"  value="' + json_obj[i].inventory_id + '"  type="hidden"  />';
					output+='  <input id="multiple_item_qty_' + itemcount + '" class="quantity stock_text" name="multiple_item_qty[' + itemcount + ']" onkeyup="return salse_multiplepopuptotal(event, ' + itemcount + ')"  type="text" value=""  type="text"  />';
					output+='</td>';
					
					//discount
					output+='<td>';            			  
					output+='  <input id="multiple_item_percentage_discount_' + itemcount + '" class="quantity stock_text" name="multiple_item_percentage_discount[' + itemcount + ']" value="' + customer_discount + '" type="text"  />';			
					output+='</td>';
					
					output+='<td>'; 	
					output+='  <input id="multiple_item_flat_discount_' + itemcount + '" class="quantity stock_text" name="multiple_item_flat_discount_[' + itemcount + ']" value="' + json_obj[i].price_book_price_discount_percentage + '" type="text"  />';				
					output+='</td>';
					
					output+='<td>'; 
					output+='  <input id="multiple_item_discount_amount_' + itemcount + '" class="quantity stock_text" name="multiple_item_discount_amount_[' + itemcount + ']" value="" type="text"  />';
					output+='  <input id="multiple_item_vat_' + itemcount + '" class="quantity stock_text" name="multiple_item_vat[' + itemcount + ']" value="0.00" type="hidden" readonly="readonly"  />';
					output+='  <input id="multiple_item_gst_' + itemcount + '" class="quantity" name="multiple_item_gst[' + itemcount + ']" value="0.00" type="hidden" readonly="readonly"  />';
					output+='  <input id="multiple_item_cst_' + itemcount + '" class="quantity stock_text" name="multiple_item_cst[' + itemcount + ']" value="0.00" type="hidden" readonly="readonly"  />';
					output+='  <input id="multiple_item_ser_tax_' + itemcount + '" class="quantity" name="multiple_item_ser_tax[' + itemcount + ']" value="0.00" type="hidden" readonly="readonly"  />';
					output+='  <input id="multiple_item_exc_' + itemcount + '" class="quantity" name="multiple_item_exc[' + itemcount + ']" value="0.00" type="hidden" readonly="readonly"  />';
					output+='</td>';
					
					output+='<td>';
					output+='  <input id="multiple_item_rate_' + itemcount + '" class="quantity" name="multiple_item_rate[' + itemcount + ']" value="" type="text" readonly="readonly"  />';
					output+='</td>';
					output+='</tr>';
					itemcount++;
				}
			}
			output+='</ul>';
			
			$('#multiple_items').html(output);
		
		}
    });
}return false;    
}
</script>
<script type="text/javascript"> 
$(document).ready(function () {
	
	$(".itemcheckbox").prop("checked", false);
	document.getElementById("multiple_item_form").reset();
	
	$('#btnmultipleSave').click(function ()
	{
		var old_items = [];
		
		$('input[name^="item_id"]').each(function()
		{
			var old_item_id = $(this).val();
			old_items.push(old_item_id);
		});
		
		
		if ($(".itemcheckbox:checked").length < 1)
		{
			$("#multiple_item_error").text('Please Check checkbox');
			return false;
		}
		
		
		var exitMultipleItemsInsert = false;
		var checked_id = [];
		
		
		$("input[name='item_check[]']:checked").each(function ()
        {
			checked_id.push(parseInt($(this).val()));
			var check_box_val = this.value;
			if(this.checked == true)
			{
					var multiple_item_qty = $("#multiple_item_qty_"+check_box_val).val();
					var multiple_item_priceperunit = $("#multiple_item_priceperunit_"+check_box_val).val();
					var multiple_item_rate = $("#multiple_item_rate_"+check_box_val).val();
					
					if(multiple_item_priceperunit == "")
					{
						exitMultipleItemsInsert = check_box_val;
                      	return false;
					}
					else
					{
						$("#multiple_item_error").text('');
						
						var login_company_id = $("#login_company_id").val();
						var tax_value = $("#tax_value").val();
						
						var popup_item_priceperunit = $("#multiple_item_priceperunit_"+check_box_val).val();
						var popup_item_mrp = $("#multiple_item_mrp_"+check_box_val).val();
						
						var	popup_item_id = $("#multiple_item_id_"+check_box_val).val();
						var	popup_item_code = $("#multiple_item_code_"+check_box_val).val();
						
						var	popup_item_product_code= $("#multiple_item_product_code_"+check_box_val).val();
						var	popup_item_division_id = $("#multiple_item_division_id_"+check_box_val).val();
						var	popup_item_division_name = $("#multiple_item_division_name_"+check_box_val).val();
						var	popup_item_store_id = $("#multiple_item_store_id_"+check_box_val).val();
						var	popup_item_store_name = $("#multiple_item_store_name_"+check_box_val).val();
						var	popup_item_batch_no = $("#inventory_batch_no_"+check_box_val).val();
						var	popup_item_inv_qty = $("#multiple_item_inv_qty_"+check_box_val).val();
						var	popup_item_inv_id = $("#multiple_item_inv_id_"+check_box_val).val();
						
						var	popup_item_name = $("#multiple_item_name_"+check_box_val).val();
						var	popup_item_uom_name  = $("#multiple_item_uom_name_"+check_box_val).val();
						var	popup_item_uom_id  = $("#multiple_item_uom_id_"+check_box_val).val();
						var	popup_item_qty = $("#multiple_item_qty_"+check_box_val).val();
						var	popup_item_incentive_rate = $("#multiple_incentive_rate_"+check_box_val).val();
						var	popup_item_incentive_total = $("#multiple_incentive_total_"+check_box_val).val();
						var	popup_item_mfg_prtno = $("#multiple_item_mfg_prtno_"+check_box_val).val();
						var	popup_item_damage_discount_percent = $("#multiple_item_damage_discount_percent_"+check_box_val).val();
						var	popup_item_damage_discount_amount = $("#multiple_item_damage_discount_amount_"+check_box_val).val()?$("#multiple_item_damage_discount_amount_"+check_box_val).val():0;
						
						var	popup_gross_amount = (parseFloat(popup_item_qty)) * (parseFloat(popup_item_priceperunit));
												
						if($("#multiple_item_vat_"+check_box_val).val() != "")
						{
							var	popup_item_vat = $("#multiple_item_vat_"+check_box_val).val();
						}
						else
						{
							var	popup_item_vat = 0.00;
						}
						
						if($("#multiple_item_ser_tax_"+check_box_val).val() != "")
						{
							var	popup_item_serv_tax = $("#multiple_item_ser_tax_"+check_box_val).val();
						}
						else
						{
							var	popup_item_serv_tax = 0.00;
						}
						
						if($("#multiple_item_cst_"+check_box_val).val() != "")
						{
							var	popup_item_cst = $("#multiple_item_cst_"+check_box_val).val();
						}
						else
						{
							var	popup_item_cst = 0.00;
						}
						
						
						
						
						if($("#multiple_item_hsn_"+check_box_val).val() != "")
						{
							var	popup_item_hsn = $("#multiple_item_hsn_"+check_box_val).val();
						}
						else
						{
							var	popup_item_hsn = 0.00;
						}
						if($("#multiple_item_exc_"+check_box_val).val() != "")
						{
							var	popup_item_exc = $("#multiple_item_exc_"+check_box_val).val();
						}
						else
						{
							var	popup_item_exc = 0.00;
						}
						
						var	popup_item_percentage_discount = $("#popup_item_percentage_discount").val();
						var	popup_item_flat_discount = $("#popup_item_flat_discount").val();
						var	discount_type = $("#customer_discount_type").val();
		
						var	customer_tax_type = $("#customer_tax_type").val();
						var	popup_item_discount_amount = $("#popup_item_discount_amount").val();
		
						if($("#multiple_item_percentage_discount_"+check_box_val).val() != "")
						{
							var	popup_item_percentage_discount = $("#multiple_item_percentage_discount_"+check_box_val).val();
						}
						else
						{
							var	popup_item_percentage_discount = 0.00;
						}
						
						if($("#multiple_item_flat_discount_"+check_box_val).val() != "")
						{
							var	popup_item_flat_discount = $("#multiple_item_flat_discount_"+check_box_val).val();
						}
						else
						{
							var	popup_item_flat_discount = 0.00;
						}
						
						
						var popup_item_discount_percent = popup_item_percentage_discount;
						
						if($("#multiple_item_discount_amount_"+check_box_val).val() != "")
						{
							var	popup_item_discount_amount = $("#multiple_item_discount_amount_"+check_box_val).val()?$("#multiple_item_discount_amount_"+check_box_val).val():0;
						}
						else
						{
							var	popup_item_discount_amount = 0.00;
						}
						
						if($("#multiple_item_cgst_"+check_box_val).val() != "")
						{
							var	popup_item_gst = $("#multiple_item_cgst_"+check_box_val).val()?$("#multiple_item_cgst_"+check_box_val).val():0;
						}
						else
						{
							var	popup_item_gst = 0.00;
						}
						
						
						if($("#multiple_item_sgst_"+check_box_val).val() != "")
						{
							var	popup_item_sgst = $("#multiple_item_sgst_"+check_box_val).val()?$("#multiple_item_sgst_"+check_box_val).val():0;
						}
						else
						{
							var	popup_item_sgst = 0.00;
						}
						
						if($("#multiple_item_igst_"+check_box_val).val() != "")
						{
							var	popup_item_igst = $("#multiple_item_igst_"+check_box_val).val()?$("#multiple_item_igst_"+check_box_val).val():0;
						}
						else
						{
							var	popup_item_igst = 0.00;
						}
						
						
						var	table_count = $("#last_table_id").val();
						var	counter = parseInt(table_count)+ 1;
						
						if(jQuery.inArray(popup_item_id,old_items)==-1)	
						{
							
							if(customer_tax_type == 'vat')
							{
								var item_tax_percent = (parseFloat(popup_item_vat)).toFixed(2);
							}
							else if(customer_tax_type == 'cst')
							{
								var item_tax_percent = (parseFloat(popup_item_cst)).toFixed(2);
							}
							else if(customer_tax_type == 'gst')
							{
								
								var item_cgst = (parseFloat(popup_item_gst)).toFixed(2);
								var item_sgst = (parseFloat(popup_item_sgst)).toFixed(2);
								var item_tax_percent = parseFloat(popup_item_gst) + parseFloat(popup_item_sgst);
							}
							else if(customer_tax_type == 'igst')
							{
								
								var item_igst = (parseFloat(popup_item_igst)).toFixed(2);
								var item_tax_percent = parseFloat(popup_item_igst);
							}
							
							
							
							//alert(popup_item_discount_amount);
							
							var item_discount_amount = parseFloat(popup_item_discount_amount) + parseFloat(popup_item_flat_discount);
							
							var item_gross_amount_with_discount = parseFloat(popup_gross_amount)- parseFloat(item_discount_amount);
							
							var item_cgst_amount = (item_gross_amount_with_discount * (isNaN(item_cgst) ? 0 : item_cgst) / 100).toFixed(2);
							var item_sgst_amount = (item_gross_amount_with_discount * (isNaN(item_sgst) ? 0 : item_sgst) / 100).toFixed(2);
							
							
							
							var item_tax_amount = (item_gross_amount_with_discount * (isNaN(item_tax_percent) ? 0 : item_tax_percent) / 100).toFixed(2);
						
							var item_net_amount = ( (item_gross_amount_with_discount) + parseFloat(item_tax_amount)).toFixed(2);
							
							if(tax_value != 'nontaxable')
							{
							  var items ='<tr><td><a href="javascript:void(0);" >'+counter+'</a><input id="multiple_item_product_code_'+counter+'" name="multiple_item_product_code['+counter+']" value="'+popup_item_product_code+'" type="hidden" /><input id="item_mfg_prtno_'+counter+'" name="item_mfg_prtno['+counter+']" value="'+popup_item_mfg_prtno+'" type="hidden" /><input id="item_code_'+counter+'" name="item_code['+counter+']" value="'+popup_item_code+'" type="hidden" /><input id="item_id_'+counter+'" name="item_id['+counter+']" value="'+popup_item_id+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_name_value_'+counter+'">'+popup_item_name+'</a><input id="item_name_'+counter+'" name="item_name['+counter+']" value="'+popup_item_name+'" type="hidden" /></td><td><input id="item_qty_'+counter+'"  class="quantity stock_text" name="item_qty['+counter+']" value="'+popup_item_qty+'" type="text"  onkeyup="return sales_items_grid_total(event, '+counter+')" /><input id="free_qty_name'+counter+'" class="quantity " name="free_qty_name['+counter+']" value="-" type="hidden"  /><input id="item_qty_free_'+counter+'" class="quantity stock_text" name="item_qty_free['+counter+']" value="'+popup_item_incentive_rate+'" type="hidden" readonly="readonly" /><input id="item_incentive_rate_'+counter+'"  class="quantity stock_text" name="item_incentive_rate['+counter+']" value="'+popup_item_incentive_rate+'" type="hidden"  onkeyup="return sales_items_grid_total(event, '+counter+')" /><input id="item_incentive_total_'+counter+'"  class="quantity stock_text" name="item_incentive_total['+counter+']" value="'+popup_item_incentive_total+'" type="hidden"  onkeyup="return sales_items_grid_total(event, '+counter+')" /><input id="item_uom_id_'+counter+'" name="item_uom_id['+counter+']" type="hidden" value="'+popup_item_uom_id+'" /><input id="item_uom_name_'+counter+'" name="item_uom_name['+counter+']" type="hidden" value="'+popup_item_uom_name+'" /><input id="item_mrp_'+counter+'" name="item_mrp['+counter+']"  type="hidden" class="quantity " value="'+popup_item_mrp+'" /></td><td><input id="item_priceperunit_'+counter+'" name="item_priceperunit['+counter+']" value="'+popup_item_priceperunit+'" type="text" class="quantity" onkeyup="return sales_items_grid_total(event, '+counter+')" /><input id="item_batch_no_'+counter+'" name="item_batch_no['+counter+']" value="'+popup_item_batch_no+'" type="hidden" class="quantity stock_text" readonly="readonly" /><input id="item_inv_qty_'+counter+'" name="item_inv_qty['+counter+']" value="'+popup_item_inv_qty+'" type="hidden" class="quantity stock_text" readonly="readonly" /><input id="item_inv_id_'+counter+'" name="item_inv_id['+counter+']" value="'+popup_item_inv_id+'" type="hidden" class="quantity stock_text" readonly="readonly" /><input id="item_gross_amount_'+counter+'" name="item_gross_amount['+counter+']" value="'+popup_gross_amount+'" type="hidden" class="quantity stock_text" readonly="readonly" /><input id="item_discount_percent_'+counter+'" name="item_discount_percent['+counter+']" value="'+popup_item_discount_percent+'" type="hidden" class="quantity stock_text"  /><input id="item_discount_amount_'+counter+'" name="item_discount_amount['+counter+']" value="'+popup_item_discount_amount+'" type="hidden" class="quantity stock_text" readonly="readonly" /><input id="item_damage_discount_percentage_'+counter+'" name="item_damage_discount_percentage['+counter+']" value="'+popup_item_damage_discount_percent+'" type="hidden" class="quantity stock_text" readonly="readonly" /><input id="item_damage_discount_amount_'+counter+'" name="item_damage_discount_amount['+counter+']" value="'+popup_item_damage_discount_amount+'" type="hidden" class="quantity stock_text" readonly="readonly" /></td><td><input id="item_gross_amount_with_disc_'+counter+'" name="item_gross_amount_with_disc['+counter+']" value="" type="text" class="quantity stock_text" readonly="readonly" /><input id="item_net_amount_'+counter+'" name="item_net_amount['+counter+']" value="'+item_net_amount+'" type="hidden" class="quantity" readonly="readonly" /><input id="item_tax_percent_'+counter+'" name="item_tax_percent['+counter+']" value="'+item_tax_percent+'" type="hidden" class="quantity stock_text" readonly="readonly" /><input id="item_cgst_'+counter+'" name="item_cgst['+counter+']" value="'+popup_item_gst+'" type="hidden"  class="quantity stock_text" readonly="readonly" /><input id="item_tax_amount_'+counter+'" name="item_tax_amount['+counter+']" value="0" type="hidden" class="quantity stock_text" readonly="readonly" /><input id="item_cgst_amount_'+counter+'" name="item_cgst_amount['+counter+']" value="0" type="hidden" class="quantity stock_text" readonly="readonly" /><input id="item_sgst_'+counter+'" name="item_sgst['+counter+']" value="'+popup_item_sgst+'" type="hidden" readonly="readonly" class="quantity stock_text"  /><input id="item_sgst_amount_'+counter+'" name="item_sgst_amount['+counter+']" value="0" type="hidden" class="quantity stock_text" readonly="readonly" /><input id="item_igst_'+counter+'" name="item_igst['+counter+']" value="'+popup_item_igst+'" type="hidden" readonly="readonly" class="quantity stock_text"  /><input id="item_igst_amount_'+counter+'" name="item_igst_amount['+counter+']" value="0" type="hidden" class="quantity stock_text" readonly="readonly" /></td><td colspan="2"><div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_delete_'+counter+'" onclick="return orderformrowdelete('+counter+');" data-item="'+popup_item_id+'" data-delete="'+counter+'" title="Delete"><span class="icon-trash"></span></div></td></tr>';
							}
							else
							{
								var items ='<tr><td><a href="javascript:void(0);" >'+counter+'</a></td><td><a href="javascript:void(0);">'+popup_item_product_code+'</a><input id="multiple_item_product_code_'+counter+'" name="multiple_item_product_code['+counter+']" value="'+popup_item_product_code+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_mfg_prtno_value_'+counter+'">'+popup_item_mfg_prtno+'</a><input id="item_mfg_prtno_'+counter+'" name="item_mfg_prtno['+counter+']" value="'+popup_item_mfg_prtno+'" type="hidden" /><input id="item_code_'+counter+'" name="item_code['+counter+']" value="'+popup_item_code+'" type="hidden" /><input id="item_id_'+counter+'" name="item_id['+counter+']" value="'+popup_item_id+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_name_value_'+counter+'">'+popup_item_name+'</a><input id="item_name_'+counter+'" name="item_name['+counter+']" value="'+popup_item_name+'" type="hidden" /></td><td><a href="javascript:void(0);" id="multiple_item_division_id_'+counter+'">'+popup_item_division_name+'</a><input id="multiple_item_division_id_'+counter+'" name="multiple_item_division_id['+counter+']" value="'+popup_item_division_id+'" type="hidden" /><input id="multiple_item_division_name_'+counter+'" name="multiple_item_division_name['+counter+']" value="'+popup_item_division_name+'" type="hidden" /></td><td><a href="javascript:void(0);" id="multiple_item_store_id_'+counter+'">'+popup_item_store_name+'</a><input id="multiple_item_store_id_'+counter+'" name="multiple_item_store_id['+counter+']" value="'+popup_item_store_id+'" type="hidden" /><input id="multiple_item_store_name_'+counter+'" name="multiple_item_store_name['+counter+']" value="'+popup_item_store_name+'" type="hidden" /></td><td><a href="javascript:void(0);">'+popup_item_hsn+'</a><input id="item_hsn_value_'+counter+'" name="item_hsn_value['+counter+']" value="'+popup_item_hsn+'" type="hidden" /></td><td><input id="item_qty_'+counter+'" class="quantity stock_text" name="item_qty['+counter+']" value="'+popup_item_qty+'" type="text" onkeyup="return sales_items_grid_total(event, '+counter+')" /><input id="free_qty_name'+counter+'" class="quantity " name="free_qty_name['+counter+']" value="-" type="hidden" readonly="readonly" /><input id="item_qty_free_'+counter+'" class="quantity stock_text" name="item_qty_free['+counter+']" value="'+popup_item_qty+'" type="hidden" readonly="readonly" /></td><td><input id="item_uom_id_'+counter+'" name="item_uom_id['+counter+']" type="hidden" value="'+popup_item_uom_id+'" /><input id="item_uom_name_'+counter+'" name="item_uom_name['+counter+']" type="hidden" value="'+popup_item_uom_name+'" /><input id="item_mrp_'+counter+'" name="item_mrp['+counter+']" readonly="readonly" type="text" class="quantity " value="'+popup_item_mrp+'" /></td><td><input id="item_priceperunit_'+counter+'" name="item_priceperunit['+counter+']" value="'+popup_item_priceperunit+'" type="text" readonly="readonly" class="quantity" onkeyup="return sales_items_grid_total(event, '+counter+')" /></td><td><input id="item_gross_amount_'+counter+'" name="item_gross_amount['+counter+']" value="'+popup_gross_amount+'" type="text" class="quantity stock_text" readonly="readonly" /></td><td><input id="item_discount_percent_'+counter+'" name="item_discount_percent['+counter+']" value="'+popup_item_discount_percent+'" type="text" class="quantity stock_text" readonly="readonly" /></td><td><input id="item_discount_amount_'+counter+'" name="item_discount_amount['+counter+']" value="'+popup_item_discount_amount+'" type="text" class="quantity stock_text" readonly="readonly" /><input id="item_damage_discount_percentage_'+counter+'" name="item_damage_discount_percentage['+counter+']" value="'+popup_item_damage_discount_percent+'" type="hidden" class="quantity stock_text" readonly="readonly" /><input id="item_damage_discount_amount_'+counter+'" name="item_damage_discount_amount['+counter+']" value="'+popup_item_damage_discount_amount+'" type="hidden" class="quantity stock_text" readonly="readonly" /></td><td><input id="item_gross_amount_with_disc_'+counter+'" name="item_gross_amount_with_disc['+counter+']" value="" type="text" class="quantity stock_text" readonly="readonly" /><input id="item_net_amount_'+counter+'" name="item_net_amount['+counter+']" value="'+item_net_amount+'" type="hidden" class="quantity" readonly="readonly" /></td><td><input id="item_tax_percent_'+counter+'" name="item_tax_percent['+counter+']" value="'+item_tax_percent+'" type="hidden" class="quantity stock_text" readonly="readonly" /><input id="item_cgst_'+counter+'" name="item_cgst['+counter+']" value="'+popup_item_gst+'" type="text"  class="quantity stock_text" readonly="readonly" /></td><td><input id="item_tax_amount_'+counter+'" name="item_tax_amount['+counter+']" value="0" type="hidden" class="quantity stock_text" readonly="readonly" /><input id="item_cgst_amount_'+counter+'" name="item_cgst_amount['+counter+']" value="0" type="text" class="quantity stock_text" readonly="readonly" /></td><td><input id="item_sgst_'+counter+'" name="item_sgst['+counter+']" value="'+popup_item_sgst+'" type="text" readonly="readonly" class="quantity stock_text"  /></td><td><input id="item_sgst_amount_'+counter+'" name="item_sgst_amount['+counter+']" value="0" type="text" class="quantity stock_text" readonly="readonly" /></td><td colspan="2"><div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_delete_'+counter+'" onclick="return orderformrowdelete('+counter+');" data-item="'+popup_item_id+'" data-delete="'+counter+'" title="Delete"><span class="icon-trash"></span></div></td></tr>';
							}
							 $('#disp_items').append(items);
							 $("#last_table_id").val(counter);
							 $("#multiple_item_qty_"+check_box_val).val("");
							 $("#multiple_item_priceperunit_"+check_box_val).val("");
							 $("#multiple_item_rate_"+check_box_val).val("");
							 $("#checkbox"+check_box_val).prop("checked", false);
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
										
										
										if(customer_tax_type == 'vat')
							{
								var item_tax_percent = (parseFloat(popup_item_vat)).toFixed(2);
							}
							else if(customer_tax_type == 'cst')
							{
								var item_tax_percent = (parseFloat(popup_item_cst)).toFixed(2);
							}
							else if(customer_tax_type == 'gst')
							{
								
								var item_cgst = (parseFloat(popup_item_gst)).toFixed(2);
								var item_sgst = (parseFloat(popup_item_sgst)).toFixed(2);
								var item_tax_percent = parseFloat(popup_item_gst) + parseFloat(popup_item_sgst);
							}
							
										//var item_tax_percent = (parseFloat(popup_item_vat)+parseFloat(popup_item_serv_tax)+parseFloat(popup_item_cst)+parseFloat(popup_item_gst)+parseFloat(popup_item_exc)).toFixed(2);
										//alert(item_tax_percent);
										var item_discount_amount = (update_rate * (isNaN(popup_item_discount_percent) ? 0 : popup_item_discount_percent) / 100).toFixed(2);;
						
										var item_tax_amount = (update_rate * (isNaN(item_tax_percent) ? 0 : item_tax_percent) / 100).toFixed(2);
						
										var item_net_amount = (parseFloat(update_rate)+parseFloat(item_tax_amount)-parseFloat(item_discount_amount)).toFixed(2);
										
										$('[name="item_tax_percent['+search_val+']"]').val(item_tax_percent);
										$("#item_tax_percent_value_"+search_val).text(item_tax_percent);
										
										$('[name="item_vat['+search_val+']"]').val(popup_item_vat);
										$('[name="item_gst['+search_val+']"]').val(popup_item_gst);
										$('[name="item_cst['+search_val+']"]').val(popup_item_cst);
										$('[name="item_serv_tax['+search_val+']"]').val(popup_item_serv_tax);
										$('[name="item_exc['+search_val+']"]').val(popup_item_exc);
										
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
					}
				}
				else
				{
					$("#multiple_item_qty_"+check_box_val).val("");
					$("#multiple_item_rate_"+check_box_val).val("");
				}
        });
		if (exitMultipleItemsInsert)
		{
			if($("#multiple_item_priceperunit_"+exitMultipleItemsInsert).val() == "")
			{
				$("#multipleItemselecctall").prop("checked", false);
				$("#multiple_item_priceperunit_"+exitMultipleItemsInsert).focus();
				$("#multiple_item_error").text('This Field is Required');
				return false;
			}
			/*else if($("#multiple_item_qty_"+exitMultipleItemsInsert).val() == "")
			{
				$("#multipleItemselecctall").prop("checked", false);
				$("#multiple_item_qty_"+exitMultipleItemsInsert).focus();
				$("#multiple_item_error").text('This Field is Required');
				return false;
			}
			else if($("#multiple_item_rate_"+exitMultipleItemsInsert).val() == "")
			{
				$("#multipleItemselecctall").prop("checked", false);
				$("#multiple_item_rate_"+exitMultipleItemsInsert).focus();
				$("#multiple_item_error").text('This Field is Required');
				return false;
			}*/
		}
		else
		{
			$("#multipleItemselecctall").prop("checked", false);
			document.getElementById("multiple_item_form").reset();
			//$('#btnmultipleSave').addClass("close");
		}
		
		calculatetotal();
		
	});
		
	
	$('#close_popup').click(function ()
	{
		document.getElementById("multiple_item_form").reset();
		$(".itemcheckbox").prop("checked", false);
	});
	
	$('#multipleItemselecctall').click(function(event) {  //on click
        if(this.checked) { // check select status
            $('.itemcheckbox').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"              
            });
        }else{
            $('.itemcheckbox').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                      
            });        
        }
    });
	
	$('.itemcheckbox').click(function(){
            if($(".itemcheckbox").length == $(".itemcheckbox:checked").length) {
                $("#multipleItemselecctall").prop("checked", true);
            }else {
                $("#multipleItemselecctall").prop("checked", false);            
            }
    });
	
	
	$('#multipleitmesearch').click(function(){
		   var pricebook_id = $("#pricebook_id").val();
           var search_product_type = $("#search_multiple_product_type").val();
		   var search_product_group = $("#search_multiple_product_group").val();
		   var search_item_code = $("#search_multiple_item_code").val();
		   var search_item_name = $("#search_multiple_item_name").val();
		   var search_item_mfg_prtno = $("#search_multiple_item_mfg_prtno").val();
		   var customer_discount = $("#customer_discount").val();

		   
		   $.ajax({
			type: 'POST',
			url: '<?php echo site_url('salespopup/sales_multiplesearchitemdetails'); ?>',
			data: {pricebook: pricebook_id, product_type: search_product_type, product_group: search_product_group, item_code: search_item_code, item_name: search_item_name, item_mfg_prtno: search_item_mfg_prtno, customer_discount: customer_discount},
			success: function(resp)
			{ 
				$('#multiple_items').html(resp);
			}
		 });
	 
    });
	
	
});

/*$(document).ready(function(){
  $("#birds").autocomplete({
    source: "birds/get_birds" // name of controller followed by function
  }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
        var inner_html = '<a><div class="list_item_container"><div class="image"><img src="img/' + item.image + '"></div><div class="label">' + item.label + '</div><div class="description">' + item.description + '</div></div></a>';
        return $( "<li></li>" )
            .data( "item.autocomplete", item )
            .append(inner_html)
            .appendTo( ul );
    };
});*/

$(document).ready(function(){

  // smart search for multiple item code in sales
  $("#search_multiple_item_cod").autocomplete({
    source: "<?php echo site_url('salespopup/get_item_code'); ?>", // name of controller followed by function
	autoFocus:true,
	appendTo: "#auto_complete_item_code",
  });
  
   // smart search for multiple item partnumber in sales
  $("#search_multiple_item_mfg_prtn").autocomplete({
    source: "<?php echo site_url('salespopup/get_item_partnumber'); ?>", // name of controller followed by function
	autoFocus:true,
	appendTo: "#auto_complete_item_partnumber",
  });
  
   // smart search for multiple item name in sales
   $("#search_multiple_item_nam").autocomplete({
    source: "<?php echo site_url('salespopup/get_item_name'); ?>", // name of controller followed by function
	autoFocus:true,
	appendTo: "#auto_complete_item_name",
  });
  
});

	
</script>
<?php
	$sessionData = $this->session->userdata('userlogin');
	$vat_display_mode = $sessionData['company_vat'];
	$cst_display_mode = $sessionData['company_cst'];
	$gst_display_mode = $sessionData['company_gst'];
	$service_display_mode = $sessionData['company_service'];
	$excise_display_mode = $sessionData['company_excise'];
?>

<div class="p-popup">
  <a class="close"><img src="<?php echo base_url(); ?>/resources/images/close-button.png" width="25" /></a>
  
  <div>
  <div class="title_head">
  <p>Search Material</p>
  </div>
      <table>
      	<tr>
        <!--	<td>
            	Product Type :
                <br /><br />
                <select	name="search_multiple_product_type" class="chzn-select" id="search_multiple_product_type">
                    <option value="">Select Product Type</option>
                    <?php if(isset($product_type) && !empty($product_type)) { foreach($product_type as $TYPE) { ?>
                    <option value="<?php echo $TYPE['products_type_id']; ?>"><?php echo $TYPE['products_type_name']; ?></option>
                    <?php } } ?>
                </select>
            </td>
            <td>
            	Product Group :
            	<br /><br />
            	<select name="search_multiple_product_group" class="chzn-select" id="search_multiple_product_group" >
                    <option value="">Select Product Group</option>
                    <?php if(isset($product_group) && !empty($product_group)) { foreach($product_group as $GROUP) { ?>
                    <option value="<?php echo $GROUP['products_group_id']; ?>"><?php echo $GROUP['products_group_name']; ?></option>
                    <?php } } ?>
                </select>
            </td> -->
			<td>
            	SKU :
            	<br /><br />
            	<input type="text" 	value="" name="search_multiple_item_mfg_prtno" autocomplete="off" class="input-large" id="search_multiple_item_mfg_prtno" onkeyup="search_multiple_product()">
                <span id="auto_complete_item_partnumber"></span>
            </td>
            
          <!--  <td>
            	Item Code :
            	<br /><br />
            	<input type="text" 	value="" name="search_multiple_item_code" autocomplete="off" class="input-large" id="search_multiple_item_code" onkeyup="search_multiple_product()">
                <span id="auto_complete_item_code"></span>
				
				<input type="hidden" value="<?php echo $vat_display_mode; ?>" name="vat_display_mode" id="vat_display_mode">
				<input type="hidden" value="<?php echo $cst_display_mode; ?>" name="cst_display_mode" id="cst_display_mode">
				<input type="hidden" value="<?php echo $gst_display_mode; ?>" name="gst_display_mode" id="gst_display_mode">
				<input type="hidden" value="<?php echo $service_display_mode; ?>" name="service_display_mode" id="service_display_mode">
				<input type="hidden" value="<?php echo $excise_display_mode; ?>" name="excise_display_mode" id="excise_display_mode">
				
            </td>
            -->
            <td>
            	Item :
            	<br /><br />
            	<input type="text" 	value="" name="search_multiple_item_name" autocomplete="off" class="input-large" id="search_multiple_item_name" onkeyup="search_multiple_product()">
                <span id="auto_complete_item_name"></span>
            </td>
			<td>
            	Item Group :
            	<br /><br />
            	 <select name="search_multiple_product_group" required class="chzn-select" id="search_multiple_product_group" onchange="getsub_group()">
                                            <option value="">Select Product Group</option>
                                            <?php if(isset($product_group) && !empty($product_group)) { foreach($product_group as $GROUP) { ?>
                                            <option  value="<?php echo $GROUP['products_group_id']; ?>"><?php echo $GROUP['products_group_name']; ?></option>
                                            <?php } } ?>
                                        </select>
                <span id="auto_complete_item_name"></span>
            </td>
			<td>
            	Item Sub Group:
            	<br /><br />
            	<select name="material_sub_group" class="chzn-select" onchange="search_multiple_product()" id="material_sub_group">
                                        <option value='0'>Select Sub-Group</option>
				</select>
                <span id="auto_complete_item_name"></span>
            </td>
			<!--<td>
            	<br /><br />
            	<a href="#" id="multipleitmesearch" class="btn-success">Search</a>
            </td>-->
        </tr>
      </table>
      </div>
  <div class="title_head" style="margin-top: 14px;">
  <p>Multiple Items</p>
  <ul style="top:140px;">
     <li><a class="insert" id="btnmultipleSave" href="#">Insert</a></li>
  </ul>
  </div>
  	<div class="table_head1" id="table">
      <div class="popup_col w10 last">
      
      <div id="multiple_item_error" style="color: #FF0000; text-align:center;"></div>
      <form id="multiple_item_form">
        <div class="content">
          <table>
            <thead>
              <tr>
              	<th class="checkbox"><input type="checkbox" id="multipleItemselecctall" value=""></th>
                <th width="60px">SKU</th>
				<th width="65px">Qty</th>
				 <th width="100px">Price/Unit</th>
				<th>Gross Amount</th>
				<?php
				$tax_type = $customer_tax_type->customer_discounts_tax;
				?>
				</tr>
            </thead>
            
            <tbody id="multiple_items">
              <?php //echo "<pre>";print_r($product_list);
			  if(!empty($product_list)) { $itemcount = 1; foreach($product_list as $PROLST) { 
			   if(!empty($PROLST['inventory_qty'] != '' && $PROLST['inventory_qty'] != 0))   {
			  
			  ?>
              <tr>
              <td class="checkbox"><input type="checkbox" class="itemcheckbox" id="checkbox<?php echo $itemcount; ?>" value="<?php echo $itemcount; ?>" name="item_check[]"></td>
              
              
             
              <td>
			  <?php if(isset($PROLST['product_sku'])) { echo $PROLST['product_sku']; } ?>
               <input id="multiple_item_mfg_prtno_<?php echo $itemcount; ?>" name="multiple_item_mfg_prtno[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['product_sku'])) { echo $PROLST['product_sku']; } ?>" />
               <input id="multiple_item_id_<?php echo $itemcount; ?>" name="multiple_item_id[<?php echo $itemcount; ?>]" value="<?php echo $PROLST['product_id']; ?>" type="hidden" />
                <input id="multiple_item_code_<?php echo $itemcount; ?>" name="multiple_item_code[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['product_code'])) { echo $PROLST['product_code']; } ?>" type="hidden" />
             
              <?php if(isset($PROLST['product_name'])) { echo $PROLST['product_name']; } ?>
              <input id="multiple_item_name_<?php echo $itemcount; ?>" name="multiple_item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['product_name'])) { echo $PROLST['product_name']; } ?>" type="hidden" />
             
              <input style="width:80px" id="inventory_batch_no_<?php echo $itemcount; ?>" name="inventory_batch_no[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['inventory_control_no'])) { echo $PROLST['inventory_control_no']; } ?>" type="hidden" readonly />
             
            <input id="multiple_item_inv_qty_<?php echo $itemcount; ?>" readonly  class="quantity stock_text" name="multiple_item_inv_qty[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['inventory_qty'])) { echo $PROLST['inventory_qty']; } ?>" />
              
              <input id="multiple_item_uom_id_<?php echo $itemcount; ?>" name="multiple_item_uom_id[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['uom_id'])) { echo $PROLST['uom_id']; } ?>" />
              <input id="multiple_item_uom_name_<?php echo $itemcount; ?>" name="multiple_item_uom_name[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['uom_name'])) { echo $PROLST['uom_name']; } ?>" />
              <input style="width:80px" id="multiple_item_mrp_<?php echo $itemcount; ?>" readonly="readonly" name="multiple_item_mrp[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['price_book_price_mrp'])) { echo $PROLST['price_book_price_mrp']; } ?>" />
              </td>
               <td>
			  <input id="multiple_item_inv_id_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_inv_id[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['inventory_id'])) { echo $PROLST['inventory_id']; } ?>"  /> 
			  
              <input id="multiple_item_qty_<?php echo $itemcount; ?>" onkeyup="return salse_multiplepopuptotal(event, <?php echo $itemcount; ?>)" class="quantity stock_text" name="multiple_item_qty[<?php echo $itemcount; ?>]" type="text"  value="0" />
			 
			<input id="multiple_incentive_rate_<?php echo $itemcount; ?>" name="multiple_incentive_rate[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['price_book_price_incentive_rate'])) { echo $PROLST['price_book_price_incentive_rate']; } ?>" type="hidden" class="quantity stock_text" onkeyup="return sales_items_grid_total(event, '<?php echo $itemcount; ?>')" />
			
			<input id="multiple_incentive_total_<?php echo $itemcount; ?>" name="multiple_incentive_total[<?php echo $itemcount; ?>]" value="" type="hidden" class="quantity stock_text" onkeyup="return sales_items_grid_total(event, '<?php echo $itemcount; ?>')" />
			</td>
               <td>
              <input id="multiple_item_priceperunit_<?php echo $itemcount; ?>" class="quantity" name="multiple_item_priceperunit[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($PROLST['price_book_price_selling_price'])) { echo $PROLST['price_book_price_selling_price']; } ?>" readonly="readonly" />
             
              <?php /*?><input type="text" value="<?php if(isset($customer_discount)) { echo $customer_discount; } ?>" name="multiple_item_percentage_discount[<?php echo $itemcount; ?>]" class="quantity stock_text" id="multiple_item_percentage_discount_<?php echo $itemcount; ?>" readonly="readonly"><?php */?>
               <input type="hidden" value="<?php if(isset($PROLST['price_book_price_discount_percentage'])) { echo $PROLST['price_book_price_discount_percentage']; } ?>" name="multiple_item_percentage_discount[<?php echo $itemcount; ?>]" class="quantity stock_text" id="multiple_item_percentage_discount_<?php echo $itemcount; ?>" readonly="readonly">
              </td>
              
			<!--  <td>
              <input id="multiple_item_damage_discount_percent_<?php// echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_damage_discount_percent[<?php //echo $itemcount; ?>]" type="text"  value="<?php //if(isset($PROLST['price_book_damage_discount_percentage'])) { //echo $PROLST['price_book_damage_discount_percentage']; } ?>" readonly="readonly" />
              </td>-->
             
			  <?php
				if(isset($tax_value)) 
				{ 
					if($tax_value != 'nontaxable') 
					{ 
					?>
				
					<?php  if($gst_display_mode == 'yes'  && $tax_type == 'gst') { ?>
					
					<input id="multiple_item_cgst_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_cgst[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['price_book_price_gst'])) { echo $PROLST['price_book_price_gst']; } ?>" readonly="readonly" />
					
					<input id="multiple_item_sgst_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_sgst[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['price_book_price_sgst'])) { echo $PROLST['price_book_price_sgst']; } ?>" readonly="readonly" />
					
                    
                   
					<?php } ?>
					
					<?php 
					} 
					
					if($tax_value != 'nontaxable') 
					{ 
					?>
				
					<?php  if($gst_display_mode == 'yes'  && $tax_type == 'igst') { ?>
					
                    
					<input id="multiple_item_igst_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_igst[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['price_book_price_igst'])) { echo $PROLST['price_book_price_igst']; } ?>" readonly="readonly" />
					
                   
					<?php } ?>
					
					<?php 
					} 
				} 
				else 
				{ 
				?>
              <input id="multiple_item_vat_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_vat[<?php echo $itemcount; ?>]" type="hidden" value="0.00" readonly="readonly" />
              <input id="multiple_item_gst_<?php echo $itemcount; ?>" class="quantity" name="multiple_item_gst[<?php echo $itemcount; ?>]" type="hidden" value="0.00" readonly="readonly" />
              <input id="multiple_item_cst_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_cst[<?php echo $itemcount; ?>]" type="hidden" value="0.00" readonly="readonly" />
              <input id="multiple_item_ser_tax_<?php echo $itemcount; ?>" class="quantity" name="multiple_item_ser_tax[<?php echo $itemcount; ?>]" type="hidden" value="0.00" readonly="readonly" />
              <input id="multiple_item_exc_<?php echo $itemcount; ?>" class="quantity" name="multiple_item_exc[<?php echo $itemcount; ?>]" type="hidden" value="0.00" readonly="readonly" />
              <?php } ?>
			  <td>
              <input id="multiple_item_rate_<?php echo $itemcount; ?>" class="quantity" name="multiple_item_rate[<?php echo $itemcount; ?>]" readonly="readonly" type="text" value="" />
              </td>
              </tr>
              <?php $itemcount++; } } } ?>
            </tbody>
          </table>
        </div>
        </form>
      </div>
      <div class="clear"></div>
    </div>
</div>

<script>
$(document).ready(function () {
    $("#country").keyup(function () {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('autocomplete/get_product_manufacturer'); ?>",
            data: {
                keyword: $("#country").val()
            },
            dataType: "json",
            success: function (data) {
                if (data.length > 0) {
                    $('#DropdownCountry').empty();
                    $('#country').attr("data-toggle", "dropdown");
                    $('#DropdownCountry').dropdown('toggle');
                }
                else if (data.length == 0) {
                    $('#country').attr("data-toggle", "");
                }
                $.each(data, function (key,value) {
                    if (data.length >= 0)
                        $('#DropdownCountry').append('<li role="presentation" >' + value['name'] + '</li>');
                });
            }
        });
    });
    $('ul.txtcountry').on('click', 'li a', function () {
        $('#country').val($(this).text());
    });
});

</script>