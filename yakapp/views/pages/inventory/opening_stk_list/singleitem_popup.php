<script type="text/javascript"> 
$(document).ready(function () {
	
	$('#btnSave').click(function () {
		
		var	search_product_type = $("#search_product_type").val();
		var	item_id = $("#item_id").val();
		var	item_name = $("#item_name").val();
		var	item_mfg_prtno = $("#item_mfg_prtno").val();
		var	UOM_name  = $("#item_uom_name").val();
		var	UOM_id  = $("#item_uom_id").val();
		
		var	Qty =$("#item_qty").val();
		
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
		if(item_id == "") 
		{
			$('#item_id').focus();
			$('#product_itemError').show();
			return false;
		}
		else
		{
			$('#product_itemError').hide();
		}
		
		if(UOM_name == "") 
		{
			$('#item_uom_name').focus();
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
		
		var	table_count = $("#last_table_id").val();
		var	counter = parseInt(table_count)+1;
		
		var	item_code = $("#item_code").val();
		
		var myarray = [];

		$('input[name^="grid_item_id"]').each(function()
		{
			var old_item_id = $(this).val();
			myarray.push(old_item_id);
			
		});
		
		if(jQuery.inArray(item_id, myarray)==-1)	
		{
			 var mritms='<tr><td>'+item_code+'<input name="item_code['+counter+']" id="item_code_'+counter+'" value="'+item_code+'" type="hidden" /><input name="grid_item_id['+counter+']" value="'+item_id+'" id="grid_item_id_'+counter+'" type="hidden" /></td><td>'+item_mfg_prtno+'<input id="item_mfg_prtno_'+counter+'" name="item_mfg_prtno['+counter+']" value="'+item_mfg_prtno+'" type="hidden" /></td><td>'+item_name+'<input id="item_name_'+counter+'" name="item_name['+counter+']" value="'+item_name+'" type="hidden" /></td><td>'+UOM_name+'<input name="UOM_id['+counter+']" id="UOM_id_'+counter+'" type="hidden" value="'+UOM_id+'" /><input name="UOM_name['+counter+']" type="hidden" id="UOM_name_'+counter+'" value="'+UOM_name+'" /></td><td><a href="javascript:void(0);" id="quantity_value_'+counter+'"></a><input name="quantity['+counter+']" value="'+Qty+'" id="quantity_'+counter+'" type="text" class="quantity" /></td><td colspan="2"><div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_delete_'+counter+'" onclick="return itemsgridrowdelete('+counter+');" data-item="'+item_id+'" data-delete="'+counter+'" title="Delete"><span class="icon-trash"></span></div></td></tr>';
			  
			 $('#disp_items').append(mritms);
			 $("#last_table_id").val(counter);
			 document.getElementById("frmCadastre").reset();
		 
		}
		else
		{
			var r = confirm("The Item has already selected. Do you want update the Quantity?");
			if (r == true)
			{
				$('input[name^="grid_item_id"]').each(function()
				{
					var serach_id = $(this).val();
					if(serach_id == item_id)
					{
						var search_name = $(this).attr("name");
						
						var search_val = search_name.split("[")[1].split("]")[0];
						
						var search_qty_val = $('[name="quantity['+search_val+']"]').val();
						
						var current_qty = Qty;
						
						var update_qty = parseInt(search_qty_val) + parseInt(Qty);
						
						$('[name="quantity['+search_val+']"]').val(update_qty);
						$("#quantity_value_"+search_val).text(update_qty);
					}
				});
				 
			 	document.getElementById("frmCadastre").reset();
			 	$('#btnSave').addClass("close");
			}
			else
			{
				document.getElementById("frmCadastre").reset();
				$('#btnSave').addClass("close");
			}
		}
		$('#btnSave').addClass("close");
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


});

</script>

<script>
    /*  jQuery ready function. Specify a function to execute when the DOM is fully loaded.  */
$(document).ready(
  
  /* This is the function that will get executed after the DOM is fully loaded */
  function () {
    $( "#req_date" ).datepicker({
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    });
  });

 

function getitemname()
{
 	var item_id = $('select#item_id').val();
 

 	$.ajax({
 		type: 'POST',
 		url: '<?php echo site_url('materialrequest/getitemdetails'); ?>',
		data: {product_item_id:item_id},
 		success: function(resp) 
		{
			 
			var myData = JSON.parse(resp);
			var uom_name = myData.uom_name;
			var uom_id = myData.uom_id;
			var product_name = myData.product_name;
			var product_code = myData.product_code;
			var product_mfr_part_number = myData.product_mfr_part_number;
			$("#item_code").val(product_code);
		 	$('#item_name').val(product_name);
			$('#item_uom_id').val(uom_id); 
 			$('#item_uom_name').val(uom_name); 
 			$('#item_mfg_prtno').val(product_mfr_part_number); 
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
 		url: '<?php echo site_url('materialrequest/onchangegetitemspopup'); ?>',
 		data: {product_type: search_product_type, product_group: search_product_group},
 		success: function(resp)
		{ 
			$('#item_id').html(resp);
			$('#insert_items').find('input:text').val(''); 
 		}
		
	 });
}

</script>


<div class="p-popup">

<form class="item_popup_blank" id="frmCadastre">
	 <a class="close"><img src="<?php echo base_url(); ?>/resources/images/close-button.png" width="25" /></a>
	  <div class="title_head"><p>Form Title</p>
			<ul style="top: 8px !important;">
				<!--<li><a class="btn-danger" href="#">Remove</a></li>-->
				<li><a class="insert" id="btnSave" href="#">Insert</a></li>
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
                               	<option value="">Select Product Type</option>
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
                                        <select name="item_id" class="chzn-select" id="item_id" onchange="getitemname()" >
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
                                    Item name
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                    	<div class="formError" id="item_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent" id="productitemname">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input type="text" value="" name="item_name" class="input-large" id="item_name" readonly="readonly">
                                        <input type="hidden" value="" name="item_code" id="item_code">
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
                                        <input type="text" value="" id="item_uom_name" name="item_uom_name" class="input-large" readonly="readonly"> 
										<input type="hidden" value="" id="item_uom_id" name="item_uom_id">
                                    </span>
                                </div>
                            </td>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Product Code</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                    	<div class="formError" id="product_mfgprtnoError" style="margin-top: -30px;">
                                            <div class="formErrorContent" id="product_mfg_prtno_content">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input type="text" value="" id="item_mfg_prtno" name="item_mfg_prtno" class="input-large" readonly="readonly"> 
										
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
                                        <input type="text" value="" name="item_qty" class="input-large numonly" id="item_qty">
                                    </span>
                                 </div>
                             </td>
							
							 </tr>
							
                        
                    </tbody>
                    
                </table>
    </form>           
                
</div>