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
<?php echo $this->load->view('pages/enrollement_left_side'); ?>
<div class="right_container" style="width: 75%;margin-left: 300px;margin-top: 50px;margin-bottom: 275px;">

  <div class="content" >

    <div class="content-container">

      

      <div class="content-header">
        <h2 class="content-header-title">New Enrollment</h2>
       <!-- <ol class="breadcrumb">
          <li><a href="<?php echo site_url(); ?>">Home</a></li>
          <li><a href="javascript:;">Enrollment</a></li>
          <li class="active">New Enrollment</li>
        </ol> -->
      </div> <!-- /.content-header -->

      

      <table class="table table-responsive table-hover" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_gvItems" style="border-collapse:collapse;">
		<tr>
			<th scope="col">ID</th><th scope="col">Select</th><th align="center" scope="col" style="width:200px;">Required Qty</th>
		</tr><tr>
			<td>1</td><td>
                        
                        <span id="ContentPlaceHolder1_gvItems_lblItemName_0"><B> நாட்டு சர்க்கரை   (Country Sugar)</B><BR><SMALL><SMALL> 1.000   Kg</span>
                        
                        / <span class="fa fa-rupee"></span>. <span id="ContentPlaceHolder1_gvItems_lblOfferRate_0" class="h4">80.00</span>

                    </td><td align="center">
                        <input name="ctl00$ContentPlaceHolder1$gvItems$ctl02$txtQty" type="number" id="ContentPlaceHolder1_gvItems_txtQty_0" style="width:50px;" />
                    </td>
		</tr><tr>
			<td>2</td><td>
                        
                        <span id="ContentPlaceHolder1_gvItems_lblItemName_1"><B> வெல்லம் (Jaggery)</B><BR><SMALL><SMALL> 0.500   kg</span>
                        
                        / <span class="fa fa-rupee"></span>. <span id="ContentPlaceHolder1_gvItems_lblOfferRate_1" class="h4">48.00</span>

                    </td><td align="center">
                        <input name="ctl00$ContentPlaceHolder1$gvItems$ctl03$txtQty" type="number" id="ContentPlaceHolder1_gvItems_txtQty_1" style="width:50px;" />
                    </td>
		</tr><tr>
			<td>3</td><td>
                        
                        <span id="ContentPlaceHolder1_gvItems_lblItemName_2"><B> கல் இந்துப்பு (Crystal Organic Rock Salt)</B><BR><SMALL><SMALL> 0.500   Kg</span>
                        
                        / <span class="fa fa-rupee"></span>. <span id="ContentPlaceHolder1_gvItems_lblOfferRate_2" class="h4">49.00</span>

                    </td><td align="center">
                        <input name="ctl00$ContentPlaceHolder1$gvItems$ctl04$txtQty" type="number" id="ContentPlaceHolder1_gvItems_txtQty_2" style="width:50px;" />
                    </td>
		</tr>
	</table>

           <!-- /.portlet -->


        </div>

      </div> <!-- /.row -->


    
    </div> <!-- /.content-container -->
      
  