
<script type="text/javascript"> 
$(document).ready(function () {
	document.getElementById("proicelistForm").reset();
	
	$('.priceBookAdd').click(function()
			{  
			 	var pricebookname = $("#pricebookname").val();
				var pricebookcode = $("#pricebookcode").val();

				 if(pricebookname == "")
				    {
				      $('#pricebookname').css("border","1px solid #FF0000");
				      $('.error').html("");
				      document.getElementById('pricebooknameError').style.display = 'block';
				      $('#pricebookname').value="";
				      $('#pricebookname').focus();
				      return false;
				    }
				      else
				    {
				      document.getElementById('pricebooknameError').style.display = 'none';
				      $('#pricebookname').css("border","1px solid #82B04F");
				      document.getElementById("pricebooknameError").innerHTML="";
				    }

					if(pricebookcode == "")
				    {
				      $('#pricebookcode').css("border","1px solid #FF0000");
				      $('.error').html("");
				      document.getElementById('pricebookcodeError').style.display = 'block';
				      $('#pricebookcode').value="";
				      $('#pricebookcode').focus();
				      return false;
				    }
				      else
				    {
				      document.getElementById('pricebookcodeError').style.display = 'none';
				      $('#pricebookcode').css("border","1px solid #82B04F");
				      document.getElementById("pricebookcodeError").innerHTML="";
				    }
			});
	
});

	
</script>

<?php echo $this->load->view('pages/price_left_side'); ?>

<section>

	<div class="rightPanel" style="padding: 14px 20px; width:96%;">

		<div class='container-fluid editViewContainer'>
			<form class="form-horizontal proicelistForm" id="proicelistForm" name="proicelistForm" method="post" action="<?php echo site_url('pricebook/updatepricebook').'/'.$this->uri->segment('3'); ?>">
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">Update Pricebook</h3>
					<div class="pull-right">
						<button class="btn-success priceBookupdate" type="submit" name="priceBookupdate" id="priceBookupdate"><strong>Update</strong></button>
						<a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
					</div>
				</div>

				<table class="table table-bordered blockContainer showInlineTable equalSplit">
					<thead>
						<tr>
							<th class="blockHeader" colspan="4">Price Book Details</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="fieldLabel medium">
								<label class="muted pull-right marginRight10px">
									<span class="redColor">*</span>Price Book Name
								</label>
							</td>
							<td class="fieldValue medium">
								<div class="row-fluid">
									<span class="span10">
										<div class="formError" id="pricebooknameError" style="margin-top: -30px;">
											<div class="formErrorContent">This field is required</div>
											<div class="formErrorArrow"></div>
										</div>
										<input type="text"  value="<?php if(isset($pricebookvalue->price_book_name)) { echo $pricebookvalue->price_book_name; } ?>" name="pricebookname" class="input-large nameField" id="pricebookname">
                                        <input type="hidden" readonly="readonly" value="<?php echo $this->uri->segment('3'); ?>" id="pricebook_id">
                                        
									</span>
								</div>
							</td>
							<td class="fieldLabel medium">
								<label class="muted pull-right marginRight10px"><span class="redColor">*</span>Price Book Code</label>
							</td>
							<td class="fieldValue medium" >
								<div class="row-fluid">
									<span class="span10">
										<div class="parentFormEditView formError" id="pricebookcodeError" style="margin-top: -30px;">
											<div class="formErrorContent">This field is required</div>
											<div class="formErrorArrow"></div>
										</div>
										<input type="text" value="<?php if(isset($pricebookvalue->price_book_code)) { echo $pricebookvalue->price_book_code; } ?>" name="pricebookcode" onkeyup="return codevalidation()" class="input-large uppercase" readonly id="pricebookcode">
										<input id="pricebookcode_prefix" type="hidden" name="pricebookcode_prefix" value="<?php echo $pricePrefix; ?>"/>
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
										<textarea class="row-fluid" id="pricebookdecription" name="pricebookdecription" >
                                        	<?php if(isset($pricebookvalue->price_book_description)) { echo $pricebookvalue->price_book_description; } ?>
                                        </textarea>
									</span>
								</div>
							</td>
							  <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                   <span class="redColor"></span>Scheme Code
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
										<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id= "product_usageunitError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <select	name="scheme_code" class="chzn-select" id="scheme_code" onchange="getSquarefeet()" >
                                        	<option value="<?php echo $pricebookvalue->scheme_id; ?>|<?php echo $pricebookvalue->scheme_code; ?>"><?php echo $pricebookvalue->scheme_code;  ?></option>
                                            <?php if(isset($scheme_code) && !empty($scheme_code)) { foreach($scheme_code as $SCH) { ?>
                                            <option value="<?php echo $SCH['scheme_id']; ?>|<?php echo $SCH['scheme_code']; ?>"><?php echo $SCH['scheme_code']; ?></option>
                                           	<?php } } ?>
                                        </select>
                                    </span>
                                 </div>
                             </td>
						</tr> 

					</tbody>
				</table>

                 <br />
                
                <div class="row-fluid">
                     <div class="pull-right">
                     	<a class="btn btn-success" id="update_items_price" href="javascript:void(0);"><strong>Update Items</strong></a>
                      <?php /*?>  <a class="btn btn-success" id="pricebook_singleitem" href="javascript:void(0);"><strong>Add Single Item</strong></a><?php */?>
                      <a class="btn btn-success" id="pricebook_multipleitems"><strong>Add Items</strong></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
				 <input type ="hidden" value="0" name="last_table_id " id="last_table_id">
                <br />
				<br />
                 
				<table>
					<thead>
						<tr>
							<th>Item Code</th>
							<th>SKU</th>
							<th>Item Description</th>
							<th>Incentive Rate</th>
							<th>Handling Charges</th>
							<th>Selling Price</th>
                            <th>MRP</th>
							<th>Discount(%)</th>	
							
							<th>CGST (%)</th>
							<th>SGST (%)</th>
							<th>IGST (%)</th>
							<th>HSN/SAC</th>
							<th>Selling Price with tax</th>
                         </tr>
                    </thead>
                    <tbody id="disp_items">
							
					</tbody>
				</table>
				<br />
				<br />
				<br />
				<br />
				<div class="row-fluid">
					<div class="pull-right">
						<button class="btn-success priceBookupdate" type="submit" name="priceBookupdate" id="priceBookupdate"><strong>Update</strong></button>
						<a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
					</div>
					<div class="clearfix"></div>
				</div>

				<br>
			</form>
        </div>

	</div>
	
    <!--popup start -->
      <div id="singleitem_to_pop_up" class="pop-up-display-content">
       
	 </div>
     <!--popup end -->
     
     <!--popup start -->
      <div id="multipleitems_to_pop_up" class="pop-up-display-content">
       
	 </div>
     <!--popup end -->
     
     <!--popup start -->
      <div id="pricebook_items_to_pop_up" class="pop-up-display-content">
       
	 </div>
     <!--popup end -->
     
