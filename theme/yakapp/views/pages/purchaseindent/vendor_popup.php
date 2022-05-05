<script type="text/javascript"> 
function get_vendor_details(id)
{
	var vendor_code = $("#vendor_code_"+id).val();
	var vendor_id = $("#vendor_id_"+id).val();
	var vendor_name = $("#vendor_name_"+id).val();

	$("#vdrquo_vendor_code").val(vendor_code);
	$("#vdrquo_vendor_id").val(vendor_id);
	$("#vdrquo_vendor_name").val(vendor_name);
	
	$(".vendor_popup"+id).addClass("close");
	
}
</script>
<div class="p-popup">
  <a class="close"><img src="<?php echo base_url(); ?>/resources/images/close-button.png" width="25" /></a>
  <div class="title_head">
  <p>Vendors</p>
  <ul>
				<!--<li><a class="btn-danger" href="#">Remove</a></li>-->
				<li><a class="insert" id="btn" href="<?php echo site_url('vendor/addvendor'); ?>">Add Vendor</a></li>
				<!--<li><a class="btn-success" href="#">Done</a></li>-->
			</ul>
  </div>
  	<div class="table_head1" id="table">
      <div class="popup_col w10 last">
        <div class="content">
          <table>
            <tbody>
              <tr>
                <th>Vendor Code</th>
                <th>Vendor Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Website</th>
                <th>Contact Person</th>
              </tr>
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
			                <td><?php echo $Ven['vendor_phone'];?></td>
			                <td><?php echo $Ven['vendor_email'];?></td>
			                <td><?php echo $Ven['vendor_website'];?></td>
			                <td><?php echo $Ven['vendor_contact_person'];?></td>
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