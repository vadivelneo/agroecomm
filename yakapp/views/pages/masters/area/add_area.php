<script language="javascript" type="text/javascript">
$(document).ready(function()
{
 $('.formError').css("display","none");
  
  $('.save').click(function()
  { 
    //alert('hi');return false;
    var region_name = $("#region_name").val();
	 var zone_name = $("#zone_name").val();
    var area_name = $("#area_name").val();
    var area_code = $("#area_code").val();
     
    if(region_name == "" )
    {
      $('#region_nameError').css("display","block");
      $('#region_name').focus(); 
      return false;
    }
    else
    {
    $('#region_nameError').css("display","none");
    }
	 

    if(zone_name == "")
    {
      $('#zone_nameError').css("display","block");
      $('#zone_name').focus();  
      return false;
    }
      else
    {
      $('#zone_nameError').css("display","none");
    }
	if(area_name== "")
    {
      $('#area_nameError').css("display","block");
      $('#area_name').focus();  
      return false;
    }
      else
    {
      $('#area_nameError').css("display","none");
    }
    if(area_code == "")
    {
      $('#area_codeError').css("display","block");
      $('#area_code').focus();  
      return false;
    }
      else
    {
      $('#area_codeError').css("display","none");
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
					<h3 class="span8 textOverflowEllipsis">Creating New Area</h3>
					<span class="pull-right">
						<button class="btn-success save" value="Save"  type="submit" name="state_add_details" id="state_add_details" ><strong>Save</strong></button>
						 <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </span>
                </div>
                
                <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">Area Details</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor">*</span>Select Region</label></td>
                  <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="region_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                      <select class="chzn-select assigned_user_id" id="region_name" name="region_name" >
                        <option value="">Select an Option</option>
                         <?php foreach($region as $Region) { 
                                
                                
                                ?>
                                    <option value="<?php echo $Region['region_id']; ?>"  ><?php echo $Region['region_name']; ?></option>
                                <?php } ?>
                      </select>
                      </span></div>
                  
                      </td>
                           <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor">*</span>Select Zone</label></td>
                  <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="zone_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                      <select class="chzn-select assigned_user_id" id="zone_name" name="zone_name" >
                        <option value="">Select an Option</option>
                         <?php foreach($zone as $Zone) { 
                                
                                
                                ?>
                                    <option value="<?php echo $Zone['zone_id']; ?>"  ><?php echo $Zone['zone_name']; ?></option>
                                <?php } ?>
                      </select>
                      </span></div>
                  
                      </td>
                          
                             </tr>
                             <tr>
                             <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Area Name
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="area_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="area_name" name="area_name" type="text" class="input-large nameField" />
                                    </span>
                                 </div>
                             </td>
                             
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Area Code</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="area_codeError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="area_code" name="area_code" type="text" class="input-large nameField" />
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
                        <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <br>
            
            </form>
				
          </div>

      </div>

</section>
