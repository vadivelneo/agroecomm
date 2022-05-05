 <script language="javascript" type="text/javascript">

$(document).ready(function()
{ 

	var cont_id = $('#country').val();
    $.ajax({
    	type: 'POST',
    	url: '<?php echo site_url('leads/get_state'); ?>',
    	data: 'country='+cont_id,
    	success: function(resp) {
      		$('select#state').html(resp);
	  		var st = $('select#state').val();
	  		$.ajax({
 				type: 'POST',
 				url: '<?php echo site_url('leads/get_city'); ?>',
 				data: {country: cont_id, state: st},
 				success: function(resp) { 
					$('select#city').html(resp);
 				}
	 		});
    	}
   });
   
   $("#mobile_num").keypress(function (e)
	{
		 if ((e.which != 8 && e.which != 0 && e.which != 46 || $(this).val().indexOf('.') != -1) && (e.which < 48 || e.which > 57))
		{	
		 $('.nums_error').css("display","block");
            return false;
		 }
		 else
		 {
			  $('.nums_error').css("display","none");
             
		 }
    });
   
   
    $("#first_name").keypress(function (evt)
	{
		 var keyCode = (evt.which) ? evt.which : evt.keyCode
		 if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)
		 {	
		  alert("Character Only ")
			 return false;
		 }
    });

	/* $("#mobile_num").keypress(function (e)
	{
		 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
		 {	
		  alert("Numbers Only ")
			 return false;
		 }
    }); */
	
	//primary_num valdation 
	
	$("#primary_num").keypress(function (e)
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
		 {	  $('.nums_error').css("display","block");
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

 $('#assign_meeting').datetimepicker(); 
 /* $( "#assign_meeting" ).datepicker({
		dateFormat: 'dd-mm-yy',
		timeFormat: 'hh:mm tt',
	changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    }); */
	
 	
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
<?php //echo"<PRE>";print_r($users);exit; ?>
<?php $this->load->view('pages/crm_left_side'); ?>

<section>
  <div class="rightPanel" style="padding: 14px 20px; width:96%;">
  
  <div class='container-fluid editViewContainer'>
  <form class="form-horizontal recordEditView" id="EditView" name="EditView" method="post" action="<?php echo site_url();?>/leads/addlead" enctype="multipart/form-data">
    <div class="contentHeader row-fluid">
      <h3 class="span8 textOverflowEllipsis">Creating New Lead</h3>
      <span class="pull-right">
      <button class="btn-success save" name="save" id="save" type="submit"><strong>Save</strong></button>
       <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a></span></div>
	    <span class="nums_error" id="add_itemError" >
                 Please Enter Number Only
                 </span>
    <table class="table table-bordered blockContainer showInlineTable equalSplit">
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
                     <div class="formErrorContent">* This field is required<br></div>
                     <div class="formErrorArrow"><div class="line10"></div>
                  </div>
                  </div> 
                  </span>
                  </div>
              <select class="chzn-select" style="width: 70px" name="salutation" id="salutation" >
                <option value="">None</option>
                <option value="Mr." >Mr.</option>
                <option value="Ms." >Ms.</option>
                <option value="Mrs." >Mrs.</option>
                <option value="Dr." >Dr.</option>
                <option value="Prof." >Prof.</option>
              </select>
              
              &nbsp;
              
              <input style="width:130px" type="text" id="first_name"  name="first_name" class="input-large nameField" />
              
              </span></div>
              </td>
          <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"> <span class="redColor">*</span> Last Name</label></td>
          <td class="fieldValue medium" >
          	 <div class="row-fluid"><span class="span10">
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="last_nameError" style="margin-top: -30px;">
                     <div class="formErrorContent">* This field is required<br></div>
                     <div class="formErrorArrow"><div class="line10"></div>
                  </div>
                  </div> 
            
            <input id="lastname" type="text" name="lastname" class="input-large nameField" />
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
                  
        <input id="mobile_num" name="mobile_num" type="text" class="input-large"  maxlength="10"/>
          
          </span>
        
        </td>
      
      
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor">*</span> Company</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
		<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="companyError" style="margin-top: -30px;">
                     <div class="formErrorContent">* This field is required<br></div>
                     <div class="formErrorArrow"><div class="line10"></div>
                  </div>
                  </div> 
            <input id="company" name="company" type="text" class="input-large" />
            </span></div></td>
      </tr>
      <tr>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor">*</span>Primary Email</label></td>
       
        <td class="fieldValue medium" > <div class="row-fluid"><span class="span10">
           <div class="row-fluid"><span class="span10">
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="primary_emailError" style="margin-top: -30px;  ">
                     <div class="formErrorContent">* Enter Valid Email<br></div>
                     <div class="formErrorArrow"><div class="line10"></div>
                  </div>
                  </div> 
                  </span>
                  </div>
                  </span>
                  </div>
            <input id="primary_email" name="primary_email" class="input-large" />
            </span></div>
            
            </td>
            
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor">*</span> Designation</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
		<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="designationError" style="margin-top: -30px;">
                     <div class="formErrorContent">* This field is required<br></div>
                     <div class="formErrorArrow"><div class="line10"></div>
                  </div>
                  </div> 
            <input id="designation" name="designation" type="text" class="input-large " />
            </span></div></td>
      </tr>
      <tr>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">  Assigned To</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
       <!-- <select  name="assign_to" class="chzn-select assigned_user_id" id="assign_to">-->
		 <select	data-selected-value="" name="assign_to" class="chzn-select assigned_user_id" id="assign_to">
		<?php foreach($users as $USR) { ?>
			<option value="<?php echo $USR['user_id']; ?>" <?php if($userid == $USR['user_id']) { ?> selected="selected" <?php } ?>>
			<?php echo $USR['user_name']; ?>
			</option>
		<?php } ?>
         </select>
           
            </span></div></td>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Primary Phone</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
            <input id="primary_num" name="primary_num" type="text" class="input-large"  maxlength="10"/>
            </span></div></td>
      </tr> 
	  <tr>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">  Assigned Meeting Date </label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
       
            <input id="assign_meeting" name="assign_meeting" type="text" class="input-large"  maxlength="10"/>
            </span></div></td>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"> Assigned Meeting Time</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
            <input id="assign_meeting_time" name="assign_meeting_time" type="text" class="input-large"  maxlength="10"/>
            </span></div></td>
      </tr>
      <tr>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px" >Fax</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
            <input id="fax" name="fax" type="text" class="input-large" />
            </span></div></td>
        <td class="fieldLabel medium">
		<label class="muted pull-right marginRight10px">Lead Source</label></td>
        <td class="fieldValue medium" >
		<div class="row-fluid"><span class="span10">
         <select class="chzn-select " name="lead_source" id="lead_source">
              <option value="">Select an Option</option>
              <option value="Cold Call" >Cold Call</option>
              <option value="Existing Customer" >Existing Customer</option>
              <option value="Self Generated" >Self Generated</option>
              <option value="Employee" >Employee</option>
              <option value="Partner" >Partner</option>
              <option value="Public Relations" >Public Relations</option>
              <option value="Direct Mail" >Direct Mail</option>
              <option value="Conference" >Conference</option>
              <option value="Trade Show" >Trade Show</option>
              <option value="Web Site" >Web Site</option>
              <option value="Word of mouth" >Word of mouth</option>
              <option value="Other" >Other</option>
            </select>
            </span></div></td>
      </tr>
      <tr>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Website</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
           <div class="row-fluid"><span class="span10">
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="websiteError" style="margin-top: -30px; width:275px;  ">
                     <div class="formErrorContent">* Enter Valid Website Address<br></div>
                     <div class="formErrorArrow"><div class="line10"></div>
                  </div>
                  </div> 
                  </span>
                  </div>
                  </span>
                  </div>
            <input id="website" name="website" type="text" class="input-large validate[custom[url]]"/>
            </td>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor">*</span>Industry</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
		<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="industryError" style="margin-top: -30px;">
                     <div class="formErrorContent">* This field is required<br></div>
                     <div class="formErrorArrow"><div class="line10"></div>
                  </div>
                  </div> 
            <select class="chzn-select " name="industry" id="industry">
              <option value="">Select an Option</option>
              <option value="Apparel" >Apparel</option>
              <option value="Banking" >Banking</option>
              <option value="Biotechnology" >Biotechnology</option>
              <option value="Chemicals" >Chemicals</option>
              <option value="Communications" >Communications</option>
              <option value="Construction" >Construction</option>
              <option value="Consulting" >Consulting</option>
              <option value="Education" >Education</option>
              <option value="Electronics" >Electronics</option>
              <option value="Energy" >Energy</option>
              <option value="Engineering" >Engineering</option>
              <option value="Entertainment" >Entertainment</option>
              <option value="Environmental" >Environmental</option>
              <option value="Finance" >Finance</option>
              <option value="Food &amp; Beverage" >Food & Beverage</option>
              <option value="Government" >Government</option>
              <option value="Healthcare" >Healthcare</option>
              <option value="Hospitality" >Hospitality</option>
              <option value="Insurance" >Insurance</option>
              <option value="Machinery" >Machinery</option>
              <option value="Manufacturing" >Manufacturing</option>
              <option value="Media" >Media</option>
              <option value="Not For Profit" >Not For Profit</option>
              <option value="Recreation" >Recreation</option>
              <option value="Retail" >Retail</option>
              <option value="Shipping" >Shipping</option>
              <option value="Technology" >Technology</option>
              <option value="Telecommunications" >Telecommunications</option>
              <option value="Transportation" >Transportation</option>
              <option value="Utilities" >Utilities</option>
              <option value="Other" >Other</option>
              <option value="Software" >Software</option>
              <option value="Hardware" >Hardware</option>
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
              <option value="Attempted to Contact" >Attempted to Contact</option>
              <option value="Cold" >Cold</option>
              <option value="Contact in Future" >Contact in Future</option>
              <option value="Contacted" >Contacted</option>
              <option value="Hot" >Hot</option>
              <option value="Junk Lead" >Junk Lead</option>
              <option value="Lost Lead" >Lost Lead</option>
              <option value="Not Contacted" >Not Contacted</option>
              <option value="Pre Qualified" >Pre Qualified</option>
              <option value="Qualified" >Qualified</option>
              <option value="Warm" >Warm</option>
            </select>
            </span></div></td>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Annual Revenue</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
            <div class="input-prepend"><span class="add-on">?</span>
              <input type="text" class="input-medium currencyField" name="annual_revenue" id="annual_revenue"/>
            </div>
            </span></div></td>
      </tr>
      <tr>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Rating</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
            <select class="chzn-select " name="rating" id="rating">
              <option value="">Select an Option</option>
              <option value="Acquired" >Acquired</option>
              <option value="Active" >Active</option>
              <option value="Market Failed" >Market Failed</option>
              <option value="Project Cancelled" >Project Cancelled</option>
              <option value="Shutdown" >Shutdown</option>
            </select>
            </span></div></td>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Number of Employees</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
            <input type="text" class="input-large" id="num_emp" name="num_emp" />
            </span></div></td>
      </tr>
      <tr>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Secondary Email</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
            <input class="input-large" type="text" name="secondary_mail" id="secondary_mail"/>
            </span></div></td>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Subscriptions</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
            <input type="hidden" name="emailoptout" value=0 />
            <input type="checkbox" name="emailoptout" value="yes"  id="emailoptout" />
            </span></div></td>
      </tr>
        </tbody>
      
    </table>
    <br>
    <table class="table table-bordered blockContainer showInlineTable equalSplit">
      <thead>
        <tr>
          <th class="blockHeader" colspan="4">Address Details</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor">*</span>Street</label></td>
          <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
           <div class="row-fluid"><span class="span10">
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="streetError" style="margin-top: -30px;">
                     <div class="formErrorContent">* This field is required<br></div>
                     <div class="formErrorArrow"><div class="line10"></div>
                  </div>
                  </div> 
                   </span></div>
              <textarea class="row-fluid" name="street" id="street" ></textarea>
              
              </span></div></td>
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
                   <?php foreach($country as $CON) {    ?>
                 <option value="<?php echo $CON['country_id']; ?>"  ><?php echo $CON['country_name']; ?></option>
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
                  <!--<option value="">Select an Option</option>-->
                   
                                    
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
                 <!-- <option value="">Select an Option</option>-->
             
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
          
              <input type="text" class="input-large" id="po_code" name="po_code" maxlength="6"/>
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
              <textarea class="span11 "  id="description" name="description"></textarea>
              </span></div></td>
        </tr>
      </tbody>
    </table>
    <br>
    <div class="row-fluid">
      <div class="pull-right">
        <button class="btn-success save" name="save" id="save"  type="submit"><strong>Save</strong></button>
        <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a></div>
      <div class="clearfix"></div>
    </div>
    <br>
  </form>
  </div>
  </div>
</section>


