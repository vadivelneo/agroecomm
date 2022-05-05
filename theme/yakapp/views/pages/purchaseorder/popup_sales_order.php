<script type="text/javascript">

 function salesordersearch(){
			
           var search_so_no = $("#search_so_no").val();
		   var search_cus_name = $("#search_cus_name").val();
		   
		   $.ajax({
			type: 'POST',
			url: '<?php echo site_url('purchaseorder/searchsalesorder'); ?>',
			data: {so_code: search_so_no, customer_name: search_cus_name},
			success: function(resp)
			{ 
			//alert(resp); return false;
				$('#multiple_sales_order').html(resp);
			}
		 });
	 
    }
</script>

<script type="text/javascript"> 

function get_sales_order_details(id, salesorderid)
{
	$('#disp_items').html("");
	
	var sales_order_id = $("#sales_order_id_"+id).val();
	  var sales_order_number = $("#sales_order_number_"+id).val();
	
	
	$("#purchse_order_sales_id").val(sales_order_id);
	$("#purchse_ord_sales_num").val(sales_order_number);
	
	$(".sales_order_popup"+id).addClass("close");
	
	$.ajax({
		type: 'POST',
		url: '<?php echo site_url('purchaseorder/getsalesorderitems'); ?>',
		data: {'salesid': salesorderid},
		success: function(resp){	
			var myData = JSON.parse(resp);
		
			var view_order = myData.view_order;
			var totalrows = myData.countofrows;
			var so_total_gross_amount = myData.so_total_gross_amount;
			var so_total_tax_amount = myData.so_total_tax_amount;
			var so_total_tax_percentage = myData.so_total_tax_percentage;
			var so_total_discount_percentage = myData.so_total_discount_percentage;
			var so_total_discount_amount = myData.so_total_discount_amount;
			var so_total_shipping_charges = myData.so_total_shipping_charges;
			var so_total_shipping_tax = myData.so_total_shipping_tax;
			var so_adjustment = myData.so_adjustment;
			var so_grand_total = myData.so_grand_total;

			$('#disp_items').append(myData.view_order);
			$('#last_table_id').val(totalrows);
			$('#total_quantity_items').val(myData.table_count);
			
			$('#total_gross_amount').val(myData.so_total_gross_amount);
			$('#total_gross_amount_items').val(myData.so_total_gross_amount);
			
			$('#total_tax_amount').val(myData.so_total_tax_amount);
			$('#total_tax_amount_items').val(myData.so_total_tax_amount);
			
			$('#total_tax_percent_items').val(myData.so_total_tax_percentage);
			
			$('#total_discount_percent_items').val(myData.so_total_discount_percentage);
			//$('#total_disocunts_percentage').val(myData.so_total_discount_percentage);
			
			$('#total_disocunts_amount').val(myData.so_total_discount_amount);
			$('#total_discount_amount_items').val(myData.so_total_discount_amount);
			
			$('#total_net_amount_items').val(myData.so_grand_total);
			$('#grand_total').val(myData.so_grand_total);
			
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
  <p>Search Sales Order</p>
  </div>
      <table>
      	<tr>
        	<td>
            	Sales Order No :
                <br /><br />
                <input type="text" 	value="" name="search_so_no" class="input-large" id="search_so_no" onkeyup="salesordersearch()">
            </td>
            <td>
            	Customer Name :
            <br /><br />
            	<input type="text" 	value="" name="search_cus_name" class="input-large" id="search_cus_name" onkeyup="salesordersearch()">
            </td>
            <!--<td>
            	<br /><br />
            	<a href="#" id="salesordersearch" class="btn-success">Search</a>
            </td>-->
        </tr>
      </table>
      </div>
	<div class="title_head">
		<p>Sales Order</p>
	</div>
		<div class="table_head1" id="table">
			<div class="popup_col w10 last">
				<div class="content">
					<table>
						<thead>
							<tr>
								<th>SalesOrder No</th>
                                <th>Customer Name</th>
								<th>Requested Date</th>
								<th>Status</th>
							</tr>
                            </thead>
                            <tbody id="multiple_sales_order">
								<?php
									if(!empty($salesorder)) {
										$i = 1;
										foreach($salesorder as $Sales) { ?>
	
											<tr>
												<td>
                                                	<a href="javascript:void(0);" class="popup_selection_class sales_order_popup<?php echo $i;?>" onClick="get_sales_order_details('<?php echo $i;?>','<?php echo $Sales['sales_order_id'];?>');">
														<?php echo $Sales['sales_order_number'];?>
                                                    </a>
                                                    <input type="hidden" id="sales_order_id_<?php echo $i;?>" value="<?php echo $Sales['sales_order_id'];?>">
                                					<input type="hidden" id="sales_order_number_<?php echo $i;?>" value="<?php echo $Sales['sales_order_number'];?>">
												</td>
                                                <td>
													<?php echo $Sales['sales_order_customer_name'];?>
												</td>
												<td><?php if(($Sales['sales_order_requested_date'])!= "0000-00-00"){ echo date('d-m-Y',strtotime($Sales['sales_order_requested_date']));}else{ echo '-';}?></td>
												<td><?php echo $Sales['sales_order_status'];?></td>
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