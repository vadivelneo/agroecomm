<script type="text/javascript"> 
$(document).ready(function () {
	
	$(".itemcheckbox").prop("checked", false);
	
	$('#btnmultipleSave').click(function ()
	{
		var myarray = [];
		
		$('input[name^="grid_item_id"]').each(function()
		{
			var old_item_id = $(this).val();
			myarray.push(old_item_id);
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
					var Qtyval = $("#quantity"+check_box_val).val();
					 
					if(Qtyval == "")
					{
						exitMultipleItemsInsert = check_box_val;
                      	return false;
					}
					else
					{
						$("#multiple_item_error").css('display','none');
						
						var item_id = $("#item_id"+check_box_val).val();
						var item_code = $("#item_code"+check_box_val).val();
						var item_name = $("#item_name"+check_box_val).val();
						var item_mfg_prtno = $("#item_mfg_prtno"+check_box_val).val();
						var item_control_no = $("#item_control_no"+check_box_val).val();
						var item_batch_no = $("#item_batch_no"+check_box_val).val();
						var item_expiry_date = $("#item_expiry_date"+check_box_val).val();
						var item_arn_no = $("#item_arn_no"+check_box_val).val();
						var item_inventory_id = $("#item_inventory_id"+check_box_val).val();
						
						
	
						var UOM_id = $("#UOM_id"+check_box_val).val();
						var UOM_name = $("#UOM_name"+check_box_val).val();
					 
						var	Qty =$("#quantity"+check_box_val).val();
						
						var	table_count = $("#last_table_id").val();
						
						var	counter = parseInt(table_count)+ 1;
						
						var	adj_qty =$("#adj_qty"+check_box_val).val();
						var	cur_qty =$("#cur_qty"+check_box_val).val();
						var check_val = 1;
						if(check_val == 1)	
						{
							var mritms = '<tr><td>'+item_code+'<input name="item_code['+counter+']" id="item_code_'+counter+'" value="'+item_code+'" type="hidden" /><input name="item_inventory_id['+counter+']" id="item_inventory_id_'+counter+'" value="'+item_inventory_id+'" type="hidden" /><input name="grid_item_id['+counter+']" value="'+item_id+'" id="grid_item_id_'+counter+'" type="hidden" /></td><td>'+item_mfg_prtno+'<input id="item_mfg_prtno_'+counter+'" name="item_mfg_prtno['+counter+']" value="'+item_mfg_prtno+'" type="hidden" /></td><td>'+item_name+'<input id="item_name_'+counter+'" name="item_name['+counter+']" value="'+item_name+'" type="hidden" /></td><td>'+item_control_no+'<input id="item_control_no_'+counter+'" name="item_control_no['+counter+']" value="'+item_control_no+'" type="hidden" /></td><td>'+item_batch_no+'<input id="item_batch_no_'+counter+'" name="item_batch_no['+counter+']" value="'+item_batch_no+'" type="hidden" /></td><td>'+item_expiry_date+'<input id="item_expiry_date_'+counter+'" name="item_expiry_date['+counter+']" value="'+item_expiry_date+'" type="hidden" /></td><td>'+item_arn_no+'<input id="item_arn_no_'+counter+'" name="item_arn_no['+counter+']" value="'+item_arn_no+'" type="hidden" /></td><td>'+UOM_name+'<input name="UOM_id['+counter+']" id="UOM_id_'+counter+'" type="hidden" value="'+UOM_id+'" /><input name="UOM_name['+counter+']" type="hidden" id="UOM_name_'+counter+'" value="'+UOM_name+'" /></td><td><a href="javascript:void(0);" id="quantity_value_'+counter+'"> </a><input name="quantity['+counter+']" value="'+Qty+'" id="quantity_'+counter+'" type="text" class="quantity" readonly="readonly" /></td></td><td><a href="javascript:void(0);" id="cur_qty_value_'+counter+'"></a><input name="cur_qty['+counter+']" value="'+cur_qty+'" id="cur_qty_'+counter+'" type="text" class="quantity"  onkeyup="return onkeyupfortotal('+counter+')"  /></td><td><a href="javascript:void(0);" id="adj_qty_value_'+counter+'"></a><input name="adj_qty['+counter+']" value="'+adj_qty+'" id="adj_qty_'+counter+'" type="text" class="quantity" readonly="readonly"  /></td></tr>';
						
						 	$('#disp_items').append(mritms);
						 	$("#last_table_id").val(counter);
						 	$("#quantity"+check_box_val).val("");
						}
					
						
						$(this).prop("checked", false);
					}
			}
			
        });
		
		if (exitMultipleItemsInsert)
		{
			$("#multipleItemselecctall").prop("checked", false);
    		$("#multiple_item_error").text('This Field is Required');
			$("#quantity"+exitMultipleItemsInsert).focus();
			return false;
		}
		else
		{
			$("#multipleItemselecctall").prop("checked", false);
			document.getElementById("multiple_item_form").reset();
			//$('#btnmultipleSave').addClass("close");
		}
		
	});
	
	 $('.numonly').keyup(function(){
		var val = $(this).val();
		if(isNaN(val)){
			 val = val.replace(/[^0-9\.]/g,'');
			 if(val.split('.').length>2) 
				 val =val.replace(/\.+$/,"");
		}
		$(this).val(val); 
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
			
           var search_product_type = $("#search_multiple_product_type").val();
		   var search_product_group = $("#search_multiple_product_group").val();
		   var search_item_code = $("#search_multiple_item_code").val();
		   var search_mfg_prtno = $("#search_multiple_mfg_prtno").val();
		   var search_item_name = $("#search_multiple_item_name").val();
		   var search_control_no = $("#search_multiple_control_no").val();
		   var search_batch_no = $("#search_multiple_batch_no").val();
		   
		   
		   
		   $.ajax({
			type: 'POST',
			url: '<?php echo site_url('inventory/multiplesearchitemdetails'); ?>',
			data: {product_type: search_product_type, product_group: search_product_group, item_code: search_item_code, mfg_prtno: search_mfg_prtno, item_name:search_item_name, control_no:search_control_no, batch_no:search_batch_no},
			success: function(resp)
			{ 
				$('#multiple_items').html(resp);
			}
		 });
	 
    });
	
});
	
	
</script>
<?php   //echo"<pre>"; print_r($product_list);exit; ?>
<div class="p-popup">
  <a class="close"><img src="<?php echo base_url(); ?>/resources/images/close-button.png" width="25" /></a>
  <div class="title_head">
  <p>Search Products</p>
  </div>
      	<table>
      	<tr>
				 <td>
            	SKU :
            <br /><br />
            	<input type="text" 	value="" name="search_multiple_mfg_prtno" class="input-large" id="search_multiple_mfg_prtno">
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
            </td>-->
          <!--  <td>
            	Item Code :
            <br /><br />
            	<input type="text" 	value="" name="search_multiple_item_code" class="input-large" id="search_multiple_item_code">
            </td>-->
            <td>
            	Item Name :
            <br /><br />
            	<input type="text" 	value="" name="search_multiple_item_name" class="input-large" id="search_multiple_item_name">
            </td> 
             <td>
            	Control No. :
            <br /><br />
            	<input type="text" 	value="" name="search_multiple_control_no" class="input-large" id="search_multiple_control_no">
            </td> 
             <td>
            	Batch No. :
            <br /><br />
            	<input type="text" 	value="" name="search_multiple_batch_no" class="input-large" id="search_multiple_batch_no">
            </td> 
			
            <td>
            	<br /><br />
            	<a href="#" id="multipleitmesearch" class="btn-success">Search</a>
            </td>
        </tr>
      </table>
      </div>
      <div class="title_head" style="margin-top: 14px;">
  <p>Multiple Items</p>
  <ul style="top: 8px !important;">
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
                <th>Item Description</th>
                <th>Control No</th>
				<th>Batch No</th>
				<th>Expiry Date</th>
                <th>ARN No</th>
                <th>UOM</th>
                <th>System Quantity</th>
                <th>Current Quantity</th>
                <th>Adjustment Quantity</th>
              </tr>
              </thead>
              <tbody id="multiple_items">
              <?php $itemcount = 1; foreach($product_list as $PROLST) {  //echo "<pre>"; print_r($PROLST); ?>
              <tr>
              <td class="checkbox"><input type="checkbox" class="itemcheckbox" id="checkbox<?php echo $itemcount; ?>" value="<?php echo $itemcount; ?>" name="item_check[]"></td>
              <td>
              <?php if(isset($PROLST['product_code'])) { echo $PROLST['product_code']; } ?>
               <input id="item_id<?php echo $itemcount; ?>" name="item_id[<?php echo $itemcount; ?>]" value="<?php echo $PROLST['product_id']; ?>" type="hidden" />
              <input id="item_code<?php echo $itemcount; ?>" name="item_code[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['product_code'])) { echo $PROLST['product_code']; } ?>" type="hidden" />
                <input id="item_inventory_id<?php echo $itemcount; ?>" name="item_inventory_id[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['inventory_id'])) { echo $PROLST['inventory_id']; } ?>" type="hidden" />
              </td>
			  <td>
			  <?php if(isset($PROLST['product_mfr_part_number'])) { echo $PROLST['product_mfr_part_number']; } ?>
			  <input id="item_mfg_prtno<?php echo $itemcount; ?>" name="item_mfg_prtno[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['product_mfr_part_number'])) { echo $PROLST['product_mfr_part_number']; } ?>" type="hidden" />
              </td>
              <td>
              <?php if(isset($PROLST['product_name'])) { echo $PROLST['product_name']; } ?>
              <input id="item_name<?php echo $itemcount; ?>" name="item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['product_name'])) { echo $PROLST['product_name']; } ?>" type="hidden" />
              </td>
                            
               <td>
              <?php if(isset($PROLST['inventory_control_no'])) { echo $PROLST['inventory_control_no']; } ?>
              <input id="item_control_no<?php echo $itemcount; ?>" name="item_control_no[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['inventory_control_no'])) { echo $PROLST['inventory_control_no']; } ?>" type="hidden" />
              </td>
               <td>
              <?php if(isset($PROLST['inventory_batch_no'])) { echo $PROLST['inventory_batch_no']; } ?>
              <input id="item_batch_no<?php echo $itemcount; ?>" name="item_batch_no[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['inventory_batch_no'])) { echo $PROLST['inventory_batch_no']; } ?>" type="hidden" />
              </td>
               <td>
              <?php if(isset($PROLST['inventory_expiry_date'])) { echo $PROLST['inventory_expiry_date']; } ?>
              <input id="item_expiry_date<?php echo $itemcount; ?>" name="item_expiry_date[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['inventory_expiry_date'])) { echo $PROLST['inventory_expiry_date']; } ?>" type="hidden" />
              </td>
               <td>
              <?php if(isset($PROLST['inventory_arn_no'])) { echo $PROLST['inventory_arn_no']; } ?>
              <input id="item_arn_no<?php echo $itemcount; ?>" name="item_arn_no[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['inventory_arn_no'])) { echo $PROLST['inventory_arn_no']; } ?>" type="hidden" />
              </td>
              
              <td>
             <?php if(isset($PROLST['uom_name'])) { echo $PROLST['uom_name'];  } ?> 
   <input id="UOM_id<?php echo $itemcount; ?>" name="UOM_id[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['uom_id'])) { echo $PROLST['uom_id']; } ?>" />
              <input id="UOM_name<?php echo $itemcount; ?>" name="UOM_name[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['uom_name'])) { echo $PROLST['uom_name']; } ?>" />
              </td>
             
              <td>
               <?php if(isset($PROLST['inventory_qty'])) { echo $PROLST['inventory_qty'];  } ?> 
              <input id="quantity<?php echo $itemcount; ?>" class="quantity numonly" name="quantity[<?php echo $itemcount; ?>]" type="hidden" value="<?php echo $PROLST['inventory_qty']; ?>" />
              </td>
                <td>
              <input id="cur_qty<?php echo $itemcount; ?>" class="quantity numonly" name="cur_qty[<?php echo $itemcount; ?>]" type="text" value="" onkeyup="return onkeyupfortotal_cac(<?php echo $itemcount; ?>)" />
              </td>
                <td>
              <input id="adj_qty<?php echo $itemcount; ?>" class="quantity numonly" name="adj_qty[<?php echo $itemcount; ?>]" type="text" value="" readonly="readonly" />
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

<script type="text/javascript">
function onkeyupfortotal_cac(id)
{


	//alert (id);return false;
    var curr_qty = $("#cur_qty" +id).val();
    var inv_qty = $("#quantity"+id).val();
   	
	/* if(curr_qty == 0)
	 {
		$("#validate_number_error").text("Zero is Not Allowed");
	  	$("#cur_qty"+id).val("");
		$("#adj_qty"+id).val("");
	  	return false;
	 }
	 else
	 {
		if(curr_qty != "" && inv_qty != "")
		{
			var totalQuan = parseFloat(inv_qty) - parseFloat(curr_qty);
			$("#adj_qty"+id).val(totalQuan);
		}
	 }*/
	 
	 
		if(curr_qty != "" && inv_qty != "")
		{
			var totalQuan = parseFloat(inv_qty) - parseFloat(curr_qty);
			$("#adj_qty"+id).val(totalQuan);
		}
	
	
}
</script> 