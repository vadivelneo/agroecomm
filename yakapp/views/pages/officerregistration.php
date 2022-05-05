<!-- Content Wrapper. Contains page content -->
<style>
.validate{ display:none; }
</style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Enrollment</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New Enrollment</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-9">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo site_url('genelogy/addnewofficer'); ?>" id="enrollment" method="POST" enctype="multipart/form-data">

		  
                <div class="card-body">
				
					<div class="portlet">
					<div class="portlet-header">
						<h3>Placement Details</h3>
						<span style="margin-left: 50px; color:#ff0000; font-family: Verdana, Geneva, sans-serif; font-size: 16px;"><?php echo $this->session->flashdata('message'); ?></span>
					</div> 
					<div class="row">
						<div class="form-group col-md-4">
							<label for="name">Referal Id <span class="error">*</span></label>
							<input type="text" id="Sponsor" name="Sponsor" onkeyup="ajax_sponsorid()" class="form-control" data-required="true" >
							<div class="errorMsg">
								<span class="validate" id="SponsorError">Please enter SponsorID </span>
							</div> 
						</div>
						<div class="form-group  col-md-4">
							<label for="name">Mobile <span class="error"></span></label>
							<input type="text" id="enroll_mobile" name="enroll_mobile" onkeyup="ajax_mobile()" class="form-control" data-required="true" >
							<div class="errorMsg">
								<span class="validate" id="SponsorError">Please enter SponsorID </span>
							</div> 
						</div>
						<div class="form-group  col-md-4">
							<label for="name">Name <span class="error"></span></label>
							<input type="text" id="enroll_name" name="enroll_name" class="form-control" data-required="true" >
							<div class="errorMsg">
								<span class="validate" id="SponsorError">Please enter SponsorID </span>
							</div> 
						</div>
					</div>
				</div>
				<hr>
                  <div class="row">
				  <!-- <div class="col-sm-6"> -->
						<div class="portlet-header">

						  <h3>
							 
							Enrollment
						  
						  </h3>

						</div> 
						<div class="col-sm-6"></div>
						  <div class="form-group col-sm-6">
							<label for="name">First Name <span class="error">*</span></label>
							<input type="text" id="firstname" name="firstname" class="form-control">
							<div class="errorMsg">
							  <span class="validate" id="firstnameError">Please Enter First Name </span>
							  </div>
						  </div>
							   <div class="form-group col-sm-6">
							<label for="text-input">Last Name <span class="error">*</span></label>
							<input type="text" id="lastname" name="lastname" class="form-control">
							 <div class="errorMsg">
							  <span class="validate" id="lastnameError">Please Enter Last Name  </span>
							  </div>
							</div>
						  <div class="form-group col-sm-6">
							<label for="text-input">Middle Name</label>
							<input type="text" id="middlename" name="middlename" class="form-control">
							 <div class="errorMsg">
							  <span class="validate" id="middlenameError">Please Enter Middle Name </span>
							  </div>
							</div>
						  <div class="form-group col-sm-6">
							<label for="text-input">PAN Card NO</label>
							<input type="text" id="pancard" name="pancard" class="form-control">
							 <div class="errorMsg">
							  <span class="validate" id="pancardError">Please Enter Pan Number </span>
							  </div>
							 </div>

					   

						<!--<div class="col-sm-6 col-sm-6"> -->
						<div class="form-group col-sm-6">
							<label for="text-input">Mobile No <span class="error">*</span></label>
							<input type="text" id="mobile" name="mobile" class="form-control">
							<div class="errorMsg">
							  <span class="validate" id="mobileError">Please Enter Mobile Number </span>
							  </div>
						  </div>
						  
						  <div class="form-group col-sm-6">
							  <label for="date-2">Date Of Birth <span class="error">*</span></label>
							  <div class="input-group date ui-datepicker">
								  <input type="date" id="DOB" name="DOB" class="form-control parsley-validated">
								     
							  </div>
							  <div class="errorMsg">
							  <span class="validate" id="DOBError">Please Enter DOB </span>
							  </div>
						  </div>    
						  <div class="form-group col-sm-6">
							<label for="text-input">Display Name </label>
							<input type="text" id="displayname" name="displayname" class="form-control">
							<div class="errorMsg">
							  <span class="validate" id="displaynameError">Please Enter Display Name </span>
							  </div>
						  </div>    
								<div class="form-group col-sm-6">
							<label for="text-input">Aadhar No. </label>
							<input type="text" class="form-control" name="aadhar_no" id="aadhar_no">
							<div class="errorMsg">
							  <span class="validate" id="displaynameError">Please Enter Display Name </span>
							  </div>
						  </div>    
						 <!--   </div>-->
							<div class="form-group col-sm-12" style=" height: 35px; margin-top: 27px; width: auto;">
							  <label for="name"> Enrollment Type <span class="error">*</span> </label>
							  <input  type="radio" name="enrollementtype" value="business" />
								<label>BUISNESS </label>
								<input  type="radio" name="enrollementtype" value="individual" />
								<label>INDIVIDUAL</label>
							  <div class="errorMsg">
							  <span class="validate" id="enrollementtypeError">Please Select  Enrollment Type </span>
							  </div>  
							 </div>
							  <div class="form_main col-sm-12" id="companyFields" style="display: none;">
							 <div class="form-group col-sm-6">
							  <label for="name">Company Name <span class="error">*</span></label>
							  <input type="text" id="companyname" name="companyname" class="form-control" >
					   <div class="errorMsg">
							  <span class="validate" id="companynameError">Please Enter Company Name </span>
							  </div>
							</div>
							 <div class="form-group col-sm-6">
							  <label for="name">Company Pan No  </label>
							  <input type="text" id="companypan" name="companypan" class="form-control" >
					   <div class="errorMsg">
							  <span class="validate" id="companypanError">Invalid Pan Number  </span>
							  </div>
							</div>
							</div>
						</div> 
