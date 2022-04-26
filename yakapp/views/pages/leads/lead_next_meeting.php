<script language="javascript" type="text/javascript">
$(document).ready(function()
{ 
$('.formError').css("display","none");
  

  $('.save_meeting').click(function()
  { 
    
    var meeting_subject = $("#meeting_subject").val();
    var assigned_to = $("#assigned_to").val();
    var meeting_start_date = $("#meeting_start_date").val();
    var meeting_end_date = $("#meeting_end_date").val();
    var meeting_priority = $("#meeting_priority").val();
 
   
    
     
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
  
   $('#meeting_start_date, #meeting_end_date').datetimepicker(); 

    
});
</script>

 

<form action="<?php echo site_url('leads/add_meeting').'/'.$this->uri->segment('3'); ?>" method="post" id="convertLeadForm" class="form-horizontal">
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
				<input id="meeting_subject" name="meeting_subject" class="input-large" />
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
				<select class="chzn-select " name="assigned_to" id="assigned_to">
              <?php foreach($users as $USR) { ?>
			<option value="<?php echo $USR['user_id']; ?>" <?php if($userid == $USR['user_id']) { ?> selected="selected" <?php } ?>>
				<?php echo $USR['user_name']; ?>
			</option>
				<?php } ?>
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
				<input id="meeting_start_date" name="meeting_start_date" class="input-large" />
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
				<input id="meeting_end_date" name="meeting_end_date" class="input-large" />
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
				<input id="contact_name" name="contact_name" type="text" class="input-large " />
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
				<input id="contact_mob" name="contact_mob" type="text" class="input-large " />
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
				
			<select class="chzn-select " name="meeting_priority" id="meeting_priority">
               <option value="">Select an Option</option>
			   	<option value="high">High</option>
				<option value="medium">Medium</option>
				<option value="low">Low</option>
				
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
				<select class="chzn-select " name="meeting_status" id="meeting_status">
               <option value="">Select an Option</option>
			   	<option value="notstarted">Not Started</option>
				<option value="inprocess">In Process</option>
				<option value="pendinginput">Pending Input</option>
				<option value="deferred">Deferred</option>
				<option value="planned">Planned</option>
				<option value="completed">Completed</option>
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
				<input id="meeting_loc" name="meeting_loc" class="input-large" />
				</span>
			

				</td>
				<td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor"></span>Invite</label></td>
				<td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
				<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="inviteError" style="margin-top: -30px;">
				<div class="formErrorContent"> This field is required<br></div>
				<div class="formErrorArrow"><div class="line10"></div>
				</div>
				</div> 
				  <select name="invite[]" multiple id="invite"  multiple="multiple">                              
					<?php foreach($users as $USR) { ?>
			<option value="<?php echo $USR['user_id']; ?>" <?php if($userid == $USR['user_id']) { ?> selected="selected" <?php } ?>>
				<?php echo $USR['user_name']; ?>
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
						<textarea class="row-fluid" id="description" name="description"></textarea>
					</span>
				</div>
				</td>
				
				<td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor"></span>Send Notification</label></td>
				<td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
				<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="inviteError" style="margin-top: -30px;">
				<div class="formErrorContent"> This field is required<br></div>
				<div class="formErrorArrow"><div class="line10"></div>
				</div>
				</div> 
				<input id="notify"  value="active" type="checkbox" name="notify">
				
				</span>
				</div>
				</td>
			   </tr>              
              </tbody>
            </table>
		<div class="row-fluid">
          <div class="pull-right">
            <button class="btn-success return_add_details save_meeting" type="submit" id="save_meeting" name="save_meeting"><strong>Save</strong></button>
          
          <div class="clearfix"></div>
        </div>
          </div>
          </div>
       
</form>   