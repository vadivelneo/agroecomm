<script type="text/javascript"> 
$(document).ready(function () {
	
	document.getElementById("single_item_popup_form").reset();
	
	$('#btnSave').click(function ()
	{
		var login_company_id = $("#login_company_id").val();
		var tax_value = $("#tax_value").val();
		
		
		var	search_lot = $("#search_lot").val();
		var	popup_item_id = $("#popup_item_id").val();
		var	popup_item_code = $("#popup_item_code").val();
		var	popup_item_name = $("#popup_item_name").val();
		var	popup_item_mfg_prtno = $("#popup_item_mfg_prtno").val();
		var	popup_item_priceperunit = $("#popup_item_priceperunit").val();
		var	popup_tax_percent = $("#popup_tax_percent").val();
		var	popup_item_tax_value = $("#popup_item_tax_value").val();
		var	popup_item_lot_no = $("#popup_item_lot_no").val();
		var	popup_item_scheme_id = $("#popup_item_scheme_id").val();
		var	popup_item_scheme_code = $("#popup_item_scheme_code").val();
		var	popup_item_product_mrp = $("#popup_item_product_mrp").val();
		
		var	search_product_type = $("#search_product_type").val();
		var	popup_item_uom_name  = $("#popup_item_uom_name").val();
		var	popup_item_uom_id  = $("#popup_item_uom_id").val();
		var	popup_item_qty = $("#popup_item_qty").val();
		var	popup_item_model = $("#popup_item_model").val();
		var	popup_item_percentage_discount = $("#popup_item_percentage_discount").val();
		var	popup_item_flat_discount = $("#popup_item_flat_discount").val();
		var	customer_tax_type = $("#customer_tax_type").val();
		var	popup_item_discount_amount = $("#popup_item_discount_amount").val();
		var	popup_item_flat_discount = $("#popup_item_flat_discount").val();
		
		if($("#popup_item_vat").val() != "")
		{
			var	popup_item_vat = $("#popup_item_vat").val();
		}
		else
		{
			var	popup_item_vat = 0.00;
		}
		
		if($("#popup_item_serv_tax").val() != "")
		{
			var	popup_item_serv_tax = $("#popup_item_serv_tax").val();
		}
		else
		{
			var	popup_item_serv_tax = 0.00;
		}
		
		if($("#popup_item_cst").val() != "")
		{
			var	popup_item_cst = $("#popup_item_cst").val();
		}
		else
		{
			var	popup_item_cst = 0.00;
		}
		
		if($("#popup_item_gst").val() != "")
		{
			var	popup_item_gst = $("#popup_item_gst").val();
		}
		else
		{
			var	popup_item_gst = 0.00;
		}
		
		if($("#popup_item_exc").val() != "")
		{
			var	popup_item_exc = $("#popup_item_exc").val();
		}
		else
		{
			var	popup_item_exc = 0.00;
		}
		
		var	popup_item_priceperunit = $("#popup_item_priceperunit").val();
		
		var popup_gross_amount = (parseFloat(popup_item_qty)) * (parseFloat(popup_item_priceperunit));
		
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
		
		var popup_item_discount_percent = popup_item_percentage_discount;
		
			
		if(jQuery.inArray(popup_item_id, myarray)==-1)
		{
			if(customer_tax_type == 'vat')
			{
				var item_tax_percent = (parseFloat(popup_item_vat)).toFixed(2);
			}
			else if(customer_tax_type == 'cst')
			{
				var item_tax_percent = (parseFloat(popup_item_cst)).toFixed(2);
			}
			
			var item_discount_amount =  parseFloat(popup_item_discount_amount) +  parseFloat(popup_item_flat_discount);

			var item_gross_amount_with_discount = parseFloat(popup_gross_amount)- parseFloat(item_discount_amount);
			
			var item_tax_amount = (item_gross_amount_with_discount * (isNaN(item_tax_percent) ? 0 : item_tax_percent) / 100).toFixed(2);
		
			var item_net_amount = ( (item_gross_amount_with_discount) + parseFloat(item_tax_amount)).toFixed(2);
			
			if(tax_value != 'nontaxable')
			{
			  var items ='<tr><td><a href="javascript:void(0);" id="item_code_value_'+counter+'">'+popup_item_code+'</a><input id="item_code_'+counter+'" name="item_code['+counter+']" value="'+popup_item_code+'" type="hidden" /><input id="item_id_'+counter+'" name="item_id['+counter+']" value="'+popup_item_id+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_mfg_prtno_value_'+counter+'">'+popup_item_mfg_prtno+'</a><input id="item_mfg_prtno_'+counter+'" name="item_mfg_prtno['+counter+']" value="'+popup_item_mfg_prtno+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_name_value_'+counter+'">'+popup_item_name+'</a><input id="item_name_'+counter+'" name="item_name['+counter+']" value="'+popup_item_name+'" type="hidden" /><input id="item_uom_id_'+counter+'" name="item_uom_id['+counter+']" type="hidden" value="'+popup_item_uom_id+'" /><input id="item_uom_name_'+counter+'" name="item_uom_name['+counter+']" type="hidden" value="'+popup_item_uom_name+'" /></td><td><a href="javascript:void(0);" >'+search_lot+'</a><input id="item_search_lot_'+counter+'" name="item_search_lot['+counter+']" value="'+search_lot+'" type="hidden" /></td><td><input id="item_priceperunit_'+counter+'" name="item_priceperunit['+counter+']" value="'+popup_item_priceperunit+'" type="text" class="quantity" onkeyup="return sales_items_grid_total(event, '+counter+')" /></td><td><input id="item_qty_'+counter+'" class="quantity stock_text" name="item_qty['+counter+']" value="'+popup_item_qty+'" type="text" onkeyup="return sales_items_grid_total(event, '+counter+')" /><input id="item_discount_percent_'+counter+'" name="item_discount_percent['+counter+']" value="'+popup_item_discount_percent+'" type="hidden" class="quantity stock_text" readonly="readonly" /><input id="item_flat_discount_'+counter+'" name="item_flat_discount['+counter+']" value="'+popup_item_flat_discount+'" type="hidden" class="quantity stock_text"  onkeyup="return sales_items_grid_total(event, '+counter+')" /><input id="item_discount_amount_'+counter+'" name="item_discount_amount['+counter+']" value="'+popup_item_discount_amount+'" type="hidden" class="quantity stock_text" readonly="readonly" /></td><td><input id="item_tax_percent_'+counter+'" name="item_tax_percent['+counter+']" value="'+popup_tax_percent+'" type="text" class="quantity stock_text" readonly="readonly" /><input id="item_vat_'+counter+'" name="item_vat['+counter+']" value="'+popup_item_vat+'" type="hidden" /><input id="item_gst_'+counter+'" name="item_gst['+counter+']" value="'+popup_item_gst+'" type="hidden" /><input id="item_cst_'+counter+'" name="item_cst['+counter+']" value="'+popup_item_cst+'" type="hidden" /><input id="item_serv_tax_'+counter+'" name="item_serv_tax['+counter+']" value="'+popup_item_serv_tax+'" type="hidden" /><input id="item_exc_'+counter+'" name="item_exc['+counter+']" value="'+popup_item_exc+'" type="hidden" /></td><td><input id="item_tax_amount_'+counter+'" name="item_tax_amount['+counter+']" value="'+popup_item_tax_value+'" type="text" class="quantity stock_text" readonly="readonly" /></td><td><input id="item_gross_amount_'+counter+'" name="item_gross_amount['+counter+']" value="'+popup_gross_amount+'" type="text" class="quantity stock_text" readonly="readonly" /><input id="item_net_amount_'+counter+'" name="item_net_amount['+counter+']" value="'+item_net_amount+'" type="hidden" class="quantity" readonly="readonly" /></td><td colspan="2"><div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_delete_'+counter+'" onclick="return itemsgridrowdelete('+counter+');" data-item="'+popup_item_id+'" data-delete="'+counter+'" title="Delete"><span class="icon-trash"></span></div></td></tr>';
			}
			
		 $('#disp_items').append(items);
		 $("#last_table_id").val(counter);
		 document.getElementById("single_item_popup_form").reset();
		 
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
						
						var item_tax_percent = (parseFloat(popup_item_vat)+parseFloat(popup_item_serv_tax)+parseFloat(popup_item_cst)+parseFloat(popup_item_gst)+parseFloat(popup_item_exc)).toFixed(2);
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
		calculatetotal();
	 
	});
	
	
});

function onchangegetitemspopup()
 {	
	var search_product_type = $('select#search_product_type').val();
	var search_product_group = $('select#search_product_group').val();
	var pricebook_id = $("#pricebook_id").val();
	 	$.ajax({
 		type: 'POST',
 		url: '<?php echo site_url('salespopup/onchangegetitemspopup'); ?>',
 		data: {product_type: search_product_type, product_group: search_product_group, pricebook:pricebook_id},
 		success: function(resp)
		{ 
			var myData = JSON.parse(resp);
			
			var items = myData.items;
			var partnumber = myData.partnumber;
			
			$('#popup_item_id').html(items);
			$('#popup_item_mfg_prtno').html(partnumber);
			$('#insert_items').find('input:text').val(''); 
 		}
		
	 });
}

function sales_getlotno()
{
	
	
	var search_lot = $("#search_lot").val();
	
	
	
	if(search_lot != "")
	{
		//alert(search_lot);
		//document.getElementById("single_item_popup_form").reset();
		
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('salespopup/sales_return_new_get_lot_value'); ?>',
			data: {search_lot:search_lot},
			success: function(resp) 
			{
				//alert(resp);
				var myData = JSON.parse(resp);
				
					
				var lot_no = myData.lot_no;
				var product_id = myData.product_id;
				var product_code = myData.product_code;
				var scheme_id = myData.scheme_id;
				var scheme_code = myData.scheme_code;
				var sku_name = myData.sku_name;
				var product_name = myData.product_name;
				var product_price = myData.product_price;
				var product_mrp = myData.product_mrp;
				var popup_tax_percent = myData.tax;
				var tax_amount = myData.tax_amount;
				
				
				var lot_created_by = myData.lot_created_by;
				var lot_updated_by = myData.lot_updated_by;
				var lot_created_date = myData.lot_created_date;
				var lot_updated_date = myData.lot_updated_date;
				
				$("#popup_item_id").val(product_id);
				$("#popup_item_code").val(product_code);
				$('#popup_item_name').val(product_name);
				$("#popup_item_mfg_prtno").val(sku_name);
				$("#popup_item_priceperunit").val(product_price);
				$('#popup_tax_percent').val(popup_tax_percent); 
				$('#popup_item_tax_value').val(tax_amount);
				
				$('#popup_item_lot_no').val(lot_no);
				$('#popup_item_scheme_id').val(scheme_id);
				$('#popup_item_scheme_code').val(scheme_code);
				$('#popup_item_product_mrp').val(product_mrp);
				
				
				
				
				/*$("#popup_item_vat").val(product_mrp);
				$("#popup_item_model").val(product_name);
				$('#popup_item_uom_name').val(sku_name);
				$('#popup_item_uom_id').val(scheme_code); 
				$("#popup_item_gst").val(tax);
				$("#popup_item_cst").val(tax_amount);
				$("#popup_item_serv_tax").val(lot_created_by);
				$("#popup_item_exc").val(lot_updated_by);
				$("#popup_item_percentage_discount").val(lot_updated_date);*/
				 
			}
		});
		return false;
	}
	else
	{
		return false;
	}
	
}

