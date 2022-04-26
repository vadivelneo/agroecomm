<script type="text/javascript"> 
$(document).ready(function() {
	document.getElementById("proicelistForm").reset();
	$("#last_table_id").val('0');
	$('.priceBookAdd').click(function()
			{  
			 	var pricebookname = $("#pricebookname").val();
				var pricebookcode = $("#pricebookcode").val();
				 var last_table_id = $("#last_table_id").val();

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
					if(last_table_id == "0" )
					{
					$('#last_table_idError').css("display","block");
					$('#last_table_id').focus(); 
					return false;
					}
					else
					{
					$('#last_table_idError').css("display","none");
					}
			});
	
});


</script>

<?php echo $this->load->view('pages/price_left_side'); ?>

<section>

	<div class="rightPanel" style="padding: 14px 20px; width:96%;">

		<div class='container-fluid editViewContainer'>
			<form class="form-horizontal proicelistForm" id="proicelistForm" name="proicelistForm" method="post" action="<?php echo site_url('pricebook/instant_addpricebook')?>">
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">Creating New Pricebook</h3>
					<div class="pull-right">
						<button class="btn-success priceBookAdd" type="submit" name="priceBookAdd" id="priceBookAdd"><strong>save</strong></button>
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
										<input type="text" value="" name="pricebookname" class="input-large nameField" id="pricebookname"></span>
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
										<input type="text" readonly="readonly" value="<?php echo $pricebookCode; ?>" name="pricebookcode" class="input-large uppercase" id="pricebookcode">
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
										<textarea class="row-fluid" id="pricebookdecription" name="pricebookdecription" ></textarea>
									</span>
								</div>
							</td>
							<td class="fieldLabel medium">&nbsp;
	
							</td>
							<td class="fieldValue medium" >&nbsp;
			
							</td>
						</tr> 

					</tbody>
				</table>

				<br />
				<br>
                
                <div class="row-fluid">
                     <div class="pull-right">
                       <?php /*?> <a class="btn btn-success" id="purchase_singleitem" href="javascript:void(0);"><strong>Add Single Item</strong></a><?php */?>
                        <a class="btn btn-success" id="purchase_multipleitems"><strong>Add Items</strong></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
				 <input type ="hidden" value="0" name="last_table_id " id="last_table_id">
                <br /> 
                <span class="grid_error" id="last_table_idError" >
                  Please Add Some Items
                 </span>
				 <br />
				<table id="tblList">
				<thead>
				<tr>	
                    <th>Item Code</th>
                    <th>SKU</th>
                    <th>Item Description</th>
                    <th>Selling Price</th>
                    <th>MRP</th>	
                    <th>Discount(%)</th>	
                    <th>Discount Amount</th>
                    <th>Damage Discount(%)</th>
                    <th>CGST (%)</th>
					<th>SGST (%)</th>
					<th>IGST (%)</th>
                    <th>HSN/SAC</th>
				</tr>
				</thead>
				<tbody id="disp_items">
                
				</tbody>
				</table>
				<br />
				<br />
                
                
				
				<div class="row-fluid">
					<div class="pull-right">
						<button class="btn-success priceBookAdd" type="submit" name="priceBookAdd" id="priceBookAdd"><strong>save</strong></button>
						<a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
					</div>
					<div class="clearfix"></div>
				</div>

				<br>
			</form>
        </div>

	</div>
	
    <!--popup start -->
      <div id="singleitem_to_pop_up" class="pop-up-display-content singleitemscontent">
       
	 </div>
     <!--popup end -->
     
     <!--popup start -->
      <div id="multipleitems_to_pop_up" class="pop-up-display-content multipleitemscontent">
       
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
		
		$('#purchase_singleitem').bind('click', function(e) {

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
		
		$('#purchase_multipleitems').bind('click', function(e) {

			
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
		

	});
})(jQuery);
</script>