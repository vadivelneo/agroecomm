<script language="javascript" type="text/javascript">
$(document).ready(function()
{
 $('.formError').css("display","none");
  
  $('.save').click(function()
  { 
    var uom_name = $("#uom_name").val();
    var uom_desc = $("#uom_desc").val();
     
    if(uom_name == "" )
    {
      $('#uom_nameError').css("display","block");
      $('#uom_name').focus(); 
      return false;
    }
    else
    {
    $('#uom_nameError').css("display","none");
    }

    if(uom_desc == "")
    {
      $('#uom_descError').css("display","block");
      $('#uom_desc').focus();  
      return false;
    }
      else
    {
      $('#uom_descError').css("display","none");
    }
     
  });
    
});
</script>

<?php echo $this->load->view('pages/master_left_side'); ?>

<section>
	<div class="rightPanel" style="padding: 14px 20px; width:96%;">
		
		<div class='container-fluid editViewContainer'>
			<form class="form-horizontal recordEditView" id="EditView" name="EditView" method="post" action="#" enctype="multipart/form-data">
            <br />
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">Creating New UOM</h3>
					<span class="pull-right">
						<button class="btn-success save" value="Save"  type="submit" name="uom_add_details" id="uom_add_details"><strong>Save</strong></button>
                        <button class="btn-success add_reset" value="reset" type="reset" name="add_reset" id="cus_add_reset"><strong>Reset</strong></button>
						 <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </span>
                </div>
               
                <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">UOM Details</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>UOM Name
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="uom_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="uom_name" name="uom_name" type="text" class="input-large nameField" />
                                    </span>
                                 </div>
                             </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>UOM Description</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="uom_descError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="uom_desc" name="uom_desc" type="text" class="input-large nameField" />
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
                
						
                <br>
                
                <div class="row-fluid">
                    <div class="pull-right">
                        <button class="btn-success save" value="save" type="submit" name="uom_add_details" id="uom_add_details"><strong>Save</strong></button>
                        <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <br>
            
            </form>
				
          </div>

      </div>

</section>
