
function purchase_popup_onkeyupfortotal(event)
{
	var target = $(event.target);
	
	var typeval = $(event.target).val();
	
	var popup_item_qty = $("#popup_item_qty").val();
	var	popup_priceperunit = $("#popup_item_priceperunit").val();
	var	tax_percent = $("#popup_item_tax_percent").val();
	var	popup_item_discount = $("#popup_item_discount").val();
		
	if(!isNaN(typeval))
	{
		$(".nums_error").css("display", "none");
		
		if(popup_item_qty != "" && popup_priceperunit != "")
		{
			var popup_gross_amount = (parseFloat(popup_item_qty).toFixed(2)) * (parseFloat(popup_priceperunit).toFixed(2));
			
			var item_tax_percent = (parseFloat((isNaN(tax_percent) ? 0 : tax_percent))).toFixed(2);
			
			var item_discount_amount = (popup_gross_amount * (isNaN(popup_item_discount) ? 0 : popup_item_discount) / 100).toFixed(2);
			var item_gross_amount_with_discount = parseFloat(popup_gross_amount)- parseFloat(item_discount_amount);
		
			var item_tax_amount = (item_gross_amount_with_discount * (isNaN(item_tax_percent) ? 0 : item_tax_percent) / 100).toFixed(2);
		
			var item_net_amount = ((parseFloat(popup_gross_amount)-parseFloat(item_discount_amount))+parseFloat(item_tax_amount)).toFixed(2);
			
			$("#popup_item_rate").val(item_net_amount);
		}
	}
	else
	{
		$(target).val("");
		$("#singleitem_popup_error").css("display", "block");
	}
}

function purchase_multiplepopuptotal(event, id)

