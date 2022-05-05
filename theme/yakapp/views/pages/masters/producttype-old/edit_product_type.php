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
                    <h3 class="span8 textOverflowEllipsis">Update Product Type</h3>
                    <span class="pull-right">
                        <button class="btn-success save" value="Save"  type="submit" name="edit_pro_type" id="edit_pro_type"><strong>Update</strong></button>
                         <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </span>
                </div>
                
                <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">Product Type Details</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Product Type Name
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="pro_typ_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="product_type_name" name="product_type_name" type="text" value="<?php if(isset($protypedata->products_type_name)){ echo $protypedata->products_type_name;}?>" class="input-large nameField" />
                                    </span>
                                 </div>
                             </td>
                             <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                <span class="redColor">*</span>Company</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="companyError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <select name="company" class="chzn-select" id="company">
                                            <?php if(isset($company_srt_name) && !empty($company_srt_name)) { foreach($company_srt_name as $COM) { ?>
                                            <option <?php if($COM['company_id'] == $protypedata->product_type_company_id) { ?> selected="selected" <?php } ?> value="<?php echo $COM['company_id']; ?>"><?php echo $COM['company_short_name']; ?></option>
                                           	<?php } } ?>
                                        </select>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                         <tr>
                         <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Prefix</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="prefix_Error" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="prefix" name="prefix" type="text" value="<?php if(isset($protypedata->products_type_prefix)){ echo $protypedata->products_type_prefix;}?>" class="input-large nameField" />
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
                                    <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="pro_typr_descError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <textarea id="product_type_descname" name="product_type_descname" class="input-large nameField"><?php if(isset($protypedata->products_type_description)){ echo $protypedata->products_type_description;}?></textarea>
                                    </span>
                                 </div>
                             </td>
                        </tr>
                        
                    </tbody>
                </table>
                
                        
                <br>
                
                <div class="row-fluid">
                    <div class="pull-right">
                        <button class="btn-success save" value="save" type="submit" name="edit_pro_type" id="edit_pro_type"><strong>Update</strong></button>
                        <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <br>
            
            </form>
                
          </div>

      </div>

</section>
