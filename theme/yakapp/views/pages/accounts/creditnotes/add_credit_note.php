<script language="javascript" type="text/javascript">
         
$(document).ready(function () {

	$("#last_table_id").val('0');
	$('#openingstkForm')[0].reset();
	
	 $('.add_credit').click(function()
     {
        
        var name = $("#name").val();
        var amount = $("#amount").val();
       
     
	 if(name == "")
    {
      $('#name').css("border","1px solid #FF0000");
      $('.error').html("");
      //document.getElementById("vendor_nameError").innerHTML="* This field is required";
      document.getElementById('nameError').style.display = 'block';
      $('#name').value="";
      $('#name').focus();
      return false;
    }
      else
    {
      document.getElementById('nameError').style.display = 'none';
      $('#name').css("border","1px solid #82B04F");
      document.getElementById("nameError").innerHTML="";
    }
	
	if(amount == "")
    {
      $('#amount').css("border","1px solid #FF0000");
      $('.error').html("");
      //document.getElementById("vendor_nameError").innerHTML="* This field is required";
      document.getElementById('amountError').style.display = 'block';
      $('#amount').value="";
      $('#amount').focus();
      return false;
    }
      else
    {
      document.getElementById('amountError').style.display = 'none';
      $('#amount').css("border","1px solid #82B04F");
      document.getElementById("amountError").innerHTML="";
    }
	

});

});
</script>
<script>
    /*  jQuery ready function. Specify a function to execute when the DOM is fully loaded.  */
$(document).ready(
  
  /* This is the function that will get executed after the DOM is fully loaded */
  function () {
    $( "#credit_add_date" ).datepicker({
		dateFormat:"dd-mm-yy",
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    }); 
	
  }

);
</script>
	
<?php echo $this->load->view('pages/accounts_left_side'); 

 //echo "<pre>";print_r($so_list);exit;
?>
<section>

	<div class="rightPanel" style="padding: 14px 20px; width:96%;">

		<div class='container-fluid editViewContainer'>
			<form class="form-horizontal openingstkForm" id="openingstkForm" name="openingstkForm" method="post" action="<?php echo site_url('accounts/add_credit_note')?>">
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">Add Credit Note</h3>
					<div class="pull-right">
						<button class="btn-success add_credit" type="submit" name="add_credit" id="add_credit"><strong>save</strong></button>
						 <button type="reset" value="Reset" class="btn btn-primary">Reset</button>
						<a class="btn-danger materialreq_add_details" type="reset" onClick="javascript:window.history.back();">Cancel</a>
					</div>
				</div>

				<table class="table table-bordered blockContainer showInlineTable equalSplit">
					<thead>
						<tr>
							<th class="blockHeader" colspan="4">Credit Node Details</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<!--<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Account For</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                     <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id= "pay_adj_typeError" style="margin-top: -30px;">
                                            <div class="formErrorContent">Select Receipt</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        
                     <select class="chzn-select"  name="account_for" id="account_for">
                      
                      <option value="customer">Customer</option>  
                      <option value="vendor">Vendor</option>
                       
                    </select>
                           </span>
                                </div>
							</td>-->
							<td class="fieldLabel medium">
                <label class="muted pull-right marginRight10px">
                  <span class="redColor">*</span>Name
                </label>
              </td>
              <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                     <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="nameError">
                                          <div class="formErrorContent">This field is required</div>
                                          <div class="formErrorArrow"></div>
                                       </div>
                                       <div class="row-fluid input-prepend input-append">
                                       <input type="hidden"  name="account_for" id="account_for" value="customer" />
                                        <input id="name" name="name" type="text" class="input-large with_plus" value="" readonly="" />
                                        <span id="plus_credit_details" class="add-on cursorPointer createReferenceRecord plus">
                                              <a href="javascript:void(0);"><i class="icon-plus" title="Select"></i></a>
                                          </span>
                      
                                         <input id="user_id" name="user_id" type="hidden" />
                                         <input id="account_type" name="account_type" type="hidden" value="credit" />
                                       </div>
                                    </span>
                                 </div>
                             </td>
							
							
		
                            <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">
                            <span class="redColor">*</span>Amount
                            </label></td>
                            <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
                            <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id= "amountError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                <input id="amount" name="amount" type="text" class="input-large " />
                                </span></div>
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
                                        <textarea class="row-fluid" id="description" name="description" ></textarea>
                                    </span>
                                 </div>
                             </td>
							
						</tr>
            
						
						

					</tbody>
				</table>

				<br />
				<br />

				
				<br />
				
				<div class="row-fluid">
					<div class="pull-right">
						<button class="btn-success add_credit" type="submit" name="add_credit" id="add_credit"><strong>save</strong></button>
						 <button type="reset" value="Reset" class="btn btn-primary">Reset</button>
						<a class="btn-danger materialreq_add_details" type="reset" onClick="javascript:window.history.back();">Cancel</a>
					</div>
					<div class="clearfix"></div>
				</div>

				<br>
			</form>
        </div>

	</div>

<div id="credit_pop_up" class="pop-up-display-content singleitemscontent">
   </div>

</section>

<script>
// Semicolon (;) to ensure closing of earlier scripting
// Encapsulation
// $ is assigned to jQuery
;(function($) {

   // DOM Ready
  $(function() {

    // Binding a click event 
    // From jQuery v.1.7.0 use .on() instead of .bind()
   $('#plus_credit_details').bind('click', function(e) {
   
  var credit = $('#account_for').val();
  

    $.ajax({
        type: 'POST',
        url: '<?php echo site_url('accounts/get_credit_popup'); ?>',
       data: 'credit_type='+credit,
        success: function(resp) 
        {
          $("#credit_pop_up").html(resp);
          
          e.preventDefault();
          $('#credit_pop_up').bPopup({
            position: [300, 50], //x, y
            closeClass:'close',
            follow: [true, true],
            modalClose: true
          });      
        }
      });
  
  });
});
})(jQuery);

</script>