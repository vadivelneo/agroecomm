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
		var	popup_item_discount_amount = $("#popup_item_discount_amount").val();
		var	popup_item_product_mrp = $("#popup_item_product_mrp").val();
		var popup_item_selling_price = $("#popup_item_selling_price").val();
		
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
		
		if($("#popup_item_discount").val() != "")
		{
			var	popup_item_discount_percent = $("#popup_item_discount").val();
		}
		else
		{
			var	popup_item_discount_percent = 0.00;
		}
		
		if($("#popup_item_discount_amount").val() != "")
		{
			var	popup_item_discount_amount = $("#popup_item_discount_amount").val();
		}
		else
		{
			var	popup_item_discount_amount = 0.00;
		}

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
		
		
		
		if(popup_item_product_mrp == "") 
		{
			$('#popup_item_product_mrp').focus();
			$('#popup_item_product_mrp_Error').show();
			return false;
		}
		else
		{
			$('#popup_item_product_mrp_Error').hide();
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
			var items ='<tr><td><a href="javascript:void(0);" id="item_code_value_'+counter+'">'+popup_item_code+'</a><input id="item_code_'+counter+'" name="item_code['+counter+']" value="'+popup_item_code+'" type="hidden" /><input id="item_id_'+counter+'" name="item_id['+counter+']" value="'+popup_item_id+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_mfg_prtno_value_'+counter+'">'+popup_item_mfg_prtno+'</a><input id="item_mfg_prtno_'+counter+'" name="item_mfg_prtno['+counter+']" value="'+popup_item_mfg_prtno+'" type="hidden" /></td><td><a href="javascript:void(0);" id="item_name_value_'+counter+'">'+popup_item_name+'</a><input id="item_name_'+counter+'" name="item_name['+counter+']" value="'+popup_item_name+'" type="hidden" /><input id="item_uom_id_'+counter+'" name="item_uom_id['+counter+']" type="hidden" value="'+popup_item_uom_id+'" /></td><td><input id="item_selling_price_'+counter+'" name="item_selling_price['+counter+']" value="'+popup_item_selling_price+'" type="text" class="quantity" /></td><td><input id="item_mrp_'+counter+'" name="item_mrp['+counter+']" value="'+popup_item_product_mrp+'" type="text" class="quantity" /></td><td><input id="item_discount_percentage_'+counter+'" name="item_discount_percentage['+counter+']" value="'+popup_item_discount_percent+'" type="text" class="quantity stock_text" /></td><td><input id="item_discount_amount_'+counter+'" name="item_discount_amount['+counter+']" value="'+popup_item_discount_amount+'" type="text" class="quantity stock_text" /></td><td><input id="item_vat_'+counter+'" name="item_vat['+counter+']" value="'+popup_item_vat+'" type="text" class="quantity stock_text" /></td><td><input id="item_gst_'+counter+'" name="item_gst['+counter+']" value="'+popup_item_gst+'" type="text" class="quantity stock_text" /></td><td><input id="item_cst_'+counter+'" name="item_cst['+counter+']" value="'+popup_item_cst+'" type="text" class="quantity stock_text" /></td><td><input id="item_ser_tax_'+counter+'" name="item_ser_tax['+counter+']" value="'+popup_item_serv_tax+'" type="text" class="quantity stock_text" /></td><td><input id="item_exc_'+counter+'" name="item_exc['+counter+']" value="'+popup_item_exc+'" type="text" class="quantity stock_text" /></td></tr>';
		
		 	$('#disp_items').append(items);
		 	$("#last_table_id").val(counter);
		 	document.getElementById("frmCadastre").reset();
		 
		}
	});
	
	
});



