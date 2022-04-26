
<?php echo $this->load->view('pages/master_left_side'); ?>

<section>
	<div class="rightPanel" style="padding: 14px 20px; width:96%;">
		
		<div class='container-fluid editViewContainer'>
			<form class="form-horizontal recordEditView" id="EditView" name="EditView" method="post" action="#" enctype="multipart/form-data">
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">View User</h3>
					<span class="pull-right">
						<!--<button class="btn-success save" value="Save"  type="submit" name="users_add_details" id="users_add_details"><strong>Save</strong></button>-->
						 <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
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
                                        <?php if(isset($usr->user_first_name)){ echo $usr->user_first_name;}?>
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
                                        <?php if(isset($usr->user_last_name)){ echo $usr->user_last_name;}?>
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
                                        <?php if(isset($usr->user_phone)){ echo $usr->user_phone;}?>
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
                                        <?php if(isset($usr->user_email)){ echo $usr->user_email;}?>
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
                                        <?php if(isset($usr->user_name)){ echo $usr->user_name;}?>
                                    </span>
                                 </div>
                             </td>
                            <!--<td class="fieldLabel medium">
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
                                        <input id="password" name="password" type="text" class="input-large nameField" />
                                    </span>
                                </div>
                            </td>-->
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
                                        <select class="chzn-select assigned_user_id" id="user_gup_name"  name="user_gup_name" disabled="" >
                        
                         <?php foreach($usr_gup as $usr_gup) { ?>
                                    <option value="<?php echo $usr_gup['group_id']; ?>" <?php if($usr->user_group_id == $usr_gup['group_id']) { ?> selected="selected" <?php } ?> ><?php echo $usr_gup['group_name']; ?></option>
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
                                 
                                            <!--<option value="">Select an Option</option>-->
                                             <?php if(isset($usr->user_company_id)){ echo $usr->company_short_name;}?> 
                                        
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
                      <?php if(isset($usr->user_address)){ echo $usr->user_address;}?>
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
                                        <select class="chzn-select assigned_user_id" id="con_name" name="con_name" disabled="" >
                        
                         <?php foreach($ctry as $Con) { 
                                
                                
                                ?>
                                    <option value="<?php echo $Con['country_id']; ?>" <?php if(isset($userdata['user_country'])) { if($userdata['user_country'] ==  $usr['user_country']) { ?> selected="selected" <?php } } ?> ><?php echo $Con['country_name']; ?></option>
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
                                        <select class="chzn-select assigned_user_id" id="state_name" name="state_name" disabled="" >
                        
                          <?php foreach($state as $state) { 
                                
                                
                                ?>
                                    <option value="<?php echo $state['state_id']; ?>" <?php if(isset($userdata['user_state'])) { if($userdata['user_state'] ==  $usr['user_state']) { ?> selected="selected" <?php } } ?> ><?php echo $state['state_name']; ?></option>
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
                                        <select class="chzn-select assigned_user_id" id="city_name" name="city_name" disabled="" >
                        
                         <?php foreach($city as $city) { 
                                
                                
                                ?>
                                    <option value="<?php echo $city['city_id']; ?>" <?php if(isset($userdata['user_city'])) { if($userdata['user_city'] ==  $usr['user_city']) { ?> selected="selected" <?php } } ?> ><?php echo $city['city_name']; ?></option>
                                <?php } ?>
                      </select>
                                    </span>
                                 </div>
                             </td>
                             </tr>
                             <tr>
                        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Zip Code</label></td>
                      <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
                      <?php if(isset($usr->user_zipcode)){ echo $usr->user_zipcode;}?>
                      </span></div></td>
                        </tr>
              </tbody>
            </table>

            </br>
                
                <div class="row-fluid">
                    <div class="pull-right">
                       <!-- <button class="btn-success save" value="save" type="submit" name="users_add_details" id="users_add_details"><strong>Save</strong></button>-->
                        <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <br>
            
            </form>
				
          </div>

      </div>

</section>
