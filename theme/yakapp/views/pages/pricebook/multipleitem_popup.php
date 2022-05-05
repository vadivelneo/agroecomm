<script>
function popup_price_book_charge(check_box_val)
{
	
	var popup_item_incentive_rate = $("#multiple_item_incentive_rate_"+check_box_val).val();
	var popup_item_handling_charge = $("#multiple_item_handling_charge_"+check_box_val).val();
	var popup_item_selling_price = $("#multiple_item_selling_price_"+check_box_val).val();
	var	popup_item_cgst = $("#multiple_item_cgst_"+check_box_val).val();
	var	popup_item_sgst = $("#multiple_item_sgst_"+check_box_val).val();
	
	var popup_item_selling_total = ((parseFloat(popup_item_incentive_rate) * 30) / 100) + parseFloat(popup_item_handling_charge)  + parseFloat(popup_item_incentive_rate);
	var gst_tax = parseFloat(popup_item_cgst) + parseFloat(popup_item_sgst);
	var selling_price_tax = ((parseFloat(popup_item_selling_total)) * (parseFloat(gst_tax)) / 100) ;
	
	var selling_price_total = parseFloat(popup_item_selling_total) + parseFloat(selling_price_tax);
	
	$("#multiple_item_selling_price_"+check_box_val).val(popup_item_selling_total);
	$('#multiple_selling_price_with_tax_'+check_box_val).val(selling_price_total);
	
	
}