{
	var target = $(event.target);
	
	var typeval = $(event.target).val();
	
	var popup_item_qty = $("#multiple_item_qty_"+id).val();
	var popup_priceperunit = $("#multiple_item_priceperunit_"+id).val();
	var tax_percent = $("#multiple_item_tax_percent_"+id).val();
	
	var excise_percent = $("#multiple_item_excise_percent_"+id).val();
	
	var popup_item_discount = $("#multiple_item_discount_"+id).val();
		
	if(!isNaN(typeval))
	{
		$(".nums_error").css("display", "none");
		
		if(popup_item_qty != "" && popup_priceperunit != "")
		{
			
			var popup_gross_amount = (parseFloat(popup_item_qty)) * (parseFloat(popup_priceperunit));
			
			var item_tax_percent = (parseFloat((isNaN(tax_percent) ? 0 : tax_percent)));
			
			var item_excise_percent = (parseFloat((isNaN(excise_percent) ? 0 : excise_percent)));
			
			var item_discount_amount = (popup_gross_amount * (isNaN(popup_item_discount) ? 0 : popup_item_discount) / 100).toFixed(2);
		
			var item_gross_amount_with_discount = parseFloat(popup_gross_amount)- parseFloat(item_discount_amount);
			
			var item_tax_amount = (item_gross_amount_with_discount * (isNaN(item_tax_percent) ? 0 : item_tax_percent) / 100).toFixed(2);
			
			var item_excise_amount = (item_gross_amount_with_discount * (isNaN(item_excise_percent) ? 0 : item_excise_percent) / 100).toFixed(2);
			
			var item_net_amount = (item_gross_amount_with_discount + parseFloat(item_tax_amount) + parseFloat(item_excise_amount)).toFixed(2);
			
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

/*function purchase_items_grid_total(event, id)
{
	
	var target = $(event.target);
	
	var typeval = $(event.target).val();
	
	var item_qty = $("#item_qty_"+id).val();
	var item_priceperunit = $("#item_priceperunit_"+id).val();
	var item_tax_percent = $("#item_tax_percent_"+id).val();
	var item_excise_percent = $("#item_excise_percent_"+id).val();
	
	var item_discount_percent = $("#item_discount_percent_"+id).val();
		
	if(!isNaN(typeval))
	{
		$(".nums_error").css("display", "none");
		
		if(item_qty != "" && item_priceperunit != "")
		{
			var popup_gross_amount = (parseFloat(item_qty)) * (parseFloat(item_priceperunit));
			
			var tax_percent = (parseFloat((isNaN(item_tax_percent) ? 0 : item_tax_percent)));
			
			var excise_percent = (parseFloat((isNaN(item_excise_percent) ? 0 : item_excise_percent)));
			
			var item_discount_amount = (popup_gross_amount * (isNaN(item_discount_percent) ? 0 : item_discount_percent) / 100).toFixed(2);
		
			var item_gross_amount_with_discount = parseFloat(popup_gross_amount)- parseFloat(item_discount_amount);
			
			var item_tax_amount = (item_gross_amount_with_discount * (isNaN(tax_percent) ? 0 : tax_percent) / 100).toFixed(2);
			
			var item_excise_amount = (item_gross_amount_with_discount * (isNaN(excise_percent) ? 0 : excise_percent) / 100).toFixed(2);
			
			var item_net_amount = (item_gross_amount_with_discount + parseFloat(item_tax_amount) + parseFloat(item_excise_amount)).toFixed(2);
			
			$("#item_gross_amount_"+id).val(popup_gross_amount);
			$("#item_discount_amount_"+id).val(item_discount_amount);
			$("#item_tax_amount_"+id).val(item_tax_amount);
			$("#item_excise_amount_"+id).val(item_excise_amount);
			$("#item_net_amount_"+id).val(item_net_amount);
			if(!isNaN(tax_percent))
			{	
				purchase_calculatetotal();
			}
		}
	}
	else
	{
		$(target).val("");
		$("#item_net_amount_"+id).val("");
		$("#last_table_idError").text("Please Enter Numeric Only");
	}		 
}*/

// JavaScript Document

/*function purchase_itemsgridrowdelete(id)
{
	alert('ds');
	
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
			var	popup_item_vat  = $("#item_vat_"+counter).val();
			var	popup_item_gst  = $("#item_gst_"+counter).val();
			var	popup_item_cst  = $("#item_cst_"+counter).val();
			var	popup_item_serv_tax  = $("#item_serv_tax_"+counter).val();
			var	popup_item_exc  = $("#item_exc_"+counter).val();
			var	item_tax_amount  = $("#item_tax_amount_"+counter).val();
			var	popup_item_discount_percent  = $("#item_discount_percent_"+counter).val();
			var	item_discount_amount  = $("#item_discount_amount_"+counter).val();
			var	item_net_amount  = $("#item_net_amount_"+counter).val();
			
			
			
			if(popup_item_id != itemid)	
			{	
				 i++;
				 
				  var items ='<tr><td><a href="javascript:void(0);" id="item_code_value_'+i+'">'+popup_item_code+'</a><input id="item_code_'+i+'" name="item_code['+i+']" value="'+popup_item_code+'" type="hidden" /><input id="item_id_'+i+'" name="item_id['+i+']" value="'+popup_item_id+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_mfg_prtno_value_'+i+'">'+popup_item_mfg_prtno+'</a><input id="item_mfg_prtno_'+i+'" name="item_mfg_prtno['+i+']" value="'+popup_item_mfg_prtno+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_name_value_'+i+'">'+popup_item_name+'</a><input id="item_name_'+i+'" name="item_name['+i+']" value="'+popup_item_name+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_uom_name_value_'+i+'">'+popup_item_uom_name+'</a><input id="item_uom_id_'+i+'" name="item_uom_id['+i+']" type="hidden" value="'+popup_item_uom_id+'" /><input id="item_uom_name_'+i+'" name="item_uom_name['+i+']" type="hidden" value="'+popup_item_uom_name+'" /></td><td><input id="item_qty_'+i+'" name="item_qty['+i+']" value="'+popup_item_qty+'" type="text" class="quantity stock_text" /></td><td><input id="item_priceperunit_'+i+'" name="item_priceperunit['+i+']" value="'+popup_item_priceperunit+'" type="text" class="quantity" /></td><td><input id="item_gross_amount_'+i+'" name="item_gross_amount['+i+']" value="'+popup_gross_amount+'" type="text" class="quantity stock_text" /></td><td><input id="item_discount_percent_'+i+'" name="item_discount_percent['+i+']" value="'+popup_item_discount_percent+'" type="text" class="quantity stock_text" /></td><td><input id="item_discount_amount_'+i+'" name="item_discount_amount['+i+']" value="'+item_discount_amount+'" type="text" class="quantity stock_text" /></td><td><input id="item_tax_percent_'+i+'" name="item_tax_percent['+i+']" value="'+item_tax_percent+'" type="text" class="quantity stock_text" readonly="readonly" /><input id="item_vat_'+i+'" name="item_vat['+i+']" value="'+popup_item_vat+'" type="hidden" /><input id="item_gst_'+i+'" name="item_gst['+i+']" value="'+popup_item_gst+'" type="hidden" /><input id="item_cst_'+i+'" name="item_cst['+i+']" value="'+popup_item_cst+'" type="hidden" /><input id="item_serv_tax_'+i+'" name="item_serv_tax['+i+']" value="'+popup_item_serv_tax+'" type="hidden" /><input id="item_exc_'+i+'" name="item_exc['+i+']" value="'+popup_item_exc+'" type="hidden" /></td><td><input id="item_tax_amount_'+i+'" name="item_tax_amount['+i+']" value="'+item_tax_amount+'" type="text" class="quantity stock_text" readonly="readonly" /></td><td><input id="item_net_amount_'+i+'" name="item_net_amount['+i+']" value="'+item_net_amount+'" type="text" class="quantity" /></td><td colspan="2"><div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_delete_'+i+'" onclick="return purchase_itemsgridrowdelete('+i+');" data-item="'+popup_item_id+'" data-delete="'+i+'" title="Delete"><span class="icon-trash"></span></div></td></tr>';
				  
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
				
		return purchase_calculatetotal();
		
		return false;
    }
  	else 
  	{
      return false;
    }
	
}
*/




function purchase_calculateGrandTotal(event) 
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
				var result = ((parseFloat(total_gross_amount) - parseFloat(total_disocunts_amount)) + parseFloat(total_tax_amount) + parseFloat(total_shipping_charges));
				
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
/*
function purchase_group_tax_calculation()
{
	
	var tax_group = [];
		
		$('input[name^="item_tax_percent"]').each(function()
		{
				var tax_group_item_tax_percent = $(this).val();
				if(!isNaN(tax_group_item_tax_percent) && tax_group_item_tax_percent != "")
				{
					n = jQuery.inArray(tax_group_item_tax_percent,tax_group);
					if(n == -1)
					{
						tax_group.push(tax_group_item_tax_percent);
					}
				}
		}); 
		var excise_group = [];
		
		$('input[name^="item_excise_percent"]').each(function()
		{
				var excise_group_item_excise_percent = $(this).val();
				if(!isNaN(excise_group_item_excise_percent) && excise_group_item_excise_percent != "")
				{
					n = jQuery.inArray(excise_group_item_excise_percent,excise_group);
					if(n == -1)
					{
						excise_group.push(excise_group_item_excise_percent);
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
					if(!isNaN(print_tax_group_item_tax_percent)  && print_tax_group_item_tax_percent != "")
					{
						if(print_tax_group_item_tax_percent == tax_group_val)
						{
							var tax_group_id = $(this).attr("id");
							
							var tax_group_segments =  tax_group_id.substr(tax_group_id.lastIndexOf('_') + 1);
							
							print_tax_group.push(tax_group_segments);
						}
					}
			}); 
			
			
			
			
			
		
			
		
			var tax_group_total_net_amount = 0;
			var tax_group_total_discount_amount = 0;
			var tax_group_total_tax_amount = 0;
			var excise_group_total_excise_amount = 0;
					for (k=0; k<print_tax_group.length; k++)
			{						
					var tax_group_item_gross_amount = $("#item_gross_amount_"+print_tax_group[k]).val();
					var tax_group_item_discount_amount = $("#item_discount_amount_"+print_tax_group[k]).val();
					var tax_group_item_tax_amount = $("#item_tax_amount_"+print_tax_group[k]).val();
					var tax_group_item_excise_amount = $("#item_excise_amount_"+print_tax_group[k]).val();
					tax_group_total_net_amount = (parseFloat(tax_group_total_net_amount) + parseFloat(tax_group_item_gross_amount)).toFixed(2);
					tax_group_total_discount_amount = (parseFloat(tax_group_total_discount_amount) + parseFloat(tax_group_item_discount_amount)).toFixed(2);
					tax_group_total_tax_amount = (parseFloat(tax_group_total_tax_amount) + parseFloat(tax_group_item_tax_amount)).toFixed(2);
					excise_group_total_excise_amount = (parseFloat(excise_group_total_excise_amount) + parseFloat(tax_group_item_excise_amount)).toFixed(2);
					
			}
			
			tax_group_total_gross_amount_without_tax = (parseFloat(tax_group_total_net_amount) - parseFloat(tax_group_total_discount_amount)).toFixed(2);
			tax_group_total_gross_amount_with_tax = (parseFloat(tax_group_total_gross_amount_without_tax) + parseFloat(tax_group_total_tax_amount) + parseFloat(excise_group_total_excise_amount)).toFixed(2);
			
			var table = '<table class="tax_group_table table table-bordered blockContainer showInlineTable equalSplit"><tbody><tr><td class="tax_group_lable"><label>Total Gross Amount</label></td><td><input class="group_tax_calc" name="tax_group_gross_amount['+i+']" id="tax_group_gross_amount_'+i+'" type="text" value="'+tax_group_total_net_amount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Discount</label></td><td><input class="group_tax_calc" name="tax_group_discount_amount['+i+']" id="tax_group_discount_amount_'+i+'" type="text" value="'+tax_group_total_discount_amount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Gross Amount Without Tax</label></td><td><input class="group_tax_calc" name="tax_group_without_tax_gross_amount['+i+']" id="tax_group_without_tax_gross_amount_'+i+'" type="text" value="'+tax_group_total_gross_amount_without_tax+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Tax('+tax_group_val+'%) Amount</label></td><td><input class="group_tax_calc" name="tax_group_tax_amount['+i+']" id="tax_group_tax_amount_'+i+'" type="text" value="'+tax_group_total_tax_amount+'" readonly="readonly"><input name="tax_group_tax_percentage['+i+']" id="tax_group_tax_percentage_'+i+'" type="hidden" value="'+tax_group_val+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Excise Duty('+excise_group+'%) Amount</label></td><td><input class="group_tax_calc" name="excise_group_excise_amount['+i+']" id="excise_group_excise_amount_'+i+'" type="text" value="'+excise_group_total_excise_amount+'" readonly="readonly"><input name="excise_group_excise_percentage['+i+']" id="excise_group_excise_percentage_'+i+'" type="hidden" value="'+excise_group+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Gross Amount With Tax</label></td><td><input class="group_tax_calc" name="tax_group_with_tax_gross_amount['+i+']" id="tax_group_with_tax_gross_amount_'+i+'" type="text" value="'+tax_group_total_gross_amount_with_tax+'" readonly="readonly"></td></tr></tbody></table><br />';
			
			$("#tax_group_length").val(tax_group.length);
			$('#tax_group_calculation').append(table);
			
		
		}
}*/


function return_purchase_group_tax_calculation()
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
			
			var table = '<table class="tax_group_table table table-bordered blockContainer showInlineTable equalSplit"><tbody><tr><td class="tax_group_lable"><label>Total Gross Amount</label></td><td><input class="group_tax_calc" name="tax_group_gross_amount['+i+']" id="tax_group_gross_amount_'+i+'" type="text" value="'+tax_group_total_net_amount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Discount</label></td><td><input class="group_tax_calc" name="tax_group_discount_amount['+i+']" id="tax_group_discount_amount_'+i+'" type="text" value="'+tax_group_total_discount_amount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Gross Amount Without Tax</label></td><td><input class="group_tax_calc" name="tax_group_without_tax_gross_amount['+i+']" id="tax_group_without_tax_gross_amount_'+i+'" type="text" value="'+tax_group_total_gross_amount_without_tax+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Tax('+tax_group_val+'%) Amount</label></td><td><input class="group_tax_calc" name="tax_group_tax_amount['+i+']" id="tax_group_tax_amount_'+i+'" type="text" value="'+tax_group_total_tax_amount+'" readonly="readonly"><input name="tax_group_tax_percentage['+i+']" id="tax_group_tax_percentage_'+i+'" type="hidden" value="'+tax_group_val+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Gross Amount With Tax</label></td><td><input class="group_tax_calc" name="tax_group_with_tax_gross_amount['+i+']" id="tax_group_with_tax_gross_amount_'+i+'" type="text" value="'+tax_group_total_gross_amount_with_tax+'" readonly="readonly"></td></tr></tbody></table><br />';
			
			$("#tax_group_length").val(tax_group.length);
			$('#tax_group_calculation').append(table);
			
		}
}

function purchase_return_product_calc()
{
	
	$('#tax_group_calculation').html('');
	
	return_purchase_group_tax_calculation();
	
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
	
	 $("#total_disocunts_amount").val(total_disocunts_amount);
	
	
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

$(document).ready(function () {
	    
    $("#report_from").datepicker({
	dateFormat:'dd-mm-yy',
	changeMonth: true,
	changeYear: true,
	maxDate: new Date,
	}); 

	$("#report_to").datepicker({
	dateFormat:'dd-mm-yy',
	changeMonth: true,
	changeYear: true,
	maxDate: new Date,
	}); 
   
});

function purchase_popup_onkeyupfortotal(event)
{
	var target = $(event.target);
	
	var typeval = $(event.target).val();
	
	var popup_item_qty = $("#popup_item_qty").val();
	var	popup_priceperunit = $("#popup_item_priceperunit").val();
	var	tax_percent = $("#popup_item_tax_percent").val();
	var	popup_item_discount = $("#popup_item_discount").val();
		
	if(!isNaN(typeval))
	{
		$(".nums_error").css("display", "none");
		
		if(popup_item_qty != "" && popup_priceperunit != "")
		{
			var popup_gross_amount = (parseFloat(popup_item_qty).toFixed(2)) * (parseFloat(popup_priceperunit).toFixed(2));
			
			var item_tax_percent = (parseFloat((isNaN(tax_percent) ? 0 : tax_percent))).toFixed(2);
			
			var item_discount_amount = (popup_gross_amount * (isNaN(popup_item_discount) ? 0 : popup_item_discount) / 100).toFixed(2);
			var item_gross_amount_with_discount = parseFloat(popup_gross_amount)- parseFloat(item_discount_amount);
		
			var item_tax_amount = (item_gross_amount_with_discount * (isNaN(item_tax_percent) ? 0 : item_tax_percent) / 100).toFixed(2);
		
			var item_net_amount = ((parseFloat(popup_gross_amount)-parseFloat(item_discount_amount))+parseFloat(item_tax_amount)).toFixed(2);
			
			$("#popup_item_rate").val(item_net_amount);
		}
	}
	else
	{
		$(target).val("");
		$("#singleitem_popup_error").css("display", "block");
	}
}

function purchase_multiplepopuptotal(event, id)
{
	
	var target = $(event.target);
	
	var typeval = $(event.target).val();
	
	var item_igst_name = $("#item_igst_name_").val();
	
	var popup_item_qty = $("#multiple_item_qty_"+id).val();
	var popup_priceperunit = $("#multiple_item_priceperunit_"+id).val();
	var tax_percent = $("#multiple_item_tax_percent_"+id).val();
	
	var excise_percent = $("#multiple_item_excise_percent_"+id).val();
	
	var igst_tax_percent = $("#multiple_item_igst_percent_"+id).val();
	
	var popup_item_discount = $("#multiple_item_discount_"+id).val();
		
	if(!isNaN(typeval) && item_igst_name == '0')
	{
		$(".nums_error").css("display", "none");
		
		if(popup_item_qty != "" && popup_priceperunit != "")
		{
			
			var popup_gross_amount = (parseFloat(popup_item_qty)) * (parseFloat(popup_priceperunit));
			
			var item_tax_percent = (parseFloat((isNaN(tax_percent) ? 0 : tax_percent)));
			
			var item_excise_percent = (parseFloat((isNaN(excise_percent) ? 0 : excise_percent)));
			
			var item_discount_amount = (popup_gross_amount * (isNaN(popup_item_discount) ? 0 : popup_item_discount) / 100).toFixed(2);
		
			var item_gross_amount_with_discount = parseFloat(popup_gross_amount)- parseFloat(item_discount_amount);
			
			var item_tax_amount = (item_gross_amount_with_discount * (isNaN(item_tax_percent) ? 0 : item_tax_percent) / 100).toFixed(2);
			
			var item_excise_amount = (item_gross_amount_with_discount * (isNaN(item_excise_percent) ? 0 : item_excise_percent) / 100).toFixed(2);
			
			var item_net_amount = (item_gross_amount_with_discount + parseFloat(item_tax_amount) + parseFloat(item_excise_amount)).toFixed(2);
			
			$("#multiple_item_rate_"+id).val(item_net_amount);
		}
	}
	
	else if(!isNaN(typeval) && item_igst_name == '1')
	{
		$(".nums_error").css("display", "none");
		
		if(popup_item_qty != "" && popup_priceperunit != "")
		{
			
			var popup_gross_amount = (parseFloat(popup_item_qty)) * (parseFloat(popup_priceperunit));
			
			var igst_tax_percent = (parseFloat((isNaN(igst_tax_percent) ? 0 : igst_tax_percent)));
			
			var item_discount_amount = (popup_gross_amount * (isNaN(popup_item_discount) ? 0 : popup_item_discount) / 100).toFixed(2);
		
			var item_gross_amount_with_discount = parseFloat(popup_gross_amount)- parseFloat(item_discount_amount);
			
			var item_igst_tax_amount = (item_gross_amount_with_discount * (isNaN(igst_tax_percent) ? 0 : igst_tax_percent) / 100).toFixed(2);
			
			var item_net_amount = (item_gross_amount_with_discount + parseFloat(item_igst_tax_amount)).toFixed(2);
			
			$("#multiple_item_rate_"+id).val(item_net_amount);
		}
	}
	
	else if(!isNaN(typeval))
	{
		$(".nums_error").css("display", "none");
		
		if(popup_item_qty != "" && popup_priceperunit != "")
		{
			
			var popup_gross_amount = (parseFloat(popup_item_qty)) * (parseFloat(popup_priceperunit));
			
			var item_tax_percent = (parseFloat((isNaN(tax_percent) ? 0 : tax_percent)));
			
			var item_excise_percent = (parseFloat((isNaN(excise_percent) ? 0 : excise_percent)));
			
			var item_discount_amount = (popup_gross_amount * (isNaN(popup_item_discount) ? 0 : popup_item_discount) / 100).toFixed(2);
		
			var item_gross_amount_with_discount = parseFloat(popup_gross_amount)- parseFloat(item_discount_amount);
			
			var item_tax_amount = (item_gross_amount_with_discount * (isNaN(item_tax_percent) ? 0 : item_tax_percent) / 100).toFixed(2);
			
			var item_excise_amount = (item_gross_amount_with_discount * (isNaN(item_excise_percent) ? 0 : item_excise_percent) / 100).toFixed(2);
			
			var item_net_amount = (item_gross_amount_with_discount + parseFloat(item_tax_amount) + parseFloat(item_excise_amount)).toFixed(2);
			
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

function purchase_items_grid_total(event, id)
{
	var item_igst_name = $("#item_igst_name_").val();
	
	var target = $(event.target);
	
	var typeval = $(event.target).val();
	
	var item_qty = $("#item_qty_"+id).val();
	var item_priceperunit = $("#item_priceperunit_"+id).val();
	var item_tax_percent = $("#item_tax_percent_"+id).val();
	var item_excise_percent = $("#item_excise_percent_"+id).val();
	var item_discount_percent = $("#item_discount_percent_"+id).val();
	
	var igst_tax_percent = $("#item_igst_tax_percent_"+id).val();
	var item_scheme_percent = $("#item_scheme_percent_"+id).val();
	//alert(item_scheme_percent);
	if(!isNaN(typeval) && item_igst_name == '0')
	{
		$(".nums_error").css("display", "none");
		
		if(item_qty != "" && item_priceperunit != "")
		{
			var popup_gross_amount = (parseFloat(item_qty)) * (parseFloat(item_priceperunit));
			
			if(item_scheme_percent != '')
			{
			var popup_gross_amount_scheme = (popup_gross_amount * item_scheme_percent  / 100).toFixed(2);
			//alert(popup_gross_amount_scheme);
			var popup_total_amount = (parseFloat(popup_gross_amount)) - (parseFloat(popup_gross_amount_scheme));
			//alert(popup_total_amount);
			var item_discount_amount = (popup_total_amount * (isNaN(item_discount_percent) ? 0 : item_discount_percent) / 100).toFixed(2);
			//alert(item_discount_amount);
			var item_gross_amount_with_discount = parseFloat(popup_total_amount)- parseFloat(item_discount_amount);
			//alert(item_gross_amount_with_discount);
			
			$("#item_scheme_amount_"+id).val(popup_gross_amount_scheme);
			}
			else
			{
				var item_discount_amount = (popup_gross_amount * (isNaN(item_discount_percent) ? 0 : item_discount_percent) / 100).toFixed(2);
				var item_gross_amount_with_discount = parseFloat(popup_gross_amount)- parseFloat(item_discount_amount);
			}
			var tax_percent = (parseFloat((isNaN(item_tax_percent) ? 0 : item_tax_percent)));
			
			var excise_percent = (parseFloat((isNaN(item_excise_percent) ? 0 : item_excise_percent)));
			
			
		
			
			
			var item_tax_amount = (item_gross_amount_with_discount * (isNaN(tax_percent) ? 0 : tax_percent) / 100).toFixed(2);
			
			var item_excise_amount = (item_gross_amount_with_discount * (isNaN(tax_percent) ? 0 : excise_percent) / 100).toFixed(2);
			
			var item_net_amount = (item_gross_amount_with_discount + parseFloat(item_tax_amount) + parseFloat(item_excise_amount)).toFixed(2);
			
			$("#item_gross_amount_"+id).val(popup_gross_amount);
			$("#item_discount_amount_"+id).val(item_discount_amount);
			$("#item_tax_amount_"+id).val(item_tax_amount);
			$("#item_excise_amount_"+id).val(item_excise_amount);
			$("#item_net_amount_"+id).val(item_net_amount);
			if(!isNaN(tax_percent))
			{	
				purchase_calculatetotal();
			}
		}
	}
	
	else if(!isNaN(typeval) && item_igst_name == '1')
	{
		$(".nums_error").css("display", "none");
		
		if(item_qty != "" && item_priceperunit != "")
		{
			var popup_gross_amount = (parseFloat(item_qty)) * (parseFloat(item_priceperunit));
			
			var igst_tax_percent = (parseFloat((isNaN(igst_tax_percent) ? 0 : igst_tax_percent)));
			
			
			var item_discount_amount = (popup_gross_amount * (isNaN(item_discount_percent) ? 0 : item_discount_percent) / 100).toFixed(2);
			var item_gross_amount_with_discount = parseFloat(popup_gross_amount)- parseFloat(item_discount_amount);
			
			var item_igst_tax_amount = (item_gross_amount_with_discount * (isNaN(igst_tax_percent) ? 0 : igst_tax_percent) / 100).toFixed(2);
					
			var item_net_amount = (item_gross_amount_with_discount + parseFloat(item_igst_tax_amount)).toFixed(2);
		
			$("#item_gross_amount_"+id).val(popup_gross_amount);
			$("#item_discount_amount_"+id).val(item_discount_amount);
			$("#item_igst_tax_amount_"+id).val(item_igst_tax_amount);
			$("#item_net_amount_"+id).val(item_net_amount);
			if(!isNaN(igst_tax_percent))
			{	
				purchase_calculatetotal();
			}
		}
	}
	
	else if(!isNaN(typeval))
	{
		$(".nums_error").css("display", "none");
		
		if(item_qty != "" && item_priceperunit != "")
		{
			var popup_gross_amount = (parseFloat(item_qty)) * (parseFloat(item_priceperunit));
			
			var tax_percent = (parseFloat((isNaN(item_tax_percent) ? 0 : item_tax_percent)));
			
			var excise_percent = (parseFloat((isNaN(item_excise_percent) ? 0 : item_excise_percent)));
			
			var item_discount_amount = (popup_gross_amount * (isNaN(item_discount_percent) ? 0 : item_discount_percent) / 100).toFixed(2);
		
			var item_gross_amount_with_discount = parseFloat(popup_gross_amount)- parseFloat(item_discount_amount);
			
			var item_tax_amount = (item_gross_amount_with_discount * (isNaN(tax_percent) ? 0 : tax_percent) / 100).toFixed(2);
			
			var item_excise_amount = (item_gross_amount_with_discount * (isNaN(tax_percent) ? 0 : excise_percent) / 100).toFixed(2);
			
			var item_net_amount = (item_gross_amount_with_discount + parseFloat(item_tax_amount) + parseFloat(item_excise_amount)).toFixed(2);
			
			$("#item_gross_amount_"+id).val(popup_gross_amount);
			$("#item_discount_amount_"+id).val(item_discount_amount);
			$("#item_tax_amount_"+id).val(item_tax_amount);
			$("#item_excise_amount_"+id).val(item_excise_amount);
			$("#item_net_amount_"+id).val(item_net_amount);
			if(!isNaN(tax_percent))
			{	
				purchase_calculatetotal();
			}
		}
	}
	
	else
	{
		$(target).val("");
		$("#item_net_amount_"+id).val("");
		$("#last_table_idError").text("Please Enter Numeric Only");
	}		 
}

// JavaScript Document

function purchase_itemsgridrowdelete(id)
{
	var item_igst_name = $("#item_igst_name_").val();
	
	sure = confirm('Are you sure to Delete?');
	if(item_igst_name == '0')
	{
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
		
		var newarray = "";
		
		var i = 0;
		for(var counter=1; counter<=length; counter++)
		{
			var	popup_item_id = $("#item_id_"+counter).val();
			var	popup_item_code = $("#item_code_"+counter).val();
			var	popup_item_name = $("#item_name_"+counter).val();
			var	popup_item_name_desc = $("#item_name_desc_"+counter).val();			
			var	popup_item_mfg_prtno = $("#item_mfg_prtno_"+counter).val();
			var	popup_item_name_hsn_sac = $("#item_name_hsn_sac_"+counter).val();
			var	popup_item_uom_name  = $("#item_uom_name_"+counter).val();
			var	popup_item_uom_id  = $("#item_uom_id_"+counter).val();
			var	popup_item_priceperunit  = $("#item_priceperunit_"+counter).val();
			var	popup_item_qty  = $("#item_qty_"+counter).val();
			var	popup_gross_amount  = $("#item_gross_amount_"+counter).val();
			var	item_tax_percent  = $("#item_tax_percent_"+counter).val();
			var	popup_item_vat  = $("#item_vat_"+counter).val();
			var	popup_item_gst  = $("#item_gst_"+counter).val();
			var	popup_item_cst  = $("#item_cst_"+counter).val();
			var	popup_item_serv_tax  = $("#item_serv_tax_"+counter).val();
			var	popup_item_exc  = $("#item_exc_"+counter).val();
			var	item_excise_percent  = $("#item_excise_percent_"+counter).val();
			var	item_excise_amount  = $("#item_excise_amount_"+counter).val();
			var	item_tax_amount  = $("#item_tax_amount_"+counter).val();
			var	popup_item_discount_percent  = $("#item_discount_percent_"+counter).val();
			var	item_discount_amount  = $("#item_discount_amount_"+counter).val();
			var	item_net_amount  = $("#item_net_amount_"+counter).val();
			
			var	popup_item_store_name = $("#multiple_item_store_name_"+counter).val();
			var	popup_item_division_name = $("#multiple_item_division_name_"+counter).val();
						
			var	popup_item_sale_price = $("#item_sale_price_"+counter).val();
			var	popup_item_gain_percent = $("#item_gain_percent_"+counter).val();
			var	popup_item_scheme_percent = $("#item_scheme_percent_"+counter).val();
			var	popup_item_scheme_amount = $("#item_scheme_amount_"+counter).val();
			var	popup_item_store_id = $("#multiple_item_store_id_"+counter).val();
			var	popup_item_division_id = $("#multiple_item_division_id_"+counter).val();
		
			if(popup_item_id != itemid)	
			{	
				 i++;
				 
				  var items ='<tr><td><input id="item_id_'+i+'" name="item_id['+i+']" value="'+popup_item_id+'" type="hidden" /><a href="javascript:void(0);" id="item_mfg_prtno_value_'+i+'">'+popup_item_mfg_prtno+'</a><input id="item_mfg_prtno_'+i+'" name="item_mfg_prtno['+i+']" value="'+popup_item_mfg_prtno+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_name_value_'+i+'">'+popup_item_name+'</a><input id="item_name_'+i+'" name="item_name['+i+']" value="'+popup_item_name+'" type="hidden" /><input id="item_name_hsn_sac_'+i+'" name="item_name_hsn_sac['+i+']" value="'+popup_item_name_hsn_sac+'" type="hidden" /></td><td><input id="multiple_item_division_name_'+counter+'" name="multiple_item_division_name['+counter+']" value="'+popup_item_division_name+'" type="hidden" /><input id="multiple_item_division_id_'+counter+'" name="multiple_item_division_id['+counter+']" value="'+popup_item_division_id+'" type="hidden" /><input id="multiple_item_store_name_'+counter+'" name="multiple_item_store_name['+counter+']" value="'+popup_item_store_name+'" type="hidden" /><input id="multiple_item_store_id_'+counter+'" name="multiple_item_store_id['+counter+']" value="'+popup_item_store_id+'" type="hidden" /><input id="item_id_'+i+'" name="item_id['+i+']" value="'+popup_item_id+'" type="hidden" /><input id="item_uom_id_'+i+'" name="item_uom_id['+i+']" type="hidden" value="'+popup_item_uom_id+'" /><input id="item_uom_name_'+i+'" name="item_uom_name['+i+']" type="hidden" value="'+popup_item_uom_name+'" /><input id="item_qty_'+i+'" name="item_qty['+i+']" value="'+popup_item_qty+'" type="text" class="quantity stock_text" onkeyup="return purchase_items_grid_total(event, '+counter+')" /></td><td><input id="item_priceperunit_'+i+'" name="item_priceperunit['+i+']" value="'+popup_item_priceperunit+'" type="text" class="quantity" onkeyup="return purchase_items_grid_total(event, '+counter+')" /></td><td><input id="item_gross_amount_'+i+'" name="item_gross_amount['+i+']" value="'+popup_gross_amount+'" type="text" class="quantity stock_text" readonly="readonly"/></td><td><input id="item_sale_price_'+counter+'" name="item_sale_price['+counter+']" value="'+popup_item_sale_price+'" type="text" class="quantity stock_text"  /></td><td><input id="item_gain_percent_'+counter+'" name="item_gain_percent['+counter+']" value="'+popup_item_gain_percent+'" type="text" class="quantity stock_text"  /></td><td><input id="item_scheme_percent_'+counter+'" name="item_scheme_percent['+counter+']" value="'+popup_item_scheme_percent+'" type="text" onkeyup="return purchase_items_grid_total(event, '+counter+')" class="quantity stock_text"  /></td><td><input id="item_scheme_amount_'+counter+'" name="item_scheme_amount['+counter+']" readonly="readonly" value="'+popup_item_scheme_amount+'" type="text" class="quantity stock_text"  /></td><td><input id="item_discount_percent_'+i+'" name="item_discount_percent['+i+']" value="'+popup_item_discount_percent+'" type="text" class="quantity stock_text"   onkeyup="return purchase_items_grid_total(event, '+counter+')"/></td><td><input id="item_discount_amount_'+i+'" name="item_discount_amount['+i+']" value="'+item_discount_amount+'" type="text" class="quantity stock_text" readonly="readonly" /></td><td><input id="item_tax_percent_'+i+'" name="item_tax_percent['+i+']" value="'+item_tax_percent+'" type="text" class="quantity stock_text" onkeyup="return purchase_items_grid_total(event, '+counter+')" /><input id="item_vat_'+i+'" name="item_vat['+i+']" value="'+popup_item_vat+'" type="hidden" /><input id="item_gst_'+i+'" name="item_gst['+i+']" value="'+popup_item_gst+'" type="hidden" /><input id="item_cst_'+i+'" name="item_cst['+i+']" value="'+popup_item_cst+'" type="hidden" /><input id="item_serv_tax_'+i+'" name="item_serv_tax['+i+']" value="'+popup_item_serv_tax+'" type="hidden" /><input id="item_exc_'+i+'" name="item_exc['+i+']" value="'+popup_item_exc+'" type="hidden" /><input id="item_tax_amount_'+i+'" name="item_tax_amount['+i+']" value="'+item_tax_amount+'" type="hidden" class="quantity stock_text" readonly="readonly" /></td><td><input id="item_excise_percent_'+i+'" name="item_excise_percent['+i+']" value="'+item_excise_percent+'" type="text" class="quantity stock_text" onkeyup="return purchase_items_grid_total(event, '+counter+')" /><input id="item_excise_amount_'+i+'" name="item_excise_amount['+i+']" value="'+item_excise_amount+'" type="hidden" class="quantity stock_text" readonly="readonly" /></td><td><input id="item_net_amount_'+i+'" name="item_net_amount['+i+']" value="'+item_net_amount+'" type="text" class="quantity" readonly="readonly"/></td><td colspan="2"><div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_delete_'+i+'" onclick="return purchase_itemsgridrowdelete('+i+');" data-item="'+popup_item_id+'" data-delete="'+i+'" title="Delete"><span class="icon-trash"></span></div></td></tr>';
				  
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
				
		return purchase_calculatetotal();
		
		return false;
    }
 
	}
	else if(item_igst_name == '1')
	{
		
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
		
		var newarray = "";
		
		var i = 0;
		for(var counter=1; counter<=length; counter++)
		{
			var	popup_item_id = $("#item_id_"+counter).val();
			var	popup_item_code = $("#item_code_"+counter).val();
			var	popup_item_name = $("#item_name_"+counter).val();
			var	popup_item_name_desc = $("#item_name_desc_"+counter).val();			
			var	popup_item_mfg_prtno = $("#item_mfg_prtno_"+counter).val();
			var	popup_item_name_hsn_sac = $("#item_name_hsn_sac_"+counter).val();
			var	popup_item_uom_name  = $("#item_uom_name_"+counter).val();
			var	popup_item_uom_id  = $("#item_uom_id_"+counter).val();
			var	popup_item_priceperunit  = $("#item_priceperunit_"+counter).val();
			var	popup_item_qty  = $("#item_qty_"+counter).val();
			var	popup_gross_amount  = $("#item_gross_amount_"+counter).val();
			
			var	popup_item_vat  = $("#item_vat_"+counter).val();
			var	popup_item_gst  = $("#item_gst_"+counter).val();
			var	popup_item_cst  = $("#item_cst_"+counter).val();
			var	popup_item_serv_tax  = $("#item_serv_tax_"+counter).val();
			var	popup_item_exc  = $("#item_exc_"+counter).val();
			
			var	item_igst_tax_amount  = $("#item_igst_tax_amount_"+counter).val();
			var	item_igst_tax_percent  = $("#item_igst_tax_percent_"+counter).val();
			
			var	popup_item_discount_percent  = $("#item_discount_percent_"+counter).val();
			var	item_discount_amount  = $("#item_discount_amount_"+counter).val();
			var	item_net_amount  = $("#item_net_amount_"+counter).val();
			
			var	popup_item_store_name = $("#multiple_item_store_name_"+counter).val();
			var	popup_item_division_name = $("#multiple_item_division_name_"+counter).val();
						
			var	popup_item_store_id = $("#multiple_item_store_id_"+counter).val();
			var	popup_item_division_id = $("#multiple_item_division_id_"+counter).val();
		
			if(popup_item_id != itemid)	
			{	
				 i++;
				 
				  var items ='<tr><td><input id="item_id_'+i+'" name="item_id['+i+']" value="'+popup_item_id+'" type="hidden" /><a href="javascript:void(0);" id="item_mfg_prtno_value_'+i+'">'+popup_item_mfg_prtno+'</a><input id="item_mfg_prtno_'+i+'" name="item_mfg_prtno['+i+']" value="'+popup_item_mfg_prtno+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_name_value_'+i+'">'+popup_item_name+'</a><input id="item_name_'+i+'" name="item_name['+i+']" value="'+popup_item_name+'" type="hidden" /><br><input id="item_name_desc_'+i+'" name="item_name_desc['+i+']" value="'+popup_item_name_desc+'" type="text" style="width:100px" /></td><td><a href="javascript:void(0);" id="item_name_hsn_sac_'+i+'">'+popup_item_name_hsn_sac+'</a><input id="item_name_hsn_sac_'+i+'" name="item_name_hsn_sac['+i+']" value="'+popup_item_name_hsn_sac+'" type="hidden" /></td><td><a href="javascript:void(0);" >'+popup_item_division_name+'</a><input id="multiple_item_division_name_'+counter+'" name="multiple_item_division_name['+counter+']" value="'+popup_item_division_name+'" type="hidden" /><input id="multiple_item_division_id_'+counter+'" name="multiple_item_division_id['+counter+']" value="'+popup_item_division_id+'" type="hidden" /></td><td><a href="javascript:void(0);" >'+popup_item_store_name+'</a><input id="multiple_item_store_name_'+counter+'" name="multiple_item_store_name['+counter+']" value="'+popup_item_store_name+'" type="hidden" /><input id="multiple_item_store_id_'+counter+'" name="multiple_item_store_id['+counter+']" value="'+popup_item_store_id+'" type="hidden" /><input id="item_id_'+i+'" name="item_id['+i+']" value="'+popup_item_id+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_uom_name_value_'+i+'">'+popup_item_uom_name+'</a><input id="item_uom_id_'+i+'" name="item_uom_id['+i+']" type="hidden" value="'+popup_item_uom_id+'" /><input id="item_uom_name_'+i+'" name="item_uom_name['+i+']" type="hidden" value="'+popup_item_uom_name+'" /></td><td><input id="item_qty_'+i+'" name="item_qty['+i+']" value="'+popup_item_qty+'" type="text" class="quantity stock_text" onkeyup="return purchase_items_grid_total(event, '+counter+')" /></td><td><input id="item_priceperunit_'+i+'" name="item_priceperunit['+i+']" value="'+popup_item_priceperunit+'" type="text" class="quantity" onkeyup="return purchase_items_grid_total(event, '+counter+')" /></td><td><input id="item_brand_'+counter+'" name="item_brand['+counter+']" value="" type="text" style="width:90px"   /></td><td><input id="item_gross_amount_'+i+'" name="item_gross_amount['+i+']" value="'+popup_gross_amount+'" type="text" class="quantity stock_text" readonly="readonly"/></td><td><input id="item_discount_percent_'+i+'" name="item_discount_percent['+i+']" value="'+popup_item_discount_percent+'" type="text" class="quantity stock_text" onkeyup="return purchase_items_grid_total(event, '+counter+')"/></td><td><input id="item_discount_amount_'+i+'" name="item_discount_amount['+i+']" value="'+item_discount_amount+'" type="text" class="quantity stock_text" readonly="readonly" /></td><td><input id="item_igst_tax_percent_'+i+'" name="item_igst_tax_percent['+i+']" value="'+item_igst_tax_percent+'" type="text" class="quantity stock_text" onkeyup="return purchase_items_grid_total(event, '+counter+')" /><input id="item_vat_'+i+'" name="item_vat['+i+']" value="'+popup_item_vat+'" type="hidden" /><input id="item_gst_'+i+'" name="item_gst['+i+']" value="'+popup_item_gst+'" type="hidden" /><input id="item_cst_'+i+'" name="item_cst['+i+']" value="'+popup_item_cst+'" type="hidden" /><input id="item_serv_tax_'+i+'" name="item_serv_tax['+i+']" value="'+popup_item_serv_tax+'" type="hidden" /><input id="item_exc_'+i+'" name="item_exc['+i+']" value="'+popup_item_exc+'" type="hidden" /></td><td><input id="item_igst_tax_amount_'+i+'" name="item_igst_tax_amount['+i+']" value="'+item_igst_tax_amount+'" type="text" class="quantity stock_text" readonly="readonly" /></td><td><input id="item_net_amount_'+i+'" name="item_net_amount['+i+']" value="'+item_net_amount+'" type="text" class="quantity" readonly="readonly"/></td><td colspan="2"><div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_delete_'+i+'" onclick="return purchase_itemsgridrowdelete('+i+');" data-item="'+popup_item_id+'" data-delete="'+i+'" title="Delete"><span class="icon-trash"></span></div></td></tr>';
				  
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
				
		return purchase_calculatetotal();
		
		return false;
    }
 
		
	}
	else
	{
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
		
		var newarray = "";
		
		var i = 0;
		for(var counter=1; counter<=length; counter++)
		{
			var	popup_item_id = $("#item_id_"+counter).val();
			var	popup_item_code = $("#item_code_"+counter).val();
			var	popup_item_name = $("#item_name_"+counter).val();
			var	popup_item_name_desc = $("#item_name_desc_"+counter).val();			
			var	popup_item_mfg_prtno = $("#item_mfg_prtno_"+counter).val();
			var	popup_item_name_hsn_sac = $("#item_name_hsn_sac_"+counter).val();
			var	popup_item_uom_name  = $("#item_uom_name_"+counter).val();
			var	popup_item_uom_id  = $("#item_uom_id_"+counter).val();
			var	popup_item_priceperunit  = $("#item_priceperunit_"+counter).val();
			var	popup_item_qty  = $("#item_qty_"+counter).val();
			var	popup_gross_amount  = $("#item_gross_amount_"+counter).val();
			var	item_tax_percent  = $("#item_tax_percent_"+counter).val();
			var	popup_item_vat  = $("#item_vat_"+counter).val();
			var	popup_item_gst  = $("#item_gst_"+counter).val();
			var	popup_item_cst  = $("#item_cst_"+counter).val();
			var	popup_item_serv_tax  = $("#item_serv_tax_"+counter).val();
			var	popup_item_exc  = $("#item_exc_"+counter).val();
			var	item_excise_percent  = $("#item_excise_percent_"+counter).val();
			var	item_excise_amount  = $("#item_excise_amount_"+counter).val();
			var	item_tax_amount  = $("#item_tax_amount_"+counter).val();
			var	popup_item_discount_percent  = $("#item_discount_percent_"+counter).val();
			var	item_discount_amount  = $("#item_discount_amount_"+counter).val();
			var	item_net_amount  = $("#item_net_amount_"+counter).val();
			
			var	popup_item_store_name = $("#multiple_item_store_name_"+counter).val();
			var	popup_item_division_name = $("#multiple_item_division_name_"+counter).val();
						
			var	popup_item_store_id = $("#multiple_item_store_id_"+counter).val();
			var	popup_item_division_id = $("#multiple_item_division_id_"+counter).val();
		
			if(popup_item_id != itemid)	
			{	
				 i++;
				 
				  var items ='<tr><td><input id="item_id_'+i+'" name="item_id['+i+']" value="'+popup_item_id+'" type="hidden" /><a href="javascript:void(0);" id="item_mfg_prtno_value_'+i+'">'+popup_item_mfg_prtno+'</a><input id="item_mfg_prtno_'+i+'" name="item_mfg_prtno['+i+']" value="'+popup_item_mfg_prtno+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_name_value_'+i+'">'+popup_item_name+'</a><input id="item_name_'+i+'" name="item_name['+i+']" value="'+popup_item_name+'" type="hidden" /><br><input id="item_name_desc_'+i+'" name="item_name_desc['+i+']" value="'+popup_item_name_desc+'" type="text" style="width:100px" /></td><td><a href="javascript:void(0);" id="item_name_hsn_sac_'+i+'">'+popup_item_name_hsn_sac+'</a><input id="item_name_hsn_sac_'+i+'" name="item_name_hsn_sac['+i+']" value="'+popup_item_name_hsn_sac+'" type="hidden" /></td><td><a href="javascript:void(0);" >'+popup_item_division_name+'</a><input id="multiple_item_division_name_'+counter+'" name="multiple_item_division_name['+counter+']" value="'+popup_item_division_name+'" type="hidden" /><input id="multiple_item_division_id_'+counter+'" name="multiple_item_division_id['+counter+']" value="'+popup_item_division_id+'" type="hidden" /></td><td><a href="javascript:void(0);" >'+popup_item_store_name+'</a><input id="multiple_item_store_name_'+counter+'" name="multiple_item_store_name['+counter+']" value="'+popup_item_store_name+'" type="hidden" /><input id="multiple_item_store_id_'+counter+'" name="multiple_item_store_id['+counter+']" value="'+popup_item_store_id+'" type="hidden" /><input id="item_id_'+i+'" name="item_id['+i+']" value="'+popup_item_id+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_uom_name_value_'+i+'">'+popup_item_uom_name+'</a><input id="item_uom_id_'+i+'" name="item_uom_id['+i+']" type="hidden" value="'+popup_item_uom_id+'" /><input id="item_uom_name_'+i+'" name="item_uom_name['+i+']" type="hidden" value="'+popup_item_uom_name+'" /></td><td><input id="item_priceperunit_'+i+'" name="item_priceperunit['+i+']" value="'+popup_item_priceperunit+'" type="text" class="quantity" onkeyup="return purchase_items_grid_total(event, '+counter+')" /></td><td><input id="item_qty_'+i+'" name="item_qty['+i+']" value="'+popup_item_qty+'" type="text" class="quantity stock_text" onkeyup="return purchase_items_grid_total(event, '+counter+')" /></td><td><input id="item_brand_'+counter+'" name="item_brand['+counter+']" value="" type="text" style="width:90px"   /></td><td><input id="item_gross_amount_'+i+'" name="item_gross_amount['+i+']" value="'+popup_gross_amount+'" type="text" class="quantity stock_text" readonly="readonly"/></td><td><input id="item_discount_percent_'+i+'" name="item_discount_percent['+i+']" value="'+popup_item_discount_percent+'" type="text" class="quantity stock_text"   onkeyup="return purchase_items_grid_total(event, '+counter+')"/></td><td><input id="item_discount_amount_'+i+'" name="item_discount_amount['+i+']" value="'+item_discount_amount+'" type="text" class="quantity stock_text" readonly="readonly" /></td><td><input id="item_tax_percent_'+i+'" name="item_tax_percent['+i+']" value="'+item_tax_percent+'" type="text" class="quantity stock_text" onkeyup="return purchase_items_grid_total(event, '+counter+')" /><input id="item_vat_'+i+'" name="item_vat['+i+']" value="'+popup_item_vat+'" type="hidden" /><input id="item_gst_'+i+'" name="item_gst['+i+']" value="'+popup_item_gst+'" type="hidden" /><input id="item_cst_'+i+'" name="item_cst['+i+']" value="'+popup_item_cst+'" type="hidden" /><input id="item_serv_tax_'+i+'" name="item_serv_tax['+i+']" value="'+popup_item_serv_tax+'" type="hidden" /><input id="item_exc_'+i+'" name="item_exc['+i+']" value="'+popup_item_exc+'" type="hidden" /></td> <td><input id="item_tax_amount_'+i+'" name="item_tax_amount['+i+']" value="'+item_tax_amount+'" type="text" class="quantity stock_text" readonly="readonly" /></td><td><input id="item_excise_percent_'+i+'" name="item_excise_percent['+i+']" value="'+item_excise_percent+'" type="text" class="quantity stock_text" onkeyup="return purchase_items_grid_total(event, '+counter+')" /></td><td><input id="item_excise_amount_'+i+'" name="item_excise_amount['+i+']" value="'+item_excise_amount+'" type="text" class="quantity stock_text" readonly="readonly" /></td><td><input id="item_net_amount_'+i+'" name="item_net_amount['+i+']" value="'+item_net_amount+'" type="text" class="quantity" readonly="readonly"/></td><td colspan="2"><div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_delete_'+i+'" onclick="return purchase_itemsgridrowdelete('+i+');" data-item="'+popup_item_id+'" data-delete="'+i+'" title="Delete"><span class="icon-trash"></span></div></td></tr>';
				  
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
				
		return purchase_calculatetotal();
		
		return false;
    }
 
	}
}

function purchase_itemsgridrow_delete(id)
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
		
		var newarray = "";
		
		var i = 0;
		for(var counter=1; counter<=length; counter++)
		{
			var	popup_item_id = $("#item_id_"+counter).val();
			var	popup_item_code = $("#item_code_"+counter).val();
			var	popup_item_name = $("#item_name_"+counter).val();
			var	popup_item_mfg_prtno = $("#item_mfg_prtno_"+counter).val();
			var	popup_item_name_hsn_sac = $("#item_name_hsn_sac_"+counter).val();
			var	popup_item_uom_name  = $("#item_uom_name_"+counter).val();
			var	popup_item_uom_id  = $("#item_uom_id_"+counter).val();
			var	popup_item_priceperunit  = $("#item_priceperunit_"+counter).val();
			var	popup_item_qty  = $("#item_qty_"+counter).val();
			var	popup_gross_amount  = $("#item_gross_amount_"+counter).val();
			var	item_tax_percent  = $("#item_tax_percent_"+counter).val();
			var	popup_item_vat  = $("#item_vat_"+counter).val();
			var	popup_item_gst  = $("#item_gst_"+counter).val();
			var	popup_item_cst  = $("#item_cst_"+counter).val();
			var	popup_item_serv_tax  = $("#item_serv_tax_"+counter).val();
			var	popup_item_exc  = $("#item_exc_"+counter).val();
			var	item_excise_percent  = $("#item_excise_percent_"+counter).val();
			var	item_excise_amount  = $("#item_excise_amount_"+counter).val();
			var	item_tax_amount  = $("#item_tax_amount_"+counter).val();
			var	popup_item_discount_percent  = $("#item_discount_percent_"+counter).val();
			var	item_discount_amount  = $("#item_discount_amount_"+counter).val();
			var	item_net_amount  = $("#item_net_amount_"+counter).val();
			
			
			
			if(popup_item_id != itemid)	
			{	
				 i++;
				 
				  var items ='<tr><td><input id="item_id_'+i+'" name="item_id['+i+']" value="'+popup_item_id+'" type="hidden" /><a href="javascript:void(0);" id="item_mfg_prtno_value_'+i+'">'+popup_item_mfg_prtno+'</a><input id="item_mfg_prtno_'+i+'" name="item_mfg_prtno['+i+']" value="'+popup_item_mfg_prtno+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_name_value_'+i+'">'+popup_item_name+'</a><input id="item_name_'+i+'" name="item_name['+i+']" value="'+popup_item_name+'" type="hidden" /></td><td><input id="item_id_'+i+'" name="item_id['+i+']" value="'+popup_item_id+'" type="hidden" /><a href="javascript:void(0);" id="item_name_hsn_sac_'+i+'">'+popup_item_name_hsn_sac+'</a><input id="item_name_hsn_sac_'+i+'" name="item_name_hsn_sac['+i+']" value="'+popup_item_name_hsn_sac+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_uom_name_value_'+i+'">'+popup_item_uom_name+'</a><input id="item_uom_id_'+i+'" name="item_uom_id['+i+']" type="hidden" value="'+popup_item_uom_id+'" /><input id="item_uom_name_'+i+'" name="item_uom_name['+i+']" type="hidden" value="'+popup_item_uom_name+'" /></td><td><input id="item_priceperunit_'+i+'" name="item_priceperunit['+i+']" value="'+popup_item_priceperunit+'" type="text" class="quantity" readonly="readonly" /></td><td><input id="item_qty_'+i+'" name="item_qty['+i+']" value="'+popup_item_qty+'" type="text" class="quantity stock_text" onkeyup="return purchase_items_grid_total(event, <?php echo $itemcount; ?>)" /></td><td><input id="item_gross_amount_'+i+'" name="item_gross_amount['+i+']" value="'+popup_gross_amount+'" type="text" class="quantity stock_text" readonly="readonly"/></td><td><input id="item_discount_percent_'+i+'" name="item_discount_percent['+i+']" value="'+popup_item_discount_percent+'" type="text" class="quantity stock_text"  readonly="readonly"/></td><td><input id="item_discount_amount_'+i+'" name="item_discount_amount['+i+']" value="'+item_discount_amount+'" type="text" class="quantity stock_text" readonly="readonly" /></td><td><input id="item_tax_percent_'+i+'" name="item_tax_percent['+i+']" value="'+item_tax_percent+'" type="text" class="quantity stock_text" readonly="readonly" /><input id="item_vat_'+i+'" name="item_vat['+i+']" value="'+popup_item_vat+'" type="hidden" /><input id="item_gst_'+i+'" name="item_gst['+i+']" value="'+popup_item_gst+'" type="hidden" /><input id="item_cst_'+i+'" name="item_cst['+i+']" value="'+popup_item_cst+'" type="hidden" /><input id="item_serv_tax_'+i+'" name="item_serv_tax['+i+']" value="'+popup_item_serv_tax+'" type="hidden" /><input id="item_exc_'+i+'" name="item_exc['+i+']" value="'+popup_item_exc+'" type="hidden" /></td> <td><input id="item_tax_amount_'+i+'" name="item_tax_amount['+i+']" value="'+item_tax_amount+'" type="text" class="quantity stock_text" readonly="readonly" /></td><td><input id="item_excise_percent_'+i+'" name="item_excise_percent['+i+']" value="'+item_excise_percent+'" type="text" class="quantity stock_text" readonly="readonly" /></td><td><input id="item_excise_amount_'+i+'" name="item_excise_amount['+i+']" value="'+item_excise_amount+'" type="text" class="quantity stock_text" readonly="readonly" /></td><td><input id="item_net_amount_'+i+'" name="item_net_amount['+i+']" value="'+item_net_amount+'" type="text" class="quantity" readonly="readonly"/></td><td colspan="2"><div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_delete_'+i+'" onclick="return purchase_itemsgridrowdelete('+i+');" data-item="'+popup_item_id+'" data-delete="'+i+'" title="Delete"><span class="icon-trash"></span></div></td></tr>';
				  
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
				
		return purchase_calculatetotal();
		
		return false;
    }
  	else 
  	{
      return false;
    }
	
}


function purchase_calculatetotal()
{
	
	var item_igst_name = $("#item_igst_name_").val();
	if(item_igst_name == 0)
	{ 
	
	
	$('#tax_group_calculation').html('');
	
	purchase_group_tax_calculation();
	
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
	
	var total_excise_duty = 0;
	$('input[name^="item_excise_amount"]').each(function()
	{
			var item_excise_duty = $(this).val();
			total_excise_duty = (parseFloat(total_excise_duty) + parseFloat(item_excise_duty)).toFixed(2);
	});
	
	var total_tax_amount = (parseFloat(total_tax_amount) + parseFloat(total_excise_duty)).toFixed(2);
	
	$("#total_tax_amount").val(total_tax_amount);
			
	var total_disocunts_amount = 0;
	$('input[name^="tax_group_discount_amount"]').each(function()
	{
			var item_discount_amount = $(this).val();
			total_disocunts_amount = (parseFloat(total_disocunts_amount) + parseFloat(item_discount_amount)).toFixed(2);
	});
	
	 $("#total_disocunts_amount").val(total_disocunts_amount);
	
	
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
 
 else if(item_igst_name == 1)
 {
	
	$('#tax_group_calculation').html('');
	
	purchase_group_tax_calculation();
	
	var	table_count = $("#last_table_id").val();
	$("#total_quantity_items").val(table_count);
	
	var total_gross_amount = 0;
	$('input[name^="tax_group_gross_amount"]').each(function()
	{
			var item_gross_amount = $(this).val();
			total_gross_amount = (parseFloat(total_gross_amount) + parseFloat(item_gross_amount)).toFixed(2);
	});
	 $("#total_gross_amount").val(total_gross_amount);
	 
	 
	var total_igst_tax = 0;
	$('input[name^="item_igst_tax_amount"]').each(function()
	{
			var item_igst_tax_amount = $(this).val();
			total_igst_tax = (parseFloat(total_igst_tax) + parseFloat(item_igst_tax_amount)).toFixed(2);
	});
	
	var total_tax_amount = (parseFloat(total_igst_tax)).toFixed(2);
	
	$("#total_tax_amount").val(total_tax_amount);
			
	var total_disocunts_amount = 0;
	$('input[name^="tax_group_discount_amount"]').each(function()
	{
			var item_discount_amount = $(this).val();
			total_disocunts_amount = (parseFloat(total_disocunts_amount) + parseFloat(item_discount_amount)).toFixed(2);
	});
	
	 $("#total_disocunts_amount").val(total_disocunts_amount);
	
	
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
 
 else
	{ 
	
	
	$('#tax_group_calculation').html('');
	
	purchase_group_tax_calculation();
	
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
	
	var total_excise_duty = 0;
	$('input[name^="item_excise_amount"]').each(function()
	{
			var item_excise_duty = $(this).val();
			total_excise_duty = (parseFloat(total_excise_duty) + parseFloat(item_excise_duty)).toFixed(2);
	});
	
	var total_tax_amount = (parseFloat(total_tax_amount) + parseFloat(total_excise_duty)).toFixed(2);
	
	$("#total_tax_amount").val(total_tax_amount);
			
	var total_disocunts_amount = 0;
	$('input[name^="tax_group_discount_amount"]').each(function()
	{
			var item_discount_amount = $(this).val();
			total_disocunts_amount = (parseFloat(total_disocunts_amount) + parseFloat(item_discount_amount)).toFixed(2);
	});
	
	 $("#total_disocunts_amount").val(total_disocunts_amount);
	
	
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
 
}



function purchase_calculateGrandTotal(event) 
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
				var result = ((parseFloat(total_gross_amount) - parseFloat(total_disocunts_amount)) + parseFloat(total_tax_amount) + parseFloat(total_shipping_charges));
				
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

function purchase_group_tax_calculation()
{
	var item_igst_name = $("#item_igst_name_").val();
	if(item_igst_name == 0)
	{
		var tax_group = [];
		
		$('input[name^="item_tax_percent"]').each(function()
		{
				var tax_group_item_tax_percent = $(this).val();
				if(!isNaN(tax_group_item_tax_percent) && tax_group_item_tax_percent != "")
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
					if(!isNaN(print_tax_group_item_tax_percent)  && print_tax_group_item_tax_percent != "")
					{
						if(print_tax_group_item_tax_percent == tax_group_val)
						{
							var tax_group_id = $(this).attr("id");
							
							var tax_group_segments =  tax_group_id.substr(tax_group_id.lastIndexOf('_') + 1);
							
							print_tax_group.push(tax_group_segments);
						}
					}
			}); 
			
			var tax_group_total_net_amount = 0;
			var tax_group_total_discount_amount = 0;
			var tax_group_total_tax_amount = 0;
			var excise_group_total_excise_amount = 0;
				
			for (k=0; k<print_tax_group.length; k++)
			{						
					var tax_group_item_gross_amount = $("#item_gross_amount_"+print_tax_group[k]).val();
					var tax_group_item_discount_amount = $("#item_discount_amount_"+print_tax_group[k]).val();
					var tax_group_scheme_discount_amount = $("#item_scheme_amount_"+print_tax_group[k]).val();
					var tax_group_item_tax_amount = $("#item_tax_amount_"+print_tax_group[k]).val();
					var tax_group_item_excise_amount = $("#item_excise_amount_"+print_tax_group[k]).val();
					tax_group_total_net_amount = (parseFloat(tax_group_total_net_amount) + parseFloat(tax_group_item_gross_amount)).toFixed(2);
					tax_group_total_discount_amount = (parseFloat(tax_group_total_discount_amount) + parseFloat(tax_group_item_discount_amount) + parseFloat(tax_group_scheme_discount_amount)).toFixed(2);
					tax_group_total_tax_amount = (parseFloat(tax_group_total_tax_amount) + parseFloat(tax_group_item_tax_amount)).toFixed(2);
					excise_group_total_excise_amount = (parseFloat(excise_group_total_excise_amount) + parseFloat(tax_group_item_excise_amount)).toFixed(2);
					
			}
			
			tax_group_total_gross_amount_without_tax = (parseFloat(tax_group_total_net_amount) - parseFloat(tax_group_total_discount_amount)).toFixed(2);
			tax_group_total_gross_amount_with_tax = (parseFloat(tax_group_total_gross_amount_without_tax) + parseFloat(tax_group_total_tax_amount) + parseFloat(excise_group_total_excise_amount)).toFixed(2);
			
			var table = '<table class="tax_group_table table table-bordered blockContainer showInlineTable equalSplit"><tbody><tr><td class="tax_group_lable"><label>Total Gross Amount</label></td><td><input class="group_tax_calc" name="tax_group_gross_amount['+i+']" id="tax_group_gross_amount_'+i+'" type="text" value="'+tax_group_total_net_amount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Discount</label></td><td><input class="group_tax_calc" name="tax_group_discount_amount['+i+']" id="tax_group_discount_amount_'+i+'" type="text" value="'+tax_group_total_discount_amount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Gross Amount Without Tax</label></td><td><input class="group_tax_calc" name="tax_group_without_tax_gross_amount['+i+']" id="tax_group_without_tax_gross_amount_'+i+'" type="text" value="'+tax_group_total_gross_amount_without_tax+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>CGST(%) Amount</label></td><td><input class="group_tax_calc" name="tax_group_tax_amount['+i+']" id="tax_group_tax_amount_'+i+'" type="text" value="'+tax_group_total_tax_amount+'" readonly="readonly"><input name="tax_group_tax_percentage['+i+']" id="tax_group_tax_percentage_'+i+'" type="hidden" value="'+tax_group_val+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>SGST(%) Amount</label></td><td><input class="group_tax_calc" name="excise_group_excise_amount['+i+']" id="excise_group_excise_amount_'+i+'" type="text" value="'+excise_group_total_excise_amount+'" readonly="readonly"><input name="excise_group_excise_percentage['+i+']" id="excise_group_excise_percentage_'+i+'" type="hidden" value="'+tax_group_val+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Gross Amount With Tax</label></td><td><input class="group_tax_calc" name="tax_group_with_tax_gross_amount['+i+']" id="tax_group_with_tax_gross_amount_'+i+'" type="text" value="'+tax_group_total_gross_amount_with_tax+'" readonly="readonly"></td></tr></tbody></table><br />';
			
			$("#tax_group_length").val(tax_group.length);
			$('#tax_group_calculation').append(table);
			
		
		}
	}
	else if(item_igst_name == 1)
	{
		var tax_group = [];
		
		$('input[name^="item_igst_tax_percent"]').each(function()
		{
				var tax_group_item_tax_percent = $(this).val();
				if(!isNaN(tax_group_item_tax_percent) && tax_group_item_tax_percent != "")
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
			$('input[name^="item_igst_tax_percent"]').each(function()
			{
					var print_tax_group_item_tax_percent = $(this).val();
					if(!isNaN(print_tax_group_item_tax_percent)  && print_tax_group_item_tax_percent != "")
					{
						if(print_tax_group_item_tax_percent == tax_group_val)
						{
							var tax_group_id = $(this).attr("id");
							
							var tax_group_segments =  tax_group_id.substr(tax_group_id.lastIndexOf('_') + 1);
							
							print_tax_group.push(tax_group_segments);
						}
					}
			}); 
			
			var tax_group_total_net_amount = 0;
			var tax_group_total_discount_amount = 0;
			var tax_group_total_tax_amount = 0;
			
				
			for (k=0; k<print_tax_group.length; k++)
			{						
					var tax_group_item_gross_amount = $("#item_gross_amount_"+print_tax_group[k]).val();
					var tax_group_item_discount_amount = $("#item_discount_amount_"+print_tax_group[k]).val();
					var tax_group_item_tax_amount = $("#item_igst_tax_amount_"+print_tax_group[k]).val();
					
					tax_group_total_net_amount = (parseFloat(tax_group_total_net_amount) + parseFloat(tax_group_item_gross_amount)).toFixed(2);
					tax_group_total_discount_amount = (parseFloat(tax_group_total_discount_amount) + parseFloat(tax_group_item_discount_amount)).toFixed(2);
					tax_group_total_tax_amount = (parseFloat(tax_group_total_tax_amount) + parseFloat(tax_group_item_tax_amount)).toFixed(2);
					}
			
			tax_group_total_gross_amount_without_tax = (parseFloat(tax_group_total_net_amount) - parseFloat(tax_group_total_discount_amount)).toFixed(2);
			tax_group_total_gross_amount_with_tax = (parseFloat(tax_group_total_gross_amount_without_tax) + parseFloat(tax_group_total_tax_amount)).toFixed(2);
			
			var table = '<table class="tax_group_table table table-bordered blockContainer showInlineTable equalSplit"><tbody><tr><td class="tax_group_lable"><label>Total Gross Amount</label></td><td><input class="group_tax_calc" name="tax_group_gross_amount['+i+']" id="tax_group_gross_amount_'+i+'" type="text" value="'+tax_group_total_net_amount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Discount</label></td><td><input class="group_tax_calc" name="tax_group_discount_amount['+i+']" id="tax_group_discount_amount_'+i+'" type="text" value="'+tax_group_total_discount_amount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Gross Amount Without Tax</label></td><td><input class="group_tax_calc" name="tax_group_without_tax_gross_amount['+i+']" id="tax_group_without_tax_gross_amount_'+i+'" type="text" value="'+tax_group_total_gross_amount_without_tax+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>IGST(%) Amount</label></td><td><input class="group_tax_calc" name="tax_group_tax_igst_amount['+i+']" id="tax_group_tax_igst_amount_'+i+'" type="text" value="'+tax_group_total_tax_amount+'" readonly="readonly"><input name="tax_group_tax_igst_percentage['+i+']" id="tax_group_tax_igst_percentage_'+i+'" type="hidden" value="'+tax_group_val+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Gross Amount With Tax</label></td><td><input class="group_tax_calc" name="tax_group_with_tax_gross_amount['+i+']" id="tax_group_with_tax_gross_amount_'+i+'" type="text" value="'+tax_group_total_gross_amount_with_tax+'" readonly="readonly"></td></tr></tbody></table><br />';
			
			$("#tax_group_length").val(tax_group.length);
			$('#tax_group_calculation').append(table);
			
		
		}
	}
	
	else
	{
		var tax_group = [];
		
		$('input[name^="item_tax_percent"]').each(function()
		{
				var tax_group_item_tax_percent = $(this).val();
				if(!isNaN(tax_group_item_tax_percent) && tax_group_item_tax_percent != "")
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
					if(!isNaN(print_tax_group_item_tax_percent)  && print_tax_group_item_tax_percent != "")
					{
						if(print_tax_group_item_tax_percent == tax_group_val)
						{
							var tax_group_id = $(this).attr("id");
							
							var tax_group_segments =  tax_group_id.substr(tax_group_id.lastIndexOf('_') + 1);
							
							print_tax_group.push(tax_group_segments);
						}
					}
			}); 
			
			var tax_group_total_net_amount = 0;
			var tax_group_total_discount_amount = 0;
			var tax_group_total_tax_amount = 0;
			var excise_group_total_excise_amount = 0;
				
			for (k=0; k<print_tax_group.length; k++)
			{						
					var tax_group_item_gross_amount = $("#item_gross_amount_"+print_tax_group[k]).val();
					var tax_group_item_discount_amount = $("#item_discount_amount_"+print_tax_group[k]).val();
					var tax_group_item_tax_amount = $("#item_tax_amount_"+print_tax_group[k]).val();
					var tax_group_item_excise_amount = $("#item_excise_amount_"+print_tax_group[k]).val();
					tax_group_total_net_amount = (parseFloat(tax_group_total_net_amount) + parseFloat(tax_group_item_gross_amount)).toFixed(2);
					tax_group_total_discount_amount = (parseFloat(tax_group_total_discount_amount) + parseFloat(tax_group_item_discount_amount)).toFixed(2);
					tax_group_total_tax_amount = (parseFloat(tax_group_total_tax_amount) + parseFloat(tax_group_item_tax_amount)).toFixed(2);
					excise_group_total_excise_amount = (parseFloat(excise_group_total_excise_amount) + parseFloat(tax_group_item_excise_amount)).toFixed(2);
					
			}
			
			tax_group_total_gross_amount_without_tax = (parseFloat(tax_group_total_net_amount) - parseFloat(tax_group_total_discount_amount)).toFixed(2);
			tax_group_total_gross_amount_with_tax = (parseFloat(tax_group_total_gross_amount_without_tax) + parseFloat(tax_group_total_tax_amount) + parseFloat(excise_group_total_excise_amount)).toFixed(2);
			
			var table = '<table class="tax_group_table table table-bordered blockContainer showInlineTable equalSplit"><tbody><tr><td class="tax_group_lable"><label>Total Gross Amount</label></td><td><input class="group_tax_calc" name="tax_group_gross_amount['+i+']" id="tax_group_gross_amount_'+i+'" type="text" value="'+tax_group_total_net_amount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Discount</label></td><td><input class="group_tax_calc" name="tax_group_discount_amount['+i+']" id="tax_group_discount_amount_'+i+'" type="text" value="'+tax_group_total_discount_amount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Gross Amount Without Tax</label></td><td><input class="group_tax_calc" name="tax_group_without_tax_gross_amount['+i+']" id="tax_group_without_tax_gross_amount_'+i+'" type="text" value="'+tax_group_total_gross_amount_without_tax+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>CGST(%) Amount</label></td><td><input class="group_tax_calc" name="tax_group_tax_amount['+i+']" id="tax_group_tax_amount_'+i+'" type="text" value="'+tax_group_total_tax_amount+'" readonly="readonly"><input name="tax_group_tax_percentage['+i+']" id="tax_group_tax_percentage_'+i+'" type="hidden" value="'+tax_group_val+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>SGST(%) Amount</label></td><td><input class="group_tax_calc" name="excise_group_excise_amount['+i+']" id="excise_group_excise_amount_'+i+'" type="text" value="'+excise_group_total_excise_amount+'" readonly="readonly"><input name="excise_group_excise_percentage['+i+']" id="excise_group_excise_percentage_'+i+'" type="hidden" value="'+tax_group_val+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Gross Amount With Tax</label></td><td><input class="group_tax_calc" name="tax_group_with_tax_gross_amount['+i+']" id="tax_group_with_tax_gross_amount_'+i+'" type="text" value="'+tax_group_total_gross_amount_with_tax+'" readonly="readonly"></td></tr></tbody></table><br />';
			
			$("#tax_group_length").val(tax_group.length);
			$('#tax_group_calculation').append(table);
			
		
		}
	}
	
}


function return_purchase_group_tax_calculation()
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
			
			var table = '<table class="tax_group_table table table-bordered blockContainer showInlineTable equalSplit"><tbody><tr><td class="tax_group_lable"><label>Total Gross Amount</label></td><td><input class="group_tax_calc" name="tax_group_gross_amount['+i+']" id="tax_group_gross_amount_'+i+'" type="text" value="'+tax_group_total_net_amount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Discount</label></td><td><input class="group_tax_calc" name="tax_group_discount_amount['+i+']" id="tax_group_discount_amount_'+i+'" type="text" value="'+tax_group_total_discount_amount+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Gross Amount Without Tax</label></td><td><input class="group_tax_calc" name="tax_group_without_tax_gross_amount['+i+']" id="tax_group_without_tax_gross_amount_'+i+'" type="text" value="'+tax_group_total_gross_amount_without_tax+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Tax('+tax_group_val+'%) Amount</label></td><td><input class="group_tax_calc" name="tax_group_tax_amount['+i+']" id="tax_group_tax_amount_'+i+'" type="text" value="'+tax_group_total_tax_amount+'" readonly="readonly"><input name="tax_group_tax_percentage['+i+']" id="tax_group_tax_percentage_'+i+'" type="hidden" value="'+tax_group_val+'" readonly="readonly"></td></tr><tr><td class="tax_group_lable"><label>Total Gross Amount With Tax</label></td><td><input class="group_tax_calc" name="tax_group_with_tax_gross_amount['+i+']" id="tax_group_with_tax_gross_amount_'+i+'" type="text" value="'+tax_group_total_gross_amount_with_tax+'" readonly="readonly"></td></tr></tbody></table><br />';
			
			$("#tax_group_length").val(tax_group.length);
			$('#tax_group_calculation').append(table);
			
		}
}

function purchase_return_product_calc()
{
	
	$('#tax_group_calculation').html('');
	
	return_purchase_group_tax_calculation();
	
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
	
	 $("#total_disocunts_amount").val(total_disocunts_amount);
	
	
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

$(document).ready(function () {
	    
    $("#report_from").datepicker({
	dateFormat:'dd-mm-yy',
	changeMonth: true,
	changeYear: true,
	maxDate: new Date,
	}); 

	$("#report_to").datepicker({
	dateFormat:'dd-mm-yy',
	changeMonth: true,
	changeYear: true,
	maxDate: new Date,
	}); 
   
});
