 <script language="javascript" type="text/javascript">
$(document).ready(function()
{ 


$("#mobile_num").keypress(function (e)
	{
		 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
		 {	
		 $('.nums_error').css("display","block");
            return false;
		 }
		 else
		 {
			  $('.nums_error').css("display","none");
             
		 }
    });
	
	//primary_num valdation 
	
	$("#primary_num").keypress(function (e)
	{
		 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
		 {	 $('.nums_error').css("display","block");
            return false;
		 }
		 else
		 {
			  $('.nums_error').css("display","none");
             
		 }
    });
	//fax 
	$("#fax").keypress(function (e)
	{
		 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
		 {	
		 $('.nums_error').css("display","block");
			 return false;
		 }
		 else
		 {
			  $('.nums_error').css("display","none");
             
		 }
    });
	//annual_revenue
	$("#annual_revenue").keypress(function (e)
	{
		 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
		 {	
		  $('.nums_error').css("display","block");
			 return false;
		 }
		 else
		 {
			  $('.nums_error').css("display","none");
             
		 }
    });
	//num_employee
	$("#num_emp").keypress(function (e)
	{
		 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
		 {
			 $('.nums_error').css("display","block");	
			 return false;
		 }
		  else
		 {
			  $('.nums_error').css("display","none");
             
		 }
    });
$("#po_code").keypress(function (e)
	{
		 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
		 {	
		  $('.nums_error').css("display","block");
			 return false;
		 }
		 else
		 {
			  $('.nums_error').css("display","none");
             
		 }
    });


 var cont_id = $('#cont_id').val();
	 var st_id = $('#st_id').val();
	 var cty_id = $('#cty_id').val();
	 
	 $.ajax({
 		type: 'POST',
 		url: '<?php echo site_url('leads/get_state'); ?>',
 		data: {country:cont_id, state:st_id},
 		success: function(resp) {
 			$('select#state').html(resp);
 		}
	 });
	 $.ajax({
 		type: 'POST',
 		url: '<?php echo site_url('leads/get_city'); ?>',
 		data: {country:cont_id, state:st_id, city:cty_id},
 		success: function(resp) {
 			$('select#city').html(resp);
 		}
	 });
	 
	 $('#assign_meeting').datetimepicker(); 
	
 	$('.formError').css("display","none");
	
	$('.save').click(function()
	{  
	 	var firstname = $("#first_name").val();
		var lastname = $("#lastname").val();
		var mobile = $("#mobile_num").val();
		var company = $("#company").val();
		var email = $("#primary_email").val();
		var designation = $("#designation").val();
		var industry = $("#industry").val();
		var leadstatus = $("#leadstatus").val();
		var txt = $('#website').val();
		var street = $('#street').val();
		var country = $('#country').val();
		var state = $('#state').val();
		var city = $('#city').val();
		var zip = $('#po_code').val();
		
		if(firstname == "" )
		{
			$('#firstnameError').css("display","block");
			$('#first_name').focus(); 
			return false;
		}
		else
		{
		$('#firstnameError').css("display","none");
		}
	 
		 
		if(lastname == "" )
		{
			$('#last_nameError').css("display","block");
			$('#lastname').focus();  
			return false;
		}
		else
		{
		$('#last_nameError').css("display","none");
		}
		 
		 
		if(mobile == "" )
		{
			$('#mobile_numError').css("display","block");
			$('#mobile_num').focus(); 
			return false;
		}
		
		else if(Ismobile(mobile)==false)
    	{
     		$('#mobile_numError').css("display","block");  
			$('#mobile_num').focus();
     		return false;
  		}
		else
		{
		$('#mobile_numError').css("display","none");
		}
		 
		 if(company == "" )
		{
			$('#companyError').css("display","block");
			$('#company').focus();  
			return false;
		}
		else
		{
		$('#companyError').css("display","none");
		}
		
		if(email == "" )
		{
		  $('#primary_emailError').css("display","block");
		   $('#primary_email').focus();
			return false;
		}
		else if(IsEmail(email)==false)
		{ 
			$('#primary_emailError').css("display","block"); 
			$('#primary_email').focus();
			return false;
		}
		else
		{
		$('#primary_emailError').css("display","none");
		}
		
		  if(designation == "" )
		{
			$('#designationError').css("display","block");
			$('#designation').focus();  
			return false;
		}
		else
		{
		$('#designationError').css("display","none");
		} 
		if(industry == "" )
		{
			$('#industryError').css("display","block");
			$('#industry').focus();  
			return false;
		}
		else
		{
		$('#industryError').css("display","none");
		}
		if(leadstatus == "" )
		{
			$('#leadstatusError').css("display","block");
			$('#leadstatus').focus();  
			return false;
		}
		else
		{
		$('#leadstatusError').css("display","none");
		}
		
		
		if(txt != "" )
		{
			var re = /(http(s)?:\\)?([\w-]+\.)+[\w-]+[.com|.in|.org]+(\[\?%&=]*)?/
			if (re.test(txt))
			{
			}
			else {
			$('#websiteError').css("display","block");
			$('#website').focus(); 
			return false;
			}
		}
		else
		{
			$('#websiteError').css("display","none");
		} 
		
		if(street == "" )
		{
			$('#streetError').css("display","block");
			$('#street').focus();  
			return false;
		}
		else
		{
		$('#streetError').css("display","none");
		}
		
		if(country == "" )
		{
			$('#countryError').css("display","block");
			$('#country').focus();  
			return false;
		}
		else
		{
		$('#countryError').css("display","none");
		}
		
		if(state == "" )
		{
			$('#stateError').css("display","block");
			$('#state').focus();  
			return false;
		}
		else
		{
		$('#stateError').css("display","none");
		}
		
		if(city == "" )
		{
			$('#cityError').css("display","block");
			$('#city').focus();  
			return false;
		}
		else
		{
		$('#cityError').css("display","none");
		}
		if(zip == "" )
		{
			$('#zipError').css("display","block");
			$('#zip').focus();  
			return false;
		}
		else
		{
		$('#zipError').css("display","none");
		}
		
		 
	});

});
 

