<script language="javascript" type="text/javascript">
$(document).ready(function()
{
 $('.formError').css("display","none");
  
  $('.save').click(function()
  { 
    //alert('hi');return false;
    var store_store_id = $("#store_store_id").val();
    var store_code = $("#store_code").val();
    var prefix = $("#prefix").val();
    var product_type_descname = $("#product_type_descname").val();
     
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

    if(prefix == "")
    {
      $('#prefix_Error').css("display","block");
      $('#prefix').focus();  
      return false;
    }
      else
    {
      $('#prefix_Error').css("display","none");
    }
	
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

<?php echo $this->load->view('pages/master_left_side'); 
//echo "<pre>"; print_r($store); ?>

<section>
    <div class="rightPanel" style="padding: 14px 20px; width:96%;">
        
        <div class='container-fluid editViewContainer'>
            <form class="form-horizontal recordEditView" id="EditView" name="EditView" method="post" action="" enctype="multipart/form-data">
                <div class="contentHeader row-fluid">
                    <h3 class="span8 textOverflowEllipsis">Update Store</h3>
                    <span class="pull-right">
                        <button class="btn-success save" value="Save"  type="submit" name="edit_store" id="edit_store"><strong>Update</strong></button>
                         <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
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
                                        <input id="store_store_id" name="store_store_id" readonly="readonly" type="text" value="<?php if(isset($store->store_store_id)){ echo $store->store_store_id;}?>" class="input-large nameField" />
                                    </span>
                                 </div>
                             </td>
                             <td>
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
                                        <input id="store_code" name="store_code" type="text" value="<?php if(isset($store->store_code)){ echo $store->store_code;}?>" class="input-large nameField" />
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
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="pro_typ_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="store_name" name="store_name" type="text" value="<?php if(isset($store->store_name)){ echo $store->store_name;}?>" class="input-large nameField" />
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
                                        <input id="store_category" name="store_category[]" class="input-large nameField check_class" type="checkbox" value="<?php echo $COM['products_type_id']; ?>" <?php $store_category = explode(',',$store->store_category);
										foreach($store_category as $sc)
										{
											 if($sc == $COM['products_type_id']) { echo 'checked = "checked" ';} } ?> ><?php echo $COM['products_type_name'];?> </br>
										<?php } } ?>
 
																				
										
										<?php  //echo "<pre>"; print_r($COM['products_type_id']); ?>
																		
									<!--	<select name="store_category" class="chzn-select" id="store_category">
                                            <option value="">Select an Option</option>
                                            <option value="Raw_Material" <?php //if(isset($store->store_category)){if($store->store_category == 'Raw_Material') { ?>selected="selected" <?php //} } ?>>Raw_Material</option>
                                            <option value="Finished_Goods" <?php //if(isset($store->store_category)){if($store->store_category == 'Finished_Goods') { ?>selected="selected" <?php //} } ?>>Finished_Goods</option>
											<option value="Semi_Finished_Goods" <?php //if(isset($store->store_category)){if($store->store_category == 'Semi_Finished_Goods') { ?>selected="selected" <?php// } } ?>>Semi_Finished_Goods</option>
                                           
                                        </select>-->
									
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
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="prefix_Error" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
										
										<select   name="store_division" class="chzn-select" id="store_division">
                                            <option value="">Select Product Type</option>
                                            <?php if(isset($division) && !empty($division)) { foreach($division as $TYPE) { ?>
                                            <option <?php if($TYPE['division_id'] == $store->division_id) { ?> selected="selected" <?php } ?> value="<?php echo $TYPE['division_id']; ?>"><?php echo $TYPE['division_name']; ?></option>
                                            <?php } } ?>
                                        </select>
										
										
										<?php //echo "<pre>"; print_r($division); ?>
										
										
										
										
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
                                       <input id="store_add_status" name="store_add_status" type="radio" value="active" <?php if(isset($store->store_add_status)) { if($store->store_add_status == 'active') { ?> checked="checked" <?php } }?> class="input-large nameField">&nbsp;&nbsp;Active &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input id="store_add_status" name="store_add_status" type="radio" value="deactive" <?php if(isset($store->store_add_status)) { if($store->store_add_status == 'deactive') { ?> checked="checked" <?php } }?> class="input-large nameField" />&nbsp;&nbsp;Deactive 
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
                                        <textarea id="store_description" name="store_description" class="input-large nameField"><?php if(isset($store->store_description)){ echo $store->store_description;}?></textarea>
                                    </span>
                                 </div>
                             </td>
                        </tr>
                        
                    </tbody>
                </table>
                
                        
                <br>
                
                <div class="row-fluid">
                    <div class="pull-right">
                        <button class="btn-success save" value="save" type="submit" name="edit_store" id="edit_store"><strong>Update</strong></button>
                        <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <br>
            
            </form>
                
          </div>

      </div>

</section>
