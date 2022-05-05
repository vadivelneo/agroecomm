<script language="javascript" type="text/javascript">
         
$(document).ready(function () {

	$("#last_table_id").val('0');
	$("#productForm")[0].reset();
	 $('.product_add').click(function()
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
      document.getElementById('companyError').style.display = 'block';
      $('#material_store_id').value="";
      $('#material_store_id').focus();
      return false;
    }
      else
    {
      document.getElementById('companyError').style.display = 'none';
      $('#material_store_id').css("border","1px solid #82B04F");
      document.getElementById("companyError").innerHTML="";
    }
	
	
	if(product_type == 0 || product_type == "")
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
	
	
	/*if(product_group == "")
    {
      $('#product_group').css("border","1px solid #FF0000");
      $('.error').html("");
      //document.getElementById("vendor_nameError").innerHTML="* This field is required";
      document.getElementById('product_groupError').style.display = 'block';
      $('#product_group').value="";
      $('#product_group').focus();
      return false;
    }
      else
    {
      document.getElementById('product_groupError').style.display = 'none';
      $('#product_group').css("border","1px solid #82B04F");
      document.getElementById("product_groupError").innerHTML="";
    }*/
	
	if(product_manufacturer == "")
    {
      $('#product_manufacturer').css("border","1px solid #FF0000");
      $('.error').html("");
      //document.getElementById("vendor_nameError").innerHTML="* This field is required";
      document.getElementById('product_manufacturerError').style.display = 'block';
      $('#product_manufacturer').value="";
      $('#product_manufacturer').focus();
      return false;
    }
      else
    {
      document.getElementById('product_manufacturerError').style.display = 'none';
      $('#product_manufacturer').css("border","1px solid #82B04F");
      document.getElementById("product_manufacturerError").innerHTML="";
    }
	
	
	
	});
	
	
//$("#product_secq").numeric();

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
<script>
function gettype()
{	
	var type = $('select#product_type').val();
	var company_id = $('select#company').val();
	 	$.ajax({
 		type: 'POST',
 		url: '<?php echo site_url('product/getitemcode'); ?>',
 		data: {product_type: type, company_name: company_id},
 		success: function(resp)
		{ 			
			var myData = JSON.parse(resp);
			var productCode = myData.productCode;
			var productPrefix = myData.productPrefix;
			$('#product_item_code').val(productCode);
			$('#product_prefix').val(productPrefix);
 		}
	 });
}


function getproducttype()
{  
	
  	var company_id = $('select#company').val();
 	$("#productForm")[0].reset();
    $.ajax({
		type: 'POST',
		url: '<?php echo site_url('product/getprotucttype'); ?>',
		data: {company_name: company_id},
		success: function(resp)
		{ 
			$('select#company').val(company_id);
			$('select#product_type').html(resp);
		}
   });
}

function getstore_division()
 {
 	var material_store_division_id = $('select#material_store_division_id').val();
	
 	$.ajax({
		
 		type: 'POST', 
 		url: '<?php echo site_url('product/getprostore_division'); ?>',
 		data: {material_store_division_id: material_store_division_id},
		
 		success: function(resp) {
			$('select#material_store_id').html(resp);
 			
			var material_store_id = $('select#material_store_id').val();
	
			$.ajax({
				
				type: 'POST', 
				url: '<?php echo site_url('product/getprostore'); ?>',
				data: {material_store_id: material_store_id},
				
				success: function(resp) {
					$('select#material_store_id').val(material_store_id);
					$('select#product_type').html(resp);
				}
				
			 });
			
		}
 		
		
	 });
 	
}

function getstore()
 {
 	var material_store_id = $('select#material_store_id').val();
	
 	$.ajax({
		
 		type: 'POST', 
 		url: '<?php echo site_url('product/getprostore'); ?>',
 		data: {material_store_id: material_store_id},
		
 		success: function(resp) {
			$('select#material_store_id').val(material_store_id);
			$('select#product_type').html(resp);
 			
			
		}
 		
		
	 });
 	
}

function getpro_type()
{
	var cout = $('select#material_store_id').val();
	 
 	var state = $('select#product_type').val();
 	$.ajax({
 		type: 'POST',
 		url: '<?php echo site_url('product/get_city'); ?>',
 		data: {country: cout, state: state},
 		success: function(resp) { 
			$('select#product_type').html(resp);
 		}
	 });
}

function codevalidation()
{
	var code = $("#product_item_code").val();
	var prefix = $("#product_prefix").val();
	var codelength = code.length;
	var prefixlength = prefix.length;
	var res = code.substr(0,prefixlength); 
	if(codelength >= prefixlength)
	{
		if(res != prefix)
		{
			alert('Item Code Should be Prefix With '+prefix);
		}
	}
}

function resetform() {
document.getElementById("productForm").reset();
}
        
