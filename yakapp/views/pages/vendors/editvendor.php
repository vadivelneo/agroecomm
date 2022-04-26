<?php //echo"<pre>"; print_r($editvendor_addr);exit;?>
<script type="text/javascript">
$(document).ready(function()
{

   $("#vendor_vat").keypress(function (e)
  {
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
     {  
      alert("Numbers Only ")
       return false;
     }
    });
	$("#vendor_tin").keypress(function (e)
  {
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
     {  
      alert("Numbers Only ")
       return false;
     }
    });

   /*$("#vendor_cst").keypress(function (e)
  {
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
     {  
      alert("Numbers Only ")
       return false;
     }
    });*/

   $("#vendor_zipcode").keypress(function (e)
  {
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
     {  
      alert("Numbers Only ")
       return false;
     }
    });

   var cont_id = $('#cont_id').val();
   var st_id = $('#st_id').val();
   var cty_id = $('#cty_id').val();
   
   $.ajax({
    type: 'POST',
    url: '<?php echo site_url('vendor/get_state'); ?>',
    data: {country:cont_id, state:st_id},
    success: function(resp) {
      $('select#state').html(resp);
    }
   });
   $.ajax({
    type: 'POST',
    url: '<?php echo site_url('vendor/get_city'); ?>',
    data: {country:cont_id, state:st_id, city:cty_id},
    success: function(resp) {
      $('select#city').html(resp);
    }
   });
   
     var cont_ship_id = $('#shipping_country').val();
  $.ajax({
    type: 'POST',
    url: '<?php echo site_url('vendor/get_state'); ?>',
    data: 'country='+cont_ship_id,
    success: function(resp) {
      $('select#shipping_state').html(resp);
      var st_ship_id = $('select#shipping_state').val();
      $.ajax({
        type: 'POST',
        url: '<?php echo site_url('vendor/get_city'); ?>',
        data: {country: cont_ship_id, state: st_ship_id},
        success: function(resp) {
          $('select#shipping_city').html(resp);
        }
      });
    }
  });
   


    $('.vendor_edit_details').click(function()
     {
        
        var vendor_name = $("#vendor_name").val();
        var vendor_email = $("#vendor_email").val();
        var vendor_mobile = $("#vendor_mobile").val();
        var txt = $("#vendor_website").val();
        var vendor_address = $("#vendor_address").val();
        var vendor_contact_person = $("#vendor_contact_person").val();
        var vendor_designation = $("#vendor_designation").val();
        var vendor_department = $("#vendor_department").val();
	    var vendor_pan = $("#vendor_pan").val();
        var country = $("#country").val();
        var state = $("#state").val();
        var city = $("#city").val();
		
		var vendor_shipping_address = $("#vendor_shipping_address").val();
		var shipping_country = $("#shipping_country").val();
		var shipping_state = $("#shipping_state").val();
		var shipping_city = $("#shipping_city").val();

      if(vendor_name == "")
    {
      $('#vendor_name').css("border","1px solid #FF0000");
      $('.error').html("");
      //document.getElementById("vendor_nameError").innerHTML="* This field is required";
      document.getElementById('vendor_nameError').style.display = 'block';
      $('#vendor_name').value="";
      $('#vendor_name').focus();
      return false;
    }
   
      else
    {
      document.getElementById('vendor_nameError').style.display = 'none';
      $('#vendor_name').css("border","1px solid #82B04F");
      document.getElementById("vendor_nameError").innerHTML="";
    }

    
    if(vendor_mobile == "")
    {
      $('#vendor_mobile').css("border","1px solid #FF0000");
      $('.error').html("");
     // document.getElementById("vendor_mobileError").innerHTML="* This field is required";
      document.getElementById('vendor_mobileError').style.display = 'block';
      $('#vendor_mobile').value="";
      $('#vendor_mobile').focus();
      return false;
    }
	else if(Ismobile(vendor_mobile)==false)
		{	
			$('#vendor_mobile').css("border","1px solid #FF0000");
			$('.validate').css("display","none");
			document.getElementById('vendor_mobileError').style.display = 'block';
			$('#vendor_mobile').value="";
			$('#vendor_mobile').focus();
			return false;
		}
      else
    {
      document.getElementById('vendor_mobileError').style.display = 'none';
      $('#vendor_mobile').css("border","1px solid #82B04F");
      document.getElementById("vendor_mobileError").innerHTML="";
    }


    if(txt != "" )
    {
      var re = /(http(s)?:\\)?([\w-]+\.)+[\w-]+[.com|.in|.org]+(\[\?%&=]*)?/
      if (re.test(txt))
      {
      }
      else {
      $('#vendor_website').css("border","1px solid #FF0000");
      $('.error').html("");
     // document.getElementById("vendor_codeError").innerHTML="* This field is required";
      document.getElementById('vendor_websiteError').style.display = 'block';
      $('#vendor_website').value="";
      $('#vendor_website').focus();
      return false;
      }
    }
    else
    {
       document.getElementById('vendor_websiteError').style.display = 'none';
      $('#vendor_website').css("border","1px solid #82B04F");
      document.getElementById("vendor_websiteError").innerHTML="";
    }


if(vendor_contact_person != "")
    {
    if(Contact_person(vendor_contact_person)==false)
    {
      $('#vendor_contact_person').css("border","1px solid #FF0000");
      $('.error').html("");
     // document.getElementById("vendor_codeError").innerHTML="* This field is required";
      document.getElementById('vendor_contact_personError').style.display = 'block';
      $('#vendor_contact_person').value="";
      $('#vendor_contact_person').focus();
      return false;
    }
  }
      else
    {
      
    }


    if(vendor_designation != "")
    {
    if(Designation(vendor_designation)==false)
    {
      $('#vendor_designation').css("border","1px solid #FF0000");
      $('.error').html("");
     // document.getElementById("vendor_codeError").innerHTML="* This field is required";
      document.getElementById('vendor_designationError').style.display = 'block';
      $('#vendor_designation').value="";
      $('#vendor_designation').focus();
      return false;
    }
  }
      else
    {
      
    }



    if(vendor_department != "")
    {
    if(Department(vendor_department)==false)
    {
      $('#vendor_department').css("border","1px solid #FF0000");
      $('.error').html("");
     // document.getElementById("vendor_codeError").innerHTML="* This field is required";
      document.getElementById('vendor_departmentError').style.display = 'block';
      $('#vendor_department').value="";
      $('#vendor_department').focus();
      return false;
    }
  }
      else
    {
      
    }




	if(vendor_pan != "")
    {
		if(Ispan(vendor_pan)==false)
		{
			$('#vendor_pan').css("border","1px solid #FF0000");
			$('.error').html("");
		 // document.getElementById("vendor_codeError").innerHTML="* This field is required";
			document.getElementById('vendor_panError').style.display = 'block';
			$('#vendor_pan').value="";
			$('#vendor_pan').focus();
			return false;
		}
	}
      else
    {
      /* document.getElementById('vendor_panError').style.display = 'none';
      $('#vendor_pan').css("border","1px solid #82B04F");
      document.getElementById("vendor_panError").innerHTML=""; */
    }
	
	if(vendor_address == "")
    {
		alert(vendor_address)
      $('#vendor_address').css("border","1px solid #FF0000");
      $('.error').html("");
    //  document.getElementById("vendor_address_error").innerHTML="* This field is required";
      document.getElementById('vendor_address_error').style.display = 'block';
      $('#vendor_address').value="";
      $('#vendor_address').focus();
      return false;
    }
      else
    {
      document.getElementById('vendor_address_error').style.display = 'none';
      $('#vendor_address').css("border","1px solid #82B04F");
      document.getElementById("vendor_address_error").innerHTML="";
    }
	if(country == "")
    {
      $('#country').css("border","1px solid #FF0000");
      $('.error').html("");
     // document.getElementById("country_error").innerHTML="* This field is required";
      document.getElementById('country_error').style.display = 'block';
      $('#country').value="";
      $('#country').focus();
      return false;
    }
      else
    {
      document.getElementById('country_error').style.display = 'none';
      $('#country').css("border","1px solid #82B04F");
      document.getElementById("country_error").innerHTML="";
    }
	
	if(state == "0")
    {
      $('#state').css("border","1px solid #FF0000");
      $('.error').html("");
     // document.getElementById("state_error").innerHTML="* This field is required";
      document.getElementById('state_error').style.display = 'block';
      $('#state').value="";
      $('#state').focus();
      return false;
    }
      else
    {
      document.getElementById('state_error').style.display = 'none';
      $('#state').css("border","1px solid #82B04F");
      document.getElementById("state_error").innerHTML="";
    }
	
	if(city == "0")
    {
      $('#city').css("border","1px solid #FF0000");
      $('.error').html("");
     // document.getElementById("city_error").innerHTML="* This field is required";
      document.getElementById('city_error').style.display = 'block';
      $('#city').value="";
      $('#city').focus();
      return false;
    }
      else
    {
      document.getElementById('city_error').style.display = 'none';
      $('#city').css("border","1px solid #82B04F");
      document.getElementById("city_error").innerHTML="";
    }

    if(vendor_shipping_address == "")
    {
      $('#vendor_shipping_address').css("border","1px solid #FF0000");
      $('.error').html("");
    //  document.getElementById("vendor_address_error").innerHTML="* This field is required";
      document.getElementById('vendor_shipping_address_error').style.display = 'block';
      $('#vendor_shipping_address').value="";
      $('#vendor_shipping_address').focus();
      return false;
    }
      else
    {
      document.getElementById('vendor_shipping_address_error').style.display = 'none';
      $('#vendor_shipping_address').css("border","1px solid #82B04F");
      document.getElementById("vendor_shipping_address_error").innerHTML="";
    }
	if(shipping_country == "")
    {
      $('#shipping_country').css("border","1px solid #FF0000");
      $('.error').html("");
     // document.getElementById("country_error").innerHTML="* This field is required";
      document.getElementById('shipping_country_error').style.display = 'block';
      $('#shipping_country').value="";
      $('#shipping_country').focus();
      return false;
    }
      else
    {
      document.getElementById('shipping_country_error').style.display = 'none';
      $('#shipping_country').css("border","1px solid #82B04F");
      document.getElementById("shipping_country_error").innerHTML="";
    }
	
	if(shipping_state == "0")
    {
      $('#shipping_state').css("border","1px solid #FF0000");
      $('.error').html("");
     // document.getElementById("state_error").innerHTML="* This field is required";
      document.getElementById('shipping_state_error').style.display = 'block';
      $('#shipping_state').value="";
      $('#shipping_state').focus();
      return false;
    }
      else
    {
      document.getElementById('shipping_state_error').style.display = 'none';
      $('#shipping_state').css("border","1px solid #82B04F");
      document.getElementById("shipping_state_error").innerHTML="";
    }
	
	if(shipping_city == "0")
    {
      $('#shipping_city').css("border","1px solid #FF0000");
      $('.error').html("");
     // document.getElementById("city_error").innerHTML="* This field is required";
      document.getElementById('shipping_city_error').style.display = 'block';
      $('#shipping_city').value="";
      $('#shipping_city').focus();
      return false;
    }
      else
    {
      document.getElementById('shipping_city_error').style.display = 'none';
      $('#shipping_city').css("border","1px solid #82B04F");
      document.getElementById("shipping_city_error").innerHTML="";
    }


      });
  });
  
