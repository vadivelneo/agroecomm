// JavaScript Document

function itemsgridrowdelete(id)
{
	//alert('gfhf');
	sure = confirm('Are you sure to Delete?');
	
  	if(sure == true) 
  	{
		
		var login_company_id = $("#login_company_id").val();
		var tax_value = $("#tax_value").val();
		
		var deleteid = $("#itemsgrid_delete_"+id).attr('data-delete');
		var itemid = $("#itemsgrid_delete_"+id).attr('data-item');
		
		var myarray = new Array();
		
		$('input[name^="item_id"]').each(function() {
   			myarray.push($(this).val());			
		});
		
		length = $("#last_table_id").val();
		
		var newarray = "";
		
		var i = 0;
		for(var counter=1; counter<=length; counter++)
		{
			var	popup_item_id = $("#item_id_"+counter).val();
			var	popup_item_code = $("#item_code_"+counter).val();
			var	popup_item_name = $("#item_name_"+counter).val();
			var	popup_item_mfg_prtno = $("#item_mfg_prtno_"+counter).val();
			
			var	popup_item_product_code= $("#multiple_item_product_code_"+counter).val();
			var	popup_item_division_id = $("#multiple_item_division_id_"+counter).val();
			var	popup_item_division_name = $("#multiple_item_division_name_"+counter).val();
			var	popup_item_store_id = $("#multiple_item_store_id_"+counter).val();
			var	popup_item_store_name = $("#multiple_item_store_name_"+counter).val();
			
			var	popup_item_uom_name  = $("#item_uom_name_"+counter).val();
			var	popup_item_uom_id  = $("#item_uom_id_"+counter).val();
			var	popup_item_mrp  = $("#item_mrp_"+counter).val();
			var	popup_item_priceperunit  = $("#item_priceperunit_"+counter).val();
			var	popup_item_qty  = $("#item_qty_"+counter).val();
			var	popup_item_free_qty  = $("#item_qty_free_"+counter).val();
			var	popup_item_free_item  = $("#free_qty_name"+counter).val();
			//alert(popup_item_free_qty);
			var	popup_gross_amount  = $("#item_gross_amount_"+counter).val();
			var	item_tax_percent  = $("#item_tax_percent_"+counter).val();
			var	item_tax_amount  = $("#item_tax_amount_"+counter).val();
			var	popup_item_discount_percent  = $("#item_discount_percent_"+counter).val();
			var	item_discount_amount  = $("#item_discount_amount_"+counter).val();
			var	item_damage_discount_percentage  = $("#item_damage_discount_percentage_"+counter).val();
			var	item_damage_discount_amount  = $("#item_damage_discount_amount_"+counter).val();
			var	item_flat_discount  = $("#item_flat_discount_"+counter).val();
			
			var	item_net_amount  = $("#item_net_amount_"+counter).val();
			var	popup_item_inv_id  = $("#item_inv_id_"+counter).val();
			var	popup_item_inv_qty  = $("#item_inv_qty_"+counter).val();
			
			var	popup_item_vat  = $("#item_vat_"+counter).val();
			var	popup_item_gst  = $("#item_gst_"+counter).val();
			var	popup_item_cst  = $("#item_cst_"+counter).val();
			var	popup_item_serv_tax  = $("#item_serv_tax_"+counter).val();
			var	popup_item_exc  = $("#item_exc_"+counter).val();
			
			var	popup_item_hsn  = $("#item_hsn_value_"+counter).val();
			var	popup_item_cgst = $("#item_cgst_"+counter).val();
			var	popup_item_cgst_amount  = $("#item_cgst_amount_"+counter).val();
			var	popup_item_sgst  = $("#item_sgst_"+counter).val();
			var	popup_item_sgst_amount  = $("#item_sgst_amount_"+counter).val();
			var	popup_item_gross_amount_with_disc  = $("#item_gross_amount_with_disc_"+counter).val();
			var	popup_item_batch_no = $("#item_batch_no_"+counter).val();
			var	popup_item_inv_qty = $("#item_inv_qty_"+counter).val();
			var	popup_item_incentive_rate = $("#item_incentive_rate_"+counter).val();
			var	popup_item_incentive_total = $("#item_incentive_total_"+counter).val();
			
			
			if(popup_item_id != itemid)	
			{	
				 i++;
				 
				if(tax_value != 'nontaxable')
				{
				 var items ='<tr><td><a href="javascript:void(0);" id="'+i+'">'+i+'</a><input id="item_code_'+i+'" name="item_code['+i+']" value="'+popup_item_code+'" type="hidden" /><input id="item_id_'+i+'" name="item_id['+i+']" value="'+popup_item_id+'" type="hidden" /></td><td><a href="javascript:void(0);">'+popup_item_name+'</a><input id="item_code_'+i+'" name="item_code['+i+']" value="'+popup_item_code+'" type="hidden" /><input id="item_mfg_prtno_'+i+'" name="item_mfg_prtno['+i+']" value="'+popup_item_mfg_prtno+'" type="hidden" /><input id="item_name_'+i+'" name="item_name['+i+']" value="'+popup_item_name+'" type="hidden" /><input id="multiple_item_division_id_'+i+'" name="multiple_item_division_id['+i+']" value="'+popup_item_division_id+'" type="hidden" /><input id="multiple_item_division_name_'+i+'" name="multiple_item_division_name['+i+']" value="'+popup_item_division_name+'" type="hidden" /><input id="multiple_item_store_id_'+i+'" name="multiple_item_store_id['+i+']" value="'+popup_item_store_id+'" type="hidden" /><input id="multiple_item_store_name_'+i+'" name="multiple_item_store_name['+i+']" value="'+popup_item_store_name+'" type="hidden" /><input id="item_hsn_value_'+i+'" name="item_hsn_value['+i+']" value="'+popup_item_hsn+'" type="hidden" /></td><td><a href="javascript:void(0);"></a><input id="item_inv_id_'+i+'" name="item_inv_id['+i+']" type="hidden" value="'+popup_item_inv_id+'" /><input id="item_inv_qty_'+i+'" name="item_inv_qty['+i+']" type="hidden" value="'+popup_item_inv_qty+'" /><input id="item_qty_'+i+'" name="item_qty['+i+']" value="'+popup_item_qty+'" class="quantity stock_text" type="text" onkeyup="return sales_items_grid_total(event, '+i+')"/></td><td><input id="item_incentive_rate_'+i+'" name="item_incentive_rate['+i+']" value="'+popup_item_incentive_rate+'" class="quantity stock_text" type="text" onkeyup="return sales_items_grid_total(event, '+i+')"/></td><td><input id="item_incentive_total_'+i+'" name="item_incentive_total['+i+']" value="'+popup_item_incentive_total+'" class="quantity stock_text" type="text" onkeyup="return sales_items_grid_total(event, '+i+')"/></td><td><input id="free_qty_name'+i+'" class="quantity" name="free_qty_name['+i+']" value="'+popup_item_free_item+'" type="hidden" /><input id="item_qty_free_'+i+'" class="quantity" name="item_qty_free['+i+']" value="'+popup_item_free_qty+'" type="hidden" /><input id="item_uom_id_'+i+'" name="item_uom_id['+i+']" type="hidden" value="'+popup_item_uom_id+'" /><input id="item_uom_name_'+i+'" name="item_uom_name['+i+']" type="hidden" value="'+popup_item_uom_name+'" /><input id="item_mrp_'+i+'" name="item_mrp['+i+']" type="text" class="quantity" value="'+popup_item_mrp+'" /><a href="javascript:void(0);" ></a></td><td><a href="javascript:void(0);" id="item_priceperunit_value_'+i+'"></a><input  id="item_priceperunit_'+i+'" name="item_priceperunit['+i+']" value="'+popup_item_priceperunit+'" class="quantity" type="text" /></td><td><input id="item_batch_no_'+i+'" name="item_batch_no['+i+']" value="'+popup_item_batch_no+'" type="text" class="quantity stock_text" readonly="readonly" /></td><td><input id="item_inv_qty_'+i+'" name="item_inv_qty['+i+']" value="'+popup_item_inv_qty+'" type="text" class="quantity stock_text" readonly="readonly" /></td><td><a href="javascript:void(0);" ></a><input id="item_gross_amount_'+i+'" name="item_gross_amount['+i+']" value="'+popup_gross_amount+'" class="quantity stock_text" type="text" /></td><td><a href="javascript:void(0);" ></a><input id="item_discount_percent_'+i+'" name="item_discount_percent['+i+']" value="'+popup_item_discount_percent+'" class="quantity stock_text" type="text" /><input id="item_flat_discount_'+i+'" name="item_flat_discount['+i+']" value="0" type="hidden" /></td><td><a href="javascript:void(0);"></a><input id="item_discount_amount_'+i+'" name="item_discount_amount['+i+']" value="'+item_discount_amount+'" class="quantity stock_text" type="text" /><input id="item_damage_discount_percentage_'+i+'" name="item_damage_discount_percentage['+i+']" value="'+item_damage_discount_percentage+'" type="hidden" /><input id="item_damage_discount_amount_'+i+'" name="item_damage_discount_amount['+i+']" value="'+item_damage_discount_amount+'" type="hidden" /></td><td><input id="item_gross_amount_with_disc_'+i+'" name="item_gross_amount_with_disc['+i+']" value="'+popup_item_gross_amount_with_disc+'" class="quantity stock_text" type="text" /></td><td><input id="item_tax_percent_'+i+'" name="item_tax_percent['+i+']" value="'+item_tax_percent+'" type="hidden" /><input id="item_tax_amount_'+i+'" name="item_tax_amount['+i+']" value="'+item_tax_amount+'" type="hidden" /><a href="javascript:void(0);" ></a><input id="item_cgst_'+i+'" name="item_cgst['+i+']" value="'+popup_item_cgst+'" class="quantity stock_text" type="text" /><input id="item_cgst_amount_'+i+'" name="item_cgst_amount['+i+']" value="'+popup_item_cgst_amount+'" class="quantity stock_text" type="hidden" /></td><td><a href="javascript:void(0);" ></a><input id="item_sgst_'+i+'" name="item_sgst['+i+']" value="'+popup_item_sgst+'" class="quantity stock_text" type="text" /><input id="item_sgst_amount_'+i+'" name="item_sgst_amount['+i+']" class="quantity stock_text" value="'+popup_item_sgst_amount+'" type="hidden" /></td><td colspan="2"><div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_delete_'+i+'" onclick="return itemsgridrowdelete('+i+');" data-item="'+popup_item_id+'" data-delete="'+i+'" title="Delete"><span class="icon-trash"></span></div></td></tr>';
				}
				else
				{
					var items ='<tr><td><a href="javascript:void(0);" id="'+i+'">'+i+'</a><input id="item_code_'+i+'" name="item_code['+i+']" value="'+popup_item_code+'" type="hidden" /><input id="item_id_'+i+'" name="item_id['+i+']" value="'+popup_item_id+'" type="hidden" /></td><td><a href="javascript:void(0);">'+popup_item_product_code+'</a><input id="multiple_item_product_code_'+i+'" name="multiple_item_product_code['+i+']" value="'+popup_item_product_code+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_mfg_prtno_value_'+i+'">'+popup_item_mfg_prtno+'</a><input id="item_mfg_prtno_'+i+'" name="item_mfg_prtno['+i+']" value="'+popup_item_mfg_prtno+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_name_value_'+i+'">'+popup_item_name+'</a><input id="item_name_'+i+'" name="item_name['+i+']" value="'+popup_item_name+'" type="hidden" /></td><td><a href="javascript:void(0);" id="multiple_item_division_id_'+i+'">'+popup_item_division_name+'</a><input id="multiple_item_division_id_'+i+'" name="multiple_item_division_id['+i+']" value="'+popup_item_division_id+'" type="hidden" /><input id="multiple_item_division_name_'+i+'" name="multiple_item_division_name['+i+']" value="'+popup_item_division_name+'" type="hidden" /></td><td><a href="javascript:void(0);" id="multiple_item_store_id_'+i+'">'+popup_item_store_name+'</a><input id="multiple_item_store_id_'+i+'" name="multiple_item_store_id['+i+']" value="'+popup_item_store_id+'" type="hidden" /><input id="multiple_item_store_name_'+i+'" name="multiple_item_store_name['+i+']" value="'+popup_item_store_name+'" type="hidden" /></td><td><a href="javascript:void(0);" >'+popup_item_hsn+'</a><input id="item_hsn_value_'+i+'" name="item_hsn_value['+i+']" value="'+popup_item_hsn+'" type="hidden" /></td><td><a href="javascript:void(0);"></a><input id="item_inv_id_'+i+'" name="item_inv_id['+i+']" type="hidden" value="'+popup_item_inv_id+'" /><input id="item_inv_qty_'+i+'" name="item_inv_qty['+i+']" type="hidden" value="'+popup_item_inv_qty+'" /><input id="item_qty_'+i+'" name="item_qty['+i+']" value="'+popup_item_qty+'" class="quantity stock_text" type="text" onkeyup="return sales_items_grid_total(event, '+i+') /></td><td><input id="free_qty_name'+i+'" class="quantity" name="free_qty_name['+i+']" value="'+popup_item_free_item+'" type="hidden" /><input id="item_qty_free_'+i+'" class="quantity" name="item_qty_free['+i+']" value="'+popup_item_free_qty+'" type="hidden" /><input id="item_uom_id_'+i+'" name="item_uom_id['+i+']" type="hidden" value="'+popup_item_uom_id+'" /><input id="item_uom_name_'+i+'" name="item_uom_name['+i+']" type="hidden" value="'+popup_item_uom_name+'" /><input id="item_mrp_'+i+'" name="item_mrp['+i+']" type="text" class="quantity" value="'+popup_item_mrp+'" /><a href="javascript:void(0);" ></a></td><td><a href="javascript:void(0);" id="item_priceperunit_value_'+i+'"></a><input  id="item_priceperunit_'+i+'" name="item_priceperunit['+i+']" value="'+popup_item_priceperunit+'" class="quantity" type="text" /></td><td><a href="javascript:void(0);" ></a><input id="item_gross_amount_'+i+'" name="item_gross_amount['+i+']" value="'+popup_gross_amount+'" class="quantity stock_text" type="text" /></td><td><a href="javascript:void(0);" ></a><input id="item_discount_percent_'+i+'" name="item_discount_percent['+i+']" value="'+popup_item_discount_percent+'" class="quantity stock_text" type="text" /><input id="item_flat_discount_'+i+'" name="item_flat_discount['+i+']" value="0" type="hidden" /></td><td><a href="javascript:void(0);"></a><input id="item_discount_amount_'+i+'" name="item_discount_amount['+i+']" value="'+item_discount_amount+'" class="quantity stock_text" type="text" /><input id="item_damage_discount_percentage_'+i+'" name="item_damage_discount_percentage['+i+']" value="'+item_damage_discount_percentage+'" type="hidden" /><input id="item_damage_discount_amount_'+i+'" name="item_damage_discount_amount['+i+']" value="'+item_damage_discount_amount+'" type="hidden" /></td><td><a href="javascript:void(0);" >'+popup_item_gross_amount_with_disc+'</a><input id="item_gross_amount_with_disc_'+i+'" name="item_gross_amount_with_disc['+i+']" value="'+popup_item_gross_amount_with_disc+'" class="quantity stock_text" type="text" /></td><td><input id="item_tax_percent_'+i+'" name="item_tax_percent['+i+']" value="'+item_tax_percent+'" type="hidden" /><input id="item_tax_amount_'+i+'" name="item_tax_amount['+i+']" value="'+item_tax_amount+'" type="hidden" /><a href="javascript:void(0);" ></a><input id="item_cgst_'+i+'" name="item_cgst['+i+']" value="'+popup_item_cgst+'" class="quantity stock_text" type="text" /></td><td><a href="javascript:void(0);" ></a><input id="item_cgst_amount_'+i+'" name="item_cgst_amount['+i+']" value="'+popup_item_cgst_amount+'" class="quantity stock_text" type="text" /></td><td><a href="javascript:void(0);" ></a><input id="item_sgst_'+i+'" name="item_sgst['+i+']" value="'+popup_item_sgst+'" class="quantity stock_text" type="text" /></td><td><a href="javascript:void(0);" ></a><input id="item_sgst_amount_'+i+'" name="item_sgst_amount['+i+']" class="quantity stock_text" value="'+popup_item_sgst_amount+'" type="text" /></td><td colspan="2"><div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_delete_'+i+'" onclick="return itemsgridrowdelete('+i+');" data-item="'+popup_item_id+'" data-delete="'+i+'" title="Delete"><span class="icon-trash"></span></div></td></tr>';
				}
				  
				  newarray = newarray.concat(items);
			}
			else
			{
				
			}
		}
		$("#last_table_id").val(i);
		$('#disp_items').html(newarray);
		
		$("#total_shipping_charges").val("");
		$("#total_shipping_tax").val("");
		$("#total_adjustments").val("");
		$("#grand_total").val("");
				
		return calculatetotal();
		
		return false;
    }
  	else 
  	{
      return false;
    }
	
}


