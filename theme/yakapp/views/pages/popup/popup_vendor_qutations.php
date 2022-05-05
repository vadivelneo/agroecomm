<script type="text/javascript"> 

	function vendorquatationsearch(){
			
           var search_vq_no = $("#search_vq_no").val();
		   var search_vendor_name = $("#search_vendor_name").val();
		   
		   $.ajax({
			type: 'POST',
			url: '<?php echo site_url('purchasepopup/searchvendorquatation'); ?>',
			data: {vq_code: search_vq_no, vendor_name: search_vendor_name},
			success: function(resp)
			{ 
			//alert(resp); return false;
				$('#multiple_vendor_quote').html(resp);
			}
		 });
	 
    }
</script>
<script type="text/javascript"> 
function get_vendor_quatation_details(id, vendorqutationid)
{
	$('#disp_items').html("");
	
	var vendor_quation_id = $("#vendor_quation_id_"+id).val();
	var vendor_quation_number = $("#vendor_quation_number_"+id).val();
	var vendor_quation_vendor_name = $("#vendor_quation_vendor_name_"+id).val();
	var vendor_quation_vendor_code = $("#vendor_quation_vendor_code_"+id).val();
	var vendor_quation_vendor_id = $("#vendor_quation_vendor_id_"+id).val();
	var vendor_quation_req_date = $("#vendor_quation_req_date_"+id).val();
	
	$("#vdrquo_vendor_id").val(vendor_quation_vendor_id);
	$("#vdrquo_vendor_code").val(vendor_quation_vendor_code);
	$("#purchse_ord_ven_quonum").val(vendor_quation_number);
	$("#vdrquo_vendor_name").val(vendor_quation_vendor_name);
	$("#purchse_ord_req_date").val(vendor_quation_req_date);
	$("#purchse_vdrquo_quote_id").val(vendor_quation_id);
	
	$(".venodr_quatation_popup"+id).addClass("close");
	
	$.ajax({
		type: 'POST',
		url: '<?php echo site_url('purchasepopup/getvendorqutationitems'); ?>',
		data: {'venqutid': vendorqutationid},
		success: function(resp){
			
			var myData = JSON.parse(resp);
			
			var view_order = myData.view_order;
			var totalrows = myData.countofrows;

			$('#disp_items').append(myData.view_order);
			$('#last_table_id').val(totalrows);
			
			purchase_calculatetotal();
	
		}
	});
	return false;
}
</script>
<div class="p-popup">
	<a class="close"><img src="<?php echo base_url(); ?>/resources/images/close-button.png" width="25" /></a>
     <div>
  <div class="title_head">
  <p>Search Vendor Quatation</p>
  </div>
      <table>
      	<tr>
        	<td>
            	Vendor Quatation No :
                <br /><br />
                <input type="text" 	value="" name="search_vq_no" class="input-large" id="search_vq_no" onkeyup="vendorquatationsearch()">
            </td>
            <td>
            	Vendor Name :
            <br /><br />
            	<input type="text" 	value="" name="search_vendor_name" class="input-large" id="search_vendor_name" onkeyup="vendorquatationsearch()">
            </td>
            <!--<td>
            	<br /><br />
            	<a href="#" id="vendorquatationsearch" class="btn-success">Search</a>
            </td>-->
        </tr>
      </table>
      </div>
	<div class="title_head">
		<p>Vendor Qutations</p>
	</div>
		<div class="table_head1" id="table">
			<div class="popup_col w10 last">
				<div class="content">
					<table>
						<thead>
							<tr>
								<th>Vendor quote No</th>
                                <th>Vendor Name</th>
								<th>Requestion No</th>
								<th>Required Date</th>
							</tr>
                            </thead>
                            <tbody id="multiple_vendor_quote">
								<?php
									if(!empty($vendor_quatations)) {
										$i = 1;
										foreach($vendor_quatations as $Vendor) { ?>
	
											<tr>
												<td>
                                                	<a href="javascript:void(0);" class="popup_selection_class venodr_quatation_popup<?php echo $i;?>" onClick="get_vendor_quatation_details('<?php echo $i;?>','<?php echo $Vendor['vendor_quote_id'];?>');">
														<?php echo $Vendor['vendor_quote_qoute_no'];?>
                                                    </a>
                                                    <input type="hidden" id="vendor_quation_id_<?php echo $i;?>" value="<?php echo $Vendor['vendor_quote_id'];?>">
                                					<input type="hidden" id="vendor_quation_number_<?php echo $i;?>" value="<?php echo $Vendor['vendor_quote_qoute_no'];?>">
												</td>
                                                <td>
													<?php echo $Vendor['vendor_name'];?>
                                                     <input type="hidden" id="vendor_quation_vendor_id_<?php echo $i;?>" value="<?php echo $Vendor['vendor_id'];?>">
                                                      <input type="hidden" id="vendor_quation_vendor_name_<?php echo $i;?>" value="<?php echo $Vendor['vendor_name'];?>">
                                                       <input type="hidden" id="vendor_quation_vendor_code_<?php echo $i;?>" value="<?php echo $Vendor['vendor_code'];?>">
                                                       <input type="hidden" id="vendor_quation_req_date_<?php echo $i;?>" value="<?php if(($Vendor['vendor_quote_req_date'])!= "0000-00-00"){ echo date('d-m-Y',strtotime($Vendor['vendor_quote_req_date']));}?>">
												</td>
												<td>
                                                    <a href="javascript:void(0);" class="popup_selection_class venodr_quatation_popup<?php echo $i;?>" onClick="get_vendor_quatation_details('<?php echo $i;?>','<?php echo $Vendor['vendor_quote_id'];?>');">
                                                    <?php echo $Vendor['vendor_quote_met_req_no'];?>
                                                    </a>
                                                </td>
												<td><?php if(($Vendor['vendor_quote_req_date'])!= "0000-00-00"){ echo date('d-m-Y',strtotime($Vendor['vendor_quote_req_date']));}else{ echo '-';}?></td>
											</tr>
											<?php 
										$i++;
										}
									} 
									else{?>
										<tr>
											<td colspan="6" style="text-align:center;"> No Records Found </td>
										</tr>
									<?php }?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>