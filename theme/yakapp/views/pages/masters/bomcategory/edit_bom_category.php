<script language="javascript" type="text/javascript">
$(document).ready(function()
{
 $('.formError').css("display","none");
  
  $('.save').click(function()
  { 
    //alert('hi');return false;
    var product_type_name = $("#product_type_name").val();
    var company = $("#company").val();
    var prefix = $("#prefix").val();
    var product_type_descname = $("#product_type_descname").val();
     
    if(product_type_name == "" )
    {
      $('#pro_typ_nameError').css("display","block");
      $('#product_type_name').focus(); 
      return false;
    }
    else
    {
    $('#pro_typ_nameError').css("display","none");
    }

    if(company == "" )
    {
      $('#companyError').css("display","block");
      $('#company').focus(); 
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
                <div class="contentHeader row-fluid">
                    <h3 class="span8 textOverflowEllipsis">Update BOM Category</h3>
                    <span class="pull-right">
                        <button class="btn-success save" value="Save"  type="submit" name="edit_bom_cat" id="edit_bom_cat"><strong>Update</strong></button>
                         <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </span>
                </div>
                
                <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">BOM Category Details</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>BOM Category Name
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="pro_typ_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="bom_category_name" name="bom_category_name" type="text" value="<?php if(isset($bomtypedata->bom_category_name)){ echo $bomtypedata->bom_category_name;}?>" class="input-large nameField" />
                                    </span>
                                 </div>
                             </td>
                             <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                <span class="redColor">*</span>BOM Category Type</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="companyError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <select name="cat_type" class="chzn-select" id="cat_type">
                                            <?php if(isset($category_type) && !empty($category_type)) { foreach($category_type as $COM) { ?>
                                            <option <?php if($COM['bom_cat_type_id'] == $bomtypedata->bom_category_type_id) { ?> selected="selected" <?php } ?> value="<?php echo $COM['bom_cat_type_id']; ?>"><?php echo $COM['bom_category_type_name']; ?></option>
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
										  <input id="prefix" name="prefix" type="radio" value="active" <?php if(isset($bomtypedata->bom_cat_stat)) { if($bomtypedata->bom_cat_stat == 'active') { ?> checked="checked" <?php } }?>  class="input-large nameField">&nbsp;&nbsp;Active &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input id="prefix" name="prefix" type="radio" value="deactive" <?php if(isset($bomtypedata->bom_cat_stat)) { if($bomtypedata->bom_cat_stat == 'deactive') { ?> checked="checked" <?php } }?> class="input-large nameField" />&nbsp;&nbsp;Deactive 
                                        
                                    </span>
                                </div>
                            </td>
                          <td class="fieldLabel medium">
							</td>
							<td>
							</td>
                        </tr>
                        
                    </tbody>
                </table>
                
                        
                <br>
                
                <div class="row-fluid">
                    <div class="pull-right">
                        <button class="btn-success save" value="save" type="submit" name="edit_bom_cat" id="edit_bom_cat"><strong>Update</strong></button>
                        <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <br>
            
            </form>
                
          </div>

      </div>

</section>
