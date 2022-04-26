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
						var	popup_po_items_id = $("#multiple_po_items_id_"+check_box_val).val();
						
						
						
						var	table_count = $("#last_table_id").val();
						var	counter = parseInt(table_count)+ 1;
						
						var	popoup_old_items = 1;
						
						if(popoup_old_items == 1)	
						{
							
							var items =' <tr><td><a href="javascript:void(0);" >'+popup_item_mfg_prtno+'</a><input name="item_id['+counter+']" value="'+popup_item_id+'" type="hidden" /><input name="item_code['+counter+']" value="'+popup_item_code+'" type="hidden" /><input name="sno_id['+counter+']" value="'+popup_po_items_id+'" type="hidden" /><input name="item_mfg_prtno['+counter+']" value="'+popup_item_mfg_prtno+'" type="hidden" /></td><td><a href="javascript:void(0);" >'+popup_item_name+'</a><input name="item_name['+counter+']" value="'+popup_item_name+'" type="hidden" /></td><td><a href="javascript:void(0);" >'+popup_item_hsn_sac+'</a><input name="item_name_hsn_sac['+counter+']" value="'+popup_item_hsn_sac+'" type="hidden" /></td><td><input id="item_control_no_['+counter+']" name="item_control_no['+counter+']" class="quantity stock_text"   value="" type = "text"  /></td><td><input id="item_batch_no_['+counter+']" name="item_batch_no['+counter+']" value="" class="quantity stock_text" type="text" /></td><td><input id="item_expiry_date_['+counter+']" name="item_expiry_date['+counter+']" value="" class="quantity datepicker" onmouseover="return onkeyupfordate('+counter+')" type="text" /></td><td><input id="item_pack_size_['+counter+']" name="item_pack_size['+counter+']" value="" class="quantity stock_text" type="text" /></td><td><input name="UOM_id['+counter+']" type="hidden" value="'+popup_item_uom_id+'" /><input name="UOM_name['+counter+']" type="hidden" value="'+popup_item_uom_name+'"  /><a href="javascript:void(0);" >'+popup_item_uom_name+'</a></td><td><input id="item_brand_['+counter+']" name="item_brand['+counter+']" value="" class="quantity stock_text" type="text" /></td><td><input id="item_price_'+counter+'" name="item_price['+counter+']" value="" class="quantity stock_text" onkeyup="calc_price('+counter+')" type="text"></td><td><input id="ordered_qty_'+counter+'" name="ordered_qty['+counter+']" onkeyup="return onkeyupfortotal('+counter+')" value="'+popup_item_qty+'" type="text"  class="quantity1 quantity build_qty" /></td><td><input id="build_qty_'+counter+'" name="build_qty['+counter+']" value="" type="text" class="quantity1 quantity build_qty" /></td><td><input id="received_qty_'+counter+'" name="received_qty['+counter+']" onkeyup="return onkeyupfortotal('+counter+')" value="" type="text" class="quantity1 quantity received_qty" /></td><td><input id="pending_qty_'+counter+'" readonly="" name="pending_qty['+counter+']" value="" class="quantity pending_qty"  type="text" /></td><td><input id="extra_qty_'+counter+'" readonly="" name="extra_qty['+counter+']" value="" class="quantity pending_qty"  type="text" /></td><td><input id="item_total_price_'+counter+'" name="item_total_price['+counter+']" value="" class="quantity stock_text" readonly="readonly" type="text"></td><td><input id="item_remark_'+counter+'"  name="item_remark['+counter+']" value="" class="input-large nameField"  type="text" /></td></tr>';
					
							//alert(items);
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
	
	
	$('#multipleitmesearch').click(function(){
		   
		   var poindent_po_oder_id = $('#poindent_po_oder_id').val();			
		   var search_item_code = $("#search_multiple_item_code").val();
		   var search_item_name = $("#search_multiple_item_name").val();
		   var search_item_mfg_prtno = $("#search_multiple_item_mfg_prtno").val();

		   $.ajax({
			type: 'POST',
			url: '<?php echo site_url('purchasepopup/gr_multiplesearchitemdetails'); ?>',
			data: {item_code: search_item_code, item_name: search_item_name, item_mfg_prtno: search_item_mfg_prtno,poindent_po_oder_id : poindent_po_oder_id},
			success: function(resp)
			{ 
				//alert(resp);
				$('#multiple_item_popup').html(resp);
			}
		 });
	 
    });
	
	
});


