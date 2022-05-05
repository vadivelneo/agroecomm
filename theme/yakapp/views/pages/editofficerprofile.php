<style>
.error
{
  color:#F00;
}
</style>
<link rel="stylesheet" href="<?php echo base_url(); ?>/resources/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/resources/css/target-admin.css">
<script language="javascript" type="text/javascript">
$(document).ready(function()
{ 
	$('.validate').css("display","none");
	
	$(".formInput input[name='enrollementtype']").click(function(){
																 
		var enrollementtype = $("input[name=enrollementtype]:checked").val();
						
		if(enrollementtype == 'business')
		{
			$("#companyFields" ).css("display", "block");
		}
		else if(enrollementtype == 'individual')
		{
			$("#companyFields" ).css("display", "none");
		}
		
	});
	
	$('#updateprofile').click(function()
	{ 
			var keepCheck;
		
			var firstname = $("#firstname").val();
		/*	var lastname = $("#lastname").val();
			var middlename = $("#middlename").val();
			var pancard = $('#pancard').val();
			var mobile = $("#mobile").val();
			var DOB = $("#DOB").val();
			
			var spouse_pancard = $('#spouse_pancard').val();
			var spouse_mobile = $("#spouse_mobile").val();
			var spouse_DOB = $("#spouse_DOB").val();
			
			
			var displayname = $("#displayname").val();
			var companyname = $("#companyname").val();
			var companypan = $("#companypan").val();
			
			var addressone = $("#addressone").val();
			var addresstwo = $("#addresstwo").val();
			var country = $("#country").val();
			var state = $("#state").val();
			var city = $("#city").val();
			var pinCode = $("#pinCode").val();*/
			var email = $("#email").val();
			
		/*	var accountHolderName = $("#accountHolderName").val();
			var accountno = $("#accountno").val();
			var bankName = $("#bankName").val();
			var IFSCNo = $("#IFSCNo").val();*/
			
			var Sponsor = $("#Sponsor").val();
			var placement = $("#placement").val();
		
		
		if(firstname == "")
		{
			$('#firstname').css("border","1px solid #FF0000");
			$('.validate').css("display","none");
			$('#firstnameError').css("display","block");
			$('#firstname').value="";
			$('#firstname').focus();
			return false;
		}
	    else
		{	
			$('#firstname').css("border","1px solid #d2d2d2");
			$('.validate').css("display","none");
		}
		
	/*	if(lastname == "")
		{
			$('#lastname').css("border","1px solid #FF0000");
			$('.validate').css("display","none");
			$('#lastnameError').css("display","block");
			$('#lastname').value="";
			$('#lastname').focus();
			return false;
		}
	    else
		{	
			$('#lastname').css("border","1px solid #d2d2d2");
			$('.validate').css("display","none");
		}
		
		if(pancard == "")
		{
		
			$('#pancard').css("border","1px solid #FF0000");
			$('.validate').css("display","none");
			$('#pancardError').css("display","block");
			$('#pancard').value="";
			$('#pancard').focus();
			return false;
		}
		/* else if(Ispan(pancard)==false)
		{
			$('#pancard').css("border","1px solid #FF0000");
			$('.validate').css("display","none");
			$('#pancardError').css("display","block");
			$('#pancardError').html("Invalid Pan Number");
			$('#pancard').value="";
			$('#pancard').focus();
			return false;
		}
		
	    else
		{	
			$('#pancard').css("border","1px solid #d2d2d2");
			$('.validate').css("display","none");
		}
		
		
		if(mobile == "")
		{
		
			$('#mobile').css("border","1px solid #FF0000");
			$('.validate').css("display","none");
			$('#mobileError').css("display","block");
			$('#mobile').value="";
			$('#mobile').focus();
			return false;
		}
		 else if(Ismobile(mobile)==false)
		{
			$('#mobile').css("border","1px solid #FF0000");
			$('.validate').css("display","none");
			$('#mobileError').css("display","block");
			$('#mobileError').html("Invalid mobile Number");
			$('#mobile').value="";
			$('#mobile').focus();
			return false;
		}
		
	    else
		{	
			$('#mobile').css("border","1px solid #d2d2d2");
			$('.validate').css("display","none");
		}
		
		if(DOB == "")
		{
			$('#DOB').css("border","1px solid #FF0000");
			$('.validate').css("display","none");
			$('#DOBError').css("display","block");
			$('#DOB').value="";
			$('#DOB').focus();
			return false;
		}
	    else
		{	
			$('#DOB').css("border","1px solid #d2d2d2");
			$('.validate').css("display","none");
		}
		
		if($('input[name=enrollementtype]:checked').length<=0)
		{
			$('.validate').css("display","none");
			$('#enrollementtypeError').css("display","block");
			return false;
		}
	    else
		{	
			var enrollementtype = $("input[name=enrollementtype]:checked").val();
						
			if(enrollementtype == 'business')
			{
				if(companyname == "")
				{
					$('#companyname').css("border","1px solid #FF0000");
					$('.validate').css("display","none");
					$('#companynameError').css("display","block");
					$('#companyname').value="";
					$('#companyname').focus();
					return false;
				}
				else
				{	
					$('#companyname').css("border","1px solid #d2d2d2");
					$('.validate').css("display","none");
				}
				
				if (companypan != "")
				{                    
					if (!(companypan.substr(3, 1).toLowerCase() == 'f' || companypan.substr(3, 1).toLowerCase() == 'c' || companypan.substr(3, 1).toLowerCase() == 't')) {
						$('#companypan').css("border","1px solid #FF0000");
						$('.validate').css("display","none");
						$('#companypanError').css("display","block");
						$('#companypan').value="";
						$('#companypan').focus();
						return false;
					}
					else
					{	
						$('#companypan').css("border","1px solid #d2d2d2");
						$('.validate').css("display","none");
					}
		
				}
			}
			else
			{
				$('#enrollementtype').css("border","1px solid #d2d2d2");
				$('.validate').css("display","none");
			}
		}
		
		if(spouse_pancard != "")
		{
			if(Ispan(spouse_pancard)==false)
		{
			$('#spouse_pancard').css("border","1px solid #FF0000");
			$('.validate').css("display","none");
			$('#spouse_pancardError').css("display","block");
			$('#spouse_pancardError').html("Invalid Pan Number");
			$('#spouse_pancard').value="";
			$('#spouse_pancard').focus();
			return false;
		}
		
	    else
		{	
			$('#spouse_pancard').css("border","1px solid #d2d2d2");
			$('.validate').css("display","none");
		}
		}
	    
		if(spouse_mobile != "")
		{
			if(Ismobile(spouse_mobile)==false)
		{
			$('#spouse_mobile').css("border","1px solid #FF0000");
			$('.validate').css("display","none");
			$('#spouse_mobileError').css("display","block");
			$('#spouse_mobileError').html("Invalid Mobile Number");
			$('#spouse_pancard').value="";
			$('#spouse_mobile').focus();
			return false;
		}
		
	    else
		{	
			$('#spouse_mobile').css("border","1px solid #d2d2d2");
			$('.validate').css("display","none");
		}
		}
						
		if(addressone == "")
		{
			$('#addressone').css("border","1px solid #FF0000");
			$('.validate').css("display","none");
			$('#addressoneError').css("display","block");
			$('#addressone').value="";
			$('#addressone').focus();
			return false;
		}
	    else
		{	
			$('#addressone').css("border","1px solid #d2d2d2");
			$('.validate').css("display","none");
		}
		
		if(addresstwo == "")
		{
			$('#addresstwo').css("border","1px solid #FF0000");
			$('.validate').css("display","none");
			$('#addresstwoError').css("display","block");
			$('#addresstwo').value="";
			$('#addresstwo').focus();
			return false;
		}
	    else
		{	
			$('#addresstwo').css("border","1px solid #d2d2d2");
			$('.validate').css("display","none");
		}
		
		if(addressthree == "")
		{
			$('#addressthree').css("border","1px solid #FF0000");
			$('.validate').css("display","none");
			$('#addressthreeError').css("display","block");
			$('#addressthree').value="";
			$('#addressthree').focus();
			return false;
		}
	    else
		{	
			$('#addressthree').css("border","1px solid #d2d2d2");
			$('.validate').css("display","none");
		}
		
		if(country == "")
		{
			$('#country').css("border","1px solid #FF0000");
			$('.validate').css("display","none");
			$('#countryError').css("display","block");
			$('#country').value="";
			$('#country').focus();
			return false;
		}
	    else
		{	
			$('#country').css("border","1px solid #d2d2d2");
			$('.validate').css("display","none");
		}
		
		if(state == "")
		{
			$('#state').css("border","1px solid #FF0000");
			$('.validate').css("display","none");
			$('#stateError').css("display","block");
			$('#state').value="";
			$('#state').focus();
			return false;
		}
	    else
		{	
			$('#state').css("border","1px solid #d2d2d2");
			$('.validate').css("display","none");
		}
		
		if(city == "")
		{
			$('#city').css("border","1px solid #FF0000");
			$('.validate').css("display","none");
			$('#cityError').css("display","block");
			$('#city').value="";
			$('#city').focus();
			return false;
		}
	    else
		{	
			$('#city').css("border","1px solid #d2d2d2");
			$('.validate').css("display","none");
		}
		
		if(pinCode == "")
		{
			$('#pinCode').css("border","1px solid #FF0000");
			$('.validate').css("display","none");
			$('#pinCodeError').css("display","block");
			$('#pinCode').value="";
			$('#pinCode').focus();
			return false;
		}
	    else
		{	
			$('#pinCode').css("border","1px solid #d2d2d2");
			$('.validate').css("display","none");
		}*/
		
		if(email == "")
		{
			$('#email').css("border","1px solid #FF0000");
			$('.validate').css("display","none");
			$('#emailError').css("display","block");
			$('#email').value="";
			$('#email').focus();
			return false;
		}
	 /*   else if(IsEmail(email)==false)
		{	
			$('#email').css("border","1px solid #FF0000");
			$('.validate').css("display","none");
			$('#emailError').css("display","block");
			$('#emailError').html("Invalid EMail");
			$('#email').value="";
			$('#email').focus();
			return false;
		}	
		else
		{
			$('#email').css("border","1px solid #d2d2d2");
			$('.validate').css("display","none");
		}
        
		
		if(accountHolderName == "")
		{
			$('#accountHolderName').css("border","1px solid #FF0000");
			$('.validate').css("display","none");
			$('#accountHolderNameError').css("display","block");
			$('#accountHolderName').value="";
			$('#accountHolderName').focus();
			return false;
		}
	    else
		{	
			$('#accountHolderName').css("border","1px solid #d2d2d2");
			$('.validate').css("display","none");
		}
		
		if(accountno == "")
		{
			$('#accountno').css("border","1px solid #FF0000");
			$('.validate').css("display","none");
			$('#accountnoError').css("display","block");
			$('#accountno').value="";
			$('#accountno').focus();
			return false;
		}
	    else
		{	
			$('#accountno').css("border","1px solid #d2d2d2");
			$('.validate').css("display","none");
		}
		
		
		if(bankName == "")
		{
			$('#bankName').css("border","1px solid #FF0000");
			$('.validate').css("display","none");
			$('#bankNameError').css("display","block");
			$('#bankName').value="";
			$('#bankName').focus();
			return false;
		}
	    else
		{	
			$('#bankName').css("border","1px solid #d2d2d2");
			$('.validate').css("display","none");
		}
		
		if(IFSCNo == "")
		{
			$('#IFSCNo').css("border","1px solid #FF0000");
			$('.validate').css("display","none");
			$('#IFSCNoError').css("display","block");
			$('#IFSCNo').value="";
			$('#IFSCNo').focus();
			return false;
		}
		else if (IFSCNo.length != 11) {
			$('#IFSCNo').css("border","1px solid #FF0000");
			$('.validate').css("display","none");
			$('#IFSCNoError').css("display","block");
			$('#IFSCNoError').html("Please, enter  ifsc in 11 digits");
			$('#IFSCNo').value="";
			$('#IFSCNo').focus();
			return false;
		}
	    else
		{	
			$('#IFSCNo').css("border","1px solid #d2d2d2");
			$('.validate').css("display","none");
		}
		
		if($('input[name=AcType]:checked').length<=0)
		{
			$('.validate').css("display","none");
			$('#AcTypeError').css("display","block");
			return false;
		}
	    else
		{	
			$('#AcType').css("border","1px solid #d2d2d2");
			
			$('.validate').css("display","none");
		}
		*/
});

var cout = $('select#country').val();
var state = $('#state_id').val();
var city = $('#city_id').val();
	 
 $.ajax({
 		type: 'POST',
 		url: '<?php echo site_url('genelogy/update_getState'); ?>',
 		data: {country: cout, state: state},
 		success: function(resp) { 
			$('select#state').html(resp);
 		}
	 });
	   
	   $.ajax({
 		type: 'POST',
 		url: '<?php echo site_url('genelogy/update_getCity'); ?>',
 		data: {country: cout, state: state, city: city},
 		success: function(resp) { 
			$('select#city').html(resp);
 		}
	 });


});

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

