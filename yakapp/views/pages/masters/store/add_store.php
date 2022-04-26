<script language="javascript" type="text/javascript">
$(document).ready(function()
{
 $('.formError').css("display","none");
  
  $('.save').click(function()
  { 
    //alert('hi');return false;
    var store_store_id = $("#store_store_id").val();
    var store_code = $("#store_code").val();
    var store_name = $("#store_name").val();
    var product_type_descname = $("#product_type_descname").val();
    var store_division = $("#store_division").val();
	//var store_category = $('.check_class').val();
	
    if(store_store_id == "" )
    {
      $('#pro_typ_nameError').css("display","block");
      $('#store_store_id').focus(); 
      return false;
    }
    else
    {
    $('#pro_typ_nameError').css("display","none");
    }
    if(store_code == "" )
    {
      $('#companyError').css("display","block");
      $('#store_code').focus(); 
      return false;
    }
    else
    {
    $('#companyError').css("display","none");
    } 
	
	

    if(store_name == "")
    {
      $('#prefix_Error').css("display","block");
      $('#store_name').focus();  
      return false;
    }
      else
    {
      $('#prefix_Error').css("display","none");
    }
	
	if(store_division == "" )
    {
      $('#company1Error').css("display","block");
      $('#store_division').focus(); 
      return false;
    }
    else
    {
    $('#company1Error').css("display","none");
    }
	
	/* if(store_category == "")
    {
      $('#product_type_Error').css("display","block");
      $('#store_category').focus();  
      return false;
    }
      else
    {
      $('#product_type_Error').css("display","none");
    }*/
	
	
	var val = [];
        $('.check_class:checked').each(function(i){
          val[i] = $(this).val();
		  });
		 
		  if(val[0])
		  {
			 $('#product_type_Error').css("display","none");
		  }
		  else
		  {
			   $('#product_type_Error').css("display","block");
      $('#store_category').focus();  
      return false;
		  }
	
    if(product_type_descname == "")
    {
      $('#pro_typr_descError').css("display","block");
      $('#product_type_descname').focus();  
      return false;
    }
      else
    {
      $('#pro_typr_descError').css("display","none");
    }
     
  });
    
});

</script>

<?php echo $this->load->view('pages/master_left_side'); ?>

<section>
	<div class="rightPanel" style="padding: 14px 20px; width:96%;">
		
		<div class='container-fluid editViewContainer'>
			<form class="form-horizontal recordEditView" id="EditView" name="EditView" method="post" action="" enctype="multipart/form-data">
            <br />
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">Creating Store</h3>
					<span class="pull-right">
						<button class="btn-success save" value="Save"  type="submit" name="add_store" id="add_store"><strong>Save</strong></button>
                        <button class="btn-success add_reset" value="reset" type="reset" name="add_reset" id="cus_add_reset"><strong>Reset</strong></button>
						 <a class="cancelLink btn-success" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </span>
                </div>
               
                <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">Store Details</th>
                        </tr>
                    </thead>
                    
                    <tbody>
					 <tr>
						  <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Store ID
                                </label>
                            </td>	
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="pro_typ_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                       <!-- <input id="store_store_id" name="store_store_id" type="text" class="input-large nameField" />-->
										
										<input id="store_store_id"  type="text" class="input-large nameField" onkeyup="return codevalidation()" name="store_store_id" value="<?php if(isset($vendorCode)) { echo $vendorCode; } ?>"/>
                                      <!--   <input id="vendor_prefix" type="hidden" name="vendor_prefix" value="<?php //if(isset($vendorPrefix)) { echo $vendorPrefix; } ?>"/>-->
                                    </span>
                                 </div>
                             </td>
                             <td class="fieldLabel medium">
                             </td>
                             <td>
                             </td>
                        </tr>
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Store Code
                                </label>
                            </td>	
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="companyError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="store_code" name="store_code" type="text" class="input-large nameField" />
                                    </span>
                                 </div>
                             </td>
                             <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Store Name
                                </label>
                            </td>	
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="prefix_Error" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="store_name" name="store_name" type="text" class="input-large nameField" />
                                    </span>
                                 </div>
                             </td>
                        </tr>
                        
                         <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Store Category</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="product_type_Error" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
										 
										  <?php if(isset($product_type) && !empty($product_type)) { foreach($product_type as $COM) { ?>
                                        <input id="store_category" name="store_category[]" class="input-large nameField check_class" type="checkbox" value="<?php echo $COM['products_type_id']; ?>"><?php echo $COM['products_type_name'];?> </br>
										<?php } } ?>
                                       		
                                    </span>
                                </div>
                            </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Store Division
                                </label>
                            </td>
                             <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="company1Error" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <select name="store_division" class="chzn-select" id="store_division">
										 <option value="">Select Division</option>
                                            <?php if(isset($store) && !empty($store)) { foreach($store as $TYPE) { ?>
                                            <option value="<?php echo $TYPE['division_id']; ?>"><?php echo $TYPE['division_name']; ?></option>
                                            <?php } } ?>
                                        </select>
                                    </span>
                                </div>
                            </td>
							 </tr>
							 <tr>
							 <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span> Status
                                </label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="prefix_Error" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                         <input id="store_add_status" name="store_add_status" type="radio" value="active" class="input-large nameField">&nbsp;&nbsp;Active &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input id="store_add_status" name="store_add_status" type="radio" value="deactive" class="input-large nameField" />&nbsp;&nbsp;Deactive
                                    </span>
                                </div>
                            </td>
							 <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span> Description
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                    <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="pro_typr_descError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <textarea id="store_description" name="store_description" class="input-large nameField"></textarea>
                                    </span>
                                 </div>
                             </td>
                        </tr>
                        
                    </tbody>
                </table>
                
						
                <br>
                
                <div class="row-fluid">
                    <div class="pull-right">
                        <button class="btn-success save" value="save" type="submit" name="add_store" id="add_store"><strong>Save</strong></button>
                         <button class="btn-success add_reset" value="reset" type="reset" name="add_reset" id="cus_add_reset"><strong>Reset</strong></button>
						 <a class="cancelLink btn-success" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <br>
            
            </form>
				
          </div>

      </div>

</section>
