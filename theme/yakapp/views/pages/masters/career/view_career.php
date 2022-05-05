<script language="javascript" type="text/javascript">
$(document).ready(function()
{
 $('.formError').css("display","none");
  
  $('.save').click(function()
  { 
    //alert('hi');return false;
    var career_name = $("#career_name").val();
    var career_address = $("#career_address").val();
     
    if(career_name == "" )
    {
      $('#career_nameError').css("display","block");
      $('#career_name').focus(); 
      return false;
    }
    else
    {
    $('#career_nameError').css("display","none");
    }
    if(description == "")
    {
      $('#career_addressError').css("display","block");
      $('#description').focus();  
      return false;
    }
      else
    {
      $('#career_addressError').css("display","none");
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
          <h3 class="span8 textOverflowEllipsis">View Carrier</h3>
          <span class="pull-right">
           
             <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </span>
                </div>
                
                <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">Carrier Details</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Carrier Name
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="career_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <?php if(isset($career_val->shipping_carrier_name)){ echo $career_val->shipping_carrier_name;}?>
                                    </span>
                                 </div>
                             </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Address
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                    <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="career_addressError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <?php if(isset($career_val->shipping_carrier_address)){ echo $career_val->shipping_carrier_address;}?>
                                    </span>
                                 </div>
                             </td>
                        </tr>
                        <tr>
                        <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    Description
                                </label>
                            </td>
                          <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <?php if(isset($career_val->shipping_carrier_descrption)){ echo $career_val->shipping_carrier_descrption;}?>
                                    </span>
                                 </div>
                             </td>

                        </tr>
                        
                    </tbody>
                </table>
                
            
                <br>
                
                <div class="row-fluid">
                    <div class="pull-right">
                        
                        <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <br>
            
            </form>
        
          </div>

      </div>

</section>
