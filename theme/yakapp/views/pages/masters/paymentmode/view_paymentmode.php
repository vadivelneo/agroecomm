<script language="javascript" type="text/javascript">
$(document).ready(function()
{
 $('.formError').css("display","none");
  
  $('.save').click(function()
  { 
    //alert('hi');return false;
    var pay_mode_name = $("#pay_mode_name").val();

    if(pay_mode_name == "" )
    {
      $('#pay_mode_nameError').css("display","block");
      $('#pay_mode_name').focus(); 
      return false;
    }
    else
    {
    $('#pay_mode_nameError').css("display","none");
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
          <h3 class="span8 textOverflowEllipsis">View Payment Mode</h3>
          <span class="pull-right">
           
             <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </span>
                </div>
                
                <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">Payment Mode Details</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Payment Mode</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="pay_mode_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                       <?php if(isset($paymentmodedata->payment_mode_name)){ echo $paymentmodedata->payment_mode_name;}?>
                                    </span>
                                </div>
                            </td>
                    
                          <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Payment Mode Description</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="manu_descError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <?php if(isset($paymentmodedata->payment_mode_description)){ echo $paymentmodedata->payment_mode_description;}?>
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