</section>

<script>
// Semicolon (;) to ensure closing of earlier scripting
// Encapsulation
// $ is assigned to jQuery
;(function($) {

	 // DOM Ready
	$(function() {
		
		$('#pricebook_singleitem').bind('click', function(e) {

				$.ajax({
					type: 'POST',
					url: '<?php echo site_url('pricebook/getsingleitem'); ?>',
					data: {},
					success: function(resp) 
					{
						$("#singleitem_to_pop_up").html(resp);
								e.preventDefault();
							$('#singleitem_to_pop_up').bPopup({
								position: [10, 10], //x, y
								closeClass:'close',
								follow: [true, true],
								modalClose: true
							});				 
					}
				});
			 

		});
		
		$('#pricebook_multipleitems').bind('click', function(e) {

			
				$.ajax({
					type: 'POST',
					url: '<?php echo site_url('pricebook/getmultipleitemdetails'); ?>',
					data: {},
					success: function(resp) 
					{
						$("#multipleitems_to_pop_up").html(resp);
					
								e.preventDefault();
							$('#multipleitems_to_pop_up').bPopup({
								position: [10, 10], //x, y
								closeClass:'close',
								follow: [true, true],
								modalClose: true
							});				 
					}
				});
		});
		
		$('#update_items_price').bind('click', function(e) {
				var pricebook_id = '<?php echo $this->uri->segment('3'); ?>';
				
				$.ajax({
					type: 'POST',
					url: '<?php echo site_url('pricebook/getmultiple_pricebook_itemdetails'); ?>',
					data: {pricebook: pricebook_id},
					success: function(resp) 
					{
						$("#pricebook_items_to_pop_up").html(resp);
					
								e.preventDefault();
							$('#pricebook_items_to_pop_up').bPopup({
								position: [10, 10], //x, y
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