<hr>					
<div class="portlet">

<div class="portlet-header">

<h3>
 
Nominee Details
</h3>

</div> <!-- /.portlet-header -->

<div class="portlet-content">

<div class="row">

<!-- <div class="form-group col-sm-6"> -->

<div class="form-group col-sm-6">
<label for="text-input">First Name</label>
<input type="text" id="spouse_firstname" name="spouse_firstname" class="form-control">
<div class="errorMsg">
<span class="validate" id="spouse_firstnameError">Please Enter First Name </span>
</div>
</div>
<div class="form-group col-sm-6">
<label for="text-input">Last Name </label>
<input type="text" id="spouse_lastname" name="spouse_lastname" class="form-control">
<div class="errorMsg">
<span class="validate" id="spouse_lastnameError">Please Enter Last Name </span>
</div>
</div>
<div class="form-group col-sm-6">
<label for="text-input">Relationship</label>
<input type="text" id="spouse_middlename" name="spouse_middlename" class="form-control">
<div class="errorMsg">
<span class="validate" id="spouse_middlenameError">Please Enter Middle Name </span>
</div>
</div>
<div class="form-group col-sm-6">
<label for="text-input">PAN Card NO</label>
<input type="text" id="spouse_pancard" name="spouse_pancard" class="form-control">
<div class="errorMsg">
<span class="validate" id="spouse_pancardError">Please Enter Pan Number </span>
</div>
</div>
<div class="form-group col-sm-6">
<label for="text-input">Mobile No </label>
<input type="text" id="spouse_mobile" name="spouse_mobile" class="form-control">
<div class="errorMsg">
<span class="validate" id="spouse_mobileError">Please Enter Mobile Number </span>
</div> 
</div>

<div class="right">
<div class="right_form1">
<div class="formLabelDiv">
<label class="formlabel">Aadhar No.</label>
</div>
<div class="formInput">
<input type="text" class="textbox"  name="spouse_aadhar_no" id="spouse_aadhar_no">
</div>

</div>
</div>



<!--  </div>  /.col -->


</div> <!-- /.col -->

<!-- /.col -->

</div> <!-- /.row -->

<!-- /.row -->


</div> <!-- /.portlet-content -->

<hr>
<div class="portlet" >

<div class="portlet-header">

<h3>
 
Address Details 
</h3>

</div> <!-- /.portlet-header -->

<div class="portlet-content">

<div class="row">

<!--  <div class="col-sm-6">-->

<div class="form-group col-sm-6">
<label for="text-input">Address 1 <span class="error">*</span></label>
<input type="text" id="addressone" name="addressone" class="form-control">
<div class="errorMsg">
<span class="validate" id="addressoneError">Please Enter Address Details </span>
</div>
</div>

<div class="form-group col-sm-6">
<label for="text-input">Address 2 <span class="error">*</span></label>
<input type="text" id="addresstwo" name="addresstwo" class="form-control">
<div class="errorMsg">
<span class="validate" id="addresstwoError">Please Enter Address Details </span>
</div>
</div>

