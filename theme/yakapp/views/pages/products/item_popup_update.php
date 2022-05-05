<script type="text/javascript"> 
$(document).ready(function () {
			
	$('#btnSave').click(function ()
	{
			var	Code = $("#product_item").val();
			var	UOM  = $("#product_itemusageunit").val();
			var	Qty =$("#product_itemqty").val();
			var	Rate = $("#product_itemrate").val();
		
		if(Code == "") 
		{
			$('#product_item').focus();
			$('#product_itemError').show();
			return false;
		}
		else
		{
			$('#product_itemError').hide();
		}
		
		if(UOM == "") 
		{
			$('#product_itemusageunit').focus();
			$('#product_itemusageunitError').show();
			return false;
		}
		else
		{
			$('#product_itemusageunitError').hide();
		}
		
		if(Qty == "") 
		{
			$('#product_itemqty').focus();
			$('#product_itemqtyError').show();
			return false;
		}
		else
		{
			$('#product_itemqtyError').hide();
		}
		
		if(Rate == "") 
		{
			$('#product_itemrate').focus();
			$('#product_itemrateError').show();
			return false;
		}
		else if(isNaN(Rate))
		{
			$('#product_itemrate').focus();
			$('#product_itemrateError').show();
			return false;
		}
		else
		{
			$('#product_itemrateError').hide();
		}
	
	 
	
	var	table_count = $("#last_table_id").val();
			
	var	counter = parseInt(table_count)+1;
	
	var splitCode = Code.split("$");
	var item_id = splitCode[0];
	var item_code = splitCode[1];
	var item_name = splitCode[2];
	
	var splitUOM = UOM.split("$");
	var UOM_id = splitUOM[0];
	var UOM_name = splitUOM[1];
	
	 var pro='<tr><td>'+item_code+'<input id="field_'+counter+'" name="item_code['+counter+']" value="'+item_code+'" type="hidden" /><input id="field_'+counter+'" name="item_id['+counter+']" value="'+item_id+'" type="hidden" /></td><td>'+item_name+'<input id="field_'+counter+'" name="item_name['+counter+']" value="'+item_name+'" type="hidden" /></td><td>'+UOM_name+'<input id="field_'+counter +'" name="UOM_id['+counter+']" type="hidden" value="'+UOM_id+'" /><input id="field_'+counter +'" name="UOM_name['+counter+']" type="hidden" value="'+UOM_name+'" /></td><td>'+Qty+'<input id="field_'+counter+'" name="quantity['+counter+']" value="'+Qty+'" type="hidden" /></td><td>'+Rate+'<input id="field_'+counter+'" name="rate['+counter+']" value="'+Rate+'"  type="hidden" /></td></tr>';
	  
	 $('#disp_items').append(pro);
	 $("#last_table_id").val(counter);
	 document.getElementById("frmCadastre").reset();
	 
	});
	
	$("#product_itemqty").keypress(function (e)
	{
		 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
		 {	
			 return false;
		 }
    });
	
});
	
	
</script>


</script>
<div class="p-popup">

<form class="item_popup_blank" id="frmCadastre">
	 <a class="close"><img src="<?php echo base_url(); ?>/resources/images/close-button.png" width="25" /></a>
	  <div class="title_head"><p>Form Title</p>
			<ul>
				<!--<li><a class="btn-danger" href="#">Remove</a></li>-->
				<li><a class="insert close" id="btnSave" href="#">Save</a></li>
				<!--<li><a class="btn-success" href="#">Done</a></li>-->
			</ul>
	  </div>
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
                                    Item
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                    	<div class="formError" id="product_itemError" style="margin-top: -30px;">
                                            <div class="formErrorContent" id="product_itemError_content">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <select name="product_item" class="chzn-select" id="product_item" >
                                            <option value="">Select item</option>
											<?php foreach($product_list as $PROLST) { ?>
                                    		<option value="<?php echo $PROLST['product_id']; ?>$<?php echo $PROLST['product_code']; ?>$<?php echo $PROLST['product_name']; ?>">
												<?php echo $PROLST['product_code']; ?> - <?php echo $PROLST['product_name']; ?>
                                            </option>
                                			<?php } ?>
                                        </select>
                                    </span>
                                 </div>
                             </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Unit Of Measurement</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                    	<div class="formError" id="product_itemusageunitError" style="margin-top: -30px;">
                                            <div class="formErrorContent" id="product_itemusageunit_content">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <select name="product_itemusageunit" class="chzn-select" id="product_itemusageunit" >
                                        	<option value="">Select UOM</option>
                                            <?php if(isset($product_uom) && !empty($product_uom)) { foreach($product_uom as $UOM) { ?>
                                            <option value="<?php echo $UOM['uom_id']; ?>$<?php echo $UOM['uom_name']; ?>"><?php echo $UOM['uom_name']; ?></option>
                                           	<?php } } ?>
                                        </select>
                                    </span>
                                </div>
                            </td>
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
                                    	<div class="formError" id="product_itemqtyError" style="margin-top: -30px;">
                                            <div class="formErrorContent" id="product_itemqty_content">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input type="text" value="" name="product_itemqty" class="input-large" id="product_itemqty">
                                    </span>
                                 </div>
                             </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                	Rate
                                </label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                    	<div class="formError" id="product_itemrateError" style="margin-top: -30px;">
                                            <div class="formErrorContent" id="product_itemrate_content">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input type="text" 	value="" name="product_itemrate" pattern="[0-9.]*" class="input-large" id="product_itemrate">
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                    </tbody>
                    
                </table>
    </form>           
                
</div>