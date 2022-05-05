<?php  
$invite_single = explode(',', $edit_single_meeting->lead_met_invite);?>
<script language="javascript" type="text/javascript">
$(document).ready(function()
{ 
$('.formError').css("display","none");
  

  $('.save_meeting').click(function()
  { 
    
    var meeting_subject = $("#edit_meeting_subject").val();
    var assigned_to = $("#edit_assigned_to").val();
    var meeting_start_date = $("#edit_meeting_start_date").val();
    var meeting_end_date = $("#edit_meeting_end_date").val();
    var meeting_priority = $("#edit_meeting_priority").val();
 
   
    
     
    if(meeting_subject == "" )
    {
      $('#meeting_subjectError').css("display","block");
      $('#meeting_subject').focus(); 
      return false;
    }
    else
    {
    $('#meeting_subjectError').css("display","none");
    }
    if(assigned_to == "" )
    {
      $('#assigned_toError').css("display","block");
      $('#assigned_to').focus(); 
      return false;
    }
    else
    {
    $('#assigned_toError').css("display","none");
    }
    if(meeting_start_date == "" )
    {
      $('#meeting_start_dateError').css("display","block");
      $('#meeting_start_date').focus(); 
      return false;
    }
    else
    {
    $('#meeting_start_dateError').css("display","none");
    }

    if(meeting_end_date == "" )
    {
      $('#meeting_end_dateError').css("display","block");
      $('#meeting_end_date').focus(); 
      return false;
    }
    else
    {
    $('#meeting_end_dateError').css("display","none");
    }

    if(meeting_priority == "" )
    {
      $('#meeting_priorityError').css("display","block");
      $('#meeting_priority').focus(); 
      return false;
    }
    else
    {
    $('#meeting_priorityError').css("display","none");
    }
  
  });
  
   $('#edit_meeting_start_date, #edit_meeting_end_date').datetimepicker(); 

    
});
</script>

 
<div class="p-popup">

  	
<form action="<?php echo site_url('leads/update_meeting').'/'.$this->uri->segment('3'); ?>" method="post" id="convertLeadForm" class="form-horizontal">
<div class="p-popup"> <a class="close"><img src="<?php echo base_url(); ?>/resources/images/close-button.png" width="25" /></a>
  <div class="title_head">
    <p>Schedule Meeting</p>
        
        </div>

  
  
         
          <div class="Accounts_FieldInfo accordion-body collapse fieldInfo  in">
            <table class="table table-bordered moduleBlock">
              <tbody>
              <tr>
				<td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor">*</span>Subject</label></td>

				<td class="fieldValue medium" > <div class="row-fluid"><span class="span10">
				<div class="row-fluid"><span class="span10">
				<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="meeting_subjectError" style="margin-top: -30px;  ">
				<div class="formErrorContent">* Enter Subject<br></div>
				<div class="formErrorArrow"><div class="line10"></div>
				</div>
				</div> 
				</span>
				</div>
				</span>
				</div>
				<input id="edit_meeting_subject" name="edit_meeting_subject" value="<?php if(isset($edit_single_meeting->lead_met_subject)){ echo $edit_single_meeting->lead_met_subject;}?>" class="input-large" />
				<input id="edit_meeting_id" name="edit_meeting_id" value="<?php if(isset($met_id)) { echo $met_id; } ?>" type= "hidden" class="input-large" />
				<input id="lead_id" name="lead_id" value="<?php if(isset($lead_id)) { echo $lead_id; } ?>" type= "hidden" class="input-large" />
				</span>
			

				</td>
				
				<td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor"></span>Assigned To</label></td>

				<td class="fieldValue medium" > <div class="row-fluid"><span class="span10">
				<div class="row-fluid"><span class="span10">
				<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="assigned_toError" style="margin-top: -30px;  ">
				<div class="formErrorContent">This field is required<br></div>
				<div class="formErrorArrow"><div class="line10"></div>
				</div>
				</div> 
				</span>
				</div>
				</span>
				</div>
				<select class="chzn-select " name="edit_assigned_to" id="edit_assigned_to">
                                             <?php if(isset($users) && !empty($users)) 
											 { 
											 foreach($users as $USR) 
											 { ?>
                                            <option value="<?php echo $USR['user_id']; ?>" <?php if($edit_single_meeting->lead_met_assign_to == $USR['user_id']) { ?> selected="selected"  <?php } ?> > <?php echo $USR['user_name']; ?> 
                                           </option>
										   
										   <?php } } ?>
                                        </select>
				
				</span>
			

				</td>

			  </tr> 
			  <tr>
				<td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor">*</span>Meeting Start Time</label></td>

				<td class="fieldValue medium" > <div class="row-fluid"><span class="span10">
				<div class="row-fluid"><span class="span10">
				<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="meeting_start_dateError" style="margin-top: -30px;  ">
				<div class="formErrorContent">* This field is required<br></div>
				<div class="formErrorArrow"><div class="line10"></div>
				</div>
				</div> 
				</span>
				</div>
				</span>
				</div>
				<input id="edit_meeting_start_date" name="edit_meeting_start_date" value="<?php if(isset($edit_single_meeting->lead_met_meeting_start_time)){ echo $edit_single_meeting->lead_met_meeting_start_time;}?>"  class="input-large" />
				</span>
			

				</td>
				<td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor">*</span>Approx. End Time</label></td>

				<td class="fieldValue medium" > <div class="row-fluid"><span class="span10">
				<div class="row-fluid"><span class="span10">
				<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="meeting_end_dateError" style="margin-top: -30px;  ">
				<div class="formErrorContent">* This field is required<br></div>
				<div class="formErrorArrow"><div class="line10"></div>
				</div>
				</div> 
				</span>
				</div>
				</span>
				</div>
				<input id="edit_meeting_end_date" name="edit_meeting_end_date" value="<?php if(isset($edit_single_meeting->lead_met_meeting_end_time)){ echo $edit_single_meeting->lead_met_meeting_end_time;}?>"  class="input-large" />
				</span>
			

				</td>

				
			  </tr>
			  <tr>
				
				<td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor"></span>Contact name</label></td>
				<td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
				<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="contact_nameError" style="margin-top: -30px;">
				<div class="formErrorContent"> This field is required<br></div>
				<div class="formErrorArrow"><div class="line10"></div>
				</div>
				</div> 
				<input id="edit_contact_name" name="edit_contact_name" value="<?php if(isset($edit_single_meeting->lead_met_contact_name)){ echo $edit_single_meeting->lead_met_contact_name;}?>"  type="text" class="input-large " />
				</span>
				</div>
				</td>

				<td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor"></span>Contact Mobile</label></td>
				<td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
				<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="contact_nameError" style="margin-top: -30px;">
				<div class="formErrorContent">* This field is required<br></div>
				<div class="formErrorArrow"><div class="line10"></div>
				</div>
				</div> 
				<input id="edit_contact_mob" name="edit_contact_mob" value="<?php if(isset($edit_single_meeting->lead_met_contact_number)){ echo $edit_single_meeting->lead_met_contact_number;}?>"  type="text" class="input-large " />
				</span>
				</div>
				</td>
			  </tr>
			  <tr>
			  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor">*</span>Priority</label></td>

				<td class="fieldValue medium" > <div class="row-fluid"><span class="span10">
				<div class="row-fluid"><span class="span10">
				<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="meeting_priorityError" style="margin-top: -30px;  ">
				<div class="formErrorContent">*This field is required<br></div>
				<div class="formErrorArrow"><div class="line10"></div>
				</div>
				</div> 
				</span>
				</div>
				</span>
				</div>
				
			<select class="chzn-select " name="edit_meeting_priority" id="edit_meeting_priority">
               	<option value="high" <?php if(isset($edit_single_meeting->lead_met_priority)){if($edit_single_meeting->lead_met_priority == 'high.') { ?>selected="selected" <?php } } ?>>High</option>
				<option value="medium"<?php if(isset($edit_single_meeting->lead_met_priority)){if($edit_single_meeting->lead_met_priority == 'medium.') { ?>selected="selected" <?php } } ?>>Medium</option>
				<option value="low"<?php if(isset($edit_single_meeting->lead_met_priority)){if($edit_single_meeting->lead_met_priority == 'low.') { ?>selected="selected" <?php } } ?>>Low</option>
				
            </select>
				</span>
			

				</td>
				<td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor"></span>Status</label></td>

				<td class="fieldValue medium" > <div class="row-fluid"><span class="span10">
				<div class="row-fluid"><span class="span10">
				<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="meeting_statusError" style="margin-top: -30px;  ">
				<div class="formErrorContent">This field is required<br></div>
				<div class="formErrorArrow"><div class="line10"></div>
				</div>
				</div> 
				</span>
				</div>
				</span>
				</div>
				<select class="chzn-select " name="edit_meeting_status" id="edit_meeting_status">
                <option value="Not Started" <?php if(isset($edit_single_meeting->lead_met_meeting_status)){if($edit_single_meeting->lead_met_meeting_status == 'notstarted.') { ?>selected="selected" <?php } } ?>>Not Started.</option>
			   	<option value="inprocess"<?php if(isset($edit_single_meeting->lead_met_meeting_status)){if($edit_single_meeting->lead_met_meeting_status == 'inprocess.') { ?>selected="selected" <?php } } ?>>In Process</option>
				<option value="pendinginput"<?php if(isset($edit_single_meeting->lead_met_meeting_status)){if($edit_single_meeting->lead_met_meeting_status == 'pendinginput.') { ?>selected="selected" <?php } } ?>>Pending Input</option>
				<option value="deferred"<?php if(isset($edit_single_meeting->lead_met_meeting_status)){if($edit_single_meeting->lead_met_meeting_status == 'deferred.') { ?>selected="selected" <?php } } ?>>Deferred</option>
				<option value="planned"<?php if(isset($edit_single_meeting->lead_met_meeting_status)){if($edit_single_meeting->lead_met_meeting_status == 'planned.') { ?>selected="selected" <?php } } ?>>Planned</option>
				<option value="completed"<?php if(isset($edit_single_meeting->lead_met_meeting_status)){if($edit_single_meeting->lead_met_meeting_status == 'completed.') { ?>selected="selected" <?php } } ?>>Completed</option>
               </select>
				</span>
			

				</td>

				
			  </tr>
			  <tr>
				<td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor"></span>Location</label></td>

				<td class="fieldValue medium" > <div class="row-fluid"><span class="span10">
				<div class="row-fluid"><span class="span10">
				<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="meeting_locError" style="margin-top: -30px;  ">
				<div class="formErrorContent">This field is required<br></div>
				<div class="formErrorArrow"><div class="line10"></div>
				</div>
				</div> 
				</span>
				</div>
				</span>
				</div>
				<input id="edit_meeting_loc" name="edit_meeting_loc" value="<?php if(isset($edit_single_meeting->lead_met_location)){ echo $edit_single_meeting->lead_met_location;}?>"  class="input-large" />
				</span>
			

				</td>
				<td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor"></span>Invite</label></td>
				<td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
				<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="inviteError" style="margin-top: -30px;">
				<div class="formErrorContent"> This field is required<br></div>
				<div class="formErrorArrow"><div class="line10"></div>
				</div>
				</div> 
				  <select name="edit_invite[]" multiple id="edit_invite"  multiple="multiple">                              
					
					<?php foreach($users as $USR) { ?>
						 <option value="<?php echo $USR['user_id']; ?>" <?php if(in_array($USR['user_id'], $invite_single) == '1') { ?> selected="selected" <?php } ?> > <?php echo $USR['user_name']; ?> 
                         </option>
					<?php } ?>
					
				</select>  
				
				
				
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
						<textarea class="row-fluid" id="edit_description"  name="edit_description"><?php if(isset($edit_single_meeting->lead_met_descript)){ echo $edit_single_meeting->lead_met_descript;}?> </textarea>
					</span>
				</div>
				</td>
				<td class="fieldValue medium"></td>
				
			   </tr>              
              </tbody>
            </table>
		<div class="row-fluid">
          <div class="pull-right">
            <button class="btn-success return_add_details save_meeting" type="submit" id="update_meeting" name="update_meeting"><strong>Update</strong></button>
          
          <div class="clearfix"></div>
        </div>
          </div>
          </div>
       
</form>   
</div>