function Ismobile(mobile)
{
    if (mobile.match(/^\d{10}$/)) {
    return true;
    } 
    else 
    {
    return false;
    }
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
</script>
<script>

function getcountry()
 {
 	var cout = $('select#country').val();
	
 	$.ajax({
 		type: 'POST',
 		url: '<?php echo site_url('leads/get_state'); ?>',
 		data: 'country='+cout,
 		success: function(resp) {
 			$('select#state').html(resp);
 			var st = $('select#state').val();
	  		$.ajax({
 				type: 'POST',
 				url: '<?php echo site_url('leads/get_city'); ?>',
 				data: {country: cout, state: st},
 				success: function(resp) { 
					$('select#city').html(resp);
 				}
	 		});
 		}
	 });
 }
 function getstate()
{
	var cout = $('select#country').val();
	 
 	var state = $('select#state').val();
 	$.ajax({
 		type: 'POST',
 		url: '<?php echo site_url('leads/get_city'); ?>',
 		data: {country: cout, state: state},
 		success: function(resp) { 
			$('select#city').html(resp);
 		}
	 });
}

 


</script>


<?php $this->load->view('pages/crm_left_side'); ?>

<section>
  <div class="rightPanel" style="padding: 14px 20px; width:96%;">
   <div class='container-fluid editViewContainer'>

   
  <form class="form-horizontal recordEditView" id="EditView" name="EditView" method="post" action="<?php echo site_url();?>/leads/editleads/<?php echo $Editleads->lead_id; ?>" enctype="multipart/form-data">
    <div class="contentHeader row-fluid">
      <h3 class="span8 textOverflowEllipsis">Edit New Lead</h3>
      <span class="pull-right">
      <button class="btn-success save" name="save" id="save" type="submit"><strong>Update</strong></button>
        <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a></span></div>
    <table class="table table-bordered blockContainer showInlineTable equalSplit">
	 <span class="nums_error" id="add_itemError" >
                 Please Enter Number Only
                 </span>
      <thead>
        <tr>
          <th class="blockHeader" colspan="4">Lead Details</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"> <span class="redColor">*</span> First Name</label>
         
          </td>
          
          <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
           <div class="row-fluid"><span class="span10">
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="firstnameError" style="margin-top: -30px;  margin-left: 65px;">
                     <div class="formErrorContent">* Enter Your First Name<br></div>
                     <div class="formErrorArrow"><div class="line10"></div>
                  </div>
                  </div> 
                  </span>
                  </div>
              <select class="chzn-select" style="width: 70px" name="salutation" id="salutation" >
                <option value="">None</option>
                 <option value="Mr." <?php if(isset($Editleads->lead_salutation)){if($Editleads->lead_salutation == 'Mr.') { ?>selected="selected" <?php } } ?>>Mr.</option>
                 <option value="Ms." <?php if(isset($Editleads->lead_salutation)){if($Editleads->lead_salutation == 'Ms.') { ?>selected="selected" <?php } } ?>>Ms.</option>
                 <option value="Mrs." <?php if(isset($Editleads->lead_salutation)){if($Editleads->lead_salutation == 'Mrs.') { ?>selected="selected" <?php } } ?>>Mrs.</option>
                 <option value="Dr." <?php if(isset($Editleads->lead_salutation)){if($Editleads->lead_salutation == 'Dr.') { ?>selected="selected" <?php } } ?>>Dr.</option>
                 <option value="Prof." <?php if(isset($Editleads->lead_salutation)){if($Editleads->lead_salutation == 'Prof.') { ?>selected="selected" <?php } } ?>>Prof.</option>
                 </select>
              </select>
              
              &nbsp;
              
              <input style="width:130px" type="text" id="first_name"  name="first_name" class="input-large nameField" value="<?php if(isset($Editleads->lead_first_name)){ echo $Editleads->lead_first_name;}?>"/>
              
              </span></div>
              </td>
          <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"> <span class="redColor">*</span> Last Name</label></td>
          <td class="fieldValue medium" >
          	 <div class="row-fluid"><span class="span10">
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="last_nameError" style="margin-top: -30px;">
                     <div class="formErrorContent">* Enter Your Last name<br></div>
                     <div class="formErrorArrow"><div class="line10"></div>
                  </div>
                  </div> 
            
            <input id="lastname" type="text" name="lastname" class="input-large nameField" value="<?php if(isset($Editleads->lead_last_name)){ echo $Editleads->lead_last_name;}?>" />
            </span>
        </div>
        </td>
      
        </tr>
      
      <tr>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"> <span class="redColor">*</span> Mobile Phone</label>
        </td>
      
        <td class="fieldValue medium" >
        <div class="row-fluid"><span class="span10">
           <div class="row-fluid"><span class="span10">
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="mobile_numError" style="margin-top: -30px;">
                     <div class="formErrorContent">* Enter Your Mobile Number<br></div>
                     <div class="formErrorArrow"><div class="line10"></div>
                  </div>
                  </div> 
                  </span>
                  </div>
                  </span>
                  </div>
                  
        <input id="mobile_num" name="mobile_num"  type="text" class="input-large"  maxlength="10" value="<?php if(isset($Editleads->lead_mobile)){ echo $Editleads->lead_mobile;}?>" />
          
          </span>
        
        </td>
      
      
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor">*</span>Company</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
		<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="companyError" style="margin-top: -30px;">
                     <div class="formErrorContent">* This field is required<br></div>
                     <div class="formErrorArrow"><div class="line10"></div>
                  </div>
                  </div> 
            <input id="company" name="company" type="text" class="input-large" value="<?php if(isset($Editleads->lead_company)){ echo $Editleads->lead_company;}?>"/>
            </span></div></td>
      </tr>
      <tr>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor">*</span>Primary Email</label></td>
       
        <td class="fieldValue medium" > <div class="row-fluid"><span class="span10">
           <div class="row-fluid"><span class="span10">
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="primary_emailError" style="margin-top: -30px;  ">
                     <div class="formErrorContent">* Enter Your Email<br></div>
                     <div class="formErrorArrow"><div class="line10"></div>
                  </div>
                  </div> 
                  </span>
                  </div>
                  </span>
                  </div>
            <input id="primary_email" name="primary_email" class="input-large" value="<?php if(isset($Editleads->lead_primary_email)){ echo $Editleads->lead_primary_email;}?>" />
            </span></div>
            </td>
            
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor">*</span>Designation</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
		<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="designationError" style="margin-top: -30px;">
                     <div class="formErrorContent">* This field is required<br></div>
                     <div class="formErrorArrow"><div class="line10"></div>
                  </div>
                  </div> 
            <input id="designation" name="designation" type="text" class="input-large" value="<?php if(isset($Editleads->lead_designation)){ echo $Editleads->lead_designation;}?>" />
            </span></div></td>
      </tr>
      <tr>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">  Assigned To</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
        <select  name="assign_to" class="chzn-select assigned_user_id" id="assign_to">
            <optgroup label="Users">
                	<option value="Administrator"
                    <?php if(isset($Editleads->lead_assigned_to)){if($Editleads->lead_assigned_to == 'Administrator') { ?>selected="selected" <?php } } ?>>Administrator</option>
                    </optgroup>
                    <optgroup label="Groups">
                    <option value="marketinggroup" <?php if(isset($Editleads->lead_assigned_to)){if($Editleads->lead_assigned_to == 'marketinggroup') { ?>selected="selected" <?php } } ?>>Marketing Group</option>
                    <option value="supportgroup" <?php if(isset($Editleads->lead_assigned_to)){if($Editleads->lead_assigned_to == 'supportgroup') { ?>selected="selected" <?php } } ?>>Support Group</option>
                    <option value="teamselling" <?php if(isset($Editleads->lead_assigned_to)){if($Editleads->lead_assigned_to == 'teamselling') { ?>selected="selected" <?php } } ?>>Team Selling</option>
                    </optgroup>
                  </select>
            </span></div></td>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Primary Phone</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
            <input id="primary_num" name="primary_num" type="text" class="input-large" value="<?php if(isset($Editleads->lead_phone)){ echo $Editleads->lead_phone;}?>"/>
            </span></div></td>
      </tr>
	  <tr>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">  Assigned Meeting Date </label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
       
            <input id="assign_meeting" name="assign_meeting" type="text" class="input-large" value="<?php if(isset($Editleads->lead_asssign_meeting)){ echo date('d-m-Y H:i:s', strtotime($Editleads->lead_asssign_meeting));}?>"  maxlength="10"/>
            </span></div></td>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"> Next Meeting </label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
            <input id="assign_nxt_meeting" name="assign_nxt_meeting" type="text" class="input-large" readonly="readonly" value="<?php if(isset($Editleads_meeting->lead_met_meeting_start_time)){ echo date('d-m-Y H:i:s', strtotime($Editleads_meeting->lead_met_meeting_start_time));}?>"  maxlength="10"/>
            </span></div></td>
      </tr>
      <tr>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Fax</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
            <input id="fax" name="fax" type="text" class="input-large" value="<?php if(isset($Editleads->lead_fax_number)){ echo $Editleads->lead_fax_number;}?>" />
            </span></div></td>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Lead Source</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
         <select class="chzn-select " name="lead_source" id="lead_source">
                <option value="">Select an Option</option>
                    <option value="Cold Call" <?php if(isset($Editleads->lead_source)){if($Editleads->lead_source == 'Cold Call') { ?>selected="selected" <?php } } ?>>Cold Call</option>
                    <option value="Existing Customer" <?php if(isset($Editleads->lead_source)){if($Editleads->lead_source == 'Existing Customer') { ?>selected="selected" <?php } } ?>>Existing Customer</option>
                    <option value="Self Generated" <?php if(isset($Editleads->lead_source)){if($Editleads->lead_source == 'Self Generated') { ?>selected="selected" <?php } } ?>>Self Generated</option>
                   <option value="Employee" <?php if(isset($Editleads->lead_source)){if($Editleads->lead_source == 'Employee') { ?>selected="selected" <?php } } ?>>Employee</option>
                    <option value="Partner" <?php if(isset($Editleads->lead_source)){if($Editleads->lead_source == 'Partner') { ?>selected="selected" <?php } } ?>>Partner</option>
                    <option value="Public Relations" <?php if(isset($Editleads->lead_source)){if($Editleads->lead_source == 'Public Relations') { ?>selected="selected" <?php } } ?>>Public Relations</option>
                    <option value="Direct Mail" <?php if(isset($Editleads->lead_source)){if($Editleads->lead_source == 'Direct Mail') { ?>selected="selected" <?php } } ?>>Direct Mail</option>
                    <option value="Conference" <?php if(isset($Editleads->lead_source)){if($Editleads->lead_source == 'Conference') { ?>selected="selected" <?php } } ?>>Conference</option>
                    <option value="Trade Show" <?php if(isset($Editleads->lead_source)){if($Editleads->lead_source == 'Trade Show') { ?>selected="selected" <?php } } ?>>Trade Show</option>
                    <option value="Web Site" <?php if(isset($Editleads->lead_source)){if($Editleads->lead_source == 'Web Site') { ?>selected="selected" <?php } } ?>>Web Site</option>
                    <option value="Word of mouth" <?php if(isset($Editleads->lead_source)){if($Editleads->lead_source == 'Word of mouth') { ?>selected="selected" <?php } } ?>>Word of mouth</option>
                    <option value="Other" <?php if(isset($Editleads->lead_source)){if($Editleads->lead_source == 'Other') { ?>selected="selected" <?php } } ?>>Other</option>
                  </select>
            </span></div></td>
      </tr>
      <tr>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Website</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
            <input id="website" name="website" type="text" class="input-large validate[custom[url]]" value="<?php if(isset($Editleads->lead_website)){ echo $Editleads->lead_website;}?>"/>
            </span></div></td>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor">*</span>Industry</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
		<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="industryError" style="margin-top: -30px;">
                     <div class="formErrorContent">* This field is required<br></div>
                     <div class="formErrorArrow"><div class="line10"></div>
                  </div>
                  </div> 
            <select class="chzn-select " name="industry" id="industry">
               <option value="">Select an Option</option>
                  <option value="Apparel" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Apparel') { ?>selected="selected" <?php } } ?> >Apparel</option>
                  <option value="Banking" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Banking') { ?>selected="selected" <?php } } ?>>Banking</option>
                  <option value="Biotechnology" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Biotechnology') { ?>selected="selected" <?php } } ?>>Biotechnology</option>
                  <option value="Chemicals" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Chemicals') { ?>selected="selected" <?php } } ?>>Chemicals</option>
                  <option value="Communications" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Communications') { ?>selected="selected" <?php } } ?> >Communications</option>
                  <option value="Construction" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Apparel') { ?>selected="selected" <?php } } ?>>Construction</option>
                  <option value="Consulting" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Consulting') { ?>selected="selected" <?php } } ?>>Consulting</option>
                  <option value="Education" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Education') { ?>selected="selected" <?php } } ?>>Education</option>
                  <option value="Electronics" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Electronics') { ?>selected="selected" <?php } } ?>>Electronics</option>
                  <option value="Energy" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Energy') { ?>selected="selected" <?php } } ?>>Energy</option>
                  <option value="Engineering" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Engineering') { ?>selected="selected" <?php } } ?>>Engineering</option>
                  <option value="Entertainment" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Entertainment') { ?>selected="selected" <?php } } ?>>Entertainment</option>
                  <option value="Environmental" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Environmental') { ?>selected="selected" <?php } } ?>>Environmental</option>
                  <option value="Finance" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Finance') { ?>selected="selected" <?php } } ?>>Finance</option>
                  <option value="Food & Beverage" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Food & Beverage') { ?>selected="selected" <?php } } ?>>Food & Beverage</option>
                  <option value="Government" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Government') { ?>selected="selected" <?php } } ?>>Government</option>
                  <option value="Healthcare" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Healthcare') { ?>selected="selected" <?php } } ?>>Healthcare</option>
                  <option value="Hospitality" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Hospitality') { ?>selected="selected" <?php } } ?>>Hospitality</option>
                  <option value="Insurance" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Insurance') { ?>selected="selected" <?php } } ?>>Insurance</option>
                  <option value="Machinery" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Machinery') { ?>selected="selected" <?php } } ?>>Machinery</option>
                  <option value="Manufacturing" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Manufacturing') { ?>selected="selected" <?php } } ?>>Manufacturing</option>
                  <option value="Media" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Media') { ?>selected="selected" <?php } } ?>>Media</option>
                  <option value="Not For Profit" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Not For Profit') { ?>selected="selected" <?php } } ?>>Not For Profit</option>
                  <option value="Recreation" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Recreation') { ?>selected="selected" <?php } } ?>>Recreation</option>
                  <option value="Retail" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Retail') { ?>selected="selected" <?php } } ?>>Retail</option>
                  <option value="Shipping" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Shipping') { ?>selected="selected" <?php } } ?>>Shipping</option>
             <option value="Software" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Software') { ?>selected="selected" <?php } } ?>>Software</option>
		  <option value="Hardware" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Hardware') { ?>selected="selected" <?php } } ?>>Hardware</option>

                  <option value="Technology" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Technology') { ?>selected="selected" <?php } } ?>>Technology</option>
                  <option value="Telecommunications" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Telecommunications') { ?>selected="selected" <?php } } ?>>Telecommunications</option>
                  <option value="Transportation" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Transportation') { ?>selected="selected" <?php } } ?>>Transportation</option>
                  <option value="Utilities" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Utilities') { ?>selected="selected" <?php } } ?>>Utilities</option>
                  <option value="Other" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Other') { ?>selected="selected" <?php } } ?>>Other</option>
                  </select>
            </span></div></td>
      </tr>
      <tr>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor">*</span>Lead Status</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
		<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="leadstatusError" style="margin-top: -30px;">
                     <div class="formErrorContent">* This field is required<br></div>
                     <div class="formErrorArrow"><div class="line10"></div>
                  </div>
                  </div> 
            <select class="chzn-select " name="leadstatus" id="leadstatus">
               <option value="">Select an Option</option>
                <option value="Attempted to Contact" <?php if(isset($Editleads->lead_status)){if($Editleads->lead_status == 'Attempted to Contact') { ?>selected="selected" <?php } } ?>>Attempted to Contact</option>
                <option value="Cold" <?php if(isset($Editleads->lead_status)){if($Editleads->lead_status == 'Attempted to Contact') { ?>selected="selected" <?php } } ?>>Cold</option>
                <option value="Contact in Future" <?php if(isset($Editleads->lead_status)){if($Editleads->lead_status == 'Contact in Future') { ?>selected="selected" <?php } } ?>>Contact in Future</option>
                <option value="Contacted" <?php if(isset($Editleads->lead_status)){if($Editleads->lead_status == 'Contacted') { ?>selected="selected" <?php } } ?>>Contacted</option>
                <option value="Hot" <?php if(isset($Editleads->lead_status)){if($Editleads->lead_status == 'Hot') { ?>selected="selected" <?php } } ?>>Hot</option>
                <option value="Junk Lead" <?php if(isset($Editleads->lead_status)){if($Editleads->lead_status == 'Junk Lead') { ?>selected="selected" <?php } } ?>>Junk Lead</option>
                <option value="Lost Lead" <?php if(isset($Editleads->lead_status)){if($Editleads->lead_status == 'Lost Lead') { ?>selected="selected" <?php } } ?>>Lost Lead</option>
                <option value="Not Contacted" <?php if(isset($Editleads->lead_status)){if($Editleads->lead_status == 'Not Contacted') { ?>selected="selected" <?php } } ?>>Not Contacted</option>
                <option value="Pre Qualified" <?php if(isset($Editleads->lead_status)){if($Editleads->lead_status == 'Pre Qualified') { ?>selected="selected" <?php } } ?>>Pre Qualified</option>
                <option value="Qualified" <?php if(isset($Editleads->lead_status)){if($Editleads->lead_status == 'Qualified') { ?>selected="selected" <?php } } ?>>Qualified</option>
                <option value="Warm" <?php if(isset($Editleads->lead_status)){if($Editleads->lead_status == 'Warm') { ?>selected="selected" <?php } } ?>>Warm</option>
                  </select>
            </span></div></td>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Annual Revenue</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
            <div class="input-prepend"><span class="add-on">?</span>
              <input type="text" class="input-medium currencyField" name="annual_revenue" id="annual_revenue" value="<?php if(isset($Editleads->lead_annual_revenue)){ echo $Editleads->lead_annual_revenue;}?>" />
            </div>
            </span></div></td>
      </tr>
      <tr>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Rating</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
            <select class="chzn-select " name="rating" id="rating">
              <option value="">Select an Option</option>
                  <option value="Acquired" <?php if(isset($Editleads->lead_rating)){if($Editleads->lead_rating == 'Acquired') { ?>selected="selected" <?php } } ?>>Acquired</option>
                  <option value="Active" <?php if(isset($Editleads->lead_rating)){if($Editleads->lead_rating == 'Active') { ?>selected="selected" <?php } } ?>>Active</option>
                  <option value="Market Failed" <?php if(isset($Editleads->lead_rating)){if($Editleads->lead_rating == 'Market Failed') { ?>selected="selected" <?php } } ?>>Market Failed</option>
                  <option value="Project Cancelled" <?php if(isset($Editleads->lead_rating)){if($Editleads->lead_rating == 'Project Cancelled') { ?>selected="selected" <?php } } ?>>Project Cancelled</option>
                  <option value="Shutdown" <?php if(isset($Editleads->lead_rating)){if($Editleads->lead_rating == 'Shutdown') { ?>selected="selected" <?php } } ?>>Shutdown</option>
                  </select>
            </span></div></td>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Number of Employees</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
            <input type="text" class="input-large" id="num_emp" name="num_emp" value="<?php if(isset($Editleads->lead_annual_revenue)){ echo $Editleads->lead_no_of_employees;}?>"/>
            </span></div></td>
      </tr>
      <tr>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Secondary Email</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
            <input class="input-large" type="text" name="secondary_mail" id="secondary_mail" value="<?php if(isset($Editleads->lead_secondary_email)){ echo $Editleads->lead_secondary_email;}?>"/>
            </span></div></td>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Subscriptions</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
            <input type="hidden" name="emailoptout" value=0 />
            <input type="checkbox" name="emailoptout" value="yes" <?php if($Editleads->lead_email_optout=="yes")echo 'checked="checked"';?>  id="emailoptout" />
            </span></div></td>
      </tr>
        </tbody>
      
    </table>
    <br>
    <table class="table table-bordered blockContainer showInlineTable equalSplit">
      <thead>
        <tr>
          <th class="blockHeader" colspan="4">Address Details</th>
            </div>
                <input type="hidden" name="cont_id" id="cont_id" value="<?php echo $Editleads_addr->lead_country_id ;?>" />
                 <input type="hidden" name="st_id" id="st_id" value="<?php echo $Editleads_addr->lead_state_id ;?>" />
                 <input type="hidden" name="cty_id" id="cty_id" value="<?php echo $Editleads_addr->lead_city_id ;?>" />
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor">*</span>Street</label></td>
          <td class="fieldValue medium" >
          
             <div class="row-fluid"><span class="span10">
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="streetError" style="margin-top: -30px;">
                     <div class="formErrorContent">* This field is required<br></div>
                     <div class="formErrorArrow"><div class="line10"></div>
                  </div>
                  </div> 
                   </span></div>
              <textarea class="row-fluid" name="street" id="street" ><?php if(isset($Editleads_addr->lead_street)){ echo $Editleads_addr->lead_street;}?></textarea>
              </td>
           
             <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor">*</span>Country</label></td>
         
          <td class="fieldValue medium" >
             <div class="row-fluid"><span class="span10">
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="countryError" style="margin-top: -30px;">
                     <div class="formErrorContent">* This field is required<br></div>
                     <div class="formErrorArrow"><div class="line10"></div>
                  </div>
                  </div> 
                  
                <select data-selected-value="" name="country" class="chzn-select  chzn-done" id="country" onchange="getcountry()">
                  <!--<option value="">Select an Option</option>-->
                  <?php foreach($country as $Con)
				   {   ?>

    				<option value="<?php echo $Con['country_id']; ?>" <?php if(isset($Editleads_addr->lead_country_id)) { if($Editleads_addr->lead_country_id ==  $Con['country_id']) { ?> selected="selected" <?php } } ?>  > <?php echo $Con['country_name']; ?> </option>
       			
				<?php } ?>
                   
                  </select> 
              </span></div></td>
        </tr>
        <tr>
       <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor">*</span>State</label></td>
          <td class="fieldValue medium" >
          
          <div class="row-fluid"><span class="span10">
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="stateError" style="margin-top: -30px;">
                     <div class="formErrorContent">* This field is required<br></div>
                     <div class="formErrorArrow"><div class="line10"></div>
                  </div>
                  </div> 
                  
                <select data-selected-value="" name="state" class="chzn-select  chzn-done" id="state" onchange="getstate()">
                  <option value="">Select an Option</option>
                   
                                    
                   </select> 
              </span></div></td>
             
              <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor">*</span>City</label></td>
          <td class="fieldValue medium" >
          
            <div class="row-fluid"><span class="span10">
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="cityError" style="margin-top: -30px;">
                     <div class="formErrorContent">* This field is required<br></div>
                     <div class="formErrorArrow"><div class="line10"></div>
                  </div>
                  </div> 
               <select data-selected-value="" name="city" class="chzn-select  chzn-done" id="city">
                </select> 
              </span></div></td>
              
        
        </tr>
        <tr>
          <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor">*</span>Zip Code</label></td>
          <td class="fieldValue medium" >
             <div class="row-fluid"><span class="span10">
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="zipError" style="margin-top: -30px;">
                     <div class="formErrorContent">* This field is required<br></div>
                     <div class="formErrorArrow"><div class="line10"></div>
                  </div>
                  </div> 
          
              <input type="text" class="input-large"  maxlength="6" id="po_code" name="po_code" value="<?php if(isset($Editleads_addr->lead_zipcode)){ echo $Editleads_addr->lead_zipcode;}?>"/>
              </span></div></td>
          
        </tr>
      </tbody>
    </table>
    <br>
    <table class="table table-bordered blockContainer showInlineTable equalSplit">
      <thead>
        <tr>
          <th class="blockHeader" colspan="4">Description Details</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Description</label></td>
          <td class="fieldValue medium"  colspan="3"  ><div class="row-fluid"><span class="span10">
              <textarea class="span11 "  id="description" name="description"><?php if(isset($Editleads_addr->lead_description)){ echo $Editleads_addr->lead_description;}?></textarea>
              </span></div></td>
        </tr>
      </tbody>
    </table>
	<br \>
	<br \>
	
    <table id="tblList">
				<thead>
				
				<tr>	
				<th>Subject</th>
                <th>Assigned to</th>
        		<th>Start Time</th>	
				<th>End Time</th>
				<th>Contact Name</th>	
				<th>Mobile</th>
				<th>Priority</th>
				<th>Status</th>
				<th>Location</th>
               	<th>Action</th>
				</tr>
				</thead>
                
                
                <tbody id="disp_items">
            		
                        <?php if(!empty($Editleads_meeting)) { $itemcount = 1; foreach($Editleads_meeting as $MEET) { ?>
                       <tr>
                          <td><a href="javascript:void(0);" id="meeting_subject_value_<?php echo $itemcount; ?>"><?php if(isset($MEET['lead_met_subject'])) { echo $MEET['lead_met_subject']; } ?></a>
                            <input id="meeting_subject_<?php echo $itemcount; ?>" name="meeting_subject[<?php echo $itemcount; ?>]" value="<?php if(isset($MEET['lead_met_subject'])) { echo $MEET['lead_met_subject']; } ?>" type="hidden" />
                            <input id="lead_met_id_<?php echo $itemcount; ?>" name="lead_met_id[<?php echo $itemcount; ?>]" value="<?php if(isset($MEET['lead_met_id'])) { echo $MEET['lead_met_id']; } ?>" type="hidden" />
							<input id="lead_id_<?php echo $itemcount; ?>" name="lead_id[<?php echo $itemcount; ?>]" value="<?php if(isset($MEET['lead_met_lead_id'])) { echo $MEET['lead_met_lead_id']; } ?>" type="hidden" /></td>
							
							
							
							
                          <td><a href="javascript:void(0);" id="assigned_to_value_<?php echo $itemcount; ?>"><?php if(isset($MEET['lead_met_assign_to'])) { echo $MEET['user_first_name']; } ?></a>
                            <input id="assigned_to_<?php echo $itemcount; ?>" name="assigned_to[<?php echo $itemcount; ?>]" value="<?php if(isset($MEET['lead_met_assign_to'])) { echo $MEET['lead_met_assign_to']; } ?>" type="hidden" /></td>
							
							
							
                             <td><a href="javascript:void(0);" id="meeting_start_date_value_<?php echo $itemcount; ?>"><?php if(isset($MEET['lead_met_meeting_start_time'])) { echo date('d-m-Y H:i', strtotime($MEET['lead_met_meeting_start_time'])); } ?></a>
                            <input id="meeting_start_date_<?php echo $itemcount; ?>" name="meeting_start_date[<?php echo $itemcount; ?>]" value="<?php if(isset($MEET['lead_met_meeting_start_time'])) { echo $MEET['lead_met_meeting_start_time']; } ?>" type="hidden" /></td>
							
							
							
                          <td><a href="javascript:void(0);" id="meeting_end_date_value_<?php echo $itemcount; ?>"><?php if(isset($MEET['lead_met_meeting_end_time'])) { echo date('d-m-Y H:i', strtotime($MEET['lead_met_meeting_end_time']));  } ?> </a>
                            <input id="meeting_end_date_<?php echo $itemcount; ?>" name="meeting_end_date[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($MEET['lead_met_meeting_end_time'])) { echo $MEET['lead_met_meeting_end_time']; } ?>" />
                            </td>
							
							
                          <td>
							<a href="javascript:void(0);" id="contact_name_value_<?php echo $itemcount; ?>"><?php if(isset($MEET['lead_met_contact_name'])) { echo $MEET['lead_met_contact_name'];  } ?> </a>
                            <input id="contact_name_<?php echo $itemcount; ?>" name="contact_name[<?php echo $itemcount; ?>]" value="<?php if(isset($MEET['lead_met_contact_name'])) { echo $MEET['lead_met_contact_name']; } ?>"  type="hidden" />
						  </td>
						  
						  <td>
							<a href="javascript:void(0);" id="contact_mob_value_<?php echo $itemcount; ?>"><?php if(isset($MEET['lead_met_contact_number'])) { echo $MEET['lead_met_contact_number'];  } ?> </a>
                            <input id="contact_mob_<?php echo $itemcount; ?>" name="contact_mob[<?php echo $itemcount; ?>]" value="<?php if(isset($MEET['lead_met_contact_number'])) { echo $MEET['lead_met_contact_number']; } ?>"  type="hidden" />
						  </td> 
						  
						  <td>
							<a href="javascript:void(0);" id="meeting_priority_value_<?php echo $itemcount; ?>"><?php if(isset($MEET['lead_met_priority'])) { echo $MEET['lead_met_priority'];  } ?> </a>
                            <input id="meeting_priority_<?php echo $itemcount; ?>" name="meeting_priority[<?php echo $itemcount; ?>]" value="<?php if(isset($MEET['lead_met_priority'])) { echo $MEET['lead_met_priority']; } ?>"  type="hidden" />
						  </td>
						  
						  <td>
							<a href="javascript:void(0);" id="meeting_status_value_<?php echo $itemcount; ?>"><?php if(isset($MEET['lead_met_meeting_status'])) { echo $MEET['lead_met_meeting_status'];  } ?> </a>
                            <input id="meeting_status_<?php echo $itemcount; ?>" name="meeting_status[<?php echo $itemcount; ?>]" value="<?php if(isset($MEET['lead_met_meeting_status'])) { echo $MEET['lead_met_meeting_status']; } ?>"  type="hidden" />
						  </td> 
						  <td>
							<a href="javascript:void(0);" id="meeting_loc_value_<?php echo $itemcount; ?>"><?php if(isset($MEET['lead_met_location'])) { echo $MEET['lead_met_location'];  } ?> </a>
                            <input id="meeting_loc_<?php echo $itemcount; ?>" name="meeting_loc[<?php echo $itemcount; ?>]" value="<?php if(isset($MEET['lead_met_location'])) { echo $MEET['lead_met_location']; } ?>"  type="hidden" />
						  </td>
						     <td colspan="2">
                              <div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_edit_<?php echo $itemcount; ?>" onclick="return meeting_edit('<?php echo $itemcount; ?>','<?php echo $MEET['lead_met_id']; ?>');" data-item="<?php if(isset($MEET['lead_met_id'])) { echo $MEET['lead_met_id']; } ?>" data-delete="<?php echo $itemcount; ?>" title="Edit"><span class="icon-pencil"></span></div>
                            </td>
                                                 
                        </tr>
                        <?php $itemcount++; } } ?>
                       
                
                
				</tbody>
                
                
                
				</table>
    <br>
    <div class="row-fluid">
      <div class="pull-right">
        <button class="btn-success save" name="save" id="save"  type="submit"><strong>Update</strong></button>
        <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a></div>
      <div class="clearfix"></div>
    </div>
    <br>
  </form>
  
  <div id="receipt_pop_up" class="pop-up-display-content singleitemscontent">
   </div>
   
  </div>
  </div>
</section>

<script>
function meeting_edit(id)
{ 
sure = confirm('Do you need to Edit?');
	
	
  if (sure==true) 
  {
	var lead_met_id = $("#lead_met_id_"+id).val(); //alert(lead_met_id); return false;
	var lead_id= '<?php echo $this->uri->segment('3'); ?>';
	//alert(lead_id);
	 
	$.ajax({
        type: 'POST',
        url: '<?php echo site_url('leads/edit_meeting/'); ?>',
		data: {met_id:+lead_met_id, lead_id: +lead_id}, 
        //data: 'met_id='+lead_met_id,'lead_id'=+lead_id,
        success: function(resp) 
        {
          $("#receipt_pop_up").html(resp);
         
          $('#receipt_pop_up').bPopup({
            position: [500, 50], //x, y
            closeClass:'close',
            follow: [true, true],
            modalClose: true
          });      
        }
      });
	
	}
	else 
  {
      return false;
  }
	
    
    }
  

</script>