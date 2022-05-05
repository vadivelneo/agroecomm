<script>
$(document).ready(function () {

	$("#report_customer_name").autocomplete({
		source: "<?php echo site_url('reports/report_search_customer_name'); ?>", 
		minLength: 1,
		select: function(event, ui)
				{
					$('#report_customer_id').val(ui.item.customer_id);
					$('#report_customer_name').val(ui.item.customer_name);
				}
 	});
	
	$("#report_region_name").autocomplete({
		source: "<?php echo site_url('reports/report_search_region_name'); ?>", 
		minLength: 1,
		select: function(event, ui)
				{
					$('#report_region_id').val(ui.item.region_id);
					$('#report_region_name').val(ui.item.region_name);
				}
 	});
	
	$("#report_zone_name").autocomplete({
		source: "<?php echo site_url('reports/report_search_zone_name'); ?>", 
		minLength: 1,
		select: function(event, ui)
				{
					$('#report_zone_id').val(ui.item.zone_id);
					$('#report_zone_name').val(ui.item.zone_name);
				}
 	});
	
	$("#report_area_name").autocomplete({
		source: "<?php echo site_url('reports/report_search_area_name'); ?>", 
		minLength: 1,
		select: function(event, ui)
				{
					$('#report_area_id').val(ui.item.area_id);
					$('#report_area_name').val(ui.item.area_name);
				}
 	}); 
	
	$("#report_salesman_name").autocomplete({
		source: "<?php echo site_url('reports/report_search_salesman_name'); ?>", 
		minLength: 1,
		select: function(event, ui)
				{
					$('#report_salesman_id').val(ui.item.designation_user_id);
					$('#report_salesman_name').val(ui.item.designation_user_name);
				}
 	});
   
});
</script>

<?php echo $this->load->view('pages/sales_report_left_side'); ?>

