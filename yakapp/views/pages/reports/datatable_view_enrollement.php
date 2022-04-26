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

<table id="tblList" style="border: 1px solid red;">
				<thead style="border: 1px solid red;">
		<span style="font-size:14px;margin-bottom: 25px;align:centre;">

		<button style="margin-bottom:15px;" type="submit" name="view_report" class="btn btn-green">Level  <input style="width:27px;!important;color: white;background-color: #a2d200;border: #a2d200;" name="level_count" id="level_count" value="2" readonly type="text" />- <?php if(!empty($editenrollement_report)) { echo count($editenrollement_report); }  ?></button>

		</span></br>
		
				<tr style="border: 1px solid red;">
						<th class="sort-alpha"></th>
                         <th class="sort-alpha">S.No</th>
                            <th class="sort-alpha">Customer ID</th>
							 <th class="sort-alpha">Customer Name</th>
							<!--<th class="sort-alpha">Rank</th>
							<th class="sort-alpha">Referal ID</th>
							<th class="sort-alpha">Date of Joining</th>
							<th class="sort-alpha">Level <input style="width:27px;!important;" name="level_count" id="level_count" value="2" readonly type="text" /> - <?php if(!empty($editenrollement_report)) { echo count($editenrollement_report); }  ?></th>-->
							
						               </tr>
									   
				<tr >	
							</thead>
				<tbody id="disp_items">
				  
          <?php if(!empty($editenrollement_report)) { 
		  $level_no ='';
		  $itemcount = 1; foreach($editenrollement_report as $ITEMS) { ?>
			<tr>
<td>
			<span id="accordin_grid_<?php echo $search_key; ?>" class="summary_child_cont1" style="display:block" onclick="level_accordin_grid('<?php echo $ITEMS['OFCR_USR_VALUE']; ?>','<?php echo $search_key; ?>','<?php echo $level_no; ?>','<?php echo $ITEMS['OFCR_FST_NME'].' - '.$ITEMS['OFCR_USR_VALUE']; ?>')">
			<img style="width:25px;height:25px;" src="<?php echo base_url();?>resources/images/add-icon.png" class="summary_child_img">
			</span>
			<span id="level_accordin_close_grid_<?php echo $search_key; ?>" class="summary_child_cont1" style="display:none" onclick="accordin_close_grid('<?php echo $ITEMS['OFCR_ID']; ?>','<?php echo $search_key; ?>')">
			<img style="width:25px;height:25px;" src="<?php echo base_url();?>resources/images/minus-icon.png" class="summary_child_img">
			</span>
</td>
			<td><?php echo $itemcount;?></td>
			<td><?php echo $ITEMS['OFCR_USR_VALUE'];?></td>
			<td><?php echo $ITEMS['OFCR_FST_NME'].' '.$ITEMS['OFCR_LST_NME'];?></td>
			<!--<td><?php echo $ITEMS['OFCR_MOB'];?></td>
			<td><?php echo $ITEMS['rank'];?></td>
			<td><?php echo $ITEMS['OFCR_TRE_SPNCR_ID'];?></td>
			<td><?php echo '';?></td>
			-->
			</tr>
                         <?php $itemcount++; } } ?>

				</tbody>
				</table>