function getitemname()
{
 	var popup_item_id = $('select#popup_item_id').val();

 	$.ajax({
 		type: 'POST',
 		url: '<?php echo site_url('pricebook/getitemdetails'); ?>',
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
			var product_vat_tax = myData.product_vat_tax;
			var product_gst_tax = myData.product_gst_tax;
			var product_cst_tax = myData.product_cst_tax;
			var product_service_tax = myData.product_service_tax;
			var product_excise_duty_tax = myData.product_excise_duty_tax;
			var product_selling = myData.product_selling;
			var product_mrp = myData.product_mrp;
			var product_discounts = myData.product_discounts;
			
			
			$("#popup_item_code").val(product_code);
		 	$('#popup_item_name').val(product_name);
			$('#popup_item_uom_id').val(uom_id); 
 			$('#popup_item_uom_name').val(uom_name);
			$("#popup_item_model").val(product_model_number);
			$("#popup_item_mfg_prtno").val(product_mfr_part_number);
			$("#popup_item_vat").val(product_vat_tax);
			$("#popup_item_gst").val(product_gst_tax);
			$("#popup_item_cst").val(product_cst_tax);
			$("#popup_item_serv_tax").val(product_service_tax);
			$("#popup_item_exc").val(product_excise_duty_tax);
			$("#popup_item_discount").val(product_discounts);
			$("#popup_item_selling_price").val(product_selling);
			$("#popup_item_product_mrp").val(product_mrp);
			 
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
 		url: '<?php echo site_url('pricebook/onchangegetitemspopup'); ?>',
 		data: {product_type: search_product_type, product_group: search_product_group},
 		success: function(resp)
		{ 
			$('#popup_item_id').html(resp);
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
                           <select name="popup_item_id" class="chzn-select" id="popup_item_id" onchange="getitemname()" >
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
                            <input type="text" value="" id="popup_item_mfg_prtno" name="popup_item_mfg_prtno" class="input-large" readonly="readonly">
                        </span>
                     </div>
                </td>
				<td class="fieldLabel medium">
                    <label class="muted pull-right marginRight10px">
                       Model No
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
                     Vat
                  </label>
              </td>
              <td class="fieldValue medium" >
                  <div class="row-fluid">
                      <span class="span10">
                          <div class="formError" id="product_item_vat_Error" style="margin-top: -30px;">
                              <div class="formErrorContent" id="product_item_vat_content">This field is required</div>
                              <div class="formErrorArrow"></div>
                           </div>
                          <input type="text" value="" name="popup_item_vat"  class="input-large numeric" id="popup_item_vat">
                      </span>
                  </div>
				</td>
          </tr>
          <tr>
				
				
				<td class="fieldLabel medium">
                    <label class="muted pull-right marginRight10px">
                        Service Tax
                    </label>
                </td>
                <td class="fieldValue medium">
                    <div class="row-fluid">
                        <span class="span10">
                            <div class="formError" id="item_serv_taxError" style="margin-top: -30px;">
                                <div class="formErrorContent" id="item_serv_taxcontent">This field is required</div>
                                <div class="formErrorArrow"></div>
                             </div>
                            <input type="text" value="" id="popup_item_serv_tax" name="popup_item_serv_tax" class="input-large numeric">
                        </span>
                     </div>
                </td>
				<td class="fieldLabel medium">
                    <label class="muted pull-right marginRight10px">
                        CST
                    </label>
                </td>
                <td class="fieldValue medium">
                    <div class="row-fluid">
                        <span class="span10">
                            <div class="formError" id="item_cstError" style="margin-top: -30px;">
                                <div class="formErrorContent" id="product_item_cst_content">This field is required</div>
                                <div class="formErrorArrow"></div>
                             </div>
                            <input type="text" value="" id="popup_item_cst" name="popup_item_cst" class="input-large numeric">
                        </span>
                     </div>
                </td>
				
             
          </tr>
		  <tr>
				
				<td class="fieldLabel medium">
                  <label class="muted pull-right marginRight10px">
                     GST 
                  </label>
              </td>
              <td class="fieldValue medium" >
                  <div class="row-fluid">
                      <span class="span10">
                          <div class="formError" id="product_item_gst_Error" style="margin-top: -30px;">
                              <div class="formErrorContent" id="product_item_gst_content">This field is required</div>
                              <div class="formErrorArrow"></div>
                           </div>
                          <input type="text" value="" name="popup_item_gst"  class="input-large numeric" id="popup_item_gst">
                      </span>
                  </div>
				</td>
				<td class="fieldLabel medium">
                  <label class="muted pull-right marginRight10px">
                     Excise Duty 
                  </label>
              </td>
              <td class="fieldValue medium" >
                  <div class="row-fluid">
                      <span class="span10">
                          <div class="formError" id="product_item_excError" style="margin-top: -30px;">
                              <div class="formErrorContent" id="product_item_exc_content">This field is required</div>
                              <div class="formErrorArrow"></div>
                           </div>
                          <input type="text" value="" name="popup_item_exc"  class="input-large numeric" id="popup_item_exc">
                      </span>
                  </div>
				</td>
				
             
          </tr>
		  <tr>
				
				<td class="fieldLabel medium">
                    <label class="muted pull-right marginRight10px">
                        Discount
                    </label>
                </td>
                <td class="fieldValue medium">
                    <div class="row-fluid">
                        <span class="span10">
                            <div class="formError" id="item_discountError" style="margin-top: -30px;">
                                <div class="formErrorContent" id="item_discountontent">This field is required</div>
                                <div class="formErrorArrow"></div>
                             </div>
                            <input type="text" value="" id="popup_item_discount" name="popup_item_discount" class="input-large numeric">
                        </span>
                     </div>
                </td>
				<td class="fieldLabel medium">
                  <label class="muted pull-right marginRight10px">
                      Selling Price:
                  </label>
				</td>
				<td class="fieldValue medium" >
                  <div class="row-fluid">
                      <span class="span10">
                          <div class="formError" id="product_item_priceperunit_Error" style="margin-top: -30px;">
                              <div class="formErrorContent" id="product_item_priceperunit_content">This field is required</div>
                              <div class="formErrorArrow"></div>
                           </div>
                          <input type="text" value="" name="popup_item_selling_price" class="input-large numeric" id="popup_item_selling_price">
                      </span>
                  </div>
				</td>

			</tr>
			<tr>
				
				
				<td class="fieldLabel medium">
                    <label class="muted pull-right marginRight10px">
                        MRP
                    </label>
                </td>
                <td class="fieldValue medium">
                    <div class="row-fluid">
                        <span class="span10">
                            <div class="formError" id="item_qtyError" style="margin-top: -30px;">
                                <div class="formErrorContent" id="product_itemqty_content">This field is required</div>
                                <div class="formErrorArrow"></div>
                             </div>
                            <input type="text" value="" name="popup_item_product_mrp" class="input-large numeric" id="popup_item_product_mrp">
                        </span>
                     </div>
                 </td>
				 <td class="fieldLabel medium">
                    <label class="muted pull-right marginRight10px">
                        Discount %
                    </label>
                </td>
                <td class="fieldValue medium" >
                    <div class="row-fluid">
                        <span class="span10">
                            <div class="formError" id="itemrate_Error" style="margin-top: -30px;">
                                <div class="formErrorContent" id="product_itemrate_content">This field is required</div>
                                <div class="formErrorArrow"></div>
                             </div>
                            <input type="text" 	value="" name="popup_item_discount_amount" class="input-large numeric" id="popup_item_discount_amount">
                        </span>
                    </div>
                </td>
			</tr>
			<tr>
			
			
				
			</tr>
        </tbody>
        
    </table>
    </form>           
                
</div>