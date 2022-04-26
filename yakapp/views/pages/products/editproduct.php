<script language="javascript" type="text/javascript">
         
$(document).ready(function () {
	
	var count_of_items = $("#count_of_items").val();
	$("#last_table_id").val(count_of_items);
	
	 $('.product_update').click(function()
     {
        
        var product_name = $("#product_name").val();
		  var material_mat_id = $("#material_mat_id").val();
        var company = $("#company").val();
        var product_type = $("#product_type").val();
        var product_item_code = $("#product_item_code").val();
        var product_group = $("#product_group").val();
		var product_manufacturer = $("#product_manufacturer").val();
        var product_secq = $("#product_secq").val();
		var product_mrp = $("#product_mrp").val();
        var product_sp = $("#product_sp").val();
       // var product_utyqty = $("#product_utyqty").val();
        var product_costprice = $("#product_costprice").val();
        var product_usageunit = $("#product_usageunit").val();
		var material_store_division_id = $("#material_store_division_id").val();
		var material_store_id = $('#material_store_id').val();
     //alert(product_type);
	/* if(material_mat_id == "")
    {
      $('#material_mat_id').css("border","1px solid #FF0000");
      $('.error').html("");
      //document.getElementById("vendor_nameError").innerHTML="* This field is required";
      document.getElementById('product_matidError').style.display = 'block';
      $('#material_mat_id').value="";
      $('#material_mat_id').focus();
      return false;
    }
      else
    {
      document.getElementById('product_matidError').style.display = 'none';
      $('#material_mat_id').css("border","1px solid #82B04F");
      document.getElementById("product_matidError").innerHTML="";
    }*/
     
	 if(product_name == "")
    {
      $('#product_name').css("border","1px solid #FF0000");
      $('.error').html("");
      //document.getElementById("vendor_nameError").innerHTML="* This field is required";
      document.getElementById('product_nameError').style.display = 'block';
      $('#product_name').value="";
      $('#product_name').focus();
      return false;
    }
      else
    {
      document.getElementById('product_nameError').style.display = 'none';
      $('#product_name').css("border","1px solid #82B04F");
      document.getElementById("product_nameError").innerHTML="";
    }

 	
	if(product_item_code == "")
    {
      $('#product_item_code').css("border","1px solid #FF0000");
      $('.error').html("");
      //document.getElementById("vendor_nameError").innerHTML="* This field is required";
      document.getElementById('product_item_codeError').style.display = 'block';
      $('#product_item_code').value="";
      $('#product_item_code').focus();
      return false;
    }
      else
    {
      document.getElementById('product_item_codeError').style.display = 'none';
      $('#product_item_code').css("border","1px solid #82B04F");
      document.getElementById("product_item_codeError").innerHTML="";
    }
	
	if(material_store_division_id == "")
    {
      $('#material_store_division_id').css("border","1px solid #FF0000");
      $('.error').html("");
      document.getElementById('product_divisionError').style.display = 'block';
      $('#material_store_division_id').value="";
      $('#material_store_division_id').focus();
      return false;
    }
      else
    {
      document.getElementById('product_divisionError').style.display = 'none';
      $('#material_store_division_id').css("border","1px solid #82B04F");
      document.getElementById("product_divisionError").innerHTML="";
    }
	
	
	if(material_store_id == "")
    {
      $('#material_store_id').css("border","1px solid #FF0000");
      $('.error').html("");
      //document.getElementById("vendor_nameError").innerHTML="* This field is required";
      document.getElementById('material_storeError').style.display = 'block';
      $('#material_store_id').value="";
      $('#material_store_id').focus();
      return false;
    }
      else
    {
      document.getElementById('material_storeError').style.display = 'none';
      $('#material_store_id').css("border","1px solid #82B04F");
      document.getElementById("material_storeError").innerHTML="";
    }
	
	//alert(product_type);
	if(product_type == 0)
    {
      $('#product_type').css("border","1px solid #FF0000");
      $('.error').html("");
      document.getElementById('product_typeError').style.display = 'block';
      $('#product_type').value="";
      $('#product_type').focus();
      return false;
    }
      else
    {
      document.getElementById('product_typeError').style.display = 'none';
      $('#product_type').css("border","1px solid #82B04F");
      document.getElementById("product_typeError").innerHTML="";
    }
	
	if(product_usageunit == 0 || product_usageunit == "")
    {
      $('#product_usageunit').css("border","1px solid #FF0000");
      $('.error').html("");
      document.getElementById('product_usageunitError').style.display = 'block';
      $('#product_usageunit').value="";
      $('#product_usageunit').focus();
      return false;
    }
      else
    {

      document.getElementById('product_usageunitError').style.display = 'none';
      $('#product_usageunit').css("border","1px solid #82B04F");
      document.getElementById("product_usageunitError").innerHTML="";
    }
	});



});

