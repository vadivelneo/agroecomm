<script type="text/javascript"> 
$(document).ready(function () {
	//alert('hi');exit;
	$('#btnSave').click(function () {
			var	po_int_name = $("#po_int_name").val();
			var	po_int_uom =$("#po_int_uom").val();
            var Ordered_qty =$("#po_int_ordqty").val();
			var	Received_qty =$("#po_int_recev_qty").val();
			var	Pending_qty =$("#po_int_pend_qty").val();
            var Remarks =$("#po_int_remarks").val();

		if(po_int_name == "") 
		{
			$('#po_int_name').focus();
			$('#po_int_nameError').show();
			return false;
		}
		else
		{
			$('#po_int_nameError').hide();
		}
		
		if(po_int_uom == "") 
		{
			$('#po_int_uom').focus();
			$('#po_int_uomError').show();
			return false;
		}
		else
		{
			$('#po_int_uomError').hide();
		}

        if(Ordered_qty == "") 
        {
            $('#po_int_ordqty').focus();
            $('#po_int_ordqtyError').show();
            return false;
        }
        else
        {
            $('#po_int_ordqtyError').hide();
        }

        if(Received_qty == "") 
        {
            $('#po_int_recev_qty').focus();
            $('#po_int_recev_qtyError').show();
            return false;
        }
        else
        {
            $('#po_int_recev_qtyError').hide();
        }
        if(Pending_qty == "") 
        {
            $('#po_int_pend_qty').focus();
            $('#po_int_pend_qtyError').show();
            return false;
        }
        else
        {
            $('#po_int_pend_qtyError').hide();
        }
		
	//alert ("hai");return false;

			
			/*var	table_count = $("#last_table_id").val();
			//alert(table_count);
			var	counter = parseInt(table_count)+1;
	
	 var mritms = '<tr><td>'+Code+'<input id="field_'+counter+'" name="item_name['+counter+']" value="'+Code+'" type="hidden" /></td><td>'+UOM+'<input id="field_'+counter+'" name="uom['+counter+']" type="hidden" value="'+UOM+'" /></td><td>'+Qty+'<input id="field_'+counter+'" name="quantity['+counter+']" value="'+Qty+'" type="hidden" /></td><td>'+model+'<input id="field_'+counter+'" name="model['+counter+']" value="'+model+'" type="hidden" /></td><td>'+qtyuty+'<input id="field_'+counter+'" name="qtyuty['+counter+']" value="'+qtyuty+'" type="hidden" /></td><td>'+tax+'<input id="field_'+counter+'" name="tax['+counter+']" value="'+tax+'" type="hidden" /></td><td>'+po_itm_disc+'<input id="field_'+counter+'" name="discount['+counter+']" value="'+po_itm_disc+'" type="hidden" /></td><td>'+itm_rate+'<input id="field_'+counter+'" name="itmrate['+counter+']" value="'+itm_rate+'"  type="hidden" /></td></tr>';
	 
	// alert(mritms);return false;
	  
	 $('#disp_items').append(mritms);
	 $("#last_table_id").val(counter);
	 document.getElementById("frmCadastre").reset();
	 
	 //alert(mritms);return false;*/

    var table_count = $("#last_table_id").val();
    
    var counter = parseInt(table_count)+1;
    
    var splitCode = po_int_name.split("$");
    var item_id = splitCode[0];
    var item_code = splitCode[1];
    var item_name = splitCode[2];

    var splitUOM = po_int_uom.split("$");
    var UOM_id = splitUOM[0];
    var UOM_name = splitUOM[1];
    
     var pro='<tr><td>'+item_code+'<input id="item_code'+counter+'" name="item_code['+counter+']" value="'+item_code+'" type="hidden" /><input id="item_id'+counter+'" name="item_id['+counter+']" value="'+item_id+'" type="hidden" /></td><td>'+item_name+'<input id="item_name'+counter+'" name="item_name['+counter+']" value="'+item_name+'" type="hidden" /></td><td>'+Ordered_qty+'<input id="ordered_qty'+counter+'" name="ordered_qty['+counter+']" value="'+Ordered_qty+'" type="hidden" /></td><td>'+UOM_name+'<input id="UOM_id'+counter +'" name="UOM_id['+counter+']" type="hidden" value="'+UOM_id+'" /><input id="UOM_name'+counter +'" name="UOM_name['+counter+']" type="hidden" value="'+UOM_name+'" /></td><td>'+Received_qty+'<input id="received_qty'+counter+'" name="received_qty['+counter+']" value="'+Received_qty+'"  type="hidden" /></td><td>'+Pending_qty+'<input id="pending_qty'+counter+'" name="pending_qty['+counter+']" value="'+Pending_qty+'"  type="hidden" /></td><td>'+Remarks+'<input id="remarks'+counter+'" name="remarks['+counter+']" value="'+Remarks+'"  type="hidden" /></td></tr>';
      //alert($pro);return false;
     $('#disp_items').append(pro);
     $("#last_table_id").val(counter);
     document.getElementById("frmCadastre").reset();
	
	});

    $("#po_int_ordqty").keypress(function (e)
    {
         if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
         {  
             return false;
         }
    });
     $("#po_int_recev_qty").keypress(function (e)
    {
         if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
         {  
             return false;
         }
    });
      $("#po_int_pend_qty").keypress(function (e)
    {
         if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
         {  
             return false;
         }
    });
	
	});
	