</script>
<script>




 // smart search for product code
  $("#popup_item_mfg_prtno").autocomplete({
      source: "<?php echo site_url('autocomplete/get_sales_return_product_code'); ?>", // name of controller followed by function
	autoFocus:true,
	appendTo: "#auto_complete_feild_0",
	select: function(event, ui) {
                           $('#popup_item_mfg_prtno').val(ui.item.sku);
						   //$('#productname').val(ui.item.name);
						  // $('#productidvalue').val(ui.item.skuid);
                           return false;
                       }
  });  
   
   





</script>
 

<div class="p-popup">

<form class="item_popup_blank" id="single_item_popup_form">
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
                        Lot No.
                    </label>
                </td>
                <td class="fieldValue medium">
                    <div class="row-fluid">
                        <span class="span10">
                        <div class="formError" id="search_product_typeError" style="margin-top: -30px;">
                                <div class="formErrorContent" id=popup_lot_id_content">This field is required</div>
                                <div class="formErrorArrow"></div>
                             </div>
                             <select name="search_lot" class="chzn-select" id="search_lot" onchange="sales_getlotno()" >
                                <option value="">Select Lot No.</option>
                                
                                <?php /*?> <?php if(isset($product_group) && !empty($product_group)) { foreach($product_group as $GROUP) { ?>
                                	<option value="<?php echo $GROUP['products_group_id']; ?>"><?php echo $GROUP['products_group_name']; ?></option>
                                <?php } } ?><?php */?>
                                
                                <?php if(isset($lot_id) && !empty($lot_id)) { foreach($lot_id as $LOT) { ?>
                                <option value="<?php echo $LOT['id']; ?>"><?php echo $LOT['lot_no']; ?></option>
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
                           <?php /*?><select name="popup_item_id" class="chzn-select" id="popup_item_id" >
                                <option value="">Select item</option>
                                <?php foreach($product_list as $PROLST) { ?>
                                <option value="<?php echo $PROLST['product_id']; ?>">
                                    <?php echo $PROLST['product_code']; ?>
                                </option>
                                <?php } ?>
                            </select><?php */?>
                              <input type="hidden" value="" name="popup_item_id" class="input-large numeric" id="popup_item_id"  readonly="readonly">
                              <input type="text" value="" name="popup_item_code" class="input-large numeric" id="popup_item_code"  readonly="readonly">
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
                            <?php /*?> <select name="popup_item_mfg_prtno" class="chzn-select" id="popup_item_mfg_prtno" onchange="sales_itemdetails_mfrnumber()" >
                                <option value="">Select Manfr.Part.No</option>
                                <?php foreach($product_list as $PROLST) { ?>
                                <option value="<?php echo $PROLST['product_mfr_part_number']; ?>" data-partid="<?php echo $PROLST['product_id']; ?>">
                                    <?php echo $PROLST['product_mfr_part_number']; ?>
                                </option>
                                <?php } ?>
                            </select><?php */?>
                             <input type="text" value="" name="popup_item_mfg_prtno" class="input-large" id="popup_item_mfg_prtno" >
                             <span id="auto_complete_feild_0"></span>
                        </span>
                     </div>
                </td>
				<td class="fieldLabel medium">
                    <label class="muted pull-right marginRight10px">
                        TAX %
                    </label>
                </td>
                <td class="fieldValue medium">
                    <div class="row-fluid">
                        <span class="span10">
                            <div class="formError" id="modelError" style="margin-top: -30px;">
                                <div class="formErrorContent" id="product_itemmodel_content">This field is required</div>
                                <div class="formErrorArrow"></div>
                             </div>
                             <input type="text" value="" id="popup_tax_percent" name="popup_tax_percent" class="input-large" readonly="readonly">
                             <input type="hidden" value="" id="popup_item_lot_no" name="popup_item_lot_no" class="input-large" readonly="readonly">
                             <input type="hidden" value="" id="popup_item_scheme_id" name="popup_item_scheme_id" class="input-large" readonly="readonly">
                             <input type="hidden" value="" id="popup_item_scheme_code" name="popup_item_scheme_code" class="input-large" readonly="readonly">
                             <input type="hidden" value="" id="popup_item_product_mrp" name="popup_item_product_mrp" class="input-large" readonly="readonly">
                            <input type="hidden" value="" id="popup_item_model" name="popup_item_model" class="input-large" readonly="readonly">
                             <input type="hidden" value="" id="popup_item_uom_name" name="popup_item_uom_name" class="input-large" readonly="readonly"> 
							  <input type="hidden" value="" id="popup_item_uom_id" name="popup_item_uom_id">
                               <input type="hidden" value="" name="popup_item_percentage_discount" class="input-large numeric" id="popup_item_percentage_discount" readonly="readonly">
                               <input type="hidden" value="" id="popup_item_flat_discount" name="popup_item_flat_discount" class="input-large numeric" onkeyup="return sales_popup_onkeyupfortotal(event)">
                                <input type="hidden" value="" id="popup_item_discount_amount" name="popup_item_discount_amount" class="input-large numeric" readonly="readonly">
 
                        </span>
                     </div>
                </td>
            	
                
          </tr>
          <tr>
				<td class="fieldLabel medium">
                    <label class="muted pull-right marginRight10px">Basic Rate</label>
                </td>
                <td class="fieldValue medium" >
                    <div class="row-fluid">
                        <span class="span10">
                            <div class="formError" id="product_itemusageunitError" style="margin-top: -30px;">
                                <div class="formErrorContent" id="product_itemusageunit_content">This field is required</div>
                                <div class="formErrorArrow"></div>
                             </div>
							  <input type="text" value="" name="popup_item_priceperunit" class="input-large numeric" id="popup_item_priceperunit" readonly="readonly">
                        </span>
                    </div>
                </td>
				
				<td class="fieldLabel medium">
                  <label class="muted pull-right marginRight10px">
                     Tax
                  </label>
              </td>
             
              <td class="fieldValue medium" >
                  <div class="row-fluid">
                      <span class="span10">
                          <div class="formError" id="product_item_vat_Error" style="margin-top: -30px;">
                              <div class="formErrorContent" id="product_item_vat_content">This field is required</div>
                              <div class="formErrorArrow"></div>
                           </div>
                          <input type="text" value="" name="popup_item_tax_value"  class="input-large numeric" id="popup_item_tax_value" readonly="readonly">
                      </span>
                  </div>
				</td>
            
          </tr> 
		  <tr>
				
				
			</tr>
            
            <tr>
				
			</tr>
            
			<tr>
				
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
                            <input type="text" value="" name="popup_item_qty" onkeyup="return sales_popup_onkeyupfortotal(event)" class="input-large numeric" id="popup_item_qty">
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