function price_book_charge(check_box_val)
{
	var item_incentive = $("#item_incentive_rate_"+check_box_val).val();
	var item_handling_charge = $("#item_handling_charge_"+check_box_val).val();
	var item_selling_price = $("#item_selling_price_"+check_box_val).val();
	var	item_cgst = $("#item_cgst_"+check_box_val).val();
	var	item_sgst = $("#item_sgst_"+check_box_val).val();
	
	var item_selling_total = (((parseFloat(item_incentive)) * 30) / 100) + (parseFloat(item_handling_charge))  + (parseFloat(item_incentive));
	var item_gst_tax = parseFloat(item_cgst) + parseFloat(item_sgst);
	var item_selling_price_tax = ((parseFloat(item_selling_total)) * (parseFloat(item_gst_tax)) / 100) ;
	
	var item_selling_price_total = parseFloat(item_selling_total) + parseFloat(item_selling_price_tax);
	
	$("#item_selling_price_"+check_box_val).val(item_selling_total);
	$('#item_selling_price_with_tax_'+check_box_val).val(item_selling_price_total);
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
						
						var	popup_item_product_mrp = $("#multiple_item_mrp_"+check_box_val).val();
						var popup_item_incentive_rate = $("#multiple_item_incentive_rate_"+check_box_val).val();
						var popup_item_handling_charge = $("#multiple_item_handling_charge_"+check_box_val).val();
						var popup_item_selling_price = $("#multiple_item_selling_price_"+check_box_val).val();
		
						var	popup_item_id = $("#multiple_item_id_"+check_box_val).val();
						var	popup_item_code = $("#multiple_item_code_"+check_box_val).val();
						var	popup_item_name = $("#multiple_item_name_"+check_box_val).val();
						var	popup_item_uom_name  = $("#multiple_item_uom_name_"+check_box_val).val();
						var	popup_item_uom_id  = $("#multiple_item_uom_id_"+check_box_val).val();
						var	popup_item_qty = $("#multiple_item_qty_"+check_box_val).val();
						var	popup_item_model = $("#multiple_item_mfg_prtno_"+check_box_val).val();
						var	popup_item_mfg_prtno = $("#multiple_item_mfg_prtno_"+check_box_val).val();
						var	popup_item_discount_amount = $("#multiple_item_discount_amount_"+check_box_val).val();
						var	popup_item_damage_discount = $("#item_damage_discount_percentage_"+check_box_val).val();
						
						var	popup_selling_price_with_tax = $("#multiple_selling_price_with_tax_"+check_box_val).val();
												
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
						
						if($("#multiple_item_cgst_"+check_box_val).val() != "")
						{
							var	popup_item_cgst = $("#multiple_item_cgst_"+check_box_val).val();
						}
						else
						{
							var	popup_item_cgst = 0.00;
						}
						
						if($("#multiple_item_sgst_"+check_box_val).val() != "")
						{
							var	popup_item_sgst = $("#multiple_item_sgst_"+check_box_val).val();
						}
						else
						{
							var	popup_item_sgst = 0.00;
						}
						
						if($("#multiple_item_igst_"+check_box_val).val() != "")
						{
							var	popup_item_igst = $("#multiple_item_igst_"+check_box_val).val();
						}
						else
						{
							var	popup_item_igst = 0.00;
						}
						
						if($("#multiple_item_hsn_sac_"+check_box_val).val() != "")
						{
							var	popup_item_hsn_sac = $("#multiple_item_hsn_sac_"+check_box_val).val();
						}
						else
						{
							var	popup_item_hsn_sac = 0.00;
						}
						
						
						if($("#multiple_item_exc_"+check_box_val).val() != "")
						{
							var	popup_item_exc = $("#multiple_item_exc_"+check_box_val).val();
						}
						else
						{
							var	popup_item_exc = 0.00;
						}
						
						if($("#multiple_item_discount_percentage_"+check_box_val).val() != "")
						{
							var	popup_item_discount_percent = $("#multiple_item_discount_percentage_"+check_box_val).val();
						}
						else
						{
							var	popup_item_discount_percent = 0.00;
						}
		
						var	table_count = $("#last_table_id").val();
						var	counter = parseInt(table_count)+ 1;
						
						if(jQuery.inArray(popup_item_id,old_items)==-1)	
						{
								
							  var items ='<tr><td><a href="javascript:void(0);" id="item_code_value_'+counter+'">'+popup_item_code+'</a><input id="item_code_'+counter+'" name="item_code['+counter+']" value="'+popup_item_code+'" type="hidden" /><input id="item_id_'+counter+'" name="item_id['+counter+']" value="'+popup_item_id+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_mfg_prtno_value_'+counter+'">'+popup_item_mfg_prtno+'</a><input id="item_mfg_prtno_'+counter+'" name="item_mfg_prtno['+counter+']" value="'+popup_item_mfg_prtno+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_name_value_'+counter+'">'+popup_item_name+'</a><input id="item_name_'+counter+'" name="item_name['+counter+']" value="'+popup_item_name+'" type="hidden" /><input id="item_uom_id_'+counter+'" name="item_uom_id['+counter+']" type="hidden" value="'+popup_item_uom_id+'" /><td><input id="item_incentive_rate_'+counter+'" name="item_incentive_rate['+counter+']" value="'+popup_item_incentive_rate+'" onkeyup="return price_book_charge('+counter+')" type="text" class="quantity" /></td><td><input id="item_handling_charge_'+counter+'" name="item_handling_charge['+counter+']" onkeyup="return price_book_charge('+counter+')" value="'+popup_item_handling_charge+'" type="text" class="quantity" /></td></td><td><input id="item_selling_price_'+counter+'" name="item_selling_price['+counter+']" value="'+popup_item_selling_price+'" type="text" class="quantity" /></td><td><input id="item_mrp_'+counter+'" name="item_mrp['+counter+']" value="'+popup_item_product_mrp+'" type="text" class="quantity" /></td><td><input id="item_discount_percentage_'+counter+'" name="item_discount_percentage['+counter+']" value="'+popup_item_discount_percent+'" type="text" class="quantity stock_text" /></td><td><input id="item_cgst_'+counter+'" name="item_cgst['+counter+']" onkeyup="return price_book_charge('+counter+')" value="'+popup_item_cgst+'" type="text" class="quantity stock_text" /></td><td><input id="item_sgst_'+counter+'" onkeyup="return price_book_charge('+counter+')" name="item_sgst['+counter+']" value="'+popup_item_sgst+'" type="text" class="quantity stock_text" /></td><td><input id="item_igst_'+counter+'" name="item_igst['+counter+']" onkeyup="return price_book_charge('+counter+')" value="'+popup_item_igst+'" type="text" class="quantity stock_text" /></td><td><input id="item_hsn_sac_'+counter+'" name="item_hsn_sac['+counter+']" value="'+popup_item_hsn_sac+'" type="text" class="quantity stock_text" /></td><td><input id="item_selling_price_with_tax_'+counter+'" name="item_selling_price_with_tax['+counter+']" value="'+popup_selling_price_with_tax+'" type="text" class="quantity stock_text" /></td></tr>';
							 $('#disp_items').append(items);
							 $("#last_table_id").val(counter);
							
							 $("#checkbox"+check_box_val).prop("checked", false);
						}
					}
				}
				else
				{
					$("#multiple_item_qty_"+check_box_val).val("");
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
			//$('#btnmultipleSave').addClass("close");
		}
				
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
	
