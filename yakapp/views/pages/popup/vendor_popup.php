<script type="text/javascript"> 
function get_vendor_details(id)
{
	$('.formError').css('display', 'none');
	var vendor_code = $("#vendor_code_"+id).val();
	var vendor_id = $("#vendor_id_"+id).val();
	var vendor_name = $("#vendor_name_"+id).val();

	$("#vdrquo_vendor_code").val(vendor_code);
	$("#vdrquo_vendor_id").val(vendor_id);
	$("#vdrquo_vendor_name").val(vendor_name);
	
	$(".vendor_popup"+id).addClass("close");
	
}
</script>
<script type="text/javascript"> 

	
		function vendorsearch()
			
		{
			
           var search_vendor_code = $("#srch_vendor_code").val();
		   var search_vendor_name = $("#srch_vendor_name").val();
		   var search_vendor_mobile = $("#srch_vendor_mobile").val();
		   var search_vendor_email = $("#srch_vendor_email").val();
		   
		   //alert(search_vendor_name);
		   
		   $.ajax({
			type: 'POST',
			url: '<?php echo site_url('purchasepopup/searchvendardetails'); ?>',
			data: {vendor_code: search_vendor_code, vendor_name: search_vendor_name, ven_mobile: search_vendor_mobile, ven_email: search_vendor_email},
			success: function(resp)
			{ 
			//alert(resp); return false;
				$('#multiple_vendors').html(resp);
			}
		 });
	 
		}
</script>
<div class="p-popup">
  <a class="close"><img src="<?php echo base_url(); ?>/resources/images/close-button.png" width="25" /></a>
  <div>
  <div class="title_head">
  <p>Search Vendors</p>
  </div>
      <table>
      	<tr>
        	
            <td>
            	Vendor Name :
            <br /><br />
            	<input type="text" 	value="" name="search_vendor_name" class="input-large" id="srch_vendor_name" onkeyup="vendorsearch()">
				 <input type="hidden" 	value="" name="search_vendor_code" class="input-large" id="srch_vendor_code" onkeyup="vendorsearch()">
            </td>
            <td>
            	Mobile No:
            <br /><br />
            	<input type="text" 	value="" name="search_vendor_mobile" class="input-large" id="srch_vendor_mobile" onkeyup="vendorsearch()">
            </td>
            <td>
            	E-Mail:
            <br /><br />
            	<input type="text" 	value="" name="search_vendor_email" class="input-large" id="srch_vendor_email" onkeyup="vendorsearch()">
            </td>
            <!--<td>
            	<br /><br />
            	<a  id="vendorsearch" class="btn-success" href="#">Search</a>
            </td>-->
        </tr>
      </table>
      </div>
  <div class="title_head">
  <p>Vendors</p>
  </div>
  	<div class="table_head1" id="table">
      <div class="popup_col w10 last">
        <div class="content">
          <table>
            <thead>
              <tr>
                <th>Vendor Code</th>
                <th>Vendor Name</th>
                <th>Mobile</th>
                <th>Email</th>
               
              </tr>
              </thead>
              <tbody id="multiple_vendors">
              <?php
				if(!empty($vendors))
				{
					$i = 1;
		 			foreach($vendors as $Ven)
					{
						?>
                        
              			<tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1">
			                <td>
                                <a href="javascript:void(0);" class="popup_selection_class vendor_popup<?php echo $i;?>" onClick="get_vendor_details(<?php echo $i;?>);">
                                    <?php echo $Ven['vendor_code'];?>
                                </a>
                                <input type="hidden" id="vendor_code_<?php echo $i;?>" value="<?php echo $Ven['vendor_code'];?>">
                                <input type="hidden" id="vendor_id_<?php echo $i;?>" value="<?php echo $Ven['vendor_id'];?>">
                            </td>
			                <td>
                                <a href="javascript:void(0);" class="popup_selection_class vendor_popup<?php echo $i;?>" onClick="get_vendor_details(<?php echo $i;?>);">
                                    <?php echo $Ven['vendor_name'];?>
                                    <input type="hidden" id="vendor_name_<?php echo $i;?>" value="<?php echo $Ven['vendor_name'];?>">
                                </a>
                            </td>
			                <td><?php echo $Ven['vendor_mobile'];?></td>
			                <td><?php echo $Ven['vendor_email'];?></td>
			                
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