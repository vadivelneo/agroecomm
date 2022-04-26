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
			                <td><?php echo $MRL['met_transation_date'];?></td>
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