<script type="text/javascript"> 
function search_multiple_product()
{
			
           var search_sq_no = $("#search_sq_no").val();
		   var search_customer_name = $("#search_customer_name").val();
		   
		   $.ajax({
		   	type: 'POST',
			url: '<?php echo site_url('salesorder/searchsalesquatation'); ?>',
			data: {sq_code: search_sq_no, customer_name: search_customer_name},
			success: function(resp)
			{ 
				$('#multiple_sq_popup').html(resp);
			}
		 });
}
</script>
<script type="text/javascript"> 
function get_sales_quote_details(id, sales_quote_id)
{
  $('#disp_items').html("");
 
	$(".formError").css("display", "none");
	
	var quote_id = $("#sales_quote_id_"+id).val();
  	var so_quote_no = $("#sales_quote_code_"+id).val();
	
	var so_customer_id = $("#customer_id_"+id).val();
 	var so_customer_code = $("#customer_code_"+id).val();
	var so_customer_name = $("#customer_name_"+id).val();
	var customer_discount = $("#customer_discounts_"+id).val();
	var customer_discounts_percentage = $("#customer_discounts_percentage_"+id).val();
	var customer_tax_type = $("#customer_discounts_tax_"+id).val();
	var customer_region = $("#customer_region_"+id).val();
	var customer_zone = $("#customer_zone_"+id).val();
	var customer_area = $("#customer_area_"+id).val();
	var cus_bill_address = $("#customer_bill_address_"+id).val();
	var billing_country = $("#customer_bill_country_"+id).val();
	var billing_state = $("#customer_bill_state_"+id).val();
	var billing_city = $("#customer_bill_city_"+id).val();
	var bill_zip_code = $("#customer_bill_zip_"+id).val();
	var shipping_country = $("#customer_ship_country_"+id).val();
	var shipping_state = $("#customer_ship_state_"+id).val();
	var shipping_city = $("#customer_ship_city_"+id).val();
	var cus_ship_address = $("#customer_ship_address_"+id).val();
	var ship_zip_code = $("#customer_ship_zip_"+id).val();
	var customer_pricebook_id = $("#customer_pricebook_id_"+id).val();
  
  $("#so_quote_id").val(sales_quote_id);
  $("#so_quote_no").val(so_quote_no);
  	
	$("#so_customer_id").val(so_customer_id);
	$("#so_customer_code").val(so_customer_code);
	$("#so_customer_name").val(so_customer_name);
	$("#customer_discount").val(customer_discounts_percentage);
	$("#customer_tax_type").val(customer_tax_type);
	$("#customer_cash_discount").val(customer_discount);
	
	$("#customer_region").val(customer_region);
	$("#customer_zone").val(customer_zone);
	$("#customer_area").val(customer_area);
	$("#cus_bill_address").val(cus_bill_address);
	$("#billing_country").val(billing_country);
	$("#billing_state").val(billing_state);
	$("#billing_city").val(billing_city);
	$("#bill_zip_code").val(bill_zip_code);
	$("#shipping_country").val(shipping_country);
	$("#shipping_state").val(shipping_state);
	$("#shipping_city").val(shipping_city);
	$("#cus_ship_address").val(cus_ship_address);
	$("#ship_zip_code").val(ship_zip_code);

	$("#pricebook_id").val(customer_pricebook_id);
  
	$(".customer_popup"+id).addClass("close");
	var cont_id = $('#billing_country').val();
    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('organizations/get_state'); ?>',
      data: 'country='+cont_id,
      success: function(resp) {
          $('select#billing_state').html(resp);
        var st = $('select#billing_state').val();
        $.ajax({
        type: 'POST',
        url: '<?php echo site_url('organizations/get_city'); ?>',
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
    url: '<?php echo site_url('organizations/get_state'); ?>',
    data: 'country='+cont_ship_id,
    success: function(resp) {
      $('select#shipping_state').html(resp);
      var st_ship_id = $('select#shipping_state').val();
      $.ajax({
        type: 'POST',
        url: '<?php echo site_url('organizations/get_city'); ?>',
        data: {country: cont_ship_id, state: st_ship_id},
        success: function(resp) {
          $('select#shipping_city').html(resp);
        }
      });
    }
  });
   
   //FOR Sales Quote
	$(".sales_quote_popup"+id).addClass("close");
	$.ajax({
 		type: 'POST',
 		url: '<?php echo site_url('salesorder/getsales_quote'); ?>',
 		data: {'salesQuoteId': sales_quote_id},
 		success: function(resp) {
    
    var myData = JSON.parse(resp);
	
    var view_order = myData.view_order;
    var totalrows = myData.countofrows;
    $('#disp_items').append(myData.view_order);
    $('#last_table_id').val(totalrows);
 		
    var total = myData.sum;
	
    $('#total_gross_amount').val(total);
    var toatl_count=myData.table_count;
	
    var total_shipping_charges = myData.total_shipping_charges;
    var total_shipping_tax = myData.total_shipping_tax;


    $('#total_shipping_charges').val(myData.total_shipping_charges);
    $('#total_shipping_tax').val(myData.total_shipping_tax);
	
	calculatetotal();

 		}
	});
	return false;

    
	
	
}
</script>

<div class="p-popup">
  <a class="close"><img src="<?php echo base_url(); ?>/resources/images/close-button.png" width="25" /></a>
    <div>
  <div class="title_head">
  <p>Search Sales Quotation</p>
  </div>
      <table>
      	<tr>
        	<td>
            	Sales Quotation No :
                <br /><br />
                <input type="text" 	value="" name="search_sq_no" class="input-large" id="search_sq_no" onkeyup="search_multiple_product()">
            </td>
            <td>
            	Customer Name :
            <br /><br />
            	<input type="text" 	value="" name="search_customer_name" class="input-large" id="search_customer_name" onkeyup="search_multiple_product()">
            </td>
            <!--<td>
            	<br /><br />
            	<a href="#" id="salesquatationsearch" class="btn-success">Search</a>
            </td>-->
        </tr>
      </table>
      </div>
	  <br />
  <div class="title_head">
  <p>Sales Quotation Details</p>
  </div>
  	<div class="table_head1" id="table">
      <div class="popup_col w10 last">
        <div class="content">
          <table>
            <thead>
              <tr>
                <th>Sales Quote No</th>
                <th>Customer Name</th>
                <th>Requested Date</th>
                <th>Status</th>
              </tr>
              </thead>
              <tbody id="multiple_sq_popup">
              <?php
				if(!empty($sales_quote_data))
				{
					$i = 1;
		 			foreach($sales_quote_data as $SQ_DATA)
					{
						?>
              			<tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1">
			                <td>
                                <a href="javascript:void(0);" class="popup_selection_class sales_quote_popup<?php echo $i;?>" onClick="get_sales_quote_details('<?php echo $i;?>','<?php echo $SQ_DATA['sales_quote_id'];?>');">
                                    <?php echo $SQ_DATA['sales_quote_qoute_no'];?>
                                </a>
                                <input type="hidden" id="sales_quote_code_<?php echo $i;?>" value="<?php echo $SQ_DATA['sales_quote_qoute_no'];?>">
								<input type="hidden" id="sales_quote_id_<?php echo $i;?>" value="<?php echo $SQ_DATA['sales_quote_id'];?>">
                                <input type="hidden" id="customer_code_<?php echo $i;?>" value="<?php echo $SQ_DATA['customer_code'];?>">
                                <input type="hidden" id="customer_id_<?php echo $i;?>" value="<?php echo $SQ_DATA['customer_id'];?>">
								<input type="hidden" id="customer_pricebook_id_<?php echo $i;?>" value="<?php echo $SQ_DATA['sales_quote_customer_price_book_id'];?>">
                            </td>
                            <td>
                                
                                    <?php echo $SQ_DATA['customer_name'];?>
                                
                               <input type="hidden" id="customer_name_<?php echo $i;?>" value="<?php echo $SQ_DATA['customer_name'];?>">
                            </td>
			                       <td>
                               
                               <?php if(($SQ_DATA['sales_quote_req_date'])!= "0000-00-00"){echo date('d-m-Y',strtotime($SQ_DATA['sales_quote_req_date']));}?>
                            </td>
			                       <td>
                                <?php echo $SQ_DATA['sales_quote_cur_status'];?>
                            </td>
                           
                            <td>
                             
								<input type="hidden" id="customer_discounts_<?php echo $i;?>" value="<?php echo $SQ_DATA['sales_quote_customer_cash_discount'];?>">
                                <input type="hidden" id="customer_discounts_percentage_<?php echo $i;?>" value="<?php echo $SQ_DATA['sales_quote_customer_discount_percentage'];?>">
                                <input type="hidden" id="customer_discounts_tax_<?php echo $i;?>" value="<?php echo $SQ_DATA['customer_discounts_tax'];?>">
                                <input type="hidden" id="customer_region_<?php echo $i;?>" value="<?php echo $SQ_DATA['customer_region'];?>">
                                <input type="hidden" id="customer_zone_<?php echo $i;?>" value="<?php echo $SQ_DATA['customer_zone'];?>">
                                <input type="hidden" id="customer_area_<?php echo $i;?>" value="<?php echo $SQ_DATA['customer_area'];?>">
                                <input type="hidden" id="customer_bill_address_<?php echo $i;?>" value="<?php echo $SQ_DATA['customer_billing_address'];?>">
                                <input type="hidden" id="customer_bill_country_<?php echo $i;?>" value="<?php echo $SQ_DATA['customer_billing_country_id'];?>">
                                <input type="hidden" id="customer_bill_state_<?php echo $i;?>" value="<?php echo $SQ_DATA['customer_billing_state_id'];?>">
                                <input type="hidden" id="customer_bill_city_<?php echo $i;?>" value="<?php echo $SQ_DATA['customer_billing_city_id'];?>">
                                <input type="hidden" id="customer_bill_zip_<?php echo $i;?>" value="<?php echo $SQ_DATA['customer_billing_zipcode'];?>">
                                <input type="hidden" id="customer_ship_country_<?php echo $i;?>" value="<?php echo $SQ_DATA['customer_shipping_country_id'];?>">
                                <input type="hidden" id="customer_ship_state_<?php echo $i;?>" value="<?php echo $SQ_DATA['customer_shipping_state_id'];?>">
                                <input type="hidden" id="customer_ship_city_<?php echo $i;?>" value="<?php echo $SQ_DATA['customer_shipping_city_id'];?>">
                                <input type="hidden" id="customer_ship_address_<?php echo $i;?>" value="<?php echo $SQ_DATA['customer_shipping_address'];?>">
                                <input type="hidden" id="customer_ship_zip_<?php echo $i;?>" value="<?php echo $SQ_DATA['customer_shipping_zipcode'];?>">
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