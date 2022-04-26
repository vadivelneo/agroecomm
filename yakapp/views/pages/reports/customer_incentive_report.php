<script type="text/javascript">
function accordin_grid($id,$i)
{
    $('#accordin_grid_'+$i).css('display','none');
	$('#accordin_close_grid_'+$i).css('display','block');
	var search_id = $id;
		   
	 $.ajax({
	  type: 'POST',
	  url: '<?php echo site_url('reports/view_officer_salesincentive'); ?>',
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
	 
   
});
</script>

<?php echo $this->load->view('pages/sales_left_side'); ?>

<section>
	<div class="rightPanel">
		<div class="row-fluid">
			<form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/customer_incentive_details'); ?>" enctype="multipart/form-data"> 
				<div tabindex="3" class="report" id="report" style="padding:1%;">
                	<div class="report_search_main">
                        <div class="report_search_left report_list_left"> 
                            <div class="report_search_left_inner">
                            	
                                <div class="report_field field_box">                                
                                	<div class="report_field_label">
                                    	<p> Customer Name : </p>
                                    </div>
                                    <div class="report_field_input">
                                    	<input type="text" name="report_customer_name" class="input-large report_text" id="report_customer_name" value="<?php if(isset($customer_name)){ echo $customer_name; }?>">
                                		<input type="hidden" name="report_customer_id" id="report_customer_id" value="<?php if(isset($customer_id)){ echo $customer_id; }?>" />
                                	</div>
                                </div>
								
                          
                        </div>
                        <div class="report_search_right"> 
                        	<input type="submit" id="generate" name="generate" class="btn-success btn_generate" value="Generate">
                        </div>
                    </div>
				</div>  
			</form> 
			<?php
			if(!empty($invoice_list)) { ?>
				<form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/customer_incentive_details'); ?>" enctype="multipart/form-data">
					<input type="hidden" name="report_from" value="<?php if(isset($report_from)) { if(($report_from) != '0000-00-00' && $report_from != '' && $report_from != NULL){ echo date('d-m-Y', strtotime($report_from)); } } ?>">
					<input type="hidden" name="report_to" value="<?php if(isset($report_from)) { if(($report_to) != '0000-00-00' && $report_to != '' && $report_to != NULL){ echo date('d-m-Y', strtotime($report_to)); } } else { echo date('d-m-Y'); } ?>">
					<input type="hidden" name="report_customer_name" value="<?php if(isset($customer_name)){ echo $customer_name; }?>">				  
					<input type="hidden" name="report_customer_id" value="<?php if(isset($customer_id)){ echo $customer_id; }?>" />
                  
                    <input type="submit" id="incentive_sms" name="incentive_sms" class="btn-success btn_export" value="Send SMS">
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
					 <div class="summary_div_child" style="width:3%;">Sno
                    </div>
                    <div class="summary_div_child" style="width:12%;">Date
                    </div>
                   
                    <div class="summary_div_child" style="width:20%;">Customer Name
                    </div>
                    <div class="summary_div_child" style="width:10%;">Customer Code
                    </div>
                   <div  class="summary_div1 amt_right">Incentive Amount
                    </div>
                   
                  
                    </div>
                    <?php
					
							if(!empty($invoice_list)) {
								$i = 1;
								foreach($invoice_list as $SI) {
if(($SI['incentive_amt'] - $SI['redeem_amt']) !=0) {
									?>
                    <div class="summary_child_cont">
					
					 <div class="summary_div_child" style="width:5%;"><a href="javascript:void(0)" onclick="accordin_grid('<?php echo $SI['OFCR_ID']; ?>','<?php echo $i; ?>')">
											<?php echo $i; ?>
										</a>
                    </div>
                    <div style="width:12%;float:left">
					<?php 
											echo date('d-m-Y')
										?>
                    </div>
                  
                    <div class="summary_div_child" style="width:20%;"><a href="javascript:void(0)" onclick="accordin_grid('<?php echo $SI['OFCR_ID']; ?>','<?php echo $i; ?>')">
											<?php echo ucfirst($SI['OFCR_NAME']);?>
										</a>
                    </div>
                  
                    <div class="summary_div_child" style="width:10%;"><a href="javascript:void(0)" onclick="accordin_grid('<?php echo $SI['OFCR_ID']; ?>','<?php echo $i; ?>')">
											<?php echo ucfirst($SI['OFCR_USR_VALUE']);?>
										</a>
                    </div>
                     <div class="summary_div1 amt_right" ><a href="javascript:void(0)" onclick="accordin_grid('<?php echo $SI['OFCR_ID']; ?>','<?php echo $i; ?>')">
											<?php echo $SI['incentive_amt'] - $SI['redeem_amt'];?>
										</a>
                    </div>
                   
                    </div>
                    <div class="summary_child1" id="summary_report_<?php echo $i; ?>"> </div>
							<?php $i++; } } } ?>
                   
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
