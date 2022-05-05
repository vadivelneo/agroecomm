<script type="text/javascript">

			function materialrequestsearch()
			
		{
           var search_mr_no = $("#search_mr_no").val();
		   var search_met_req_type = $("#search_met_req_type").val();
		   
		   $.ajax({
			type: 'POST',
			url: '<?php echo site_url('purchasepopup/materialrequestsearch'); ?>',
			data: {mr_code: search_mr_no, mr_type: search_met_req_type},
			success: function(resp)
			{ 
				$('#multiple_mr_req').html(resp);
			}
		 });
		}

</script>
<script type="text/javascript">
function get_metrialrequest_details(id, metid)
{
	$('#disp_items').html("");
	
	var met_requestion_no = $("#met_requestion_no_"+id).val();
	var met_requestion_id = $("#met_requestion_id_"+id).val();
	
	$("#vdrquo_mr_reqnum").val(met_requestion_no);
	$("#vdrquo_mr_reqnum_id").val(met_requestion_id);
	
	$.ajax({
 		type: 'POST',
 		url: '<?php echo site_url('purchasepopup/getmetrialrequest'); ?>',
 		data: {'metrialRequestId': metid},
 		success: function(resp) {

	  		var myData = JSON.parse(resp);
		
			var view_order = myData.view_order;
			var totalrows = myData.countofrows;

			$('#disp_items').append(view_order);
			$('#last_table_id').val(totalrows);
			
 		}
	 });

	$(".metrial_popup"+id).addClass("close");
}
</script>
<div class="p-popup">
  <a class="close"><img src="<?php echo base_url(); ?>/resources/images/close-button.png" width="25" /></a>
  <div>
  <div class="title_head">
  <p>Search Goods Indent Request</p>
  </div>
      <table>
      	<tr>
        	<td>
            	Goods Indent Requestion No:
                <br /><br />
                <input type="text" 	value="" name="search_mr_no" class="input-large" id="search_mr_no" onkeyup="materialrequestsearch()">
            </td>
            <td>
            	Requisition Type:
            <br /><br />
            	<select	name="search_met_req_type" class="chzn-select" id="search_met_req_type" onchange="materialrequestsearch()">
                    <option value="">Select Requisition Type</option>
                    <option value="purchase">purchase</option>
                </select>
            </td>
            <!--<td>
            	<br /><br />
            	<a href="#" id="materialrequestsearch" class="btn-success">Search</a>
            </td>-->
        </tr>
      </table>
      </div>
  <div class="title_head">
  <p>Goods Indent Request</p>
  </div>
  	<div class="table_head1" id="table">
      <div class="popup_col w10 last">
        <div class="content">
          <table>
            <thead>
              <tr>
                <th>Requestion No</th>
                <th>Requisition Type</th>
                <th>Requestion for</th>
                <th>Status</th>
                <th>Transaction Date</th>
              </tr>
              </thead>
              <tbody id="multiple_mr_req">
              <?php
				if(!empty($metrialRequest))
				{
					$i = 1;
		 			foreach($metrialRequest as $MRL)
					{
						?>
              			<tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1">
			                <td>
                                <a href="javascript:void(0);" class="popup_selection_class metrial_popup<?php echo $i;?>" onClick="get_metrialrequest_details('<?php echo $i;?>','<?php echo $MRL['met_id'];?>');">
                                    <?php echo $MRL['met_requestion_no'];?>
                                </a>
                                <input type="hidden" id="met_requestion_no_<?php echo $i;?>" value="<?php echo $MRL['met_requestion_no'];?>">
                                <input type="hidden" id="met_requestion_id_<?php echo $i;?>" value="<?php echo $MRL['met_id'];?>">
                            </td>
                            <td>
                               <?php echo ucfirst($MRL['met_requestion_type']);?>
                            </td>
			                <td>
                               <?php echo $MRL['met_request_for'];?>
                            </td>
			                <td><?php echo ucfirst($MRL['met_req_status']);?></td>
			                <td><?php echo date('d-m-Y', strtotime($MRL['met_transation_date']));?></td>
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