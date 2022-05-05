<script>
function price_book_charge(id)
{
	//alert('ddd');
	var item_incentive = $("#item_incentive_rate_"+id).val();
	var item_handling_charge = $("#item_handling_charge_"+id).val();
	var item_selling_total = (((parseFloat(item_incentive)) * 30) / 100) + (parseFloat(item_handling_charge))  + (parseFloat(item_incentive));
	
	$("#item_selling_price_"+id).val(item_selling_total);
}
</script>
<script type="text/javascript"> 
$(document).ready(function() {
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

	 
function codevalidation()
{
	var code = $("#pricebookcode").val();
	var prefix = $("#pricebookcode_prefix").val();
	var codelength = code.length;
	var prefixlength = prefix.length;
	var res = code.substr(0,prefixlength); 
	if(codelength >= prefixlength)
	{
		if(res != prefix)
		{
			alert('Vendor Code Should be Prefix With '+prefix);
		}
	}
}


</script>


<?php //echo"<pre>";print_r($pro_pricebook_list);exit;?>

<?php echo $this->load->view('pages/price_left_side'); ?>

<section>

	<div class="rightPanel" style="padding: 14px 20px; width:96%;">

		<div class='container-fluid editViewContainer'>
			<form class="form-horizontal proicelistForm" id="proicelistForm" name="proicelistForm" method="post" action="<?php echo site_url('pricebook/addpricebook')?>">
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
										<input type="text" readonly="readonly" value="<?php echo $pricebookCode; ?>" name="pricebookcode" onkeyup="return codevalidation()" class="input-large uppercase" id="pricebookcode">
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
                                        	<option value="">Select Scheme</option>
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
				<br />

				<table>
					<thead>
						<tr>
							<th>Item Code</th>
                            <th>SKU</th>
                            <th>HSN/SAC</th>
							<th>Item Description</th>
							<th>Incentive Rate</th>
							<th>Handling Charges</th>
							<th>Selling Price</th>
                            <th>MRP</th>
							<th>Discount(%)</th>	
							<th>Discount (Flat)</th>
                           
                            <th>CGST (%)</th>
							<th>SGST (%)</th>
							<th>IGST (%)</th>
                         </tr>
                    </thead>
                    <tbody>
							<?php
			  				//echo "<pre>"; print_r($product_list); //exit;
							if(!empty($product_list))
							{
								$itemcount = 1; 
								foreach($product_list as $PROLST) 
								{ 
								?>
							<tr>
								<td>
									<?php if(isset($PROLST['product_code'])) { echo $PROLST['product_code']; } ?>
                                    <input id="item_id_<?php echo $itemcount; ?>" name="item_id[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['product_id'])) { echo $PROLST['product_id']; } ?>" type="hidden" />
                                    <input id="item_code_<?php echo $itemcount; ?>" name="item_code[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['product_code'])) { echo $PROLST['product_code']; } ?>" type="hidden" />
								</td>
                                <td>
									<?php if(isset($PROLST['product_mfr_part_number'])) { echo $PROLST['product_mfr_part_number']; } ?>
								</td>
                                <td>
                                	<?php if(isset($PROLST['product_hsn_sac'])) { echo $PROLST['product_hsn_sac']; } ?>
									<input id="item_hsn_sac_<?php echo $itemcount; ?>" class="quantity stock_text" name="item_hsn_sac[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['product_hsn_sac'])) { echo $PROLST['product_hsn_sac']; } ?>" />
								</td>
								<td>
									<?php if(isset($PROLST['product_name'])) { echo $PROLST['product_name']; } ?>
									<input id="item_name_<?php echo $itemcount; ?>" name="item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['product_name'])) { echo $PROLST['product_name']; } ?>" type="hidden" />
                                    <input id="item_uom_id_<?php echo $itemcount; ?>" class="quantity stock_text" name="item_uom_id[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['product_stock_uom_id'])) { echo $PROLST['product_stock_uom_id']; } ?>" />
								</td>
								<td>
									<input id="item_incentive_rate_<?php echo $itemcount; ?>" class="quantity" name="item_incentive_rate[<?php echo $itemcount; ?>]" onkeyup="return price_book_charge(<?php echo $itemcount; ?>)" type="text" value="" />
								</td>
								<td>
									<input id="item_handling_charge_<?php echo $itemcount; ?>" class="quantity" name="item_handling_charge[<?php echo $itemcount; ?>]" onkeyup="return price_book_charge(<?php echo $itemcount; ?>)" type="text" value="" />
								</td>
								<td>
									<input id="item_selling_price_<?php echo $itemcount; ?>" class="quantity" name="item_selling_price[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($PROLST['product_selling'])) { echo $PROLST['product_selling']; } ?>" />
								</td>
                                <td>
									<input id="item_mrp_<?php echo $itemcount; ?>" class="quantity" name="item_mrp[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($PROLST['product_mrp'])) { echo $PROLST['product_mrp']; } ?>" />
								</td>
                                <td>
									<input id="item_discount_percentage_<?php echo $itemcount; ?>" class="quantity stock_text" name="item_discount_percentage[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($PROLST['product_discounts'])) { echo $PROLST['product_discounts']; } ?>" />
								</td>
                                <td>
									<input id="item_discount_amount_<?php echo $itemcount; ?>" class="quantity stock_text" name="item_discount_amount[<?php echo $itemcount; ?>]" type="text" value="" />
								</td>
                                
                                
                                <td>
									<input id="item_cgst_<?php echo $itemcount; ?>" class="quantity stock_text" name="item_cgst[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($PROLST['product_gst_tax'])) { echo $PROLST['product_gst_tax']; } ?>" />
								</td>
                                
								<td>
									<input id="item_sgst_<?php echo $itemcount; ?>" class="quantity stock_text" name="item_sgst[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($PROLST['product_sgst_tax'])) { echo $PROLST['product_sgst_tax']; } ?>" />
								</td>
								
								<td>
									<input id="item_igst_<?php echo $itemcount; ?>" class="quantity stock_text" name="item_igst[<?php echo $itemcount; ?>]" type="text" value="<?php if(isset($PROLST['product_igst_tax'])) { echo $PROLST['product_igst_tax']; } ?>" />
								</td>
							</tr>
						<?php 
						$itemcount++; 
						} 
							}
						?>
					</tbody>
				</table>
				<br />
				<br />
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

</section>