</script>
<script type="text/javascript">
function multiple_pricebook_itmesearch()
	{
		
		   var pricebook_id = $("#pricebook_id").val();
           var search_product_type = $("#search_multiple_product_type").val();
		   var search_product_group = $("#search_multiple_product_group").val();
		   var search_item_code = $("#search_multiple_item_code").val();
		   var search_item_name = $("#search_multiple_item_name").val();
		   var search_item_mfg_prtno = $("#search_multiple_item_mfg_prtno").val();
		   
		   $.ajax({
			type: 'POST',
			url: '<?php echo site_url('pricebook/multiplesearchitemdetails'); ?>',
			data: {pricebook: pricebook_id, product_type: search_product_type, product_group: search_product_group, item_code: search_item_code, item_name: search_item_name, item_mfg_prtno: search_item_mfg_prtno},
			success: function(resp)
			{ 
				$('#multiple_items').html(resp);
			}
		 });
	 
   
		
	}

</script>

<div class="p-popup">
  <a class="close"><img src="<?php echo base_url(); ?>/resources/images/close-button.png" width="25" /></a>
  
  <div>
  <div class="title_head">
  <p>Search Products</p>
  </div>
      <table>
      	<tr>	
				<td>
            	SKU :
            <br /><br />
            	<input type="text" 	value="" name="search_multiple_item_mfg_prtno" onkeyup="multiple_pricebook_itmesearch()" class="input-large" id="search_multiple_item_mfg_prtno">
            </td>
        	<!--<td>
            	Product Type :
                <br /><br />
                <select	name="search_multiple_product_type" class="chzn-select" id="search_multiple_product_type">
                    <option value="">Select Product Type</option>
                    <?php if(isset($product_type) && !empty($product_type)) { foreach($product_type as $TYPE) { ?>
                    <option value="<?php echo $TYPE['products_type_id']; ?>"><?php echo $TYPE['products_type_name']; ?></option>
                    <?php } } ?>
                </select>
            </td>-->
          <!--  <td>
            	Product Group :
            <br /><br />
            	<select name="search_multiple_product_group" class="chzn-select" id="search_multiple_product_group" >
                    <option value="">Select Product Group</option>
                    <?php if(isset($product_group) && !empty($product_group)) { foreach($product_group as $GROUP) { ?>
                    <option value="<?php echo $GROUP['products_group_id']; ?>"><?php echo $GROUP['products_group_name']; ?></option>
                    <?php } } ?>
                </select>
            </td>-->
            <td>
            	Item Code :
            <br /><br />
            	<input type="text" 	value="" name="search_multiple_item_code" onkeyup="multiple_pricebook_itmesearch()" class="input-large" id="search_multiple_item_code">
            </td>
            <td>
            	Item Description :
            <br /><br />
            	<input type="text" 	value="" name="search_multiple_item_name" onkeyup="multiple_pricebook_itmesearch()" class="input-large" id="search_multiple_item_name">
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
                    <th>HSN/SAC</th>
                    <th>Item Description</th>
					<th>Incentive Rate</th>
					<th>Handling Charges</th>
                    <th>Selling Price</th>
                    <th>MRP</th>
                    <th>Discount(%)</th>	
                   
                    <th>CGST (%)</th>	
                    <th>SGST (%)</th>
                    <th>IGST (%)</th>
                    <th>Selling Price with tax</th>
                 </tr>
            </thead>
            <tbody  id="multiple_items">
                    <?php
                    //echo "<pre>";
					//print_r($product_list);
                    if(!empty($product_list))
                    {
                        $itemcount = 1; 
                        foreach($product_list as $PROLST) 
                        { 
                        ?>
                    <tr>
                    	
              			<td class="checkbox"><input type="checkbox" class="itemcheckbox" id="checkbox<?php echo $itemcount; ?>" value="<?php echo $itemcount; ?>" name="item_check[]"></td>
                        <td>
                            <?php if(isset($PROLST['product_code'])) { echo $PROLST['product_code']; } ?>
                            <input id="multiple_item_id_<?php echo $itemcount; ?>" name="multiple_item_id[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['product_id'])) { echo $PROLST['product_id']; } ?>" type="hidden" />
                            <input id="multiple_item_code_<?php echo $itemcount; ?>" name="multiple_item_code[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['product_code'])) { echo $PROLST['product_code']; } ?>" type="hidden" />
                        </td>
                        <td>
                            <?php if(isset($PROLST['product_mfr_part_number'])) { echo $PROLST['product_mfr_part_number']; } ?>
                             <input id="multiple_item_mfg_prtno_<?php echo $itemcount; ?>" name="multiple_item_mfg_prtno[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['product_mfr_part_number'])) { echo $PROLST['product_mfr_part_number']; } ?>" />
                        </td>
                        <td>
                        <?php if(isset($PROLST['product_hsn_sac'])) { echo $PROLST['product_hsn_sac']; } ?>
                            <input id="multiple_item_hsn_sac_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_hsn_sac[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['product_hsn_sac'])) { echo $PROLST['product_hsn_sac']; } ?>" />
                        </td>
                        <td>
                            <?php if(isset($PROLST['product_name'])) { echo $PROLST['product_name']; } ?>
                            <input id="multiple_item_name_<?php echo $itemcount; ?>" name="multiple_item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['product_name'])) { echo $PROLST['product_name']; } ?>" type="hidden" />
                            <input id="multiple_item_uom_id_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_uom_id[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['product_stock_uom_id'])) { echo $PROLST['product_stock_uom_id']; } ?>" />
                        </td>
						<td>
                            <input id="multiple_item_incentive_rate_<?php echo $itemcount; ?>" class="quantity" name="multiple_item_incentive_rate[<?php echo $itemcount; ?>]" onkeyup="return popup_price_book_charge(<?php echo $itemcount; ?>)" type="text" value="" />
                        </td>
						<td>
                            <input id="multiple_item_handling_charge_<?php echo $itemcount; ?>" onkeyup="return popup_price_book_charge(<?php echo $itemcount; ?>)" class="quantity" name="multiple_item_handling_charge[<?php echo $itemcount; ?>]" type="text" value="" />
                        </td>
                        <td>
                            <input id="multiple_item_selling_price_<?php echo $itemcount; ?>" class="quantity" name="multiple_item_selling_price[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($PROLST['product_selling'])) { echo $PROLST['product_selling']; } ?>" />
                        </td>
                        <td>
                            <input id="multiple_item_mrp_<?php echo $itemcount; ?>" class="quantity" name="multiple_item_mrp[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($PROLST['product_mrp'])) { echo $PROLST['product_mrp']; } ?>" />
                        </td>
                        <td>
                            <input id="multiple_item_discount_percentage_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_discount_percentage[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($PROLST['product_discounts'])) { echo $PROLST['product_discounts']; } ?>" />
                        </td>
                       
                        <td>
                            <input id="multiple_item_cgst_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_cgst[<?php echo $itemcount; ?>]" type="text" onkeyup="return popup_price_book_charge(<?php echo $itemcount; ?>)" value="<?php if(isset($PROLST['product_cgst_tax'])) { echo $PROLST['product_cgst_tax']; } ?>" />
                        </td>
                        <td>
                            <input id="multiple_item_sgst_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_sgst[<?php echo $itemcount; ?>]" type="text" onkeyup="return popup_price_book_charge(<?php echo $itemcount; ?>)" value="<?php if(isset($PROLST['product_sgst_tax'])) { echo $PROLST['product_sgst_tax']; } ?>" />
                        </td>
                        <td>
                            <input id="multiple_item_igst_<?php echo $itemcount; ?>" class="quantity stock_text" name="multiple_item_igst[<?php echo $itemcount; ?>]" type="text" onkeyup="return popup_price_book_charge(<?php echo $itemcount; ?>)" value="<?php if(isset($PROLST['product_igst_tax'])) { echo $PROLST['product_igst_tax']; } ?>" />
                        </td>
                        <td>
						<input id="multiple_selling_price_with_tax_<?php echo $itemcount; ?>" readonly class="quantity stock_text" name="multiple_selling_price_with_tax[<?php echo $itemcount; ?>]" type="text" value="" />
									 
								</td>
                       
                    </tr>
                <?php 
                $itemcount++; 
                } 
              }
             ?>
            </tbody>
        </table>
        </div>
        </form>
      </div>
      <div class="clear"></div>
    </div>
</div>