<section>
	<div class="rightPanel">
		<div class="row-fluid">
			<form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/sales_ordersearch'); ?>" enctype="multipart/form-data"> 
				<div tabindex="3" class="report" id="report" style="padding:1%;">
                	<div class="report_search_main">
                        <div class="report_search_left report_list_left"> 
                            <div class="report_search_left_inner">
                            	<div class="report_field field_box">
                                    <div class="report_field_label">
                                    	<p> From date : </p>
                                    </div>	
                                    <div class="report_field_input">
                                    	<input type="text" name="report_from" class="input-large report_text" id="report_from" value="<?php if(isset($report_from)) { if(($report_from) != '0000-00-00' && $report_from != '' && $report_from != NULL){ echo date('d-m-Y', strtotime($report_from)); } } else { echo date('01-m-Y'); } ?>">
                                	</div>
                                </div>
                                <div class="report_field field_box">
                                	<div class="report_field_label">
                                    	<p> To date : </p>
                                    </div>	
                                    <div class="report_field_input">
                                    	<input type="text" name="report_to" class="input-large report_text" id="report_to" value="<?php if(isset($report_from)) { if(($report_to) != '0000-00-00' && $report_to != '' && $report_to != NULL){ echo date('d-m-Y', strtotime($report_to)); } } else { echo date('d-m-Y'); } ?>">
                                	</div>
                                </div>
                                <div class="report_field field_box">                                
                                	<div class="report_field_label">
                                    	<p> Customer Name : </p>
                                    </div>
                                    <div class="report_field_input">
                                    	<input type="text" name="report_customer_name" class="input-large report_text" id="report_customer_name" value="<?php if(isset($customer_name)){ echo $customer_name; }?>">
                                		<input type="hidden" name="report_customer_id" id="report_customer_id" value="<?php if(isset($customer_id)){ echo $customer_id; }?>" />
                                	</div>
                                </div>
                                <div class="report_field field_box">
                                	<div class="report_field_label">
                                    	<p>  </p>
                                    </div>
                                    <div class="report_field_input">
                                		<input type="hidden" name="report_salesman_name" class="input-large report_text" id="report_salesman_name" value="<?php if(isset($salesman_name)){ echo $salesman_name; } ?>">
                                		<input type="hidden" name="report_salesman_id" id="report_salesman_id" value="<?php if(isset($salesman_id)){ echo $salesman_id; }?>" />
                            		</div>
                                </div>
                            </div>
                           <!-- <div class="report_search_left_inner">
                                <div class="report_field">
                                	<div class="report_field_label">
                                    	<p> Region : </p>
                                    </div>
                                    <div class="report_field_input">
                                    	<input type="text" name="report_region_name" class="input-large report_text" id="report_region_name" value="<?php if(isset($region_name)){ echo $region_name; }?>">
                                		<input type="hidden" name="report_region_id" id="report_region_id" value="<?php if(isset($region_id)){ echo $region_id; }?>" />
                                	</div>
                            	</div>
                                <div class="report_field">
                                	<div class="report_field_label">
                                    	<p> Zone : </p>
                                    </div>
                                    <div class="report_field_input">
                                        <input type="text" name="report_zone_name" class="input-large report_text" id="report_zone_name" value="<?php if(isset($zone_name)){ echo $zone_name; }?>">
                                        <input type="hidden" name="report_zone_id" id="report_zone_id" value="<?php if(isset($zone_id)){ echo $zone_id; }?>" />
                                	</div>
                                </div>
                                <div class="report_field">
                                	<div class="report_field_label">
                                    	<p> Area : </p>
                                    </div>
                                	<div class="report_field_input">
                                    	<input type="text" name="report_area_name" class="input-large report_text" id="report_area_name" value="<?php if(isset($area_name)){ echo $area_name; }?>">
                                		<input type="hidden" name="report_area_id" id="report_area_id" value="<?php if(isset($area_id)){ echo $area_id; }?>" />
                                	</div>
                                </div>
                            </div>
                           <div class="report_search_left_inner"> 
                                <div class="report_field">
                                	<div class="report_field_label">
                                    	<p> Sales Representative : </p>
                                    </div>
                                    <div class="report_field_input">
                                		<input type="text" name="report_salesman_name" class="input-large report_text" id="report_salesman_name" value="<?php if(isset($salesman_name)){ echo $salesman_name; } ?>">
                                		<input type="hidden" name="report_salesman_id" id="report_salesman_id" value="<?php if(isset($salesman_id)){ echo $salesman_id; }?>" />
                            		</div>
                                </div>
                            </div>-->
                        </div>
                        <div class="report_search_right"> 
                         <input id="tax_value" name="tax_value" type="hidden" value="<?php echo $tax_value; ?>" />
                        	<input type="submit" id="generate" name="generate" class="btn-success btn_generate" value="Generate">
                        </div>
                    </div>
				</div> 
			</form> 
			<?php
			if(!empty($so_list)) { ?>
				<form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/sales_ordersearch'); ?>" enctype="multipart/form-data">
					<input type="hidden" name="report_from" value="<?php if(isset($report_from)) { if(($report_from) != '0000-00-00' && $report_from != '' && $report_from != NULL){ echo date('d-m-Y', strtotime($report_from)); } } ?>">
					<input type="hidden" name="report_to" value="<?php if(isset($report_from)) { if(($report_to) != '0000-00-00' && $report_to != '' && $report_to != NULL){ echo date('d-m-Y', strtotime($report_to)); } } else { echo date('d-m-Y'); } ?>">
					<input type="hidden" name="report_customer_name" value="<?php if(isset($customer_name)){ echo $customer_name; }?>">				  <input id="tax_value" name="tax_value" type="hidden" value="<?php echo $tax_value; ?>" />
					<input type="hidden" name="report_customer_id" value="<?php if(isset($customer_id)){ echo $customer_id; }?>" />
                    <input type="hidden" name="report_region_name" value="<?php if(isset($region_name)){ echo $region_name; }?>">
					<input type="hidden" name="report_region_id" value="<?php if(isset($region_id)){ echo $region_id; }?>" />
                    <input type="hidden" name="report_zone_name" value="<?php if(isset($zone_name)){ echo $zone_name; }?>">
					<input type="hidden" name="report_zone_id" value="<?php if(isset($zone_id)){ echo $zone_id; }?>" />
                    <input type="hidden" name="report_area_name" value="<?php if(isset($area_name)){ echo $area_name; }?>">
					<input type="hidden" name="report_area_id" value="<?php if(isset($area_id)){ echo $area_id; }?>" />
                    <input type="hidden" name="report_salesman_id" value="<?php if(isset($salesman_id)){ echo $salesman_id; }?>" />
                    <input type="submit" id="export" name="export" class="btn-success btn_export" value="Export">
				</form>
			<?php } ?>
		</div>
		
        <div class="table_head" id="table">
			<div class="col w10 last">
				<div class="sessionMsg"><?php echo $this->session->flashdata('message'); ?></div>
				<div class="content">
					<table>
						<tbody>
                             <tr>
                             	<th width="90px"><a href="javascript:void(0);" class="listViewHeaderValues">Date&nbsp;&nbsp;</a></th>
                                <th width="120px"><a href="javascript:void(0);" class="listViewHeaderValues">SO no.&nbsp;&nbsp;</a></th>
                                <th width="150px"><a href="javascript:void(0);" class="listViewHeaderValues">Customer Name&nbsp;&nbsp;</a></th>
                                <th width="120px" class="report_right_aligned"><a href="javascript:void(0);" class="listViewHeaderValues">Gross Amount&nbsp;&nbsp;</a></th>
                                <!--<th width="110px" class="report_right_aligned"><a href="javascript:void(0);" class="listViewHeaderValues">Discount Amount&nbsp;&nbsp;</a></th>-->
                                 <?php if($tax_value != 'nontaxable') { ?>
                                <th width="100px" class="report_right_aligned"><a href="javascript:void(0);" class="listViewHeaderValues">Tax Amount&nbsp;&nbsp;</a></th>
                                 <?php } ?>
                                <th width="100px" class="report_right_aligned"><a href="javascript:void(0);" class="listViewHeaderValues">Net Amount&nbsp;&nbsp;</a></th>
                                 <th width="80px"><a href="javascript:void(0);" class="listViewHeaderValues">Status  &nbsp;&nbsp;</a></th>
                            </tr>
							<?php
							if(!empty($so_list)) {
								$i = 1;
								foreach($so_list as $SO) { ?>
								<tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1">
                                	<td>
										<?php 
											if(($SO['sales_order_add_date']) != '0000-00-00' && $SO['sales_order_add_date'] != '' && $SO['sales_order_add_date'] != NULL)
											{ 
												echo date('d-m-Y', strtotime($SO['sales_order_add_date']));
											}
											else
											{
												echo "-";
											}
										?>
									</td>
									<td>
										<a href="#">
											<?php echo $SO['sales_order_number'];?>
										</a>
									</td>
									<td>
										<a href="#">
											<?php echo ucfirst($SO['customer_name']);?>
										</a>
									</td>
                                   
									<td class="report_right_aligned">
										<a href="#">
											<?php echo $SO['so_total_gross_amount'];?>
										</a>
									</td>
									<?php /*?><td class="report_right_aligned">
										<a href="#">
											<?php echo $SO['so_total_discount_amount'];?>
										</a>
									</td><?php */?>
                                     <?php if($tax_value != 'nontaxable') { ?>
									<td class="report_right_aligned">
										<a href="#">
											<?php echo $SO['so_total_tax_amount'];?>
										</a>
									</td>
                                    <?php } ?>
									<td class="report_right_aligned">
										<a href="#">
											<?php echo $SO['so_grand_total'];?>
										</a>
									</td>
                                   
									<td>
										<?php echo $SO['sales_order_status'];?>
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
								<td colspan="9" style="text-align:center;"> No Records Found </td>
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
</section>
