<script type="text/javascript">
$(document).ready(function()
{	
	
	var cont_id = $('#country').val();
    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('vendor/get_state'); ?>',
      data: 'country='+cont_id,
      success: function(resp) {
          $('select#state').html(resp);
        var st = $('select#state').val();
        $.ajax({
        type: 'POST',
        url: '<?php echo site_url('vendor/get_city'); ?>',
        data: {country: cont_id, state: st},
        success: function(resp) { 
          $('select#city').html(resp);
        }
      });
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
   
   

   $("#vendor_vat").keypress(function (e)
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
 $("#vendor_tin").keypress(function (e)
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

  /* $("#vendor_cst").keypress(function (e)
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
    });*/

   $("#vendor_zipcode").keypress(function (e)
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
	$("#vendor_mobile").keypress(function (e)
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

    $('.vendor_add_details').click(function()
     {
       $(".formError").css("display", "none");
	   
        var vendor_name = $("#vendor_name").val();
        var vendor_email = $("#vendor_email").val();
		
        var vendor_mobile = $("#vendor_mobile").val();
        var txt = $("#vendor_website").val();
        var vendor_code = $("#vendor_code").val();
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

 
  
	  if(vendor_code == "")
    {
      $('#vendor_code').css("border","1px solid #FF0000");
      $('.error').html("");
     // document.getElementById("vendor_codeError").innerHTML="* This field is required";
      document.getElementById('vendor_codeError').style.display = 'block';
      $('#vendor_code').value="";
      $('#vendor_code').focus();
      return false;
    }
      else
    {
      document.getElementById('vendor_codeError').style.display = 'none';
      $('#vendor_code').css("border","1px solid #82B04F");
      document.getElementById("vendor_codeError").innerHTML="";
    } 

	
	if(vendor_address == "")
    {
      $('#vendor_address').css("border","1px solid #FF0000");
      $('.error').html("");
      //document.getElementById("vendor_address_error").innerHTML="* This field is required";
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
      document.getElementById("vendor_address_error").innerHTML="* This field is required";
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
    if (vendor_name.match(/^[a-zA-Z ]*$/)) {
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

function codevalidation()
{
	var code = $("#vendor_code").val();
	var prefix = $("#vendor_prefix").val();
	var codelength = code.length;
	var prefixlength = prefix.length;
	var res = code.substr(0,prefixlength); 
	if(codelength >= prefixlength)
	{
		if(res != prefix)
		{
			alert('Supplier Code Should be Prefix With '+prefix);
		}
	}
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

<?php echo $this->load->view('pages/master_left_side'); ?>

<section>
	<div class="rightPanel" style="padding: 14px 20px; width:96%;">
		
		<div class='container-fluid editViewContainer'>
			<form class="form-horizontal recordEditView" id="EditView" name="EditView" method="post" action="<?php echo site_url('vendor/addvendor')?>" enctype="multipart/form-data">
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">Creating New Supplier</h3>
					<span class="pull-right">
						<button class="btn-success vendor_add_details" value="Save" type="submit" name="vendor_add_details" id="vendor_add_details"><strong>Save</strong></button> 
						<button class="btn-success add_reset" value="reset" type="reset" name="add_reset" id="cus_add_reset"><strong>Reset</strong></button>
						 <a class="cancelLink btn-success " type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </span>
					<span class="nums_error" id="add_itemError" >
                 Please Enter Number Only
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
                                            <div class="formErrorContent">Please Enter Supplier name</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="vendor_name" name="vendor_name" type="text" class="input-large nameField" />
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
                                        <input id="vendor_code" readonly="readonly" type="text" class="input-large uppercase" onkeyup="return codevalidation()" name="vendor_code" value="<?php if(isset($vendorCode)) { echo $vendorCode; } ?>"/>
                                        <input id="vendor_prefix" type="hidden" name="vendor_prefix" value="<?php if(isset($vendorPrefix)) { echo $vendorPrefix; } ?>"/>
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
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError"  style="margin-top: -30px;">
                                            <div class="formErrorContent">Please Enter Valid Mobile no.</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="vendor_mobile" name="vendor_mobile" type="text" class="input-large" />
                                    </span>
                                 </div>
                             </td>
							 
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor"></span>Email</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="vendor_emailError" style="margin-top: -30px;">
                                            <div class="formErrorContent">Please Enter Valid Email</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="vendor_email" name="vendor_email" type="text"  class="input-large nameField" />
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
                                            <!--<option value="">Select an Option</option>-->
                                            <option value="Direct">Direct</option>
                                            <option value="Company">Company</option>
                                           
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
									<input id="vendor_pan" type="text" class="input-large " name="vendor_pan" value=""/>
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
                                        <input id="vendor_gst" type="text" class="input-large" name="vendor_gst" value=""/>
                                    </span>
                                </div>
                            </td> 
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Contact Person</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <input id="vendor_con_person" type="text" class="input-large" name="vendor_con_person" value=""/>
                                    </span>
                                </div>
                            </td>
                        </tr>
							
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
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
									<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="vendor_categoryError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                     </div>
                                     <select name="vendor_status" class="chzn-select" id="vendor_status">
                                            <option value="active">Active</option>
                                     </select>
                                    </span>
                                </div>
                            </td>
						
                          <td class="fieldLabel medium"> <label class="muted pull-right marginRight10px">Remarks</label></td>
                          <td class="fieldValue medium" ><span class="span10">
                            <input id="vendor_remarks" type="text" class="input-large " name="vendor_remarks" value=""/>
                          </span></td>
                          <td class="fieldLabel medium">&nbsp;</td>
                          <td class="fieldValue medium">&nbsp;</td>
                        </tr>

                    </tbody>
                    
                </table>
                 <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">Address Details</th>
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
                                        <textarea class="row-fluid" id="vendor_address" name="vendor_address" ></textarea>
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
										 <!--<option value="">Select an Option</option>-->
                                          <?php foreach($ctry as $CON) { 
                                ?>
                                    <option value="<?php echo $CON['country_id']; ?>"  ><?php echo $CON['country_name']; ?></option>
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
                                    <span class="redColor">*</span>Billing State
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
										                     <!-- <option value="">Select an Option</option>-->
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
                                    <span class="redColor">*</span>Billing Line
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
										 <!--<option value="">Select an Option</option>-->
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
                                    Billing Pin Code
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <input type="text" class="input-large" name="vendor_zipcode" id="vendor_zipcode" value="" />
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
                        
                <br />
                        
               
						
                <br>
                
                <div class="row-fluid">
                    <div class="pull-right">
                        <button class="btn-success vendor_add_details" value="save" type="submit" name="vendor_add_details" id="vendor_add_details"><strong>Save</strong></button>
                        <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <br>
            
            </form>
				
          </div>

      </div>

</section>