function IsEmail(vendor_email)
{
		var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(!regex.test(vendor_email)) 
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

function Ismobile(vendor_mobile)
{
		if (vendor_mobile.match(/^\d{10}$/)) {
		return true;
		} 
		else 
		{
		return false;
		}
		}

    function Validtext(vendor_name)
{
    if (vendor_name.match(/^[a-zA-Z ]+$/)) {
    return true;
    } 
    else 
    {
    return false;
    }
}
function Contact_person(vendor_contact_person)
{
    if (vendor_contact_person.match(/^[a-zA-Z ]+$/)) {
    return true;
    } 
    else 
    {
    return false;
    }
}
function Designation(vendor_designation)
{
    if (vendor_designation.match(/^[a-zA-Z ]+$/)) {
    return true;
    } 
    else 
    {
    return false;
    }
}
function Department(designation)
{
    if (designation.match(/^[a-zA-Z ]+$/)) {
    return true;
    } 
    else 
    {
    return false;
    }
}

</script>

<script type="text/javascript">
  
  function getcountry()
 {
  var cout = $('select#country').val();
  
  $.ajax({
    type: 'POST',
    url: '<?php echo site_url('vendor/get_state'); ?>',
    data: 'country='+cout,
    success: function(resp) {
      $('select#state').html(resp);
      var st = $('select#state').val();
        $.ajax({
        type: 'POST',
        url: '<?php echo site_url('vendor/get_city'); ?>',
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
    url: '<?php echo site_url('vendor/get_city'); ?>',
    data: {country: cout, state: state},
    success: function(resp) {
      $('select#city').html(resp);
    }
   });
}


function getship_country()
 {
 	var cout = $('select#shipping_country').val();
	
 	$.ajax({
 		type: 'POST',
 		url: '<?php echo site_url('vendor/get_state'); ?>',
 		data: 'country='+cout,
 		success: function(resp) {
 			$('select#shipping_state').html(resp);
 			var st_ship_id = $('select#shipping_state').val();
      $.ajax({
        type: 'POST',
        url: '<?php echo site_url('vendor/get_city'); ?>',
        data: {country: cout, state: st_ship_id},
        success: function(resp) {
          $('select#shipping_city').html(resp);
        }
      });
 		}
	 });
 }
 function getship_state()
{
	var cout = $('select#shipping_country').val();
	 
 	var state = $('select#shipping_state').val();
 	$.ajax({
 		type: 'POST',
 		url: '<?php echo site_url('organizations/get_city'); ?>',
 		data: {country: cout, state: state},
 		success: function(resp) { 
			$('select#shipping_city').html(resp);
 		}
	 });
}

 
</script>


<script>
function copy_address()
{
 
  var tb1 = document.getElementById("vendor_address");
  var tb2 = document.getElementById("vendor_shipping_address");
  var tb3 = document.getElementById("vendor_zipcode");
  var tb4 = document.getElementById("vendor_shipping_zipcode");
    
    
    if (tb1.value != "") {
        tb2.value = tb1.value;
		  tb4.value = tb3.value;
		  
	var $options = $("#country > option").clone();
    $('#shipping_country').empty();
    $('#shipping_country').append($options);
    $('#shipping_country').val($('#country').val());
	
	var $options1 = $("#state > option").clone();
    $('#shipping_state').empty();
    $('#shipping_state').append($options1);
    $('#shipping_state').val($('#state').val());
	
	var $options2 = $("#city > option").clone();
    $('#shipping_city').empty();
    $('#shipping_city').append($options2);
    $('#shipping_city').val($('#city').val());
	
		  
			return false;
    }  
    
	 
	return false;
}

</script>


<?php echo $this->load->view('pages/master_left_side'); ?>

<section>
	<div class="rightPanel" style="padding: 14px 20px; width:96%;">
		
		<div class='container-fluid editViewContainer'>
			<form class="form-horizontal recordEditView" id="EditView" name="EditView" method="post" action="<?php echo site_url();?>/vendor/editvendor/<?php echo $editvendor->vendor_id; ?>" enctype="multipart/form-data">
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">Edit Supplier</h3>
					<span class="pull-right">
						 <button class="btn-success vendor_edit_details" type="submit" name="vendor_edit_details" id="vendor_edit_details"><strong>Update</strong></button>
						 <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </span>
                </div>
                
                <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">Supplier Details</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Supplier Name
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="vendor_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="vendor_name" name="vendor_name" type="text" class="input-large nameField" value="<?php if(isset($editvendor->vendor_name)){ echo $editvendor->vendor_name;}?>" />
                                    </span>
                                 </div>
                             </td>
							 <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    Supplier Code
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
										<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id= "vendor_codeError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="vendor_code" type="text" class="input-large " name="vendor_code" readonly value="<?php if(isset($editvendor->vendor_code)){ echo $editvendor->vendor_code;}?>"/>
                                    </span>
                                 </div>
                             </td>
                        </tr>
                        
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor"></span>Mobile
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id= "" style="margin-top: -30px;">
                                            <div class="formErrorContent">Please Enter Valid Mobile No.</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="vendor_mobile" name="vendor_mobile" type="text" class="input-large" value="<?php if(isset($editvendor->vendor_mobile)){ echo $editvendor->vendor_mobile;}?>" />
                                    </span>
                                 </div>
                             </td>
							 
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Email</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="vendor_emailError" style="margin-top: -30px;">
                                            <div class="formErrorContent">Please Enter Valid Email</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="vendor_email" name="vendor_email" type="text" class="input-large nameField"  value="<?php if(isset($editvendor->vendor_email)){ echo $editvendor->vendor_email;}?>" />
                                    </span>
                                </div>
                            </td>
                        </tr>
                 <tr>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Category</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
									<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="vendor_categoryError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                     </div>
                                     <select name="vendor_category" class="chzn-select" id="vendor_category">
                                            <option value="">Select an Option</option>
                                            <option value="Direct" <?php if(isset($editvendor->vendor_category)){if($editvendor->vendor_category == 'Direct') { ?>selected="selected" <?php } } ?>>Direct</option>
                                            <option value="Company" <?php if(isset($editvendor->vendor_category)){if($editvendor->vendor_category == 'Company') { ?>selected="selected" <?php } } ?>>Company</option>
                                           
                                        </select>
                                    </span>
                                </div>
                            </td>
                            
                        <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    PAN
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
									<input id="vendor_pan" type="text" class="input-large " name="vendor_pan" value="<?php if(isset($editvendor->vendor_pan)){ echo $editvendor->vendor_pan;}?>"/>
                                    </span>
                                 </div>
                             </td>
						<tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">GST Number</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <input id="vendor_gst" type="text" class="input-large" name="vendor_gst"value="<?php if(isset($editvendor->vendor_gst_no)){ echo $editvendor->vendor_gst_no;}?>"/>
                                    </span>
                                </div>
                            </td> 
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Contact Person</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                       <input id="vendor_con_person" type="text" class="input-large" name="vendor_con_person" value="<?php if(isset($editvendor->vendor_con_person)){ echo $editvendor->vendor_con_person;}?>"/>
                                    </span>
                                </div>
                            </td>
                        </tr>
                       
                    </tbody>
                </table>
						
                <br>
                    <table class="table table-bordered blockContainer showInlineTable equalSplit">
                  
                    
                    <tbody>
						
						 
						<tr>
                           
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Status</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
									<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="sales_manError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                     </div>
                                     <select name="vendor_status" class="chzn-select" id="vendor_status">
                                            <option value="active">Active</option>
											<option value="inactive">Inactive</option>
                                     </select>
                                    </span>
                                </div>
                            </td>
                            
                          <td class="fieldLabel medium"> <label class="muted pull-right marginRight10px">Remarks</label></td>
                          <td class="fieldValue medium" ><span class="span10">
                            <input id="vendor_remarks" type="text" class="input-large " name="vendor_remarks" value="<?php if(isset($editvendor->vendor_remarks)){ echo $editvendor->vendor_remarks;}?>"/>
                          </span></td>
                          <td class="fieldLabel medium">&nbsp;</td>
                          <td class="fieldValue medium">&nbsp;</td>
                        </tr>
                    </tbody>
                    
                </table>
<br />				
               <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">Address Details</th>
                            <input type="hidden" name="cont_id" id="cont_id" value="<?php echo $editvendor_addr->vendor_country ;?>" />
                            <input type="hidden" name="st_id" id="st_id" value="<?php echo $editvendor_addr->vendor_state ;?>" />
                            <input type="hidden" name="cty_id" id="cty_id" value="<?php echo $editvendor_addr->vendor_city ;?>" />
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Billing Address
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
									<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="vendor_address_error" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <textarea class="row-fluid" id="vendor_address" name="vendor_address" ><?php if(isset($editvendor_addr->vendor_address)){ echo $editvendor_addr->vendor_address;}?></textarea>
                                    </span>
                                 </div>
                             </td>
							 <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor"></span>
                                </label>
                            </td>
                            <td class="fieldValue medium">
                               
                     
                        </td>  
						</tr>	 
						<tr>	 
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Billing Country</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="country_error" style="margin-top: -30px;">
                                            <div class="formErrorContent">Select Country</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <select data-selected-value="" name="country" class="chzn-select chzn-done" id="country" onchange="getcountry()">
										 
                                            <?php foreach($ctry as $CON) { 
                                ?>
                                    <option value="<?php echo $CON['country_id']; ?>" <?php if($editvendor_addr->vendor_country == $CON['country_id']) { ?> selected="selected" <?php } ?>  ><?php echo $CON['country_name']; ?></option>
                                <?php } ?>
									</select>
                                    </span>
                                </div>
                            </td>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor"></span></label>
                            </td>
                            <td class="fieldValue medium" >
                                
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span> Billing State
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="state_error" style="margin-top: -30px;">
                                            <div class="formErrorContent">Select State</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <select data-selected-value="" name="state" class="chzn-select chzn-done" id="state" onchange="getstate()">
										<option value="">Select an Option</option>
										</select>
                                    </span>
                                 </div>
                             </td>
							 
							  <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor"></span>
                                </label>
                            </td>
                            <td class="fieldValue medium">
                               
                             </td>
							</tr>
							
							<tr>
							
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span> Billing Line
                                </label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                    	<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="city_error" style="margin-top: -30px;">
                                            <div class="formErrorContent">Select Line</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <select data-selected-value="" name="city" class="chzn-select chzn-done" id="city">
                                         <option value="">Select an Option</option>
                                        </select>
                                    </span>
                                </div>
                            </td>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor"></span>
                                </label>
                            </td>
                            <td class="fieldValue medium" >
                               
                            </td>
                        </tr>
                
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                  Billing  Pin Code
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <input type="text" class="input-large" name="vendor_zipcode" id="vendor_zipcode" value="<?php if(isset($editvendor_addr->venor_zipcode)){ echo $editvendor_addr->venor_zipcode;}?>"/>
                                    </span>
                                 </div>
                             </td>
							 <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                
                             </td>
                        </tr>

                    </tbody>
                    
                </table>
                        
               
						
                <br>
                
                <div class="row-fluid">
                    <div class="pull-right">
                        <button class="btn-success vendor_edit_details" type="submit" name="vendor_edit_details" id="vendor_edit_details"><strong>Update</strong></button>
                        <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <br>
            
            </form>
				
          </div>

      </div>

</section>