function orderformrowdelete(id)
{
	//alert('gfhfddd');
	sure = confirm('Are you sure to Delete?');
	
  	if(sure == true) 
  	{
		
		var login_company_id = $("#login_company_id").val();
		var tax_value = $("#tax_value").val();
		
		var deleteid = $("#itemsgrid_delete_"+id).attr('data-delete');
		var itemid = $("#itemsgrid_delete_"+id).attr('data-item');
		
		var myarray = new Array();
		
		$('input[name^="item_id"]').each(function() {
   			myarray.push($(this).val());			
		});
		
		length = $("#last_table_id").val();
		
		var newarray = "";
		
		var i = 0;
		for(var counter=1; counter<=length; counter++)
		{
			var	popup_item_id = $("#item_id_"+counter).val();
			var	popup_item_code = $("#item_code_"+counter).val();
			var	popup_item_name = $("#item_name_"+counter).val();
			var	popup_item_mfg_prtno = $("#item_mfg_prtno_"+counter).val();
			
			var	popup_item_product_code= $("#multiple_item_product_code_"+counter).val();
			var	popup_item_division_id = $("#multiple_item_division_id_"+counter).val();
			var	popup_item_division_name = $("#multiple_item_division_name_"+counter).val();
			var	popup_item_store_id = $("#multiple_item_store_id_"+counter).val();
			var	popup_item_store_name = $("#multiple_item_store_name_"+counter).val();
			
			var	popup_item_uom_name  = $("#item_uom_name_"+counter).val();
			var	popup_item_uom_id  = $("#item_uom_id_"+counter).val();
			var	popup_item_mrp  = $("#item_mrp_"+counter).val();
			var	popup_item_priceperunit  = $("#item_priceperunit_"+counter).val();
			var	popup_item_qty  = $("#item_qty_"+counter).val();
			var	popup_item_free_qty  = $("#item_qty_free_"+counter).val();
			var	popup_item_free_item  = $("#free_qty_name"+counter).val();
			//alert(popup_item_free_qty);
			var	popup_gross_amount  = $("#item_gross_amount_"+counter).val();
			var	item_tax_percent  = $("#item_tax_percent_"+counter).val();
			var	item_tax_amount  = $("#item_tax_amount_"+counter).val();
			var	popup_item_discount_percent  = $("#item_discount_percent_"+counter).val();
			var	item_discount_amount  = $("#item_discount_amount_"+counter).val();
			var	item_damage_discount_percentage  = $("#item_damage_discount_percentage_"+counter).val();
			var	item_damage_discount_amount  = $("#item_damage_discount_amount_"+counter).val();
			var	item_flat_discount  = $("#item_flat_discount_"+counter).val();
			
			var	item_net_amount  = $("#item_net_amount_"+counter).val();
			var	popup_item_inv_id  = $("#item_inv_id_"+counter).val();
			var	popup_item_inv_qty  = $("#item_inv_qty_"+counter).val();
			
			var	popup_item_vat  = $("#item_vat_"+counter).val();
			var	popup_item_gst  = $("#item_gst_"+counter).val();
			var	popup_item_cst  = $("#item_cst_"+counter).val();
			var	popup_item_serv_tax  = $("#item_serv_tax_"+counter).val();
			var	popup_item_exc  = $("#item_exc_"+counter).val();
			
			var	popup_item_hsn  = $("#item_hsn_value_"+counter).val();
			var	popup_item_cgst = $("#item_cgst_"+counter).val();
			var	popup_item_cgst_amount  = $("#item_cgst_amount_"+counter).val();
			var	popup_item_sgst  = $("#item_sgst_"+counter).val();
			var	popup_item_sgst_amount  = $("#item_sgst_amount_"+counter).val();
			var	popup_item_gross_amount_with_disc  = $("#item_gross_amount_with_disc_"+counter).val();
			var	popup_item_batch_no = $("#item_batch_no_"+counter).val();
			var	popup_item_inv_qty = $("#item_inv_qty_"+counter).val();
			var	popup_item_incentive_rate = $("#item_incentive_rate_"+counter).val();
			var	popup_item_incentive_total = $("#item_incentive_total_"+counter).val();
			
			
			if(popup_item_id != itemid)	
			{	
				 i++;
				 
				if(tax_value != 'nontaxable')
				{
				 var items ='<tr><td><a href="javascript:void(0);" id="'+i+'">'+i+'</a><input id="item_code_'+i+'" name="item_code['+i+']" value="'+popup_item_code+'" type="hidden" /><input id="item_id_'+i+'" name="item_id['+i+']" value="'+popup_item_id+'" type="hidden" /></td><td><a href="javascript:void(0);">'+popup_item_name+'</a><input id="item_code_'+i+'" name="item_code['+i+']" value="'+popup_item_code+'" type="hidden" /><input id="item_mfg_prtno_'+i+'" name="item_mfg_prtno['+i+']" value="'+popup_item_mfg_prtno+'" type="hidden" /><input id="item_name_'+i+'" name="item_name['+i+']" value="'+popup_item_name+'" type="hidden" /><input id="multiple_item_division_id_'+i+'" name="multiple_item_division_id['+i+']" value="'+popup_item_division_id+'" type="hidden" /><input id="multiple_item_division_name_'+i+'" name="multiple_item_division_name['+i+']" value="'+popup_item_division_name+'" type="hidden" /><input id="multiple_item_store_id_'+i+'" name="multiple_item_store_id['+i+']" value="'+popup_item_store_id+'" type="hidden" /><input id="multiple_item_store_name_'+i+'" name="multiple_item_store_name['+i+']" value="'+popup_item_store_name+'" type="hidden" /><input id="item_hsn_value_'+i+'" name="item_hsn_value['+i+']" value="'+popup_item_hsn+'" type="hidden" /></td><td><a href="javascript:void(0);"></a><input id="item_inv_id_'+i+'" name="item_inv_id['+i+']" type="hidden" value="'+popup_item_inv_id+'" /><input id="item_inv_qty_'+i+'" name="item_inv_qty['+i+']" type="hidden" value="'+popup_item_inv_qty+'" /><input id="item_qty_'+i+'" name="item_qty['+i+']" value="'+popup_item_qty+'" class="quantity stock_text" type="text" onkeyup="return sales_items_grid_total(event, '+i+')"/></td><td><input id="item_incentive_rate_'+i+'" name="item_incentive_rate['+i+']" value="'+popup_item_incentive_rate+'" class="quantity stock_text" type="hidden" onkeyup="return sales_items_grid_total(event, '+i+')"/><input id="item_incentive_total_'+i+'" name="item_incentive_total['+i+']" value="'+popup_item_incentive_total+'" class="quantity stock_text" type="hidden" onkeyup="return sales_items_grid_total(event, '+i+')"/><input id="free_qty_name'+i+'" class="quantity" name="free_qty_name['+i+']" value="'+popup_item_free_item+'" type="hidden" /><input id="item_qty_free_'+i+'" class="quantity" name="item_qty_free['+i+']" value="'+popup_item_free_qty+'" type="hidden" /><input id="item_uom_id_'+i+'" name="item_uom_id['+i+']" type="hidden" value="'+popup_item_uom_id+'" /><input id="item_uom_name_'+i+'" name="item_uom_name['+i+']" type="hidden" value="'+popup_item_uom_name+'" /><input id="item_mrp_'+i+'" name="item_mrp['+i+']" type="hidden" class="quantity" value="'+popup_item_mrp+'" /><a href="javascript:void(0);" ></a><a href="javascript:void(0);" id="item_priceperunit_value_'+i+'"></a><input  id="item_priceperunit_'+i+'" name="item_priceperunit['+i+']" value="'+popup_item_priceperunit+'" class="quantity" type="text" /><input id="item_batch_no_'+i+'" name="item_batch_no['+i+']" value="'+popup_item_batch_no+'" type="hidden" class="quantity stock_text" readonly="readonly" /><input id="item_inv_qty_'+i+'" name="item_inv_qty['+i+']" value="'+popup_item_inv_qty+'" type="hidden" class="quantity stock_text" readonly="readonly" /><input id="item_gross_amount_'+i+'" name="item_gross_amount['+i+']" value="'+popup_gross_amount+'" class="quantity stock_text" type="hidden" /><input id="item_discount_percent_'+i+'" name="item_discount_percent['+i+']" value="'+popup_item_discount_percent+'" class="quantity stock_text" type="hidden" /><input id="item_flat_discount_'+i+'" name="item_flat_discount['+i+']" value="0" type="hidden" /><a href="javascript:void(0);"></a><input id="item_discount_amount_'+i+'" name="item_discount_amount['+i+']" value="'+item_discount_amount+'" class="quantity stock_text" type="hidden" /><input id="item_damage_discount_percentage_'+i+'" name="item_damage_discount_percentage['+i+']" value="'+item_damage_discount_percentage+'" type="hidden" /><input id="item_damage_discount_amount_'+i+'" name="item_damage_discount_amount['+i+']" value="'+item_damage_discount_amount+'" type="hidden" /><input id="item_gross_amount_with_disc_'+i+'" name="item_gross_amount_with_disc['+i+']" value="'+popup_item_gross_amount_with_disc+'" class="quantity stock_text" type="hidden" /><input id="item_tax_percent_'+i+'" name="item_tax_percent['+i+']" value="'+item_tax_percent+'" type="hidden" /><input id="item_tax_amount_'+i+'" name="item_tax_amount['+i+']" value="'+item_tax_amount+'" type="hidden" /><a href="javascript:void(0);" ></a><input id="item_cgst_'+i+'" name="item_cgst['+i+']" value="'+popup_item_cgst+'" class="quantity stock_text" type="hidden" /><input id="item_cgst_amount_'+i+'" name="item_cgst_amount['+i+']" value="'+popup_item_cgst_amount+'" class="quantity stock_text" type="hidden" /><a href="javascript:void(0);" ></a><input id="item_sgst_'+i+'" name="item_sgst['+i+']" value="'+popup_item_sgst+'" class="quantity stock_text" type="hidden" /><input id="item_sgst_amount_'+i+'" name="item_sgst_amount['+i+']" class="quantity stock_text" value="'+popup_item_sgst_amount+'" type="hidden" /></td><td ><div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_delete_'+i+'" onclick="return orderformrowdelete('+i+');" data-item="'+popup_item_id+'" data-delete="'+i+'" title="Delete"><span class="icon-trash"></span></div></td></tr>';
				}
				else
				{
					
				}
				  
				  newarray = newarray.concat(items);
			}
			else
			{
				
			}
		}
		$("#last_table_id").val(i);
		$('#disp_items').html(newarray);
		
		$("#total_shipping_charges").val("");
		$("#total_shipping_tax").val("");
		$("#total_adjustments").val("");
		$("#grand_total").val("");
				
		return calculatetotal();
		
		return false;
    }
  	else 
  	{
      return false;
    }
	
}

