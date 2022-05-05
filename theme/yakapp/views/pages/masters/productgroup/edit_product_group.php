<script language="javascript" type="text/javascript">
$(document).ready(function()
{
 $('.formError').css("display","none");
  
  $('.save').click(function()
  { 
    //alert('hi');return false;
    var product_group_name = $("#product_group_name").val();
    var description = $("#description").val();
     
    if(product_group_name == "" )
    {
      $('#pro_grp_nameError').css("display","block");
      $('#product_group_name').focus(); 
      return false;
    }
    else
    {
    $('#pro_grp_nameError').css("display","none");
    }
    if(description == "")
    {
      $('#pro_grp_descError').css("display","block");
      $('#description').focus();  
      return false;
    }
      else
    {
      $('#pro_grp_descError').css("display","none");
    }
     
  });
    
});
</script>

<?php echo $this->load->view('pages/master_left_side'); ?>

<section>
    <div class="rightPanel" style="padding: 14px 20px; width:96%;">
        
        <div class='container-fluid editViewContainer'>
            <form class="form-horizontal recordEditView" id="EditView" name="EditView" method="post" action="" enctype="multipart/form-data">
                <div class="contentHeader row-fluid">
                    <h3 class="span8 textOverflowEllipsis">Updating Material Group</h3>
                    <span class="pull-right">
                        <button class="btn-success save" value="Save"  type="submit" name="update_pro_group" id="update_pro_group"><strong>Update</strong></button>
                         <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </span>
                </div>
                
                <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">Material Group Details</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Material Group Name
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="pro_grp_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="product_group_name" name="product_group_name" value="<?php if(isset($progroupdata->products_group_name)){ echo $progroupdata->products_group_name;}?>" type="text" class="input-large nameField" />
                                    </span>
                                 </div>
                             </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Description
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                    <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="pro_grp_descError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <textarea id="description" name="description" class="input-large nameField"><?php if(isset($progroupdata->products_group_description)){ echo $progroupdata->products_group_description;}?></textarea>
                                    </span>
                                 </div>
                             </td>
                        </tr>
						
						 <tr>
						<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Material Category</label>
                            </td>
							  <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="product_typeError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <select   name="material_type" class="chzn-select" id="material_type">
                                            <option value="">Select Material Category</option>
                                            <?php if(isset($product_type) && !empty($product_type)) { foreach($product_type as $TYPE) { ?>
                                            <option <?php if($TYPE['products_type_id'] == $progroupdata->product_group_type_id) { ?> selected="selected" <?php } ?> value="<?php echo $TYPE['products_type_id']; ?>"><?php echo $TYPE['products_type_name']; ?></option>
                                            <?php } } ?>
                                        </select>
										
                                    </span>
                                </div>

                            </td>
                            
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                   <span class="redColor">*</span>Unit Of Measurement
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
										 <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="product_usageunitError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
										
                                        <select	name="product_usageunit" class="chzn-select" id="product_usageunit">
                                        	<option value="">Select UOM</option>
                                            <?php if(isset($product_uom) && !empty($product_uom)) { foreach($product_uom as $UOM) { ?>
                                            <option value="<?php echo $UOM['uom_id']; ?>" <?php if(isset($progroupdata->product_group_uom_id)) { if($UOM['uom_id'] == $progroupdata->product_group_uom_id) { ?> selected="selected" <?php } } ?> ><?php echo $UOM['uom_name']; ?></option>
                                           	<?php } } ?>
                                        </select>
                                    </span>
                                 </div>
                             </td>
							</tr>
							 <tr>
						  <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Status</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="prefix_Error" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
										  <input id="status" name="status" type="radio" value="active" <?php if(isset($progroupdata->product_group_stat)) { if($progroupdata->product_group_stat == 'active') { ?> checked="checked" <?php } }?>  class="input-large nameField">&nbsp;&nbsp;Active &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input id="status" name="status" type="radio" value="deactive" <?php if(isset($progroupdata->product_group_stat)) { if($progroupdata->product_group_stat == 'deactive') { ?> checked="checked" <?php } }?> class="input-large nameField" />&nbsp;&nbsp;Deactive 
                                        
                                    </span>
                                </div>
                            </td>
							<td></td><td></td>
						</tr>
                        
                    </tbody>
                </table>
                
                        
                <br>
                
                <div class="row-fluid">
                    <div class="pull-right">
                        <button class="btn-success save" value="save" type="submit" name="update_pro_group" id="update_pro_group"><strong>Update</strong></button>
                        <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <br>
            
            </form>
                
          </div>

      </div>

</section>
