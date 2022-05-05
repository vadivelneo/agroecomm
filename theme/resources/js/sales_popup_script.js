function sales_popup_onkeyupfortotal(event)
{
	var target = $(event.target);
	
	var typeval = $(event.target).val();
	
	var popup_item_qty = $("#popup_item_qty").val();
	var	popup_priceperunit = $("#popup_item_priceperunit").val();
	var	popup_item_vat = $("#popup_item_vat").val();
	var	popup_item_serv_tax = $("#popup_item_serv_tax").val();
	var	popup_item_cst = $("#popup_item_cst").val();
	var	popup_item_gst = $("#popup_item_gst").val();
	var	popup_item_exc = $("#popup_item_exc").val();
	var	popup_item_percentage_discount = $("#popup_item_percentage_discount").val();
	var	popup_item_flat_discount = $("#popup_item_flat_discount").val() ? $("#popup_item_flat_discount").val() : 0;
	var	customer_tax_type = $("#customer_tax_type").val();

	if(!isNaN(typeval))
	{
		$(".nums_error").css("display", "none");
		
		if(popup_item_qty != "" && popup_priceperunit != "")
		{
			var popup_gross_amount = (parseFloat(popup_item_qty).toFixed(2)) * (parseFloat(popup_priceperunit).toFixed(2));
			
			if(customer_tax_type == 'vat')
			{
				var item_tax_percent = (parseFloat(popup_item_vat)).toFixed(2);
			}
			else if(customer_tax_type == 'cst')
			{
				var item_tax_percent = (parseFloat(popup_item_cst)).toFixed(2);
			}
			
			var item_discount_amount = (popup_gross_amount * (isNaN(popup_item_percentage_discount) ? 0 : popup_item_percentage_discount) / 100).toFixed(2);
			
			/*if(popup_item_percentage_discount != 0 && popup_item_percentage_discount != '')
			{
			var item_discount_amount = (popup_gross_amount * (isNaN(popup_item_percentage_discount) ? 0 : popup_item_percentage_discount) / 100).toFixed(2);
			}
			else
			{
				var item_discount_amount = parseFloat(popup_item_flat_discount);
			}*/
			
			var item_discount_amount_percent = (popup_gross_amount * (isNaN(popup_item_percentage_discount) ? 0 : popup_item_percentage_discount) / 100).toFixed(2);
			
			var item_discount_amount = parseFloat(item_discount_amount_percent) + parseFloat(popup_item_flat_discount);
			
			$("#popup_item_discount_amount").val(item_discount_amount_percent);
			
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

function instantsales_popup_onkeyupfortotal(event)
{
	var target = $(event.target);
	
	var typeval = $(event.target).val();
	
	var popup_item_qty = $("#popup_item_qty").val();
	var	popup_priceperunit = $("#popup_item_priceperunit").val();
	var	popup_item_vat = $("#popup_item_vat").val();
	var	popup_item_serv_tax = $("#popup_item_serv_tax").val();
	var	popup_item_cst = $("#popup_item_cst").val();
	var	popup_item_gst = $("#popup_item_gst").val();
	var	popup_item_exc = $("#popup_item_exc").val();
	var	popup_item_percentage_discount = $("#popup_item_percentage_discount").val();
	var	popup_item_flat_discount = $("#popup_item_flat_discount").val() ? $("#popup_item_flat_discount").val() : 0;
	var	customer_tax_type = $("#customer_tax_type").val();
	var	popup_item_inv_qty = $("#popup_item_inv_qty").val();

	if(!isNaN(typeval))
	{
		$(".nums_error").css("display", "none");
		
		if(parseFloat(popup_item_qty) < parseFloat(popup_item_inv_qty))
		{
			$(".nums_error").css("display", "none");
		
			if(popup_item_qty != "" && popup_priceperunit != "")
			{
				var popup_gross_amount = (parseFloat(popup_item_qty).toFixed(2)) * (parseFloat(popup_priceperunit).toFixed(2));
				
				if(customer_tax_type == 'vat')
				{
					var item_tax_percent = (parseFloat(popup_item_vat)).toFixed(2);
				}
				else if(customer_tax_type == 'cst')
				{
					var item_tax_percent = (parseFloat(popup_item_cst)).toFixed(2);
				}
				
				//var item_discount_amount = (popup_gross_amount * (isNaN(popup_item_percentage_discount) ? 0 : popup_item_percentage_discount) / 100).toFixed(2);
				/*if(popup_item_percentage_discount != 0 && popup_item_percentage_discount != '')
			{
			var item_discount_amount = (popup_gross_amount * (isNaN(popup_item_percentage_discount) ? 0 : popup_item_percentage_discount) / 100).toFixed(2);
			}
			else
			{
				var item_discount_amount = parseFloat(popup_item_flat_discount);
			}*/
			
			var item_discount_amount_percent = (popup_gross_amount * (isNaN(popup_item_percentage_discount) ? 0 : popup_item_percentage_discount) / 100).toFixed(2);
			
			var item_discount_amount = parseFloat(item_discount_amount_percent) + parseFloat(popup_item_flat_discount);
			
				$("#popup_item_discount_amount").val(item_discount_amount_percent);
				
				var item_gross_amount_with_discount = parseFloat(popup_gross_amount)- parseFloat(item_discount_amount);
			
				var item_tax_amount = (item_gross_amount_with_discount * (isNaN(item_tax_percent) ? 0 : item_tax_percent) / 100).toFixed(2);
			
				var item_net_amount = ((parseFloat(popup_gross_amount)-parseFloat(item_discount_amount))+parseFloat(item_tax_amount)).toFixed(2);
				
				$("#popup_item_rate").val(item_net_amount);
			}
		}
		else
		{
		$(target).val("");
		$("#popup_item_rate").val("");
		$("#popup_item_discount_amount").val("");
		$("#singleitem_inv_error").css("display", "block");
		}
	}
	else
	{
	$(target).val("");
	$("#singleitem_popup_error").css("display", "block");
	}
}

function salse_multiplepopuptotal(event, id)
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
	
	//var multiple_item_flat_discount = $("#multiple_item_flat_discount_"+id).val();
	//alert(multiple_item_flat_discount);
	var	popup_item_percentage_discount = $("#multiple_item_percentage_discount_"+id).val();
	var	popup_item_flat_discount = $("#multiple_item_flat_discount_"+id).val() ? $("#multiple_item_flat_discount_"+id).val() : 0;
	var	customer_tax_type = $("#customer_tax_type").val();
		
	if(!isNaN(typeval))
	{
		$(".nums_error").css("display", "none");
		
		if(popup_item_qty != "" && popup_priceperunit != "")
		{
			var popup_gross_amount = (parseFloat(popup_item_qty)) * (parseFloat(popup_priceperunit));
			
			if(customer_tax_type == 'vat')
			{
						var item_tax_percent = (parseFloat(popup_item_vat)).toFixed(2);
			}
			else if(customer_tax_type == 'cst')
			{
						var item_tax_percent = (parseFloat(popup_item_cst)).toFixed(2);
			}
			//alert(popup_gross_amount);
			/*if(popup_item_percentage_discount != 0 && popup_item_percentage_discount != '')
			{
			var item_discount_amount = (popup_gross_amount * (isNaN(popup_item_percentage_discount) ? 0 : popup_item_percentage_discount) / 100).toFixed(2);
			}
			else
			{
				var item_discount_amount = parseFloat(popup_item_flat_discount);
			}*/
			
			var item_discount_amount_percent = (popup_gross_amount * (isNaN(popup_item_percentage_discount) ? 0 : popup_item_percentage_discount) / 100).toFixed(2);
			
			var item_discount_amount = parseFloat(item_discount_amount_percent) + parseFloat(popup_item_flat_discount);
			
			//alert(item_discount_amount);
			$("#multiple_item_discount_amount_"+id).val(item_discount_amount_percent);
			
		
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

function instantsales_multiplepopuptotal(event, id)
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
	var popup_item_inv_qty = $("#multiple_item_inv_qty_"+id).val();
	
	var	popup_item_percentage_discount = $("#multiple_item_percentage_discount_"+id).val();
	var	popup_item_flat_discount = $("#multiple_item_flat_discount_"+id).val() ? $("#multiple_item_flat_discount_"+id).val() : 0;
	var	customer_tax_type = $("#customer_tax_type").val();
		
		
	if(!isNaN(typeval))
	{
		$(".nums_error").css("display", "none");
		
		if(parseFloat(popup_item_qty) < parseFloat(popup_item_inv_qty))
		{
			$(".nums_error").css("display", "none");
			
			if(popup_item_qty != "" && popup_priceperunit != "")
			{
				var popup_gross_amount = (parseFloat(popup_item_qty)) * (parseFloat(popup_priceperunit));
				
				if(customer_tax_type == 'vat')
				{
							var item_tax_percent = (parseFloat(popup_item_vat)).toFixed(2);
				}
				else if(customer_tax_type == 'cst')
				{
							var item_tax_percent = (parseFloat(popup_item_cst)).toFixed(2);
				}
				
				
			
			var item_discount_amount_percent = (popup_gross_amount * (isNaN(popup_item_percentage_discount) ? 0 : popup_item_percentage_discount) / 100).toFixed(2);
			
			var item_discount_amount = parseFloat(item_discount_amount_percent) + parseFloat(popup_item_flat_discount);
				$("#multiple_item_discount_amount_"+id).val(item_discount_amount_percent);
			
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
			$("#multiple_item_error").text("Out of Stock");
			
		}
		
	}
	else
	{
		$(target).val("");
		$("#multiple_item_rate_"+id).val("");
		$("#multiple_item_error").text("Please Enter Numeric Only");
	}		 
}


function sales_items_grid_total(event, id)
{
	var item_qty = $("#item_qty_"+id).val();
	var item_id = $("#item_id_"+id).val();
	var item_code = $("#item_code_"+id).val();
	var pricebook_id = $("#pricebook_id").val();
	var customer_id = $("#so_customer_id").val();
	
 	 
	var target = $(event.target);
	
	var typeval = $(event.target).val();
	
	var item_qty = $("#item_qty_"+id).val();
	var item_priceperunit = $("#item_priceperunit_"+id).val();
	var item_tax_percent = $("#item_tax_percent_"+id).val();
	var item_discount_percent = $("#item_discount_percent_"+id).val();
	var item_damage_discount_percentage = $("#item_damage_discount_percentage_"+id).val();
	var item_incentive = $("#item_incentive_rate_"+id).val();
	
	var item_cgst = $("#item_cgst_"+id).val();
	var item_sgst = $("#item_sgst_"+id).val();
	
	var total_item_flat_discount = $("#item_flat_discount_"+id).val() ? $("#item_flat_discount_"+id).val() : 0;
		//alert(total_item_flat_discount);
	if(!isNaN(typeval))
	{
		$(".nums_error").css("display", "none");
		
		if(item_qty != "" && item_priceperunit != "")
		{
			var popup_gross_amount = (parseFloat(item_qty)) * (parseFloat(item_priceperunit));
			
			var tax_percent = (parseFloat((isNaN(item_tax_percent) ? 0 : item_tax_percent)));
			var cgst_percent = (parseFloat((isNaN(item_cgst) ? 0 : item_cgst)));
			var sgst_percent = (parseFloat((isNaN(item_sgst) ? 0 : item_sgst)));
			
			
			var item_discount_amount_percent = (popup_gross_amount * (isNaN(item_discount_percent) ? 0 : item_discount_percent) / 100).toFixed(2);
			//alert(item_discount_amount_percent);
			
			
			var item_damage_discount_percentage = (popup_gross_amount * (isNaN(item_damage_discount_percentage) ? 0 : item_damage_discount_percentage) / 100).toFixed(2);
			var item_discount_amount =  parseFloat(item_discount_amount_percent)+ parseFloat(total_item_flat_discount) + parseFloat(item_damage_discount_percentage);
			
			//alert(item_damage_discount_percentage);
			//var item_damage_discount_amount =  parseFloat(item_damage_discount_percentage)+ parseFloat(total_item_flat_discount);
			
			$("#multiple_item_discount_amount_"+id).val(item_discount_amount);
		
			var item_gross_amount_with_discount = parseFloat(popup_gross_amount)- parseFloat(item_discount_amount);
			var item_tax_amount = (item_gross_amount_with_discount * (isNaN(tax_percent) ? 0 : tax_percent) / 100).toFixed(2);
			var item_cgst_amount = (item_gross_amount_with_discount * (isNaN(cgst_percent) ? 0 : cgst_percent) / 100).toFixed(2);
			var item_sgst_amount = (item_gross_amount_with_discount * (isNaN(sgst_percent) ? 0 : sgst_percent) / 100).toFixed(2);
			
			var item_net_amount = (item_gross_amount_with_discount + parseFloat(item_tax_amount)).toFixed(2);
			
			var item_incentive_total = ((parseFloat(item_qty)) * (parseFloat(item_incentive)) * 30) / 100;
			
			//alert(item_incentive_total);
			
			$("#item_gross_amount_"+id).val(popup_gross_amount);
			$("#item_discount_amount_"+id).val(item_discount_amount_percent);
			$("#item_damage_discount_amount_"+id).val(item_damage_discount_percentage);
			$("#item_gross_amount_with_disc_"+id).val(item_gross_amount_with_discount);
			$("#item_tax_amount_"+id).val(item_tax_amount);
			$("#item_cgst_amount_"+id).val(item_cgst_amount);
			$("#item_sgst_amount_"+id).val(item_sgst_amount);
			$("#item_net_amount_"+id).val(item_net_amount);
			$("#item_incentive_total_"+id).val(item_incentive_total);
			if(!isNaN(tax_percent))
			{	
				calculatetotal();
			}
			onkeyupfortotal(id)
		}
	}
	else
	{
		$(target).val("");
		$("#item_net_amount_"+id).val("");
		$("#last_table_idError").text("Please Enter Numeric Only");
	}		 
}


function instantsales_items_grid_total(event, id)
{
	var target = $(event.target);
	
	var typeval = $(event.target).val();
	
	var item_qty = $("#item_qty_"+id).val();
	var item_priceperunit = $("#item_priceperunit_"+id).val();
	var item_tax_percent = $("#item_tax_percent_"+id).val();
	var item_discount_percent = $("#item_discount_percent_"+id).val();
	var item_inv_qty = $("#item_inv_qty_"+id).val();
	
		
	if(!isNaN(typeval))
	{
		$(".nums_error").css("display", "none");
		
	 	
			if(item_qty != "" && item_priceperunit != "")
			{
				if(parseFloat(item_qty) < parseFloat(item_inv_qty))
				{ 
					$(".nums_error").css("display", "none");
					item_qty = item_qty;
				}
				else
				{
					$(target).val(item_inv_qty);
					item_qty = item_inv_qty;
					$("#last_table_invError").css("display", "block");
					$("#last_table_invError").text("Out Of Stock");
			
				} 
			}
		
		
		var popup_gross_amount = (parseFloat(item_qty)) * (parseFloat(item_priceperunit));
				
		var tax_percent = (parseFloat((isNaN(item_tax_percent) ? 0 : item_tax_percent)));
				
		var item_discount_amount = (popup_gross_amount * (isNaN(item_discount_percent) ? 0 : item_discount_percent) / 100).toFixed(2);
			
		var item_gross_amount_with_discount = parseFloat(popup_gross_amount)- parseFloat(item_discount_amount);
				
		var item_tax_amount = (item_gross_amount_with_discount * (isNaN(tax_percent) ? 0 : tax_percent) / 100).toFixed(2);
				
		var item_net_amount = (item_gross_amount_with_discount + parseFloat(item_tax_amount)).toFixed(2);
				
		$("#item_gross_amount_"+id).val(popup_gross_amount);
		$("#item_discount_amount_"+id).val(item_discount_amount);
		$("#item_tax_amount_"+id).val(item_tax_amount);
		$("#item_net_amount_"+id).val(item_net_amount);
		
		if(!isNaN(tax_percent))
		{	
			calculatetotal();
		}
		
	}
	else
	{
		$(target).val("");
		$("#item_net_amount_"+id).val("");
		$("#last_table_idError").text("Please Enter Numeric Only");
	}
		
}



function salse_servicespopuptotal(event, id)
{
	
	var target = $(event.target);
	
	var typeval = $(event.target).val();
	
	
	var popup_item_qty = $("#multiple_services_qty_"+id).val();
	var popup_priceperunit = $("#multiple_services_priceperunit_"+id).val();
	var popup_item_vat = $("#multiple_services_vat_"+id).val();
	var popup_item_serv_tax = $("#multiple_services_ser_tax_"+id).val();
	var popup_item_cst = $("#multiple_services_cst_"+id).val();

	var	popup_item_percentage_discount = $("#multiple_services_discount_"+id).val();
	var	popup_item_flat_discount = $("#multiple_item_flat_discount_"+id).val() ? $("#multiple_item_flat_discount_"+id).val() : 0;
	var	customer_tax_type = $("#customer_tax_type").val();
	
			
	if(!isNaN(typeval))
	{
		$(".nums_error").css("display", "none");
		
		if(popup_item_qty != "" && popup_priceperunit != "")
		{
			var popup_gross_amount = (parseFloat(popup_item_qty)) * (parseFloat(popup_priceperunit));
			
			if(customer_tax_type == 'vat')
			{
						var item_tax_percent = (parseFloat(popup_item_vat)).toFixed(2);
			}
			else if(customer_tax_type == 'cst')
			{
						var item_tax_percent = (parseFloat(popup_item_cst)).toFixed(2);
			}
			
			
			var item_discount_amount_percent = (popup_gross_amount * (isNaN(popup_item_percentage_discount) ? 0 : popup_item_percentage_discount) / 100).toFixed(2);
			var item_discount_amount = parseFloat(item_discount_amount_percent) + parseFloat(popup_item_flat_discount);
			
			$("#multiple_services_discount_amount_"+id).val(item_discount_amount);
		
			var item_gross_amount_with_discount = parseFloat(popup_gross_amount)- parseFloat(item_discount_amount);
			
			var item_tax_amount = (item_gross_amount_with_discount * (isNaN(item_tax_percent) ? 0 : item_tax_percent) / 100).toFixed(2);
			
			var item_net_amount = (item_gross_amount_with_discount + parseFloat(item_tax_amount)).toFixed(2);
			
			$("#multiple_services_rate_"+id).val(item_net_amount);
		}
	}
	else
	{
		$(target).val("");
		$("#multiple_services_rate_"+id).val("");
		$("#multiple_services_error").text("Please Enter Numeric Only");
	}		 
}
function sales_items_grid_total_region(event, id)
{
	//alert('sdfwds');
	var target = $(event.target);
	
	var typeval = $(event.target).val();
	
	var item_qty = $("#item_qty_"+id).val();
	var item_priceperunit = $("#item_priceperunit_"+id).val();
	var item_tax_percent = $("#item_tax_percent_"+id).val();
	var item_discount_percent = $("#item_discount_percent_"+id).val();
	
	var total_item_flat_discount = $("#item_flat_discount_"+id).val() ? $("#item_flat_discount_"+id).val() : 0;
		//alert(total_item_flat_discount);
	if(!isNaN(typeval))
	{
		$(".nums_error").css("display", "none");
		
		if(item_qty != "" && item_priceperunit != "")
		{
			var popup_gross_amount = (parseFloat(item_qty)) * (parseFloat(item_priceperunit));
			
			var tax_percent = (parseFloat((isNaN(item_tax_percent) ? 0 : item_tax_percent)));
			
			var item_discount_amount_percent = (popup_gross_amount * (isNaN(item_discount_percent) ? 0 : item_discount_percent) / 100).toFixed(2);
			//alert(item_discount_amount_percent);
			var item_discount_amount =  parseFloat(item_discount_amount_percent)+ parseFloat(total_item_flat_discount);
			
			$("#multiple_item_discount_amount_"+id).val(item_discount_amount);
		
			var item_gross_amount_with_discount = parseFloat(popup_gross_amount)- parseFloat(item_discount_amount);
			
			var item_tax_amount = (item_gross_amount_with_discount * (isNaN(tax_percent) ? 0 : tax_percent) / 100).toFixed(2);
			
			var item_net_amount = (item_gross_amount_with_discount - parseFloat(item_tax_amount)).toFixed(2);
			
			$("#item_gross_amount_"+id).val(popup_gross_amount);
			$("#item_discount_amount_"+id).val(item_discount_amount_percent);
			$("#item_tax_amount_"+id).val(item_tax_amount);
			$("#item_net_amount_"+id).val(item_net_amount);
			if(!isNaN(tax_percent))
			{	
				calculatetotal_salesreturn();
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
function instantsales_items_total_region(event, id)
{
	var target = $(event.target);
	
	var typeval = $(event.target).val();
	
	var item_qty = $("#item_qty_"+id).val();
	var item_priceperunit = $("#item_priceperunit_"+id).val();
	var item_tax_percent = $("#item_tax_percent_"+id).val();
	var item_discount_percent = $("#item_discount_percent_"+id).val();
	var item_inv_qty = $("#item_inv_qty_"+id).val();
	
		
	if(!isNaN(typeval))
	{
		$(".nums_error").css("display", "none");
		
	 	
			if(item_qty != "" && item_priceperunit != "")
			{
				if(parseFloat(item_qty) < parseFloat(item_inv_qty))
				{ 
					$(".nums_error").css("display", "none");
					item_qty = item_qty;
				}
				else
				{
					$(target).val(item_inv_qty);
					item_qty = item_inv_qty;
					$("#last_table_invError").css("display", "block");
					$("#last_table_invError").text("Out Of Stock");
			
				} 
			}
		
		
		var popup_gross_amount = (parseFloat(item_qty)) * (parseFloat(item_priceperunit));
				
		var tax_percent = (parseFloat((isNaN(item_tax_percent) ? 0 : item_tax_percent)));
				
		var item_discount_amount = (popup_gross_amount * (isNaN(item_discount_percent) ? 0 : item_discount_percent) / 100).toFixed(2);
			
		var item_gross_amount_with_discount = parseFloat(popup_gross_amount)- parseFloat(item_discount_amount);
				
		var item_tax_amount = (item_gross_amount_with_discount * (isNaN(tax_percent) ? 0 : tax_percent) / 100).toFixed(2);
				
		var item_net_amount = (item_gross_amount_with_discount - parseFloat(item_tax_amount)).toFixed(2);
				
		$("#item_gross_amount_"+id).val(popup_gross_amount);
		$("#item_discount_amount_"+id).val(item_discount_amount);
		$("#item_tax_amount_"+id).val(item_tax_amount);
		$("#item_net_amount_"+id).val(item_net_amount);
		
		if(!isNaN(tax_percent))
		{	
			calculatetotal_salesreturn();
		}
		
	}
	else
	{
		$(target).val("");
		$("#item_net_amount_"+id).val("");
		$("#last_table_idError").text("Please Enter Numeric Only");
	}
		
}
function instantsales_multiplepopuptotal_region(event, id)
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
	var popup_item_inv_qty = $("#multiple_item_inv_qty_"+id).val();
	
	var	popup_item_percentage_discount = $("#multiple_item_percentage_discount_"+id).val();
	var	popup_item_flat_discount = $("#multiple_item_flat_discount_"+id).val() ? $("#multiple_item_flat_discount_"+id).val() : 0;
	var	customer_tax_type = $("#customer_tax_type").val();
		
		
	if(!isNaN(typeval))
	{
		$(".nums_error").css("display", "none");
		
		if(parseFloat(popup_item_qty) < parseFloat(popup_item_inv_qty))
		{
			$(".nums_error").css("display", "none");
			
			if(popup_item_qty != "" && popup_priceperunit != "")
			{
				var popup_gross_amount = (parseFloat(popup_item_qty)) * (parseFloat(popup_priceperunit));
				
				if(customer_tax_type == 'vat')
				{
							var item_tax_percent = (parseFloat(popup_item_vat)).toFixed(2);
				}
				else if(customer_tax_type == 'cst')
				{
							var item_tax_percent = (parseFloat(popup_item_cst)).toFixed(2);
				}
				
				
			
			var item_discount_amount_percent = (popup_gross_amount * (isNaN(popup_item_percentage_discount) ? 0 : popup_item_percentage_discount) / 100).toFixed(2);
			
			var item_discount_amount = parseFloat(item_discount_amount_percent) + parseFloat(popup_item_flat_discount);
				$("#multiple_item_discount_amount_"+id).val(item_discount_amount_percent);
			
				var item_gross_amount_with_discount = parseFloat(popup_gross_amount)- parseFloat(item_discount_amount);
				
				var item_tax_amount = (item_gross_amount_with_discount * (isNaN(item_tax_percent) ? 0 : item_tax_percent) / 100).toFixed(2);
				
				var item_net_amount = (item_gross_amount_with_discount - parseFloat(item_tax_amount)).toFixed(2);
				
				$("#multiple_item_rate_"+id).val(item_net_amount);
			}
		}
		else
		{
			$(target).val("");
			$("#multiple_item_rate_"+id).val("");
			$("#multiple_item_error").text("Out of Stock");
			
		}
		
	}
	else
	{
		$(target).val("");
		$("#multiple_item_rate_"+id).val("");
		$("#multiple_item_error").text("Please Enter Numeric Only");
	}		 
}
function sales_services_grid_total(event, id)
{
	var target = $(event.target);
	
	var typeval = $(event.target).val();
	
	var item_qty = $("#item_qty_"+id).val();
	var item_priceperunit = $("#item_priceperunit_"+id).val();
	var item_tax_percent = $("#item_tax_percent_"+id).val();
	var item_discount_percent = $("#item_discount_percent_"+id).val();
		
	if(!isNaN(typeval))
	{
		$(".nums_error").css("display", "none");
		
		if(item_qty != "" && item_priceperunit != "")
		{
			var popup_gross_amount = (parseFloat(item_qty)) * (parseFloat(item_priceperunit));
			
			var tax_percent = (parseFloat((isNaN(item_tax_percent) ? 0 : item_tax_percent)));
			
			var item_discount_amount = (popup_gross_amount * (isNaN(item_discount_percent) ? 0 : item_discount_percent) / 100).toFixed(2);
		
			var item_gross_amount_with_discount = parseFloat(popup_gross_amount)- parseFloat(item_discount_amount);
			
			var item_tax_amount = (item_gross_amount_with_discount * (isNaN(tax_percent) ? 0 : tax_percent) / 100).toFixed(2);
			
			var item_net_amount = (item_gross_amount_with_discount + parseFloat(item_tax_amount)).toFixed(2);
			
			$("#item_gross_amount_"+id).val(popup_gross_amount);
			$("#item_discount_amount_"+id).val(item_discount_amount);
			$("#item_tax_amount_"+id).val(item_tax_amount);
			$("#item_net_amount_"+id).val(item_net_amount);
			if(!isNaN(tax_percent))
			{	
				calculatetotal();
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

