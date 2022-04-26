<?php //echo"<PRE>"; print_r($services_list);exit;?>

<script type="text/javascript"> 
$(document).ready(function () {
	
	$(".itemcheckbox").prop("checked", false);
	document.getElementById("multiple_item_form").reset();
	
	$('#btnservicesSave').click(function ()
	{
		var old_items = [];
		
		$('input[name^="services_id"]').each(function()
		{
			var old_item_id = $(this).val();
			old_items.push(old_item_id);
		});
		
		
		if ($(".itemcheckbox:checked").length < 1)
		{
			$("#multiple_services_error").text('Please Check checkbox');
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
					var	multiple_services_qty = $("#multiple_services_qty_"+check_box_val).val();
					var multiple_services_priceperunit = $("#multiple_services_priceperunit_"+check_box_val).val();
					var multiple_services_rate = $("#multiple_services_rate_"+check_box_val).val();
					
					if(multiple_services_priceperunit == "" || multiple_services_qty == "" || multiple_services_rate == "")
					{
						exitMultipleItemsInsert = check_box_val;
                      	return false;
					}
					else
					{
						$("#multiple_services_error").text('');
						
						var login_company_id = $("#login_company_id").val();
						var tax_value = $("#tax_value").val();
						
						var popup_services_priceperunit = $("#multiple_services_priceperunit_"+check_box_val).val();
						
						var	popup_services_id = $("#multiple_service_id_"+check_box_val).val();
						var	popup_services_code = $("#multiple_service_code_"+check_box_val).val();
						var	popup_services_name = $("#multiple_service_name_"+check_box_val).val();
						var	popup_item_uom_name  = $("#multiple_services_uom_name_"+check_box_val).val();
						var	popup_item_uom_id  = $("#multiple_services_uom_id_"+check_box_val).val();
						var	popup_services_qty = $("#multiple_services_qty_"+check_box_val).val();
						var	popup_item_mfg_prtno = $("#multiple_services_mfg_prtno_"+check_box_val).val();
						
						var	popup_services_gross_amount = (parseFloat(popup_services_qty)) * (parseFloat(popup_services_priceperunit));
						
												
						if($("#multiple_services_vat_"+check_box_val).val() != "")
						{
							var	popup_services_vat = $("#multiple_services_vat_"+check_box_val).val();
						}
						else
						{
							var	popup_services_vat = 0.00;
						}
						
						if($("#multiple_services_ser_tax_"+check_box_val).val() != "")
						{
							var	popup_services_serv_tax = $("#multiple_services_ser_tax_"+check_box_val).val();
						}
						else
						{
							var	popup_services_serv_tax = 0.00;
						}
						
						if($("#multiple_services_cst_"+check_box_val).val() != "")
						{
							var	popup_services_cst = $("#multiple_services_cst_"+check_box_val).val();
						}
						else
						{
							var	popup_services_cst = 0.00;
						}
						
						/* if($("#multiple_item_gst_"+check_box_val).val() != "")
						{
							var	popup_item_gst = $("#multiple_item_gst_"+check_box_val).val();
						}
						else
						{
							var	popup_item_gst = 0.00;
						} */
						
						/* if($("#multiple_item_exc_"+check_box_val).val() != "")
						{
							var	popup_item_exc = $("#multiple_item_exc_"+check_box_val).val();
						}
						else
						{
							var	popup_item_exc = 0.00;
						} */
						
					//	var	popup_services_percentage_discount = $("#popup_services_percentage_discount").val();
					//	var	popup_item_flat_discount = $("#popup_item_flat_discount").val();
					//	var	discount_type = $("#customer_discount_type").val();
		
						var	customer_tax_type = $("#customer_tax_type").val();
					//	var	popup_services_discount_amount = $("#popup_services_discount_amount").val();
		
						if($("#multiple_services_discount_"+check_box_val).val() != "")
						{
							var	popup_services_percentage_discount = $("#multiple_services_discount_"+check_box_val).val();
						}
						else
						{
							var	popup_services_percentage_discount = 0.00;
						}
						
						/* if($("#multiple_item_flat_discount_"+check_box_val).val() != "")
						{
							var	popup_item_flat_discount = $("#multiple_item_flat_discount_"+check_box_val).val();
						}
						else
						{
							var	popup_item_flat_discount = 0.00;
						} */
						
						
						var popup_services_discount_percent = popup_services_percentage_discount;
						
						if($("#multiple_services_discount_amount_"+check_box_val).val() != "")
						{
							var	popup_services_discount_amount = $("#multiple_services_discount_amount_"+check_box_val).val();
						}
						else
						{
							var	popup_services_discount_amount = 0.00;
						}
						
						var	table_count = $("#last_table_id").val();
						var	counter = parseInt(table_count)+ 1;
						
						if(jQuery.inArray(popup_services_id,old_items)==-1)	
						{
							
							
							if(customer_tax_type == 'vat')
							{
								var services_tax_percent = (parseFloat(popup_services_vat)).toFixed(2);
							}
							else if(customer_tax_type == 'cst')
							{
								var services_tax_percent = (parseFloat(popup_services_cst)).toFixed(2);
							}
							
							var services_discount_amount = popup_services_discount_amount;
							
							var services_gross_amount_with_discount = parseFloat(popup_services_gross_amount)- parseFloat(services_discount_amount);
							
							var services_tax_amount = (services_gross_amount_with_discount * (isNaN(services_tax_percent) ? 0 : services_tax_percent) / 100).toFixed(2);
						
							var services_net_amount = ( (services_gross_amount_with_discount) + parseFloat(services_tax_amount)).toFixed(2);
							
							if(tax_value != 'nontaxable')
							{
							  var items ='<tr><td><a href="javascript:void(0);" id="services_code_value_'+counter+'">'+popup_services_code+'</a><input id="services_code_'+counter+'" name="services_code['+counter+']" value="'+popup_services_code+'" type="hidden" /><input id="item_id_'+counter+'" name="services_id['+counter+']" value="'+popup_services_id+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_mfg_prtno_value_'+counter+'">'+popup_item_mfg_prtno+'</a><input id="item_mfg_prtno_'+counter+'" name="item_mfg_prtno['+counter+']" value="'+popup_item_mfg_prtno+'" type="hidden" /></td><td><a href="javascript:void(0);" id="services_name_value_'+counter+'">'+popup_services_name+'</a><input id="services_name_'+counter+'" name="services_name['+counter+']" value="'+popup_services_name+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_uom_name_value_'+counter+'">'+popup_item_uom_name+'</a><input id="item_uom_id_'+counter+'" name="item_uom_id['+counter+']" type="hidden" value="'+popup_item_uom_id+'" /><input id="item_uom_name_'+counter+'" name="item_uom_name['+counter+']" type="hidden" value="'+popup_item_uom_name+'" /></td><td><input id="services_priceperunit_'+counter+'" name="services_priceperunit['+counter+']" value="'+popup_services_priceperunit+'" type="text" class="quantity" onkeyup="return sales_items_grid_total(event, '+counter+')" /></td><td><input id="services_qty_'+counter+'" class="quantity stock_text" name="services_qty['+counter+']" value="'+popup_services_qty+'" type="text" onkeyup="return sales_items_grid_total(event, '+counter+')" /></td><td><input id="services_gross_amount_'+counter+'" name="services_gross_amount['+counter+']" value="'+popup_services_gross_amount+'" type="text" class="quantity stock_text" readonly="readonly" /></td><td><input id="services_discount_percent_'+counter+'" name="services_discount_percent['+counter+']" value="'+popup_services_discount_percent+'" type="text" class="quantity stock_text" readonly="readonly" /></td><td><input id="services_discount_amount_'+counter+'" name="services_discount_amount['+counter+']" value="'+services_discount_amount+'" type="text" class="quantity stock_text" readonly="readonly" /></td><td><input id="services_tax_percent_'+counter+'" name="services_tax_percent['+counter+']" value="'+services_tax_percent+'" type="text" class="quantity stock_text" readonly="readonly" /><input id="services_vat_'+counter+'" name="services_vat['+counter+']" value="'+popup_services_vat+'" type="hidden" /><input id="services_cst_'+counter+'" name="services_cst['+counter+']" value="'+popup_services_cst+'" type="hidden" /><input id="services_serv_tax_'+counter+'" name="services_serv_tax['+counter+']" value="'+popup_services_serv_tax+'" type="hidden" /></td><td><input id="services_tax_amount_'+counter+'" name="services_tax_amount['+counter+']" value="'+services_tax_amount+'" type="text" class="quantity stock_text" readonly="readonly" /></td><td><input id="services_net_amount_'+counter+'" name="services_net_amount['+counter+']" value="'+services_net_amount+'" type="text" class="quantity" readonly="readonly" /></td><td colspan="2"><div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_delete_'+counter+'" onclick="return itemsgridrowdelete('+counter+');" data-item="'+popup_services_id+'" data-delete="'+counter+'" title="Delete"><span class="icon-trash"></span></div></td></tr>';
							}
							else
							{
								var items ='<tr><td><a href="javascript:void(0);" id="services_code_value_'+counter+'">'+popup_services_code+'</a><input id="services_code_'+counter+'" name="services_code['+counter+']" value="'+popup_services_code+'" type="hidden" /><input id="item_id_'+counter+'" name="services_id['+counter+']" value="'+popup_services_id+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_mfg_prtno_value_'+counter+'">'+popup_item_mfg_prtno+'</a><input id="item_mfg_prtno_'+counter+'" name="item_mfg_prtno['+counter+']" value="'+popup_item_mfg_prtno+'" type="hidden" /></td><td><a href="javascript:void(0);" id="services_name_value_'+counter+'">'+popup_services_name+'</a><input id="services_name_'+counter+'" name="services_name['+counter+']" value="'+popup_services_name+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_uom_name_value_'+counter+'">'+popup_item_uom_name+'</a><input id="item_uom_id_'+counter+'" name="item_uom_id['+counter+']" type="hidden" value="'+popup_item_uom_id+'" /><input id="item_uom_name_'+counter+'" name="item_uom_name['+counter+']" type="hidden" value="'+popup_item_uom_name+'" /></td><td><input id="services_priceperunit_'+counter+'" name="services_priceperunit['+counter+']" value="'+popup_services_priceperunit+'" type="text" class="quantity" onkeyup="return sales_items_grid_total(event, '+counter+')" /></td><td><input id="services_qty_'+counter+'" class="quantity stock_text" name="services_qty['+counter+']" value="'+popup_services_qty+'" type="text" onkeyup="return sales_items_grid_total(event, '+counter+')" /></td><td><input id="services_gross_amount_'+counter+'" name="services_gross_amount['+counter+']" value="'+popup_services_gross_amount+'" type="text" class="quantity" readonly="readonly" /><input id="services_tax_percent_'+counter+'" name="services_tax_percent['+counter+']" value="'+services_tax_percent+'" type="hidden" /><input id="services_vat_'+counter+'" name="services_vat['+counter+']" value="'+popup_services_vat+'" type="hidden" /><input id="services_cst_'+counter+'" name="services_cst['+counter+']" value="'+popup_services_cst+'" type="hidden" /><input id="services_serv_tax_'+counter+'" name="services_serv_tax['+counter+']" value="'+popup_services_serv_tax+'" type="hidden" /><input id="services_tax_amount_'+counter+'" name="services_tax_amount['+counter+']" value="'+services_tax_amount+'" type="hidden" /></td><td><input id="services_discount_percent_'+counter+'" name="services_discount_percent['+counter+']" value="'+popup_services_discount_percent+'" type="text" class="quantity stock_text" readonly="readonly" /></td><td><input id="services_discount_amount_'+counter+'" name="services_discount_amount['+counter+']" value="'+services_discount_amount+'" type="text" class="quantity stock_text" readonly="readonly" /></td><td><input id="services_net_amount_'+counter+'" name="services_net_amount['+counter+']" value="'+services_net_amount+'" type="text" class="quantity" readonly="readonly" /></td><td colspan="2"><div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_delete_'+counter+'" onclick="return itemsgridrowdelete('+counter+');" data-item="'+popup_services_id+'" data-delete="'+counter+'" title="Delete"><span class="icon-trash"></span></div></td></tr>';
							}
							 $('#disp_items').append(items);
							 $("#last_table_id").val(counter);
							 $("#multiple_services_qty_"+check_box_val).val("");
							 $("#multiple_services_priceperunit_"+check_box_val).val("");
							 $("#multiple_services_rate_"+check_box_val).val("");
							 $("#checkbox"+check_box_val).prop("checked", false);
						}
						else
						{
							var r = confirm("The Item has already selected. Do you want update the Quantity?");
							if (r == true)
							{
								$('input[name^="services_id"]').each(function()
								{
									
									var serach_id = $(this).val();
									
									if(serach_id == popup_services_id)
									{
										var search_name = $(this).attr("name");
						
										var search_val = search_name.split("[")[1].split("]")[0];
										
										var search_qty_val = $('[name="services_qty['+search_val+']"]').val();
										var search_prc_val = $('[name="services_priceperunit['+search_val+']"]').val();
										
										var current_qty = popup_services_qty;
										var current_price = popup_services_priceperunit;
										
										var update_qty = parseInt(search_qty_val) + parseInt(popup_services_qty);
										var update_rate = parseInt(update_qty) * parseInt(popup_services_priceperunit);
										
										$('[name="services_priceperunit['+search_val+']"]').val(current_price);
										$("#item_priceperunit_value_"+search_val).text(current_price);
										
										$('[name="services_qty['+search_val+']"]').val(update_qty);
										$("#item_qty_value_"+search_val).text(update_qty);
										
										$('[name="services_gross_amount['+search_val+']"]').val(update_rate);
										$("#item_gross_amount_value_"+search_val).text(update_rate);
										
										var services_tax_percent = (parseFloat(popup_services_vat)+parseFloat(popup_services_serv_tax)+parseFloat(popup_services_cst)).toFixed(2);
										var services_discount_amount = (update_rate * (isNaN(popup_services_discount_percent) ? 0 : popup_services_discount_percent) / 100).toFixed(2);;
						
										var services_tax_amount = (update_rate * (isNaN(services_tax_percent) ? 0 : services_tax_percent) / 100).toFixed(2);
						
										var services_net_amount = (parseFloat(update_rate)+parseFloat(services_tax_amount)-parseFloat(services_discount_amount)).toFixed(2);
										
										$('[name="services_tax_percent['+search_val+']"]').val(services_tax_percent);
										$("#item_tax_percent_value_"+search_val).text(services_tax_percent);
										
										$('[name="services_vat['+search_val+']"]').val(popup_services_vat);
										//$('[name="item_gst['+search_val+']"]').val(popup_item_gst);
										$('[name="services_cst['+search_val+']"]').val(popup_services_cst);
										$('[name="services_serv_tax['+search_val+']"]').val(popup_services_serv_tax);
										//$('[name="item_exc['+search_val+']"]').val(popup_item_exc);
										
										$('[name="services_tax_amount['+search_val+']"]').val(services_tax_amount);
										$("#item_tax_amount_value_"+search_val).text(services_tax_amount);
										
										$('[name="services_discount_percent['+search_val+']"]').val(popup_services_discount_percent);
										$("#item_discount_percent_value_"+search_val).text(popup_services_discount_percent);
										
										$('[name="services_discount_amount['+search_val+']"]').val(services_discount_amount);
										$("#item_discount_amount_value_"+search_val).text(services_discount_amount);
										
										$('[name="services_net_amount['+search_val+']"]').val(services_net_amount);
										$("#item_net_amount_value_"+search_val).text(services_net_amount);
									}
								});
							}
							else
							{
								document.getElementById("multiple_item_form").reset();
								$('#btnservicesSave').addClass("close");
							} 
						}
					}
				}
				else
				{
					$("#multiple_services_qty_"+check_box_val).val("");
					$("#multiple_services_rate_"+check_box_val).val("");
				}
        });
		if (exitMultipleItemsInsert)
		{
			if($("#multiple_services_priceperunit_"+exitMultipleItemsInsert).val() == "")
			{
				$("#multipleItemselecctall").prop("checked", false);
				$("#multiple_services_priceperunit_"+exitMultipleItemsInsert).focus();
				$("#multiple_services_error").text('This Field is Required');
				return false;
			}
			else if($("#multiple_services_qty_"+exitMultipleItemsInsert).val() == "")
			{
				$("#multipleItemselecctall").prop("checked", false);
				$("#multiple_services_qty_"+exitMultipleItemsInsert).focus();
				$("#multiple_services_error").text('This Field is Required');
				return false;
			}
			else if($("#multiple_services_rate_"+exitMultipleItemsInsert).val() == "")
			{
				$("#multipleItemselecctall").prop("checked", false);
				$("#multiple_services_rate_"+exitMultipleItemsInsert).focus();
				$("#multiple_services_error").text('This Field is Required');
				return false;
			}
		}
		else
		{
			$("#multipleItemselecctall").prop("checked", false);
			document.getElementById("multiple_item_form").reset();
			//$('#btnservicesSave').addClass("close");
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
			data: {pricebook: pricebook_id, product_type: search_product_type, product_group: search_product_group, services_code: search_item_code, services_name: search_item_name, item_mfg_prtno: search_item_mfg_prtno, customer_discount: customer_discount},
			success: function(resp)
			{ 
				$('#multiple_items').html(resp);
			}
		 });
	 
    });
	
	
});

