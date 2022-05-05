<script type="text/javascript">

function search_multiple_product()
{
			
			var item_igst_name = $("#item_igst_name_").val();
			//alert(item_igst_name);
           var search_product_type = $("#search_multiple_product_type").val();
		   var search_product_group = $("#search_multiple_product_group").val();
		   var search_item_code = $("#search_multiple_item_code").val();
		   var search_item_name = $("#search_multiple_item_name").val();
		   var search_item_mfg_prtno = $("#search_multiple_item_mfg_prtno").val();
		   var store_division_id = $("#store_division_id").val();
		   var pricebook_id = $("#price_book_id").val();
		  
		   $.ajax({
			type: 'POST',
			url: '<?php echo site_url('purchasepopup/purchase_multiplesearchitemdetails'); ?>',
			data: {product_type: search_product_type, product_group: search_product_group, item_code: search_item_code, item_name: search_item_name, item_mfg_prtno: search_item_mfg_prtno,store_division_id:store_division_id,item_igst_name:item_igst_name,pricebook_id:pricebook_id},
			success: function(resp)
			{ 
				//alert(resp);
				$('#multiple_items').html(resp);
			}
		 });
	 
    }
	</script>
<script type="text/javascript"> 
$(document).ready(function () {
	
	$(".itemcheckbox").prop("checked", false);
	document.getElementById("multiple_item_form").reset();
	
	$('#btnmultipleSave').click(function ()
	{
		
		var item_igst_name = $("#item_igst_name_").val();
	
	//alert(item_igst_name);
	
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
					var	multiple_item_qty = $("#multiple_item_qty_"+check_box_val).val();
					var multiple_item_priceperunit = $("#multiple_item_priceperunit_"+check_box_val).val();
					var multiple_item_rate = $("#multiple_item_rate_"+check_box_val).val();
					
					if(multiple_item_priceperunit == "" || multiple_item_qty == "" || multiple_item_rate == "")
					{
						exitMultipleItemsInsert = check_box_val;
                      	return false;
					}
					else
					{
						$("#multiple_item_error").text('');
												
						var popup_item_priceperunit = $("#multiple_item_priceperunit_"+check_box_val).val();
						var	popup_gross_amount = $("#multiple_item_rate_"+check_box_val).val();
						
						var	popup_item_id = $("#multiple_item_id_"+check_box_val).val();
						var	popup_item_code = $("#multiple_item_code_"+check_box_val).val();
						var	popup_item_name = $("#multiple_item_name_"+check_box_val).val();
						var	popup_item_hsn_sac = $("#multiple_item_hsn_sac_"+check_box_val).val();
						var	popup_item_uom_name  = $("#multiple_item_uom_name_"+check_box_val).val();
						var	popup_item_uom_id  = $("#multiple_item_uom_id_"+check_box_val).val();
						var	popup_item_qty = $("#multiple_item_qty_"+check_box_val).val();
						var	popup_item_model = $("#multiple_item_model_"+check_box_val).val();
						var	popup_item_mfg_prtno = $("#multiple_item_mfg_prtno_"+check_box_val).val();
						
						var	popup_item_store_name = $("#multiple_item_store_name_"+check_box_val).val();
						var	popup_item_division_name = $("#multiple_item_division_name_"+check_box_val).val();
						
						var	popup_item_store_id = $("#multiple_item_store_id_"+check_box_val).val();
						var	popup_item_division_id = $("#multiple_item_division_id_"+check_box_val).val();

						var	popup_gross_amount = (parseFloat(popup_item_qty)) * (parseFloat(popup_item_priceperunit));
						
						if($("#multiple_item_tax_percent_"+check_box_val).val() != "")
						{
							var	tax_percent = $("#multiple_item_tax_percent_"+check_box_val).val();
						}
						else
						{
							var	tax_percent = 0.00;
						}
						
						if($("#multiple_item_excise_percent_"+check_box_val).val() != "")
						{
							var	excise_percent = $("#multiple_item_excise_percent_"+check_box_val).val();
						}
						else
						{
							var	excise_percent = 0.00;
						}
						
						if($("#multiple_item_igst_percent_"+check_box_val).val() != "")
						{
							var	igst_percent = $("#multiple_item_igst_percent_"+check_box_val).val();
						}
						else
						{
							var	igst_percent = 0.00;
						}
						
						if($("#multiple_item_discount_"+check_box_val).val() != "")
						{
							var	popup_item_discount_percent = $("#multiple_item_discount_"+check_box_val).val();
						}
						else
						{
							var	popup_item_discount_percent = 0.00;
						}
		
						var	table_count = $("#last_table_id").val();
						var	counter = parseInt(table_count)+ 1;
						
						if(jQuery.inArray(popup_item_id,old_items)==-1)	
						{
							
							if(item_igst_name == 0)
							{
								var item_tax_percent = (parseFloat(tax_percent)).toFixed(2);
							
								var item_excise_percent = (parseFloat(excise_percent)).toFixed(2);
								var item_batch_no = "";
					
					
								var expiry_date =$( ".expiry_date_picker" ).datepicker({
								dateFormat: 'dd-mm-yy',
								 changeMonth: true,//this option for allowing user to select month
								changeYear: true //this option for allowing user to select from year range
							   }); 
								
								var item_discount_amount = (popup_gross_amount * (isNaN(popup_item_discount_percent) ? 0 : popup_item_discount_percent) / 100).toFixed(2);;
								
								var item_gross_amount_with_discount = parseFloat(popup_gross_amount)- parseFloat(item_discount_amount);
								 
								
								var item_tax_amount = (item_gross_amount_with_discount * (isNaN(item_tax_percent) ? 0 : item_tax_percent) / 100).toFixed(2);
								
								var item_excise_amount = (item_gross_amount_with_discount * (isNaN(item_excise_percent) ? 0 : item_excise_percent) / 100).toFixed(2);
							
								var item_net_amount = ( (item_gross_amount_with_discount) + parseFloat(item_tax_amount)+ parseFloat(item_excise_amount)).toFixed(2);
								
								var items ='<tr><input id="item_code_'+counter+'" name="item_code['+counter+']" value="'+popup_item_code+'" type="hidden" /><input id="item_id_'+counter+'" name="item_id['+counter+']" value="'+popup_item_id+'" type="hidden"/><td><a href="javascript:void(0);" id="item_mfg_prtno_value_'+counter+'">'+popup_item_mfg_prtno+'</a><input id="item_mfg_prtno_'+counter+'" name="item_mfg_prtno['+counter+']" value="'+popup_item_mfg_prtno+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_name_value_'+counter+'">'+popup_item_name+'</a><input id="item_name_'+counter+'" name="item_name['+counter+']" value="'+popup_item_name+'" type="hidden" /><input id="item_name_hsn_sac_'+counter+'" name="item_name_hsn_sac['+counter+']" value="'+popup_item_hsn_sac+'" type="hidden" /><input id="multiple_item_division_name_'+counter+'" name="multiple_item_division_name['+counter+']" value="'+popup_item_division_name+'" type="hidden" /><input id="multiple_item_division_id_'+counter+'" name="multiple_item_division_id['+counter+']" value="'+popup_item_division_id+'" type="hidden" /><input id="multiple_item_store_name_'+counter+'" name="multiple_item_store_name['+counter+']" value="'+popup_item_store_name+'" type="hidden" /><input id="multiple_item_store_id_'+counter+'" name="multiple_item_store_id['+counter+']" value="'+popup_item_store_id+'" type="hidden" /></td><input id="item_batch_no_'+counter+'" name="item_batch_no['+counter+']" value="'+item_batch_no+'" type="hidden" class="quantity stock_text"  /><input id="expiry_date_'+counter+'" name="expiry_date['+counter+']" value="" type="hidden" class="quantity stock_text expiry_date_picker"  /><td><input id="item_uom_id_'+counter+'" name="item_uom_id['+counter+']" type="hidden" value="'+popup_item_uom_id+'" /><input id="item_uom_name_'+counter+'" name="item_uom_name['+counter+']" type="hidden" value="'+popup_item_uom_name+'" /><input id="item_qty_'+counter+'" name="item_qty['+counter+']" value="'+popup_item_qty+'" type="text" class="quantity stock_text" onkeyup="return purchase_items_grid_total(event, '+counter+')" /></td><td><input id="item_priceperunit_'+counter+'" name="item_priceperunit['+counter+']" value="'+popup_item_priceperunit+'" type="text" class="quantity" onkeyup="return purchase_items_grid_total(event, '+counter+')" /></td><td><input id="item_gross_amount_'+counter+'" name="item_gross_amount['+counter+']" value="'+popup_gross_amount+'" type="text" class="quantity stock_text" readonly="readonly" /><input id="item_sale_price_'+counter+'" name="item_sale_price['+counter+']" value="" type="hidden" class="quantity stock_text"  /><input id="item_gain_percent_'+counter+'" name="item_gain_percent['+counter+']" value="" type="hidden" class="quantity stock_text"  /><input id="item_scheme_percent_'+counter+'" name="item_scheme_percent['+counter+']" value="0" type="hidden" onkeyup="return purchase_items_grid_total(event, '+counter+')" class="quantity stock_text"  /><input id="item_scheme_amount_'+counter+'" name="item_scheme_amount['+counter+']" readonly="readonly" value="0" type="hidden" class="quantity stock_text"  /><input id="item_discount_percent_'+counter+'" name="item_discount_percent['+counter+']" value="'+popup_item_discount_percent+'" type="hidden" class="quantity stock_text" onkeyup="return purchase_items_grid_total(event, '+counter+')" /><input id="item_discount_amount_'+counter+'" name="item_discount_amount['+counter+']" value="'+item_discount_amount+'" type="hidden" class="quantity stock_text" readonly="readonly" /></td><td><input id="item_tax_percent_'+counter+'" name="item_tax_percent['+counter+']" value="'+item_tax_percent+'" type="text" class="quantity stock_text" onkeyup="return purchase_items_grid_total(event, '+counter+')" /><input id="item_tax_amount_'+counter+'" name="item_tax_amount['+counter+']" value="'+item_tax_amount+'" type="hidden" class="quantity stock_text" readonly="readonly" /></td><td><input id="item_excise_percent_'+counter+'" name="item_excise_percent['+counter+']" value="'+item_excise_percent+'" type="text" class="quantity stock_text" onkeyup="return purchase_items_grid_total(event, '+counter+')" /><input id="item_excise_amount_'+counter+'" name="item_excise_amount['+counter+']" value="'+item_excise_amount+'" type="hidden" class="quantity stock_text" readonly="readonly" /></td><td><input id="item_net_amount_'+counter+'" name="item_net_amount['+counter+']" value="'+item_net_amount+'" type="text" class="quantity" readonly="readonly" /></td><td colspan="2"><div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_delete_'+counter+'" onclick="return purchase_itemsgridrowdelete('+counter+');" data-item="'+popup_item_id+'" data-delete="'+counter+'" title="Delete"><span class="icon-trash"></span></div></td></tr>';
							}
							
							else if(item_igst_name == 1)
							{
								var igst_tax_percent = (parseFloat((isNaN(igst_percent) ? 0 : igst_percent)));
							
								var item_batch_no = "";
					
					
								var expiry_date =$( ".expiry_date_picker" ).datepicker({
								dateFormat: 'dd-mm-yy',
								 changeMonth: true,//this option for allowing user to select month
								changeYear: true //this option for allowing user to select from year range
							   }); 
								
								var item_discount_amount = (popup_gross_amount * (isNaN(popup_item_discount_percent) ? 0 : popup_item_discount_percent) / 100).toFixed(2);;
								
								var item_gross_amount_with_discount = parseFloat(popup_gross_amount)- parseFloat(item_discount_amount);
								 
								
								var item_igst_tax_amount = (item_gross_amount_with_discount * (isNaN(igst_tax_percent) ? 0 : igst_tax_percent) / 100).toFixed(2);
			
								var item_net_amount = (item_gross_amount_with_discount + parseFloat(item_igst_tax_amount)).toFixed(2);
								
								var items ='<tr><input id="item_code_'+counter+'" name="item_code['+counter+']" value="'+popup_item_code+'" type="hidden" /><input id="item_id_'+counter+'" name="item_id['+counter+']" value="'+popup_item_id+'" type="hidden"/><td><a href="javascript:void(0);" id="item_mfg_prtno_value_'+counter+'">'+popup_item_mfg_prtno+'</a><input id="item_mfg_prtno_'+counter+'" name="item_mfg_prtno['+counter+']" value="'+popup_item_mfg_prtno+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_name_value_'+counter+'">'+popup_item_name+'</a><input id="item_name_'+counter+'" name="item_name['+counter+']" value="'+popup_item_name+'" type="hidden" /></td><td><a href="javascript:void(0);" >'+popup_item_hsn_sac+'</a><input id="item_name_hsn_sac_'+counter+'" name="item_name_hsn_sac['+counter+']" value="'+popup_item_hsn_sac+'" type="hidden" /></td><td><a href="javascript:void(0);" >'+popup_item_division_name+'</a><input id="multiple_item_division_name_'+counter+'" name="multiple_item_division_name['+counter+']" value="'+popup_item_division_name+'" type="hidden" /><input id="multiple_item_division_id_'+counter+'" name="multiple_item_division_id['+counter+']" value="'+popup_item_division_id+'" type="hidden" /><input id="item_name_hsn_sac_'+counter+'" name="item_name_hsn_sac['+counter+']" value="'+popup_item_hsn_sac+'" type="hidden" /></td><td><a href="javascript:void(0);" >'+popup_item_store_name+'</a><input id="multiple_item_store_name_'+counter+'" name="multiple_item_store_name['+counter+']" value="'+popup_item_store_name+'" type="hidden" /><input id="multiple_item_store_id_'+counter+'" name="multiple_item_store_id['+counter+']" value="'+popup_item_store_id+'" type="hidden" /></td><input id="item_batch_no_'+counter+'" name="item_batch_no['+counter+']" value="'+item_batch_no+'" type="hidden" class="quantity stock_text"  /><input id="expiry_date_'+counter+'" name="expiry_date['+counter+']" value="" type="hidden" class="quantity stock_text expiry_date_picker"  /><td><a href="javascript:void(0);" id="item_uom_name_value_'+counter+'">'+popup_item_uom_name+'</a><input id="item_uom_id_'+counter+'" name="item_uom_id['+counter+']" type="hidden" value="'+popup_item_uom_id+'" /><input id="item_uom_name_'+counter+'" name="item_uom_name['+counter+']" type="hidden" value="'+popup_item_uom_name+'" /></td><td><input id="item_qty_'+counter+'" name="item_qty['+counter+']" value="'+popup_item_qty+'" type="text" class="quantity stock_text" onkeyup="return purchase_items_grid_total(event, '+counter+')" /></td><td><input id="item_priceperunit_'+counter+'" name="item_priceperunit['+counter+']" value="'+popup_item_priceperunit+'" type="text" class="quantity" onkeyup="return purchase_items_grid_total(event, '+counter+')" /></td></td><td><input id="item_gross_amount_'+counter+'" name="item_gross_amount['+counter+']" value="'+popup_gross_amount+'" type="text" class="quantity stock_text" readonly="readonly" /></td><td><input id="item_discount_percent_'+counter+'" name="item_discount_percent['+counter+']" value="'+popup_item_discount_percent+'" type="text" class="quantity stock_text" onkeyup="return purchase_items_grid_total(event, '+counter+')" /></td><td><input id="item_discount_amount_'+counter+'" name="item_discount_amount['+counter+']" value="'+item_discount_amount+'" type="text" class="quantity stock_text" readonly="readonly" /></td><td><input id="item_igst_tax_percent_'+counter+'" name="item_igst_tax_percent['+counter+']" value="'+igst_tax_percent+'" type="text" class="quantity stock_text" onkeyup="return purchase_items_grid_total(event, '+counter+')" /></td><td><input id="item_igst_tax_amount_'+counter+'" name="item_igst_tax_amount['+counter+']" value="'+item_igst_tax_amount+'" type="text" class="quantity stock_text" readonly="readonly" /></td><td><input id="item_net_amount_'+counter+'" name="item_net_amount['+counter+']" value="'+item_net_amount+'" type="text" class="quantity" readonly="readonly" /></td><td colspan="2"><div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_delete_'+counter+'" onclick="return purchase_itemsgridrowdelete('+counter+');" data-item="'+popup_item_id+'" data-delete="'+counter+'" title="Delete"><span class="icon-trash"></span></div></td></tr>';
								
							}
							
							 $('#disp_items').append(items);
							 $("#last_table_id").val(counter);
							 $("#multiple_item_qty_"+check_box_val).val("");
							 $("#multiple_item_priceperunit_"+check_box_val).val("");
							 $("#multiple_item_discount_"+check_box_val).val("");
							 $("#multiple_item_tax_percent_"+check_box_val).val("");
							 $("#multiple_item_excise_percent_"+check_box_val).val("");
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
			else if($("#multiple_item_qty_"+exitMultipleItemsInsert).val() == "")
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
			}
		}
		else
		{
			$("#multipleItemselecctall").prop("checked", false);
			document.getElementById("multiple_item_form").reset();
			$('#btnmultipleSave').addClass("close");
		}
		
		purchase_calculatetotal();
		
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
	
	
	
	
});


$(document).ready(function(){

	var division_id = $('#material_store_division_id').val();
	
  // smart search for multiple item code in purchase
  $("#search_multiple_item_code").autocomplete({
    source: "<?php echo site_url('purchasepopup/get_item_code'); ?>", // name of controller followed by function
	autoFocus:true,
	appendTo: "#auto_complete_item_code",
  });
  
   // smart search for multiple item partnumber in purchase
  $("#search_multiple_item_mfg_prtno").autocomplete({
    source: "<?php echo site_url('purchasepopup/get_item_partnumber'); ?>", // name of controller followed by function
	autoFocus:true,
	appendTo: "#auto_complete_item_partnumber",
  });
  
   // smart search for multiple item name in purchase
   $("#search_multiple_item_name").autocomplete({
    source: "<?php echo site_url('purchasepopup/get_item_name'); ?>?division_id=" + division_id, // name of controller followed by function
	autoFocus:true,
	appendTo: "#auto_complete_item_name",
  });
  
});

</script>


<div class="p-popup">
  <a class="close"><img src="<?php echo base_url(); ?>/resources/images/close-button.png" width="25" /></a>
  <div>
  <div class="title_head">
  <p>Search Material</p>
  </div>
      <table>
      	<tr>
        	
			<td>
            	Material Category :
                <br /><br />
                <select	name="search_multiple_product_type" class="chzn-select" id="search_multiple_product_type">
                    <option value="">Select Material Category</option>
                    <?php if(isset($product_type) && !empty($product_type)) { foreach($product_type as $TYPE) { ?>
                    <option value="<?php echo $TYPE['products_type_id']; ?>"><?php echo $TYPE['products_type_name']; ?></option>
                    <?php } } ?>
                </select>
            </td>
          
            <td>
            	Item Code :
            	<br /><br />
            	<input type="text" 	value="" name="search_multiple_item_code" autocomplete="off" class="input-large" onkeyup="search_multiple_product()" id="search_multiple_item_code">
                <span id="auto_complete_item_code"></span>
            </td>
            <td>
            	SKU :
            	<br /><br />
            	<input type="text" 	value="" name="search_multiple_item_mfg_prtno" autocomplete="off" class="input-large" onkeyup="search_multiple_product()" id="search_multiple_item_mfg_prtno">
                <span id="auto_complete_item_partnumber"></span>
            </td>
            <td>
            	Item :
            	<br /><br />
            	<input type="text" 	value="" name="search_multiple_item_name" autocomplete="off" class="input-large" onkeyup="search_multiple_product()" id="search_multiple_item_name">
                <span id="auto_complete_item_name"></span>
            </td>
            <td>
            	<br />
            </td>
        </tr>
      </table>
      </div>
      <div class="title_head" style="margin-top: 14px;">
  <p>Multiple Items</p>
  <ul style="top:158px;">
     <li><a class="insert" id="btnmultipleSave" href="#">Insert</a></li>
     <!--<li><a class="btn-success close" href="#" id="close_popup">Close</a></li>-->
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
				<th>Item Code</th>
                <th>SKU</th>
                <th>Item</th>
			    <th>HSN/SAC</th>
                <th>Store Division</th>
                <th>Store Name</th>
				<th>UOM</th>
				<th>Quantity</th>
                <th>Price/Unit</th>	
                <th>Discount(%)</th>
                <?php if($purchse_ord_igst == 0){ ?>
                <th>CGST(%)</th>
				<th>SGST(%)</th>
				<?php  } ?>
                
				<?php if($purchse_ord_igst == 1){ ?>
                <th>IGST(%)</th>
                <?php  } ?>
				<th>Net Amount</th>
			 </tr>
            </thead>
            <?php 
			//echo $purchse_ord_igst; exit;
			//echo "<pre>"; print_r($product_list); exit; ?>
            <tbody id="multiple_items">
            <input id="item_igst_name_" name="item_igst_name" value="<?php  echo $purchse_ord_igst; ?>" type="hidden" />
            
              <?php $itemcount = 1; foreach($product_list as $PROLST) { ?>
              <tr>
              <td class="checkbox"><input type="checkbox" class="itemcheckbox" id="checkbox<?php echo $itemcount; ?>" value="<?php echo $itemcount; ?>" name="item_check[]"></td>
              <td>
              <?php if(isset($PROLST['product_code'])) { echo $PROLST['product_code']; } ?>
              <input id="multiple_item_id_<?php echo $itemcount; ?>" name="multiple_item_id[<?php echo $itemcount; ?>]" value="<?php echo $PROLST['product_id']; ?>" type="hidden" />
              <input id="multiple_item_code_<?php echo $itemcount; ?>" name="multiple_item_code[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['product_code'])) { echo $PROLST['product_code']; } ?>" type="hidden" />
              </td>
              <td>
			  <?php if(isset($PROLST['product_mfr_part_number'])) { echo $PROLST['product_mfr_part_number']; } ?>
               <input id="multiple_item_mfg_prtno_<?php echo $itemcount; ?>" name="multiple_item_mfg_prtno[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['product_mfr_part_number'])) { echo $PROLST['product_mfr_part_number']; } ?>" />
              </td>
              <td>
              <?php if(isset($PROLST['product_name'])) { echo $PROLST['product_name']; } ?>
              <input id="multiple_item_name_<?php echo $itemcount; ?>" name="multiple_item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['product_name'])) { echo $PROLST['product_name']; } ?>" type="hidden" />
              </td>
			  
			  <td>
              <?php if(isset($PROLST['product_hsn_sac'])) { echo $PROLST['product_hsn_sac']; } ?>
             <input id="multiple_item_hsn_sac_<?php echo $itemcount; ?>" name="multiple_item_hsn_sac[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['product_hsn_sac'])) { echo $PROLST['product_hsn_sac']; } ?>" type="hidden" />
              </td>
			  
			   <td>
              <?php if(isset($PROLST['division_name'])) { echo $PROLST['division_name']; } ?>
              <input id="multiple_item_hsn_sac_<?php echo $itemcount; ?>" name="multiple_item_hsn_sac[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['product_hsn_sac'])) { echo $PROLST['product_hsn_sac']; } ?>" type="hidden" />
              <input id="multiple_item_division_name_<?php echo $itemcount; ?>" name="multiple_item_division_name[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['division_name'])) { echo $PROLST['division_name']; } ?>" type="hidden" />
              <input id="multiple_item_division_id_<?php echo $itemcount; ?>" name="multiple_item_division_id[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['division_id'])) { echo $PROLST['division_id']; } ?>" type="hidden" />
              </td>
              
               <td>
              <?php if(isset($PROLST['store_name'])) { echo $PROLST['store_name']; } ?>
             
              <input id="multiple_item_store_id_<?php echo $itemcount; ?>" name="multiple_item_store_id[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['store_id'])) { echo $PROLST['store_id']; } ?>" type="hidden" />
               <input id="multiple_item_store_name_<?php echo $itemcount; ?>" name="multiple_item_store_name[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['store_name'])) { echo $PROLST['store_name']; } ?>" type="hidden" />
              </td>
			  
              <td>
             <?php if(isset($PROLST['uom_name'])) { echo $PROLST['uom_name'];  } ?> 
              <input id="multiple_item_uom_id_<?php echo $itemcount; ?>" name="multiple_item_uom_id[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['uom_id'])) { echo $PROLST['uom_id']; } ?>" />
              <input id="multiple_item_uom_name_<?php echo $itemcount; ?>" name="multiple_item_uom_name[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['uom_name'])) { echo $PROLST['uom_name']; } ?>" />
              </td>
               
              <td>
              <input id="multiple_item_qty_<?php echo $itemcount; ?>" onkeyup="return purchase_multiplepopuptotal(event, <?php echo $itemcount; ?>)" name="multiple_item_qty[<?php echo $itemcount; ?>]" type="text" class="quantity stock_text" value="" />
              </td>
              <td>
              <input id="multiple_item_priceperunit_<?php echo $itemcount; ?>" onkeyup="return purchase_multiplepopuptotal(event, <?php echo $itemcount; ?>)"  name="multiple_item_priceperunit[<?php echo $itemcount; ?>]" type="text" class="quantity" value="<?php if(isset($PROLST['price_book_price_selling_price'])) { echo $PROLST['price_book_price_selling_price']; } ?>" />
              </td>
              <td>
              <input id="multiple_item_discount_<?php echo $itemcount; ?>" onkeyup="return purchase_multiplepopuptotal(event, <?php echo $itemcount; ?>)" name="multiple_item_discount[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['price_book_price_discount_percentage'])) { echo $PROLST['price_book_price_discount_percentage']; } ?>" type="text" class="quantity stock_text" />
              </td>
              
              <?php if($purchse_ord_igst == 0){ ?>
              <td>
              <input id="multiple_item_tax_percent_<?php echo $itemcount; ?>" onkeyup="return purchase_multiplepopuptotal(event, <?php echo $itemcount; ?>)" name="multiple_item_tax_percent[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['price_book_price_gst'])) { echo $PROLST['price_book_price_gst']; } ?>" type="text" class="quantity stock_text" />
              </td> 

			  <td>
              <input id="multiple_item_excise_percent_<?php echo $itemcount; ?>" onkeyup="return purchase_multiplepopuptotal(event, <?php echo $itemcount; ?>)" name="multiple_item_excise_percent[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['price_book_price_sgst'])) { echo $PROLST['price_book_price_sgst']; } ?>" type="text" class="quantity stock_text" />
              </td>
              <?php  } ?>
              
              <?php if($purchse_ord_igst == 1){ ?>
              <td>
              <input id="multiple_item_igst_percent_<?php echo $itemcount; ?>" onkeyup="return purchase_multiplepopuptotal(event, <?php echo $itemcount; ?>)" name="multiple_item_igst_percent[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['price_book_price_igst'])) { echo $PROLST['price_book_price_igst']; } ?>" type="text" class="quantity stock_text" />
              </td>
			  <?php  } ?>
              
			  <td>
              <input id="multiple_item_rate_<?php echo $itemcount; ?>" name="multiple_item_rate[<?php echo $itemcount; ?>]" readonly="readonly" type="text" class="quantity" value="" />
              </td>
              </tr>
              <?php $itemcount++; } ?>
            </tbody>
          </table>
        </div>
        </form>
      </div>
      <div class="clear"></div>
    </div>
</div>