function Ispan(pancard)
{
		var regex =  /^([A-Z]){5}([0-9]){4}([A-Z]){1}?$/;
		if(!regex.test(pancard)) 
		{
			return false;
		}
		else
		{
			return true;
		}
}

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

</script>

<script type="text/javascript">

function activateState()
 {
 	var cout = $('select#country').val();
	
 	$.ajax({
 		type: 'POST',
 		url: '<?php echo site_url('genelogy/getstate'); ?>',
 		data: 'country='+cout,
 		success: function(resp) {
 			$('select#state').html(resp);
 		}
	 });
 }
 function activateCity()
{
	var cout = $('select#country').val();
	 
 	var state = $('select#state').val();
 	$.ajax({
 		type: 'POST',
 		url: '<?php echo site_url('genelogy/getcityList'); ?>',
 		data: {country: cout, state: state},
 		success: function(resp) { 
			$('select#city').html(resp);
 		}
	 });
}
 
function isNumberKey(evt)
{
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57))
	{
		alert('Please Enter Numeric only');
		return false;
	}

	return true;
}

</script>

<div class="container">

  <div class="content" >

    <div class="content-container">

      

      <div class="content-header">
        <h2 class="content-header-title">Update Enrollment</h2>
       <!-- <ol class="breadcrumb">
          <li><a href="<?php echo site_url(); ?>">Home</a></li>
          <li><a href="javascript:;">Enrollment</a></li>
          <li class="active">New Enrollment</li>
        </ol> -->
      </div> <!-- /.content-header -->

      

      <div class="row">

        <div class="col-sm-12">
		  <form id="validate-enhanced" action="<?php echo site_url('genelogy/editOfficerProfile').'/'.$this->uri->segment('3'); ?>" id="enrollment" class="form parsley-form" method="POST" enctype="multipart/form-data">
		<div class="portlet">

        <div class="portlet-header">

          <h3>
            <i class="fa fa-tasks"></i>
              Placement Details
			  <span style="margin-left: 50px; color:#ff0000; font-family: Verdana, Geneva, sans-serif; font-size: 16px;"><?php echo $this->session->flashdata('message'); ?></span>
          </h3>

        </div> <!-- /.portlet-header -->

       <div class="portlet-content">
                      
                <div class="form-group col-sm-6">
                  <label for="name">Referal Id <span class="error">*</span></label>
                  <input type="text" readonly id="Sponsor" name="Sponsor"  value="<?php if(isset($edituserdetails->OFCR_USR_VALUE)) { echo $edituserdetails->OFCR_USR_VALUE ; } ?>" class="form-control" data-required="true" >
           <div class="errorMsg">
                  <span class="validate" id="SponsorError">Please enter SponsorID </span>
                  </div> 
                </div>
                                                
                 
            </div> <!-- /.portlet-content -->

          </div>

          <div class="portlet">

            <div class="portlet-header">

              <h3>
                <i class="fa fa-tasks"></i>
                Enrollment
                
              </h3>

            </div> <!-- /.portlet-header -->

            <div class="portlet-content">
        
            
           <!-- <div class="col-sm-6"> -->
 <input type="hidden" name="state_id" id="state_id" value="<?php if(isset($edituserdetails->OFCR_BILL_ST)) { echo $edituserdetails->OFCR_BILL_ST; } ?>" />
    <input type="hidden" name="city_id" id="city_id" value="<?php if(isset($edituserdetails->OFCR_BILL_CTY)) { echo $edituserdetails->OFCR_BILL_CTY; } ?>" />
              <div class="form-group col-sm-6">
                <label for="name">First Name <span class="error">*</span></label>
                <input type="text" id="firstname" readonly name="firstname" class="form-control" value="<?php if(isset($edituserdetails->OFCR_FST_NME)) { echo $edituserdetails->OFCR_FST_NME; } ?>"  >
                <div class="errorMsg">
                  <span class="validate" id="firstnameError">Please Enter First Name </span>
                  </div>
              </div>
			       <div class="form-group col-sm-6">
                <label for="text-input">Last Name <span class="error">*</span></label>
                <input type="text" id="lastname" readonly name="lastname" class="form-control" value="<?php if(isset($edituserdetails->OFCR_LST_NME)) { echo $edituserdetails->OFCR_LST_NME; } ?>" >
                 <div class="errorMsg">
                  <span class="validate" id="lastnameError">Please Enter Last Name  </span>
                  </div>
                </div>
              <div class="form-group col-sm-6">
                <label for="text-input">Middle Name</label>
                 <input type="text" id="middlename" readonly name="middlename" class="form-control" value="<?php if(isset($edituserdetails->OFCR_MID_NME)) { echo $edituserdetails->OFCR_MID_NME; } ?>">
                 <div class="errorMsg">
                  <span class="validate" id="middlenameError">Please Enter Middle Name </span>
                  </div>
                </div>
              <div class="form-group col-sm-6">
                <label for="text-input">PAN Card NO</label>
                 <input type="text" id="pancard" name="pancard" class="form-control" value="<?php if(isset($edituserdetails->OFCR_PAN)) { echo $edituserdetails->OFCR_PAN; } ?>">
                 <div class="errorMsg">
                  <span class="validate" id="pancardError">Please Enter Pan Number </span>
                  </div>
                 </div>

           

            <!--<div class="col-sm-6 col-sm-6"> -->
            <div class="form-group col-sm-6">
                <label for="text-input">Mobile No <span class="error">*</span></label>
                <input type="text" id="mobile" name="mobile" class="form-control" value="<?php if(isset($edituserdetails->OFCR_MOB)) { echo $edituserdetails->OFCR_MOB; } ?>">
                <div class="errorMsg">
                  <span class="validate" id="mobileError">Please Enter Mobile Number </span>
                  </div>
              </div>
              
              <div class="form-group col-sm-6">
                  <label for="date-2">Date Of Birth <span class="error">*</span></label>
                  <div class="input-group date ui-datepicker">
                        <input type="date"  class="form-control parsley-validated" name="DOB" id="DOB" value="<?php if($edituserdetails->OFCR_DOB){echo ($edituserdetails->OFCR_DOB);}?>">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>    
                  </div>
                  <div class="errorMsg">
                  <span class="validate" id="DOBError">Please Enter DOB </span>
                  </div>
              </div>    
              <div class="form-group col-sm-6">
                <label for="text-input">Display Name </label>
               <input type="text" id="displayname" name="displayname" class="form-control" value="<?php if(isset($edituserdetails->OFCR_DISP_NME)) { echo $edituserdetails->OFCR_DISP_NME; } ?>" >
                <div class="errorMsg">
                  <span class="validate" id="displaynameError">Please Enter Display Name </span>
                  </div>
              </div>    
				    <div class="form-group col-sm-6">
                <label for="text-input">Aadhar No. </label>
                <input type="text" class="textbox" name="aadhar_no" id="aadhar_no" value="<?php if(isset($edituserdetails->OFCR_AADHAR)) { echo $edituserdetails->OFCR_AADHAR; } ?>">
                <div class="errorMsg">
                  <span class="validate" id="displaynameError">Please Enter Display Name </span>
                  </div>
              </div>    
             <!--   </div>-->
				<div class="form-group col-sm-6" style=" height: 35px; margin-top: 27px; width: auto;">
                  <label for="name"> Enrollment Type <span class="error">*</span> </label>
                  <input  type="radio" name="enrollementtype" value="business" <?php if(isset($edituserdetails->OFCR_ENROLL_TYP)) { if($edituserdetails->OFCR_ENROLL_TYP == 'business') { ?> checked="checked" <?php  } } ?> />
                    <label>BUISNESS </label>
                   <input  type="radio" name="enrollementtype" value="individual" <?php if(isset($edituserdetails->OFCR_ENROLL_TYP)) { if($edituserdetails->OFCR_ENROLL_TYP == 'individual') { ?> checked="checked" <?php  } } ?> />
                    <label>INDIVIDUAL</label>
                  <div class="errorMsg">
                  <span class="validate" id="enrollementtypeError">Please Select  Enrollment Type </span>
                  </div>  
                 </div>
                  <div class="form_main" id="companyFields" style="display: none;">
                 <div class="form-group col-sm-6">
                  <label for="name">Company Name <span class="error">*</span></label>
                   <input type="text" id="companyname" name="companyname" class="form-control" value="<?php if(isset($edituserdetails->OFCR_CMP_NME)) { echo $edituserdetails->OFCR_CMP_NME; } ?>" >
           <div class="errorMsg">
                  <span class="validate" id="companynameError">Please Enter Company Name </span>
                  </div>
                </div>
                 <div class="form-group col-sm-6">
                  <label for="name">Company Pan No  </label>
                  <input type="text" id="companypan" name="companypan" class="form-control" value="<?php if(isset($edituserdetails->OFCR_CMP_PAN)) { echo $edituserdetails->OFCR_CMP_PAN; } ?>" >
           <div class="errorMsg">
                  <span class="validate" id="companypanError">Invalid Pan Number  </span>
                  </div>
                </div>
                </div>
              

            </div> <!-- /.col -->
			
             <!-- /.col -->

          </div> <!-- /.row -->

           <!-- /.row -->


        </div> <!-- /.portlet-content -->

      </div>

           <!-- /.portlet -->