$(document).ready(function(){

  // smart search for multiple item code in sales
  $("#search_multiple_item_code").autocomplete({
    source: "<?php echo site_url('salespopup/get_item_code'); ?>", // name of controller followed by function
	autoFocus:true,
	appendTo: "#auto_complete_item_code",
  });
  
   // smart search for multiple item partnumber in sales
  $("#search_multiple_item_mfg_prtno").autocomplete({
    source: "<?php echo site_url('salespopup/get_item_partnumber'); ?>", // name of controller followed by function
	autoFocus:true,
	appendTo: "#auto_complete_item_partnumber",
  });
  
   // smart search for multiple item name in sales
   $("#search_multiple_item_name").autocomplete({
    source: "<?php echo site_url('salespopup/get_item_name'); ?>", // name of controller followed by function
	autoFocus:true,
	appendTo: "#auto_complete_item_name",
  });
  
});

	
</script>

<div class="p-popup">
  <a class="close"><img src="<?php echo base_url(); ?>/resources/images/close-button.png" width="25" /></a>
  
  <div>
  <div class="title_head">
<!--   <p>Search Products</p>
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
            </td>
			<td>
            	Part No :
            	<br /><br />
            	<input type="text" 	value="" name="search_multiple_item_mfg_prtno" autocomplete="off" class="input-large" id="search_multiple_item_mfg_prtno">
                <span id="auto_complete_item_partnumber"></span>
            </td>
            <td>
            	Item Description :
            	<br /><br />
            	<input type="text" 	value="" name="search_multiple_item_name" autocomplete="off" class="input-large" id="search_multiple_item_name">
                <span id="auto_complete_item_name"></span>
            </td>
            <td>
            	Item Code :
            	<br /><br />
            	<input type="text" 	value="" name="search_multiple_item_code" autocomplete="off" class="input-large" id="search_multiple_item_code">
                <span id="auto_complete_item_code"></span>
            </td>
			<td>
            	<br /><br />
            	<a href="#" id="multipleitmesearch" class="btn-success">Search</a>
            </td>
        </tr>
      </table> -->
      </div>
  <div class="title_head" style="margin-top: 14px;">
  <p>Services</p>
  <ul style="top:140px;">
     <li><a class="insert" id="btnservicesSave" href="#">Insert</a></li>
  </ul>
  </div>
  	<div class="table_head1" id="table">
      <div class="popup_col w10 last">
      
      <div id="multiple_services_error" style="color: #FF0000; text-align:center;"></div>
      <form id="multiple_item_form">
        <div class="content">
          <table>
            <thead>
              <tr>
              	<th class="checkbox"><input type="checkbox" id="multipleItemselecctall" value=""></th>
				<th width="80px">Services Code</th>
                <th width="100">Services Name</th>
                <th width="70px">Support Starts</th>	
                <th width="70px">Support Ends</th>	
                <th width="70px">Usage Units</th>	
                <th width="70px">Units</th>	
			    <th width="100px">Price/Unit</th>
				<th width="65px">Quantity</th>
                <th width="60px">Discount (%)</th>	
              
                <th width="70px">Discount Amount</th>
                <?php if(isset($tax_value)) { if($tax_value != 'nontaxable') { ?>
				<th width="60px">VAT</th>
				<!--<th>GST</th>-->
				<th width="60px">CST</th>
				<th>Service Tax</th>
			<!--	<th>Excise Duty</th>-->
                <?php } } ?>
				<th>Net Amount</th>
				</tr>
            </thead>
            
            <tbody id="multiple_items">
              <?php if(!empty($services_list)) { $itemcount = 1; foreach($services_list as $SERV) { ?>
              <tr>
              <td class="checkbox"><input type="checkbox" class="itemcheckbox" id="checkbox<?php echo $itemcount; ?>" value="<?php echo $itemcount; ?>" name="item_check[]"></td>
              <td>
			  
              <?php if(isset($SERV['service_code'])) { echo $SERV['service_code']; } ?>
              <input id="multiple_service_id_<?php echo $itemcount; ?>" name="multiple_service_id[<?php echo $itemcount; ?>]" value="<?php echo $SERV['service_id']; ?>" type="hidden" />
              <input id="multiple_service_code_<?php echo $itemcount; ?>" name="multiple_service_code[<?php echo $itemcount; ?>]" value="<?php if(isset($SERV['service_code'])) { echo $SERV['service_code']; } ?>" type="hidden" />
              </td>
			  
			   <td>
              <?php if(isset($SERV['service_name'])) { echo $SERV['service_name']; } ?>
              <input id="multiple_service_name_<?php echo $itemcount; ?>" name="multiple_item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($SERV['service_name'])) { echo $SERV['service_name']; } ?>" type="hidden" />
              </td>
			  
              <td>
			  <?php if(isset($SERV['service_support_start_date'])) { echo $SERV['service_support_start_date']; } ?>
               <input id="multiple_start_date_<?php echo $itemcount; ?>" name="multiple_start_date[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($SERV['service_support_start_date'])) { echo $SERV['service_support_start_date']; } ?>" />
              </td> 
			  
			   <td>
			  <?php if(isset($SERV['service_support_end_date'])) { echo $SERV['service_support_end_date']; } ?>
               <input id="multiple_end_date_<?php echo $itemcount; ?>" name="multiple_end_date[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($SERV['service_support_end_date'])) { echo $SERV['service_support_end_date']; } ?>" />
              </td>
			
           
              <input id="multiple_services_uom_id_<?php echo $itemcount; ?>" name="multiple_services_uom_id[<?php echo $itemcount; ?>]" type="hidden" value="-" />
              <input id="multiple_services_uom_name_<?php echo $itemcount; ?>" name="multiple_services_uom_name[<?php echo $itemcount; ?>]" type="hidden" value="-" />
              <input id="multiple_services_mfg_prtno_<?php echo $itemcount; ?>" name="multiple_services_mfg_prtno[<?php echo $itemcount; ?>]" type="hidden" value="Services" />
             
			  
			  
			  <td>
			  <?php if(isset($SERV['service_usage_units'])) { echo $SERV['service_usage_units']; } ?>
               <input id="multiple_use_units_<?php echo $itemcount; ?>" name="multiple_use_units[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($SERV['service_usage_units'])) { echo $SERV['service_usage_units']; } ?>" />
              </td>
			   <td>
			  <?php if(isset($SERV['service_no_of_units'])) { echo $SERV['service_no_of_units']; } ?>
               <input id="multiple_no_units_<?php echo $itemcount; ?>" name="multiple_no_units[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($SERV['service_no_of_units'])) { echo $SERV['service_no_of_units']; } ?>" />
              </td>
			  
			   <td>
              <input id="multiple_services_priceperunit_<?php echo $itemcount; ?>" class="quantity" name="multiple_services_priceperunit[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($SERV['service_price'])) { echo $SERV['service_price']; } ?>" readonly="readonly" />
              </td>
			  			    
              <td>
              <input id="multiple_services_qty_<?php echo $itemcount; ?>" onkeyup="return salse_servicespopuptotal(event, <?php echo $itemcount; ?>)" class="quantity stock_text" name="multiple_services_qty[<?php echo $itemcount; ?>]" type="text" value="" />
              </td>
			  
			   <td>
              <input type="text" value="<?php if(isset($SERV['service_discounts'])) { echo $SERV['service_discounts']; } ?>" id="multiple_services_discount_<?php echo $itemcount; ?>" name="multiple_services_discount[<?php echo $itemcount; ?>]" class="quantity stock_text" readonly="readonly">
              </td>
			  <td>
              <input id="multiple_services_discount_amount_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_discount_amount[<?php echo $itemcount; ?>]" type="text" value="" readonly="readonly" />
              </td>
			  
			 
			  
			   <?php if(isset($tax_value)) { if($tax_value != 'nontaxable') { ?>
              <td>
              <input id="multiple_services_vat_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_services_vat[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($SERV['service_vat_tax'])) { echo $SERV['service_vat_tax']; } ?>" readonly="readonly" />
			  </td>
			  <td>
              <input id="multiple_services_cst_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_services_cst[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($SERV['service_sales_tax'])) { echo $SERV['service_sales_tax']; } ?>" readonly="readonly" />
			  </td>
			  <td>
              <input id="multiple_services_ser_tax_<?php echo $itemcount; ?>" class="quantity" name="multiple_services_ser_tax[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($SERV['service_service_tax'])) { echo $SERV['service_service_tax']; } ?>" readonly="readonly" />
              </td>
              <?php } } else { ?>
              <input id="multiple_services_vat_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_services_vat[<?php echo $itemcount; ?>]" type="hidden" value="0.00" readonly="readonly" />
              <input id="multiple_services_cst_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_services_cst[<?php echo $itemcount; ?>]" type="hidden" value="0.00" readonly="readonly" />
              <input id="multiple_services_ser_tax_<?php echo $itemcount; ?>" class="quantity" name="multiple_services_ser_tax[<?php echo $itemcount; ?>]" type="hidden" value="0.00" readonly="readonly" />
              <?php } ?>
			  
			  
			  <td>
              <input id="multiple_services_rate_<?php echo $itemcount; ?>" class="quantity" name="multiple_services_rate[<?php echo $itemcount; ?>]" readonly="readonly" type="text" value="" />
              </td>
              </tr>
              <?php $itemcount++; } } ?>
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