</script>
        
<script>
  $(function() {
	  
	  if($('#product_vat_check').is(':checked') == true)
	  {
		   $('#product_vat').show();
	  }
	  
	  if($('#product_gst_check').is(':checked') == true)
	  {
		   $('#product_gst').show();
	  }
	   if($('#product_sgst_check').is(':checked') == true)
	  {
		   $('#product_sgst').show();
	  }
	   if($('#product_igst_check').is(':checked') == true)
	  {
		   $('#product_igst').show();
	  }
	  if($('#product_ser_check').is(':checked') == true)
	  {
		   $('#product_ser').show();
	  }
	  
	  if($('#product_cst_check').is(':checked') == true)
	  {
		   $('#product_cst').show();
	  }
	  
	  if($('#product_disc_check').is(':checked') == true)
	  {
		   $('#product_disc').show();
	  }
	  
	  if($('#product_exc_check').is(':checked') == true)
	  {
		   $('#product_exc').show();
	  }
	  
	  $('#product_vat_check').click('change', function(){
		 
	      if ($(this).is(':checked') ) {
	         $('#product_vat').show();
	     } else {
	         $('#product_vat').hide();
	     }
	 });
	 
	   $('#product_gst_check').click('change', function(){
		 
	      if ( $(this).is(':checked') ) {
	         $('#product_gst').show();
	     } else {
	         $('#product_gst').hide();
	     }
	 });
	  $('#product_sgst_check').click('change', function(){
	      if ( $(this).is(':checked') ) {
	         $('#product_sgst').show();
	     } else {
	         $('#product_sgst').hide();
	     }
	 });
	 
	 $('#product_igst_check').click('change', function(){
	      if ( $(this).is(':checked') ) {
	         $('#product_igst').show();
	     } else {
	         $('#product_igst').hide();
	     }
	 });
	 
	
	$('#product_ser_check').click('change', function(){
		 
	      if ( $(this).is(':checked') ) {
	         $('#product_ser').show();
	     } else {
	         $('#product_ser').hide();
	     }
	 });
	
	$('#product_cst_check').click('change', function(){
		 
	      if ( $(this).is(':checked') ) {
	         $('#product_cst').show();
	     } else {
	         $('#product_cst').hide();
	     }
	 });
	
	$('#product_exc_check').click('change', function(){
		 
	      if ( $(this).is(':checked') ) {
	         $('#product_exc').show();
	     } else {
	         $('#product_exc').hide();
	     }
	 });
	
	$('#product_disc_check').click('change', function(){
		 
	      if ( $(this).is(':checked') ) {
	         $('#product_disc').show();
	     } else {
	         $('#product_disc').hide();
	     }
	 });
	
	  $('.quantity1').keyup(function(){
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



<?php echo $this->load->view('pages/master_left_side');?>

<section>
	<div class="rightPanel" style="padding: 14px 20px; width:96%;">
		
		<div class='container-fluid editViewContainer'>
			<form class="form-horizontal recordEditView" id="EditView" name="EditView" method="post" action="<?php echo site_url('product/editproduct').'/'.$this->uri->segment('3');?>" enctype="multipart/form-data">
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">Edit Material</h3>
					<div class="pull-right">
                        <button class="btn-success product_update" type="submit" name="product_update" id="product_update"><strong>Update</strong></button>
                        <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </div>
                </div>
                <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">Item Details</th>
                        </tr>
                    </thead>
                    <tbody>
					 <tr>
						<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Item Name
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="product_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input type="text" value="<?php if(isset($edit_product->product_name)){ echo $edit_product->product_name;}?>" name="product_name" class="input-large nameField" id="product_name" /></span>
                                    
                                 </div>
                             </td>
							 <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Item Code
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="product_codeError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                      
										 <input id="product_code"  readonly="readonly" type="text" class="input-large uppercase" onkeyup="return codevalidation()" name="product_code" value="<?php if(isset($edit_product->product_code)){ echo $edit_product->product_code;}?>"/>
                                        <input id="vendor_prefix" type="hidden" name="vendor_prefix" value="<?php if(isset($materialPrefix)) { echo $materialPrefix; } ?>"/>
										
                                    </span>
                                 </div>
                             </td>
						
                        </tr>
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Stock Item Name
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="product_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input type="text" value="<?php if(isset($edit_product->product_stock_name)){ echo $edit_product->product_stock_name;}?>" name="product_stock_name" class="input-large nameField" id="product_stock_name" /></span>
                                    
                                 </div>
                             </td>
							    <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">SKU</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <input type="text"  value="<?php if(isset($edit_product->product_sku)){ echo $edit_product->product_sku;}?>" name="product_sku" class="input-large" id="product_sku">
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        
                        
                        
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Item Type</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="product_typeError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <select   name="product_type" required class="chzn-select" id="product_type">
                                            <option value="">Select Product Type</option>
                                            <?php if(isset($product_type) && !empty($product_type)) { foreach($product_type as $TYPE) { ?>
                                            <option <?php if($TYPE['products_type_id'] == $edit_product->product_type_id) { ?> selected="selected" <?php } ?> value="<?php echo $TYPE['products_type_id']; ?>"><?php echo $TYPE['products_type_name']; ?></option>
                                            <?php } } ?>
                                        </select>
                                    </span>
                                </div>

                            </td>
							                           
							 <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Item Group</label>
                            </td>
                            <td class="fieldValue medium">
                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id= "product_groupError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                       <select name="product_group" required class="chzn-select" id="product_group">
                                            <option value="">Select Product Group</option>
                                            <?php if(isset($product_group) && !empty($product_group)) { foreach($product_group as $GROUP) { ?>
                                            <option <?php if($GROUP['products_group_id'] == $edit_product->product_group_id) { ?> selected="selected" <?php } ?> value="<?php echo $GROUP['products_group_id']; ?>"><?php echo $GROUP['products_group_name']; ?></option>
                                            <?php } } ?>
                                        </select>
                                    </span>
                                </div>
                            </td>
                            
                        </tr>
						
						
                        <tr>
						 <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                   <span class="redColor">*</span>UOM
                                </label>
                            
                           </td>
						   <td>
                                <div class="row-fluid">
                                    <span class="span10">
										<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id= "product_usageunitError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
										 
										
                                        <select	name="product_uom" required class="chzn-select" id="product_uom" onchange="getSquarefeet()" >
                                        	<option value="">Select UOM</option>
                                            <?php if(isset($product_uom) && !empty($product_uom)) { foreach($product_uom as $UOM) { ?>
                                            <option value="<?php echo $UOM['uom_id']; ?>" <?php if(isset($edit_product->product_uom)) { if($UOM['uom_id'] == $edit_product->product_uom) { ?> selected="selected" <?php } } ?> ><?php echo $UOM['uom_name']; ?></option>
                                           	<?php } } ?>
                                        </select>
                                 </div>
                             </td>
							 
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"></label>
                            </td>
                           <td class="fieldValue medium" >
                              
                            </td>
						
                        </tr>
                      
                       
                    </tbody>
                </table>
                
				 <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">Pricing Information</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                       
                        
                        <tr>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                	<span class="taxLabel alignBottom">CGST<span class="paddingLeft10px">(%)</span></span> 
									<input type="checkbox" <?php if(isset($edit_product->product_cgst_tax)){ if($edit_product->product_cgst_tax != '0.00') { ?> checked="checked" <?php } }?> value="1" class="taxes" id="product_gst_check" name="product_gst_check">
                                </label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <input type="text" value="<?php if(isset($edit_product->product_cgst_tax)){ echo $edit_product->product_cgst_tax;}?>" name="product_gst_tax"  id="product_gst_tax" class="detailedViewTextBox " />
                                    </span>
                                </div>
                            </td>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="taxLabel alignBottom">SGST<span class="paddingLeft10px">(%)</span></span>
									<input type="checkbox" <?php if(isset($edit_product->product_sgst_tax)){ if($edit_product->product_sgst_tax != '0.00') { ?> checked="checked" <?php } }?>value="1" class="taxes" id="product_sgst_check" name="product_sgst_check">
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <input type="text" value="<?php if(isset($edit_product->product_sgst_tax)){ echo $edit_product->product_sgst_tax;}?>"  id="product_sgst" name="product_sgst" class="detailedViewTextBox hide quantity1">
                                    </span>
                                 </div>
                            </td>
							</tr>
							<tr>
							
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                	<span class="taxLabel alignBottom">IGST<span class="paddingLeft10px">(%)</span></span> 
									<input type="checkbox" <?php if(isset($edit_product->product_igst_tax)){ if($edit_product->product_igst_tax != '0.00') { ?> checked="checked" <?php } }?>value="1" class="taxes" id="product_igst_check" name="product_igst_check">
                                </label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <input type="text" value="<?php if(isset($edit_product->product_igst_tax)){ echo $edit_product->product_igst_tax;}?>"  name="product_igst"  id="product_igst" class="detailedViewTextBox  hide quantity1" />
                                    </span>
                                </div>
                            </td>
                                                     
                       
							
                          
							 <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>HSN/SAC</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
									<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="product_spError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input type="text" name="product_hsn" value="<?php if(isset($edit_product->product_hsn_sac)){ 
										echo $edit_product->product_hsn_sac;}?>" class="span6 unitPrice currencyField quantity1" id="product_hsn">
                                    </span>
                                </div>
                            </td>
                                  </tr>
							
                    </tbody>
                </table>
						                                                
                <br />
                     	
                <br>
                
                              
               
                <input type ="hidden" value="0" name="last_table_id " id="last_table_id">
                <input type ="hidden" value="<?php echo count($edit_product_items); ?>" name="count_of_items " id="count_of_items">
                <br /> 
				 <br>
				
              
               <br />
               <br />
                <div class="row-fluid">
                    <div class="pull-right">
                        <button class="btn-success product_update" type="submit" name="product_update" id="product_update"><strong>Update</strong></button>
                        <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
               
                <br>
            
            
            </form>
				
          </div>

      </div>

</section>



  	<!--popup start -->
     <div id="item_to_pop_up" class="pop-up-display-content">
       <?php $this->load->view("pages/products/item_popup_chk");  ?>
	 </div>
     <!--popup end -->
     

<script>
// Semicolon (;) to ensure closing of earlier scripting
// Encapsulation
// $ is assigned to jQuery
;(function($) {

	 // DOM Ready
	$(function() {

		// Binding a click event
		// From jQuery v.1.7.0 use .on() instead of .bind()
		$('#itemincluded').bind('click', function(e) {

			 e.preventDefault();
			$('#item_to_pop_up').bPopup({
				position: [300, 50], //x, y
				closeClass:'close',
				follow: [true, true],
				modalClose: true
			});
		});
		
		
		
	});
})(jQuery);


		
</script>