<div class="portlet">

        <div class="portlet-header">

          <h3>
            <i class="fa fa-tasks"></i>
             Nominee Details
          </h3>

        </div> <!-- /.portlet-header -->

        <div class="portlet-content">

          <div class="row">

           <!-- <div class="form-group col-sm-6"> -->

              <div class="form-group col-sm-6">
                <label for="text-input">First Name</label>
               <input type="text" id="spouse_firstname" name="spouse_firstname" class="form-control" value="<?php if(isset($edituserdetails->OFCR_SPOUSE_FST_NME)) { echo $edituserdetails->OFCR_SPOUSE_FST_NME; } ?>"  >
				   
                <div class="errorMsg">
                  <span class="validate" id="spouse_firstnameError">Please Enter First Name </span>
                  </div>
                </div>
       <div class="form-group col-sm-6">
                <label for="text-input">Last Name </label>
                <input type="text" id="spouse_lastname" name="spouse_lastname" class="form-control" value="<?php if(isset($edituserdetails->OFCR_SPOUSE_LST_NME)) { echo $edituserdetails->OFCR_SPOUSE_LST_NME; } ?>" >
                <div class="errorMsg">
                  <span class="validate" id="spouse_lastnameError">Please Enter Last Name </span>
                  </div>
                </div>
              <div class="form-group col-sm-6">
                <label for="text-input">Middle Name</label>
              <input type="text" id="spouse_middlename" name="spouse_middlename" class="form-control" value="<?php if(isset($edituserdetails->OFCR_SPOUSE_MID_NME)) { echo $edituserdetails->OFCR_SPOUSE_MID_NME; } ?>">
                <div class="errorMsg">
                  <span class="validate" id="spouse_middlenameError">Please Enter Middle Name </span>
                  </div>
                </div>
              <div class="form-group col-sm-6">
                <label for="text-input">PAN Card NO</label>
                <input type="text" id="spouse_pancard" name="spouse_pancard" class="form-control" value="<?php if(isset($edituserdetails->OFCR_SPOUSE_PAN)) { echo $edituserdetails->OFCR_SPOUSE_PAN; } ?>">
                <div class="errorMsg">
                  <span class="validate" id="spouse_pancardError">Please Enter Pan Number </span>
                  </div>
              </div>
              <div class="form-group col-sm-6">
                <label for="text-input">Mobile No </label>
                <input type="text" id="spouse_mobile" name="spouse_mobile" class="form-control" value="<?php if(isset($edituserdetails->OFCR_SPOUSE_MOB)) { echo $edituserdetails->OFCR_SPOUSE_MOB; } ?>">
                <div class="errorMsg">
                  <span class="validate" id="spouse_mobileError">Please Enter Mobile Number </span>
                  </div> 
              </div>
              
              <div class="right">
                <div class="right_form1">
                  <div class="formLabelDiv">
                    <label class="formlabel">DOB</label>
                  </div>
                  <div class="formInput">
                    <input type="date"  name="spouse_DOB" id="spouse_DOB" value="<?php  if($edituserdetails->OFCR_SPOUSE_DOB) { echo $edituserdetails->OFCR_SPOUSE_DOB; } ?>">
                  </div>
                 
                </div>
              </div>

              

          <!--  </div>  /.col -->
              

            </div> <!-- /.col -->
			
             <!-- /.col -->

          </div> <!-- /.row -->

           <!-- /.row -->


        </div> <!-- /.portlet-content -->

     
      <div class="portlet" >

        <div class="portlet-header">

          <h3>
            <i class="fa fa-tasks"></i>
              Address Details 
          </h3>

        </div> <!-- /.portlet-header -->

        <div class="portlet-content">

          <div class="row">

          <!--  <div class="col-sm-6">-->

              <div class="form-group col-sm-6">
                <label for="text-input">Address 1 <span class="error">*</span></label>
                <input type="text" id="addressone" name="addressone" class="form-control" value="<?php if(isset($edituserdetails->OFCR_BILL_ADDRS1)) { echo $edituserdetails->OFCR_BILL_ADDRS1; } ?>" >
                <div class="errorMsg">
                  <span class="validate" id="addressoneError">Please Enter Address Details </span>
                  </div>
              </div>

              <div class="form-group col-sm-6">
                <label for="text-input">Address 2 <span class="error">*</span></label>
                <input type="text" id="addresstwo" name="addresstwo" class="form-control" value="<?php if(isset($edituserdetails->OFCR_BILL_ADDRS2)) { echo $edituserdetails->OFCR_BILL_ADDRS2; } ?>" >
                <div class="errorMsg">
                  <span class="validate" id="addresstwoError">Please Enter Address Details </span>
                  </div>
              </div>

              <div class="form-group col-sm-6">
                <label for="text-input">Address 3</label>
                <input type="text" id="addressthree" name="addressthree" class="form-control" value="<?php if(isset($edituserdetails->OFCR_BILL_ADDRS3)) { echo $edituserdetails->OFCR_BILL_ADDRS3; } ?>" >
              </div>

              <div class="form-group col-sm-6">
                  <label for="name">Country <span class="error">*</span></label>
                   <select name="country" id="country" class="form-control" onchange="getcountry()">
                      <option value="">Select Your Country</option>
                     
                                <?php foreach($ctry as $Con) { 
								 
								?>
                                    <option value="<?php echo $Con['CNTRY_ID']; ?>" <?php if(isset($edituserdetails->OFCR_BILL_CNTRY)) { if($edituserdetails->OFCR_BILL_CNTRY == $Con['CNTRY_ID']) { ?> selected="selected" <?php  } } ?> ><?php echo $Con['CNTRY_NME']; ?></option>
                                <?php } ?>
                  </select>
                  <div class="errorMsg">
                  <span class="validate" id="countryError">Please Select your country </span>
                  </div>
                </div>

              <div class="form-group col-sm-6">
                  <label for="name">State <span class="error">*</span> </label>
                  <select name="state" id="state" class="form-control"  onchange="activateCity()" data-required="true">
                    <option value="">Select Your State</option>
                     
                  
                    </select>
                     <div class="errorMsg">
                  <span class="validate" id="stateError">Please select your State</span>
                  </div>
              </div>
              <div class="form-group col-sm-6">
                  <label for="name">City <span class="error">*</span></label>
                   <select name="city" id="city" class="form-control" >
                    <option value="">Select Your City</option>
                     
                  
                    </select>
                  <div class="errorMsg">
                  <span class="validate" id="cityError">Please select your City </span>
                  </div>
              </div>
               <div class="form-group col-sm-6">
                <label for="text-input">Postal Code <span class="error">*</span></label>
                <input type="text" id="pinCode" name="pinCode" class="form-control" value="<?php if(isset($edituserdetails->OFCR_BILL_ZIP)) { echo $edituserdetails->OFCR_BILL_ZIP; } ?>" >
                <div class="errorMsg">
                  <span class="validate" id="pinCodeError">Please enter Postal Code </span>
                  </div>
              </div>
               <div class="form-group col-sm-6">
                <label for="text-input">Email Id <span class="error"></span></label>
                <input type="text" id="email" name="email" class="form-control" value="<?php if(isset($edituserdetails->OFCR_BILL_EMAIL)) { echo $edituserdetails->OFCR_BILL_EMAIL; } ?>" >
                <div class="errorMsg">
                  <span class="validate" id="emailError">Please enter Email </span>
                  </div> 
              </div>
         <!--  </div> <!-- /.col -->
            </div> <!-- /.col -->
			
             <!-- /.col -->

          </div> <!-- /.row -->

           <!-- /.row -->


        </div> <!-- /.portlet-content -->

      
      <div class="portlet">

        <div class="portlet-header">

          <h3>
            <i class="fa fa-tasks"></i>
              Bank Details 
          </h3>

        </div> <!-- /.portlet-header -->

        <div class="portlet-content">

          <div class="row">

           <!-- <div class="col-sm-6"> -->

              <div class="form-group col-sm-6">
                <label for="text-input">Account Name</label>
               <input type="text" id="accountHolderName" name="accountHolderName" class="form-control" value="<?php if(isset($edituserdetails->OFCR_BNK_ACCNT_HOLD_NME)) { echo $edituserdetails->OFCR_BNK_ACCNT_HOLD_NME; } ?>">
                <div class="errorMsg">
                  <span class="validate" id="accountHolderNameError">Please enter Account Name </span>
                  </div> 
              </div>
              <div class="form-group col-sm-6">
                <label for="text-input">Account Number</label>
                 <input type="text" id="accountno" name="accountno" class="form-control" value="<?php if(isset($edituserdetails->OFCR_BNK_ACCNT_NUM)) { echo $edituserdetails->OFCR_BNK_ACCNT_NUM; } ?>" >
                <div class="errorMsg">
                  <span class="validate" id="accountnoError">Please enter Account Number </span>
                  </div> 
              </div>
               <div class="form-group col-sm-6">
                <label for="text-input">Bank Name </label>
                  <input type="text" id="bankName" name="bankName" class="form-control" value="<?php if(isset($edituserdetails->OFCR_BNK_NME)) { echo $edituserdetails->OFCR_BNK_NME; } ?>">
                <div class="errorMsg">
                  <span class="validate" id="bankNameError">Please enter Bank Name </span>
                  </div>  
              </div>
               <div class="form-group col-sm-6">
                <label for="text-input">IFSC Code</label>
                <input type="text" id="IFSCNo" name="IFSCNo" class="form-control" value="<?php if(isset($edituserdetails->OFCR_BNK_IFSC)) { echo $edituserdetails->OFCR_BNK_IFSC; } ?>">
                <div class="errorMsg">
                  <span class="validate" id="IFSCNoError">Please enter Bank IFS code </span>
                  </div>
              </div>
              <div class="form-group col-sm-6">
                  <label for="name"> Account Type </label>
                   <input  type="radio" name="AcType" value="saving" <?php if(isset($edituserdetails->OFCR_BNK_ACCNT_TYP)) { if($edituserdetails->OFCR_BNK_ACCNT_TYP == 'saving') { ?> checked="checked" <?php  } } ?> />
                    <label>SAVINGS </label>
                    <input  type="radio" name="AcType" value="current" <?php if(isset($edituserdetails->OFCR_BNK_ACCNT_TYP)) { if($edituserdetails->OFCR_BNK_ACCNT_TYP == 'current') { ?> checked="checked" <?php  } } ?> />
                    <label>CURRENT</label>
                <div class="errorMsg">
                  <span class="validate" id="AcTypeError">Please Select Account Type </span>
                  </div>     
              </div>
              <div class="form-group col-sm-6">
                <label for="text-input">Branch Name </label>
                 <input type="text" id="BranchName" name="BranchName" class="form-control" value="<?php if(isset($edituserdetails->OFCR_BNK_BRN_NME)) { echo $edituserdetails->OFCR_BNK_BRN_NME; } ?>" >
                <div class="errorMsg">
                  <span class="validate" id="BranchNameError">Please Enter Your Branch Name </span>
                  </div>
              </div>
              <div class="form-group col-sm-6">
                <label for="text-input">Branch Address</label>
                 <input type="text" id="BranchAddress" name="BranchAddress" class="form-control" data-required="true" value="<?php if(isset($edituserdetails->OFCR_BNK_BRN_ADDR)) { echo $edituserdetails->OFCR_BNK_BRN_ADDR; } ?>" >
              </div>

              

             

           <!-- </div> <!-- /.col -->

            
			
             <!-- /.col -->

          </div> <!-- /.row -->

           <!-- /.row -->


        </div> <!-- /.portlet-content -->

      </div>