function itemsgridbomdelete(id)
{
	sure = confirm('Are you sure to Delete?');
	
  	if(sure == true) 
  	{
		
		var login_company_id = $("#login_company_id").val();
		
		var deleteid = $("#itemsgrid_delete_"+id).attr('data-delete');
		var itemid = $("#comp_material_"+id).attr('data-item');
		
		var myarray = new Array();
		
		$('input[name^="item_id_bom"]').each(function() {
   			myarray.push($(this).val());			
		});
		
		length = $("#last_table_id").val();
		
		var newarray = "";
		
		var i = 0;
		for(var counter=1; counter<=length; counter++)
		{
			
			var	popup_item_id = $("#item_id_"+counter).val();
			
			var	component = $("#component_"+counter).val();
			var	comp_material = $("#comp_material_"+counter).val();
			
			var	comp_product_code = $("#comp_material_code_"+counter).val();
			var	comp_product_name = $("#comp_material_name_"+counter).val();
			
			var	comp_sku = $("#comp_sku_"+counter).val();
			var	comp_uom_id = $("#comp_uom_id_"+counter).val();
			var	comp_qty_uom = $("#comp_qty_uom_"+counter).val();
			
			var	comp_variance = $("#comp_variance_"+counter).val(); 
			var	comp_consum_qty = $("#comp_consum_qty_"+counter).val();
			var	comp_store_id = $("#comp_store_id_"+counter).val();
			var	comp_category_id = $("#comp_category_id_"+counter).val();
			var	comp_store_name = $("#comp_store_name_"+counter).val();
			var	comp_category_name = $("#comp_category_name_"+counter).val();
			//alert(popup_item_id+','+itemid);
			if(popup_item_id != itemid)
			{	
				 i++;
				 
				var items ='<tr><td><a href="javascript:void(0);" >'+i+'</a><input id="item_id_'+i+'" name="item_id['+i+']" value="'+i+'" type="hidden" class="quantity stock_text" readonly="readonly" /><input id="item_id_bom_'+i+'" name="item_id_bom['+i+']" value="'+comp_material+'" type="hidden" class="quantity stock_text" /></td><td><a href="javascript:void(0);" >'+component+'</a><input id="component_'+i+'" name="component['+i+']" value="'+component+'" type="hidden" class="quantity stock_text" readonly="readonly" /></td><td><a href="javascript:void(0);" >'+comp_product_code+'</a><input id="comp_material_'+i+'" name="comp_material['+i+']" value="'+comp_material+'" data-item="'+i+'" type="hidden" class="quantity stock_text" /><input id="comp_material_code_'+i+'" name="comp_material_code['+i+']" value="'+comp_product_code+'" data-item="'+i+'" type="hidden" class="quantity stock_text" /></td><td><a href="javascript:void(0);" >'+comp_product_name+'</a><input id="comp_material_name_'+i+'" name="comp_material_name['+i+']" value="'+comp_product_name+'" data-item="'+i+'" type="hidden" class="quantity stock_text" /><input id="comp_category_id_'+i+'" name="comp_category_id['+i+']" value="'+comp_category_id+'" type="hidden" class="quantity stock_text" readonly="readonly" /><input id="comp_category_name_'+i+'" name="comp_category_name['+i+']" value="'+comp_category_name+'" type="hidden" class="quantity stock_text" readonly="readonly" /></td><td><a href="javascript:void(0);" >'+comp_store_name+'</a><input id="comp_store_id_'+i+'" name="comp_store_id['+i+']" value="'+comp_store_id+'" type="hidden" class="quantity stock_text" readonly="readonly" /><input id="comp_store_name_'+i+'" name="comp_store_name['+i+']" value="'+comp_store_name+'" type="hidden" class="quantity stock_text" readonly="readonly" /></td><td><a href="javascript:void(0);" >'+comp_sku+'</a><input id="comp_sku_'+i+'" name="comp_sku['+i+']" value="'+comp_sku+'" type="hidden" class="quantity stock_text" readonly="readonly" /></td><td><input id="comp_consum_qty_'+i+'" name="comp_consum_qty['+i+']" value="'+comp_consum_qty+'" type="text" class="quantity stock_text consumable_qty" /></td><td><a href="javascript:void(0);" >'+comp_qty_uom+'</a><input id="comp_qty_uom_'+i+'" name="comp_qty_uom['+i+']" value="'+comp_qty_uom+'" type="hidden" class="quantity stock_text" readonly="readonly" /><input id="comp_uom_id_'+i+'" name="comp_uom_id['+i+']" value="'+comp_uom_id+'" type="hidden" class="quantity stock_text" /></td><td><a href="javascript:void(0);" >'+comp_variance+'</a><input id="comp_variance_'+i+'" name="comp_variance['+i+']" value="'+comp_variance+'" type="hidden" class="quantity stock_text" readonly="readonly" /></td><td colspan="2"><div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_delete_'+i+'" onclick="return itemsgridbomdelete('+i+');" data-item="'+comp_material+'" data-delete="'+i+'" title="Delete"><span class="icon-trash"></span></div></td></tr>';
				  newarray = newarray.concat(items);
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



function itemsgridMIRdelete(id)
{
	sure = confirm('Are you sure to Delete?');
	
  	if(sure == true) 
  	{
		
		var login_company_id = $("#login_company_id").val();
		
		var deleteid = $("#itemsgrid_delete_"+id).attr('data-delete');
		var itemid = $("#itemsgrid_delete_"+id).attr('data-item');
		
		var myarray = new Array();
		
		$('input[name^="item_id"]').each(function() {
   			myarray.push($(this).val());			
		});
		
		length = $("#last_table_id").val();
		//alert(length);
		var newarray = "";
		
		var i = 0;
		for(var counter=1; counter<=length; counter++)
		{
			
			var	item_sku = $("#item_sku_"+counter).val();
			var	popup_item_id = $("#item_id_"+counter).val();
			var	item_name = $("#item_name_"+counter).val();
			var	item_category_name = $("#mis_item_category_name_"+counter).val();
			var	category_id = $("#category_id_"+counter).val();
            var	item_component = $("#item_component_"+counter).val();
            var	item_store_id = $("#item_store_id_"+counter).val();
			var	item_store_name = $("#item_store_name_"+counter).val();
            var	item_bom_qty = $("#item_bom_qty_"+counter).val();
            var	item_bom_qty_single_edit = $("#item_bom_qty_single_edit_"+counter).val();
            var	item_qty_requested = $("#item_qty_requested_"+counter).val();
            var	item_qty_inventory = $("#item_qty_inventory_"+counter).val();
            var	item_qty_pending = $("#item_qty_pending_"+counter).val();
            var	item_qty_reason = $("#item_qty_reason_"+counter).val();
            var	item_uom_id = $("#item_uom_id_"+counter).val();
            var	item_uom_name = $("#item_uom_name_"+counter).val();
            var	item_label_claim = $("#item_label_claim_"+counter).val();
			var	item_overage_percent = $("#item_overage_percent_"+counter).val();
			//alert(popup_item_id+','+itemid);
			//alert(popup_item_id);
			//alert(itemid);
			if(popup_item_id != itemid)
			{	
				 i++;
				 
				var items ='<tr><td><a href="javascript:void(0);" >'+i+'</a></td><td><a href="javascript:void(0);">'+item_sku+'</a><input type="hidden"  value="'+item_sku+'" name="item_sku['+i+']" id="item_sku_'+i+'" ></td><td><a href="javascript:void(0);">'+item_name+'</a><input id="item_id_'+i+'" name="item_id['+i+']"  value="'+popup_item_id+'" type="hidden" /><input id="item_name_'+i+'" name="item_name['+i+']"  value="'+item_name+'" type="hidden" /></td><td><a href="javascript:void(0);"> '+item_category_name+'</a><input type="hidden"   value="'+item_category_name+'"  name="mis_item_category_name['+i+']" id="mis_item_category_name_'+i+'" class="input-large" ><input type="hidden"  value="'+category_id+'" name="category_id['+i+']" id="category_id_'+i+'" class="input-large" ></td><td><a href="javascript:void(0);" > '+item_component+'</a><input type="hidden"  value="'+item_component+'" name="item_component['+i+']" id="item_component_'+i+'" class="input-large" ></td><td><a href="javascript:void(0);">'+item_store_name+'</a><input id="item_store_id_'+i+'" name="item_store_id['+i+']"  value="'+item_store_id+'" class="quantity stock_text" type="hidden" /><input id="item_store_name_'+i+'" name="item_store_name['+i+']" value="'+item_store_name+'" type="hidden" class="quantity stock_text" readonly="readonly" /></td><td><input id="item_label_claim_'+counter+'" name="item_label_claim['+counter+']" value="'+item_label_claim+'" class="quantity stock_text" type="text" /></td><td><input id="item_overage_percent_'+counter+'" name="item_overage_percent['+counter+']" value="'+item_overage_percent+'" class="quantity stock_text" type="text" /></td><td><input id="item_bom_qty_'+i+'" name="item_bom_qty['+i+']"  value="'+item_bom_qty+'" class="quantity stock_text" type="text" readonly="readonly" /><input id="item_bom_qty_single_edit_'+i+'" name="item_bom_qty_single_edit['+i+']"  value="'+item_bom_qty_single_edit+'" class="quantity stock_text" type="hidden" /></td><td><input id="item_qty_requested_'+i+'" name="item_qty_requested['+i+']"  value="'+item_qty_requested+'" class="quantity stock_text" type="text" /></td><td><input id="item_qty_inventory_'+i+'" name="item_qty_inventory['+i+']"  value="'+item_qty_inventory+'" readonly="readonly"  class="quantity stock_text" type="text" /></td><td><input id="item_qty_pending_'+i+'" name="item_qty_pending['+i+']"  value="'+item_qty_pending+'" readonly="readonly"  class="quantity stock_text" type="text" /></td><td><input id="item_qty_reason_'+i+'" name="item_qty_reason['+i+']"  value="'+item_qty_reason+'" class="quantity" type="text" /></td><td><a href="javascript:void(0);">'+item_uom_name+'</a><input id="item_uom_id_'+i+'" name="item_uom_id['+i+']" type="hidden"  value="'+item_uom_id+'" /><input id="item_uom_name_'+i+'" name="item_uom_name['+i+']"  value="'+item_uom_name+'" class="quantity stock_text" type="hidden" /></td><td colspan="2"><div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_delete_'+i+'" onclick="return itemsgridMIRdelete('+i+');" data-item="'+popup_item_id+'" data-delete="'+i+'" title="Delete"><span class="icon-trash"></span></div></td></tr>';
				  newarray = newarray.concat(items);
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


function itemsgridmisdelete(id)
{
	sure = confirm('Are you sure to Delete?');
	
  	if(sure == true) 
  	{
		var login_company_id = $("#login_company_id").val();
		
		var deleteid = $("#itemsgrid_delete_"+id).attr('data-delete');
		var itemid = $("#itemsgrid_delete_"+id).attr('data-item');
		
		var myarray = new Array();
		
		$('input[name^="mis_item_name"]').each(function()
		{
			var old_item_id = $(this).val();
			myarray.push(old_item_id);
			
		});
		
		length = $("#last_table_id").val();

		var newarray = "";
		
		var i = 0;
		for(var counter=1; counter<=length; counter++)
		{
			
			var	popup_item_id = $("#item_id_"+counter).val();
			
			var	mis_product_id = $("#mis_product_id_"+counter).val();
			var	mis_item_code = $("#mis_item_code_"+counter).val();
			
			var	mis_item_name = $('#mis_item_name_'+counter).val();
			var	mis_item_sku =	$('#mis_product_sku_'+counter).val();
	
			var	mis_item_category_id = $("#mis_item_category_id_"+counter).val();
			var	mis_item_category_name = $("#mis_item_category_name_"+counter).val();
			
			var	mis_item_store_id = $("#mis_item_store_id_"+counter).val();
			var	mis_item_store_name = $("#mis_item_store_name_"+counter).val();
			
			var	mis_item_issue_qty = $("#mis_item_issue_qty_"+counter).val();
			var	mis_item_qty = $("#mis_item_qty_"+counter).val();
			
			var	mis_item_control_no = $("#mis_item_control_no_"+counter).val();
			var	mis_item_batch_no = $("#mis_item_batch_no_"+counter).val();
			var	mis_item_expire_date = $("#mis_item_expire_date_"+counter).val();
			
			var	mis_item_inventory_order_qty = $("#mis_item_inventory_qty_"+counter).val();
		
			var	mis_item_uom_id = $("#mis_item_uom_id_"+counter).val();
			var	mis_item_uom_name = $("#mis_item_uom_name_"+counter).val();
			
			var	table_count = $("#last_table_id").val();
			var	counter = parseInt(table_count)+ 1;
			
			/*alert(popup_item_id+','+mis_product_id+','+mis_item_code+','+mis_item_name+','+mis_item_sku+','+mis_item_category_id+','+mis_item_category_name+','+mis_item_store_id+','+mis_item_control_no+','+mis_item_batch_no+','+mis_item_expire_date);*/
			
			if(popup_item_id != itemid)	
			{	
				 i++;

				if(tax_value != 'nontaxable')
				{
				    	var items ='<tr><td><input id="item_id_'+counter+'" name="item_id['+counter+']" value="'+counter+'" type="hidden" class="quantity stock_text" readonly="readonly" /><a href="javascript:void(0);" >'+mis_item_sku+'</a><input id="mis_product_id_'+counter+'" name="mis_product_id['+counter+']" value="'+mis_product_id+'" type="hidden" class="quantity stock_text" /><input id="mis_product_sku_'+counter+'" name="mis_product_sku['+counter+']" value="'+mis_item_sku+'" type="hidden" /></td><td><a href="javascript:void(0);" >'+mis_item_name+'</a><input id="mis_item_name_'+counter+'" name="mis_item_name['+counter+']" value="'+mis_item_name+'" data-item="'+counter+'" type="hidden" class="quantity stock_text" /><input id="mis_item_code_'+counter+'" name="mis_item_code['+counter+']" value="'+mis_item_code+'" data-item="'+counter+'" type="hidden" /></td><td><a href="javascript:void(0);" >'+mis_item_category_name+'</a><input id="mis_item_category_id_'+counter+'" name="mis_item_category_id['+counter+']" value="'+mis_item_category_id+'" type="hidden" class="quantity stock_text" /><input id="mis_item_category_name_'+counter+'" name="mis_item_category_name['+counter+']" value="'+mis_item_category_name+'" type="hidden" class="quantity stock_text" /></td><td><a href="javascript:void(0);" >'+mis_item_control_no+'</a><input id="mis_item_control_no_'+counter+'" name="mis_item_control_no['+counter+']" value="'+mis_item_control_no+'" type="hidden" class="quantity stock_text" /></td><td><a href="javascript:void(0);" >'+mis_item_batch_no+'</a><input id="mis_item_batch_no_'+counter+'" name="mis_item_batch_no['+counter+']" value="'+mis_item_batch_no+'" type="hidden" class="quantity stock_text" /></td><td><a href="javascript:void(0);" >'+mis_item_store_name+'</a><input id="mis_item_store_id_'+counter+'" name="mis_item_store_id['+counter+']" value="'+mis_item_store_id+'" type="hidden" class="quantity stock_text" /><input id="mis_item_store_name_'+counter+'" name="mis_item_store_name['+counter+']" value="'+mis_item_store_name+'" type="hidden" class="quantity stock_text" /></td><td><input id="mis_item_issue_qty_'+counter+'" name="mis_item_issue_qty['+counter+']" value="'+mis_item_issue_qty+'" type="text" class="quantity stock_text" onkeyup="return onkeyupfortotal('+counter+')" /><input id="mis_item_inventory_order_qty_'+counter+'" name="mis_item_inventory_order_qty['+counter+']" value="'+mis_item_inventory_order_qty+'" type="hidden" class="quantity stock_text" /></td><td><a href="javascript:void(0);" >'+mis_item_uom_name+'</a><input id="mis_item_uom_id_'+counter+'" name="mis_item_uom_id['+counter+']" value="'+mis_item_uom_id+'" type="hidden" class="quantity stock_text" /><input id="mis_item_uom_name_'+counter+'" name="mis_item_uom_name['+counter+']" value="'+mis_item_uom_name+'" type="hidden" class="quantity stock_text" /></td><td><input id="mis_item_expire_date_'+counter+'" name="mis_item_expire_date['+counter+']" value="'+mis_item_expire_date+'" type="text" class="quantity stock_text" /></td><td colspan="2"><div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_delete_'+counter+'" onclick="return itemsgridmisdelete('+counter+');" data-item="'+mis_product_id+'" data-delete="'+counter+'" title="Delete"><span class="icon-trash"></span></div></td></tr>';
				}
				else
				{
						var items ='<tr><td><input id="item_id_'+counter+'" name="item_id['+counter+']" value="'+counter+'" type="hidden" class="quantity stock_text" readonly="readonly" /><a href="javascript:void(0);" >'+mis_item_sku+'</a><input id="mis_product_id_'+counter+'" name="mis_product_id['+counter+']" value="'+mis_product_id+'" type="hidden" class="quantity stock_text" /><input id="mis_product_sku_'+counter+'" name="mis_product_sku['+counter+']" value="'+mis_item_sku+'" type="hidden" /></td><td><a href="javascript:void(0);" >'+mis_item_name+'</a><input id="mis_item_name_'+counter+'" name="mis_item_name['+counter+']" value="'+mis_item_name+'" data-item="'+counter+'" type="hidden" class="quantity stock_text" /><input id="mis_item_code_'+counter+'" name="mis_item_code['+counter+']" value="'+mis_item_code+'" data-item="'+counter+'" type="hidden" /></td><td><a href="javascript:void(0);" >'+mis_item_category_name+'</a><input id="mis_item_category_id_'+counter+'" name="mis_item_category_id['+counter+']" value="'+mis_item_category_id+'" type="hidden" class="quantity stock_text" /><input id="mis_item_category_name_'+counter+'" name="mis_item_category_name['+counter+']" value="'+mis_item_category_name+'" type="hidden" class="quantity stock_text" /></td><td><a href="javascript:void(0);" >'+mis_item_control_no+'</a><input id="mis_item_control_no_'+counter+'" name="mis_item_control_no['+counter+']" value="'+mis_item_control_no+'" type="hidden" class="quantity stock_text" /></td><td><a href="javascript:void(0);" >'+mis_item_batch_no+'</a><input id="mis_item_batch_no_'+counter+'" name="mis_item_batch_no['+counter+']" value="'+mis_item_batch_no+'" type="hidden" class="quantity stock_text" /></td><td><a href="javascript:void(0);" >'+mis_item_store_name+'</a><input id="mis_item_store_id_'+counter+'" name="mis_item_store_id['+counter+']" value="'+mis_item_store_id+'" type="hidden" class="quantity stock_text" /><input id="mis_item_store_name_'+counter+'" name="mis_item_store_name['+counter+']" value="'+mis_item_store_name+'" type="hidden" class="quantity stock_text" /></td><td><input id="mis_item_issue_qty_'+counter+'" name="mis_item_issue_qty['+counter+']" value="'+mis_item_issue_qty+'" type="text" class="quantity stock_text" onkeyup="return onkeyupfortotal('+counter+')" /><input id="mis_item_inventory_order_qty_'+counter+'" name="mis_item_inventory_order_qty['+counter+']" value="'+mis_item_inventory_order_qty+'" type="hidden" class="quantity stock_text" /></td><td><a href="javascript:void(0);" >'+mis_item_uom_name+'</a><input id="mis_item_uom_id_'+counter+'" name="mis_item_uom_id['+counter+']" value="'+mis_item_uom_id+'" type="hidden" class="quantity stock_text" /><input id="mis_item_uom_name_'+counter+'" name="mis_item_uom_name['+counter+']" value="'+mis_item_uom_name+'" type="hidden" class="quantity stock_text" /></td><td><input id="mis_item_expire_date_'+counter+'" name="mis_item_expire_date['+counter+']" value="'+mis_item_expire_date+'" type="text" class="quantity stock_text" /></td><td colspan="2"><div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_delete_'+counter+'" onclick="return itemsgridmisdelete('+counter+');" data-item="'+mis_product_id+'" data-delete="'+counter+'" title="Delete"><span class="icon-trash"></span></div></td></tr>';
				}
				  newarray = newarray.concat(items);
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


function itemsgridrowdelete_region(id)
{
	sure = confirm('Are you sure to Delete?');
	
  	if(sure == true) 
  	{
		
		var login_company_id = $("#login_company_id").val();
		var tax_value = $("#tax_value").val();
		
		var deleteid = $("#itemsgrid_delete_"+id).attr('data-delete');
		var itemid = $("#itemsgrid_delete_"+id).attr('data-item');
		
		var myarray = new Array();
		
		$('input[name^="item_id"]').each(function() {
   			myarray.push($(this).val());			
		});
		
		length = $("#last_table_id").val();
		
		var newarray = "";
		
		var i = 0;
		for(var counter=1; counter<=length; counter++)
		{
			var	popup_item_id = $("#item_id_"+counter).val();
			var	popup_item_code = $("#item_code_"+counter).val();
			var	popup_item_name = $("#item_name_"+counter).val();
			var	popup_item_mfg_prtno = $("#item_mfg_prtno_"+counter).val();
			
			var	popup_item_uom_name  = $("#item_uom_name_"+counter).val();
			var	popup_item_uom_id  = $("#item_uom_id_"+counter).val();
			var	popup_item_mrp  = $("#item_mrp_"+counter).val();
			var	popup_item_priceperunit  = $("#item_priceperunit_"+counter).val();
			var	popup_item_qty  = $("#item_qty_"+counter).val();
			var	popup_gross_amount  = $("#item_gross_amount_"+counter).val();
			var	item_tax_percent  = $("#item_tax_percent_"+counter).val();
			var	item_tax_amount  = $("#item_tax_amount_"+counter).val();
			var	popup_item_discount_percent  = $("#item_discount_percent_"+counter).val();
			var	item_discount_amount  = $("#item_discount_amount_"+counter).val();
			var	item_flat_discount  = $("#item_flat_discount_"+counter).val();
			//alert(popup_item_discount_percent);
			var	item_net_amount  = $("#item_net_amount_"+counter).val();
			var	popup_item_inv_id  = $("#item_inv_id_"+counter).val();
			var	popup_item_inv_qty  = $("#item_inv_qty_"+counter).val();
			
			var	popup_item_vat  = $("#item_vat_"+counter).val();
			var	popup_item_gst  = $("#item_gst_"+counter).val();
			var	popup_item_cst  = $("#item_cst_"+counter).val();
			var	popup_item_serv_tax  = $("#item_serv_tax_"+counter).val();
			var	popup_item_exc  = $("#item_exc_"+counter).val();
			
			
			if(popup_item_id != itemid)	
			{	
				 i++;
				 
				if(tax_value != 'nontaxable')
				{
				 var items ='<tr><td><a href="javascript:void(0);" id="'+i+'">'+i+'</a></td><td><a href="javascript:void(0);" id="item_code_value_'+i+'">'+popup_item_code+'</a><input id="item_code_'+i+'" name="item_code['+i+']" value="'+popup_item_code+'" type="hidden" /><input id="item_id_'+i+'" name="item_id['+i+']" value="'+popup_item_id+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_mfg_prtno_value_'+i+'">'+popup_item_mfg_prtno+'</a><input id="item_mfg_prtno_'+i+'" name="item_mfg_prtno['+i+']" value="'+popup_item_mfg_prtno+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_name_value_'+i+'">'+popup_item_name+'</a><input id="item_name_'+i+'" name="item_name['+i+']" value="'+popup_item_name+'" type="hidden" /></td><td><input id="item_uom_id_'+i+'" name="item_uom_id['+i+']" type="hidden" value="'+popup_item_uom_id+'" /><input id="item_uom_name_'+i+'" name="item_uom_name['+i+']" type="hidden" value="'+popup_item_uom_name+'" /><input id="item_mrp_'+i+'" name="item_mrp['+i+']" type="hidden" value="'+popup_item_mrp+'" /><a href="javascript:void(0);" >'+popup_item_mrp+'</a></td><td><a href="javascript:void(0);" id="item_priceperunit_value_'+i+'">'+popup_item_priceperunit+'</a><input  id="item_priceperunit_'+i+'" name="item_priceperunit['+i+']" value="'+popup_item_priceperunit+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_qty_value_'+i+'">'+popup_item_qty+'</a><input id="item_inv_id_'+i+'" name="item_inv_id['+i+']" type="hidden" value="'+popup_item_inv_id+'" /><input id="item_inv_qty_'+i+'" name="item_inv_qty['+i+']" type="hidden" value="'+popup_item_inv_qty+'" /><input id="item_qty_'+i+'" class="quantity" name="item_qty['+i+']" value="'+popup_item_qty+'" type="hidden" /></td><td><input id="item_gross_amount_'+i+'" name="item_gross_amount['+i+']" value="'+popup_gross_amount+'" type="hidden" /><a href="javascript:void(0);" id="item_discount_percent_value_'+i+'">'+popup_item_discount_percent+'</a><input id="item_discount_percent_'+i+'" name="item_discount_percent['+i+']" value="'+popup_item_discount_percent+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_discount_flat_value_'+i+'">'+item_flat_discount+'</a><input id="item_flat_discount_'+i+'" name="item_flat_discount['+i+']" value="'+item_flat_discount+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_discount_amount_value_'+i+'">'+item_discount_amount+'</a><input id="item_discount_amount_'+i+'" name="item_discount_amount['+i+']" value="'+item_discount_amount+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_tax_percent_value_'+i+'">'+item_tax_percent+'</a><input id="item_tax_percent_'+i+'" name="item_tax_percent['+i+']" value="'+item_tax_percent+'" type="hidden" /><input id="item_vat_'+i+'" name="item_vat['+i+']" value="'+popup_item_vat+'" type="hidden" /><input id="item_gst_'+i+'" name="item_gst['+i+']" value="'+popup_item_gst+'" type="hidden" /><input id="item_cst_'+i+'" name="item_cst['+i+']" value="'+popup_item_cst+'" type="hidden" /><input id="item_serv_tax_'+i+'" name="item_serv_tax['+i+']" value="'+popup_item_serv_tax+'" type="hidden" /><input id="item_exc_'+i+'" name="item_exc['+i+']" value="'+popup_item_exc+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_tax_amount_value_'+i+'">'+item_tax_amount+'</a><input id="item_tax_amount_'+i+'" name="item_tax_amount['+i+']" value="'+item_tax_amount+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_net_amount_value_'+i+'">'+popup_gross_amount+'</a><input id="item_net_amount_'+i+'" name="item_net_amount['+i+']" value="'+item_net_amount+'" type="hidden" /></td><td colspan="2"><div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_delete_'+i+'" onclick="return itemsgridrowdelete_region('+i+');" data-item="'+popup_item_id+'" data-delete="'+i+'" title="Delete"><span class="icon-trash"></span></div></td></tr>';
				}
				else
				{
					var items ='<tr><td><a href="javascript:void(0);" id="'+i+'">'+i+'</a></td><td><a href="javascript:void(0);" id="item_code_value_'+i+'">'+popup_item_code+'</a><input id="item_code_'+i+'" name="item_code['+i+']" value="'+popup_item_code+'" type="hidden" /><input id="item_id_'+i+'" name="item_id['+i+']" value="'+popup_item_id+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_mfg_prtno_value_'+i+'">'+popup_item_mfg_prtno+'</a><input id="item_mfg_prtno_'+i+'" name="item_mfg_prtno['+i+']" value="'+popup_item_mfg_prtno+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_name_value_'+i+'">'+popup_item_name+'</a><input id="item_name_'+i+'" name="item_name['+i+']" value="'+popup_item_name+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_uom_name_value_'+i+'">'+popup_item_uom_name+'</a><input id="item_uom_id_'+i+'" name="item_uom_id['+i+']" type="hidden" value="'+popup_item_uom_id+'" /><input id="item_uom_name_'+i+'" name="item_uom_name['+i+']" type="hidden" value="'+popup_item_uom_name+'" /></td><td><a href="javascript:void(0);" id="item_priceperunit_value_'+i+'">'+popup_item_priceperunit+'</a><input id="item_priceperunit_'+i+'" name="item_priceperunit['+i+']" value="'+popup_item_priceperunit+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_qty_value_'+i+'">'+popup_item_qty+'</a><input id="item_inv_id_'+i+'" name="item_inv_id['+i+']" type="hidden" value="'+popup_item_inv_id+'" /><input id="item_inv_qty_'+i+'" name="item_inv_qty['+i+']" type="hidden" value="'+popup_item_inv_qty+'" /><input id="item_qty_'+i+'" class="quantity" name="item_qty['+i+']" value="'+popup_item_qty+'" type="hidden" /></td><input id="item_gross_amount_'+i+'" name="item_gross_amount['+i+']" value="'+popup_gross_amount+'" type="hidden" /><input id="item_tax_percent_'+i+'" name="item_tax_percent['+i+']" value="'+item_tax_percent+'" type="hidden" /><input id="item_vat_'+i+'" name="item_vat['+i+']" value="'+popup_item_vat+'" type="hidden" /><input id="item_gst_'+i+'" name="item_gst['+i+']" value="'+popup_item_gst+'" type="hidden" /><input id="item_cst_'+i+'" name="item_cst['+i+']" value="'+popup_item_cst+'" type="hidden" /><input id="item_serv_tax_'+i+'" name="item_serv_tax['+i+']" value="'+popup_item_serv_tax+'" type="hidden" /><input id="item_exc_'+i+'" name="item_exc['+i+']" value="'+popup_item_exc+'" type="hidden" /><input id="item_tax_amount_'+i+'" name="item_tax_amount['+i+']" value="'+item_tax_amount+'" type="hidden" /><td><a href="javascript:void(0);" id="item_discount_percent_value_'+i+'">'+popup_item_discount_percent+'</a><input id="item_discount_percent_'+i+'" name="item_discount_percent['+i+']" value="'+popup_item_discount_percent+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_discount_flat_value_'+i+'">'+item_flat_discount+'</a><input id="item_flat_discount_'+i+'" name="item_flat_discount['+i+']" value="'+item_flat_discount+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_discount_amount_value_'+i+'">'+item_discount_amount+'</a><input id="item_discount_amount_'+i+'" name="item_discount_amount['+i+']" value="'+item_discount_amount+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_net_amount_value_'+i+'">'+popup_gross_amount+'</a><input id="item_net_amount_'+i+'" name="item_net_amount['+i+']" value="'+item_net_amount+'" type="hidden" /></td><td colspan="2"><div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_delete_'+i+'" onclick="return itemsgridrowdelete_region('+i+');" data-item="'+popup_item_id+'" data-delete="'+i+'" title="Delete"><span class="icon-trash"></span></div></td></tr>';
				}
				  
				  newarray = newarray.concat(items);
			}
			else
			{
				
			}
		}
		$("#last_table_id").val(i);
		$('#disp_items').html(newarray);
		
		$("#total_shipping_charges").val("");
		$("#total_shipping_tax").val("");
		$("#total_adjustments").val("");
		$("#grand_total").val("");
				
		return calculatetotal_salesreturn();
		
		return false;
    }
  	else 
  	{
      return false;
    }
	
}
function instantitemsgridrowdelete(id)
{
	sure = confirm('Are you sure to Delete?');
	
  	if(sure == true) 
  	{
		
		var login_company_id = $("#login_company_id").val();
		var tax_value = $("#tax_value").val();
		
		var deleteid = $("#itemsgrid_delete_"+id).attr('data-delete');
		var itemid = $("#itemsgrid_delete_"+id).attr('data-item');
		
		var myarray = new Array();
		
		$('input[name^="item_id"]').each(function() {
   			myarray.push($(this).val());			
		});
		
		length = $("#last_table_id").val();
		
		var newarray = "";
		
		var i = 0;
		for(var counter=1; counter<=length; counter++)
		{
			var	popup_item_id = $("#item_id_"+counter).val();
			var	popup_item_code = $("#item_code_"+counter).val();
			var	popup_item_name = $("#item_name_"+counter).val();
			var	popup_item_mfg_prtno = $("#item_mfg_prtno_"+counter).val();
			
			var	popup_item_uom_name  = $("#item_uom_name_"+counter).val();
			var	popup_item_uom_id  = $("#item_uom_id_"+counter).val();
			var	popup_item_priceperunit  = $("#item_priceperunit_"+counter).val();
			var	popup_item_qty  = $("#item_qty_"+counter).val();
			var	popup_gross_amount  = $("#item_gross_amount_"+counter).val();
			var	item_tax_percent  = $("#item_tax_percent_"+counter).val();
			var	item_tax_amount  = $("#item_tax_amount_"+counter).val();
			var	popup_item_discount_percent  = $("#item_discount_percent_"+counter).val();
			var	item_discount_amount  = $("#item_discount_amount_"+counter).val();
			var	item_flat_discount  = $("#item_flat_discount_"+counter).val();
			var	item_flat_discount  = $("#item_flat_discount_"+counter).val();
			var	item_net_amount  = $("#item_net_amount_"+counter).val();
			var	popup_item_inv_id  = $("#item_inv_id_"+counter).val();
			var	popup_item_inv_qty  = $("#item_inv_qty_"+counter).val();
			
			var	popup_item_vat  = $("#item_vat_"+counter).val();
			var	popup_item_gst  = $("#item_gst_"+counter).val();
			var	popup_item_cst  = $("#item_cst_"+counter).val();
			var	popup_item_serv_tax  = $("#item_serv_tax_"+counter).val();
			var	popup_item_exc  = $("#item_exc_"+counter).val();
			
			
			if(popup_item_id != itemid)	
			{	
				 i++;
				 
				if(tax_value != 'nontaxable')
				{
				 var items ='<tr><td><a href="javascript:void(0);" id="item_code_value_'+i+'">'+popup_item_code+'</a><input id="item_code_'+i+'" name="item_code['+i+']" value="'+popup_item_code+'" type="hidden" /><input id="item_id_'+i+'" name="item_id['+i+']" value="'+popup_item_id+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_mfg_prtno_value_'+i+'">'+popup_item_mfg_prtno+'</a><input id="item_mfg_prtno_'+i+'" name="item_mfg_prtno['+i+']" value="'+popup_item_mfg_prtno+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_name_value_'+i+'">'+popup_item_name+'</a><input id="item_name_'+i+'" name="item_name['+i+']" value="'+popup_item_name+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_uom_name_value_'+i+'">'+popup_item_uom_name+'</a><input id="item_uom_id_'+i+'" name="item_uom_id['+i+']" type="hidden" value="'+popup_item_uom_id+'" /><input id="item_uom_name_'+i+'" name="item_uom_name['+i+']" type="hidden" value="'+popup_item_uom_name+'" /></td><td><a href="javascript:void(0);" id="item_priceperunit_value_'+i+'">'+popup_item_priceperunit+'</a><input  id="item_priceperunit_'+i+'" name="item_priceperunit['+i+']" value="'+popup_item_priceperunit+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_qty_value_'+i+'">'+popup_item_qty+'</a><input id="item_inv_id_'+i+'" name="item_inv_id['+i+']" type="hidden" value="'+popup_item_inv_id+'" /><input id="item_inv_qty_'+i+'" name="item_inv_qty['+i+']" type="hidden" value="'+popup_item_inv_qty+'" /><input id="item_qty_'+i+'" class="quantity" name="item_qty['+i+']" value="'+popup_item_qty+'" type="hidden" /></td><td><input id="item_gross_amount_'+i+'" name="item_gross_amount['+i+']" value="'+popup_gross_amount+'" type="hidden" /><a href="javascript:void(0);" id="item_discount_percent_value_'+i+'">'+popup_item_discount_percent+'</a><input id="item_discount_percent_'+i+'" name="item_discount_percent['+i+']" value="'+popup_item_discount_percent+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_discount_flat_value_'+i+'">'+item_flat_discount+'</a><input id="item_flat_discount_'+i+'" name="item_flat_discount['+i+']" value="'+item_flat_discount+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_discount_amount_value_'+i+'">'+item_discount_amount+'</a><input id="item_discount_amount_'+i+'" name="item_discount_amount['+i+']" value="'+item_discount_amount+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_tax_percent_value_'+i+'">'+item_tax_percent+'</a><input id="item_tax_percent_'+i+'" name="item_tax_percent['+i+']" value="'+item_tax_percent+'" type="hidden" /><input id="item_vat_'+i+'" name="item_vat['+i+']" value="'+popup_item_vat+'" type="hidden" /><input id="item_gst_'+i+'" name="item_gst['+i+']" value="'+popup_item_gst+'" type="hidden" /><input id="item_cst_'+i+'" name="item_cst['+i+']" value="'+popup_item_cst+'" type="hidden" /><input id="item_serv_tax_'+i+'" name="item_serv_tax['+i+']" value="'+popup_item_serv_tax+'" type="hidden" /><input id="item_exc_'+i+'" name="item_exc['+i+']" value="'+popup_item_exc+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_tax_amount_value_'+i+'">'+item_tax_amount+'</a><input id="item_tax_amount_'+i+'" name="item_tax_amount['+i+']" value="'+item_tax_amount+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_net_amount_value_'+i+'">'+item_net_amount+'</a><input id="item_net_amount_'+i+'" name="item_net_amount['+i+']" value="'+item_net_amount+'" type="hidden" /></td><td colspan="2"><div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_delete_'+i+'" onclick="return instantitemsgridrowdelete('+i+');" data-item="'+popup_item_id+'" data-delete="'+i+'" title="Delete"><span class="icon-trash"></span></div></td></tr>';
				}
				else
				{
					var items ='<tr><td><a href="javascript:void(0);" id="item_code_value_'+i+'">'+popup_item_code+'</a><input id="item_code_'+i+'" name="item_code['+i+']" value="'+popup_item_code+'" type="hidden" /><input id="item_id_'+i+'" name="item_id['+i+']" value="'+popup_item_id+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_model_value_'+i+'">'+popup_item_model+'</a><input id="item_model_'+i+'" name="item_model['+i+']" value="'+popup_item_model+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_name_value_'+i+'">'+popup_item_name+'</a><input id="item_name_'+i+'" name="item_name['+i+']" value="'+popup_item_name+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_uom_name_value_'+i+'">'+popup_item_uom_name+'</a><input id="item_uom_id_'+i+'" name="item_uom_id['+i+']" type="hidden" value="'+popup_item_uom_id+'" /><input id="item_uom_name_'+i+'" name="item_uom_name['+i+']" type="hidden" value="'+popup_item_uom_name+'" /></td><td><a href="javascript:void(0);" id="item_priceperunit_value_'+i+'">'+popup_item_priceperunit+'</a><input id="item_priceperunit_'+i+'" name="item_priceperunit['+i+']" value="'+popup_item_priceperunit+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_qty_value_'+i+'">'+popup_item_qty+'</a><input id="item_inv_id_'+i+'" name="item_inv_id['+i+']" type="hidden" value="'+popup_item_inv_id+'" /><input id="item_inv_qty_'+i+'" name="item_inv_qty['+i+']" type="hidden" value="'+popup_item_inv_qty+'" /><input id="item_qty_'+i+'" class="quantity" name="item_qty['+i+']" value="'+popup_item_qty+'" type="hidden" /></td><td><input id="item_gross_amount_'+i+'" name="item_gross_amount['+i+']" value="'+popup_gross_amount+'" type="hidden" /><input id="item_tax_percent_'+i+'" name="item_tax_percent['+i+']" value="'+item_tax_percent+'" type="hidden" /><input id="item_vat_'+i+'" name="item_vat['+i+']" value="'+popup_item_vat+'" type="hidden" /><input id="item_gst_'+i+'" name="item_gst['+i+']" value="'+popup_item_gst+'" type="hidden" /><input id="item_cst_'+i+'" name="item_cst['+i+']" value="'+popup_item_cst+'" type="hidden" /><input id="item_serv_tax_'+i+'" name="item_serv_tax['+i+']" value="'+popup_item_serv_tax+'" type="hidden" /><input id="item_exc_'+i+'" name="item_exc['+i+']" value="'+popup_item_exc+'" type="hidden" /><input id="item_tax_amount_'+i+'" name="item_tax_amount['+i+']" value="'+item_tax_amount+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_discount_percent_value_'+i+'">'+popup_item_discount_percent+'</a><input id="item_discount_percent_'+i+'" name="item_discount_percent['+i+']" value="'+popup_item_discount_percent+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_discount_flat_value_'+i+'">'+item_flat_discount+'</a><input id="item_flat_discount_'+i+'" name="item_flat_discount['+i+']" value="'+item_flat_discount+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_discount_amount_value_'+i+'">'+item_discount_amount+'</a><input id="item_discount_amount_'+i+'" name="item_discount_amount['+i+']" value="'+item_discount_amount+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_net_amount_value_'+i+'">'+item_net_amount+'</a><input id="item_net_amount_'+i+'" name="item_net_amount['+i+']" value="'+item_net_amount+'" type="hidden" /></td><td colspan="2"><div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_delete_'+i+'" onclick="return instantitemsgridrowdelete('+i+');" data-item="'+popup_item_id+'" data-delete="'+i+'" title="Delete"><span class="icon-trash"></span></div></td></tr>';
				}
				  
				  newarray = newarray.concat(items);
			}
			else
			{
				
			}
		}
		$("#last_table_id").val(i);
		$('#disp_items').html(newarray);
		
		$("#total_shipping_charges").val("");
		$("#total_shipping_tax").val("");
		$("#total_adjustments").val("");
		$("#grand_total").val("");
				
		return calculatetotal();
		
		return false;
    }
  	else 
  	{
      return false;
    }
	
}
function vendoritemsgridrowdelete(id)
{
	sure = confirm('Are you sure to Delete?');
	
  	if(sure == true) 
  	{
		
		var login_company_id = $("#login_company_id").val();
		var tax_value = $("#tax_value").val();
		
		var deleteid = $("#itemsgrid_delete_"+id).attr('data-delete');
		var itemid = $("#itemsgrid_delete_"+id).attr('data-item');
		
		var myarray = new Array();
		
		$('input[name^="item_id"]').each(function() {
   			myarray.push($(this).val());			
		});
		
		length = $("#last_table_id").val();
		
		var newarray = "";
		
		var i = 0;
		for(var counter=1; counter<=length; counter++)
		{
			var	popup_item_id = $("#item_id_"+counter).val();
			var	popup_item_code = $("#item_code_"+counter).val();
			var	popup_item_name = $("#item_name_"+counter).val();
			var	popup_item_mfg_prtno = $("#item_mfg_prtno_"+counter).val();
			
			var	popup_item_uom_name  = $("#item_uom_name_"+counter).val();
			var	popup_item_uom_id  = $("#item_uom_id_"+counter).val();
			var	popup_item_priceperunit  = $("#item_priceperunit_"+counter).val();
			var	popup_item_qty  = $("#item_qty_"+counter).val();
			var	popup_gross_amount  = $("#item_gross_amount_"+counter).val();
			var	item_tax_percent  = $("#item_tax_percent_"+counter).val();
			var	item_tax_amount  = $("#item_tax_amount_"+counter).val();
			var	popup_item_discount_percent  = $("#item_discount_percent_"+counter).val();
			var	item_discount_amount  = $("#item_discount_amount_"+counter).val();
			//var	item_flat_discount  = $("#item_flat_discount_"+counter).val();
			//alert(popup_item_qty);
			//alert(popup_gross_amount);
			var	item_net_amount  = $("#item_net_amount_"+counter).val();
			var	popup_item_inv_id  = $("#item_inv_id_"+counter).val();
			var	popup_item_inv_qty  = $("#item_inv_qty_"+counter).val();
			
			var	popup_item_vat  = $("#item_vat_"+counter).val();
			var	popup_item_gst  = $("#item_gst_"+counter).val();
			var	popup_item_cst  = $("#item_cst_"+counter).val();
			var	popup_item_serv_tax  = $("#item_serv_tax_"+counter).val();
			var	popup_item_exc  = $("#item_exc_"+counter).val();
			
			
			if(popup_item_id != itemid)	
			{	
				 i++;
				 
				if(tax_value != 'nontaxable')
				{
				 var items ='<tr><td><a href="javascript:void(0);" >'+popup_item_code+'</a><input id="item_code_'+i+'" name="item_code['+i+']" value="'+popup_item_code+'" type="hidden" /><input id="item_id_'+i+'" name="item_id['+i+']" value="'+popup_item_id+'" type="hidden" /></td><td><a href="javascript:void(0);" >'+popup_item_mfg_prtno+'</a><input id="item_mfg_prtno_'+i+'" name="item_mfg_prtno['+i+']" value="'+popup_item_mfg_prtno+'" type="hidden" /></td><td><a href="javascript:void(0);" >'+popup_item_name+'</a><input id="item_name_'+i+'" name="item_name['+i+']" value="'+popup_item_name+'" type="hidden" /></td><td><a href="javascript:void(0);" >'+popup_item_uom_name+'</a><input id="item_uom_id_'+i+'" name="item_uom_id['+i+']" type="hidden" value="'+popup_item_uom_id+'" /><input id="item_uom_name_'+i+'" name="item_uom_name['+i+']" type="hidden" value="'+popup_item_uom_name+'" /></td><td><a href="javascript:void(0);" >'+popup_item_priceperunit+'</a><input  id="item_priceperunit_'+i+'" name="item_priceperunit['+i+']" value="'+popup_item_priceperunit+'" type="hidden" /></td><td><a href="javascript:void(0);" >'+popup_item_qty+'</a><input id="item_inv_id_'+i+'" name="item_inv_id['+i+']" type="hidden" value="'+popup_item_inv_id+'" /><input id="item_inv_qty_'+i+'" name="item_inv_qty['+i+']" type="hidden" value="'+popup_item_inv_qty+'" /><input id="item_qty_'+i+'" class="quantity" name="item_qty['+i+']" value="'+popup_item_qty+'" type="hidden" /></td><td><a href="javascript:void(0);" >'+popup_gross_amount+'</a><input id="item_gross_amount_'+i+'" name="item_gross_amount['+i+']" value="'+popup_gross_amount+'" type="hidden" /></td><td><a href="javascript:void(0);" >'+popup_item_discount_percent+'</a><input id="item_discount_percent_'+i+'" name="item_discount_percent['+i+']" value="'+popup_item_discount_percent+'" type="hidden" /></td><td><a href="javascript:void(0);" >'+item_discount_amount+'</a><input id="item_discount_amount_'+i+'" name="item_discount_amount['+i+']" value="'+item_discount_amount+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_tax_percent_value_'+i+'">'+item_tax_percent+'</a><input id="item_tax_percent_'+i+'" name="item_tax_percent['+i+']" value="'+item_tax_percent+'" type="hidden" /><input id="item_vat_'+i+'" name="item_vat['+i+']" value="'+popup_item_vat+'" type="hidden" /><input id="item_gst_'+i+'" name="item_gst['+i+']" value="'+popup_item_gst+'" type="hidden" /><input id="item_cst_'+i+'" name="item_cst['+i+']" value="'+popup_item_cst+'" type="hidden" /><input id="item_serv_tax_'+i+'" name="item_serv_tax['+i+']" value="'+popup_item_serv_tax+'" type="hidden" /><input id="item_exc_'+i+'" name="item_exc['+i+']" value="'+popup_item_exc+'" type="hidden" /></td><td><a href="javascript:void(0);" >'+item_tax_amount+'</a><input id="item_tax_amount_'+i+'" name="item_tax_amount['+i+']" value="'+item_tax_amount+'" type="hidden" /></td><td><a href="javascript:void(0);" >'+item_net_amount+'</a><input id="item_net_amount_'+i+'" name="item_net_amount['+i+']" value="'+item_net_amount+'" type="hidden" /></td><td colspan="2"><div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_delete_'+i+'" onclick="return vendoritemsgridrowdelete('+i+');" data-item="'+popup_item_id+'" data-delete="'+i+'" title="Delete"><span class="icon-trash"></span></div></td></tr>';
				}
				else
				{
					var items ='<tr><td><a href="javascript:void(0);" >'+popup_item_code+'</a><input id="item_code_'+i+'" name="item_code['+i+']" value="'+popup_item_code+'" type="hidden" /><input id="item_id_'+i+'" name="item_id['+i+']" value="'+popup_item_id+'" type="hidden" /></td><td><a href="javascript:void(0);" >'+popup_item_model+'</a><input id="item_model_'+i+'" name="item_model['+i+']" value="'+popup_item_model+'" type="hidden" /></td><td><a href="javascript:void(0);" >'+popup_item_name+'</a><input id="item_name_'+i+'" name="item_name['+i+']" value="'+popup_item_name+'" type="hidden" /></td><td><a href="javascript:void(0);" >'+popup_item_uom_name+'</a><input id="item_uom_id_'+i+'" name="item_uom_id['+i+']" type="hidden" value="'+popup_item_uom_id+'" /><input id="item_uom_name_'+i+'" name="item_uom_name['+i+']" type="hidden" value="'+popup_item_uom_name+'" /></td><td><a href="javascript:void(0);" >'+popup_item_priceperunit+'</a><input id="item_priceperunit_'+i+'" name="item_priceperunit['+i+']" value="'+popup_item_priceperunit+'" type="hidden" /></td><td><a href="javascript:void(0);">'+popup_item_qty+'</a><input id="item_inv_id_'+i+'" name="item_inv_id['+i+']" type="hidden" value="'+popup_item_inv_id+'" /><input id="item_inv_qty_'+i+'" name="item_inv_qty['+i+']" type="hidden" value="'+popup_item_inv_qty+'" /><input id="item_qty_'+i+'" class="quantity" name="item_qty['+i+']" value="'+popup_item_qty+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_gross_amount_'+i+'">'+popup_gross_amount+'</a><input id="item_gross_amount_'+i+'" name="item_gross_amount['+i+']" value="'+popup_gross_amount+'" type="hidden" /></td><td><input id="item_tax_percent_'+i+'" name="item_tax_percent['+i+']" value="'+item_tax_percent+'" type="hidden" /><input id="item_vat_'+i+'" name="item_vat['+i+']" value="'+popup_item_vat+'" type="hidden" /><input id="item_gst_'+i+'" name="item_gst['+i+']" value="'+popup_item_gst+'" type="hidden" /><input id="item_cst_'+i+'" name="item_cst['+i+']" value="'+popup_item_cst+'" type="hidden" /><input id="item_serv_tax_'+i+'" name="item_serv_tax['+i+']" value="'+popup_item_serv_tax+'" type="hidden" /><input id="item_exc_'+i+'" name="item_exc['+i+']" value="'+popup_item_exc+'" type="hidden" /><input id="item_tax_amount_'+i+'" name="item_tax_amount['+i+']" value="'+item_tax_amount+'" type="hidden" /></td><td><a href="javascript:void(0);" >'+popup_item_discount_percent+'</a><input id="item_discount_percent_'+i+'" name="item_discount_percent['+i+']" value="'+popup_item_discount_percent+'" type="hidden" /></td><td><a href="javascript:void(0);" >'+item_flat_discount+'</a><input id="item_flat_discount_'+i+'" name="item_flat_discount['+i+']" value="'+item_flat_discount+'" type="hidden" /></td><td><a href="javascript:void(0);" >'+item_discount_amount+'</a><input id="item_discount_amount_'+i+'" name="item_discount_amount['+i+']" value="'+item_discount_amount+'" type="hidden" /></td><td><a href="javascript:void(0);">'+item_net_amount+'</a><input id="item_net_amount_'+i+'" name="item_net_amount['+i+']" value="'+item_net_amount+'" type="hidden" /></td><td colspan="2"><div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_delete_'+i+'" onclick="return vendoritemsgridrowdelete('+i+');" data-item="'+popup_item_id+'" data-delete="'+i+'" title="Delete"><span class="icon-trash"></span></div></td></tr>';
				}
				  
				  newarray = newarray.concat(items);
			}
			else
			{
				
			}
		}
		$("#last_table_id").val(i);
		$('#disp_items').html(newarray);
		
		$("#total_shipping_charges").val("");
		$("#total_shipping_tax").val("");
		$("#total_adjustments").val("");
		$("#grand_total").val("");
				
		return calculatetotal();
		
		return false;
    }
  	else 
  	{
      return false;
    }
	
}

function calculatetotal()
{
	
	$('#tax_group_calculation').html('');
	
	group_tax_calculation();
	
	var	table_count = $("#last_table_id").val();
	$("#total_quantity_items").val(table_count);
	
	var total_incentive_amount = 0;
	$('input[name^="tax_group_total_incentive_amount"]').each(function()
	{
			var item_incentive_amount = $(this).val();
			total_incentive_amount = (parseFloat(total_incentive_amount) + parseFloat(item_incentive_amount)).toFixed(2);
	});
	 $("#total_incentive_amount").val(total_incentive_amount);
	
	var total_gross_amount = 0;
	$('input[name^="tax_group_gross_amount"]').each(function()
	{
			var item_gross_amount = $(this).val();
			total_gross_amount = (parseFloat(total_gross_amount) + parseFloat(item_gross_amount)).toFixed(2);
	});
	 $("#total_gross_amount").val(total_gross_amount);
	
	 var total_tax_amount = 0;
	$('input[name^="tax_group_tax_amount"]').each(function()
	{
			var item_tax_amount = $(this).val();
			total_tax_amount = (parseFloat(total_tax_amount) + parseFloat(item_tax_amount)).toFixed(2);
	});
	$("#total_tax_amount").val(total_tax_amount); 
			
	var total_disocunts_amount = 0;
	$('input[name^="tax_group_discount_amount"]').each(function()
	{
			var item_discount_amount = $(this).val();
			total_disocunts_amount = (parseFloat(total_disocunts_amount) + parseFloat(item_discount_amount)).toFixed(2);
	});
	
	var total_damage_discount_amount = 0;
	$('input[name^="tax_group_damage_discount_amount"]').each(function()
	{
			var item_damage_discount_amount = $(this).val();
			total_damage_discount_amount = (parseFloat(total_damage_discount_amount) + parseFloat(item_damage_discount_amount)).toFixed(2);
	});
	//alert(total_damage_discount_amount);
	
		var total_flat_disocunts_amount = 0;
	$('input[name^="tax_group_flat_amount"]').each(function()
	{
			var item_flat_discount_amount = $(this).val();
			total_flat_disocunts_amount = (parseFloat(total_flat_disocunts_amount) + parseFloat(item_flat_discount_amount)).toFixed(2);
	});
	
	//alert(total_flat_disocunts_amount);
	
	var tax_group_cash_discount_amount = 0;
	$('input[name^="tax_group_cash_discount_amount"]').each(function()
	{
			var item_discount_amount = $(this).val();
			total_disocunts_amount = (parseFloat(total_disocunts_amount) + parseFloat(item_discount_amount) ).toFixed(2);
	});
	
		/*var tax_group_cash_discount_amount = 0;
	$('input[name^="tax_group_cash_discount_amount"]').each(function()
	{
			var item_discount_amount = $(this).val();
			total_disocunts_amount = (parseFloat(total_disocunts_amount) + parseFloat(item_discount_amount)).toFixed(2);
	});*/
	total_disocunts_amount = (parseFloat(total_disocunts_amount) + parseFloat(total_flat_disocunts_amount)+ parseFloat(total_damage_discount_amount)).toFixed(2);
	 $("#total_disocunts_amount").val(total_disocunts_amount + tax_group_cash_discount_amount);
	 
	
	if($('#total_gross_amount').val() != "")
	{
		var grand_total_gross_amount = isNaN($('#total_gross_amount').val()) ? 0 : $('#total_gross_amount').val();
	}
	else
	{
		var grand_total_gross_amount = 0.00;
	}
	
	if($('#total_disocunts_amount').val() != "")
	{
		var grand_total_disocunts_amount = isNaN($('#total_disocunts_amount').val()) ? 0 : $('#total_disocunts_amount').val();
	}
	else
	{
		var grand_total_disocunts_amount = 0.00;
	}
	
	if($('#total_tax_amount').val() != "")
	{
		var grand_total_tax_amount = isNaN($('#total_tax_amount').val()) ? 0 : $('#total_tax_amount').val();
	}
	else
	{
		var grand_total_tax_amount = 0.00;
	}
	
	if($('#total_shipping_charges').val() != "")
	{
		var grand_total_shipping_charges = isNaN($('#total_shipping_charges').val()) ? 0 : $('#total_shipping_charges').val();
	}
	else
	{
		var grand_total_shipping_charges = 0.00;
	}
	
	if($('#total_tds').val() != "" || $('#total_tds').val() < 0)
	{				
		var tds = isNaN($('#total_tds').val()) ? 0 : $('#total_tds').val();			
	}
	else
	{
		var tds = 0.00;		
	}
	
	if(total_gross_amount != "")
	{
		var result = ((parseFloat(grand_total_gross_amount) - parseFloat(grand_total_disocunts_amount)) + parseFloat(grand_total_tax_amount) + parseFloat(grand_total_shipping_charges)).toFixed(2);
		
		if(parseFloat(tds) < parseFloat(result))
		{
			var result_with_tds = ((parseFloat(result)));
			
			var rounded = Math.round(result_with_tds);
	
			if (!isNaN(rounded)) {
				$("#grand_total").val(rounded);
			}
		}
		else
		{	
				var rounded = Math.round(result);
	
				if (!isNaN(rounded)) {
					$("#grand_total").val(rounded);
				}
			
				$("#total_tds").val("");		
				$(target).val("");
				$(target).prev(".totalvalidationmsg").text("TDS Exceeds Invoice Amount");
				return false;
			
		}
		
	
	}
			
}

function multiplepopuptotal(event, id)
{
	
	var target = $(event.target);
	
	var typeval = $(event.target).val();
	
	var popup_item_qty = $("#multiple_item_qty_"+id).val();
	var popup_priceperunit = $("#multiple_item_priceperunit_"+id).val();
	var popup_item_vat = $("#multiple_item_vat_"+id).val();
	var popup_item_serv_tax = $("#multiple_item_ser_tax_"+id).val();
	var popup_item_cst = $("#multiple_item_cst_"+id).val();
	var popup_item_gst = $("#multiple_item_gst_"+id).val();
	var popup_item_exc = $("#multiple_item_exc_"+id).val();
	var popup_item_discount = $("#multiple_item_discount_"+id).val();
		
	if(!isNaN(typeval))
	{
		$(".nums_error").css("display", "none");
		
		if(popup_item_qty != "" && popup_priceperunit != "")
		{
			var popup_gross_amount = (parseFloat(popup_item_qty)) * (parseFloat(popup_priceperunit));
			
			var item_tax_percent = (parseFloat((isNaN(popup_item_vat) ? 0 : popup_item_vat))+parseFloat((isNaN(popup_item_serv_tax) ? 0 : popup_item_serv_tax))+parseFloat((isNaN(popup_item_cst) ? 0 : popup_item_cst))+parseFloat((isNaN(popup_item_gst) ? 0 : popup_item_gst))+parseFloat((isNaN(popup_item_exc) ? 0 : popup_item_exc)));
			
			var item_discount_amount = (popup_gross_amount * (isNaN(popup_item_discount) ? 0 : popup_item_discount) / 100).toFixed(2);
		
			var item_gross_amount_with_discount = parseFloat(popup_gross_amount)- parseFloat(item_discount_amount);
			
			var item_tax_amount = (item_gross_amount_with_discount * (isNaN(item_tax_percent) ? 0 : item_tax_percent) / 100).toFixed(2);
			
			var item_net_amount = (item_gross_amount_with_discount + parseFloat(item_tax_amount)).toFixed(2);
			
			$("#multiple_item_rate_"+id).val(item_net_amount);
		}
	}
	else
	{
		$(target).val("");
		$("#multiple_item_rate_"+id).val("");
		$("#multiple_item_error").text("Please Enter Numeric Only");
	}		 
}


function calculateGrandTotal(event) 
{

		var target = $(event.target);
	
		var typeval = $(event.target).val();
		
		if($('#total_gross_amount').val() != "")
		{
			var total_gross_amount = isNaN($('#total_gross_amount').val()) ? 0 : $('#total_gross_amount').val();

		}
		else
		{
			var total_gross_amount = 0.00;
		}
		
		if($('#total_tax_amount').val() != "")
		{
			var total_tax_amount = isNaN($('#total_tax_amount').val()) ? 0 : $('#total_tax_amount').val();
		}
		else
		{
			var total_tax_amount = 0.00;
		}
		
		/*if($('#total_disocunts_percentage').val() != "")
		{
			var total_disocunts_percentage = isNaN($('#total_disocunts_percentage').val()) ? 0 : $('#total_disocunts_percentage').val();
			var total_disocunts_amount = (total_gross_amount * (isNaN(total_disocunts_percentage) ? 0 : total_disocunts_percentage) / 100).toFixed(2);
			$('#total_disocunts_amount').val(total_disocunts_amount);
		}
		else
		{
			var total_disocunts_percentage = 0.00;
		}*/
		
		if($('#total_disocunts_amount').val() != "")
		{
			var total_disocunts_amount = isNaN($('#total_disocunts_amount').val()) ? 0 : $('#total_disocunts_amount').val();
		}
		else
		{
			var total_disocunts_amount = 0.00;
		}
		
		
		if($('#total_shipping_charges').val() != "")
		{
			var total_shipping_charges = isNaN($('#total_shipping_charges').val()) ? 0 : $('#total_shipping_charges').val();
		}
		else
		{
			var total_shipping_charges = 0.00;
		}
		
		
		if($('#cus_wallet_debit_amt').val() != "")
		{
			var cus_wallet_debit_amt = isNaN($('#cus_wallet_debit_amt').val()) ? 0 : $('#cus_wallet_debit_amt').val();
		}
		else
		{
			var cus_wallet_debit_amt = 0.00;
		}
		//alert(cus_wallet_debit_amt);
		
		if($('#total_shipping_tax').val() != "")
		{
			var total_shipping_tax_percent = $('#total_shipping_tax').val();
			var total_shipping_tax = (total_shipping_charges * (isNaN(total_shipping_tax_percent) ? 0 : total_shipping_tax_percent) / 100).toFixed(2);
			var totalshipping = (parseFloat(total_shipping_charges)) + (parseFloat(total_shipping_tax));
			$('#total_shipping_charges').val(totalshipping);
		}
		else
		{
			var total_shipping_tax = 0.00;
		}
		
		if($('#total_tds').val() != "" || $('#total_tds').val() < 0)
		{				
			var tds = isNaN($('#total_tds').val()) ? 0 : $('#total_tds').val();			
		}
		else
		{
			var tds = 0.00;		
		}
				
		if(!isNaN(typeval))
		{
			$(".totalvalidationmsg").text("");
			
				if(total_gross_amount != "")
				{
					var result = ((parseFloat(total_gross_amount) - parseFloat(total_disocunts_amount)) + parseFloat(total_tax_amount) + parseFloat(total_shipping_charges) + parseFloat(tds) - parseFloat(cus_wallet_debit_amt));
					
					if(parseFloat(tds) < parseFloat(result))
					{
						var result_with_tds = ((parseFloat(result)));
						
						var rounded = Math.round(result_with_tds);
				
						if (!isNaN(rounded)) {
							$("#grand_total").val(rounded);
						}
					}
					else
					{	
							var rounded = Math.round(result);
				
							if (!isNaN(rounded)) {
								$("#grand_total").val(rounded);
							}
						
							$("#total_tds").val("");		
							$(target).val("");
							$(target).prev(".totalvalidationmsg").text("TDS Exceeds Invoice Amount");
							return false;
						
					}
				}
			
		}
		else
		{
			$(".totalvalidationmsg").text("");
			if(total_gross_amount == "")
			{
				$("#grand_total").val("");
			}
			$(target).val("");
			$(target).prev(".totalvalidationmsg").text("Please Enter Numberic Only");
			return false;
		}
           
}

function group_tax_calculation()
{
	var customer_discount_percentage = $("#customer_discount").val();
	var customer_cash_discount = $("#customer_cash_discount").val();
	var login_company_id = $("#login_company_id").val();
	var tax_value = $("#tax_value").val();
	
	
	if(tax_value != 'nontaxable')
	{
		var tax_group = [];
		
		$('input[name^="item_tax_percent"]').each(function()
		{
				var tax_group_item_tax_percent = $(this).val();
				n = jQuery.inArray(tax_group_item_tax_percent,tax_group);
				if(n == -1)
				{
					tax_group.push(tax_group_item_tax_percent);
				}
		}); 
		
		
		var tax_group_sgst = [];
		
		$('input[name^="item_sgst"]').each(function()
		{
				var tax_group_item_sgst_percent = $(this).val();
				n = jQuery.inArray(tax_group_item_sgst_percent,tax_group_sgst);
				if(n == -1)
				{
					tax_group_sgst.push(tax_group_item_sgst_percent);
				}
		}); 
		
		
		for (i=0; i<tax_group.length; i++)
		{
			var print_tax_group = [];
			var tax_group_val = tax_group[i];
			var tax_group_sgst_val = tax_group_sgst[i];
			$('input[name^="item_tax_percent"]').each(function()
			{
					var print_tax_group_item_tax_percent = $(this).val();
					
					if(print_tax_group_item_tax_percent == tax_group_val)
					{
						var tax_group_id = $(this).attr("id");
						
						var tax_group_segments =  tax_group_id.substr(tax_group_id.lastIndexOf('_') + 1);
						
						print_tax_group.push(tax_group_segments);
					}
			}); 
			
			
			//alert(tax_group_val);
			//alert(tax_group_sgst_val);
			var total_tax_group_val = (parseFloat(tax_group_val)).toFixed(2);
			//alert(total_tax_group_val);
			
			var tax_group_total_net_amount = 0;
			var tax_group_total_discount_amount = 0;
			var tax_group_total_damage_discount_amount = 0;
			var tax_group_total_flat_amount = 0;
			var tax_group_total_tax_amount = 0;
			var tax_group_total_incentive_amount = 0;
			
			
			for (k=0; k<print_tax_group.length; k++)
			{						
					var tax_group_item_gross_amount = $("#item_gross_amount_"+print_tax_group[k]).val();
					var tax_group_item_discount_amount = $("#item_discount_amount_"+print_tax_group[k]).val();
					
					var tax_group_item_damage_discount_amount = $("#item_damage_discount_amount_"+print_tax_group[k]).val();
					//discount
					var tax_group_item_flat_amount = $("#item_flat_discount_"+print_tax_group[k]).val()? $("#item_flat_discount_"+print_tax_group[k]).val():0;
					var tax_group_item_tax_amount = $("#item_tax_amount_"+print_tax_group[k]).val();
					tax_group_total_net_amount = (parseFloat(tax_group_total_net_amount) + parseFloat(tax_group_item_gross_amount)).toFixed(2);
					tax_group_total_discount_amount = (parseFloat(tax_group_total_discount_amount) + parseFloat(tax_group_item_discount_amount)).toFixed(2);
					tax_group_total_damage_discount_amount = (parseFloat(tax_group_total_damage_discount_amount) + parseFloat(tax_group_item_damage_discount_amount)).toFixed(2);
					tax_group_total_flat_amount = (parseFloat(tax_group_total_flat_amount) + parseFloat(tax_group_item_flat_amount)).toFixed(2);
					
					var total_incentive_amount = $("#item_incentive_total_"+print_tax_group[k]).val();
					tax_group_total_incentive_amount = (parseFloat(tax_group_total_incentive_amount) + parseFloat(total_incentive_amount)).toFixed(2);
					//alert(tax_group_total_incentive_amount);
					//discount
					//tax_group_total_discount_flat_amount = (parseFloat(tax_group_total_discount_amount) + parseFloat(tax_group_total_flat_amount)).toFixed(2);
					tax_group_total_discount_amount = (parseFloat(tax_group_total_discount_amount)).toFixed(2);
					
					tax_group_total_tax_amount = (parseFloat(tax_group_total_tax_amount) + parseFloat(tax_group_item_tax_amount)).toFixed(2);
			}
			
			var tax_group_total_gross_amount_without_cash_dicount = (parseFloat(tax_group_total_net_amount) - parseFloat(tax_group_total_discount_amount).toFixed(2) - parseFloat(tax_group_total_damage_discount_amount)).toFixed(2);
			
			var tax_group_total_cash_dicount_amount = (tax_group_total_gross_amount_without_cash_dicount * (isNaN(customer_cash_discount) ? 0 : customer_cash_discount) / 100).toFixed(2);	
			
			var tax_group_total_gross_amount_without_tax = (parseFloat(tax_group_total_gross_amount_without_cash_dicount) - parseFloat(tax_group_total_cash_dicount_amount) -  parseFloat(tax_group_total_flat_amount)).toFixed(2);
				
					
			var tax_group_tax_amount = (tax_group_total_gross_amount_without_tax * (isNaN(total_tax_group_val) ? 0 : total_tax_group_val) / 100).toFixed(2);
			
			var tax_group_total_gross_amount_with_tax = (parseFloat(tax_group_total_gross_amount_without_tax) + parseFloat(tax_group_tax_amount)).toFixed(2);
			
			
		
			var table = '<div class="inner_tax_group"><table class="tax_group_table table table-bordered blockContainer showInlineTable equalSplit"><tbody><tr><td class="tax_group_lable"><label>Total Gross Amount</label></td><td><input class="group_tax_calc" name="tax_group_gross_amount['+i+']" id="tax_group_gross_amount_'+i+'" type="text" value="'+tax_group_total_net_amount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Discount percent Amount</label></td><td><input class="group_tax_calc" name="tax_group_discount_amount['+i+']" id="tax_group_discount_amount_'+i+'" type="text" value="'+tax_group_total_discount_amount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Gross Amount Without Tax</label></td><td><input class="group_tax_calc" name="tax_group_without_tax_gross_amount['+i+']" id="tax_group_without_tax_gross_amount_'+i+'" type="text" value="'+tax_group_total_gross_amount_without_tax+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Tax Amount</label></td><td><input class="group_tax_calc" name="tax_group_tax_amount['+i+']" id="tax_group_tax_amount_'+i+'" type="text" value="'+tax_group_tax_amount+'" readonly="readonly"><input name="tax_group_tax_percentage['+i+']" id="tax_group_tax_percentage_'+i+'" type="hidden" value="'+total_tax_group_val+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Gross Amount With Tax</label></td><td><input class="group_tax_calc" name="tax_group_with_tax_gross_amount['+i+']" id="tax_group_with_tax_gross_amount_'+i+'" type="text" value="'+tax_group_total_gross_amount_with_tax+'" readonly="readonly"><input class="group_tax_calc" name="tax_group_total_incentive_amount['+i+']" id="tax_group_total_incentive_amount_'+i+'" type="hidden" value="'+tax_group_total_incentive_amount+'" readonly="readonly"></td></tr></tbody></table></div><br />';
			
			$("#tax_group_length").val(tax_group.length);
			$('#tax_group_calculation').append(table);
			
		}
	}
	else
	{
		var tax_group = ["0.00"];
		
		var tax_group_total_net_amount = 0;
		$('input[name^="item_gross_amount"]').each(function()
		{
				var item_gross_amount = $(this).val();
				tax_group_total_net_amount = (parseFloat(tax_group_total_net_amount) + parseFloat(item_gross_amount)).toFixed(2);
		});
		
			
		var tax_group_total_flat_amount = 0;
		$('input[name^="item_flat_discount"]').each(function()
		{
				var item_flat_discount = $(this).val();
				tax_group_total_flat_amount = (parseFloat(tax_group_total_flat_amount) + parseFloat(item_flat_discount)).toFixed(2);
		});
			
			//alert(tax_group_total_flat_amount);
				
		var tax_group_total_discount_amount = 0;
		$('input[name^="item_discount_amount"]').each(function()
		{
				var item_discount_amount = $(this).val();
				tax_group_total_discount_amount = (parseFloat(tax_group_total_discount_amount) + parseFloat(item_discount_amount)).toFixed(2);
		});
		
			var tax_group_total_tax_amount = "0.00";
			
			var tax_group_total_gross_amount_without_cash_dicount = (parseFloat(tax_group_total_net_amount) - parseFloat(tax_group_total_discount_amount)).toFixed(2);
			
			var tax_group_total_cash_dicount_amount = (tax_group_total_gross_amount_without_cash_dicount * (isNaN(customer_cash_discount) ? 0 : customer_cash_discount) / 100).toFixed(2);	
			
			var tax_group_total_gross_amount_without_tax = (parseFloat(tax_group_total_gross_amount_without_cash_dicount) - parseFloat(tax_group_total_cash_dicount_amount)-  parseFloat(tax_group_total_flat_amount)).toFixed(2);			
			var tax_group_tax_amount = (tax_group_total_gross_amount_without_tax * (isNaN(tax_group_val) ? 0 : tax_group_val) / 100).toFixed(2);
			
			var tax_group_total_gross_amount_with_tax = (parseFloat(tax_group_total_gross_amount_without_tax) + parseFloat(tax_group_tax_amount)).toFixed(2);
			
			var i = 0;
			
			var table = '<div class="inner_tax_group"><table class="tax_group_table table table-bordered blockContainer showInlineTable equalSplit"><tbody><tr><td class="tax_group_lable"><label>Total Gross Amount</label></td><td><input class="group_tax_calc" name="tax_group_gross_amount['+i+']" id="tax_group_gross_amount_'+i+'" type="text" value="'+tax_group_total_net_amount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Discount('+customer_discount_percentage+'%)</label></td><td><input class="group_tax_calc" name="tax_group_discount_amount['+i+']" id="tax_group_discount_amount_'+i+'" type="text" value="'+tax_group_total_discount_amount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Gross Amount Without Cash Discount</label></td><td><input class="group_tax_calc" name="tax_group_without_cash_discount_amount['+i+']" id="tax_group_without_cash_discount_amount_'+i+'" type="text" value="'+tax_group_total_gross_amount_without_cash_dicount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Cash Discount('+customer_cash_discount+'%)</label></td><td><input class="group_tax_calc" name="tax_group_cash_discount_amount['+i+']" id="tax_group_cash_discount_amount_'+i+'" type="text" value="'+tax_group_total_cash_dicount_amount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Flat Discount</label></td><td><input class="group_tax_calc" name="tax_group_flat_amount['+i+']" id="tax_group_flat_amount_'+i+'" type="text" value="'+tax_group_total_flat_amount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Gross Amount Without Tax</label></td><td><input class="group_tax_calc" name="tax_group_without_tax_gross_amount['+i+']" id="tax_group_without_tax_gross_amount_'+i+'" type="text" value="'+tax_group_total_gross_amount_without_tax+'" readonly="readonly"><input class="group_tax_calc" name="tax_group_tax_amount['+i+']" id="tax_group_tax_amount_'+i+'" type="hidden" value="'+tax_group_tax_amount+'" readonly="readonly"><input name="tax_group_tax_percentage['+i+']" id="tax_group_tax_percentage_'+i+'" type="hidden" value="'+tax_group_val+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Gross Amount With Tax</label></td><td><input class="group_tax_calc" name="tax_group_with_tax_gross_amount['+i+']" id="tax_group_with_tax_gross_amount_'+i+'" type="text" value="'+tax_group_total_gross_amount_with_tax+'" readonly="readonly"></td></tr></tbody></table></div><br />';
			
			$("#tax_group_length").val(tax_group.length);
			$('#tax_group_calculation').append(table);
			
		
		
	}
}

function calculatetotal_salesreturn()
{
	//alert("dd");
	$('#tax_group_calculation').html('');
	
	group_tax_calculation_salesreturn();
	
	var	table_count = $("#last_table_id").val();
	$("#total_quantity_items").val(table_count);
	
	var total_gross_amount = 0;
	$('input[name^="tax_group_gross_amount"]').each(function()
	{
			var item_gross_amount = $(this).val();
			total_gross_amount = (parseFloat(total_gross_amount) + parseFloat(item_gross_amount)).toFixed(2);
	});
	 $("#total_gross_amount").val(total_gross_amount);
	
	var total_tax_amount = 0;
	$('input[name^="tax_group_tax_amount"]').each(function()
	{
			var item_tax_amount = $(this).val();
			total_tax_amount = (parseFloat(total_tax_amount) + parseFloat(item_tax_amount)).toFixed(2);
	});
	$("#total_tax_amount").val(total_tax_amount);
			
	var total_disocunts_amount = 0;
	$('input[name^="tax_group_discount_amount"]').each(function()
	{
			var item_discount_amount = $(this).val();
			total_disocunts_amount = (parseFloat(total_disocunts_amount) + parseFloat(item_discount_amount)).toFixed(2);
	});
	
		var total_flat_disocunts_amount = 0;
	$('input[name^="tax_group_flat_amount"]').each(function()
	{
			var item_flat_discount_amount = $(this).val();
			total_flat_disocunts_amount = (parseFloat(total_flat_disocunts_amount) + parseFloat(item_flat_discount_amount)).toFixed(2);
	});
	
	//alert(total_flat_disocunts_amount);
	
	var tax_group_cash_discount_amount = 0;
	$('input[name^="tax_group_cash_discount_amount"]').each(function()
	{
			var item_discount_amount = $(this).val();
			total_disocunts_amount = (parseFloat(total_disocunts_amount) + parseFloat(item_discount_amount) ).toFixed(2);
	});
	
		/*var tax_group_cash_discount_amount = 0;
	$('input[name^="tax_group_cash_discount_amount"]').each(function()
	{
			var item_discount_amount = $(this).val();
			total_disocunts_amount = (parseFloat(total_disocunts_amount) + parseFloat(item_discount_amount)).toFixed(2);
	});*/
	total_disocunts_amount = (parseFloat(total_disocunts_amount) + parseFloat(total_flat_disocunts_amount)).toFixed(2);
	 $("#total_disocunts_amount").val(total_disocunts_amount + tax_group_cash_discount_amount);
	 
	
	if($('#total_gross_amount').val() != "")
	{
		var grand_total_gross_amount = isNaN($('#total_gross_amount').val()) ? 0 : $('#total_gross_amount').val();
	}
	else
	{
		var grand_total_gross_amount = 0.00;
	}
	
	if($('#total_disocunts_amount').val() != "")
	{
		var grand_total_disocunts_amount = isNaN($('#total_disocunts_amount').val()) ? 0 : $('#total_disocunts_amount').val();
	}
	else
	{
		var grand_total_disocunts_amount = 0.00;
	}
	
	if($('#total_tax_amount').val() != "")
	{
		var grand_total_tax_amount = isNaN($('#total_tax_amount').val()) ? 0 : $('#total_tax_amount').val();
	}
	else
	{
		var grand_total_tax_amount = 0.00;
	}
	
	if($('#total_shipping_charges').val() != "")
	{
		var grand_total_shipping_charges = isNaN($('#total_shipping_charges').val()) ? 0 : $('#total_shipping_charges').val();
	}
	else
	{
		var grand_total_shipping_charges = 0.00;
	}
	
	if($('#total_tds').val() != "" || $('#total_tds').val() < 0)
	{				
		var tds = isNaN($('#total_tds').val()) ? 0 : $('#total_tds').val();			
	}
	else
	{
		var tds = 0.00;		
	}
	
	if(total_gross_amount != "")
	{
		var result = ((parseFloat(grand_total_gross_amount) - parseFloat(grand_total_disocunts_amount)) + parseFloat(grand_total_tax_amount) + parseFloat(grand_total_shipping_charges)).toFixed(2);
		
		if(parseFloat(tds) < parseFloat(result))
		{
			var result_with_tds = ((parseFloat(result)));
			
			var rounded = Math.round(result_with_tds);
	
			if (!isNaN(rounded)) {
				$("#grand_total").val(rounded);
			}
		}
		else
		{	
				var rounded = Math.round(result);
	
				if (!isNaN(rounded)) {
					$("#grand_total").val(rounded);
				}
			
				$("#total_tds").val("");		
				$(target).val("");
				$(target).prev(".totalvalidationmsg").text("TDS Exceeds Invoice Amount");
				return false;
			
		}
		
	
	}
			
}
function group_tax_calculation_salesreturn()
{
	var customer_discount_percentage = $("#customer_discount").val();
	var customer_cash_discount = $("#customer_cash_discount").val();
	var login_company_id = $("#login_company_id").val();
	var tax_value = $("#tax_value").val();
	
	if(tax_value != 'nontaxable')
	{
		var tax_group = [];
		
		$('input[name^="item_tax_percent"]').each(function()
		{
				var tax_group_item_tax_percent = $(this).val();
				n = jQuery.inArray(tax_group_item_tax_percent,tax_group);
				if(n == -1)
				{
					tax_group.push(tax_group_item_tax_percent);
				}
		}); 
		
		for (i=0; i<tax_group.length; i++)
		{
			var print_tax_group = [];
			var tax_group_val = tax_group[i];
			$('input[name^="item_tax_percent"]').each(function()
			{
					var print_tax_group_item_tax_percent = $(this).val();
					
					if(print_tax_group_item_tax_percent == tax_group_val)
					{
						var tax_group_id = $(this).attr("id");
						
						var tax_group_segments =  tax_group_id.substr(tax_group_id.lastIndexOf('_') + 1);
						
						print_tax_group.push(tax_group_segments);
					}
			}); 
			
			var tax_group_total_net_amount = 0;
			var tax_group_total_discount_amount = 0;
			var tax_group_total_flat_amount = 0;
			var tax_group_total_tax_amount = 0;
			
			
			for (k=0; k<print_tax_group.length; k++)
			{						
					var tax_group_item_gross_amount = $("#item_gross_amount_"+print_tax_group[k]).val();
					var tax_group_item_discount_amount = $("#item_discount_amount_"+print_tax_group[k]).val();
					//discount
					var tax_group_item_flat_amount = $("#item_flat_discount_"+print_tax_group[k]).val()? $("#item_flat_discount_"+print_tax_group[k]).val():0;
					var tax_group_item_tax_amount = $("#item_tax_amount_"+print_tax_group[k]).val();
					tax_group_total_net_amount = (parseFloat(tax_group_total_net_amount) + parseFloat(tax_group_item_gross_amount)).toFixed(2);
					tax_group_total_discount_amount = (parseFloat(tax_group_total_discount_amount) + parseFloat(tax_group_item_discount_amount)).toFixed(2);
					tax_group_total_flat_amount = (parseFloat(tax_group_total_flat_amount) + parseFloat(tax_group_item_flat_amount)).toFixed(2);
					
					//discount
					//tax_group_total_discount_flat_amount = (parseFloat(tax_group_total_discount_amount) + parseFloat(tax_group_total_flat_amount)).toFixed(2);
					tax_group_total_discount_amount = (parseFloat(tax_group_total_discount_amount)).toFixed(2);
					
					tax_group_total_tax_amount = (parseFloat(tax_group_total_tax_amount) + parseFloat(tax_group_item_tax_amount)).toFixed(2);
			}
			
			var tax_group_total_gross_amount_without_cash_dicount = (parseFloat(tax_group_total_net_amount) - parseFloat(tax_group_total_discount_amount)).toFixed(2);
			
			var tax_group_total_cash_dicount_amount = (tax_group_total_gross_amount_without_cash_dicount * (isNaN(customer_cash_discount) ? 0 : customer_cash_discount) / 100).toFixed(2);	
			
			var tax_group_total_gross_amount_without_tax = (parseFloat(tax_group_total_gross_amount_without_cash_dicount) - parseFloat(tax_group_total_cash_dicount_amount) -  parseFloat(tax_group_total_flat_amount)).toFixed(2);
				
					
			var tax_group_tax_amount = (tax_group_total_gross_amount_without_tax * (isNaN(tax_group_val) ? 0 : tax_group_val) / 100).toFixed(2);
			
			var tax_group_total_gross_amount_with_tax = (parseFloat(tax_group_total_gross_amount_without_tax) + parseFloat(tax_group_tax_amount)).toFixed(2);
			
			
		
			var table = '<div class="inner_tax_group"><table class="tax_group_table table table-bordered blockContainer showInlineTable equalSplit"><tbody><tr><td class="tax_group_lable"><label>Total Gross Amount</label></td><td><input class="group_tax_calc" name="tax_group_gross_amount['+i+']" id="tax_group_gross_amount_'+i+'" type="text" value="'+tax_group_total_net_amount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Discount percent</label></td><td><input class="group_tax_calc" name="tax_group_discount_amount['+i+']" id="tax_group_discount_amount_'+i+'" type="text" value="'+tax_group_total_discount_amount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Gross Amount Without Cash Discount</label></td><td><input class="group_tax_calc" name="tax_group_without_cash_discount_amount['+i+']" id="tax_group_without_cash_discount_amount_'+i+'" type="text" value="'+tax_group_total_gross_amount_without_cash_dicount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Cash Discount('+customer_cash_discount+'%)</label></td><td><input class="group_tax_calc" name="tax_group_cash_discount_amount['+i+']" id="tax_group_cash_discount_amount_'+i+'" type="text" value="'+tax_group_total_cash_dicount_amount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Flat Discount</label></td><td><input class="group_tax_calc" name="tax_group_flat_amount['+i+']" id="tax_group_flat_amount_'+i+'" type="text" value="'+tax_group_total_flat_amount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Gross Amount Without Tax</label></td><td><input class="group_tax_calc" name="tax_group_without_tax_gross_amount['+i+']" id="tax_group_without_tax_gross_amount_'+i+'" type="text" value="'+tax_group_total_gross_amount_without_tax+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Tax('+tax_group_val+'%) Amount</label></td><td><input class="group_tax_calc" name="tax_group_tax_amount['+i+']" id="tax_group_tax_amount_'+i+'" type="text" value="'+tax_group_tax_amount+'" readonly="readonly"><input name="tax_group_tax_percentage['+i+']" id="tax_group_tax_percentage_'+i+'" type="hidden" value="'+tax_group_val+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Gross Amount With Tax</label></td><td><input class="group_tax_calc" name="tax_group_with_tax_gross_amount['+i+']" id="tax_group_with_tax_gross_amount_'+i+'" type="text" value="'+tax_group_total_gross_amount_with_tax+'" readonly="readonly"></td></tr></tbody></table></div><br />';
			
			$("#tax_group_length").val(tax_group.length);
			$('#tax_group_calculation').append(table);
			
		}
	}
	else
	{
		var tax_group = ["0.00"];
		
		var tax_group_total_net_amount = 0;
		$('input[name^="item_gross_amount"]').each(function()
		{
				var item_gross_amount = $(this).val();
				tax_group_total_net_amount = (parseFloat(tax_group_total_net_amount) + parseFloat(item_gross_amount)).toFixed(2);
		});
		
			
		var tax_group_total_flat_amount = 0;
		$('input[name^="item_flat_discount"]').each(function()
		{
				var item_flat_discount = $(this).val();
				tax_group_total_flat_amount = (parseFloat(tax_group_total_flat_amount) + parseFloat(item_flat_discount)).toFixed(2);
		});
			
			//alert(tax_group_total_flat_amount);
				
		var tax_group_total_discount_amount = 0;
		$('input[name^="item_discount_amount"]').each(function()
		{
				var item_discount_amount = $(this).val();
				tax_group_total_discount_amount = (parseFloat(tax_group_total_discount_amount) + parseFloat(item_discount_amount)).toFixed(2);
		});
		
			var tax_group_total_tax_amount = "0.00";
			
			var tax_group_total_gross_amount_without_cash_dicount = (parseFloat(tax_group_total_net_amount) - parseFloat(tax_group_total_discount_amount)).toFixed(2);
			
			var tax_group_total_cash_dicount_amount = (tax_group_total_gross_amount_without_cash_dicount * (isNaN(customer_cash_discount) ? 0 : customer_cash_discount) / 100).toFixed(2);	
			
			var tax_group_total_gross_amount_without_tax = (parseFloat(tax_group_total_gross_amount_without_cash_dicount) - parseFloat(tax_group_total_cash_dicount_amount)-  parseFloat(tax_group_total_flat_amount)).toFixed(2);			
			var tax_group_tax_amount = (tax_group_total_gross_amount_without_tax * (isNaN(tax_group_val) ? 0 : tax_group_val) / 100).toFixed(2);
			
			var tax_group_total_gross_amount_with_tax = (parseFloat(tax_group_total_gross_amount_without_tax) + parseFloat(tax_group_tax_amount)).toFixed(2);
			
			var i = 0;
			
			var table = '<div class="inner_tax_group"><table class="tax_group_table table table-bordered blockContainer showInlineTable equalSplit"><tbody><tr><td class="tax_group_lable"><label>Total Gross Amount</label></td><td><input class="group_tax_calc" name="tax_group_gross_amount['+i+']" id="tax_group_gross_amount_'+i+'" type="text" value="'+tax_group_total_net_amount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Discount('+customer_discount_percentage+'%)</label></td><td><input class="group_tax_calc" name="tax_group_discount_amount['+i+']" id="tax_group_discount_amount_'+i+'" type="text" value="'+tax_group_total_discount_amount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Gross Amount Without Cash Discount</label></td><td><input class="group_tax_calc" name="tax_group_without_cash_discount_amount['+i+']" id="tax_group_without_cash_discount_amount_'+i+'" type="text" value="'+tax_group_total_gross_amount_without_cash_dicount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Cash Discount('+customer_cash_discount+'%)</label></td><td><input class="group_tax_calc" name="tax_group_cash_discount_amount['+i+']" id="tax_group_cash_discount_amount_'+i+'" type="text" value="'+tax_group_total_cash_dicount_amount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Flat Discount</label></td><td><input class="group_tax_calc" name="tax_group_flat_amount['+i+']" id="tax_group_flat_amount_'+i+'" type="text" value="'+tax_group_total_flat_amount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Gross Amount Without Tax</label></td><td><input class="group_tax_calc" name="tax_group_without_tax_gross_amount['+i+']" id="tax_group_without_tax_gross_amount_'+i+'" type="text" value="'+tax_group_total_gross_amount_without_tax+'" readonly="readonly"><input class="group_tax_calc" name="tax_group_tax_amount['+i+']" id="tax_group_tax_amount_'+i+'" type="hidden" value="'+tax_group_tax_amount+'" readonly="readonly"><input name="tax_group_tax_percentage['+i+']" id="tax_group_tax_percentage_'+i+'" type="hidden" value="'+tax_group_val+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Gross Amount With Tax</label></td><td><input class="group_tax_calc" name="tax_group_with_tax_gross_amount['+i+']" id="tax_group_with_tax_gross_amount_'+i+'" type="text" value="'+tax_group_total_gross_amount_with_tax+'" readonly="readonly"></td></tr></tbody></table></div><br />';
			
			$("#tax_group_length").val(tax_group.length);
			$('#tax_group_calculation').append(table);
			
		
		
	}
}
function return_sales_group_tax_calculation()
{
	var checked_id = [];
	var tax_group = [];
	
	$("input[name='item_check[]']:checked").each(function ()
    {
			checked_id.push(parseInt($(this).val()));
			
			var check_box_val = this.value;
			
			var tax_group_item_tax_percent = $("#item_tax_percent_"+check_box_val).val();
			var tax_group_item_ret_qty = $("#item_ret_qty_"+check_box_val).val();
			
			if(this.checked == true && tax_group_item_ret_qty != "")
			{
				n = jQuery.inArray(tax_group_item_tax_percent,tax_group);
				if(n == -1)
				{
					tax_group.push(tax_group_item_tax_percent);
				}
				
			}
		});
			
		for (i=0; i<tax_group.length; i++)
		{
			var print_tax_group = [];
			var tax_group_val = tax_group[i];
			$('input[name^="item_tax_percent"]').each(function()
			{
					var print_tax_group_item_tax_percent = $(this).val();
					
					if(print_tax_group_item_tax_percent == tax_group_val)
					{
						var tax_group_id = $(this).attr("id");
						
						var tax_group_segments =  tax_group_id.substr(tax_group_id.lastIndexOf('_') + 1);
						
						print_tax_group.push(tax_group_segments);
					}
			}); 
			
			var tax_group_total_net_amount = 0;
			var tax_group_total_discount_amount = 0;
			var tax_group_total_tax_amount = 0;
			
			for (k=0; k<print_tax_group.length; k++)
			{						
					var tax_group_item_gross_amount = $("#item_gross_amount_"+print_tax_group[k]).val();
					var tax_group_item_discount_amount = $("#item_discount_amount_"+print_tax_group[k]).val();
					var tax_group_item_tax_amount = $("#item_tax_amount_"+print_tax_group[k]).val();
					tax_group_total_net_amount = (parseFloat(tax_group_total_net_amount) + parseFloat(tax_group_item_gross_amount)).toFixed(2);
					tax_group_total_discount_amount = (parseFloat(tax_group_total_discount_amount) + parseFloat(tax_group_item_discount_amount)).toFixed(2);
					tax_group_total_tax_amount = (parseFloat(tax_group_total_tax_amount) + parseFloat(tax_group_item_tax_amount)).toFixed(2);
			}
			
			tax_group_total_gross_amount_without_tax = (parseFloat(tax_group_total_net_amount) - parseFloat(tax_group_total_discount_amount)).toFixed(2);
			tax_group_total_gross_amount_with_tax = (parseFloat(tax_group_total_gross_amount_without_tax) + parseFloat(tax_group_total_tax_amount)).toFixed(2);
			
			var table = '<div class="inner_tax_group"><table class="tax_group_table table table-bordered blockContainer showInlineTable equalSplit"><tbody><tr><td class="tax_group_lable"><label>Total Gross Amount</label></td><td><input class="group_tax_calc" name="tax_group_gross_amount['+i+']" id="tax_group_gross_amount_'+i+'" type="text" value="'+tax_group_total_net_amount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Discount</label></td><td><input class="group_tax_calc" name="tax_group_discount_amount['+i+']" id="tax_group_discount_amount_'+i+'" type="text" value="'+tax_group_total_discount_amount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Gross Amount Without Tax</label></td><td><input class="group_tax_calc" name="tax_group_without_tax_gross_amount['+i+']" id="tax_group_without_tax_gross_amount_'+i+'" type="text" value="'+tax_group_total_gross_amount_without_tax+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Tax('+tax_group_val+'%) Amount</label></td><td><input class="group_tax_calc" name="tax_group_tax_amount['+i+']" id="tax_group_tax_amount_'+i+'" type="text" value="'+tax_group_total_tax_amount+'" readonly="readonly"><input name="tax_group_tax_percentage['+i+']" id="tax_group_tax_percentage_'+i+'" type="hidden" value="'+tax_group_val+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Gross Amount With Tax</label></td><td><input class="group_tax_calc" name="tax_group_with_tax_gross_amount['+i+']" id="tax_group_with_tax_gross_amount_'+i+'" type="text" value="'+tax_group_total_gross_amount_with_tax+'" readonly="readonly"></td></tr></tbody></table></div><br />';
			
			$("#tax_group_length").val(tax_group.length);
			$('#tax_group_calculation').append(table);
			
		}
}

function return_product_calc()
{
	
	$('#tax_group_calculation').html('');
	
	return_sales_group_tax_calculation();
	
	var	table_count = $("#last_table_id").val();
	$("#total_quantity_items").val(table_count);
	
	var total_gross_amount = 0;
	$('input[name^="tax_group_gross_amount"]').each(function()
	{
			var item_gross_amount = $(this).val();
			total_gross_amount = (parseFloat(total_gross_amount) + parseFloat(item_gross_amount)).toFixed(2);
	});
	 $("#total_gross_amount").val(total_gross_amount);
	
	var total_tax_amount = 0;
	$('input[name^="tax_group_tax_amount"]').each(function()
	{
			var item_tax_amount = $(this).val();
			total_tax_amount = (parseFloat(total_tax_amount) + parseFloat(item_tax_amount)).toFixed(2);
	});
	$("#total_tax_amount").val(total_tax_amount);
			
	var total_disocunts_amount = 0;
	$('input[name^="tax_group_discount_amount"]').each(function()
	{
			var item_discount_amount = $(this).val();
			total_disocunts_amount = (parseFloat(total_disocunts_amount) + parseFloat(item_discount_amount)).toFixed(2);
	});
	
	var tax_group_cash_discount_amount = 0;
	$('input[name^="tax_group_cash_discount_amount"]').each(function()
	{
			var item_discount_amount = $(this).val();
			total_disocunts_amount = (parseFloat(total_disocunts_amount) + parseFloat(item_discount_amount)).toFixed(2);
	});
	
	 $("#total_disocunts_amount").val(total_disocunts_amount + tax_group_cash_discount_amount);
	
	
	if($('#total_gross_amount').val() != "")
	{
		var grand_total_gross_amount = isNaN($('#total_gross_amount').val()) ? 0 : $('#total_gross_amount').val();
	}
	else
	{
		var grand_total_gross_amount = 0.00;
	}
	
	if($('#total_disocunts_amount').val() != "")
	{
		var grand_total_disocunts_amount = isNaN($('#total_disocunts_amount').val()) ? 0 : $('#total_disocunts_amount').val();
	}
	else
	{
		var grand_total_disocunts_amount = 0.00;
	}
	
	if($('#total_tax_amount').val() != "")
	{
		var grand_total_tax_amount = isNaN($('#total_tax_amount').val()) ? 0 : $('#total_tax_amount').val();
	}
	else
	{
		var grand_total_tax_amount = 0.00;
	}
	
	if($('#total_shipping_charges').val() != "")
	{
		var grand_total_shipping_charges = isNaN($('#total_shipping_charges').val()) ? 0 : $('#total_shipping_charges').val();
	}
	else
	{
		var grand_total_shipping_charges = 0.00;
	}
	
	if(total_gross_amount != "")
	{
		var result = ((parseFloat(grand_total_gross_amount) - parseFloat(grand_total_disocunts_amount)) + parseFloat(grand_total_tax_amount) + parseFloat(grand_total_shipping_charges)).toFixed(2);
		
		if (!isNaN(result)) {
			$("#grand_total").val(result);
		}
	
	}
			
}

function invoice_payment_adjustment(event, id) 
{
		var target = $(event.target);
		var typeval = $(event.target).val();
		var target_id = $(event.target).attr("id");
		
		var receipt_amount = $("#amount").val();
		var paid_amount = $("#paid_amt_"+id).val();
		var payable_amount = $("#payable_amt_"+id).val();
		var due_amount = $("#due_amt_"+id).val();
		
		var total_adjusted_amount = 0;
		$('input[name^="adj_amt"]').each(function()
		{
			var particular_adjusted_amount = $(this).val();
			if(particular_adjusted_amount != "")
			{
				total_adjusted_amount = (parseFloat(total_adjusted_amount) + parseFloat(particular_adjusted_amount)).toFixed(2);
			}
			else
			{
				total_adjusted_amount = (total_adjusted_amount);
			}
		});
			
		if(!isNaN(typeval))
		{
			$(".payment_adjustment_error").text("");
			
			if(parseFloat(receipt_amount) < parseFloat(total_adjusted_amount))
			{
				$(target).val("");
				var total_adjusted_amount1 = 0;
				$('input[name^="adj_amt"]').each(function()
				{
						var particular_adjusted_amount1 = $(this).val();
						if(particular_adjusted_amount1 != "")
						{
							total_adjusted_amount1 = (parseFloat(total_adjusted_amount1) + parseFloat(particular_adjusted_amount1)).toFixed(2);
						}
						else
						{
							total_adjusted_amount1 = (total_adjusted_amount1);
						}
				});
				adjusted_amount = (parseFloat(receipt_amount) - parseFloat(total_adjusted_amount1)).toFixed(2);
				adjusted_due_amount = (parseFloat(payable_amount) - parseFloat(adjusted_amount)).toFixed(2);
				$(target).val(adjusted_amount);
				$("#due_amt_"+id).val(adjusted_due_amount);
				$("#payment_adjustment_error").text("Adjusted Amount Exceeds Receipt Amount - You have adjust only " + adjusted_amount);
			}
			else
			{	
				if(parseFloat(payable_amount) < parseFloat(typeval))
				{
					adjusted_due_amount = (parseFloat(payable_amount) - parseFloat(typeval)).toFixed(2);
					$("#due_amt_"+id).val(adjusted_due_amount);
					$(target).val(payable_amount);
					$("#payment_adjustment_error").text("Adjusted Amount Exceeds Payable Amount");
				}
				else
				{	
					adjusted_due_amount = (parseFloat(payable_amount) - parseFloat(typeval)).toFixed(2);
					$("#due_amt_"+id).val(adjusted_due_amount);
					$(target).val(typeval);
					$("#payment_adjustment_error").text("");
				}
			}
		}
		else
		{
			$("#payment_adjustment_error").text("");
			$(target).val("");
			$("#payment_adjustment_error").text("Please Enter Numberic Only");
		}
		
		var total_adjusted_amount2 = 0;
		$('input[name^="adj_amt"]').each(function()
		{
				var particular_adjusted_amount2 = $(this).val();
				if(particular_adjusted_amount2 != "")
				{
					total_adjusted_amount2 = (parseFloat(total_adjusted_amount2) + parseFloat(particular_adjusted_amount2)).toFixed(2);
				}
				else
				{
					total_adjusted_amount2 = (total_adjusted_amount2);
				}
		});
		remaining_receipt_amount = (parseFloat(receipt_amount) - parseFloat(total_adjusted_amount2)).toFixed(2);
		$("#receiptAmount").val(remaining_receipt_amount);
		return false;
           
}

function calculatetotal_pur_return()
{
	
	$('#tax_group_calculation').html('');
	
	group_tax_calculation_pur_return();
	
	var	table_count = $("#last_table_id").val();
	$("#total_quantity_items").val(table_count);
	
	var total_gross_amount = 0;
	$('input[name^="tax_group_gross_amount"]').each(function()
	{
			var item_gross_amount = $(this).val();
			total_gross_amount = (parseFloat(total_gross_amount) + parseFloat(item_gross_amount)).toFixed(2);
	});
	 $("#total_gross_amount").val(total_gross_amount);
	
	var total_tax_amount = 0;
	$('input[name^="tax_group_tax_amount"]').each(function()
	{
			var item_tax_amount = $(this).val();
			total_tax_amount = (parseFloat(total_tax_amount) + parseFloat(item_tax_amount)).toFixed(2);
	});
	$("#total_tax_amount").val(total_tax_amount);
			
	var total_disocunts_amount = 0;
	$('input[name^="tax_group_discount_amount"]').each(function()
	{
			var item_discount_amount = $(this).val();
			total_disocunts_amount = (parseFloat(total_disocunts_amount) + parseFloat(item_discount_amount)).toFixed(2);
	});
	
		var total_flat_disocunts_amount = 0;
	$('input[name^="tax_group_flat_amount"]').each(function()
	{
			var item_flat_discount_amount = $(this).val();
			total_flat_disocunts_amount = (parseFloat(total_flat_disocunts_amount) + parseFloat(item_flat_discount_amount)).toFixed(2);
	});
	
	//alert(total_flat_disocunts_amount);
	
	var tax_group_cash_discount_amount = 0;
	$('input[name^="tax_group_cash_discount_amount"]').each(function()
	{
			var item_discount_amount = $(this).val();
			total_disocunts_amount = (parseFloat(total_disocunts_amount) + parseFloat(item_discount_amount) ).toFixed(2);
	});
	
		/*var tax_group_cash_discount_amount = 0;
	$('input[name^="tax_group_cash_discount_amount"]').each(function()
	{
			var item_discount_amount = $(this).val();
			total_disocunts_amount = (parseFloat(total_disocunts_amount) + parseFloat(item_discount_amount)).toFixed(2);
	});*/
	total_disocunts_amount = (parseFloat(total_disocunts_amount) + parseFloat(total_flat_disocunts_amount)).toFixed(2);
	 $("#total_disocunts_amount").val(total_disocunts_amount + tax_group_cash_discount_amount);
	 
	
	if($('#total_gross_amount').val() != "")
	{
		var grand_total_gross_amount = isNaN($('#total_gross_amount').val()) ? 0 : $('#total_gross_amount').val();
	}
	else
	{
		var grand_total_gross_amount = 0.00;
	}
	
	if($('#total_disocunts_amount').val() != "")
	{
		var grand_total_disocunts_amount = isNaN($('#total_disocunts_amount').val()) ? 0 : $('#total_disocunts_amount').val();
	}
	else
	{
		var grand_total_disocunts_amount = 0.00;
	}
	
	if($('#total_tax_amount').val() != "")
	{
		var grand_total_tax_amount = isNaN($('#total_tax_amount').val()) ? 0 : $('#total_tax_amount').val();
	}
	else
	{
		var grand_total_tax_amount = 0.00;
	}
	
	if($('#total_shipping_charges').val() != "")
	{
		var grand_total_shipping_charges = isNaN($('#total_shipping_charges').val()) ? 0 : $('#total_shipping_charges').val();
	}
	else
	{
		var grand_total_shipping_charges = 0.00;
	}
	
	if($('#total_tds').val() != "" || $('#total_tds').val() < 0)
	{				
		var tds = isNaN($('#total_tds').val()) ? 0 : $('#total_tds').val();			
	}
	else
	{
		var tds = 0.00;		
	}
	
	if(total_gross_amount != "")
	{
		var result = ((parseFloat(grand_total_gross_amount) - parseFloat(grand_total_disocunts_amount)) + parseFloat(grand_total_tax_amount) + parseFloat(grand_total_shipping_charges)).toFixed(2);
		
		if(parseFloat(tds) < parseFloat(result))
		{
			var result_with_tds = ((parseFloat(result)));
			
			var rounded = Math.round(result_with_tds);
	
			if (!isNaN(rounded)) {
				$("#grand_total").val(rounded);
			}
		}
		else
		{	
				var rounded = Math.round(result);
	
				if (!isNaN(rounded)) {
					$("#grand_total").val(rounded);
				}
			
				$("#total_tds").val("");		
				$(target).val("");
				$(target).prev(".totalvalidationmsg").text("TDS Exceeds Invoice Amount");
				return false;
			
		}
		
	
	}
			
}

function group_tax_calculation_pur_return()
{
	var customer_discount_percentage = $("#customer_discount").val();
	var customer_cash_discount = $("#customer_cash_discount").val();
	var login_company_id = $("#login_company_id").val();
	var tax_value = $("#tax_value").val();
	
	if(tax_value != 'nontaxable')
	{
		var tax_group = [];
		
		$('input[name^="item_tax_percent"]').each(function()
		{
				var tax_group_item_tax_percent = $(this).val();
				n = jQuery.inArray(tax_group_item_tax_percent,tax_group);
				if(n == -1)
				{
					tax_group.push(tax_group_item_tax_percent);
				}
		}); 
		
		for (i=0; i<tax_group.length; i++)
		{
			var print_tax_group = [];
			var tax_group_val = tax_group[i];
			$('input[name^="item_tax_percent"]').each(function()
			{
					var print_tax_group_item_tax_percent = $(this).val();
					
					if(print_tax_group_item_tax_percent == tax_group_val)
					{
						var tax_group_id = $(this).attr("id");
						
						var tax_group_segments =  tax_group_id.substr(tax_group_id.lastIndexOf('_') + 1);
						
						print_tax_group.push(tax_group_segments);
					}
			}); 
			
			var tax_group_total_net_amount = 0;
			var tax_group_total_discount_amount = 0;
			var tax_group_total_flat_amount = 0;
			var tax_group_total_tax_amount = 0;
			
			
			for (k=0; k<print_tax_group.length; k++)
			{						
					var tax_group_item_gross_amount = $("#item_gross_amount_"+print_tax_group[k]).val();
					var tax_group_item_discount_amount = $("#item_discount_amount_"+print_tax_group[k]).val();
					//discount
					var tax_group_item_flat_amount = $("#item_flat_discount_"+print_tax_group[k]).val()? $("#item_flat_discount_"+print_tax_group[k]).val():0;
					var tax_group_item_tax_amount = $("#item_tax_amount_"+print_tax_group[k]).val();
					tax_group_total_net_amount = (parseFloat(tax_group_total_net_amount) + parseFloat(tax_group_item_gross_amount)).toFixed(2);
					tax_group_total_discount_amount = (parseFloat(tax_group_total_discount_amount) + parseFloat(tax_group_item_discount_amount)).toFixed(2);
					tax_group_total_flat_amount = (parseFloat(tax_group_total_flat_amount) + parseFloat(tax_group_item_flat_amount)).toFixed(2);
					
					//discount
					//tax_group_total_discount_flat_amount = (parseFloat(tax_group_total_discount_amount) + parseFloat(tax_group_total_flat_amount)).toFixed(2);
					tax_group_total_discount_amount = (parseFloat(tax_group_total_discount_amount)).toFixed(2);
					
					tax_group_total_tax_amount = (parseFloat(tax_group_total_tax_amount) + parseFloat(tax_group_item_tax_amount)).toFixed(2);
			}
			
			var tax_group_total_gross_amount_without_cash_dicount = (parseFloat(tax_group_total_net_amount) - parseFloat(tax_group_total_discount_amount)).toFixed(2);
			
			var tax_group_total_cash_dicount_amount = (tax_group_total_gross_amount_without_cash_dicount * (isNaN(customer_cash_discount) ? 0 : customer_cash_discount) / 100).toFixed(2);	
			
			var tax_group_total_gross_amount_without_tax = (parseFloat(tax_group_total_gross_amount_without_cash_dicount) - parseFloat(tax_group_total_cash_dicount_amount) -  parseFloat(tax_group_total_flat_amount)).toFixed(2);
				
					
			var tax_group_tax_amount = (tax_group_total_gross_amount_without_tax * (isNaN(tax_group_val) ? 0 : tax_group_val) / 100).toFixed(2);
			
			var tax_group_total_gross_amount_with_tax = (parseFloat(tax_group_total_gross_amount_without_tax) + parseFloat(tax_group_tax_amount)).toFixed(2);
			
			
		
			var table = '<div class="inner_tax_group"><table class="tax_group_table table table-bordered blockContainer showInlineTable equalSplit"><tbody><tr><td class="tax_group_lable"><label>Total Gross Amount</label></td><td><input class="group_tax_calc" name="tax_group_gross_amount['+i+']" id="tax_group_gross_amount_'+i+'" type="text" value="'+tax_group_total_net_amount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Discount percent</label></td><td><input class="group_tax_calc" name="tax_group_discount_amount['+i+']" id="tax_group_discount_amount_'+i+'" type="text" value="'+tax_group_total_discount_amount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Gross Amount Without Cash Discount</label></td><td><input class="group_tax_calc" name="tax_group_without_cash_discount_amount['+i+']" id="tax_group_without_cash_discount_amount_'+i+'" type="text" value="'+tax_group_total_gross_amount_without_cash_dicount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Cash Discount('+customer_cash_discount+'%)</label></td><td><input class="group_tax_calc" name="tax_group_cash_discount_amount['+i+']" id="tax_group_cash_discount_amount_'+i+'" type="text" value="'+tax_group_total_cash_dicount_amount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Flat Discount</label></td><td><input class="group_tax_calc" name="tax_group_flat_amount['+i+']" id="tax_group_flat_amount_'+i+'" type="text" value="'+tax_group_total_flat_amount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Gross Amount Without Tax</label></td><td><input class="group_tax_calc" name="tax_group_without_tax_gross_amount['+i+']" id="tax_group_without_tax_gross_amount_'+i+'" type="text" value="'+tax_group_total_gross_amount_without_tax+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Tax('+tax_group_val+'%) Amount</label></td><td><input class="group_tax_calc" name="tax_group_tax_amount['+i+']" id="tax_group_tax_amount_'+i+'" type="text" value="'+tax_group_tax_amount+'" readonly="readonly"><input name="tax_group_tax_percentage['+i+']" id="tax_group_tax_percentage_'+i+'" type="hidden" value="'+tax_group_val+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Gross Amount With Tax</label></td><td><input class="group_tax_calc" name="tax_group_with_tax_gross_amount['+i+']" id="tax_group_with_tax_gross_amount_'+i+'" type="text" value="'+tax_group_total_gross_amount_with_tax+'" readonly="readonly"></td></tr></tbody></table></div><br />';
			
			$("#tax_group_length").val(tax_group.length);
			$('#tax_group_calculation').append(table);
			
		}
	}
	else
	{
		var tax_group = ["0.00"];
		
		var tax_group_total_net_amount = 0;
		$('input[name^="item_gross_amount"]').each(function()
		{
				var item_gross_amount = $(this).val();
				tax_group_total_net_amount = (parseFloat(tax_group_total_net_amount) + parseFloat(item_gross_amount)).toFixed(2);
		});
		
			
		var tax_group_total_flat_amount = 0;
		$('input[name^="item_flat_discount"]').each(function()
		{
				var item_flat_discount = $(this).val();
				tax_group_total_flat_amount = (parseFloat(tax_group_total_flat_amount) + parseFloat(item_flat_discount)).toFixed(2);
		});
			
			//alert(tax_group_total_flat_amount);
				
		var tax_group_total_discount_amount = 0;
		$('input[name^="item_discount_amount"]').each(function()
		{
				var item_discount_amount = $(this).val();
				tax_group_total_discount_amount = (parseFloat(tax_group_total_discount_amount) + parseFloat(item_discount_amount)).toFixed(2);
		});
		
			var tax_group_total_tax_amount = "0.00";
			
			var tax_group_total_gross_amount_without_cash_dicount = (parseFloat(tax_group_total_net_amount) - parseFloat(tax_group_total_discount_amount)).toFixed(2);
			
			var tax_group_total_cash_dicount_amount = (tax_group_total_gross_amount_without_cash_dicount * (isNaN(customer_cash_discount) ? 0 : customer_cash_discount) / 100).toFixed(2);	
			
			var tax_group_total_gross_amount_without_tax = (parseFloat(tax_group_total_gross_amount_without_cash_dicount) - parseFloat(tax_group_total_cash_dicount_amount)-  parseFloat(tax_group_total_flat_amount)).toFixed(2);			
			var tax_group_tax_amount = (tax_group_total_gross_amount_without_tax * (isNaN(tax_group_val) ? 0 : tax_group_val) / 100).toFixed(2);
			
			var tax_group_total_gross_amount_with_tax = (parseFloat(tax_group_total_gross_amount_without_tax) + parseFloat(tax_group_tax_amount)).toFixed(2);
			
			var i = 0;
			
			var table = '<div class="inner_tax_group"><table class="tax_group_table table table-bordered blockContainer showInlineTable equalSplit"><tbody><tr><td class="tax_group_lable"><label>Total Gross Amount</label></td><td><input class="group_tax_calc" name="tax_group_gross_amount['+i+']" id="tax_group_gross_amount_'+i+'" type="text" value="'+tax_group_total_net_amount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Discount('+customer_discount_percentage+'%)</label></td><td><input class="group_tax_calc" name="tax_group_discount_amount['+i+']" id="tax_group_discount_amount_'+i+'" type="text" value="'+tax_group_total_discount_amount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Gross Amount Without Cash Discount</label></td><td><input class="group_tax_calc" name="tax_group_without_cash_discount_amount['+i+']" id="tax_group_without_cash_discount_amount_'+i+'" type="text" value="'+tax_group_total_gross_amount_without_cash_dicount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Cash Discount('+customer_cash_discount+'%)</label></td><td><input class="group_tax_calc" name="tax_group_cash_discount_amount['+i+']" id="tax_group_cash_discount_amount_'+i+'" type="text" value="'+tax_group_total_cash_dicount_amount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Flat Discount</label></td><td><input class="group_tax_calc" name="tax_group_flat_amount['+i+']" id="tax_group_flat_amount_'+i+'" type="text" value="'+tax_group_total_flat_amount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Gross Amount Without Tax</label></td><td><input class="group_tax_calc" name="tax_group_without_tax_gross_amount['+i+']" id="tax_group_without_tax_gross_amount_'+i+'" type="text" value="'+tax_group_total_gross_amount_without_tax+'" readonly="readonly"><input class="group_tax_calc" name="tax_group_tax_amount['+i+']" id="tax_group_tax_amount_'+i+'" type="hidden" value="'+tax_group_tax_amount+'" readonly="readonly"><input name="tax_group_tax_percentage['+i+']" id="tax_group_tax_percentage_'+i+'" type="hidden" value="'+tax_group_val+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Gross Amount With Tax</label></td><td><input class="group_tax_calc" name="tax_group_with_tax_gross_amount['+i+']" id="tax_group_with_tax_gross_amount_'+i+'" type="text" value="'+tax_group_total_gross_amount_with_tax+'" readonly="readonly"></td></tr></tbody></table></div><br />';
			
			$("#tax_group_length").val(tax_group.length);
			$('#tax_group_calculation').append(table);
			
		
		
	}
}