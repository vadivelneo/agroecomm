<script language="javascript" type="text/javascript">
$(document).ready(function()
{

    $("#con_number").keypress(function (e)
    {
         if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
         {  
          alert("Numbers Only ")
             return false;
         }
    });

 $('.formError').css("display","none");
 
  $('.save').click(function()
  { 
    //alert('hi');return false;
    var con_location = $("#con_location").val();
    var con_number = $("#con_number").val();
    var con_address = $("#con_address").val();

    if(con_location == "" )
    {
      $('#con_locationError').css("display","block");
      $('#con_location').focus(); 
      return false;
    }
    else
    {
    $('#con_locationError').css("display","none");
    }

    if(con_number == "" )
    {
      $('#con_numberError').css("display","block");
      $('#con_number').focus(); 
      return false;
    }
    else if(Ismobile(con_number)==false)
    {
      $('#con_numberError').css("display","block");
      $('#con_number').focus(); 
      return false;
    }
    else
    {
    $('#con_numberError').css("display","none");
    }

    if(con_address == "" )
    {
      $('#con_addressError').css("display","block");
      $('#con_address').focus(); 
      return false;
    }
    else
    {
    $('#con_addressError').css("display","none");
    }
     
  });

  function Ismobile(con_number)
{
    if (con_number.match(/^\d{10}$/)) {
    return true;
    } 
    else 
    {
    return false;
    }
}
    
});
</script>

<?php echo $this->load->view('pages/master_left_side'); ?>

<section>
  <div class="rightPanel" style="padding: 14px 20px; width:96%;">
    
    <div class='container-fluid editViewContainer'>
      <form class="form-horizontal recordEditView" id="EditView" name="EditView" method="post" action="#" enctype="multipart/form-data">
        <div class="contentHeader row-fluid">
          <h3 class="span8 textOverflowEllipsis">Update Location</h3>
          <span class="pull-right">
            <button class="btn-success save" value="Save"  type="submit" name="con_loc_edit_details" id="con_loc_edit_details"><strong>Update</strong></button>
             <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </span>
                </div>
                
                <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">Location Details</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Location</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="con_locationError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="con_location" name="con_location" type="text" value="<?php if(isset($locationdata->location_name)){ echo $locationdata->location_name;}?>" class="input-large nameField" />
                                    </span>
                                </div>
                            </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Mobile Number</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="con_numberError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*please enter valid mobile number</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                     <input type="text" class="input-large" id="con_number" value="<?php if(isset($locationdata->location_phone)){ echo $locationdata->location_phone;}?>" name="con_number" />
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                          <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Address</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="con_addressError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <textarea id="con_address" name="con_address" type="text" class="input-large nameField" /><?php if(isset($locationdata->location_address)){ echo $locationdata->location_address;}?></textarea>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
                
            
                <br>
                
                <div class="row-fluid">
                    <div class="pull-right">
                        <button class="btn-success save" value="save" type="submit" name="con_loc_edit_details" id="con_loc_edit_details"><strong>Update</strong></button>
                        <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <br>
            
            </form>
        
          </div>

      </div>

</section>