<div class="form-group col-sm-6">
<label for="text-input">Address 3</label>
<input type="text" id="addressthree" name="addressthree" class="form-control">
</div>

<div class="form-group col-sm-6">
<label for="name">Country <span class="error">*</span></label>
<select name="country" id="country" class="form-control" onchange="getcountry()">
<option value="">Please Select Country</option>

<?php foreach($ctry as $Con) { 

?>
	<option value="<?php echo $Con['CNTRY_ID']; ?>"> <?php echo $Con['CNTRY_NME']; ?></option>
<?php } ?>
</select>
<div class="errorMsg">
<span class="validate" id="countryError">Please Select your country </span>
</div>
</div>

<div class="form-group col-sm-6">
<label for="name">State <span class="error">*</span> </label>
<select name="state" id="state" class="form-control"  onchange="getstate()" data-required="true">
<option value="">Please Select State</option>
</select>
<div class="errorMsg">
<span class="validate" id="stateError">Please select your State</span>
</div>
</div>
<div class="form-group col-sm-6">
<label for="name">City <span class="error">*</span></label>
<select name="city" id="city" class="form-control" >
<option value="">Please Select City</option>
</select>
<div class="errorMsg">
<span class="validate" id="cityError">Please select your City </span>
</div>
</div>
<div class="form-group col-sm-6">
<label for="text-input">Postal Code <span class="error">*</span></label>
<input type="text" id="pinCode" name="pinCode" class="form-control">
<div class="errorMsg">
<span class="validate" id="pinCodeError">Please enter Postal Code </span>
</div>
</div>
<div class="form-group col-sm-6">
<label for="text-input">Email Id <span class="error"></span></label>
<input type="text" id="email" name="email" class="form-control">
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

<hr>
<div class="portlet">

<div class="portlet-header">

<h3>
 
Bank Details 
</h3>

</div> <!-- /.portlet-header -->

<div class="portlet-content">

<div class="row">

<!-- <div class="col-sm-6"> -->

<div class="form-group col-sm-6">
<label for="text-input">Account Name</label>
<input type="text" id="accountHolderName" name="accountHolderName" class="form-control">
<div class="errorMsg">
<span class="validate" id="accountHolderNameError">Please enter Account Name </span>
</div> 
</div>
<div class="form-group col-sm-6">
<label for="text-input">Account Number</label>
<input type="text" id="accountno" name="accountno" class="form-control">
<div class="errorMsg">
<span class="validate" id="accountnoError">Please enter Account Number </span>
</div> 
</div>
<div class="form-group col-sm-6">
<label for="text-input">Bank Name </label>
<input type="text" id="bankName" name="bankName" class="form-control">
<div class="errorMsg">
<span class="validate" id="bankNameError">Please enter Bank Name </span>
</div>  
</div>
<div class="form-group col-sm-6">
<label for="text-input">IFSC Code</label>
<input type="text" id="IFSCNo" name="IFSCNo" class="form-control">
<div class="errorMsg">
<span class="validate" id="IFSCNoError">Please enter Bank IFS code </span>
</div>
</div>
<div class="form-group col-sm-6">
<label for="name"> Account Type </label>
<input  type="radio" name="AcType" value="saving"  />
<label>SAVINGS </label>
<input  type="radio" name="AcType" value="current" />
<label>CURRENT</label>
<div class="errorMsg">
<span class="validate" id="AcTypeError">Please Select Account Type </span>
</div>     
</div>
<div class="form-group col-sm-6">
<label for="text-input">Branch Name </label>
<input type="text" id="BranchName" name="BranchName" class="form-control">
<div class="errorMsg">
<span class="validate" id="BranchNameError">Please Enter Your Branch Name </span>
</div>
</div>
<div class="form-group col-sm-6">
<label for="text-input">Branch Address</label>
<input type="text" id="BranchAddress" name="BranchAddress" class="form-control" data-required="true">
</div>





<!-- </div> <!-- /.col -->



<!-- /.col -->

</div> <!-- /.row -->

<!-- /.row -->


</div> <!-- /.portlet-content -->

</div>
<hr>
<div class="portlet">

<div class="portlet-header">

<h3>
 
Attachments
</h3>

</div> <!-- /.portlet-header -->

<div class="portlet-content">

