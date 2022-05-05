 <script src="<?php echo base_url(); ?>resources/js/MD5encrypt.js"></script>



<script>

function md5(value)

{

    return CryptoJS.MD5(value).toString();

}

</script>

 

<script type="text/javascript">

$(document).ready(function()

{
	$('#currentPassword').focus();

	

	$('.changePwd').click(function()

	{

		var currentUserPwd = $("#currentUserPwd").val();

		var currentPassword = $("#currentPassword").val();

		var newPassword = $("#newPassword").val();

		var confirmPassword = $("#confirmPassword").val();
		
		var md5CurrentPwd = md5(currentPassword);

		if(currentPassword == "")

		{	$(".formError").css("display",'none');
			$('#currentPasswordError').css("display","block");
			$('#currentPassword').focus(); 
			return false;
		}

		else if(md5CurrentPwd != currentUserPwd)

		{
			$(".formError").css("display",'none');
			$('#currentPasswordmatchError').css("display","block");
			$('#currentPassword').focus(); 
			return false;

		}

	    else

		{
			$(".formError").css("display",'none');
			
		}
			
		if(newPassword == "")

		{	
			$(".formError").css("display",'none');
			$('#newPasswordError').css("display","block");
			$('#newPassword').focus(); 
			return false;
		}

	    else

		{
			$(".formError").css("display",'none');

		}

		

		if(confirmPassword == "")

		{

			$('#confirmPasswordError').css("display","block");
			$('#confirmPassword').focus(); 
			return false;

		}

		else if(newPassword != confirmPassword)

		{		
			$(".formError").css("display",'none');
			$('#confirmPasswordmatchError').css("display","block");
			$('#confirmPassword').focus(); 
			return false;
		}

	    else

		{

			$(".formError").css("display",'none');

		}

		

		

	});

	

});



</script>

 

<?php echo $this->load->view('pages/profile_left_side'); ?>


<section>
	<div class="rightPanel" style="padding: 14px 20px; width:96%;">
		
		<div class='container-fluid editViewContainer'>
			<form class="form-horizontal recordEditView" id="EditView" name="EditView" method="post" action="#" enctype="multipart/form-data">
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">Change Password</h3>
					<span class="pull-right">
					
						<button class="btn-success save changepwd" value="Save"  type="submit" name="changepwd" id="changepwd"><strong>Update</strong></button>
						 <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </span>
                </div>
                <div class="sessionMsg"><?php echo $this->session->flashdata('message'); ?></div>
                <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">Password Details</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Old Password
                                </label>
									
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="currentPasswordError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*Please enter the Current Password</div>
                                            <div class="formErrorArrow"></div>
                                         </div> 
										 <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="currentPasswordmatchError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*Password Not Match</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                       <input type="password" name="currentPassword" id="currentPassword"  />
							<input type="hidden" name="currentUserPwd" id="currentUserPwd" value="<?php echo $password->user_pwd; ?>" />
                                    </span>
                                 </div>
                             </td>
                            
                        </tr>
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                New Password
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
										<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="newPasswordError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="newPassword" name="newPassword"  type="password" class="input-large nameField" />
                                    </span>
                                 </div>
                             </td>
                            
                        </tr>
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Confirm New Password
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="confirmPasswordError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div> 
										 <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="confirmPasswordmatchError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*Password Not Match   </div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="confirmPassword" name="confirmPassword"  type="password" class="input-large nameField" />
                                    </span>
                                 </div>
                             </td>
                            
                            
                        </tr>                        
                    </tbody>
                </table>
                
						
                <br>

                
            </br>
                
                <div class="row-fluid">
                    <div class="pull-right">
                        <button class="btn-success save changepwd" value="save" type="submit" name="changepwd" id="changepwd"><strong>Update</strong></button>
                        <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <br>
            
            </form>
				
          </div>

      </div>

</section>
