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
            <br />
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">Creating BOM Group</h3>
					<span class="pull-right">
						<button class="btn-success save" value="Save"  type="submit" name="add_bomgroup" id="add_bomgroup"><strong>Save</strong></button>
                        <button class="btn-success add_reset" value="reset" type="reset" name="add_reset" id="cus_add_reset"><strong>Reset</strong></button>
						 <a class="cancelLink btn-success" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </span>
                </div>
               
                <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">BOM Group Details</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Process
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="pro_typ_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                       
										  <select name="process" class="chzn-select" id="process">
                                             <?php if(isset($process_group) && !empty($process_group)) { foreach($process_group as $COM) { ?>
                                            <option value="<?php echo $COM['processmaster_id']; ?>"><?php echo $COM['processmaster_name']; ?></option><?php } } ?>
                                        </select>
                                    </span>
                                 </div>
                             </td>
                             <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                <span class="redColor">*</span>BOM Group Name</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="pro_typ_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="group_name" name="group_name" type="text" class="input-large nameField" />
                                    </span>
                                 </div>
                            </td>
                        </tr>
                        
                         <tr>
						  <td class="fieldLabel medium">
							 <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Title
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="pro_typ_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="title" name="title" type="text" class="input-large nameField" />
                                    </span>
                                 </div>
                             </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>BOM Category</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="prefix_Error" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
										 
										 <?php if(isset($bom_category) && !empty($bom_category)) { foreach($bom_category as $COM) { ?>
                                        <input id="bomcat" name="bomcat[]" class="input-large nameField" type="checkbox" value="<?php echo $COM['bom_category_id']; ?>"><?php echo $COM['bom_category_name'];?> </br>
										<?php } } ?>
 
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
                                        <input id="status" name="status" type="radio" value="active" class="input-large nameField">&nbsp;&nbsp;Active &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input id="status" name="status" type="radio" value="deactive" class="input-large nameField" />&nbsp;&nbsp;Deactive 
                                    </span>
                                </div>
                            </td>
						</tr>
                    </tbody>
                </table>
                
						
                <br>
                
                <div class="row-fluid">
                    <div class="pull-right">
                        <button class="btn-success save" value="save" type="submit" name="add_bomgroup" id="add_bomgroup"><strong>Save</strong></button>
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