<div class="portlet">

        <div class="portlet-header">

          <h3>
            <i class="fa fa-tasks"></i>
             Attachments
          </h3>

        </div> <!-- /.portlet-header -->

       <div class="portlet-content">
                      
                <div class="form-group col-sm-6">
                 <label class="formlabel">PAN CARD</label>
                 <input type="file" name="pan_card" class="textbox" size="40" accept=".pdf" >
				  <a target="_blank" href="<?php echo base_url(); ?>/resources/uploads/<?php if(isset($edituserdetails->officer_id)) { echo $edituserdetails->officer_id ; } ?>/<?php if(isset($edituserdetails->pan_card)) { echo $edituserdetails->pan_card ; } ?>" title="<?php if(isset($edituserdetails->pan_card)) { echo $edituserdetails->pan_card ; } ?>"><img src="<?php echo base_url(); ?>/resources/images/download.png"  height="42" width="42"></a>
					<input type="hidden" name="hiddenpan_card" id="hiddenpan_card" value="<?php if(isset($edituserdetails->pan_card)) { echo $edituserdetails->pan_card ; } ?>" />
           <div class="errorMsg">
                 
                  </div> 
                </div>
                
               
            
                 <div class="form-group col-sm-6">
                 <label class="formlabel">AADHAR</label>
                  <input type="file" class="textbox" name="aadhar_xerox" size="40" accept=".pdf" >
				  <a target="_blank" href="<?php echo base_url(); ?>/resources/uploads/<?php if(isset($edituserdetails->officer_id)) { echo $edituserdetails->officer_id ; } ?>/<?php if(isset($edituserdetails->aadhar_xerox)) { echo $edituserdetails->aadhar_xerox ; } ?>" title="<?php if(isset($edituserdetails->aadhar_xerox)) { echo $edituserdetails->aadhar_xerox ; } ?>"><img src="<?php echo base_url(); ?>/resources/images/download.png"  height="42" width="42"></a>
					<input type="hidden" name="hiddenaadhar" id="hiddenaadhar" value="<?php if(isset($edituserdetails->aadhar_xerox)) { echo $edituserdetails->aadhar_xerox ; } ?>" />
          <div class="errorMsg">
                 
                  </div> 
                </div>
				
				 <div class="form-group col-sm-6">
                 <label class="formlabel">PASSBOOK</label>
                    <input type="file"  class="textbox" name="passbook_xerox" size="40" accept=".pdf" >
					<a target="_blank" href="<?php echo base_url(); ?>/resources/uploads/<?php if(isset($edituserdetails->passbook_xerox)) { echo $edituserdetails->officer_id ; } ?>/<?php if(isset($edituserdetails->passbook_xerox)) { echo $edituserdetails->passbook_xerox ; } ?>" title="<?php if(isset($edituserdetails->passbook_xerox)) { echo $edituserdetails->passbook_xerox ; } ?>"><img src="<?php echo base_url(); ?>/resources/images/download.png"  height="42" width="42"></a>
					<input type="hidden" name="hiddenpassbook" id="hiddenpassbook" value="<?php if(isset($edituserdetails->passbook_xerox)) { echo $edituserdetails->passbook_xerox ; } ?>" />
           <div class="errorMsg">
                 
                  </div> 
                </div>
                
               
            
                 <div class="form-group col-sm-6">
                 <label class="formlabel">PHOTO</label>
                  <input type="file" class="textbox" name="profilepicture" size="40"  >
				  <a target="_blank" href="<?php echo base_url(); ?>/resources/uploads/<?php if(isset($edituserdetails->officer_id)) { echo $edituserdetails->officer_id ; } ?>/<?php if(isset($edituserdetails->user_photo)) { echo $edituserdetails->user_photo ; } ?>" title="<?php if(isset($edituserdetails->user_photo)) { echo $edituserdetails->user_photo ; } ?>"><img src="<?php echo base_url(); ?>/resources/images/download.png"  height="42" width="42"></a>
					<input type="hidden" name="hiddenprofilepicture" id="hiddenprofilepicture" value="<?php if(isset($edituserdetails->user_photo)) { echo $edituserdetails->user_photo ; } ?>" />
          <div class="errorMsg">
                 
                  </div> 
                </div>
                 <div class="form-group col-sm-6">
                 <button type="submit" class="btn btn-primary" name="updateProfile" id="updateprofile">Submit</button>
                </div>

            </div> <!-- /.portlet-content -->

          </div>
      
 </form>
        </div>

      </div> <!-- /.row -->


    
    </div> <!-- /.content-container -->
      
 
