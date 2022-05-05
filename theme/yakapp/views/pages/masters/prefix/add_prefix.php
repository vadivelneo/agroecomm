<script language="javascript" type="text/javascript">
$(document).ready(function()
{
 $('.formError').css("display","none");
  
  $('.save').click(function()
  { 
    //alert('hi');return false;
    var prefix_model = $("#prefix_model").val();
    var prefix_name = $("#prefix_name").val();
     
    if(prefix_model == "" )
    {
      $('#prefix_modelError').css("display","block");
      $('#prefix_model').focus(); 
      return false;
    }
    else
    {
    $('#prefix_modelError').css("display","none");
    }

    if(prefix_name == "")
    {
      $('#pre_nameError').css("display","block");
      $('#prefix_name').focus();  
      return false;
    }
      else
    {
      $('#pre_nameError').css("display","none");
    }
     
  });
    
});
</script>

<?php echo $this->load->view('pages/master_left_side'); ?>

<section>
	<div class="rightPanel" style="padding: 14px 20px; width:96%;">
		
		<div class='container-fluid editViewContainer'>
			<form class="form-horizontal recordEditView" id="EditView" name="EditView" method="post" action="#" enctype="multipart/form-data">
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">Creating New Prefix</h3>
					<span class="pull-right">
						<button class="btn-success save" value="Save"  type="submit" name="prefix_add_details" id="prefix_add_details"><strong>Save</strong></button>
						 <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </span>
                </div>
                
                <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">Prefix Details</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Prefix Model
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="prefix_modelError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                       <select class="chzn-select " name="prefix_model" id="prefix_model">
                                        <option value="">Select an Option</option>
                                         <?php if(isset($prefixmodule) && !empty($prefixmodule)) { foreach($prefixmodule as $MO) { ?>
                                            <option value="<?php echo $MO['module_id']; ?>"><?php echo $MO['module_name']; ?></option><?php } } ?>
                                        </select>
                                    </span>
                                 </div>
                             </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Prefix Name</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="pre_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="prefix_name" name="prefix_name" type="text" class="input-large uppercase" />
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                          <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Prefix Description</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="uom_descError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <textarea id="prefix_desc" name="prefix_desc" type="text" class="input-large nameField" /></textarea>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
                
						
                <br>
                
                <div class="row-fluid">
                    <div class="pull-right">
                        <button class="btn-success save" value="save" type="submit" name="prefix_add_details" id="prefix_add_details"><strong>Save</strong></button>
                        <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <br>
            
            </form>
				
          </div>

      </div>

</section>
