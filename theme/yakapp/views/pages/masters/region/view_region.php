<script language="javascript" type="text/javascript">
$(document).ready(function()
{
 $('.formError').css("display","none");
  
  $('.save').click(function()
  { 
    //alert('hi');return false;
      
    var region_name = $("#region_name").val();
    var region_code = $("#region_code").val();
     
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

    if(region_code == "")
    {
      $('#region_codeError').css("display","block");
      $('#region_code').focus();  
      return false;
    }
      else
    {
      $('#region_codeError').css("display","none");
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
					<h3 class="span8 textOverflowEllipsis">View Region</h3>
					<span class="pull-right">
						
						 <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </span>
                </div>
                
                <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">Region Details</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        
                             <tr>
                             <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>City Name</label>
                            </td>
                            <td class="fieldValue medium" >
                               <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="region_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                       
                                    </span>
                                </div>
                                        <?php if(isset($region->region_name)){ echo $region->region_name;}?>
                            </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>City Code</label>
                            </td>
                            <td class="fieldValue medium" >
                                 <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="region_codeError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <?php if(isset($region->region_code)){ echo $region->region_code;}?>
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
