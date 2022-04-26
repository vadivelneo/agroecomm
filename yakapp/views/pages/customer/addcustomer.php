<script type="text/javascript">
$(document).ready(function()
{
	$("#customer_mobile").keypress(function (e)
	{
		 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
		 {	
		  $('.grid_error').css("display","block");
            return false;
		 }
		 else
		 {
			  $('.grid_error').css("display","none");
             
		 }
    });
	
		$("#customer_credit_limit").keypress(function (e)
	{
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
		 {	
		  $('.grid_error').css("display","block");
            return false;
		 }
		 else
		 {
			  $('.grid_error').css("display","none");
             
		 }
    });
	
	$('.quantity').keyup(function(){
    var val = $(this).val();
    if(isNaN(val)){
         val = val.replace(/[^0-9\.]/g,'');
         if(val.split('.').length>2) 
             val =val.replace(/\.+$/,"");
    }
    $(this).val(val); 
	});
	
	/* $("#discount_percentage").keypress(function (e)
	{
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
		 {	
		  $('.grid_error').css("display","block");
            return false;
		 }
		 else
		 {
			  $('.grid_error').css("display","none");
             
		 }
    });
	
	$("#discount_amount").keypress(function (e)
	{
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
		 {	
		  $('.grid_error').css("display","block");
            return false;
		 }
		 else
		 {
			  $('.grid_error').css("display","none");
             
		 }
    }); */
	
	$("#bill_zip_code").keypress(function (e)
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
	
	$("#ship_zip_code").keypress(function (e)
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
	
	
  	var cont_id = $('#billing_country').val();
    $.ajax({
    	type: 'POST',
    	url: '<?php echo site_url('customer/get_state'); ?>',
    	data: 'country='+cont_id,
    	success: function(resp) {
      		$('select#billing_state').html(resp);
	  		var st = $('select#billing_state').val();
	  		$.ajax({
 				type: 'POST',
 				url: '<?php echo site_url('customer/get_city'); ?>',
 				data: {country: cont_id, state: st},
 				success: function(resp) { 
					$('select#billing_city').html(resp);
 				}
	 		});
    	}
   });

  	var cont_ship_id = $('#shipping_country').val();
	$.ajax({
		type: 'POST',
		url: '<?php echo site_url('customer/get_state'); ?>',
		data: 'country='+cont_ship_id,
		success: function(resp) {
			$('select#shipping_state').html(resp);
			var st_ship_id = $('select#shipping_state').val();
			$.ajax({
				type: 'POST',
				url: '<?php echo site_url('customer/get_city'); ?>',
				data: {country: cont_ship_id, state: st_ship_id},
				success: function(resp) {
					$('select#shipping_city').html(resp);
				}
			});
		}
	});

  
 
    $('.cus_add_details').click(function()
     {
        
        var customer_name = $("#customer_name").val();
        var customer_code = $("#customer_code").val();
        var customer_email = $("#customer_email").val();
        var customer_mobile = $("#customer_mobile").val();
       
		var customer_price_list = $("#customer_price_list").val();
		
        var customer_region = $("#customer_region").val();
        var customer_zone = $("#customer_zone").val();
        var customer_area = $("#customer_area").val();

        var cus_bill_address = $("#cus_bill_address").val();
		var billing_country = $("#billing_country").val();
		var billing_state = $("#billing_state").val();
		var billing_city = $("#billing_city").val();
        var bill_zip_code = $("#bill_zip_code").val();
		
		var cus_ship_address = $("#cus_ship_address").val();
		var shipping_country = $("#shipping_country").val();
		var shipping_state = $("#shipping_state").val();
		var shipping_city = $("#shipping_city").val();
		var ship_zip_code = $("#ship_zip_code").val();
      
       

     if(customer_name == "")
    {
      $('#customer_name').css("border","1px solid #FF0000");
      $('.error').html("");
      document.getElementById('customer_nameError').style.display = 'block';
      $('#customer_name').value="";
      $('#customer_name').focus();
      return false;
    }
        else
    {
      document.getElementById('customer_nameError').style.display = 'none';
      $('#customer_name').css("border","1px solid #82B04F");
      document.getElementById("customer_nameError").innerHTML="";
    }
	
	if(customer_code == "")
	{
	  $('#customer_code').css("border","1px solid #FF0000");
	  $('.error').html("");
	  document.getElementById('customer_codeError').style.display = 'block';
	  $('#customer_code').value="";
	  $('#customer_code').focus();
	  return false;
	}
		else
	{
	  document.getElementById('customer_codeError').style.display = 'none';
	  $('#customer_code').css("border","1px solid #82B04F");
	  document.getElementById("customer_codeError").innerHTML="";
	}
	/*if(customer_email == "")
	{
	  $('#customer_email').css("border","1px solid #FF0000");
	  $('.error').html("");
	  document.getElementById('customer_emailError').style.display = 'block';
	  $('#customer_email').value="";
	  $('#customer_email').focus();
	  return false;
	}
  else if(IsEmail(customer_email)==false)
    { 
      $('#customer_email').css("border","1px solid #FF0000");
      $('.validate').css("display","none");
      document.getElementById('customer_emailError').style.display = 'block';
      $('#customer_email').value="";
      $('#customer_email').focus();
      return false;
    } 
		else
	{
	  document.getElementById('customer_emailError').style.display = 'none';
	  $('#customer_email').css("border","1px solid #82B04F");
	  document.getElementById("customer_emailError").innerHTML="";
	}
	if(customer_mobile == "")
	{
	  $('#customer_mobile').css("border","1px solid #FF0000");
	  $('.error').html("");
	  document.getElementById('customer_mobileError').style.display = 'block';
	  $('#customer_mobile').value="";
	  $('#customer_mobile').focus();
	  return false;
	}
  	else if(Ismobile(customer_mobile)==false)
    { 
      $('#customer_mobile').css("border","1px solid #FF0000");
      $('.validate').css("display","none");
      document.getElementById('customer_mobileError').style.display = 'block';
      $('#customer_mobile').value="";
      $('#customer_mobile').focus();
      return false;
    } 
		else
	{
	  document.getElementById('customer_mobileError').style.display = 'none';
	  $('#customer_mobile').css("border","1px solid #82B04F");
	  document.getElementById("customer_mobileError").innerHTML="";
	}*/
	if(customer_price_list == "")
	{
		
	  $('#customer_price_list').css("border","1px solid #FF0000");
	  $('.error').html("");
	  document.getElementById('customer_price_listError').style.display = 'block';
	  $('#customer_price_list').value="";
	  $('#customer_price_list').focus();
	  return false;
	}
		else
	{
	  document.getElementById('customer_price_listError').style.display = 'none';
	  $('#customer_price_list').css("border","1px solid #82B04F");
	  document.getElementById("customer_price_listError").innerHTML="";
	}
	if(customer_region == "")
	{
	  $('#customer_region').css("border","1px solid #FF0000");
	  $('.error').html("");
	  document.getElementById('customer_regionError').style.display = 'block';
	  $('#customer_region').value="";
	  $('#customer_region').focus();
	  return false;
	}
		else
	{
	  document.getElementById('customer_regionError').style.display = 'none';
	  $('#customer_region').css("border","1px solid #82B04F");
	  document.getElementById("customer_regionError").innerHTML="";
	}
	if(customer_zone == "")
	{
	  $('#customer_zone').css("border","1px solid #FF0000");
	  $('.error').html("");
	  document.getElementById('customer_zoneError').style.display = 'block';
	  $('#customer_zone').value="";
	  $('#customer_zone').focus();
	  return false;
	}
		else
	{
	  document.getElementById('customer_zoneError').style.display = 'none';
	  $('#customer_zone').css("border","1px solid #82B04F");
	  document.getElementById("customer_zoneError").innerHTML="";
	}

  if(cus_bill_address == "")
    {
      $('#cus_bill_address').css("border","1px solid #FF0000");
      $('.error').html("");
      document.getElementById('cus_bill_addressError').style.display = 'block';
      $('#cus_bill_address').value="";
      $('#cus_bill_address').focus();
      return false;
    }
        else
    {
      document.getElementById('cus_bill_addressError').style.display = 'none';
      $('#cus_bill_address').css("border","1px solid #82B04F");
      document.getElementById("cus_bill_addressError").innerHTML="";
    }
	
	if(cus_ship_address == "")
    {
      $('#cus_ship_address').css("border","1px solid #FF0000");
      $('.error').html("");
      document.getElementById('cus_ship_addressError').style.display = 'block';
      $('#cus_ship_address').value="";
      $('#cus_ship_address').focus();
      return false;
    }
        else
    {
      document.getElementById('cus_ship_addressError').style.display = 'none';
      $('#cus_ship_address').css("border","1px solid #82B04F");
      document.getElementById("cus_ship_addressError").innerHTML="";
    }
	
	if(billing_country == "")
    {
      $('#billing_country').css("border","1px solid #FF0000");
      $('.error').html("");
      document.getElementById('billing_countryError').style.display = 'block';
      $('#billing_country').value="";
      $('#billing_country').focus();
      return false;
    }
        else
    {
      document.getElementById('billing_countryError').style.display = 'none';
      $('#billing_country').css("border","1px solid #82B04F");
      document.getElementById("billing_countryError").innerHTML="";
    }
	
	if(shipping_country == "")
    {
      $('#shipping_country').css("border","1px solid #FF0000");
      $('.error').html("");
      document.getElementById('shipping_countryError').style.display = 'block';
      $('#shipping_country').value="";
      $('#shipping_country').focus();
      return false;
    }
        else
    {
      document.getElementById('shipping_countryError').style.display = 'none';
      $('#shipping_country').css("border","1px solid #82B04F");
      document.getElementById("shipping_countryError").innerHTML="";
    }
	
	if(billing_state == "0")
    {
      $('#billing_state').css("border","1px solid #FF0000");
      $('.error').html("");
      document.getElementById('billing_stateError').style.display = 'block';
      $('#billing_state').value="";
      $('#billing_state').focus();
      return false;
    }
        else
    {
      document.getElementById('billing_stateError').style.display = 'none';
      $('#billing_state').css("border","1px solid #82B04F");
      document.getElementById("billing_stateError").innerHTML="";
    }
	
	if(shipping_state == "0")
    {
      $('#shipping_state').css("border","1px solid #FF0000");
      $('.error').html("");
      document.getElementById('shipping_stateError').style.display = 'block';
      $('#shipping_state').value="";
      $('#shipping_state').focus();
      return false;
    }
        else
    {
      document.getElementById('shipping_stateError').style.display = 'none';
      $('#shipping_state').css("border","1px solid #82B04F");
      document.getElementById("shipping_stateError").innerHTML="";
    }
	
	if(billing_city == "0")
    {
      $('#billing_city').css("border","1px solid #FF0000");
      $('.error').html("");
      document.getElementById('billing_cityError').style.display = 'block';
      $('#billing_city').value="";
      $('#billing_city').focus();
      return false;
    }
        else
    {
      document.getElementById('billing_cityError').style.display = 'none';
      $('#billing_city').css("border","1px solid #82B04F");
      document.getElementById("billing_cityError").innerHTML="";
    }
	
	if(shipping_city == "0")
    {
      $('#shipping_city').css("border","1px solid #FF0000");
      $('.error').html("");
      document.getElementById('shipping_cityError').style.display = 'block';
      $('#shipping_city').value="";
      $('#shipping_city').focus();
      return false;
    }
        else
    {
      document.getElementById('shipping_cityError').style.display = 'none';
      $('#shipping_city').css("border","1px solid #82B04F");
      document.getElementById("shipping_cityError").innerHTML="";
    }

    if(bill_zip_code == "")
    {
      $('#bill_zip_code').css("border","1px solid #FF0000");
      $('.error').html("");
      document.getElementById('bill_zip_codeError').style.display = 'block';
      $('#bill_zip_code').value="";
      $('#bill_zip_code').focus();
      return false;
    }
        else
    {
      document.getElementById('bill_zip_codeError').style.display = 'none';
      $('#bill_zip_code').css("border","1px solid #82B04F");
      document.getElementById("bill_zip_codeError").innerHTML="";
    }
	
	if(ship_zip_code == "")
    {
      $('#ship_zip_code').css("border","1px solid #FF0000");
      $('.error').html("");
      document.getElementById('ship_zip_codeError').style.display = 'block';
      $('#ship_zip_code').value="";
      $('#ship_zip_code').focus();
      return false;
    }
        else
    {
      document.getElementById('ship_zip_codeError').style.display = 'none';
      $('#ship_zip_code').css("border","1px solid #82B04F");
      document.getElementById("ship_zip_codeError").innerHTML="";
    }

    });
  });

function IsEmail(customer_email)
{
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(customer_email)) 
    {
      return false;
    }
    else
    {
      return true;
    }
}
function Ismobile(customer_mobile)
{
    if (customer_mobile.match(/^\d{10}$/)) {
    return true;
    } 
    else 
    {
    return false;
    }
}

</script>

<script>
function copy_address()
{
 
  var tb1 = document.getElementById("cus_bill_address");
  var tb2 = document.getElementById("cus_ship_address");
  var tb3 = document.getElementById("bill_zip_code");
  var tb4 = document.getElementById("ship_zip_code");
    
    
    if (tb1.value != "") {
        tb2.value = tb1.value;
		  tb4.value = tb3.value;
		  
	var $options = $("#billing_country > option").clone();
    $('#shipping_country').empty();
    $('#shipping_country').append($options);
    $('#shipping_country').val($('#billing_country').val());
	
	var $options1 = $("#billing_state > option").clone();
    $('#shipping_state').empty();
    $('#shipping_state').append($options1);
    $('#shipping_state').val($('#billing_state').val());
	
	var $options2 = $("#billing_city > option").clone();
    $('#shipping_city').empty();
    $('#shipping_city').append($options2);
    $('#shipping_city').val($('#billing_city').val());
	
		  
			return false;
    }  
    
	 
	return false;
}

 
</script>
<script>

function codevalidation()
{
	var code = $("#customer_code").val();
	var prefix = $("#customer_code_prefix").val();
	var codelength = code.length;
	var prefixlength = prefix.length;
	var res = code.substr(0,prefixlength); 
	if(codelength >= prefixlength)
	{
		if(res != prefix)
		{
			alert('Customer Code Should be Prefix With '+prefix);
		}
	}
}


function getcountry()
 {

 	var cout = $('select#billing_country').val();
	 
 	$.ajax({
 		type: 'POST',
 		url: '<?php echo site_url('customer/get_state'); ?>',
 		data: 'country='+cout,
 		success: function(resp) {
 			$('select#billing_state').html(resp);
      var st = $('select#billing_state').val();
        $.ajax({
        type: 'POST',
        url: '<?php echo site_url('customer/get_city'); ?>',
        data: {country: cout, state: st},
        success: function(resp) { 
          $('select#billing_city').html(resp);
        }
      });
 		}
	 });
 }
 function getstate()
{
	var cout = $('select#billing_country').val();
	 
 	var state = $('select#billing_state').val();
 	$.ajax({
 		type: 'POST',
 		url: '<?php echo site_url('customer/get_city'); ?>',
 		data: {country: cout, state: state},
 		success: function(resp) { 
			$('select#billing_city').html(resp);
 		}
	 });
}


function getship_country()
 {
 	var cout = $('select#shipping_country').val();
	
 	$.ajax({
 		type: 'POST',
 		url: '<?php echo site_url('customer/get_state'); ?>',
 		data: 'country='+cout,
 		success: function(resp) {
 			$('select#shipping_state').html(resp);
      var st_ship_id = $('select#shipping_state').val();
      $.ajax({
        type: 'POST',
        url: '<?php echo site_url('customer/get_city'); ?>',
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
 		url: '<?php echo site_url('customer/get_city'); ?>',
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
			<form class="form-horizontal recordEditView" id="EditView" name="EditView" method="post" action="<?php echo site_url('customer/addcustomer_details')?>" enctype="multipart/form-data">
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">New Customer</h3>
					<span class="pull-right">
						<button class="btn-success cus_add_details" value="Save" type="submit" name="cus_add_details" id="cus_add_details"><strong>Save</strong></button>
						<button class="btn-success add_reset" value="reset" type="reset" name="add_reset" id="cus_add_reset"><strong>Reset	</strong></button>
						 <a class="cancelLink btn-success" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </span>
                </div>
                <span class="grid_error" id="add_itemError">
                 Please Enter Number Only
                   </span>
                <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">Customer Details</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Customer Name
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
										 <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="customer_nameError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                       </div>
                                        <input id="customer_name" name="customer_name" type="text" class="input-large nameField nosplchar" />
                                    </span>
                                 </div>
                             </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Customer Code</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
									<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="customer_codeError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                     </div>
                                       <input id="customer_code" type="text" readonly="readonly" class="input-large uppercase" name="customer_code" value="<?php if(isset($Cuscode)) { echo $Cuscode; } ?>"/>
                                        <input id="vendor_prefix" type="hidden" name="customer_code_prefix" value="<?php if(isset($CustomerPrefix)) { echo $CustomerPrefix; } ?>"/>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor"></span>Email
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
									<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="customer_emailError">
                                          <div class="formErrorContent">Enter valid E-Mail</div>
                                          <div class="formErrorArrow"></div>
                                     </div>
                                       <input id="customer_email" required name="customer_email" type="text" class="input-large" />
                                    </span>
                                 </div>
                             </td>
							 <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor"></span>Mobile
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
									<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="customer_mobileError">
                                          <div class="formErrorContent">Please enter valid mobile number</div>
                                          <div class="formErrorArrow"></div>
                                     </div>
                                    <input id="customer_mobile" class="input-large" name="customer_mobile" value="" />
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
									<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="customer_categoryError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                     </div>
                                     <select name="customer_category" class="chzn-select" id="category">
                                            <!--<option value="">Select an Option</option>-->
                                            <option value="Stockist">Stockist</option>
                                            <option value="Super-Stockist">Super-Stockist</option>
                                            <option value="Dealer">Dealer</option>
                                            <option value="WholeSaleRetailer">Whole Sale Retailer</option>
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
									<input id="customer_pan" type="text" class="input-large " name="customer_pan" value=""/>
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
                                        <input id="customer_gst" type="text" class="input-large" name="customer_gst" value=""/>
                                    </span>
                                </div>
                            </td> 
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Contact Person</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <input id="customer_con_person" type="text" class="input-large" name="customer_con_person" value=""/>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                </tbody>
                </table>
				<br />
                
               
			
				<table class="table table-bordered blockContainer showInlineTable equalSplit">
                    
                    
                    <tbody>
						
                        
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    Credit Limit
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                    <input id="customer_credit_limit" type="text" class="input-large " name="customer_credit_limit" value=""/>
                                    </span>
                                 </div>
                             </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Credit Days</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <input id="customer_credit_days" type="text" class="input-large " name="customer_credit_days" value=""/>
                                    </span>
                                </div>
                            </td>
                        </tr>
						
						<tr>
                           
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Area</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
									<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="customer_areaError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                     </div>
                                        <select name="customer_area" class="chzn-select" id="customer_area">
											<!--<option value="">Select an Option</option>-->
                                             <?php foreach($area as $ARE) { ?>
												<option value="<?php echo $ARE['area_id']; ?>"><?php echo $ARE['area_name']; ?></option>
											<?php } ?>
                                        </select>
                                    </span>
                                </div>
                            </td>
                             <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Discount (%)</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <input id="customer_discount_percent" type="text" class="quantity" name="customer_discount_percent" value=""/>
                                       
                                    </span>
                                </div>
                            </td>
						</tr>
                        
                        
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Status</label>
                            </td>
                           <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
									<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="customer_categoryError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                     </div>
                                     <select name="customer_status" class="chzn-select" id="customer_status">
                                            <option value="active">Active</option>
                                     </select>
                                    </span>
                                </div>
                            </td>
							<td class="fieldLabel medium"> <label class="muted pull-right marginRight10px">Transport</label>&nbsp;
                                
                          </td>
                            <td class="fieldValue medium"><span class="span10">
                             <select name="customer_transport" class="chzn-select" id="customer_transport">
                                            
                                             <?php foreach($carrier as $CARR) { ?>
                                    			<option value="<?php echo $CARR['shipping_carrier_id']; ?>"  ><?php echo $CARR['shipping_carrier_name']; ?></option>
                                			<?php } ?>
                                        </select>
                            </span>
                                
                             </td>
						</tr>
                        <tr>
                          <td class="fieldLabel medium"> <label class="muted pull-right marginRight10px">Remarks</label></td>
                          <td class="fieldValue medium" ><span class="span10">
                            <input id="customer_remarks" type="text" class="input-large " name="customer_remarks" value=""/>
                          </span></td>
                          <td class="fieldLabel medium">&nbsp;</td>
                          <td class="fieldValue medium">&nbsp;</td>
                        </tr>

                    </tbody>
                    
                </table>
						
                <br>
                  <span class="nums_error" id="add_itemError" >
                 Please Enter Number Only
                   </span>
                        
                <table class="table table-bordered blockContainer showInlineTable equalSplit">
              <thead>
                <tr>
                  <th class="blockHeader" colspan="4">Address Details</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor">*</span>Billing Address</label></td>
                  <td class="fieldValue medium" >
                        <div class="row-fluid"><span class="span10">
           <div class="row-fluid"><span class="span10">
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="cus_bill_addressError" style="margin-top: -30px;">
                     <div class="formErrorContent">* Enter Your Billing Address<br></div>
                     <div class="formErrorArrow"><div class="line10"></div>
                  </div>
                  </div> 
                  </span>
                  </div>
                 
                      <textarea class="row-fluid"  name="cus_bill_address" id="cus_bill_address" ></textarea>
                      </span></div></td>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor"></span>Shipping Address</label></td>
                  <td class="fieldValue medium" >
                  <div class="row-fluid">
                  	<span class="span10">
                    <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                       </div>
                   <a href="javascropt:void(0);" onclick="return copy_address()" style="text-decoration:underline; padding-bottom:5px;"> Same Billing Address</a>
                      <textarea class="row-fluid" required name="cus_ship_address" id="cus_ship_address" ></textarea>
                      </span></div></td>
                </tr>
                
                 
                <tr>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor">*</span>Billing Country</label></td>
                  <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="billing_countryError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                       </div>
                      <select class="chzn-select"  name="billing_country" id="billing_country" onchange="getcountry()">
                        <!--<option value="">Select an Option</option>-->
                      <?php foreach($country as $CON) {    ?>
                 <option value="<?php echo $CON['country_id']; ?>"  ><?php echo $CON['country_name']; ?></option>
 				<?php } ?>

                      </select>
                      </span></div></td>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor"></span>Shipping Country</label></td>
                  <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                       </div>
                      <select class="chzn-select " name="shipping_country" id="shipping_country" onchange="getship_country()">
                        <!--<option value="">Select an Option</option>-->
                      <?php foreach($country as $CON) {    ?>
                 <option value="<?php echo $CON['country_id']; ?>"  ><?php echo $CON['country_name']; ?></option>
 				<?php } ?>

                      </select>
                      </span></div></td>
                </tr>
               
                <tr>
               
                <tr>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor">*</span>Billing State</label></td>
                  <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="billing_stateError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                       </div>
                      <select class="chzn-select"  name="billing_state" id="billing_state" onchange="getstate()">
                       
                      </select>
                      </span></div></td>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor"></span>Shipping State</label></td>
                  <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
                   <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                       </div>
                      <select class="chzn-select " name="shipping_state" id="shipping_state" onchange="getship_state()">
                       
                           
                      </select>
                      </span></div></td>
                </tr>
                 <tr>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor">*</span>Billing City</label></td>
                  <td class="fieldValue medium" >
                   <div class="row-fluid"><span class="span10">
          				<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="billing_cityError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                       </div>
                      <select class="chzn-select"  name="billing_city" id="billing_city">
               
                      </select>
                      </span></div></td>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor"></span>Shipping City</label></td>
                  <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                       </div>
                      <select class="chzn-select " name="shipping_city" id="shipping_city">
                       
                      </select>
                      </span></div></td>
                </tr>
                
               
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor">*</span>Billing Zip Code</label></td>
                  <td class="fieldValue medium" >
                   <div class="row-fluid"><span class="span10">
           <div class="row-fluid"><span class="span10">
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="bill_zip_codeError" style="margin-top: -30px;">
                     <div class="formErrorContent">* Enter Your Billing Zipcode<br></div>
                     <div class="formErrorArrow"><div class="line10"></div>
                  </div>
                  </div> 
                  </span>
                  </div>
                  
                      <input id="bill_zip_code" required name="bill_zip_code" class="input-large" maxlength="6" />
                      </span></div></td>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor"></span>Shipping Zip Code</label></td>
                  <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                       </div>
                      <input id="ship_zip_code" required name="ship_zip_code" type="text" class="input-large " maxlength="6" />
                      </span></div></td>
                </tr>
              </tbody>
            </table>
			  <br/>
              <br>
                <br/>
                <br>
                
                <div class="row-fluid">
                    <div class="pull-right">
                        <button class="btn-success cus_add_details" value="save" type="submit" name="cus_add_details" id="cus_add_details"><strong>Save</strong></button>
						<button class="btn-success add_reset" value="reset" type="reset" name="add_reset" id="cus_add_reset"><strong>Reset	</strong></button>
                        <a class="cancelLink btn-success" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <br>
            
            </form>
				
          </div>

      </div>

</section>
