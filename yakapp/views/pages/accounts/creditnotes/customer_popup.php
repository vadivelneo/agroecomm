<script type="text/javascript"> 
/*$(document).ready(function () {
$('#serachcustomer').click(function(){
			alert(hi);
           var search_cus_code = $("#search_cus_code").val();
		   var search_cus_name = $("#search_cus_name").val();
		   var search_cus_mobile = $("#search_cus_mobile").val();
		   var search_cus_email = $("#search_cus_email").val();
		   alert(search_cus_code);return false;
		   $.ajax({
			type: 'POST',
			url: '<?php echo site_url('salesquotation/searchcustomerdetails'); ?>',
			data: {cus_code: search_cus_code, cus_name: search_cus_name, cus_mobile: search_cus_mobile, cus_email: search_cus_email},
			success: function(resp)
			{ 
			alert(resp);
				$('#multiple_customers').html(resp);
			
			}
		 });
	 
    });
});*/

function get_customer_details(id)
{
	$(".formError").css("display", "none");
	
	var so_customer_id = $("#customer_id_"+id).val();
 	var so_customer_code = $("#customer_code_"+id).val();
 	var so_customer_name = $("#customer_name_"+id).val();
 	var customer_pricebook_id = $("#customer_pricebook_id_"+id).val();
	var customer_discount = $("#customer_discounts_"+id).val();
	$("#user_id").val(so_customer_id);
	$("#so_customer_code").val(so_customer_code);
	$("#name").val(so_customer_name);
 	$("#pricebook_id").val(customer_pricebook_id);
	$("#total_disocunts_percentage").val(customer_discount);
  	$(".customer_popup"+id).addClass("close");
	
}

$(document).ready(function () {
$('#serachcustomer').click(function(){
			//alert('hi'); return false;
           var search_cus_code = $("#search_cus_code").val();
		   var search_cus_name = $("#search_cus_name").val();
		   var search_cus_mobile = $("#search_cus_mobile").val();
		   var search_cus_email = $("#search_cus_email").val();
		   
		   $.ajax({
			type: 'POST',
			url: '<?php echo site_url('accounts/searchcustomer'); ?>',
			data: {cus_code: search_cus_code, cus_name: search_cus_name, cus_mobile: search_cus_mobile, cus_email: search_cus_email},
			success: function(resp)
			{ 
			
				$('#multiple_customers').html(resp);
			}
		 });
	 
    });
});

</script>
<div class="p-popup">
  <a class="close"><img src="<?php echo base_url(); ?>/resources/images/close-button.png" width="25" /></a>
  <div>
  <div class="title_head">
  <p>Search Customer</p>
  </div>
      <table>
      	<tr>
        	<td>
            	 Customer Code :
                <br /><br />
                <input type="text" name="search_cus_code" class="input-large" id="search_cus_code">
            </td>
            <td>
            	Customer Name :
            <br /><br />
            	<input type="text" 	value="" name="search_cus_name" class="input-large" id="search_cus_name">
            </td>
            <td>
            	Mobile No:
            <br /><br />
            	<input type="text" 	value="" name="search_cus_mobile" class="input-large" id="search_cus_mobile">
            </td>
            <td>
            	E-Mail:
            <br /><br />
            	<input type="text" 	value="" name="search_cus_email" class="input-large" id="search_cus_email">
            </td>
            <td>
            	<br /><br />
				<a href="#" id="serachcustomer" class="btn-success">Search</a>
            </td>
        </tr>
      </table>
      </div>
  <div class="title_head">
  <p>Customer Details</p>
  </div>
  	<div class="table_head1" id="table">
      <div class="popup_col w10 last">
        <div class="content">
          <table>
             <tbody id="multiple_customers">
              <tr>
                <th>Customer Code</th>
                <th>Customer Name</th>
                <th>Category</th>
                <th>Email</th>
                <th>Mobile</th>
               
              </tr>
              <?php
				if(!empty($customer_data))
				{
					$i = 1;
		 			foreach($customer_data as $CUS_DATA)
					{
						?>
              			<tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1">
			                <td>
                                <a href="javascript:void(0);" class="popup_selection_class customer_popup<?php echo $i;?>" onClick="get_customer_details('<?php echo $i;?>','<?php echo $CUS_DATA['customer_code'];?>');">
                                    <?php echo $CUS_DATA['customer_code'];?>
                                </a>
                                <input type="hidden" id="customer_code_<?php echo $i;?>" value="<?php echo $CUS_DATA['customer_code'];?>">
                                <input type="hidden" id="customer_id_<?php echo $i;?>" value="<?php echo $CUS_DATA['customer_id'];?>">
								<input type="hidden" id="customer_pricebook_id_<?php echo $i;?>" value="<?php echo $CUS_DATA['customer_price_list'];?>">
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="popup_selection_class customer_popup<?php echo $i;?>" onClick="get_customer_details('<?php echo $i;?>','<?php echo $CUS_DATA['customer_name'];?>');">
                                    <?php echo $CUS_DATA['customer_name'];?>
                                </a>
                               <input type="hidden" id="customer_name_<?php echo $i;?>" value="<?php echo $CUS_DATA['customer_name'];?>">
                               <input type="hidden" id="customer_discounts_<?php echo $i;?>" value="<?php echo $CUS_DATA['customer_discounts'];?>">
                            </td>
			                       <td>
                               <?php echo $CUS_DATA['customer_category'];?>
                            </td>
			                       <td>
                                <?php echo $CUS_DATA['customer_email'];?>
                            </td>
                            <td>
                                <?php echo $CUS_DATA['customer_mobile'];?>
                            </td>
                             
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