$(document).ready(function(){

	var poindent_po_oder_id = $('#poindent_po_oder_id').val();
	//alert(poindent_po_oder_id);
  // smart search for multiple item code in purchase
  $("#search_multiple_item_code").autocomplete({
	 
    source: "<?php echo site_url('purchasepopup/get_po_item_code'); ?>?poindent_po_oder_id=" + poindent_po_oder_id, // name of controller followed by function
	autoFocus:true,
	appendTo: "#auto_complete_item_code",
  });
  
   // smart search for multiple item partnumber in purchase
  $("#search_multiple_item_mfg_prtno").autocomplete({
    source: "<?php echo site_url('purchasepopup/get_po_item_partnumber'); ?>?poindent_po_oder_id=" + poindent_po_oder_id, // name of controller followed by function
	autoFocus:true,
	appendTo: "#auto_complete_item_partnumber",
  });
  
   // smart search for multiple item name in purchase
   $("#search_multiple_item_name").autocomplete({
    source: "<?php echo site_url('purchasepopup/get_po_item_name'); ?>?poindent_po_oder_id=" + poindent_po_oder_id, // name of controller followed by function
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
            	Item Code :
            	<br /><br />
            	<input type="text" 	value="" name="search_multiple_item_code" autocomplete="off" class="input-large" id="search_multiple_item_code">
                <span id="auto_complete_item_code"></span>
            </td>
            <td>
            	SKU :
            	<br /><br />
            	<input type="text" 	value="" name="search_multiple_item_mfg_prtno" autocomplete="off" class="input-large" id="search_multiple_item_mfg_prtno">
                <span id="auto_complete_item_partnumber"></span>
            </td>
            <td>
            	Item :
            	<br /><br />
            	<input type="text" 	value="" name="search_multiple_item_name" autocomplete="off" class="input-large" id="search_multiple_item_name">
                <span id="auto_complete_item_name"></span>
            </td>
            <td>
            	<a href="#" id="multipleitmesearch" class="btn-success">Search</a>
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
                <th>UOM</th>
                <th>Quantity</th>
			 </tr>
            </thead>
            <?php //echo "<pre>"; print_r($product_list);   echo "<pre>"; echo $poindent_po_oder_id; exit; 
			?>
            <tbody id="multiple_item_popup">
            <input id="poindent_po_oder_id" name="poindent_po_oder_id" type="hidden" value="<?php echo $poindent_po_oder_id;  ?>" />
             <?php $itemcount = 1; foreach($product_list as $PROLST) { ?>
              <tr>
              <td class="checkbox"><input type="checkbox" class="itemcheckbox" id="checkbox<?php echo $itemcount; ?>" value="<?php echo $itemcount; ?>" name="item_check[]"></td>
              <td>
              <?php if(isset($PROLST['product_code'])) { echo $PROLST['product_code']; } ?>
              <input id="multiple_item_id_<?php echo $itemcount; ?>" name="multiple_item_id[<?php echo $itemcount; ?>]" value="<?php echo $PROLST['product_id']; ?>" type="hidden" />
              <input id="multiple_item_code_<?php echo $itemcount; ?>" name="multiple_item_code[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['product_code'])) { echo $PROLST['product_code']; } ?>" type="hidden" />
               <input id="multiple_po_items_id_<?php echo $itemcount; ?>" name="multiple_po_items_id[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['po_items_id'])) { echo $PROLST['po_items_id']; } ?>" type="hidden" />
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
             <?php if(isset($PROLST['uom_name'])) { echo $PROLST['uom_name'];  } ?> 
              <input id="multiple_item_uom_id_<?php echo $itemcount; ?>" name="multiple_item_uom_id[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['uom_id'])) { echo $PROLST['uom_id']; } ?>" />
              <input id="multiple_item_uom_name_<?php echo $itemcount; ?>" name="multiple_item_uom_name[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['uom_name'])) { echo $PROLST['uom_name']; } ?>" />
              </td>
              
              <td>
              <input id="multiple_item_qty_<?php echo $itemcount; ?>" onkeyup="return purchase_multiplepopuptotal(event, <?php echo $itemcount; ?>)" name="multiple_item_qty[<?php echo $itemcount; ?>]" type="text" class="quantity stock_text" value="" />
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