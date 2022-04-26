<script type="text/javascript">
function accordin_grid($id,$i)
{
    $('#accordin_grid_'+$i).css('display','none');
	$('#accordin_close_grid_'+$i).css('display','block');
	var search_id = $id;
		   
	 $.ajax({
	  type: 'POST',
	  url: '<?php echo site_url('reports/view_summary_grn_test'); ?>',
	  data: {search_id: search_id},
	  success: function(resp)
	  { 
		  $('#summary_report_'+$i).html(resp);
	  }
   });
}

function accordin_close_grid($id,$i)
{
    $('#accordin_close_grid_'+$i).css('display','none');
	$('#accordin_grid_'+$i).css('display','block');
	$('#summary_report_'+$i).html('');
}
</script>
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
	
	$("#report_item_name").autocomplete({
		source: "<?php echo site_url('reports/report_search_item_name'); ?>", 
		minLength: 1,
		select: function(event, ui)
				{
					$('#report_item_id').val(ui.item.product_id);
					$('#report_item_name').val(ui.item.product_name);
				}
 	});
	 
   
});
</script>

<?php echo $this->load->view('pages/inventory_report_left_side'); ?>

<section>
	<div class="rightPanel">
		<div class="row-fluid">
			<form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/qm_grn_test_report_search'); ?>" enctype="multipart/form-data"> 
				<div tabindex="3" class="report" id="report" style="padding:1%;">
                	<div class="report_search_main">
                        <div class="report_search_left report_list_left"> 
                            <div class="report_search_left_inner">
                            	
								 <div class="report_field field_box">
                                	<div class="report_field_label">
                                    	<p> From Date : </p>
                                    </div>
                                    <div class="report_field_input">
                                		<input type="text" name="report_from" class="input-large report_text"  autocomplete="off" id="report_from" value="<?php if(isset($report_from)) { if(($report_from) != '0000-00-00' && $report_from != '' && $report_from != NULL){ echo date('d-m-Y', strtotime($report_from)); } } else {  } ?>" />
                                    <input type="hidden"  name="qc_id" id="qc_id" value="<?php if(isset($SI['qc_id'])){ $SI['qc_id']; }?>" >
									
                            		</div>
                                </div>
								 <div class="report_field field_box">
                                	<div class="report_field_label">
                                    	<p> TO Date : </p>
                                    </div>
                                    <div class="report_field_input">
                                		 <input type="text" autocomplete="off" name="report_to" class="input-large report_text" id="report_to" value="<?php if(isset($report_from)) { if(($report_to) != '0000-00-00' && $report_to != '' && $report_to != NULL){ echo date('d-m-Y', strtotime($report_to)); } } else { } ?>"/>
                            		</div>
                                </div>
								
		                            <!-- <div class="report_field field_box">
                                	<div class="report_field_label">
                                    	<p> Material Name : </p>
                                    </div>
                                    <div class="report_field_input">
                                		 <input type="text" style="width:120px;" name="report_item_name" class="input-large report_from" id="report_item_name" autocomplete="off" value="<?php if(isset($product_name)){ echo $product_name; }?>">
		                             <input type="hidden"  name="report_item_id" id="report_item_id" value="<?php if(isset($product_id)){ echo $product_id; }?>" 
                            		</div>
                                </div>-->
                               
                        <div class="report_search_right"> 
                        	<input type="submit" id="generate" name="generate" class="btn-success btn_generate" value="Generate">
                        </div>	
                    </div>
				</div>  
			</form> 
			<?php
			if(!empty($invoice_list)) { ?>
				<form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/qm_grn_test_report_search'); ?>" enctype="multipart/form-data">
					<input type="hidden" name="report_from" value="<?php if(isset($report_from)) { if(($report_from) != '0000-00-00' && $report_from != '' && $report_from != NULL){ echo date('d-m-Y', strtotime($report_from)); } } ?>">
					<input type="hidden" name="report_to" value="<?php if(isset($report_from)) { if(($report_to) != '0000-00-00' && $report_to != '' && $report_to != NULL){ echo date('d-m-Y', strtotime($report_to)); } } else { echo date('d-m-Y'); } ?>">
					<input type="hidden" name="report_customer_name" value="<?php if(isset($customer_name)){ echo $customer_name; }?>">	
                    <input type="submit" id="export" name="export" class="btn-success btn_export" value="Export">
				</form>
			<?php } ?>
		</div>
		
        <div class="table_head" id="table">
			<div class="col w10 last summary_child" >
				<div class="sessionMsg"><?php echo $this->session->flashdata('message'); ?></div>
				<div class="content">
                <div style="width:100%;font-weight:bold;">
					<div class="summary_div_child" style="width:3%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="summary_div_child" style="width:15%;">GRN Test Code
                    </div>
                    <div class="summary_div_child" style="width:15%;">SGRN 
                    </div>
                    <div class="summary_div_child" style="width:15%;">Location 
                    </div>
                    <div class="summary_div_child" style="width:15%;">Approved By   
                    </div>
                   <div class="summary_div_child" style="width:15%;">Created date   
                    </div>
                  
                    <div  class="summary_div" align="center">Status
                    </div>
                    </div>
                    <?php
					
							if(!empty($stock_list)) {
								$i = 1;
								foreach($stock_list as $SI) { ?>
                    <div class="summary_child_cont">
					<div >
                    <span id="accordin_grid_<?php echo $i; ?>" class="summary_child_cont1" style="display:block" onclick="accordin_grid('<?php echo $SI['qc_id']; ?>','<?php echo $i; ?>')">
                    <img src="<?php echo base_url();?>resources/images/add-icon.png" class="summary_child_img">
                    </span><span id="accordin_close_grid_<?php echo $i; ?>" class="summary_child_cont1" style="display:none" onclick="accordin_close_grid('<?php echo $SI['qc_id']; ?>','<?php echo $i; ?>')">
                    <img src="<?php echo base_url();?>resources/images/minus-icon.png" class="summary_child_img"></span>
                    </div>
                  
				
                    <div class="summary_div_child" style="width:15%;"><a href="javascript:void(0)" onclick="accordin_grid('<?php echo $SI['qc_id']; ?>','<?php echo $i; ?>')">
											<?php echo $SI['qc_code'];?>
										</a>
                    </div>
                    <div class="summary_div_child" style="width:15%;"><a href="javascript:void(0)" onclick="accordin_grid('<?php echo $SI['qc_id']; ?>','<?php echo $i; ?>')">
											<?php echo ucfirst($SI['qc_gr_no']);?>
										</a>
                    </div>
                    
					<div class="summary_div_child" style="width:15%;"><a href="javascript:void(0)" onclick="accordin_grid('<?php echo $SI['qc_id']; ?>','<?php echo $i; ?>')">
											<?php echo ucfirst($SI['location_name']);?>
										</a>
                    </div>
                    <div class="summary_div_child" style="width:15%;"><a href="javascript:void(0)" onclick="accordin_grid('<?php echo $SI['qc_id']; ?>','<?php echo $i; ?>')">
											<?php echo ucfirst($SI['user_first_name']);?>
										</a>
                    </div>
                    
				  <div style="width:15%;float:left">
					<?php 
											if(($SI['qc_added_date']) != '0000-00-00' && $SI['qc_added_date'] != '' && $SI['qc_added_date'] != NULL)
											{ 
												echo date('d-m-Y', strtotime($SI['qc_added_date']));
											}
											else
											{
												echo "-";
											}
										?>
                    </div>
                   
                    <div  class="summary_div" align="center"><?php echo $SI['qc_status'];?>
                    </div>
                    </div>
                    <div class="summary_child1" id="summary_report_<?php echo $i; ?>"> </div>
                    <?php $i++; } } ?>
                   
				</div>
                
			</div>
            <?php 
            if(empty($invoice_list)) { ?>
            <div class="col w10 last" style="text-align: center;">No Records Found</div>
			<?php } ?>
			<div class="clear"></div>
		</div>
	</div>
</section>