</script>



<div class="p-popup">

<form class="item_popup_blank" id="frmCadastre">
	 <a class="close"><img src="<?php echo base_url(); ?>/resources/images/close-button.png" width="25" /></a>
	  <div class="title_head"><p>Form Title</p>
			<ul>
				<!--<li><a class="btn-danger" href="#">Remove</a></li>-->
				<li><a class="insert close" id="btnSave" href="#">Insert</a></li>
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
                                    Item Name<span class="redColor">*</span>
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                    	<div class="formError" id="po_int_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent" id="product_itemError_content">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <select name="po_int_name" class="chzn-select" id="po_int_name" >
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
                                <label class="muted pull-right marginRight10px">Unit Of Measurement<span class="redColor">*</span></label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="formError" id="po_int_uomError" style="margin-top: -30px;">
                                            <div class="formErrorContent" id="product_itemusageunit_content">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <select name="po_int_uom" class="chzn-select" id="po_int_uom" >
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
                                    Ordered Quantity<span class="redColor">*</span>
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                    	<div class="formError" id="po_int_ordqtyError" style="margin-top: -30px;">
                                            <div class="formErrorContent" id="product_itemqty_content">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input type="text" value="" name="po_int_ordqty" class="input-large" id="po_int_ordqty">
                                    </span>
                                 </div>
                             </td>
                             <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    Received Quantity<span class="redColor">*</span>
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="formError" id="po_int_recev_qtyError" style="margin-top: -30px;">
                                            <div class="formErrorContent" id="product_itemmodel_content">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input type="text" value="" name="po_int_recev_qty" class="input-large" id="po_int_recev_qty">
                                    </span>
                                 </div>
                             </td>
							 
                            
							 
							</tr>
							<tr>
							
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                	Pending Quantity<span class="redColor">*</span>
                                </label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                    	<div class="formError" id="po_int_pend_qtyError" style="margin-top: -30px;">
                                            <div class="formErrorContent" id="product_itemreq_content">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input type="text" 	value="" name="po_int_pend_qty" class="input-large" id="po_int_pend_qty">
                                    </span>
                                </div>
                            </td>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                	Remarks
                                </label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                    	<div class="formError" id="req_taxError" style="margin-top: -30px;">
                                            <div class="formErrorContent" id="product_itemreq_content">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input type="text" 	value="" name="po_int_remarks" class="input-large" id="po_int_remarks">
                                    </span>
                                </div>
                            </td>
							
                        </tr>
						
                        
                    </tbody>
                    
                </table>
    </form>           
                
</div>