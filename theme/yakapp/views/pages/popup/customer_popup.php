<script type="text/javascript"> 

function get_customer_details(id)
{
	
	$(".formError").css("display", "none");
	
	var so_customer_id = $("#customer_id_"+id).val();
	var customer_salesman_id = $("#customer_salesman_"+id).val();
 	var so_customer_code = $("#customer_code_"+id).val();
 	var so_customer_name = $("#customer_name_"+id).val();
 	var customer_pricebook_id = $("#customer_pricebook_id_"+id).val();
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
	
	$("#so_customer_id").val(so_customer_id);
	$("#so_customer_code").val(so_customer_code);
	$("#so_customer_name").val(so_customer_name);
 	$("#pricebook_id").val(customer_pricebook_id);
	$("#customer_discount").val(customer_discounts_percentage);
	$("#customer_tax_type").val(customer_tax_type);
	$("#customer_cash_discount").val(customer_discount);
	
	
	
	$.ajax({
      type: 'POST',
      url: '<?php echo site_url('salesorder/get_customer_incentive_amount'); ?>',
      data: 'so_customer_id='+so_customer_id,
      success: function(resp) {
		  //alert(resp);
		  $("#cus_inc_amt").val(resp);
        
      }
   });
   
	
	
	
	
  	$(".customer_popup"+id).addClass("close");
	
}

</script>

<script type="text/javascript">

function search_multiple_product()
{
	
           var search_cus_code = $("#search_cus_code").val();
		   var search_cus_name = $("#search_cus_name").val();
		   var search_cus_mobile = $("#search_cus_mobile").val();
		   var search_cus_email = $("#search_cus_email").val();
		   
		   $.ajax({
			type: 'POST',
			url: '<?php echo site_url('salespopup/searchcustomerdetails'); ?>',
			data: {cus_code: search_cus_code, cus_name: search_cus_name, cus_mobile: search_cus_mobile, cus_email: search_cus_email},
			success: function(resp)
			{ 
			
				$('#multiple_customers').html(resp);
			}
		 });
	 
   
 }

</script>


<?php 
		$sessionData = $this->session->userdata('userlogin');
		$company_id=$sessionData['company_id'];
		
		?>
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
                <input type="text" name="search_cus_code" class="input-large" id="search_cus_code" onkeyup="search_multiple_product()">
            </td>
            <td>
            	Customer Name :
            <br /><br />
            	<input type="text" 	value="" name="search_cus_name" class="input-large" id="search_cus_name" onkeyup="search_multiple_product()">
            </td>
            <td>
            	Mobile No:
            <br /><br />
            	<input type="text" 	value="" name="search_cus_mobile" class="input-large" id="search_cus_mobile" onkeyup="search_multiple_product()">
            </td>
            <td>
            	E-Mail:
            <br /><br />
            	<input type="text" 	value="" name="search_cus_email" class="input-large" id="search_cus_email" onkeyup="search_multiple_product()">
            </td>
            <!--<td>
            	<br /><br />
				<a href="#" id="serachcustomer" class="btn-success">Search</a>
            </td>-->
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
                                <a href="javascript:void(0);" class="popup_selection_class customer_popup<?php echo $i;?>" onClick="get_customer_details('<?php echo $i;?>','<?php echo $CUS_DATA['OFCR_USR_VALUE'];?>');">
                                    <?php echo $CUS_DATA['OFCR_USR_VALUE'];?>
                                </a>
                                <input type="hidden" id="customer_code_<?php echo $i;?>" value="<?php echo $CUS_DATA['OFCR_USR_VALUE'];?>">
                                <input type="hidden" id="customer_id_<?php echo $i;?>" value="<?php echo $CUS_DATA['OFCR_ID'];?>">
                                                       </td>
                            <td>
                                <a href="javascript:void(0);" class="popup_selection_class customer_popup<?php echo $i;?>" onClick="get_customer_details('<?php echo $i;?>','<?php echo $CUS_DATA['OFCR_FST_NME'];?>');">
                                    <?php echo $CUS_DATA['OFCR_FST_NME'].' '.$CUS_DATA['OFCR_LST_NME'];?>
                                </a>
                               <input type="hidden" id="customer_name_<?php echo $i;?>" value="<?php echo $CUS_DATA['OFCR_FST_NME'].' '.$CUS_DATA['OFCR_LST_NME'];?>">
                                <input type="hidden" id="customer_discounts_tax_<?php echo $i;?>" value="<?php echo $CUS_DATA['customer_discounts_tax'];?>">
								 <input type="hidden" id="customer_pricebook_id_<?php echo $i;?>" value="<?php echo $CUS_DATA['customer_price_list'];?>">
                            </td>
			                      
			                       <td>
                                <?php echo $CUS_DATA['OFCR_USR_EMAIL'];?>
                            </td>
                            <td>
                                <?php echo $CUS_DATA['OFCR_MOB'];?>
								
                               
                             
                               
                            
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