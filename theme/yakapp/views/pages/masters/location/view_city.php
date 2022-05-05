<script language="javascript" type="text/javascript">
$(document).ready(function()
{
 $('.formError').css("display","none");
  
  $('.save').click(function()
  { 
    //alert('hi');return false;
    var con_name = $("#con_name").val();
    var state_name = $("#state_name").val();
    var city_name = $("#city_name").val();
    var city_code = $("#city_code").val();
     
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
    if(city_name == "")
    {
      $('#city_nameError').css("display","block");
      $('#city_name').focus();  
      return false;
    }
      else
    {
      $('#city_nameError').css("display","none");
    }
    if(city_code == "")
    {
      $('#city_codeError').css("display","block");
      $('#city_code').focus();  
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
			<form class="form-horizontal recordEditView" id="EditView" name="EditView" method="post" action="#" enctype="multipart/form-data">
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">View City</h3>
					<span class="pull-right">
						<!--<button class="btn-success save" value="Save"   type="submit" name="city_update_details" id="city_update_details"><strong>Save</strong></button>-->
						 <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </span>
                </div>
                
                <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">City Details</th>
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
                      <select class="chzn-select assigned_user_id" id="con_name" name="con_name" disabled="" >
                        
                         <?php foreach($ctry as $Con) { 
                                
                                
                                ?>
                                    <option value="<?php echo $Con['country_id']; ?>" <?php if(isset($cty->cty_country_id)) { if($cty->cty_country_id ==  $Con['country_id']) { ?> selected="selected" <?php } } ?>  ><?php echo $Con['country_name']; ?></option>
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
                                        <select class="chzn-select assigned_user_id" id="state_name" name="state_name" disabled="" >
                        
                         <?php foreach($state as $state) { 
                                
                                
                                ?>
                                    <option value="<?php echo $state['state_id']; ?>" <?php if(isset($cty->cty_state_id)) { if($cty->cty_state_id ==  $state['state_id']) { ?> selected="selected" <?php } } ?>  ><?php echo $state['state_name']; ?></option>
                                <?php } ?>
                      </select>
                                    </span>
                                 </div>
                             </td>
                             </tr>
                             <tr>
                             <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>City Name</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="city_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                       <?php if(isset($cty->city_name)){ echo $cty->city_name;}?>
                                    </span>
                                </div>
                            </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>City Code</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="city_codeError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <?php if(isset($cty->city_code)){ echo $cty->city_code;}?>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
                
						
                <br>
                
                <div class="row-fluid">
                    <div class="pull-right">
                       <!-- <button class="btn-success save" value="save" type="submit" name="city_update_details" id="city_update_details"><strong>Save</strong></button>-->
                        <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <br>
            
            </form>
				
          </div>

      </div>

</section>
