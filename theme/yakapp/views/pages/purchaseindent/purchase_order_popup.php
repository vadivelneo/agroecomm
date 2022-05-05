<script type="text/javascript"> 
function purchaseordersearch()
{
			
     var search_po_no = $("#search_po_no").val();
	 var search_vendor_name = $("#search_vendor_name").val();
	 $.ajax({
		type: 'POST',
		url: '<?php echo site_url('purchaseindent/searchpurchaseorder'); ?>',
		data: {po_code: search_po_no, vendor_name: search_vendor_name},
		success: function(resp)
		{ 
			$('#multiple_items').html(resp);
		}
	});
}

</script>
<script type="text/javascript"> 
function get_purchase_order_details(id, pur_ordid)
{
	$('#disp_items').html("");
	
	var purchase_order_no = $("#purchase_order_no_"+id).val();
	var purchase_order_id = $("#purchase_order_id_"+id).val();
	var vdrquo_vendor_name = $("#vdrquo_vendor_name_"+id).val();
	var vdrquo_vendor_id = $("#vdrquo_vendor_id_"+id).val();
	var po_store_id = $("#po_store_id_"+id).val();
	var po_store_division_id = $("#po_store_division_id_"+id).val();
	var product_type_id = $("#product_type_id_"+id).val();
	
	$("#purchse_ind_quonum").val(purchase_order_no);
	$("#poindent_po_oder_id").val(purchase_order_id);
	$("#vdrquo_vendor_name").val(vdrquo_vendor_name);
	$("#vdrquo_vendor_id").val(vdrquo_vendor_id);
	$("#purchase_indent_store_id").val(po_store_id);
	$("#purchase_indent_division_id").val(po_store_division_id);
	$("#purchase_indent_product_type_id").val(product_type_id);
	//alert(product_type_id);
	

	$.ajax({
 		type: 'POST',
 		url: '<?php echo site_url('purchaseindent/prefix_code'); ?>',
 		data: {'po_store_id': po_store_id},
 		success: function(resp) {
			//alert(resp);
				var myData = JSON.parse(resp);
				var prefix_code = myData.picode;
				//$("#purchse_ind_indentnum").val(prefix_code);
			
			}
	 });
	 
	 	$.ajax({
		
 		type: 'POST', 
 		url: '<?php echo site_url('purchaseindent/getpurchaseindent_code'); ?>',
 		data: {po_store_division_id: po_store_division_id, product_type_id: product_type_id},
		
 		success: function(resp) {
			//alert(resp);
			$('#purchse_ind_indentnum').val(resp);
		}
 		
		
	 });

  //vdrquo_vendor_name
	$(".purchase_order_popup"+id).addClass("close");
	$.ajax({
 		type: 'POST',
 		url: '<?php echo site_url('purchaseindent/getpurchase_order'); ?>',
 		data: {'purchaseOrderId': pur_ordid},
 		success: function(resp) {
      //alert(resp);return false;
 		$('#disp_items').append(resp);
 		}
	 });
	return false;
	
}
</script>



<?php //echo "<pre>"; print_r($purchase_order); exit; ?>
<div class="p-popup">
  <a class="close"><img src="<?php echo base_url(); ?>/resources/images/close-button.png" width="25" /></a>
  <div>
  <div class="title_head">
  <p>Search Purchase Order</p>
  </div>
      <table>
      	<tr>
        	<td>
            	Purchase Order No :
                <br /><br />
                <input type="text" 	value="" name="search_po_no" class="input-large" id="search_po_no" onkeyup="purchaseordersearch()">
            </td>
            <td>
            	Vendor Name :
            <br /><br />
            	<input type="text" 	value="" name="search_vendor_name" class="input-large" id="search_vendor_name" onkeyup="purchaseordersearch()">
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
                <th>Purchase Order No</th>
                <th>Vendor Name</th>
                <th>Requested Date</th>
                <th>Status</th>
              </tr>
              </thead>
              <tbody id="multiple_items">
              <?php
				if(!empty($purchase_order))
				{	//echo "<PRE>";print_r($purchase_order);
					$i = 1;
		 			foreach($purchase_order as $POORD)
					{
						if($POORD['po_status'] != 'inactive')
						{
						?>
              			<tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1">
			                <td>
                                <a href="javascript:void(0);" class="popup_selection_class purchase_order_popup<?php echo $i;?>" onClick="get_purchase_order_details('<?php echo $i;?>','<?php echo $POORD['po_po_id'];?>');">
                                    <?php echo $POORD['po_po_no'];?>
                                </a>
                                <input type="hidden" id="purchase_order_no_<?php echo $i;?>" value="<?php echo $POORD['po_po_no'];?>">
                                <input type="hidden" id="purchase_order_id_<?php echo $i;?>" value="<?php echo $POORD['po_po_id'];?>">

                            </td>
                            <td>
                               <input type="hidden" id="vdrquo_vendor_name_<?php echo $i;?>" value="<?php echo $POORD['vendor_name'];?>"><?php echo $POORD['vendor_name'];?>
							   <input type="hidden" id="vdrquo_vendor_id_<?php echo $i;?>" value="<?php echo $POORD['vendor_id'];?>">
                                <input type="hidden" id="po_store_id_<?php echo $i;?>" value="<?php echo $POORD['po_store_id'];?>">
                               <input type="hidden" id="po_store_division_id_<?php echo $i;?>" value="<?php echo $POORD['po_store_division_id'];?>">
                               
                               
                            </td>
			                <td>
                               <?php echo $POORD['po_req_date'];?>
                            </td>
			                <td><?php echo $POORD['po_po_status'];?></td>
              			</tr>
		             <?php 
					 $i++;
					 }
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