<div class="form-group col-sm-6">
<label class="formlabel">PAN CARD</label>
<input type="file" name="pan_card" class="textbox" size="40" accept=".pdf" >
<div class="errorMsg">

</div> 
</div>



<div class="form-group col-sm-6">
<label class="formlabel">AADHAR</label>
<input type="file" class="textbox" name="aadhar_xerox" size="40" accept=".pdf" >
<div class="errorMsg">

</div> 
</div>
 
<div class="form-group col-sm-6">
<label class="formlabel">PASSBOOK</label>
<input type="file"  class="textbox" name="passbook_xerox" size="40" accept=".pdf" >
<div class="errorMsg">

</div> 
</div>



<div class="form-group col-sm-6">
<label class="formlabel">PHOTO</label>
<input type="file" class="textbox" name="user_photo" size="40"  accept=".pdf" >
<div class="errorMsg">

</div> 
</div>

<div class="form-group col-sm-6">
<input required type="checkbox" name="agree" value="1">
<label class="formlabel">I have read and agree to the <a target="_blank" href="<?php echo base_url(); ?>/resources/images/terms_conditions_enrollment.pdf" class="agree"><b>Terms &amp; Conditions</b></a></label>


<button type="submit" class="btn btn-primary" name="newOfficer" id="newOfficer">Submit</button>
</div>

</div> <!-- /.portlet-content -->

</div>
			
                 
                </div>
                <!-- /.card-body -->
				<!--
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>-->
              </form>
            </div>
            <!-- /.card -->
 

          </div>
          <!--/.col (left) -->
          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
  
<style>
.error
{
  color:#F00;
}
</style>
 
<script language="javascript" type="text/javascript">
$(document).ready(function()
{ 
  
  
  $(".form-group input[name='enrollementtype']").click(function(){
                          
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
  
  

  $('.validate').css("display","none");
  
  $('#newOfficer').click(function()
  { 
      var keepCheck;
    
    var firstname = $("#firstname").val();
var lastname = $("#lastname").val();
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
    var pinCode = $("#pinCode").val();
    var email = $("#email").val();

  var accountHolderName = $("#accountHolderName").val();
    var accountno = $("#accountno").val();
    var bankName = $("#bankName").val();
    var IFSCNo = $("#IFSCNo").val();

    var Sponsor = $("#Sponsor").val();
    var placement = $("#placement").val();

   
if(Sponsor == "" )
    {
      $('#Sponsor').css("border","1px solid #FF0000");
      $('.validate').css("display","none");
      $('#SponsorError').css("display","block");
      $('#Sponsor').value="";
      $('#Sponsor').focus();
      return false;
        }
    else
    {
      $('#Sponsor').css("border","1px solid #d2d2d2");
      $('.validate').css("display","none");
    }

    if(firstname == "" || !isNaN(firstname))
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
    
   if(lastname == "" || !isNaN(lastname))
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
        
       
      }
      else
      {
        $('#enrollementtype').css("border","1px solid #d2d2d2");
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
    
  
    
    if(country == "" )
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



<script>

function ajax_sponsorid()
 {
	$('#enroll_mobile').val('')
	$('#enroll_name').val('')
    var Sponsorid = $('#Sponsor').val();
    //alert(Sponsorid);
    $.ajax({
    type: 'POST',
    url: '<?php echo site_url('genelogy/getEnrollmentDetails'); ?>',
    data: {Sponsorid: Sponsorid},
    success: function(resp) {
		//alert(resp);
		//var result=$(resp).split('|');
		var res = resp.split("$/#");
		//alert(res[1]);
	 $('#enroll_name').val(res[0]);
    $('#enroll_mobile').val(res[1]);
    }
    });
 }
 
 function ajax_mobile()
 {
	//alert('df');
	$('#Sponsor').val('')
	$('#enroll_name').val('')
    var enroll_mobile = $('#enroll_mobile').val();
    //alert(enroll_mobile);
    $.ajax({
    type: 'POST',
    url: '<?php echo site_url('genelogy/getEnrollmobileDetails'); ?>',
    data: {enroll_mobile: enroll_mobile},
    success: function(resp) {
		//alert(resp);
		//var result=$(resp).split('|');
		var res = resp.split("$/#");
		//alert(res[1]);
	 $('#Sponsor').val(res[1]);
    $('#enroll_name').val(res[0]);
    }
    });
 }
 
function getcountry()
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
 function getstate()
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

 


</script>
