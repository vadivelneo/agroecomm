<script language="javascript" type="text/javascript">
$(document).ready(function()
{
 $('.formError').css("display","none");
  
  $('.save').click(function()
  { 
    //alert('hi');return false;
    var con_name = $("#con_name").val();
    var state_name = $("#state_name").val();
    var state_code = $("#state_code").val();
     
    if(con_name == "" )
    {
      $('#con_nameError').css("display","block");
      $('#con_name').focus(); 
      return false;
    }
    else
    {
    $('#con_nameError').css("display","none");
    }

    if(state_name == "")
    {
      $('#state_nameError').css("display","block");
      $('#state_name').focus();  
      return false;
    }
      else
    {
      $('#state_nameError').css("display","none");
    }
    if(state_code == "")
    {
      $('#state_codeError').css("display","block");
      $('#state_code').focus();  
      return false;
    }
      else
    {
      $('#state_codeError').css("display","none");
    }
     
  });
    
});
</script>

<?php echo $this->load->view('pages/master_left_side'); ?>

<section>
	<div class="rightPanel" style="padding: 14px 20px; width:96%;">
		
		<div class='container-fluid editViewContainer'>
			<form class="form-horizontal recordEditView" id="EditView" name="EditView" method="post" action="#" enctype="multipart/form-data"><br />
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">Creating New State</h3>
					<span class="pull-right">
						<button class="btn-success save" value="Save"  type="submit" name="state_add_details" id="state_add_details" ><strong>Save</strong></button>
                        <button class="btn-success add_reset" value="reset" type="reset" name="add_reset" id="add_reset"><strong>Reset</strong></button>
						 <a class="cancelLink btn-success" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </span>
                </div>
                
                <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">State Details</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor">*</span>Select Country</label></td>
                  <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="con_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                      <select class="chzn-select assigned_user_id" id="con_name" name="con_name" >
                        <option value="">Select an Option</option>
                         <?php foreach($country as $Con) { 
                                
                                
                                ?>
                                    <option value="<?php echo $Con['country_id']; ?>"  ><?php echo $Con['country_name']; ?></option>
                                <?php } ?>
                      </select>
                      </span></div></td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>State Name
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="state_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="state_name" name="state_name" type="text" class="input-large nameField" />
                                    </span>
                                 </div>
                             </td>
                             </tr>
                             <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>State Code</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="state_codeError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="state_code" name="state_code" type="text" class="input-large nameField" />
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
                
						
                <br>
                
                <div class="row-fluid">
                    <div class="pull-right">
                        <button class="btn-success save" value="save" type="submit" name="state_add_details" id="state_add_details"><strong>Save</strong></button>
                        <button class="btn-success add_reset" value="reset" type="reset" name="add_reset" id="add_reset"><strong>Reset</strong></button>
						 <a class="cancelLink btn-success" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <br>
            
            </form>
				
          </div>

      </div>

</section>
