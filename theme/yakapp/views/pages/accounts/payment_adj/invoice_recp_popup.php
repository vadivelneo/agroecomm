<script type="text/javascript"> 
$(document).ready(function () {
$('#inv_recp_seordersearch').click(function(){
			
           var search_po_no = $("#search_po_no").val();
		   var search_vendor_name = $("#search_vendor_name").val();
		   
		   $.ajax({
			type: 'POST',
			url: '<?php echo site_url('purchaseinvoice/searchpurchaseorder'); ?>',
			data: {po_code: search_po_no, vendor_name: search_vendor_name},
			success: function(resp)
			{ 
				$('#multiple_items').html(resp);
			}
		 });
	 
    });
});

function get_inv_recp_details(id)
{
	$('#disp_items').html("");
	$("#last_table_id").val("0");
	$('.formError').css("display","none");
	var inv_recp_id = $("#inv_recp_id_"+id).val();
	var inv_recp_no = $("#inv_recp_no_"+id).val();
    var inv_recp_cus_name = $("#inv_recp_cus_name_"+id).val();
    var inv_recp_cus_id = $("#inv_recp_cus_id_"+id).val();
    var inv_recp_amt = $("#inv_recp_amt_"+id).val();
	
    
	$("#receipt_id").val(inv_recp_id);
	$("#recp_no").val(inv_recp_no);
	$("#recp_party_name").val(inv_recp_cus_name);
	$("#recp_party_id").val(inv_recp_cus_id);
	$("#amount").val(inv_recp_amt);
	
	$(".purchase_order_popup"+id).addClass("close");
  
	$.ajax({
 		type: 'POST',
 		url: '<?php echo site_url('accounts/getinvoice_recp_customer'); ?>',
 		data: {invrecp_id: inv_recp_id, cus_id: inv_recp_cus_id },
 		success: function(resp)  {
      	var myData = JSON.parse(resp);
		var view_order = myData.view_order;
		$('#disp_items').append(myData.view_order);
		var total = myData.sum;
		$('#total_gross_amount').val(total);
		
		var receipt_amount = myData.receipt_amount;
		$('#receiptAmount').val(receipt_amount);
		
		var totalrows = myData.table_count;
		$('#last_table_id').val(totalrows);
		
 		}
	 });
	return false;
	
}
</script>
<div class="p-popup">
  <a class="close"><img src="<?php echo base_url(); ?>/resources/images/close-button.png" width="25" /></a>
  <div>
  <div class="title_head">
  <p>Search Invoice Receipt</p>
  </div>
      <table>
      	<tr>
        	<td>
            	Invoice Receipt No :
                <br /><br />
                <input type="text" 	value="" name="search_po_no" class="input-large" id="search_po_no">
            </td>
            <td>
            	Customer Name :
            <br /><br />
            	<input type="text" 	value="" name="search_vendor_name" class="input-large" id="search_vendor_name">
            </td>
            <td>
            	<br /><br />
            	<a href="#" id="inv_recp_seordersearch" class="btn-success">Search</a>
            </td>
        </tr>
      </table>
      </div>
  <div class="title_head">
  <p>Purchase Order</p>
  </div>
  	<div class="table_head1" id="table">
      <div class="popup_col w10 last">
        <div class="content">
          <table>
            <thead>
              <tr>
                <th>Invoice Receipt No </th>
                <th>Customer Name</th>
                <th>Receipt Amount</th>
                <th>Balance Amount</th>
                <th>Status</th>
              </tr>
              </thead>
              <tbody id="multiple_items">
              <?php
				if(!empty($invoice_receipt))
				{
					$i = 1;
		 			foreach($invoice_receipt as $INVR)
					{
						?>
              			<tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1">
			                <td>
                                <a href="javascript:void(0);" class="popup_selection_class purchase_order_popup<?php echo $i;?>" onClick="get_inv_recp_details('<?php echo $i;?>','<?php echo $INVR['invoice_receipt_id'];?>');">
                                    <?php echo $INVR['invoice_receipt_number'];?>
                                </a>
                                <input type="hidden" id="inv_recp_id_<?php echo $i;?>" value="<?php echo $INVR['invoice_receipt_id'];?>">
                                <input type="hidden" id="inv_recp_no_<?php echo $i;?>" value="<?php echo $INVR['invoice_receipt_number'];?>">
                            
                            </td>
                            <td>
                               <input type="hidden" id="inv_recp_cus_name_<?php echo $i;?>" value="<?php echo $INVR['customer_name'];?>"><?php echo $INVR['customer_name'];?>
                               <input type="hidden" id="inv_recp_cus_id_<?php echo $i;?>" value="<?php echo $INVR['invoice_receipt_customer_id'];?>">
                            </td>
			                <td>
							  <input type="hidden" id="inv_recp_amt_<?php echo $i;?>" value="<?php echo $INVR['invoice_receipt_amount'];?>"><?php echo $INVR['invoice_receipt_amount'];?>
                            </td> 
							<td>
							  <input type="hidden" id="inv_recp_bal_amt_<?php echo $i;?>" value="<?php echo $INVR['invoice_receipt_balance_amount'];?>"><?php echo $INVR['invoice_receipt_balance_amount'];?>
                            </td>
			                <td><?php echo $INVR['invoice_receipt_status'];?></td>
              			</tr>
		             <?php 
					 $i++;
					 }
				}
				else
				{
					?>
              	<tr>
                	<td colspan="6" style="text-align:center;"> No Records Found </td>
              	</tr>
              	<?php 
				} 
				?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="clear"></div>
    </div>
</div>