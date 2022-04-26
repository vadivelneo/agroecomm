<script type="text/javascript">
		function level_accordin_grid($id,$i,$level,$user)
		{
			//alert($user);
				$('#accordin_grid_'+$i).css('display','none');
				$('#accordin_close_grid_'+$i).css('display','block');
			
				var search_id = $id;
				var search_key = $i;
				var level_id = $level;
				var num1 = $("#level_count").val();
				var num2 = 1;
				var level_count = parseInt(num1) + parseInt(num2);
					   //alert(level_count);
				   $.ajax({
					type: 'POST',
					url: '<?php echo site_url('reports/view_enrollement_report'); ?>',
					data: {search_id: search_id, search_key:search_key, level_id:level_id },
					success: function(resp)
					{ 
					$('#summary_report1_'+$i).html($user);
						$('#summary_report_'+$i).html(resp);
						$('#level_value').html(level_id);
						$('#level_count').val(level_count);
					}
				 });
		}
		
		function level_accordin_close_grid($id,$i)
		{
			
			 $('#accordin_close_grid_'+$i).css('display','none');
			 $('#accordin_grid_'+$i).css('display','block');
			 $('#summary_report_'+$i).html('');
			 $('#summary_report1_'+$i).html('');
		}

</script>
<?php
$sessionuserData = $this->session->userdata('userlogin');
//echo/"<pre>"; print_r($sessionuserData); exit;
$sess_user=$sessionuserData['user_id'];
?>

<table id="tblList">
				<thead>
				<tr >	
				<th style="background-color: #ed6e6e !important;" ></th>
				<th style="background-color: #ed6e6e !important;">S.No</th>
				<th style="background-color: #ed6e6e !important;">Customer ID.</th>	
				<th style="background-color: #ed6e6e !important;">Customer Name</th>
				<?php if($sess_user == 1) { ?>  
				
				<th style="background-color: #ed6e6e !important;">Mobile</th>
				 <?php } ?>  
				<th style="background-color: #ed6e6e !important;">Rank</th>
				<th style="background-color: #ed6e6e !important;">Referal ID</th>
				<th style="background-color: #ed6e6e !important;">Date of Joining</th>
               <th style="font-size:20px;font-weight:bold;color:fff;background-color: #ed6e6e !important;">Level <input style="width:27px;!important;" name="level_count" id="level_count" value="2" readonly type="text" /> - <?php if(!empty($editenrollement_report)) { echo count($editenrollement_report); }  ?></th>
				
				</tr>
				</thead>
				<tbody id="disp_items">
				  
          <?php if(!empty($editenrollement_report)) { 
		  $level_no ='';
		  $itemcount = 1; foreach($editenrollement_report as $ITEMS) { ?>
                        <tr>
						
					 <td>
					 <div>
                    <span id="accordin_grid_<?php echo $search_key; ?>" class="summary_child_cont1" style="display:block" onclick="level_accordin_grid('<?php echo $ITEMS['OFCR_USR_VALUE']; ?>','<?php echo $search_key; ?>','<?php echo $level_no; ?>','<?php echo $ITEMS['OFCR_FST_NME'].' - '.$ITEMS['OFCR_USR_VALUE']; ?>')">
                    <img src="<?php echo base_url();?>resources/images/add-icon.png" class="summary_child_img">
                    </span>
                    <span id="level_accordin_close_grid_<?php echo $search_key; ?>" class="summary_child_cont1" style="display:none" onclick="accordin_close_grid('<?php echo $ITEMS['OFCR_ID']; ?>','<?php echo $search_key; ?>')">
                    <img src="<?php echo base_url();?>resources/images/minus-icon.png" class="summary_child_img">
                    </span>
                    </div>
					  </td>
					   <td>
						 <?php echo $itemcount; ?>
						  </td>
                            <td>
                            <?php if($ITEMS['OFCR_USR_VALUE']!= '') { echo $ITEMS['OFCR_USR_VALUE']; } else { echo '-'; } ?>
                            <input name="item_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['OFCR_ID'])) { echo $ITEMS['OFCR_ID']; } ?>" type="hidden" />
                            <input name="item_code[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['OFCR_USR_VALUE'])) { echo $ITEMS['OFCR_USR_VALUE']; } ?>" type="hidden" />
                            </td>
                            <td>
                            <?php if(isset($ITEMS['OFCR_FST_NME'])) { echo $ITEMS['OFCR_FST_NME'].' '.$ITEMS['OFCR_LST_NME']; } ?>
                            <input name="item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['OFCR_FST_NME'])) { echo $ITEMS['OFCR_FST_NME'].' '.$ITEMS['OFCR_LST_NME']; } ?>" type="hidden" />
                            </td>
							
							<?php if($sess_user == 1) { ?>  
							
							
							<td>
                            <?php if(isset($ITEMS['OFCR_MOB'])) { echo $ITEMS['OFCR_MOB']; } ?>
                            <input name="item_division_name[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['OFCR_MOB'])) { echo $ITEMS['OFCR_MOB']; } ?>" type="hidden" />
                            </td>
							 <?php } ?>  
							
							<td>
                            <?php if(isset($ITEMS['rank'])) { echo $ITEMS['rank']; } ?>
                            <input name="item_store_name[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['rank'])) { echo $ITEMS['rank']; } ?>" type="hidden" />
                            </td>
							
							
							<td>
                           <?php if(isset($ITEMS['OFCR_TRE_SPNCR_ID'])) { echo $ITEMS['OFCR_TRE_SPNCR_ID'];  } ?> 
                           <input name="UOM_name[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['OFCR_TRE_SPNCR_ID'])) { echo $ITEMS['OFCR_TRE_SPNCR_ID']; } ?>" />
                           </td>
							
							<td>
                            <?php if(isset($ITEMS['OFCR_ADD_DT'])) {  echo date('d-m-Y', strtotime($ITEMS['OFCR_ADD_DT'])); } ?>
                            <input name="item_brand[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['OFCR_ADD_DT'])) { echo $ITEMS['OFCR_ADD_DT']; } ?>" type="hidden" />
							
							 
                            </td>
							
                          
                        </tr>
                         <?php $itemcount++; } } ?>

				</tbody>
				</table>