</script>
<script>
  $(function() {
	  
	  $('#product_vat_check').click('change', function(){
	      if ( $(this).is(':checked') ) {
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
	  $('#product_igst_check').click('change', function(){
	      if ( $(this).is(':checked') ) {
	         $('#product_igst').show();
	     } else {
	         $('#product_igst').hide();
	     }
	 });
	 $('#product_sgst_check').click('change', function(){
	      if ( $(this).is(':checked') ) {
	         $('#product_sgst').show();
	     } else {
	         $('#product_sgst').hide();
	     }
	 });
	 
	/* $('#add_reset').click(function ()
	
	$("#last_table_id").val('0');
	$("#productForm")[0].reset();
	});
	  */
	 $('#item_include').click(function ()  {
		
		var product_item = $('#product_item').val();
		var product_itemusageunit = $('#product_itemusageunit').val();
		var product_itemqty = $('#product_itemqty').val();
		var product_itemrate = $('#product_itemrate').val();
		
		if(product_item == "") 
		{
			$('#product_item').focus();
			$('#product_itemError').show();
			return false;
		}
		else
		{
			$('#product_itemError').hide();
		}
		
		if(product_itemusageunit == "") 
		{
			$('#product_itemusageunit').focus();
			$('#product_itemusageunitError').show();
			return false;
		}
		else
		{
			$('#product_itemusageunitError').hide();
		}
		
		if(product_itemqty == "") 
		{
			$('#product_itemqty').focus();
			$('#product_itemqtyError').show();
			return false;
		}
		else
		{
			$('#product_itemqtyError').hide();
		}
		
		if(product_itemrate == "") 
		{
			$('#product_itemrate').focus();
			$('#product_itemrateError').show();
			return false;
		}
		else if(isNaN(product_itemrate))
		{
			$('#product_itemrate').focus();
			$('#product_itemrateError').show();
			return false;
		}
		else
		{
			$('#product_itemrateError').hide();
		}
		

		
	});
	
	  
});
</script>

<?php echo $this->load->view('pages/master_left_side'); ?>

<section>
	<div class="rightPanel" style="padding: 14px 20px; width:96%;">
		
		<div class='container-fluid editViewContainer'>
			<form class="form-horizontal recordEditView" id="productForm" name="productForm" method="post" action="<?php echo site_url('product/addproductdetails')?>" enctype="multipart/form-data">
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">Creating New Item</h3>
					<div class="pull-right">
                        <button class="btn-success product_add" type="submit" name="product_add" id="product_add"><strong>save</strong></button>
						<button class="btn-success add_reset" value="reset" onclick="resetform()" name="add_reset" id="add_reset"><strong>Reset	</strong></button>
                        <a class="cancelLink btn-success" type="reset" onClick="javascript:window.history.back();">Cancel</a>
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
                                        <input type="text" value="" name="product_name" class="input-large nameField" id="product_name" /></span>
                                    
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
                                      
										 <input id="product_code"  readonly="readonly" type="text" class="input-large uppercase" onkeyup="return codevalidation()" name="product_code" value="<?php if(isset($material_code)) { echo $material_code; } ?>"/>
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
                                        <input type="text" value="" name="product_stock_name" class="input-large nameField" id="product_stock_name" /></span>
                                    
                                 </div>
                             </td>
							    <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">SKU</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <input type="text"  value="" name="product_sku" class="input-large" id="product_sku">
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
                                        <select name="product_type" required class="chzn-select" id="product_type" onchange="getpro_type()">
                                        <option value=''>Select Item Type</option>
										 <?php if(isset($product_type) && !empty($product_type)) { foreach($product_type as $STD) { ?>
                                            <option value="<?php echo $STD['products_type_id']; ?>"><?php echo $STD['products_type_name']; ?></option><?php } } ?>
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
                                        <select name="product_group" required class="chzn-select" id="product_group" >
                                            <option value="">Select Item Group</option>
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
										 
										
                                        <select	name="product_uom" required class="quantity stock_text" id="product_uom"  >
                                        	<option value="">Select UOM</option>
                                            <?php if(isset($product_uom) && !empty($product_uom)) { foreach($product_uom as $UOM) { ?>
                                            <option value="<?php echo $UOM['uom_id']; ?>"><?php echo $UOM['uom_name']; ?></option>
                                           	<?php } } ?>
                                        </select>
                                    </span>
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
						                                                
                <br />
                
					

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
                                	<span class="taxLabel alignBottom">CGST Tax<span class="paddingLeft10px">(%)</span></span> 
									<input type="checkbox" value="1" class="taxes" id="product_gst_check" name="product_gst_check">
                                </label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <input type="text" value="" name="product_gst"  id="product_gst" class="detailedViewTextBox  hide quantity1" />
                                    </span>
                                </div>
                            </td>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="taxLabel alignBottom">SGST<span class="paddingLeft10px">(%)</span></span>
									<input type="checkbox" value="1" class="taxes" id="product_sgst_check" name="product_sgst_check">
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <input type="text" value="" id="product_sgst" name="product_sgst" class="detailedViewTextBox hide quantity1">
                                    </span>
                                 </div>
                            </td>
							</tr>
							<tr>
							
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                	<span class="taxLabel alignBottom">IGST<span class="paddingLeft10px">(%)</span></span> 
									<input type="checkbox" value="1" class="taxes" id="product_igst_check" name="product_igst_check">
                                </label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <input type="text" value="" name="product_igst"  id="product_igst" class="detailedViewTextBox  hide quantity1" />
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
                                        <input type="text" name="product_hsn" class="span6 unitPrice currencyField quantity1" id="product_hsn">
                                    </span>
                                </div>
                            </td>
                                  </tr>
                       	
						
                        
                    </tbody>
                </table>					
                <br>
                
                
               <br />
               <br />
                <div class="row-fluid">
                    <div class="pull-right">
                        <button class="btn-success product_add" type="submit" name="product_add" id="product_add"><strong>save</strong></button>
						<button class="btn-success add_reset" value="submit" onclick="resetform()" name="add_reset" id="cus_add_reset"><strong>Reset</strong></button>
                        <a class="cancelLink btn-success" type="reset" onClick="javascript:window.history.back();">Cancel</a>
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