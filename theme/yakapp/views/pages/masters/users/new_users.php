<script language="javascript" type="text/javascript">
$(document).ready(function()
{
 $('.formError').css("display","none");
  
  $('.save').click(function()
  { 
    //alert('hi');return false;
    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var email = $("#email").val();
    var username = $("#username").val();
    var password = $("#password").val();
    var user_gup_name = $("#user_gup_name").val();
    var con_name = $("#con_name").val();
    var state_name = $("#state_name").val();
    var city_name = $("#city_name").val();
     
    if(first_name == "" )
    {
      $('#first_nameError').css("display","block");
      $('#first_name').focus(); 
      return false;
    }
    else
    {
    $('#first_nameError').css("display","none");
    }

    if(last_name == "")
    {
      $('#last_nameError').css("display","block");
      $('#last_name').focus();  
      return false;
    }
      else
    {
      $('#last_nameError').css("display","none");
    }

    if(email == "" )
    {
      $('#emailError').css("display","block");
       $('#email').focus();
      return false;
    }
    else if(IsEmail(email)==false)
    { 
      $('#emailError').css("display","block"); 
      $('#email').focus();
      return false;
    }
    else
    {
    $('#emailError').css("display","none");
    } 

    if(username == "" )
    {
      $('#usernameError').css("display","block");
      $('#username').focus(); 
      return false;
    }
    else
    {
    $('#usernameError').css("display","none");
    }

    if(password == "" )
    {
      $('#passwordError').css("display","block");
      $('#password').focus(); 
      return false;
    }
    else
    {
    $('#passwordError').css("display","none");
    }

     if(password == "" )
    {
      $('#passwordError').css("display","block");
      $('#password').focus(); 
      return false;
    }
    else
    {
    $('#passwordError').css("display","none");
    }

     if(user_gup_name == "" )
    {
      $('#usergroupnameError').css("display","block");
      $('#user_gup_name').focus(); 
      return false;
    }
    else
    {
    $('#usergroupnameError').css("display","none");
    }
    if(con_name == "" )
    {
      $('#country_nameError').css("display","block");
      $('#con_name').focus(); 
      return false;
    }
    else
    {
    $('#country_nameError').css("display","none");
    }
    if(state_name == "" )
    {
      $('#state_nameError').css("display","block");
      $('#state_name').focus(); 
      return false;
    }
    else
    {
    $('#state_nameError').css("display","none");
    }
    if(city_name == "" )
    {
      $('#city_nameError').css("display","block");
      $('#city_name').focus(); 
      return false;
    }
    else
    {
    $('#city_nameError').css("display","none");
    }


  function IsEmail(email)
  {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(email)) 
    {
      return false;
    }
    else
    {
      return true;
    }
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
					<h3 class="span8 textOverflowEllipsis">Creating New Users</h3>
					<span class="pull-right">
						<button class="btn-success save" value="Save"  type="submit" name="users_add_details" id="users_add_details"><strong>Save</strong></button>
						 <button class="btn-success add_reset" value="reset" type="reset" name="add_reset" id="cus_add_reset"><strong>Reset</strong></button>
						 <a class="cancelLink btn-success" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </span>
                </div>
                
                <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">User Details</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>First Name
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="first_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*Please enter the first name</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="first_name" name="first_name" type="text" class="input-large nameField" />
                                    </span>
                                 </div>
                             </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Last Name</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="last_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*Please enter the last name</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="last_name" name="last_name" type="text" class="input-large nameField" />
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                Mobile Number
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <input id="mob" name="mob" type="text" class="input-large nameField" />
                                    </span>
                                 </div>
                             </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>EMail</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="emailError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*Please enter valid email</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="email" name="email" type="text" class="input-large nameField" />
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>User Name
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="usernameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="username" name="username" type="text" class="input-large nameField" />
                                    </span>
                                 </div>
                             </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                <span class="redColor">*</span>Password</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="passwordError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="password" name="password" type="password" class="input-large nameField" />
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>User Group Name
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="usergroupnameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <select class="chzn-select assigned_user_id" id="user_gup_name" name="user_gup_name" >
                        <option value="">Select an Option</option>
                         <?php foreach($usr_gup as $usr_gup) { 
                                
                                
                                ?>
                                    <option value="<?php echo $usr_gup['group_id']; ?>"  ><?php echo $usr_gup['group_name']; ?></option>
                                <?php } ?>
                      </select>
                                    </span>
                                 </div>
                             </td>
                             <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                <span class="redColor">*</span>Company</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="companyError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <select name="company" class="chzn-select" id="company">
                                             <?php if(isset($company_srt_name) && !empty($company_srt_name)) { foreach($company_srt_name as $COM) { ?>
                                            <option value="<?php echo $COM['company_id']; ?>"><?php echo $COM['company_short_name']; ?></option><?php } } ?>
                                        </select>
                                    </span>
                                </div>
                            </td>
                            
                        </tr>                        
                    </tbody>
                </table>
                
						
                <br>

                <table class="table table-bordered blockContainer showInlineTable equalSplit">
              <thead>
                <tr>
                  <th class="blockHeader" colspan="4">User Address Details</th>
                </tr>
              </thead>
              <tbody>
                  <tr>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Street Address</label></td>
                  <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
                      <textarea class="row-fluid" name="street" id="street" ></textarea>
                      </span></div>
                  </td>
                  <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Country
                                </label>
                  </td>
                  <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="country_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <select class="chzn-select assigned_user_id" id="con_name" name="con_name" >
                        <option value="">Select an Option</option>
                         <?php foreach($ctry as $Con) { 
                                
                                
                                ?>
                                    <option value="<?php echo $Con['country_id']; ?>"  ><?php echo $Con['country_name']; ?></option>
                                <?php } ?>
                      </select>
                                    </span>
                                 </div>
                             </td>
                  </tr>
                  <tr>
                  <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>State
                                </label>
                  </td>
                  <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="state_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <select class="chzn-select assigned_user_id" id="state_name" name="state_name" >
                        <option value="">Select an Option</option>
                          <?php foreach($state as $state) { 
                                
                                
                                ?>
                                    <option value="<?php echo $state['state_id']; ?>"  ><?php echo $state['state_name']; ?></option>
                                <?php } ?>
                      </select>
                                    </span>
                                 </div>
                             </td>
                             <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>City
                                </label>
                  </td>
                  <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="city_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <select class="chzn-select assigned_user_id" id="city_name" name="city_name" >
                        <option value="">Select an Option</option>
                         <?php foreach($city as $city) { 
                                
                                
                                ?>
                                    <option value="<?php echo $city['city_id']; ?>"  ><?php echo $city['city_name']; ?></option>
                                <?php } ?>
                      </select>
                                    </span>
                                 </div>
                             </td>
                             </tr>
                             <tr>
                        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Zip Code</label></td>
                      <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
                      <input id="zip_code" name="zip_code" type="text" class="input-large " />
                      </span></div></td>
                        </tr>
              </tbody>
            </table>

            </br>
                
                <div class="row-fluid">
                    <div class="pull-right">
                        <button class="btn-success save" value="save" type="submit" name="users_add_details" id="users_add_details"><strong>Save</strong></button>
                        <button class="btn-success add_reset" value="reset" type="reset" name="add_reset" id="cus_add_reset"><strong>Reset</strong></button>
						 <a class="cancelLink btn-success" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <br>
            
            </form>
				
          </div>

      </div>

</section>
